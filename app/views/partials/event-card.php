<?php
// app/views/partials/event-card.php
$dateObj = new DateTime($event['event_date']);
?>
<div class="event-card">
    <div class="event-date-box">
        <span class="event-date-day"><?= $dateObj->format('d') ?></span>
        <span class="event-date-month"><?= $dateObj->format('M') ?></span>
    </div>
    
    <?php if (!empty($event['image_url'])): ?>
        <img src="<?= htmlspecialchars($event['image_url']) ?>" alt="<?= htmlspecialchars($event['title']) ?>" class="event-image">
    <?php endif; ?>

    <div class="event-details">
        <h3><?= htmlspecialchars($event['title']) ?></h3>
        <p class="event-time"><?= $dateObj->format('l, h:i A') ?></p>
        <p><?= htmlspecialchars($event['description']) ?></p>
    </div>
</div>
