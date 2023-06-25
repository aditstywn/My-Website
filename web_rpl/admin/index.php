<?php
session_start();
require_once "../function.php";

$produk = query("SELECT * FROM produk");

//cek udah login belom
if(!isset($_SESSION['login'])){
    header("Location:../login.php");
}

//tidak bisa kehalaman admin kalo kamu user // bug (saat login akun admin malah masuk user)
// if(isset($_SESSION['user'])){
//     header("Location:../index.php");
// }

$_SESSION['admin'] = true;
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
    body {
        /* height: 800px; */
        background-color: #111111;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        background-image: url("img/bg.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        min-height: 100vh;
        width: 100%;
        max-width: 1280px;
        min-width: 1080px;
    }

    #copyright {
        margin-top: 30px;
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
        float: right;
        width: 100%;
        background-color: #222222;
        color: #F86F03;
    }
    </style>
</head>

<body>
    <!-- Navbar Header -->
    <nav class="navbar fixed-top sticky-top navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../user/img/icon-brand.png"
                    style="width: 290px; height: 54px; margin-left: 20px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <!-- Icon Home -->
                    <li class="nav-item" style="padding-left: 20px;">
                        <a class="nav-link" href="index.php">
                            <img src="../user/img/Icon Home.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>
                    <!-- Icon Keranjang -->
                    <li class="nav-item" style="padding-left: 20px;">
                        <a class="nav-link" href="tambah.php">
                            <img src="../user/img/Icon Tambah.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>
                    <!-- Icon Keranjang -->
                    <li class="nav-item" style="padding-left: 20px;">
                        <a class="nav-link" href="pesanan.php">
                            <img src="../user/img/icon pembayaran.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>
                    <!-- Logout -->
                    <li class="nav-item" style="padding-left: 20px;">
                        <a class="nav-link" href="../logout.php">
                            <img src="../user/img/Icon Logout.png" style="width: 30px; height: 30px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container utama">
        <!-- Produk -->
        <div class="row justify-content-center text-center">
            <div class="col-md-10">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        <?php 
                        $i = 1;
                        foreach($produk as $row) { ?>
                        <tr>
                            <td><?= $i++ ?>.</td>
                            <td><img src="img/<?= $row['gambar'] ?>" alt="" width="70"></td>
                            <td><?= $row['kode'] ?></td>
                            <td><?= $row['nama_produk'] ?></td>
                            <td><?= number_format($row['harga']) ?></td>
                            <td>
                                <a href="ubah.php?id=<?= $row['id_produk'] ?>" class="btn btn-success mt-1">Update</a>
                                <a href="../hapus.php?id=<?= $row['id_produk']?>" class="btn btn-danger mt-1">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- Akhir Produk -->
    </div>

    <!-- Footer -->
    <div id="copyright" class="fixed-bottom sticky-bottom">
        &copy; 2022. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>