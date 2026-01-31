-- Upgrade Events Table for Dynamic Logic
-- Run this to update your existing 'events' table

START TRANSACTION;

-- 1. Rename event_date to start_date and add new columns
ALTER TABLE `events` 
CHANGE COLUMN `event_date` `start_date` DATETIME NOT NULL,
ADD COLUMN `end_date` DATETIME NULL AFTER `start_date`,
ADD COLUMN `location` VARCHAR(255) DEFAULT 'Temple Mandap' AFTER `description`,
ADD COLUMN `type` ENUM('pooja','festival','homam','other') NOT NULL DEFAULT 'other' AFTER `location`,
ADD COLUMN `is_highlight` TINYINT(1) DEFAULT 0;

-- 2. Update existing data to have reasonable defaults (optional)
UPDATE `events` SET `end_date` = DATE_ADD(`start_date`, INTERVAL 2 HOUR) WHERE `end_date` IS NULL;
UPDATE `events` SET `type` = 'pooja' WHERE `title` LIKE '%Pooja%';
UPDATE `events` SET `type` = 'festival' WHERE `title` LIKE '%Celebration%' OR `title` LIKE '%Festival%';

COMMIT;
