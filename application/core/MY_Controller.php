<?php

define('THEMES_DIR', 'themes');
define('BASE_URI', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

class MY_Controller extends CI_Controller {

    protected $langs = array();

    function __construct() {
        parent::__construct();
        $lang_array = array();

        $this->load->library('auth');

    }

}

class Admin_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('rbac');
        $this->auth->is_logged_in();
    }

}

class staff_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('rbac');
        $this->auth->is_logged_in_staff();
    }

}

class User_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->auth->is_logged_in_user('user');
    }

}


class Public_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
    }

}



?>
