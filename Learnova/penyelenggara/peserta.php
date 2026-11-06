<?php
require_once '../includes/auth.php';
require_role('penyelenggara');

$pageTitle = 'Peserta';
require '../includes/header.php';
?>
<div class="section">
  <h2>Peserta kelas</h2>
</div>
<div class="empty">Daftar peserta tampil setelah fitur pendaftaran kelas diaktifkan.</div>
<?php require '../includes/footer.php'; ?>
