<?php
require_once __DIR__ . '/../includes/config.php';

// Halaman ini hanya menerima kiriman form.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('../register.php');
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$passwordConfirm = $_POST['password_confirm'] ?? '';

$errors = [];

if ($username === '') {
    $errors['username'] = 'Username wajib diisi.';
} elseif (strlen($username) < 3) {
    $errors['username'] = 'Username minimal 3 karakter.';
} elseif (preg_match('/\s/', $username)) {
    $errors['username'] = 'Username tidak boleh mengandung spasi.';
}

if ($password === '') {
    $errors['password'] = 'Password wajib diisi.';
} elseif (strlen($password) < 6) {
    $errors['password'] = 'Password minimal 6 karakter.';
}

if ($passwordConfirm !== $password) {
    $errors['password_confirm'] = 'Konfirmasi password tidak sama.';
}

if ($errors) {
    set_errors($errors);
    set_old(['username' => $username]);
    redirect('../register.php');
}

// Tanpa database: akun disimpan di session dan dipakai proses/login.php.
$_SESSION['akun'] = [
    'username' => $username,
    'password' => $password,
];

set_flash('Akun berhasil dibuat, silakan login.');
set_old(['username' => $username]);
redirect('../login.php');
