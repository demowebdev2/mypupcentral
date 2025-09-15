<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends User_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('Auth');
    }


    public function index()
    {
        $data['title'] = 'MyPupCentral-Profile';

        $this->session->set_userdata('top_menu', 'My_account');

        $sessionData = $this->session->userdata('siteuser');
        $wheres = array('id' => $sessionData['id']);
        $data['user'] = $this->common_model->list_row('user_accounts', $wheres);
        
        $data['states'] = $this->common_model->search_state();

        $data['page'] = 'front/profile/profile';
        $this->load->view('front/layout', $data);
    }

    public function update_account()
    {
        $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean');
        $this->form_validation->set_rules('usda', 'USDA Number', 'trim|xss_clean');

        $this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger">' . validation_errors() . '</div>');

            redirect('profile');
        } else {
            $sessionData = $this->session->userdata('siteuser');
            
             $location = explode('|', $this->input->post('state'));
				$state_name =  $location[0];
				$state_id =  $location[1];
				
            $this->common_model->update_records(
                array('accept_marketing_offers' => $this->input->post('accept_marketing_offers'), 
                'name' => $this->input->post('name'), 
                 'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                 'state' => $state_name,
                'state_id' => $state_id,
                'zip_code' => $this->input->post('zip_code'),
                'description' => $this->input->post('description'),
                'multiple_login'=>$this->input->post('allowlogin'),
                'site_url' => $this->input->post('site_url'),
                 'youtube_url' => $this->input->post('youtube_url'),
                  'federal_license'=>$this->input->post('federal_license'),
                    'usda_license'=>$this->input->post('usda_license'),
                    'vet_check'=>$this->input->post('vet_checked'),
                    'health_guarante'=>$this->input->post('guarante'),
                    'guarante_length'=>$this->input->post('length'),
                 
                 ),
                array('id' => $sessionData['id']),
                'user_accounts'
            );
            
              $data22=array('state_id'=>$state_id,'address'=>$state_name);
	          $this->common_model->update_records($data22,array('user_id'=>$sessionData['id']),'posts');


            $this->session->set_flashdata('msg', '<div class="alert alert-success">Updated</div>');

            redirect('profile');
        }
    }
    
     public function change_paypal_email()
    {
        $this->form_validation->set_rules('paypal_email', 'Email', 'trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger">' . validation_errors() . '</div>');

            redirect('profile');
        } else {
            $sessionData = $this->session->userdata('siteuser');
            $this->common_model->update_records(array('paypal_email' => $this->input->post('paypal_email')), array('id' => $sessionData['id']), 'user_accounts');


            $this->session->set_flashdata('msg', '<div class="alert alert-success">Paypal Email Updated</div>');
            redirect('profile');
        }
    }

    public function change_password()
    {
        $this->form_validation->set_rules('password', 'Current Password', 'trim|required|xss_clean');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required|xss_clean|matches[cnewpassword]');
        $this->form_validation->set_rules('cnewpassword', 'Confirm Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('msg', '<div class="alert alert-danger">' . validation_errors() . '</div>');

            redirect('profile');
        } else {
            $sessionData = $this->session->userdata('siteuser');
            $wheres = array('id' => $sessionData['id']);
            $userdata = $this->common_model->list_row('user_accounts', $wheres);

            $password = $this->enc_lib->passHashEnc($this->input->post('newpassword'));

            $check = $this->enc_lib->passHashDyc($this->input->post('password'), $userdata->password);


            if ($check) {
                $this->common_model->update_records(array('password' => $password), array('id' => $sessionData['id']), 'user_accounts');


                $this->session->set_flashdata('msg', '<div class="alert alert-success">Password Changed</div>');
            } else {

                $this->session->set_flashdata('msg', '<div class="alert alert-danger">Invalid Current Password</div>');
            }


            redirect('profile');
        }
    }
    public function getpostcount()
    {
        $count = $this->user_model->getpostcount();
        // return $count;
    }
    
     public function upload_certificate()
    {

        $ImageName3      = str_replace(' ', '-', strtolower($_FILES['files']['name']));
        $ImageType3      = $_FILES['files']['type']; /*"image/png", image/jpeg etc.*/

        $ImageExt3 = substr($ImageName3, strrpos($ImageName3, '.'));
        $ImageExt3       = str_replace('.', '', $ImageExt3);
       
        $NewImageName3 = 'Cert_' .time().'_'.random_string('alnum', 5) . '.' . $ImageExt3;
        
        if (move_uploaded_file($_FILES["files"]["tmp_name"], "uploads/doc/" . $NewImageName3)) {
            $sessionData = $this->session->userdata('siteuser');
            $this->common_model->update_records(
                array(
                'certificate' =>  $NewImageName3,
                 'certificate_upload_from' => 'puppyverify.com'),
                array('id' => $sessionData['id']),
                'user_accounts'
            );


            $this->session->set_flashdata('msg', '<div class="alert alert-success">Saved</div>');
        }
        else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Something Went Wrong!</div>');
        }

        redirect('profile');
    }
    
    public function change_profile_photo()
    {

        $ImageName3      = str_replace(' ', '-', strtolower($_FILES['files']['name']));
        $ImageType3      = $_FILES['files']['type']; /*"image/png", image/jpeg etc.*/

        $ImageExt3 = substr($ImageName3, strrpos($ImageName3, '.'));
        $ImageExt3       = str_replace('.', '', $ImageExt3);

        $NewImageName3 = 'id_' . time() . '_' . random_string('alnum', 5) . '.' . $ImageExt3;

        if (move_uploaded_file($_FILES["files"]["tmp_name"], "uploads/breeders/" . $NewImageName3)) {
            $sessionData = $this->session->userdata('siteuser');
            $wheres = array('id' => $sessionData['id']);
            $user = $this->common_model->list_row('user_accounts', $wheres);
            unlink('uploads/doc/'.$user->pofile_photo);
            $this->common_model->update_records(
                array(
                    'pofile_photo' =>  $NewImageName3,
                ),
                array('id' => $sessionData['id']),
                'user_accounts'
            );


            $this->session->set_flashdata('msg', '<div class="alert alert-success">Updated</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Something Went Wrong!</div>');
        }

        redirect('profile');
    }
    
    
    public function update_driver_id()
    {

        $ImageName3      = str_replace(' ', '-', strtolower($_FILES['files']['name']));
        $ImageType3      = $_FILES['files']['type']; /*"image/png", image/jpeg etc.*/

        $ImageExt3 = substr($ImageName3, strrpos($ImageName3, '.'));
        $ImageExt3       = str_replace('.', '', $ImageExt3);

        $NewImageName3 = 'id_' . time() . '_' . random_string('alnum', 5) . '.' . $ImageExt3;

        if (move_uploaded_file($_FILES["files"]["tmp_name"], "uploads/doc/" . $NewImageName3)) {
            $sessionData = $this->session->userdata('siteuser');
            $wheres = array('id' => $sessionData['id']);
            $user = $this->common_model->list_row('user_accounts', $wheres);
            unlink('uploads/doc/'.$user->photo);
            $this->common_model->update_records(
                array(
                    'photo' =>  $NewImageName3,
                ),
                array('id' => $sessionData['id']),
                'user_accounts'
            );


            $this->session->set_flashdata('msg', '<div class="alert alert-success">Updated</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Something Went Wrong!</div>');
        }

        redirect('profile');
    }
    
    
    
    public function add_kennel_photos()
    {
        if (!empty($_FILES['kennel']['name'][0])) {
            $path = "uploads/kennel/";
            $kennel_images = $this->upload_files($path, 'Kennel', $_FILES['kennel']);


            $sessionData = $this->session->userdata('siteuser');
            $wheres = array('id' => $sessionData['id']);
            $user = $this->common_model->list_row('user_accounts', $wheres);
            if (!empty($user->kennel_images)) {
                $old = explode(",", $user->kennel_images);
            } else {
                $old = array();
            }

            $kennel_images = array_merge($old, $kennel_images);


            $kennel_images = implode(',', $kennel_images);

            $this->common_model->update_records(
                array(
                    'kennel_images' =>  $kennel_images
                ),
                array('id' => $sessionData['id']),
                'user_accounts'
            );

            $this->session->set_flashdata('msg', '<div class="alert alert-success">Uploaded</div>');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Something Went Wrong!</div>');
        }

        redirect('profile');
    }

    public function delete_kennel_images($img)
    {
        $sessionData = $this->session->userdata('siteuser');
        $wheres = array('id' => $sessionData['id']);
        $user = $this->common_model->list_row('user_accounts', $wheres);
        if (!empty($user->kennel_images)) {
            $old = explode(",", $user->kennel_images);
        } else {
            $old = array();
        }
        

        if (($key = array_search($img, $old)) !== false) {
            unset($old[$key]);
        }

        
        $kennel_images = implode(',', $old);

        $this->common_model->update_records(
            array(
                'kennel_images' =>  $kennel_images
            ),
            array('id' => $sessionData['id']),
            'user_accounts'
        );

        $this->session->set_flashdata('msg', '<div class="alert alert-danger">Removed</div>');
        redirect('profile');

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
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            $path = $_FILES['images[]']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);

            $fileName = random_string('alnum', 10) . '_' . date("dmY") . '.' . $ext;

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
}
