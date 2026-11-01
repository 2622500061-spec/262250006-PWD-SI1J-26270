document.addEventListener("DOMContentLoaded", function () {
    
    // 1. Toggle Menu Mobile
    const mobileMenu = document.getElementById("mobile-menu");
    const navList = document.getElementById("nav-list");

    if (mobileMenu) {
        mobileMenu.addEventListener("click", function () {
            navList.classList.toggle("active");
        });
    }

    // 2. Highlight Menu Aktif
    const currentUrl = window.location.search;
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach(link => {
        const href = link.getAttribute("href");
        if (currentUrl.includes(href.split("=")[1]) || 
           (currentUrl === "" && href.includes("beranda"))) {
            link.classList.add("active");
        }
    });

    // 3. Validasi Form Pendaftaran
    const form = document.getElementById("formPendaftaran");
    
    if (form) {
        form.addEventListener("submit", function (e) {
            let isValid = true;

            // Helper function untuk menampilkan error
            const showError = (id, message) => {
                document.getElementById(id).innerText = message;
                isValid = false;
            };

            // Helper function untuk menghapus error
            const clearError = (id) => {
                document.getElementById(id).innerText = "";
            };

            // Validasi Nama
            const nama = document.getElementById("nama").value.trim();
            if (nama === "") {
                showError("error-nama", "Nama Lengkap wajib diisi.");
            } else {
                clearError("error-nama");
            }

            // Validasi Email
            const email = document.getElementById("email").value.trim();
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (email === "") {
                showError("error-email", "Email wajib diisi.");
            } else if (!emailRegex.test(email)) {
                showError("error-email", "Format email tidak valid.");
            } else {
                clearError("error-email");
            }

            // Validasi Password
            const password = document.getElementById("password").value;
            if (password === "") {
                showError("error-password", "Password wajib diisi.");
            } else if (password.length < 6) {
                showError("error-password", "Password minimal 6 karakter.");
            } else {
                clearError("error-password");
            }

            // Validasi Jenis Kelamin
            const jk = document.querySelector('input[name="jk"]:checked');
            if (!jk) {
                showError("error-jk", "Pilih salah satu jenis kelamin.");
            } else {
                clearError("error-jk");
            }

            // Validasi Program Studi
            const prodi = document.getElementById("prodi").value;
            if (prodi === "") {
                showError("error-prodi", "Program Studi wajib dipilih.");
            } else {
                clearError("error-prodi");
            }

            // Validasi Pesan
            const pesan = document.getElementById("pesan").value.trim();
            if (pesan === "") {
                showError("error-pesan", "Pesan wajib diisi.");
            } else {
                clearError("error-pesan");
            }

            // Jika tidak valid, cegah form submit
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
});