<?php
session_start();
require_once 'function.php';

//var_dump($_SESSION);die;

//set session user
$_SESSION['user'] = true;


$produk = query("SELECT * FROM produk");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- cdnjs owl carousel min css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- cdnjs owl carousel theme min css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="user/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital@0;1&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar Header -->
        <nav class="navbar fixed-top sticky-top navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="user/img/icon-brand.png" style="width: 290px; height: 54px; margin-left: 20px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Form Pencarian -->
                        <form class="d-flex w-75" style="padding-left: 40px;" role="search">
                            <input class="form-control me-2" type="search" placeholder="Cari Nama Produk" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">
                                <img src="user/img/logo-search.png" style="width: 25px; height: 25px;">
                            </button>
                        </form>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <!-- Icon Home -->
                            <li class="nav-item" style="padding-left: 20px;">
                                <a class="nav-link" href="index.php">
                                    <img src="user/img/Icon Home.png" style="width: 30px; height: 30px;">
                                </a>
                            </li>
                            <!-- Icon Keranjang -->
                            <li class="nav-item" style="padding-left: 20px;">
                                <a class="nav-link" href="user/pesan.php">
                                    <img src="user/img/icon-keranjang.png" style="width: 30px; height: 30px;">
                                </a>
                            </li>
                            <!-- Icon Keranjang -->
                            <li class="nav-item" style="padding-left: 20px;">
                                <a class="nav-link" href="user/status.php">
                                    <img src="user/img/icon pembayaran.png" style="width: 30px; height: 30px;">
                                </a>
                            </li>
                            <!-- Logout -->
                            <li class="nav-item" style="padding-left: 20px;">
                                <a class="nav-link" href="login.php">
                                    <span class="navbar-brand h1">Login</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="registrasi.php">
                                    <span class="navbar-brand h1">Registrasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>
    <!-- End Navbar -->

    <!-- running text -->
    <div class="container-fluid promosi">
        <marquee width="100%" direction="Left" style="color: black; font-size: 18px;">Nikmati Promo Yang Didapatkan Setiap Pembelian. Harap Login terlebih dahulu agar bisa memesan produk yang ingin dipesan.</marquee>
    </div>

    <!-- carousel -->
    <div class="container-fluid mt-5">
    <div class="container produk mt-4" style="width: 60%;">
        <div class="row">
            <div class="owl-carousel owl-theme">
                <div class="item">
                    <img src="user/img/banner 1.jpg" alt="asus" style="width: 200px; height: 200px; margin: auto; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                </div>
                <div class="item">
                    <img src="user/img/banner 2.jpg" alt="asus" style="width: 200px; height: 200px; margin: auto; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                </div>
                <div class="item">
                    <img src="user/img/banner 3.jpg" alt="asus" style="width: 200px; height: 200px; margin: auto; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                </div>
                <div class="item">
                    <img src="user/img/banner 4.jpg" alt="asus" style="width: 200px; height: 200px; margin: auto; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                </div>
                <div class="item">
                    <img src="user/img/banner 5.jpg" alt="asus" style="width: 200px; height: 200px; margin: auto; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                </div>
                <div class="item">
                    <img src="user/img/banner 6.jpg" alt="asus" style="width: 200px; height: 200px; margin: auto; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Carousel Promo -->

<!-- Produk List -->
<div class="container-fluid mt-5">
        <div class="h3 judul"><b>All Produk</b></div>
        <div class="container produk mt-4">
            <div class="row justify-content-center">
                <?php foreach($produk as $row) { ?>
                <div class="col-md-3 mt-4">
                    <div class="card shadow" style="min-width: 200px;">
                        <img src="admin/img/<?= $row['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title"><b><?= $row['nama_produk'] ?></b></p>
                            <h6 class="card-title">Rp.<?= number_format($row['harga']) ?></h6>
                            <a href="user/pesan.php?id=<?= $row['id_produk'] ?>"
                                class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>

<!-- Footer -->
<div id="copyright">
    &copy; 2022. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
</div>
    
    <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Owl Carousel cdnjs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            0:{
                items: 1
            },
            600:{
                items: 2
            },
            1000:{
                items: 3
            }
        }
    })

// AutoPlay
    var owl = $('.owl-carousel');
    $('.play').on('click',function(){
        owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
        owl.trigger('stop.owl.autoplay')
    })

    
    </script>
</body>
</html>