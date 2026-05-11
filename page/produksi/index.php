<?php
session_start();

if ( !isset($_SESSION["admin"])) {
    header("Location: ../../index.php");
    exit;
}

require '../../function/produksi.php';

function pagination($offset, $page) {
    return ($page - 1) * $offset;
}


$result = total_data("SELECT COUNT(*) AS total FROM produksi");
$total_data = $result[0]['total'];



$limit = 5; // Jumlah data per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Ambil hal dari URL
$offset = pagination($limit, $page);

$total_halaman = ceil($total_data / $limit);

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
    <link rel="stylesheet" href="style.css">
</head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
    

    <?php include "../../layout/header.php" ?>

    <!-- <content class="main-container"> -->
    <section class="form-box">
        <h1 class="form-title">Input Produksi Itik DOD (Menetas)</h1>
        <form action="" method="post" class="styled-form">
            <input type="datetime-local" name="tanggal" id="tanggal" required placeholder="Tanggal menetas">

            <input type="number" name="menetas" id="menetas" min="1" required onkeydown="return event.keyCode !== 69" placeholder="Jumlah DOD menetas">

            <input type="number" name="mati" id="mati" min="1" required onkeydown="return event.keyCode !== 69" placeholder="Jumlah DOD mati">

            <button type="submit" name="catat_produksi" class="btn-save">Catat produksi</button>
        </form>
    </section>

  

    <div class="container">
    <h1 class="title-green">Produksi</h1>
    
    <div class="table-section">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah Menetas</th>
                    <th>Jumlah Mati</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = $offset + 1;
                $produksis = produksi("SELECT * FROM produksi ORDER BY tanggal DESC LIMIT $limit OFFSET $offset ");
                foreach ($produksis as $produksi ) :
                ?>
                <tr>
                    <td><?=$count ?></td>
                    <td><?=$produksi["tanggal"] ?></td>
                    <td><?=$produksi["jumlah_menetas"] ?></td>
                    <td><?=$produksi["jumlah_mati"] ?></td>
                </tr>
                <?php $count += 1; endforeach; ?>
            </tbody>
        </table>
    </div>



 <div class="pagination-wrapper">
    <?php if ($page > 1) : ?>
            <a href="?page=<?= $page - 1 ?>" class="btn-pagination"><</a>
        <?php else:?>
            <span class="btn-pagination-disable"><</span>
    <?php endif; ?>


    <!-- bagian page nya -->
    <?php for($i = 1; $i <= $total_halaman; $i++): ?>
        <?php if($i == $page): ?>
            <a href="?page=<?= $i; ?>" class="page-info-active"><?= $i; ?></a>
        <?php elseif($i == 1 || $i == $total_halaman || ($i >= $page - 1 && $i <= $page + 1)): ?>
            <a href="?page=<?= $i; ?>" class="page-info"><?= $i; ?></a>
        <?php elseif($i == $page - 2 || $i == $page + 2): ?>
            <span class="page-info">...</span>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if ($page < $total_halaman) : ?>
            <a href="?page=<?= $page + 1 ?>" class="btn-pagination">></a>
        <?php else:?>
            <span class="btn-pagination-disable">></span>
    <?php endif; ?>

    </div>
</div>






















    <?php include "../../layout/footer.php" ?>

</body>
</html>