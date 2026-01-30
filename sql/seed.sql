-- Seed Data for AnkammaThalli Temple Website

START TRANSACTION;

-- Insert Default Menus
INSERT INTO `menus` (`label`, `slug`, `display_order`, `is_active`) VALUES
('Home', 'home', 1, 1),
('About', 'about', 2, 1),
('Gallery', 'gallery', 3, 1),
('Events', 'events', 4, 1),
('Donations', 'donations', 5, 1),
('Contact', 'contact', 6, 1);

-- Insert Default Events
INSERT INTO `events` (`title`, `description`, `event_date`, `status`, `image_url`) VALUES
('Maha Shivaratri', 'Annual grand celebration.', '2026-02-16 18:00:00', 'upcoming', 'assets/images/event1.jpeg'),
('Navaratri Start', 'Nine days of devotion.', '2026-10-10 09:00:00', 'upcoming', 'assets/images/event2.jpeg');

-- Insert Default Gallery Images
INSERT INTO `gallery_images` (`title`, `image_url`) VALUES
('Temple View', 'assets/images/gallery1.jpeg'),
('Deity Decoration', 'assets/images/gallery2.jpeg');

-- Insert Default Site Settings
INSERT INTO `site_settings` (`setting_key`, `setting_value`, `description`) VALUES
('temple_name', 'AnkammaThalli Temple', 'Name of the temple'),
('temple_address', '123 Temple Street, Devotional City, State, ZIP', 'Full address'),
('contact_email', 'info@ankammathalli.org', 'Contact email'),
('contact_phone', '+91 98765 43210', 'Primary contact number'),
('temple_timings', '6:00 AM - 12:00 PM, 5:00 PM - 9:00 PM', 'Daily darshan timings'),
('social_facebook', 'https://facebook.com', 'Facebook URL'),
('social_instagram', 'https://instagram.com', 'Instagram URL'),
('footer_copyright', '© 2026 AnkammaThalli Temple. All Rights Reserved.', 'Footer copyright text');

-- Insert Placeholder Page Sections for Home
INSERT INTO `page_sections` (`page_slug`, `section_key`, `content_text`) VALUES
('home', 'welcome_msg', 'Welcome to AnkammaThalli Temple. Experience peace and devotion.'),
('home', 'donate_btn_text', 'Donate Now');

COMMIT;
