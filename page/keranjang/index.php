<?php
require dirname(__DIR__) . "/../function/keranjang.php";
require dirname(__DIR__) . "/../connection.php";
require dirname(__DIR__) . '/../function/produk.php';

if ( isset($_POST["keranjang"])) {

    $no_telephone = $_POST["no_telephone"];
    $paket = $_POST["paket"];
    $kuantitas = $_POST["kuantitas"];

    $query = "INSERT INTO keranjang VALUES ('$no_telephone', '$paket', '$kuantitas')";
    keranjang($query);

    echo("
    <script>alert('berhasil memasukan keranjang')</script>
    ");
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php include dirname(__DIR__) . "/../layout/header.php" ?>
    <p>Keranjang</p>
    <content>
        <form action="" method="post">

        <ul>
            <li>
                <label for="no_telephone">No Telephone</label>
                <input type="text" name="no_telephone" id="no_telephone"/>
            </li>
            <li>
                <label for="paket">Paket</label>
                <select name="paket" id="paket">
                    <?php
                    $produks = produk("SELECT * FROM produk");
                    foreach ($produks as $produk):
                    ?>
                    <option value="<?=$produk["paket"] ?>"><?=$produk["paket"] ?></option>
                    <?php endforeach; ?>
                </select>
            </li>
            <li>
                <label for="kuantitas">Kuantitas</label>
                <input type="number" name="kuantitas" id="kuantitas"/>
            </li>
            <li>
                <button type="submit" name="keranjang">Beli</button>
            </li>
        </ul>
            
        
            

            
        </form>
    </content>

    <?php include dirname(__DIR__) . "/../layout/footer.php" ?>

</body>
</html>