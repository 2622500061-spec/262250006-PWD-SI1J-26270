<?php
session_start();

// P7: penggunaan POST dan normalisasi data masukan.
$nama = trim((string) ($_POST['nama'] ?? ''));
$email = trim((string) ($_POST['email'] ?? ''));
$semesterForm = trim((string) ($_POST['semester'] ?? ''));
$jenisPesan = trim((string) ($_POST['jenis_pesan'] ?? ''));
$prodi = trim((string) ($_POST['prodi'] ?? ''));
$pesan = trim((string) ($_POST['pesan'] ?? ''));
$tanggal = trim((string) ($_POST['tanggal'] ?? ''));
$minat = $_POST['minat'] ?? [];

$pesanKesalahan = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Memeriksa keberadaan dan kelengkapan data.
    if (trim($nama ?? '') === '') {
        $pesanKesalahan .= 'Nama lengkap wajib diisi. ';
    }

    if (trim($email) === '') {
        $pesanKesalahan .= 'Email wajib diisi. ';
    }

    if (trim($semesterForm) === '') {
        $pesanKesalahan .= 'Semester wajib diisi. ';
    }

    if (trim($tanggal) === '') {
        $pesanKesalahan .= 'Tanggal kunjungan wajib diisi. ';
    }

    if ($jenisPesan === '') {
        $pesanKesalahan .= 'Jenis pesan wajib dipilih. ';
    }

    if ($prodi === '') {
        $pesanKesalahan .= 'Program studi wajib dipilih. ';
    }

    if (trim($pesan) === '') {
        $pesanKesalahan .= 'Pesan wajib diisi. ';
    }

    if (empty($minat)) {
        $pesanKesalahan .= 'Minat wajib dipilih minimal satu. ';
    }

    // Memvalidasi format dan tipe data.
    if (trim($semesterForm) !== '') {
        $semesterValidForm = filter_var(
            $semesterForm,
            FILTER_VALIDATE_INT
        );

        if (
            $semesterValidForm === false ||
            $semesterValidForm < 1 ||
            $semesterValidForm > 14
        ) {
            $pesanKesalahan .= 'Semester harus berupa bilangan bulat antara 1 dan 14. ';
        }
    }

    if (trim($email) !== '') {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $pesanKesalahan .= 'Format email tidak valid. ';
        }
    }

    // Memvalidasi nilai pilihan formulir.
    if (!in_array($jenisPesan, ['pertanyaan', 'saran'], true)) {
        $pesanKesalahan .= 'Jenis pesan tidak valid. ';
    }

    if (!in_array($prodi, ['SI', 'TI'], true)) {
        $pesanKesalahan .= 'Program studi tidak valid. ';
    }

    $minatDiizinkan = ['HTML', 'CSS'];

    if (!is_array($minat)) {
        $pesanKesalahan .= 'Format pilihan topik tidak valid. ';
    } else {
        foreach ($minat as $topik) {
            if (!in_array($topik, $minatDiizinkan, true)) {
                $pesanKesalahan .= 'Pilihan topik tidak valid. ';
                break;
            }
        }
    }
}

// P6: PHP Dasar dan Pemrograman Sisi Peladen.
// Identitas disesuaikan dengan pemilik proyek.
$nim = "2622500061";
$namaMahasiswa = "Muhammad Rico";
$programStudi = "SI";
$tahunAkademik = "2026/2027";
$semester = 1;
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
    : (($programStudi == "TI")
        ? "Teknik Informatika"
        : "Lainnya");

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

// P7: menyimpan data dan pesan validasi ke session, kemudian menerapkan PRG.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['pesanKesalahan'] = $pesanKesalahan;
    $_SESSION['nama'] = $nama;
    $_SESSION['email'] = $email;
    $_SESSION['semester'] = $semesterForm;
    $_SESSION['tanggal'] = $tanggal;
    $_SESSION['jenis_pesan'] = $jenisPesan;
    $_SESSION['prodi'] = $prodi;
    $_SESSION['minat'] = $minat;
    $_SESSION['pesan'] = $pesan;

    header('Location: index.php');
    exit;
}

// Mengambil data session setelah pengalihan.
$pesanKesalahan = $_SESSION['pesanKesalahan'] ?? '';
$nama = $_SESSION['nama'] ?? '';
$email = $_SESSION['email'] ?? '';
$semesterForm = $_SESSION['semester'] ?? '';
$tanggal = $_SESSION['tanggal'] ?? date("Y-m-d");
$jenisPesan = $_SESSION['jenis_pesan'] ?? '';
$prodi = $_SESSION['prodi'] ?? '';
$minat = $_SESSION['minat'] ?? '';
$pesan = $_SESSION['pesan'] ?? '';
?>

<!DOCTYPE html>
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
            Halo, saya <strong><?php echo $namaMahasiswa; ?></strong>.
            Saya sedang mempelajari mata kuliah
            <strong><?php print NAMA_MATA_KULIAH; ?></strong>
            pada tahun akademik <?php echo $tahunAkademik; ?>.
        </p>

        <p>
            Halaman ini dikembangkan secara bertahap menggunakan HTML, CSS,
            JavaScript, dan PHP sebagai bagian dari praktikum
            Pemrograman Web Dasar.
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

            <p>
                Sisa semester hingga batas:
                <?php echo $sisaSemester; ?>
            </p>

            <p>
                Pemeriksaan rentang semester:
                <?php echo $statusSemester; ?>
            </p>

            <p>
                Semester:
                <?php echo $semester . " (" . $keteranganSemester . ")"; ?>
            </p>
 
            <p>
                Saya mahasiswa Program Studi Sistem Informasi.
            </p>

            <p>
                Program Studi:
                <?php echo $namaProdi . " (" . $programStudi . ")"; ?>
            </p>

            <p>
                Status mahasiswa:
                <?php echo $statusAktif ? "Aktif" : "Tidak aktif"; ?>
            </p>

            <p>
                Fokus program studi:
                <?php echo $fokusProgramStudi; ?>
            </p>

            <p>
                IPK:
                <?php echo number_format($ipk, 2, ',', '.'); ?>
            </p>

            <p>
                Catatan tambahan:
                <?php
                echo $catatanTambahan === null
                    ? "Belum ada"
                    : $catatanTambahan;
                ?>
            </p>

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

        <?php if ($pesanKesalahan !== ''): ?>
            <p class="form-feedback-error">
                <?= htmlspecialchars($pesanKesalahan, ENT_QUOTES, 'UTF-8') ?>
            </p>
            <?php
            unset(
                $_SESSION['pesanKesalahan']
            );
            ?>
        <?php endif; ?>

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

        <!-- Formulir utama P7 menggunakan metode POST. -->
        <form id="contactForm" action="index.php" method="post" novalidate>
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
                    <input
                        type="radio"
                        id="pertanyaan"
                        name="jenis_pesan"
                        value="pertanyaan"
                        required
                    >
                    <label for="pertanyaan">Pertanyaan</label>
                </div>

                <div class="choice-option">
                    <input
                        type="radio"
                        id="saran"
                        name="jenis_pesan"
                        value="saran"
                    >
                    <label for="saran">Saran</label>
                </div>
            </fieldset>

            <fieldset class="form-group choice-group">
                <legend>Topik yang Diminati</legend>

                <div class="choice-option">
                    <input
                        type="checkbox"
                        id="minat-html"
                        name="minat[]"
                        value="HTML"
                    >
                    <label for="minat-html">HTML</label>
                </div>

                <div class="choice-option">
                    <input
                        type="checkbox"
                        id="minat-css"
                        name="minat[]"
                        value="CSS"
                    >
                    <label for="minat-css">CSS</label>
                </div>
            </fieldset>

            <div class="form-group">
                <label for="prodi">Program Studi</label>

                <select
                    class="input-form"
                    id="prodi"
                    name="prodi"
                    required
                >
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
                    rows="4"
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

        <?php if (!empty($nama)): ?>
            <h3>Data yang Diterima Peladen</h3>

            <p>Nama:
                <?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>Email:
                <?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>Semester:
                <?= htmlspecialchars($semesterForm, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>Tanggal kunjungan:
                <?= htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>Jenis pesan:
                <?= htmlspecialchars($jenisPesan, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>Program studi:
                <?= htmlspecialchars($prodi, ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>Minat:</p>

            <?php if (is_array($minat) && count($minat) > 0): ?>
                <ul>
                    <?php foreach ($minat as $topik): ?>
                        <li>
                            <?= htmlspecialchars((string) $topik, ENT_QUOTES, 'UTF-8') ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Tidak ada minat yang dipilih.</p>
            <?php endif; ?>

            <p>Pesan:</p>
            <p><?= nl2br(htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8')) ?></p>
        <?php endif; ?>
    </section>
</main>

<footer>
    <p>
        &copy; <?= date("Y") ?>
        <?php echo $namaMahasiswa; ?>
        [<?= $nim ?>]
    </p>
</footer>

<script src="script.js?v=2"></script>
</body>
</html>
