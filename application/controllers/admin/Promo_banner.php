<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_banner extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('promo_banner_model');
        $this->load->library('form_validation');
        
        // Check if user is logged in and is admin
        // if (!$this->session->userdata('admin_logged_in')) {
        //     redirect('admin/login');
        // }
    }

    public function index() {
        // Ensure default banner exists
        $this->promo_banner_model->create_default_banner();
        
        $data['title'] = 'Promotional Banner Management';
        $data['banner'] = $this->promo_banner_model->get_banner();
        
        $this->load->view('admin/promo_banner/index', $data);
    }

    public function update() {
        $this->form_validation->set_rules('banner_text', 'Banner Text', 'required|trim');
        $this->form_validation->set_rules('background_color', 'Background Color', 'required|trim');
        $this->form_validation->set_rules('text_color', 'Text Color', 'required|trim');
        $this->form_validation->set_rules('is_active', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/promo_banner');
        }

        $data = array(
            'banner_text' => $this->input->post('banner_text'),
            'background_color' => $this->input->post('background_color'),
            'text_color' => $this->input->post('text_color'),
            'is_active' => $this->input->post('is_active')
        );

        // Validate data using model
        $errors = $this->promo_banner_model->validate_banner_data($data);
        if (!empty($errors)) {
            $this->session->set_flashdata('error', implode('<br>', $errors));
            redirect('admin/promo_banner');
        }

        $result = $this->promo_banner_model->update_banner($data);

        if ($result) {
            $this->session->set_flashdata('success', 'Promotional banner updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update promotional banner.');
        }

        redirect('admin/promo_banner');
    }

    public function toggle_status() {
        // Check if this is a POST request
        if ($this->input->method() !== 'post') {
            show_404();
        }

        $result = $this->promo_banner_model->toggle_status();

        if ($result) {
            $banner = $this->promo_banner_model->get_banner();
            $status_text = $banner->is_active == 1 ? 'enabled' : 'disabled';
            $this->session->set_flashdata('success', "Promotional banner {$status_text} successfully!");
        } else {
            $this->session->set_flashdata('error', 'Failed to update banner status.');
        }

        redirect('admin/promo_banner');
    }
}
