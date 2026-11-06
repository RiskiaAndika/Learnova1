<?php
require_once '../includes/auth.php';
require_role('peserta');
require_once '../config/database.php';

$rows = $pdo->query("SELECT s.*, c.title FROM schedules s JOIN classes c ON c.id=s.class_id WHERE s.start_at>=NOW() ORDER BY s.start_at")->fetchAll();

$pageTitle = 'Jadwal';
require '../includes/header.php';
?>
<div class="section">
  <h2>Jadwal kelas</h2>
</div>
<?php if (!$rows): ?>
  <div class="empty">Belum ada jadwal kelas mendatang.</div>
<?php else: ?>
  <div class="tablebox">
    <table>
      <tr>
        <th>Kelas</th>
        <th>Waktu</th>
        <th>Lokasi / tautan</th>
      </tr>
      <?php foreach ($rows as $r): ?>
        <tr>
          <td><?= e($r['title']) ?></td>
          <td><?= date('d M Y, H:i', strtotime($r['start_at'])) ?></td>
          <td><?= e($r['location'] ?: 'Belum ditentukan') ?></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
<?php endif; ?>
<?php require '../includes/footer.php'; ?>
