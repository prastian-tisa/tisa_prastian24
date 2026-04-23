// ============================
// OUTPUT DASAR
// ============================
console.log("JavaScript berhasil terhubung!");
alert("Selamat datang di halaman JavaScript!");

// ============================
// VARIABEL & TIPE DATA
// ============================
let nama = "Pengguna";
const umur = 20;

let teks = "Hello";
let angka = 10;
let aktif = true;
let kosong = null;
let belum;

let mahasiswa = {
    nama: "Nadia",
    umur: 20
};

let nilaiArray = [80, 90, 100];

// ============================
// DOM (AMBIL ELEMEN)
// ============================
const judul = document.querySelector("h1");
const form = document.querySelector("form");
const inputNama = document.querySelector("#nama");
const inputEmail = document.querySelector("#email");

// ============================
// UBAH ISI TEKS (DOM)
// ============================
judul.innerHTML = "Belajar HTML, CSS, & JavaScript 🚀";

// ============================
// FUNGSI BIASA
// ============================
function sapa(nama) {
    return "Halo " + nama;
}
console.log(sapa("Tisa"));

// ============================
// ARROW FUNCTION
// ============================
const tambah = (a, b) => a + b;
console.log("Hasil tambah:", tambah(5, 3));

// ============================
// PERCABANGAN
// ============================
let nilai = 80;

if (nilai >= 75) {
    console.log("Lulus");
} else {
    console.log("Tidak Lulus");
}

// ============================
// PERULANGAN (LOOP)
// ============================
for (let i = 1; i <= 5; i++) {
    console.log("Perulangan ke-" + i);
}

// ============================
// EVENT: FORM SUBMIT + VALIDASI
// ============================
form.addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah reload

    let namaValue = inputNama.value;
    let emailValue = inputEmail.value;

    // Validasi sederhana
    if (namaValue === "" || emailValue === "") {
        alert("Semua field harus diisi!");
    } else {
        alert("Data berhasil dikirim!\nNama: " + namaValue);
        console.log("Data:", namaValue, emailValue);
    }
});

// ============================
// EVENT TAMBAHAN (INTERAKSI)
// ============================
judul.addEventListener("click", function() {
    alert("Judul diklik!");
});