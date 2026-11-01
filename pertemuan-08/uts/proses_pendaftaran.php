<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-gray">
    <div class="container-confirm fade-in">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Mengambil dan membersihkan data
            $nama = htmlspecialchars(trim($_POST['nama']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = $_POST['password'];
            $jk = isset($_POST['jk']) ? htmlspecialchars($_POST['jk']) : '';
            $prodi = htmlspecialchars($_POST['prodi']);
            $pesan = htmlspecialchars(trim($_POST['pesan']));

            // Validasi Server-Side
            $errors = array();

            if (empty($nama)) $errors[] = "Nama Lengkap wajib diisi.";
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Format Email tidak valid.";
            if (empty($password) || strlen($password) < 6) $errors[] = "Password minimal 6 karakter.";
            if (empty($jk)) $errors[] = "Jenis Kelamin wajib dipilih.";
            if (empty($prodi)) $errors[] = "Program Studi wajib dipilih.";
            if (empty($pesan)) $errors[] = "Pesan wajib diisi.";

            // Jika ada error
            if (!empty($errors)) {
                echo "<h2 class='text-danger'>Terjadi Kesalahan</h2>";
                echo "<ul class='error-list'>";
                foreach ($errors as $error) {
                    echo "<li>" . $error . "</li>";
                }
                echo "</ul>";
                echo "<a href='index.php?page=pendaftaran' class='btn-back'>&laquo; Kembali ke Form</a>";
            } else {
                // Jika sukses
                echo "<h2 class='text-success'>Pendaftaran Berhasil!</h2>";
                echo "<p>Terima kasih telah mendaftar. Berikut adalah data yang Anda kirimkan:</p>";
                echo "<table class='confirm-table'>";
                echo "<tr><td>Nama Lengkap</td><td>: " . $nama . "</td></tr>";
                echo "<tr><td>Email</td><td>: " . $email . "</td></tr>";
                echo "<tr><td>Jenis Kelamin</td><td>: " . $jk . "</td></tr>";
                echo "<tr><td>Program Studi</td><td>: " . $prodi . "</td></tr>";
                echo "<tr><td>Pesan</td><td>: " . $pesan . "</td></tr>";
                echo "</table>";
                echo "<p class='note'>(Password disembunyikan untuk alasan keamanan)</p>";
                echo "<a href='index.php' class='btn-back'>&laquo; Kembali ke Beranda</a>";
            }
        } else {
            echo "<h2 class='text-danger'>Akses Ditolak</h2>";
            echo "<p>Formulir harus diisi melalui halaman pendaftaran.</p>";
            echo "<a href='index.php?page=pendaftaran' class='btn-back'>&laquo; Ke Halaman Pendaftaran</a>";
        }
        ?>
    </div>
</body>
</html>