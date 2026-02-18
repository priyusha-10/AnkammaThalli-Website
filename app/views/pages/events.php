<?php
// app/views/pages/events.php
?>
<link rel="stylesheet" href="assets/css/pages/events.css?v=<?= time() ?>">

<div class="container events-header">
    <h1>Temple Events</h1>
    <p class="lead">Join us in our daily rituals and upcoming celebrations.</p>
</div>

<div class="container">
    <!-- Tabs -->
    <div class="events-tabs">
        <button class="tab-btn active" onclick="switchTab('ongoing')">Ongoing Events</button>
        <button class="tab-btn" onclick="switchTab('upcoming')">Upcoming Events</button>
    </div>

    <!-- Ongoing Events Grid -->
    <div id="ongoing-grid" class="events-grid active-grid">
        <?php if (!empty($ongoingEvents)): ?>
            <?php foreach ($ongoingEvents as $event): ?>
                <div class="event-card ongoing">
                    <div class="event-image" style="background-image: url('<?= htmlspecialchars($event['image_url']) ?>');">
                        <div class="event-badge">Happening Now</div>
                    </div>
                    <div class="event-content">
                        <h3 class="event-title"><?= htmlspecialchars($event['title']) ?></h3>
                        <div class="event-meta">
                            <span>📅 <?= $event['formatted_date'] ?></span>
                        </div>
                        <div class="event-meta">
                            <span>⏰ <?= $event['start_time'] ?> - <?= $event['end_time'] ?? 'Onwards' ?></span>
                        </div>
                        <!-- Removed Location -->
                        <p class="event-desc"><?= htmlspecialchars($event['description']) ?></p>
                        <div class="event-footer">
                            <span class="event-type-icon"><?= ucfirst($event['type'] ?? 'pooja') ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <p>No ongoing events right now. The temple is open for Darshan.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Upcoming Events Grid -->
    <div id="upcoming-grid" class="events-grid">
        
        <!-- Future Events -->
        <?php if (!empty($futureEvents)): ?>
            <?php foreach ($futureEvents as $event): ?>
                <div class="event-card upcoming">
                    <div class="event-image" style="background-image: url('<?= htmlspecialchars($event['image_url']) ?>');">
                        <div class="event-badge">
                            <?= $event['formatted_date'] ?> | <?= $event['start_time'] ?>
                        </div>
                    </div>
                    <div class="event-content">
                        <h3 class="event-title"><?= htmlspecialchars($event['title']) ?></h3>
                        <!-- Date & Time moved to Badge -->
                        <!-- Removed Location -->
                        <p class="event-desc"><?= htmlspecialchars($event['description']) ?></p>
                        <div class="event-footer">
                            <span class="event-type-icon"><?= ucfirst($event['type'] ?? 'pooja') ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <p>No upcoming events scheduled soon.</p>
            </div>
        <?php endif; ?>

        <!-- Past Events Section -->
        <?php if (!empty($pastEvents)): ?>
            <div class="w-100" style="grid-column: 1 / -1; margin-top: 3rem; margin-bottom: 1rem; border-bottom: 1px solid #ddd; padding-bottom: 0.5rem;">
                <h2 style="font-family: var(--font-heading); color: var(--color-text-light);">Past Events (<?php echo date('Y'); ?>)</h2>
            </div>

            <?php foreach ($pastEvents as $event): ?>
                <!-- Past Event Card (Slightly Faded) -->
                <div class="event-card past" style="opacity: 0.8; filter: grayscale(0.3);">
                    <div class="event-image" style="background-image: url('<?= htmlspecialchars($event['image_url']) ?>');">
                        <div class="event-badge">
                            <?= $event['formatted_date'] ?> | Completed
                        </div>
                    </div>
                    <div class="event-content">
                        <h3 class="event-title"><?= htmlspecialchars($event['title']) ?></h3>
                        <!-- Removed Duplicate Date -->
                        <!-- Removed Location -->
                        <p class="event-desc" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= htmlspecialchars($event['description']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>
</div>

<script>
function switchTab(tabName) {
    // 1. Reset Buttons
    document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
    // 2. Hide Grids
    document.querySelectorAll('.events-grid').forEach(grid => grid.classList.remove('active-grid'));

    // 3. Activate Target
    if (tabName === 'ongoing') {
        document.querySelector('.tab-btn:nth-child(1)').classList.add('active');
        document.getElementById('ongoing-grid').classList.add('active-grid');
    } else {
        document.querySelector('.tab-btn:nth-child(2)').classList.add('active');
        document.getElementById('upcoming-grid').classList.add('active-grid');
    }
}
</script>
