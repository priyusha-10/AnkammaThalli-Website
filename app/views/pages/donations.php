<?php
// app/views/pages/donations.php
?>
<link rel="stylesheet" href="assets/css/pages/donations.css">

<div class="container donations-header">
    <h1>Support Our Temple</h1>
    <p class="lead">Your contributions help us maintain the sanctity and serve the community.</p>
</div>

<div class="container">
    
    <div class="offline-notice">
        <strong>Note:</strong> We currently accept donations via Bank Transfer, UPI, or in-person at the temple office only.
    </div>

    <?php if (!empty($donationMethods)): ?>
        <?php foreach ($donationMethods as $method): ?>
            <div class="donation-card">
                <h3><?= htmlspecialchars($method['title']) ?></h3>
                <p><?= htmlspecialchars($method['description']) ?></p>
                
                <?php if (!empty($method['bank_details'])): ?>
                    <div class="bank-details"><?= htmlspecialchars($method['bank_details']) ?></div>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No donation information available at the moment. Please contact the temple office.</p>
    <?php endif; ?>

    <div style="margin-top: 3rem; text-align: center;">
        <p>Have questions? <a href="index.php?page=contact">Contact Us</a></p>
    </div>
</div>
