<?php
require_once '../includes/auth.php';
require_role('peserta');
require_once '../config/database.php';

$rows = $pdo->query('SELECT * FROM rewards WHERE active=1 ORDER BY points_cost')->fetchAll();

$q = $pdo->prepare('SELECT points FROM users WHERE id=?');
$q->execute([$_SESSION['user']['id']]);
$points = (int) $q->fetchColumn();

$pageTitle = 'Penukaran';
require '../includes/header.php';
?>
<div class="section">
  <h2>Penukaran reward</h2>
  <span class="pill">Saldo: <?= $points ?> poin</span>
</div>
<?php if (!$rows): ?>
  <div class="empty">Belum ada reward tersedia.</div>
<?php else: ?>
  <div class="grid">
    <?php foreach ($rows as $r): ?>
      <div class="card">
        <div class="ico">🎁</div>
        <h3><?= e($r['name']) ?></h3>
        <p><?= e($r['description']) ?></p>
        <span class="pill"><?= (int) $r['points_cost'] ?> poin</span>
        <p class="smalltext">Transaksi penukaran akan diaktifkan pada tahap berikutnya.</p>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
<?php require '../includes/footer.php'; ?>
