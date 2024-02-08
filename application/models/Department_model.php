<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Department_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	var $table        = 'department';


	var $column_order = array("departmentName"); //set column field database for datatable orderable


	var $column_search = array("departmentName"); //set column field database for datatable searchable


	var $order = array('departmentId'=> 'desc'); // default order





	private function _get_datatables_query()
	{


		$this->db->select('*', false);
		$this->db->from('department');
		///$this->db->join("tbblock","blockid=gs_block");

		//$query = $this->db->get();
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

		//$this->db->where(array('doc_system_id'=>$this->session->userdata('system_id')));
		$query = $this->db->get();


		// echo $this->db->last_query();


		return $query->result();
	}





	function count_filtered()
	{


		$this->_get_datatables_query();
		//$this->db->where(array('doc_system_id'=>$this->session->userdata('system_id')));

		$query = $this->db->get();


		return $query->num_rows();
	}





	public function count_all()
	{


		$this->db->from($this->table);

		//	$this->db->where(array('doc_system_id'=>$this->session->userdata('system_id')));
		return $this->db->count_all_results();
	}
}







