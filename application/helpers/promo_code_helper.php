<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Promo Code Helper Functions
 * 
 * These functions provide easy access to promo code validation and management
 */

if (!function_exists('validate_promo_code')) {
    /**
     * Validate a promo code for a specific user and application type
     */
    function validate_promo_code($promo_code, $user_id, $application_type = 'training') {
        $CI =& get_instance();
        $CI->load->model('common_model');
        
        // Get promo code details
        $promo = $CI->db->get_where('promocode', array(
            'promo_code' => strtoupper($promo_code)
        ))->row();
        
        if (!$promo) {
            return array('valid' => false, 'message' => 'Invalid promo code');
        }
        
        // Check if promo code is active (if field exists)
        if (isset($promo->is_active) && $promo->is_active != 1) {
            return array('valid' => false, 'message' => 'This promo code is currently inactive');
        }
        
        // Check if promo code is for the correct application type (if field exists)
        if (isset($promo->application_type) && $promo->application_type !== 'both' && $promo->application_type !== $application_type) {
            return array('valid' => false, 'message' => 'This promo code is not valid for ' . $application_type . ' services');
        }
        
        // Check date validity
        $current_date = date('Y-m-d');
        
        // Convert dates to Y-m-d format for comparison
        $valid_from = date('Y-m-d', strtotime($promo->valid_from));
        $valid_till = date('Y-m-d', strtotime($promo->valid_till));
        
        if ($valid_from > $current_date) {
            return array('valid' => false, 'message' => 'This promo code is not yet active');
        }
        
        if ($valid_till < $current_date) {
            return array('valid' => false, 'message' => 'This promo code has expired');
        }
        
        // Check usage limits
        if ($promo->limit_type == 0) { // Limited usage
            $used_count = $CI->db->where('promo_code_id', $promo->id)->count_all_results('tb_promo_code_usage');
            if ($used_count >= $promo->usage_times) {
                return array('valid' => false, 'message' => 'This promo code has reached its usage limit');
            }
        }
        
        // Check one-time per user restriction (if field exists)
        if (isset($promo->one_time_per_user) && $promo->one_time_per_user == 1) {
            $user_used = $CI->db->where(array(
                'promo_code_id' => $promo->id,
                'user_id' => $user_id
            ))->count_all_results('tb_promo_code_usage');
            
            if ($user_used > 0) {
                return array('valid' => false, 'message' => 'You have already used this promo code');
            }
        }
        
        return array(
            'valid' => true, 
            'promo' => $promo,
            'message' => 'Valid promo code'
        );
    }
}

if (!function_exists('calculate_discount')) {
    /**
     * Calculate discount amount for a promo code
     */
    function calculate_discount($promo_code, $total_amount) {
        $CI =& get_instance();
        
        $promo = $CI->db->get_where('promocode', array(
            'promo_code' => strtoupper($promo_code),
            'is_active' => 1
        ))->row();
        
        if (!$promo) {
            return 0;
        }
        
        $discount = 0;
        
        if ($promo->discount_type == 0) { // Fixed amount
            $discount = $promo->amount;
        } else { // Percentage
            $discount = ($total_amount * $promo->percentage) / 100;
        }
        
        // Apply maximum discount limit
        if ($promo->amount_limit > 0 && $discount > $promo->amount_limit) {
            $discount = $promo->amount_limit;
        }
        
        // Don't exceed total amount
        if ($discount > $total_amount) {
            $discount = $total_amount;
        }
        
        return round($discount, 2);
    }
}

if (!function_exists('record_promo_usage')) {
    /**
     * Record promo code usage for a user
     */
    function record_promo_usage($promo_code, $user_id, $order_id, $discount_amount, $application_type) {
        $CI =& get_instance();
        
        $promo = $CI->db->get_where('promocode', array(
            'promo_code' => strtoupper($promo_code),
            'is_active' => 1
        ))->row();
        
        if (!$promo) {
            return false;
        }
        
        $usage_data = array(
            'promo_code_id' => $promo->id,
            'user_id' => $user_id,
            'order_id' => $order_id,
            'discount_amount' => $discount_amount,
            'application_type' => $application_type,
            'used_at' => date('Y-m-d H:i:s')
        );
        
        return $CI->db->insert('tb_promo_code_usage', $usage_data);
    }
}

if (!function_exists('get_promo_code_stats')) {
    /**
     * Get statistics for a promo code
     */
    function get_promo_code_stats($promo_code_id) {
        $CI =& get_instance();
        
        $stats = array();
        
        // Total usage count
        $stats['total_uses'] = $CI->db->where('promo_code_id', $promo_code_id)
                                     ->count_all_results('tb_promo_code_usage');
        
        // Total discount given
        $result = $CI->db->select_sum('discount_amount')
                        ->where('promo_code_id', $promo_code_id)
                        ->get('tb_promo_code_usage')
                        ->row();
        $stats['total_discount'] = $result->discount_amount ? $result->discount_amount : 0;
        
        // Usage by application type
        $training_uses = $CI->db->where(array(
            'promo_code_id' => $promo_code_id,
            'application_type' => 'training'
        ))->count_all_results('tb_promo_code_usage');
        
        $ad_uses = $CI->db->where(array(
            'promo_code_id' => $promo_code_id,
            'application_type' => 'ad'
        ))->count_all_results('tb_promo_code_usage');
        
        $stats['training_uses'] = $training_uses;
        $stats['ad_uses'] = $ad_uses;
        
        return $stats;
    }
}

if (!function_exists('get_user_promo_history')) {
    /**
     * Get promo code usage history for a user
     */
    function get_user_promo_history($user_id, $limit = 10) {
        $CI =& get_instance();
        
        $CI->db->select('pc.promo_code, pcu.discount_amount, pcu.used_at, pcu.application_type, pcu.order_id');
        $CI->db->from('tb_promo_code_usage pcu');
        $CI->db->join('promocode pc', 'pc.id = pcu.promo_code_id');
        $CI->db->where('pcu.user_id', $user_id);
        $CI->db->order_by('pcu.used_at', 'DESC');
        $CI->db->limit($limit);
        
        return $CI->db->get()->result();
    }
}

if (!function_exists('format_promo_code_display')) {
    /**
     * Format promo code for display
     */
    function format_promo_code_display($promo) {
        $display = array();
        
        // Basic info
        $display['code'] = strtoupper($promo->promo_code);
        $display['description'] = $promo->description ? $promo->description : 'No description';
        
        // Discount info
        if ($promo->discount_type == 0) {
            $display['discount'] = '$' . number_format($promo->amount, 2);
        } else {
            $display['discount'] = $promo->percentage . '%';
        }
        
        // Application type
        switch ($promo->application_type) {
            case 'training':
                $display['applies_to'] = 'Training Services';
                break;
            case 'ad':
                $display['applies_to'] = 'Ad Posting';
                break;
            case 'both':
                $display['applies_to'] = 'All Services';
                break;
        }
        
        // Usage info
        if ($promo->one_time_per_user == 1) {
            $display['usage'] = 'One-time use per user';
        } else {
            $display['usage'] = 'Multiple uses allowed';
        }
        
        // Validity
        $display['valid_from'] = date('M j, Y', strtotime($promo->valid_from));
        $display['valid_till'] = date('M j, Y', strtotime($promo->valid_till));
        
        // Status
        $display['status'] = $promo->is_active ? 'Active' : 'Inactive';
        
        return $display;
    }
}
