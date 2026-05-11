<?php 
session_start();
require '../../function/produk.php'
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php include "../../layout/header.php" ?>

    <!-- sudah benar -->
    <main class="container">
        <h1 class="page-title">Produk</h1>
        
        <content class="product-grid">
            <?php
            $produks = produk("SELECT * FROM produk");
            foreach ( $produks as $produk) : 
            ?>
            <div class="product-card">
                <h2 class="product-name"><?= $produk["paket"] ?></h2>
                
                <div class="price-section">
                    <p class="price-main">Rp <?= number_format($produk["harga"], 0, ',', '.') ?>/ Box</p>
                </div>

                <ul class="product-details">
                    <li>usia: 1 hari</li>
                    <li>kondisi: Sehat & berkualitas</li>
                    <li>cocok untuk: Peternakan</li>
                </ul>

                <a href="../../page/keranjang" class="btn-cart">Beli sekarang!</a>
            </div>
            <?php endforeach; ?>
        </content>
    </main>
<!-- salah -->


<!-- salah -->
    

    <?php include "../../layout/footer.php" ?>

</body>
</html>

<?php 

?>