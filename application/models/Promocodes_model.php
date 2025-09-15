<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Promocodes_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}


//select records
	function list_records($where){

		
		$this->db->select('promocode.*,time_slots.title as time_slot_title');
		$this->db->from('promocode');	
		$this->db->join('time_slots','time_slots.id=promocode.premium_type_id','left');
		if($where)
		{
		    $this->db->where($where);
		}
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("promocode.promo_code", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
		if($_POST["length"] != -1)
	{
		$this->db->limit($_POST['length'], $_POST['start']);
	}	
	    $this->db->order_by('id','desc');
		$query = $this->db->get();		
		if($query)
			{
			return $query->result();
		}
		else{
			return null;
		}

	}
	
function count_filtered_records(){
		
		$this->db->select('promocode.*');
		$this->db->from('promocode');	
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("promocode.promo_code", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
		
	 return $this->db->count_all_results();	
	

}
	
	
	

}

?>
