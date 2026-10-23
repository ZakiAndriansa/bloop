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
 *     name="username"  (type="text")
 *     name="password"  (type="password")
 *
 *   Nilai username lama:        value="<?= old('username') ?>"
 *   Pesan sukses setelah daftar: <?= flash() ?>          tampilkan di .alert .alert-success bila tidak kosong
 *   Pesan gagal login:          <?= error('login') ?>    tampilkan di .alert bila tidak kosong
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
    <div class="auth-card">

        <!-- Kolom kiri -->
        <div class="auth-card__img has-splat" style="background: var(--bubblegum)">
            <?= shape('splat-1', 'splat splat--lilac splat--center') ?>
            <img class="img-lg" src="assets/img/hero-warna.jpg" alt="Koleksi pakaian Bloop">
        </div>

        <!-- Kolom kanan: tab navigasi dan form login -->
        <div class="auth-card__body">
            <div class="auth-tabs">
                <span class="auth-tabs__item auth-tabs__item--active">Masuk</span>
                <a class="auth-tabs__item" href="register.php">Daftar</a>
            </div>

            <?php if ($pesan = flash()): ?>
                <div class="alert alert-success"><?= $pesan ?></div>
            <?php endif; ?>

            <?php if ($err = error('login')): ?>
                <div class="alert"><?= $err ?></div>
            <?php endif; ?>

            <form method="post" action="proses/login.php">
                <div class="field">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?= old('username') ?>" required>
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button class="btn btn--full" type="submit">Masuk</button>
            </form>

            <p style="margin-top: 20px; margin-bottom: 0; font-size: 0.9rem; text-align: center;">
                Belum punya akun? <a href="register.php"><strong>Daftar</strong></a>
            </p>
        </div>

    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>