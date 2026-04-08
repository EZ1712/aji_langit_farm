<?php
require "../connection.php";

function produk($query) {
    global $connection;
    $result = mysqli_query($connection, $query);

    $datas = [];
    while ( $data = mysqli_fetch_assoc($result) ) {
        $datas[] = $data;
    }
    return $datas;
}

function keranjang($query) {
    global $connection;
    $result = mysqli_query($connection, $query);

    $datas = [];
    while ( $data = mysqli_fetch_assoc($result) ) {
        $datas[] = $data;
    }
    return $datas;
}

function update_status($query) {
    global $connection;
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

function status($status) {
    if ((int)$status == 0) {
        return "Pesanan baru";
    } else if ((int)$status == 1) {
        return "Sedang diproses";
    } else {
        return "Selesai";
    }
}

function status_update($status) {
    $status = (int)$status + 1;
    if ((int)$status == 0) {
        return "Pesanan baru";
    } else if ((int)$status == 1) {
        return "Sedang diproses";
    } else {
        return "Selesai";
    }
}
?>