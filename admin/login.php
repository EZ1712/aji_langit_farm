<?php
$directory = dirname(__DIR__) . "/layout/header.php";
require dirname(__DIR__) . '/function/login.php';

if (isset($_POST["login"])) {

    $no_telephone = $_POST["no_telephone"];
    $password = $_POST["password"];

    $logins = login("SELECT * FROM admin");
    
    
    foreach ($logins as $login)
        // var_dump($login);
        // echo($login["no_telephone"]);

        if ($no_telephone == $login["no_telephone"] && $password == $login["password"]) {
            echo("<script>alert('Login berhasil')</script>");
        }    
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
    
    <?php include dirname(__DIR__) . "/layout/header.php" ?>

    <content>
    <h1>Login</h1>
    <form action="" method="post">
        <label for="no_telephone">No Telepon</label>
        <input type="number" name="no_telephone" id="no_telephone">

        <label for="password">Password</label>
        <input type="password" name="password" id="password">

        <button type="submit" name="login">Masuk</button>
    </form>

    </content>

    <?php include dirname(__DIR__) . "/layout/footer.php" ?>

</body>
</html>