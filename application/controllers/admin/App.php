<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
     
     
        $this->load->model("ads_model");
    }


    public function index()
	{
		$this->session->set_userdata('top_menu', 'Push_notification');
		$this->session->set_userdata('sub_menu', 'Push_notification/Custom');
		
		$data['title']='Push Notifications';
		
		$data['page']='admin/app/push_notification';
		$this->load->view('admin/layout',$data);
		
	}


    public function setup_notification()
	{
		$this->session->set_userdata('top_menu', 'Push_notification');
		$this->session->set_userdata('sub_menu', 'Push_notification/Setup');
		
		$data['title']='Setup Push Notifications';

        $data['setup']=$this->common_model->list_row('push_notification_setup',array('id'=>1));
		
		$data['page']='admin/app/setup_push_notification';
		$this->load->view('admin/layout',$data);
		
	}

    public function save_setup()
    {
        $message=$this->input->post('body');
        $title=$this->input->post('title');
        $days=$this->input->post('days');
        $data=array(
            'title'=> $title,
            'body'=>$message,
            'days'=>json_encode($days),
            'updated_at'=>date('Y-m-d H:i:s')
        );

        $this->common_model->update_records($data,array('id'=>1),'push_notification_setup');

        $resp=array('status'=>'success','msg'=>'Saved');
        echo json_encode( $resp);
    }

    public function update_notification_status()
    {
        $status=$this->input->post('status');
      
        $data=array(
            'is_active'=>$status,
            'updated_at'=>date('Y-m-d H:i:s')
        );

        $this->common_model->update_records($data,array('id'=>1),'push_notification_setup');
        if($status==1)
        {
            $resp=array('status'=>'success','msg'=>'Enabled');
        }
        else{
            $resp=array('status'=>'success','msg'=>'Disabled');
        }
       
        echo json_encode( $resp);
    }



    public function send_notification()
    {
        $message=$this->input->post('body');
        $title=$this->input->post('title');
        $image=$this->input->post('image');
        $fields = array('to'  => '/topics/mynoti',
        'priority' => 'high',
        'notification' => array(
            'body' => $message,
            'title' => $title,
            'sound' => 'default',
            'icon' => '',
            'image' => $image,
            'restaurant' => true,
            'restaurant_url' =>''
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

        $res=$this->sendPushNotification($fields);
        $res=json_decode($res);

        $params=array(
            'type'=>1,
            'title'=>$title,
            'body'=>$message,
            'image'=>$image,
            'created_at'=>date('Y-m-d H:i:s')
        );

        $this->common_model-> create_record($params,'push_notification_log');

        $resp=array('status'=>'success','msg'=>'Notification Sent');
        echo json_encode( $resp);

    }


    
    function sendPushNotification($fields = array())
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


}