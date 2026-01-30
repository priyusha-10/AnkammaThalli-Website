-- Seed Data for About Page

START TRANSACTION;

INSERT INTO `page_sections` (`page_slug`, `section_key`, `content_text`) VALUES
('about', 'history', 'The AnkammaThalli Temple has stood as a beacon of spirituality for over a century. Founded by devout believers, the temple started as a small shrine and has grown into a magnificent complex attracting thousands of devotees. The architecture reflects the traditional Dravidian style, with intricate carvings that tell stories of ancient mythology. Over the decades, the temple has undergone several renovations, each adding to its grandeur while preserving its sanctity.'),
('about', 'mission', 'Our mission is to provide a serene and sacred environment for devotees to connect with the divine. We strive to preserve and promote the rich cultural heritage and spiritual traditions of our ancestors through daily rituals, festivals, and community service. We believe in serving humanity as a form of serving God.'),
('about', 'values', '1. **Devotion**: Unwavering faith and dedication in all our rituals.\n2. **Community**: Fostering a sense of belonging and support among all devotees.\n3. **Integrity**: Maintaining transparency and honesty in temple management.\n4. **Service**: engaging in charitable activities to help the needy.\n5. **Peace**: Creating a tranquil atmosphere for meditation and prayer.');

COMMIT;
