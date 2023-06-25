<?php

//koneksi database
$conn = mysqli_connect("localhost", "root", "", "toko_online");

//ambil data produk di database
function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    }
    return $rows;
}

//upload gambar
function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang di upload
    if($error === 4){
        echo "
        <script>
            alert('Pilih Gambar Terlebih Dahulu');
        </script>
        ";
        return false;
    }

    //cek apakah yang di upload gambar
    $ekstensiGambarValid = ['jpg','jpeg','png']; // ekstensi gambar
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiFile));

    //cek ektensi gambar 
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "
        <script>
            alert('Yang Anda Upload Bukan Gambar');
        </script>
        ";
        return false;
    }

    //cek jika ukuranya terlalu besar
    if($ukuranFile > 1000000){
        echo "
        <script>
            alert('Ukuran Gambar Terlalu Besar');
        </script>
        ";
        return false;
    }

    // lolos pengecekan, gambar siap upload

    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .=  $ekstensiGambar;


    move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

    return $namaFileBaru;
}

// tambah data produk
function tambah($data){
    global $conn;

    $kode = htmlspecialchars($data['kode']);
    $nama = htmlspecialchars($data['nama']);
    $harga = htmlspecialchars($data['harga']);

    //upload gambar
    $gambar = upload();
    if(!$gambar){
        return false;
    }
    

    //query insert data
    $query = "INSERT INTO produk VALUES 
            ('','$kode','$nama','$harga','$gambar')
            ";

    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

//ubah data produk
function ubah($data){
    global $conn;

    $id = $data["id"];
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $harga = htmlspecialchars($data["harga"]);
    $gambarLama = htmlspecialchars($data['gambarLama']);
    
    // cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    }else {
        $gambar = upload();
    }

    //query update data;
    $query = "UPDATE produk SET  
                kode = '$kode',
                nama_produk = '$nama',
                harga = '$harga',
                gambar = '$gambar'


            WHERE  id_produk = '$id'
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//hapus produk
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM  produk WHERE id_produk = $id");

    return mysqli_affected_rows($conn);
}


//registrasi
function registrasi($data){
    global $conn;

    $username = stripslashes(strtolower($data['username']));
    $password = mysqli_real_escape_string($conn,$data['password']);// untuk memungkinkan user mengisi password kalau ada tanda kutipnya
    $password2 = mysqli_real_escape_string($conn,$data['password2']);
    $nama = htmlspecialchars($data['nama']);
    $telepon = htmlspecialchars($data['telepon']);
    $alamat = htmlspecialchars($data['alamat']);

    //cek username sudah terdaftar atau belom
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    $admin = mysqli_query($conn, "SELECT username FROM admin WHERE username = '$username'");

    //jika username sudah ada return false
    if(mysqli_fetch_assoc($result)){
        echo "<script>
                alert('Username Sudah Terdaftar!');
              </>
        ";
        return false;
    }
    if(mysqli_fetch_assoc($admin)){
        echo "<script>
                alert('Username Sudah Terdaftar!');
              </script>
        ";
        return false;
    }

    //cek konfirmasi password
    if($password !== $password2){
        if($password !== $password2){
            echo "<script>
                    alert('Konfirmasi Password Gagal!');
                  </script>
            ";
            return false;
        }
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan pengguna baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password','$nama','$telepon','$alamat')
    ");

    return mysqli_affected_rows($conn);
}