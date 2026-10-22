# Bloop: website UTS Perancangan dan Pemrograman Website

Brand baju fiktif **Bloop**. Empat halaman: halaman awal (`index.php`), pendaftaran (`register.php`), login (`login.php`), dan halaman berhasil login (`dashboard.php`), semuanya terhubung ke back-end PHP.

## Aturan wajib

1. Hanya HTML, CSS, dan PHP. **Tanpa** database, tanpa file data (JSON, txt), tanpa framework, tanpa JavaScript.
2. Pendaftaran menyimpan username dan password ke `$_SESSION['akun']` (`proses/register.php`). Login mencocokkan dengan akun itu memakai if statement (`proses/login.php`). Akun hilang bila browser ditutup, jadi daftar ulang sebelum mencoba login.
3. Semua teks dari pengguna yang ditampilkan wajib lewat `e()`. Helper `old()`, `error()`, dan `flash()` sudah meng-escape hasilnya.
4. Desain **mencontoh** wonky.com, **bukan menyalin**. Jangan memakai gambar, logo, teks, atau file apa pun dari wonky.com.
5. Hanya ubah file milikmu (lihat tabel di bawah). Kalau butuh perubahan di file orang lain, minta ke pemiliknya.

## Pembagian file

| File | Pemilik |
|---|---|
| `includes/*`, `assets/css/base.css`, `assets/img/shapes/*`, `index.php`, `assets/css/home.css`, `proses/*`, `logout.php`, `CLAUDE.md` | Zaki |
| `assets/css/auth.css`, `register.php`, `dashboard.php`, `assets/css/dashboard.css` | Aqil |
| `login.php` (hanya bagian HTML), `README.md` | Darrell (pemula: jangan menulis CSS atau PHP baru, pakai kelas dan helper yang sudah ada) |

Di `register.php`, `login.php`, dan `dashboard.php`, baris PHP pembuka dan penutup sudah disiapkan. Isi HTML hanya di bagian bertanda `ISI HTML DI SINI`. Kontrak form tertulis di komentar setiap file.

## Gaya: playful minimalism

Latar krem polos dengan banyak ruang kosong. Warna hanya sebagai aksen, maksimal 3 sampai 4 warna aksen per halaman. Judul besar dan tebal, teks kapital kecil untuk label dan tombol.

Token warna di `base.css` (selalu pakai `var(--nama)`, jangan menulis hex baru):

| Token | Hex |
|---|---|
| `--cream` | `#FFF6EC` (latar) |
| `--ink` | `#1F2A44` (teks, garis) |
| `--tangerine` | `#FF7A3D` |
| `--bubblegum` | `#FF8FB1` |
| `--lilac` | `#C9B6FF` |
| `--mint` | `#7FE0C2` |
| `--sun` | `#FFD23F` |
| `--sky` | `#8EC9FF` |
| `--white` | `#FFFFFF` |

Font: `var(--font-display)` Bricolage Grotesque untuk judul dan logo, `var(--font-body)` DM Sans untuk teks.

Layout: `.container` (lebar maksimal 1200px, jarak tepi 16px) dan `.section` (jarak atas bawah). Harus rapi sampai lebar layar 360px.

## Kelas bentuk (hanya ini, jangan membuat bentuk baru)

Bentuk ini diambil dari hasil inspeksi wonky.com. Jangan memakai `clip-path`, lingkaran dekoratif, atau bintang.

| | Kelas | Cara pakai |
|---|---|---|
| a | `.btn` | Tombol kapsul bergaris 3px. Warna: `.btn--tangerine`, `--bubblegum`, `--lilac`, `--mint`, `--sun`, `--sky`, `--cream`. Kecil: `.btn--sm`. Contoh: `<a class="btn btn--lilac" href="register.php">Gabung</a>` |
| b | `.card` | Kartu radius 25px, latar putih. Warna bergiliran: `.card--1` tangerine, `.card--2` putih, `.card--3` lilac, `.card--4` bubblegum |
| c | `.img-sm`, `.img-md`, `.img-lg` | Gambar dengan radius 10px, 16px, 30px |
| d | `.splat` | Bentuk organik di belakang konten. Induknya diberi `.has-splat`. Pasang dengan PHP: `<?= shape('splat-1', 'splat splat--bubblegum splat--center') ?>`. Pilihan bentuk: `splat-1` (gumpalan), `splat-2` (awan bertetes). Posisi: `.splat--center`, `.splat--top-left`, `.splat--bottom-right`. Warna: `.splat--` + nama warna |
| e | `.badge` | Lencana bergerigi berisi teks: `<?= badge('Baru!', 'sun') ?>` (teks, warna) |
| f | `.float-item` | Gambar produk tanpa latar yang naik turun pelan. Variasi `.float-item--slow`, `.float-item--delay`. Kemiringan lewat `style="--tilt: -6deg"` |
| g | `.marquee` | Teks besar berjalan: `<div class="marquee"><div class="marquee__track"><span>@bloopwear</span><span>@bloopwear</span><span>@bloopwear</span><span>@bloopwear</span></div></div>` (isi dua kali lipat supaya mulus) |

Animasi otomatis mati bila pengguna mengaktifkan `prefers-reduced-motion`.

## Helper PHP (`includes/functions.php`, jangan diubah tanpa diskusi)

Untuk halaman tampilan:

```php
e($s)                // amankan teks untuk HTML
old('username')      // nilai input lama setelah gagal submit
error('username')    // pesan error untuk input itu, '' bila tidak ada
flash()              // pesan sekali tampil, '' bila tidak ada
current_user()       // ['username' => ...] atau null
is_logged_in()
require_login()      // alihkan ke login.php bila belum login
shape('splat-1', 'kelas')  // SVG bentuk inline
badge('Teks', 'warna')     // lencana bergerigi
```

Untuk folder `proses/` (Zaki): `set_errors([...])`, `set_old([...])`, `set_flash('...')`, `redirect('...')`.

## Kontrak form

1. **Daftar:** `<form method="post" action="proses/register.php">`, input `username` (type text), `password`, `password_confirm`. Username lama lewat `old('username')`, error per input lewat `error('nama_input')`.
2. **Login:** `<form method="post" action="proses/login.php">`, input `username` (type text), `password`. Username lama lewat `old('username')`, pesan sukses lewat `flash()`, pesan gagal lewat `error('login')`.
3. **Dashboard:** `$user = current_user()` sudah tersedia, tampilkan `e($user['username'])`. Tombol keluar menuju `logout.php`.

## Alur kerja Git

1. Jangan push langsung ke `main`. Kerjakan di branch sendiri: `feat/landing`, `feat/backend` (Zaki), `feat/auth-css`, `feat/register-dashboard` (Aqil), `feat/login-page` (Darrell).
2. Sebelum push: `git pull origin main`, selesaikan konflik di laptop.
3. Buat Pull Request ke `main`, minta satu anggota lain review.
4. Pesan commit: `feat: ...`, `fix: ...`, `style: ...`.

## Menjalankan

Laragon: folder di `C:\laragon\www\bloop`, buka `http://localhost/bloop/` atau `http://bloop.test`.
XAMPP: folder di `C:\xampp\htdocs\bloop`, buka `http://localhost/bloop/`.
Untuk mencoba login: daftar dulu di `register.php`, lalu login dengan username dan password yang sama.
