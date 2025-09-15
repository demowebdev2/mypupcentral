<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');


class ContactController extends My_Controller
{

	function __construct()
	{
		parent::__construct();	
		$this->load->library('Mailer');  
        $this->load->helper('url'); 
       
	}		
  public function contact()
	{
	    $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
	     $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
	      $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
	      if ($this->form_validation->run() == FALSE) {
	          	$json =array(
			 		'status' =>'error',					
			 		);
		
	          
	          echo json_encode($json);
		exit;  
	      }
	      else{
	          
	           $ipAddress = $_SERVER['REMOTE_ADDR'];
             $blacklist=$this->common_model->check_blacklist($ipAddress,$this->input->post('email'));
             
            if($blacklist==true)
            {
                 	$json =array(
			 		'status' =>'error',					
			 		);
		
	          
	          echo json_encode($json);
		exit;  
               
            }
            $add_blacklist=$this->common_model->add_blacklist($ipAddress,$this->input->post('email'));
            if($add_blacklist>=5)
            {
                $this->common_model->update_records(array('is_blacklisted'=>1),array('email'=>$this->input->post('email')),'blacklist');
                $this->common_model->update_records(array('is_blacklisted'=>1),array('ipaddress'=>$ipAddress),'blacklist');
                
               	$json =array(
			 		'status' =>'error',					
			 		);
		
	          
	          echo json_encode($json);
		exit;  
               
            }
            else{
                $indata = array(
                    'ipaddress' => $ipAddress,
                    'email' => $this->input->post('email'),
                    'created_at' => date('Y-m-d H:i:s')
                );
                $this->common_model->create_record($indata,'blacklist');
            }
            
	          	$name = $this->input->post('name');
		$email = $this->input->post('email');
		$message = $this->input->post('message');		
 		$company_email = 'info@mypupcentral.com';
	
    //  var_dump($name);exit;
		$msg = '<h4>Hi,</h4><br>';
    	$msg .='New enquiry received from mypupcentral.com<br><br>';
    	$msg .='Name : '.$name.'<br>';
    	$msg .='Email : '.$email.'<br>';
    	$msg .='Message : '.$message.'<br>';     	
    	$msg.= '<br><br>';
    // 	$msg.= 'Thanks & Best Regards,';
    // 	$msg .= '<b>Puppy Verify Team</b>';
// $this->mailer->send_mail('iamashishn@gmail.com', 'Mypupcentral - Enquiry', $msg);
    	if($this->mailer->send_mail($company_email, 'Mypupcentral - Enquiry', $msg))
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
	    
	
		


	}	

	
}
