<?php 
// require __DIR__ . '/../../connection.php';
require dirname(__DIR__) . '/../function/produk.php'
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
</head>
<body>
    
    <?php include dirname(__DIR__) . "/../layout/header.php" ?>

    <p>Produk</p>
     <content>
        <?php
        $produks = produk("SELECT * FROM produk");
        foreach ( $produks as $produk) : 
        ?>
        <div style="border: 2px solid black">
            <p><?= $produk["paket"] ?></p>
            <p>harga : <?= $produk["harga"] ?></p>
            <p>kuantitas : <?= $produk["kuantitas"] ?></p>

        </div>
        <?php endforeach; ?>
    </content>

    <?php include dirname(__DIR__) . "/../layout/footer.php" ?>

</body>
</html>