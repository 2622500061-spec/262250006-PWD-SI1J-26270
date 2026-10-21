# P6 - PHP Dasar dan Pemrograman Sisi Peladen

## Deskripsi
Proyek ini melanjutkan artefak P5 milik Muhammad Rico pada mata kuliah Pemrograman Web Dasar, Tahun Ajaran 2026/2027 Semester Gasal. Struktur HTML telah dipindahkan ke `index.php` agar PHP dapat diproses melalui peladen web lokal. CSS responsif, JavaScript navigasi dan validasi sisi klien, serta gambar profil dari P5 tetap dipertahankan.

## Identitas Proyek
- Nama: Muhammad Rico
- NIM: 2622500061
- Program Studi: Sistem Informasi
- Tahun Akademik: 2026/2027

## Struktur Folder
```text
pertemuan-06/
├── img/
│   ├── foto-profil.jpg  # salin dari baseline P5/P4
│   └── LETakkan-foto-profil-dari-P4-di-folder-ini.txt
├── index.php
├── style.css
├── script.js
└── README.md
```

`index.html` tidak dipertahankan sebagai halaman utama di folder P6. Fungsinya digantikan oleh `index.php`. Jangan menghapus artefak P5 yang asli di `pertemuan-05/`.

## Fitur dan Pengembangan
- **Baseline P5:** mempertahankan bagian Beranda, Tentang Saya, Target Belajar, Kontak, navigasi responsif, CSS, JavaScript, dan validasi formulir sisi klien.
- **Variabel:** mendefinisikan NIM, nama mahasiswa, program studi, tahun akademik, semester, IPK, status aktif, dan catatan tambahan.
- **Konstanta:** menggunakan `NAMA_MATA_KULIAH` dan `PROFIL_GITHUB`.
- **Tipe data:** mempraktikkan string, integer, float, boolean, dan NULL.
- **Operator:** menerapkan aritmetika untuk menghitung sisa semester, operator perbandingan, operator logika, operator penggabungan string, dan ternary.
- **Percabangan:** menerapkan `if-elseif-else` untuk keterangan semester serta `switch-case-default` untuk fokus program studi dan target belajar.
- **Perulangan:** menerapkan `for` untuk menghasilkan lima target belajar dan `while` untuk menghasilkan tiga nomor semester.
- **Keluaran PHP:** menggunakan `echo`, `print`, `<?= ... ?>`, `number_format()`, `date("Y")`, dan pemeriksaan nilai `NULL`.
- **Formulir:** atribut `action` disesuaikan menjadi `index.php`. Pemrosesan data formulir di sisi server belum diterapkan karena materi tersebut termasuk P7. JavaScript P5 masih melakukan validasi sisi klien.

## Persiapan dan Cara Menjalankan
1. Salin folder `pertemuan-05/` ke folder baru `pertemuan-06/`. Jangan mengubah folder P5.
2. Ganti nama `index.html` pada salinan P6 menjadi `index.php` dan gunakan isi berkas P6 ini.
3. Pertahankan `style.css` dan `script.js` dari P5.
4. Salin foto profil yang dimiliki dari baseline P5/P4 ke `pertemuan-06/img/foto-profil.jpg`. Berkas foto tidak disertakan dalam paket ini karena harus memakai aset asli milik proyek.
5. Tempatkan repositori atau folder proyek di document root Laragon, biasanya `C:\laragon\www\`.
6. Buka Laragon dan klik **Start All**. Pastikan Apache berjalan.
7. Akses folder melalui alamat `http://localhost/` diikuti path folder proyek dan `pertemuan-06/`. Contoh jika repositori berada di `C:\laragon\www\262250006-PWD-SI1J-26270\`: `http://localhost/262250006-PWD-SI1J-26270/pertemuan-06/`.
8. Jangan membuka `index.php` langsung melalui `file:///...`; PHP memerlukan pemrosesan oleh server. GitHub Pages juga tidak mengeksekusi PHP.

## Keluaran yang Diharapkan dari Nilai Awal
Dengan konfigurasi contoh pada kode, halaman seharusnya menampilkan:
- Nama: Muhammad Rico.
- Mata kuliah: Pemrograman Web Dasar.
- Tahun akademik: 2026/2027.
- Sisa semester hingga batas 8: 6.
- Pemeriksaan rentang semester: Sesuai rentang.
- Semester: 2 (Semester awal).
- Program studi: Sistem Informasi (SI).
- Status mahasiswa: Aktif.
- Fokus program studi: Sistem informasi dan proses bisnis.
- IPK: 3,75.
- Catatan tambahan: Belum ada.
- Lima target belajar, dengan target kelima bertuliskan `Belum dipetakan`.
- Tiga nomor semester yang dihasilkan dengan perulangan `while`.
- Footer dengan tahun dari `date("Y")`, nama, dan NIM.

## Pengujian dan Debugging
Pemeriksaan awal yang telah dilakukan saat menyusun paket:
- `php -l index.php`: **lulus**, tidak ditemukan galat sintaks PHP.
- `node --check script.js`: **lulus**, tidak ditemukan galat sintaks JavaScript.
- Halaman dirender menggunakan server PHP lokal sementara: **lulus** untuk pemeriksaan keluaran nama, mata kuliah, sisa semester, percabangan, IPK, target `for`, keluaran `while`, tahun footer, `action="index.php"`, serta memastikan kode PHP tidak terkirim mentah ke browser.

Pemeriksaan tersebut belum menggantikan pengujian pada lingkungan Laragon milik pengguna. Jalankan proyek melalui Laragon/localhost dan catat hasil aktual di tabel berikut. Jangan menandai kasus sebagai berhasil sebelum menjalankannya pada lingkungan yang digunakan.

```bash
php -l index.php
```

| Fitur | Langkah uji | Status awal |
|---|---|---|
| Eksekusi PHP | Akses `index.php` melalui localhost; periksa halaman dimuat dan kode PHP tidak tampil mentah. | Belum diuji di Laragon |
| Variabel dan konstanta | Periksa nama mahasiswa, mata kuliah, tahun akademik, dan tautan GitHub. | Belum diuji di Laragon |
| Operator aritmetika | Periksa sisa semester bernilai 6. | Belum diuji di Laragon |
| Operator dan status | Periksa status rentang semester dengan nilai awal 2; lalu uji nilai 9 dan pulihkan menjadi 2. | Belum diuji di Laragon |
| `if-elseif-else` | Uji nilai semester 2, 4, dan 7 untuk keterangan awal, menengah, dan akhir; kembalikan menjadi 2. | Belum diuji di Laragon |
| Ternary program studi/status | Uji `SI` dan status `true`; bila diuji alternatif, pulihkan nilai awal sesudahnya. | Belum diuji di Laragon |
| `switch` program studi | Uji `SI`, `TI`, dan kode tak dikenal untuk melihat cabang `default`; pulihkan menjadi `SI`. | Belum diuji di Laragon |
| Perulangan `for` | Periksa daftar berisi lima target. | Belum diuji di Laragon |
| Perulangan `while` | Periksa daftar Semester 1, Semester 2, dan Semester 3. | Belum diuji di Laragon |
| Fungsi keluaran | Periksa IPK `3,75`, catatan `Belum ada`, serta tahun dinamis di footer. | Belum diuji di Laragon |
| Fitur P5 | Uji tombol hamburger, navigasi responsif, validasi formulir, dan pesan umpan balik. | Belum diuji di Laragon |

Catat hasil aktual, pesan galat, dan perbaikan setelah pengujian benar-benar dilakukan. Jangan mengubah status menjadi berhasil hanya berdasarkan kode yang terlihat benar.

## Riwayat Pengembangan
- **Menyiapkan baseline P6:** menyalin artefak P5 ke direktori `pertemuan-06/` tanpa mengubah folder P5.
- **Mengubah halaman utama:** menggunakan `index.php` agar PHP diproses server.
- **Menghasilkan konten dinamis:** menambahkan variabel, konstanta, operator, percabangan, perulangan, dan fungsi bawaan PHP.
- **Menyesuaikan formulir:** mengarahkan atribut `action` ke `index.php`, tanpa menerapkan pemrosesan formulir PHP yang merupakan materi P7.

Catat commit yang benar-benar dibuat, hasil pengujian aktual, dan proses push setelah tahap selesai. Contoh pesan commit per tahap: `Siapkan baseline P6 dari artefak P5`, `Tambahkan variabel dan konstanta PHP`, `Terapkan percabangan dan perulangan PHP`, dan `Dokumentasikan pengujian P6`. Jangan mencatat commit atau push yang belum dilakukan.

## Batasan P6
P6 memperkenalkan PHP dasar dan keluaran sisi peladen. Validasi atau pemrosesan data formulir menggunakan PHP, session, dan pengelolaan data bukan bagian implementasi ini karena dibahas pada P7.
