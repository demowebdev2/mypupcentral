<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Blogs_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}


//select records
	function list_records(){

		
		$this->db->select('blogs.*,p_category.category');
		$this->db->from('blogs');	
		$this->db->join('p_category','p_category.id=blogs.category_id','left');	
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("blogs.title", $_POST["search"]["value"]);
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
function get($id)
{
	$this->db->select('blogs.*,p_category.category');
		$this->db->from('blogs');	
		$this->db->join('p_category','p_category.id=blogs.category_id','left');	
		$this->db->where('blogs.id',$id);
		$query = $this->db->get();		
		if($query)
			{				
			return $query->result();
		}
		else{
			return null;
		}
 
}




	function deleteImage($id,$column_name)
{

   $sql="UPDATE blogs set ". $column_name ."= '' WHERE id=".$id ;
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
public function getpic($id)
	{
		$this->db->select('*');
		$this->db->from('blog_images');
		$this->db->where('blog_id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}



}

?>
