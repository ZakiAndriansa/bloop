<?php
// Dipanggil paling atas di setiap halaman dan file proses.
session_start();

require_once __DIR__ . '/functions.php';

// Akun demo supaya bisa login walau belum mendaftar.
const DEMO_NAME = 'Pengguna Demo';
const DEMO_EMAIL = 'demo@bloop.id';
const DEMO_PASSWORD = 'bloop1234';
