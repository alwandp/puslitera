<?php
include_once 'koneksi.php';
include_once 'models/Kategori.php';
//tangkap request
$nama = $_POST['nama'];
//simpan ke array
$data = [
  $nama
];
//ekseskusi tombol dengan PDO
$model = new Kategori();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'simpan':
    $model->postKategori($data);
    break;

  case 'edit':
    //tangkap hidden field idx
    $data[] = $_POST['idx'];
    $model->putKategori($data);
    break;

  case 'hapus':
    unset($data);
    $model->deleteKategori($_POST['idx']);
    break;

  default:
    header('location:index.php?pg=kategori');
    break;
}
header('location:index.php?pg=kategori');