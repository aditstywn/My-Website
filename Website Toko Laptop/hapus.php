<?php
require_once "function.php";

$id = $_GET["id"];

if(hapus($id) > 0){
    echo "
            <script>
                alert('Data Berhasil Di Hapus!');
                document.location.href = './admin';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Di Hapus!');
                document.location.href = './admin';
            </script>
        ";
    }


?>