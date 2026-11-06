<?php
require_once '../includes/auth.php';
require_role('peserta');
require_once '../config/database.php';

$rows = $pdo->query("SELECT name, points FROM users WHERE role='peserta' ORDER BY points DESC, name ASC LIMIT 50")->fetchAll();

$pageTitle = 'Leaderboard';
require '../includes/header.php';
?>
<div class="section">
  <h2>Leaderboard</h2>
  <span class="muted">Peringkat berdasarkan poin</span>
</div>
<div class="tablebox">
  <table>
    <tr>
      <th>Peringkat</th>
      <th>Peserta</th>
      <th>Poin</th>
    </tr>
    <?php foreach ($rows as $i => $r): ?>
      <tr>
        <td><?= $i + 1 ?></td>
        <td><?= e($r['name']) ?></td>
        <td>⭐ <?= (int) $r['points'] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</div>
<?php require '../includes/footer.php'; ?>
