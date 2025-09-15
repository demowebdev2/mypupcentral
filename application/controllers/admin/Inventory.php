<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends Admin_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if (!$this->rbac->hasPrivilege('item', 'can_view')) {
			access_denied();
		}
		$this->session->set_userdata('top_menu', 'Inventory');
		$this->session->set_userdata('sub_menu', 'Inventory/items');

		$this->load->view('admin/header');
		$this->load->view('admin/inventory/items');
		$this->load->view('admin/footer');
	}

	public function outofstock()
	{
		if (!$this->rbac->hasPrivilege('item', 'can_view')) {
			access_denied();
		}
		$this->session->set_userdata('top_menu', 'Inventory');
		$this->session->set_userdata('sub_menu', 'Inventory/outofstock');

		$this->load->view('admin/header');
		$this->load->view('admin/inventory/items');
		$this->load->view('admin/footer');
	}

	public function add_item()
	{
		if (!$this->rbac->hasPrivilege('item', 'can_add')) {
			access_denied();
		}
		$this->session->set_userdata('top_menu', 'Inventory');
		$this->session->set_userdata('sub_menu', 'Inventory/add_item');

		$this->load->view('admin/header');
		$this->load->view('admin/inventory/items');
		$this->load->view('admin/footer');
	}

	public function categories()
	{
		 if (!$this->rbac->hasPrivilege('categories', 'can_view')) {
				access_denied();
		 }
		$this->session->set_userdata('top_menu', 'Inventory');
		$this->session->set_userdata('sub_menu', 'Inventory/categories');

		$where=array('category_id'=>0,'status'=>1);
		$data['categories']=$this->common_model->list_records($where,'item_categories','category_name','ASC');
		$this->load->view('admin/header');
		$this->load->view('admin/inventory/categories',$data);
		$this->load->view('admin/footer');
	}




	function create_category(){

		if (!$this->rbac->hasPrivilege('categories', 'can_add')) {
			access_denied();
		}
		$this->session->set_userdata('top_menu', 'Inventory');
		$this->session->set_userdata('sub_menu', 'Inventory/categories');

		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('parent', 'Parent', 'trim|required|xss_clean');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|xss_clean');
		$this->form_validation->set_rules('description', 'SEO Description', 'trim|xss_clean');
		$this->form_validation->set_rules('keywords', 'Keywords', 'trim|xss_clean');
		$slug = convert_accented_characters(url_title($this->input->post("slug"), "dash", TRUE));

		if(!empty($this->input->post("slug"))) {
			$where=array('slug'=>$slug);
			$cnt=$this->common_model->count_records('item_categories',$where);
			}
		else
		{
			$cnt=0;
		}
		if ($this->form_validation->run() == FALSE || $cnt!=0) {

			if($cnt!=0)
			{
				$data['slug_error']='Slug value must be unique';

			}
			$where=array('category_id'=>0,'status'=>1);
			$data['categories']=$this->common_model->list_records($where,'item_categories','category_name','ASC');
			$this->load->view('admin/header');
			$this->load->view('admin/inventory/add_categories',$data);
			$this->load->view('admin/footer');

		} else {
			$name = $this->input->post("name");
			$category_id = $this->input->post("parent");

			$seotitle = $this->input->post("seotitle");
			$description = $this->input->post("description");
			$keywords = $this->input->post("keywords");

			if(empty($slug) || $slug==null)
			{
				$slug=$this->inventory_model->create_category_slug($this->input->post("name"),'item_categories');
			}
			$data_insert = array(
				'category_name' => $name,
				'category_id' => $category_id,
				'slug' => $slug,
				'seo_title' => $seotitle,
				'seo_description' => $description,
				'seo_keywords' => $keywords,
				'status'=>1
			);

				$insert_id = $this->common_model->create_record($data_insert,'item_categories');



			$this->session->set_flashdata('msg', '<div class="alert alert-success">Success</div>');

			redirect('admin/Inventory/create_category');
		}
	}

	public function fetch_subcategories()
	{

		$where=array('category_id'=>$_POST['catid'],'status'=>1);
		$fetch_data = $this->inventory_model->make_category_datatables($where);
		$data = array();
		$count=$_POST['start']+1;
		foreach($fetch_data as $row)
		{
			$action='';
			$sub_array = array();
			$sub_array[] = $count;
			$sub_array[] = '<center>' .wordwrap($row->category_name,35,"<br>\n").'</center>';
			$sub_array[] = '<center>' .wordwrap($row->seo_title,35,"<br>\n").'</center>';
			$sub_array[] = '<center>' .wordwrap($row->seo_description,35,"<br>\n").'</center>';
			$sub_array[] = '<center>' .wordwrap($row->seo_keywords,35,"<br>\n").'</center>';
			if($row->category_name!='Default')
			{
				if ($this->rbac->hasPrivilege('categories', 'can_edit'))
				{
					$action.='<a href='.base_url().'admin/Inventory/edit_category/'.$row->id.' class="btn btn-default btn-xs" data-toggle="tooltip" title="Edit">
														<i class="fas fa-edit"></i>
													</a>';

					if($this->rbac->hasPrivilege('categories', 'can_delete'))
						{
							$action.='<a class="btn btn-default btn-xs del_category" id="'.$row->id.'"  data-toggle="tooltip" title="Delete" ><i class="fa fa-trash"></i></a>';
						}
				}
				$sub_array[] = $action;
			}
			else
			{
				$sub_array[] = '';
			}


			$data[] = $sub_array;
			$count++;
		}

		$output = array(
				"draw"                    =>     intval($_POST["draw"]),
				"recordsTotal"          =>   $this->inventory_model->get_all_category_data($where),
				"recordsFiltered"     =>    $this->inventory_model->get_filtered_category_data($where),
				"data"                    =>     $data
			);
			echo json_encode($output);


	}

	function edit_category($id){

		if (!$this->rbac->hasPrivilege('categories', 'can_edit')) {
			access_denied();
		}
		$this->session->set_userdata('top_menu', 'Inventory');
		$this->session->set_userdata('sub_menu', 'Inventory/categories');

		$wheres=array('id'=>$id);
		$data['result']=$this->common_model->list_row('item_categories',$wheres);


		$this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('parent', 'Parent', 'trim|required|xss_clean');
		$this->form_validation->set_rules('slug', 'Slug', 'trim|xss_clean');
		$this->form_validation->set_rules('description', 'SEO Description', 'trim|xss_clean');
		$this->form_validation->set_rules('keywords', 'Keywords', 'trim|xss_clean');
		$slug = convert_accented_characters(url_title($this->input->post("slug"), "dash", TRUE));

		if(!empty($this->input->post("slug"))) {
			$where=array('slug'=>$slug,'id !='=>$id);
			$cnt=$this->common_model->count_records('item_categories',$where);
		}
		else
		{
			$cnt=0;
		}
		if ($this->form_validation->run() == FALSE || $cnt!=0) {

			if($cnt!=0)
			{
				$data['slug_error']='Slug value must be unique';

			}

			$where=array('category_id'=>0,'status'=>1);
			$data['categories']=$this->common_model->list_records($where,'item_categories','category_name','ASC');
			$this->load->view('admin/header');
			$this->load->view('admin/inventory/edit_categories',$data);
			$this->load->view('admin/footer');

		} else {
			$name = $this->input->post("name");
			$category_id = $this->input->post("parent");

			$seotitle = $this->input->post("seotitle");
			$description = $this->input->post("description");
			$keywords = $this->input->post("keywords");

			if(empty($slug) || $slug==null)
			{
				$slug=$this->inventory_model->create_category_slug($this->input->post("name"),'item_categories');
			}
			$data_update = array(
				'category_name' => $name,
				'category_id' => $category_id,
				'slug' => $slug,
				'seo_title' => $seotitle,
				'seo_description' => $description,
				'seo_keywords' => $keywords,
				'status'=>1
			);
				$where=array('id'=>$id);
			$insert_id = $this->common_model->update_records($data_update,$where,'item_categories');



			$this->session->set_flashdata('msg', '<div class="alert alert-success">Success</div>');

			redirect('admin/Inventory/edit_category/'.$id);
		}
	}

	public function delete_category($id)
	{
		if (!$this->rbac->hasPrivilege('categories', 'can_delete')) {
			access_denied();
		}
		else {
			if ($id != 1 || $id != 2) {

				$wheres=array('id'=>$id);
				$res=$this->common_model->list_row('item_categories',$wheres);
				if($res->category_id==0)
				{
					$where = array('category_id' => $id);
					$this->common_model->delete('item_categories', $where);
				}
				$where = array('id' => $id);
				$this->common_model->delete('item_categories', $where);
			}
			echo 'success';
		}
	}


}


?>
