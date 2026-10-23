<?php
require_once __DIR__ . '/includes/config.php';

require_login();
$user = current_user();

$title = 'Dashboard';
$pageCss = 'dashboard.css';
require __DIR__ . '/includes/header.php';

/*
 * DATA YANG TERSEDIA
 *   <?= e($user['username']) ?>  username yang sedang login
 *   Tombol keluar:               <a class="btn btn--tangerine" href="logout.php">Keluar</a>
 */
?>

<?php /* ISI HTML DI SINI (Aqil). Hapus placeholder di bawah. */ ?>
<section class="container section">

    <!-- Banner sapaan berlatar sun dengan splat dan badge Member Baru -->
    <div class="card card--sun dash-banner has-splat">
        <?= shape('splat-2', 'splat splat--tangerine splat--center') ?>
        <div class="dash-banner__badge">
            <?= badge('Member Baru', 'lilac') ?>
        </div>
        <h1 class="dash-banner__title">Halo, <?= e($user['username']) ?>!</h1>
        <p class="dash-banner__lead">Selamat datang di Bloop Club. Eksplorasi gaya ceriamu hari ini.</p>
    </div>

    <!-- Info Akun & Tombol Keluar -->
    <div class="card card--2 dash-info">
        <div class="dash-info__details">
            <h3>Info Akun</h3>
            <p><strong>Username:</strong> <?= e($user['username']) ?></p>
            <p class="dash-info__status">Status: <span>Aktif</span></p>
        </div>
        <div class="dash-info__action">
            <a class="btn btn--tangerine" href="logout.php">Keluar</a>
        </div>
    </div>

    <!-- Rekomendasi untukmu (3 Card Berwarna) -->
    <div class="dash-recommendations">
        <div class="section-head">
            <h2>Rekomendasi untukmu</h2>
            <p>Dipilih khusus untuk menyemarakkan harimu.</p>
        </div>

        <div class="dash-grid">
            <article class="card card--1 dash-card">
                <img class="img-md" src="assets/img/rec-1.jpg" alt="Kaos Santai Warna Cerah" loading="lazy">
                <div class="dash-card__content">
                    <h3>Kaos Santai</h3>
                    <p>Bahan katun adem dengan warna permen yang memikat.</p>
                </div>
            </article>

            <article class="card card--2 dash-card">
                <img class="img-md" src="assets/img/rec-2.jpg" alt="Sneakers & Streetwear Bloop" loading="lazy">
                <div class="dash-card__content">
                    <h3>Streetwear Ceria</h3>
                    <p>Paduan gaya jalanan yang tetap kasual dan nyaman.</p>
                </div>
            </article>

            <article class="card card--3 dash-card">
                <img class="img-md" src="assets/img/rec-3.jpg" alt="Jaket & Kemeja Warna Berani" loading="lazy">
                <div class="dash-card__content">
                    <h3>Jaket & Kemeja</h3>
                    <p>Sentuhan warna berani untuk aktivitas harianmu.</p>
                </div>
            </article>
        </div>
    </div>

</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
