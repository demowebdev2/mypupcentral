<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('ads_model');
		$this->load->library('Auth');
		$this->load->library('Mailer');
	}
	public function index()
	{
	    $_SESSION['top_menu']='Home';
	    $seo = $this->ads_model->getseo(1);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;

		$data['breeds'] = $this->common_model->ad_breed_count2();
// 		$data['states'] = $this->common_model->search_state();
		

//         $date42=date('Y-m-d H:i:s', strtotime('-45 days'));
// 		$where2=array('posts.created_at >='=>$date42,'posts.is_sold'=>0,'priority'=>1);
// 		$where=array('posts.created_at >='=>$date42,'posts.is_sold'=>0);
// 		$data['ads'] = $this->ads_model->get_ads($where);
// // 		$data['premium_ads'] = $this->ads_model->get_premiumads($where2);
// // 		if(empty($data['premium_ads']))
// // 		{
// // 			$where2=array('posts.created_at >='=>$date42,'posts.is_sold'=>0);
// // 			$data['premium_ads'] = $this->ads_model->get_premiumads($where2);
// // 		}
// // 		$data['blogs'] = $this->common_model->list_records('','blogs','','');
    
//      $days_30_before =  date('Y-m-d', strtotime('today - 30 days'));
//           $where2=array('posts.is_sold'=>1,'posts.sold_date >='=>$days_30_before);
//         	$data['sold_ads'] = $this->ads_model->get_ads_sold($where2);
        

		$data['page'] = 'front/index';
		$this->load->view('front/layout', $data);
	}
	
	public function home_redirect(){
	    redirect(base_url());
	}
	
	public function load_home_content(){
		
// 		$data['breeds'] = $this->common_model->ad_breed_count2();
// 		$data['states'] = $this->common_model->search_state();
		

        $date42=date('Y-m-d H:i:s', strtotime('-45 days'));
		$where2=array('posts.created_at >='=>$date42,'posts.is_sold'=>0,'priority'=>1);
		$where=array('posts.created_at >='=>$date42,'posts.is_sold'=>0);
		$data['ads'] = $this->ads_model->get_ads($where);
// 		$data['premium_ads'] = $this->ads_model->get_premiumads($where2);
// 		if(empty($data['premium_ads']))
// 		{
// 			$where2=array('posts.created_at >='=>$date42,'posts.is_sold'=>0);
// 			$data['premium_ads'] = $this->ads_model->get_premiumads($where2);
// 		}
// 		$data['blogs'] = $this->common_model->list_records('','blogs','','');
    
     	$days_30_before =  date('Y-m-d', strtotime('today - 30 days'));
          $where2=array('posts.is_sold'=>1,'posts.sold_date >='=>$days_30_before);
        	$data['sold_ads'] = $this->ads_model->get_ads_sold($where2);
        

	$this->load->view('front/home_content', $data);

	}
	
    public function contact()
	{
		$data['title'] = 'Contact Us | MyPupCentral';

		

		$data['ads'] = $this->ads_model->get_ads();
		$data['blogs'] = $this->common_model->list_records('','blogs','','');


		$data['page'] = 'front/contact';
		$this->load->view('front/layout', $data);
	}
	public function login()
	{
	     $_SESSION['top_menu']='Login';
		if ($this->auth->user_logged_in()) {
			redirect('profile', 'refresh');
        }
		$data['title'] = 'Breeder Login | MyPupCentral';
		$data['blogs'] = $this->common_model->list_records('','blogs','','');

		$this->form_validation->set_rules('login', 'Email or Phone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
		if ($this->form_validation->run() == FALSE) {

			$data['msg'] = validation_errors();
			$data['page'] = 'front/login';
			$this->load->view('front/layout', $data);
		} else {

			$login_post = array(
				'login'    => $this->input->post('login'),
				'password' => $this->input->post('password'),
			);
			$result         = $this->user_model->check_login($login_post);

			if ($result) {
				if ($result[0]->is_verified == 0) {
					$this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>You will get an email when you have been verified by us at My Pup Central . </b></div>');

					redirect('login');
				}
				if ($result[0]->blocked == 0) {
					$session_data   = array(
						'id'                     => $result[0]->id,
						'name'       	        => $result[0]->name,
						'email'                  => $result[0]->email,
						'premium'                  =>0,
						'is_loggedin'			=> true,
					);
					$this->session->set_userdata('siteuser', $session_data);

					redirect('/', 'refresh');
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">Account Blocked</div>');

					redirect('login');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Incorrect login details</div>');

				redirect('login');
			}
		}
	}


	public function logout()
	{
		$this->auth->logout_user();
	}





	public function register()
	{
	   

	    
	    $data['states'] = $this->common_model->search_state();
        $seo = $this->ads_model->getseo(12);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
// 		$data['title'] ='Breeder Application';
		
	     $_SESSION['top_menu']='Login';
			if ($this->auth->user_logged_in()) {
			redirect('profile', 'refresh');
        }
        else if($this->input->post('country_code'))
        {
             $ipAddress = $_SERVER['REMOTE_ADDR'];
             $blacklist=$this->common_model->check_blacklist($ipAddress,$this->input->post('email'));
             
            if($blacklist==true)
            {
                redirect('register', 'refresh');
	        	exit;  
               
            }
            $add_blacklist=$this->common_model->add_blacklist($ipAddress,$this->input->post('email'));
            if($add_blacklist>=5)
            {
                $this->common_model->update_records(array('is_blacklisted'=>1),array('email'=>$this->input->post('email')),'blacklist');
                $this->common_model->update_records(array('is_blacklisted'=>1),array('ipaddress'=>$ipAddress),'blacklist');
                
              redirect('register', 'refresh');
	        	exit;  
               
            }
            

		$data['title'] = 'Breeder Application | MyPupCentral';
		$this->form_validation->set_rules('name', 'Breeder Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('business_name', 'Business Name', 'trim|xss_clean');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|callback_validate_phone_format|is_unique[user_accounts.phone]', array('is_unique' => 'Phone number already exist.'));
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|is_unique[user_accounts.email]', array('is_unique' => 'Email id already exist.'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('password_confirmation', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
		$this->form_validation->set_rules('accept_terms', 'Accept Terms', 'required', array('required' => 'Accept terms & conditions.'));
		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
		$this->form_validation->set_rules('address', 'Address', 'trim|xss_clean');
		$this->form_validation->set_rules('city', 'City', 'trim|xss_clean');
		$this->form_validation->set_rules('state', 'State', 'trim|xss_clean');
		$this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|xss_clean');
		$this->form_validation->set_rules('federal_license', 'Federal License', 'trim|xss_clean');
		$this->form_validation->set_rules('usda_license', 'USDA License', 'trim|xss_clean');
		$this->form_validation->set_rules('vet_checked', 'vet_checked', 'trim|xss_clean');
		$this->form_validation->set_rules('guarante', 'guarante', 'trim|xss_clean');
		$this->form_validation->set_rules('length', 'length', 'trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {

			$data['msg'] = validation_errors();
			$data['page'] = 'front/register';
			$this->load->view('front/layout', $data);
		} else {
		    
		     $captcha_word = $this->input->post('captcha');
         
if($captcha_word != $_SESSION['captcha_word']){
    // exit();
     redirect('register', 'refresh');
	        	exit; 
}


			$ImageName1      = str_replace(' ','-',strtolower($_FILES['image']['name']));
			$ImageExt1 = substr($ImageName1, strrpos($ImageName1, '.'));
			$ImageExt1       = str_replace('.','',$ImageExt1);
			
			$NewImageName1 = 'kennel_'.time().random_string('alnum', 6).'.'.$ImageExt1;
			// var_dump($NewImageName1);exit;

		if(move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/doc/".$NewImageName1))
			{
			    
			}
			else{
			    	$NewImageName1='';
			}
				if(!empty($_FILES['kennel']['name'][0]))
				{
				$path="uploads/kennel/";
				$kennel_images=$this->upload_files($path, 'Kennel', $_FILES['kennel']);	
				$kennel_images=implode(',',$kennel_images);	
				}	
				else
				{
					$kennel_images='';
				}
				$location = explode('|', $this->input->post('state'));
				$state_name =  $location[0];
				$state_id =  $location[1];
				
				  $string = strtolower($this->input->post('name'));
    
    // Replace spaces and special characters with hyphens
    $string = preg_replace('/[^a-z0-9]+/i', '-', $string);
    
    // Trim hyphens from the beginning and end of the string
    $slug = trim($string, '-');

		$data_insert = array(
				'country_code' => 'US',
				'password' => $this->enc_lib->passHashEnc($this->input->post('password')),
				'name' => $this->input->post('name'),
				'business_name' => $this->input->post('business_name'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				// 'usda'=>$this->input->post('usda'),
				'description'=>$this->input->post('description'),
				'address'=>$this->input->post('address'),
				'city'=>$this->input->post('city'),
				'state' => $state_name,
					'state_id' => $state_id,
				'zip_code'=>$this->input->post('zip_code'),
				'federal_license'=>$this->input->post('federal_license'),
				'usda_license'=>$this->input->post('usda_license'),
				'vet_check'=>$this->input->post('vet_checked'),
				'health_guarante'=>$this->input->post('guarante'),
				'guarante_length'=>$this->input->post('length'),
				'accept_terms' => 1,
				'photo'=>$NewImageName1,
			    'kennel_images'=>$kennel_images,
				'multiple_login'=>$this->input->post('allowlogin'),
				'registered_from' => 'puppyverify.com',
				'slug'=>$slug.date('MY'),
				'created_at' => date("Y-m-d H:i:s"),
				'updated_at' => date("Y-m-d H:i:s")
			);



			$insert =$this->common_model->create_record($data_insert, 'user_accounts');
			
				$body='Hi '.$this->input->post('name').',
				<br>
			Thank you for registering with My Pup Central. One of our team members is reviewing your profile and you will be notified shortly in your registered email Id.
			<br><br>
		
			<br><br>
			Best Regards,<br>
			My Pup Central Team';
// 			$this->mailer->send_mail($this->input->post('email'), 'Registration', $body);
    
    
    $body2='Name :'.$this->input->post('name').
			    '<br> Phone :'.$this->input->post('phone').
			    '<br> Email :'.$this->input->post('email').			   
			    '<br> Address :'.$this->input->post('address').	
			    '<br> City :'.$this->input->post('city').	
			    '<br> State :'.$this->input->post('state').	
			      '<br> Zipcode :'.$this->input->post('zip_code').	
			    '<br> Description :'.$this->input->post('description').
			    '<br> Created At: '.date("m/d/Y H:i:s");
			
			$this->mailer->send_mail('info@mypupcentral.com', 'New Registration', $body2);
			
		  //  $this->mailer->send_mail('mkeim1225@gmail.com', 'New Registration', $body2);

			$this->session->set_flashdata('msg', '<div class="alert alert-success">Account created. Please wait until the verification process to complete.</div>');
			redirect('login', 'refresh');
				
// 			}
		
// 			else{
// 				$data['msg'] = 'Upload Image';
// 				$data['page'] = 'front/register';
// 				$this->load->view('front/layout', $data);
// 			}
		}
	}
	else
	{
		$data['msg'] ='';
		$data['page'] = 'front/register';
		$this->load->view('front/layout', $data);
	}

		
	}
    public function about()
	{
		$data['title'] = 'About | MyPupCentral';

		$data['breeds'] = $this->common_model->ad_breed_count();
		
		// $slot = $this->ads_model->gettimeslots();
		
		$data['ads'] = $this->ads_model->get_ads();
		$data['blogs'] = $this->common_model->list_records('','blogs','','');


		$data['page'] = 'front/about';
		$this->load->view('front/layout', $data);
	}
	public function breeds()
	{
		
	}
	
	
	public function our_pledge()
	{
	    $seo = $this->ads_model->getseo(11);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
	   // 	$data['title'] = 'My Pup Central-Our Pledge';
         	$data['page'] = 'front/our_pledge';
	    	$this->load->view('front/layout', $data);
	}
	
	
	private function upload_files($path, $title, $files)
    {
	$config = array(
		'upload_path'   => $path,
		'allowed_types' => 'jpeg|jpg|png|pdf',
							
	);

	$this->load->library('upload', $config);

	$images = array();

	foreach ($files['name'] as $key => $image) {
		$_FILES['images[]']['name']= $files['name'][$key];
		$_FILES['images[]']['type']= $files['type'][$key];
		$_FILES['images[]']['tmp_name']= $files['tmp_name'][$key];
		$_FILES['images[]']['error']= $files['error'][$key];
		$_FILES['images[]']['size']= $files['size'][$key];

		$path = $_FILES['images[]']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);

		$fileName = random_string('alnum', 10).'_'.date("dmY").'.'.$ext;

		$images[] = $fileName;

		$config['file_name'] = $fileName;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('images[]')) {
			$this->upload->data();
		} else {
			return false;
		}
	}

	return $images;
}


        public function list_breeds()

         {
             $seo = $this->ads_model->getseo(3);
    		$data['title'] = $seo->meta_title;
    		$data['description'] = $seo->meta_description;
    		$data['keyword'] = $seo->meta_keywords;
        // 		$data['title'] = 'Breeds | MyPupCentral';

		    $data['breeds'] = $this->common_model->ad_breed_count();
		     
		    	$data['page'] = 'front/list_breeds';
	    	$this->load->view('front/layout', $data);
         }
         
         public function list_breeds_old()
         {
             redirect('available-breeds');
         }
         
         
          public function bookmarks()
		 {
		     $seo = $this->ads_model->getseo(14);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
		  //  	$data['title'] = 'My Favourites | MyPupCentral';
		
  $_SESSION['top_menu']='Bookmark';
		    $data['breeds'] = $this->common_model->ad_breed_count();

			$buk=$this->input->cookie('bookmarks');
			

			$data['result']=array();

			if(!empty($buk))
			{
				$bookmark=explode(',',$buk);

				$date42=date('Y-m-d H:i:s', strtotime('-45 days'));
				

				foreach($bookmark as $row)
				{
					$where=array('id'=>$row,'created_at >='=>$date42,'is_sold'=>0);
					$dat=$this->common_model->list_row('posts',$where);
					if(!empty($dat))
					{
						$data['result'][]=$dat;
					}
					
				}

			}
		    
		    $data['page'] = 'front/list_bookmarks';
	    	$this->load->view('front/layout', $data);
		 }
         
         
          public function update_bookmark()
		 {
			$buk=$this->input->cookie('bookmarks');
			 $bookmark=array();
			 $cnt=0;
			 if(!empty($buk))
			 {
			     $bookmark=explode(',',$buk);
                 $cnt=count($bookmark);
			 }
			 if($this->input->post('choose')==1)
			 {
			
				if(!empty($buk))
				{
					array_push($bookmark,$this->input->post('id'));
				}
				else{
					$bookmark=array($this->input->post('id'));
				}
				$cookie= array(

					'name'   => 'bookmarks',
					'value'  => implode(',',$bookmark),                            
					'expire' => '30000000',                                                                                   
					'secure' => TRUE
		 
				);
		 
				$this->input->set_cookie($cookie);
				$cnt++;
			 }
			 if($this->input->post('choose')==0)
			 {

				if (($key = array_search($this->input->post('id'), $bookmark)) !== false) {
					unset($bookmark[$key]);
				}
				$cookie= array(

					'name'   => 'bookmarks',
					'value'  => implode(',',$bookmark),                            
					'expire' => '30000000',                                                                                   
					'secure' => TRUE
		 
				);
		 
				$this->input->set_cookie($cookie);
				 $cnt--;
			 }
			 
			
			 $resp=array('status'=>'success','msg'=>'success','count'=>$cnt);
			 echo json_encode($resp);
		
		 }
		 
// 		 public function threedaypremium()
// 		 {
// 		    $slot = $this->ads_model->gettimeslots();
//     		foreach($slot as $slots)
//     		{
//     		    if($slots['premium_type'] == '5')
//     		    {
//         		    $slotperiod = $slots['last_published_date'];
//                     // $slotperiod2 = date('Y-m-d H:i:s', strtotime($slotperiod. ' + 3 days'));
//                     // $slotperiod3 = date('Y-m-d H:i:s', strtotime($slotperiod. ' + 1 days'));
//         // 			$nowslot = date('Y-m-d H:i:s');
//                     $diff = strtotime($slotperiod) - strtotime("now") ;
//                     $diff = abs(round($diff / 86400));
//                     // $diff2 = strtotime($slotperiod3) - strtotime("now");
//                     // $diff2 = abs(round($diff2 / 86400));
                    
//                     if($diff == '1')
//         			{
//         			    $up_data1=array(
//                             'is_published'=> '0',
//         	                'updated_at'=>date("Y-m-d H:i:s")
//         	              );
//         	              $this->common_model->update_records($up_data1,array('id'=>$slots['id']),' book_time_slot');	
//         	           $up_data2 = array(
//                             'is_timeslot'=> '0',
//         	                     'updated_at'=>date("Y-m-d H:i:s")
//         	              );
//         	              $this->common_model->update_records($up_data2,array('id'=>$slots['ad_id']),' posts');
//         			}
//         			if($diff == '4')
//         			{
//         			    if($slots['is_published'] == '0')
//         			    {
//             				$up_data1=array(
//                                 'last_published_date'=> date('Y-m-d H:i:s'),
//                                 'is_published'=> '1',
//             	                'updated_at'=>date("Y-m-d H:i:s")
//             	              );
//             	              $this->common_model->update_records($up_data1,array('id'=>$slots['id']),' book_time_slot');
            	              
//             	           $up_data2 = array(
//                                 'is_timeslot'=> '1',
//             	                     'updated_at'=>date("Y-m-d H:i:s")
//             	              );
//             	              $this->common_model->update_records($up_data2,array('id'=>$slots['ad_id']),' posts');
//         			    }
//         			}
//     		    }
//     		}
//     		var_dump($diff);
// 		 }
		 
		 
		 
public function gg($id=null)
{
    //  exit();
    // $dd=$this->common_model->list_records(array('created_at >='=>'2022-09-16 00:00:00'),'posts','id','desc',$limit=NULL);
     $dd=$this->common_model->list_records(array('id'=>$id),'posts','id','desc',$limit=NULL);
   //echo json_encode($dd);
   $cc=1;
   $cc2=1;
   foreach($dd as $row)
   {
    //   echo json_encode($row);
         $this->add_watermark('uploads/puppies/'.$row->featured_image, 1, $row->featured_image);
         
        //  echo '<a href="'.base_url().'uploads/puppies/'.$row->featured_image.'" download>'.base_url().'uploads/puppies/'.$row->featured_image.'</a>';
        //   echo '<br><a href="'.base_url().'uploads/puppies/'.$row->mother_photo.'" download>'.base_url().'uploads/puppies/'.$row->mother_photo.'</a>';
        //   echo '<br><a href="'.base_url().'uploads/puppies/'.$row->father_photo.'" download>'.base_url().'uploads/puppies/'.$row->father_photo.'</a>';
         $kk=$this->common_model->list_records(array('post_id'=>$row->id),'posts_pictures','id','desc',$limit=NULL);
        foreach($kk as $ro)
        {
            //   echo '<br><a href="'.base_url().'uploads/puppies/'.$ro->picture.'" download>'.base_url().'uploads/puppies/'.$ro->picture.'</a>';
              
              $this->add_watermark('uploads/puppies/'.$ro->picture, 0, $ro->picture);
            //  $cc2++;
        }
        
        
        //   $kkk=$this->common_model->list_records(array('post_id'=>$row->id),'posts_videos','id','desc',$limit=NULL);
        // foreach($kkk as $ros)
        // {
        //       echo '<br><a href="'.base_url().'uploads/puppies/'.$ros->video.'" download>'.base_url().'uploads/puppies/'.$ros->video.'</a>';
              
        //     //  $this->add_watermark('uploads/puppies/'.$ro->picture, 0, $ro->picture);
        //     //  $cc2++;
        // }
        
        // exit();
          $cc++;
       
    //   if(!empty($row->mother_photo))
    //   {
    //       $this->add_watermark('uploads/puppies/'.$row->mother_photo, 0, $row->mother_photo);
    //         $cc++;
    //   }
    
    //     $kk=$this->common_model->list_records(array('post_id'=>$row->id),'posts_pictures','id','desc',$limit=NULL);
    //     foreach($kk as $row)
    //     {
    //          $this->add_watermark('uploads/puppies/'.$row->picture, 0, $row->picture);
    //          $cc2++;
    //     }
        
        echo '<br><Br>';
   }
  echo $cc;
//   echo $cc2;


  
}
	
		 
		 
	private function add_watermark($file, $choose = 0, $name = null)
	{
	    $this->load->library('Image_moo');
		$exif = exif_read_data($file);

		$image_info = getimagesize($file);
		$image_width = $image_info[0];
		$image_height = $image_info[1];



		$a = 400;
		$b = 300;

		$c = 50;
		$d = 40;


		$temp1 = $image_height / $a;
		$temp2 = $image_width / $b;

		$new_width = $c * $temp2;
		$new_height = $d * $temp1;

		$this->load->library('image_lib');


		//puppy verify
		$newwat = 'wat_' . random_string('alnum', 16) . '.PNG';
		$config['source_image'] = 'assets/watermark/waterorg.png';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']     =  round($new_width);
		$config['height']   = round($new_height);
		$config['new_image'] = 'uploads/puppies/' . $newwat;


		$this->image_lib->clear();
		$this->image_lib->initialize($config);
		$this->image_lib->resize();

		//  $this->image_moo
		// ->load($file, $transparent_x = 5, $transparent_y = 5)
		// ->load_watermark('uploads/puppies/'.$newwat)
		// ->watermark(9)

		// ->save_pa("", "", TRUE);



		if (!empty($exif['Orientation'])) {
		  //  echo $exif['Orientation'];
			switch ($exif['Orientation']) {
				case 8:
					$this->image_moo
						->load($file, $transparent_x = 5, $transparent_y = 5)
						->rotate(90)
						->save('uploads/puppies/pv/wa_' . $name, TRUE);
					break;
				case 3:
					$this->image_moo
						->load($file, $transparent_x = 5, $transparent_y = 5)
						->rotate(180)
						->save('uploads/puppies/pv/wa_' . $name, TRUE);
					break;
				case 6:
					$this->image_moo
						->load($file, $transparent_x = 5, $transparent_y = 5)
						->rotate(-90)
						->save('uploads/puppies/pv/wa_' . $name, TRUE);
					break;
				default:
					$this->image_moo
						->load($file, $transparent_x = 5, $transparent_y = 5)
						->save('uploads/puppies/pv/wa_' . $name, TRUE);
			}



			$this->image_moo
				->load('uploads/puppies/pv/wa_' . $name, $transparent_x = 5, $transparent_y = 5)
				->load_watermark('uploads/puppies/' . $newwat)
				->watermark(9)
				->save('uploads/puppies/pv/wa_' . $name, TRUE);
		} else {
			$this->image_moo
				->load($file, $transparent_x = 5, $transparent_y = 5)
				->load_watermark('uploads/puppies/' . $newwat)
				->watermark(9)

				->save('uploads/puppies/pv/wa_' . $name, TRUE);
		}


		//600*600
		if (!empty($exif['Orientation'])) {
		    	$this->image_moo
				->load($file)
				->resize_crop(600, 600)
				->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
				
			switch ($exif['Orientation']) {
				case 8:
					$this->image_moo
						->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
						->rotate(90)
						->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
					break;
				case 3:
					$this->image_moo
						->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
						->rotate(180)
						->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
					break;
				case 6:
					$this->image_moo
						->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
						->rotate(-90)
						->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
					break;
				default:
					$this->image_moo
						->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
						->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
			}



		
		} else {
			$this->image_moo
				->load($file)
				->resize_crop(600, 600)
				->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
		}


		$this->image_moo
			->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
			->load_watermark('assets/watermark/watermark-2.png')
			->watermark(9)
			->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);




		if ($choose == 1) {

			if (!empty($exif['Orientation'])) {
			    
			    	$this->image_moo
					->load($file)
					->resize_crop(400, 400)
					->save('uploads/puppies/pv/thumb_' . $name, TRUE);
					
				switch ($exif['Orientation']) {
					case 8:
						$this->image_moo
							->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
							->rotate(90)
							->save('uploads/puppies/pv/thumb_' . $name, TRUE);
						break;
					case 3:
						$this->image_moo
							->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
							->rotate(180)
							->save('uploads/puppies/pv/thumb_' . $name, TRUE);
						break;
					case 6:
						$this->image_moo
							->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
							->rotate(-90)
							->save('uploads/puppies/pv/thumb_' . $name, TRUE);
						break;
					default:
						$this->image_moo
							->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
							->save('uploads/puppies/pv/thumb_' . $name, TRUE);
				}
			
			} else {
				$this->image_moo
					->load($file)
					->resize_crop(400, 400)
					->save('uploads/puppies/pv/thumb_' . $name, TRUE);
			}


			$this->image_moo
				->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
				->load_watermark('assets/watermark/watermark-2.png')
				->watermark(9)
				->save('uploads/puppies/pv/thumb_' . $name, TRUE);
		}

		unlink('uploads/puppies/' . $newwat);



		return true;
	}




public function forgot_password()
	{
		$data['title'] = 'Forgot Password | MyPupCentral';

	
		$data['page'] = 'front/forgot_password';
		$this->load->view('front/layout', $data);
	}

	public function check_forgot_password()
	{

		$this->form_validation->set_rules('login', 'Email or Phone', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>Something Went Wrong.</b></div>');

			redirect('Home/forgot_password');

		}
		else{
		    
		     $ipAddress = $_SERVER['REMOTE_ADDR'];
             $blacklist=$this->common_model->check_blacklist($ipAddress,$this->input->post('login'));
             
            if($blacklist==true)
            {
                 	$this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>Something Went Wrong.</b></div>');

			redirect('Home/forgot_password');
		exit;  
               
            }
            $add_blacklist=$this->common_model->add_blacklist($ipAddress,$this->input->post('login'));
            if($add_blacklist>=5)
            {
                $this->common_model->update_records(array('is_blacklisted'=>1),array('email'=>$this->input->post('login')),'blacklist');
                $this->common_model->update_records(array('is_blacklisted'=>1),array('ipaddress'=>$ipAddress),'blacklist');
                
               	$this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>Something Went Wrong.</b></div>');

			redirect('Home/forgot_password');
		exit;  
               
            }

			$res=$this->common_model->list_row('user_accounts',array('email'=>$this->input->post('login')));

			if(!empty($res))
			{
				$token=random_string('alnum', 50);
				$data=array(
					'forgot_password_token'=>$token,
					'forgot_password_token_time'=>date('Y-m-d H:i:s')
				);
				$this->common_model->update_records($data,array('id'=>$res->id),'user_accounts');


				$body2='Hi '.$res->name.',<br><br>

				There was a request to change your password!<br>
				
				If you did not make this request then please ignore this email.<br>
				
				Otherwise, please click this link to change your password: <br><br>
				<a href="'.base_url().'reset_password/'.$token.'">'.base_url().'reset_password/'.$token.'</a>
				';
			
				$this->mailer->send_mail($res->email, 'Reset Password', $body2);

				$data['title'] = 'Forgot Password';

	
				$data['page'] = 'front/forgot_password_success';
				$this->load->view('front/layout', $data);

			}
			else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger"><b>Invalid Email Id.</b></div>');

				redirect('Home/forgot_password');
			}


		
		}

	}


	public function reset_password($token)
	{
		$token= $this->uri->segment(2);
		
		$res=$this->common_model->list_row('user_accounts',array('forgot_password_token'=>$token));

		if(!empty($res))
		{
			$data['title'] = 'Reset Password';

			$data['token'] = $token;
			$data['page'] = 'front/reset_password';
			$this->load->view('front/layout', $data);
		}
		else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger"><b>Something Went Wrong!.</b></div>');

			redirect('login');
		}
	}

	public function update_password($token)
	{
		$res=$this->common_model->list_row('user_accounts',array('forgot_password_token'=>$token));

		if(!empty($res))
		{

		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[6]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
	
		if ($this->form_validation->run() == FALSE) {

			$data['msg'] = validation_errors();
			$this->session->set_flashdata('msg', '<div class="alert alert-danger"><b>'.validation_errors().'</b></div>');

			redirect('reset_password/'.$token);
		}
		else{

			$data=array(
				'password' => $this->enc_lib->passHashEnc($this->input->post('password')),
			);
			$this->common_model->update_records($data,array('id'=>$res->id),'user_accounts');
			$this->session->set_flashdata('msg', '<div class="alert alert-success"><b>Password Changed!</b></div>');

			redirect('login');

		}
		}
		else{
			redirect('login');
		}

	}
	
	
	
public function change_names()
	{
		$dd=$this->common_model->list_records(array(),'posts','id','desc',$limit=NULL);
// 		echo json_encode($dd);
// 		exit();

		foreach($dd as $row)
		{
		  
		  
		      if(strpos( $row->featured_image, '-' ) !== false ) {
		        	echo $row->featured_image;
		        		echo '<br>';
					$changed = str_replace('-', '_', $row->featured_image);
					echo $changed;
						echo '<br><br>';
			
		    }
		    
		   

				// exit();
		}
	}
	
	
// 	 public function update_slug()
//     {
        
//         $datas=$this->common_model->list_records(['status'=>'Active','is_puppyverify'=>1],'breeds','','');

//         foreach($datas as $row)
//         {
//             // echo json_encode( $row);
//             // exit();
//             $name=$row->breed_name;
//             $name=str_replace(' ', '-', $name); 
//               $name=str_replace('/', '-', $name); 
//               $name=$name.'-Puppies';
//               $name=strtolower($name);
              
//               $up_data1=array('page_slug'=>$name);
//               $this->common_model->update_records($up_data1,array('id'=>$row->id),' breeds');	
              
//             echo $name.'<br>';
//         }
//      }


public function rm_old_assets()
{
    // exit();
    $start_date = date('Y-m-d H:m:s');
    $end_date = date('Y-m-d', strtotime("-30 days"));
    // echo $end_date;
     $dd=$this->common_model->list_records(array('is_sold'=>1,'sold_date <='=>$end_date,'assets_cleared'=>0),'posts','id','desc',$limit=NULL);
    //  echo count($dd);
    //  exit();
    $cc=0;
    $cc2=0;
    $cc3=0;
     foreach($dd as $key=>$row)
     {
        //  echo $row->featured_image;
         
            unlink("uploads/puppies/pv/wa_600x600_".$row->featured_image);
            unlink("uploads/puppies/pv/thumb_".$row->featured_image);
             unlink("uploads/puppies/pv/wa_".$row->featured_image);
         
          $dd2=$this->common_model->list_records(array('post_id'=>$row->id),'posts_pictures','id','desc',$limit=NULL);
          
          foreach($dd2 as $r)
          {
           
                unlink("uploads/puppies/".$r->picture);
                 unlink("uploads/puppies/pv/wa_600x600_".$r->picture);
                
                unlink("uploads/puppies/pv/wa_".$r->picture);
                  $this->common_model->delete('posts_pictures', array('id'=>$r->id));
                $cc2++;
          }
          
           $dd3=$this->common_model->list_records(array('post_id'=>$row->id),'posts_videos','id','desc',$limit=NULL);
          
          foreach($dd3 as $r2)
          {
           
                 unlink("uploads/puppies/".$r2->video);
                 
                  $this->common_model->delete('posts_videos', array('id'=>$r2->id));
                
                $cc3++;
          }
         
         $cc++;
  
       $this->common_model->update_records(array("assets_cleared"=>1),array('id'=>$row->id),'posts');
         
     }
    
    //  echo $cc;
    //  echo '<br>';
    //  echo $cc2;
    //   echo '<br>';
    //  echo $cc3;
     $desc='Assets Cleared. '.$cc.' Posts,('.$cc2.' Pictures,'.$cc3.' Videos)';
     $this->common_model->create_record(array('description'=>$desc,'created_at'=>date('Y-m-d H:i:s')),'cron_status');
       echo json_encode(array('status'=>success,'msg'=> $desc));
}

/**
 * Custom validation function for phone number format
 */
public function validate_phone_format($phone) {
    // Remove all non-digit characters for validation
    $digits_only = preg_replace('/\D/', '', $phone);
    
    // Check if phone number has exactly 10 digits
    if (strlen($digits_only) !== 10) {
        $this->form_validation->set_message('validate_phone_format', 'Phone number must be exactly 10 digits.');
        return FALSE;
    }
    
    // Check if it's a valid US phone number format
    if (!preg_match('/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/', $phone)) {
        $this->form_validation->set_message('validate_phone_format', 'Please enter phone number in format (888) 555-3333.');
        return FALSE;
    }
    
    return TRUE;
}

	

	
}
