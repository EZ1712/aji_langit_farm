<?php 

require dirname(__DIR__) . "/connection.php";

function keranjang($query) {
    global $connection;
    $result = mysqli_query($connection, $query);
}

?>