<?php
include_once 'koneksi.php';
include_once 'models/Penerbit.php';
//tangkap request
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$website = $_POST['website'];
$telp = $_POST['telp'];
//simpan ke array
$data = [
  $nama,
  $alamat,
  $email,
  $website,
  $telp
];
//ekseskusi tombol dengan PDO
$model = new Penerbit();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'simpan':
    $model->postPenerbit($data);
    break;

  case 'edit':
    //tangkap hidden field idx
    $data[] = $_POST['idx'];
    $model->putPenerbit($data);
    break;

  case 'hapus':
    unset($data);
    $model->deletePenerbit($_POST['idx']);
    break;

  default:
    header('location:index.php?pg=penerbit');
    break;
}
header('location:index.php?pg=penerbit');