<?php
require_once '../includes/auth.php';
require_role('admin');

$pageTitle = 'Voucher';
require '../includes/header.php';
?>
<div class="section">
    <h2>Manajemen voucher</h2>
</div>
<div class="empty">Pengelolaan kode dan stok voucher akan ditambahkan pada tahap integrasi reward.</div>
<?php require '../includes/footer.php'; ?>