<?php
require "../../connection.php";

function produksi($query) {
    global $connection;
    $result = mysqli_query($connection, $query);

    $datas = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $datas[] = $data;
    }
    return $datas;
}

?>