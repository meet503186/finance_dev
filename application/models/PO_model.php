<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class PO_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	var $table        = 'tb_paymentorder';


	var $column_order = array("poId", "poDate", "departmentName", "poAmount", "poCurrentStatus", "poBank","poBalance","poDate"); //set column field database for datatable orderable


	var $column_search = array("poId", "poDate", "departmentName", "poAmount", "poCurrentStatus", "poBank","poBalance","poDate"); //set column field database for datatable searchable


	var $order = array('poId'=> 'DESC'); // default order





	private function _get_datatables_query()
	{


		$this->db->select('*', false);
		$this->db->from('tb_paymentorder');
		$this->db->join("users","poCreatedBy=id");
		$this->db->join("department","departmentId=poFirmId","left");

		$i = 0;
		foreach ($this->column_search as $item) {
			// loop column
			if ($_POST['search']['value']) {
				// if datatable send POST for search
				if ($i === 0) {
					// first loop
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);

				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i)
					//last loop


				$this->db->group_end(); //close bracket


			}


			$i++;


		}





		if (isset($_POST['order'])) {
			// here order processing


			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);


		} else if (isset($this->order)) {


			$order = $this->order;


			$this->db->order_by(key($order), $order[key($order)]);


		}
	}





	function get_datatables()
	{


		$this->_get_datatables_query();


		if ($_POST['length'] != - 1)
			$this->db->limit($_POST['length'], $_POST['start']);

		if ($this->session->userdata("role")=="accountant") {
			$this->db->where(array('poFirmId'=>$this->session->userdata('department')));
		}
		if ($this->session->userdata("role")=="approval1") {
			$this->db->where_in("poCurrentStatus",array("approval1","payer"));
		}
		if ($this->session->userdata("role")=="approval2") {
			$this->db->where(array('poCurrentStatus'=>$this->session->userdata("role")));
		}
		if ($this->session->userdata("role")=="approval3") {
			$this->db->where(array('poCurrentStatus'=>$this->session->userdata("role")));
		}
		if ($this->session->userdata("role")=="centralStore") {
			$this->db->where(array('poFirmId'=>$this->session->userdata('department'),'poCurrentStatus'=>"centralStore"));
			
		}

		$query = $this->db->get();


		// echo $this->db->last_query();


		return $query->result();
	}





	function count_filtered()
	{


		$this->_get_datatables_query();
		if ($this->session->userdata("role")=="accountant") {
			$this->db->where(array('poFirmId'=>$this->session->userdata('department')));
		}
		if ($this->session->userdata("role")=="approval1") {
			$this->db->where(array('poCurrentStatus'=>2));
		}
		if ($this->session->userdata("role")=="approval2") {
			$this->db->where(array('poCurrentStatus'=>3));
		}
		if ($this->session->userdata("role")=="approval3") {
			$this->db->where(array('poCurrentStatus'=>4));
		}
		$query = $this->db->get();


		return $query->num_rows();
	}





	public function count_all()
	{


		$this->db->from($this->table);
		if ($this->session->userdata("role")=="accountant") {
			$this->db->where(array('poFirmId'=>$this->session->userdata('department')));
		}
		return $this->db->count_all_results();
	}
}







