<?php
defined('BASEPATH') or exit('No direct script access allowed');
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

class AdController extends User_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('ads_model');
		$this->load->library('Auth');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('user_model');

		$this->load->library('Image_moo');
	}
	// public function index()
	// {
	// 	$data['title'] = 'NoShedDoodles Home';

	// 	$data['page'] = 'front/index';
	// 	$this->load->view('front/layout', $data);
	// }

	public function view_add_ad()
	{
		$data['title'] = 'Add New Ad|MyPupCentral';
		$this->session->set_userdata('top_menu', 'New_ads');

		$data['ads'] = $this->common_model->list_records(array('user_id' => $_SESSION['siteuser']['id']), 'posts', 'id', 'DESC', 1);


		$data['page'] = 'front/posts/add_new_ad';
		$data['breed'] = $this->ads_model->getbreeds(array('is_puppyverify' => 1));
		$data['states'] = $this->common_model->search_state();
		$data['contact'] = $this->ads_model->getcontact();
		$data['breeder'] = $this->common_model->list_row('user_accounts', array('id' => $_SESSION['siteuser']['id']));
		$data['time_slots'] = $this->common_model->list_records(array('status' => 1, 'application' => 'pv'), 'time_slots', 'id', 'ASC');
		$this->load->view('front/layout', $data);
	}
	public function view_edit_ad($id)
	{
		$data['title'] = 'MyPupCentral Edit Ad';
		$data['page'] = 'front/posts/edit_ad';
		$data['breed'] = $this->ads_model->getbreeds(array('is_puppyverify' => 1));
		$data['states'] = $this->common_model->search_state();
		$data['contact'] = $this->ads_model->getcontact();
		$data['post'] = $this->ads_model->getpost($id);
		$data['photo'] = $this->ads_model->getpic($id);
		$data['video'] = $this->ads_model->getvideo($id);
			$data['breeder'] = $this->common_model->list_row('user_accounts', array('id' => $_SESSION['siteuser']['id']));
		$data['time_slots'] = $this->common_model->list_records(array('status' => 1, 'application' => 'pv'), 'time_slots', 'id', 'ASC');
		$data['breeds_merged'] = $this->common_model->list_row('breeds', array('id' => $data['post']->category_id, 'is_puppyverify' => 1, 'is_noshed' => 1));

		$this->load->view('front/layout', $data);
	}


	public function add_ad_process()
	{


		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('puppy_category', 'Category', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ad_title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
			//   $this->form_validation->set_rules('sale_price', 'Price', 'trim|required|xss_clean');
			$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required|xss_clean');
			// $this->form_validation->set_rules('location', 'Address', 'trim|required|xss_clean');
			//   $this->form_validation->set_rules('registration', 'Registration Details', 'trim|required|xss_clean');
			//   $this->form_validation->set_rules('puppy_name', 'Puppy Name', 'trim|required|xss_clean');
			// $this->form_validation->set_rules('puppy_age', 'Puppy Age', 'trim|required|xss_clean');
			$this->form_validation->set_rules('puppy_size', 'Page Size', 'trim|required|xss_clean');
			$this->form_validation->set_rules('puppy_dob', 'Puppy DOB', 'trim|required|xss_clean');
			$this->form_validation->set_rules('puppy_sex', 'Puppy Sex', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {

				$response_data = array('status' => 'error', 'msg' => validation_errors());

				echo json_encode($response_data);
			} else {
				$data = array();
				$data['country_code'] = 'US';
				$data['user_id'] = $_SESSION['siteuser']['id'];
				$data['category_id '] = $this->input->post('puppy_category');
				$data['title']  = $this->input->post('ad_title');
				$data['description'] = $this->input->post('description');
				$data['price'] = $this->input->post('sale_price');
				$data['asking_price'] = $this->input->post('ask_price');
				$data['negotiable'] = $this->input->post('negotiable');
				$data['contact_name'] = $this->input->post('contact_person');
				$data['reviewed'] = '0';
				$data['youtube']  = $this->input->post('youtube');
				$data['uploaded_from'] = 'puppyverify.com';
				$data['is_merged'] = $this->input->post('merge');
				// $data['phone'] =$this->input->post('phone');
				// $data['email'] =$this->input->post('email');
				// $data['address'] = $this->input->post('location');
				// $data['payment_amount']= $this->input->post('total_amount');
				$data['sub_total'] = $this->input->post('total_amount');
				$data['original_price'] = $this->input->post('total_amount');


				// to insert in adress and state_id from single drop down selection
				$location = explode('|', $this->input->post('location'));
				$state_name =  $location[0];
				$state_id =  $location[1];
				$data['address'] = $state_name;
				$data['state_id'] = $state_id;

				$data['registration'] = json_encode($this->input->post('registration'));
				$data['training_package'] = $this->input->post('training_package');
				$data['other_registration'] = $this->input->post('other_registration');

				$data['available_date'] = $this->input->post('available_date');
				$data['puppy_name'] = $this->input->post('ad_title');
				$data['puppy_age'] = $this->input->post('puppy_age');
				$data['puppy_size'] = $this->input->post('puppy_size');
				$data['puppy_dob'] = $this->input->post('puppy_dob');
				$data['puppy_sex'] = $this->input->post('puppy_sex');
				$data['created_at'] = date('Y-m-d H-i-s');



				if (!empty($_FILES['mother_photo']['name'])) {
					$name1 = array();
					$output_dir1 = "uploads/puppies/";/* Path for file upload */

					$RandomNum1   = time() . uniqid(rand());

					$ImageName1      = str_replace(' ', '-', strtolower($_FILES['mother_photo']['name']));
					$ImageType1      = $_FILES['mother_photo']['type']; /*"image/png", image/jpeg etc.*/

					$ImageExt1 = substr($ImageName1, strrpos($ImageName1, '.'));
					$ImageExt1       = str_replace('.', '', $ImageExt1);
					$ImageName1     = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName1);
					$NewImageName1 = 'mother_' . $RandomNum1 . '.' . $ImageExt1;
					// array_push($name, $NewImageName);

					$ret[$NewImageName1] = $output_dir1 . $NewImageName1;
					// var_dump($NewImageName);

					if (move_uploaded_file($_FILES["mother_photo"]["tmp_name"], $output_dir1 . "/" . $NewImageName1)) {
						$this->add_watermark($output_dir1 . $NewImageName1, 0, $NewImageName1);
						$data['mother_photo'] = $NewImageName1;
						$data['mother_photo_from'] = 'puppyverify.com';
					}
				}
				if (!empty($_FILES['father_photo']['name'])) {
					$name2 = array();
					$output_dir2 = "uploads/puppies/";/* Path for file upload */

					$RandomNum2   = time() . uniqid(rand());

					$ImageName2      = str_replace(' ', '-', strtolower($_FILES['father_photo']['name']));
					$ImageType2      = $_FILES['father_photo']['type']; /*"image/png", image/jpeg etc.*/

					$ImageExt2 = substr($ImageName2, strrpos($ImageName2, '.'));
					$ImageExt2       = str_replace('.', '', $ImageExt2);
					$ImageName2      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName2);
					$NewImageName2 = 'father_' . $RandomNum2 . '.' . $ImageExt2;
					// array_push($name, $NewImageName);

					$ret[$NewImageName2] = $output_dir2 . $NewImageName2;
					// var_dump($NewImageName);

					if (move_uploaded_file($_FILES["father_photo"]["tmp_name"], $output_dir2 . "/" . $NewImageName2)) {
						$this->add_watermark($output_dir2 . $NewImageName2, 0, $NewImageName2);
						$data['father_photo'] = $NewImageName2;
						$data['father_photo_from'] = 'puppyverify.com';
					}
				}
				$response = $this->ads_model->addad('posts', $data);
				// If files are selected to upload 
				// if (!empty($_FILES['featured_image']['name'])) {
				// 	$name3 = array();
				// 	$output_dir3 = "uploads/puppies/";/* Path for file upload */

				// 	$RandomNum3   = time() . uniqid(rand());

				// 	$ImageName3      = str_replace(' ', '-', strtolower($_FILES['featured_image']['name']));
				// 	$ImageType3      = $_FILES['featured_image']['type']; /*"image/png", image/jpeg etc.*/

				// 	$ImageExt3 = substr($ImageName3, strrpos($ImageName3, '.'));
				// 	$ImageExt3       = str_replace('.', '', $ImageExt3);
				// 	$ImageName3   = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName3);
				// 	$NewImageName3 = 'featured_' . $RandomNum3 . '.' . $ImageExt3;
				// 	// array_push($name, $NewImageName);

				// 	$ret[$NewImageName3] = $output_dir3 . $NewImageName3;
				// 	// var_dump($NewImageName);

				// 	if (move_uploaded_file($_FILES["featured_image"]["tmp_name"], $output_dir3 . "/" . $NewImageName3)) {
				// 		$this->add_watermark($output_dir3 . $NewImageName3, 1, $NewImageName3);
				// 		// $photo = array();
				// 		// $photo['picture'] = $NewImageName3;
				// 		// $photo['post_id'] = $response;
				// 		// $photo['is_featured'] = '1';
				// 		// $response2 =$this->ads_model->addad('posts_pictures',$photo);

				// 		$data = array(
				// 			'featured_image' => $NewImageName3,
				// 			'featured_image_from'=>'puppyverify.com'
				// 		);

				// 		$this->ads_model->update_post('posts', $data, $response);
				// 	}
				// }





				if (isset($_FILES["img_gallery"]["name"])) {

					$filenames = $this->input->post('filenames');
					// exit();
					$data = array();
					foreach ($_FILES["img_gallery"]["name"] as $key => $value) {
						$fetrd = 0;
						$_FILES['files']['name']     = $_FILES['img_gallery']['name'][$key];
						$_FILES['files']['type']     = $_FILES['img_gallery']['type'][$key];
						$_FILES['files']['tmp_name'] = $_FILES['img_gallery']['tmp_name'][$key];
						$_FILES['files']['error']     = $_FILES['img_gallery']['error'][$key];
						$_FILES['files']['size']     = $_FILES['img_gallery']['size'][$key];


						$config['upload_path'] = 'uploads/puppies/';
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['file_name'] = time() . '-' . $_FILES['img_gallery']['name'][$key];
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						if (array_search($_FILES['img_gallery']['name'][$key], $filenames) == 0) {
							$fetrd = 1;
						}

						if (!$this->upload->do_upload('files')) {
							// 	echo $this->upload->display_errors();
						} else {
							$data[$key] = $this->upload->data();

							$url =  'uploads/puppies/' . $data[$key]['file_name'];

							$image_data[$key] = $data[$key]['file_name'];
							if ($fetrd == 1) {
								$this->add_watermark($config['upload_path'] . $image_data[$key], 1, $image_data[$key]);
								$data = array(
									'featured_image' => $image_data[$key],
									'featured_image_from' => 'puppyverify.com'
								);

								$this->ads_model->update_post('posts', $data, $response);
							} else {
								$this->add_watermark($config['upload_path'] . $image_data[$key], 0, $image_data[$key]);
							}

							$photos = array();
							$photos['picture'] = $image_data[$key];
							$photos['status'] = array_search($_FILES['img_gallery']['name'][$key], $filenames) + 1;
							$photos['post_id'] = $response;
							$photos['uploaded_from'] = 'puppyverify.com';
							$response4 = $this->ads_model->addad('posts_pictures', $photos);
						}
					}
				}




				if (!empty(array_filter($_FILES['video_gallery']['name']))) {
					// var_dump($_FILES['video_gallery']['name']);
					$name6 = array();
					$output_dir6 = "uploads/puppies/";/* Path for file upload */
					$fileCount2 = count($_FILES["video_gallery"]['name']);
					for ($i = 0; $i < $fileCount2; $i++) {
						$RandomNum6   = time() . uniqid(rand());

						$ImageName6      = str_replace(' ', '-', strtolower($_FILES['video_gallery']['name'][$i]));
						$ImageType6      = $_FILES['video_gallery']['type'][$i]; /*"image/png", image/jpeg etc.*/

						$ImageExt6 = substr($ImageName6, strrpos($ImageName6, '.'));
						$ImageExt6     = str_replace('.', '', $ImageExt6);
						$ImageName6      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName6);
						$NewImageName6 = 'gallery_' . $RandomNum6 . '.' . $ImageExt6;
						array_push($name6, $NewImageName6);

						$ret[$NewImageName6] = $output_dir6 . $NewImageName6;
						// var_dump($NewImageName);

						if (move_uploaded_file($_FILES["video_gallery"]["tmp_name"][$i], $output_dir6 . "/" . $NewImageName6)) {
							$videos = array();
							$videos['video'] = $NewImageName6;
							$videos['post_id'] = $response;
							$videos['uploaded_from'] = 'puppyverify.com';
							$response5 = $this->ads_model->addad('posts_videos', $videos);
						}
					}
				}

				$response_data = array('status' => 'success', 'msg' => 'success', 'url' => 'frontend/Adcontroller/proceed_pay/' . $response);

				echo json_encode($response_data);
			}
		}
	}

	public function edit_ad($id)
	{


		$post = $this->ads_model->getpost($id);
		$photo = $this->ads_model->getpic($id);
		$video = $this->ads_model->getvideo($id);


		if ($this->input->post('duplicate') == 1) {
			$id = $this->view_duplicate_ad($id);
			$post = $this->ads_model->getpost($id);
			$photo = $this->ads_model->getpic($id);
			$video = $this->ads_model->getvideo($id);
		}




		$data = array();
		// $data['country_code']= 'US';
		// $data['user_id']= $_SESSION['siteuser']['id'];
		$data['category_id '] = $this->input->post('puppy_category');
		$data['title']  = $this->input->post('ad_title');
		$data['description'] = $this->input->post('description');
		// $data['price'] = $this->input->post('sale_price');
		$data['asking_price'] = $this->input->post('ask_price');
		$data['negotiable'] = $this->input->post('negotiable');
		$data['contact_name'] = $this->input->post('contact_person');
		// $data['phone'] =$this->input->post('phone');
		// $data['email'] =$this->input->post('email');
		//	$data['address'] = $this->input->post('location');
		// to insert in adress and state_id from single drop down selection
		$location = explode('|', $this->input->post('location'));
		$state_name =  $location[0];
		$state_id =  $location[1];
		$data['address'] = $state_name;
		$data['state_id'] = $state_id;
		$data['youtube']  = $this->input->post('youtube');
		$data['is_merged'] = $this->input->post('merge');
		if ($this->input->post('duplicate') == 1) {
			$data['sub_total']  = $this->input->post('total_amount');
			$data['original_price'] = $this->input->post('total_amount');
		}

		$data['registration'] = json_encode($this->input->post('registration'));
		$data['training_package'] = $this->input->post('training_package');
		$data['other_registration'] = $this->input->post('other_registration');
		$data['available_date'] = $this->input->post('available_date');
		$data['puppy_name'] = $this->input->post('puppy_name');
		// $data['puppy_age'] = $this->input->post('puppy_age');
		$data['puppy_size'] = $this->input->post('puppy_size');
		$data['puppy_dob'] = $this->input->post('puppy_dob');
		$data['puppy_sex'] = $this->input->post('puppy_sex');
		$data['updated_at'] = date('Y-m-d H-i-s');
// 		var_dump($data);exit;

		if (!empty($_FILES['mother_photo']['name'])) {
			$name1 = array();
			$output_dir1 = "uploads/puppies/";/* Path for file upload */

			$RandomNum1   = time() . uniqid(rand());

			$ImageName1      = str_replace(' ', '-', strtolower($_FILES['mother_photo']['name']));
			$ImageType1      = $_FILES['mother_photo']['type']; /*"image/png", image/jpeg etc.*/

			$ImageExt1 = substr($ImageName1, strrpos($ImageName1, '.'));
			$ImageExt1       = str_replace('.', '', $ImageExt1);
			$ImageName1     = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName1);
			$NewImageName1 = 'mother_' . $RandomNum1 . '.' . $ImageExt1;
			// array_push($name, $NewImageName);

			$ret[$NewImageName1] = $output_dir1 . $NewImageName1;
			// var_dump($NewImageName);

			if (move_uploaded_file($_FILES["mother_photo"]["tmp_name"], $output_dir1 . "/" . $NewImageName1)) {
				unlink($output_dir1 . $post->mother_photo);
				$this->add_watermark($output_dir1 . $NewImageName1, 0, $NewImageName1);
				$data['mother_photo'] = $NewImageName1;
				$data['mother_photo_from'] = 'puppyverify.com';
			}
		} elseif ($this->input->post('mothers') == '') {
			$data['mother_photo'] = '';
		}
		if (!empty($_FILES['father_photo']['name'])) {
			$name2 = array();
			$output_dir2 = "uploads/puppies/";/* Path for file upload */

			$RandomNum2   = time() . uniqid(rand());

			$ImageName2      = str_replace(' ', '-', strtolower($_FILES['father_photo']['name']));
			$ImageType2      = $_FILES['father_photo']['type']; /*"image/png", image/jpeg etc.*/

			$ImageExt2 = substr($ImageName2, strrpos($ImageName2, '.'));
			$ImageExt2       = str_replace('.', '', $ImageExt2);
			$ImageName2      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName2);
			$NewImageName2 = 'father_' . $RandomNum2 . '.' . $ImageExt2;
			// array_push($name, $NewImageName);

			$ret[$NewImageName2] = $output_dir2 . $NewImageName2;
			// var_dump($NewImageName);

			if (move_uploaded_file($_FILES["father_photo"]["tmp_name"], $output_dir2 . "/" . $NewImageName2)) {
				unlink($output_dir2 . $post->father_photo);
				$this->add_watermark($output_dir2 . $NewImageName2, 0, $NewImageName2);
				$data['father_photo'] = $NewImageName2;
				$data['father_photo_from'] = 'puppyverify.com';
			}
		} elseif ($this->input->post('fathers') == '') {
			$data['father_photo'] = '';
		}
		$this->ads_model->update_post('posts', $data, $id);

		if ($this->input->post('duplicate') == 1) {
		} else {
			$filenames = $this->input->post('filenames');
			$old_photos = $this->input->post('old_photos');

			if (!empty($old_photos)) {
				foreach ($old_photos as $old) {
					if (!in_array($old, $filenames)) {
						if ($this->common_model->delete('posts_pictures', array('post_id' => $id, 'picture' => $old))) {
							unlink('uploads/puppies/' . $old);
							unlink('uploads/puppies/wa_' . $old);
							unlink('uploads/puppies/wa_600x600_' . $old);
						}
					}
				}
			}
		}

		$filenames = $this->input->post('filenames');
		$temp_filenames = $filenames;
		if (isset($_FILES["img_gallery"]["name"])) {


			// exit();
			$data = array();
			foreach ($_FILES["img_gallery"]["name"] as $key => $value) {
				$fetrd = 0;
				$_FILES['files']['name']     = $_FILES['img_gallery']['name'][$key];
				$_FILES['files']['type']     = $_FILES['img_gallery']['type'][$key];
				$_FILES['files']['tmp_name'] = $_FILES['img_gallery']['tmp_name'][$key];
				$_FILES['files']['error']     = $_FILES['img_gallery']['error'][$key];
				$_FILES['files']['size']     = $_FILES['img_gallery']['size'][$key];


				$config['upload_path'] = 'uploads/puppies/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = time() . '-' . $_FILES['img_gallery']['name'][$key];
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (array_search($_FILES['img_gallery']['name'][$key], $filenames) == 0) {
					$fetrd = 1;
				}

				if (!$this->upload->do_upload('files')) {
					// 	echo $this->upload->display_errors();
				} else {
					$data[$key] = $this->upload->data();

					$url =  'uploads/puppies/' . $data[$key]['file_name'];

					$image_data[$key] = $data[$key]['file_name'];
					if ($fetrd == 1) {
						$this->add_watermark($config['upload_path'] . $image_data[$key], 1, $image_data[$key]);
						$data = array(
							'featured_image' => $image_data[$key],
							'featured_image_from' => 'puppyverify.com'
						);

						$this->ads_model->update_post('posts', $data, $id);
					} else {
						$this->add_watermark($config['upload_path'] . $image_data[$key], 0, $image_data[$key]);
					}
					$temp_filenames[array_search($_FILES['img_gallery']['name'][$key], $filenames)] = $image_data[$key];
					$photos = array();
					$photos['picture'] = $image_data[$key];
					$photos['status'] = array_search($_FILES['img_gallery']['name'][$key], $filenames) + 1;
					$photos['post_id'] = $id;
					$photos['uploaded_from'] = 'puppyverify.com';
					$response4 = $this->ads_model->addad('posts_pictures', $photos);
				}
			}
		}

		if ($this->input->post('duplicate') != 1) {


			foreach ($temp_filenames as $key => $tmp) {
				if ($key == 0) {
                    	$this->add_watermark('uploads/puppies/' . $tmp, 1, $tmp);
					$data = array(
						'featured_image' => $tmp,
						'featured_image_from' => 'puppyverify.com'
					);

					$this->ads_model->update_post('posts', $data, $id);
				}
				$this->common_model->update_records(array('status' => $key + 1), array('post_id' => $id, 'picture' => $tmp), 'posts_pictures');
			}
		}




		if (!empty(array_filter($_FILES['video_gallery']['name']))) {
			// var_dump($_FILES['video_gallery']['name']);
			$name6 = array();
			$output_dir6 = "uploads/puppies/";/* Path for file upload */
			$fileCount2 = count($_FILES["video_gallery"]['name']);

			$this->ads_model->deleteitem('posts_videos', $id);

			for ($i = 0; $i < $fileCount2; $i++) {
				$RandomNum6   = time() . uniqid(rand());

				$ImageName6      = str_replace(' ', '-', strtolower($_FILES['video_gallery']['name'][$i]));
				$ImageType6      = $_FILES['video_gallery']['type'][$i]; /*"image/png", image/jpeg etc.*/

				$ImageExt6 = substr($ImageName6, strrpos($ImageName6, '.'));
				$ImageExt6     = str_replace('.', '', $ImageExt6);
				$ImageName6      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName6);
				$NewImageName6 = 'gallery_' . $RandomNum6 . '.' . $ImageExt6;
				array_push($name6, $NewImageName6);

				$ret[$NewImageName6] = $output_dir6 . $NewImageName6;
				// var_dump($NewImageName);

				if (move_uploaded_file($_FILES["video_gallery"]["tmp_name"][$i], $output_dir6 . "/" . $NewImageName6)) {

					foreach ($video as $vid) {
						unlink($output_dir6 . $vid['video']);
					}
					$videos = array();
					$videos['video'] = $NewImageName6;
					$videos['post_id'] = $id;
					$videos['uploaded_from'] = 'puppyverify.com';
					$response5 = $this->ads_model->addad('posts_videos', $videos);
					// var_dump($driver['d_photo']);
				}
			}
		}
		if ($this->input->post('duplicate') == 1) {

			$response_data = array('status' => 'success', 'msg' => 'Please wait! You will be redirected to payment page automatically', 'url' => 'frontend/Adcontroller/proceed_pay/' . $id);

			echo json_encode($response_data);
		} else {

			$response_data = array('status' => 'success', 'msg' => 'Updated', 'url' => 'posts/edit/' . $id);

			echo json_encode($response_data);
		}
	}

	public function delete($id)
	{
		$this->common_model->delete('posts', array('id' => $id));
		$this->common_model->delete('posts_pictures', array('post_id' => $id));
		$this->common_model->delete('posts_videos', array('post_id' => $id));
		$this->session->set_flashdata('msg', '<div class="alert alert-success">Deleted</div>');

		redirect('/my_ads');
	}
	public function getpostcount()
	{
		$count = $this->user_model->getpostcount();
		// return $count;
	}




	// private function add_watermark($file, $choose = 0, $name = null)
	// 	{

	// 	    $image_info = getimagesize($file);
	// 		$image_width = $image_info[0];
	// 		$image_height = $image_info[1];

	// 		$a=400;
	// 		$b=300;

	// 		$c=50;
	// 		$d=40;


	// 		$temp1=$image_height/$a;
	// 		$temp2=$image_width/$b;

	// 		$new_width=$c*$temp2;
	// 		$new_height=$d*$temp1;

	// 		$this->load->library('image_lib');


	//         //puppy verify
	//             $newwat='wat_'.random_string('alnum', 16).'.PNG';
	// 		 	$config['source_image'] = 'assets/watermark/waterorg.png';
	// 		    $config['create_thumb'] = FALSE;
	// 		    $config['maintain_ratio'] = TRUE;
	// 		    $config['width']     =  round($new_width);
	// 		    $config['height']   = round($new_height);
	// 		    $config['new_image'] = 'uploads/puppies/'.$newwat;


	// 		    $this->image_lib->clear();
	// 		    $this->image_lib->initialize($config);
	// 		    $this->image_lib->resize();

	// 		  //  $this->image_moo
	// 				// ->load($file, $transparent_x = 5, $transparent_y = 5)
	// 				// ->load_watermark('uploads/puppies/'.$newwat)
	// 				// ->watermark(9)

	// 				// ->save_pa("", "", TRUE);

	// 				$this->image_moo
	// 				->load($file, $transparent_x = 5, $transparent_y = 5)
	// 				->load_watermark('uploads/puppies/'.$newwat)
	// 				->watermark(9)

	// 				->save('uploads/puppies/pv/wa_' . $name, TRUE);


	// 		if ($choose == 1) {
	// 			$this->image_moo
	// 				->load($file)
	//             	->resize(400, 400)
	// 				->save('uploads/puppies/pv/thumb_' . $name, TRUE);

	// 			$this->image_moo
	// 				->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
	// 				->load_watermark('assets/watermark/watermark-2.png')
	// 				->watermark(9)
	// 				->save('uploads/puppies/pv/thumb_' . $name, TRUE);

	// 			}

	// 			unlink( 'uploads/puppies/'.$newwat);


	// 			//nosheddoodles
	// 			$newwat='wat_'.random_string('alnum', 16).'.PNG';
	// 		 	$config['source_image'] = 'assets/watermark/waterorgns.png';
	// 		    $config['create_thumb'] = FALSE;
	// 		    $config['maintain_ratio'] = TRUE;
	// 		    $config['width']     =  round($new_width);
	// 		    $config['height']   = round($new_height);
	// 		    $config['new_image'] = 'uploads/puppies/'.$newwat;


	// 		    $this->image_lib->clear();
	// 		    $this->image_lib->initialize($config);
	// 		    $this->image_lib->resize();

	// 		  //  $this->image_moo
	// 				// ->load($file, $transparent_x = 5, $transparent_y = 5)
	// 				// ->load_watermark('uploads/puppies/'.$newwat)
	// 				// ->watermark(9)

	// 				// ->save_pa("", "", TRUE);

	// 				$this->image_moo
	// 				->load($file, $transparent_x = 5, $transparent_y = 5)
	// 				->load_watermark('uploads/puppies/'.$newwat)
	// 				->watermark(9)

	// 				->save('uploads/puppies/ns/wa_' . $name, TRUE);


	// 		if ($choose == 1) {
	// 			$this->image_moo
	// 				->load($file)
	//             	->resize(400, 400)
	// 				->save('uploads/puppies/ns/thumb_' . $name, TRUE);

	// 			$this->image_moo
	// 				->load('uploads/puppies/ns/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
	// 				->load_watermark('assets/watermark/watermark.png')
	// 				->watermark(9)
	// 				->save('uploads/puppies/ns/thumb_' . $name, TRUE);

	// 			}

	// 			unlink( 'uploads/puppies/'.$newwat);



	// 		return true;
	// 	}

	private function add_watermark($file, $choose = 0, $name = null)
	{
		$exif = exif_read_data($file);

		$image_info = getimagesize($file);
		$image_width = $image_info[0];
		$image_height = $image_info[1];



		$a = 400;
		$b = 300;

		$c = 50;
		$d = 40;


		$temp1 = $image_height / $a;
		$temp2 = $image_width / $b;

		$new_width = $c * $temp2;
		$new_height = $d * $temp1;

		$this->load->library('image_lib');


		//puppy verify
		$newwat = 'wat_' . random_string('alnum', 16) . '.PNG';
		$config['source_image'] = 'assets/watermark/waterorg.png';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']     =  round($new_width);
		$config['height']   = round($new_height);
		$config['new_image'] = 'uploads/puppies/' . $newwat;


		$this->image_lib->clear();
		$this->image_lib->initialize($config);
		$this->image_lib->resize();

		//  $this->image_moo
		// ->load($file, $transparent_x = 5, $transparent_y = 5)
		// ->load_watermark('uploads/puppies/'.$newwat)
		// ->watermark(9)

		// ->save_pa("", "", TRUE);



		if (!empty($exif['Orientation'])) {
			switch ($exif['Orientation']) {
				case 8:
					$this->image_moo
						->load($file, $transparent_x = 5, $transparent_y = 5)
						->rotate(90)
						->save('uploads/puppies/pv/wa_' . $name, TRUE);
					break;
				case 3:
					$this->image_moo
						->load($file, $transparent_x = 5, $transparent_y = 5)
						->rotate(180)
						->save('uploads/puppies/pv/wa_' . $name, TRUE);
					break;
				case 6:
					$this->image_moo
						->load($file, $transparent_x = 5, $transparent_y = 5)
						->rotate(-90)
						->save('uploads/puppies/pv/wa_' . $name, TRUE);
					break;
				default:
					$this->image_moo
						->load($file, $transparent_x = 5, $transparent_y = 5)
						->save('uploads/puppies/pv/wa_' . $name, TRUE);
			}



			$this->image_moo
				->load('uploads/puppies/pv/wa_' . $name, $transparent_x = 5, $transparent_y = 5)
				->load_watermark('uploads/puppies/' . $newwat)
				->watermark(9)
				->save('uploads/puppies/pv/wa_' . $name, TRUE);
		} else {
			$this->image_moo
				->load($file, $transparent_x = 5, $transparent_y = 5)
				->load_watermark('uploads/puppies/' . $newwat)
				->watermark(9)

				->save('uploads/puppies/pv/wa_' . $name, TRUE);
		}


		//600*600
		if (!empty($exif['Orientation'])) {
		    	$this->image_moo
				->load($file)
				->resize_crop(600, 600)
				->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
				
			switch ($exif['Orientation']) {
				case 8:
					$this->image_moo
						->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
						->rotate(90)
						->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
					break;
				case 3:
					$this->image_moo
						->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
						->rotate(180)
						->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
					break;
				case 6:
					$this->image_moo
						->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
						->rotate(-90)
						->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
					break;
				default:
					$this->image_moo
						->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
						->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
			}



		
		} else {
			$this->image_moo
				->load($file)
				->resize_crop(600, 600)
				->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);
		}


		$this->image_moo
			->load('uploads/puppies/pv/wa_600x600_' . $name, $transparent_x = 5, $transparent_y = 5)
			->load_watermark('assets/watermark/watermark-2.png')
			->watermark(9)
			->save('uploads/puppies/pv/wa_600x600_' . $name, TRUE);




		if ($choose == 1) {

			if (!empty($exif['Orientation'])) {
			    
			    	$this->image_moo
					->load($file)
					->resize_crop(400, 400)
					->save('uploads/puppies/pv/thumb_' . $name, TRUE);
					
				switch ($exif['Orientation']) {
					case 8:
						$this->image_moo
							->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
							->rotate(90)
							->save('uploads/puppies/pv/thumb_' . $name, TRUE);
						break;
					case 3:
						$this->image_moo
							->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
							->rotate(180)
							->save('uploads/puppies/pv/thumb_' . $name, TRUE);
						break;
					case 6:
						$this->image_moo
							->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
							->rotate(-90)
							->save('uploads/puppies/pv/thumb_' . $name, TRUE);
						break;
					default:
						$this->image_moo
							->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
							->save('uploads/puppies/pv/thumb_' . $name, TRUE);
				}
			
			} else {
				$this->image_moo
					->load($file)
					->resize_crop(400, 400)
					->save('uploads/puppies/pv/thumb_' . $name, TRUE);
			}


			$this->image_moo
				->load('uploads/puppies/pv/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
				->load_watermark('assets/watermark/watermark-2.png')
				->watermark(9)
				->save('uploads/puppies/pv/thumb_' . $name, TRUE);
		}

		unlink('uploads/puppies/' . $newwat);


		//nosheddoodles
		// 	$newwat = 'wat_' . random_string('alnum', 16) . '.PNG';
		// 		$config['source_image'] = 'assets/watermark/waterorgns.png';
		// 		$config['create_thumb'] = FALSE;
		// 		$config['maintain_ratio'] = TRUE;
		// 		$config['width']     =  round($new_width);
		// 		$config['height']   = round($new_height);
		// 		$config['new_image'] = 'uploads/puppies/' . $newwat;


		// 		$this->image_lib->clear();
		// 		$this->image_lib->initialize($config);
		// 		$this->image_lib->resize();


		// 		//  $this->image_moo
		// 		// ->load($file, $transparent_x = 5, $transparent_y = 5)
		// 		// ->load_watermark('uploads/puppies/'.$newwat)
		// 		// ->watermark(9)

		// 		// ->save_pa("", "", TRUE);


		// 		if (!empty($exif['Orientation'])) {
		// 			switch ($exif['Orientation']) {
		// 				case 8:
		// 					$this->image_moo
		// 						->load($file, $transparent_x = 5, $transparent_y = 5)
		// 						->rotate(90)
		// 						->save('uploads/puppies/ns/wa_' . $name, TRUE);
		// 					break;
		// 				case 3:
		// 					$this->image_moo
		// 						->load($file, $transparent_x = 5, $transparent_y = 5)
		// 						->rotate(180)
		// 						->save('uploads/puppies/ns/wa_' . $name, TRUE);
		// 					break;
		// 				case 6:
		// 					$this->image_moo
		// 						->load($file, $transparent_x = 5, $transparent_y = 5)
		// 						->rotate(-90)
		// 						->save('uploads/puppies/ns/wa_' . $name, TRUE);
		// 					break;
		// 				default:
		// 					$this->image_moo
		// 						->load($file, $transparent_x = 5, $transparent_y = 5)
		// 						->save('uploads/puppies/ns/wa_' . $name, TRUE);

		// 			}

		// 			$this->image_moo
		// 				->load('uploads/puppies/pv/wa_' . $name, $transparent_x = 5, $transparent_y = 5)
		// 				->load_watermark('uploads/puppies/' . $newwat)
		// 				->watermark(9)
		// 				->save('uploads/puppies/ns/wa_' . $name, TRUE);

		// 		} else {
		// 			$this->image_moo
		// 				->load($file, $transparent_x = 5, $transparent_y = 5)
		// 				->load_watermark('uploads/puppies/' . $newwat)
		// 				->watermark(9)

		// 				->save('uploads/puppies/ns/wa_' . $name, TRUE);
		// 		}


		// 		if ($choose == 1) {

		// 			if (!empty($exif['Orientation'])) {
		// 				switch ($exif['Orientation']) {
		// 					case 8:
		// 						$this->image_moo
		// 							->load($file, $transparent_x = 5, $transparent_y = 5)
		// 							->rotate(90)
		// 							->save('uploads/puppies/ns/thumb_' . $name, TRUE);
		// 						break;
		// 					case 3:
		// 						$this->image_moo
		// 							->load($file, $transparent_x = 5, $transparent_y = 5)
		// 							->rotate(180)
		// 							->save('uploads/puppies/ns/thumb_' . $name, TRUE);
		// 						break;
		// 					case 6:
		// 						$this->image_moo
		// 							->load($file, $transparent_x = 5, $transparent_y = 5)
		// 							->rotate(-90)
		// 							->save('uploads/puppies/ns/thumb_' . $name, TRUE);
		// 						break;
		// 					default:
		// 						$this->image_moo
		// 							->load($file, $transparent_x = 5, $transparent_y = 5)
		// 							->rotate(0)
		// 							->save('uploads/puppies/ns/thumb_' . $name, TRUE);
		// 				}
		// 				$this->image_moo
		// 					->load('uploads/puppies/ns/thumb_' . $name)
		// 					->resize(400, 400)
		// 					->save('uploads/puppies/ns/thumb_' . $name, TRUE);
		// 			} else {
		// 				$this->image_moo
		// 					->load($file)
		// 					->resize(400, 400)
		// 					->save('uploads/puppies/ns/thumb_' . $name, TRUE);
		// 			}


		// 			$this->image_moo
		// 				->load('uploads/puppies/ns/thumb_' . $name, $transparent_x = 5, $transparent_y = 5)
		// 				->load_watermark('assets/watermark/watermark.png')
		// 				->watermark(9)
		// 				->save('uploads/puppies/ns/thumb_' . $name, TRUE);
		// 		}
		// 		unlink('uploads/puppies/' . $newwat);



		return true;
	}

	public function view_duplicate_ad($id)
	{
		// duplicate ad with id $id and insert into tables
		// 1. posts 
		$this->load->model('common_model');
		$now = date('Y-m-d H:i:s');
		$now = strtotime($now) * 1000;
		$where = array('id' => $id);
		$result_posts = $this->common_model->list_records($where, 'posts', '', '');
		$file_name_array = explode(".", $result_posts[0]->featured_image);

		$featured_img_name = $result_posts[0]->featured_image;
		if (!empty($result_posts[0]->featured_image) && $result_posts[0]->featured_image_from == 'puppyverify.com') {
			$dummy_picture = copy("uploads/puppies/" . $result_posts[0]->featured_image, "uploads/puppies/" . $file_name_array[0] . "_" . $now . '.' . $file_name_array[1]);
			$dummy_picture = copy("uploads/puppies/pv/wa_" . $result_posts[0]->featured_image, "uploads/puppies/pv/wa_" . $file_name_array[0] . "_" . $now . '.' . $file_name_array[1]);
			$dummy_picture = copy("uploads/puppies/pv/thumb_" . $result_posts[0]->featured_image, "uploads/puppies/pv/thumb_" . $file_name_array[0] . "_" . $now . '.' . $file_name_array[1]);

			$dummy_picture = copy("uploads/puppies/ns/wa_" . $result_posts[0]->featured_image, "uploads/puppies/ns/wa_" . $file_name_array[0] . "_" . $now . '.' . $file_name_array[1]);
			$dummy_picture = copy("uploads/puppies/ns/thumb_" . $result_posts[0]->featured_image, "uploads/puppies/ns/thumb_" . $file_name_array[0] . "_" . $now . '.' . $file_name_array[1]);


			$featured_img_name = $file_name_array[0] . "_" . $now . '.' . $file_name_array[1];
		}
		$featured_vdo_name = $result_posts[0]->featured_video;
		if (!empty($result_posts[0]->featured_video) && $result_posts[0]->featured_video_from == 'puppyverify.com') {
			$file_name_array2 = explode(".", $result_posts[0]->featured_video);
			$dummy_picture = copy("uploads/puppies/" . $result_posts[0]->featured_video, "uploads/puppies/" . $file_name_array2[0] . "_" . $now . '.' . $file_name_array2[1]);

			$featured_vdo_name = $file_name_array2[0] . "_" . $now . '.' . $file_name_array2[1];
		}
		$result_posts = json_decode(json_encode($result_posts), true);
		$max_id = $this->ads_model->get_max_id('posts');

		$result_posts[0]['id'] =  $max_id + 1;
		$result_posts[0]['title'] = $result_posts[0]['title'] . '_1';
		$result_posts[0]['puppy_name'] = $result_posts[0]['puppy_name'] . '_1';
		$result_posts[0]['featured_image_from'] = $result_posts[0]['featured_image_from'];
		$result_posts[0]['featured_video_from'] = $result_posts[0]['featured_video_from'];
		$result_posts[0]['mother_photo_from'] = $result_posts[0]['mother_photo_from'];
		$result_posts[0]['father_photo_from'] = $result_posts[0]['father_photo_from'];
		$result_posts[0]['uploaded_from'] = 'puppyverify.com';
		$result_posts[0]['featured_image'] = $featured_img_name;
		$result_posts[0]['featured_video'] = $featured_vdo_name;
		$result_posts[0]['created_at'] =  date('Y-m-d H:i:s');
		$result_posts[0]['updated_at'] =  date('Y-m-d H:i:s');
		$result_posts[0]['reviewed'] = '0';
		$result_posts[0]['view_count'] = '0';

		$result_posts[0]['sub_total'] = '0';
		$result_posts[0]['discount_method'] = 'None';
		$result_posts[0]['paid_in'] = 'Single';
		$result_posts[0]['discount'] = '0';
		$result_posts[0]['original_price'] = '0';
		$result_posts[0]['txn_status'] = '0';
		$result_posts[0]['txn_id'] = '0';
		$result_posts[0]['is_timeslot'] = '0';
		$result_posts[0]['priority'] = '0';
		$result_posts[0]['premium_type'] = '0';

		$insert_id 		= $this->common_model->create_record($result_posts[0], 'posts');

		// 2. posts_pictures   
		$where = array('post_id' => $id);
		$result_pictures 	= $this->common_model->list_records($where, 'posts_pictures', '', '');

		// 		foreach($result_pictures as $row)
		// 		{
		// 		    $file_name_array = explode(".", $row->picture);
		// 		    $flname=$file_name_array[0] . "_" . time() .'_'.random_string('alnum', 6).".".$file_name_array[1];

		//     		$dummy_picture = copy("uploads/puppies/" . $row->picture, "uploads/puppies/" .$flname);
		//     	//	$result_pictures = json_decode(json_encode($result_pictures), true);

		//     // 		$max_id = $this->ads_model->get_max_id('posts_pictures');
		//     // 		$result_pictures[0]['id'] =  $max_id + 1;
		//     // 		$result_pictures[0]['post_id'] =  $insert_id;
		//     // 		$result_pictures[0]['picture'] =  
		//     // 		$result_pictures[0]['created_at'] =  date('Y-m-d H:i:s');

		//     		$ins=array(
		//     		    'post_id'=>$insert_id,
		//     		    'picture'=>$flname,
		//     		    'created_at'=>date('Y-m-d H:i:s')
		//     		    );

		//     		$insert_pic  = $this->common_model->create_record($ins, 'posts_pictures');
		// 		}




		// 3. posts_videos
		// 		$result_videos 	= $this->common_model->list_records($where, 'posts_videos', '', '');

		// 		foreach($result_videos as $row)
		// 		{
		// 		    $file_name_array = explode(".", $row->video);
		// 		    $vdo_name=file_name_array[0] . "_" . time() .'_'.random_string('alnum', 6).".".$file_name_array[1];

		// 		    $dummy_video = copy("uploads/puppies/" . $row->video, "uploads/puppies/" . $vdo_name);

		// 		    	$ins=array(
		//     		    'post_id'=>$insert_id,
		//     		    'video'=>$vdo_name,
		//     		    'created_at'=>date('Y-m-d H:i:s')
		//     		    );

		// 		    $insert_video  = $this->common_model->create_record($ins, 'posts_videos');
		// 		}


		//redirect('posts/duplicatead/'.$insert_id);

		return $insert_id;
	}

	public function duplicate_ad($id)
	{
		$data['title'] = 'Duplicate Ad | MyPupCentral ';
		$data['page'] = 'front/posts/duplicate_ad';
		$data['breed'] = $this->ads_model->getbreeds(array('is_puppyverify' => 1));
		$data['states'] = $this->common_model->search_state();
		$data['contact'] = $this->ads_model->getcontact();
		$data['post'] = $this->ads_model->getpost($id);
		$data['photo'] = $this->ads_model->getpic($id);
		$data['video'] = $this->ads_model->getvideo($id);
		$data['id'] = $id;
		
			$data['breeder'] = $this->common_model->list_row('user_accounts', array('id' => $_SESSION['siteuser']['id']));
		$data['time_slots'] = $this->common_model->list_records(array('status' => 1, 'application' => 'pv'), 'time_slots', 'id', 'ASC');
		$data['breeds_merged'] = $this->common_model->list_row('breeds', array('id' => $data['post']->category_id, 'is_puppyverify' => 1, 'is_noshed' => 1));
		$data['ads'] = $this->common_model->list_records(array('user_id' => $_SESSION['siteuser']['id']), 'posts', 'title', 'ASC');

		$this->load->view('front/layout', $data);
	}
	public function deleteImage()
	{
		$post_id = $this->input->post('id');
		$picture = $this->input->post('status');
		$this->common_model->delete('posts_pictures', array('post_id' => $post_id, 'picture' => $picture));
		$output_dir3 = "uploads/puppies/";
		unlink($output_dir3 . $picture);
	}

	public function check_breed()
	{
		$get = $this->common_model->list_row('breeds', array('id' => $this->input->post('id'), 'is_puppyverify' => 1, 'is_noshed' => 1));
		if (!empty($get)) {
			$resp = array('status' => 'success');
		} else {
			$resp = array('status' => 'error');
		}
		echo json_encode($resp);
	}

	public function update_pic($id)
	{
		$info = $this->common_model->list_row('posts', array('id' => $id));
		if ($info->featured_image_from == 'puppyverify.com') {

			$this->add_watermark('uploads/puppies/' . $info->featured_image, 1, $info->featured_image);
			echo 'success';
		}

		$pics = $this->common_model->list_records(array('post_id' => $id), 'posts_pictures', 'id', 'ASC', $limit = NULL);
		if (!empty($pics)) {
			$cc = 0;
			foreach ($pics as $row) {
				$this->add_watermark('uploads/puppies/' . $row->picture, 0, $row->picture);
				$cc++;
			}
			echo $cc;
		}
	}

	// for payment
	public function proceed_pay($id)
	{

		redirect('posts/pay/' . $id, 'refresh');
	}

	public function stripe_payment($id)
	{
		$this->load->library('stripe_lib');
		$data['title'] = 'Pay | MyPupCentral';

		$result = $this->common_model->list_row('book_time_slot_main', array('id' => $id));
		if ($result) {
			$data['id'] = $result->id;
			$data['ad_id'] = $result->ad_id;
		}
		if ($result == '') {
			$result = $this->common_model->list_row('posts', array('id' => $id));
			$data['ad_id'] = $result->id;
			$data['id'] = '';
		}


		// If payment form is submitted with token
		if ($this->input->post('stripeToken')) {
			// Retrieve stripe token, card and user info from the submitted form data
			$postData = $this->input->post();

			// Make payment
			$paymentID = $this->payment($postData, $result, $id);


			// If payment successful
			if ($paymentID) {
				redirect(base_url() . 'payment-success');
			} else {

				$apiError = !empty($this->stripe_lib->api_error) ? ' (' . $this->stripe_lib->api_error . ')' : '';
				var_dump($apiError);
				exit;
				$data['error_msg'] = 'Transaction has been failed!' . $apiError;
				$this->session->set_flashdata('msg', $data['error_msg']);
				redirect(base_url() . 'payment-failed', $data);
			}
		}

		// Pass product data to the details view
		$data['currency'] = 'USD';
		$data['tot'] = $result->sub_total;
		$data['pay_id'] = '';
		$data['cart'] = '';

		$data['page'] = 'front/stripe_card_accept';
		$this->load->view('front/layout', $data);
	}

	private function payment($postData, $result, $id)
	{

		$this->load->library('stripe_lib');


		// If post data is not empty
		if (!empty($postData)) {
			// Retrieve stripe token, card and user info from the submitted form data
			$token  = $postData['stripeToken'];
			$name = $postData['name'];
			$email = $_SESSION['siteuser']['email'];
			$card_number = $postData['card_number'];
			$card_number = preg_replace('/\s+/', '', $card_number);
			$card_exp_month = $postData['card_exp_month'];
			$card_exp_year = $postData['card_exp_year'];
			$card_cvc = $postData['card_cvc'];
			// Unique order ID
			$orderID = $id;
			if ($result->sub_total > 0) {
				// Add customer to stripe
				$customer = $this->stripe_lib->addCustomer($email, $token);


				if ($customer) {
					// Charge a credit or a debit card
					$charge = $this->stripe_lib->createCharge($customer->id, $name, $result->sub_total, $orderID, 'USD');

					if ($charge) {
						// Check whether the charge is successful
						if ($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1) {
							// Transaction details 
							$transactionID = $charge['balance_transaction'];
							$paidAmount = $charge['amount'];
							$paidAmount = ($paidAmount / 100);
							$paidCurrency = $charge['currency'];
							$payment_status = $charge['status'];



							// $orderID = $this->product->insertOrder($orderData);

							// If the order is successful
							if ($payment_status == 'succeeded') {
								$where = array('book_time_slot_main_id' => $id);

								$user_id = $_SESSION['siteuser']['id'];

								$timeslot = $this->common_model->list_row('book_time_slot', array('book_time_slot_main_id' => $id));

								// if(!empty($timeslot->discount_method))
								// {
								//     $res3   = $this->common_model->list_row('used_promocodes',array('promocode'=>$timeslot->discount_method,'seller_id'=>$user_id));

								//     $ups_data=array(
								//         'times'=> $res3->times + 1,
								//         'updated_at'=>date("Y-m-d H:i:s")
								//     );
								//     $this->common_model->update_records($ups_data,array('promocode'=>$timeslot->discount_method,'seller_id'=>$user_id),'used_promocodes');

								// }

								// $data = array(

								//     'txn_id' => $transactionID,
								//     'txn_status' => 1,
								//     'updated_at' => date("Y-m-d H:i:s")
								// );
								// $this->common_model->update_records($data, array('id'=>$id), 'book_time_slot_main');

								// $this->common_model->update_records($data, $where, 'book_time_slot');
								// if($timeslot)
								// {
								// if($timeslot->premium_type > 0)
								// {
								// 		$this->common_model->update_records(array('is_timeslot'=>1,'premium_type'=>$timeslot->premium_type), array('id'=>$timeslot->ad_id), 'posts');
								// 	}
								// }

								$data = array(
									'txn_id' => $transactionID,
									'txn_status' => 1,
									'reviewed' => 1,
									'updated_at' => date("Y-m-d H:i:s")
								);
								$this->ads_model->update_post('posts', $data, $id);
								return 1;
							}
						}
					}
				}
			} else {
				$where = array('book_time_slot_main_id' => $id);

				$user_id = $_SESSION['siteuser']['id'];

				$timeslot = $this->common_model->list_row('book_time_slot', array('book_time_slot_main_id' => $id));

				$data = array(
					'txn_id' => 'Promocode',
					'txn_status' => 1,
					'reviewed' => 1,
					'updated_at' => date("Y-m-d H:i:s")
				);
				$this->ads_model->update_post('posts', $data, $id);
				return 1;
				redirect(base_url() . 'payment-success');
			}
		}
		return false;
	}


	public function payment_success()
	{
		$data['title'] = 'Success | MyPupCentral';

		$data['page'] = 'front/payment_success';
		$this->load->view('front/layout', $data);
	}

	public function payment_failed()
	{
		$data['title'] = 'MyPupCentral-Failed';

		$data['page'] = 'front/payment_failed';
		$this->load->view('front/layout', $data);
	}

	public function get_price()
	{
		// $date=array();
		// $date=$this->input->post('date');
		// $number=array();
		// $number=$this->input->post('number');

		$type = $this->input->post('time0');

		$total = 0;
		// foreach($date as $key=>$row)
		// {
		//     $time=array();
		//     $time=$this->input->post('time'.$number[$key]);


		//     foreach($time as $tm)
		//     {
		$res = $this->common_model->list_row('time_slots', array('id' => $type));
		// $total=$total+$res->price;
		//     }
		if (empty($res)) {
			if ($this->input->post('merge') == 1) {
				$total = 30;
				$additional = 0;
				$base = 30;
			} else {
				$total = 23;
				$additional = 0;
				$base = 23;
			}
		} else {
			if ($this->input->post('merge') == 1) {
				$total = $res->price + 30;
				$additional = $res->price;
				$base = 30;
			} else {
				$total = $res->price + $res->base_price;
				$additional = $res->price;
				$base = $res->base_price;
			}
		}


		// }
		$result = array('status' => 'success', 'msg' => number_format($total, 2), 'extra' => number_format($additional, 2), 'base' => number_format($base, 2));
		echo json_encode($result);
	}

	public function getdiscountprice()
	{
		$promo = trim($this->input->post('promo_code'));
		$type  = $this->input->post('time0');
		$res1   = $this->common_model->list_row('time_slots', array('id' => $type));

		if ($res1 == '') {
			$total = 23;

			if ($this->input->post('merge') == 1) {
				$total =  30;
			}
		} else {
			$total = $res1->base_price + $res1->price;

			if ($this->input->post('merge') == 1) {
				$total =  $res1->price + 30;
			}
		}


		$user_id = $_SESSION['siteuser']['id'];

		$res2   = $this->common_model->list_row('promocode', array('promo_code' => $promo));
		$res3   = $this->common_model->list_row('used_promocodes', array('promocode' => $promo, 'seller_id' => $user_id));

		if ($res2 != '') {
			if ($res2->premium_type_id == $type || $res2->premium_type_id == 0) {
				if ($res2->limit_type == '0') {
					if (strtotime("now") >= strtotime($res2->valid_from) && strtotime("now") <= strtotime($res2->valid_till)) {

						if ($res3 != '') {
							if ($res3->times >= $res2->usage_times) {
								$total_amount = 'Promo code already used';
								$result = array('status' => 'success', 'msg' => $total_amount);
							} else {
								if ($res2->discount_type == '1') {
									$amountgot = ($total / 100) * $res2->percentage;

									$max = $res2->amount_limit;

									if ($amountgot > $max) {
										$amount = $max;
									} else {
										$amount = $amountgot;
									}
								} elseif ($res2->discount_type == '0') {
									$amount = $res2->amount;
									$max = $res2->amount_limit;

									if ($amount > $max) {
										$amount = $max;
									} else {
										$amount = $amount;
									}
								}

								// $up_data=array(
								//     'times'=> $res3->times + 1,
								//      'updated_at'=>date("Y-m-d H:i:s")
								//       );
								//       $this->common_model->update_records($up_data,array('promocode'=>$promo,'seller_id'=>$user_id),'used_promocodes');

								$total_amount = $total - $amount;
								$result = array('status' => 'success', 'msg' => number_format($total_amount, 2), 'offer' => number_format($amount, 2));
							}
						} else {
							if ($res2->discount_type == '1') {
								$amountgot = ($total / 100) * $res2->percentage;

								$max = $res2->amount_limit;

								if ($amountgot > $max) {
									$amount = $max;
								} else {
									$amount = $amountgot;
								}
							} elseif ($res2->discount_type == '0') {
								$amount = $res2->amount;
								$max = $res2->amount_limit;

								if ($amount > $max) {
									$amount = $max;
								} else {
									$amount = $amount;
								}
							}


							$total_amount = $total - $amount;
							$result = array('status' => 'success', 'msg' => number_format($total_amount, 2), 'offer' => number_format($amount, 2));
						}
					} else {
						$total_amount = 'Promo code expired';
						$result = array('status' => 'success', 'msg' => $total_amount);
					}
				} else {
					if ($res3 != '') {
						if ($res3->times >= $res2->usage_times) {
							$total_amount = 'Promo code already used';
							$result = array('status' => 'success', 'msg' => $total_amount);
						} else {
							if ($res2->discount_type == '1') {
								$amountgot = ($total / 100) * $res2->percentage;

								$max = $res2->amount_limit;

								if ($amountgot > $max) {
									$amount = $max;
								} else {
									$amount = $amountgot;
								}
							} elseif ($res2->discount_type == '0') {
								$amount = $res2->amount;
								$max = $res2->amount_limit;

								if ($amount > $max) {
									$amount = $max;
								} else {
									$amount = $amount;
								}
							}



							$total_amount = $total - $amount;
							$result = array('status' => 'success', 'msg' => number_format($total_amount, 2), 'offer' => number_format($amount, 2));
						}
					} else {
						if ($res2->discount_type == '1') {
							$amountgot = ($total / 100) * $res2->percentage;

							$max = $res2->amount_limit;

							if ($amountgot > $max) {
								$amount = $max;
							} else {
								$amount = $amountgot;
							}
						} elseif ($res2->discount_type == '0') {
							$amount = $res2->amount;
							$max = $res2->amount_limit;

							if ($amount > $max) {
								$amount = $max;
							} else {
								$amount = $amount;
							}
						}



						$total_amount = number_format($total, 2) - number_format($amount, 2);
						$result = array('status' => 'success', 'msg' => number_format($total_amount, 2), 'offer' => number_format($amount, 2));
					}
				}
			} else {
				$total_amount = "Promocode " . $promo . " can't be used for this pack";
				$result = array('status' => 'success', 'msg' => $total_amount);
			}
		} elseif ($promo == 'OWNER' && ($_SESSION['siteuser']['id'] == 16 || $_SESSION['siteuser']['id'] == 42 || $_SESSION['siteuser']['id'] == 25 || $_SESSION['siteuser']['id'] == 39)) {
			$total_amount = 0;
			$amount = 100;
			$result = array('status' => 'success', 'msg' => number_format($total_amount, 2), 'offer' => number_format($amount, 2));
		} else {
			$total_amount = 'Promocode ' . $promo . ' does not exist';
			$result = array('status' => 'success', 'msg' => $total_amount);
		}


		echo json_encode($result);
	}

	public function add_cart()
	{
		$this->form_validation->set_rules('puppy_category', 'Category', 'trim|required|xss_clean');
		$this->form_validation->set_rules('ad_title', 'Title', 'trim|required|xss_clean');
		$this->form_validation->set_rules('description', 'Description', 'trim|required|xss_clean');
		$this->form_validation->set_rules('contact_person', 'Contact Person', 'trim|required|xss_clean');
		$this->form_validation->set_rules('location', 'Address', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('puppy_age', 'Puppy Age', 'trim|required|xss_clean');
		$this->form_validation->set_rules('puppy_size', 'Page Size', 'trim|required|xss_clean');
		$this->form_validation->set_rules('puppy_dob', 'Puppy DOB', 'trim|required|xss_clean');
		$this->form_validation->set_rules('puppy_sex', 'Puppy Sex', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$response_data = array('status' => 'error', 'msg' => validation_errors());

			echo json_encode($response_data);
		} else {
			$data = array();
			$data['country_code'] = 'US';
			$data['user_id'] = $_SESSION['siteuser']['id'];
			$data['category_id '] = $this->input->post('puppy_category');
			$data['title']  = $this->input->post('ad_title');
			$data['description'] = $this->input->post('description');
			$data['price'] = $this->input->post('sale_price');
			$data['asking_price'] = $this->input->post('ask_price');
			$data['negotiable'] = $this->input->post('negotiable');
			$data['contact_name'] = $this->input->post('contact_person');
			$data['reviewed'] = '0';
			$data['youtube']  = $this->input->post('youtube');
			$data['uploaded_from'] = 'puppyverify.com';
			$data['is_merged'] = $this->input->post('merge');
			// $data['phone'] =$this->input->post('phone');
			// $data['email'] =$this->input->post('email');
			// $data['address'] = $this->input->post('location');
			// $data['payment_amount']= $this->input->post('total_amount');
			$data['sub_total'] = $this->input->post('total_amount');
			$data['original_price'] = $this->input->post('total_amount');

			// to insert in adress and state_id from single drop down selection
			$location = explode('|', $this->input->post('location'));
			$state_name =  $location[0];
			$state_id =  $location[1];
			$data['address'] = $state_name;
			$data['state_id'] = $state_id;

			$data['registration'] = json_encode($this->input->post('registration'));
			$data['other_registration'] = $this->input->post('other_registration');
			$data['training_package'] = $this->input->post('training_package');
			$data['available_date'] = $this->input->post('available_date');
			$data['puppy_name'] = $this->input->post('ad_title');
			// $data['puppy_age'] = $this->input->post('puppy_age');
			$data['puppy_size'] = $this->input->post('puppy_size');
			$data['puppy_dob'] = $this->input->post('puppy_dob');
			$data['puppy_sex'] = $this->input->post('puppy_sex');
			$data['created_at'] = date('Y-m-d H-i-s');

			if (!empty($_FILES['mother_photo']['name'])) {
				$name1 = array();
				$output_dir1 = "uploads/puppies/";/* Path for file upload */

				$RandomNum1   = time() . uniqid(rand());

				$ImageName1      = str_replace(' ', '-', strtolower($_FILES['mother_photo']['name']));
				$ImageType1      = $_FILES['mother_photo']['type']; /*"image/png", image/jpeg etc.*/

				$ImageExt1 = substr($ImageName1, strrpos($ImageName1, '.'));
				$ImageExt1       = str_replace('.', '', $ImageExt1);
				$ImageName1     = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName1);
				$NewImageName1 = 'mother_' . $RandomNum1 . '.' . $ImageExt1;
				// array_push($name, $NewImageName);

				$ret[$NewImageName1] = $output_dir1 . $NewImageName1;
				// var_dump($NewImageName);

				if (move_uploaded_file($_FILES["mother_photo"]["tmp_name"], $output_dir1 . "/" . $NewImageName1)) {
					$this->add_watermark($output_dir1 . $NewImageName1, 0, $NewImageName1);
					$data['mother_photo'] = $NewImageName1;
					$data['mother_photo_from'] = 'puppyverify.com';
				}
			}
			if (!empty($_FILES['father_photo']['name'])) {
				$name2 = array();
				$output_dir2 = "uploads/puppies/";/* Path for file upload */

				$RandomNum2   = time() . uniqid(rand());

				$ImageName2      = str_replace(' ', '-', strtolower($_FILES['father_photo']['name']));
				$ImageType2      = $_FILES['father_photo']['type']; /*"image/png", image/jpeg etc.*/

				$ImageExt2 = substr($ImageName2, strrpos($ImageName2, '.'));
				$ImageExt2       = str_replace('.', '', $ImageExt2);
				$ImageName2      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName2);
				$NewImageName2 = 'father_' . $RandomNum2 . '.' . $ImageExt2;
				// array_push($name, $NewImageName);

				$ret[$NewImageName2] = $output_dir2 . $NewImageName2;
				// var_dump($NewImageName);

				if (move_uploaded_file($_FILES["father_photo"]["tmp_name"], $output_dir2 . "/" . $NewImageName2)) {
					$this->add_watermark($output_dir2 . $NewImageName2, 0, $NewImageName2);
					$data['father_photo'] = $NewImageName2;
					$data['father_photo_from'] = 'puppyverify.com';
				}
			}
			$response = $this->ads_model->addad('posts', $data);
			// If files are selected to upload 



			if (isset($_FILES["img_gallery"]["name"])) {

				$filenames = $this->input->post('filenames');
				// exit();
				$data = array();
				foreach ($_FILES["img_gallery"]["name"] as $key => $value) {
					$fetrd = 0;
					$_FILES['files']['name']     = $_FILES['img_gallery']['name'][$key];
					$_FILES['files']['type']     = $_FILES['img_gallery']['type'][$key];
					$_FILES['files']['tmp_name'] = $_FILES['img_gallery']['tmp_name'][$key];
					$_FILES['files']['error']     = $_FILES['img_gallery']['error'][$key];
					$_FILES['files']['size']     = $_FILES['img_gallery']['size'][$key];


					$config['upload_path'] = 'uploads/puppies/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					$config['file_name'] = time() . '-' . $_FILES['img_gallery']['name'][$key];
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if (array_search($_FILES['img_gallery']['name'][$key], $filenames) == 0) {
						$fetrd = 1;
					}

					if (!$this->upload->do_upload('files')) {
						// 	echo $this->upload->display_errors();
					} else {
						$data[$key] = $this->upload->data();

						$url =  'uploads/puppies/' . $data[$key]['file_name'];

						$image_data[$key] = $data[$key]['file_name'];
						if ($fetrd == 1) {
							$this->add_watermark($config['upload_path'] . $image_data[$key], 1, $image_data[$key]);
							$data = array(
								'featured_image' => $image_data[$key],
								'featured_image_from' => 'puppyverify.com'
							);

							$this->ads_model->update_post('posts', $data, $response);
						} else {
							$this->add_watermark($config['upload_path'] . $image_data[$key], 0, $image_data[$key]);
						}

						$photos = array();
						$photos['picture'] = $image_data[$key];
						$photos['status'] = array_search($_FILES['img_gallery']['name'][$key], $filenames) + 1;
						$photos['post_id'] = $response;
						$photos['uploaded_from'] = 'puppyverify.com';
						$response4 = $this->ads_model->addad('posts_pictures', $photos);
					}
				}
			}


			if (!empty(array_filter($_FILES['video_gallery']['name']))) {
				// var_dump($_FILES['video_gallery']['name']);
				$name6 = array();
				$output_dir6 = "uploads/puppies/";/* Path for file upload */
				$fileCount2 = count($_FILES["video_gallery"]['name']);
				for ($i = 0; $i < $fileCount2; $i++) {
					$RandomNum6   = time() . uniqid(rand());

					$ImageName6      = str_replace(' ', '-', strtolower($_FILES['video_gallery']['name'][$i]));
					$ImageType6      = $_FILES['video_gallery']['type'][$i]; /*"image/png", image/jpeg etc.*/

					$ImageExt6 = substr($ImageName6, strrpos($ImageName6, '.'));
					$ImageExt6     = str_replace('.', '', $ImageExt6);
					$ImageName6      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName6);
					$NewImageName6 = 'gallery_' . $RandomNum6 . '.' . $ImageExt6;
					array_push($name6, $NewImageName6);

					$ret[$NewImageName6] = $output_dir6 . $NewImageName6;
					// var_dump($NewImageName);

					if (move_uploaded_file($_FILES["video_gallery"]["tmp_name"][$i], $output_dir6 . "/" . $NewImageName6)) {
						$videos = array();
						$videos['video'] = $NewImageName6;
						$videos['post_id'] = $response;
						$videos['uploaded_from'] = 'puppyverify.com';
						$response5 = $this->ads_model->addad('posts_videos', $videos);
					}
				}
			}

			$response_data = array('status' => 'success', 'msg' => 'success', 'url' => '1');

			echo json_encode($response_data);
		}
	}

	public function add_cart_duplicate()
	{
		$id = $this->input->post('post_id');


		$id = $this->view_duplicate_ad($id);
		$post = $this->ads_model->getpost($id);
		$photo = $this->ads_model->getpic($id);
		$video = $this->ads_model->getvideo($id);
		$data = array();
		// $data['country_code']= 'US';
		// $data['user_id']= $_SESSION['siteuser']['id'];
		$data['category_id '] = $this->input->post('puppy_category');
		$data['title']  = $this->input->post('ad_title');
		$data['description'] = $this->input->post('description');
		$data['price'] = $this->input->post('sale_price');
		$data['asking_price'] = $this->input->post('ask_price');
		// $data['negotiable'] = $this->input->post('negotiable');
		$data['contact_name'] = $this->input->post('contact_person');
		// $data['phone'] =$this->input->post('phone');
		// $data['email'] =$this->input->post('email');
		//	$data['address'] = $this->input->post('location');
		// to insert in adress and state_id from single drop down selection
		$location = explode('|', $this->input->post('location'));
		$state_name =  $location[0];
		$state_id =  $location[1];
		$data['address'] = $state_name;
		$data['state_id'] = $state_id;
		$data['youtube']  = $this->input->post('youtube');
		$data['is_merged'] = $this->input->post('merge');
		// if ($this->input->post('duplicate') == 1) {
		$data['sub_total']  = $this->input->post('total_amount');
		$data['original_price'] = $this->input->post('total_amount');
		// }

		$data['registration'] = json_encode($this->input->post('registration'));
		$data['other_registration'] = $this->input->post('other_registration');
			$data['training_package'] = $this->input->post('training_package');
		$data['available_date'] = $this->input->post('available_date');
		$data['puppy_name'] = $this->input->post('puppy_name');
		// $data['puppy_age'] = $this->input->post('puppy_age');
		$data['puppy_size'] = $this->input->post('puppy_size');
		$data['puppy_dob'] = $this->input->post('puppy_dob');
		$data['puppy_sex'] = $this->input->post('puppy_sex');
		$data['updated_at'] = date('Y-m-d H-i-s');

		if (!empty($_FILES['mother_photo']['name'])) {
			$name1 = array();
			$output_dir1 = "uploads/puppies/";/* Path for file upload */

			$RandomNum1   = time() . uniqid(rand());

			$ImageName1      = str_replace(' ', '-', strtolower($_FILES['mother_photo']['name']));
			$ImageType1      = $_FILES['mother_photo']['type']; /*"image/png", image/jpeg etc.*/

			$ImageExt1 = substr($ImageName1, strrpos($ImageName1, '.'));
			$ImageExt1       = str_replace('.', '', $ImageExt1);
			$ImageName1     = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName1);
			$NewImageName1 = 'mother_' . $RandomNum1 . '.' . $ImageExt1;
			// array_push($name, $NewImageName);

			$ret[$NewImageName1] = $output_dir1 . $NewImageName1;
			// var_dump($NewImageName);

			if (move_uploaded_file($_FILES["mother_photo"]["tmp_name"], $output_dir1 . "/" . $NewImageName1)) {
				unlink($output_dir1 . $post->mother_photo);
				$this->add_watermark($output_dir1 . $NewImageName1, 0, $NewImageName1);
				$data['mother_photo'] = $NewImageName1;
				$data['mother_photo_from'] = 'puppyverify.com';
			}
		} elseif ($this->input->post('mothers') == '') {
			$data['mother_photo'] = '';
		}
		if (!empty($_FILES['father_photo']['name'])) {
			$name2 = array();
			$output_dir2 = "uploads/puppies/";/* Path for file upload */

			$RandomNum2   = time() . uniqid(rand());

			$ImageName2      = str_replace(' ', '-', strtolower($_FILES['father_photo']['name']));
			$ImageType2      = $_FILES['father_photo']['type']; /*"image/png", image/jpeg etc.*/

			$ImageExt2 = substr($ImageName2, strrpos($ImageName2, '.'));
			$ImageExt2       = str_replace('.', '', $ImageExt2);
			$ImageName2      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName2);
			$NewImageName2 = 'father_' . $RandomNum2 . '.' . $ImageExt2;
			// array_push($name, $NewImageName);

			$ret[$NewImageName2] = $output_dir2 . $NewImageName2;
			// var_dump($NewImageName);

			if (move_uploaded_file($_FILES["father_photo"]["tmp_name"], $output_dir2 . "/" . $NewImageName2)) {
				unlink($output_dir2 . $post->father_photo);
				$this->add_watermark($output_dir2 . $NewImageName2, 0, $NewImageName2);
				$data['father_photo'] = $NewImageName2;
				$data['father_photo_from'] = 'puppyverify.com';
			}
		} elseif ($this->input->post('fathers') == '') {
			$data['father_photo'] = '';
		}
		$this->ads_model->update_post('posts', $data, $id);





		if (isset($_FILES["img_gallery"]["name"])) {

			$filenames = $this->input->post('filenames');
			// exit();
			$data = array();
			foreach ($_FILES["img_gallery"]["name"] as $key => $value) {
				$fetrd = 0;
				$_FILES['files']['name']     = $_FILES['img_gallery']['name'][$key];
				$_FILES['files']['type']     = $_FILES['img_gallery']['type'][$key];
				$_FILES['files']['tmp_name'] = $_FILES['img_gallery']['tmp_name'][$key];
				$_FILES['files']['error']     = $_FILES['img_gallery']['error'][$key];
				$_FILES['files']['size']     = $_FILES['img_gallery']['size'][$key];


				$config['upload_path'] = 'uploads/puppies/';
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['file_name'] = time() . '-' . $_FILES['img_gallery']['name'][$key];
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (array_search($_FILES['img_gallery']['name'][$key], $filenames) == 0) {
					$fetrd = 1;
				}

				if (!$this->upload->do_upload('files')) {
					// 	echo $this->upload->display_errors();
				} else {
					$data[$key] = $this->upload->data();

					$url =  'uploads/puppies/' . $data[$key]['file_name'];

					$image_data[$key] = $data[$key]['file_name'];
					if ($fetrd == 1) {
						$this->add_watermark($config['upload_path'] . $image_data[$key], 1, $image_data[$key]);
						$data = array(
							'featured_image' => $image_data[$key],
							'featured_image_from' => 'puppyverify.com'
						);

						$this->ads_model->update_post('posts', $data, $id);
					} else {
						$this->add_watermark($config['upload_path'] . $image_data[$key], 0, $image_data[$key]);
					}

					$photos = array();
					$photos['picture'] = $image_data[$key];
					$photos['status'] = array_search($_FILES['img_gallery']['name'][$key], $filenames) + 1;
					$photos['post_id'] = $id;
					$photos['uploaded_from'] = 'puppyverify.com';
					$response4 = $this->ads_model->addad('posts_pictures', $photos);
				}
			}
		}


		if (!empty(array_filter($_FILES['video_gallery']['name']))) {
			// var_dump($_FILES['video_gallery']['name']);
			$name6 = array();
			$output_dir6 = "uploads/puppies/";/* Path for file upload */
			$fileCount2 = count($_FILES["video_gallery"]['name']);

			$this->ads_model->deleteitem('posts_videos', $id);

			for ($i = 0; $i < $fileCount2; $i++) {
				$RandomNum6   = time() . uniqid(rand());

				$ImageName6      = str_replace(' ', '-', strtolower($_FILES['video_gallery']['name'][$i]));
				$ImageType6      = $_FILES['video_gallery']['type'][$i]; /*"image/png", image/jpeg etc.*/

				$ImageExt6 = substr($ImageName6, strrpos($ImageName6, '.'));
				$ImageExt6     = str_replace('.', '', $ImageExt6);
				$ImageName6      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName6);
				$NewImageName6 = 'gallery_' . $RandomNum6 . '.' . $ImageExt6;
				array_push($name6, $NewImageName6);

				$ret[$NewImageName6] = $output_dir6 . $NewImageName6;
				// var_dump($NewImageName);

				if (move_uploaded_file($_FILES["video_gallery"]["tmp_name"][$i], $output_dir6 . "/" . $NewImageName6)) {

					foreach ($video as $vid) {
						unlink($output_dir6 . $vid['video']);
					}
					$videos = array();
					$videos['video'] = $NewImageName6;
					$videos['post_id'] = $id;
					$videos['uploaded_from'] = 'puppyverify.com';
					$response5 = $this->ads_model->addad('posts_videos', $videos);
					// var_dump($driver['d_photo']);
				}
			}
		}
		$response_data = array('status' => 'success', 'msg' => 'success', 'url' => '1');

		echo json_encode($response_data);
	}

	public function add_to_cart()
	{
		$id = $this->input->post('post_id');
		$id = json_encode($id);

		$user_id = $_SESSION['siteuser']['id'];
		$data = array(
			'post_id' => $id,
			'user_id' => $user_id,
			'original_amount' => $this->input->post('total_amount'),
			'total_amount' => $this->input->post('total_amount')
		);

		$ins_id = $this->common_model->create_record($data, 'payment_details');

		echo json_encode(array('status' => 'success', 'msg' => $ins_id));
	}

	public function add_to_cart_all()
	{
		$id = $this->input->post('ad_ids');
		$id = json_encode($id);
		// var_dump($this->input->post('total_amount'));exit;
		// $amount = array($this->input->post('amount'));
		$user_id = $_SESSION['siteuser']['id'];
		$data = array(
			'post_id' => $id,
			'user_id' => $user_id,
			'original_amount' => $this->input->post('alltotal'),
			'total_amount' => $this->input->post('alltotal')
		);

		$ins_id = $this->common_model->create_record($data, 'payment_details');

		echo json_encode(array('status' => 'success', 'msg' => $ins_id));
	}

	public function cart_stripe_payment($id)
	{
		$this->load->library('stripe_lib');
		$data['title'] = 'MyPupCentral-Pay Now';

		$result = $this->common_model->list_row('payment_details', array('id' => $id));

		// If payment form is submitted with token
		if ($this->input->post('stripeToken')) {
			// Retrieve stripe token, card and user info from the submitted form data
			$postData = $this->input->post();

			// Make payment
			$paymentID = $this->cart_payment($postData, $result, $id);


			// If payment successful
			if ($paymentID) {
				redirect(base_url() . 'payment-success');
			} else {

				$apiError = !empty($this->stripe_lib->api_error) ? ' (' . $this->stripe_lib->api_error . ')' : '';
				var_dump($apiError);
				exit;
				$data['error_msg'] = 'Transaction has been failed!' . $apiError;
				$this->session->set_flashdata('msg', $data['error_msg']);
				redirect(base_url() . 'payment-failed', $data);
			}
		}

		// Pass product data to the details view
		$data['currency'] = 'USD';
		$data['tot'] = $result->total_amount;
		$data['id'] = '';
		$data['ad_id'] = '';
		$data['pay_id'] = $id;
		$data['cart'] = '1';

		$data['page'] = 'front/stripe_card_accept';
		$this->load->view('front/layout', $data);
	}

	private function cart_payment($postData, $result, $id)
	{

		$this->load->library('stripe_lib');


		// If post data is not empty
		if (!empty($postData)) {
			// Retrieve stripe token, card and user info from the submitted form data
			$token  = $postData['stripeToken'];
			$name = $postData['name'];
			$email = $_SESSION['siteuser']['email'];
			$card_number = $postData['card_number'];
			$card_number = preg_replace('/\s+/', '', $card_number);
			$card_exp_month = $postData['card_exp_month'];
			$card_exp_year = $postData['card_exp_year'];
			$card_cvc = $postData['card_cvc'];
			// Unique order ID
			$orderID = $id;
			if ($result->total_amount > 0) {
				// Add customer to stripe
				$customer = $this->stripe_lib->addCustomer($email, $token);


				if ($customer) {
					// Charge a credit or a debit card
					$charge = $this->stripe_lib->createCharge($customer->id, $name, $result->total_amount, $orderID, 'USD');

					if ($charge) {
						// Check whether the charge is successful
						if ($charge['amount_refunded'] == 0 && empty($charge['failure_code']) && $charge['paid'] == 1 && $charge['captured'] == 1) {
							// Transaction details 
							$transactionID = $charge['balance_transaction'];
							$paidAmount = $charge['amount'];
							$paidAmount = ($paidAmount / 100);
							$paidCurrency = $charge['currency'];
							$payment_status = $charge['status'];



							// $orderID = $this->product->insertOrder($orderData);

							// If the order is successful
							if ($payment_status == 'succeeded') {
								$id = json_decode($result->post_id, true);
								$user_id = $_SESSION['siteuser']['id'];
								foreach ($id as $key => $ids) {
									$data = array(
										'txn_id' => $transactionID,
										'txn_status' => 1,
										'reviewed' => 1,
										'paid_in' => 'Bulk',
										'updated_at' => date("Y-m-d H:i:s")
									);
									$this->ads_model->update_post('posts', $data, $ids);
									$timeslot = $this->common_model->list_row('book_time_slot', array('ad_id' => $ids));
									if (!empty($timeslot->discount_method)) {
										$res3   = $this->common_model->list_row('used_promocodes', array('promocode' => $timeslot->discount_method, 'seller_id' => $user_id));

										$ups_data = array(
											'times' => $res3->times + 1,
											'updated_at' => date("Y-m-d H:i:s")
										);
										$this->common_model->update_records($ups_data, array('promocode' => $timeslot->discount_method, 'seller_id' => $user_id), 'used_promocodes');
									}

									$data = array(

										'txn_id' => $transactionID,
										'txn_status' => 1,
										'updated_at' => date("Y-m-d H:i:s")
									);
									$this->common_model->update_records($data, array('ad_id' => $ids), 'book_time_slot_main');
									$where = array('ad_id' => $ids);
									$this->common_model->update_records($data, $where, 'book_time_slot');
									if ($timeslot) {
										if ($timeslot->premium_type > 0) {
											$this->common_model->update_records(array('is_timeslot' => 1, 'premium_type' => $timeslot->premium_type), array('id' => $ids), 'posts');
										}
									}
								}

								return 1;
							}
						}
					}
				}
			} else {
				$id = json_decode($result->post_id, true);
				$user_id = $_SESSION['siteuser']['id'];
				foreach ($id as $key => $ids) {
					$data = array(
						'txn_id' => 'Promocode',
						'txn_status' => 1,
						'paid_in' => 'Bulk',
						'reviewed' => 1,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->ads_model->update_post('posts', $data, $ids);
					$timeslot = $this->common_model->list_row('book_time_slot', array('ad_id' => $ids));
					if (!empty($timeslot->discount_method)) {
						$res3   = $this->common_model->list_row('used_promocodes', array('promocode' => $timeslot->discount_method, 'seller_id' => $user_id));

						$ups_data = array(
							'times' => $res3->times + 1,
							'updated_at' => date("Y-m-d H:i:s")
						);
						$this->common_model->update_records($ups_data, array('promocode' => $timeslot->discount_method, 'seller_id' => $user_id), 'used_promocodes');
					}

					$data = array(

						'txn_id' => 'Promocode',
						'txn_status' => 1,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->common_model->update_records($data, array('ad_id' => $ids), 'book_time_slot_main');
					$where = array('ad_id' => $ids);
					$this->common_model->update_records($data, $where, 'book_time_slot');
					if ($timeslot) {
						if ($timeslot->premium_type > 0) {
							$this->common_model->update_records(array('is_timeslot' => 1, 'premium_type' => $timeslot->premium_type), array('id' => $ids), 'posts');
						}
					}
				}

				return 1;
				redirect(base_url() . 'payment-success');
			}
		}
		return false;
	}

	public function getpromocode()
	{

		$user_id = $_SESSION['siteuser']['id'];
		$promo = $this->input->post('promocode');
		$url = base_url() . 'payment-success';
		$total = 23;
		$logged_user=$this->common_model->list_row('user_accounts',array('id'=>$_SESSION['siteuser']['id']));
		$res2   = $this->common_model->list_row('promocode', array('promo_code' => $promo));
		if ($res2 == '') {
			$result = array('status' => 'fail', 'tot' => 'Invalid Promocode');
			echo json_encode($result);
		}
		elseif(($res2->is_privilaged_only==1)&& ($logged_user->is_privilaged!=1) )
		{
			$result = array('status' => 'fail', 'tot' => 'Invalid Promocode');
			echo json_encode($result);
		}
		else {

			$res2   = $this->common_model->list_row('promocode', array('promo_code' => $promo));
			
			$id = $this->input->post('id');
			$ad_id = $this->input->post('ad_id');
			$pay_id = $this->input->post('pay_id');

			if(!empty($pay_id))
			{
				$pay_data   = $this->common_model->list_row('payment_details', array('id' => $pay_id));
				$tot =$pay_data->original_amount;
			}
			else{
				$pay_data   = $this->common_model->list_row('posts', array('id' => $ad_id));
				$tot =$pay_data->original_price;
			}

			$res3   = $this->common_model->list_row('used_promocodes', array('promocode' => $promo, 'seller_id' => $user_id));

			if ($res3 == '') {
				$data = array(
					'seller_id' => $user_id,
					'promocode' => $res2->promo_code,
					'times' => 0,
					'application' => 'pv',
					'created_at' => date("Y-m-d H:i:s"),
					'updated_at' => date("Y-m-d H:i:s")
				);
				$insid = $this->common_model->create_record($data, 'used_promocodes');
				$res3   = $this->common_model->list_row('used_promocodes', array('promocode' => $promo, 'seller_id' => $user_id));
			}

			if ($res2->limit_type == '2') {

				if ($res3->times < $res2->usage_times) {
					if ($res2->discount_type == '1') {
						$amountgot = ($tot / 100) * $res2->percentage;

						$max = $res2->amount_limit;

						if ($amountgot > $max) {
							$amount = $max;
						} else {
							$amount = $amountgot;
						}
					} elseif ($res2->discount_type == '0') {
						$amount = $res2->amount;
						$max = $res2->amount_limit;
						if ($amount > $max) {
							$amount = $max;
						} else {
							$amount = $amount;
						}
					}

					$total = $tot - $amount;
					if ($id != '') {
						$data = array(
							'discount' => $amount,
							'sub_total' => $total,
							'updated_at' => date("Y-m-d H:i:s")
						);
						$this->common_model->update_records($data, array('id' => $id), 'book_time_slot_main');
					}

					if ($pay_id != '') {
						$data = array(
							'total_amount' => $total,
							'discount' => $amount
						);
						$this->common_model->update_records($data, array('id' => $pay_id), 'payment_details');
					}


					$data = array(
						'discount_method' => $promo,
						'discount' => $amount,
						'sub_total' => $total,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->common_model->update_records($data, array('id' => $ad_id), 'posts');

					$ups_data = array(
						'times' => $res3->times + 1,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->common_model->update_records($ups_data, array('promocode' => $promo, 'seller_id' => $user_id), 'used_promocodes');

					$result = array('status' => 'success', 'tot' => number_format($total, 2), 'url' => $url);
					echo json_encode($result);
				} else {
					$result = array('status' => 'fail', 'tot' => 'Promocode expired');
					echo json_encode($result);
				}
			} elseif ($res2->limit_type == '1') {
				$paymentDate = date('Y-m-d');
				$paymentDate = date('Y-m-d', strtotime($paymentDate));
				//echo $paymentDate; // echos today! 
				$contractDateBegin = date('Y-m-d', strtotime($res2->valid_from));
				$contractDateEnd = date('Y-m-d', strtotime($res2->valid_till));

				if (($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) {
					if ($res2->discount_type == '1') {
						$amountgot = ($tot / 100) * $res2->percentage;

						$max = $res2->amount_limit;

						if ($amountgot > $max) {
							$amount = $max;
						} else {
							$amount = $amountgot;
						}
					} elseif ($res2->discount_type == '0') {
						$amount = $res2->amount;
						$max = $res2->amount_limit;
						if ($amount > $max) {
							$amount = $max;
						} else {
							$amount = $amount;
						}
					}

					$total = $tot - $amount;
					if ($id != '') {
						$data = array(
							'discount' => $amount,
							'sub_total' => $total,
							'updated_at' => date("Y-m-d H:i:s")
						);
						$this->common_model->update_records($data, array('id' => $id), 'book_time_slot_main');
					}

					if ($pay_id != '') {
						$data = array(
							'total_amount' => $total,
							'discount' => $amount
						);
						$this->common_model->update_records($data, array('id' => $pay_id), 'payment_details');
					}


					$data = array(
						'discount_method' => $promo,
						'discount' => $amount,
						'sub_total' => $total,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->common_model->update_records($data, array('id' => $ad_id), 'posts');

					$ups_data = array(
						'times' => $res3->times + 1,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->common_model->update_records($ups_data, array('promocode' => $promo, 'seller_id' => $user_id), 'used_promocodes');

					$result = array('status' => 'success', 'tot' => number_format($total, 2), 'url' => $url);
					echo json_encode($result);
				} else {
					$result = array('status' => 'fail', 'tot' => 'Promocode expired');
					echo json_encode($result);
				}
			} elseif ($res2->limit_type == '0') {
				if ($_SESSION['siteuser']['premium'] == '1') {
					if ($res2->discount_type == '1') {
						$amountgot = ($tot / 100) * $res2->percentage;

						$max = $res2->amount_limit;

						if ($amountgot > $max) {
							$amount = $max;
						} else {
							$amount = $amountgot;
						}
					} elseif ($res2->discount_type == '0') {
						$amount = $res2->amount;
						$max = $res2->amount_limit;
						if ($amount > $max) {
							$amount = $max;
						} else {
							$amount = $amount;
						}
					}

					$total = $tot - $amount;
					if ($id != '') {
						$data = array(
							'discount' => $amount,
							'sub_total' => $total,
							'updated_at' => date("Y-m-d H:i:s")
						);
						$this->common_model->update_records($data, array('id' => $id), 'book_time_slot_main');
					}

					if ($pay_id != '') {
						$data = array(
							'total_amount' => $total,
							'discount' => $amount
						);
						$this->common_model->update_records($data, array('id' => $pay_id), 'payment_details');
					}


					$data = array(
						'discount_method' => $promo,
						'discount' => $amount,
						'sub_total' => $total,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->common_model->update_records($data, array('id' => $ad_id), 'posts');

					$ups_data = array(
						'times' => $res3->times + 1,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->common_model->update_records($ups_data, array('promocode' => $promo, 'seller_id' => $user_id), 'used_promocodes');

					$result = array('status' => 'success', 'tot' => number_format($total, 2), 'url' => $url);
					echo json_encode($result);
				} else {
					$result = array('status' => 'fail', 'tot' => 'Invalid Promocode');
					echo json_encode($result);
				}
			} else {
				$result = array('status' => 'fail', 'tot' => 'Invalid Promocode');
				echo json_encode($result);
			}

			if ($total < '1') {
				if ($this->input->post('cart') == '1') {
					$result = $this->common_model->list_row('payment_details', array('id' => $pay_id));
					$id = json_decode($result->post_id, true);
					$user_id = $_SESSION['siteuser']['id'];
					foreach ($id as $key => $ids) {
						$data = array(
							'txn_id' => 'Promocode',
							'txn_status' => 1,
							'paid_in' => 'Bulk',
							'reviewed' => 1,
							'updated_at' => date("Y-m-d H:i:s")
						);
						$this->ads_model->update_post('posts', $data, $ids);
						$timeslot = $this->common_model->list_row('book_time_slot', array('ad_id' => $ids));

						$data = array(

							'txn_id' => 'Promocode',
							'txn_status' => 1,
							'updated_at' => date("Y-m-d H:i:s")
						);
						$this->common_model->update_records($data, array('ad_id' => $ids), 'book_time_slot_main');
						$where = array('ad_id' => $ids);
						$this->common_model->update_records($data, $where, 'book_time_slot');
					}

					return 1;
					// redirect(base_url() . 'payment-success');
				} else {
					$where = array('book_time_slot_main_id' => $id);

					$user_id = $_SESSION['siteuser']['id'];

					$timeslot = $this->common_model->list_row('book_time_slot', array('book_time_slot_main_id' => $id));

					$data = array(
						'txn_id' => 'Promocode',
						'txn_status' => 1,
						'reviewed' => 1,
						'updated_at' => date("Y-m-d H:i:s")
					);
					$this->ads_model->update_post('posts', $data, $ad_id);
					return 1;
					// redirect(base_url() . 'payment-success');
				}
			}
		}
	}


	public function get_size_radio($id)
	{

		$breed = $this->common_model->list_row('breeds', array('id' => $id));
		$radio = ' <input type="radio" id="puppy_size1" checked name="puppy_size" value="N/A">
	<label for="puppy_size1">N/A</label>';
		if (!empty($breed)) {
			if (!empty($breed->breed_size)) {
				$arr = json_decode($breed->breed_size);
				$radio = '';
				foreach ($arr as $key => $row) {
					$radio .= ' <input type="radio" id="puppy_size' . $key . '" name="puppy_size" value="' . $row . '">
				<label for="puppy_size' . $key . '">' . $row . '</label>';
				}
			} else {
			}
		} else {
		}

		$resp = array('status' => 'success', 'msg' => $radio);

		echo json_encode($resp);
	}
	public function deletevideo()
	{
		$id = $this->input->post('id');
		$video = $this->input->post('status');
		$this->common_model->delete('posts_videos', array('id' => $id, 'video' => $video));
		$output_dir3 = "uploads/puppies/";
		unlink($output_dir3 . $video);
	}
}
