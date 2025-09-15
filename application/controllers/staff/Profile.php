<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Staff_Controller {


	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();
     
        $this->load->model("dashboard_model","dashboard");
      //  $this->load->model("common_model");
    }

function index()
	{
		$this->session->set_userdata('top_menu', 'Settings');
		$this->session->set_userdata('sub_menu', 'Settings/profile');

		$data['title']='My Profile';

		
		$data['user']=$this->common_model->list_row('staff',array('id'=>$_SESSION['sitestaff']['id']));

		$data['page']='staff/profile';
		$this->load->view('staff/layout',$data);
			

	}

	public function change_password()
	{
		$this->session->set_userdata('nav', 'change_password');
			$this->form_validation->set_rules('password', $this->lang->line('current_password'), 'trim|required|xss_clean');
			$this->form_validation->set_rules('newpassword', $this->lang->line('new_password'), 'trim|required|xss_clean|matches[cnewpassword]');
			$this->form_validation->set_rules('cnewpassword', $this->lang->line('confirm_password'), 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {

				
				redirect('staff/Profile?nav=change_password');
			} else {
				$sessionData = $this->session->userdata('sitestaff');
				$userdata = $this->customlib->getUserData2();
				$data_array = array(
					'current_pass' => $this->input->post('password'),
					'new_pass' => md5($this->input->post('newpassword')),
					'user_id' => $sessionData['id'],
					'user_email' => $sessionData['email'],
					'user_name' => $sessionData['username']
				);
				$newdata = array(
					'id' => $sessionData['id'],
					'password' => $this->enc_lib->passHashEnc($this->input->post('newpassword'))
				);
				$check = $this->enc_lib->passHashDyc($this->input->post('password'), $userdata["password"]);
	
				$query1 = $this->admin_model->checkOldPass($data_array);
	
				if ($query1) {
	
					if ($check) {
						$query2 = $this->admin_model->saveNewPass($newdata);
						if ($query2) {
							
							$this->session->set_flashdata('msg', '<div class="alert alert-success">Success</div>');

						}
					} else {
						
						$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Current Password</div>');

					}
				} else {
	
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Current Password</div>');

				}
				
				redirect('staff/Profile?nav=change_password');
			}
		
	}

}