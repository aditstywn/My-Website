<?php
session_start();
require_once '../function.php';

//ambil id pesan
$id_pesan = $_GET['id_pesan'];

$pembayaran = query("SELECT * FROM pembayaran WHERE id_pesan = $id_pesan");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>
  <body>
    <!-- Navbar Header -->
    <nav class="navbar fixed-top sticky-top navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="../user/img/icon-brand.png" style="width: 290px; height: 54px; margin-left: 20px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <!-- Icon Home -->
                            <li class="nav-item" style="padding-left: 20px;">
                                <a class="nav-link" href="pesanan.php">
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
        <div class="row justify-content-center">
            <?php foreach($pembayaran as $row) { ?>
                <div class="col-md-4 mt-2">
                <img src="../user/img/<?= $row['bukti'] ?>" alt="" class="img-responsive" width="270" style="border-radius: 7px; box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
            </div>
            <div class="col-md-6 mt-2">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
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
        <div class="row mt-2 justify-content-center mt-3">
            <div class="col-md-10">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
                    <form action="" method="post" >
                        <div class="mb-3">
                            <label for="resi" class="form-label">Masukan Resi</label>
                            <input type="text" class="form-control" id="resi" name="resi">
                        </div>
                        <div class="mb-3">
                            <label for="bank" class="form-label">Status Pengiriman</label>
                            <select name="status" id="status">
                                <option value="">Pilih Status</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Packing">Packing</option>
                                <option value="Dikirim">Dikirim</option>
                                <option value="Batal">Batal</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="kirim">Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="copyright" class="fixed-bottom sticky-bottom">
        &copy; 2022. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

<?php
if(isset($_POST['kirim'])){
    $resi = $_POST['resi'];
    $status = $_POST['status'];


    $pesan = ("UPDATE pesan SET resi='$resi', status_pembelian='$status' WHERE id_pesan = $id_pesan");
    mysqli_query($conn,$pesan);
    echo "
    <script>
        alert('Data Pembelian Berubah');
    </script>
    ";
    echo "
    <script>
        location='pesanan.php';
    </script>
    ";
}
?>