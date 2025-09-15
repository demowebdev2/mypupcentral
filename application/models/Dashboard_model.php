<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}



	public function get_payments(){
		$this->db->select_sum('book_time_slot.price');
		$this->db->from('book_time_slot');
		$this->db->where('book_time_slot.txn_id!=',NULL);	
		$this->db->where('book_time_slot.txn_status=1');	
		$this->db->where('book_time_slot.created_from','puppyverify.com');	
		$result = $this->db->get();
		if($result)
		{
			return $result->row_array()['price'];		   
		}
		else
		{
			return false;
		}
		}
public function get_latets_ads()
		{
			$this->db->select('posts.*');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
		$this->db->join('user_accounts','user_accounts.id=posts.user_id','left');
// 		$this->db->join('contact_person','contact_person.id=posts.contact_name','left');	
		$this->db->where('posts.uploaded_from','puppyverify.com');
		$this->db->group_by('posts.id');
		$this->db->order_by('posts.created_at','DESC');
		//$this->db->where('reviewed',1);
		$this->db->limit(5);
		$query = $this->db->get();
			if($query)
			{
			return $query->result();
		}
		else{
			return null;
		}
			
		}
		
		
// 		public function get_latets_ads()
// 		{
// 			$this->db->select('posts.*,posts_pictures.picture,posts_videos.video,contact_person.full_name as contact_person,user_accounts.name as breeder_name,contact_person.phone as contact_phone');
// 		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
// 		$this->db->join('user_accounts','user_accounts.id=posts.user_id','left');
// 		$this->db->join('contact_person','contact_person.id=posts.contact_name','left');	
// 		$this->db->where('posts.uploaded_from','puppyverify.com');
// 		$this->db->group_by('posts.id');
// 		$this->db->order_by('posts.created_at','DESC');
// 		//$this->db->where('reviewed',1);
// 		$this->db->limit(5);
// 		$query = $this->db->get();
// 			if($query)
// 			{
// 			return $query->result();
// 		}
// 		else{
// 			return null;
// 		}
			
// 		}
	
public function get_latets_bookings()
	{
		$this->db->select('book_time_slot.*,posts.title,posts.id as post_id,user_accounts.name,contact_person.full_name as contact_person, contact_person.phone as contact_phone');
		$this->db->from('book_time_slot');	
		$this->db->join('posts','posts.id=book_time_slot.ad_id','left');	
		$this->db->join('user_accounts','user_accounts.id=posts.user_id','left');	
		$this->db->join('contact_person','contact_person.id=posts.contact_name','left');	
		$this->db->where('book_time_slot.txn_id!=',NULL);	
		$this->db->where('book_time_slot.txn_status=1');	
		$this->db->where('book_time_slot.created_from','puppyverify.com');	
		$this->db->order_by('book_time_slot.id','DESC');
		$this->db->limit(5);
		$query = $this->db->get();
			if($query)
			{
			return $query->result();
		}
		else{
			return null;
		}	
	}
	public function get_latest_breeder_req()
	{
		$this->db->select('user_accounts.*');
		$this->db->from('user_accounts');

		$this->db->where('registered_from','puppyverify.com');
		$this->db->where('is_verified',0);
		$this->db->limit(5);
		
		$query = $this->db->get();		
		if($query)
			{
			return $query->result();
		}
		else{
			return null;
		}

	}

}

?>
