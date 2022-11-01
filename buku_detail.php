<?php
$id = $_REQUEST['id'];
$obj = new Buku();
$data = $obj->getBuku($id);
?>
<!-- Breadcrumbs -->
<div class="breadcrumbs" data-aos="fade-in">
  <div class="container">
    <h2>Detil Buku</h2>
    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=koleksi_buku">Koleksi Buku</a></li>
        <li class="breadcrumb-item" aria-current="page"><?= $data['judul'] ?></li>
      </ol>
    </nav>  
  </div>
</div><!-- End Breadcrumbs -->

<!-- Book Details Section -->
<section id="book-details" class="book-details my-4">
  <div class="container" data-aos="fade-up">

    <div class="row">
      <div class="col-lg-4">
        <img src="assets/img/cover/<?= $data['cover'] ?>" class="img-fluid book-cover" alt="">
      </div>
      <div class="col-lg-8">
        <h3><?= $data['judul'] ?></h3>
        <p class="author"><?= $data['pengarang'] ?> (Pengarang)</p>
        <p class="category"><i class="bi bi-tag"></i> <?= $data['kategori'] ?></p>
        <div class="book-info pt-3">
          <h4>Detil Buku</h4>

          <div class="book-info-item d-flex justify-content-between align-items-center">
            <h5>ISBN</h5>
            <p><?= $data['isbn'] ?></p>
          </div>
  
          <div class="book-info-item d-flex justify-content-between align-items-center">
            <h5>Penerbit</h5>
            <p><?= $data['penerbit'] ?></p>
          </div>
  
          <div class="book-info-item d-flex justify-content-between align-items-center">
            <h5>Tahun Cetak</h5>
            <p><?= $data['tahun_cetak'] ?></p>
          </div>
  
          <div class="book-info-item d-flex justify-content-between align-items-center">
            <h5>Stok</h5>
            <p><?= $data['stok'] ?></p>
          </div>
        </div>

      </div>
    </div>

  </div>
</section>
<!-- End Book Details Section -->