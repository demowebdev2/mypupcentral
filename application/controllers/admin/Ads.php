<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();
     
        $this->load->model("ads_model");
    }


	
	public function index()
	{
		$this->session->set_userdata('top_menu', 'Ads');
		$this->session->set_userdata('sub_menu', 'Ads/list');
		
		$data['title']='Dashboard';
		
		$data['page']='admin/ads/list';
		$this->load->view('admin/layout',$data);
		
	}
	public function fetch_ads()
	{
		$fetch_data = $this->ads_model->list_records();
		$data = array();
		
         $count=1;

		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = '<center>' . wordwrap($row->title, 15, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap($row->puppy_name, 35, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap($row->puppy_age, 35, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap("$".$row->asking_price, 35, "<br>\n") . '</center>';
		if($row->featured_image)
			{
			    ($row->featured_image_from =='puppyverify.com')? $url=PV :$url=NS ;    
		$sub_array[] = '<center><img height="100px" width="100px" src="'.$url.'uploads/puppies/'.$row->featured_image.'"></center>';
		}
		else
		{
			$sub_array[] = '<center><img height="100px" width="100px" src="'.base_url('uploads/breeds/no_image.png').'"></center>';
		}
        if ($row->reviewed  === '1') {		
		
		$sub_array[] = '<center><input type="button" value="Active" style ="background-color: green;color: white;"class="tgl_checkbox" data-id="'.$row->id.'" data-status="'.$row->reviewed.'" id="tgl_checkbox_'.$row->id.'" /></center>';
		}
		else{
			$sub_array[] = '<center><input type="button" value="Inactive" style ="background-color: red;color: white;"class="tgl_checkbox" data-id="'.$row->id.'"data-status="'.$row->reviewed.'" id="tgl_checkbox_'.$row->id.'"/></center>';
		}

			$sub_array[] = '<center>
			
			<a class="btn btn-default btn-xs" title="View Details" href="' . base_url() . 'admin/ads/view/' . $row->id . '" ><i class="fas fa-eye m-1"></i></a>';
			


			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),			
			"recordsTotal"          =>   	$this->db->from("posts")->count_all_results(),
			 "recordsFiltered"    	=>    $this->ads_model->list_records_filtered(),
			"data"                  =>     	$data
		);
		echo json_encode($output);
	}
	public function view($id="")
	{
		$this->session->set_userdata('top_menu', 'Ads');
		$this->session->set_userdata('sub_menu', 'Ads/View');
		
		$data['title']='Posts';
		$data['post'] = $this->ads_model->get($id);
		$data['registration'] = $this->common_model->get([''],'registration');		
		

		$data['pictures'] = $this->ads_model->get_details(['post_id'=>$id],'posts_pictures');
		$data['videos'] = $this->ads_model->get_details(['post_id'=>$id],'posts_videos');
		
	

		$data['page']='admin/ads/view';
		$this->load->view('admin/layout',$data);

	}
	function change_status()
	{   	
		$id = $this->input->post('id');	
		$this->common_model->change_status(['id'=>$id],'reviewed','posts');
	}
	public function pending()
	{
		$this->session->set_userdata('top_menu', 'Ads');
		$this->session->set_userdata('sub_menu', 'Ads/pending');
		
		$data['title']='Dashboard';
		
		$data['page']='admin/ads/pending';
		$this->load->view('admin/layout',$data);
	}
public function fetch_pending()
	{
		$fetch_data = $this->ads_model->list_pending_requests();
		$data = array();
		
         $count=1;

		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = '<center>' . wordwrap($row->id, 10, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap($row->title, 15, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap($row->contact_name, 35, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap($row->phone, 35, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap("$".$row->asking_price, 35, "<br>\n") . '</center>';
		if($row->featured_image)
			{
			($row->featured_image_from =='puppyverify.com')? $url=PV :$url=NS ;    
			$sub_array[] = '<center><img height="100px" width="100px" src="'.base_url('uploads/puppies/').$row->featured_image.'"></center>';
		}
		else
		{
			$sub_array[] = '<center><img height="100px" width="100px" src="'.base_url('uploads/breeds/no_image.png').'"></center>';
		}
		if ($row->reviewed  === '1') {		
		
		$sub_array[] = '<center><input type="button" value="Active" style ="background-color: green;color: white;"class="tgl_checkbox" data-id="'.$row->id.'" data-status="'.$row->reviewed.'" id="tgl_checkbox_'.$row->id.'" /></center>';
		}
		else{
			$sub_array[] = '<center><input type="button" value="Inactive" style ="background-color: red;color: white;"class="tgl_checkbox" data-id="'.$row->id.'"data-status="'.$row->reviewed.'" id="tgl_checkbox_'.$row->id.'"/></center>';
		}

			$sub_array[] = '<center>
			
			<a class="btn btn-default btn-xs" title="View Details" href="' . base_url() . 'admin/ads/view/' . $row->id . '" ><i class="fas fa-eye m-1"></i></a>';
			

			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),			
			"recordsTotal"          =>   	$this->db->from("posts")->count_all_results(),
			 "recordsFiltered"    	=>   	$this->ads_model->list_pending_requests_filtered(),
			"data"                  =>     	$data
		);
		echo json_encode($output);
}


public function update_alt_tag()
{
	$id=$this->input->post('id');
	$data=array(
		'alt_tag'=>$this->input->post('alt_tag')
	);
	if($this->common_model->update_records($data,array('id'=>$id),'posts_pictures'))
	{
		$resp=array('status'=>'success');
	}
	else{
		$resp=array('status'=>'error');
	}

	echo json_encode($resp);
}

public function update_seo()
{
	$id=$this->input->post('id');
	$data=array(
		'meta_title'=>$this->input->post('title'),
		'meta_description'=>$this->input->post('decription'),
		'meta_keywords'=>$this->input->post('keywords')
	);
	if($this->common_model->update_records($data,array('id'=>$id),'posts'))
	{
		$resp=array('status'=>'success','msg'=>'Success');
	}
	else{
		$resp=array('status'=>'error','msg'=>'Error');
	}

	echo json_encode($resp);
}

public function update_alt_featured()
{
	$id=$this->input->post('id');
	$data=array(
		'featured_alt_tag'=>$this->input->post('featured_alt_tag')
	);
	if($this->common_model->update_records($data,array('id'=>$id),'posts'))
	{
		$resp=array('status'=>'success');
	}
	else{
		$resp=array('status'=>'error');
	}

	echo json_encode($resp);
}
public function update_alt_father()
{
	$id=$this->input->post('id');
	$data=array(
		'father_photo_alt'=>$this->input->post('father_photo_alt')
	);
	if($this->common_model->update_records($data,array('id'=>$id),'posts'))
	{
		$resp=array('status'=>'success');
	}
	else{
		$resp=array('status'=>'error');
	}

	echo json_encode($resp);
}
public function update_alt_mother()
{
$id=$this->input->post('id');
	$data=array(
		'mother_photo_alt'=>$this->input->post('mother_photo_alt')
	);
	if($this->common_model->update_records($data,array('id'=>$id),'posts'))
	{
		$resp=array('status'=>'success');
	}
	else{
		$resp=array('status'=>'error');
	}

	echo json_encode($resp);
}

}
