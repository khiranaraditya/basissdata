<?php
session_start();
include("koneksi.php");
$query = mysqli_query($koneksi, "select * from tbproduk");


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


<!doctype html>
<html lang="en">
  <head>
    <style>

    section{
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 100px
    }
  </style>
    </head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
     <h1>Hi, welcome!!!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">LOGIN</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Keluar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="halaman_admin/tambah_produk.php">tambah</a>
          </li>
              </li>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">cheesecake</a></li>
              <li><a class="dropdown-item" href="#">minuman coklat</a></li>
              <li><hr class="dropdown-divider"></li>
            </ul>
          </li>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <section>

  <?php
    while($data = mysqli_fetch_array($query)){
    ?>

  <div class="card" style="width: 18rem;">
  <img src="foto/<?php echo $data['foto'] ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data ["nama"] ?></h5>
    <p class="card-text"><?php echo $data ["deskripsi"]?></p>
    <a href="detail.php?id=<?=$data['id'] ?>" class="btn btn-primary">detail</a>
  </div>
    </div>
    <?php } ?>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
  </body>
</html>
</section>

  