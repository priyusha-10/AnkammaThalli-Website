-- Seed Data for Donations Page
-- Updated to reflect Offline Only policy

START TRANSACTION;

-- First, clear existing headers if re-running (optional in prod, but good for dev)
TRUNCATE TABLE `donations`;

INSERT INTO `donations` (`title`, `description`, `bank_details`, `is_active`) VALUES
('Offline Donations', 'We currently strictly accept donations offline.', 
'You can donate in person during the **Annadanam Event**.', 1);

COMMIT;
