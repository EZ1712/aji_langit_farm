<?php
session_start();
$directory = "../layout/header.php";
require '../function/login.php';
require '../connection.php';

if (isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])) {

    $no_telephone = $_POST["no_telephone"];
    $password = $_POST["password"];

    $no_telephone_verification =  mysqli_query($connection, "SELECT * FROM admin WHERE no_telephone = '$no_telephone'");
    if ( mysqli_num_rows($no_telephone_verification) === 1 ) {
        $data = mysqli_fetch_assoc($no_telephone_verification);
        if ( password_verify($password, $data["password"]) ) {
            $_SESSION["admin"] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aji Langit Farm</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    
    <?php include "../layout/header.php" ?>

    <content>
    <h1>Login</h1>

    <?php if( isset($error)) : ?>
        <p>no telephone / password salah</p>
    <?php endif; ?>

    <form action="" method="post">
        <label for="no_telephone">No Telepon</label>
        <input type="number" name="no_telephone" id="no_telephone">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit" name="login">Masuk</button>
    </form>

    </content>

    <?php include "../layout/footer.php" ?>

</body>
</html>