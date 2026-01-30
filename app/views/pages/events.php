<?php
// app/views/pages/events.php
?>
<link rel="stylesheet" href="assets/css/pages/events.css">

<div class="container events-header">
    <h1>Events & Festivals</h1>
    <p class="lead">Join us in our sacred celebrations.</p>
</div>

<div class="container">

    <!-- Ongoing Events -->
    <?php if (!empty($ongoing)): ?>
    <section class="events-section">
        <h2>Ongoing Events</h2>
        <div class="event-list">
            <?php foreach ($ongoing as $event): ?>
                <?php include __DIR__ . '/../partials/event-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- Upcoming Events -->
    <section class="events-section">
        <h2>Upcoming Events</h2>
        <?php if (!empty($upcoming)): ?>
            <div class="event-list">
                <?php foreach ($upcoming as $event): ?>
                    <?php include __DIR__ . '/../partials/event-card.php'; ?>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>No upcoming events scheduled at the moment.</p>
        <?php endif; ?>
    </section>

    <!-- Past Events (Optional) -->
    <?php if (!empty($past)): ?>
    <section class="events-section">
        <h2>Past Events</h2>
        <div class="event-list">
            <?php foreach ($past as $event): ?>
                <?php include __DIR__ . '/../partials/event-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

</div>
