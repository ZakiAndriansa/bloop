<?php
require_once __DIR__ . '/includes/config.php';

require_login();
$user = current_user();

$title = 'Dashboard';
$pageCss = 'dashboard.css';
require __DIR__ . '/includes/header.php';

/*
 * DATA YANG TERSEDIA
 *   <?= e($user['name']) ?>   nama pengguna
 *   <?= e($user['email']) ?>  email pengguna
 *   Tombol keluar:            <a class="btn btn--tangerine" href="logout.php">Keluar</a>
 */
?>

<?php /* ISI HTML DI SINI (Aqil). Hapus placeholder di bawah. */ ?>
<section class="container section">
    <h1>Halo, <?= e($user['name']) ?>!</h1>
    <p>Halaman dashboard sedang dikerjakan.</p>
    <a class="btn btn--tangerine" href="logout.php">Keluar</a>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
