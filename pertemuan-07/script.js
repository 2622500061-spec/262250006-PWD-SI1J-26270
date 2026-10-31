// Navigasi responsif
const navToggle = document.getElementById("navToggle");
const navMenu = document.getElementById("navMenu");

if (navToggle && navMenu) {
    navToggle.addEventListener("click", () => {
        const isOpen = navMenu.classList.toggle("nav-open");
        navToggle.setAttribute("aria-expanded", String(isOpen));
        navToggle.setAttribute("aria-label", isOpen ? "Tutup navigasi" : "Buka navigasi");
    });
}

const contactForm = document.getElementById("contactForm");
const formFeedback = document.getElementById("formFeedback");
const submissionResult = document.getElementById("submissionResult");
const submissionContent = document.getElementById("submissionContent");

// Membuat baris hasil menggunakan textContent agar masukan pengguna
// ditampilkan sebagai teks biasa, bukan dieksekusi sebagai HTML.
function addResultRow(label, value) {
    const paragraph = document.createElement("p");
    const strong = document.createElement("strong");
    strong.textContent = label + ": ";
    paragraph.appendChild(strong);
    paragraph.appendChild(document.createTextNode(value || "-"));
    submissionContent.appendChild(paragraph);
}

// Membaca hasil GET setelah browser kembali memuat index.html.
function displayGetResult() {
    if (!submissionResult || !submissionContent) return;

    const params = new URLSearchParams(window.location.search);
    if (!params.has("nama")) return;

    const nama = params.get("nama") || "";
    const email = params.get("email") || "";
    const semester = params.get("semester") || "";
    const tanggal = params.get("tanggal") || "";
    const jenisPesan = params.get("jenis_pesan") || "";
    const prodi = params.get("prodi") || "";
    const pesan = params.get("pesan") || "";
    const minat = params.getAll("minat[]").concat(params.getAll("minat"));

    submissionContent.replaceChildren();
    addResultRow("Nama", nama);
    addResultRow("Email", email);
    addResultRow("Semester", semester);
    addResultRow("Tanggal kunjungan", tanggal);
    addResultRow("Jenis pesan", jenisPesan);
    addResultRow("Program studi", prodi === "SI" ? "Sistem Informasi" : prodi === "TI" ? "Teknik Informatika" : prodi);

    const topicTitle = document.createElement("p");
    const topicLabel = document.createElement("strong");
    topicLabel.textContent = "Minat:";
    topicTitle.appendChild(topicLabel);
    submissionContent.appendChild(topicTitle);

    if (minat.length > 0) {
        const list = document.createElement("ul");
        minat.forEach((topic) => {
            const item = document.createElement("li");
            item.textContent = topic;
            list.appendChild(item);
        });
        submissionContent.appendChild(list);
    } else {
        const emptyTopic = document.createElement("p");
        emptyTopic.textContent = "Tidak ada minat yang dipilih.";
        submissionContent.appendChild(emptyTopic);
    }

    const messageTitle = document.createElement("p");
    const messageLabel = document.createElement("strong");
    messageLabel.textContent = "Pesan:";
    messageTitle.appendChild(messageLabel);
    submissionContent.appendChild(messageTitle);

    const messageBody = document.createElement("p");
    messageBody.textContent = pesan;
    submissionContent.appendChild(messageBody);

    submissionResult.hidden = false;
}

displayGetResult();

if (contactForm && formFeedback) {
    const namaInput = document.getElementById("nama");
    const emailInput = document.getElementById("email");
    const semesterInput = document.getElementById("semester");
    const tanggalInput = document.getElementById("tanggal");
    const prodiInput = document.getElementById("prodi");
    const pesanInput = document.getElementById("pesan");

    contactForm.addEventListener("submit", (event) => {
        event.preventDefault();

        const nama = namaInput.value.trim();
        const email = emailInput.value.trim();
        const semester = Number(semesterInput.value);
        const tanggal = tanggalInput.value;
        const jenisPesan = contactForm.querySelector('input[name="jenis_pesan"]:checked');
        const topikDipilih = contactForm.querySelectorAll(
            'input[name="minat"]:checked, input[name="minat[]"]:checked'
        );
        const prodi = prodiInput.value;
        const pesan = pesanInput.value.trim();

        formFeedback.className = "form-feedback-error";
        formFeedback.textContent = "";

        if (nama.length < 3 || nama.length > 50) {
            formFeedback.textContent = "Nama lengkap harus diisi 3 sampai 50 karakter.";
            namaInput.focus();
            return;
        }

        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            formFeedback.textContent = "Masukkan alamat email yang valid.";
            emailInput.focus();
            return;
        }

        if (semesterInput.value === "" || !Number.isInteger(semester) || semester < 1 || semester > 14) {
            formFeedback.textContent = "Semester harus diisi dengan angka 1 sampai 14.";
            semesterInput.focus();
            return;
        }

        if (tanggal === "") {
            formFeedback.textContent = "Tanggal kunjungan harus diisi.";
            tanggalInput.focus();
            return;
        }

        if (!jenisPesan) {
            formFeedback.textContent = "Pilih jenis pesan.";
            contactForm.querySelector('input[name="jenis_pesan"]').focus();
            return;
        }

        if (topikDipilih.length === 0) {
            formFeedback.textContent = "Pilih minimal satu topik yang diminati.";
            contactForm.querySelector('input[name="minat[]"], input[name="minat"]').focus();
            return;
        }

        if (prodi === "") {
            formFeedback.textContent = "Pilih program studi.";
            prodiInput.focus();
            return;
        }

        if (pesan.length === 0) {
            formFeedback.textContent = "Pesan harus diisi.";
            pesanInput.focus();
            return;
        }

        if (pesan.length > 300) {
            formFeedback.textContent = "Pesan maksimal 300 karakter.";
            pesanInput.focus();
            return;
        }

        formFeedback.textContent = "Form berhasil divalidasi. Mengirim data...";
        formFeedback.className = "form-feedback-success";

        // Kirim melalui GET ke index.html. Setelah reload, displayGetResult()
        // membaca query string dan menampilkan seluruh data formulir.
        HTMLFormElement.prototype.submit.call(contactForm);
    });

    contactForm.addEventListener("reset", () => {
        formFeedback.textContent = "";
        formFeedback.className = "";
    });

    contactForm.addEventListener("input", () => {
        formFeedback.textContent = "";
        formFeedback.className = "";
    });
}
