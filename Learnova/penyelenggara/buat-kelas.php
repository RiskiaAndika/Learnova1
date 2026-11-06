<?php
require_once '../includes/auth.php';
require_role('penyelenggara');
require_once '../config/database.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $cat = trim($_POST['category'] ?? '');
    $desc = trim($_POST['description'] ?? '');

    if ($title === '' || $cat === '') {
        $error = 'Judul dan kategori wajib diisi.';
    } else {
        $q = $pdo->prepare('INSERT INTO classes(organizer_id,title,category,description,status) VALUES(?,?,?,?,?)');
        $q->execute([$_SESSION['user']['id'], $title, $cat, $desc, 'draft']);
        header('Location: kelas.php');
        exit;
    }
}

$pageTitle = 'Buat Kelas';
require '../includes/header.php';
?>
<div class="formbox">
    <div class="form">
        <h1>Buat kelas</h1>
        <p>Tambahkan informasi kelas yang akan diselenggarakan.</p>

        <?php if ($error): ?>
            <div class="alert"><?= e($error) ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="field">
                <label>Nama kelas</label>
                <input name="title" required>
            </div>
            <div class="field">
                <label>Kategori</label>
                <input name="category" required placeholder="Contoh: Matematika">
            </div>
            <div class="field">
                <label>Deskripsi</label>
                <textarea name="description" rows="4"></textarea>
            </div>
            <button class="btn">Simpan draft</button>
        </form>
    </div>
</div>
<?php require '../includes/footer.php'; ?>