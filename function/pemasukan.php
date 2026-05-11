<?php
require "../../connection.php";

function pemasukan($query) {
    global $connection;
    $result = mysqli_query($connection, $query);

    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }
    return $datas;
}

function catat_pemasukan($query) {
    global $connection;
    $result = mysqli_query($connection, $query);
}

function total_data($query) {
    global $connection;
    $result = mysqli_query($connection, $query);

    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }
    return $datas;
}
?>