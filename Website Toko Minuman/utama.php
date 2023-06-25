<?php
session_start();
if (empty($_SESSION['cart']["arrCart"])) {
	$_SESSION['cart']["arrCart"]=array(); 	
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Home</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <!-- Font Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;1,700&display=swap" rel="stylesheet" />
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <!-- My css -->
    <link rel="stylesheet" href="style.css" />
    <style>
      body {
        background-image: url(img/bg1.jpg);
        background-attachment: fixed;
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-warning fixed-top fw-bold p-2">
      <div class="container">
        <a class="navbar-brand fs-4" href="#">Toko OnlinKU</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link" aria-current="page" href="#"><i class="bi bi-house"> Home</i></a>
            <a class="nav-link" href="pesanan.php"><i class="bi bi-cart3"> Pesanan</i></a>
            <a class="nav-link" href="tentang.php"><i class="bi bi-file-person"> Tentang</i></a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container">
      <!-- Carausol -->
      <section class="carausol" id="carausol">
        <div class="row">
          <div class="col-md-8 c1">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/crs1.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                  <img src="img/crs2.jpg" class="d-block w-100" alt="..." />
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
          <div class="col-md-4 text-center c2">
            <h1 class="text-warning fw-bold fst-italic">Pulpy</h1>
            <div class="peta text-center">
              <img src="img/f1.png" alt="" height="370px">
            </div>
          </div>
        </div>
      </section>
      <!-- Akhir Carausol -->

      <!-- Baner -->
      <sectio class="baner" id="baner">
        <div class="row mt-2">
          <div class="col-md text-center">
            <h1 class="p-2 fw-bold">Sekali Tegukan Berasa Segarnya</h1>
          </div>
        </div>
      </sectio>
      <!-- Akhir Baner -->

      <!-- Produk -->
      <section class="produk" id="produk">
        <div class="row mt-3 text-center p1">
          <div class="col-md-3">
            <div class="card">
              <img src="img/fanta.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5>Fanta</h5>
                <p>Rp.3000 <a href="tambahCart.php?brg=Fanta&hrg=3000&jml=1" class="btn btn-warning">Pesan</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-2">
            <div class="card">
              <img src="img/cocacola.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5>Cocacola</h5>
                <p>Rp.3000 <a href="tambahCart.php?brg=Cocacola&hrg=3000&jml=1" class="btn btn-warning">Pesan</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-2">
            <div class="card">
              <img src="img/sprit.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5>Sprit</h5>
                <p>Rp.3000 <a href="tambahCart.php?brg=Sprit&hrg=3000&jml=1" class="btn btn-warning">Pesan</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-2">
            <div class="card">
              <img src="img/cleo.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5>Cleo</h5>
                <p>Rp.3000 <a href="tambahCart.php?brg=Cleo&hrg=3000&jml=1" class="btn btn-warning">Pesan</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-3 text-center p2">
          <div class="col-md-3">
            <div class="card">
              <img src="img/frestea.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5>FresTea</h5>
                <p>Rp.4000 <a href="tambahCart.php?brg=Fres Tea&hrg=4000&jml=1" class="btn btn-warning">Pesan</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-2">
            <div class="card">
              <img src="img/kopi.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5>White Cofee</h5>
                <p>Rp.4500 <a href="tambahCart.php?brg=White Cofee&hrg=4500&jml=1" class="btn btn-warning">Pesan</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-2">
            <div class="card">
              <img src="img/lasegar.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5>Lasegar</h5>
                <p>Rp.8000 <a href="tambahCart.php?brg=Lasegar&hrg=8000&jml=1" class="btn btn-warning">Pesan</a></p>
              </div>
            </div>
          </div>
          <div class="col-md-3 mt-2">
            <div class="card">
              <img src="img/jeruk.png" class="card-img-top" alt="..." />
              <div class="card-body">
                <h5>Pulpy</h5>
                <p>Rp.5000 <a href="tambahCart.php?brg=Pulpy&hrg=5000&jml=1" class="btn btn-warning">Pesan</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Akhir Produk -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white p-2 mt-5">
      <div class="container">
        <div class="row text-center">
          <div class="col-sm-4">
            <p class="mt-2">
              <button type="button" class="btn btn-outline-primary">
                <a href="https://www.instagram.com/adit_stywn/"><i class="bi bi-instagram"></i> adit_stywn</a>
              </button>
            </p>
          </div>
          <div class="col-sm-4">
            <p class="mt-3">&copy; Copyrigth 2023. RestuAdityaSetywan.</p>
          </div>
          <div class="col-sm-4">
            <p class="mt-2">
              <button type="button" class="btn btn-outline-danger">
                <a href="https://youtube.com/@aditstywn8495"><i class="bi bi-youtube"> Adit Stywn</i></a>
              </button>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  </body>
</html>
