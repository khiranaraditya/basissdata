<?php
include("../koneksi.php");

// Ambil data dari form
$Nama = $_POST["nama"];
$Deskripsi = $_POST["deskripsi"];
$Harga = $_POST["harga"];

// Validasi data
if (empty($Nama) || empty($Deskripsi) || empty($Harga)) {
    echo "Data tidak boleh kosong!";
    die();
}

// Ambil file foto
$namafoto = $_FILES["foto"]["name"];
$lokasi_tmp = $_FILES["foto"]["tmp_name"];

// Buat nama file baru berdasarkan waktu
$nama_baru = time() . "_" . $namafoto;

// Pastikan file diunggah sebelum dipindahkan
if (!empty($lokasi_tmp)) {
    move_uploaded_file($lokasi_tmp, "foto/$nama_baru");
} else {
    echo "File foto tidak valid!";
    die();
}

// Query untuk menyimpan data ke database
$query = mysqli_query($koneksi, "INSERT INTO tbproduk (nama, harga, deskripsi, foto, kategori) 
                                 VALUES ('$Nama', '$Harga', '$Deskripsi', '$nama_baru', 'disert')");

// Cek hasil query
if ($query) {
    echo "Data produk berhasil ditambahkan.";
    header("Location: halaman_admin.php"); // Redirect ke halaman admin
} else {
    echo "Gagal menambahkan data produk: " . mysqli_error($koneksi);
}
?>