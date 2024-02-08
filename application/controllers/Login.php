<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

/**
* Index Page for this controller.
*
* Maps to the following URL
* 		http://example.com/index.php/welcome
*	- or -
* 		http://example.com/index.php/welcome/index
*	- or -
* Since this controller is set as the default controller in
* config/routes.php, it's displayed at http://example.com/
*
* So any other public methods not prefixed with an underscore will
* map to /index.php/welcome/<method_name>
* @see https://codeigniter.com/userguide3/general/urls.html
*/
	public function index()
	{
		$email=str_replace(' ','',$this->input->post("email")); 
		if ($email)
		{
			if (!$email) {
				$this->session->set_flashdata('error_message',"wrong email entered");
				redirect(base_url()."login", 'refresh');
			}
			
			$userdata=$this->db->query("select * from users where email=? and password=?", array($email, md5($this->input->post("password"))))->result_array();
			
			if (count($userdata)>0) {

				
				
				$this->session->set_userdata(array("uid"=>$userdata[0]["id"],"role"=>$userdata[0]["loginaccess"],"name"=>$userdata[0]["name"],"email"=>$userdata[0]["email"],"department"=>$userdata[0]["department"]));
				
				redirect(base_url()."admin",'refresh');
				
			} else {
				
				$this->session->set_flashdata('error_message',"email or password incorrect");
				redirect(base_url()."login", 'refresh');
				
			}
		}
		$this->load->view('login');
	}
}
