-- Home Page Cover Settings Table
CREATE TABLE IF NOT EXISTS `tb_home_cover` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover_image` varchar(255) NOT NULL DEFAULT 'banner.jpg',
  `animated_text_1` text NOT NULL,
  `animated_text_2` text NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Insert default data
INSERT INTO `tb_home_cover` (`id`, `cover_image`, `animated_text_1`, `animated_text_2`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'banner.jpg', 'Find Your Perfect Companion', 'Connect with Trusted Breeders', 1, NOW(), NOW());
