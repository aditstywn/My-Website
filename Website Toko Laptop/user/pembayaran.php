<?php
session_start();
require_once '../function.php';

//cek udah login belom
if(!isset($_SESSION['login'])){
    header("Location:../login.php");
}

$id_user = $_SESSION['id_user'];
$id_pesan = $_GET['id_pesan'];

$pesan = query("SELECT * FROM pesan JOIN user ON pesan.id_user = user.id_user WHERE id_pesan = $id_pesan");
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

    <div class="container utama">
        <!-- Form Pembayaran -->
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3><b>Konfirmasi Pembayaran</b></h3>
                <p>Kirim Bukti Pembayaran</p>
                <?php foreach($pesan as $row) { ?>
                <div class="alert alert-info" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">Kirim Ke
                    No.Rekening<strong> Adit Ganteng BRI 1928273289</strong> <br>
                    Total Pembayaran <strong> Rp. <?= number_format($row['total_harga_pesan']) ?></strong></div>
                <?php } ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <?php foreach($pesan as $row) { ?>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukan Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="bank" class="form-label">Nama Bank</label>
                            <input type="text" class="form-control" id="bank" name="bank" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Total Bayar</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="bukti" class="form-label">Foto Bukti</label>
                            <input type="file" class="form-control" id="bukti" name="bukti" min="1" required>
                            <div class="form-text">File Berupa (JPG,JPEG,PNG) Max 2mb</div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="bayar">Kirim</button>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Form Pembayaran -->
    </div>

    <!-- Footer -->
    <div id="copyright">
        &copy; 2023. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

<?php 
// jika tombol bayar di tekan
if(isset($_POST['bayar'])){

    $nama_user = $_POST['nama'];
    $bank = $_POST['bank'];
    $jumlah = $_POST['jumlah'];
    $tanggal = date("Y-m-d");

    //upload foto bukti
    $nama_bukti = $_FILES['bukti']['name'];
    $lokasi_bukti = $_FILES['bukti']['tmp_name'];
    $nama_baru = date("YmdHis").$nama_bukti;
    move_uploaded_file($lokasi_bukti,"img/$nama_baru");

    $pembayaran = ("INSERT INTO pembayaran VALUES 
        ('','$id_pesan','$nama_user','$bank','$jumlah','$tanggal','$nama_baru')
    ");
    mysqli_query($conn,$pembayaran);

    $pesan = ("UPDATE pesan SET status_pembelian = 'LUNAS' WHERE id_pesan = $id_pesan");
    mysqli_query($conn,$pesan);
    echo "
    <script>
        alert('Bukti Pembayaran Terkirim');
    </script>
    ";
    echo "
    <script>
        location='status.php';
    </script>
    ";
}
?>