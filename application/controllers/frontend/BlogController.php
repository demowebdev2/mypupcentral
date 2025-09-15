<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogController extends My_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('blogs_model');
		//$this->load->library('Auth');
		//$this->load->library('session'); 
        $this->load->helper('url'); 
       // $this->load->model('user_model');
	}
	// public function index()
	// {
	// 	$data['title'] = 'NoShedDoodles Home';

	// 	$data['page'] = 'front/index';
	// 	$this->load->view('front/layout', $data);
	// }

	public function show($id)
	{
		$data['title'] = 'My Pup Central- Blog';
	  // $this->session->set_userdata('top_menu', 'Blog');

		
		$data['page'] = 'front/blogs/show';
		$data['category'] = $this->common_model->list_records('','p_category','','');
		$data['blogs'] = $this->common_model->list_records('','blogs','','');
		$data['blog'] = $this->blogs_model->get($id);
		$data['photo'] = $this->blogs_model->getpic($id);
// 		var_dump($data['photo']);exit;
		//$data['contact'] = $this->ads_model->getcontact();
		$data['title'] = $data['blog'][0]->meta_title;
    		$data['description'] = $data['blog'][0]->meta_description;
    		$data['keyword'] = $data['blog'][0]->meta_keywords;
// 		$data['title'] = 	$data['blog'][0]->title.' | Blog | MyPupCentral';
		
		$this->load->view('front/layout', $data);
	}	
  

	
}
