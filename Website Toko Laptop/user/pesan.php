<?php
session_start();
require_once '../function.php';

//cek udah login belom
if(!isset($_SESSION['login'])){
    header("Location:../login.php");
}

$id_user = $_SESSION['id_user'];
$pesan = query("SELECT * FROM cart JOIN produk ON produk.id_produk = cart.id_produk JOIN user ON user.id_user = cart.id_user WHERE cart.id_user = $id_user");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_user = $_SESSION['id_user'];
    $pesan = query("SELECT * FROM cart JOIN produk ON produk.id_produk = cart.id_produk JOIN user ON user.id_user = cart.id_user WHERE cart.id_user = $id_user");
    
    $tanggal = date("Y-m-d");
     
    // memasukan ke table pesan
    $total_harga = 0;
    foreach($pesan as $row){
    $total_harga += $row['jumlah']*$row['harga'];
    }
    $status = "Pending";
    $pesanan = "INSERT INTO pesan VALUES ('','$id_user','$total_harga','$tanggal','$status','')";
    mysqli_query($conn, $pesanan);

    // Mendapatkan ID pesanan yang baru saja dimasukkan
    $id_pesan = mysqli_insert_id($conn);
    
    // Memasukkan pesanan ke dalam tabel pemesanan
    foreach ($pesan as $row) {
      $id_cart = $row['id_cart'];
      $id_produk = $row['id_produk'];
      $nama_produk = $row['nama_produk'];
      $harga_produk = $row['harga'];
      $jumlah = $row['jumlah'];
      $total = $row['jumlah']*$row['harga'];
      $checkout = "INSERT INTO pemesanan VALUES ('','$id_pesan', '$id_cart', '$id_user', '$id_produk', '$nama_produk','$harga_produk', '$jumlah', '$total')";
      mysqli_query($conn, $checkout);
    }
  
    // Mengosongkan tabel cart setelah memasukkan pesanan
    $hapusPesanan = "DELETE FROM cart WHERE id_user = $id_user";
    mysqli_query($conn,$hapusPesanan);
  
    // Alihkan ke halaman checkout
    header("Location: status.php");
    exit();
  }

  $user = query("SELECT * FROM user WHERE id_user = $id_user");

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesan Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital@0;1&display=swap" rel="stylesheet">
  </head>
  <body>
    <!-- Navbar Header -->
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
                        <a class="nav-link" href="index.php">
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
        <!-- Pesanan -->
        <div class="h4"><b>Keranjang Belanja</b></div>
        <div class="row justify-content-center text-center">
            <div class="col-md">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                    <table class="table table-striped">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                        <?php 
                            $i=1;
                            $totalBelanja = 0; 
                            foreach($pesan as $row){ 
                        ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><img src="../admin/img/<?= $row['gambar'] ?>" alt="" width="40"></td>
                                <td><?= $row['nama_produk'] ?></td>
                                <td><?= $row['harga'] ?></td>
                                <td><?= $row['jumlah'] ?></td>
                                <td><?= number_format($row['jumlah'] * $row['harga'])  ?></td>
                                <td><a href="../cart user/hapusCart.php?id=<?= $row['id_cart'] ?>" class="btn btn-danger" >Hapus</a></td>
                            </tr>
                        <?php 
                            $totalBelanja += $row['jumlah'] * $row['harga'];   
                        }
                        ?>
                            <tr>
                                <th colspan="6" class="bg-dark text-white">Total Belanja</th>
                                <th class="bg-dark text-white">Rp.<?= number_format($totalBelanja) ?></th>
                            </tr>
                    </table>                    
                </div>
            </div>
        </div>
        <div class="row mt-2 justify-content-center">
            <div class="col-md-2">
                <form method="POST">
                    <button type="submit" name="submit" class="btn btn-primary">Bayar Pesanan</button>
                </form>
            </div>
            <div class="col-md-2">
            <a href="index.php" class="btn btn-dark">Pesan Lagi</a>
            </div>
        </div>
        <!-- Akhir Pesanan -->
    </div>

    <!-- Footer -->
    <div id="copyright" class="fixed-bottom">
        &copy; 2023. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
