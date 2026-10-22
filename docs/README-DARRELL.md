# Panduan Darrell

Halo Darrell! File ini menjelaskan bagianmu di proyek **Bloop**, branch yang kamu pakai, cara membuat Pull Request, dan cara mengecek konflik merge. Ikuti urutannya pelan-pelan, dan kalau bingung langsung tanya Zaki. Tidak apa-apa.

> Catatan istilah: di GitLab namanya **Merge Request (MR)**, di GitHub namanya **Pull Request (PR)**. Isinya sama: meminta agar pekerjaanmu digabung ke `main`.

## 1. Kamus singkat

| Istilah | Artinya |
|---|---|
| **Repo** | Folder proyek yang disimpan di GitHub. |
| **Clone** | Mengunduh repo ke laptop. Cukup sekali. |
| **Branch** | Salinan kerja milikmu sendiri. Kamu bebas mengubah apa saja di branch tanpa merusak `main`. |
| **`main`** | Versi utama yang nanti dikumpulkan. Jangan mengubahnya langsung. |
| **Commit** | Menyimpan perubahan di laptop, seperti "save point". |
| **Push** | Mengirim commit dari laptop ke GitHub. |
| **Pull** | Mengambil perubahan terbaru dari GitHub ke laptop. |
| **Pull Request (PR)** | Meminta Zaki menggabungkan branch kamu ke `main`. |
| **Conflict** | Dua orang mengubah baris yang sama, jadi Git bingung harus memakai yang mana. |

## 2. Bagianmu

| File | Isi |
|---|---|
| `login.php` | Tampilan halaman login. Kamu hanya mengisi bagian bertanda `ISI HTML DI SINI`. |
| `README.md` | Penjelasan proyek di halaman depan repo GitHub. |

Yang **tidak perlu** kamu kerjakan: CSS dan logika PHP. Semua kelas tampilan sudah dibuat Aqil di `assets/css/auth.css`, dan logika login sudah dibuat Zaki. Kamu tinggal memakai yang sudah ada.

**Jangan ubah** file selain dua file di atas.

### Isi form login (sudah ditentukan, jangan diubah)

1. Form: `<form method="post" action="proses/login.php">`
2. Input username: `name="username"`, isinya `value="<?= old('username') ?>"`
3. Input password: `name="password"`, `type="password"`
4. Pesan sukses setelah daftar: `flash()`. Pesan gagal login: `error('login')`.

Semua ini juga tertulis di komentar bagian atas `login.php`. Claude kamu akan membacanya.

## 3. Branch kamu

Kamu hanya memakai satu branch: **`feat/login-page`**. Branch ini sudah dibuat di GitHub.

## 4. Persiapan (sekali saja)

1. Buka email, terima undangan collaborator dari GitHub.
2. Buka terminal (atau terminal di VS Code), lalu jalankan baris demi baris:

```bash
cd C:\laragon\www          # kalau pakai XAMPP: cd C:\xampp\htdocs
git clone https://github.com/ZakiAndriansa/bloop.git
cd bloop
```

3. Pastikan Laragon atau XAMPP sedang berjalan, lalu buka `http://localhost/bloop/` di browser. Kalau halaman "bloop" tampil, persiapan selesai.

## 5. Mulai kerja

**Tunggu kabar dari Aqil** bahwa `auth.css` sudah masuk `main`. Setelah itu:

```bash
cd C:\laragon\www\bloop
git checkout feat/login-page
git pull origin feat/login-page
git merge origin/main
```

Penjelasan: pindah ke branch kamu, ambil isi terbaru branch itu, lalu ambil `auth.css` terbaru dari `main`.

Buka Claude Code di folder `bloop`, lalu tempel prompt ini:

```
Aku pemula. Baca CLAUDE.md dan ikuti aturannya. Tugasku hanya dua file: isi HTML login.php dan README.md. Jangan ubah file lain, jangan menulis CSS baru, jangan menulis logika PHP selain memanggil helper yang sudah ada.
1. login.php: isi bagian "ISI HTML DI SINI" dengan menyalin struktur contoh di komentar atas assets/css/auth.css. Tab "Masuk" aktif, "Daftar" link ke register.php. Gambar kiri dari assets/img dengan latar bubblegum. Form sesuai komentar kontrak di login.php: method post, action proses/login.php, input username (value old('username')) dan password, tampilkan flash() dan error('login') di atas form dalam .alert hanya bila ada isinya, tombol .btn .btn--full "Masuk", teks kecil "Belum punya akun? Daftar" dengan link ke register.php.
2. README.md: deskripsi singkat Bloop (brand baju fiktif, proyek UTS Perancangan dan Pemrograman Website), anggota kelompok (Zaki, Aqil, Darrell), cara menjalankan di Laragon (www) dan XAMPP (htdocs), daftar 4 halaman, cara mencoba (daftar dulu lalu login dengan username dan password yang sama), catatan bahwa akun disimpan di session dan hilang bila browser ditutup.
Setelah selesai, jelaskan padaku dengan bahasa sederhana apa saja yang kamu ubah dan bagian mana di login.php yang terhubung ke PHP, supaya aku bisa menjelaskannya saat presentasi.
```

## 6. Cek hasilnya

1. Buka `http://localhost/bloop/register.php`, daftar dengan username dan password bebas.
2. Kamu akan diarahkan ke halaman login dengan pesan "Akun berhasil dibuat".
3. Coba login dengan password yang salah: harus muncul pesan "Username atau password salah".
4. Login dengan password yang benar: harus masuk ke dashboard.
5. Kecilkan jendela browser (atau tekan F12 lalu pilih mode HP) dan pastikan tampilan tetap rapi.

## 7. Simpan dan kirim ke GitHub

```bash
git status
```

Pastikan yang berubah hanya `login.php` dan `README.md`. Kalau ada file lain, jangan lanjut dulu, tanya Zaki.

```bash
git add login.php README.md
git commit -m "feat: tampilan login dan README"
git push origin feat/login-page
```

## 8. Cara membuat Pull Request (MR)

1. Buka https://github.com/ZakiAndriansa/bloop.
2. Biasanya muncul kotak kuning bertuliskan `feat/login-page had recent pushes` dengan tombol hijau **Compare & pull request**. Klik tombol itu.
   Kalau kotaknya tidak muncul: klik tab **Pull requests**, lalu tombol hijau **New pull request**.
3. Di bagian atas pastikan tertulis **base: `main`** ← **compare: `feat/login-page`**.
4. Judul: `Tampilan login dan README`. Deskripsi: tulis singkat apa yang kamu ubah.
5. Di kanan, bagian **Reviewers**, pilih Zaki atau Aqil.
6. Klik **Create pull request**.
7. Kabari Zaki di grup.

Kalau diminta revisi: perbaiki file di laptop (masih di branch `feat/login-page`), lalu ulangi langkah 7. PR otomatis ikut ter-update, tidak perlu membuat PR baru.

## 9. Cara cek konflik merge

### Cek di GitHub

Buka halaman PR kamu dan lihat kotak di bagian bawah:

1. **"This branch has no conflicts with the base branch"** (hijau) berarti aman. Tinggal tunggu Zaki merge.
2. **"This branch has conflicts that must be resolved"** berarti ada konflik. **Jangan klik apa-apa di web.** Lanjut ke langkah di bawah.

### Cek di laptop

```bash
git checkout feat/login-page
git fetch origin
git merge origin/main
```

1. Kalau keluar tulisan **"Already up to date"**, atau tidak ada kata **CONFLICT**, berarti aman. Jalankan `git push`.
2. Kalau keluar tulisan **`CONFLICT (content): Merge conflict in ...`**, berarti ada konflik. Lakukan ini:
   1. Jangan panik dan jangan mengetik perintah lain dulu.
   2. Screenshot tulisan di terminal.
   3. Batalkan merge supaya kondisi kembali seperti semula:

      ```bash
      git merge --abort
      ```

   4. Kirim screenshot ke Zaki. Zaki akan membantu menyelesaikannya.

Kamu juga boleh minta tolong Claude: tulis *"Ada konflik merge di branch feat/login-page. Jelaskan pelan-pelan cara menyelesaikannya, dan jangan ubah file selain login.php dan README.md."*

## 10. Rutin sebelum mulai kerja setiap hari

```bash
cd C:\laragon\www\bloop
git checkout feat/login-page
git fetch origin
git merge origin/main
```

Dengan begitu kamu selalu memakai kode terbaru dari teman-teman.
