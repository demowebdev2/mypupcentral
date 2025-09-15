<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Slotbookings_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}


//select records
	function list_records(){

		
		$this->db->select('posts.*,posts.id as post_id, posts.title as post_title,time_slots.*,time_slots.title as premium_title,');
		$this->db->from('posts');	
			$this->db->join('time_slots','posts.premium_type=time_slots.id','left');
				$this->db->where('posts.txn_status',1);
				$this->db->where('posts.txn_id !=',NULL);
				$this->db->where('posts.uploaded_from','puppyverify.com');
		$this->db->order_by('posts.id','DESC');	
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("posts.txn_id", $_POST["search"]["value"]);
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
public function count_all_results()
	{
		$this->db->select('posts.*,posts.id as post_id, posts.title as post_title,time_slots.*,time_slots.title as premium_title,');
		$this->db->from('posts');	
			$this->db->join('time_slots','posts.premium_type=time_slots.id','left');
				$this->db->where('posts.txn_status',1);
				$this->db->where('posts.txn_id !=',NULL);
				$this->db->where('posts.uploaded_from','puppyverify.com');	
		
    	return $this->db->count_all_results();

	}

	public function filtered()
	{
		$this->db->select('posts.*,posts.id as post_id, posts.title as post_title,time_slots.*,time_slots.title as premium_title,');
		$this->db->from('posts');	
			$this->db->join('time_slots','posts.premium_type=time_slots.id','left');
				$this->db->where('posts.txn_status',1);
				$this->db->where('posts.txn_id !=',NULL);
				$this->db->where('posts.uploaded_from','puppyverify.com');
		$this->db->order_by('posts.id','DESC');	
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("posts.txn_id", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
	
	 	return $this->db->count_all_results();
	}


}

?>
