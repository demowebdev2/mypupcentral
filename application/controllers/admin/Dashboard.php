<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
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
// 		$data['payements'] = $this->dashboard->get_payments();
		$data['latest_ads'] = $this->dashboard->get_latets_ads();
// 		$data['latest_bookings'] = $this->dashboard->get_latets_bookings();
		$data['latest_breeder_req'] = $this->dashboard->get_latest_breeder_req();

		$data['page']='admin/dashboard';
		$this->load->view('admin/layout',$data);
		
	}
	
	public function training_request()
	{
		$this->session->set_userdata('top_menu', 'Training');
		$this->session->set_userdata('sub_menu', 'Training');
		
		$data['title']='Training Request';

		$data['req']=$this->common_model->list_records(array('txn_status'=>1),'training_request','created_at','DESC');

		$data['page']='admin/training_request';
		$this->load->view('admin/layout',$data);
		
	}
	
	public function reviews()
	{
		$this->session->set_userdata('top_menu', 'Reviews');
		$this->session->set_userdata('sub_menu', 'Reviews');
		
		$data['title']='Reviews';

	

		$data['page']='admin/reviews';
		$this->load->view('admin/layout',$data);
		
	}
	
	public function fetch_reviews()
	{
		$fetch_data = $this->common_model->list_records_review();
		$data = array();
		
         $count=1;

		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			if($row->user_account_id==0)
			{
			    	$sub_array[] = '<center>Direct</center>';
			}
			else{
			   $brder= $this->common_model->list_records(array('id'=>$row->user_account_id),'user_accounts','created_at','DESC');
			    	$sub_array[] = '<center>' . wordwrap($brder[0]->name, 15, "<br>\n") . '</center>';
			}
			$sub_array[] = '<center>' . wordwrap($row->fullname, 15, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap($row->email, 5, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap($row->message, 150, "<br>\n") . '</center>';
			$sub_array[] = '<center>' . wordwrap($row->state, 15, "<br>\n") . '</center>';
			
			if($row->img!='' && $row->img!=0)
			{
			    $sub_array[] = '<center><img src="'.base_url().'uploads/'.$row->img.'" style="height:100px; width:auto" ></center>';
			}
			else{
			    	$sub_array[] = '<center>N/A</center>';
			}
			
				
					$sub_array[] = '<center>' . wordwrap(date('m/d/Y',strtotime($row->created_at)), 15, "<br>\n") . '</center>';
	
      

			$sub_array[] = '<center>
			
			<a class="btn btn-warning btn-xs m-2" title="Edit" href="' . base_url() . 'admin/Dashboard/edit_review/' . $row->id . '" ><i class="fas fa-edit m-1"></i> Edit </a>
				<a class="btn btn-danger btn-xs  m-2" title="Delete" onClick="delete_recordById(\'' . base_url() . 'admin/Dashboard/delete_review/' . $row->id . '\', \'Delete\')" ><i class="fas fa-trash m-1"></i> Delete </a>
			';
			


			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),			
			"recordsTotal"          =>   	$this->db->from("breeder_review")->count_all_results(),
			 "recordsFiltered"    	=>    $this->common_model->list_records_filtered(),
			"data"                  =>     	$data
		);
		echo json_encode($output);
	}
	
	public function delete_review($id)
	{
	
			
				$where = array('id' => $id);
				$this->common_model->delete('breeder_review', $where);
			
		  $resp=array('status'=>'success','msg'=>'updated');
            echo json_encode($resp);
		
	}
	
	public function edit_review($id)
	{
	    	$this->session->set_userdata('top_menu', 'Reviews');
		$this->session->set_userdata('sub_menu', 'Reviews/Edit');		
		$data['title']='Reviews Edit';
		$data['review'] = $this->db->where(['id'=>$id])->get("breeder_review")->result();			
	
		$data['page'] = 'admin/edit_review';
		$this->load->view('admin/layout',$data);
	}
	
	public function edit_save_review()
	{
	    
			
	      $data=array('user_account_id'=>0,
            'rating'=>$this->input->post('rating'),
            'message'=>$this->input->post('message'),
            'fullname'=>$this->input->post('name'),
            'state'=>$this->input->post('state'),
            'email'=>$this->input->post('email'),
        );
        
         if(!empty($_FILES['img']['name']))
			{
			$path="uploads/";
			$kennel_images=$this->upload_files($path, 'review', $_FILES['img']);	
			$kennel_images=$kennel_images;	
			 $array2=array('img'=>$kennel_images);
			$data=array_merge($data, $array2);
			}	
			else
			{
				$kennel_images='';
			}
			
            //print_r($data);die();
            $this->common_model->update_records($data,array('id'=>$this->input->post('id')),'breeder_review');
            
            $resp=array('status'=>'success','msg'=>'updated');
            echo json_encode($resp);
	}
}
