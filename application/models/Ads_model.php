<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Ads_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}
	
	
	function get_ads($where=null,$limit=null){
	    
		
		if(empty($_SESSION['random_time']) || empty($_SESSION['random']))
		{
		   
		     $rand_time=date("Y-m-d H:i:s");
		    $_SESSION['random_time']=$rand_time;
		    
		    $rand=random_int(1, 9);
		    $_SESSION['random']=$rand;
		 
		   
		}
		else{
		     $hourdiff = (strtotime(date("Y-m-d H:i:s")) - strtotime($_SESSION['random_time']))/3600;
		    $rand=$_SESSION['random'];
		    if($hourdiff>=3)
		    {
		        
		         $rand=random_int(1, 9);
		        $_SESSION['random']=$rand;
		        
		         $rand_time=date("Y-m-d H:i:s");
		         $_SESSION['random_time']=$rand_time;
		    }
		   
		}
// 		$this->db->select('posts.*,book_time_slot.*,posts.id as post_id,posts_pictures.picture,posts_videos.video,contact_person.full_name as contact_person, contact_person.phone as contact_phone,breeds.breed_name');
	
		$this->db->select('posts.*,posts.id as post_id,breeds.breed_name');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
// 			$this->db->join('contact_person','contact_person.id=posts.contact_name','left');
				// $this->db->join('book_time_slot','book_time_slot.ad_id=posts.id AND book_time_slot.txn_status=1','left');
		 $this->db->join('breeds','breeds.id=posts.category_id','left');
		$this->db->group_by('posts.id');
		$this->db->where('reviewed',1);
			$this->db->where('posts.is_sold',0);
		
// 		$this->db->where('is_timeslot',0);
		    
		    
// 	        $this->db->group_start();
		
// 			$this->db->where('book_time_slot.is_published ',0);
// 			$this->db->or_where('book_time_slot.is_published ',NULL);
// 			$this->db->group_end();
				 $this->db->group_start();
			$this->db->where('posts.uploaded_from','puppyverify.com');
			$this->db->or_where('posts.is_merged','1');
		
			$this->db->group_end();
			
			
		if($where!=null)
		{
			$this->db->where($where);
		}
		$this->db->order_by('rand('.$rand.')');
// 	$this->db->order_by('posts.id','DESC');
if($limit==null)
{
   	$this->db->limit(20);
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
	
		function get_ads_sold($where=null){
		    
		    if(empty($_SESSION['random']))
		{
		    $rand=random_int(1, 99);
		    $_SESSION['random']=$rand;
		}
		else{
		    $rand=$_SESSION['random'];
		}
		
		$this->db->select('posts.*,breeds.breed_name');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
// 			$this->db->join('contact_person','contact_person.id=posts.contact_name','left');
			 $this->db->join('breeds','breeds.id=posts.category_id','left');
		$this->db->group_by('posts.id');
		$this->db->where('reviewed',1);
			$this->db->where('posts.is_sold',1);
			$this->db->order_by('posts.sold_date','DESC');
		
		  $this->db->group_start();
			$this->db->where('posts.uploaded_from','puppyverify.com');
			$this->db->or_where('posts.is_merged','1');
			$this->db->group_end();
		
			if($where!=null)
		{
			$this->db->where($where);
		}
		
		$this->db->limit(8);
		$query = $this->db->get();
			if($query)
			{
			return $query->result();
		}
		else{
			return null;
		}

	}
	
	public function gettimeslots()
	{
		$this->db->select('*');
		$this->db->from('book_time_slot');
		$this->db->where('txn_status','1');
		$this->db->order_by('id', "asc");
		$query = $this->db->get();
		return $query->result_array();
	}

		function get_premiumads($where=null){
		    
		    	
		if(empty($_SESSION['random_time']) || empty($_SESSION['random']))
		{
		   
		     $rand_time=date("Y-m-d H:i:s");
		    $_SESSION['random_time']=$rand_time;
		    
		    $rand=random_int(1, 9);
		    $_SESSION['random']=$rand;
		 
		   
		}
		else{
		     $hourdiff = (strtotime(date("Y-m-d H:i:s")) - strtotime($_SESSION['random_time']))/3600;
		    $rand=$_SESSION['random'];
		    if($hourdiff>=3)
		    {
		        
		         $rand=random_int(1, 9);
		        $_SESSION['random']=$rand;
		        
		         $rand_time=date("Y-m-d H:i:s");
		         $_SESSION['random_time']=$rand_time;
		    }
		   
		}
		
		$this->db->select('posts.*,posts.id as post_id,book_time_slot.*,posts_pictures.picture,posts_videos.video,contact_person.full_name as contact_person, contact_person.phone as contact_phone');
		$this->db->from('posts');
		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
		$this->db->join('contact_person','contact_person.id=posts.contact_name','left');
		$this->db->join('book_time_slot','book_time_slot.ad_id=posts.id AND book_time_slot.txn_status=1','left');
		$this->db->group_by('posts.id');
		$this->db->where('reviewed',1);
		$this->db->where('is_timeslot',1);
		$this->db->where('book_time_slot.is_published',1);
// 		$this->db->where('posts.id',$id);

            $this->db->group_start();
			$this->db->where('book_time_slot.created_from','puppyverify.com');
			$this->db->or_where('book_time_slot.is_premium_merged','1');
			$this->db->group_end();
		if($where!=null)
		{
			$this->db->where($where);
		}
			$this->db->order_by('rand('.$rand.')');
			$this->db->limit(20);
	    $query = $this->db->get();
			if($query)
			{
			return $query->result();
		}
		else{
			return null;
		}

	}


public function get($id)
{
	// var_dump($id);exit;
	
		$this->db->select('posts.*,posts.id as post_id,
			breeds.breed_name,
			user_accounts.name,
			user_accounts.email,
			user_accounts.phone,
			user_accounts.usda,
			user_accounts.photo,
		   user_accounts.registered_from as breeder_from,
			user_accounts.is_verified,
			contact_person.full_name as contact_person, 
			contact_person.phone as contact_phone
			');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
		$this->db->join('user_accounts','user_accounts.id=posts.user_id','left');
		$this->db->join('breeds','breeds.id=posts.category_id','left');
		$this->db->join('contact_person','contact_person.id=posts.contact_name','left');
		$this->db->where('posts.id',$id);
		$this->db->group_by('posts.id');


	
		
		$query = $this->db->get();
			if($query)
			{

			return $query->result();
		}
		else{
			return null;
		}
}

public function get_details($where,$table)
{
	   $this->db->where($where);
		$result = $this->db->get($table);
		if($result)
			return $result->result();
		else
			return false;
}
//select records
	function list_records(){
		
		$this->db->select('posts.*');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
		$this->db->group_by('posts.id');
		$this->db->order_by('posts.id','DESC');
		
		$this->db->group_start();
        $this->db->where('posts.uploaded_from','puppyverify.com');
        $this->db->or_where('posts.is_merged','1');
        $this->db->group_end();
		
		//$this->db->limit($limit);
			if(isset($_POST["search"]["value"]))
	{
		$this->db->group_start();
		$this->db->like("posts.title", $_POST["search"]["value"]);
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
	
	function list_records_filtered()
	{
	    $this->db->select('posts.*');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
		$this->db->group_by('posts.id');
		//$this->db->limit($limit);
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("posts.title", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
    	return $this->db->count_all_results();
	}
	function list_pending_requests(){
		
		$this->db->select('posts.*');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
		$this->db->where('reviewed',0);
		$this->db->order_by('posts.id','DESC');
		$this->db->group_by('posts.id');
		
	if(isset($_POST["search"]["value"]))
	{
		$this->db->group_start();
		$this->db->like("posts.title", $_POST["search"]["value"]);
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
	
	function list_pending_requests_filtered()
	{
	   	$this->db->select('posts.*');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
		$this->db->where('reviewed',0);
		$this->db->group_by('posts.id');
    	if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("posts.title", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
	
    	return $this->db->count_all_results();
	}
	
	function get_filtered_general($where = "")
	{
		$this->make_query();
		$query = $this->db->get();

		return $query->num_rows();
	}
   function make_datatables_breeder_inner_join($where)
	{
		$this->make_query($where);
		if ($_POST["length"] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();

		return $query->result();
	}
	
	public function getbreeds($where=null)
	{
		$this->db->select('*');
		$this->db->from('breeds');
		if($where != null)
		{
		    $this->db->where($where);
		}
		$this->db->order_by('breed_name','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getcontact()
	{
		$this->db->select('*');
		$this->db->from('contact_person');
		$this->db->where('user_account_id',$_SESSION['siteuser']['id']);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function addad($table,$data)
	{
		$this->db->insert($table,$data);
        return $this->db->insert_id();
	}

	public function update_post($table,$data,$id,$status=0)
	{
		$this->db->set($data);
		if($table == 'posts_pictures')
		{
		   $this->db->where('post_id',$id); 
		   $this->db->where('status',$status); 
		}
		else
		{
		   $this->db->where('id',$id); 
		}
		
		$this->db->update($table);
		return true;
	}

	public function getallpostbreeder(){
		
		$this->db->select('*,posts.id as post_id');
		$this->db->from('posts');
		$this->db->join('breeds','breeds.id=posts.category_id','left');
		$this->db->join('contact_person','contact_person.id=posts.contact_name','left');
		$this->db->where('user_id',$_SESSION['siteuser']['id']);
		$this->db->where('reviewed','1');
		$query = $this->db->get();
		return $query->result();

	}

	public function getpost($id)
	{
		$this->db->select('*');
		$this->db->from('posts');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function getpic($id)
	{
		$this->db->select('*');
		$this->db->from('posts_pictures');
		$this->db->where('post_id',$id);
		$this->db->where('is_featured',0);
		$this->db->order_by('status','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getvideo($id)
	{
		$this->db->select('*');
		$this->db->from('posts_videos');
		$this->db->where('post_id',$id);
		$this->db->where('is_featured',0);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function deleteitem($table,$id)
	{
		$this->db->where('post_id',$id);
		$this->db->delete($table);
		return true;
	}
	
	
	
	//search ads frontend


		function make_pagination_query($where=null,$like=null,$limit=null,$start=null,$order_by=null,$order=null,$premium=null,$search=null)
	{
	   
		$time=date("Y-m-d H:i");
        $date=date('Y-m-d H:i:s', strtotime('-45 days'));
        
       	if(empty($_SESSION['random_time']) || empty($_SESSION['random']))
		{
		   
		     $rand_time=date("Y-m-d H:i:s");
		    $_SESSION['random_time']=$rand_time;
		    
		    $rand=random_int(1, 9);
		    $_SESSION['random']=$rand;
		 
		   
		}
		else{
		     $hourdiff = (strtotime(date("Y-m-d H:i:s")) - strtotime($_SESSION['random_time']))/3600;
		    $rand=$_SESSION['random'];
		    if($hourdiff>=3)
		    {
		        
		         $rand=random_int(1, 9);
		        $_SESSION['random']=$rand;
		        
		         $rand_time=date("Y-m-d H:i:s");
		         $_SESSION['random_time']=$rand_time;
		    }
		   
		}

// 		$this->db->select('posts.*,breeds.*,posts.id as postid,posts.asking_price as ad_price,book_time_slot.*,posts_pictures.picture,posts_videos.video,DATEDIFF("'.date("Y-m-d H:i:s").'", book_time_slot.start_time) as datediff');
// 	$this->db->select('posts.*,breeds.*,posts.id as postid,posts.asking_price as ad_price,book_time_slot.*,posts_pictures.picture,posts_videos.video,user_accounts.name');
	$this->db->select('posts.*,breeds.*,posts.id as postid,posts.asking_price as ad_price,user_accounts.name');
		$this->db->from('posts');
// 		$this->db->join('posts_pictures','posts_pictures.post_id=posts.id','left');
// 		$this->db->join('posts_videos','posts_videos.post_id=posts.id','left');
// 		$this->db->join('book_time_slot','book_time_slot.ad_id=posts.id','left');
		 $this->db->join('breeds','breeds.id=posts.category_id','left');
		  $this->db->join('user_accounts','user_accounts.id=posts.user_id','left');
		$this->db->group_by('posts.id');
		$this->db->where('posts.reviewed',1);
		$this->db->where('posts.created_at >=',$date);
		
		  $this->db->group_start();
			$this->db->where('posts.uploaded_from','puppyverify.com');
			$this->db->or_where('posts.is_merged','1');
			$this->db->group_end();
		
		if($premium==1)
		{
// 			$this->db->group_start();
		
// 			$this->db->where('book_time_slot.is_published <=',0);
// 			$this->db->or_where('book_time_slot.is_published ',NULL);
// 			$this->db->group_end();
            $this->db->where('posts.is_timeslot',0);
				
		}
		elseif($premium==2)
		{
			$this->db->group_start();
			$this->db->where('posts.is_timeslot',1);
			$this->db->group_end();
		  //  $this->db->group_start();
		
// 			$this->db->where('book_time_slot.created_from','puppyverify.com');
// 			$this->db->or_where('book_time_slot.is_premium_merged','1');
// 			$this->db->group_end();
		}
// 		 $this->db->group_start();
// 			$this->db->where('posts.uploaded_from','puppyverify.com');
// 			$this->db->or_where('posts.is_merged','1');
		
// 			$this->db->group_end();
    	if(!empty($search))
    	{
    	    	$this->db->group_start();
    			$this->db->like('posts.title',$search);
    			$this->db->or_like('breeds.breed_name',$search);
    			$this->db->or_like('user_accounts.name',$search);
    			$this->db->or_like('user_accounts.phone',$search);
    			$this->db->group_end();
    	}
		if($limit!==null)
		{
			$this->db->limit($limit, $start);
		}
		if($where!==null)
		{
			$this->db->where($where);
		}
		if($like!==null)
		{
// 			$this->db->group_start();
    		$this->db->where($like);
    // 		$this->db->group_end();
		}
		if($order!=null && $order_by!=null)
		{
			 $this->db->order_by($order_by,$order);
		}else{
		   	$this->db->order_by('rand('.$rand.')');
	
			
		}
	}

	function get_ads_pagination($where,$like,$limit,$start,$order_by,$order,$premium,$search=null){

		$this->make_pagination_query($where,$like,$limit,$start,$order_by,$order,$premium,$search);
		$query = $this->db->get();  
		return $query->result();
		
	}

	function get_ads_pagination_count($where,$like)
	{
		$this->make_pagination_query($where,$like);
		$query = $this->db->get();  
		return $query->num_rows(); 
	}
    
    function make_query($where)
    {
        $this->db->select('*,posts.id as post_id,posts.created_at as createdate,posts.is_sold,posts.sold_date');
		$this->db->from('posts');
		$this->db->join('book_time_slot','book_time_slot.ad_id=posts.id AND book_time_slot.txn_status=1','left');
		$this->db->join('breeds','breeds.id=posts.category_id','left');
		$this->db->join('contact_person','contact_person.id=posts.contact_name','left');
		$this->db->where('posts.reviewed',1);
		
		   $this->db->group_start();
			$this->db->where('posts.uploaded_from','puppyverify.com');
			//$this->db->or_where('posts.is_merged','1');
			$this->db->group_end();
        
        $this->db->where($where);
        
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("posts.title", $_POST["search"]["value"]);
            $this->db->group_end();
        } 
            $this->db->order_by('posts.id', 'DESC');
        
    }
    function make_datatable($where)
    {
        $this->make_query($where);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function make_query_cart($where)
    {
        $this->db->select('*,posts.id as post_id,posts.created_at as createdate,posts.is_sold,posts.sold_date');
		$this->db->from('posts');
		$this->db->join('book_time_slot','book_time_slot.ad_id=posts.id AND book_time_slot.txn_status=1','left');
		$this->db->join('breeds','breeds.id=posts.category_id','left');
		$this->db->join('contact_person','contact_person.id=posts.contact_name','left');
		
		   $this->db->group_start();
			$this->db->where('posts.uploaded_from','puppyverify.com');
			//$this->db->or_where('posts.is_merged','1');
			$this->db->group_end();
        
        $this->db->where($where);
        
        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("posts.title", $_POST["search"]["value"]);
            $this->db->group_end();
        } 
            $this->db->order_by('posts.id', 'DESC');
        
    }
    function make_datatable_cart($where)
    {
        $this->make_query_cart($where);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_filtered_data($where)
    {
        $this->make_query($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function get_filtered_data_cart($where)
    {
        $this->make_query_cart($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_data($where)
    {
        $this->db->select('*');
		$this->db->from('posts');
        $this->db->where('posts.reviewed',1);
        $this->db->where($where);
        return $this->db->count_all_results();
    }
    function count_all_data_cart($where)
    {
        $this->db->select('*');
		$this->db->from('posts');
        $this->db->where('posts.reviewed',0);
        $this->db->where($where);
        return $this->db->count_all_results();
    }
    
    //review pagination
	function review_pagination_query($where=null,$limit=null,$start=null,$order_by=null,$order=null)
	{
	
		$this->db->select('*');
		$this->db->from('breeder_review');
		$this->db->where($where);
		
		
		if($limit!==null)
		{
			$this->db->limit($limit, $start);
		}
		if($where!==null)
		{
			$this->db->where($where);
		}
	
		if($order!=null && $order_by!=null)
		{
			 $this->db->order_by($order_by,$order);
		}else{
		    $this->db->order_by('rand(5)');
	
			
		}
	}

	function get_review_pagination($where,$limit,$start,$order_by,$order)
	{
		$this->review_pagination_query($where,$limit,$start,$order_by,$order);
		$query = $this->db->get();  
		return $query->result();
	}

function change_status($where,$colum,$table)

{		
	$this->db->where($where);
   $result=$this->db->get($table);
   $status=$result->row_array()[$colum];

   if($status==1)
   {
   	//$new_status=0;
   	$data =array(
   		'is_sold'=>0,
   		'sold_date'=>NULL
   	);
   }
   else
   {
   	// $new_status=1;
   		$data =array(
   		'is_sold'=>1,
   		'sold_date'=>date("Y-m-d H:i:s")
   	);
   }
	// $this->db->set($colum,$new_status);
	$this->db->set($data);
	$this->db->where($where);
	$this->db->update($table);

} 
	public function deleteimage($id,$status)
	{
	    $this->db->delete('posts_pictures', array('post_id' => $id,'status'=> $status));

        
            return TRUE;
        
	}
	public function get_max_id($table)
    {
       $this->db->select_max('id');
       $query = $this->db->get($table);
    
    	return $query->row_array()['id'];
    }
    
    function gettotamount($where)
    {
        $this->db->select_sum('sub_total');
		$this->db->from('posts');
		$this->db->join('book_time_slot','book_time_slot.ad_id=posts.id AND book_time_slot.txn_status=1','left');
		
        $this->db->where($where);
        $query = $this->db->get();
        return $query->row()->sub_total;
    }
    
    public function get_ad_states($where = null)
	{
    
		$this->db->select('posts.state_id,posts.id as post_id,US_STATES.*');
		$this->db->from('posts');
		$this->db->join('US_STATES', 'US_STATES.id=posts.state_id', 'left');

		$this->db->group_by('posts.state_id');
		$this->db->where('reviewed', 1);
		$this->db->where('posts.is_sold', 0);
		$this->db->where('posts.state_id !=', 0);

		if ($where != null) {
			$this->db->where($where);
		}

		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			return null;
		}
	}
	
	public function getseo($id)
	{
		$this->db->select('*');
		$this->db->from('seo');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}
	
		public function get_ad_states_new($where = null)
	{
		$this->db->select('US_STATES.*');
		$this->db->from('US_STATES');
		if ($where != null) {
			$this->db->where($where);
		}
		$query = $this->db->get();
		if ($query) {
			return $query->result();
		} else {
			return null;
		}
	}
	
}

?>
