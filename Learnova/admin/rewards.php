<?php
require_once '../includes/auth.php';
require_role('admin');
require_once '../config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $n = trim($_POST['name'] ?? '');
    $d = trim($_POST['description'] ?? '');
    $p = (int) ($_POST['points_cost'] ?? 0);

    if ($n === '' || $p < 1) {
        $error = 'Isi nama reward dan biaya poin dengan benar.';
    } else {
        $q = $pdo->prepare('INSERT INTO rewards(name,description,points_cost,active) VALUES(?,?,?,1)');
        $q->execute([$n, $d, $p]);
        header('Location: rewards.php');
        exit;
    }
}

$rows = $pdo->query('SELECT * FROM rewards ORDER BY created_at DESC')->fetchAll();

$pageTitle = 'Reward';
require '../includes/header.php';
?>
<div class="section">
    <h2>Katalog reward</h2>
</div>
<?php if ($error): ?>
    <div class="alert"><?= e($error) ?></div>
<?php endif; ?>
<div class="grid two">
    <div class="card">
        <h3>Tambah reward</h3>
        <form method="post">
            <div class="field">
                <label>Nama reward</label>
                <input name="name" required>
            </div>
            <div class="field">
                <label>Deskripsi</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field">
                <label>Biaya poin</label>
                <input type="number" min="1" name="points_cost" required>
            </div>
            <button class="btn">Tambah</button>
        </form>
    </div>
    <div class="card">
        <h3>Reward tersedia</h3>
        <?php foreach ($rows as $r): ?>
            <p>
                <b><?= e($r['name']) ?></b><br>
                <span class="muted smalltext"><?= (int) $r['points_cost'] ?> poin · <?= e($r['description']) ?></span>
            </p>
        <?php endforeach; ?>
    </div>
</div>
<?php require '../includes/footer.php'; ?>