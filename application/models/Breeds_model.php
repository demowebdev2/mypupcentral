<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Breeds_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}


//select records
	function list_records(){

		
		$this->db->select('breeds.*');
		$this->db->from('breeds');	
		$this->db->where('is_puppyverify',1);	
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("breeds.breed_name", $_POST["search"]["value"]);
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
	
		function count_filtered_records(){

		
		$this->db->select('breeds.*');
		$this->db->from('breeds');	
		$this->db->where('is_puppyverify',1);	
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("breeds.breed_name", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
		
	 return $this->db->count_all_results();	
	

	}
	
	function deleteImage($id,$column_name)
{

   $sql="UPDATE breeds set ". $column_name ."= '' WHERE id=".$id ;
   $result =  $this->db->query($sql);	
   if($result)
   {
   	return true;
   }
   else
   {
   	return false;
   }
}
	

}

?>
