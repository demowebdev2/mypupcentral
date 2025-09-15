<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_person extends User_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		
	}

    public function index()
    {
        $data['title'] = 'MyPupCentral-Contact Person';

        $this->session->set_userdata('top_menu', 'Contact_person_list');

        $user_id=$_SESSION['siteuser']['id'];
        
        $data['result']=$this->common_model->list_records(array('user_account_id'=>$user_id),'contact_person','id','DESC');

		$data['page'] = 'front/contact_person/list';
		$this->load->view('front/layout', $data);
    }

    public function add()
    {
        $data['title'] = 'MyPupCentral-Add Contact Person';
        $this->session->set_userdata('top_menu', 'Contact_person_add');
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

       
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
        $this->form_validation->set_rules('prefered[]', 'Prefered', 'trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.validation_errors().'</div>');


            $data['page'] = 'front/contact_person/add';
            $this->load->view('front/layout', $data);

        }
        else{

            $preferred=$this->input->post('prefered');
            
            if(!empty( $preferred))
            {
                $preferred=json_encode($preferred);
            }
            else{
                $preferred='';
            }

            // echo json_encode($this->input->post('prefered'));
            // exit();
            $isn_data=array('user_account_id'=>$_SESSION['siteuser']['id'],
                'full_name'=>$this->input->post('name'),
                    'phone'=>$this->input->post('phone'),
                     'email'=>$this->input->post('email'),
                     'website_url'=>$this->input->post('website_url'), 
                     'preferred_contact'  =>$preferred,
                     'status'=>1,
                     'created_at'=>date("Y-m-d H:i:s"),
                     'updated_at'=>date("Y-m-d H:i:s")
              );

              $this->common_model->create_record($isn_data,'contact_person');
              $this->session->set_flashdata('msg', '<div class="alert alert-success">Success</div>');

              redirect('contact-person');

        }
        }
        else{
            
            $data['page'] = 'front/contact_person/add';
            $this->load->view('front/layout', $data);
        }

    }

    public function edit($id)
    {
        $data['title'] = 'MyPupCentral-Edit Contact Person';

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('phone', 'phone', 'trim|required|xss_clean');
            $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean');
            $this->form_validation->set_rules('prefered[]', 'Prefered', 'trim|xss_clean');
            if ($this->form_validation->run() == FALSE) {

                $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.validation_errors().'</div>');
                redirect('contact-person/edit/'.$id);
            }
            else{

                $preferred=$this->input->post('prefered');
            
                if(!empty( $preferred))
                {
                    $preferred=json_encode($preferred);
                }
                else{
                    $preferred='';
                }

                
                $up_data=array(
                    'full_name'=>$this->input->post('name'),
                    'phone'=>$this->input->post('phone'),
                     'email'=>$this->input->post('email'),
                      'website_url'=>$this->input->post('website_url'),   
                      'preferred_contact'  =>$preferred,
                     'updated_at'=>date("Y-m-d H:i:s")
              );
              $this->common_model->update_records($up_data,array('id'=>$id,'user_account_id'=>$_SESSION['siteuser']['id']),'contact_person');

                $this->session->set_flashdata('msg', '<div class="alert alert-success">Updated</div>');

                redirect('contact-person');
            }

        }
        else{
            $data['result']=$this->common_model->list_row('contact_person',array('id'=>$id,'user_account_id'=>$_SESSION['siteuser']['id']));
            $data['page'] = 'front/contact_person/edit';
            $this->load->view('front/layout', $data);
        }
    }

    public function delete($id)
    {
        $this->common_model->delete('contact_person', array('id'=>$id,'user_account_id'=>$_SESSION['siteuser']['id']));
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Deleted</div>');

        redirect('contact-person');
    }
    
    public function getpostcount()
    {
        $count = $this->user_model->getpostcount();
        // return $count;
    }


}