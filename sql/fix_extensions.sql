-- Fix Script: Update image extensions from .jpg to .jpeg

START TRANSACTION;

-- Update Gallery Images
UPDATE `gallery_images` SET `image_url` = REPLACE(`image_url`, '.jpg', '.jpeg') WHERE `image_url` LIKE '%.jpg';

-- Update Events
UPDATE `events` SET `image_url` = REPLACE(`image_url`, '.jpg', '.jpeg') WHERE `image_url` LIKE '%.jpg';

-- Update Page Sections (if any images there)
UPDATE `page_sections` SET `image_url` = REPLACE(`image_url`, '.jpg', '.jpeg') WHERE `image_url` LIKE '%.jpg';

COMMIT;

-- Verify changes
SELECT id, title, image_url FROM gallery_images;
SELECT id, title, image_url FROM events;
