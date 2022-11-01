<?php
$model = new Member();
$members = $model->dataMember();
$ar_judul = ['No', 'Nama Lengkap', 'Email', 'Username', 'Role', 'Action'];
//session hak akses
$session = $_SESSION['MEMBER'];
if (isset($session) && $session['role'] == 'admin') {
?>
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
  <div class="container">
    <h2>Data Member</h2>
  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Courses Section ======= -->
<section id="courses" class="courses">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-12 py-2 mb-4">
        <a class="btn btn-primary" href="index.php?pg=member_form" role="button"><i class="bi bi-plus-lg"></i> Tambah Member</a>
      </div>
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
            foreach($members as $member) { 
            ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $member['fullname'] ?></td>
              <td><?= $member['email'] ?></td>
              <td><?= $member['username'] ?></td>
              <td><?= $member['role'] ?></td>
              <td>
                <form action="member_controller.php" method="POST" class="action">
                  <a href="index.php?pg=member_form&idedit=<?= $member['id'] ?>">
                    <button type="button" class="btn-action btn-edit" title="Edit Member">
                      <i class="bi bi-pencil-square" aria-hidden="true"></i>
                    </button>
                  </a>
                  <button id="btn-hapus" type="submit" class="btn-action btn-delete" name="proses" value="hapus" 
                    title="Hapus Member" onclick="return confirm('Anda Yakin Ingin Menghapus Data?')">
                      <i class="bi bi-trash-fill" aria-hidden="true"></i>
                  </button>
                  <input type="hidden" name="idx" value="<?= $member['id'] ?>">
                </form>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</section><!-- End Courses Section -->
<?php 
} else {
  echo '<script>alert("Anda Dilarang Mengakses Halaman Ini!");history.back();</script>';
} 
?>