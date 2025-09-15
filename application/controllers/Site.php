<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Site extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->load->library('Auth');
        $this->load->library('Enc_lib');
    }

    public function login()
    {
        if ($this->auth->logged_in()) {
            $this->auth->is_logged_in(true);
        }
        elseif($this->auth->logged_in_staff())
        {
            $this->auth->is_logged_in_staff(true);
        }
        $data           = array();
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login', $data);
        } else {
            $login_post = array(
                'email'    => $this->input->post('username'),
                'password' => $this->input->post('password'),
            );
            $result         = $this->staff_model->checkLogin($login_post);

            // echo json_encode( $result);
            // echo  $result->rolesid;

            // exit();

        
            if ($result) {
                if ($result->is_active) {
                  
                    if($result->rolesid==1)
                    {
                        $session_data   = array(
                            'id'                     => $result->id,
                            'username'               => $result->name,
                            'email'                  => $result->email,
                            'roles'                  => $result->roles,
                            'role_id'               =>$result->rolesid,
                            'superadmin_restriction' => '',
                        );
                        $this->session->set_userdata('sitestaff', $session_data);

                        redirect('staff/Dashboard');
                        
                    }
                    elseif($result->rolesid==7)
                    {
                       
                        $session_data   = array(
                            'id'                     => $result->id,
                            'username'               => $result->name,
                            'email'                  => $result->email,
                            'roles'                  => $result->roles,
                            'role_id'               => $result->rolesid,
                            'superadmin_restriction' => '',
                        );
                        $this->session->set_userdata('siteadmin', $session_data);
                        // echo $result->rolesid;
                        // echo json_encode($_SESSION['siteadmin']);
                        // exit();
                        // $role      = $this->customlib->getStaffRole();
                       
                        // $role_name = json_decode($role)->name;
                       
                        // $this->customlib->setUserLog($this->input->post('username'), $role_name);
    
                        if (isset($_SESSION['redirect_to'])) {
                            redirect($_SESSION['redirect_to']);
                        } else {
                            redirect('admin/Dashboard');
                        }

                    }
                    else{
                        $data['error_message'] = 'Contact Administrator';
                        $this->load->view('admin/login', $data);
                    }


                } else {

                    $data['error_message'] = 'Contact Administrator';
                    $this->load->view('admin/login', $data);
                }
            } else {
                $data['error_message'] = 'Invalid';
                $this->load->view('admin/login', $data);
            }
        }
    }

    public function logout()
    {
        $admin_session   = $this->session->userdata('siteadmin');
        $user_session = $this->session->userdata('siteuser');
        $this->auth->logout();
        if ($admin_session) {
            redirect('admin/login');
        } else if ($user_session) {
            redirect('site/userlogin');
        } else {
            redirect('site/userlogin');
        }
    }


    public function logout_staff()
    {
       
        $this->auth->logout_staff();
       
            redirect('admin/login');
        
    }

    

   

   

}
