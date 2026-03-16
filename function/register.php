<?php
require "../connection.php";

function register($data) {
    global $connection;

    $no_telephone = $data["no_telephone"];
    $password = mysqli_real_escape_string($connection, $data["password"]);
    $password_verification = mysqli_real_escape_string($connection, $data["password_verification"]);

    $verification = mysqli_query($connection, "SELECT no_telephone FROM admin WHERE no_telephone = '$no_telephone'");

    if (mysqli_fetch_assoc($verification)) {
        echo "<script> alert('No telephone sudah terdaftar') </script>";
        return false;
    }

    if ($password !== $password_verification) {
        echo "<script> alert('verifikasi password salah') </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($connection, "INSERT INTO admin VALUES ('$no_telephone', '', '', '$password')");
    return mysqli_affected_rows($connection);
}

?>