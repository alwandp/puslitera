<?php
$model = new Buku();
$books = $model->dataBuku();
?>
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Koleksi Buku</h2>
  </div>
</div><!-- End Breadcrumbs -->

<!-- Books Section -->
<section id="books" class="books">
  <div class="container" data-aos="fade-up">
    <div class="row" data-aos="zoom-in" data-aos-delay="100">
      <?php
      foreach($books as $book) {
      ?>
      <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-3">
        <a href="index.php?pg=buku_detail&id=<?= $book['id'] ?>">
          <div class="book-item">
            <img src="assets/img/cover/<?= $book['cover'] ?>" class="img-fluid" alt="cover buku <?= $book['judul'] ?>">
            <div class="book-content">
              <div class="mb-3">
                <p><i class="bi bi-tag"></i> <?= $book['kategori'] ?></p>
                <h3><?= $book['judul'] ?></h3>
                <span><?= $book['pengarang'] ?></span>
              </div>
            </div>
          </div>
        </a>
      </div> <!-- End Book Item-->
      <?php } ?>
    </div>

  </div>
</section>
<!-- End Book Section -->