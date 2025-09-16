<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home Cover Helper Functions
 * 
 * These functions provide easy access to home cover data in views
 */

if (!function_exists('get_home_cover_image')) {
    /**
     * Get home cover image path
     */
    function get_home_cover_image() {
        $CI =& get_instance();
        $CI->load->model('home_cover_model');
        return $CI->home_cover_model->get_cover_image();
    }
}

if (!function_exists('get_home_cover_text_1')) {
    /**
     * Get first animated text
     */
    function get_home_cover_text_1() {
        $CI =& get_instance();
        $CI->load->model('home_cover_model');
        return $CI->home_cover_model->get_animated_text_1();
    }
}

if (!function_exists('get_home_cover_text_2')) {
    /**
     * Get second animated text
     */
    function get_home_cover_text_2() {
        $CI =& get_instance();
        $CI->load->model('home_cover_model');
        return $CI->home_cover_model->get_animated_text_2();
    }
}

if (!function_exists('is_home_cover_active')) {
    /**
     * Check if home cover is active
     */
    function is_home_cover_active() {
        $CI =& get_instance();
        $CI->load->model('home_cover_model');
        return $CI->home_cover_model->is_active();
    }
}

if (!function_exists('get_home_cover_data')) {
    /**
     * Get all home cover data
     */
    function get_home_cover_data() {
        $CI =& get_instance();
        $CI->load->model('home_cover_model');
        return $CI->home_cover_model->get_cover();
    }
}

if (!function_exists('render_home_cover_section')) {
    /**
     * Render complete home cover section with image and animated text
     */
    function render_home_cover_section($css_class = '') {
        $CI =& get_instance();
        $CI->load->model('home_cover_model');
        
        $cover = $CI->home_cover_model->get_cover();
        
        if (!$cover || !$cover->is_active) {
            return '';
        }
        
        // Check if image is in uploads (custom) or assets (default)
        $image_path = (strpos($cover->cover_image, 'home_cover_') === 0) ? 
            base_url('uploads/' . $cover->cover_image) : 
            base_url('assets/' . $cover->cover_image);
        $text_1 = htmlspecialchars($cover->animated_text_1);
        $text_2 = htmlspecialchars($cover->animated_text_2);
        
        return '<div class="home-cover-section ' . $css_class . '" style="background-image: url(\'' . $image_path . '\'); background-size: cover; background-position: center; background-attachment: fixed;">
                    <div class="cover-overlay">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h1 class="cover-title animated-text-1">' . $text_1 . '</h1>
                                    <p class="cover-subtitle animated-text-2">' . $text_2 . '</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
    }
}

if (!function_exists('get_home_cover_background_style')) {
    /**
     * Get CSS background style for home cover
     */
    function get_home_cover_background_style() {
        $CI =& get_instance();
        $CI->load->model('home_cover_model');
        
        $cover = $CI->home_cover_model->get_cover();
        
        if (!$cover || !$cover->is_active) {
            return 'background-image: url(\'' . base_url('assets/banner.jpg') . '\');';
        }
        
        // Check if image is in uploads (custom) or assets (default)
        $image_path = (strpos($cover->cover_image, 'home_cover_') === 0) ? 
            base_url('uploads/' . $cover->cover_image) : 
            base_url('assets/' . $cover->cover_image);
        return 'background-image: url(\'' . $image_path . '\'); background-size: cover; background-position: center; background-attachment: fixed;';
    }
}

if (!function_exists('get_home_cover_meta_tags')) {
    /**
     * Get meta tags for home cover (for SEO)
     */
    function get_home_cover_meta_tags() {
        $CI =& get_instance();
        $CI->load->model('home_cover_model');
        
        $cover = $CI->home_cover_model->get_cover();
        
        if (!$cover || !$cover->is_active) {
            return '';
        }
        
        $text_1 = htmlspecialchars($cover->animated_text_1);
        $text_2 = htmlspecialchars($cover->animated_text_2);
        
        return '<meta name="description" content="' . $text_1 . ' - ' . $text_2 . '">
                <meta property="og:title" content="' . $text_1 . '">
                <meta property="og:description" content="' . $text_2 . '">
                <meta property="og:image" content="' . ((strpos($cover->cover_image, 'home_cover_') === 0) ? base_url('uploads/' . $cover->cover_image) : base_url('assets/' . $cover->cover_image)) . '">';
    }
}
