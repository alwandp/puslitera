<?php
$model = new Kategori();
$categories = $model->dataKategori();
$ar_judul = ['No', 'Nama Kategori', 'Action'];
//session hak akses halaman
$session = $_SESSION['MEMBER'];
if (isset($session)) {
?>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Data Kategori</h2>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- Categories Section -->
<section id="categories" class="categories">
  <div class="container" data-aos="fade-up">
    <div class="row d-flex justify-content-center">
      <?php 
      if ($session['role'] == 'admin') {
      ?>
      <div class="col-lg-10 py-2 mb-4">
        <a class="btn btn-primary" href="index.php?pg=kategori_form" role="button"><i class="bi bi-plus-lg"></i> Tambah Kategori</a>
      </div>
      <?php } ?>
      <div class="col-lg-10 mb-4">
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
            foreach($categories as $category) { 
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $category['nama'] ?></td>
              <td>
              <?php 
              if ($session['role'] == 'admin') {
              ?>
                <form action="kategori_controller.php" method="POST" class="action">
                  <a href="index.php?pg=kategori_form&idedit=<?= $category['id'] ?>">
                    <button type="button" class="btn-action btn-edit" title="Edit Buku">
                      <i class="bi bi-pencil-square" aria-hidden="true"></i>
                    </button>
                  </a>
                  <button type="submit" class="btn-action btn-delete" name="proses" value="hapus"
                      onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" title="Hapus Buku">
                      <i class="bi bi-trash-fill" aria-hidden="true"></i>
                  </button>
                  <input type="hidden" name="idx" value="<?= $category['id'] ?>">
                </form>
              <?php } ?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- End Categories Section -->
<?php 
} else {
  echo '<script>alert("Anda Dilarang Mengakses Halaman Ini!");history.back();</script>';
} 
?>