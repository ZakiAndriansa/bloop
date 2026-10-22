<?php
require_once __DIR__ . '/includes/config.php';

if (is_logged_in()) {
    redirect('dashboard.php');
}

$title = 'Masuk';
$pageCss = 'auth.css';
require __DIR__ . '/includes/header.php';

/*
 * KONTRAK FORM (jangan diubah, dibaca oleh proses/login.php)
 *
 *   <form method="post" action="proses/login.php">
 *   Input wajib, name persis seperti ini:
 *     name="email"     (type="email")
 *     name="password"  (type="password")
 *
 *   Nilai email lama:          value="<?= old('email') ?>"
 *   Pesan sukses setelah daftar: <?= flash() ?>          tampilkan di .alert .alert-success bila tidak kosong
 *   Pesan gagal login:          <?= error('login') ?>    tampilkan di .alert bila tidak kosong
 *   Akun demo untuk dicoba:     <?= e(DEMO_EMAIL) ?> dan <?= e(DEMO_PASSWORD) ?>
 *   Semua fungsi di atas sudah meng-escape hasilnya.
 *
 *   Contoh menampilkan pesan hanya bila ada isinya:
 *     <?php if ($pesan = flash()): ?>
 *         <div class="alert alert-success"><?= $pesan ?></div>
 *     <?php endif; ?>
 */
?>

<?php /* ISI HTML DI SINI (Darrell). Hapus placeholder di bawah. */ ?>
<section class="container section">
    <h1>Masuk</h1>
    <p>Halaman login sedang dikerjakan.</p>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
