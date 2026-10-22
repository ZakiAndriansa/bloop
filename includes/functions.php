<?php
// Helper bersama. Jangan diubah tanpa diskusi dengan Zaki.

/** Amankan teks sebelum ditampilkan di HTML. */
function e(?string $s): string
{
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

/**
 * Ambil data sekali tampil dari session, lalu hapus dari session.
 * Disimpan di variabel statis supaya bisa dibaca berkali kali dalam satu halaman.
 */
function take_once(string $key): mixed
{
    static $cache = [];

    if (!array_key_exists($key, $cache)) {
        $cache[$key] = $_SESSION[$key] ?? null;
        unset($_SESSION[$key]);
    }

    return $cache[$key];
}

/* ---------- Dipakai di halaman tampilan ---------- */

/** Nilai input lama setelah gagal submit, sudah di-escape. */
function old(string $field): string
{
    $old = take_once('old') ?? [];
    return e($old[$field] ?? '');
}

/** Pesan error untuk satu input, sudah di-escape. '' bila tidak ada. */
function error(string $field): string
{
    $errors = take_once('errors') ?? [];
    return e($errors[$field] ?? '');
}

/** Pesan sekali tampil (misalnya setelah berhasil daftar), sudah di-escape. */
function flash(): string
{
    return e(take_once('flash') ?? '');
}

/** ['username' => ...] atau null bila belum login. */
function current_user(): ?array
{
    return $_SESSION['user'] ?? null;
}

function is_logged_in(): bool
{
    return current_user() !== null;
}

function require_login(): void
{
    if (!is_logged_in()) {
        redirect('login.php');
    }
}

/**
 * Alamat file di folder assets dengan versi (waktu terakhir diubah),
 * supaya browser tidak memakai CSS lama dari cache.
 */
function asset(string $path): string
{
    $file = __DIR__ . '/../assets/' . $path;
    $version = is_file($file) ? filemtime($file) : 0;
    return 'assets/' . $path . '?v=' . $version;
}

/**
 * Sisipkan SVG bentuk dari assets/img/shapes secara inline,
 * supaya warnanya bisa diatur lewat CSS (fill="currentColor").
 * Contoh: <?= shape('splat-1', 'splat splat--bubblegum splat--center') ?>
 */
function shape(string $name, string $class = 'splat'): string
{
    $file = __DIR__ . '/../assets/img/shapes/' . basename($name) . '.svg';
    if (!is_file($file)) {
        return '';
    }

    $svg = trim(file_get_contents($file));
    return preg_replace('/^<svg\b/', '<svg class="' . e($class) . '" aria-hidden="true" focusable="false"', $svg, 1);
}

/** Lencana bergerigi berisi teks. Contoh: <?= badge('Baru!', 'sun') ?> */
function badge(string $text, string $color = 'lilac'): string
{
    return '<span class="badge badge--' . e($color) . '">'
        . shape('badge', 'badge__shape')
        . '<span class="badge__text">' . e($text) . '</span>'
        . '</span>';
}

/* ---------- Dipakai di folder proses/ ---------- */

function set_errors(array $errors): void
{
    $_SESSION['errors'] = $errors;
}

function set_old(array $values): void
{
    $_SESSION['old'] = $values;
}

function set_flash(string $message): void
{
    $_SESSION['flash'] = $message;
}
