<?php
$title = $title ?? 'Bloop';
$pageCss = $pageCss ?? null;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title) ?> | Bloop</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,600;12..96,800&family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,600;0,9..40,700;1,9..40,400&display=swap">
    <link rel="stylesheet" href="<?= e(asset('css/base.css')) ?>">
    <?php if ($pageCss): ?>
        <link rel="stylesheet" href="<?= e(asset('css/' . $pageCss)) ?>">
    <?php endif; ?>
</head>
<body>
    <div class="topbar">Gratis ongkir untuk pesanan pertamamu, pakai kode HALOBLOOP</div>

    <header class="navbar">
        <div class="container navbar__inner">
            <ul class="navbar__links">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="index.php#koleksi">Koleksi</a></li>
                <li><a href="index.php#tentang">Tentang</a></li>
            </ul>

            <a class="logo" href="index.php">bloop</a>

            <div class="navbar__action">
                <?php if (is_logged_in()): ?>
                    <a class="btn btn--sm btn--bubblegum" href="dashboard.php">Dashboard</a>
                <?php else: ?>
                    <a class="btn btn--sm btn--bubblegum" href="login.php">Masuk</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main>
