<?php

function delete($query) {
    global $connection;
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

?>