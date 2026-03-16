<?php
require '../function/register.php';

if ( isset($_POST["register"])) {
    var_dump($_POST);
    if( register($_POST) > 0) {
        echo "<script> alert('register succes') </script>";
    } else {
        // echo "<script> alert('register failed') </script>";
        echo mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <?php include "../layout/header.php" ?>

    <content>
        <h1>Register account</h1>
    <form action="" method="post">
        <label for="no_telephone">No Telephone</label>
        <input type="number" name="no_telephone" id="no_telephone">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <label for="password_verification">Password Verification</label>
        <input type="password" name="password_verification" id="password_verification">

        <input type="submit" name="register">

    </form>

    </content>

    <?php include "../layout/footer.php" ?>
    
</body>
</html>