<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}


     public function check_login($data)
    {
        $this->db->group_start();
        $this->db->where('email',$data['login']);
        $this->db->or_where('phone',$data['login']);
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('registered_from','puppyverify.com');
        $this->db->or_where('multiple_login',1);
        $this->db->group_end();

		$this->db->limit(1);
		$query = $this->db->get('user_accounts');

			$record= $query->result();

            if ($record) {
                $pass_verify = $this->enc_lib->passHashDyc($data['password'], $record[0]->password);
                if ($pass_verify) {
                    return $record;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
          
    }
    
    public function getpostcount()
    {
        $this->db->where('reviewed', 1);
        $this->db->where('user_id', $_SESSION['siteuser']['id']);
        $query = $this->db->get('posts');
        echo $query->num_rows();
    }


}
