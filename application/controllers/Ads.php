<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('ads_model');
		$this->load->library('Mailer');
	}


    
    public function ads()
    {
        	$data['breeds'] = $this->common_model->ad_breed_count();
        $data['breeds'] = $this->common_model->ad_breed_count();
        	$seo = $this->ads_model->getseo(2);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
        	
        // $data['title'] = 'Available Puppies | MyPupCentral';
        // if(!empty($_GET['search']))
        // {
        //      $data['title'] = 'Search results for '.$_GET['search'].' | MyPupCentral';
        // }
        // elseif(!empty($_GET['breed']))
        // {
        //     foreach($data['breeds'] as $row)
        //     {
        //         if($row->id==$_GET['breed'])
        //         {
        //             $data['title'] = 	$row->breed_name.' | MyPupCentral';
        //         }
        //     }
             
        // }
            $_SESSION['top_menu']='List';
        // $data['breeds'] = $this->common_model->list_records(array('status'=>'Active','is_puppyverify'=>'1'),'breeds','breed_name','ASC');
        	$data['breeds'] = $this->common_model->ad_breed_count();
        // $data['states'] = $this->common_model->search_state();
        // $data['blogs'] = $this->common_model->list_records('','blogs','','');
		$data['page'] = 'front/ads/list';
		$this->load->view('front/layout', $data);
    }

    public function adsload($ids, $stateid)
    {
    	$data['breeds'] = $this->common_model->ad_breed_count();
        $data['breeds'] = $this->common_model->ad_breed_count();
    	$seo = $this->ads_model->getseo(2);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
        $_SESSION['top_menu']='List';
        // $data['breeds'] = $this->common_model->list_records(array('status'=>'Active','is_puppyverify'=>'1'),'breeds','breed_name','ASC');
    	$data['breeds'] = $this->common_model->ad_breed_count();
        // $data['states'] = $this->common_model->search_state();
        // $data['blogs'] = $this->common_model->list_records('','blogs','','');
		$data['page'] = 'front/ads/listprocess';
		$data['ids'] = $ids;
		$data['stateid'] = $stateid;
		$this->load->view('front/layout', $data);
    }
    
    function fetch_ads_data($id)
    {
        $kk='';
        $view=array();
        $buk=$this->input->cookie('bookmarks');
        $bookmark=explode(',',$buk);
        
       $result=array();
        
		$config = array();
		$config["base_url"] = base_url() . "Ads/fetch_ads_data/".$id;
		$config["per_page"] = $_POST['page'];
		$config["use_page_numbers"] = FALSE;
		$config["uri_segment"] = 3;
		$config['display_pages'] = FALSE;
		$config["first_link"] = FALSE;
        $config['attributes'] = array('id' => 'next_Page');
		$config["next_link"] = '<button class="btn btn-default d-none mt10"> Load More <i class="fa fa-plus"></i></button>';
		$config["prev_link"] = FALSE;
		$config["last_link"] = FALSE;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $premium=date("Y-m-d H:i");

      //  $like=$_POST['location'];
       $search=array();
        if(!empty($_POST['search']))
        {
            $search=$_POST['search'];
        }
       $like=array();
        if(!empty($_POST['location']))
        {
            $like=array('posts.state_id'=>$_POST['location']);
        }
        $where=array('posts.is_sold'=>0);
        if(!empty($_POST['breed']))
        {
            $where=array('posts.category_id'=>$_POST['breed'],'posts.is_sold'=>0);
        }
        
        if($_POST['range_to']!=2000)
        {
            $where = array_merge($where,array('posts.asking_price <='=>$_POST['range_to']));
        }
        if($_POST['range_from']!=100)
        {
            $where = array_merge($where,array('posts.asking_price >='=>$_POST['range_from']));
        }
        
        
        $order_by=null;
        $order=null;
        if(!empty($_POST['sort']))
        {
            $order_by='posts.asking_price';
            if($_POST['sort']==1){$order='ASC';}
            else{$order='DESC';}
        }
        if($page==0)
        {
             $_SESSION['p_pagecount']= 0;
             $_SESSION['g_pagecount']=0;        }
       
        $where = array_merge($where,array('posts.priority'=>1));
        
         if(!empty($_POST['size']) && $_POST['size']!='All')
        {
            $where = array_merge($where,array('posts.puppy_size'=>$_POST['size']));
        }
        
         if( $_POST['training']==1)
        {
            $where = array_merge($where,array('posts.training_package'=>1));
        }
        
    //     $result = $this->ads_model->get_ads_pagination($where,$like, $config["per_page"], $page,$order_by,$order,2, $search);
        
    //     if(count($result)<$_POST['page'])
    //     {
    //          $where['posts.priority']=0;
    //     $cnt=count($result);
    //      $result2 =$this->ads_model->get_ads_pagination($where,$like,  $config["per_page"]-$cnt, $_SESSION['p_pagecount'],$order_by,$order,2, $search);
    //      $result = array_merge($result,$result2);
    //       $_SESSION['p_pagecount']= $_SESSION['p_pagecount']+ count( $result2);
        
    //       }
          
       
    //     if(count($result)<$_POST['page'])
    //   {
       
        unset($where['posts.priority']);
           $cnt=count($result);
        $result2 = $this->ads_model->get_ads_pagination($where,$like, $config["per_page"]-$cnt,  $_SESSION['g_pagecount'],$order_by,$order,1, $search);
        $result = array_merge($result,$result2);
        $_SESSION['g_pagecount']=$_SESSION['g_pagecount']+count($result2);
        //  }
        
        
        
     
        
        unset($where['posts.priority']);
        
        $config["total_rows"] = $this->ads_model->get_ads_pagination_count($where,$like);
       
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();
$cnt=0;


			if (!empty($result)) {
			    				$orgcnt=count($result);
			    			
				foreach ($result as $key=>$row) {   

                    if( $row->is_timeslot==1 )
                    {
              $premium_div=' <div class="ribbon-wrapper"><div class="glow-out">
                <div class="glow">&nbsp;</div>
                </div>
                        <div class="ribbon-front">Premium</div>
                        <div class="ribbon-edge-topleft"></div>
                        <div class="ribbon-edge-topright"></div>
                        <div class="ribbon-edge-bottomleft"></div>
                        
                    </div>';
                    }
                    else{
                        $premium_div='';
                    }

                    $fe_video='';
                    $fe_img='';
                    if($row->featured_image_from=='puppyverify.com'){$lnk= PV; }else{ $lnk= NS; } 
                    if($row->featured_video_from=='puppyverify.com'){$lnk2= PV; }else{ $lnk2= NS; } 
                    if (!empty($row->featured_video)) {

                        $fe_video=  '<div class="videoSlate" style="width:100%; position:relative; background-color:#000; ">
                        <video class="thevideo" muted loop  style="width:100%;height:200px;margin: 0px auto;">
                            <source src="'.$lnk2.'uploads/puppies/'.$row->featured_video.'"  type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        <img src="'.base_url().'assets/watermark.png" style="position:absolute; right:10px; top:10px; opacity:0.5; width:60px">
                    </div>';
                    }
                   if(!empty($row->featured_image)) {

                        $fe_img='<img src="'.$lnk.'uploads/puppies/pv/thumb_'.$row->featured_image.'" style="
                        width: 100%;
                        object-fit: cover;
                        " class="lazyload thumbnail no-margin" alt="'.$row->title.'- '.$row->breed_name.' - My Pup Central" data-nsfw-filter-status="sfw">
                                                                    ';
                    }
					
					 if (in_array($row->postid, $bookmark)) { $save='removebookmark'; }else{ $save='addbookmark';}
					 $cnt++;
					 	if ($cnt == 1 || fmod($cnt, 30) == 1) {
					 	    	$extra='<div class="row">';
        						$view[]=$kk;
                                $kk='';
					 	}
					 	else{
						$extra='';
						
					}
					
					if ($cnt == 30 || fmod($cnt, 30) == 0) {
	$extra1='</div>';
}
else{ 
					    	$extra1='';
					}

				// 	echo fmod($cnt, 5);
				// 	 if(fmod($cnt, 5)==0)
				// 	{
					   
				// 		$extra='<div class="row">';
				// 		$view[]=$kk;
    //                     $kk='';
                      
				// 	}
				// 	else{
				// 		$extra='';
						
				// 	}
    //                 $extra1='';
    //                 if(fmod($cnt, 5)==4)
				// 	{
					
				// 		$extra1='</div>';
				// 	}
				
				// 	else{ 
				// 	    	$extra1='';
				// 	}

				// 	$cnt++;
				if($cnt==1)
				{
				    $div='scroll_elem'.$id;
				}
				else{
				    $div='';
				}
				
				$training_badge='';
				if($row->training_package==1)
				{
				    	$training_badge='<div class="training_badge pt-1 pb-1 ">Training Available</div>';
			
				}
				
					$kk .=$extra. ' <div class="col-6 col-md-3 col-lg scroll_elem_div" id="'.$div.'">
                    <div class="item-list p-0 mb-3">

                        <div class="row aqr">
                            <div class="col-sm-2 col-12 no-padding photobox">
                                <div class="add-image w-100">
                                    <span class="photo-count"><i class="fa fa-camera"></i> 3 </span>
                                    <a href="'.base_url().'ad/'.$row->postid.'">
                                        <div class="postImg-slick d-flex gap-4">
                                          '. $fe_video.'
                                            '. $fe_img.'
                                        </div>
                                    </a>
                                    '.$training_badge.'
                                </div>
                            </div>
                            
                            	<div class="col-12 add-desc-box pl-2" style="max-width: 100%;padding-left:10px;padding-right: 10px;">
											<div class="items-details">
											 '.$premium_div.'
											 
												<div class="row" style="width: 100%;">
												<div class="text-center">	<div class="col-12" style=" padding: 10px 0px 0px;">
													<span class="item-location">
															

														'.$row->breed_name.'


														</span></div></div>
													<div class="text-center"><div class="col-12" style=" padding: 0px; width:100%">
														<h5 class="add-title">
															<a href="'.base_url().'ad/'. $row->postid .'">
															 '.$row->title.'
															</a>
														</h5>
													</div></div>
													<div class="text-center">
													<div class="col-12">
													
														<h2 class="item-price pb-0" style=" padding: 0px;align-items: center;color:#8cc63f;">
															 $'. $row->asking_price .' </h2>
													</div></div>
												<div class="text-center">	<div class="col-12" style=" padding: 10px 0px 0px;">
													<span class="item-location">
															<i class="icon-location-2"></i>&nbsp;

														'.$row->address.'


														</span></div></div>
												</div>


												<h5 class="add-title">

												</h5>

												<span class="info-row">
													<span class="date">
														<i class="icon-clock"></i> Sep 27th, 2021 at 10:31
													</span>
													<span class="category">
														<i class="icon-folder-circled"></i>&nbsp;
														<!--<a href="https://learning-ideas.com/puppyverify/assets/front/category/airedale-terrier" class="info-link">-->
														Airedale Terrier
														<!--</a>-->
													</span>

												</span>

											</div>
										</div>
										
										<div class="col-4 text-end price-box" style="padding-right:10px;white-space: nowrap;    max-width: 30%;align-items: center;">
                                <div class="row w-100">
                                    
                                    <div class="col-12 m-0 p-0 d-flex justify-content-end">
                                        <a class="btn btn-default btn-sm make-favorite '.$save.'" id="'.$row->postid.'">
                                            <i class="fa fa-heart"></i> <span>Save</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                          

                            
                        </div>
                    </div>
                    </div>'.$extra1;
				}
				$qq='';
			$tempp=fmod($cnt, 5);
		
		if(	$tempp!=0)
		{
		    for($i=0; $i<5-$tempp; $i++)
					{
					   $qq.='<div class="col-sm-6 col-md-3 col-lg"></div>';
					}
		}

					
						$view[]='<div class="text-center">'.$kk.$qq.'</div></div>';
		
			
				//  if(fmod($cnt, 5)!=0 )
				// 	{
				// 	    	$tempp=fmod($cnt, 5);
				// 	    $org=5;
				// 	    	if($cnt==1)
    //             			{
    //             			    $org=5;
    //             			}
					 
				
					
					
				 
				// 	$qq='';
				// 	for($i=0; $i<$org-$tempp; $i++)
				// 	{
				// 	    $qq.='<div class="col-sm-6 col-md-3 col-lg"></div>';
				// 	}
				// 	$view[]=$kk.$qq.'</div>';
				// 	}
				
                $data['status']=1;
			} else {
                $data['status']=0;
				$view[] = "<div class='col-12 col-md-12 p-2'><div class='text-center'><br><br><br><br><h2 style='font-size:60px'><i class='fas fa-search'></i></h2><h3><b>Sorry! No Result found.</b></h3></div></div>";
			}
		 
		$data["products"] = $view;
		echo json_encode($data);

    }


    public function ad($id)
    {
        

		$data['breeds'] = $this->common_model->list_records(array('status'=>'Active','identity'=>'pv'),'breeds','breed_name','ASC');

        $res=$this->ads_model->get($id);

        $data['result']=$res[0];
  $data['avg_rating']=0;
  
 
        // $data['title'] =  $data['result']->title.' | '.$data['result']->breed_name.' | MyPupCentral';
         $data['title'] = $res[0]->meta_title;
		$data['description'] = $res[0]->meta_description;
  
        $data['pictures']=$this->common_model->list_records(array('post_id'=>$id),'posts_pictures','id','ASC');
        $data['videos']=$this->common_model->list_records(array('post_id'=>$id),'posts_videos','id','ASC');

        $data['contact_person']=$this->common_model->list_row('contact_person',array('id'=>$res[0]->contact_name));
        
         $data['seller']=$this->common_model->list_row('user_accounts',array('id'=>$res[0]->user_id));
       // echo json_encode($data['result']);
       
        $data['total']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'status'=>1));
       $data['star1']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>1,'status'=>1));
       $data['star2']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>2,'status'=>1));
       $data['star3']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>3,'status'=>1));
       $data['star4']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>4,'status'=>1));
       $data['star5']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>5,'status'=>1));
        
         if( $data['total']>0)
       {
        $data['avg_rating'] = (1*$data['star1']+2*$data['star2']+3*$data['star3']+4*$data['star4']+5*$data['star5'])/$data['total'];
      
       }
       
        $date42=date('Y-m-d H:i:s', strtotime('-45 days'));
       $where2=array('posts.created_at >='=>$date42,'posts.is_sold'=>0,'priority'=>1,'posts.user_id'=>$res[0]->user_id);
       $where=array('posts.created_at >='=>$date42,'posts.is_sold'=>0,'posts.user_id'=>$res[0]->user_id);
       $data['ads'] = $this->ads_model->get_ads($where);
    //   $data['premium_ads'] = $this->ads_model->get_premiumads($where2);

		$data['page'] = 'front/ads/single_ad';
		$this->load->view('front/layout', $data);
    }
    
    
     public function ad2($id)
    {
        // $data['title'] = 'My Pup Central- Home';

		$data['breeds'] = $this->common_model->list_records(array('status'=>'Active','identity'=>'pv'),'breeds','breed_name','ASC');

        $res=$this->ads_model->get($id);

        $data['result']=$res[0];
  $data['avg_rating']=0;
   $data['title'] = $res[0]->meta_title;
		$data['description'] = $res[0]->meta_description;
//   $data['title'] =  $data['result']->title.' | '.$data['result']->breed_name.' | MyPupCentral';
  
        $data['pictures']=$this->common_model->list_records(array('post_id'=>$id),'posts_pictures','id','ASC');
        $data['videos']=$this->common_model->list_records(array('post_id'=>$id),'posts_videos','id','ASC');

        $data['contact_person']=$this->common_model->list_row('contact_person',array('id'=>$res[0]->contact_name));
        
         $data['seller']=$this->common_model->list_row('user_accounts',array('id'=>$res[0]->user_id));
       // echo json_encode($data['result']);
       
        $data['total']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'status'=>1));
       $data['star1']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>1,'status'=>1));
       $data['star2']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>2,'status'=>1));
       $data['star3']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>3,'status'=>1));
       $data['star4']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>4,'status'=>1));
       $data['star5']=$this->common_model->count_records('breeder_review',array('user_account_id'=>$res[0]->user_id,'rating'=>5,'status'=>1));
        
         if( $data['total']>0)
       {
        $data['avg_rating'] = (1*$data['star1']+2*$data['star2']+3*$data['star3']+4*$data['star4']+5*$data['star5'])/$data['total'];
      
       }

		$data['page'] = 'front/ads/single_ad2';
		$this->load->view('front/layout', $data);
    }
    
    public function setviewcount()
    {
        $id = $this->input->post('id');
         
        $view_count = $this->common_model->getsingleviewcount($id);
        
        $view_count = $view_count + 1 ;
        
        $view_update = array(
            
			'view_count' => $view_count,
            );
        
        $viewupdate = $this->ads_model->update_post('posts',$view_update,$id);
        
        // var_dump($viewupdate);exit;
        
    }
    
    public function sendenquiry()
    {
        $this->session->set_userdata('top_menu', 'Add Enquiry');
        $id = $this->input->post('post_id');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            
            $captcha_word = $this->input->post('captcha');
         
if($captcha_word != $_SESSION['captcha_word']){
    // exit();
     $this->session->set_flashdata('msg', 'validation_error');
          if(empty($id))
             {
                  redirect('seller/'.$this->input->post('url'));
             }
             else{
                  redirect('ad/'.$id);
             }
}



       
        $this->form_validation->set_rules('from_name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('from_phone', 'phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('from_email', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('body', 'Description', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            // $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.validation_errors().'</div>');
             $this->session->set_flashdata('msg', 'validation_error');
          if(empty($id))
             {
                  redirect('seller/'.$this->input->post('url'));
             }
             else{
                  redirect('ad/'.$id);
             }
        }
        else{
             $ipAddress = $_SERVER['REMOTE_ADDR'];
             $blacklist=$this->common_model->check_blacklist($ipAddress,$this->input->post('from_email'));
             
            if($blacklist==true)
            {
                  $this->session->set_flashdata('msg', 'enquiry_error');
                    redirect('ad/'.$id);
               
            }
            $add_blacklist=$this->common_model->add_blacklist($ipAddress,$this->input->post('from_email'));
            if($add_blacklist>=5)
            {
                $this->common_model->update_records(array('is_blacklisted'=>1),array('email'=>$this->input->post('from_email')),'blacklist');
                $this->common_model->update_records(array('is_blacklisted'=>1),array('ipaddress'=>$ipAddress),'blacklist');
                
                 $this->session->set_flashdata('msg', 'enquiry_error');
                   if(empty($id))
             {
                  redirect('seller/'.$this->input->post('url'));
             }
             else{
                  redirect('ad/'.$id);
             }
               
            }
            else{
                $indata = array(
                    'ipaddress' => $ipAddress,
                    'email' => $this->input->post('from_email'),
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->common_model->create_record($indata,'blacklist');
            }
            
            $isn_data=array('contact_person_id'=>$this->input->post('contact_id'),
                    'breeder_id'=>$this->input->post('breeder_id'),
                    'post_id'=>$id,
                    'name' => $this->input->post('from_name'),
                    'phone'=> $this->input->post('from_phone'),
                    'email'=> $this->input->post('from_email'),
                    'enquiry'=> $this->input->post('body'),
                    'status'=>0,
                    'created_at'=>date("Y-m-d H:i:s"),
                    'updated_at'=>date("Y-m-d H:i:s")
              );

              $this->common_model->create_record($isn_data,'enquiries');
              $body='Hi '.$this->input->post('breeder_name').',
                <br>
            You have an inquiry from ' .$this->input->post('from_name'). '
          <br>
            Contact Number : '.$this->input->post('from_phone').'
            <br><br>
            Email : '.$this->input->post('from_email').'
            <br><br>
            Inquiry : ' .$this->input->post('body'). ' . 
            <br><br>
			Best Regards,<br>
			My Pup Central Team<br>
			<img style="width:200px; height:auto" src="https://mypupcentral.com/assets/logo10.png">';
            
            $this->mailer->send_mail($this->input->post('breeder_email'), 'Inquiry', $body);
    // $this->mailer->send_mail('iamashishn@gmail.com', 'Inquiry', $body);
            // $this->session->set_flashdata('msg', '<div class="alert alert-success">Enquiry Submitted Successfully.</div>');
            $this->session->set_flashdata('msg', 'enquiry_success');
            
           if(empty($id))
             {
                  redirect('seller/'.$this->input->post('url'));
             }
             else{
                  redirect('ad/'.$id);
             }
        }
        }
        else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Inquiry not Submitted. Please try again.</div>');
          if(empty($id))
             {
                  redirect('seller/'.$this->input->post('url'));
             }
             else{
                  redirect('ad/'.$id);
             }
        }
    
    }
    
    
     public function save_review($id=null)
    {
        $captcha_word = $this->input->post('captcha');
         
if($captcha_word != $_SESSION['captcha_word']){
    // exit();
     $this->session->set_flashdata('msg', 'validation_error');
     if($id==null)
     {
          redirect('seller/'.$this->input->post('url'));
     }
     else{
          redirect('ad/'.$id);
     }
           
}

        $this->form_validation->set_rules('stars', 'Rating', 'trim|required|xss_clean');
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('state', 'State', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		//$this->form_validation->set_rules('message', 'Description', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) 
		{
            $this->session->set_flashdata('msg', 'validation_error');
            if($id==null)
             {
                  redirect('seller/'.$this->input->post('url'));
             }
             else{
                  redirect('ad/'.$id);
             }
		} 
		else 
		{
		    
		     $ipAddress = $_SERVER['REMOTE_ADDR'];
             $blacklist=$this->common_model->check_blacklist($ipAddress,$this->input->post('email'));
             
            if($blacklist==true)
            {
                $this->session->set_flashdata('msg', 'validation_error');
            if($id==null)
             {
                  redirect('seller/'.$this->input->post('url'));
             }
             else{
                  redirect('ad/'.$id);
             }
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
            $data=array('user_account_id'=>$this->input->post('id'),
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
             if($id==null)
             {
                  redirect('seller/'.$this->input->post('url'));
             }
             else{
                  redirect('ad/'.$id);
             }
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
		$config["next_link"] = '<button class="btn btn-default mt10"> Next <i class="fa fa-arrow-circle-right"></i></button>';
		$config["prev_link"] = ' <button class="btn btn-default mt10"><i class="fa fa-arrow-circle-left"></i> Previous</button>';
		$config["last_link"] = FALSE;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $where=array('user_account_id'=>$_POST['id'],'status'=>1);
        $result = $this->ads_model->get_review_pagination($where, $config["per_page"], $page,'id','DESC');
       
        $config["total_rows"] = $this->common_model->count_records('breeder_review',array('user_account_id'=>$_POST['id'],'status'=>1));
       
		$this->pagination->initialize($config);
		
		$data["links"] = $this->pagination->create_links();

        if (!empty($result)) {
            foreach ($result as $row) {

                $date=date('F j, Y, g:i a' ,strtotime($row->created_at));


                if($row->rating>=1){
                    $star1='btn btn-warning btn-xs review-block-rate_btn';
                }
                else{
                    $star1='btn btn-default btn-grey btn-xs review-block-rate_btn';
                }

                if($row->rating>=2){
                    $star2='btn btn-warning btn-xs review-block-rate_btn';
                }
                else{
                    $star2='btn btn-default btn-grey btn-xs review-block-rate_btn';
                }

                if($row->rating>=3){
                    $star3='btn btn-warning btn-xs review-block-rate_btn';
                }
                else{
                    $star3='btn btn-default btn-grey btn-xs review-block-rate_btn';
                }

                
                if($row->rating>=4){
                    $star4='btn btn-warning btn-xs review-block-rate_btn';
                }
                else{
                    $star4='btn btn-default btn-grey btn-xs review-block-rate_btn';
                }

                if($row->rating>=5){
                    $star5='btn btn-warning btn-xs review-block-rate_btn';
                }
                else{
                    $star5='btn btn-default btn-grey btn-xs review-block-rate_btn';
                }
                if(!empty($row->img))
                {
                    $img = '<div class="review-block-title"><img src="'.base_url().'uploads/'.$row->img.'" class="img-fluid  w-25" /></div>';
                }
                else
                {
                     $img = '';
                }
                $view[] ='<div class="row">
                <div class="col-sm-3">
                    <div class="review-block-name"><a href="#">'.$row->fullname.'</a></div>
                    <div class="review-block-name"><a href="#">'.$row->state.'</a></div>
                    <div class="review-block-date">'.date('M d Y', strtotime($date)).'</div>
                </div>
                <div class="col-sm-9">
                    <div class="review-block-rate">
                        <button type="button" class="'.$star1.'" aria-label="Left Align">
                        <i class="fas fa-star"></i>
                    </button>
                        <button type="button" class="'.$star2.'" aria-label="Left Align">
                            <i class="fas fa-star"></i>
                        </button>
                        <button type="button" class="'.$star3.'" aria-label="Left Align">
                            <i class="fas fa-star"></i>
                        </button>
                        <button type="button" class="'.$star4.'" aria-label="Left Align">
                            <i class="fas fa-star"></i>
                        </button>
                        <button type="button" class="'.$star5.'" aria-label="Left Align">
                            <i class="fas fa-star"></i>
                        </button>
                    </div>
                    <div class="review-block-description">'.$row->message.'</div>
                    '.$img.'
                </div>
            </div>
            <hr />';
            }
        }

        $data["products"] = $view;
		echo json_encode($data);
    }

public function sold_ads()
    {
        $seo = $this->ads_model->getseo(10);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
        // $data['title'] = 'Adopted Puppies | MyPupCentral';

        $data['breeds'] = $this->common_model->list_records(array('status'=>'Active','identity'=>'pv'),'breeds','breed_name','ASC');
        $data['blogs'] = $this->common_model->list_records('','blogs','','');
        $data['page'] = 'front/ads/sold_list';
        $this->load->view('front/layout', $data);
    }
 function fetch_ads_sold($id)
    {
      $result=array();
        
        $config = array();
        $config["base_url"] = base_url() . "Ads/fetch_ads_sold/".$id;
        $config["per_page"] = $_POST['page'];
        $config["use_page_numbers"] = FALSE;
        $config["uri_segment"] = 3;
        $config['display_pages'] = FALSE;
        $config["first_link"] = FALSE;
        $config["next_link"] = '<button class="btn btn-default mt10"> Next <i class="fa fa-arrow-circle-right"></i></button>';
        $config["prev_link"] = ' <button class="btn btn-default mt10"><i class="fa fa-arrow-circle-left"></i> Previous</button>';
        $config["last_link"] = FALSE;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $premium=date("Y-m-d H:i");

        //$like=$_POST['location'];
       $like =null ;
        $where=array();
       
       // $date =  date('m/d/Y',strtotime('+30 days',strtotime('05/06/2016'))) . PHP_EOL;
        $days_30_before =  date('Y-m-d', strtotime('today - 30 days'));
       $start_date = date('Y-m-d H:m:s');
    $end_date = date('Y-m-d', strtotime("-30 days"));
   
          $where=['posts.is_sold'=>1, 'sold_date >'=>$end_date];
       
        $order_by=null;
        $order=null;
        if(!empty($_POST['sort']))
        {
            $order_by='posts.asking_price';
            if($_POST['sort']==1){$order='ASC';}
            else{$order='DESC';}
        }
       
            $result = $this->ads_model->get_ads_pagination($where,$like, $config["per_page"], $page,$order_by,$order,2);
       
       if(count($result)<$_POST['page'])
       {
           $cnt=count($result);
        $result2 = $this->ads_model->get_ads_pagination($where,$like, $config["per_page"]-$cnt, $page,$order_by,$order,1);
        $result = array_merge($result,$result2);
         }


        $config["total_rows"] = $this->ads_model->get_ads_pagination_count($where,$like);
       
        $this->pagination->initialize($config);
        
        $data["links"] = $this->pagination->create_links();

                
            if (!empty($result)) {
                foreach ($result as $row) {

                    
               $premium_div=' <div class="ribbon-wrapper active"><div class="glow-out">
                 <div class="glow">&nbsp;</div>
                 </div>
                         <div class="ribbon-front">I FOUND MY FAMILY!</div>
                         <div class="ribbon-edge-topleft"></div>
                         <div class="ribbon-edge-topright"></div>
                         <div class="ribbon-edge-bottomleft"></div>
                        
                     </div>';
                     
                      if($row->featured_image_from=='puppyverify.com'){$lnk= PV; }else{ $lnk= NS; } 
                    if($row->featured_video_from=='puppyverify.com'){$lnk2= PV; }else{ $lnk2= NS; } 
                    
                    if($row->sold_date>=$days_30_before)
                    { 

                    $fe_video='';
                    $fe_img='';
                    if (!empty($row->featured_video)) {

                        $fe_video=  '<div class="videoSlate" style="width:100%; ">
                        <video class="thevideo" muted loop  style="width:100%;height:200px;margin: 0px auto;">
                            <source src="'.$lnk2.'uploads/puppies/'.$row->featured_video.'"  type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>';
                    }

                    if (!empty($row->featured_image)) {

                        $fe_img='<img src="'.$lnk.'uploads/puppies/pv/thumb_'.$row->featured_image.'" style="
                        width: 100%;
                        object-fit: cover;
                        min-height: 200px" class="lazyload thumbnail no-margin" alt="'.$row->title.'- '.$row->breed_name.' - My Pup Central" data-nsfw-filter-status="sfw">
                                                                    ';
                    }
                    
                    $view[] = ' <div class="col-lg-3">
                    <div class="item-list p-0 mb-3">

                        <div class="row aqr">
                            <div class="col-sm-2 col-12 no-padding photobox">
                                <div class="add-image w-100">
                                    <span class="photo-count"><i class="fa fa-camera"></i> 3 </span>
                                    <a href="javascript:void(0)">
                                        <div class="postImg-slick d-flex gap-4">
                                          '. $fe_video.'
                                            '. $fe_img.'
                                        </div>
                                    </a>
                                </div>
                            </div>
                            
                                <div class="col-12 add-desc-box pl-2" style="max-width: 100%;padding-left:10px;padding-right: 10px;">
                                            <div class="items-details">
                                             '.$premium_div.'
                                             
                                                <div class="row" style="width: 100%;">
                                                    <div class="col-6" style=" padding: 0px;">
                                                        <h5 class="add-title">
                                                            <a href="javascript:void(0)">
                                                             '.$row->title.'
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <h2 class="item-price pb-0" style=" padding: 0px;display: flex;align-items: center;color:#8cc63f;">
                                                             $'. $row->asking_price .' </h2>
                                                    </div>
                                                    <div class="col-12" style=" padding: 10px 0px 0px;">
                                                    <span class="item-location">
                                                            <i class="icon-location-2"></i>&nbsp;

                                                        '.$row->address.'


                                                        </span></div>
                                                </div>


                                                <h5 class="add-title">

                                                </h5>

                                                <span class="info-row">
                                                    <span class="date">
                                                        <i class="icon-clock"></i> Sep 27th, 2021 at 10:31
                                                    </span>
                                                    <span class="category">
                                                        <i class="icon-folder-circled"></i>&nbsp;
                                                        <!--<a href="https://learning-ideas.com/puppyverify/assets/front/category/airedale-terrier" class="info-link">-->
                                                        Airedale Terrier
                                                        <!--</a>-->
                                                    </span>

                                                </span>

                                            </div>
                                        </div>
                                        
                                        <div class="col-4 text-end price-box" style="padding-right:10px;white-space: nowrap;    max-width: 30%;align-items: center;">
                               
                            </div>

                          

                            
                        </div>
                    </div>
                    </div>';
                     // $view[] = '<div class="col-12 col-md-12 p-2"><div class="text-center"><br><br><br><br><h2 style="font-size:60px"><i class="fas fa-search"></i></h2><h3><b>'. $date.'<br>'.$days_30_before.'</b></h3></div></div>';
               }// before 30 days if
                }
            } else {
                $view[] = '<div class="col-12 col-md-12 p-2"><div class="text-center"><br><br><br><br><h2 style="font-size:60px"><i class="fas fa-search"></i></h2><h3><b>Sorry! No Result found.</b></h3></div></div>';
            }
         
        $data["products"] = $view;
      //  $data['date'] = $date;
       // $data['days_30_before'] = $days_30_before;
        echo json_encode($data);

    }


  public function pay()
    {
        if(!empty($this->input->post('pay')) && !empty($this->input->post('post_id')))
        {
            $post=$this->common_model->list_row('posts',array('id'=>$this->input->post('post_id')));

            $account=$this->common_model->list_row('user_accounts',array('id'=>$post->user_id));

            if($this->input->post('pay')==1)
            {
                $amount=200;
                $item='Mypupcentral Deposit. Puppyname : '.$post->title;
            }
            else{
                $amount=$post->asking_price;
                $item='Mypupcentral Pay in Full. Puppyname :'.$post->title;
            }
        $this->load->library('paypal_lib'); 
        $currency = 'USD';
        // $config['business'] = 'testdeveloper024@gmail.com';
        // $this->config->set_item('business', 'testdeveloper024@gmail.com');
		//Set variables for paypal form
		$returnURL = base_url().'ad/'.$this->input->post('post_id'); //payment success url
		$cancelURL = base_url().'ad/'.$this->input->post('post_id'); //payment cancel url
		$notifyURL =base_url().'ad/';  //ipn url
		//get particular product data

		$userID = $this->session->userdata('userId'); //current user id
		$logo = base_url() . 'my-assets/images/logo.png';
		$currency_code = $currency;

		$this->paypal_lib->add_field('business',$account->paypal_email);
			$this->paypal_lib->add_field('return', $returnURL);
			$this->paypal_lib->add_field('cancel_return', $cancelURL);
			$this->paypal_lib->add_field('notify_url', $notifyURL);
			$this->paypal_lib->add_field('item_name',  $item);
			$this->paypal_lib->add_field('item_number',  $this->input->post('post_id'));
			$this->paypal_lib->add_field('amount',  $amount);
			$this->paypal_lib->add_field('landing_page',  'billing');
			$this->paypal_lib->add_field('custom',  'pack');
			$this->paypal_lib->add_field('currency_code',  $currency_code);
			$this->paypal_lib->image($logo);
		
		


		$this->paypal_lib->paypal_auto_form();

        }
    }
    
    
        public function get_search_result()
    {

        $search=array();
        if(!empty($_POST['search']))
        {
            $search=$_POST['search'];
        
        $like=array();
        $where=array('posts.is_sold'=>0);
        $order_by=null;
        $order=null;
        $result = $this->ads_model->get_ads_pagination($where,$like, 20,  0,$order_by,$order,1, $search);
        if(!empty($result))
        {
            $op='';
            foreach($result as $key=>$row)
            {
                if($row->featured_image_from=='puppyverify.com'){$lnk= PV; }else{ $lnk= NS; } 
                $op.='<a href="'.base_url().'ad/'.$row->postid.'">
                <div class="search-result-div" style="padding:5px; overflow:hidden">
                    <div class="row">
                        <div class="col-4">
                            <img src="'.$lnk.'uploads/puppies/pv/thumb_'.$row->featured_image.'" style="width: 100px;">
                        </div>
                        <div class="col-8 pt-3">
                            <h4>'.$row->title.'</h4>
                            <h4 style="color: #8cc640;"><b>$'.$row->asking_price.'</b></h4>
                        </div>
                    </div>
                </div>   
                </a>         ';

            }

            $op.='<a href="'.base_url().'ads?search='.$search.'">
            <div class="search-result-div">
                <div class="row">
                    
                    <div class="col-md-12">
                      <div class="text-center"> <h4 class="pt-2 pb-2" style="color:#a6e1ff">Show More Results!</h4></div>
                    </div>
                </div>
            </div>   
            </a>         ';
        }
        else{
            $op='<div class="text-center"><h4 class="pt-5">No Result Found!</h4></div>';
        }
    }
    else{
        $op='<div class="text-center"><h4 class="pt-5">No Result Found!</h4></div>';
    }
       


        $resp=array('status'=>'success' ,'msg'=>$op);
        echo json_encode($resp);
    }
    
    
     public function load_size()
    {
        $breed=$this->common_model->list_row('breeds',array('id'=>$this->input->post('breed')));
        if(!empty($breed->breed_size))
        {
            $data=' <div class="InputGroup mt-4">';
            $data.=' <input type="radio" name="size" id="size_0" value="All" checked />
                     <label for="size_0">All</label>';
            $size=json_decode($breed->breed_size);
            foreach($size as $key=>$row)
            {
               $cc=$key+1;
                $data.=   ' <input type="radio" name="size" id="size_'.$cc.'" value="'.$row.'" />
                <label for="size_'.$cc.'">'.$row.'</label>'  ;
               

               
            }
            $data.=' </div>';
        }
        else{
            $data='';
        }

        $resp=array('status'=>'success','data'=>$data);
        echo json_encode($resp);
       
    }
    
    public function get_states($id = null)
    {
        if ($id != null) {
            $where = array('category_id' => $id);
        } else {
            $where = array();
        }
        $result = $this->ads_model->get_ad_states($where);

        $res = array();
        $new = array('id' => '', 'text' => 'Search By State');
        $res[] = $new;
        foreach ($result as $row) {
            $new = array('id' => $row->state_id, 'text' => $row->STATE_NAME);
            $res[] = $new;
        }

        echo json_encode($res);
    }
    
     public function get_states_new($id,$stateid)
    { 
        if ($id != null || $id != '0') {
            $where = array('category_id' => $id);
        } else {
            $where = array();
        }
        $result = $this->ads_model->get_ad_states($where);
        if ($stateid != null) {
            $where = array('ID' => $stateid);
        } else {
            $where = array();
        }
        $resultstate = $this->ads_model->get_ad_states_new($where);
        //print_r($resultstate);
        $res = array();
        //if ($stateid != null || $id != '0') {
        if($stateid != '0')
        {
            $new = array('id' => $resultstate[0]->ID, 'text' => $resultstate[0]->STATE_NAME);
        }
        else
        {
             $new = array('id' => '', 'text' => 'Search By State');
        }
        $res[] = $new;
        foreach ($result as $row) {
            $new = array('id' => $row->state_id, 'text' => $row->STATE_NAME);
            $res[] = $new;
        }

        echo json_encode($res);
    }
    
      private function upload_files($path, $title, $files)
    {
    	$config = array
    	(
    		'upload_path'   => $path,
    		'allowed_types' => 'jpeg|jpg|png',
    							
    	);
    	$this->load->library('upload', $config);
    	$_FILES['images']['name']= $files['name'];
		$_FILES['images']['type']= $files['type'];
		$_FILES['images']['tmp_name']= $files['tmp_name'];
		$_FILES['images']['error']= $files['error'];
		$_FILES['images']['size']= $files['size'];
		$path = $_FILES['images']['name'];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$fileName = random_string('alnum', 10).'_'.date("dmY").'.'.$ext;
		$images = $fileName;
		$config['file_name'] = $fileName;
		$this->upload->initialize($config);
		if ($this->upload->do_upload('images')) 
		{
			$this->upload->data();
		}
		else 
		{
			return false;
		}
    	return $images;
    }

}