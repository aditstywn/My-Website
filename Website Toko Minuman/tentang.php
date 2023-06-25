<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
        .br {
            margin-top: 6rem;
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
    <div class="row br justify-content-center mb-5">
        <div class="col-md-5 text-center">
            <h1 class="fw-bold">Owner</h1>
            <img src="img/profil.jpg" width="200" class="rounded-circle" alt="">
            <h3 class="fw-bold">Nama : Restu Aditya Setywan</h3>
            <h3 class="fw-bold">Nim : A11.2022.14654</h3>
            <h3 class="fw-bold">Kelp : A11.4217</h3>
        </div>
        <div class="col-md-7">
            <h1>Toko OnlinKU</h1>
            <p class="fw-bold">Toko OnlinKU adalah toko online yang bergerak pada bidang minuman. ide awal munculnya toko ini adalah karena perkembangan teknologi yang semakin maju. Toko OnlinKU memiliki banyak varian rasa minuman yang tentunya halal dan BPOM.</p>
            <br>

            <h1>Alamat Toko OnlinKU</h1>
            <p class="fw-bold">Toko OnlinKU berada di Desa Krengseng Kabupaten Batang Jateng.</p>
            <br>

            <h1>Kontak</h1>
            <table>
                <tr>
                    <td class="fw-bold">No Hp :</td>
                    <td class="fw-bold">089538******</td>
                </tr>
                <tr>
                    <td class="fw-bold">Email :</td>
                    <td class="fw-bold">restuadityasetyawan@gmail.com</td>
                </tr>
            </table>
        </div>
    </div>
</div>



    <!-- Footer -->
    <footer class="bg-dark text-white p-2">
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