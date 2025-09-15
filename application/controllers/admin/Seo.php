<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->session->set_userdata('top_menu', 'SEO');
		$this->session->set_userdata('sub_menu', 'SEO');
		
		$data['title']='SEO';

        $data['list']=$this->common_model->list_records(array('status'=>1),'seo','sort','ASC');
		
		$data['page']='admin/seo/seo';
		$this->load->view('admin/layout',$data);
    }

    public function update()
    {
        $id=$this->input->post('id');
        $title=$this->input->post('title');
        $description=$this->input->post('description');
        $keywords=$this->input->post('keywords');

        foreach($id as $key=>$row)
        {
            $data=array(
                'meta_title'=>$title[$key],
                'meta_description'=>$description[$key],
                'meta_keywords'=>$keywords[$key],
            );

            $this->common_model->update_records($data,array('id'=>$row),'seo');
        }
        
        $this->session->set_flashdata('msg', '<div class="alert alert-success text-left">Updated</div>');
        redirect('admin/Seo','refresh');
    }


}