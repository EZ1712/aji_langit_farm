<?php
require 'connection.php';

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aji Langit Farm</title>
</head>
<body>

    <?php include "layout/header.php" ?>
    
    <content>
        <?php
        $produks = query("SELECT * FROM produk");
        var_dump($produks);
        foreach ( $produks as $produk) : 
        ?>
        <div>
            <p><?= $produk["paket"] ?></p>
            <p>harga : <?= $produk["harga"] ?></p>
            <p>kuantitas : <?= $produk["kuantitas"] ?></p>

        </div>
        <?php endforeach; ?>
    </content>

    <?php include "layout/footer.php" ?>
</body>
</html>