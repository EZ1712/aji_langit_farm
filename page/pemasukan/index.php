<?php
session_start();

if ( !isset($_SESSION["admin"])) {
    header("Location: ../../index.php");
    exit;
}

require '../../function/pemasukan.php';
require '../../function/produk.php';

function auto_hitung($harga ,$kuantitas) {
    return $harga * $kuantitas;
}

// $hargas = produk("SELECT paket, harga FROM produk");
// $harga = [];

// foreach ($hargas as $data_harga) {
//     $harga[$data_harga["paket"]] = $data_harga["harga"];
// }
// var_dump($harga);


if (isset($_POST["catat_pemasukan"])) {

    $tanggal = $_POST["tanggal"];
    $produk = $_POST["produk"];
    $kuantitas = $_POST["kuantitas"];
    $catat_pemasukan = $_POST["pemasukan"];

    $data_harga = produk("SELECT harga FROM produk WHERE paket = '$produk'");
    $harga = $data_harga[0]['harga'];

    if (empty($catat_pemasukan)) {
        $catat_pemasukan = auto_hitung($harga ,$kuantitas);
    } 
    
    $query = "INSERT INTO pemasukan VALUES ('', '$tanggal', '$produk', '$kuantitas', '$catat_pemasukan')";
    catat_pemasukan($query);

    echo("
    <script>alert('berhasil mencatat pemasukan')</script>
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
    <h1>Catat Pemasukan</h1>
    <form action="" method="post">
        <label for="tanggal">Tanggal</label>
        <input type="datetime-local" name="tanggal" id="tanggal">

        <label for="produk">Produk</label>
        <select name="produk" id="produk">
            <?php
            $produks = produk("SELECT * FROM produk");
            foreach ($produks as $produk):
            ?>
            <option value="<?=$produk["paket"] ?>"><?=$produk["paket"]?></option>
            <?php 
            endforeach;?>
        </select>

        <label for="kuantitas">Kuantitas</label>
        <input type="number" name="kuantitas" id="kuantitas">

        

        <label for="pemasukan">Pemasukan</label>
        <input type="number" name="pemasukan" id="pemasukan">

        <button type="submit" name="catat_pemasukan">Catat Pemasukan</button>
    </form>

    <h1>Pemasukan</h1>
    <table style="width: 100%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Produk</th>
            <th>Kuantitas</th>
            <th>Pemasukan</th>
        </tr>
        <?php
        $count = 1;
        $pemasukans = pemasukan("SELECT * FROM pemasukan");
        foreach ($pemasukans as $pemasukan ) :
        ?>
        <tr>
            <td><?=$count ?></td>
            <td><?=$pemasukan["tanggal"] ?></td>
            <td><?=$pemasukan["produk"] ?></td>
            <td><?=$pemasukan["kuantitas"] ?></td>
            <td><?=$pemasukan["pemasukan"] ?></td>
        </tr>
        <?php $count += 1; endforeach;
        
        ?>
    </table>


    </content>

    <?php include "../../layout/footer.php" ?>

</body>
</html>