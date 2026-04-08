<?php
session_start();

if ( !isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

require '../function/dashboard.php';

if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    $status = (int)$_POST["status"];
    $status += 1;
    update_status("UPDATE keranjang SET status=$status WHERE id='$id'");
    
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aji Langit Farm</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        table,tr,th,td {
            border: solid black 2px;
        }

        table {
            width: 100%;
        }
    </style>
</head>
<body>
    
    <?php include "../layout/header.php" ?>
    <a href="logout.php">Logout</a>
    <a href="register.php">Tambah akun</a>
    <ul>
        <li><a href="/aji_langit_farm/page/pemasukan">catatan pemasukan</a></li>
        <li><a href="/aji_langit_farm/page/produksi">catatan produksi</a></li>
    </ul>

    <h1>Dashboard</h1>
    
     <content>

        <table>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Alamat</th>
                <th>No Telephone</th>
                <th>Paket</th>
                <th>Kuantitas</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php
            $produks = produk("SELECT paket,harga FROM produk");
            $keranjangs = keranjang("SELECT * FROM keranjang WHERE status <= 1 ORDER BY tanggal ASC");
            $no = 1;
            foreach ($keranjangs as $keranjang):
                $paket = $keranjang["paket"];
                $kuantitas = (int)$keranjang["kuantitas"];
            ?>
            <tr>
                <td><?=$no ?></td>
                <td><?=$keranjang["nama"] ?></td>
                <td><?=$keranjang["tanggal"] ?></td>
                <td><?=$keranjang["alamat"] ?></td>
                <td><?=$keranjang["no_telephone"] ?></td>
                <td><?=$paket ?></td>
                <td><?=$kuantitas ?></td>
                <?php
                foreach ( $produks as $produk) : 
                    if ($paket == $produk["paket"]) {
                        $total = (int)$produk["harga"] * $kuantitas;
                        echo("<td>$total</td>");
                    }
                endforeach;
                ?>
                <td><p><?= status($keranjang["status"]) ?></p></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?=$keranjang["id"] ?>">
                        <input type="hidden" name="status" value="<?=$keranjang["status"] ?>">
                        <input type="submit" name="delete" value="Update Status" onclick="return confirm('Apakah anda ingin mengubah statusnya menjadi [<?= status_update($keranjang["status"]) ?>]')">
                    </form>
                </td>
            </tr>
            <?php
            $no += 1;
            endforeach;
            ?>
        </table>

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
    

    <?php include "../layout/footer.php" ?>

</body>
</html>