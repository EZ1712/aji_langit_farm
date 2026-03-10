<?php 
require __DIR__ . '/../connection.php';
require dirname(__DIR__) . '/function/produk.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aji Langit Farm</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    
    <?php include dirname(__DIR__) . "/layout/header.php" ?>

    <ul>
        <li><a href="/aji_langit_farm/page/pemasukan">catatan pemasukan</a></li>
        <li><a href="/aji_langit_farm/page/produksi">catatan produksi</a></li>
    </ul>

    <h1>Dashboard</h1>
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
        <div>
            <h2></h2>
        </div>
    </content>
    

    <?php include dirname(__DIR__) . "/layout/footer.php" ?>

</body>
</html>