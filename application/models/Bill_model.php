<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Bill_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	var $table        = 'tb_bills';


	var $column_order = array("billId", "billNameAt", "billVendorName", "billPaymentType", "billAmount", "billCreatedAt"); //set column field database for datatable orderable


	var $column_search = array("billId", "billNameAt", "billVendorName", "billPaymentType", "billAmount", "billCreatedAt"); //set column field database for datatable searchable


	var $order = array('id'=> 'desc'); // default order





	private function _get_datatables_query()
	{


		$this->db->select('*', false);
		$this->db->from('tb_bills');
		$this->db->join("users","billCreatedBy=id");
		$this->db->join("tb_vendors","billVendorId=vendorId","left");

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
		if($this->session->userdata("role")=="accountant")
		{
			$this->db->where(array('billDepartmentId'=>$this->session->userdata('department')));
		}
		$this->db->where("billIsDeleted",0);
		$query = $this->db->get();


		// echo $this->db->last_query();


		return $query->result();
	}





	function count_filtered()
	{


		$this->_get_datatables_query();
		if ($this->session->userdata("role")=="accountant") {
			$this->db->where(array('billDepartmentId'=>$this->session->userdata('department')));
		}
		$this->db->where("billIsDeleted",0);

		$query = $this->db->get();


		return $query->num_rows();
	}





	public function count_all()
	{


		$this->db->from($this->table);
		$this->db->where("billIsDeleted",0);
		//	$this->db->where(array('doc_system_id'=>$this->session->userdata('system_id')));
		return $this->db->count_all_results();
	}
}







