<?php
 
// XSS
function e(?string $s): string
{
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); 
}

function redirect(string $url): void
{
    header('Location: ' . $url);
    exit;
}

function take_once(string $key): mixed
{
    static $cache = [];

    if (!array_key_exists($key, $cache)) {
        $cache[$key] = $_SESSION[$key] ?? null;
        unset($_SESSION[$key]); 
    }

    return $cache[$key];
}

// Antisipasi kalau gagal
function old(string $field): string
{
    $old = take_once('old') ?? [];
    return e($old[$field] ?? ''); 
}

function error(string $field): string
{
    $errors = take_once('errors') ?? [];
    return e($errors[$field] ?? '');
}

function flash(): string
{
    return e(take_once('flash') ?? '');
}

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

function asset(string $path): string
{
    $file = __DIR__ . '/../assets/' . $path;
    $version = is_file($file) ? filemtime($file) : 0;
    return 'assets/' . $path . '?v=' . $version;
}

// SVG Editor
function shape(string $name, string $class = 'splat'): string
{
    $file = __DIR__ . '/../assets/img/shapes/' . basename($name) . '.svg';
    if (!is_file($file)) {
        return '';
    }

    $svg = trim(file_get_contents($file));
    return preg_replace('/^<svg\b/', '<svg class="' . e($class) . '" aria-hidden="true" focusable="false"', $svg, 1);
}

function badge(string $text, string $color = 'lilac'): string
{
    return '<span class="badge badge--' . e($color) . '">'
        . shape('badge', 'badge__shape')
        . '<span class="badge__text">' . e($text) . '</span>'
        . '</span>';
}

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
