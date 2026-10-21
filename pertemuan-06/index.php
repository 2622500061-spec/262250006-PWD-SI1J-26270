<?php
// P6: PHP Dasar dan Pemrograman Sisi Peladen.
// Identitas disesuaikan dengan pemilik proyek.
$nim = "2622500061";
$namaMahasiswa = "Muhammad Rico";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 2;
$ipk = 3.75;
$statusAktif = true;
$catatanTambahan = null;

const NAMA_MATA_KULIAH = "Pemrograman Web Dasar";
const PROFIL_GITHUB = "2622500061-spec";

// Bagian 2: Operator.
$batasSemester = 8;
$sisaSemester = $batasSemester - $semester;
$semesterValid = $semester >= 1 && $semester <= $batasSemester;
$statusSemester = ($semesterValid && $statusAktif)
  ? "Sesuai rentang"
  : "Perlu diperiksa";

// Bagian 3: Percabangan if-elseif-else.
if ($semester < 3) {
  $keteranganSemester = "Semester awal";
} elseif ($semester <= 6) {
  $keteranganSemester = "Semester menengah";
} else {
  $keteranganSemester = "Semester akhir";
}

// Operator ternary untuk menentukan nama program studi.
$namaProdi = ($programStudi == "SI")
  ? "Sistem Informasi"
  : (($programStudi == "TI") ? "Teknik Informatika" : "Lainnya");

// Bagian 4: Percabangan switch-case-default.
switch ($programStudi) {
  case "SI":
    $fokusProgramStudi = "Sistem informasi dan proses bisnis";
    break;
  case "TI":
    $fokusProgramStudi = "Komputasi dan pengembangan perangkat lunak";
    break;
  default:
    $fokusProgramStudi = "Belum ditentukan";
}
?><!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Profil mahasiswa Muhammad Rico untuk praktikum Pemrograman Web Dasar P6 dengan PHP dasar.">
  <title>Profil Mahasiswa | Muhammad Rico</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="header-top">
      <div>
        <h1>Profil Mahasiswa</h1>
        <p>
          Halo, selamat datang di halaman profil praktikum
          Pemrograman Web Dasar saya.
        </p>
      </div>

      <button
        class="nav-toggle"
        id="navToggle"
        type="button"
        aria-label="Buka navigasi"
        aria-controls="navMenu"
        aria-expanded="false"
      >
        &#9776;
      </button>
    </div>

    <nav aria-label="Navigasi utama">
      <ul id="navMenu">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#about">Tentang Saya</a></li>
        <li><a href="#target">Target Belajar</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Beranda</h2>
      <p>
        Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>. Saya sedang
        mempelajari mata kuliah <strong><?php print NAMA_MATA_KULIAH; ?></strong>
        pada tahun akademik <?php echo $tahunAkademik; ?>.
      </p>
      <p>
        Halaman ini dikembangkan secara bertahap menggunakan HTML, CSS,
        JavaScript, dan PHP sebagai bagian dari praktikum Pemrograman Web Dasar.
      </p>
      <img
        src="img/foto-profil.jpg"
        alt="Foto profil mahasiswa Muhammad Rico"
        width="240"
        loading="lazy"
      >
    </section>

    <section id="about">
      <h2>Tentang Saya</h2>
      <article>
        <h3>Profil Singkat</h3>
        <p>Sisa semester hingga batas: <?php echo $sisaSemester; ?></p>
        <p>Pemeriksaan rentang semester: <?php echo $statusSemester; ?></p>
        <p>Semester: <?php echo $semester . " (" . $keteranganSemester . ")"; ?></p>
        <p>Program Studi: <?php echo $namaProdi . " (" . $programStudi . ")"; ?></p>
        <p>Status mahasiswa: <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?></p>
        <p>Fokus program studi: <?php echo $fokusProgramStudi; ?></p>
        <p>IPK: <?php echo number_format($ipk, 2, ',', '.'); ?></p>
        <p>Catatan tambahan: <?php echo $catatanTambahan === null ? "Belum ada" : $catatanTambahan; ?></p>

        <h3 id="target">Target Belajar (Perulangan for)</h3>
        <ol>
          <?php
          // Perulangan for tanpa array, sesuai ruang lingkup modul P6.
          for ($i = 1; $i <= 5; $i++) {
            echo "<li>Target belajar ke-" . $i . ": ";
            switch ($i) {
              case 1:
                echo "Memahami sintaks dasar PHP.";
                break;
              case 2:
                echo "Menggunakan variabel dan konstanta.";
                break;
              case 3:
                echo "Menerapkan operator dan percabangan.";
                break;
              case 4:
                echo "Menggunakan perulangan for dan while.";
                break;
              default:
                echo "Belum dipetakan";
                break;
            }
            echo "</li>";
          }
          ?>
        </ol>

        <h3>Semester (Perulangan while)</h3>
        <ol>
          <?php
          $nomorSemester = 1;
          while ($nomorSemester <= 3) {
            echo "<li>Semester " . $nomorSemester . "</li>";
            $nomorSemester++;
          }
          ?>
        </ol>
      </article>
    </section>

    <section id="contact">
      <h2>Kontak</h2>
      <p>
        Email:
        <a href="mailto:2622500061@mahasiswa.atmaluhur.ac.id">
          2622500061@mahasiswa.atmaluhur.ac.id
        </a>
      </p>
      <p>
        Kunjungi
        <a
          href="https://github.com/<?= PROFIL_GITHUB ?>"
          target="_blank"
          rel="noopener noreferrer"
        >
          profil GitHub saya
        </a>.
      </p>

      <!-- Pemrosesan formulir menggunakan PHP belum menjadi ruang lingkup P6. -->
      <form id="contactForm" action="index.php" method="get" novalidate>
        <div class="form-group">
          <label for="nama">Nama Lengkap</label>
          <input
            class="input-form"
            type="text"
            id="nama"
            name="nama"
            placeholder="Masukkan nama lengkap"
            minlength="3"
            maxlength="50"
            autocomplete="name"
            required
          >
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input
            class="input-form"
            type="email"
            id="email"
            name="email"
            placeholder="nama@email.com"
            autocomplete="email"
            required
          >
        </div>

        <div class="form-group">
          <label for="semester">Semester</label>
          <input
            class="input-form"
            type="number"
            id="semester"
            name="semester"
            min="1"
            max="14"
            required
          >
        </div>

        <div class="form-group">
          <label for="tanggal">Tanggal Kunjungan</label>
          <input
            class="input-form"
            type="date"
            id="tanggal"
            name="tanggal"
            required
          >
        </div>

        <fieldset class="form-group choice-group">
          <legend>Jenis Pesan</legend>
          <div class="choice-option">
            <input type="radio" id="pertanyaan" name="jenis_pesan" value="pertanyaan" required>
            <label for="pertanyaan">Pertanyaan</label>
          </div>
          <div class="choice-option">
            <input type="radio" id="saran" name="jenis_pesan" value="saran">
            <label for="saran">Saran</label>
          </div>
        </fieldset>

        <fieldset class="form-group choice-group">
          <legend>Topik yang Diminati</legend>
          <div class="choice-option">
            <input type="checkbox" id="minat-html" name="minat" value="HTML">
            <label for="minat-html">HTML</label>
          </div>
          <div class="choice-option">
            <input type="checkbox" id="minat-css" name="minat" value="CSS">
            <label for="minat-css">CSS</label>
          </div>
        </fieldset>

        <div class="form-group">
          <label for="prodi">Program Studi</label>
          <select class="input-form" id="prodi" name="prodi" required>
            <option value="">-- Pilih Program Studi --</option>
            <option value="SI">Sistem Informasi</option>
            <option value="TI">Teknik Informatika</option>
          </select>
        </div>

        <div class="form-group">
          <label for="pesan">Pesan</label>
          <textarea
            class="input-form"
            id="pesan"
            name="pesan"
            maxlength="300"
            placeholder="Tulis pesan Anda"
            required
          ></textarea>
        </div>

        <div class="form-actions">
          <button type="submit">Kirim</button>
          <button class="button-secondary" type="reset">Batal</button>
        </div>
        <p id="formFeedback" role="status" aria-live="polite"></p>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; <?= date("Y") ?> <?php echo $namaMahasiswa; ?> [<?= $nim ?>]</p>
  </footer>
  <script src="script.js"></script>
</body>
</html>
