<?php
require_once '../includes/auth.php';
require_role('peserta');

$pageTitle = 'Quiz';
require '../includes/header.php';
?>
<div class="section">
  <h2>Quiz</h2>
</div>
<div class="empty">Kuis akan muncul setelah penyelenggara menerbitkan kuis pada kelas yang kamu ikuti.</div>
<?php require '../includes/footer.php'; ?>
