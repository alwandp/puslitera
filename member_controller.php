<?php
session_start();
include_once 'koneksi.php';
include_once 'models/Member.php';
//tangkap request form login
$username = $_POST['username'];
$password = $_POST['password'];
//simpan ke array
$data = [
  $username,
  $password
];
//proses otentikasi user
$model = new Member();
$rs = $model->checkLogin($data);
if (!empty($rs)) {
  $_SESSION['MEMBER'] = $rs;
  header('location:index.php?pg=buku');
} else {
  echo '<script>alert("Username/Password Anda Salah!");history.back();</script>';
}