<?php
$model = new Pengarang();
$authors = $model->dataPengarang();
$ar_judul = ['No', 'Nama', 'Email', 'Telepon', 'Action'];
//session hak akses halaman
$session = $_SESSION['MEMBER'];
if (isset($session)) {
?>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Data Pengarang</h2>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- Authors Section -->
<section id="pengarang" class="authors">
  <div class="container" data-aos="fade-up">
    <div class="row d-flex justify-content-center">
      <?php 
      if ($session['role'] == 'admin') {
      ?>
      <div class="col-xl-10 py-2 mb-4">
        <a class="btn btn-primary" href="index.php?pg=pengarang_form" role="button"><i class="bi bi-plus-lg"></i> Tambah Pengarang</a>
      </div>
      <?php } ?>
      <div class="col-xl-10 mb-4">
        <table id="pusliteraTable" class="table table-hover display responsive nowrap mb-4" width="100%">
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
            foreach($authors as $author) { 
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $author['nama'] ?></td>
              <td><?= $author['email'] ?></td>
              <td><?= $author['hp'] ?></td>
              <td>
              <?php 
              if ($session['role'] == 'admin') {
              ?>
                <form action="pengarang_controller.php" method="POST" class="action">
                  <a href="index.php?pg=pengarang_form&idedit=<?= $author['id'] ?>">
                    <button type="button" class="btn-action btn-edit" title="Edit Pengarang">
                      <i class="bi bi-pencil-square" aria-hidden="true"></i>
                    </button>
                  </a>
                  <button type="submit" class="btn-action btn-delete" name="proses" value="hapus"
                      onclick="return confirm('Anda Yakin Ingin Mengapus Data?')" title="Hapus Pengarang">
                      <i class="bi bi-trash-fill" aria-hidden="true"></i>
                  </button>
                  <input type="hidden" name="idx" value="<?= $author['id'] ?>">
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
<!-- End Authors Section -->
<?php 
} else {
  echo '<script>alert("Anda Dilarang Mengakses Halaman Ini!");history.back();</script>';
} 
?>