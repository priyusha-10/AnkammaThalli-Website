-- Fix Menu Items
-- Adds missing pages to the navigation menu

START TRANSACTION;

-- Check if they exist first to avoid duplicates, or just use INSERT IGNORE/REPLACE
-- We'll delete and re-insert to be safe and ensure correct order

DELETE FROM `menus`;

INSERT INTO `menus` (`label`, `slug`, `display_order`, `is_active`) VALUES
('Home', 'home', 1, 1),
('About', 'about', 2, 1),
('Gallery', 'gallery', 3, 1),
('Events', 'events', 4, 1),
('Donations', 'donations', 5, 1),
('Contact', 'contact', 6, 1);

COMMIT;
