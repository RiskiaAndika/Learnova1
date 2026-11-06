<?php
require_once '../includes/auth.php';
require_role('peserta');
require_once '../config/database.php';

$rows = $pdo->query("SELECT c.*, u.name organizer FROM classes c JOIN users u ON u.id=c.organizer_id WHERE c.status='published' ORDER BY c.created_at DESC")->fetchAll();

$pageTitle = 'Academy';
require '../includes/header.php';
?>
<div class="section">
  <h2>Academy</h2>
  <span class="muted">Kelas yang tersedia</span>
</div>
<?php if (!$rows): ?>
  <div class="empty">Belum ada kelas yang dipublikasikan.</div>
<?php else: ?>
  <div class="grid">
    <?php foreach ($rows as $r): ?>
      <div class="card">
        <span class="pill"><?= e($r['category']) ?></span>
        <h3><?= e($r['title']) ?></h3>
        <p><?= e($r['description']) ?></p>
        <p class="smalltext">Penyelenggara: <?= e($r['organizer']) ?></p>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<?php require '../includes/footer.php'; ?>
