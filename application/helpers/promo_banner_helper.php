<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Promotional Banner Helper
 * 
 * This helper provides easy access to promotional banner functionality
 * throughout the application.
 */

if (!function_exists('get_promo_banner')) {
    /**
     * Get promotional banner HTML
     * @return string
     */
    function get_promo_banner() {
        $CI =& get_instance();
        $CI->load->model('promo_banner_model');
        
        // Hide banner if user is logged in
        if (isset($_SESSION['siteuser']) && !empty($_SESSION['siteuser']['id'])) {
            return '';
        }
        
        if (!$CI->promo_banner_model->is_active()) {
            return '';
        }
        
        $background_color = $CI->promo_banner_model->get_background_color();
        $text_color = $CI->promo_banner_model->get_text_color();
        $banner_text = $CI->promo_banner_model->get_banner_text();
        
        return '<div class="promo-banner" style="background-color: ' . $background_color . '; color: ' . $text_color . ';">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="mb-0 py-2">' . htmlspecialchars($banner_text) . '</p>
                    </div>
                </div>
            </div>
        </div>';
    }
}

if (!function_exists('is_promo_banner_active')) {
    /**
     * Check if promotional banner is active
     * @return bool
     */
    function is_promo_banner_active() {
        $CI =& get_instance();
        $CI->load->model('promo_banner_model');
        return $CI->promo_banner_model->is_active();
    }
}

if (!function_exists('get_promo_banner_text')) {
    /**
     * Get promotional banner text
     * @return string
     */
    function get_promo_banner_text() {
        $CI =& get_instance();
        $CI->load->model('promo_banner_model');
        return $CI->promo_banner_model->get_banner_text();
    }
}
