<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
     
     
        $this->load->model("blogs_model");
        $this->load->model("common_model");
		$this->load->library('form_validation');
		
		$this->load->helper(array('form', 'url'));
    }
    
    
    public function list()
    {
        $this->session->set_userdata('top_menu', 'Shopping');
		$this->session->set_userdata('sub_menu', 'Shopping/list');
		
		$data['list']=$this->common_model->list_records(array('status'=>1),'shopping','id','DESC');
		
		$data['title']='Shopping List';		
		$data['page']='admin/shopping/list';
		$this->load->view('admin/layout',$data);
    }
    
    public function add()
    {
        $this->session->set_userdata('top_menu', 'Shopping');
		$this->session->set_userdata('sub_menu', 'Shopping/add');
		
		$data['title']='Add Shopping List';		
		$data['page']='admin/shopping/add';
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
			$this->form_validation->set_rules('title', ' Title', 'trim|required|xss_clean');
           
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
			$files = $_FILES;     		
            $config['upload_path'] = 'uploads/shopping/';		
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            
            
            if ($_FILES['image1']['name']) {	    	    	
                $_FILES['image']['name'] = $files['image1']['name'];
                $_FILES['image']['type'] = $files['image1']['type'];
                $_FILES['image']['tmp_name'] = $files['image1']['tmp_name'];
                $_FILES['image']['error'] = $files['image1']['error'];
                $_FILES['image']['size'] = $files['image1']['size'];
            
                // Create a new file name
                $new_file_name = time() . '_' . $_FILES['image1']['name']; // You can customize this as needed
                $config['file_name'] = $new_file_name;
            
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
            
                if (!$this->upload->do_upload('image')) {  // Change 'image1' to 'image' here
                    $error = array('error' => $this->upload->display_errors());
                    $json = array(
                        'status' => 'error',
                        'msg' => $error,
                    );
                    echo json_encode($json);
                    exit;                      
                }
            
                $data_insert['photo'] = $this->upload->data()['file_name'];   	
            }


			$data_insert['title'] = $this->input->post('title');    				
			$data_insert['description'] = $this->input->post('description');
			$data_insert['note'] = $this->input->post('note');  				
			$data_insert['link'] = $this->input->post('link');  
				$data_insert['created_at'] =date('Y-m-d H:i:s');
					$data_insert['updated_at'] =date('Y-m-d H:i:s');
				
			$insert = $this->common_model->create_record($data_insert,'shopping');			
			 if($insert)
			 {
			 	$json =array(
			 		'status' =>'success',
			 		'msg' =>' added successfully',
			 	);
			 }
			 else
			 {
			 	$json =array(
			 		 'status' =>'error',
					 'msg' =>' saving failed',
			 	);
			 }
			 echo json_encode($json);
			 exit;
			}  //form validation true
		} // if ajax req
        
    }
    
    
     public function edit($id)
    {
        $this->session->set_userdata('top_menu', 'Shopping');
	$this->session->set_userdata('sub_menu', 'Shopping/list');		
	$data['title']='Edit';		
	
	$data['blog']=$this->common_model->list_row('shopping',array('id'=>$id));
	// echo json_encode($data['blog']);
	$data['page']='admin/shopping/edit';
	$this->load->view('admin/layout',$data);
    }
    
     public function update($id)
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
			 $files = $_FILES;     		
			 $config['upload_path']          = 'uploads/shopping/';		
			 $config['allowed_types']        = 'gif|jpg|png|jpeg';
			
			 if($_FILES['image1']['name'])
			 {	    	    	
			 $_FILES['image']['name']= $files['image1']['name'];
				$_FILES['image']['type']= $files['image1']['type'];
				$_FILES['image']['tmp_name']= $files['image1']['tmp_name'];
				$_FILES['image']['error']= $files['image1']['error'];
				$_FILES['image']['size']= $files['image1']['size']; 
			
			 $this->load->library('upload', $config);
			 $this->upload->initialize($config);

			  if ( ! $this->upload->do_upload('image1'))
			 {
				 $error = array('error' => $this->upload->display_errors());
				 $json =array(
				  'status' =>'error',
				 'msg' =>$error,
				  );
			 echo json_encode($json);
			  exit;                      
			 }
			
				$data_insert['photo'] = $this->upload->data()['file_name'];   
						  
				}


			$data_insert['title'] = $this->input->post('title');    				
			$data_insert['description'] = $this->input->post('description');
			$data_insert['note'] = $this->input->post('note');  				
			$data_insert['link'] = $this->input->post('link');  
			
					$data_insert['updated_at'] =date('Y-m-d H:i:s');
				
			 
		 $insert = $this->common_model->update_records($data_insert,array('id'=>$id),'shopping');			
		  if($insert)
		  {
			  $json =array(
				  'status' =>'success',
				  'msg' =>' Updated successfully',
			  );
		  }
		  else
		  {
			  $json =array(
				   'status' =>'error',
				  'msg' =>' saving failed',
			  );
		  }
		  echo json_encode($json);
		  exit;
		 }  //form validation true
	 } // if aj
    }
    
    
      public function delete()
   {

	if($this->common_model->delete('shopping', array('id'=>$this->input->post('id'))))
	{
		$resp=array('status'=>'success','msg'=>'');
	}
	else{
		$resp=array('status'=>'error','msg'=>'');
	}

	echo json_encode($resp);

   }




}