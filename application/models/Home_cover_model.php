<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_cover_model extends CI_Model {
    
    private $table = 'tb_home_cover';
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get home cover settings
     */
    public function get_cover() {
        $query = $this->db->get_where($this->table, array('is_active' => 1));
        return $query->row();
    }
    
    /**
     * Get all cover settings (for admin)
     */
    public function get_all_covers() {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    /**
     * Update home cover settings
     */
    public function update_cover($data) {
        $this->db->where('id', 1);
        return $this->db->update($this->table, $data);
    }
    
    /**
     * Get cover image path
     */
    public function get_cover_image() {
        $cover = $this->get_cover();
        return $cover ? $cover->cover_image : 'banner.jpg';
    }
    
    /**
     * Get animated text 1
     */
    public function get_animated_text_1() {
        $cover = $this->get_cover();
        return $cover ? $cover->animated_text_1 : 'Find Your Perfect Companion';
    }
    
    /**
     * Get animated text 2
     */
    public function get_animated_text_2() {
        $cover = $this->get_cover();
        return $cover ? $cover->animated_text_2 : 'Connect with Trusted Breeders';
    }
    
    /**
     * Check if cover is active
     */
    public function is_active() {
        $cover = $this->get_cover();
        return $cover ? (bool)$cover->is_active : false;
    }
    
    /**
     * Create default cover if not exists
     */
    public function create_default_cover() {
        $existing = $this->db->get_where($this->table, array('id' => 1))->row();
        
        if (!$existing) {
            $data = array(
                'cover_image' => 'banner.jpg',
                'animated_text_1' => 'Find Your Perfect Companion',
                'animated_text_2' => 'Connect with Trusted Breeders',
                'is_active' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            
            return $this->db->insert($this->table, $data);
        }
        
        return true;
    }
    
    /**
     * Validate cover data
     */
    public function validate_cover_data($data) {
        $errors = array();
        
        if (empty($data['animated_text_1'])) {
            $errors[] = 'Animated Text 1 is required';
        }
        
        if (empty($data['animated_text_2'])) {
            $errors[] = 'Animated Text 2 is required';
        }
        
        if (strlen($data['animated_text_1']) > 100) {
            $errors[] = 'Animated Text 1 must be less than 100 characters';
        }
        
        if (strlen($data['animated_text_2']) > 100) {
            $errors[] = 'Animated Text 2 must be less than 100 characters';
        }
        
        return $errors;
    }
    
    /**
     * Get cover statistics
     */
    public function get_cover_stats() {
        $stats = array();
        
        $stats['total_covers'] = $this->db->count_all($this->table);
        $stats['active_covers'] = $this->db->where('is_active', 1)->count_all_results($this->table);
        $stats['last_updated'] = $this->db->select_max('updated_at')->get($this->table)->row()->updated_at;
        
        return $stats;
    }
    
    /**
     * Upload cover image
     */
    public function upload_cover_image($file) {
        // Check if file was uploaded first
        if (!isset($_FILES[$file]) || empty($_FILES[$file]['name']) || $_FILES[$file]['error'] === UPLOAD_ERR_NO_FILE) {
            log_message('debug', 'No file to upload for: ' . $file);
            return false;
        }
        
        // Ensure upload directory exists
        $upload_path = './uploads/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0755, true);
        }
        
        // Check if directory is writable
        if (!is_writable($upload_path)) {
            log_message('error', 'Upload directory is not writable: ' . $upload_path);
            return false;
        }
        
        // Check if file was uploaded
        if ($_FILES[$file]['error'] !== UPLOAD_ERR_OK) {
            log_message('error', 'Upload error: ' . $_FILES[$file]['error']);
            return false;
        }
        
        // Get file info
        $file_info = $_FILES[$file];
        $file_size = $file_info['size'];
        $file_type = $file_info['type'];
        $file_tmp = $file_info['tmp_name'];
        $file_name = $file_info['name'];
        
        // Check file size (2MB = 2097152 bytes)
        if ($file_size > 2097152) {
            log_message('error', 'File too large: ' . $file_size . ' bytes');
            return false;
        }
        
        // Check file type
        $allowed_types = array('image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp');
        if (!in_array($file_type, $allowed_types)) {
            log_message('error', 'Invalid file type: ' . $file_type);
            return false;
        }
        
        // Generate new filename
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_filename = 'home_cover_' . time() . '.' . $file_extension;
        $destination = $upload_path . $new_filename;
        
        // Move uploaded file
        if (move_uploaded_file($file_tmp, $destination)) {
            log_message('debug', 'Upload successful: ' . $new_filename);
            return $new_filename;
        } else {
            log_message('error', 'Failed to move uploaded file to: ' . $destination);
            return false;
        }
    }
    
    /**
     * Delete old cover image
     */
    public function delete_old_image($filename) {
        if ($filename && file_exists('./uploads/' . $filename)) {
            unlink('./uploads/' . $filename);
        }
    }
    
    /**
     * Get upload errors for debugging
     */
    public function get_upload_errors() {
        $errors = array();
        
        // Check PHP upload settings
        $max_upload = ini_get('upload_max_filesize');
        $max_post = ini_get('post_max_size');
        $max_execution = ini_get('max_execution_time');
        
        $errors[] = "PHP Settings - Upload: {$max_upload}, Post: {$max_post}, Execution: {$max_execution}s";
        
        // Check directory permissions
        $upload_path = './uploads/';
        if (!is_dir($upload_path)) {
            $errors[] = "Upload directory does not exist: {$upload_path}";
        } elseif (!is_writable($upload_path)) {
            $errors[] = "Upload directory is not writable: {$upload_path}";
        }
        
        return $errors;
    }
}
