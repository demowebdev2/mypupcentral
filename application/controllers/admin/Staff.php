<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Staff extends Admin_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Enc_lib');


      //  $this->config->load('image_valid');
    }

    function index() {
        if (!$this->rbac->hasPrivilege('staff', 'can_view')) {
            access_denied();
        }
        else{
        $data['title'] = 'Staff Search';

        $this->session->set_userdata('top_menu', 'Staff');
        $this->session->set_userdata('sub_menu', '');
    		
        $resultlist = $this->staff_model->searchFullText('', 0);
        $data['resultlist'] = $resultlist;
        
    			$this->load->view('admin/header');
    			$this->load->view('admin/staff/staff',$data);
    			$this->load->view('admin/footer');


      }
    }


    function create() {

        if (!$this->rbac->hasPrivilege('staff', 'can_add')) {
            access_denied();
        }
        $this->session->set_userdata('top_menu', 'Staff');
        $this->session->set_userdata('sub_menu', 'Staff/add');

        $roles = $this->role_model->get();
        $data["roles"] = $roles;

        $data['title'] = 'Add Staff';
       
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
       
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', array('required', 'valid_email',
            array('check_exists', array($this->staff_model, 'valid_email_id'))
                )
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean');
       
       

        if ($this->form_validation->run() == FALSE) {


            $data['page']='admin/staff/create';
            $this->load->view('admin/layout',$data);
            

        } else {
            
           
            $role = 1;
            $name = $this->input->post("name");
            $gender = $this->input->post("gender");
           
            $contact_no = $this->input->post("contactno");
            $email = $this->input->post("email");
            $password = $this->input->post("password");

            $note = $this->input->post("note");
           $data_insert = array(
                'password' => $this->enc_lib->passHashEnc($password),
                'name' => $name,
                'contact_no' => $contact_no,
                'email' => $email,
                'note' => $note,
                'gender' => $gender,
                'is_active' => 1
            );

            $role_array = array('role_id' =>1, 'staff_id' => 0);
            $insert_id = $this->staff_model->batchInsert($data_insert, $role_array);
            $staff_id = $insert_id;

           

            $this->session->set_flashdata('msg', '<div class="alert alert-success">Success</div>');

            redirect('admin/staff');
        }
    }


    function edit($id) {
        if (!$this->rbac->hasPrivilege('staff', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Edit Staff';
        $data['id'] = $id;
       
        $staffRole = $this->staff_model->getStaffRole();
        $data["getStaffRole"] = $staffRole;
        $staff = $this->staff_model->get_edit($id);
        $data['staff'] = $staff;

        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('role', 'Role', 'trim|required|xss_clean');
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required|xss_clean');

      
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/header');
            $this->load->view('admin/staff/staffedit', $data);

            $this->load->view('admin/footer');
           
        } else {

            $role = $this->input->post("role");
            $name = $this->input->post("name");
            $gender = $this->input->post("gender");
           
            $contact_no = $this->input->post("contactno");
            $email = $this->input->post("email");
          

            $note = $this->input->post("note");
            $act=0;
            if(isset($_POST["active"]))
            {
                $act=1;
            }
           $data_insert = array(
               'id'=>$id,
                'name' => $name,
                'contact_no' => $contact_no,
                'email' => $email,
                'note' => $note,
                'gender' => $gender,
                'is_active' => $act
            );
            $insert_id = $this->staff_model->add($data_insert);

            $role_id = $this->input->post("role");

            $role_data = array('staff_id' => $id, 'role_id' => $role_id);

            $this->staff_model->update_role($role_data);

           
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Success</div>');
            redirect('admin/staff/edit/' . $id);
        }
    }

    public function change_pswd($id)
    {
        if (!$this->rbac->hasPrivilege('staff', 'can_edit')) {
            access_denied();
        }
        $data['title'] = 'Edit Staff';
        $data['id'] = $id;
       
        $staffRole = $this->staff_model->getStaffRole();
        $data["getStaffRole"] = $staffRole;
        $staff = $this->staff_model->get_edit($id);
        $data['staff'] = $staff;

        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|matches[cpassword]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|xss_clean');
       
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/header');
            $this->load->view('admin/staff/staffeditpwd', $data);

            $this->load->view('admin/footer');
           
        } else {

          
            $password = $this->input->post("password");
           $data_insert = array(
               'id'=>$id,
               'password' => $this->enc_lib->passHashEnc($password),
                
            );
            $insert_id = $this->staff_model->add($data_insert);

            $role_id = $this->input->post("role");

            $role_data = array('staff_id' => $id, 'role_id' => $role_id);

            $this->staff_model->update_role($role_data);

           
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Success</div>');
            redirect('admin/staff/change_pswd/' . $id);
        }

    }

    function delete($id) {
        if (!$this->rbac->hasPrivilege('staff', 'can_delete')) {
            access_denied();
        }
        $data['title'] = 'Staff List';
        $this->staff_model->remove($id);
        redirect('admin/Staff');
    }

    

}

?>
