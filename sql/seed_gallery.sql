-- Seed Data for Gallery Page

START TRANSACTION;

-- Clearing old gallery data to avoid duplicates if re-run (optional, or just append)
-- TRUNCATE TABLE `gallery_images`; 

INSERT INTO `gallery_images` (`title`, `image_url`, `category`, `display_order`) VALUES
('Morning Pooja', 'assets/images/gallery3.jpeg', 'rituals', 1),
('Temple Architecture', 'assets/images/gallery4.jpeg', 'architecture', 2),
('Gopuram View', 'assets/images/gallery5.jpeg', 'architecture', 3),
('Festival Crowd', 'assets/images/gallery6.jpeg', 'festival', 4),
('Evening Aarti', 'assets/images/gallery7.jpeg', 'rituals', 5),
('Garden Area', 'assets/images/gallery8.jpeg', 'landscape', 6);

COMMIT;
