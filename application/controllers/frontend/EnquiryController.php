<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EnquiryController extends User_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		
	}

    public function index()
    {
        $data['title'] = 'Inquiries | MyPupCentral';

        $this->session->set_userdata('top_menu', 'Enquiry_list');

        $user_id=$_SESSION['siteuser']['id'];
        
         $data['result']=$this->common_model->getenquiries();

		$data['page'] = 'front/enquiries/list';
		$this->load->view('front/layout', $data);
    }

    public function changestatus($id)
    {
        $up_data=array(
                    'status'=> '1',
                     'updated_at'=>date("Y-m-d H:i:s")
              );
              $this->common_model->update_records($up_data,array('id'=>$id,'breeder_id'=>$_SESSION['siteuser']['id']),'enquiries');
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Status Changed</div>');

        redirect('ad/enquiries');
    }
    public function getpostcount()
    {
        $count = $this->user_model->getpostcount();
        // return $count;
    }


    

}