-- Promotional Banner Settings Table
CREATE TABLE IF NOT EXISTS `tb_promo_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `banner_text` text NOT NULL,
  `background_color` varchar(7) NOT NULL DEFAULT '#8cc63f',
  `text_color` varchar(7) NOT NULL DEFAULT '#ffffff',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default banner
INSERT INTO `tb_promo_banner` (`id`, `is_active`, `banner_text`, `background_color`, `text_color`) VALUES
(1, 1, 'Take $100 off a training package! Limited time offer.', '#8cc63f', '#ffffff');
