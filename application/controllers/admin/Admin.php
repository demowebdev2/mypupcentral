<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class Admin extends Admin_Controller {

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

	function unauthorized() {
		$this->session->set_userdata('top_menu', '');
		$this->session->set_userdata('sub_menu', '');
		
		$data['title']='Unauthorized';
			
			$this->load->view('admin/unauthorized');
			
	}

	function profile()
	{
		$this->session->set_userdata('top_menu', '');
		$this->session->set_userdata('sub_menu', '');

		$data['title']='My Profile';

		
		$data['user']=$this->common_model->list_row('staff',array('id'=>$_SESSION['siteadmin']['id']));

		$data['page']='admin/profile';
		$this->load->view('admin/layout',$data);
			

	}

	public function change_password()
	{
		$this->session->set_userdata('nav', 'change_password');
			$this->form_validation->set_rules('password', $this->lang->line('current_password'), 'trim|required|xss_clean');
			$this->form_validation->set_rules('newpassword', $this->lang->line('new_password'), 'trim|required|xss_clean|matches[cnewpassword]');
			$this->form_validation->set_rules('cnewpassword', $this->lang->line('confirm_password'), 'trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {

				
				redirect('admin/Admin/profile?nav=change_password');
			} else {
				$sessionData = $this->session->userdata('siteadmin');
				$userdata = $this->customlib->getUserData();
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
				
				redirect('admin/Admin/profile?nav=change_password');
			}
		
	}

	public function google()
	{
		$this->session->set_userdata('top_menu', 'Settings');
		$this->session->set_userdata('sub_menu', 'Settings/google');

		$data['title']='Google Settings';

		
		$data['settings']=$this->common_model->list_row('tb_settings',array('application'=>'puppyverify.com'));
		
		$data['page']='admin/google_settings';
		$this->load->view('admin/layout',$data);
	}
	
	public function save_google()
	{
	    $data_update=array('google_tag'=>$this->input->post('tag'));
	     $update = $this->common_model->update_records($data_update,['application'=>'puppyverify.com'],'tb_settings');
	     
	     $resp=array('status'=>'success');
	     echo json_encode($resp);
	}
	
public function settings()
	{
		$this->session->set_userdata('top_menu', 'Settings');
		$this->session->set_userdata('sub_menu', 'Settings/setup');

		$data['title']='Company Settings';

		
		$data['settings']=$this->common_model->list_row('tb_settings',array('application'=>'puppyverify.com'));
		$data['social']=$this->common_model->list_row('tb_settings_social',array('application'=>'puppyverify.com'));
		
		$data['page']='admin/settings';
		$this->load->view('admin/layout',$data);
	}
   public function save_settings()
   {
    //update_records($data,$where,$table)
    if (!$this->input->is_ajax_request()) {
   exit('No direct script access allowed');
  		 $json =array(
			 		'status' =>'error',
					 'msg' =>'No direct script access allowed',
			 	);
			 echo json_encode($json);
			 exit;
		}
		else
		{
			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('address', 'Address Line 1', 'trim|required|xss_clean');
            $this->form_validation->set_rules('address_ln_two', 'Address Line 2', 'trim|required|xss_clean');
            $this->form_validation->set_rules('city', 'City', 'trim|required|xss_clean');
            $this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
            $this->form_validation->set_rules('country', 'Country', 'trim|required|xss_clean');
            $this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
            if ($this->form_validation->run() == FALSE ) {
					$data['settings']=$this->common_model->list_row('tb_settings',array('application'=>'puppyverify.com'));	
					$data['page']='admin/settings';
					$this->load->view('admin/layout',$data);

				} 
				else {
					$data_update = array(
                    'company_name' => $this->input->post('company_name'),
                    'address_line_one' => $this->input->post('address'),
                    'address_line_two' => $this->input->post('address_ln_two'),
                    'city' => $this->input->post('city'),
                    'state' => $this->input->post('state'),
                    'country' => $this->input->post('country'),
                    'zip_code' => $this->input->post('zip_code'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),              
                );
				
			 $update = $this->common_model->update_records($data_update,['application'=>'puppyverify.com'],'tb_settings');
			
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
					 'msg' =>'Record saving failed.'
			 	);
			 }
			 echo json_encode($json);
			 exit;
			}
		} // if ajax req


   }
    public function save_logo()
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
		
				$data_insert =array();

				// image upload
				$files = $_FILES;     		
				$config['upload_path']          = 'uploads/company/';		
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
               
       			$data_update['company_logo'] = $this->upload->data()['file_name'];   
       			  		
       	    	}							
			 $update = $this->common_model->update_records($data_update,['application'=>'puppyverify.com'],'tb_settings');			
			 if($update)
			 {
			 	$json =array(
			 		'status' =>'success',
			 		'msg' =>'Logo saved successfully',
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
			//}  //form validation true
		} // if ajax req
   }
   public function save_social()
  {
  	 //update_records($data,$where,$table)
    if (!$this->input->is_ajax_request()) {
   exit('No direct script access allowed');
  		 $json =array(
			 		'status' =>'error',
					 'msg' =>'No direct script access allowed',
			 	);
			 echo json_encode($json);
			 exit;
		}
		else
		{
			$this->form_validation->set_rules('facebook', 'Facebook Link', 'trim|required|xss_clean');
            $this->form_validation->set_rules('twitter', 'Twitter Link', 'trim|required|xss_clean');
            $this->form_validation->set_rules('instagram', 'Imstagram Link', 'trim|required|xss_clean');
            $this->form_validation->set_rules('linkedin', 'LinkedIn Link', 'trim|required|xss_clean');
           
            if ($this->form_validation->run() == FALSE ) {
            		$data['settings']=$this->common_model->list_row('tb_settings',array('application'=>'puppyverify.com'));
					$data['social']=$this->common_model->list_row('tb_settings_social',array('application'=>'puppyverify.com'));	
					$data['page']='admin/settings';
					$this->load->view('admin/layout',$data);

				} 
				else {
					$data_update = array(
                    'facebook' => $this->input->post('facebook'),
                    'twitter' => $this->input->post('twitter'),
                    'instagram' => $this->input->post('instagram'),
                    'linkedin' => $this->input->post('linkedin'),                           
                );
				
			 $update = $this->common_model->update_records($data_update,['application'=>'puppyverify.com'],'tb_settings_social');
			
			 if($update)
			 {
			 	$json =array(
			 		'status' =>'success',
					 'msg' =>'Social media links saved successfully',
			 	);

			 }
			 else
			 {
			 	$json =array(
			 		'status' =>'error',
					 'msg' =>'Record saving failed.'
			 	);
			 }
			 echo json_encode($json);
			 exit;
			}
		} // if ajax req
  }
 public function deleteImage()
{
	 $status  = 'err';  
		 $json=array();
        // If post request is submitted via ajax 
        if($this->input->post('id')){ 
            $id = $this->input->post('id'); 
            $column_name = $this->input->post('columname');
            $fileData = $this->common_model->get(['application'=>'puppyverify.com'],'tb_settings');            
            // Delete image data 
            $delete = $this->common_model->deleteImage($id,$column_name,'tb_settings'); 
             
            if($delete){ 
                // Remove files from the server  
               // $array=explode('/', $fileData['filename']);
                @unlink('uploads/company/'. $fileData[$column_name]);  
                $status = 'ok';  
                } 

                $json=array(
                 	'status'=>'success',
                 	'msg'=>'Logo removed successfully.'
                   );
              echo json_encode($json);return true;
                   
          
        }
          $json=array(
                 	'status'=>'error',
                 	'msg'=>'Failed to delete logo.'
                   );
              echo json_encode($json);return true;
       
}
}
 