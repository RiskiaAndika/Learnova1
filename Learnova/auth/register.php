<?php
session_start();
require_once '../config/database.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'peserta';

    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($pass) < 6 || !in_array($role, ['peserta', 'penyelenggara'], true)) {
        $error = 'Periksa kembali data. Password minimal 6 karakter.';
    } else {
        $q = $pdo->prepare('SELECT id FROM users WHERE email=?');
        $q->execute([$email]);

        if ($q->fetch()) {
            $error = 'Email sudah digunakan.';
        } else {
            $q = $pdo->prepare('INSERT INTO users(name, email, password, role) VALUES(?,?,?,?)');
            $q->execute([$name, $email, password_hash($pass, PASSWORD_DEFAULT), $role]);
            $_SESSION['user'] = [
                'id' => (int) $pdo->lastInsertId(),
                'name' => $name,
                'email' => $email,
                'role' => $role
            ];
            header('Location: ../index.php');
            exit;
        }
    }
}

$pageTitle = 'Daftar';
require '../includes/header.php';
?>
<div class="formbox">
  <div class="form">
    <h1>Buat akun Learnova</h1>
    <p>Mulai perjalanan belajar dan raih pencapaianmu.</p>
    <?php if ($error): ?>
      <div class="alert"><?= e($error) ?></div>
    <?php endif; ?>
    <form method="post">
      <div class="field">
        <label>Nama lengkap</label>
        <input name="name" required>
      </div>
      <div class="field">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" name="password" minlength="6" required>
      </div>
      <div class="field">
        <label>Daftar sebagai</label>
        <select name="role">
          <option value="peserta">Peserta</option>
          <option value="penyelenggara">Penyelenggara kelas</option>
        </select>
      </div>
      <button class="btn">Buat akun</button>
    </form>
    <div class="note">
      Sudah punya akun? <a class="arrow" href="login.php">Masuk</a>
    </div>
  </div>
</div>
<?php require '../includes/footer.php'; ?>
