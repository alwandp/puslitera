<?php
$session = $_SESSION['MEMBER'];
?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">

    <h1 class="logo me-auto"><a href="index.php">Puslitera</a></h1>
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?pg=koleksi_buku">Koleksi</a></li>
        <li><a href="index.php?pg=about">Tentang</a></li>
        <li><a href="index.php?pg=contact">Kontak</a></li>
        <?php
        if (!isset($session)) {
        ?>
        <li><a href="login.php">Login</a></li>
        <?php 
        } else {
        ?>
        <li class="dropdown"><a href="#"><span>Master Data</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="index.php?pg=buku">Buku</a></li>
            <li><a href="index.php?pg=penerbit">Penerbit</a></li>
            <li><a href="index.php?pg=pengarang">Pengarang</a></li>
            <li><a href="index.php?pg=kategori">Kategori</a></li>
          </ul>
        </li>
        <li class="dropdown"><a href="#"><img src="assets/img/profile/<?= $session['foto'] ?>" alt="mdo" width="32" height="32" class="rounded-circle"><span class="ms-2"><?= $session['fullname'] ?></span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="https://github.com/alwandp" target="_blank">Profile</a></li>
            <?php 
            if ($session['role'] == 'admin') {
            ?>
            <li><a href="index.php?pg=member">Kelola User</a></li>
            <?php } ?>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
        <?php } ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->


  </div>
</header><!-- End Header -->

<main id="main">