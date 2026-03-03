<?php
require dirname(__DIR__) . '/../function/pemasukan.php';


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

    <h1>Pemasukan</h1>
    <content>

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

    <?php include dirname(__DIR__) . "/../layout/footer.php" ?>

</body>
</html>