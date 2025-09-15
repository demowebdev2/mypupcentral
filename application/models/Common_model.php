<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function __construct() {
		parent::__construct();

	}
	
	function check_blacklist($ip,$email)
	{
	     $this->db->where('ipaddress', $ip);
        $this->db->or_where('email', $email);
        $query = $this->db->get('blacklist');
       	$result= $query->result();
       	if(empty($result))
       	{
       	    return false;
       	}
       	elseif($result[0]->is_blacklisted==1)
       	{
       	    return true;
       	}
       	else{
       	    return false;
       	}
       	
	}
	
	function add_blacklist($ip,$email)
	{
	    $currentDateTime = date('Y-m-d H:i:s');
	    // Get the date and time 5 minutes before the current time
        $fiveMinutesAgo = new DateTime();
        $fiveMinutesAgo->modify('-5 minutes');
        $fiveMinutesAgoDateTime = $fiveMinutesAgo->format('Y-m-d H:i:s');

        $this->db->select("*");
        $this->db->from('blacklist');
	    $this->db->group_start();
	    $this->db->where('ipaddress', $ip);
        $this->db->or_where('email', $email);
        $this->db->group_end();
        $this->db->where("created_at BETWEEN '$fiveMinutesAgoDateTime' AND '$currentDateTime'");
        return $this->db->count_all_results();
	}

//create new record
	function create_record($params,$table)
	{
		foreach($params as $key => $value)
		{
			$this->db->set( $key, $value );
		}

		if($this->db->insert($table))
			return $this->db->insert_id();
		else
			return false;

	}

//select records
	function list_records($where,$table,$order_by,$order,$limit=NULL){
		if(!empty($where))
		{
			$this->db->where($where);}
		$this->db->order_by($order_by,$order);
		$this->db->limit($limit);
		$query = $this->db->get($table);

			return $query->result();

	}
	
	function list_records_breedsold($where,$table,$order_by,$order,$limit=8)
	{
		if(!empty($where))
		{
			$this->db->where($where);
		}
		$this->db->order_by($order_by,$order);
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $s = $query->result();
	}
	function list_row($table,$wheres)
	{
		$query = $this->db->get_where($table, $wheres, 1);
		return $query->row();
	}
	//Update records
	function update_records($data,$where,$table)
	{
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
		if($this->db->trans_status() === FALSE)
			return FALSE;
		else{
			if($this->db->affected_rows()==0)
				return FALSE;
			else
				return TRUE;
		}

		return true;
	}

	function count_records($table,$where)
	{

		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->count_all_results();
	}

	function delete($table, $where)
	{
		$this->db->where($where);
		$this->db->delete($table);
		if($this->db->affected_rows()==0)
			return FALSE;
		else
			return TRUE;
	}
function get($where,$table)
	{
		$this->db->where($where);
		$result = $this->db->get($table);
		if($result)
			return $result->result();
		else
			return false;

	}
function change_status($where,$colum,$table)

{		
	$this->db->where($where);
   $result=$this->db->get($table);
   $status=$result->row_array()[$colum];

   if($status==1)
   {
   	$new_status=0;
   }
   else
   {
   	$new_status=1;
   }
	$this->db->set($colum,$new_status);

	$this->db->where($where);

	$this->db->update($table);

} 
function deleteImage($id,$column_name,$tablename)
{

   $sql="UPDATE ".$tablename." set ". $column_name ."= '' WHERE id=".$id ;
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
public function getenquiries()
{
	$this->db->select('enquiries.*,
		enquiries.phone as user_phone,
		enquiries.email as user_email,
		posts.title as title

		');
	$this->db->from('enquiries');
	$this->db->join('posts','enquiries.post_id = posts.id','left');
	$this->db->where('breeder_id',$_SESSION['siteuser']['id']);
		$this->db->order_by('enquiries.id','DESC');
	$query = $this->db->get();
	return $query->result();
}
    public function getpostcount()
    {
       $this->db->where('reviewed', 1);
       $this->db->where('user_id', $_SESSION['siteuser']['id']);
        $this->db->where('is_sold', '0');
        $this->db->where('posts.uploaded_from', 'puppyverify.com');
       $query = $this->db->get('posts');
       return $query->num_rows();
    }
    
    public function getpendingpostcount()
    {
       $this->db->where('reviewed', 0);
       $this->db->where('user_id', $_SESSION['siteuser']['id']);
       $this->db->where('posts.uploaded_from', 'puppyverify.com');
       $query = $this->db->get('posts');
       return $query->num_rows();
    }

   public function getenquirycount()
   {
   	// $this->db->where('reviewed', 1);
	   $this->db->where('breeder_id', $_SESSION['siteuser']['id']);
	
	   $query = $this->db->get('enquiries');
	   return $query->num_rows();
   }
   
   public function getpremiumadcount()
    {
       $this->db->select('book_time_slot.id');
       $this->db->from('book_time_slot');
       $this->db->join('posts','posts.id = book_time_slot.ad_id','left');
       $this->db->where('posts.user_id', $_SESSION['siteuser']['id']);
       $this->db->where('posts.reviewed', '1');
       $this->db->where('posts.uploaded_from', 'puppyverify.com');
       $this->db->where('book_time_slot.txn_status', '1');
       return $this->db->count_all_results();
    }
    
    
      public function getviewcount()
    {
        $this->db->select_sum('view_count');
        $this->db->from('posts');
        $this->db->where('user_id', $_SESSION['siteuser']['id']);
        $query = $this->db->get();
        return $query->row()->view_count;
         
    }
    
    public function getsingleviewcount($id)
    {
        $this->db->select('view_count');
        $this->db->from('posts');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row()->view_count;
         
    }
    
     function gettxnpostcount()
    {
        $this->db->select('book_time_slot_main.*,posts.*,book_time_slot_main.created_at as txn_date,book_time_slot_main.id as ord_id');
		$this->db->from('book_time_slot_main');
        $this->db->join('posts','posts.id=book_time_slot_main.ad_id','left');
        $this->db->where('book_time_slot_main.txn_id !=',null);
        $this->db->where('book_time_slot_main.txn_status',1);
        $this->db->where('posts.user_id', $_SESSION['siteuser']['id']);
        return $this->db->count_all_results();
    }
      function getsoldcount()
    {
        $this->db->select('posts.id');
		$this->db->from('posts');       
        $this->db->where('posts.is_sold =',1);  
        $this->db->where('posts.user_id', $_SESSION['siteuser']['id']);    
        $this->db->where('posts.uploaded_from', 'puppyverify.com');    
         
        return $this->db->count_all_results();
    }
public function ad_breed_count()
{ 
    //$sql = "select br.*, COUNT(posts.id) AS count
//FROM breeds br
//LEFT join posts ON
//br.id=posts.category_id where br.is_puppyverify=1
//GROUP by br.id ORDER BY breed_name ASC;";
// ORDER BY count DESC;";
$date=date('Y-m-d H:i:s', strtotime('-45 days'));
$sql="SELECT  br.*
      , (SELECT Count(p.id) FROM posts p WHERE p.category_id = br.id AND p.is_sold=0 AND p.reviewed =1  AND p.created_at >= '".$date."') as count     
FROM breeds br
WHERE br.is_puppyverify=1
GROUP by br.id
ORDER BY br.breed_name ASC;";
$result = $this->db->query($sql);
 if($result)
 {
 	return $result->result();
 }
else
{
	return false;
 }
    
}

public function ad_breed_count2()
{ 
    //$sql = "select br.*, COUNT(posts.id) AS count
//FROM breeds br
//LEFT join posts ON
//br.id=posts.category_id where br.is_puppyverify=1
//GROUP by br.id ORDER BY breed_name ASC;";
// ORDER BY count DESC;";
$date=date('Y-m-d H:i:s', strtotime('-45 days'));
$sql="SELECT  br.*
      , (SELECT Count(p.id) FROM posts p WHERE p.category_id = br.id AND p.is_sold=0 AND p.reviewed =1  AND p.created_at >= '".$date."') as count     
FROM breeds br
WHERE br.is_puppyverify=1
GROUP by br.id
ORDER BY count DESC;";
$result = $this->db->query($sql);
 if($result)
 {
 	return $result->result();
 }
else
{
	return false;
 }
    
}


public function search_state()
{ 
    	$sql = "select US_STATES.*
FROM US_STATES order by STATE_NAME asc";
$result = $this->db->query($sql);
 if($result)
 {
 	return $result->result();
 }
else
{
	return false;
 }
    
}


public function three_day_plan_activate()
{
	$this->db->set(array('priority'=>1,'priority_date'=>date('Y-m-d')));
		// $this->db->update($table);
	// $this->db->update('posts.*,book_time_slot.*,posts_pictures.picture,posts_videos.video,contact_person.full_name as contact_person, contact_person.phone as contact_phone');
	
	$this->db->group_by('posts.id');
	$this->db->where('reviewed',1);
	$this->db->where('is_timeslot',1);
	$this->db->where('priority_date=( CURDATE() - INTERVAL 2 DAY )');
	$this->db->group_start();
	$this->db->where('premium_type',5);
	$this->db->or_where('premium_type',7);
	$this->db->group_end();
	$this->db->update('posts');
	if($this->db->trans_status() === FALSE)
			return FALSE;
		else{
			if($this->db->affected_rows()==0)
				return FALSE;
			else
				return TRUE;
		}
	
}

public function three_day_plan_deactivate()
{
	$this->db->set(array('priority'=>0,));
		// $this->db->update($table);
	// $this->db->update('posts.*,book_time_slot.*,posts_pictures.picture,posts_videos.video,contact_person.full_name as contact_person, contact_person.phone as contact_phone');
	
	$this->db->group_by('posts.id');
	$this->db->where('reviewed',1);
	$this->db->where('is_timeslot',1);
	$this->db->where('priority_date != ( CURDATE() - INTERVAL 3 DAY )');
	$this->db->group_start();
	$this->db->where('premium_type',5);
	$this->db->or_where('premium_type',7);
	$this->db->group_end();
	$this->db->update('posts');
	if($this->db->trans_status() === FALSE)
			return FALSE;
		else{
			if($this->db->affected_rows()==0)
				return FALSE;
			else
				return TRUE;
		}
	
}

public function getallpayable()
    {
       $this->db->select_sum("posts.sub_total");
       $this->db->where('reviewed', 0);
       $this->db->where('user_id', $_SESSION['siteuser']['id']);
       $this->db->where('posts.uploaded_from', 'puppyverify.com');
       $query = $this->db->get('posts');
       return $query->row();
    }
    
    
    	function list_records_review(){
		
		$this->db->select('breeder_review.*');
		$this->db->from('breeder_review');

		$this->db->group_by('breeder_review.id');
		$this->db->order_by('breeder_review.id','DESC');
		
	
		
		
			if(isset($_POST["search"]["value"]))
	{
		$this->db->group_start();
		$this->db->like("breeder_review.fullname", $_POST["search"]["value"]);
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
	    $this->db->select('breeder_review.*');
		$this->db->from('breeder_review');

		$this->db->group_by('breeder_review.id');
		//$this->db->limit($limit);
		if(isset($_POST["search"]["value"]))
    	{
    		$this->db->group_start();
    		$this->db->like("breeder_review.fullname", $_POST["search"]["value"]);
    		$this->db->group_end();
    	}
    	return $this->db->count_all_results();
	}

    
}

?>
