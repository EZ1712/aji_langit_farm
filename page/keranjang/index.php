<?php
session_start();
require "../../function/keranjang.php";
require "../../connection.php";
require '../../function/produk.php';

if ( isset($_POST["keranjang"])) {

    $nama = $_POST["nama"];
    $no_telephone = $_POST["no_telephone"];
    $alamat = $_POST["alamat"];
    $paket = $_POST["paket"];
    $kuantitas = $_POST["kuantitas"];

    $query_keranjang = "INSERT INTO keranjang VALUES ('','$no_telephone', '$nama', NOW(), '$alamat', '$paket', '$kuantitas', 0)";
    keranjang($query_keranjang);

    echo("
    <script>alert('berhasil membeli, menunggu konfirmasi')</script>
    ");
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php include "../../layout/header.php" ?>

    <content>
        <form action="" method="post">
        <h1>Identitas</h1>

        <label for="nama">Nama</label>

        <!-- Validasi setelah submit -->
        <!-- <input type="text" name="nama" id="nama" pattern="[A-Za-z]+[A-Za-z\s]*" required placeholder="Nama" /> -->
        
        <!-- Validasi ketika diketik -->
        <input type="text" name="nama" id="nama" pattern="^[a-zA-Z\s]+$" title="Masukan Huruf" oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" required placeholder="Nama" 
/>

        <label for="no_telephone">No Telephone</label>
        <input type="tel" name="no_telephone" id="no_telephone" placeholder="081234567890" required pattern="08[0-9]{9,}" onkeydown="return event.keyCode !== 69" oninput="this.value = this.value.replace(/[^0-9]/g, '');"/>

        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" required placeholder="Alamat">

        <h1>Paket</h1>
        <label for="paket">Paket</label>
        <select name="paket" id="paket" required>
            <option value="" disabled selected>Pilih Produk</option>
            <?php
            $produks = produk("SELECT * FROM produk");
            foreach ($produks as $produk):
            ?>
            <option value="<?=$produk["paket"] ?>"><?=$produk["paket"] ?></option>
            <?php endforeach; ?>
        </select>    
                    
        <label for="kuantitas">Kuantitas</label>
        <input type="number" name="kuantitas" id="kuantitas" min="1" required onkeydown="return event.keyCode !== 69" placeholder="Kuantitas"/>
            
        <button type="submit" name="keranjang">Beli</button>

        </form>
    </content>

    <?php include "../../layout/footer.php" ?>

</body>
</html>