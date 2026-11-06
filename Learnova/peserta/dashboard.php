<?php
require_once '../includes/auth.php';
require_role('peserta');
require_once '../config/database.php';

$q = $pdo->prepare('SELECT points FROM users WHERE id=?');
$q->execute([$_SESSION['user']['id']]);
$points = (int) $q->fetchColumn();

$pageTitle = 'Dashboard Peserta';
require '../includes/header.php';
?>
<section class="hero">
  <div>
    <div class="eyebrow">DASHBOARD PESERTA</div>
    <h1>Terus berkembang bersama Learnova.</h1>
    <p>Ikuti kelas, selesaikan kuis, kumpulkan poin, dan raih reward dari proses belajarmu.</p>
  </div>
  <div class="art">📚</div>
</section>
<div class="section">
  <h2>Ringkasan aktivitas</h2>
  <span class="muted smalltext">Hai, <?= e($_SESSION['user']['name']) ?>!</span>
</div>
<div class="grid">
  <div class="card">
    <div class="ico">⭐</div>
    <div class="muted smalltext">Total poin</div>
    <div class="stat"><?= number_format($points) ?></div>
    <span class="pill">Poin Learnova</span>
  </div>
  <div class="card">
    <div class="ico">🏆</div>
    <div class="muted smalltext">Tier bulanan</div>
    <div class="stat">—</div>
    <p>Tier dihitung berdasarkan peringkat bulanan.</p>
  </div>
  <div class="card">
    <div class="ico">🎟️</div>
    <div class="muted smalltext">Reward</div>
    <div class="stat">Katalog</div>
    <p>Tukar poin dengan voucher dari Learnova.</p>
  </div>
</div>
<div class="section">
  <h2>Menu belajar</h2>
</div>
<div class="grid">
  <?php foreach ([['🎓', 'Academy', 'Temukan kelas tersedia.', 'academy.php'], ['🗓️', 'Jadwal', 'Lihat agenda pembelajaran.', 'jadwal.php'], ['🧠', 'Quiz', 'Uji pemahamanmu.', 'quiz.php'], ['🏅', 'Leaderboard', 'Pantau peringkat peserta.', 'leaderboard.php'], ['🎁', 'Penukaran', 'Tukar poin dengan reward.', 'penukaran.php']] as $m): ?>
    <a class="card menu" href="<?= $m[3] ?>">
      <div class="ico"><?= $m[0] ?></div>
      <h3><?= $m[1] ?></h3>
      <p><?= $m[2] ?></p>
      <span class="arrow">Buka menu →</span>
    </a>
  <?php endforeach; ?>
</div>
<?php require '../includes/footer.php'; ?>
