<?php
require_once '../includes/auth.php';
require_role('admin');
require_once '../config/database.php';

$rows = $pdo->query("SELECT name,points FROM users WHERE role='peserta' ORDER BY points DESC")->fetchAll();

$pageTitle = 'Leaderboard';
require '../includes/header.php';
?>
<div class="section">
    <h2>Leaderboard peserta</h2>
</div>
<div class="tablebox">
    <table>
        <tr>
            <th>Rank</th>
            <th>Peserta</th>
            <th>Poin</th>
        </tr>
        <?php foreach ($rows as $i => $r): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= e($r['name']) ?></td>
                <td><?= (int) $r['points'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php require '../includes/footer.php'; ?>