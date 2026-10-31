# P7 - Pemrosesan Formulir dengan PHP, Validasi Sisi Peladen, dan PRG

## Identitas Proyek
- Nama: Muhammad Rico
- NIM: 2622500061
- Program Studi: Sistem Informasi (SI)
- Mata kuliah: Pemrograman Web Dasar (IS205)
- Tahun akademik: 2026/2027 Semester Gasal

## Deskripsi
Pertemuan 7 melanjutkan artefak P6 dengan mempelajari pengiriman formulir menggunakan GET dan POST, validasi sisi peladen, normalisasi masukan, pengamanan keluaran HTML menggunakan `htmlspecialchars()`, session, dan pola Post-Redirect-Get (PRG). Pengembangan dilakukan pada salinan di direktori `pertemuan-07/` tanpa mengubah artefak `pertemuan-06/`.

## Struktur Berkas
```text
pertemuan-07/
├── index.php       # formulir utama POST, validasi PHP, session, dan PRG
├── indexGet.php    # demonstrasi formulir GET
├── style.css       # stylesheet dari baseline P6
├── script.js       # navigasi dan validasi sisi klien P7
├── README.md
└── img/
    └── foto-profil.jpg
```

## Cara Menjalankan
1. Salin folder `pertemuan-07/` ke root repositori, sejajar dengan `pertemuan-06/`.
2. Pastikan `img/foto-profil.jpg` tersedia. Arsip P6 yang dikirim hanya memuat catatan lokasi foto, bukan berkas JPG asli. File pada paket ini adalah penanda sementara; ganti dengan foto asli dari baseline P5/P4 jika tersedia.
3. Tempatkan repositori di document root Laragon, biasanya `C:\laragon\www\`.
4. Buka Laragon, klik **Start All**, dan pastikan Apache berjalan.
5. Akses halaman utama P7 melalui `http://localhost/` diikuti nama folder repositori dan `/pertemuan-07/`.
6. Untuk demonstrasi GET, buka `indexGet.php` pada folder yang sama.

Contoh jika folder repositori bernama `262250006-PWD-SI1J-26270`:
- P7 POST: `http://localhost/262250006-PWD-SI1J-26270/pertemuan-07/`
- Demonstrasi GET: `http://localhost/262250006-PWD-SI1J-26270/pertemuan-07/indexGet.php`

Jangan membuka berkas PHP langsung melalui `file:///`; PHP harus dijalankan melalui peladen lokal.

## Pengembangan P7
- GET dibahas melalui `indexGet.php` dan variabel superglobal `$_GET`.
- Formulir utama `index.php` menggunakan `method="post"` dan `$_POST`.
- Data teks dinormalisasi menggunakan `trim()`.
- Validasi PHP memeriksa kelengkapan, format email, bilangan semester 1 sampai 14, jenis pesan, program studi, dan topik yang diizinkan.
- Checkbox pada formulir utama menggunakan `name="minat[]"`.
- Keluaran data formulir diamankan dengan `htmlspecialchars()`; pesan ditampilkan dengan `nl2br()` setelah di-escape.
- Session menyimpan data formulir dan pesan kesalahan setelah proses POST.
- PRG menggunakan `header('Location: index.php')` dan `exit` agar pemuatan ulang halaman tidak mengirim ulang POST.
- Tidak ada penyimpanan basis data. Pembahasan tetap mengikuti ruang lingkup P7.

## Pengujian
Jalankan setiap pengujian melalui localhost dan catat hasil aktual setelah diperiksa di browser.

| Kasus | Langkah | Hasil yang diharapkan | Hasil aktual |
|---|---|---|---|
| Eksekusi P7 | Buka `index.php` melalui localhost | Halaman tampil dan PHP diproses | Belum diuji di Laragon pengguna |
| Demonstrasi GET | Buka `indexGet.php`, isi formulir, lalu kirim | Parameter tampil pada URL dan nama diterima | Belum diuji di Laragon pengguna |
| POST valid | Isi seluruh kolom, pilih minimal satu topik, lalu kirim | Redirect ke `index.php` dan data tampil pada bagian Data yang Diterima Peladen | Belum diuji di Laragon pengguna |
| PRG | Muat ulang halaman setelah POST | Halaman dimuat tanpa mengirim ulang POST | Belum diuji di Laragon pengguna |
| Validasi kelengkapan | Nonaktifkan sementara `script.js`, lalu kirim form kosong | Pesan kesalahan PHP ditampilkan | Belum diuji di Laragon pengguna |
| Validasi email | Kirim email dengan format tidak valid | Pesan format email tidak valid ditampilkan | Belum diuji di Laragon pengguna |
| Validasi semester | Uji nilai di luar 1 sampai 14 atau bukan bilangan bulat | PHP menolak nilai semester | Belum diuji di Laragon pengguna |
| Pilihan topik | Uji pilihan HTML, CSS, keduanya, dan tanpa pilihan | Nilai yang diizinkan diterima, pilihan kosong ditolak | Belum diuji di Laragon pengguna |
| Pengamanan keluaran | Isi pesan dengan `<b>Mahasiswa</b>` | Tag ditampilkan sebagai teks biasa | Belum diuji di Laragon pengguna |

Jangan mencatat pengujian sebagai berhasil sebelum hasilnya benar-benar diamati melalui browser.

## Git/GitHub
Setelah pengujian dan dokumentasi selesai, jalankan dari root repositori:
```bash
git status
git add pertemuan-07
git status
git commit -m "menerapkan session dan pola PRG pada P7"
git push origin main
```
Perintah tersebut merupakan panduan. Commit dan push dilakukan sendiri setelah hasil diuji.
## Perbaikan validasi topik
JavaScript memeriksa checkbox yang dicentang dan mendukung kedua nama input: `minat` pada `indexGet.php` (GET) serta `minat[]` pada `index.php` (POST). Pemanggilan `script.js?v=2` digunakan agar browser mengambil file JavaScript terbaru. Jika browser masih memakai cache lama, lakukan hard refresh dengan `Ctrl+Shift+R`.
