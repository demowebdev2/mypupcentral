<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_cover extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('home_cover_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        
        // Admin authentication check
        // if (!$this->session->userdata('admin_logged_in')) {
        //     redirect('admin/login');
        // }
    }
    
    /**
     * Display home cover management page
     */
    public function index() {
        $this->home_cover_model->create_default_cover(); // Ensure default cover exists
        
        $data['title'] = 'Home Page Cover Management';
        $data['cover'] = $this->home_cover_model->get_cover();
        $data['stats'] = $this->home_cover_model->get_cover_stats();
        
        $this->load->view('admin/home_cover/index', $data);
    }
    
    /**
     * Clear flash messages
     */
    public function clear_messages() {
        $this->session->unset_userdata('error');
        $this->session->unset_userdata('success');
        redirect('admin/home_cover');
    }
    
    /**
     * Update home cover settings
     */
    public function update() {
        if ($this->input->method() !== 'post') {
            show_404();
        }
        
        // Clear any existing flash messages
        $this->session->unset_userdata('error');
        $this->session->unset_userdata('success');
        
        // Set validation rules
        $this->form_validation->set_rules('animated_text_1', 'Animated Text 1', 'required|max_length[100]');
        $this->form_validation->set_rules('animated_text_2', 'Animated Text 2', 'required|max_length[100]');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/home_cover');
        }
        
        // Prepare data
        $data = array(
            'animated_text_1' => $this->input->post('animated_text_1'),
            'animated_text_2' => $this->input->post('animated_text_2'),
            'is_active' => $this->input->post('is_active') ? 1 : 0,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        // Handle image upload
        $has_file_upload = isset($_FILES['cover_image']) && 
                          !empty($_FILES['cover_image']['name']) && 
                          $_FILES['cover_image']['error'] !== UPLOAD_ERR_NO_FILE;
        
        // Debug logging
        log_message('debug', 'File upload check - Has file: ' . ($has_file_upload ? 'Yes' : 'No'));
        if (isset($_FILES['cover_image'])) {
            log_message('debug', 'File info: ' . print_r($_FILES['cover_image'], true));
        }
        
        if ($has_file_upload) {
            
            // Check if file was actually uploaded
            if ($_FILES['cover_image']['error'] !== UPLOAD_ERR_OK) {
                $upload_errors = array(
                    UPLOAD_ERR_INI_SIZE => 'File is too large (server limit)',
                    UPLOAD_ERR_FORM_SIZE => 'File is too large (form limit)',
                    UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
                    UPLOAD_ERR_NO_FILE => 'No file was uploaded',
                    UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
                    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                    UPLOAD_ERR_EXTENSION => 'File upload stopped by extension'
                );
                $error_msg = isset($upload_errors[$_FILES['cover_image']['error']]) ? 
                    $upload_errors[$_FILES['cover_image']['error']] : 'Unknown upload error';
                $this->session->set_flashdata('error', 'Upload failed: ' . $error_msg);
                redirect('admin/home_cover');
            }
            
            $upload_result = $this->home_cover_model->upload_cover_image('cover_image');
            
            if ($upload_result) {
                // Delete old image
                $current_cover = $this->home_cover_model->get_cover();
                if ($current_cover && $current_cover->cover_image !== 'banner.jpg') {
                    $this->home_cover_model->delete_old_image($current_cover->cover_image);
                }
                
                $data['cover_image'] = $upload_result;
            } else {
                // Get more specific error message
                $upload_errors = $this->home_cover_model->get_upload_errors();
                $error_message = 'Failed to upload image. ';
                if (!empty($upload_errors)) {
                    $error_message .= implode(' ', $upload_errors);
                } else {
                    $error_message .= 'Please check file type (JPG, PNG, GIF, WebP) and size (max 2MB).';
                }
                $this->session->set_flashdata('error', $error_message);
                redirect('admin/home_cover');
            }
        }
        
        // Validate data
        $errors = $this->home_cover_model->validate_cover_data($data);
        if (!empty($errors)) {
            $this->session->set_flashdata('error', implode('<br>', $errors));
            redirect('admin/home_cover');
        }
        
        // Update cover
        $result = $this->home_cover_model->update_cover($data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Home cover settings updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update home cover settings.');
        }
        
        redirect('admin/home_cover');
    }
    
    /**
     * Toggle cover status
     */
    public function toggle_status() {
        if ($this->input->method() !== 'post') {
            show_404();
        }
        
        $current_cover = $this->home_cover_model->get_cover();
        $new_status = $current_cover && $current_cover->is_active ? 0 : 1;
        
        $result = $this->home_cover_model->update_cover(array(
            'is_active' => $new_status,
            'updated_at' => date('Y-m-d H:i:s')
        ));
        
        if ($result) {
            $status_text = $new_status ? 'activated' : 'deactivated';
            $this->session->set_flashdata('success', "Home cover has been {$status_text} successfully!");
        } else {
            $this->session->set_flashdata('error', 'Failed to update cover status.');
        }
        
        redirect('admin/home_cover');
    }
    
    /**
     * Reset to default
     */
    public function reset_default() {
        if ($this->input->method() !== 'post') {
            show_404();
        }
        
        $data = array(
            'cover_image' => 'banner.jpg',
            'animated_text_1' => 'Find Your Perfect Companion',
            'animated_text_2' => 'Connect with Trusted Breeders',
            'is_active' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        );
        
        // Delete current custom image if exists
        $current_cover = $this->home_cover_model->get_cover();
        if ($current_cover && $current_cover->cover_image !== 'banner.jpg') {
            $this->home_cover_model->delete_old_image($current_cover->cover_image);
        }
        
        $result = $this->home_cover_model->update_cover($data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Home cover has been reset to default settings!');
        } else {
            $this->session->set_flashdata('error', 'Failed to reset home cover settings.');
        }
        
        redirect('admin/home_cover');
    }
}
