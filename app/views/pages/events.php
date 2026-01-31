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
                        <div class="event-meta">
                            <span>📍 <?= htmlspecialchars($event['location'] ?? 'Temple Mandap') ?></span>
                        </div>
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
        <?php if (!empty($upcomingEvents)): ?>
            <?php foreach ($upcomingEvents as $event): ?>
                <div class="event-card upcoming">
                    <div class="event-image" style="background-image: url('<?= htmlspecialchars($event['image_url']) ?>');">
                        <div class="event-badge"><?= $event['formatted_date'] ?></div>
                    </div>
                    <div class="event-content">
                        <h3 class="event-title"><?= htmlspecialchars($event['title']) ?></h3>
                        <div class="event-meta">
                            <span>📅 <?= $event['formatted_date'] ?></span>
                        </div>
                        <div class="event-meta">
                            <span>⏰ <?= $event['start_time'] ?></span>
                        </div>
                        <div class="event-meta">
                            <span>📍 <?= htmlspecialchars($event['location'] ?? 'Temple Mandap') ?></span>
                        </div>
                        <p class="event-desc"><?= htmlspecialchars($event['description']) ?></p>
                        <div class="event-footer">
                            <span class="event-type-icon"><?= ucfirst($event['type'] ?? 'pooja') ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="empty-state">
                <p>No upcoming events scheduled soon. Check back later!</p>
            </div>
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
