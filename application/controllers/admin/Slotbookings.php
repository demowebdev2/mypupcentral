<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class Slotbookings extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();  
      
        $this->load->model("slotbookings_model");
		
    }
	
public function index()
	{
		$this->session->set_userdata('top_menu', 'Slot Bookings');
		$this->session->set_userdata('sub_menu', 'Slot Bookings/list');
		
		$data['title']='Dashboard';		
		$data['page']='admin/slotbookings/list';
		$this->load->view('admin/layout',$data);
		
	}
public function fetch()
	{
		$fetch_data = $this->slotbookings_model->list_records();
		//var_dump($fetch_data);exit;		
		$data = array();
		$count=$_POST['start']+1;
            
		foreach ($fetch_data as $row) {
		    if($row->is_merged==1)
		    {
		        $stat='<br><span class="badge badge-success">Merged</span>';
		    }
		    else{
		         $stat='<br><span class="badge badge-danger">Not Merged</span>';
		    }
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = wordwrap($row->post_title, 35, "<br>\n").'<a class="btn btn-default btn-xs" title="View Details" href="' . base_url() . 'admin/ads/view/' . $row->post_id . '" target="_blank" ><i class="fas fa-eye m-1" style="font-size: 0.73em;"></i></a>'.wordwrap("<br><small>Breeder : ".$row->name, 35, "<br>\n").wordwrap("<br>Contact Person : ".$row->contact_person, 50, "<br>\n").wordwrap("<br>Contact Phone : ".$row->contact_phone, 35, "</small><br>\n"). $stat;

		    $date = new DateTime($row->start_time);
		    $start =  $date->format('h:i a m-d-Y');
		    $date = new DateTime($row->end_time);
		    $end =  $date->format('h:i a m-d-Y');
			$sub_array[] = $row->premium_title;
			$sub_array[] = wordwrap("$".$row->sub_total, 35, "<br>\n");
			$sub_array[] = wordwrap($row->txn_id, 35, "<br>\n");
				$sub_array[] =$newDate = date("m-d-Y", strtotime($row->updated_at));
			
						
			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),			
			"recordsTotal"          =>   	$this->slotbookings_model->count_all_results(),
			"recordsFiltered"    	=>   	$this->slotbookings_model->filtered(),
			"data"                  =>     	$data
		);
		
		echo json_encode($output);
		exit;
	}
	
  	
}
