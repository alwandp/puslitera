<?php
include_once 'koneksi.php';
include_once 'models/Buku.php';
//tangkap request
$isbn = $_POST['isbn'];
$judul = $_POST['judul'];
$tahun_cetak = $_POST['tahun_cetak'];
$stok = $_POST['stok'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];
$kategori = $_POST['kategori'];
$cover = $_POST['cover'];
//simpan ke array
$data = [
  $isbn,
  $judul,
  $tahun_cetak,
  $stok,
  $penerbit,
  $pengarang,
  $kategori,
  $cover
];
//ekseskusi tombol dengan PDO
$model = new Buku();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'simpan':
    $model->postBuku($data);
    break;

  case 'edit':
    //tangkap hidden field idx
    $data[] = $_POST['idx'];
    $model->putBuku($data);
    break;

  case 'hapus':
    unset($data);
    $model->deleteBuku($_POST['idx']);
    break;

  default:
    header('location:index.php?pg=buku');
    break;
}
header('location:index.php?pg=buku');