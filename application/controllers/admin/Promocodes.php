<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class Promocodes extends Admin_Controller {
	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();     
        $this->load->model("promocodes_model");
        $this->load->model("common_model");
		$this->load->library('form_validation');
		//$this->load->helper('form');
		$this->load->helper(array('form', 'url'));

    }

	
	public function index()
	{
		$this->session->set_userdata('top_menu', 'Promocodes');
		$this->session->set_userdata('sub_menu', 'Promocodes/list');
		
		$data['title']='Dashboard';		
		$data['page']='admin/promocodes/list';
		$this->load->view('admin/layout',$data);
		
	}
		public function fetch_promocodes()
	{
	    $where = ['promocode.application'=>'pv','time_slots.application'=>'pv'];
		$fetch_data = $this->promocodes_model->list_records($where);	
	
		$data = array();
		$count=1;
        if($fetch_data)
        {
		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
	    	 ($row->application=='ns')? $application = 'nosheddoodles.com' :  $application =  'puppyverify.com';
			$sub_array[] = strtoupper(wordwrap($row->promo_code, 35, "<br>\n")).'<small><br>'.wordwrap($application, 35, "<br>\n").'</small>';
			($row->limit_type)? $limit_type='Unlimited': $limit_type='Limited';
			$sub_array[] = wordwrap($row->time_slot_title, 35, "<br>\n").'<br>'.wordwrap($limit_type, 35, "<br>\n");
			
			 $date = new DateTime($row->valid_from);
		    $start =  $date->format('m-d-Y');
		    $date = new DateTime($row->valid_till);
		    $end =  $date->format('m-d-Y');
			$sub_array[] = wordwrap("From: ".$start, 35, "<br>\n").wordwrap("<br>To: ".$end, 35, "<br>\n");
			// ($row->discount_type)? $discount_type='Percentage': $discount_type='Amount';
			// $sub_array[] = wordwrap($discount_type, 35, "<br>\n");
			if($row->discount_type ==0)
			{
				$sub_array[] = wordwrap("$".$row->amount, 35, "<br>\n");
			}
			else
			{
				$sub_array[] = wordwrap($row->percentage."%", 35, "<br>\n");
			}
			$sub_array[] = wordwrap($row->amount_limit, 35, "<br>\n");
			$sub_array[] = wordwrap($row->usage_times, 35, "<br>\n");
			
						
			$sub_array[] = '<center>			
			
			<a class="btn btn-default btn-xs" title="Edit Details" href="' . base_url() . 'admin/promocodes/edit/' . $row->id . '" ><i class="fas fa-pen m-1"></i></a>
			
			<a class="btn btn-default btn-xs delete-btn" title="Delete" data-id="'.$row->id.'"><i class="fas fa-trash m-1"></i></a>
			</center>';
			

			$data[] = $sub_array;
			$count++;
		}
        }

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),			
			"recordsTotal"          =>   	$this->db->from("promocode")->count_all_results(),
			 "recordsFiltered"    	=>   	$this->promocodes_model->count_filtered_records(),
			"data"                  =>     	$data
		);
		echo json_encode($output);
		exit;
	}
	public function add()
	{
		$this->session->set_userdata('top_menu', 'Promocodes');
		$this->session->set_userdata('sub_menu', 'Promocodes/add');		
		$data['title']='Promocodes';		
		$data['page']='admin/promocodes/add';
		$data['premium_types'] = $this->db->from("time_slots")->where(['status'=>1,'application'=>'pv'])->get()->result();
		
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
			$this->form_validation->set_rules('promo_code', 'Promocode Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('premium_type', 'Premium Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('limit_type', 'Limit Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('valid_from', 'Valid From', 'trim|required|xss_clean');
			$this->form_validation->set_rules('valid_till', 'Valid Till', 'trim|required|xss_clean');
			$this->form_validation->set_rules('discount_type', 'Discount Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('amount_percent', 'Amount or Percentage', 'trim|required|xss_clean');
			$this->form_validation->set_rules('amount_limit', 'Amount Limit', 'trim|required|xss_clean');
			$this->form_validation->set_rules('usage_times', 'Usage Times', 'trim|required|xss_clean');
		
           
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
					'promo_code'=>$this->input->post('promo_code'),
					'premium_type_id'=>$this->input->post('premium_type'),
					'limit_type'=>$this->input->post('limit_type'),
					'valid_from'=>$this->input->post('valid_from'),
					'valid_till'=>$this->input->post('valid_till'),
					'discount_type'=>$this->input->post('discount_type'),				
					'amount_limit'=>$this->input->post('amount_limit'),
					'usage_times'=>$this->input->post('usage_times'),					
					'created_at'=>date("Y-m-d H:i:s"),
					'application' =>'pv',
					'application_type'=>$this->input->post('application_type'),
					'one_time_per_user'=>$this->input->post('one_time_per_user') ? 1 : 0,
					'is_active'=>$this->input->post('is_active') ? 1 : 0,
					'description'=>$this->input->post('description'),
				);
				
			$insert_id = $this->common_model->create_record($data_insert,'promocode');
					
			 if($insert_id)
			 {
			 	$result = $this->db->get_where('promocode',['id'=>$insert_id])->result();
               //update amount / percentage according to discount type
			 	if($result[0]->discount_type==0)
			 	{
			 		$this->db->update('promocode',['amount'=>$this->input->post('amount_percent')],['id'=>$insert_id]);
			 	}
			 	else
			 	{
			 		$this->db->update('promocode',['percentage'=>$this->input->post('amount_percent')],['id'=>$insert_id]);
			 	}
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
		$this->session->set_userdata('top_menu', 'Promocodes');
		$this->session->set_userdata('sub_menu', 'Promocodes/Edit');		
		$data['title']='Promocodes';	
		$data['result'] = $this->db->where("id", $id)->get("promocode")->result();	
		$data['premium_types'] = $this->db->from("time_slots")->where(['status'=>1,'application'=>'pv'])->get()->result();
		//var_dump($data['result']);exit;
		$data['page'] = 'admin/promocodes/edit';
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
			$this->form_validation->set_rules('promo_code', 'Promocode Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('premium_type', 'Premium Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('limit_type', 'Limit Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('valid_from', 'Valid From', 'trim|required|xss_clean');
			$this->form_validation->set_rules('valid_till', 'Valid Till', 'trim|required|xss_clean');
			$this->form_validation->set_rules('discount_type', 'Discount Type', 'trim|required|xss_clean');
			$this->form_validation->set_rules('amount_percent', 'Amount or Percentage', 'trim|required|xss_clean');
			$this->form_validation->set_rules('amount_limit', 'Amount Limit', 'trim|required|xss_clean');
			$this->form_validation->set_rules('usage_times', 'Usage Times', 'trim|required|xss_clean');
			
           
            if ($this->form_validation->run() == FALSE ) {
			
				$json =array(
					'status' =>'error',
					'msg'   =>'Required feilds are missing'
				); 
				echo json_encode($json);
				exit;
				} 
		else {
			$data_update =array(
					'promo_code'=>$this->input->post('promo_code'),
					'premium_type_id'=>$this->input->post('premium_type'),
					'limit_type'=>$this->input->post('limit_type'),
					'valid_from'=>$this->input->post('valid_from'),
					'valid_till'=>$this->input->post('valid_till'),
					'discount_type'=>$this->input->post('discount_type'),				
					'amount_limit'=>$this->input->post('amount_limit'),
					'usage_times'=>$this->input->post('usage_times'),					
					'updated_at'=>date("Y-m-d H:i:s")
				);
				
			 
			$id = $this->input->post('id');
		     $update = $this->db->update('promocode',$data_update,['id'=>$id]);
			// $update = $this->common_model->update_records($data,['id'=>$id],'promocode');			
			 if($update)
			 {
			 	$result = $this->db->get_where('promocode',['id'=>$id])->result();
               //update amount / percentage according to discount type
			 	if($result[0]->discount_type==0)
			 	{
			 		$this->db->update('promocode',['amount'=>$this->input->post('amount_percent'),'percentage'=>''],['id'=>$id]);
			 	}
			 	else
			 	{
			 		$this->db->update('promocode',['percentage'=>$this->input->post('amount_percent'),'amount'=>''],['id'=>$id]);
			 	}
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
                        ->from('promocode')
                        ->where('id', $id)
                        ->get()
                        ->num_rows();

                    if ($result != 0) {

                       $this->db->delete('promocode',['id'=>$id]);
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
