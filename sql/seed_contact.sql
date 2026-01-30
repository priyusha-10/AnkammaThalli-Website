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
VALUES ('temple_address', 'AnkammaThalli Temple Road, Near Hills, Andhra Pradesh', 'Temple Location')
ON DUPLICATE KEY UPDATE `setting_value` = 'AnkammaThalli Temple Road, Near Hills, Andhra Pradesh';

COMMIT;
