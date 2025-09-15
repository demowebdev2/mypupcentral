<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Timeslots_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}


//select records
	function list_records($where){

		
		$this->db->select('time_slots.*');
		$this->db->from('time_slots ');	
		$this->db->order_by('time_slots.id','DESC');
	//	$this->db->where('users.role_id',3);	
		if($where)
		{
		    $this->db->where($where);
		}
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("time_slots.title", $_POST["search"]["value"]);
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



	function list_filtered()
	{
		$this->db->select('time_slots.*');
		$this->db->from('time_slots ');	
    	if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("time_slots.title", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
	
    	return $this->db->count_all_results();

	}

	
}

?>
