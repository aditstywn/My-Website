<?php
session_start();
require_once '../function.php';

//cek udah login belom
if(!isset($_SESSION['login'])){
    header("Location:../login.php");
}

$id_user = $_SESSION['id_user'];
$id_pesan = $_GET['id_pesan'];

$pembayaran = query("SELECT * FROM pembayaran WHERE id_pesan = $id_pesan");
$user = query("SELECT * FROM user WHERE id_user = $id_user");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital@0;1&display=swap" rel="stylesheet">
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
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
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

    <div class="container utama">
    <!-- Form Pembayaran -->
    <div class="row justify-content-center">
        <div class="row justify-content-center">
            <?php foreach($pembayaran as $row) { ?>
            <div class="col-md-4" >
                <img src="img/<?= $row['bukti'] ?>" alt="" class="img-responsive" width="275" style="border-radius: 8px; box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
            </div>
            <div class="col-md-6">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                    <table class="table table-striped">
                        <thead>
                            <h3>Data Pembayaran</h3>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <td><?= $row['nama_user'] ?></td>
                            </tr>
                            <tr>
                                <th>Bank</th>
                                <td><?= $row['bank'] ?></td>
                            </tr>
                            <tr>
                                <th>Total Harga</th>
                                <td>Rp. <?= number_format($row['jumlah']) ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><?= $row['tanggal'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col-md-6">
                <div class="alert alert-danger text-center" role="alert" style="box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                    <p>Harap cek barang terlebih dahulu sebelum diterima. Jika terjadi kerusakan pada barang harap memberikan bukti dan hubungi 08901290788</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center text-center">
        <div class="col-md">
            <form action="" method="post">
            <input type="hidden" value="Diterima" name="diterima">
            <button type="submit" name="kirim" class="btn btn-primary mt-1">Diterima</button>
            </form>
        </div>
    </div>
    <!-- Akhir Form Pembayaran -->
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

<?php
if(isset($_POST['kirim'])){
    $diterima = $_POST['diterima'];
    $pesan = ("UPDATE pesan SET status_pembelian = '$diterima' WHERE id_pesan = $id_pesan");
    mysqli_query($conn,$pesan);

    echo "
    <script>
        alert('Pesanan Sudah Diterima');
    </script>
    ";
    echo "
    <script>
        location='status.php';
    </script>
    ";

}
?>