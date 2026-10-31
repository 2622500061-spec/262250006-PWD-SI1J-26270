<section class="content-section fade-in">
    <h2>Formulir Pendaftaran</h2>
    <p>Silakan isi data diri Anda pada form di bawah ini.</p>
    
    <form id="formPendaftaran" action="proses_pendaftaran.php" method="POST" novalidate>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap">
            <span class="error-msg" id="error-nama"></span>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="contoh@email.com">
            <span class="error-msg" id="error-email"></span>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Minimal 6 karakter">
            <span class="error-msg" id="error-password"></span>
        </div>

        <div class="form-group">
            <label>Jenis Kelamin</label>
            <div class="radio-group">
                <label><input type="radio" name="jk" value="Laki-laki"> Laki-laki</label>
                <label><input type="radio" name="jk" value="Perempuan"> Perempuan</label>
            </div>
            <span class="error-msg" id="error-jk"></span>
        </div>

        <div class="form-group">
            <label for="prodi">Program Studi</label>
            <select id="prodi" name="prodi">
                <option value="">-- Pilih Program Studi --</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Manajemen Informatika">Manajemen Informatika</option>
            </select>
            <span class="error-msg" id="error-prodi"></span>
        </div>

        <div class="form-group">
            <label for="pesan">Pesan (Alasan Mendaftar)</label>
            <textarea id="pesan" name="pesan" rows="4" placeholder="Tuliskan pesan Anda..."></textarea>
            <span class="error-msg" id="error-pesan"></span>
        </div>

        <button type="submit" class="btn-submit">Daftar Sekarang</button>
    </form>
</section>