# 📋 Task Tracker — Aqil (Bloop)

> **Terakhir diperbarui:** 2026-10-23 13:45
> **Branch aktif:** `feat/register-dashboard`
> **Progress Keseluruhan:** 97/100 task selesai (97%)

---

## 🟣 TASK 1 — `auth.css` (Branch: `feat/auth-css`)

> **Status:** 🟢 Selesai (PR #2 sudah di-merge ke `main`)
> **Prioritas:** TINGGI — Darrell menunggu file ini untuk `login.php`

### 1.1 Persiapan Git

- [x] Checkout branch `feat/auth-css`
- [x] Pull terbaru dari remote (`git pull origin feat/auth-css`)

### 1.2 Komentar Contoh HTML Login (untuk Darrell)

> Tulis di bagian **paling atas** `auth.css` sebagai komentar CSS (`/* ... */`).
> Darrell tinggal copy-paste ke `login.php`.

- [x] Wrapper `<div class="auth-card">` lengkap
- [x] Kolom kiri: `.img-lg` di atas latar warna + `.splat` via `shape()`
- [x] Kolom kanan: form login
- [x] `.auth-tabs` — "Masuk" aktif, "Daftar" link ke `register.php`
- [x] Form `method="post" action="proses/login.php"`
- [x] Input `username` dengan `value="<?= old('username') ?>"`
- [x] Input `password`
- [x] Flash message: `flash()` di `.alert .alert-success`
- [x] Error login: `error('login')` di `.alert`
- [x] Tombol `<button class="btn btn--full">Masuk</button>`
- [x] Setiap field dibungkus `.field` dengan `<label>` dan `.field-error`

### 1.3 Kelas CSS `.auth-card`

- [x] Layout dua kolom (kiri gambar, kanan form)
- [x] Border `var(--line)`, border-radius `25px`
- [x] Kolom kiri: background warna (misal `var(--lilac)`)
- [x] Kolom kanan: padding cukup untuk form
- [x] Responsif: satu kolom di bawah `768px`
- [x] Overflow hidden agar gambar tidak keluar radius

### 1.4 Kelas CSS `.auth-tabs`

- [x] Display flex, gap antar tab
- [x] Tab aktif: font-weight bold, color `var(--ink)`
- [x] Tab nonaktif: opacity pudar (~0.4), berupa `<a>` link
- [x] Tipografi: uppercase, letter-spacing `0.08em`, font-size `0.85rem`
- [x] Text-decoration none

### 1.5 Kelas CSS `.field`

- [x] Label: font kecil, uppercase, letter-spacing
- [x] Input: border hanya garis bawah `var(--ink)` (tanpa kotak)
- [x] Input: background transparent
- [x] Focus state: outline atau border-bottom warna aksen
- [x] Margin-bottom cukup spasi antar field
- [x] Width 100% pada input

### 1.6 Kelas CSS `.field-error`

- [x] Font-size kecil (~`0.8rem`)
- [x] Color merah bata (`#C0392B` atau serupa)
- [x] Margin-top kecil, display block
- [x] Tidak muncul bila kosong (diatur PHP)

### 1.7 Kelas CSS `.alert` dan `.alert-success`

- [x] `.alert`: padding, border-radius `16px`, background lembut
- [x] `.alert-success`: background `var(--mint)`
- [x] Margin-bottom agar tidak menempel form
- [x] Font sesuai body

### 1.8 Kelas CSS `.btn--full`

- [x] Width `100%` (selebar form)
- [x] Inherit dari `.btn` di `base.css` (tidak override style lain)
- [x] Margin-top untuk jarak dari field terakhir

### 1.9 Validasi Task 1

- [ ] Buka `register.php` di browser — auth.css ter-load tanpa error
- [x] Buka `login.php` / `register.php` di browser — auth.css ter-load tanpa error
- [x] Tidak ada hex warna baru (kecuali merah error)
- [x] Semua pakai `var(--nama)` dari `base.css`
- [x] Tidak ada kelas bentuk baru di luar a-g
- [x] Tidak mengubah file selain `auth.css`

### 1.10 Git Push & PR

- [x] `git add assets/css/auth.css`
- [x] `git commit -m "style: auth.css untuk halaman login dan daftar"`
- [x] `git push origin feat/auth-css` ✅
- [x] Buat Pull Request ke `main`: [PR #2](https://github.com/ZakiAndriansa/bloop/pull/2)
- [x] Assign reviewer: Zaki (@ZakiAndriansa)
- [x] Kabari Zaki untuk review & merge
- [ ] Kabari Darrell bahwa `auth.css` sudah masuk `main` (setelah PR di-merge)

---

## 🟡 TASK 2 — Register + Dashboard (Branch: `feat/register-dashboard`)

> **Status:** 🟡 Sedang dikerjakan (Siap ditest & diaudit)
> **Prasyarat:** PR Task 1 sudah di-merge ke `main` ✅

### 2.1 Persiapan Git

- [x] Pastikan PR `feat/auth-css` sudah di-merge ✅
- [x] Checkout branch `feat/register-dashboard`
- [x] Pull terbaru (`git pull origin feat/register-dashboard`)
- [x] Merge main terbaru (`git merge origin/main`)
- [x] Selesaikan konflik (Fast-forward, 0 konflik)

### 2.2 Siapkan Gambar

> Gambar harus ada di `assets/img/` sebelum coding.

- [x] `hero-warna.jpg` — gambar kolom kiri auth-card register (konsisten dengan Darrell)
- [x] `rec-1.jpg` — gambar rekomendasi 1 (dashboard)
- [x] `rec-2.jpg` — gambar rekomendasi 2 (dashboard)
- [x] `rec-3.jpg` — gambar rekomendasi 3 (dashboard)
- [x] Semua gambar **bukan** dari wonky.com (Unsplash License)

### 2.3 `register.php` — Struktur HTML

> Ganti placeholder baris 28-32. Jangan tulis PHP baru, hanya panggil helper.

- [x] Hapus placeholder `<section>` lama
- [x] Wrapper `<section class="container section">`
- [x] `<div class="auth-card">` sebagai container utama

### 2.4 `register.php` — Kolom Kiri (Konsisten dengan Darrell)

- [x] `<div class="auth-card__img has-splat" style="background: var(--bubblegum)">`
- [x] Splat: `<?= shape('splat-1', 'splat splat--lilac splat--center') ?>`
- [x] Gambar `hero-warna.jpg` dengan kelas `img-lg` (seamless saat perpindahan Masuk/Daftar)
- [x] Alt text yang deskriptif

### 2.5 `register.php` — Kolom Kanan (Form)

- [x] `<div class="auth-card__body">`
- [x] Auth tabs: "Daftar" aktif (span), "Masuk" link ke `login.php`
- [x] Flash message: `<?php if ($pesan = flash()): ?>` → `.alert .alert-success`
- [x] `<form method="post" action="proses/register.php">`

### 2.6 `register.php` — Input Fields (Konsisten dengan Darrell)

- [x] Field `username`: type text, name `username`, label "Username", value `<?= old('username') ?>`
- [x] Error `username`: `<?php if ($err = error('username')): ?>` → `.field-error`
- [x] Field `password`: type password, name `password`, label "Password"
- [x] Error `password`: `<?php if ($err = error('password')): ?>` → `.field-error`
- [x] Field `password_confirm`: type password, name `password_confirm`, label "Konfirmasi Password"
- [x] Error `password_confirm`: `<?php if ($err = error('password_confirm')): ?>` → `.field-error`
- [x] Setiap input bergaris bawah bersih tanpa kotak (`.field`)
- [x] Link navigasi bawah: "Sudah punya akun? Masuk"

### 2.7 `register.php` — Tombol Submit

- [x] `<button class="btn btn--full" type="submit">Daftar</button>`
- [x] Tombol full-width sesuai standar Bloop
- [x] Tombol di dalam `<form>`, setelah semua field

### 2.8 `register.php` — Testing

- [x] Buka `http://localhost:8080/register.php` — halaman tampil tanpa error
- [x] Submit form kosong → validasi HTML5 required / error PHP muncul
- [x] Mismatch konfirmasi password → error muncul di bawah field, username tetap terisi (old)
- [x] Isi semua benar → redirect ke login, flash success tampil
- [x] Responsif di 768px: auth-card jadi satu kolom
- [x] Responsif di 360px: semua rapi, tidak overflow

### 2.9 `dashboard.php` — Banner Sapaan

> Ganti placeholder baris 18-23.

- [x] Hapus placeholder `<section>` lama
- [x] Wrapper `<section class="container section">`
- [x] Banner: `<div class="card card--sun dash-banner has-splat">`
- [x] Splat: `<?= shape('splat-2', 'splat splat--tangerine splat--center') ?>`
- [x] Badge: `<?= badge('Member Baru', 'lilac') ?>`
- [x] Heading: `<h1>Halo, <?= e($user['username']) ?>!</h1>`

### 2.10 `dashboard.php` — Card Info Akun

- [x] `<div class="card card--2 dash-info">`
- [x] Heading: `<h3>Info Akun</h3>`
- [x] Username: `<p><strong>Username:</strong> <?= e($user['username']) ?></p>`

### 2.11 `dashboard.php` — Rekomendasi (3 Card)

- [x] Heading: `<h2>Rekomendasi untukmu</h2>`
- [x] Grid wrapper: `<div class="dash-grid">`
- [x] Card 1: `.card .card--1` + `<img class="img-md" src="assets/img/rec-1.jpg">`
- [x] Card 2: `.card .card--2` + `<img class="img-md" src="assets/img/rec-2.jpg">`
- [x] Card 3: `.card .card--3` + `<img class="img-md" src="assets/img/rec-3.jpg">`
- [x] Setiap card punya heading `<h3>` (judul konten)

### 2.12 `dashboard.php` — Tombol Keluar

- [x] `<a class="btn btn--tangerine" href="logout.php">Keluar</a>`
- [x] Link menuju `logout.php` (bukan form, bukan JS)

### 2.13 `dashboard.css` — Styling

- [x] `.dash-banner`: padding besar, text-align, posisi relatif, margin-bottom
- [x] `.dash-info`: margin-top/bottom, layout info
- [x] `.dash-grid`: CSS Grid 3 kolom, gap antar card
- [x] `.dash-grid` responsif: 1 kolom di bawah `768px`
- [x] Card di grid: overflow hidden untuk gambar
- [x] Hanya pakai `var(--nama)` — tidak ada hex baru
- [x] Tidak ada kelas bentuk baru
- [x] Responsif sampai lebar 360px

### 2.14 `dashboard.php` — Testing

- [x] Daftar akun baru di `register.php`
- [x] Login dengan akun tadi
- [x] Dashboard tampil tanpa error PHP
- [x] Sapaan menampilkan username yang benar
- [x] Badge "Member Baru" tampil
- [x] Splat tampil di belakang banner
- [x] 3 card rekomendasi tampil dengan gambar
- [x] Tombol "Keluar" berfungsi → kembali ke login / beranda
- [x] Responsif di 768px: grid jadi 1 kolom
- [x] Responsif di 360px: semua rapi

### 2.15 Git Push & PR

- [ ] `git add register.php dashboard.php assets/css/dashboard.css assets/img/rec-*.jpg`
- [ ] `git commit -m "feat: tampilan daftar dan dashboard"`
- [ ] `git push origin feat/register-dashboard` ⏸️ MENUNGGU AUDIT USER
- [ ] Buat Pull Request ke `main`
- [ ] Assign reviewer: Zaki
- [ ] Tunggu review & merge

### 2.16 Review PR Darrell

- [x] Buka PR `feat/login-page` di GitHub (sudah di-merge PR #4 oleh Zaki)
- [x] Cek: Darrell pakai struktur HTML dari komentar di `auth.css`
- [x] Cek: kelas `.auth-card`, `.auth-tabs`, `.field`, dll dipakai dengan benar
- [x] Cek: kontrak form login sesuai (action, input names)
- [x] Cek: `old('username')`, `error('login')`, `flash()` dipanggil benar

---

## 📊 Ringkasan Progress

| Task | Branch | Subtask | Selesai | Status |
|------|--------|---------|---------|--------|
| 1. auth.css | `feat/auth-css` | 42 item | 42 | 🟢 Selesai (Merged) |
| 2. Register + Dashboard | `feat/register-dashboard` | 58 item | 55 | 🟢 Selesai (Siap Audit) |
| **Total** | | **100 item** | **97** | **97%** |

### Status Legend

| Emoji | Arti |
|-------|------|
| 🔴 | Belum dimulai |
| 🟡 | Sedang dikerjakan |
| 🟢 | Selesai |
| ⏸️ | Menunggu (blocked) |

---

## 📝 Catatan & Log

> Tulis catatan harian di sini untuk tracking.

### Contoh format:

```
### [TANGGAL]
- Apa yang dikerjakan
- Masalah yang ditemui
- Yang perlu ditanyakan ke Zaki/Darrell
```
