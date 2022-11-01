<?php
$model = new Penerbit();
$publishers = $model->dataPenerbit();
$ar_judul = ['No', 'Nama', 'Alamat', 'Email', 'Website', 'Telepon', 'Action'];
//session hak akses halaman
$session = $_SESSION['MEMBER'];
if (isset($session)) {
?>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Data Penerbit</h2>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- Publishers Section -->
<section id="publishers" class="publishers">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <?php 
      if ($session['role'] == 'admin') {
      ?>
      <div class="col-12 py-2 mb-4">
        <a class="btn btn-primary" href="index.php?pg=penerbit_form" role="button"><i class="bi bi-plus-lg"></i> Tambah Penerbit</a>
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
            foreach($publishers as $publisher) { 
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $publisher['nama'] ?></td>
              <td><?= $publisher['alamat'] ?></td>
              <td><?= $publisher['email'] ?></td>
              <td><?= $publisher['website'] ?></td>
              <td><?= $publisher['telp'] ?></td>
              <td>
                <?php 
                if ($session['role'] == 'admin') {
                ?>
                <form action="penerbit_controller.php" method="POST" class="action">
                  <a href="index.php?pg=penerbit_form&idedit=<?= $publisher['id'] ?>">
                    <button type="button" class="btn-action btn-edit" title="Edit Penerbit">
                      <i class="bi bi-pencil-square" aria-hidden="true"></i>
                    </button>
                  </a>
                  <button type="submit" class="btn-action btn-delete" name="proses" value="hapus"
                      onclick="return confirm('Anda Yakin Ingin Menghapus Data?')" title="Hapus Penerbit">
                      <i class="bi bi-trash-fill" aria-hidden="true"></i>
                  </button>
                  <input type="hidden" name="idx" value="<?= $publisher['id'] ?>">
                </form>
                <?php } ?>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>

  </div>
</section>
<!-- End Publishers Section -->
<?php 
} else {
  echo '<script>alert("Anda Dilarang Mengakses Halaman Ini!");history.back();</script>';
} 
?>