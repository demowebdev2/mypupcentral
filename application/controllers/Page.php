<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ads_model');
		$this->load->library('Mailer');
	
	}
	
// 	public function generate_slug()
// 	{
// 	    $dd=$this->common_model->list_records(array(),'user_accounts','id','DESC'); 
	    
// 	    foreach($dd as $rr)
// 	    {
	       
// 	         $string = strtolower($rr->name);
    
//             // Replace spaces and special characters with hyphens
//             $string = preg_replace('/[^a-z0-9]+/i', '-', $string);
            
//             // Trim hyphens from the beginning and end of the string
//             $string = trim($string, '-');
//              $this->common_model->update_records(array('slug'=>$string),array('id'=>$rr->id),'user_accounts');
//             echo $string;
//             echo '<br>';
// 	    }
// 	}
	
	public function seller($slug)
	{
	     
	
		$data['slug']=$slug;
		 $data['seller']=$this->common_model->list_row('user_accounts',array('slug'=>$slug));
// 		echo json_encode($data['seller']);
		$seller_id=$data['seller']->id;
		 $data['avg_rating']=0;
		 
		 	$data['title'] = $data['seller']->meta_title;
		$data['description'] = $data['seller']->meta_description;
		$data['keyword'] = $data['seller']->meta_keywords;
		 
		  $data['total']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$seller_id,'status'=>1));
       $data['star1']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$seller_id,'rating'=>1,'status'=>1));
       $data['star2']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$seller_id,'rating'=>2,'status'=>1));
       $data['star3']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$seller_id,'rating'=>3,'status'=>1));
       $data['star4']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$seller_id,'rating'=>4,'status'=>1));
       $data['star5']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$seller_id,'rating'=>5,'status'=>1));
        
         if( $data['total']>0)
       {
        $data['avg_rating'] = (1*$data['star1']+2*$data['star2']+3*$data['star3']+4*$data['star4']+5*$data['star5'])/$data['total'];
      
       }
       
		  $date42=date('Y-m-d H:i:s', strtotime('-45 days'));
		     $where=array('posts.created_at >='=>$date42,'posts.is_sold'=>0,'posts.user_id'=>$seller_id);
       $data['ads'] = $this->ads_model->get_ads($where,true);
       
		$data['page'] = 'front/seller';
		$this->load->view('front/layout', $data);
	}
	
	public function shopping()
	{
	     $seo = $this->ads_model->getseo(19);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
		
			$data['list']=$this->common_model->list_records(array('status'=>1),'shopping','id','DESC');
      
		$data['page'] = 'front/shopping';
		$this->load->view('front/layout', $data);
	}
	
    
    public function terms()
    {
        
// 	$data['title'] = 'Terms And Conditions | MyPupCentral';
        $seo = $this->ads_model->getseo(16);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
      
		$data['page'] = 'front/terms';
		$this->load->view('front/layout', $data);
    }
    public function shipping2()
    {
        redirect('transportation');
    }
     public function shipping()
    {
        $seo = $this->ads_model->getseo(5);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
        // $data['title'] = 'Puppy Travel | MyPupCentral';

      
		$data['page'] = 'front/shipping';
		$this->load->view('front/layout', $data);
    }
    
    public function success_stories_old()
    {
        redirect('reviews');
    }
    
    public function success_stories()
    {
        
        
        $seo = $this->ads_model->getseo(6);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
        // $data['title'] = 'Reviews | MyPupCentral';
        
         $data['total']=$this->common_model->count_records('breeder_review',array('status'=>1));
       $data['star1']=$this->common_model->count_records('breeder_review',array('rating'=>1,'status'=>1));
       $data['star2']=$this->common_model->count_records('breeder_review',array('rating'=>2,'status'=>1));
       $data['star3']=$this->common_model->count_records('breeder_review',array('rating'=>3,'status'=>1));
       $data['star4']=$this->common_model->count_records('breeder_review',array('rating'=>4,'status'=>1));
       $data['star5']=$this->common_model->count_records('breeder_review',array('rating'=>5,'status'=>1));
        
         if( $data['total']>0)
       {
        $data['avg_rating'] = (1*$data['star1']+2*$data['star2']+3*$data['star3']+4*$data['star4']+5*$data['star5'])/$data['total'];
      
       }
       
    //   $this->load->helper('captcha');
    //     $cap_data = array(
    // 'word' => '',
    // 'img_path' => './captcha/',
    // 'img_url' => base_url().'captcha/',
    //  'font_path' => './assets/PlaypenSans-Regular.ttf',
    // 'img_width' => '200',
    // 'img_height' => 50,
    // 'expiration' => 7200,
    // 'font_size'     => 20,
    // 'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
    // 'img_id'        => 'captcha_image',
    // 'img_alt'       => 'CAPTCHA Image',
    //     );
        
    //     $cap = create_captcha($cap_data);
        
    //     $data['captcha'] = $cap['image'];
    //     $data['token']=md5($cap['word']);
     
    //     $_SESSION['captcha_word']= $cap['word'];
        // $this->session->set_userdata('captcha_word', $cap['word']);

		$data['page'] = 'front/success_stories';
		$this->load->view('front/layout', $data);
    }
    
    public function load_captcha()
    {
         $this->load->helper('captcha');
        $cap_data = array(
    'word' => '',
    'img_path' => './captcha/',
    'img_url' => base_url().'captcha/',
     'font_path' => './assets/PlaypenSans-Regular.ttf',
    'img_width' => '200',
    'img_height' => 50,
    'expiration' => 7200,
    'font_size'     => 20,
    'pool'          => '123456789ABCDEFGHJKMNPQRSTUVWXYZ',
    'img_id'        => 'captcha_image',
    'img_alt'       => 'CAPTCHA Image',
        );
        
        $cap = create_captcha($cap_data);
        
        $data['captcha'] = $cap['image'];
        $data['token']=md5($cap['word']);
     
        $_SESSION['captcha_word']= $cap['word'];
        
        $resp=array('img'=>$cap['image']);
        
        echo json_encode($resp);
    }
    
    public function save_review()
    {
        $captcha_word = $this->input->post('captcha');
         
if($captcha_word != $_SESSION['captcha_word']){
    // exit();
     $this->session->set_flashdata('msg', 'validation_error');
           redirect('success-stories?status=2#review_form');
}


        $this->form_validation->set_rules('stars', 'Rating', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('message', 'Description', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) 
		{
            $this->session->set_flashdata('msg', 'validation_error');
           redirect('success-stories?status=2#review_form');
		} 
		else 
		{
		    
		     $ipAddress = $_SERVER['REMOTE_ADDR'];
             $blacklist=$this->common_model->check_blacklist($ipAddress,$this->input->post('email'));
             
            if($blacklist==true)
            {
                $this->session->set_flashdata('msg', 'validation_error');
           redirect('success-stories?status=2#review_form');
	        	exit;  
               
            }
            $add_blacklist=$this->common_model->add_blacklist($ipAddress,$this->input->post('email'));
            if($add_blacklist>=5)
            {
                $this->common_model->update_records(array('is_blacklisted'=>1),array('email'=>$this->input->post('email')),'blacklist');
                $this->common_model->update_records(array('is_blacklisted'=>1),array('ipaddress'=>$ipAddress),'blacklist');
                
                $this->session->set_flashdata('msg', 'validation_error');
                redirect('ad/'.$id);
	        	exit;  
               
            }
            
            
		    if(!empty($_FILES['img']))
			{
			$path="uploads/";
			$kennel_images=$this->upload_files($path, 'review', $_FILES['img']);	
			$kennel_images=$kennel_images;	
			}	
			else
			{
				$kennel_images='';
			}
			//echo $kennel_images;die();
            $data=array('user_account_id'=>0,
            'rating'=>$this->input->post('stars'),
            'message'=>$this->input->post('message'),
            'fullname'=>$this->input->post('name'),
            'state'=>$this->input->post('state'),
            'email'=>$this->input->post('email'),
            'img'=> $kennel_images,
            'created_at'=>date('Y-m-d H:i:s'));
            //print_r($data);die();
            $this->common_model->create_record($data,'breeder_review');
            $this->session->set_flashdata('msg', 'success');
            redirect('reviews?status=1');
        }
    }
    
    public function fetch_reviews($id)
    {
        $result=array();
        
		$config = array();
		$config["base_url"] = base_url() . "Ads/fetch_ads_data/".$id;
		$config["per_page"] = $_POST['page'];
		$config["use_page_numbers"] = FALSE;
		$config["uri_segment"] = 3;
		$config['display_pages'] = FALSE;
		$config["first_link"] = FALSE;
		$config["next_link"] = '<button class="btn btn-block btn-gradient mt-2 btn-lg incss-btn-3 more_rev_btn"> More Reviews </button>';
		$config["prev_link"] = FALSE;
		$config["last_link"] = FALSE;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $where=array('status'=>1);
        $result = $this->ads_model->get_review_pagination($where, $config["per_page"], $page,'id','DESC');
       
        $config["total_rows"] = $this->common_model->count_records('breeder_review',array('status'=>1));
       
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();

        if (!empty($result)) {
            foreach ($result as $row) {

                if(!empty($row->created_at))
                {
                     $date=date('F j, Y, g:i a' ,strtotime($row->created_at));
                     $rev_date=date('M d Y', strtotime($date));
                }
                else{
                     $rev_date='';
                }
               


                if($row->rating>=1){
                    $star1='btn-primary';
                }
                else{
                    $star1='btn-secondary';
                }

                if($row->rating>=2){
                    $star2='btn-primary';
                }
                else{
                    $star2='btn-secondary';
                }

                if($row->rating>=3){
                    $star3='btn-primary';
                }
                else{
                    $star3='btn-secondary';
                }

                
                if($row->rating>=4){
                    $star4='btn-primary';
                }
                else{
                    $star4='btn-secondary';
                }

                if($row->rating>=5){
                    $star5='btn-primary';
                }
                else{
                    $star5='btn-secondary';
                }
                if(!empty($row->img))
                {
                    $img='<img class="rev_img w-48 h-full rounded-sm  mt-2 mb-2" src="'.base_url().'uploads/'.$row->img.'" alt="">';
                    // $img = '<div class="review-block-title"><img src="'.base_url().'uploads/'.$row->img.'" class="img-fluid  w-25" /></div>';
                }
                else
                {
                     $img = '';
                }
               
                
                $view[]='
                <div class="col-md-1"></div>
        <div class="col-md-10 border border-secondary rounded-3 mt-2">  
            <div class="row p-4">
                <div class="col-md-3">
                    <div class="text-sm"><span class="font-medium">'.$row->fullname.'</span></div>  
                    <div class="text-sm mt-2"><span class="font-medium">'.$row->state.'</span></div>  
                    <div class="text-sm mt-2"><span class="font-medium">'.$rev_date.'</span></div>  
                    
                </div>
                <div class="col-md-9">
                    <div class="col-md-12 col-sm-12 pt-2" style="font-size: 16px;">
                        <i class="fa fa-star '.$star1.' btn rounded p-1" aria-hidden="true"></i>
                        <i class="fa fa-star '.$star2.' btn rounded p-1" aria-hidden="true"></i>
                        <i class="fa fa-star '.$star3.' btn rounded p-1" aria-hidden="true"></i>
                        <i class="fa fa-star '.$star4.' btn rounded p-1" aria-hidden="true"></i>
                        <i class="fa fa-star '.$star5.' btn rounded p-1" aria-hidden="true"></i>
                    </div>
                    <p class="mt-2 text-base leading-6">
                       '.$row->message.'
                    </p>    
                    <div class="">
                       '.$img.'
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        ';
               
            }
        }

        $data["products"] = $view;
		echo json_encode($data);
    }
    
    
     public function process()
    {
        $seo = $this->ads_model->getseo(4);
		$data['breeds'] = $this->common_model->ad_breed_count();
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
		$data['page'] = 'front/process';
		$this->load->view('front/layout', $data);
    }
    
    public function standard()
    {
        $seo = $this->ads_model->getseo(5);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
        $data['page'] = 'front/standard';
		$this->load->view('front/layout', $data);
    }
    
    public function faq()
    {
        $seo = $this->ads_model->getseo(8);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
        // $data['title'] = 'FAQ | MyPupCentral';

      
		$data['page'] = 'front/faq';
		$this->load->view('front/layout', $data);
    }
    
    public function avoid_scams()
    {
        
        // $data['title'] = 'Avoid Scams | MyPupCentral';

      $seo = $this->ads_model->getseo(15);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
		$data['page'] = 'front/avoid_scams';
		$this->load->view('front/layout', $data);
    }
    
    public function verify_breeder()
    {
        $seo = $this->ads_model->getseo(13);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
    //   $data['title'] = 'Verify Breeder | MyPupCentral';

      
		$data['page'] = 'front/verify_breeder';
		$this->load->view('front/layout', $data);
    }

    public function verify()
    {

    	$wheres=array('id'=>$this->input->post('id'),'is_verified'=>1);
    	$res=$this->common_model->list_row('user_accounts',$wheres);
    	if(!empty($res))
    	{
    		$resp=array('status'=>'success','msg'=>'<center><h3 class="text-success">This breeder ID belongs to one of our verified breeders.<br> Please email us for additional information or verification.</h3></center>');
    	}
    	else{
    		$resp=array('status'=>'error','msg'=>'<center><h3 class="text-danger">Invalid Breeder Id</h3></center>');
    	}

    	echo json_encode($resp);
    }
    
    
    public function blog()
	{
	    $seo = $this->ads_model->getseo(7);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
// 	$data['title'] = 'Blogs | MyPupCentral';

		$data['blogs'] = $this->common_model->list_records('','blogs','','');
		// $data['blogs'] = $this->common_model->list_records(array('website'=>'pv'),'blogs','','');
      
		$data['page'] = 'front/blog';
		$this->load->view('front/layout', $data);
	}


	public function premium_cronjob()
	{
		echo $this->common_model->three_day_plan_activate();
		 echo $this->common_model->three_day_plan_deactivate();
	}

	public function promo_cronjob()
	{
		$date14=date('Y-m-d H:i:s', strtotime('-14 days'));
		
		$where=array('txn_status'=>1,'discount_method'=>'2WEEKS','created_at >='=>$date14);
		$res=$this->common_model->list_records($where,'book_time_slot','id','ASC');

		foreach($res as $row)
		{
			$data=array('is_timeslot'=>0,'priority'=>0);
			$this->common_model->update_records($data,array('id'=>$row->ad_id),'posts');
			
		}
	}

	public function promo_cronjob2()
	{
		$date14=date('Y-m-d H:i:s', strtotime('-30 days'));
		
		$where=array('txn_status'=>1,'discount_method'=>'2WEEKS','created_at >='=>$date14);
		$res=$this->common_model->list_records($where,'book_time_slot','id','ASC');

		foreach($res as $row)
		{
			$data=array('is_timeslot'=>0,'priority'=>0);
			$this->common_model->update_records($data,array('id'=>$row->ad_id),'posts');
			
		}
	}
	
		public function up_txn()
	{
	    	$where=array('txn_status'=>1,'txn_id !='=>null);
		    $res=$this->common_model->list_records($where,'book_time_slot','id','ASC');
		    $cc=0;
		    foreach($res as $row)
		    {
		        	$data=array('txn_id'=>$row->txn_id,'txn_status'=>1,'discount_method'=>$row->discount_method,'premium_type'=>$row->premium_type,'sub_total'=>$row->total);
			        $this->common_model->update_records($data,array('id'=>$row->ad_id),'posts');
			        $cc++;
		    }
		    echo $cc;
	}
	
		public function expired_ads_notification_cronjob2()
	{
	$params = array('type' => 'Expired ads cronjob2', 'details' => 2222, 'created_at' => date('Y-m-d H:i:s'));
			$this->common_model->create_record($params, 'random_log');
			echo 'success';

}
	
	
	public function expired_ads_notification_cronjob()
	{

		$date42 = date('Y-m-d', strtotime('-46 days'));


		$where = array('posts.created_at >=' => $date42 . ' 00:00:00', 'posts.created_at <=' => $date42 . ' 23:59:59', 'posts.is_sold' => 0);
		$data = $this->ads_model->get_ads($where);
		$store = array();
		$cnt = 0;
		if (!empty($data)) {


			foreach ($data as $row) {
			    
			    $breeder=$this->common_model->list_row('user_accounts',array('id'=>$row->user_id));
			
				
				$store[] = $row->post_id;
				$cnt++;
				$msg = '<!DOCTYPE html>
		<html>
		<head>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title></title>
			<style>
			table , tr, td{
				border: 1px solid #484848; border-collapse: collapse;
				padding:10px;
			}
			</style>
		</head>
		<body><h4>Hi '.$breeder->name.', </h4>
		<p>Your ad has expired. <a href="'.base_url().'frontend/My_ads/read_repost/'. $row->post_id.'">Relist</a></p>
		<table style="">
		<tr> <td colspan="2"><center><img src="'.base_url().'uploads/puppies/pv/thumb_'.$row->featured_image.'" style="width:250px; height:250px"></center></td></tr>
		<tr> <td>Ad Id#</td><td><b>' . $row->post_id . '</b></td></tr>
		<tr> <td>Title</td><td><b>' . $row->title . '</b></td></tr>
		<tr> <td>Breed</td><td><b>' . $row->breed_name . '</b></td></tr>
		<tr> <td>Price</td><td><b>' . $row->asking_price . '</b></td></tr>
		</table>
		';

				$msg .= '<br><br>';
				$msg .= '<p>Thank you,<br>';
				$msg .= '<b>My Pup Central Team</b></p>';
				$msg .= '<img style="width:200px; height:auto" src="https://mypupcentral.com/assets/logo10.png"></body>
		</html>';
				$user = $this->common_model->list_row('user_accounts', array('id' => $row->user_id));
				 $this->mailer->send_mail($user->email, 'My Pup Central - Ad Expired', $msg);
			}
			$params = array('type' => 'Expired ads cronjob', 'details' => json_encode($store), 'created_at' => date('Y-m-d H:i:s'));
			$this->common_model->create_record($params, 'random_log');
		}

		echo json_encode(array('status'=>'success','msg'=>'Notification Sent'));
	}
	
	
		public function push_notification_cronjob()
	{
		
		
		$setup = $this->common_model->list_row('push_notification_setup', array('id' => 1));
		$today=date('D');
		$days=json_decode($setup->days);
		if ($setup->is_active == 1 && (in_array($today, $days))) {

			$last_log = $this->common_model->list_records(array('type' => 2), 'push_notification_log', 'id', 'DESC', 1);


			$where = array('posts.created_at >=' => $last_log[0]->created_at, 'posts.is_sold' => 0);
			$ads = $this->ads_model->get_ads($where);
			if (count($ads) > 0) {
				$count = count($ads);
				// $image = 'https://mypupcentral.com/uploads/puppies/pv/thumb_1654270791-Grover-2.jpg';
				 $image=base_url().'uploads/puppies/pv/'.$ads[0]->featured_image;
				$message = $setup->body;
				$title = $setup->title;
				$message = str_replace("{{New Puppies}}", $count, $message);
				$title = str_replace("{{New Puppies}}", $count, $title);
				
				$fields = array(
					'to'  => '/topics/mynoti',
					'priority' => 'high',
					'notification' => array(
						'body' => $message,
						'title' => $title,
						'sound' => 'default',
						'icon' => '',
						'image' => $image,
						'restaurant' => true,
						'restaurant_url' => ''
					),
					'data' => array(
						'message' => $message,
						'title' => $title,
						'sound' => 'default',
						'icon' => '',
						'image' => $image,
						'restaurant' => true,
						'restaurant_url' => ''
					)


				);

				// echo json_encode($fields);
				// exit();
				$res = $this->sendPushNotification($fields);
				$res = json_decode($res);

				$params=array(
					'type'=>2,
					'title'=>$title,
					'body'=>$message,
					'image'=>$image,
					'created_at'=>date('Y-m-d H:i:s')
				);
				
				$this->common_model-> create_record($params,'push_notification_log');

				echo 'Success';
			}
		}
	}


	private function sendPushNotification($fields = array())
	{
		$API_ACCESS_KEY = 'AAAAalsVMf8:APA91bHLWCEySGW2ViKEX6QII1AlH2imDr4uwya2bCMmzjmZL9jjAijSefP6zmMf18_prhqVWdoWBwCYvfG0GmczmCnJ6dB8aOXOYb6Th71MkI9D4GSz9Kf4N4AzKYrMdmkIQHWDrYgv';
		$headers = array(
			'Authorization: key=' . $API_ACCESS_KEY,
			'Content-Type: application/json'
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	
	
	public function training()
	{
	      $seo = $this->ads_model->getseo(17);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
      
		$data['page'] = 'front/training';
		$this->load->view('front/layout', $data);
	}
	
	

	public function request_training()
	{
		$this->load->library('stripe_lib');
		$data['title'] = 'Pay | MyPupCentral';

		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
		$this->form_validation->set_rules('puppy_name', 'Puppy Name', 'required');
		$this->form_validation->set_rules('breed', 'Breed', 'required');
		$this->form_validation->set_rules('puppy_dob', 'Puppy Date of Birth', 'required');
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('breeder', 'Breeder', 'required');
		$this->form_validation->set_rules('breeder_phone', 'Breeder Phone', 'required');
	

		if ($this->form_validation->run() == FALSE) {

			$seo = $this->ads_model->getseo(18);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;

		$data['breeds']=$this->common_model->list_records(array('is_puppyverify' => 1),'breeds','breed_name','ASC');
		$data['page'] = 'front/request_training';
		$this->load->view('front/layout', $data);

		} else {
			// If payment form is submitted with token
		

				if($this->input->post('plan')==0)
				{
					$price=1500;
						$org_price=1500;
					$plan='Puppy Basics - 3 Weeks Training Program $1500';
				}
				if($this->input->post('plan')==1)
				{
					$price=2500;
						$org_price=2500;
					$plan='Advanced Puppy- 5 Weeks Training Program $2500';
				}
				$breed=$this->common_model->list_row('breeds', array('id' => $this->input->post('breed')));
				
				$code=$this->input->post('promocode');
				$discount='';
				$discount_method='';
				if(!empty($code))
				{
					$code_resp=$this->check_promocode2($code,$this->input->post('plan'));
					if($code_resp['status']=='success')
					{
						$discount=$code_resp['dis'];
						$discount_method=$code;
						$price=$code_resp['total'];
					}
				}
				
				$insdata = array(
					'first_name' => $this->input->post('first_name'),
					'last_name' => $this->input->post('last_name'),
					'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'address' => $this->input->post('address'),
					'city' => $this->input->post('city'),
					'state' => $this->input->post('state'),
					'zipcode' => $this->input->post('zip_code'),
					'plan' => $this->input->post('plan'),
					'org_price'=>$org_price,
					'discount_method'=>$discount_method,
					'discount'=>$discount,
					'total'=>$price,
					'puppy_name' => $this->input->post('puppy_name'),
					'breed' => $this->input->post('breed'),
					'puppy_dob' => $this->input->post('puppy_dob'),
					'start_date' => $this->input->post('start_date'),
					'breeder' => $this->input->post('breeder'),
					'breeder_phone' => $this->input->post('breeder_phone'),
					'note' => $this->input->post('note'),
					'created_at' => date('Y-m-d H:i:s')
				);

				$ins_id = $this->common_model->create_record($insdata, 'training_request');
				
				

				if ($ins_id) {
					$result = $this->common_model->list_row('training_request', array('request_id' => $ins_id));
					// Retrieve stripe token, card and user info from the submitted form data
					$postData = $this->input->post();
                if($price==0)
				{
				    	$updata = array(
									'txn_id' => $code,
									'txn_status' => 1,
								);
								$this->common_model->update_records($updata,array('request_id'=>$result->request_id),'training_request');
								
				    	$paymentID =1;
				}
				else{
				    	if ($this->input->post('stripeToken')) {
				    // Make payment
					$paymentID = $this->payment($postData, $result, $ins_id);
				    	}
				    	else{
				    	    	$seo = $this->ads_model->getseo(18);
				$data['title'] = $seo->meta_title;
				$data['description'] = $seo->meta_description;
				$data['keyword'] = $seo->meta_keywords;
		
				$data['page'] = 'front/request_training';
				$this->load->view('front/layout', $data);
				exit();
				    	}
				}
					


					// If payment successful
					if ($paymentID) {
						$msg='<table>';
						$msg.='<tr><td>First Name</td><td>'.$insdata['first_name'].'</td></tr>';
						$msg.='<tr><td>Last Name</td><td>'.$insdata['last_name'].'</td></tr>';
						$msg.='<tr><td>Phone</td><td>'.$insdata['phone'].'</td></tr>';
						$msg.='<tr><td>Email</td><td>'.$insdata['email'].'</td></tr>';
						$msg.='<tr><td>Address</td>'.$insdata['address'].'<td></td></tr>';
						$msg.='<tr><td>City</td><td>'.$insdata['city'].'</td></tr>';
						$msg.='<tr><td>State</td><td>'.$insdata['state'].'</td></tr>';
						$msg.='<tr><td>Zipcode</td><td>'.$insdata['zipcode'].'</td></tr>';
						$msg.='<tr><td>Plan</td><td>'.$plan.'</td></tr>';
						$msg.='<tr><td>Discount Method</td><td>'.$insdata['discount_method'].'</td></tr>';
						$msg.='<tr><td>Discount</td><td>'.$insdata['discount'].'</td></tr>';
						$msg.='<tr><td>Total Paid</td><td>'.$insdata['total'].'</td></tr>';
						$msg.='<tr><td>Puppy Name</td><td>'.$insdata['puppy_name'].'</td></tr>';
						$msg.='<tr><td>Breed</td><td>'.$breed->breed_name.'</td></tr>';
						$msg.='<tr><td>Puppy Dob</td><td>'.$insdata['puppy_dob'].'</td></tr>';

						$msg.='<tr><td>Preferred Start Date</td><td>'.$insdata['start_date'].'</td></tr>';
						$msg.='<tr><td>Breeder</td><td>'.$insdata['breeder'].'</td></tr>';

						$msg.='<tr><td>Breeder Phone</td><td>'.$insdata['breeder_phone'].'</td></tr>';
						$msg.='<tr><td>Note</td><td>'.$insdata['note'].'</td></tr>';
						$msg.='<tr><td>Date</td><td>'.$insdata['created_at'].'</td></tr>';

						$msg.='</table>';
						
						$this->mailer->send_mail('info@mypupcentral.com', 'New Training Request', $msg);
						$this->mailer->send_mail('iamashishn@gmail.com', 'New Training Request', $msg);
						
						redirect(base_url() . 'Page/payment_success');
					} else {

						$apiError = !empty($this->stripe_lib->api_error) ? ' (' . $this->stripe_lib->api_error . ')' : '';
						// var_dump($apiError);
						// exit;
						$data['error_msg'] = 'Transaction has been failed!' . $apiError;
						$this->session->set_flashdata('msg', $data['error_msg']);
						redirect(base_url() . 'Page/payment_failed', $data);
					}
				}
		
		}
	}

	private function payment($postData, $result, $id)
	{

		$this->load->library('stripe_lib');


		// If post data is not empty
		if (!empty($postData)) {
			// Retrieve stripe token, card and user info from the submitted form data
			$token  = $postData['stripeToken'];
			$name = $result->first_name.' '.$result->last_name;
			$email = $result->email;
			$card_number = $postData['card_number'];
			$card_number = preg_replace('/\s+/', '', $card_number);
			$card_exp_month = $postData['card_exp_month'];
			$card_exp_year = $postData['card_exp_year'];
			$card_cvc = $postData['card_cvc'];
			// Unique order ID
			$orderID = $id;
			
				// Add customer to stripe
				$customer = $this->stripe_lib->addCustomer($email, $token);


				if ($customer) {
					// Charge a credit or a debit card
					$charge = $this->stripe_lib->createCharge($customer->id, $name, $result->total, $orderID, 'USD');

					if ($charge) {
						// Check whether the charge is successful
						if ($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1) {
							// Transaction details 
							$transactionID = $charge['balance_transaction'];
							$paidAmount = $charge['amount'];
							$paidAmount = ($paidAmount / 100);
							$paidCurrency = $charge['currency'];
							$payment_status = $charge['status'];
							
							// If the order is successful
							if ($payment_status == 'succeeded') {
							

								$updata = array(
									'txn_id' => $transactionID,
									'txn_status' => 1,
								);
								$this->common_model->update_records($updata,array('request_id'=>$result->request_id),'training_request');
								return 1;
							}
						}
					}
				}
			
		}
		return false;
	}

	public function payment_success()
	{
		$data['title'] = 'MyPupCentral-Success';

        $data['page'] = 'front/payment_success2';
        $this->load->view('front/layout', $data);
	}

	public function payment_failed()
	{
		$data['title'] = 'MyPupCentral-Failed';

        $data['page'] = 'front/payment_failed2';
        $this->load->view('front/layout', $data);
	}

	public function check_promocode()
	{
		$code=$this->input->post('code');
		$plan=$this->input->post('plan');
		$price=0;
		if($plan==0)
		{
			$price=1500;
		}
		if($plan==1)
		{
			$price=2500;
		}
		if(!empty($code))
		{
			$res=$this->common_model->list_row('training_promocode',array('code'=>$code));

			if(!empty($res))
			{
				if($res->type==1)
				{
					$dis=($res->value*$price)/100;
					$total=$price-$dis;
				}

				if($res->type==2)
				{
					$dis=$res->value;
					$total=$price-$res->value;
				}

				$data=array('status'=>'success','msg'=>'Promocode Applied.',"dis"=>$dis,'total'=>$total);

			}
			else{
				$data=array('status'=>'error','msg'=>'Invalid Code');
			}

		}
		else{
			$data=array('status'=>'error','msg'=>'Invalid');
		}

		
			echo json_encode($data);
		
	
	}

	
	private function check_promocode2($code,$plan)
	{
		
		$price=0;
		if($plan==0)
		{
			$price=1500;
		}
		if($plan==1)
		{
			$price=2500;
		}
		if(!empty($code))
		{
			$res=$this->common_model->list_row('training_promocode',array('code'=>$code));

			if(!empty($res))
			{
				if($res->type==1)
				{
					$dis=($res->value*$price)/100;
					$total=$price-$dis;
				}

				if($res->type==2)
				{
					$dis=$res->value;
					$total=$price-$res->value;
				}

				$data=array('status'=>'success','msg'=>'Promocode Applied.',"dis"=>$dis,'total'=>$total);

			}
			else{
				$data=array('status'=>'error','msg'=>'Invalid Code');
			}

		}
		else{
			$data=array('status'=>'error','msg'=>'Invalid');
		}

		
			return $data;
		
	
	}

    
}