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

function pagination($offset, $page) {
    return ($page - 1) * $offset;
}

$result = total_data("SELECT COUNT(*) AS total FROM pemasukan");
$total_data = $result[0]['total'];

$limit = 10; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = pagination($limit, $page);

$total_halaman = ceil($total_data / $limit);

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
    <link rel="stylesheet" href="style_backup.css">
</head>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
    

    <?php include "../../layout/header.php" ?>

    
    <section class="form-card">
        <h1 class="title-green">Catatan pemasukan</h1>
        <form action="" method="post" class="input-form">
            <input type="datetime-local" name="tanggal" id="tanggal" required placeholder="Tanggal">
            
            <select name="produk" id="produk" required>
                <option value="" disabled selected>Produk</option>
                <?php
                $produks = produk("SELECT * FROM produk");
                foreach ($produks as $produk):
                ?>
                <option value="<?=$produk["paket"] ?>"><?=$produk["paket"]?></option>
                <?php endforeach;?>
            </select>

            <input type="number" name="kuantitas" id="kuantitas" placeholder="Jumlah DOD" min="1" onkeydown="return event.keyCode !== 69" required>

            <input type="number" name="pemasukan" id="pemasukan" onkeydown="return event.keyCode !== 69" min="1" placeholder="Nominal (Kosongkan untuk otomatis isi)">

            <button type="submit" name="catat_pemasukan" class="btn-submit">Catat pemasukan</button>
        </form>
    </section>

    <div class="container-pemasukan">
    <h1>Pemasukan</h1>
    
    <div class="table-section">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Produk</th>
                    <th>Kuantitas</th>
                    <th>Pemasukan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                $pemasukans = pemasukan("SELECT * FROM pemasukan ORDER BY tanggal DESC LIMIT $limit OFFSET $offset");
                foreach ($pemasukans as $pemasukan ) :
                ?>
                <tr>
                    <td><?=$count ?></td>
                    <td><?=$pemasukan["tanggal"] ?></td>
                    <td><?=$pemasukan["produk"] ?></td>
                    <td><?=$pemasukan["kuantitas"] ?></td>
                    <td>Rp <?= number_format($pemasukan["pemasukan"], 0, ',', '.') ?></td>
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