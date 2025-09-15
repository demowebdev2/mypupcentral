<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Breeds extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
        $this->load->model('ads_model');
		$this->load->library('Mailer');
	}
	 	public function breeds()
    {
        if(isset($_GET['breed']))
        {
            $d=$this->common_model->list_row('breeds',array('id'=>$_GET['breed']));
            if(!empty($d))
            {
                redirect('breeds/'.$d->page_slug);
            }
            else{
                  redirect('available-breeds');
            }
        }
        
        $slug = $this->uri->segment(2);
        $seo = $this->ads_model->getseo(3);
		$data['title'] = $seo->meta_title;
		$data['description'] = $seo->meta_description;
		$data['keyword'] = $seo->meta_keywords;
        // $data['title'] = 'Breeds | MyPupCentral';
        
        $data['slug']=$slug ;

        // $data['breeds'] = $this->common_model->list_records(array('status'=>'Active','is_puppyverify'=>1),'breeds','breed_name','ASC');
		$data['breeds'] = $this->common_model->ad_breed_count();
        // $data['blogs'] = $this->common_model->list_records('','blogs','','');
        $breed_id = $this->input->get('breed');
        $data['breed_data'] = $this->common_model->list_records(['page_slug'=>$slug,'status'=>'Active','is_puppyverify'=>1],'breeds','','');
        //   $data['title'] =  $data['breed_data'][0]->breed_name.' | MyPupCentral';
        $data['title'] = $data['breed_data'][0]->meta_title;
		$data['description'] = $data['breed_data'][0]->meta_description;
		$data['keyword'] = $data['breed_data'][0]->meta_keywords;
        //   $data['states'] = $this->common_model->search_state();
          $start_date = date('Y-m-d H:m:s');
    $end_date = date('Y-m-d', strtotime("-30 days"));
        $data['breedssold'] = $this->common_model->list_records_breedsold(array('category_id'=> $data['breed_data'][0]->id,'is_sold'=>'1','sold_date >='=>$end_date),'posts','asking_price','ASC');
		$data['page'] = 'front/breeds/list';
        //echo $data['breed_data'][0]->id;die();
		$this->load->view('front/layout', $data);
    }
    
   

}
