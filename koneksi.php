<?php
$dsn = 'mysql:dbname=dbperpustakaan;host=localhost:3306';
$user = 'root';
$password = '';

try {
  $dbh = new PDO($dsn, $user, $password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbh->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,TRUE);
  // echo 'Koneksi database berhasil';
} catch (PDOException $e) {
  echo 'Terjadi kesalahan saat koneksi/query dengan sebab '.$e->getMessage();
}

?>