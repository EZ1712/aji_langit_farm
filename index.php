<?php 
session_start();

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aji Langit Farm</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <?php include "layout/header.php" ?>

    <header class="hero">
        <div class="hero-text">
            <h1>Penyedia Itik DOD <br> Aji Langit Farm</h1>
        </div>
    </header>

    <main class="content">
        <section class="product-feature">
            <img src="itik.png" alt="Itik DOD" class="main-prod-img">
            <p class="tagline">Itik (DOD) Lokal Indramayu</p>
        </section>

        <section class="icons-grid">
            <div class="icon-item">
                <img src="icon1.png" alt="Ternak Sehat">
                <p>Ternak Sehat</p>
            </div>
            <div class="icon-item">
                <img src="icon2.png" alt="Box Pengiriman">
                <p>BOX pengiriman</p>
            </div>
            <div class="icon-item">
                <img src="icon3.png" alt="Pengiriman Aman">
                <p>Pengiriman Aman</p>
            </div>
        </section>

        <section class="about-us">
            <h2>Tentang Kami</h2>
            <p>Kami merupakan peternak yang bergerak dalam penyediaan itik DOD (Day Old Duck) secara langsung dari
                peternakan. Dengan sistem pemeliharaan yang baik, pakan berkualitas, serta pengawasan kebersihan yang
                terjaga, dan terpercaya bagi pelanggan.</p>
        </section>
    </main>


     <!-- <content>
        <div>
            <h1 id="nav">Aji Langit Farm</h1>
        </div>
        <div>
            <h2 class="nav">itik lokal</h2>
        </div>
        <div>
            <h2>tentang kami</h2>
        </div>
    </content> -->
    <?php include "layout/footer.php" ?>

</body>
</html>