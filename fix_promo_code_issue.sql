-- Fix for Promo Code "Expired" Issue
-- This will add the missing fields to the existing promocode table

-- Add new fields to existing promocode table
ALTER TABLE `promocode` 
ADD COLUMN IF NOT EXISTS `application_type` enum('training','ad','both') NOT NULL DEFAULT 'both' AFTER `application`,
ADD COLUMN IF NOT EXISTS `one_time_per_user` tinyint(1) NOT NULL DEFAULT '0' AFTER `usage_times`,
ADD COLUMN IF NOT EXISTS `is_active` tinyint(1) NOT NULL DEFAULT '1' AFTER `one_time_per_user`,
ADD COLUMN IF NOT EXISTS `description` text AFTER `is_active`;

-- Update existing promo codes to have default values
UPDATE `promocode` SET 
    `application_type` = 'both',
    `is_active` = 1,
    `one_time_per_user` = 0
WHERE `application_type` IS NULL OR `application_type` = '';

-- Create the usage tracking table
CREATE TABLE IF NOT EXISTS `tb_promo_code_usage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_code_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `used_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_id` varchar(100) DEFAULT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `application_type` enum('training','ad') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `promo_code_id` (`promo_code_id`),
  KEY `user_id` (`user_id`),
  KEY `application_type` (`application_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
