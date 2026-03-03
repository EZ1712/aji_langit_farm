<?php
require dirname(__DIR__) . '/../function/produksi.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aji Langit Farm</title>
    
</head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
    

    <?php include dirname(__DIR__) . "/../layout/header.php" ?>

    <h1>Produksi</h1>
    <content>

    <table style="width: 100%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>jumlah menetas</th>
            <th>jumlah mati</th>
        </tr>
        <?php
        $count = 1;
        $produksis = produksi("SELECT * FROM produksi");
        foreach ($produksis as $produksi ) :
        ?>
        <tr>
            <td><?=$count ?></td>
            <td><?=$produksi["tanggal"] ?></td>
            <td><?=$produksi["jumlah_menetas"] ?></td>
            <td><?=$produksi["jumlah_mati"] ?></td>
        </tr>
        <?php $count += 1; endforeach;
        
        ?>
    </table>


    </content>

    <?php include dirname(__DIR__) . "/../layout/footer.php" ?>

</body>
</html>