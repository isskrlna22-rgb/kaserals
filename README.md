# KASERALS — Kas kelas Digitals

**Aplikasi Web Pengelolaan Kas Kelas Digital**

## 1. Deskripsi Aplikasi

KASERALS (Kas Era Digitals) merupakan aplikasi berbasis web yang dikembangkan untuk membantu pengelolaan kas kelas secara digital. Aplikasi ini mendukung pencatatan pembayaran kas mingguan, verifikasi pembayaran, pemantauan status pembayaran, pengelolaan pengeluaran, dan penyampaian pengumuman kelas.

## 2. Tujuan Aplikasi

- Mempermudah pengelolaan kas kelas.
- Membantu bendahara mencatat dan memverifikasi pembayaran.
- Memudahkan siswa memantau status pembayaran kas.
- Membantu wali kelas memantau pembayaran siswa.
- Menyediakan pencatatan transaksi dan pengeluaran kas.

## 3. Hak Akses Pengguna

KASERALS memiliki empat role pengguna:

- **ADMIN:** mengelola sistem dan data sesuai hak akses.
- **BENDAHARA:** mengelola pembayaran dan transaksi kas.
- **WALI KELAS:** memantau informasi pembayaran kelas.
- **SISWA:** melihat informasi dan status pembayaran pribadi.

## 4. Fitur Utama

- Login dan autentikasi pengguna.
- Dashboard berdasarkan role.
- Pengelolaan data siswa.
- Pembayaran kas mingguan.
- Verifikasi pembayaran.
- Pemantauan status pembayaran.
- Riwayat transaksi.
- Pengelolaan pengeluaran.
- Pengumuman kelas.
- Laporan keuangan.

## 5. Teknologi yang Digunakan

- Laravel 12
- PHP 8.2
- MySQL
- Visual Studio Code
- Composer
- Node.js dan npm
- Vite

## 6. Persyaratan Sistem

- PHP 8.2 atau versi yang kompatibel.
- Composer.
- Node.js dan npm.
- MySQL atau MariaDB.
- Browser web.

## 7. Cara Instalasi

1. Clone atau salin repository KASERALS.
2. Buka folder proyek melalui terminal.
3. Jalankan `composer install`.
4. Salin `.env.example` menjadi `.env`.
5. Buat database MySQL.
6. Atur koneksi database pada file `.env`.
7. Jalankan `php artisan key:generate`.
8. Jalankan `php artisan migrate` jika database tujuan belum memiliki struktur tabel.
9. Jalankan `npm install`.
10. Jalankan `npm run build`.
11. Jalankan `php artisan serve`.
12. Buka alamat lokal yang ditampilkan terminal melalui browser.

**Catatan:** Jangan menjalankan `php artisan migrate:fresh` pada database yang berisi data penting karena perintah tersebut dapat menghapus tabel beserta datanya.

## 8. Struktur Database

KASERALS menggunakan database MySQL dengan tabel utama:

- `users`
- `siswa`
- `pembayaran_kas`
- `detail_pembayaran`
- `transaksi`
- `pengeluaran`
- `pengaturan_sistems`
- `pengumuman`

## 9. Akun Demo

Akun demo digunakan untuk kebutuhan pengujian dan demonstrasi aplikasi. Informasi akun diberikan secara terpisah kepada pihak yang berwenang.

Jangan mencantumkan password asli atau kredensial sensitif di repository publik.

## 10. Tim Pengembang

**Nama Tim:** FINORA

**Anggota:**
- Iis Karlina
- Nesya Shahira

**Sekolah:** SMK Budi Bakti Ciwidey  
**Program Keahlian:** PPLG

## 11. Status Proyek

KASERALS merupakan proyek aplikasi web pengelolaan kas kelas digital. Tahap finalisasi mencakup pengujian akhir, dokumentasi, persiapan deployment, dan persiapan demonstrasi aplikasi.
