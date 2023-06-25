<?php
session_start();
require_once '../function.php';

//cek udah login belom
if(!isset($_SESSION['login'])){
    header("Location:../login.php");
}

$id_produk = $_GET['id'];

// Simpan nilai $_SESSION['id_user'] ke dalam variabel sementara
$previous_id_user = $_SESSION['id_user'];

// Mengganti $_SESSION['id_user'] dengan ID pengguna yang baru
$_SESSION['id_user'] = 'ID_PENGGUNA_BARU';

$result = mysqli_query($conn, "SELECT id_produk, id_user, jumlah FROM cart WHERE id_produk = '$id_produk' AND id_user = '$previous_id_user'");

if ($row = mysqli_fetch_assoc($result)) {
    $jumlah = $row['jumlah'] + 1;
    $query = "UPDATE cart SET jumlah = '$jumlah' WHERE id_produk = '$id_produk' AND id_user = '$previous_id_user'";
    mysqli_query($conn, $query);
    header("Location: ../user/pesan.php");
} else {
    $jumlah = 1;
    $pesan = "INSERT INTO cart VALUES ('', '$id_produk', '$previous_id_user', '$jumlah')";
    mysqli_query($conn, $pesan);
    header("Location: ../user/pesan.php");
}

// Mengembalikan nilai $_SESSION['id_user'] ke nilai sebelumnya
$_SESSION['id_user'] = $previous_id_user;





?>