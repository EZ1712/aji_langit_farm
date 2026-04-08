<?php
session_start();

if ( !isset($_SESSION["admin"])) {
    header("Location: ../../index.php");
    exit;
}

require '../../function/produksi.php';


if (isset($_POST["catat_produksi"])) {

    $tanggal = $_POST["tanggal"];
    $jumlah_menetas = $_POST["menetas"];
    $jumlah_mati = $_POST["mati"];
    
    $query = "INSERT INTO produksi VALUES ('', '$tanggal', '$jumlah_menetas', '$jumlah_mati')";
    catat_produksi($query);

    echo("
    <script>alert('berhasil mencatat produksi')</script>
    ");
}


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

    
    <content>
    <h1>Catat Produksi</h1>
    <form action="" method="post">
        <label for="tanggal">Tanggal</label>
        <input type="datetime-local" name="tanggal" id="tanggal" required>

        <label for="menetas">Jumlah Menetas</label>
        <input type="number" name="menetas" id="menetas" min="1" required onkeydown="return event.keyCode !== 69" required>

        <label for="mati">Jumlah Mati</label>
        <input type="number" name="mati" id="mati" min="1" required onkeydown="return event.keyCode !== 69" required>

        <button type="submit" name="catat_produksi">Catat Produksi</button>
    </form>

    <h1>Produksi</h1>
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