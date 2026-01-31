-- Seed Data Updates for Contact Page information

START TRANSACTION;

-- Update Contact Phone as per user request
INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) 
VALUES ('contact_phone', '1234567890', 'Primary contact number') 
ON DUPLICATE KEY UPDATE `setting_value` = '1234567890';

-- Ensure other settings exist or update them if they do
INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) 
VALUES ('contact_email', 'info@ankammathallitemple.org', 'Contact email')
ON DUPLICATE KEY UPDATE `setting_value` = 'info@ankammathallitemple.org';

INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) 
VALUES ('temple_address', 'Main Rd, Takkellapadu, Pedakakani, Andhra Pradesh 522509, India', 'Temple Location')
ON DUPLICATE KEY UPDATE `setting_value` = 'Main Rd, Takkellapadu, Pedakakani, Andhra Pradesh 522509, India';

INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) 
VALUES ('temple_timings', 'All days: 6:00 AM - 12:00 PM, 5:00 PM - 9:00 PM', 'Opening Hours')
ON DUPLICATE KEY UPDATE `setting_value` = 'All days: 6:00 AM - 12:00 PM, 5:00 PM - 9:00 PM';

INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) 
VALUES ('social_facebook', 'https://www.facebook.com/ankammathalli/', 'Facebook Link')
ON DUPLICATE KEY UPDATE `setting_value` = 'https://www.facebook.com/ankammathalli/';

INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) 
VALUES ('map_link', 'https://maps.app.goo.gl/rxExDZKMftL67MkS8', 'Google Maps Link')
ON DUPLICATE KEY UPDATE `setting_value` = 'https://maps.app.goo.gl/rxExDZKMftL67MkS8';

INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) 
VALUES ('social_whatsapp', '#', 'WhatsApp Link')
ON DUPLICATE KEY UPDATE `setting_value` = '#';

COMMIT;
