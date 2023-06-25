<?php 
require_once "../function.php";

//ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$produk = query("SELECT * FROM  produk WHERE id_produk = $id")[0];



// cek apakah tombol submit udah ditekan atau belom
if(isset($_POST["ubah"])){
    
    // cek apakah data berhasil di ubah atau tidak
    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil Di Ubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Di Ubah!');
                document.location.href = 'index.php';
            </script>
        ";
    }

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
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
    </style>
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
    <div class="container">
        <!-- Form -->
        <div class="row justify-content-center mt-4">
            <div class="col-md-8">
                <h3><b>Update Produk</b></h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 8px 8px 15px;">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?= $produk["id_produk"]; ?>"></>
                            <input type="hidden" class="form-control" id="gambarLama" name="gambarLama" value="<?= $produk["gambar"]; ?>"></>
                        </div>
                        <div class="mb-3">
                            <label for="kode" class="form-label">Kode Barang</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="<?= $produk["kode"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Barang</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $produk["nama_produk"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga Barang</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="<?= $produk["harga"]; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar Barang</label><br>
                            <img src="img/<?= $produk['gambar']?>" alt="" width="70">
                            <input type="file" class="form-control" id="gambar" name="gambar" >
                        </div>
                        <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Form -->        
    </div>

     <!-- Footer -->
     <div id="copyright" class="fixed-bottom sticky-bottom">
        &copy; 2022. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>