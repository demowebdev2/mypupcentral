-- Add Business Name field to user_accounts table
-- This script adds the business_name column to store optional business names for breeders

ALTER TABLE `user_accounts` 
ADD COLUMN IF NOT EXISTS `business_name` varchar(255) DEFAULT NULL AFTER `name`;

-- Add index for better performance if needed
CREATE INDEX IF NOT EXISTS `idx_user_accounts_business_name` ON `user_accounts` (`business_name`);
