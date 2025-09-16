-- Enhanced Promo Code System
-- This file contains enhancements to the existing promo code system

-- 1. Create table for tracking per-user promo code usage
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

-- 2. Add new fields to existing promocode table (if they don't exist)
-- Note: These are safe to run multiple times
ALTER TABLE `promocode` 
ADD COLUMN IF NOT EXISTS `application_type` enum('training','ad','both') NOT NULL DEFAULT 'training' AFTER `application`,
ADD COLUMN IF NOT EXISTS `one_time_per_user` tinyint(1) NOT NULL DEFAULT '0' AFTER `usage_times`,
ADD COLUMN IF NOT EXISTS `is_active` tinyint(1) NOT NULL DEFAULT '1' AFTER `one_time_per_user`,
ADD COLUMN IF NOT EXISTS `description` text AFTER `is_active`;

-- 3. Create indexes for better performance
CREATE INDEX IF NOT EXISTS `idx_promocode_application_type` ON `promocode` (`application_type`);
CREATE INDEX IF NOT EXISTS `idx_promocode_active` ON `promocode` (`is_active`);
CREATE INDEX IF NOT EXISTS `idx_promocode_dates` ON `promocode` (`valid_from`, `valid_till`);

-- 4. Insert sample promo codes for testing
INSERT IGNORE INTO `promocode` (
  `promo_code`, 
  `premium_type_id`, 
  `limit_type`, 
  `valid_from`, 
  `valid_till`, 
  `discount_type`, 
  `amount`, 
  `percentage`, 
  `amount_limit`, 
  `usage_times`, 
  `application`, 
  `application_type`, 
  `one_time_per_user`, 
  `is_active`, 
  `description`,
  `created_at`
) VALUES 
(
  'TRAINING10', 
  1, 
  0, 
  CURDATE(), 
  DATE_ADD(CURDATE(), INTERVAL 30 DAY), 
  1, 
  NULL, 
  10, 
  50.00, 
  100, 
  'pv', 
  'training', 
  1, 
  1, 
  '10% off training packages, max $50 discount, one-time use per user',
  NOW()
),
(
  'AD50OFF', 
  0, 
  0, 
  CURDATE(), 
  DATE_ADD(CURDATE(), INTERVAL 60 DAY), 
  0, 
  50.00, 
  NULL, 
  50.00, 
  200, 
  'pv', 
  'ad', 
  0, 
  1, 
  '$50 off ad posting, unlimited uses per user',
  NOW()
),
(
  'WELCOME20', 
  0, 
  0, 
  CURDATE(), 
  DATE_ADD(CURDATE(), INTERVAL 90 DAY), 
  1, 
  NULL, 
  20, 
  100.00, 
  50, 
  'pv', 
  'both', 
  1, 
  1, 
  '20% off any service, max $100 discount, one-time use per user',
  NOW()
);
