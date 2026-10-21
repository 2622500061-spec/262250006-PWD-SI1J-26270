# P5 - JavaScript Dasar, DOM, Event, dan Validasi Sisi Klien

## Deskripsi
Pengembangan halaman profil mahasiswa dari artefak P4 untuk memenuhi praktik Pertemuan 5 Pemrograman Web Dasar. Pengembangan P5 menambahkan interaksi navigasi responsif, penggunaan DOM dan event listener, validasi formulir sisi klien, serta umpan balik kepada pengguna.

## Struktur Berkas
```text
pertemuan-05/
├── img/
│   └── foto-profil.jpg
├── index.html
├── style.css
├── script.js
└── README.md
```

Pastikan foto profil dari baseline P4 disalin ke `img/foto-profil.jpg`. Berkas foto tidak disertakan dalam paket ini karena perlu menggunakan aset yang sudah dimiliki pada proyek P4.

## Fitur dan Pengembangan
- **Baseline P4:** mempertahankan bagian Beranda, Tentang Saya, Target Belajar, Kontak, formulir, serta gaya CSS responsif.
- **Navigasi responsif:** menambahkan tombol `navToggle`, menu `navMenu`, dan perubahan status `aria-expanded` melalui JavaScript.
- **DOM dan event:** memakai `getElementById()`, `querySelector()`, `querySelectorAll()`, `classList`, `addEventListener()`, `value`, dan `textContent`.
- **Validasi formulir:** nama 3-50 karakter, pola dasar email, semester 1-14, tanggal wajib diisi, satu jenis pesan wajib dipilih, minimal satu topik wajib dipilih, program studi wajib dipilih, dan pesan wajib diisi maksimal 300 karakter.
- **Umpan balik:** pesan kesalahan ditampilkan pada formulir; pesan dihapus saat input berubah atau tombol Batal/reset digunakan. Pesan sukses hanya menyatakan validasi sisi klien berhasil, bukan data telah dikirim atau disimpan di server.

## Cara Menjalankan
1. Simpan seluruh berkas pada folder `pertemuan-05/` di repositori.
2. Salin `img/foto-profil.jpg` dari artefak P4 ke folder `pertemuan-05/img/`.
3. Buka `pertemuan-05/index.html` pada peramban.
4. Untuk memeriksa JavaScript, buka Browser DevTools dan lihat tab Console.

## Pengujian
Status awal setelah penyusunan kode: **belum diuji langsung pada peramban di komputer pengguna**. Jalankan kasus berikut dan isi hasil aktual setelah pengujian dilakukan.

| Fitur | Langkah uji | Hasil aktual |
|---|---|---|
| Navigasi mobile | Pada lebar layar kecil, klik tombol menu untuk membuka dan menutup navigasi. | Belum diuji |
| Navigasi desktop | Lebarkan jendela hingga 768px atau lebih dan pastikan menu tampil mendatar. | Belum diuji |
| Nama | Uji nama 2 karakter, 3 karakter, dan lebih dari 50 karakter. | Belum diuji |
| Email | Uji email tanpa `@`, tanpa domain, dan email dengan format dasar yang benar. | Belum diuji |
| Semester | Uji kosong, 0, 1, 14, dan 15. Nilai desimal dalam rentang 1-14 juga dapat lolos sesuai aturan modul. | Belum diuji |
| Tanggal | Kirim formulir dengan tanggal kosong, lalu isi tanggal dan coba lagi. | Belum diuji |
| Jenis pesan | Kirim tanpa memilih radio, kemudian pilih Pertanyaan atau Saran. | Belum diuji |
| Topik | Kirim tanpa mencentang topik, lalu pilih setidaknya satu checkbox. | Belum diuji |
| Program studi | Biarkan opsi awal tetap dipilih, lalu pilih Sistem Informasi atau Teknik Informatika. | Belum diuji |
| Pesan | Uji pesan kosong/spasi dan pesan lebih dari 300 karakter. | Belum diuji |
| Umpan balik | Pastikan pesan error/sukses muncul sesuai kondisi dan terhapus saat input berubah atau form di-reset. | Belum diuji |

## Riwayat Pengembangan
- **Menyiapkan interaksi P5:** menambahkan struktur tombol navigasi, area umpan balik formulir, dan berkas JavaScript eksternal.
- **Menambahkan navigasi responsif:** mengelola kelas `nav-open` serta atribut ARIA pada tombol navigasi.
- **Menambahkan validasi sisi klien:** memeriksa setiap aturan formulir dan menampilkan umpan balik.

Catat pesan commit dan hasil pengujian yang benar-benar dilakukan setelah perubahan disimpan ke Git. Jangan menandai pengujian sebagai berhasil sebelum dijalankan.

## GitHub Pages
URL: [https://2622500061-spec.github.io/262250006-PWD-SI1J-26270/pertemuan-05/](https://2622500061-spec.github.io/262250006-PWD-SI1J-26270/pertemuan-05/)
