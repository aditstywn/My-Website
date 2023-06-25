<?php
require_once '../function.php';

// $pemesanan = query("SELECT * FROM pemesanan JOIN user ON pemesanan.id_user = user.id_user JOIN pesan ON pesan.id_pesan = pemesanan.id_pesan ");
$pemesanan = query("SELECT * FROM pesan JOIN user ON pesan.id_user = user.id_user");




?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan</title>
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
        /* max-width: 1280px;
        min-width: 1080px; */
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
                            <img src="../user/img/Icon Back.png" style="width: 30px; height: 30px;">
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
        <!-- Pemesanan-->
        <div class="row justify-content-center text-center">
            <div class="col-md-10">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Nota</th>
                        </tr>
                        <?php 
                        $i = 1;
                        $total = 0;
                        foreach($pemesanan as $row) { 
                        ?>
                        <tr>
                            <td><?= $i++ ?>.</td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['tanggal_pesan'] ?></td>
                            <td><?= $row['status_pembelian'] ?></td>
                            <td><?= number_format($row['total_harga_pesan']) ?></td>
                            <td>
                                <a href="detailPemesanan.php?id_user=<?= $row['id_user']?>&id_pesan=<?= $row['id_pesan'] ?>"
                                    class="btn btn-success ">Detail</a>
                                <?php if($row['status_pembelian'] != 'Pending'){ ?>
                                <a href="pembayaran.php?id_pesan=<?= $row['id_pesan'] ?>"
                                    class="btn btn-warning">Pembayaran</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
        <!-- Akhir Pemesanan -->
    </div>

    <!-- Footer -->
    <div id="copyright" class="fixed-bottom ">
        &copy; 2022. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>