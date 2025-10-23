<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Breeders_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}


//select records
function list_records($where=null){

		
		$this->db->select('user_accounts.*');
		$this->db->from('user_accounts ');
			$this->db->where('is_verified',1);
		if($where!=null)
		{
			$this->db->where($where);	
		}
	
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("user_accounts.name", $_POST["search"]["value"]);
			$this->db->or_like("user_accounts.email", $_POST["search"]["value"]);
			$this->db->or_like("user_accounts.phone", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
    	
    	// Handle DataTables ordering
    	if(isset($_POST["order"]))
    	{
    	    $column_order = array(null, 'user_accounts.id', 'user_accounts.name', 'user_accounts.phone', 'user_accounts.email');
    	    $order_column = $_POST['order']['0']['column'];
    	    $order_dir = $_POST['order']['0']['dir'];
    	    
    	    if(isset($column_order[$order_column]))
    	    {
    	        $this->db->order_by($column_order[$order_column], $order_dir);
    	    }
    	    else
    	    {
    	        $this->db->order_by('user_accounts.id','DESC');
    	    }
    	}
    	else
    	{
    	    $this->db->order_by('user_accounts.id','DESC');
    	}
    	
		if($_POST["length"] != -1)
	{
		$this->db->limit($_POST['length'], $_POST['start']);
	}	
		$query = $this->db->get();		
		if($query)
			{
			return $query->result();
		}
		else{
			return null;
		}

	}
public function list_pending_requests()
	{
		$this->db->select('user_accounts.*');
		$this->db->from('user_accounts ');	
		$this->db->where('is_verified',0);
		 $this->db->order_by('user_accounts.id','DESC');
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("user_accounts.name", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
		if($_POST["length"] != -1)
	{
		$this->db->limit($_POST['length'], $_POST['start']);
	}	
		$query = $this->db->get();		
		if($query)
			{
			return $query->result();
		}
		else{
			return null;
		}

	}



	function list_filtered($where=null)
	{
		$this->db->select('user_accounts.*');
		$this->db->from('user_accounts ');	
		if($where!=null)
		{
			$this->db->where($where);	
		}
	
    	if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("user_accounts.name", $_POST["search"]["value"]);
			$this->db->or_like("user_accounts.email", $_POST["search"]["value"]);
			$this->db->or_like("user_accounts.phone", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
	
    	return $this->db->count_all_results();

	}

	function list_pending_requests_filtered()
	{
	   	$this->db->select('user_accounts.*');
		$this->db->from('user_accounts ');	
		$this->db->where('is_verified',0);	
    	if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("user_accounts.name", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
	
    	return $this->db->count_all_results();
	}
}

?>
