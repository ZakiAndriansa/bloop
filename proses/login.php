<?php
require_once __DIR__ . '/../includes/config.php';

// Hanya menerima POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('../login.php');
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$akun = $_SESSION['akun'] ?? null;

if ($username === '' || $password === '') {
    set_errors(['login' => 'Username dan password wajib diisi.']);
    set_old(['username' => $username]);
    redirect('../login.php');
}

if ($akun === null) {
    set_errors(['login' => 'Belum ada akun. Silakan daftar dulu.']);
    set_old(['username' => $username]);
    redirect('../login.php');
}

if ($username === $akun['username'] && $password === $akun['password']) {
    session_regenerate_id(true);
    $_SESSION['user'] = ['username' => $username];
    redirect('../dashboard.php');
} else {
    set_errors(['login' => 'Username atau password salah.']);
    set_old(['username' => $username]);
    redirect('../login.php');
}
