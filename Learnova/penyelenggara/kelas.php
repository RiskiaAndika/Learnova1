<?php
require_once '../includes/auth.php';
require_role('penyelenggara');
require_once '../config/database.php';

$q = $pdo->prepare('SELECT * FROM classes WHERE organizer_id=? ORDER BY created_at DESC');
$q->execute([$_SESSION['user']['id']]);
$rows = $q->fetchAll();

$pageTitle = 'Kelas Saya';
require '../includes/header.php';
?>
<div class="section">
  <h2>Kelas saya</h2>
  <a class="btn" href="buat-kelas.php">＋ Buat kelas</a>
</div>
<?php if (!$rows): ?>
  <div class="empty">Kamu belum membuat kelas.</div>
<?php else: ?>
  <div class="grid">
    <?php foreach ($rows as $r): ?>
      <div class="card">
        <span class="pill"><?= e($r['status']) ?></span>
        <h3><?= e($r['title']) ?></h3>
        <p><?= e($r['description']) ?></p>
        <p class="smalltext"><?= e($r['category']) ?></p>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<?php require '../includes/footer.php'; ?>
