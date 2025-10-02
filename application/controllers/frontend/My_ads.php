<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class My_ads extends User_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('ads_model');
        $this->load->model('premiumads_model');
    }

    public function index()
    {
        $data['title'] = 'MyPupCentral-My Ads';

        $this->session->set_userdata('top_menu', 'My_ads');

        $user_id = $_SESSION['siteuser']['id'];
        // $data['post'] = $this->ads_model->getallpostbreeder();

	$data['ads']=$this->common_model->list_records(array('user_id'=>$_SESSION['siteuser']['id']),'posts','id','DESC',1);
		
		
        $data['page'] = 'front/profile/my_ads';
        $this->load->view('front/layout', $data);
    }
    
    public function fetch_all_ads()
    {
        $user_id = $_SESSION['siteuser']['id'];
        $where = array('posts.user_id'=>$user_id,'is_sold'=>0,'posts.uploaded_from'=>'puppyverify.com');
        $result = $this->ads_model->make_datatable($where);
        $data = array();
        $count = 1;

        foreach ($result as $row) {
            
            $date1 = date_create(date("Y-m-d H:i:s"));
            $date2 = date_create($row->createdate);
            $diff = date_diff($date1, $date2);
            $days = $diff->format("%a");
        
            $action = '';
            $sub_array = array();
            
            // Add checkbox column for bulk actions
            $sub_array[] = '<input type="checkbox" class="ad-checkbox" data-post-id="'.$row->post_id.'" data-status="'.$row->is_sold.'" data-days-left="'.$days.'" style="transform: scale(1.2);">';
            
            if (!empty($row->featured_image)) {
                $sub_array[] = '<img height="100px" width="100px" src="' . base_url() . 'uploads/puppies/' . $row->featured_image . '">';
            } else {
                $sub_array[] = '<video controls id="video-tag" height="100px" width="100px" style="object-fit: cover;">
                <source id="video-source" src="'.base_url() .'uploads/puppies/' . $row->featured_video . '">
                </video>';
            }
            // $sub_array[] = $row->post_id;

            $sub_array[] = $row->title;

            $sub_array[] = $row->full_name;

            $sub_array[] = date('F j, Y',strtotime($row->available_date));

            $sub_array[]='<b> Puppy Name :</b>'.$row->puppy_name.'<br>
                            <b> Puppy Breed :</b>'.$row->breed_name.'<br>
                            <b> Puppy DOB :</b> '.date('F j, Y',strtotime($row->puppy_dob)).'<br>
                            <b> Puppy Sex :</b>'.$row->puppy_sex.'<br>
                            <b> Puppy Size :</b> '.$row->puppy_size;
            $sub_array[]='<b>$ '.$row->asking_price.'</b><br><br><input type="hidden" value="'.$row->post_id.'" name="ad_id" id="ad_id_'.$row->post_id.'"><button style="padding:2px"  class="btn btn-xs btn-primary price_change" id="price_change_'.$row->post_id.'">Change Price</button><input class="d-none" value="'.$row->asking_price.'" name="asking_price" id="asking_price_'.$row->post_id.'"><br><br><button style="padding:2px" id="update_price_'.$row->post_id.'" class="btn btn-xs btn-primary d-none update_price">Update Price</button>';
            
            $deletelink = base_url('frontend/AdController/delete/').$row->post_id;
            $escapedUrl = htmlspecialchars(json_encode($deletelink));
            $duplication ='<a href="'.base_url().'posts/duplicatead/'.$row->post_id.'" class="duplicate" title="Duplicate Ad">
                                                <i class="fas fa-copy" style="font-size:20px;"></i></a><br>';
            if($days<=45){
                $ddys=45-$days;
                 $sub_array[]='<p class="text-success"><b>'.$ddys.' Days Left</b></p>';
                //  if($row->premium_type == '4' || $row->premium_type == '6')
                //  {
                //      if($row->is_premium_merged==1)
                //      {
                //           $sub_array[]='<p><b class="text-warning"> Daily Premium Pack </b>is Active in <a href="https://puppyverify.com" target="_blank">puppyverify.com</a> & <a href="https://nosheddoodles.com"target="_blank">nosheddoodles.com </p> ';
                //      }
                //      else{
                //           $sub_array[]='<p><b class="text-warning"> Daily Premium Pack </b>is Active in <a href="https://'.$row->created_from.'" target="_blank">'.$row->created_from.'</a> </p> ';
                //      }
                    
                //  }
                //  elseif($row->premium_type == '8' || $row->premium_type == '9')
                //  {
                //      if($row->is_premium_merged==1)
                //      {
                //           $sub_array[]='<p><b class="text-warning"> 3 times daily Premium Pack </b>is Active in <a href="https://puppyverify.com" target="_blank">puppyverify.com</a> & <a href="https://nosheddoodles.com"target="_blank">nosheddoodles.com </p> ';
                //      }
                //      else{
                //           $sub_array[]='<p><b class="text-warning"> 3 times daily Premium Pack </b>is Active in <a href="https://'.$row->created_from.'" target="_blank">'.$row->created_from.'</a> </p> ';
                //      }
                    
                //  }
                //  elseif($row->premium_type == '5' || $row->premium_type == '7')
                //  {
                //      $sub_array[]='<p><b class="text-warning"> Once in 3 days Premium Pack </b>is Active</p>';
                //  }
                //  else
                //  {
                //      if($row->uploaded_from=='puppyverify.com')
                //      {
                //           $sub_array[]=' ';
                //      }
                //      else{
                //           $sub_array[]='Ad created from Nosheddoodles.com';
                //      }
                   
                //  }
                  
                $repost = '';
                 $action='<a href="'.base_url().'posts/edit/'.$row->post_id.'">
                                                <i class="fas fa-edit" style="font-size:20px;"></i>
                                            </a><br>
                            <a href="'.base_url().'ad/'.$row->post_id.'">
                                                <i class="fas fa-eye" style="font-size:20px;"></i>
                                            </a><br>
                                           ';
            }
            else{
                $sub_array[]='<p class="text-danger"><b>Expired</b></p>';
                // $sub_array[]='';
                $repost = '<button type="button" class="btn btn-primary btn-sm icon-btn edit-modal-button"  data-post_id="'. $row->post_id . '">Repost</button><br>';
                $action='';
            }
           
             if($row->is_sold==1)
            {
            $status = '<input type="button"  class="btn btn-success btn-sm mt-1 success tgl_checkbox" data-id="'.$row->post_id.'"data-status="'.$row->is_sold.'"id="tgl_checkbox_'.$row->post_id.'">';
             }
         else
            {
            $status = '<input type="button" value="Mark Adopted" class="btn btn-danger btn-sm mt-1 success tgl_checkbox" data-id="'.$row->post_id.'"data-status="'.$row->is_sold.'"id="tgl_checkbox_'.$row->post_id.'">'; 
            }
            
                  $sub_array[]= $action.$duplication.$repost.$status;
           
          
           
       
            $data[] = $sub_array;
            $count++;
        }

        $output = array(
            "draw"                  =>         intval($_POST["draw"]),
            "recordsTotal"          =>       $this->ads_model->count_all_data($where),
            "recordsFiltered"        =>      $this->ads_model->get_filtered_data($where),
            "data"                  =>         $data
        );
        echo json_encode($output);
    }

    //---------------slot booking and **Stripe**-------------------------------------------  
    public function book_slot($id)
    {
        $data['title'] = 'MyPupCentral-Book Slot';

        $this->session->set_userdata('top_menu', 'My_ads');

        $res = $this->ads_model->get($id);
        
        $data['breeds']=$this->common_model->list_row('breeds',array('id'=>$res[0]->category_id,'is_puppyverify'=>1,'is_noshed'=>1));

        $data['ad'] = $res[0];

        $data['time_slots'] = $this->common_model->list_records(array('status' => 1,'application'=>'pv'), 'time_slots', 'id', 'ASC');

        $data['remaining_days'] = 45;
        $date1 = date_create(date("Y-m-d H:i:s"));
        $date2 = date_create($res[0]->created_at);
        $diff = date_diff($date1, $date2);
        $days = $diff->format("%a");

        if ($days < 45) {
            $data['remaining_days'] = 45 - $days;
        } else {
            $data['remaining_days'] = 0;
        }

        $data['page'] = 'front/profile/book_slot';
        $this->load->view('front/layout', $data);
    }

    public function get_price()
    {
        // $date=array();
        // $date=$this->input->post('date');
        // $number=array();
        // $number=$this->input->post('number');
        
        $type=$this->input->post('time0');
         
        $total=0;
        // foreach($date as $key=>$row)
        // {
        //     $time=array();
        //     $time=$this->input->post('time'.$number[$key]);


        //     foreach($time as $tm)
        //     {
                $res=$this->common_model->list_row('time_slots',array('id'=>$type));
                // $total=$total+$res->price;
        //     }
        if(empty($res))
        {
            if($this->input->post('merge')==1)
            {
                 $total=0;
            }
            else{
                $total= 0;
            }
        }
        else{
            if($this->input->post('merge')==1)
            {
                 // $total=$res->price+30;
                $total=$res->price;
            }
            else{
                // $total= $res->price+$res->base_price;
                $total=$res->price;
            }
        }
      

        // }
        $result=array('status'=>'success','msg'=>$total);
        echo json_encode($result);
    }  
    
    public function getdiscountprice()
    {
        $promo = trim($this->input->post('promo_code'));
        $type  = $this->input->post('time0');
        $res1   = $this->common_model->list_row('time_slots',array('id'=>$type));
        // $total = $res1->base_price+$res1->price;
        $total = $res1->price;
        
        if($this->input->post('merge')==1)
        {
             // $total=  $res1->price+30;
             $total=  $res1->price;
        }
        
        $user_id = $_SESSION['siteuser']['id'];
        
        $res2   = $this->common_model->list_row('promocode',array('promo_code'=>$promo));
        $res3   = $this->common_model->list_row('used_promocodes',array('promocode'=>$promo,'seller_id'=>$user_id));
        
        if($res2 != '')
        {
            if($res2->premium_type_id == $type || $res2->premium_type_id==0)
            {
            if($res2->limit_type == '0')
            {
                if(strtotime("now") >= strtotime($res2->valid_from) && strtotime("now") <= strtotime($res2->valid_till))
                {
                    
                    if($res3 != '')
                    {
                        if($res3->times >= $res2->usage_times)
                        {
                            $total_amount = 'Promo code already used';
                        }
                        else
                        {
                            if($res2->discount_type == '1')
                            {
                                $amountgot = ($total / 100 ) * $res2->percentage ;
                                
                                $max = $res2->amount_limit;
                                
                                if($amountgot > $max)
                                {
                                    $amount = $max;
                                }
                                else
                                {
                                    $amount = $amountgot;
                                }
                            }
                            elseif($res2->discount_type == '0')
                            {
                                $amount = $res2->amount;
                                $max = $res2->amount_limit;
                                
                                if($amount > $max)
                                {
                                    $amount = $max;
                                }
                                else
                                {
                                    $amount = $amount;
                                }
                            }
                            
                            // $up_data=array(
                            //     'times'=> $res3->times + 1,
                            //      'updated_at'=>date("Y-m-d H:i:s")
                            //       );
                            //       $this->common_model->update_records($up_data,array('promocode'=>$promo,'seller_id'=>$user_id),'used_promocodes');
                            
                            $total_amount = $total - $amount; 
                            
                        }
                    }
                    else
                    {
                        if($res2->discount_type == '1')
                            {
                                $amountgot = ($total / 100 ) * $res2->percentage ;
                                
                                $max = $res2->amount_limit;
                                
                                if($amountgot > $max)
                                {
                                    $amount = $max;
                                }
                                else
                                {
                                    $amount = $amountgot;
                                }
                            }
                            elseif($res2->discount_type == '0')
                            {
                                $amount = $res2->amount;
                                $max = $res2->amount_limit;
                                
                                if($amount > $max)
                                {
                                    $amount = $max;
                                }
                                else
                                {
                                    $amount = $amount;
                                }
                            }
                            
                            // $data = array(
                            //     'seller_id' => $user_id,
                            //     'promocode' => $res2->promo_code,
                            //     'times' =>1,
                            //     'created_at' => date("Y-m-d H:i:s"),
                            //     'updated_at' => date("Y-m-d H:i:s")
                            // );
            
                            // $ins_id = $this->common_model->create_record($data, 'used_promocodes');
                            
                            $total_amount = $total - $amount; 
                    }
                    
                }
                else
                {
                    $total_amount = 'Promo code expired';
                }
            }
            else
            {
               if($res3 != '')
                    {
                        if($res3->times >= $res2->usage_times)
                        {
                            $total_amount = 'Promo code already used';
                        }
                        else
                        {
                            if($res2->discount_type == '1')
                            {
                                $amountgot = ($total / 100 ) * $res2->percentage ;
                                
                                $max = $res2->amount_limit;
                                
                                if($amountgot > $max)
                                {
                                    $amount = $max;
                                }
                                else
                                {
                                    $amount = $amountgot;
                                }
                            }
                            elseif($res2->discount_type == '0')
                            {
                                $amount = $res2->amount;
                                $max = $res2->amount_limit;
                                
                                if($amount > $max)
                                {
                                    $amount = $max;
                                }
                                else
                                {
                                    $amount = $amount;
                                }
                            }
                            
                            // $up_data=array(
                            //     'times'=> $res3->times + 1,
                            //      'updated_at'=>date("Y-m-d H:i:s")
                            //       );
                            //       $this->common_model->update_records($up_data,array('promocode'=>$promo,'seller_id'=>$user_id),'used_promocodes');
                            
                            $total_amount = $total - $amount; 
                            
                        }
                    }
                    else
                    {
                        if($res2->discount_type == '1')
                            {
                                $amountgot = ($total / 100 ) * $res2->percentage ;
                                
                                $max = $res2->amount_limit;
                                
                                if($amountgot > $max)
                                {
                                    $amount = $max;
                                }
                                else
                                {
                                    $amount = $amountgot;
                                }
                            }
                            elseif($res2->discount_type == '0')
                            {
                                $amount = $res2->amount;
                                $max = $res2->amount_limit;
                                
                                if($amount > $max)
                                {
                                    $amount = $max;
                                }
                                else
                                {
                                    $amount = $amount;
                                }
                                
                            }
                            
                            // $data = array(
                            //     'seller_id' => $user_id,
                            //     'promocode' => $res2->promo_code,
                            //     'times' =>1,
                            //     'created_at' => date("Y-m-d H:i:s"),
                            //     'updated_at' => date("Y-m-d H:i:s")
                            // );
            
                            // $ins_id = $this->common_model->create_record($data, 'used_promocodes');
                            
                           $total_amount = number_format($total, 2)-number_format($amount,2); 
                    }
                }
            }
            else
            {
                $total_amount = "Promocode ".$promo." can't be used for this pack";
            }
            
            }
              elseif($promo=='OWNER' && ($_SESSION['siteuser']['id']==16 || $_SESSION['siteuser']['id']==42 || $_SESSION['siteuser']['id']==25 || $_SESSION['siteuser']['id']==39) )
            {
                $total_amount = 0;
            }
            else{
                $total_amount = 'Promocode '.$promo.' does not exist';
            }
        
        $result=array('status'=>'success','msg'=>number_format($total_amount, 2));
        echo json_encode($result);
    }


    public function proceed_pay($id)
    {
        $this->form_validation->set_rules('time0', 'The Premium Category', 'trim|required|xss_clean');
       // $this->form_validation->set_rules('time[]', 'Time', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">' . validation_errors() . '</div>');

            redirect('book_slot/' . $id, 'refresh');
        } else {
            $ad = $this->ads_model->get($id);

        
          
            if (!empty($ad)) {
                $data = array(
                    'ad_id' => $id,
                    'total' =>0,
                    'sub_total' =>0,
                    'payment_gateway' => 'stripe',
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s")
                );

                $ins_id = $this->common_model->create_record($data, 'book_time_slot_main');


                // $date=array();
                // $date=$this->input->post('date');
                // $number=array();
                // $number=$this->input->post('number');
                
                $type = $this->input->post('time0');
                $promo = trim($this->input->post('promo_code'));
                $user_id = $_SESSION['siteuser']['id'];
        
                   
                $total=0;
                $amount = 0;
                $total2=0;
                $total_amount = $total;
                // foreach($date as $key=>$row)
                // {
                   
                //     $time=array();
                //     $time=$this->input->post('time'.$number[$key]);
                       
                    $new_date = date('Y-m-d H:i:s'); 
        
                    // foreach($time as $tm)
                    // {
                        $time_slot=$this->common_model->list_row('time_slots',array('id'=>$type));

                        // $total=$total+$time_slot->price+$time_slot->base_price;
                         $total=$total+$time_slot->price;
                         // $total2=$total2+$time_slot->price+$time_slot->base_price;
                         $total2=$total2+$time_slot->price;
                         
                         if($this->input->post('merge')==1)
                         {
                              // $total= $time_slot->price+30;
                            $total= $time_slot->price;
                         }
                        
                        $res2   = $this->common_model->list_row('promocode',array('promo_code'=>$promo,'application'=>'pv'));
                        $res3   = $this->common_model->list_row('used_promocodes',array('promocode'=>$promo,'seller_id'=>$user_id,'application'=>'pv'));
                        
                        if($res2 != '')
                        {
                            if($res2->premium_type_id == $type || $res2->premium_type_id==0 )
                            {
                            if($res2->limit_type == '0')
                            {
                                if(strtotime("now") >= strtotime($res2->valid_from) && strtotime("now") <= strtotime($res2->valid_till))
                                {
                                    
                                    if($res3 != '')
                                    {
                                        if($res3->times >= $res2->usage_times)
                                        {
                                            $total_amount = $total;
                                        }
                                        else
                                        {
                                            if($res2->discount_type == '1')
                                            {
                                                $amountgot = ($total / 100 ) * $res2->percentage ;
                                                
                                                $max = $res2->amount_limit;
                                                
                                                if($amountgot > $max)
                                                {
                                                    $amount = $max;
                                                }
                                                else
                                                {
                                                    $amount = $amountgot;
                                                }
                                            }
                                            elseif($res2->discount_type == '0')
                                            {
                                                $amount = $res2->amount;
                                                $max = $res2->amount_limit;
                                                
                                                if($amount > $max)
                                                {
                                                    $amount = $max;
                                                }
                                                else
                                                {
                                                    $amount = $amount;
                                                }
                                            }
                                            
                                            // $ups_data=array(
                                            //     'times'=> $res3->times + 1,
                                            //      'updated_at'=>date("Y-m-d H:i:s")
                                            //       );
                                            //       $this->common_model->update_records($ups_data,array('promocode'=>$promo,'seller_id'=>$user_id),'used_promocodes');
                                            
                                            $total_amount = $total - $amount; 
                                            
                                        }
                                    }
                                    else
                                    {
                                        if($res2->discount_type == '1')
                                            {
                                                $amountgot = ($total / 100 ) * $res2->percentage ;
                                                
                                                $max = $res2->amount_limit;
                                                
                                                if($amountgot > $max)
                                                {
                                                    $amount = $max;
                                                }
                                                else
                                                {
                                                    $amount = $amountgot;
                                                }
                                            }
                                            elseif($res2->discount_type == '0')
                                            {
                                                $amount = $res2->amount;
                                                $max = $res2->amount_limit;
                                                
                                                if($amount > $max)
                                                {
                                                    $amount = $max;
                                                }
                                                else
                                                {
                                                    $amount = $amount;
                                                }
                                            }
                                            
                                            $data = array(
                                                'seller_id' => $user_id,
                                                'promocode' => $res2->promo_code,
                                                'times' =>1,
                                                'created_at' => date("Y-m-d H:i:s"),
                                                'updated_at' => date("Y-m-d H:i:s")
                                            );
                            
                                            $ins_idd = $this->common_model->create_record($data, 'used_promocodes');
                                            
                                            $total_amount = $total - $amount; 
                                    }
                                    
                                }
                                else
                                {
                                    $total_amount = $total;
                                }
                            }
                            else
                            {
                               if($res3 != '')
                                    {
                                        if($res3->times >= $res2->usage_times)
                                        {
                                            $total_amount = $total;
                                        }
                                        else
                                        {
                                            if($res2->discount_type == '1')
                                            {
                                                $amountgot = ($total / 100 ) * $res2->percentage ;
                                                
                                                $max = $res2->amount_limit;
                                                
                                                if($amountgot > $max)
                                                {
                                                    $amount = $max;
                                                }
                                                else
                                                {
                                                    $amount = $amountgot;
                                                }
                                            }
                                            elseif($res2->discount_type == '0')
                                            {
                                                $amount = $res2->amount;
                                                $max = $res2->amount_limit;
                                                
                                                if($amount > $max)
                                                {
                                                    $amount = $max;
                                                }
                                                else
                                                {
                                                    $amount = $amount;
                                                }
                                            }
                                            
                                            // $ups_data=array(
                                            //     'times'=> $res3->times + 1,
                                            //      'updated_at'=>date("Y-m-d H:i:s")
                                            //       );
                                            //       $this->common_model->update_records($ups_data,array('promocode'=>$promo,'seller_id'=>$user_id),'used_promocodes');
                                            
                                            $total_amount = $total - $amount; 
                                            
                                        }
                                    }
                                    else
                                    {
                                        if($res2->discount_type == '1')
                                            {
                                                $amountgot = ($total / 100 ) * $res2->percentage ;
                                                
                                                $max = $res2->amount_limit;
                                                
                                                if($amountgot > $max)
                                                {
                                                    $amount = $max;
                                                }
                                                else
                                                {
                                                    $amount = $amountgot;
                                                }
                                            }
                                            elseif($res2->discount_type == '0')
                                            {
                                                $amount = $res2->amount;
                                                $max = $res2->amount_limit;
                                                
                                                if($amount > $max)
                                                {
                                                    $amount = $max;
                                                }
                                                else
                                                {
                                                    $amount = $amount;
                                                }
                                            }
                                            
                                            $data = array(
                                                'seller_id' => $user_id,
                                                'promocode' => $res2->promo_code,
                                                'times' =>1,
                                                'application'=>'pv',
                                                'created_at' => date("Y-m-d H:i:s"),
                                                'updated_at' => date("Y-m-d H:i:s")
                                            );
                            
                                            $ins_idd = $this->common_model->create_record($data, 'used_promocodes');
                                            
                                            $total_amount = $total - $amount; 
                                    }
                                }
                            }
                            else
                            {
                                $total_amount = $total;
                            }
                            
                            }
            
                            elseif($promo=='OWNER' && ($_SESSION['siteuser']['id']==16 || $_SESSION['siteuser']['id']==42 || $_SESSION['siteuser']['id']==25 || $_SESSION['siteuser']['id']==39) )
                            {
                                $total_amount = 0;
                            }
                            else{
                                $total_amount = $total;
                            }
                            $first_site_earn    =$total_amount;
                             $commission=0;
                             $second_site_earn=0;
                             $is_merged=0;
                             if($this->input->post('merge')==1)
                             {
                                 $is_merged=1;
                                 $tot2=$total_amount/2;
                                 $first_site_earn=$tot2;
                                 $commission=($tot2*6)/100;
                                 
                                 $second_site_earn=$tot2-$commission;
                             }
                        
                        $data = array(
                            'ad_id' => $id,
                            'book_time_slot_main_id'=>$ins_id,
                            'premium_type'=> $type,
                            'last_published_date' => $new_date,
                            'start_time' => $new_date,
                            'end_time' =>'',
                            'price' => $time_slot->price,
                            'total' =>number_format($total_amount, 2),
                            'discount_method'=>$promo,
                            'discount' => $amount,
                            'first_site_earn'=>$first_site_earn,
                            'second_site_earn'=>$second_site_earn,
                            'created_from'=>'puppyverify.com',
                            'is_premium_merged'=>$is_merged,
                            'commission'=>$commission,
                            'payment_gateway' => 'stripe',
                            'created_at' => date("Y-m-d H:i:s"),
                            'updated_at' => date("Y-m-d H:i:s")
                        );
                       
                        $insss_id = $this->common_model->create_record($data, 'book_time_slot');
                        
                       
                        $up_data=array(
                            'is_timeslot'=> '1',
                            'premium_type'=> $type,
                             'updated_at'=>date("Y-m-d H:i:s")
                              );
                              $this->common_model->update_records($up_data,array('id'=>$id),'posts');
                        

                    // }
        
                // }

           

         $this->common_model->update_records(array('total'=>$total,'sub_total'=>number_format($total_amount,2)),array('id'=>$ins_id),'book_time_slot_main');
         
            if(number_format($total_amount,2) == '0')
            {
                if($res3 != '')
                {
                    $ups_data=array(
                    'times'=> $res3->times + 1,
                     'updated_at'=>date("Y-m-d H:i:s")
                );
                $this->common_model->update_records($ups_data,array('promocode'=>$promo,'seller_id'=>$user_id,'application'=>'pv'),'used_promocodes');
                    
                }
                  $data = array(

                    'txn_id' => $promo,
                    'txn_status' => 1,
                    'updated_at' => date("Y-m-d H:i:s")
                );
                $this->common_model->update_records($data, array('id'=>$ins_id), 'book_time_slot_main');
                $where = array('book_time_slot_main_id' => $ins_id);
                $this->common_model->update_records($data, $where, 'book_time_slot');
                
                 $this->common_model->update_records(array('is_timeslot'=>1,'priority'=>1),array('id'=>$id,),'posts');
                
                redirect(base_url() . 'payment-success');
            }
            else
            {
                redirect('pay/' . $ins_id, 'refresh');
            }
            
        }
            
        
        }

           
        
    }


    public function stripe_payment($id)
    {
        $this->load->library('stripe_lib');
        $data['title'] = 'MyPupCentral-Pay Now';

        $result = $this->common_model->list_row('book_time_slot_main', array('id' => $id));

        // If payment form is submitted with token
        if ($this->input->post('stripeToken')) {
            // Retrieve stripe token, card and user info from the submitted form data
            $postData = $this->input->post();

            // Make payment
            $paymentID = $this->payment($postData, $result, $id);

            // If payment successful
            if ($paymentID) {
                redirect(base_url() . 'payment-success');
            } else {
                $apiError = !empty($this->stripe_lib->api_error) ? ' (' . $this->stripe_lib->api_error . ')' : '';
                $data['error_msg'] = 'Transaction has been failed!' . $apiError;
                $this->session->set_flashdata('msg', $data['error_msg']);
                redirect(base_url() . 'payment-failed', $data);
            }
        }

        // Pass product data to the details view
        $data['currency'] = 'USD';
        $data['tot'] = $result->sub_total;


        $data['page'] = 'front/stripe_card_accept';
        $this->load->view('front/layout', $data);
    }

    private function payment($postData, $result, $id)
    {

        $this->load->library('stripe_lib');


        // If post data is not empty
        if (!empty($postData)) {
            // Retrieve stripe token, card and user info from the submitted form data
            $token  = $postData['stripeToken'];
            $name = $postData['name'];
            $email = $_SESSION['siteuser']['email'];
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
                $charge = $this->stripe_lib->createCharge($customer->id, $name, $result->sub_total, $orderID, 'USD');

                if ($charge) {
                    // Check whether the charge is successful
                    if ($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1) {
                        // Transaction details 
                        $transactionID = $charge['balance_transaction'];
                        $paidAmount = $charge['amount'];
                        $paidAmount = ($paidAmount / 100);
                        $paidCurrency = $charge['currency'];
                        $payment_status = $charge['status'];



                        // $orderID = $this->product->insertOrder($orderData);

                        // If the order is successful
                        if ($payment_status == 'succeeded') {

                            $where = array('book_time_slot_main_id' => $id);
                            
                            $user_id = $_SESSION['siteuser']['id'];
                            
                            $timeslot = $this->common_model->list_row('book_time_slot', array('book_time_slot_main_id' => $id));
                            
                            if(!empty($timeslot->discount_method))
                            {
                                $res3   = $this->common_model->list_row('used_promocodes',array('promocode'=>$timeslot->discount_method,'seller_id'=>$user_id));
                            
                                $ups_data=array(
                                    'times'=> $res3->times + 1,
                                    'updated_at'=>date("Y-m-d H:i:s")
                                );
                                $this->common_model->update_records($ups_data,array('promocode'=>$timeslot->discount_method,'seller_id'=>$user_id),'used_promocodes');
                                
                            }
                            
                            $data = array(

                                'txn_id' => $transactionID,
                                'txn_status' => 1,
                                'updated_at' => date("Y-m-d H:i:s")
                            );
                            $this->common_model->update_records($data, array('id'=>$id), 'book_time_slot_main');

                            $this->common_model->update_records($data, $where, 'book_time_slot');

                            $this->common_model->update_records(array('is_timeslot'=>1,'premium_type'=>$timeslot->premium_type), array('id'=>$timeslot->ad_id), 'posts');

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

        $data['page'] = 'front/payment_success';
        $this->load->view('front/layout', $data);
    }

    public function payment_failed()
    {
        $data['title'] = 'MyPupCentral-Failed';

        $data['page'] = 'front/payment_failed';
        $this->load->view('front/layout', $data);
    }


    //------------------------------------------------------------------------------------------


    public function premium_ads()
    {
        $data['title'] = 'MyPupCentral-Premium Ads';

        $this->session->set_userdata('top_menu', 'My_premium_ads');

        $user_id = $_SESSION['siteuser']['id'];


        $data['page'] = 'front/profile/my_premium_ads';
        $this->load->view('front/layout', $data);
    }

    //premium ads datatable

    public function fetch_premium_ads()
    {
        $user_id = $_SESSION['siteuser']['id'];
        $where = array('posts.user_id'=>$user_id);
        $result = $this->premiumads_model->make_datatable($where);
        $data = array();
        $count = 1;

        foreach ($result as $row) {
            $date1 = date_create(date("Y-m-d H:i:s"));
            $date2 = date_create($row->createdate);
            $diff = date_diff($date1, $date2);
            $days = $diff->format("%a");
            $action = '';
            $sub_array = array();
            if (!empty($row->featured_image)) {
                $sub_array[] = '<img height="100px" width="100px" src="' . base_url() . 'uploads/puppies/' . $row->featured_image . '">';
            } else {
                $sub_array[] = '<video controls id="video-tag" height="100px" width="100px" style="object-fit: cover;">
                <source id="video-source" src="'.base_url() .'uploads/puppies/' . $row->featured_video . '">
                </video>';
            }
            $sub_array[] = $row->post_id;

            $sub_array[]=' <b> '.$row->title.'</b><br>
                            <b> Puppy Name :</b>'.$row->puppy_name.'<br>
                            <b> Puppy Breed :</b>'.$row->breed_name.'<br>
                            <b> Puppy DOB :</b> '.date('F j, Y',strtotime($row->puppy_dob)).'<br>
                            <b> Puppy Gender :</b>'.$row->puppy_sex.'<br>
                            <b> Puppy Size :</b> '.$row->puppy_size;


            $sub_array[]=$row->full_name;

            // $sub_array[]=date("m-d-Y h:i A", strtotime($row->start_time)) .' - '.date("h:i A", strtotime($row->end_time));
             $sub_array[]='<p class="text-info"><b>'.$row->slot_title.'</b></p>';
            // if($row->premium_type == '4')
            // {
            //     $sub_array[]='<p class="text-info"><b>Daily</b></p>';
            // }
            // elseif($row->premium_type == '5')
            // {
            //     $sub_array[]='<p class="text-info"><b>Once in 3 days</b></p>';
            // }
            
            
            // if(strtotime("now")<=strtotime($row->end_time) && strtotime("now")>=strtotime($row->start_time))
            // {
            //     $sub_array[]='<p class="text-warning"><b>Live</b></p>';
            // }
            // elseif(strtotime("now")>=strtotime($row->start_time))
            // {
            //     $sub_array[]='<p class="text-danger">Expired</p>';
            // }
            if($days<=45){
                $sub_array[]='<p class="text-warning"><b>Live</b></p>';
            }
            else{
                $sub_array[]='<p class="text-danger">Expired</p>';
            }
           
       
            $data[] = $sub_array;
            $count++;
        }

        $output = array(
            "draw"                  =>         intval($_POST["draw"]),
            "recordsTotal"          =>       $this->premiumads_model->count_all_data($where),
            "recordsFiltered"        =>      $this->premiumads_model->get_filtered_data($where),
            "data"                  =>         $data
        );
        echo json_encode($output);
    }
    
    
    
    public function transactions()
    {
        $data['title'] = 'MyPupCentral-Transactions';

        $this->session->set_userdata('top_menu', 'Transactions');

        $user_id = $_SESSION['siteuser']['id'];


        $data['page'] = 'front/profile/my_transactions';
        $this->load->view('front/layout', $data);
    }


    public function fetch_transactions()
    {
        $user_id = $_SESSION['siteuser']['id'];
        $where = array('posts.user_id'=>$user_id);
        $result = $this->premiumads_model->make_txn_datatable($where);
        $data = array();
        $count = 1;

        foreach ($result as $row) {
           
            $sub_array = array();
            $sub_array[] = $row->ord_id;
            $sub_array[] = '$'.$row->sub_total;

            $sub_array[] =date("m-d-Y h:i A", strtotime($row->txn_date));

       
            $data[] = $sub_array;
            $count++;
        }

        $output = array(
            "draw"                  =>         intval($_POST["draw"]),
            "recordsTotal"          =>       $this->premiumads_model->count_txn_all_data($where),
            "recordsFiltered"        =>      $this->premiumads_model->get_txn_filtered_data($where),
            "data"                  =>         $data
        );
        echo json_encode($output);
    }
     function change_status()
    {       
        
        $id = $this->input->post('id'); 
        $this->ads_model->change_status(['id'=>$id],'is_sold','posts');
    }
    public function sold_out()
    {
        $data['title'] = 'MyPupCentral-Sold Out';

        $this->session->set_userdata('top_menu', 'Sold Out');

        $user_id = $_SESSION['siteuser']['id'];


        $data['page'] = 'front/profile/my_sold_out';
        $this->load->view('front/layout', $data);
    }


    public function fetch_sold_out()
    {
        $user_id = $_SESSION['siteuser']['id'];
        $where =['posts.user_id'=>$user_id,'posts.is_sold'=>1,'posts.user_id'=>$user_id,'posts.uploaded_from'=>'puppyverify.com'];
        // $where = array('posts.user_id'=>$user_id);
        // $where = array('posts.is_sold'=>1);
        $result = $this->ads_model->make_datatable($where);
        $data = array();
        $count = 1;

        foreach ($result as $row) {
        
            $action = '';
            $sub_array = array();
            if (!empty($row->featured_image)) {
                $sub_array[] = '<img height="100px" width="100px" src="' . base_url() . 'uploads/puppies/' . $row->featured_image . '">';
            } else {
                $sub_array[] = '<video controls id="video-tag" height="100px" width="100px" style="object-fit: cover;">
                <source id="video-source" src="'.base_url() .'uploads/puppies/' . $row->featured_video . '">
                </video>';
            }
             if($row->is_sold==1)
            {
            $status = '<input type="button" value="Mark Not Adopted" style ="background-color: green;color: white;"class="success tgl_checkbox" data-id="'.$row->post_id.'"data-status="'.$row->is_sold.'"id="tgl_checkbox_'.$row->post_id.'">';
             }
         else
            {
            $status = '<input type="button" value="Mark Adopted" style ="background-color: red;color: white;"class="success tgl_checkbox" data-id="'.$row->post_id.'"data-status="'.$row->is_sold.'"id="tgl_checkbox_'.$row->post_id.'">'; 
            }
            // $sub_array[] = $row->post_id;

            $sub_array[] = $row->title;

            $sub_array[] = $row->full_name;

            $sub_array[] = date('F j, Y',strtotime($row->available_date));

            $sub_array[]='<b> Puppy Name :</b>'.$row->puppy_name.'<br>
                            <b> Puppy Breed :</b>'.$row->breed_name.'<br>
                            <b> Puppy DOB :</b> '.date('F j, Y',strtotime($row->puppy_dob)).'<br>
                            <b> Puppy Sex :</b>'.$row->puppy_sex.'<br>
                            <b> Puppy Size :</b> '.$row->puppy_size;
            
            $sub_array[] =$status;
                                           
           
       
            $data[] = $sub_array;
            $count++;
        }

        $output = array(
            "draw"                  =>         intval($_POST["draw"]),
            "recordsTotal"          =>       $this->ads_model->count_all_data($where),
            "recordsFiltered"        =>      $this->ads_model->get_filtered_data($where),
            "data"                  =>         $data
        );
        echo json_encode($output);
    }
    
    public function read_repost($id)
    {
        $old=$this->common_model->list_row('posts', array('id'=>$id));
         $data_update = array(
                            'reviewed' => 0,
                            'repost' =>1,
                            'created_at' =>date('Y-m-d H:i:s')
                             );
                        
        $update = $this->common_model->update_records($data_update,['id'=>$id],'posts');
        
        $old_data=array('post_id'=>$id,
        'txn_id'=>$old->txn_id,
        'created_date'=>$old->created_at,
        'created_at' =>date('Y-m-d H:i:s'));
        
        $this->common_model->create_record($old_data, 'repost_log');
        
        
        redirect('my-cart');
    }
    
     public function delete_repost($id)
	{
	    $log=$this->common_model->list_records(['post_id'=>$id],'repost_log','id','DESC',1);
	    
	     $data_update = array(
                            'reviewed' => 1,
                            'repost' =>0,
                            'created_at' =>$log[0]->created_date
                             );
                        
        $update = $this->common_model->update_records($data_update,['id'=>$id],'posts');
        
        	$this->common_model->delete('repost_log', array('id' => $log[0]->id));
	    

		redirect('/my-cart');
	}
    
    public function read_repost_old()
        {
            $post_id = $this->input->get('post_id');
            $result = $this->ads_model->get($post_id);


            $data = array(
                    'post_id' => $post_id,
                    'price' => $result[0]->price,
                    'asking_price' => $result[0]->asking_price,
                    'available_date' => $result[0]->available_date,
                   
                );
            $this->load->view('front/profile/repost_modal', $data);
        }
        
        public function repost()
        {
             $post_id = $this->input->post('post_id');
            
                    $this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('asking_price', 'Asking Price', 'trim|required|xss_clean');
                    $this->form_validation->set_rules('available_date', 'Available Date', 'trim|required|xss_clean');
                   if ($this->form_validation->run() == FALSE ) {
                      $json =array(
                            'status' =>'error',
                             'msg' =>'No direct script access allowed',
                        );
                   }
                   else
                   {
                    $data_update = array(
                            'price' => $this->input->post('price'),
                            'asking_price' => $this->input->post('asking_price'),
                            'available_date' => $this->input->post('available_date'),
                            'created_at' =>date('Y-m-d H:i:s')
                             );
                        
                     $update = $this->common_model->update_records($data_update,['id'=>$post_id],'posts');

                   }
                if($update)
                {
                 $json =array(
                            'status' =>'success',                   
                            );        
                }
                else
                {
                    $json =array(
                            'status' =>'error',                 
                            );
                }       

                echo json_encode($json);
                exit; 
        }
        // updating price -17/2/22
        public function price_update()
        {
            $id = $this->input->post('post_id');
            $asking_price = $this->input->post('asking_price');
            // var_dump($post_id);
            // var_dump($asking_price);exit;
            
             $up_data=array(
                    'asking_price'=> $asking_price,
                    'updated_at'=>date("Y-m-d H:i:s")
                );
           $this->common_model->update_records($up_data,array('id'=>$id),'posts');
        }

        //cart function

        public function my_cart()
        {
            $data['title'] = 'MyPupCentral-My Cart';

            $this->session->set_userdata('top_menu', 'My cart');

            $user_id = $_SESSION['siteuser']['id'];


            $data['page'] = 'front/profile/my_cart';
            $this->load->view('front/layout', $data);
        }

        public function fetch_my_cart()
        {
        $user_id = $_SESSION['siteuser']['id'];
        $where =['posts.user_id'=>$user_id,'posts.reviewed'=>0,'posts.uploaded_from'=>'puppyverify.com'];
        $totamt = $this->ads_model->gettotamount($where);
        $result = $this->ads_model->make_datatable_cart($where);
        $data = array();
        $count = 1;

        foreach ($result as $row) {
        
            $action = '';
            $sub_array = array();
            if (!empty($row->featured_image)) {
                $sub_array[] = '<img height="100px" width="100px" src="' . base_url() . 'uploads/puppies/' . $row->featured_image . '">';
            } else {
                $sub_array[] = '<video controls id="video-tag" height="100px" width="100px" style="object-fit: cover;">
                <source id="video-source" src="'.base_url() .'uploads/puppies/' . $row->featured_video . '">
                </video>';
            }
            

            $sub_array[] = $row->title;

            $sub_array[] = '$'. $row->sub_total;

            $sub_array[] = date('F j, Y',strtotime($row->available_date));

            $sub_array[]='<b> Puppy Name :</b>'.$row->puppy_name.'<br>
                            <b> Puppy Breed :</b>'.$row->breed_name.'<br>
                            <b> Puppy DOB :</b> '.date('F j, Y',strtotime($row->puppy_dob)).'<br>
                            <b> Puppy Sex :</b>'.$row->puppy_sex.'<br>
                            <b> Puppy Size :</b> '.$row->puppy_size;
                            
                            
                            
                            if($row->repost==1)
                            {
                                $deletelink = base_url('frontend/My_ads/delete_repost/').$row->post_id;
                            }
                            else{
                                  $deletelink = base_url('frontend/My_ads/delete/').$row->post_id;
                            }
                           
                            $escapedUrl = htmlspecialchars(json_encode($deletelink));
                            
                            $sub_array[] = '<a  href="'.base_url().'posts/edit/'.$row->post_id.'" title="Edit">
                            <i class="fas fa-edit" style="font-size:20px;"></i>
                        </a> &nbsp; <a onclick="delete_recordById('.$escapedUrl.')" href="#" title="Delete">
                            <i class="fas fa-trash" style="font-size:20px;"></i>
                        </a>';
            
            $sub_array[] ='<input type="hidden" value="'.$row->sub_total.'" name="amount[]"><input type="checkbox" value="'.$row->post_id.'" name="post_id[]" class="each_select"><input type="hidden" value="'.$row->post_id.'" name="ad_ids[]"><input type="hidden" value="'.$totamt.'" name="alltotal">';
                                           
           
       
            $data[] = $sub_array;
            $count++;
        }

        $output = array(
            "draw"                  =>         intval($_POST["draw"]),
            "recordsTotal"          =>       $this->ads_model->count_all_data_cart($where),
            "recordsFiltered"        =>      $this->ads_model->get_filtered_data_cart($where),
            "data"                  =>         $data
        );
        echo json_encode($output);
    }

    public function getallpayable()
    {
        $total = $this->common_model->getallpayable()->sub_total;
        $result=array('status'=>'success','msg'=>$total);
        echo json_encode($result);
    }
    
     public function delete($id)
	{
		$this->common_model->delete('posts', array('id' => $id));
		$this->common_model->delete('posts_pictures', array('post_id' => $id));
		$this->common_model->delete('posts_videos', array('post_id' => $id));
		$this->session->set_flashdata('msg', '<div class="alert alert-success">Deleted</div>');

		redirect('/my-cart');
	}

    // Bulk Price Update
    public function bulk_price_update()
    {
        if ($this->input->method() !== 'post') {
            show_404();
        }

        $post_ids = $this->input->post('post_ids');
        $new_price = $this->input->post('new_price');
        $user_id = $_SESSION['siteuser']['id'];

        if (empty($post_ids) || !is_array($post_ids) || empty($new_price)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => false, 'message' => 'Invalid data provided')));
            return;
        }

        $updated_count = 0;
        foreach ($post_ids as $post_id) {
            // Verify ownership
            $ad = $this->common_model->list_row('posts', array('id' => $post_id, 'user_id' => $user_id));
            if ($ad) {
                $this->common_model->update_records(
                    array('asking_price' => $new_price, 'updated_at' => date('Y-m-d H:i:s')),
                    array('id' => $post_id),
                    'posts'
                );
                $updated_count++;
            }
        }

        if ($updated_count > 0) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => true, 'message' => "Price updated for {$updated_count} ad(s)")));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => false, 'message' => 'No ads were updated')));
        }
    }

    // Bulk Mark as Adopted
    public function bulk_mark_adopted()
    {
        if ($this->input->method() !== 'post') {
            show_404();
        }

        $post_ids = $this->input->post('post_ids');
        $user_id = $_SESSION['siteuser']['id'];

        if (empty($post_ids) || !is_array($post_ids)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => false, 'message' => 'Invalid data provided')));
            return;
        }

        $updated_count = 0;
        foreach ($post_ids as $post_id) {
            // Verify ownership
            $ad = $this->common_model->list_row('posts', array('id' => $post_id, 'user_id' => $user_id));
            if ($ad) {
                $this->common_model->update_records(
                    array('is_sold' => 1, 'updated_at' => date('Y-m-d H:i:s')),
                    array('id' => $post_id),
                    'posts'
                );
                $updated_count++;
            }
        }

        if ($updated_count > 0) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => true, 'message' => "Marked {$updated_count} ad(s) as adopted")));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => false, 'message' => 'No ads were updated')));
        }
    }

    // Bulk Repost
    public function bulk_repost()
    {
        if ($this->input->method() !== 'post') {
            show_404();
        }

        $post_ids = $this->input->post('post_ids');
        $user_id = $_SESSION['siteuser']['id'];

        if (empty($post_ids) || !is_array($post_ids)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('success' => false, 'message' => 'Invalid data provided')));
            return;
        }

        $reposted_count = 0;
        $debug_info = array();
        
        foreach ($post_ids as $post_id) {
            // Verify ownership and check if ad is expired (more than 45 days old)
            $ad = $this->common_model->list_row('posts', array('id' => $post_id, 'user_id' => $user_id));
            if ($ad) {
                $date1 = date_create(date("Y-m-d H:i:s"));
                $date2 = date_create($ad->created_at);
                $diff = date_diff($date1, $date2);
                $days = $diff->format("%a");
                
                $debug_info[] = "Post ID: $post_id, Days: $days, Created: {$ad->created_at}";

                // Only repost if ad is expired (more than 45 days old)
                if ($days > 45) {
                    // Update post for reposting (same as single repost)
                    $data_update = array(
                        'reviewed' => 0,
                        'repost' => 1,
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $this->common_model->update_records($data_update, ['id' => $post_id], 'posts');
                    
                    // Create repost log entry (same as single repost)
                    $old_data = array(
                        'post_id' => $post_id,
                        'txn_id' => $ad->txn_id,
                        'created_date' => $ad->created_at,
                        'created_at' => date('Y-m-d H:i:s')
                    );
                    $this->common_model->create_record($old_data, 'repost_log');
                    
                    $reposted_count++;
                }
            } else {
                $debug_info[] = "Post ID: $post_id - Not found or not owned";
            }
        }

        if ($reposted_count > 0) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                    'success' => true,
                    'message' => "Successfully reposted {$reposted_count} expired ad(s)",
                    'redirect' => base_url('my-cart')
                )));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                    'success' => false, 
                    'message' => 'No expired ads were found to repost',
                    'debug' => $debug_info
                )));
        }
    }
	
	
}
