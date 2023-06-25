<?php
session_start();
require_once '../function.php';

//cek udah login belom
if(!isset($_SESSION['login'])){
    header("Location:../login.php");
}


$id_user = $_SESSION['id_user'];
$id_pesan = $_GET['id_pesan'];
$data_diri = query("SELECT * FROM user WHERE id_user = $id_user"); // menampilkan data user
$nota = query("SELECT * FROM pemesanan WHERE  id_pesan = $id_pesan"); // menampilkan pesanan user
$user = query("SELECT * FROM user WHERE id_user = $id_user");

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital@0;1&display=swap" rel="stylesheet">
</head>

<body>
    <!-- Navbar Header -->
    <nav class="navbar fixed-top sticky-top navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="img/icon-brand.png"
                    style="width: 290px; height: 54px; margin-left: 20px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <!-- Icon Profil -->
                    <li class="nav-item" style="padding-left: 10px;">
                        <a class="nav-link" href="profil.php">
                            <img src="img/Profil_akun.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>
                    
                    <!-- Icon Keranjang -->
                    <li class="nav-item" style="padding-left: 20px;">
                        <a class="nav-link" href="pesan.php">
                            <img src="img/icon-keranjang.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>

                    <!-- Icon Keranjang -->
                    <li class="nav-item" style="padding-left: 20px;">
                        <a class="nav-link" href="status.php">
                            <img src="img/icon pembayaran.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>
                    
                    <!-- Icon Home -->
                    <li class="nav-item" style="padding-left: 20px;">
                        <a class="nav-link" href="status.php">
                            <img src="img/Icon Back.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>

                    <!-- Icon Logout -->
                    <li class="nav-item" style="padding-left: 10px;">
                        <a class="nav-link" href="../logout.php">
                            <img src="img/Icon Logout.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="container utama mt-4">
    <div class="row justify-content-center text-center mt-5">
        <div class="col-md-8">
            <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
                <table class="table table-striped">
                    <?php foreach($data_diri as $row) { ?>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telpon</th>
                        <th>Email</th>
                    </tr>
                    <tr>
                        <td><?= $row['nama'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['telepon'] ?></td>
                        <td><?= $row['username'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

        <!-- Pemesanan-->
        <div class="row justify-content-center text-center mt-4">
            <div class="col-md">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
                    <table class="table">
                        <thead>
                            <h3>Detail Pemesanan</h3>
                        </thead>
                       <tbody>

                            <tr class="table-success">
                                <th>No.</th>
                                <th>Nama Produk</th>
                                <th>Harga Produk</th>
                                <th>Jumlah Produk</th>
                                <th>Subtotal</th>
                            </tr>
                            <?php 
                            $i = 1;
                            foreach($nota as $row) { ?>                           
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['harga_produk'] ?></td>
                                <td><?= $row['jumlah'] ?></td>
                                <td><?= $row['total_harga'] ?></td>
                            </tr>
                            <?php } ?>
                       </tbody>
                    </table>
                    <p>Silahkan bayar sesuai dengan total bayar</p>                    
                </div>
            </div>
        </div>
        <!-- Akhir Pemesanan -->
    </div>

    <!-- Footer -->
    <div id="copyright" class="fixed-bottom sticky-bottom">
        &copy; 2023. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>