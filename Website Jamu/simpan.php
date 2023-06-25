<?php

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $tlp = $_POST['tlp'];
    $pesan = $_POST['pesan'];

    echo "<h1>Hasil Input Form :</h1>";
        echo "<table>";
        echo "<tr><td><b>Nama </td> <td>: $nama</td></tr><tr><td><b>Email </td> <td>: $email</td></tr><tr><td><b>No. Telepon </td> <td>: $tlp</td></tr><tr><td><b>Pesan </td> <td>: $pesan</td></tr>";
}