<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Inventory_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}

function make_category_query($where)
{
	$user_id = $this->session->userdata('user_id');
	$this->db->select('*');
	$this->db->from('item_categories');
	$this->db->where($where);

	if(isset($_POST["search"]["value"]))
	{
		$this->db->group_start();
		$this->db->like("category_name", $_POST["search"]["value"]);
		$this->db->group_end();
	}

	else
	{
		$this->db->order_by('category_name', 'ASC');
	}
}
function make_category_datatables($where){
	$this-> make_category_query($where);
	if($_POST["length"] != -1)
	{
		$this->db->limit($_POST['length'], $_POST['start']);
	}
	$query = $this->db->get();
	return $query->result();
}
function get_filtered_category_data($where){
	$this->make_category_query($where);
	$query = $this->db->get();
	return $query->num_rows();
}
function get_all_category_data($where)
{
	$this->db->select('*');
	$this->db->from('item_categories');
	$this->db->where($where);
	return $this->db->count_all_results();
}


	public function create_category_slug($data,$table)
	{
		$this->load->helper(array("url", "text"));
		$new_slug = convert_accented_characters(url_title($data ,"dash", TRUE));
		$slug_name = $new_slug;
		$count=0;         // Create temp name
		while(true)
		{
			$this->db->select('slug');
			$this->db->where('slug',$slug_name);   // Test temp name
			$query = $this->db->get($table);
			if ($query->num_rows() == 0) break;
			else
				$slug_name=convert_accented_characters(url_title($new_slug.''.random_string('alpha', 6) ,"dash", TRUE));

		}
		return strtolower($slug_name);      // Return temp name
	}

}

?>
