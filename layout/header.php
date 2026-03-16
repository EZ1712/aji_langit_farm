<?php 
// session_start();

?>
<nav>
    <div class="nav-container">
        <img src="assets/logo.png" alt="Logo" class="logo-img">
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
</nav>

<!-- <nav class="nav-container">
    <ul class="nav-links">
        <li><a href="/aji_langit_farm/">Beranda</a></li>
        <li><a href="/aji_langit_farm/page/produk">Produk</a></li>
        <li><a href="/aji_langit_farm/page/keranjang">keranjang</a></li>
    </ul>
</nav> -->

