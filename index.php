<?php
require_once __DIR__ . '/includes/config.php';

$title = 'Beranda';
$pageCss = 'home.css';
require __DIR__ . '/includes/header.php';
?>

<?php /* ISI HTML DI SINI (Zaki, branch feat/landing) */ ?>
<section class="container section has-splat">
    <?= shape('splat-1', 'splat splat--lilac splat--center') ?>
    <h1>Pakai Warna,<br>Pakai Kamu.</h1>
    <p>Halaman utama sedang dikerjakan.</p>
    <a class="btn btn--lilac" href="register.php">Gabung Sekarang</a>
    <?= badge('Baru!', 'sun') ?>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
