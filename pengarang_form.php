<?php
$obj_pengarang = new Pengarang();

//Edit data
$idedit = $_REQUEST['idedit'];
$old_data = (!empty($idedit)) ? $obj_pengarang->getPengarang($idedit) : [];
?>
<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Form Pengarang</h2>
    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php?pg=pengarang">Daftar Pengarang</a></li>
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
</div>
<!-- End Breadcrumbs -->

<section>
  <div class="container">
    <!-- Form -->
    <form action="pengarang_controller.php" method="POST">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <div class="mb-3">
            <label for="inputNama" class="form-label">Nama Pengarang</label>
            <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $old_data['nama'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputEmail" class="form-label">Email</label>
            <input type="text" class="form-control" id="inputEmail" name="email" value="<?= $old_data['email'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputHp" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="inputHp" name="hp" value="<?= $old_data['hp'] ?>">
          </div>
        </div>
        <div class="col-lg-8">
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