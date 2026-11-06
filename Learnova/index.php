<?php
session_start();

if (empty($_SESSION['user'])) {
    header('Location: auth/login.php');
    exit;
}

$r = $_SESSION['user']['role'];
header('Location: ' . ($r === 'admin' ? 'admin/dashboard.php' : ($r === 'penyelenggara' ? 'penyelenggara/dashboard.php' : 'peserta/dashboard.php')));
exit;
