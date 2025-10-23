<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Breeders extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		//  $this->SeesionModel->not_logged_in(); 
		$this->load->library('Mailer');
		$this->load->model("breeders_model");
		$this->load->model("common_model");
	}



	public function index()
	{
		$this->session->set_userdata('top_menu', 'Breeders');
		$this->session->set_userdata('sub_menu', 'Breeders/list');

		$data['title'] = 'Dashboard';

		$resultlist = $this->staff_model->searchFullText_staff('', 0);
        $data['staff'] = $resultlist;

		$data['page'] = 'admin/breeders/list';
		$this->load->view('admin/layout', $data);
	}
	public function pending()
	{
		$this->session->set_userdata('top_menu', 'Breeders');
		$this->session->set_userdata('sub_menu', 'Breeders/Pending');

		$data['title'] = 'Dashboard';

		$data['page'] = 'admin/breeders/pending';
		$this->load->view('admin/layout', $data);
	}
	public function fetch_pending()
	{
		$fetch_data = $this->breeders_model->list_pending_requests();
		$data = array();
		$count = 1;

		foreach ($fetch_data as $row) {
			//var_dump($row)
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = $row->id;
			$sub_array[] = wordwrap($row->name, 35, "<br>\n");
			$sub_array[] = wordwrap($row->phone, 35, "<br>\n");
			$sub_array[] = wordwrap($row->email, 35, "<br>\n");

			if ($row->is_verified === '1') {

				$sub_array[] = '<center><input type="button" value="Active" style ="background-color: green;color: white;"class="success tgl_checkbox" data-id="' . $row->id . '"data-status="' . $row->is_verified . '"data-email="' . $row->email . '" data-name="' . $row->name . '" id="tgl_checkbox_' . $row->id . '"></center>';
			} else {
				$sub_array[] = '<center><input type="button" value="Inactive" style ="background-color: red;color: white;"class="success tgl_checkbox" data-id="' . $row->id . '"data-status="' . $row->is_verified . '"data-email="' . $row->email . '" data-name="' . $row->name . '" id="tgl_checkbox_' . $row->id . '"></center>';
			}

			$sub_array[] = '<center>
			
			<a class="btn btn-default btn-xs" title="View Details" href="' . base_url() . 'admin/breeders/view/' . $row->id . '" ><i class="fas fa-eye m-1"></i></a> &nbsp;&nbsp;
			<a class="btn btn-danger btn-xs" title="Delete" href="javascript:void(0)" onclick="delete_recordById(\'' . base_url() . '/admin/Breeders/delete_breeder/' . $row->id . '\',\'Delete\')" ><i class="fas fa-trash m-1"></i></a>
			';


			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),
			"recordsTotal"          =>   	$this->db->from("user_accounts")->count_all_results(),
			"recordsFiltered"    	=>   	$this->breeders_model->list_pending_requests_filtered(),
			"data"                  =>     	$data
		);
		echo json_encode($output);
	}
	public function fetch()
	{
		$fetch_data = $this->breeders_model->list_records();
		$data = array();
		$count = 1;

		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = $row->id;
			$sub_array[] = wordwrap($row->name, 35, "<br>\n");
			$sub_array[] = wordwrap($row->phone, 35, "<br>\n");
			$sub_array[] = wordwrap($row->email, 35, "<br>\n");
			if($row->is_privilaged==1)
			{
				$privilage_checked='checked';
			}
			else{
				$privilage_checked='';
			}
			$sub_array[] = ' <div class="material-switch pull-right">
			<input id="'.$row->id.'" class="privilage_checkbox" '.$privilage_checked.' type="checkbox"/>
			<label for="'.$row->id.'" class="label-success"></label>
		</div>';

			if (!empty($row->admin_id)) {
				$admin = $this->common_model->list_row('staff', array('id' => $row->admin_id));

				$sub_array[] = '<p class="text-success">' . $admin->name . '</p> <a href="#" id="' . $row->id . '" data-name="' . $row->name . '" data-adminid="' . $row->admin_id . '" class="btn btn-sm btn-info edit_assigned_admin"><i class="fas fa-user-edit"></i><a>';
			} else {
				$sub_array[] = '<p class="text-danger">Not Assigned</p> <a href="#" id="' . $row->id . '"  data-name="' . $row->name . '" data-adminid="0" class="btn btn-sm btn-info edit_assigned_admin"><i class="fas fa-user-edit"></i><a>';
			}

			if ($row->is_verified === '1') {

				$sub_array[] = '<center><input type="button" value="Active" class="success btn btn-success btn-sm tgl_checkbox" data-id="' . $row->id . '"data-status="' . $row->is_verified . '"data-email="' . $row->email . '" data-name="' . $row->name . '" id="tgl_checkbox_' . $row->id . '">
						</center>';

				$sub_array[] = '<center><a href="' . base_url() . 'admin/breeders/signin/' . $row->id . '" target="_blank" class="btn btn-default btn-xs" title="Click to sign into breeder account"><i class="fas fa-sign-in-alt"></i></a></center>';
			} else {
				$sub_array[] = '<center><input type="button" value="Inactive" class="success btn btn-danger btn-sm tgl_checkbox" data-id="' . $row->id . '"data-status="' . $row->is_verified . '"data-email="' . $row->email . '" data-name="' . $row->name . '" id="tgl_checkbox_' . $row->id . '"></center>';

				$sub_array[] = '<center></center>';
			}

			$sub_array[] = '<center>
		
			<a class="btn btn-default btn-xs" title="View Details" href="' . base_url() . 'admin/breeders/view/' . $row->id . '" ><i class="fas fa-eye m-1"></i></a> &nbsp;&nbsp;
			<a class="btn btn-danger btn-xs" title="Delete" href="javascript:void(0)" onclick="delete_recordById(\'' . base_url() . 'admin/Breeders/delete_breeder/' . $row->id . '\',\'Delete\')" ><i class="fas fa-trash m-1"></i></a>
			</center>';


			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),
			"recordsTotal"          =>   	$this->db->from("user_accounts")->count_all_results(),
			"recordsFiltered"    	=>   	$this->breeders_model->list_filtered(),
			"data"                  =>     	$data
		);
		echo json_encode($output);
	}
	function change_status()
	{

		$id = $this->input->post('id');
		$this->common_model->change_status(['id' => $id], 'is_verified', 'user_accounts');
		$status = $this->input->post('status');
		$name = $this->input->post('name');
		$email = $this->input->post('email');

		//msg
		if($status==0)
   		 {
   	
    	$msg = '<h4>Hello '.$name.',</h4>';
    	$msg .='<p>We are happy to let you know that your account has been successfully approved! Thank you for joining the My Pup Central community. Please login to your account using the following link <b><a href="https://mypupcentral.com/login">https://mypupcentral.com/login</a></b> with your registered email ID and password. Help us make our website a pleasant shopping experience for all prospective new families by submitting your best, high quality photos to show your puppy in the best light. Be sure to enter your PayPal information in your profile so customers can make a deposit directly to you to reserve a puppy. Contact us at: 330-852-2444 if you have any questions or concerns. Thank you for helping us make the dog world a better place!</p>';
    	
    	$msg.='<br><p>Successful Marketing Tips</p>';
		$msg.='<ul><li>We recommend using a camera</li>';
		$msg.='<li>Make sure your puppy is looking directly at the camera in at least 2 photos</li>';
		$msg.='<li>Take photos from each angle to show customers all sides of your puppy. Example: Left, right, front and of the puppy standing or laying down</li>';
		$msg.='<li>Edit and crop your photos</li>';
		$msg.='<li>Submit a minimum of 3 photos and a maximum of 10</li>';
		$msg.='<li>Submit at least a 30 second video of your puppy</li>';
		$msg.='<li>Write a captivating description to describe your puppy\'s personality, genetic information, and what you offer</li>';
		$msg.='<li>Submit a flattering photo of each well-groomed parent looking directly at the camera</li>';

		$msg.='<li>Be sure to mark your puppy "adopted" when you receive a deposit/payment</li>';

		$msg.='<li>Update your photos every few weeks and lower price as your puppy ages</li>';
		$msg.='<li>Encourage customers to leave a review on your profile to build your credibility</li></ul>';
	

    	$msg.= '<br><br>';
    	$msg.= '<p>Thank you for partnering with us,<br>';
    	$msg .= '<b>My Pup Central Team</b></p>';
		$msg.='<img style="width:200px; height:auto" src="https://mypupcentral.com/assets/logo10.png">';
    	$msg.='<br><br><p> Note : <b>We reserve the right to reject any photos or advertising requests that do not meet our standards.</b></p>';
		//$this->load->helper('email_helper');
    	//sendEmail($email, 'Puppy Verify - Account Confirmation', $msg);
    	$this->mailer->send_mail($email, 'My Pup Central - Account Confirmation', $msg);

   		 }
		if($status==1)
   		 {
   	
    	$msg = '<h4>Hello '.$name.',</h4><br>';
    	$msg .='We are sorry to let you know that your profile has been temperorly blocked in My Pup Central breeder community.<br>';
    
    	$msg.='<br><br>';
    //	$msg.= 'In case you have any questions please call our customer service at (330) 440 2481.<br>';
       // $msg.= 'In case you have any questions please call our customer service at (330) 575 9145.<br>';
        //  $msg.= 'In case you have any questions please call our customer service at (330) 987 1810.<br>';
    	$msg.= '<br><br><br>';
    	$msg.= 'Thanks & Best Regards, <br>';
    	$msg .= '<b>My Pup Central Team</b>';
    	//$this->load->helper('email_helper');
    	//sendEmail($email, 'Puppy Verify - Account Confirmation', $msg);
     	$this->mailer->send_mail($email, 'My Pup Central - Account Blocked', $msg);

   		 }

		echo 'Done';
	}
	public function view($id = "")
	{
		$this->session->set_userdata('top_menu', 'Breeders');
		$this->session->set_userdata('sub_menu', 'Breeders/View');

		$data['title'] = 'Breeders';
		$data['userinfo'] = $this->common_model->get(['id' => $id], 'user_accounts')[0];

		$resultlist = $this->staff_model->searchFullText_staff('', 0);
        $data['staff'] = $resultlist;

		if (!empty($data['userinfo']->admin_id)) {
			$data['admin'] = $this->common_model->list_row('staff', array('id' => $data['userinfo']->admin_id));

		}


		$data['page'] = 'admin/breeders/view';
		$this->load->view('admin/layout', $data);
	}


	public function assign_staff_tobreeder()
	{
		$id=$this->input->post('id');
		$admin_id=$this->input->post('admin_id');
		if($admin_id==0)
		{
			$admin_id=NULL;
		}

		$this->common_model->update_records(array('admin_id'=>$admin_id),array('id'=>$id),'user_accounts');
		$resp=array('satus'=>'success','msg'=>'Updated');
		echo json_encode($resp);
	}


	public function update_details()
	{
		$id=$this->input->post('id');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$this->common_model->update_records(array('email'=>$email,'phone'=>$phone),array('id'=>$id),'user_accounts');
		$resp=array('satus'=>'success','msg'=>'Updated');
		echo json_encode($resp);
	}


	public function signin($id)
	{

		$user=$this->common_model->list_row('user_accounts',array('id'=>$id));

		$session_data   = array(
			'id'                     => $user->id,
			'name'       	        => $user->name,
			'email'                  => $user->email,
			'is_loggedin'			=> true,
				'premium'                  =>1,
			'staff'					=>true,
			'staff_id' 				=>$_SESSION['siteadmin']['id'],
			'staff_name'			=>$_SESSION['siteadmin']['username']
		);
		$this->session->unset_userdata('siteuser');
		$this->session->set_userdata('siteuser', $session_data);

		redirect(base_url().'profile', 'refresh');
	}
	
	public function update_seo()
    {
    	$id=$this->input->post('id');
    	$data=array(
    		'meta_title'=>$this->input->post('title'),
    		'meta_description'=>$this->input->post('decription'),
    		'meta_keywords'=>$this->input->post('keywords'),
    		'slug'=>$this->input->post('slug')
    	);
    	if($this->common_model->update_records($data,array('id'=>$id),'user_accounts'))
    	{
    		$resp=array('status'=>'success','msg'=>'Success');
    	}
    	else{
    		$resp=array('status'=>'error','msg'=>'Error');
    	}
    
    	echo json_encode($resp);
    }
    
    public function update_alt_tag()
    {
    	$id=$this->input->post('id');
    	$data=array(
    		'kennel_alt'=>$this->input->post('alt_tag')
    	);
    	if($this->common_model->update_records($data,array('id'=>$id),'user_accounts'))
    	{
    		$resp=array('status'=>'success');
    	}
    	else{
    		$resp=array('status'=>'error');
    	}
    
    	echo json_encode($resp);
    }


	public function update_privilage()
	{
		$id=$this->input->post('id');
		$val=$this->input->post('val');
    	$data=array(
    		'is_privilaged'=>$val
    	);
    	if($this->common_model->update_records($data,array('id'=>$id),'user_accounts'))
    	{
    		$resp=array('status'=>'success','msg'=>'Updated');
    	}
    	else{
    		$resp=array('status'=>'error','msg'=>'Updated');
    	}
    
    	echo json_encode($resp);
	}
	
	public function delete_breeder($id)
	{
	    // Verify breeder exists
	    $user = $this->common_model->list_row('user_accounts', array('id' => $id));
	    if (!$user) {
	        $resp = array('status' => 'error', 'msg' => 'Breeder not found');
	        echo json_encode($resp);
	        return;
	    }
	    
	    try {
	        // Delete breeder profile photo
	        if (!empty($user->photo) && file_exists("uploads/doc/" . $user->photo)) {
	            @unlink("uploads/doc/" . $user->photo);
	        }
	        
	        // Delete kennel images
	        if (!empty($user->kennel_images)) {
	            $imgs = explode(",", $user->kennel_images);
	            foreach ($imgs as $row) {
	                if (!empty($row) && file_exists("uploads/kennel/" . $row)) {
	                    @unlink("uploads/kennel/" . $row);
	                }
	            }
	        }
	        
	        // Get all posts (puppy listings) by this breeder
	        $posts = $this->common_model->list_records(array('user_id' => $id), 'posts', 'id', 'DESC', 10000);
	        if (!empty($posts)) {
	            foreach ($posts as $post) {
	                // Delete booking time slots for this post
	                $this->common_model->delete('book_time_slot', array('ad_id' => $post->id));
	                
	                // Delete post pictures
	                $pictures = $this->common_model->list_records(array('post_id' => $post->id), 'posts_pictures', 'id', 'DESC', 10000);
	                if (!empty($pictures)) {
	                    foreach ($pictures as $pic) {
	                        if (!empty($pic->picture_name) && file_exists("uploads/puppies/" . $pic->picture_name)) {
	                            @unlink("uploads/puppies/" . $pic->picture_name);
	                        }
	                    }
	                    $this->common_model->delete('posts_pictures', array('post_id' => $post->id));
	                }
	                
	                // Delete post videos
	                $videos = $this->common_model->list_records(array('post_id' => $post->id), 'posts_videos', 'id', 'DESC', 10000);
	                if (!empty($videos)) {
	                    foreach ($videos as $vid) {
	                        if (!empty($vid->video_name) && file_exists("uploads/puppies/" . $vid->video_name)) {
	                            @unlink("uploads/puppies/" . $vid->video_name);
	                        }
	                    }
	                    $this->common_model->delete('posts_videos', array('post_id' => $post->id));
	                }
	            }
	            
	            // Delete all posts by this breeder
	            $this->common_model->delete('posts', array('user_id' => $id));
	        }
	        
	        // Delete contact persons associated with this breeder
	        $this->common_model->delete('contact_person', array('user_account_id' => $id));
	        
	        // Delete the breeder account
	        $this->common_model->delete('user_accounts', array('id' => $id));
	        
	        $resp = array('status' => 'success', 'msg' => 'Breeder account and all associated data deleted successfully');
	    } catch (Exception $e) {
	        $resp = array('status' => 'error', 'msg' => 'Error deleting breeder: ' . $e->getMessage());
	    }
	    
	    echo json_encode($resp);
	}
}
