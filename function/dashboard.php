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

function delete($query) {
    global $connection;
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

?>