<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Premiumads_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }


    function make_query($where)
    {
        $this->db->select('book_time_slot.*,posts.*,breeds.*,contact_person.*,posts.id as post_id,posts.created_at as createdate,time_slots.title as slot_title');
		$this->db->from('book_time_slot');
        $this->db->join('posts','posts.id=book_time_slot.ad_id','left');
        $this->db->join('time_slots','time_slots.id=book_time_slot.premium_type','left');
        $this->db->join('breeds','breeds.id=posts.category_id','left');
        $this->db->join('contact_person','contact_person.id=posts.contact_name','left');
		$this->db->where('posts.reviewed',1);
        $this->db->where('book_time_slot.txn_id !=',null);
        $this->db->where('book_time_slot.txn_status',1);
        $this->db->where($where);
     

        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("posts.title", $_POST["search"]["value"]);
            $this->db->group_end();
        } 
            $this->db->order_by('book_time_slot.id', 'DESC');
        
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
    function get_filtered_data($where)
    {
        $this->make_query($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all_data($where)
    {
        $this->db->select('book_time_slot.*,posts.*');
		$this->db->from('book_time_slot');
        $this->db->join('posts','posts.id=book_time_slot.ad_id','left');
        $this->db->where('posts.reviewed',1);
        $this->db->where('book_time_slot.txn_id !=',null);
        $this->db->where('book_time_slot.txn_status',1);
        $this->db->where($where);
        return $this->db->count_all_results();
    }
    
    
    
    //transaction datatable

    function make_txn_query($where)
    {
        $this->db->select('book_time_slot_main.*,posts.*,book_time_slot_main.created_at as txn_date,book_time_slot_main.id as ord_id');
		$this->db->from('book_time_slot_main');
        $this->db->join('posts','posts.id=book_time_slot_main.ad_id','left');
        $this->db->where('book_time_slot_main.txn_id !=',null);
        $this->db->where('book_time_slot_main.txn_status',1);
        $this->db->where($where);
     

        if (isset($_POST["search"]["value"])) {
            $this->db->group_start();
            $this->db->like("book_time_slot_main.sub_total", $_POST["search"]["value"]);
            $this->db->or_like("book_time_slot_main.created_at", $_POST["search"]["value"]);
            $this->db->group_end();
        } else {
            $this->db->order_by('book_time_slot_main.id', 'DESC');
        }
    }
    function make_txn_datatable($where)
    {
        $this->make_txn_query($where);
        if ($_POST["length"] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    function get_txn_filtered_data($where)
    {
        $this->make_txn_query($where);
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_txn_all_data($where)
    {
        $this->db->select('book_time_slot_main.*,posts.*,book_time_slot_main.created_at as txn_date,book_time_slot_main.id as ord_id');
		$this->db->from('book_time_slot_main');
        $this->db->join('posts','posts.id=book_time_slot_main.ad_id','left');
        $this->db->where('book_time_slot_main.txn_id !=',null);
        $this->db->where('book_time_slot_main.txn_status',1);
        $this->db->where($where);
        return $this->db->count_all_results();
    }
}
