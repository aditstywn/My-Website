<?php
session_start();

function total($a,$b){
    return $a * $b;
}
$subtot = 0;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pesanan</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Font Style -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,400;1,700&display=swap" rel="stylesheet" />
    <!-- Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <!-- My css -->
    <link rel="stylesheet" href="style.css" />
    <!-- Inline Css -->
    <style>
        body {
          background-image: url(img/bg.jpg);
          background-attachment: fixed;
          background-size: cover;
        }
        .table {
            margin-top: 7rem;
        }
        .total {
            border-top: 1px solid black;
        }
        .kosong {
            margin-top: 7rem;
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
            <a class="nav-link" aria-current="page" href="utama.php"><i class="bi bi-house"> Home</i></a>
            <a class="nav-link" href="pesanan.php"><i class="bi bi-cart3"> Pesanan</i></a>
            <a class="nav-link" href="tentang.php"><i class="bi bi-file-person"> Tentang</i></a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <div class="container">


    <!-- Tabel -->
    <div class="row table justify-content-center ">
        <div class="col-md-8">
        <?php if(!empty($_SESSION['cart'])) { ?>
            <a href=remove.php class="btn btn-warning mb-2">Hapus Pesanan</a>
            <a class="btn btn-danger mb-2"><?php echo sizeof($_SESSION['cart']['arrCart']) ?> Varian</a>
                <div class="card p-2">
                    <table class="text-center">
                        <thead>
                            <tr class="fs-4">
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 0;
                                if(isset($_SESSION['cart']['arrCart'])){
                                    foreach($_SESSION['cart']['arrCart'] as $data){
                                       $no +=1;
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?>.</td>
                                            <td><?php echo $data['nmBrg'] ?></td>
                                            <td><?php echo $data['jml'] ?></td>
                                            <td>Rp.<?php echo $data['hrg'] ?></td>
                                            <td>Rp.<?php echo total($data['jml'],$data['hrg']) ?></td>
                                            <?php $subtot += total($data['jml'] , $data['hrg']); ?>
                                        </tr>

                                    <?php } ?>

                                        <tr class="total">
                                            <th colspan="4" >Total Harga</th>
                                            <td>Rp.<?php echo $subtot ?></td>
                                        </tr>

                                <?php } ?>
                                        
                        </tbody>
                    </table>
                </div>
            <?php } 
                else { 
            ?>

                    <div class="kosong  text-center">
                        <h1 class="fw-bold">Silahkan Pesan Terlebih Dahulu</h1>
                        <p>Kami dari Toko OnlinKu menyajikan berbagai minuman yang menyegarkan dan enak untuk menemani bulan Ramdhan Anda, di bawah cuaca yang panas. Dengan minum di sini anda akan kembali segar, dan kembali menjalanka aktivitas di pagi sampai sore</p>
                    </div>
            <?php } ?>
        </div>
    </div>
    <!-- Akhir Tabel -->
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white p-2  fixed-bottom">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>