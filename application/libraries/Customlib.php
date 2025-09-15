<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customlib {

    var $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $this->CI->load->library('user_agent');

        $this->CI->load->model('Setting_model', '', TRUE);
    }

    function getCSRF() {
        $csrf_input = "<input type='hidden' ";
        $csrf_input .= "name='" . $this->CI->security->get_csrf_token_name() . "'";
        $csrf_input .= " value='" . $this->CI->security->get_csrf_hash() . "'/>";

        return $csrf_input;
    }


    function getLoggedInUserData() {
        $admin = $this->CI->session->userdata('siteadmin');
        if ($admin) {
            return $admin;
        } else if ($this->CI->session->userdata('siteuser')) {
            $siteuser = $this->CI->session->userdata('siteuser');
            return $siteuser;
        }
    }

    function getLoggedInUserData2() {
        $admin = $this->CI->session->userdata('sitestaff');
        if ($admin) {
            return $admin;
        } 
    }




    function getAdminSessionUserName() {
        $student_session = $this->CI->session->userdata('siteadmin');
        $username = $student_session['username'];

        return $username;
    }



    function getStaffRole() {
        $admin = $this->CI->session->userdata('siteadmin');
        $roles = $admin['roles'];
        if ($admin) {
            $role_key = key($roles);
            return json_encode(array('id' => $roles[$role_key], 'name' => $role_key));
        }
    }



    function getUserData() {
        $result = $this->getLoggedInUserData();
        $id = $result["id"];
        $data = $this->CI->staff_model->get($id);
        return $data;
    }
    function getUserData2() {
        $result = $this->getLoggedInUserData2();
        $id = $result["id"];
        $data = $this->CI->staff_model->get($id);
        return $data;
    }

    public function setUserLog($username, $role) {
        if ($this->CI->agent->is_browser()) {
            $agent = $this->CI->agent->browser() . ' ' . $this->CI->agent->version();
        } elseif ($this->CI->agent->is_robot()) {
            $agent = $this->CI->agent->robot();
        } elseif ($this->CI->agent->is_mobile()) {
            $agent = $this->CI->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }

        $data = array(
            'user' => $username,
            'role' => $role,
            'ipaddress' => $this->CI->input->ip_address(),
            'user_agent' => $agent . ", " . $this->CI->agent->platform(),
        );
        $this->CI->userlog_model->add($data);
    }


//========================
//========================
}
