<?php
require_once __DIR__ . '/includes/config.php';

if (is_logged_in()) {
    redirect('dashboard.php');
}

$title = 'Daftar';
$pageCss = 'auth.css';
require __DIR__ . '/includes/header.php';

/*
 * KONTRAK FORM (jangan diubah, dibaca oleh proses/register.php)
 *
 *   <form method="post" action="proses/register.php">
 *   Input wajib, name persis seperti ini:
 *     name="username"          (type="text")
 *     name="password"          (type="password")
 *     name="password_confirm"  (type="password")
 *
 *   Nilai lama setelah gagal submit:  value="<?= old('username') ?>"
 *   Error di bawah tiap input:        <?= error('username') ?>, error('password'), error('password_confirm')
 *   Pesan umum (bila ada):            <?= flash() ?>
 *   Semua fungsi di atas sudah meng-escape hasilnya.
 */
?>

<?php /* ISI HTML DI SINI (Aqil). Hapus placeholder di bawah. */ ?>
<section class="container section">
    <h1>Daftar</h1>
    <p>Halaman pendaftaran sedang dikerjakan.</p>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
