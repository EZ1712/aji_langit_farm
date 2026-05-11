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
    $paket = $_POST["paket"];
    $kuantitas = $_POST["kuantitas"];
    $catat_pemasukan = $_POST["total"];
    $status += 1;

    
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date("Y-m-d H:i:s");


    
    // $query = "INSERT INTO pemasukan VALUES ('', '$tanggal', '$produk', '$kuantitas', '$catat_pemasukan')";

    catat_pemasukan("INSERT INTO pemasukan VALUES ('', '$tanggal', '$paket', '$kuantitas', '$catat_pemasukan')");
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
    <link rel="stylesheet" href="style.css">
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
<!-- 
    <div class="header-nav">
    <div class="logo-section">
        <img src="path_ke_logo_bebek_anda.png" alt="Logo">
    </div>
    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="produk.php">Produk</a></li>
        <li><span class="cart-icon">🛒</span></li>
    </ul>
</div> -->

<!-- <div class="main-wrapper"> -->
    <!-- <div class="auth-group">
    <a href="logout.php" class="btn-nav btn-red">Logout</a>
    <a href="register.php" class="btn-nav btn-green">Tambah akun</a>
</div> -->
    
    <!-- <ul style="list-style:none; display:flex; gap:10px; justify-content:center; margin:10px 0;">
        <li><a href="/aji_langit_farm/page/pemasukan">catatan pemasukan</a></li>
        <li><a href="/aji_langit_farm/page/produksi">catatan produksi</a></li>
    </ul> -->





    <div class="main-wrapper">
    <div class="admin-nav-container">
        
        <div class="auth-group">
            <a href="logout.php" class="btn-nav btn-red">Logout</a>
            <a href="register.php" class="btn-nav btn-green">Tambah akun</a>
        </div>
        
        <ul class="nav-list">
            <li><a href="/aji_langit_farm/page/pemasukan" class="btn-nav btn-green">catatan pemasukan</a></li>
            <li><a href="/aji_langit_farm/page/produksi" class="btn-nav btn-green">catatan produksi</a></li>
        </ul>
        
    </div>
    </div>

    <h1 class="dashboard-title">Dashboard</h1>
    
    <content>
    <div class="table-container">
        <table class="table-custom">
            <thead>
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
            </thead>
            <tbody>
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
                            // echo("<td>$total number_format($total, 0, ',', '.')  </td>");
                            echo "<td>Rp " . number_format($total, 0, ',', '.') . "</td>";
                        }
                    endforeach;
                    ?>

                    <?php
                    $status = ($keranjang["status"]);
                    if ($status == 0):
                        echo "<td class='status-0'>" . status($keranjang["status"]) . "</td>";
                    else :
                        echo "<td class='status-1'>" . status($keranjang["status"]) . "</td>";
                    endif;
                    ?>
                    <!-- <td>
                        <p></p>
                    </td> -->

                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?=$keranjang["id"] ?>">
                            <input type="hidden" name="status" value="<?=$keranjang["status"] ?>">
                            <input type="hidden" name="paket" value="<?=$keranjang["paket"] ?>">
                            <input type="hidden" name="total" value="<?=$total ?>">
                            <input type="hidden" name="kuantitas" value="<?=$keranjang["kuantitas"] ?>">
                            
                            <input type="submit" name="delete" value="Update Status" onclick="return confirm('Apakah anda ingin mengubah statusnya menjadi [<?= status_update($keranjang["status"]) ?>]')">
                        </form>
                    </td>
                </tr>
                <?php
                $no += 1;
                endforeach;
                ?>
            </tbody>
        </table>
    </div>
</content>


















    

    <?php include "../layout/footer.php" ?>

</body>
</html>