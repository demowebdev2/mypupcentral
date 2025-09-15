<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class Blogs extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();     
        $this->load->model("blogs_model");
        $this->load->model("common_model");
		$this->load->library('form_validation');
		//$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
    }


	
	public function index()
	{
		$this->session->set_userdata('top_menu', 'blogs');
		$this->session->set_userdata('sub_menu', 'blogs/list');
		
		$data['title']='Dashboard';		
		$data['page']='admin/blogs/list';
		$this->load->view('admin/layout',$data);
		
	}
		public function fetch()
	{

		$fetch_data = $this->blogs_model->list_records();		
		$data = array();
		$count=1;
      //var_dump($fetch_data);exit;
		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = wordwrap($row->title, 35, "<br>\n");
			$sub_array[] = wordwrap($row->author, 35, "<br>\n");
			$sub_array[] = wordwrap($row->category, 35, "<br>\n");
			$sub_array[] = wordwrap($row->short_description, 35, "<br>\n");
		
			$date = new DateTime($row->created_at);
		    $date =  $date->format('m-d-Y');
			$sub_array[] = wordwrap($date, 35, "<br>\n");		
			$sub_array[] = '<a href="'.base_url().'admin/blogs/edit/'.$row->id.'"><button class="mb-2 btn btn-warning btn-sm">Edit</button></a>
			<button id="'.$row->id.'" class="mb-2 btn btn-danger btn-sm delete_blog">Delete</button>';
		
			

			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),			
			"recordsTotal"          =>   	$this->db->from("blogs")->count_all_results(),
			 "recordsFiltered"    	=>   	count($fetch_data),
			"data"                  =>     	$data
		);
		echo json_encode($output);
		exit;
	}
	public function add()
	{
		$this->session->set_userdata('top_menu', 'blogs');
		$this->session->set_userdata('sub_menu', 'blogs/add');		
		$data['title']='blogs';		
		$data['category']=$this->common_model->list_records('','p_category','','');
		$data['page']='admin/blogs/add';
		$this->load->view('admin/layout',$data);
	}
	public function save()
	{

	   if (!$this->input->is_ajax_request()) {
  		 $json =array(
			 		'status' =>'error',
					 'msg'   =>'No direct script access allowed'
			 	); 
			 echo json_encode($json);
			 exit;
		}
		else
		{
			$this->form_validation->set_rules('title', 'Blog Title', 'trim|required|xss_clean');
           
            if ($this->form_validation->run() == FALSE ) {			
				$json =array(
					'status' =>'error',
					'msg'   =>'Required feilds are missing'
				); 
				echo json_encode($json);
				exit;
			} 
			else {
				$data_insert =array();

				// image upload
				// $files = $_FILES;     		
				// $config['upload_path']          = 'uploads/blogs/';		
    //             $config['allowed_types']        = 'gif|jpg|png';
    //             $config['max_size']             = 0;
			 //   if($_FILES['image1']['name'])
			 //   {	    	    	
			 //   $_FILES['image']['name']= $files['image1']['name'];
    //   			$_FILES['image']['type']= $files['image1']['type'];
    //   			$_FILES['image']['tmp_name']= $files['image1']['tmp_name'];
    //   			$_FILES['image']['error']= $files['image1']['error'];
    //   			$_FILES['image']['size']= $files['image1']['size']; 
       		
    //             $this->load->library('upload', $config);
    //             $this->upload->initialize($config);

				//  if ( ! $this->upload->do_upload('image1'))
    //             {
    //                 $error = array('error' => $this->upload->display_errors());
    //                 $json =array(
			 //		'status' =>'error',
				// 	'msg' =>$error,
			 //		);
    //             echo json_encode($json);
			 //	exit;                      
    //             }
               
    //   			$data_insert['image'] = $this->upload->data()['file_name'];   
       			  		
    //   	    	}


			$data_insert['title'] = $this->input->post('title');    				
			$data_insert['description'] = $this->input->post('description');
			$data_insert['short_description'] = $this->input->post('s_description');  				
			$data_insert['category_id'] = $this->input->post('category');  				
			$data_insert['author'] = $this->input->post('author');  
			$data_insert['Website'] = 'pv';  		
			$data_insert['meta_title'] = $this->input->post('meta_title');  
			$data_insert['meta_description'] = $this->input->post('meta_description');  
			$data_insert['meta_keyword'] = $this->input->post('meta_keyword');  
				
			$insert = $this->common_model->create_record($data_insert,'blogs');			
			 if($insert)
			 {
			 	$json =array(
			 		'status' =>'success',
			 		'msg' =>'Blog added successfully',
			 	);
			 }
			 else
			 {
			 	$json =array(
			 		 'status' =>'error',
					 'msg' =>'Blog saving failed',
			 	);
			 }
			 echo json_encode($json);
			 exit;
			}  //form validation true
		} // if ajax req

   }

   public function delete()
   {

	if($this->common_model->delete('blogs', array('id'=>$this->input->post('id'))))
	{
		$resp=array('status'=>'success','msg'=>'');
	}
	else{
		$resp=array('status'=>'error','msg'=>'');
	}

	echo json_encode($resp);

   }

   public function edit($id)
   {
	$this->session->set_userdata('top_menu', 'blogs');
	$this->session->set_userdata('sub_menu', 'blogs/add');		
	$data['title']='blogs';		
	$data['category']=$this->common_model->list_records('','p_category','','');
	$data['blog']=$this->common_model->list_row('blogs',array('id'=>$id));
	// echo json_encode($data['blog']);
	$data['page']='admin/blogs/edit';
	$this->load->view('admin/layout',$data);

   }

   public function save_edit($id)
   {

	if (!$this->input->is_ajax_request()) {
		$json =array(
				  'status' =>'error',
				  'msg'   =>'No direct script access allowed'
			  ); 
		  echo json_encode($json);
		  exit;
	 }
	 else
	 {
		 $this->form_validation->set_rules('title', 'Blog Title', 'trim|required|xss_clean');
		
		 if ($this->form_validation->run() == FALSE ) {			
			 $json =array(
				 'status' =>'error',
				 'msg'   =>'Required feilds are missing'
			 ); 
			 echo json_encode($json);
			 exit;
		 } 
		 else {
			 $data_insert =array();

			 // image upload
			 //$files = $_FILES;     		
			 //$config['upload_path']          = 'uploads/blogs/';		
			 //$config['allowed_types']        = 'gif|jpg|png';
			 //$config['max_size']             = 0;
			 //if($_FILES['image1']['name'])
			 //{	    	    	
			 //$_FILES['image']['name']= $files['image1']['name'];
				// $_FILES['image']['type']= $files['image1']['type'];
				// $_FILES['image']['tmp_name']= $files['image1']['tmp_name'];
				// $_FILES['image']['error']= $files['image1']['error'];
				// $_FILES['image']['size']= $files['image1']['size']; 
			
			 //$this->load->library('upload', $config);
			 //$this->upload->initialize($config);

			 // if ( ! $this->upload->do_upload('image1'))
			 //{
				//  $error = array('error' => $this->upload->display_errors());
				//  $json =array(
				//   'status' =>'error',
				//  'msg' =>$error,
				//   );
			 //echo json_encode($json);
			 // exit;                      
			 //}
			
				// $data_insert['image'] = $this->upload->data()['file_name'];   
						  
				// }


		 $data_insert['title'] = $this->input->post('title');    				
		 $data_insert['description'] = $this->input->post('description');
		 $data_insert['short_description'] = $this->input->post('s_description');  				
		 $data_insert['category_id'] = $this->input->post('category');  				
		 $data_insert['author'] = $this->input->post('author');  
		 $data_insert['Website'] = 'pv';
		 $data_insert['meta_title'] = $this->input->post('meta_title');  
			$data_insert['meta_description'] = $this->input->post('meta_description');  
			$data_insert['meta_keyword'] = $this->input->post('meta_keyword');
			 
		 $insert = $this->common_model->update_records($data_insert,array('id'=>$id),'blogs');			
		  if($insert)
		  {
			  $json =array(
				  'status' =>'success',
				  'msg' =>'Blog Updated successfully',
			  );
		  }
		  else
		  {
			  $json =array(
				   'status' =>'error',
				  'msg' =>'Blog saving failed',
			  );
		  }
		  echo json_encode($json);
		  exit;
		 }  //form validation true
	 } // if aj


   }


	
}
