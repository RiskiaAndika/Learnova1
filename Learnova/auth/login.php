<?php
session_start();
require_once '../config/database.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $q = $pdo->prepare('SELECT id, name, email, password, role FROM users WHERE email=?');
    $q->execute([trim($_POST['email'] ?? '')]);
    $u = $q->fetch();

    if ($u && password_verify($_POST['password'] ?? '', $u['password'])) {
        session_regenerate_id(true);
        unset($u['password']);
        $_SESSION['user'] = $u;
        header('Location: ../index.php');
        exit;
    } else {
        $error = 'Email atau password tidak sesuai.';
    }
}

$pageTitle = 'Masuk';
require '../includes/header.php';
?>
<div class="formbox">
  <div class="form">
    <h1>Selamat datang kembali!</h1>
    <p>Masuk untuk melanjutkan aktivitas belajarmu.</p>
    <?php if ($error): ?>
      <div class="alert"><?= e($error) ?></div>
    <?php endif; ?>
    <form method="post">
      <div class="field">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>
      <button class="btn">Masuk</button>
    </form>
    <div class="note">
      Belum punya akun? <a class="arrow" href="register.php">Daftar sekarang</a>
    </div>
  </div>
</div>
<?php require '../includes/footer.php'; ?>
