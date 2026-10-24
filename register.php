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
    <div class="auth-card">

        <!-- Kolom kiri -->
        <div class="auth-card__img has-splat" style="background: var(--bubblegum)">
            <?= shape('splat-1', 'splat splat--lilac splat--center') ?>
            <img class="img-lg" src="assets/img/hero-warna.jpg" alt="Koleksi pakaian Bloop">
        </div>

        <!-- Kolom kanan: tab navigasi dan form register -->
        <div class="auth-card__body">
            <div class="auth-tabs">
                <a class="auth-tabs__item" href="login.php">Masuk</a>
                <span class="auth-tabs__item auth-tabs__item--active">Daftar</span>
            </div>

            <?php if ($pesan = flash()): ?>
                <div class="alert alert-success"><?= $pesan ?></div>
            <?php endif; ?>

            <form method="post" action="proses/register.php">
                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?= old('username') ?>" required>
                    <?php if ($err = error('username')): ?>
                        <span class="field-error"><?= $err ?></span>
                    <?php endif; ?>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <?php if ($err = error('password')): ?>
                        <span class="field-error"><?= $err ?></span>
                    <?php endif; ?>
                </div>

                <div class="field">
                    <label for="password_confirm">Konfirmasi Password</label>
                    <input type="password" id="password_confirm" name="password_confirm" required>
                    <?php if ($err = error('password_confirm')): ?>
                        <span class="field-error"><?= $err ?></span>
                    <?php endif; ?>
                </div>

                <button class="btn btn--full" type="submit">Daftar</button>
            </form>

            <p style="margin-top: 20px; margin-bottom: 0; font-size: 0.9rem; text-align: center;">
                Sudah punya akun? <a href="login.php"><strong>Masuk</strong></a>
            </p>
        </div>

    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
