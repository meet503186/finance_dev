<?php

class Common_model extends CI_Model
{
	
	var $POStatusOrder=array();
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
		
	}
	function getDistrictList()
	{
		$dist=array();
		if ($this->session->userdata("role")!="Superadmin")
		{
			$dist=$this->db->query("select district.* from assigneddistrict join district on assignedDistrictId=districtId  where assignedUserId='".$this->session->userdata("uid")."' order by districtName asc")->result_array();
		}
		else
		{
			$dist=$this->db->query("select * from district order by districtName asc")->result_array();
		}
	
		//secho $this->db->last_query()."<br>";
		//print_r($dist);
		return $dist;
	}
	
	function getMeetingList()
	{
		$dist=array();
		if ($this->session->userdata("role")!="Superadmin") {
			$dist=$this->db->query("select meeting.* from meeting where meetingId in (select meetId from meetingdistrict where meetingStatus='opened' meetingDistrictId in (select assignedDistrictId from assigneddistrict where assignedUserId='".$this->session->userdata("uid")."') )")->result_array();
		} else {
			
			$dist=$this->db->query("select * from meeting where meetingStatus='opened' order by meetingId DESC ")->result_array();
		}

		//secho $this->db->last_query()."<br>";
		//print_r($dist);
		return $dist;
	}
	function getAgendaDetail($agendacode="")
	{
		$data=$this->db->query("select * from tasks join meeting on taskMeetingId=meetingId join users on taskByID=id join department on taskDepartment=departmentId where taskCode='".$agendacode."'")->result_array();
	//	echo $this->db->last_query();
		return $data;
	}
	function createAgendaHistory($content="",$agendaid="")
	{
		$data["historyContent"]=$content;
		$data["historyUserId"]=$this->session->userdata("uid");
		$data["historyAgendaId"]=$agendaid;
		$this->db->insert("agendahistory",$data);
	}
	function timeAgo($date)
	{
		$last = new DateTime($date);
		$now = new DateTime( date( 'Y-m-d h:i:s', time() )) ;

		// Find difference
		$interval = $last->diff($now);

		// Store in variable to be used for calculation etc
		$years = (int)$interval->format('%Y');
		$months = (int)$interval->format('%m');
		$days = (int)$interval->format('%d');
		$hours = (int)$interval->format('%H');
		$minutes = (int)$interval->format('%i');

		//   $now = date('Y-m-d H:i:s');


		if ($years > 0) {
			echo $years.' Years '.$months.' Months '.$days.' Days '. $hours.' Hours '.$minutes.' minutes ago.' ;
		} else if ($months > 0) {
			echo $months.' Months '.$days.' Days '. $hours.' Hours '.$minutes.' minutes ago.' ;
		} else if ($days > 0) {
			if ($days==1)
			{
				echo 'Yesterday At '.date("h:i:a",strtotime($date)) ;
			}
			else
			{
				echo $days.' Days '.$hours.' Hours '.$minutes.' minutes ago.' ;
			}
			
		} else if ($hours > 0) {
			echo  $hours.' Hrs ago.' ;
		} else {
			echo $minutes.' minutes ago.' ;
		}
	}
	function getLoggedInUser()
	{
		$userdata=$this->db->query("select * from users where id=?", array($this->session->userdata("uid")))->result_array();
		return $userdata[0];
	}
	function getColoredStatus($status="")
	{
		if ($status=="Queue") {
			return '<span class="badge badge-primary">'.$status.'</span>';
		}
		if ($status=="Inprogress") {
			return $status;
		}
		if ($status=="Cancelled") {

			return '<span class="badge badge-danger">'.$status.'</span>';
		}
		if ($status=="Completed") {
			return '<span class="badge badge-success">'.$status.'</span>';
		}
	}
	function getAgendaButton($buttons=[],$agendacode)
	{
		$button="";
		foreach ($buttons as $data)
		{
			if ($data=="view")
			{
				$button.='<a href="'.base_url().'Admin/agendaDetailView/'.$agendacode.'" ><i style="margin:2px;" class="ti-eye btn btn-pink btn-flat"></i></a>';
			}
			if ($data=="edit") {
				$button.='<a href="'.base_url().'Admin/agendaEditView/'.$agendacode.'" ><i style="margin:2px;" class="ti-pencil btn btn-warning  btn-flat"></i></a>';
			}
			if ($data=="delete") {
				$button.='<i style="margin:2px;" class="ti-trash btn btn-danger  btn-flat"></i>';
			}
		}
		return $button;;
	}
	function getMeetingButton($buttons=[], $id)
	{
		$button="";
		foreach ($buttons as $data) {
			if ($data=="view") {
				$button.='<a href="'.base_url().'Admin/agendaDetailView/'.$id.'" ><i style="margin:2px;" class="ti-eye btn btn-pink btn-flat"></i></a>';
			}
			if ($data=="edit") {
				$button.='<a href="'.base_url().'Admin/MeetingEditView/'.$id.'" ><i style="margin:2px;" class="ti-pencil btn btn-warning  btn-flat"></i></a>';
			}
			if ($data=="delete") {
				$button.='<i style="margin:2px;" class="ti-trash btn btn-danger  btn-flat"></i>';
			}
		}
		return $button;;
	}
	
	function getBeneficiaryButton($buttons=[], $id)
	{
		$button="";
		foreach ($buttons as $data) {
			if ($data=="view") {
				$button.='<a href="'.base_url().'Admin/agendaDetailView/'.$id.'" ><i style="margin:2px;" class="ti-eye btn btn-pink btn-flat"></i></a>';
			}
			if ($data=="edit") {
				$button.='<a onclick=showAjaxModal("'.base_url().'Modal/popup/beneficiaryEditModal/'.$id.'");>
			<i style="margin:2px;" class="ti-pencil btn btn-warning  btn-flat"></i></a>';
			}
			if ($data=="delete") {
				$button.='<i style="margin:2px;" class="ti-trash btn btn-danger  btn-flat"></i>';
			}
		}
		return $button;;
	}
	
	function getBillButton($buttons=[], $id="",$isPaymentDone="",$poid="")
	{
		$button="";
		foreach ($buttons as $data) {
			if ($data=="view") {
				if($this->session->userdata("role")=="accountant")
				{
					$button.='<a href="'.base_url().'Admin/billViewModal/'.$id.'" ><i style="margin:2px;" class="ti-eye btn btn-pink btn-flat"></i></a>';
				}
				
			}
			if ($data=="edit") {
				if ($this->session->userdata("role")=="accountant") {
					$button.='<a href="'.base_url().'Admin/billEditView/'.$id.'" ><i style="margin:2px;" class="ti-pencil btn btn-warning  btn-flat"></i></a>';
				}
			}
			if ($data=="delete") {
				if ($isPaymentDone==0&&$poid==0)
				{
					if ($this->session->userdata("role")=="accountant") {

						$button.='<a onclick=showAjaxModal("'.base_url().'Modal/popup/billDeleteModal/'.$id.'");>
			<i style="margin:2px;" class="ti-trash btn btn-danger  btn-flat"></i></a>';
					}
				}
				
			}
		}
		return $button;
	}
	function getpobuttons($buttons=[], $id,$text="")
	{
		$button="";
		
		foreach ($buttons as $data) {
			
			if ($data=="view") {
				$button.='<a href="'.base_url().'Admin/agendaDetailView/'.$id.'" ><i style="margin:2px;" class="ti-eye btn btn-pink btn-flat"></i></a>';
			}
			if ($data=="edit") {
				
					$button.='<a onclick=showAjaxModal("'.base_url().'Modal/popup/poEditModal/'.$id.'");>
			<i style="margin:2px;" class="ti-pencil btn btn-warning  btn-flat"></i></a>';
				
			}
			if ($data=="print") {
				$button.='<a href="'.base_url().'Admin/printPoView/'.$id.'" ><i style="margin:2px;" class="ti-eye btn btn-success  btn-flat"></i></a>';
			}
			if ($data=="delete") {
				if ($this->session->userdata("role")=="accousdfntant") {
					$button.='<i style="margin:2px;" class="ti-trash btn btn-danger  btn-flat"></i>';
				}
			}
			if ($data=="link") {
				$button.='<a href="'.base_url().'Admin/printPoView/'.$id.'" >'.$text.'</a>';
			}
		}
		return $button;;
	}
	
	function getUserButton($buttons=[], $userid)
	{
		$button="";
		foreach ($buttons as $data) {
			if ($data=="password") {
				$button.='<a onclick=showAjaxModal("'.base_url().'Modal/popup/passwardUpdateUserModal/'.$userid.'");>
			<i style="margin:2px;" class="ti-lock btn btn-primary  btn-flat"></i></a>';
			}
			if ($data=="view") {
				$button.='<a href="'.base_url().'Admin/userProfileView/'.$userid.'" ><i style="margin:2px;" class="ti-eye btn btn-pink btn-flat"></i></a>';
			}
			if ($data=="edit") {
				$button.='<a onclick=showAjaxModal("'.base_url().'Modal/popup/userEditModal/'.$userid.'");>
			<i style="margin:2px;" class="ti-pencil btn btn-warning  btn-flat"></i></a>';
			}
			if ($data=="delete") {
				$button.='<i style="margin:2px;" class="ti-trash btn btn-danger  btn-flat"></i>';
			}
		}
		return $button;;
	}
	function getDepartmentButton($buttons=[], $departmentid)
	{
		$button="";
		if ($departmentid!=1)
		{
			foreach ($buttons as $data) {

				if ($data=="edit") {
					$button.='<a href="'.base_url().'Admin/DepartmentEditView/'.$departmentid.'" ><i style="margin:2px;" class="ti-pencil btn btn-warning  btn-flat"></i>';
				}
				if ($data=="delete") {
					$button.='<i style="margin:2px;" class="ti-trash btn btn-danger  btn-flat"></i>';
				}
			}
			return $button;;
		}
		else
		{
			return $button;
		}
		
	}
	function getAccountType()
	{
		$deparray=$this->db->query("select * from tb_roles where roleIsAccount=1")->result_array();
		
		return $deparray;
	}
	function getPoAmount($poid,$urgent)
	{
		$returnData="";
		if ($urgent=="Yes")
		{
			$returnData="<br><span class='badge badge-danger'>Urgent Payment</div>";
		}
		
		$data=$this->db->query("select sum(billPaidAmount) as totalAmt from tb_bills where billPoId='".$poid."'")->result_array();
		if (count($data)>0)
		{
			return $this->IndianPaymentFormat($data[0]["totalAmt"]).$returnData;
		}
		else
		{
			return "".$returnData;
		}
		
	}
	function getPOStatusTitle($key)
	{
		if ($key!="")
		{
			$data=$this->db->query("select * from tb_roles where roleKey='".$key."'")->result_array();
			if (count($data)>0)
			{
				return $data[0]["roleTitle"];
			}
			else
			{
				return "";
			}
			
		}
		else
			
		{
			return "";
		}
	
	}
	function getPOSign($poid, $status)
	{
		$data=$this->db->query("select * from tb_po_status where statusPoId='".$poid."' and status='".$status."'")->result_array();
		if (count($data)>0) {
			$userData=$data[0];
			if (file_exists("uploadedFiles/sign/".$userData["statusUserid"].".jpg")) {
				return '<img style="width:100px;" src="'.base_url().'uploadedFiles/sign/'.$userData["statusUserid"].'.jpg?'.$at.'" alt="" />';
			} else {
				return 'Sign not Available';
			}
		}
	}
	function getPOpassTime($poid, $status)
	{
		$data=$this->db->query("select * from tb_po_status where statusPoId='".$poid."' and status='".$status."'")->result_array();
		if (count($data)>0) {
			$userData=$data[0];
			return date(CUSTOME_DATETIME,strtotime($userData["statusDate"]));
		}
	}
	function getRolePosition($role="")
	{
		if ($role=="superadmin"||$role=="Admin")
		{
			$role="Admin";
		}
		$POStatusOrder=array("Accountant","Approval1","Approval2","Approval3","Admin","Done");
		$status=array_search($role, $POStatusOrder);
		
		return $status;
	}
	function uploadAttachmantButton($billid,$url)
	{
		
		$button.='<a onclick=showAjaxModal("'.base_url().'Modal/popup/billAttachmentUploadModal/'.$billid.'");>
			<i style="margin:2px;" class="ti-upload btn btn-primary  btn-flat"></i></a>';
			if (file_exists($url)) {
				$button.='<a href="'.base_url().$url.'" download><i style="margin:2px;" class="ti-eye btn btn-dark  btn-flat"></i></a>';
			}
			
		return $button;;
	}
	
	
	function createPoHistory($poid="",$billId="",$userid="",$content="")
	{
		$data["historyPoId"]=$poid;
		$data["historyBillId"]=$billId;
		$data["historyUserId"]=$userid;
		$data["historyContent"]=$content;

		$this->db->insert("tb_history",$data);
	}
	function IndianPaymentFormat($amount)
	{
		if ($amount>0)
		{
			$fmt = new \NumberFormatter($locale = 'en_IN', NumberFormatter::DECIMAL);
			return $fmt->format($amount);
		}
	
	}
	function getPartyDetail($vid)
	{
		$party=$this->db->get_where("tb_vendors",array("vendorId"=>$vid))->result_array();
		if (count($party)>0)
		{
			return $party[0];
		}
		else
		{
			return "";// test
		}
		
	}
	function billPOPup($billId,$text,$param3)
	{
		return '<a href="javascript:;" onclick=showAjaxModal("'.base_url().'Modal/popup/fileViewModal/'.$billId.'/'.$param3.'");>'.$text.'</a>';
	}
}
?>