<?php
require_once "../function.php";

$keyword = $_GET["keyword"];

$query = "SELECT * FROM produk WHERE 
        kode LIKE '%$keyword%' OR
        nama_produk LIKE '%$keyword%' OR
        harga LIKE '%$keyword%'
";

$produk = query($query);



?>

<div class="container-fluid mt-5">
        <div class="h3 judul"><b>All Produk</b></div>
        <div class="container produk mt-4">
            <div class="row justify-content-center">
                <?php foreach($produk as $row) { ?>
                <div class="col-md-3 mt-4">
                    <div class="card shadow" style="min-width: 200px;">
                        <img src="../admin/img/<?= $row['gambar'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title"><b><?= $row['nama_produk'] ?></b></p>
                            <h6 class="card-title">Rp.<?= number_format($row['harga']) ?></h6>
                            <a href="../cart user/cart.php?id=<?= $row['id_produk'] ?>]"
                                class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>