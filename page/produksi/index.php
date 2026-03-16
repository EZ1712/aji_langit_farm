<?php
session_start();

if ( !isset($_SESSION["admin"])) {
    header("Location: ../../index.php");
    exit;
}

require '../../function/produksi.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aji Langit Farm</title>
    <link rel="stylesheet" href="../../style.css">
</head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
    

    <?php include "../../layout/header.php" ?>

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

    <?php include "../../layout/footer.php" ?>

</body>
</html>