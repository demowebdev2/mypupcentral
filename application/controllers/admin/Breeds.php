<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class Breeds extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();     
        $this->load->model("breeds_model");
		$this->load->library('form_validation');
		//$this->load->helper('form');
		$this->load->helper(array('form', 'url'));
		$this->load->library('Image_moo');
    }


	
	public function index()
	{
		$this->session->set_userdata('top_menu', 'Breeds');
		$this->session->set_userdata('sub_menu', 'Breeds/list');
		
		$data['title']='Dashboard';		
		$data['page']='admin/breeds/list';
		$this->load->view('admin/layout',$data);
		
	}
		public function fetch_breeds()
	{
		$fetch_data = $this->breeds_model->list_records();		
		$data = array();
		$count=1;

		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = wordwrap($row->breed_name, 35, "<br>\n");
			
			if(!empty($row->breed_size))
			{
			    $siz=json_decode($row->breed_size);
			    $sizopt='';
			    foreach($siz as $rw)
			    {
			        $sizopt.=$rw.', ';
			    }
			    	$sub_array[] = $sizopt;
			}
			else{
			    	$sub_array[] = '';
			}
			
				if($row->image){
				$sub_array[] = '<center><img height="100px" width="100px" src="'.base_url('uploads/breeds/').$row->image.'"></center>';
				}
				else
		    	{
				$sub_array[] = '<center><img height="75px" width="90px" src="'.base_url('uploads/breeds/no_image.png').'"></center>';
			   }			

			
			
						
			$sub_array[] = '<center>			
			
			<a class="btn btn-default btn-xs" title="Edit Details" href="' . base_url() . 'admin/breeds/edit/' . $row->id . '" ><i class="fas fa-pen m-1"></i></a>
			
			<a class="btn btn-default btn-xs delete-btn" title="Delete" data-id="'.$row->id.'"><i class="fas fa-trash m-1"></i></a>
			</center>';
			

			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),			
			"recordsTotal"          =>   	$this->db->from("breeds")->count_all_results(),
			 "recordsFiltered"    	=>   	$this->breeds_model->count_filtered_records(),
			"data"                  =>     	$data
		);
		echo json_encode($output);
		exit;
	}
	public function add()
	{
		$this->session->set_userdata('top_menu', 'Breeds');
		$this->session->set_userdata('sub_menu', 'Breeds/add');		
		$data['title']='Breeds';	
		$data['breeds'] = $this->db->where(['is_puppyverify'=>0])->get("breeds")->result();		
		$data['page']='admin/breeds/add';
		$this->load->view('admin/layout',$data);
	}
public function save()
	{
	//var_dump($_POST);exit;
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
			$this->form_validation->set_rules('breed', 'Breed Name', 'trim|required|xss_clean');
           
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
				$config['upload_path']          = 'uploads/breeds/';		
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
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
                 $data_insert['image'] = $this->upload->data()['file_name'];  			  					
                		  					
       			
       			$this->add_watermark('uploads/breeds/'.$this->upload->data()['file_name']);       			  		
       	    	}
       	    	$files_pro = $_FILES; 
       	    	//echo $_FILES['pro_image']['name'];die();
       	    	if($_FILES['pro_image']['name'])
			    {	    	    	
    			    $_FILES['pro_image']['name']= $files_pro['pro_image']['name'];
           			$_FILES['pro_image']['type']= $files_pro['pro_image']['type'];
           			$_FILES['pro_image']['tmp_name']= $files_pro['pro_image']['tmp_name'];
           			$_FILES['pro_image']['error']= $files_pro['pro_image']['error'];
           			$_FILES['pro_image']['size']= $files_pro['pro_image']['size']; 
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
    				if ( ! $this->upload->do_upload('pro_image'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        $json =array(
    			 		'status' =>'error',
    					'msg' =>$error,
    			 		);
                        echo json_encode($json);
        			 	exit;                      
                    }
                    $data_insert['pro_image'] = $this->upload->data()['file_name']; 			  					
       	    	}
				   $data_insert['breed_name'] = $this->input->post('breed');   
           	    $data_insert['is_puppyverify'] = 1; 
           	    $data_insert['health'] = $this->input->post('health');  	
			   $size=$this->input->post('breed_size');
			   if(!empty( $size))
			   {
				$data_insert['breed_size'] = json_encode($size);  	
			   }
			   else{
				$data_insert['breed_size'] = '';
			   }	
            $data_insert['owner_experience'] = $this->input->post('owner_experience'); 				
            $data_insert['grooming'] = $this->input->post('grooming');  			  					
            $data_insert['activity_level'] = $this->input->post('activity_level');   					
            $data_insert['size'] = $this->input->post('size');  			  					
            $data_insert['life_span'] = $this->input->post('life_span');  			  					
            $data_insert['temperament'] = $this->input->post('temperament'); 		  					
            $data_insert['did_you_know'] = $this->input->post('did_you_know'); 	  					
            $data_insert['overview'] = $this->input->post('overview');  	
            $data_insert['adaptability'] = $this->input->post('adaptability');  	
            $data_insert['alt_image'] = $this->input->post('alt_img');  
            $data_insert['meta_title'] = $this->input->post('meta_title');  
			$data_insert['meta_description'] = $this->input->post('meta_description');  
			$data_insert['meta_keyword'] = $this->input->post('meta_keyword');
            $data_insert['page_slug'] = $this->input->post('page_slug'); 
            $data_insert['training'] = $this->input->post('training');   
       	    $breed_id = $this->input->post('breed'); 	
						
			
			$update = $this->common_model->create_record($data_insert,'breeds');		
			if($update)
			 {
			 	$json =array(
			 		'status' =>'success',
			 		'msg' =>'Record added successfully',
			 	);
			 }
			 else
			 {
			 	$json =array(
			 		 'status' =>'error',
					 'msg' =>'Record saving failed',
			 	);
			 }
			 echo json_encode($json);
			 exit;
			}  //form validation true
		} // if ajax req

   }
   public function edit($id="")
	{
		$this->session->set_userdata('top_menu', 'Breeds');
		$this->session->set_userdata('sub_menu', 'Breeds/Edit');		
		$data['title']='Breeds';
		$data['breeds'] = $this->db->where(['is_puppyverify'=>1])->get("breeds")->result();			
		$data['result'] = $this->db->where("id", $id)->get("breeds")->result();	
		$data['page'] = 'admin/breeds/edit';
		$this->load->view('admin/layout',$data);
	}
	public function edit_save()
	{
		
	
		 	$id = $this->input->post('id');	
	
			$data =array();

				// image upload
				$files = $_FILES;     		
				$config['upload_path']          = 'uploads/breeds/';		
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
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
               
       			$data['image'] = $this->upload->data()['file_name'];   
       		
       		 
       			$this->add_watermark('uploads/breeds/'.$this->upload->data()['file_name']);
       			  		
       	    	}
       	    	//echo $data['image'];die();
       	    	$files_pro = $_FILES; 
       	    	//echo $_FILES['pro_image']['name'];die();
       	    	if($_FILES['pro_image']['name'])
			    {	    	    	
    			    $_FILES['pro_image']['name']= $files_pro['pro_image']['name'];
           			$_FILES['pro_image']['type']= $files_pro['pro_image']['type'];
           			$_FILES['pro_image']['tmp_name']= $files_pro['pro_image']['tmp_name'];
           			$_FILES['pro_image']['error']= $files_pro['pro_image']['error'];
           			$_FILES['pro_image']['size']= $files_pro['pro_image']['size']; 
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
    				if ( ! $this->upload->do_upload('pro_image'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                        $json =array(
    			 		'status' =>'error',
    					'msg' =>$error,
    			 		);
                        echo json_encode($json);
        			 	exit;                      
                    }
                    $data['pro_image'] = $this->upload->data()['file_name']; 			  					
       	    	}
       	    	//echo $data_insert['pro_image'];die();
       	    	 $size=array();
				   $size=$this->input->post('breed_size');
				   if(!empty( $size))
				   {
					$data['breed_size'] = json_encode($size);  	
				   }
				   else{
					$data['breed_size'] = '';
				   }
			
				   $data['breed_name'] = $this->input->post('breed');   
			$data['overview'] = $this->input->post('overview');   
			$data['temperament'] = $this->input->post('temperament'); 
			$data['adaptability'] = $this->input->post('adaptability');    				
			$data['health'] = $this->input->post('health');    				
			$data['owner_experience'] = $this->input->post('owner_experience');    				
			$data['grooming'] = $this->input->post('grooming');    				
			$data['activity_level'] = $this->input->post('activity_level');    				
			$data['size'] = $this->input->post('size');    				
			$data['life_span'] = $this->input->post('life_span');			
			$data['did_you_know'] = $this->input->post('did_you_know'); 
			$data['alt_image'] = $this->input->post('alt_tag'); 
			$data['meta_title'] = $this->input->post('meta_title');  
			$data['meta_description'] = $this->input->post('meta_description');  
			$data['meta_keyword'] = $this->input->post('meta_keyword');
			$data['page_slug'] = $this->input->post('page_slug'); 
			$data['training'] = $this->input->post('training');
			$data['training'] = $this->input->post('training');
			//print_r($data);die();
			 $update = $this->common_model->update_records($data,['id'=>$id],'breeds');			
			 if($update)
			 {
			 	$json =array(
			 		'status' =>'success',
			 		'msg' =>'Record updated successfully',
			 	);
			 }
			 else
			 {
			 	$json =array(
			 		'status' =>'error',
					 'msg' =>'Record saving failed',
			 	);
			 }
			 echo json_encode($json);
			 exit;
	
		//} // if ajax req

   }
public function delete()
{
	$id = $this->input->post('id');

	
	 $result = $this->db->select('*')
                        ->from('posts')
                        ->where('category_id', $id)
                        ->get()
                        ->num_rows();

                    if ($result == 0) {
                    	$this->db->set(['is_puppyverify'=>0])->where(['id'=>$id])->update('breeds');
                       //$this->common_model->delete('breeds',['id'=>$id]);
                       $json=array(
                       	'msg'=>'success'
                       );
                       echo json_encode($json);return true;
                    } 
                    else
                    {
                    	$json=array(
                       	'msg'=>'error'
                       );
                       echo json_encode($json);return true;
                    }
	

}
public function deleteImage()
{
	 $status  = 'err';  
		 $json=array();
        // If post request is submitted via ajax 
        if($this->input->post('id')){ 
            $id = $this->input->post('id'); 
            $column_name = $this->input->post('columname');
            $fileData = $this->common_model->get(['id'=>$id],'breeds');            
            // Delete image data 
            $delete = $this->breeds_model->deleteImage($id,$column_name); 
             
            if($delete){ 
                // Remove files from the server  
               // $array=explode('/', $fileData['filename']);
                @unlink('uploads/breeds/'. $fileData[$column_name]);  
                $status = 'ok';  
                } 


                $json=array(
                 	'status'=>'success',
                 	'msg'=>'Image removed successfully.'
                   );
              echo json_encode($json);return true;
                   
          
        }
          $json=array(
                 	'status'=>'error',
                 	'msg'=>'Failed to delete image.'
                   );
              echo json_encode($json);return true;
       
}


private function add_watermark($file)
	{
		$this->image_moo
		->load($file, $transparent_x=5, $transparent_y=5)
		->resize_crop(400,400)
		->load_watermark('assets/watermark/watermark-2.png')
		->watermark(9)
		->save_pa("", "", TRUE);
		//->save_dynamic();

		return true;
	}


	
}
