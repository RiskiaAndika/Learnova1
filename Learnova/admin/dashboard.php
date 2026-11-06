<?php
require_once '../includes/auth.php';
require_role('admin');
require_once '../config/database.php';

$u = (int) $pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
$c = (int) $pdo->query('SELECT COUNT(*) FROM classes')->fetchColumn();
$r = (int) $pdo->query('SELECT COUNT(*) FROM rewards')->fetchColumn();

$pageTitle = 'Admin';
require '../includes/header.php';
?>
<section class="hero">
    <div>
        <div class="eyebrow">ADMINISTRATOR</div>
        <h1>Kelola ekosistem Learnova.</h1>
        <p>Pantau pengguna, kelas, dan katalog reward platform.</p>
    </div>
    <div class="art">⚙️</div>
</section>
<div class="section">
    <h2>Ringkasan platform</h2>
</div>
<div class="grid">
    <div class="card">
        <div class="ico">👥</div>
        <div class="muted smalltext">Pengguna</div>
        <div class="stat"><?= $u ?></div>
    </div>
    <div class="card">
        <div class="ico">📚</div>
        <div class="muted smalltext">Kelas</div>
        <div class="stat"><?= $c ?></div>
    </div>
    <div class="card">
        <div class="ico">🎁</div>
        <div class="muted smalltext">Reward</div>
        <div class="stat"><?= $r ?></div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>