<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Auth {

    public $CI;

    //this is the expiration for a non-remember session
    //var $session_expire    = 600;

    public function __construct() {
        $this->CI = &get_instance();

        $this->CI->load->database();
    }

    /*
      this checks to see if the admin is logged in
      we can provide a link to redirect to, and for the login page, we have $default_redirect,
      this way we can check if they are already logged in, but we won't get stuck in an infinite loop if it returns false.
     */

    public function logged_in() {
        return (bool) $this->CI->session->userdata('siteadmin');
    }

    public function logged_in_staff() {
        return (bool) $this->CI->session->userdata('sitestaff');
    }

    public function user_logged_in() {
        return (bool) $this->CI->session->userdata('siteuser');
    }



    public function is_logged_in($default_redirect = false) {

        //var_dump($this->CI->session->userdata('session_id'));
        //$redirect allows us to choose where a customer will get redirected to after they login
        //$default_redirect points is to the login page, if you do not want this, you can set it to false and then redirect wherever you wish.

        $admin = $this->CI->session->userdata('siteadmin');

        if (empty($admin)) {
            
            $_SESSION['redirect_to'] = current_url();
            redirect('site/login');

            return false;
        }
        
        else if($admin['role_id']!=7)
        {
            $_SESSION['redirect_to'] = current_url();
            redirect('site/login');

            return false;
        }
        else {

            if ($default_redirect) {

                redirect('admin/dashboard');
            }
            return true;
        }
    }

    public function is_logged_in_staff($default_redirect = false) {

        //var_dump($this->CI->session->userdata('session_id'));
        //$redirect allows us to choose where a customer will get redirected to after they login
        //$default_redirect points is to the login page, if you do not want this, you can set it to false and then redirect wherever you wish.

        $admin = $this->CI->session->userdata('sitestaff');

        if (!$admin) {

            $_SESSION['redirect_to'] = current_url();
            redirect('site/login');

            return false;
        }
        else if($admin['role_id']!=1)
        {
            $_SESSION['redirect_to'] = current_url();
            redirect('site/login');

            return false;
        }
        else {

            if ($default_redirect) {

                redirect('staff/dashboard');
            }
            return true;
        }
    }

    public function is_logged_in_user($default_redirect = false) {

        //var_dump($this->CI->session->userdata('session_id'));
        //$redirect allows us to choose where a customer will get redirected to after they login
        //$default_redirect points is to the login page, if you do not want this, you can set it to false and then redirect wherever you wish.

        $user = $this->CI->session->userdata('siteuser');

        if (!$user) {

            $_SESSION['redirect_to'] = current_url();
            redirect('login');

            return false;
        } else {

            // if ($default_redirect) {

            //     redirect('admin/dashboard');
            // }
            return true;
        }
    }


    /*
      this function does the logging in.
     */

    /*
      this function does the logging out
     */

    public function logout() {
        $this->CI->session->unset_userdata('siteadmin');
        $this->CI->session->sess_destroy();
    }

    public function logout_user() {
        $this->CI->session->unset_userdata('siteuser');
        // $this->CI->session->sess_destroy();
        redirect("login","refresh");
    }

    public function logout_staff() {
        $this->CI->session->unset_userdata('siteadmin');
        $this->CI->session->sess_destroy();
    }


  

    /*
      This function gets the admin by their email address and returns the values in an array
      it is not intended to be called outside this class
     */

    private function get_admin_by_email($email) {
        $this->CI->db->select('*');
        $this->CI->db->where('email', $email);
        $this->CI->db->limit(1);
        $result = $this->CI->db->get('admin');
        $result = $result->row_array();

        if (sizeof($result) > 0) {
            return $result;
        } else {
            return false;
        }
    }

    /*
      This function takes admin array and inserts/updates it to the database
     */

    public function save($admin) {
        if ($admin['id']) {
            $this->CI->db->where('id', $admin['id']);
            $this->CI->db->update('admin', $admin);
        } else {
            $this->CI->db->insert('admin', $admin);
        }
    }

    /*
      This function gets a complete list of all admin
     */

    public function get_admin_list() {
        $this->CI->db->select('*');
        $this->CI->db->order_by('lastname', 'ASC');
        $this->CI->db->order_by('firstname', 'ASC');
        $this->CI->db->order_by('email', 'ASC');
        $result = $this->CI->db->get('admin');
        $result = $result->result();

        return $result;
    }

    /*
      This function gets an individual admin
     */

    public function get_admin($id) {
        $this->CI->db->select('*');
        $this->CI->db->where('id', $id);
        $result = $this->CI->db->get('admin');
        $result = $result->row();

        return $result;
    }

    public function check_id($str) {
        $this->CI->db->select('id');
        $this->CI->db->from('admin');
        $this->CI->db->where('id', $str);
        $count = $this->CI->db->count_all_results();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_email($str, $id = false) {
        $this->CI->db->select('email');
        $this->CI->db->from('admin');
        $this->CI->db->where('email', $str);
        if ($id) {
            $this->CI->db->where('id !=', $id);
        }
        $count = $this->CI->db->count_all_results();

        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        if ($this->check_id($id)) {
            $admin = $this->get_admin($id);
            $this->CI->db->where('id', $id);
            $this->CI->db->limit(1);
            $this->CI->db->delete('admin');

            return $admin->firstname . ' ' . $admin->lastname . ' has been removed.';
        } else {
            return 'The admin could not be found.';
        }
    }

    


}
