<?php
session_start();
require_once "function.php";

//cek udah login belom
if(isset($_SESSION['login'])){
    header("Location:index.php");
}

// if(isset($_SESSION['admin'])){
//     header("Location:./admin");
// }


if(isset($_POST['register'])){
    if(registrasi($_POST) > 0){
        echo "<script>
                alert('User Baru Berhasil Ditambahkan');
              </script>
        ";
        echo "<script>
                location='login.php';
              </script>
        ";
        
    }else{
        echo mysqli_error($conn);
    }
}


?>




<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="user/style.css">
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
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
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

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7">
                <div class="card p-4" style="box-shadow: rgba(0, 0, 0, 0.479) 4px 4px 15px;">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" required>
                            <div id="emailHelp" class="form-text">Masukan Username Anda</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                            <div id="emailHelp" class="form-text">Masukan Password Anda</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword2" name="password2" required>
                            <div id="emailHelp" class="form-text">Konfirmasi Password</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputnama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="exampleInputnama" name="nama" required>
                            <div id="emailHelp" class="form-text">Masukan Nama Anda</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtelepon" class="form-label">Telepon</label>
                            <input type="text" class="form-control" id="exampleInputtelepon" name="telepon" required>
                            <div id="emailHelp" class="form-text">Masukan No.Hp Anda</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputalamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="exampleInputalamat" name="alamat" required>
                            <div id="emailHelp" class="form-text">Masukan Alamat Anda</div>
                        </div>
                        <button type="submit" class="btn btn-danger" name="register">Registrasi</button>
                        <a class="btn btn-warning" href="login.php">Login!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="copyright" class="sticky-bottom fixed-bottom">
        &copy; 2022. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>