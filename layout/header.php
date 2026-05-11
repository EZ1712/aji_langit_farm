<?php 
// session_start();

$path = "logo.png";
    if (!file_exists($path)) {
        $path = "../../assets/logo.png";
        if (!file_exists($path)) {
            $path = "../assets/logo.png";
        }
}


// <img src="<?= $path 
?>

<nav>
    <div class="nav-container">
        <img src="<?= $path ?>" alt="Logo" class="logo-img">
        
        <div class="menu-toggle" id="mobile-menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>

        <div class="nav-links" id="nav-links">
            <a href="/aji_langit_farm/">Beranda</a>
            <a href="/aji_langit_farm/page/produk">Produk</a>
            <?php if (isset($_SESSION["admin"])) {
                echo("<a href='/aji_langit_farm/page/produksi'>Produksi</a>");
                echo("<a href='/aji_langit_farm/page/pemasukan'>Pemasukan</a>");
                echo("<a href='/aji_langit_farm/admin'>Dashboard</a>");
            } ?>
            <a href="/aji_langit_farm/page/keranjang" class="cart-icon">🛒</a>
        </div>
    </div>
</nav>













<!-- <nav>
    <div class="nav-container">
        <img src="<?= $path ?>" alt="Logo" class="logo-img">
        <div class="nav-links">
            <a href="/aji_langit_farm/">Beranda</a>
            <a href="/aji_langit_farm/page/produk">Produk</a>
            <?php if (isset($_SESSION["admin"])) {
                echo("<a href='/aji_langit_farm/page/produksi'>Produksi</a>");
                echo("<a href='/aji_langit_farm/page/pemasukan'>Pemasukan</a>");
                echo("<a href='/aji_langit_farm/admin'>Dashboard</a>");
            } ?>
            
            <a href="/aji_langit_farm/page/keranjang" class="cart-icon">🛒</a>
        </div>
    </div>
</nav> -->
<script>
    const menu = document.querySelector('#mobile-menu');
    const menuLinks = document.querySelector('#nav-links');

    menu.addEventListener('click', function() {
        // Toggle class 'active' untuk menampilkan/menyembunyikan menu
        menuLinks.classList.toggle('active');
        
        // Opsional: Animasi hamburger jadi silang (X)
        menu.classList.toggle('is-active');
    });
</script>
<!-- <nav class="nav-container">
    <ul class="nav-links">
        <li><a href="/aji_langit_farm/">Beranda</a></li>
        <li><a href="/aji_langit_farm/page/produk">Produk</a></li>
        <li><a href="/aji_langit_farm/page/keranjang">keranjang</a></li>
    </ul>
</nav> -->

