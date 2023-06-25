<?php
session_start();
require_once "function.php";

if(isset($_SESSION['login'])){
    header("Location:index.php");
}

// hati hati error kalo di coba
// if(isset($_SESSION['admin'])){
//     header("Location:./admin");
// }



//apakah tombol login sudah di tekan
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($admin) === 1){
        //cek password
        $row = mysqli_fetch_assoc($admin);
        if(password_verify($password,$row['password'])){

            //set session
            $_SESSION['login'] = true;

            header("Location: ./admin");
            exit;
        }
    }else if(mysqli_num_rows($result) === 1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password,$row['password'])){

            //set session
            $_SESSION['login'] = true;

            //session id_user / mengirim id user yang login
            $id= mysqli_query($conn,"SELECT id_user FROM user WHERE username = '$username'");
            if(mysqli_num_rows($id) === 1){
                $row = mysqli_fetch_assoc($id);
                $_SESSION['id_user'] = $row['id_user'];

            }
            
            header("Location: ./user");
            exit;
        }
    }

    $error = true;
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
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username">
                            <div id="emailHelp" class="form-text">Masukan Username</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                            <div id="emailHelp" class="form-text">Masukan Password</div>
                        </div>
                        <button type="submit" class="btn btn-warning" name="login">Login</button>
                        <a href="registrasi.php" class="btn btn-danger">Register!</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2 text-center">
            <div class="col-md-7">
                <?php if(isset($error)) { ?>
                    <div class="alert alert-danger" role="alert">
                        Username / Password Anda Salah!
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="copyright" class="fixed-bottom">
        &copy; 2022. <b style="color: #EEEEEE;">Kelompok 1 RPL.</b> All Right Reserved.
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>