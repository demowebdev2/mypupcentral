<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class Timeslots extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();  
      
        $this->load->model("timeslots_model");
		$this->load->library('form_validation');		
		
    }


	
	public function index()
	{
		$this->session->set_userdata('top_menu', 'Time Slots');
		$this->session->set_userdata('sub_menu', 'Time Slots/list');
		
		$data['title']='Dashboard';		
		$data['page']='admin/timeslots/list';
		$this->load->view('admin/layout',$data);
		
	}
	public function fetch()
	{ 
	     $where = ['application'=>'pv'];
		$fetch_data = $this->timeslots_model->list_records($where);		
		$data = array();
		$count=1;

		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
	    	$date = new DateTime($row->start_time);
		    $start =  $date->format('h:i a');
		    $date = new DateTime($row->end_time);
		    $end =  $date->format('h:i a');
		   
			$sub_array[] = wordwrap($row->title, 35, "<br>\n");
			$sub_array[] = wordwrap($start, 35, "<br>\n");
			$sub_array[] = wordwrap($end, 35, "<br>\n");
			$sub_array[] = wordwrap("$".$row->price, 35, "<br>\n");
			
						
			$sub_array[] = '<center>			
			
			<a class="btn btn-default btn-xs" title="Edit Details" href="' . base_url() . 'admin/timeslots/edit/' . $row->id . '" ><i class="fas fa-pen m-1"></i></a>
			
		
			</center>';
			

			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),			
			"recordsTotal"          =>   	$this->db->from("time_slots")->count_all_results(),
			 "recordsFiltered"    	=>   	$this->timeslots_model->list_filtered(),
			"data"                  =>     	$data
		);
		echo json_encode($output);
		exit;
	}
	public function add()
	{
		$this->session->set_userdata('top_menu', 'Time Slots');
		$this->session->set_userdata('sub_menu', 'Time Slots/add');		
		$data['title']='Time Slots';		
		$data['page']='admin/timeslots/add';
		$this->load->view('admin/layout',$data);
	}
	public function save()
	{
	
	   if (!$this->input->is_ajax_request()) {
  		 $json =array(
			 		'status' =>'error',
					 'msg'   =>'No direct script access allowed'
			 	); 
			 echo json_encode($json);
			 exit;
		}
		else
		{
			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');
			$this->form_validation->set_rules('start_time', 'Start Time', 'trim|required|xss_clean');
			$this->form_validation->set_rules('end_time', 'End Time', 'trim|required|xss_clean');
			$this->form_validation->set_rules('application', 'Application/Website Name', 'trim|required|xss_clean');
           
            if ($this->form_validation->run() == FALSE ) {			
				$json =array(
					'status' =>'error',
					'msg'   =>'Required feilds are missing'
				); 
				echo json_encode($json);
				exit;
			} 
			else {
				$data_insert =array(
					'title' =>$this->input->post('title'),
					'start_time' =>$this->input->post('start_time'),
					'end_time' =>$this->input->post('end_time'),
					'price' =>$this->input->post('price'),
					'application'=>$this->input->post('application'),
					);

						
			$insert = $this->common_model->create_record($data_insert,'time_slots');			
			 if($insert)
			 {
			 	$json =array(
			 		'status' =>'success',
			 		'msg' =>'Record added successfully',
			 	);
			 }
			 else
			 {
			 	$json =array(
			 		 'status' =>'error',
					 'msg' =>'Record saving failed',
			 	);
			 }
			 echo json_encode($json);
			 exit;
			}  //form validation true
		} // if ajax req

   }
   public function edit($id="")
	{
		$this->session->set_userdata('top_menu', 'timeslots');
		$this->session->set_userdata('sub_menu', 'timeslots/Edit');		
		$data['title']='timeslots';	
		$data['result'] = $this->db->where("id", $id)->get("time_slots")->result();	
		$data['page'] = 'admin/timeslots/edit';
		$this->load->view('admin/layout',$data);
	}
	public function edit_save()
	{
		

	   if (!$this->input->is_ajax_request()) {
  		 $json =array(
			 		'status' =>'error',
					 'msg'   =>'No direct script access allowed'
			 	); 
			 echo json_encode($json);
			 exit;
		}
		else
		{		
// 			$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('price', 'Price', 'trim|required|xss_clean');
		//	$this->form_validation->set_rules('application', 'Application/Website Name', 'trim|required|xss_clean');
// 			$this->form_validation->set_rules('start_time', 'Start Time', 'trim|required|xss_clean');
// 			$this->form_validation->set_rules('end_time', 'End Time', 'trim|required|xss_clean');
           
            if ($this->form_validation->run() == FALSE ) {
			
				$json =array(
					'status' =>'error',
					'msg'   =>'Required feilds are missing'
				); 
				echo json_encode($json);
				exit;
				} 
		else {
					
			   
			$id = $this->input->post('id');
			$data =array(
				// 	'title' =>$this->input->post('title'),
				// 	'start_time' =>$this->input->post('start_time'),
				// 	'end_time' =>$this->input->post('end_time'),
					'price' =>$this->input->post('price'),
				//	'application'=>$this->input->post('application'),
					);

				
			 $update = $this->common_model->update_records($data,['id'=>$id],'time_slots');			
			 if($update)
			 {
			 	$json =array(
			 		'status' =>'success',
			 		'msg' =>'Record updated successfully',
			 	);
			 }
			 else
			 {
			 	$json =array(
			 		'status' =>'error',
					 'msg' =>'Record saving failed',
			 	);
			 }
			 echo json_encode($json);
			 exit;
		}
		} // if ajax req

   }
public function delete()
{
	$id = $this->input->post('id');

	
	 $result = $this->db->select('*')
                        ->from('time_slots')
                        ->where('id', $id)
                        ->get()
                        ->num_rows();

                    if ($result == 0) {
                       $this->common_model->delete('time_slots',['id'=>$id]);
                       $json=array(
                       	'msg'=>'success'
                       );
                       echo json_encode($json);return true;
                    } 
                    else
                    {
                    	$json=array(
                       	'msg'=>'error'
                       );
                       echo json_encode($json);return true;
                    }
	

}


	
}
