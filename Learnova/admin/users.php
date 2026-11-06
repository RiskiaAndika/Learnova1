<?php
require_once '../includes/auth.php';
require_role('admin');
require_once '../config/database.php';

$rows = $pdo->query('SELECT name,email,role,points FROM users ORDER BY created_at DESC')->fetchAll();

$pageTitle = 'Pengguna';
require '../includes/header.php';
?>
<div class="section">
    <h2>Data pengguna</h2>
</div>
<div class="tablebox">
    <table>
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Poin</th>
        </tr>
        <?php foreach ($rows as $r): ?>
            <tr>
                <td><?= e($r['name']) ?></td>
                <td><?= e($r['email']) ?></td>
                <td><?= e($r['role']) ?></td>
                <td><?= (int) $r['points'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require '../includes/footer.php'; ?>