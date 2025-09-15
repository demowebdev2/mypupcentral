<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends Admin_Controller {

	
	public function index()
	{
		$this->session->set_userdata('top_menu', 'Payments');
		$this->session->set_userdata('sub_menu', 'Payments');
		
		$data['title']='Payments';
		
		$data['page']='admin/payments/list';
		$this->load->view('admin/layout',$data);
		
	}
}
