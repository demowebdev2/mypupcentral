<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Breeders extends Staff_Controller {


	public function __construct()
    {
        parent::__construct();
      //  $this->SeesionModel->not_logged_in();
     
        $this->load->model("dashboard_model","dashboard");
        $this->load->model("breeders_model");
    }
	public function index()
	{
		$this->session->set_userdata('top_menu', 'Breeders');
		$this->session->set_userdata('sub_menu', 'Breeders');
        $data['title']='Breeders';
		$data['page']='staff/breeders';
		$this->load->view('staff/layout',$data);
		
	}

    public function fetch()
	{
        $where=array('user_accounts.admin_id'=>$_SESSION['sitestaff']['id']);
		$fetch_data = $this->breeders_model->list_records($where);
		$data = array();
		$count = 1;

		foreach ($fetch_data as $row) {
			$action = '';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = $row->id;
			$sub_array[] = wordwrap($row->name, 35, "<br>\n");
			$sub_array[] = wordwrap($row->phone, 35, "<br>\n");
			$sub_array[] = wordwrap($row->email, 35, "<br>\n");

			

			if ($row->is_verified === '1') {

			

				$sub_array[] = '<center><a href="' . base_url() . 'staff/breeders/signin/' . $row->id . '" target="_blank" class="btn btn-default btn-xs" title="Click to sign into breeder account"><i class="fas fa-sign-in-alt"></i></a></center>';
			} else {
				
				$sub_array[] = '<center></center>';
			}

			

			$data[] = $sub_array;
			$count++;
		}

		$output = array(
			"draw"                  =>     	intval($_POST["draw"]),
			"recordsTotal"          =>   	$this->db->from("user_accounts")->where('admin_id',$_SESSION['sitestaff']['id'])->count_all_results(),
			"recordsFiltered"    	=>   	$this->breeders_model->list_filtered($where),
			"data"                  =>     	$data
		);
		echo json_encode($output);
	}


    public function signin($id)
	{

		$user=$this->common_model->list_row('user_accounts',array('id'=>$id,'admin_id'=>$_SESSION['sitestaff']['id']));
if(!empty($user))
{
    $session_data   = array(
        'id'                     => $user->id,
        'name'       	        => $user->name,
        'email'                  => $user->email,
        	'premium'                  =>1,
        'is_loggedin'			=> true,
        'staff'					=>true,
        'staff_id' 				=>$_SESSION['sitestaff']['id'],
        'staff_name'			=>$_SESSION['sitestaff']['username']
    );
    $this->session->unset_userdata('siteuser');
    $this->session->set_userdata('siteuser', $session_data);

    redirect(base_url().'profile', 'refresh');
}
else{
    echo '<center><h2>Access Denied!</h2></center>';
}
		
	}
}
