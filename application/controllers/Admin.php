<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->library('session');
		$this->load->library('pagination');
		
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->load->model('Common_model', 'commonmodel', TRUE);
		$this->load->model('User_model', 'usermodel', TRUE);
		$this->load->model('Task_model', 'agendaModel', TRUE);
		$this->load->model('Vendor_model', 'vendorModel', TRUE);
		$this->load->model('Bill_model', 'billModel', TRUE);
		$this->load->model('PO_model', 'poModel', TRUE);
		
		$this->load->model('Department_model', 'departmentModel', TRUE);
		
		if ($this->session->userdata("role")=="") {
			redirect(base_url()."login", 'refresh');
		}
	}
	function changeDepartment()
	{
		$data["department"]=$this->input->post("department");
		$this->db->where("id",$this->session->userdata("uid"));
		$this->session->set_userdata("department",$this->input->post("department"));
		$this->db->update("users",$data);
		echo "success";
		
	}
	public function index()
	{
		$data["page"]="home";
		$this->load->view('include/header');
		$this->load->view('navigation',$data); 
		$this->load->view('include/topbarmenus'); 
		$this->load->view('Admin/dashboard',$data);
		$this->load->view('include/footer');
	}
	public function department()
	{
		$data["page"]="department";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus'); 
		$this->load->view('department');
		$this->load->view('include/footer');
	}
	
	public function userlist()
	{
		$data["page"]="userlist";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus');
		$this->load->view('userlist');
		$this->load->view('include/footer');
	}
	function getuserList()
	{
		$list = $this->usermodel->get_datatables();
		//print_r($list); die;
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowData) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $this->profilepic($rowData->id,$rowData->profilePicAt);
			$row[] = $rowData->name;
			$row[] = $rowData->email;
			$row[] = $rowData->loginaccess;
			$row[] = $rowData->duty;
			$row[] = $rowData->contact1;
			
			
			if ($rowData->isActive==1) {
				$row[] = '<span class="badge badge-success">Yes</div>';
			}
			if ($rowData->isActive==0) {
				$row[] = '<span class="badge badge-danger">No</div>';
			}
			$row[]= $this->commonmodel->getUserButton(["password","view","edit","delete"],$rowData->id);
			$actionstring="";
			


			$row[] = $actionstring;
			$data[] = $row;
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->usermodel->count_all(),
		"recordsFiltered" => $this->usermodel->count_filtered(),
		"data" => $data,
		);
		// print_r($output);
		//output to json format
		echo json_encode($output);
	}
	function profilepic($userid="",$at="")
	{
		if (file_exists("uploadedFiles/profilePictures/".$userid.".jpg")) {
			return '<img class="avatar-img" src="'.base_url().'uploadedFiles/profilePictures/'.$userid.'.jpg?'.$at.'" alt="" />';
		
	} else {
		return '<img class="avatar-img" src="'.base_url().'assets/images/avatar/1.jpg" alt="" /> <span class="user-avatar">';
		
	}
	}
	public function adduserView()
	{
		$data["page"]="userlist";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus');
		$this->load->view('adduserView');
		$this->load->view('include/footer');
	}
	public function saveUser()
	{
		$checkdata=$this->db->get_where("users",array("email"=>$this->input->post("email")));
		if($checkdata->num_rows()==0)
		{
			
			$checkdatamob=$this->db->get_where("users",array("contact1"=>$this->input->post("contact1")));
			if ($checkdatamob->num_rows()>0) {
				$responsedata["success"]=0;
				$responsedata["message"]="mobile number already in use.";
				
				echo json_encode($responsedata,TRUE);
				return;
			}
			
			$data["name"]=$this->input->post("name");
			$data["gender"]=$this->input->post("gender");
			$email=str_replace(' ','',$this->input->post("email")); 
			$data["email"]=$email;
			$data["password"]=md5($this->input->post("password"));
			$data["loginaccess"]=$this->input->post("loginaccess");
			$data["isCentralStore"]=$this->input->post("centralStoreAccount");
		
			
		
			$data["contact1"]=$this->input->post("contact1");
			$data["department"]=$this->input->post("department");
			$data["createdBy"]=$this->session->userdata("uid");

			$this->db->insert("users",$data);

			$lastid=$this->db->insert_id();

			

			$responsedata["success"]=1;
			echo json_encode($responsedata,TRUE);
		}
		else
		{
			$responsedata["success"]=0;
			$responsedata["message"]="user already exist with this email";
			echo json_encode($responsedata,TRUE);
		}
		
	}
	public function updateUser($uid="")
	{
		$email=str_replace(' ','',$this->input->post("email")); 
		$data["name"]=$this->input->post("name");
		$data["gender"]=$this->input->post("gender");
		$data["email"]=$email;
		
		$data["loginaccess"]=$this->input->post("loginaccess");


		$data["contact1"]=$this->input->post("contact1");
		$data["department"]=$this->input->post("department");
		$data["createdBy"]=$this->session->userdata("uid");
		$data["isActive"]=$this->input->post("isactive");
		$this->db->where("id",$uid);
		$this->db->update("users",$data);

		$responsedata["success"]=1;
		echo json_encode($responsedata,TRUE);
	}
	public function addDepartmentView()
	{
		$data["page"]="department";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus');
		$this->load->view('adddepartmentView');
		$this->load->view('include/footer');
	}
	
	
	public function billEditView($billid="")
	{
		$data["page"]="billsView";
		$data["billId"]=$billid;
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus');
		$this->load->view('billEditView');
		$this->load->view('include/footer');
	}
	
	public function saveDepartment()
	{
		$checkdata=$this->db->get_where("department",array("departmentName"=>$this->input->post("departmentName")));
		if ($checkdata->num_rows()==0) {
			$data["departmentName"]=$this->input->post("departmentName");
			
			$this->db->insert("department",$data);

			$responsedata["success"]=1;
			echo json_encode($responsedata,true);
		} else {
			$responsedata["success"]=0;
			$responsedata["message"]="department already exist";
			echo json_encode($responsedata,TRUE);
		}
	}
	public function updateDepartment()
	{
		$checkdata=$this->db->get_where("department",array("departmentName"=>$this->input->post("departmentName")));
		if ($checkdata->num_rows()>0) {
			$responsedata["success"]=0;
			$responsedata["message"]="department already exist";
			echo json_encode($responsedata,TRUE);
		} else {
			
			$data["departmentName"]=$this->input->post("departmentName");
			
			$this->db->where("departmentId",$this->input->post("departmentid"));
  
			$this->db->update("department",$data);

			$responsedata["success"]=1;
			echo json_encode($responsedata,true);
			
		}
	}

	function getDepartmentList()
	{
		$list = $this->departmentModel->get_datatables();
		//print_r($list); die;
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowData) {
			$no++;
			$row = array();
			$row[] = $no;
		
			$row[] = $rowData->departmentName;
			$row[] = $this->commonmodel->getDepartmentButton(["edit","delete"],$rowData->departmentId);
			$actionstring="";



			$row[] = $actionstring;
			$data[] = $row;
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->departmentModel->count_all(),
		"recordsFiltered" => $this->departmentModel->count_filtered(),
		"data" => $data,
		);
		// print_r($output);
		//output to json format
		echo json_encode($output);
	}

	public function beneficiaryAddView()
	{
		$data["page"]="beneficiaryView";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus');
		$this->load->view('beneficiaryAddView');
		$this->load->view('include/footer');
	}
	public function profileView()
	{
		$this->load->view('include/header');
		$this->load->view('navigation');
		$this->load->view('include/topbarmenus');
		$this->load->view('profileView');
		$this->load->view('include/footer');
	}
	
	public function billView($code="")
	{
	
		$data["page"]="billsView";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/header');
		$this->load->view('navigation');
		$this->load->view('include/topbarmenus');
		$this->load->view('billsView',$data);
		$this->load->view('include/footer');
	}
	
	public function printPoView($poid="")
	{

		$data["page"]="billsView";
		$data["poid"]=$poid;
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/header');
		$this->load->view('navigation');
		$this->load->view('include/topbarmenus');
		$this->load->view('poPrintView',$data);
		$this->load->view('include/footer');
	}

	

	public function billAddView()
	{

		$data["page"]="billAddView";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/header');
		$this->load->view('navigation');
		$this->load->view('include/topbarmenus');
		$this->load->view('billAddView',$data);
		$this->load->view('include/footer');
	}
	
	
	public function saveVendor()
	{
		
		$data["vendorName"]=$this->input->post("name");
		$data["vendorAccountNo"]=$this->input->post("vendorAccountNo");
		$data["vendorIFSCCode"]=$this->input->post("vendorIFSCCode");
		$data["vendorBank"]=$this->input->post("vendorBank");
		$data["vendorMobile"]=$this->input->post("vendorMobile");
		
		$data["vendorAddress"]=$this->input->post("address");
		$data["vendorCreatedBy"]=$this->session->userdata("uid");
		$data["vendorDepartmentId"]=$this->session->userdata("department");
		
		
		$this->db->insert("tb_vendors",$data);

		
		$responsedata["success"]=1;
		echo json_encode($responsedata,true);
		
	}
	
	public function updateVendor($vid="")
	{

		$data["vendorName"]=$this->input->post("name");
		$data["vendorAccountNo"]=$this->input->post("vendorAccountNo");
		$data["vendorIFSCCode"]=$this->input->post("vendorIFSCCode");
		$data["vendorBank"]=$this->input->post("vendorBank");
		$data["vendorMobile"]=$this->input->post("vendorMobile");
		$data["vendorAddress"]=$this->input->post("address");

		$this->db->where("vendorId",$vid);
		$this->db->update("tb_vendors",$data);


		$responsedata["success"]=1;
		echo json_encode($responsedata,true);
	}
	
	public function saveBill()
	{
		$paidAmount = sprintf('%0.2f', $this->input->post("paidAmount"));
		$checkdata=$this->db->get_where("tb_bills",array("billVendorId"=>$this->input->post("vendorId"),"billPaidAmount"=>$paidAmount,"billNo"=>$this->input->post("billno")))->result_array();
		if (count($checkdata)==0)
		{
			$data["billPaymentMethod"]=$this->input->post("title");
			$data["billNo"]=$this->input->post("billno");

			if ($this->input->post("title")=="P.O. For Cheque") {
				$data["billNameAt"]=$this->input->post("name2");
			}
			if ($this->input->post("title")=="P.O. For Net Banking") {
				$data["billNameAt"]=$this->input->post("name");
			}

			$data["billVendorId"]=$this->input->post("vendorId");

			$data["billVendorAccountNo"]=$this->input->post("accountNo");
			$data["billVendorIFSCcode"]=$this->input->post("vendorIFSCCode");
			$data["billVendorBank"]=$this->input->post("vendorBank");
			if ($this->input->post("typeofpayment")) {
				$data["billPaymentType"]=$this->input->post("typeofpayment");
			}

			if ($this->input->post("amount")!="") {
				$data["billAmount"]=$this->input->post("amount");
			}

			$data["billPaidAmount"]=$this->input->post("paidAmount");
			$data["billPurpose"]=$this->input->post("purpose");
			$data["billReference"]=$this->input->post("reference");
			//$data["billCheque"]=$this->input->post("title");
			$data["billRemarks"]=$this->input->post("remarks");
			//	$data["billCreatedAt"]=$this->input->post("title");
			$data["billCreatedBy"]=$this->session->userdata("uid");

			$data["billDepartmentId"]=$this->session->userdata("department");
			$data["billPurchaser"]=$this->input->post("purchase");
			$data["billType"]=$this->input->post("billtype");
			$data["billLastDate"]=date("Y-m-d",strtotime($this->input->post("lastdate")));
			
			$this->db->insert("tb_bills",$data);
			$billid=$this->db->insert_id();

			$this->commonmodel->createPoHistory(0,$billid,$this->session->userdata("uid"),"Create Bill");


			$responsedata["success"]=1;
			echo json_encode($responsedata,true);
		}
		else
		{
			$responsedata["success"]=0;
			$responsedata["message"]="Duplicate bill";
			echo json_encode($responsedata,true);
		}
		
		
		
		
		
	}


	public function updateBill($billid="")
	{
		if ($this->input->post("title")=="P.O. For Cheque") {
			$data["billNameAt"]=$this->input->post("name2");
		}
		if ($this->input->post("title")=="P.O. For Net Banking") {
			$data["billNameAt"]=$this->input->post("name");
		}
		$data["billPaymentMethod"]=$this->input->post("title");
		$data["billVendorId"]=$this->input->post("vendorId");

		$data["billVendorAccountNo"]=$this->input->post("accountNo");
		$data["billVendorIFSCcode"]=$this->input->post("vendorIFSCCode");
		$data["billVendorBank"]=$this->input->post("vendorBank");
		$data["billPaymentType"]=$this->input->post("typeofpayment");
		$data["billAmount"]=$this->input->post("amount");
		$data["billPaidAmount"]=$this->input->post("paidAmount");
		$data["billPurpose"]=$this->input->post("purpose");
		$data["billReference"]=$this->input->post("reference");
		//$data["billCheque"]=$this->input->post("title");
		$data["billRemarks"]=$this->input->post("remarks");
		//	$data["billCreatedAt"]=$this->input->post("title");
		$data["billCreatedBy"]=$this->session->userdata("uid");

		$data["billDepartmentId"]=$this->session->userdata("department");
		$data["billPurchaser"]=$this->input->post("purchase");
		$data["billType"]=$this->input->post("billtype");
		$data["billLastDate"]=date("Y-m-d",strtotime($this->input->post("lastdate")));
         
		$this->db->where("billId",$billid); 

		$this->db->update("tb_bills",$data);
		
		$this->commonmodel->createPoHistory(0,$billid,$this->session->userdata("uid"),"Update Bill");
		
		$responsedata["success"]=1;
		echo json_encode($responsedata,true);
	}
	
	function getVendorList()
	{
		$list = $this->vendorModel->get_datatables();
		//print_r($list); die;
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowData) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $rowData->vendorName;
			$row[] = $rowData->vendorAccountNo;
			$row[] = $rowData->vendorIFSCCode;
			$row[] = $rowData->vendorBank;
			$row[] = $rowData->name;
			$row[] = date(DATEFORMATE,strtotime($rowData->vendorCreatedAt));
	
			$row[] = $row[]= $this->commonmodel->getBeneficiaryButton(["edit","delete"],$rowData->vendorId);
			$actionstring="";
			
			$row[] = $actionstring;
			$data[] = $row;
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->vendorModel->count_all(),
		"recordsFiltered" => $this->vendorModel->count_filtered(),
		"data" => $data,
		);
		// print_r($output);
		//output to json format
		echo json_encode($output);
	}
	function getBillList()
	{
		$list = $this->billModel->get_datatables();
		//print_r($list); die;
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowData) {
			$no++;
			$row = array();
			$row[] = $no;
			
			
			$row[] = $rowData->billPoId;
			if ($rowData->billIsPaymentDone==1) {
				$row[] = '<span class="badge badge-success">Done</div>';
			}
			if ($rowData->billIsPaymentDone==0) {
				$row[] = '<span class="badge badge-danger">Pending</div>';
			}
			$row[] = $rowData->billNameAt;
			$row[] = $this->Common_model->billPOPup($rowData->billId,$this->Common_model->IndianPaymentFormat( $rowData->billPaidAmount),"bill");
			$row[] = $this->Common_model->billPOPup($rowData->billId,$rowData->vendorName,"bill");
			$row[] = $rowData->vendorAccountNo;
			
			$row[] = $rowData->billPurpose;
			$row[] = $rowData->billReference;
			$row[] = $rowData->billCheque;
			
			$row[] = date(DATEFORMATE,strtotime($rowData->billCreatedAt));
			$row[]=  $this->commonmodel->uploadAttachmantButton($rowData->billId,$rowData->billImageUrl);
			$row[] = $this->commonmodel->getBillButton(["edit","delete"],$rowData->billId,$rowData->billIsPaymentDone,$rowData->billPoId);
			$actionstring="";
			$row[] = $actionstring;
			$data[] = $row;
			
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->billModel->count_all(),
		"recordsFiltered" => $this->billModel->count_filtered(),
		"data" => $data,
		);
		// print_r($output);
		//output to json format
		echo json_encode($output);
	}


	function getPOList()
	{
		$list = $this->poModel->get_datatables();
		//print_r($list); die;
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rowData) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $rowData->poId;
			$row[] = $rowData->departmentName;
			$row[] =$this->commonmodel->getpobuttons(["link"],$rowData->poId, $this->commonmodel->getPoAmount($rowData->poId,$rowData->poIsUrgent));
			$row[] = $this->commonmodel->getPOStatusTitle($rowData->poCurrentStatus);
			$row[] = $rowData->poBank;
			$row[] = $rowData->poBalance;
			
			$row[] = date(DATEFORMATE,strtotime($rowData->poDate));
			$row[] = $rowData->name;

			$row[] = $this->commonmodel->getpobuttons(["print","delete"],$rowData->poId);
			$actionstring="";

			$row[] = $actionstring;
			$data[] = $row;
		}

		$output = array(
		"draw" => $_POST['draw'],
		"recordsTotal" => $this->poModel->count_all(),
		"recordsFiltered" => $this->poModel->count_filtered(),
		"data" => $data,
		);
		// print_r($output);
		//output to json format
		echo json_encode($output);
	}

	public function uploadProfilePic()
	{
		$data = $_POST['image'];

		list($type, $data) = explode(';', $data);
		list(, $data)      = explode(',', $data);

		$data = base64_decode($data);
		$imageName = $this->session->userdata("uid").".jpg";
		file_put_contents('profilePictures/'.$imageName, $data);

		$qdata["profilePicAt"]=date("Y-m-d h:i:a");
		$this->db->where("id",$this->session->userdata("uid"));
		$this->db->update("users",$qdata);

		echo 'done';
	}
	public function saveRemarks()
	{
		if ($this->input->post("remarks")!="")
		{
			$data["remarksContent"]=$this->input->post("remarks");
			$data["remarksAgendaId"]=$this->input->post("agendaId");
			$data["remarksUserId"]=$this->session->userdata("uid");

			$this->db->insert("agendaremarks",$data);
			$this->commonmodel->createAgendaHistory("Remarks added- ".$this->input->post("remarks"),$this->input->post("agendaId"));
			$responsedata["success"]=1;
			echo json_encode($responsedata,true);
		}
		else
		{
			$responsedata["success"]=0;
			echo json_encode($responsedata,true);
		}
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."login", 'refresh');
	}
	public function uploadAttachment()
	{
		$upload = 'err';
		
		if (!empty($_FILES['file_upload'])) {

			// File upload configuration
			$targetDir = "datafiles/";
			$allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif','ppt','pptx');

			$fileName = basename($_FILES['file_upload']['name']);
			$targetFilePath =$targetDir.$fileName;
			$newname=md5(date(MYSQLDATEFORMATE));
			//print_r($_FILES);
			// Check whether file type is valid
			
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$newname=$targetDir.$this->input->post("agendaid")."_".$newname.".".$fileType;
			if (in_array($fileType, $allowTypes)) {
				// Upload file to the server
				if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $newname)) {
					$upload = 'ok';
					
					$data2["attachementName"]=$fileName;
					$data2["attachementAgendaId"]=$this->input->post("agendaid");
					$data2["attachementCreatedAt"]=date(MYSQLDATEFORMATE);
					$data2["attachementUserId"]=$this->session->userdata("uid");
					$data2["attachementUrl"]=$newname;
					$this->db->insert("agendaattachment",$data2);
					
				}
				
			}
		}
		echo $upload;
	}
	public function UploadSign()
	{
		$upload = 'err';

		if (!empty($_FILES['signfile'])) {

			// File upload configuration
			$targetDir = "uploadedFiles/sign/";
			$allowTypes = array('jpg', 'jpeg');

			$fileName = basename($_FILES['signfile']['name']);
			$targetFilePath =$targetDir.$fileName;
			$newname=md5(date(MYSQLDATEFORMATE));
			//print_r($_FILES);
			// Check whether file type is valid

			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$newname=$targetDir.$this->session->userdata("uid").".jpg";
			if (in_array($fileType, $allowTypes)) {
				// Upload file to the server
				if (move_uploaded_file($_FILES['signfile']['tmp_name'], $newname)) {
					$upload = 'ok';
					$this->session->set_flashdata('flash_message' , "Sign uploaded successfully");
					redirect(base_url()."Admin/profileView", 'refresh');
				}

			}
			else
			{
				$this->session->set_flashdata('error_message' , "Upload only jpg file");
				redirect(base_url()."Admin/profileView", 'refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('error_message' , "select file");
			redirect(base_url()."Admin/profileView", 'refresh');
		}
		
	}
	
	function DepartmentEditView($departmentid)
	{
		$data["departmentid"]=$departmentid;
		$data["page"]="department";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/header');
		$this->load->view('navigation');
		$this->load->view('include/topbarmenus');
		$this->load->view('DepartmentEditView',$data);
		$this->load->view('include/footer');
	}
	
	function userProfileView($userid="")
	{
		$data["page"]="userProfileView";
		$data["userid"]=$userid;
	
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus');
		$this->load->view('userProfileView');
		$this->load->view('include/footer');
	}
	function poListView()
	{
		$data["page"]="poListView";
		
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus');
		$this->load->view('poListView');
		$this->load->view('include/footer');
	}
	
	function randText($len=10)
	{
		$str = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
		for ($i=0;$i<$len;$i++) {
			$txt.=substr($str, rand(0, strlen($str)), 1);
		}
		return $txt;
	}
	function updateUserPermission()
	{
		
		$my_int = $this->input->post("permissionVal")=='true' ? 1 : 0;
		
		$checkpermission=$this->db->get_where("tb_departmentaccess",array("accessUserId"=>$this->input->post("userid"),"accessDepartmentId"=>$this->input->post("permissionId")))->result_array();
		if (count($checkpermission)>0)
		{
			$data["accessIsPermitted"]=$my_int;
			
			$this->db->where("accessUserId",$this->input->post("userid"));
			$this->db->where("accessDepartmentId",$this->input->post("permissionId"));
			
			$this->db->update("tb_departmentaccess",$data);
			
		
		}
		else
		{
			$data["accessIsPermitted"]=$my_int;
			$data["accessUserId"]=$this->input->post("userid");
			$data["accessDepartmentId"]=$this->input->post("permissionId");
			
			$this->db->insert("tb_departmentaccess",$data);
			
		}
		$responsedata["success"]=1;
		$responsedata["message"]="user permission updated successfully";
		echo json_encode($responsedata,TRUE);
	}
	public function beneficiaryView()
	{
		$data["page"]="beneficiaryView";
		$this->load->view('include/header');
		$this->load->view('navigation',$data);
		$this->load->view('include/topbarmenus');
		$this->load->view('beneficiaryView');
		$this->load->view('include/footer');
	}
	function get_block_list($param1 = "")
	{
		$data["blockstateid"] = $param1;
		$this->db->order_by("blockname","ASC");
		$res = $this->db->get_where("tbblock",$data)->result_array();

		echo "<option value='' >Select</option>";

		foreach ($res as $row) {
			echo "<option value=".$row['blockid']." >".$row["blockname"]."</option>";
		}
	}
	
	function getFirmName()
	{
		$data=$this->db->query("select * from department where departmentId='".$this->session->userdata("department")."'")->result_array();

		return $data[0]["departmentName"];
	}
	function savePO()
	{
		$data["poIsUrgent"]=$this->input->post("urgent");
		$data["poTitle"]=$this->input->post("title");
		$data["poBank"]=$this->input->post("bank");
		$data["poBalance"]=$this->input->post("balance");
		$data["poDate"]=date("Y-m-d");
		$data["poFirmId"]=$this->session->userdata("department");
		$data["poCurrentStatus"]="accountant";
		$data["poCreatedBy"]=$this->session->userdata("uid");
		
		$this->db->insert("tb_paymentorder",$data);

		$poid=$this->db->insert_id();
		
		$data2["billPoId"]=$poid;
	
		$this->db->where("billDepartmentId",$this->session->userdata("department"));
		$this->db->where("billPaymentMethod",$this->input->post("title"));
		$this->db->where("billPoId",0);
		$this->db->update("tb_bills",$data2);
		
		$statusdata["statusUserid"]=$this->session->userdata("uid");
		$statusdata["statusPoId"]=$poid;
		$statusdata["status"]="accountant";
		
		$this->db->insert("tb_po_status",$statusdata);
		
		$this->commonmodel->createPoHistory($poid,0,$this->session->userdata("uid"),"Create PO");
		$responsedata["success"]=1;
		echo json_encode($responsedata,true);
	}
	function updatePO($poid="")
	{
		
		
		$data["poCurrentStatus"]=$this->input->post("status");
		if ($this->input->post("bank"))
		{
			$data["poBank"]=$this->input->post("bank");
		}
		if ($this->input->post("balance")) {
			$data["poBalance"]=$this->input->post("balance");
		}
		
		
		$this->db->where("poId",$poid);
		$this->db->update("tb_paymentorder",$data);
		/*
		$poid=$this->db->insert_id();

		$data2["billPoId"]=$poid;

		$this->db->where("billDepartmentId",$this->session->userdata("department"));
		$this->db->where("billPoId",0);
		$this->db->update("tb_bills",$data2);

		
		*/
		$statusdata["statusUserid"]=$this->session->userdata("uid");
		$statusdata["statusPoId"]=$poid;
		
		if ($this->input->post("status")=="done")
		{
			$statusdata["status"]="payer";
			
			$bildata["billIsPaymentDone"]=1;
			$this->db->where("billPoId",$poid);
			$this->db->update("tb_bills",$bildata);
			
		}
		else
		{
			$statusdata["status"]=$this->session->userdata("role");
		}

		$this->db->insert("tb_po_status",$statusdata);
		
		$this->commonmodel->createPoHistory($poid,0,$this->session->userdata("uid"),"Update Po Status to ".$this->input->post("status"));
		
		
		if ($this->input->post("remarks")!="") {
			$remarks["remarksPOId"]=$poid;
			$remarks["remarksContent"]=$this->input->post("remarks");
			
			$remarks["remarksBy"]=$this->session->userdata("uid");
			$this->db->insert("tb_remarks",$remarks);
		}
		
		$responsedata["success"]=1;
		echo json_encode($responsedata,true);
	}
	function getSign($userid="", $at="")
	{
		
		if (file_exists("uploadedFiles/profilePictures/".$userid.".jpg")) {
			return '<img class="avatar-img" src="'.base_url().'uploadedFiles/profilePictures/'.$userid.'.jpg?'.$at.'" alt="" />';

		} else {
			return '<img class="avatar-img" src="'.base_url().'assets/images/avatar/1.jpg" alt="" /> <span class="user-avatar">';

		}
	}
	function billPaymentIsDone()
	{
		$my_int = $this->input->post("billvalue")=='true' ? 1 : 0;

	
		$data["billIsPaymentDone"]=$my_int;

		
		$this->db->where("billId",$this->input->post("billid"));

		$this->db->update("tb_bills",$data);

		$responsedata["success"]=1;
		$responsedata["message"]="Bill updated successfully";
		
		$this->commonmodel->createPoHistory(0,$this->input->post("billid"),$this->session->userdata("uid"),"Update Bill Payment to ".$this->input->post("billvalue")=='true' ? "Done" : "No");
		
		echo json_encode($responsedata,TRUE);
	}
	function uploadBillAttachment($billid)
	{
		$upload = 'err';

		if (!empty($_FILES['file_upload'])) {

			// File upload configuration
			$targetDir = "datafiles/";
			$allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg', 'gif','ppt','pptx');

			$fileName = basename($_FILES['file_upload']['name']);
			$targetFilePath =$targetDir.$fileName;
			$newname=md5($billid);
			//print_r($_FILES);
			// Check whether file type is valid

			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			$newname=$targetDir.$newname.".".$fileType;
			if (in_array($fileType, $allowTypes)) {
				// Upload file to the server
				if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $newname)) {

					$data["billImageUrl"]=$newname;

					$this->db->where("billId",$billid);
					$this->db->update("tb_bills",$data);
					
					
					$upload = 'ok';

					$this->commonmodel->createPoHistory(0,$billid,$this->session->userdata("uid"),"Upload Attachment");

				}

			}
		}
		echo $upload;
	}
	function removeBillFromPo()
	{
		$billdata["billPoId"]=0;
		$this->db->where("billId",$this->input->post("billid"));
		$this->db->update("tb_bills",$billdata);
		$strval="Remove Bill from PO ".$this->input->post("poid")." due to ".$this->input->post("reason");
		$this->commonmodel->createPoHistory($this->input->post("poid"),$this->input->post("billid"),$this->session->userdata("uid"),$strval);
		$responsedata["success"]=1;
		$responsedata["message"]="Bill removed successfully";
		echo json_encode($responsedata,TRUE);
	}
	function deleteBill($billid="")
	{
		$data["billPoId"]=0;
		$data["billIsDeleted"]=1;
		$this->db->where("billId",$billid);
		$this->db->update("tb_bills",$data);
		$strval="Bill Deleted-".$this->input->post("reason")."<br>Remarks-".$this->input->post("remarks");
		$this->commonmodel->createPoHistory(0,$billid,$this->session->userdata("uid"),$strval);
		$responsedata["success"]=1;
		$responsedata["message"]="Bill removed successfully";
		echo json_encode($responsedata,TRUE);
	}
	
	function updateUserPassword($userid="")
	{
		$data["password"]=md5($this->input->post("password"));
		$this->db->where("id",$userid);
		$this->db->update("users",$data);
		$responsedata["success"]=1;
		$responsedata["message"]="password updated successfully";

		$this->commonmodel->createPoHistory(0,0,$this->session->userdata("uid"),"update password of user id ".$userid);

		echo json_encode($responsedata,TRUE);
	}
	function getbeneficiaryByid($id="")
	{
		$data=$this->db->get_where("tb_vendors",array("vendorId"=>$id))->result_array();
		if(count($data)>0)
		{
			echo "<table><tr>
			<td>Account no. </td><td><strong>".$data[0]["vendorAccountNo"]."<strong></td>
			</tr>
			<tr><td>IFSC Code. </td><td><strong>".$data[0]["vendorIFSCCode"]."<strong></td></tr>
			<tr><td>Branch. </td><td><strong>".$data[0]["vendorAddress"]."<strong></td></tr>
			</table>";
		}
	}
	function updateMyPassword()
	{
		$passdata=$this->db->get_where("users",array("id"=>$this->session->userdata("uid"),"password"=>md5($this->input->post("oldpassword"))))->result_array();
		if (count($passdata)>0)
		{
			if (md5($this->input->post("newpassword"))==md5($this->input->post("retypepassword")))
			{
				$data["password"]=md5($this->input->post("newpassword"));
				$this->db->where("id",$this->session->userdata("uid"));
				$this->db->update("users",$data);
				$responsedata["success"]=1;
				$responsedata["message"]="password updated successfully";

				

				echo json_encode($responsedata,TRUE);
			}
			else
			{
				$responsedata["success"]=0;
				$responsedata["message"]="New Password mis-matched";
				echo json_encode($responsedata,TRUE);
			}
		}
		else
		{
			$responsedata["success"]=0;
			$responsedata["message"]="Old password is in-correct";
			echo json_encode($responsedata,TRUE);
		}
		
	}
	
}
