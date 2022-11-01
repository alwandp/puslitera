<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

include_once 'koneksi.php';
include_once 'models/Pengarang.php';
//tangkap request
$nama = $_POST['nama'];
$email = $_POST['email'];
$hp = $_POST['hp'];
//simpan ke array
$data = [
  $nama,
  $email,
  $hp
];
//ekseskusi tombol dengan PDO
$model = new Pengarang();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
  case 'simpan':
    $model->postPengarang($data);
    break;

  case 'edit':
    //tangkap hidden field idx
    $data[] = $_POST['idx'];
    $model->putPengarang($data);
    break;

  case 'hapus':
    unset($data);
    $model->deletePengarang($_POST['idx']);
    break;

  default:
    header('location:index.php?pg=pengarang');
    break;
}
header('location:index.php?pg=pengarang');