<?php
$obj_penerbit = new Penerbit();
$obj_pengarang = new Pengarang();
$obj_kategori = new Kategori();
$obj_buku = new Buku();

$publishers = $obj_penerbit->dataPenerbit();
$authors = $obj_pengarang->dataPengarang();
$categories = $obj_kategori->dataKategori();

//Edit data
$idedit = $_REQUEST['idedit'];
$old_data = (!empty($idedit)) ? $obj_buku->getBuku($idedit) : [];
?>
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Form Buku</h2>
    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=buku">Data Buku</a></li>
        <?php 
        if (empty($idedit)) {
        ?>
        <li class="breadcrumb-item active" aria-current="page">Input Buku</li>
        <?php } else { ?>
        <li class="breadcrumb-item active" aria-current="page">Edit Buku</li>
        <?php } ?>
      </ol>
    </nav>
  </div>
</div><!-- End Breadcrumbs -->

<section>
  <div class="container">
    <!-- Form -->
    <form action="buku_controller.php" method="POST">
      <div class="row">
        <div class="col-lg-6">
          <div class="mb-3">
            <label for="inputIsbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="inputIsbn" name="isbn" value="<?= $old_data['isbn'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputJudul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="inputJudul" name="judul" value="<?= $old_data['judul'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputTahun" class="form-label">Tahun Cetak</label>
            <input type="text" class="form-control" id="inputTahun" name="tahun_cetak" value="<?= $old_data['tahun_cetak'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputStok" class="form-label">Stok Buku</label>
            <input type="text" class="form-control" id="inputStok" name="stok" value="<?= $old_data['stok'] ?>">
          </div>
        </div>

        <div class="col-lg-6">
          <div class="mb-3">
            <label for="inputPenerbit" class="form-label">Penerbit</label>
            <select name="penerbit" id="inputPenerbit" class="form-select">
              <option value="">-- Pilih Penerbit --</option>
              <?php 
              foreach($publishers as $publisher) {
                $selected1 = $old_data['idpenerbit'] == $publisher['id'] ? 'selected' : '';
              ?>
              <option value="<?= $publisher['id'] ?>" <?= $selected1 ?>><?= $publisher['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="inputPengarang" class="form-label">Pengarang</label>
            <select name="pengarang" id="inputPengarang" class="form-select">
              <option value="">-- Pilih Pengarang --</option>
              <?php 
              foreach($authors as $author) {
                $selected2 = $old_data['idpengarang'] == $author['id'] ? 'selected' : '';
              ?>
              <option value="<?= $author['id'] ?>" <?= $selected2 ?>><?= $author['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="inputKategori" class="form-label">Kategori</label>
            <select name="kategori" id="inputKategori" class="form-select">
              <option value="">-- Pilih Kategori --</option>
              <?php 
              foreach($categories as $category) {
                $selected3 = $old_data['kategori_id'] == $category['id'] ? 'selected' : '';
              ?>
              <option value="<?= $category['id'] ?>" <?= $selected3 ?>><?= $category['nama'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="inputCover" class="form-label">Cover Buku</label>
            <input type="text" class="form-control" id="inputCover" name="cover" value="<?= $old_data['cover'] ?>">
          </div>
        </div>
        <div class="col-12">
          <?php 
          if (empty($idedit)) {
          ?>
          <button type="submit" class="btn btn-primary" name="proses" value="simpan">Simpan</button>
          <?php 
          } else {
          ?>
          <button type="submit" class="btn btn-success" name="proses" value="edit">Edit</button>
          <!-- hidden field for clause where id=? -->
          <input type="hidden" name="idx" value="<?= $idedit ?>">
          <?php } ?>
          <button type="submit" class="btn btn-secondary" name="proses" value="batal">Batal</button>
        </div>
      </div>
      
    </form>
  </div>
</section>