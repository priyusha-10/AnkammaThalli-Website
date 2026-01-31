-- Seed Data for Gallery Page

START TRANSACTION;

-- Clearing old gallery data to avoid duplicates if re-run (optional, or just append)
TRUNCATE TABLE `gallery_images`; 

INSERT INTO `gallery_images` (`title`, `image_url`, `category`, `display_order`) VALUES
('Main Temple View', 'assets/images/Temple_View/gallery3.jpeg', 'Temple View', 1),
('Gopuram Detail', 'assets/images/Temple_View/gallery4.jpeg', 'Temple View', 2),

('Deity Decoration', 'assets/images/Alankaram_Shringar/gallery5.jpeg', 'Alankaram / Shringar', 3),
('Floral Decoration', 'assets/images/Alankaram_Shringar/gallery6.jpeg', 'Alankaram / Shringar', 4),

('Morning Agni', 'assets/images/Morning_Pooja_Evening_Aarti/gallery7.jpeg', 'Morning Pooja / Evening Aarti', 5),
('Aarti Flame', 'assets/images/Morning_Pooja_Evening_Aarti/gallery8.jpeg', 'Morning Pooja / Evening Aarti', 6),

('Daily Archana', 'assets/images/Daily_Rituals/gallery3.jpeg', 'Daily Rituals', 7),

('Special Pooja', 'assets/images/Special_Poojas/gallery4.jpeg', 'Special Poojas', 8),

('Milk Abhishekam', 'assets/images/Abhishekam/gallery5.jpeg', 'Abhishekam', 9),

('Maha Yagna', 'assets/images/Yagnas_Homams/gallery6.jpeg', 'Yagnas & Homams', 10),

('Bonalu Celebration', 'assets/images/Festival_Celebrations/gallery7.jpeg', 'Festival Celebrations', 11),
('Diwali Lights', 'assets/images/Festival_Celebrations/gallery8.jpeg', 'Festival Celebrations', 12),

('Palki Seva', 'assets/images/Processions/gallery3.jpeg', 'Processions', 13),

('Kalyanam Ceremony', 'assets/images/Kalyanam_Divine_Events/gallery4.jpeg', 'Kalyanam / Divine Events', 14),

('Community Service', 'assets/images/Temple_Activities/gallery5.jpeg', 'Temple Activities', 15);

COMMIT;
