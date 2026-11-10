<?php
// Hanya izinkan halaman yang tersedia. Halaman lain diarahkan ke beranda.
$page = $_GET['page'] ?? 'beranda';
$allowedPages = ['beranda', 'profile', 'pendaftaran'];
if (!in_array($page, $allowedPages, true)) {
    $page = 'beranda';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Pribadi Muhammad Rico</title>
    <link rel="stylesheet" href="style.css?v=4">
</head>
<body>

    <!-- Header -->
    <header class="main-header">
        <div class="header-content">
            <img src="img/logo.png" alt="Logo Blog" class="logo">
            <h1>Blog Pribadi Muhammad Rico</h1>
        </div>
    </header>

    <!-- Layout Utama (Navigasi Kiri, Konten Kanan) -->
    <div class="main-layout">
        
        <!-- Navigasi -->
        <nav class="sidebar">
            <div class="menu-toggle" id="mobile-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav-list" id="nav-list">
                <li><a href="index.php?page=beranda" class="nav-link<?= $page === 'beranda' ? ' active' : '' ?>">Beranda</a></li>
                <li><a href="index.php?page=profile" class="nav-link<?= $page === 'profile' ? ' active' : '' ?>">Profile</a></li>
                <li><a href="index.php?page=pendaftaran" class="nav-link<?= $page === 'pendaftaran' ? ' active' : '' ?>">Pendaftaran</a></li>
            </ul>
        </nav>

        <!-- Konten Dinamis -->
        <main class="content">
            <?php
            switch ($page) {
                case 'profile':
                    include 'profile.php';
                    break;
                case 'pendaftaran':
                    include 'pendaftaran.php';
                    break;
                case 'beranda':
                default:
                    include 'beranda.php';
                    break;
            }
            ?>
        </main>

    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <p>&copy;2622500061_MUHAMMAD RICO_SI1J_UTS Pemrograman Web Dasar.</p>
        
        <!-- Tabel Tanda Tangan Dosen -->
        <div class="signature-table-container">
            <table class="signature-table">
                <thead>
                    <tr>
                        <th>Dekan</th>
                        <th>Ketua Program Studi</th>
                        <th>Dosen Koordinator</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <br><br><br>
                            <strong>Dr. Ir. H. Ahmad Fauzi, M.Kom.</strong><br>
                            NIDN: 0001010101
                        </td>
                        <td>
                            <br><br><br>
                            <strong>Budi Santoso, S.Kom., M.T.</strong><br>
                            NIDN: 0002020202
                        </td>
                        <td>
                            <br><br><br>
                            <strong>Siti Aminah, S.Kom., M.Kom.</strong><br>
                            NIDN: 0003030303
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>