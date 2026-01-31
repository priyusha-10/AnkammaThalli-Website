-- Seed Data for Events Page

START TRANSACTION;

-- Using .jpeg as fixed
INSERT INTO `events` (`title`, `description`, `start_date`, `end_date`, `location`, `type`, `status`, `image_url`) VALUES
('Morning Abhishekam', 'Ritual bathing of the deity.', DATE_SUB(NOW(), INTERVAL 1 HOUR), DATE_ADD(NOW(), INTERVAL 2 HOUR), 'Main Sanctum', 'pooja', 'ongoing', 'assets/images/Morning_Pooja_Evening_Aarti/gallery7.jpeg'),
('Ugadi Celebrations', 'Telugu New Year celebrations.', DATE_ADD(NOW(), INTERVAL 5 DAY), DATE_ADD(NOW(), INTERVAL 5 DAY), 'Outdoor Mandap', 'festival', 'upcoming', 'assets/images/Festival_Celebrations/gallery7.jpeg'),
('Daily Evening Aarti', 'Sacred lamp offering.', DATE_SUB(NOW(), INTERVAL 30 MINUTE), DATE_ADD(NOW(), INTERVAL 1 HOUR), 'Main Hall', 'pooja', 'ongoing', 'assets/images/Morning_Pooja_Evening_Aarti/gallery8.jpeg'),
('Maha Yagnam', 'Sacred fire ritual.', DATE_ADD(NOW(), INTERVAL 10 DAY), DATE_ADD(NOW(), INTERVAL 11 DAY), 'Yagashala', 'homam', 'upcoming', 'assets/images/Yagnas_Homams/gallery6.jpeg');

COMMIT;
