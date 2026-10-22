# Panduan Aqil

Halo Aqil! File ini menjelaskan bagianmu di proyek **Bloop**, branch yang kamu pakai, cara membuat Pull Request, dan cara mengecek konflik merge.

> Catatan istilah: di GitLab namanya **Merge Request (MR)**, di GitHub namanya **Pull Request (PR)**. Isinya sama: meminta agar pekerjaan di branch kamu digabung ke `main`.

## 1. Bagianmu

| File | Isi |
|---|---|
| `assets/css/auth.css` | Gaya kartu login dan daftar. **Kerjakan paling awal**, karena Darrell memakainya untuk `login.php`. |
| `register.php` | Tampilan halaman Daftar (hanya bagian HTML). |
| `dashboard.php` | Tampilan halaman setelah berhasil login (hanya bagian HTML). |
| `assets/css/dashboard.css` | Gaya halaman dashboard. |

**Jangan ubah** file lain: `includes/*`, `proses/*`, `base.css`, `home.css`, `index.php`, `logout.php`, `CLAUDE.md` (milik Zaki), serta `login.php` dan `README.md` (milik Darrell). Kalau butuh perubahan di sana, minta ke pemiliknya.

Logika PHP sudah selesai dibuat Zaki. Kamu cukup memanggil helper yang sudah ada. Aturan lengkap, kelas bentuk, dan kontrak form ada di `CLAUDE.md`, dan Claude kamu akan membacanya otomatis.

### Kontrak yang harus diikuti

1. **Form daftar:** `<form method="post" action="proses/register.php">` dengan input `username`, `password`, `password_confirm`. Nilai lama `old('username')`, pesan error `error('username')`, `error('password')`, `error('password_confirm')`.
2. **Dashboard:** variabel `$user` sudah tersedia. Tampilkan `<?= e($user['username']) ?>`. Tombol keluar menuju `logout.php`.
3. **auth.css** harus menyediakan kelas `.auth-card`, `.auth-tabs`, `.field`, `.field-error`, `.alert`, `.alert-success`, `.btn--full`, serta komentar berisi contoh HTML kartu login untuk Darrell.

## 2. Branch kamu

| Branch | Untuk |
|---|---|
| `feat/auth-css` | Langkah 1: hanya `auth.css`. Buat PR secepatnya. |
| `feat/register-dashboard` | Langkah 2: `register.php`, `dashboard.php`, `dashboard.css`. |

Kedua branch sudah dibuat di GitHub. Jangan pernah commit langsung ke `main`.

## 3. Persiapan (sekali saja)

1. Terima undangan collaborator dari email GitHub.
2. Clone repo ke folder server lokal:

```bash
cd C:\laragon\www          # atau C:\xampp\htdocs
git clone https://github.com/ZakiAndriansa/bloop.git
cd bloop
```

3. Buka `http://localhost/bloop/` (atau `http://bloop.test` di Laragon) dan pastikan halaman tampil.

## 4. Langkah 1: auth.css

```bash
git checkout feat/auth-css
git pull origin feat/auth-css
```

Prompt untuk Claude:

```
Baca CLAUDE.md dulu dan ikuti aturannya. Tugasku sekarang hanya assets/css/auth.css. Jangan ubah file lain.
Buat kelas umum yang dipakai login.php (oleh Darrell, pemula) dan register.php (olehku):
.auth-card dua kolom (kiri gambar .img-lg di atas latar warna dengan satu .splat dari base.css di belakangnya, kanan form), .auth-tabs (tab aktif ink tebal, nonaktif ink pudar, berupa link), .field (label kecil, input garis bawah ink, tanpa kotak), .field-error (teks kecil merah bata), .alert (kotak pesan radius 16px, varian .alert-success latar mint), .btn--full (tombol selebar form). Satu kolom di bawah 768px. Jangan membuat bentuk baru, pakai kelas bentuk dari base.css.
Di bagian atas auth.css tulis komentar berisi CONTOH HTML lengkap satu kartu login (input username dan password, sesuai kontrak di login.php) supaya Darrell tinggal menyalin strukturnya.
```

Simpan dan kirim:

```bash
git add assets/css/auth.css
git commit -m "style: auth.css untuk halaman login dan daftar"
git push origin feat/auth-css
```

Lalu buat PR (lihat bagian 6) dan kabari Zaki untuk segera merge, lalu kabari Darrell bahwa auth.css sudah masuk `main`.

## 5. Langkah 2: register dan dashboard

Setelah PR `feat/auth-css` di-merge:

```bash
git checkout feat/register-dashboard
git pull origin feat/register-dashboard
git merge origin/main          # ambil auth.css terbaru dari main
```

Prompt untuk Claude:

```
Baca CLAUDE.md dulu dan ikuti aturannya. Tugasku hanya tampilan: isi HTML register.php, dashboard.php, dan assets/css/dashboard.css. Jangan ubah file lain, jangan menulis logika PHP selain memanggil helper yang sudah ada.
1. register.php: isi bagian "ISI HTML DI SINI" memakai kelas dari auth.css (.auth-card, .auth-tabs dengan "Daftar" aktif dan "Masuk" link ke login.php, .field, .field-error, .alert, .btn .btn--full). Gambar kiri latar lilac. Form sesuai komentar kontrak: method post, action proses/register.php, input username, password, password_confirm; tiap input menampilkan error('nama_input') di bawahnya; username memakai value old('username'). Tombol "Daftar".
2. dashboard.php: banner .card berlatar sun berisi sapaan besar "Halo, <?= e($user['username']) ?>!" dengan satu .splat (splat-2) di belakang dan satu badge "Member Baru", .card putih info akun (username), bagian "Rekomendasi untukmu" berisi 3 .card (.card--1 sampai --3) dengan gambar .img-md, tombol .btn .btn--tangerine "Keluar" ke logout.php. Gaya di dashboard.css memakai token dan kelas bentuk dari base.css saja. Tetap minimalis.
```

Cek di browser: daftar akun di `register.php` (coba juga isi data yang salah supaya error muncul), login, lalu lihat dashboard.

```bash
git add register.php dashboard.php assets/css/dashboard.css
git commit -m "feat: tampilan daftar dan dashboard"
git push origin feat/register-dashboard
```

Lalu buat PR. Kamu juga diminta me-review PR Darrell (`feat/login-page`).

## 6. Cara membuat Pull Request (MR)

1. Buka https://github.com/ZakiAndriansa/bloop.
2. Setelah push, biasanya muncul kotak kuning berisi nama branch kamu dengan tombol **Compare & pull request**. Klik tombol itu.
   Kalau tidak muncul: klik tab **Pull requests**, lalu **New pull request**.
3. Pastikan arahnya **base: `main`** dan **compare: branch kamu** (misalnya `feat/auth-css`).
4. Isi judul singkat, misalnya `Tampilan daftar dan dashboard`. Di deskripsi, tulis apa yang diubah dan cara mengeceknya.
5. Di kanan, bagian **Reviewers**, pilih Zaki.
6. Klik **Create pull request**.
7. Kalau ada komentar revisi, perbaiki di branch yang sama, lalu `git add`, `git commit`, `git push`. PR otomatis ikut ter-update, tidak perlu membuat PR baru.

## 7. Cara cek dan menangani konflik merge

### Cek di GitHub

Buka halaman PR kamu dan lihat bagian bawah:

1. **"This branch has no conflicts with the base branch"** (hijau): aman, tinggal tunggu di-merge.
2. **"This branch has conflicts that must be resolved"**: ada konflik. Selesaikan di laptop dengan langkah di bawah. Jangan pakai tombol "Resolve conflicts" di web kalau belum yakin.

### Cek dan selesaikan di laptop

```bash
git checkout feat/register-dashboard     # branch kamu
git fetch origin
git merge origin/main
```

1. Kalau muncul **"Already up to date"** atau **"Merge made by..."** tanpa kata CONFLICT, berarti aman. Lanjutkan dengan `git push`.
2. Kalau muncul **`CONFLICT (content): Merge conflict in nama_file`**, jalankan `git status`. File yang konflik ditandai **both modified**.
3. Buka file itu. Bagian yang konflik terlihat seperti ini:

```
<<<<<<< HEAD
versi milikmu
=======
versi dari main
>>>>>>> origin/main
```

4. Pilih versi yang benar (atau gabungkan keduanya), lalu **hapus ketiga baris penanda** `<<<<<<<`, `=======`, `>>>>>>>`. Di VS Code bisa klik "Accept Current", "Accept Incoming", atau "Accept Both".
5. Pastikan tidak ada penanda yang tertinggal:

```bash
git grep -n "<<<<<<<"
```

   Kalau tidak ada keluaran, berarti bersih.
6. Buka halaman di browser dan pastikan tidak ada error PHP (halaman putih atau tulisan `Parse error`).
7. Simpan hasil merge:

```bash
git add nama_file
git commit -m "fix: selesaikan konflik dengan main"
git push
```

Kalau bingung di tengah jalan, batalkan merge dan kembali ke kondisi sebelumnya:

```bash
git merge --abort
```

Lalu tanya Zaki.

## 8. Rutin sebelum mulai kerja setiap hari

```bash
git checkout feat/register-dashboard
git fetch origin
git merge origin/main
```

Dengan begitu kamu selalu memakai kode terbaru dan konflik ketahuan lebih awal.
