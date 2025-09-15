<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Staff_Controller {


	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();
     
        $this->load->model("dashboard_model","dashboard");
      //  $this->load->model("common_model");
    }
	public function index()
	{
		$this->session->set_userdata('top_menu', 'Dashboard');
		$this->session->set_userdata('sub_menu', 'Dashboard');
        $data['title']='Dashboard';
		$data['page']='staff/dashboard';
		$this->load->view('staff/layout',$data);
		
	}
}
