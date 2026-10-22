<?php
require_once __DIR__ . '/includes/config.php';

$title = 'Beranda';
$pageCss = 'home.css';

$kategori = [
    ['nama' => 'Kaos', 'teks' => 'Katun lembut, warna permen.', 'gambar' => 'kategori-kaos.jpg', 'kartu' => 'card--1'],
    ['nama' => 'Hoodie', 'teks' => 'Hangat tanpa harus kalem.', 'gambar' => 'kategori-hoodie.jpg', 'kartu' => 'card--2'],
    ['nama' => 'Kemeja', 'teks' => 'Rapi, tapi tetap main warna.', 'gambar' => 'kategori-kemeja.jpg', 'kartu' => 'card--3'],
];

$produk = [
    ['nama' => 'Kaos Langit', 'harga' => 129000, 'gambar' => 'produk-kaos-langit.jpg', 'badge' => null],
    ['nama' => 'Kaos Awan', 'harga' => 119000, 'gambar' => 'produk-kaos-awan.jpg', 'badge' => null],
    ['nama' => 'Hoodie Pasir', 'harga' => 289000, 'gambar' => 'produk-hoodie-pasir.jpg', 'badge' => 'Edisi Terbatas'],
    ['nama' => 'Flanel Merah', 'harga' => 219000, 'gambar' => 'produk-flanel-merah.jpg', 'badge' => null],
];

function rupiah(int $angka): string
{
    return 'Rp' . number_format($angka, 0, ',', '.');
}

require __DIR__ . '/includes/header.php';
?>

<section class="container hero">
    <div class="hero__text">
        <p class="eyebrow">Koleksi Baru 2026</p>
        <h1>Pakai Warna,<br>Pakai Kamu.</h1>
        <p class="hero__lead">Bloop membuat kaos, hoodie, dan kemeja dengan warna yang berani, potongan yang santai, dan bahan yang enak dipakai seharian.</p>
        <div class="hero__actions">
            <a class="btn btn--lilac" href="register.php">Gabung Sekarang</a>
            <a class="btn" href="#koleksi">Lihat Koleksi</a>
        </div>
    </div>

    <div class="hero__media has-splat">
        <?= shape('splat-1', 'splat splat--bubblegum splat--center') ?>
        <img class="img-lg float-item float-item--slow hero__img" src="assets/img/hero-warna.jpg" alt="Tumpukan kaos warna-warni" width="1000" height="1100">
        <div class="hero__badge"><?= badge('Baru!', 'sun') ?></div>
    </div>
</section>

<section class="section story has-splat" id="tentang">
    <?= shape('splat-2', 'splat splat--mint splat--center') ?>
    <div class="container story__inner">
        <h2>Lemari yang bikin senyum.</h2>
        <p>Kami percaya baju tidak harus abu-abu untuk terlihat keren. Setiap koleksi Bloop dirancang dalam jumlah kecil, dengan warna yang dipilih satu per satu supaya gampang dipadukan.</p>
    </div>
</section>

<section class="container section" id="koleksi">
    <div class="section-head">
        <h2>Pilih gayamu</h2>
        <p>Tiga koleksi utama, satu semangat: berani tampil.</p>
    </div>

    <div class="category-grid">
        <?php foreach ($kategori as $k): ?>
            <article class="card category <?= e($k['kartu']) ?>">
                <img class="img-lg category__img" src="assets/img/<?= e($k['gambar']) ?>" alt="Koleksi <?= e(strtolower($k['nama'])) ?> Bloop" loading="lazy" width="800" height="900">
                <h3><?= e($k['nama']) ?></h3>
                <p><?= e($k['teks']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="container section">
    <div class="section-head">
        <h2>Paling dicari</h2>
        <p>Favorit pelanggan minggu ini.</p>
    </div>

    <div class="product-grid">
        <?php foreach ($produk as $p): ?>
            <article class="card product">
                <div class="product__media">
                    <img class="img-sm" src="assets/img/<?= e($p['gambar']) ?>" alt="<?= e($p['nama']) ?>" loading="lazy" width="600" height="600">
                    <?php if ($p['badge']): ?>
                        <div class="product__badge"><?= badge($p['badge'], 'lilac') ?></div>
                    <?php endif; ?>
                </div>
                <h3 class="product__name"><?= e($p['nama']) ?></h3>
                <p class="product__price"><?= rupiah($p['harga']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="container section cta">
    <h2>Siap tampil beda?</h2>
    <div class="cta__buttons">
        <a class="btn btn--tangerine" href="#koleksi">Kaos</a>
        <a class="btn btn--mint" href="#koleksi">Hoodie</a>
        <a class="btn btn--sky" href="#koleksi">Kemeja</a>
        <a class="btn btn--sun" href="register.php">Daftar Member</a>
    </div>
</section>

<div class="marquee" aria-hidden="true">
    <div class="marquee__track">
        <?php for ($i = 0; $i < 8; $i++): ?>
            <span>@bloopwear</span>
        <?php endfor; ?>
    </div>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
