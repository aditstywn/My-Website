<?php
session_start();
require_once '../function.php';

//cek udah login belom
if(!isset($_SESSION['login'])){
    header("Location:../login.php");
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM  cart WHERE id_cart = $id");
header("Location:../user/pesan.php");

?>