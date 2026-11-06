<?php
require_once '../includes/auth.php';
require_role('penyelenggara');
require_once '../config/database.php';

$q = $pdo->prepare('SELECT COUNT(*) FROM classes WHERE organizer_id=?');
$q->execute([$_SESSION['user']['id']]);
$count = (int) $q->fetchColumn();

$pageTitle = 'Dashboard Penyelenggara';
require '../includes/header.php';
?>
<section class="hero">
  <div>
    <div class="eyebrow">DASHBOARD PENYELENGGARA</div>
    <h1>Kelola kelasmu di Learnova.</h1>
    <p>Buat kelas, atur jadwal, dan siapkan kuis untuk peserta.</p>
    <p><a class="btn light" href="buat-kelas.php">＋ Buat kelas</a></p>
  </div>
  <div class="art">🧑‍🏫</div>
</section>
<div class="section">
  <h2>Ringkasan</h2>
</div>
<div class="grid">
  <div class="card">
    <div class="ico">📚</div>
    <div class="muted smalltext">Kelas dibuat</div>
    <div class="stat"><?= $count ?></div>
  </div>
  <a class="card menu" href="kelas.php">
    <div class="ico">🗂️</div>
    <h3>Kelola kelas</h3>
    <p>Lihat kelas yang kamu buat.</p>
  </a>
  <a class="card menu" href="jadwal.php">
    <div class="ico">🗓️</div>
    <h3>Jadwal</h3>
    <p>Kelola jadwal kelas.</p>
  </a>
</div>
<?php require '../includes/footer.php'; ?>
