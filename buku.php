<?php
$model = new Buku();
$data_books = $model->dataBuku();
$ar_judul = ['No', 'ISBN', 'Judul', 'Pengarang', 'Penerbit', 'Kategori', 'Action'];
//session hak akses halaman
$session = $_SESSION['MEMBER'];
if (isset($session)) {
?>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Data Buku</h2>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- Books Table Section -->
<section id="booksTable" class="books-table">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <?php 
      if ($session['role'] == 'admin') {
      ?>
      <div class="col-12 py-2 mb-4">
        <a class="btn btn-primary" href="index.php?pg=buku_form" role="button"><i class="bi bi-plus-lg"></i> Tambah Buku</a>
      </div>
      <?php } ?>
      <div class="col-12 mb-4">
        <table id="pusliteraTable" class="table table-hover display responsive nowrap" width="100%">
          <thead>
            <tr>
              <?php
              foreach($ar_judul as $judul) { 
              ?>
              <th><?= $judul ?></th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach($data_books as $book) { 
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $book['isbn'] ?></td>
              <td><?= $book['judul'] ?></td>
              <td><?= $book['pengarang'] ?></td>
              <td><?= $book['penerbit'] ?></td>
              <td><?= $book['kategori'] ?></td>
              <td>
                <form action="buku_controller.php" method="POST" class="action">
                  <a href="index.php?pg=buku_detail&id=<?= $book['id'] ?>">
                    <button type="button" class="btn-action btn-view" title="Detail Buku">
                      <i class="bi bi-eye-fill"></i>
                    </button>
                  </a>
                  <?php 
                  if ($session['role'] == 'admin') {
                  ?>
                  <a href="index.php?pg=buku_form&idedit=<?= $book['id'] ?>">
                    <button type="button" class="btn-action btn-edit" title="Edit Buku">
                      <i class="bi bi-pencil-square" aria-hidden="true"></i>
                    </button>
                  </a>
                  <button type="submit" class="btn-action btn-delete" name="proses" value="hapus"
                      onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" title="Hapus Buku">
                      <i class="bi bi-trash-fill" aria-hidden="true"></i>
                  </button>
                  <input type="hidden" name="idx" value="<?= $book['id'] ?>">
                  <?php } ?>
                </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section>
<!-- End Books Table Section -->
<?php 
} else {
  echo '<script>alert("Anda Dilarang Mengakses Halaman Ini!");history.back();</script>';
} 
?>