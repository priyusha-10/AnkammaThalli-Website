<?php
// app/views/pages/contact.php
?>
<link rel="stylesheet" href="assets/css/pages/contact.css">

<div class="container contact-header">
    <h1>Contact Us</h1>
    <p class="lead">We are here to help. Reach out to the temple committee.</p>
</div>

<div class="container">
    <div class="contact-wrapper">
        <!-- Contact Info -->
        <div class="contact-info-card">
            <h3>Temple Information</h3>
            
            <div class="info-item">
                <strong>Address:</strong>
                <p><?= htmlspecialchars($settings['temple_address'] ?? 'Address not available') ?></p>
            </div>
            
            <div class="info-item">
                <strong>Phone:</strong>
                <p><a href="tel:<?= htmlspecialchars($settings['contact_phone'] ?? '') ?>"><?= htmlspecialchars($settings['contact_phone'] ?? 'Not available') ?></a></p>
            </div>
            
            <div class="info-item">
                <strong>Email:</strong>
                <p><a href="mailto:<?= htmlspecialchars($settings['contact_email'] ?? '') ?>"><?= htmlspecialchars($settings['contact_email'] ?? 'Not available') ?></a></p>
            </div>
            
            <div class="info-item">
                <strong>Temple Timings:</strong>
                <p><?= htmlspecialchars($settings['temple_timings'] ?? '6:00 AM - 9:00 PM') ?></p>
            </div>

            <div class="info-item">
                <strong>Follow Us:</strong>
                <p>
                    <?php if (!empty($settings['social_facebook'])): ?>
                        <a href="<?= htmlspecialchars($settings['social_facebook']) ?>" target="_blank">Facebook</a> | 
                    <?php endif; ?>
                    <?php if (!empty($settings['social_instagram'])): ?>
                        <a href="<?= htmlspecialchars($settings['social_instagram']) ?>" target="_blank">Instagram</a>
                    <?php endif; ?>
                </p>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-card">
            <h3>Send a Message</h3>
            
            <?php if ($messageSent): ?>
                <div class="alert alert-success">
                    Thank you! Your message has been sent successfully. We will contact you shortly.
                </div>
            <?php endif; ?>

            <?php if (!empty($errorMsg)): ?>
                <div class="alert alert-error">
                    <?= htmlspecialchars($errorMsg) ?>
                </div>
            <?php endif; ?>

            <form action="index.php?page=contact" method="POST">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone Number (Optional)</label>
                    <input type="tel" id="phone" name="phone">
                </div>
                
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-container">
        <!-- Placeholder for Google Map Embed -->
        <p>Google Maps Embed will go here. (Update 'map_embed_url' in site_settings)</p>
    </div>
</div>
