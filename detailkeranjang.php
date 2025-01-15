<?php
session_start();
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<h1>
    <img src="asset/fotoProduct/<?= $Data ['foto']?>">
    <h1><?= $data ["nama"]?></h1>
    <h6><?= $data ["harga"]?></h6>
    <p><?= $data ["deskripsi"]?></p>

    <form action="proses_keranjang2.php" methode="post">
        <input type="hidden" name="product_id" value="<?=$id?>">
        <button type="submit">Keranjang</button>
    </form>
    
</body>
</html>