<?php
include("koneksi.php");

// Jika ID tidak ada
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

// Query untuk mengambil data produk berdasarkan ID
$query = mysqli_query($koneksi, "SELECT * FROM tbproduk WHERE id = '$id'");

// Periksa apakah query berhasil dan data ditemukan
if (!$query || mysqli_num_rows($query) == 0) {
    echo "<h1>Data produk tidak ditemukan</h1>";
    die();
}

// Ambil data produk
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
</head>
<body>
    <img src="foto/<?=$data['foto'] ?>">
    <h1><?= $data["nama"] ?></h1>
    <h1><?= $data["harga"] ?></h1>
    <h1><?= $data["deskripsi"] ?></h1>

    <form action="proseskeranjang.php" methode="post">
        <input type="hidden" name="product_id" value="<?=$id?>"
        <button type="submit">Keranjang</button>
    </form>
</body>
</html>