<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "aji_langit_farm";

$connection = mysqli_connect($host, $user, $password, $db);

function query($query) {
    global $connection;
    $result = mysqli_query($connection, $query);

    $datas = [];
    while ( $data = mysqli_fetch_assoc($result) ) {
        $datas[] = $data;
    }
    return $datas;
}

?>