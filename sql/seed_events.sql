-- Seed Data for Events Page

START TRANSACTION;

-- Using .jpeg as fixed
INSERT INTO `events` (`title`, `description`, `event_date`, `status`, `image_url`) VALUES
('Daily Morning Abhishekam', 'Ritual bathing of the deity to start the day with purity.', '2026-03-01 06:00:00', 'ongoing', 'assets/images/event1.jpeg'),
('Ugadi Celebrations', 'Telugu New Year celebrations with special pooja.', '2026-03-22 08:00:00', 'upcoming', 'assets/images/event2.jpeg'),
('Temple Anniversary', 'Celebrating 50 years of devotion.', '2025-12-15 10:00:00', 'past', 'assets/images/event1.jpeg');

COMMIT;
