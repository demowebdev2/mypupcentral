<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promo_banner_model extends CI_Model {

    private $table = 'tb_promo_banner';

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get the current promotional banner settings
     * @return object|null
     */
    public function get_banner() {
        $query = $this->db->get_where($this->table, array('id' => 1));
        return $query->row();
    }

    /**
     * Update promotional banner settings
     * @param array $data
     * @return bool
     */
    public function update_banner($data) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->db->where('id', 1);
        return $this->db->update($this->table, $data);
    }

    /**
     * Toggle banner active status
     * @return bool
     */
    public function toggle_status() {
        $banner = $this->get_banner();
        if ($banner) {
            $new_status = $banner->is_active == 1 ? 0 : 1;
            return $this->update_banner(array('is_active' => $new_status));
        }
        return false;
    }

    /**
     * Check if banner is active
     * @return bool
     */
    public function is_active() {
        $banner = $this->get_banner();
        return $banner && $banner->is_active == 1;
    }

    /**
     * Get banner text
     * @return string
     */
    public function get_banner_text() {
        $banner = $this->get_banner();
        return $banner ? $banner->banner_text : '';
    }

    /**
     * Get banner background color
     * @return string
     */
    public function get_background_color() {
        $banner = $this->get_banner();
        return $banner ? $banner->background_color : '#8cc63f';
    }

    /**
     * Get banner text color
     * @return string
     */
    public function get_text_color() {
        $banner = $this->get_banner();
        return $banner ? $banner->text_color : '#ffffff';
    }

    /**
     * Create default banner if it doesn't exist
     * @return bool
     */
    public function create_default_banner() {
        $banner = $this->get_banner();
        if (!$banner) {
            $data = array(
                'id' => 1,
                'is_active' => 1,
                'banner_text' => 'Take $100 off a training package! Limited time offer.',
                'background_color' => '#8cc63f',
                'text_color' => '#ffffff',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
            return $this->db->insert($this->table, $data);
        }
        return true;
    }

    /**
     * Validate banner data
     * @param array $data
     * @return array
     */
    public function validate_banner_data($data) {
        $errors = array();

        if (empty($data['banner_text'])) {
            $errors[] = 'Banner text is required';
        }

        if (empty($data['background_color']) || !preg_match('/^#[a-fA-F0-9]{6}$/', $data['background_color'])) {
            $errors[] = 'Valid background color is required';
        }

        if (empty($data['text_color']) || !preg_match('/^#[a-fA-F0-9]{6}$/', $data['text_color'])) {
            $errors[] = 'Valid text color is required';
        }

        if (!isset($data['is_active']) || !in_array($data['is_active'], array(0, 1))) {
            $errors[] = 'Valid status is required';
        }

        return $errors;
    }

    /**
     * Get banner statistics (for admin dashboard)
     * @return array
     */
    public function get_banner_stats() {
        $banner = $this->get_banner();
        return array(
            'is_active' => $banner ? $banner->is_active : 0,
            'last_updated' => $banner ? $banner->updated_at : null,
            'created_at' => $banner ? $banner->created_at : null
        );
    }
}
