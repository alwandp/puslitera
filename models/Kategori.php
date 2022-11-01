<?php
class Kategori {
  //member1: variabel
  private $koneksi;
  //member2: constructor
  public function __construct() {
    global $dbh; //call instance object
    $this->koneksi = $dbh;
  }
  //member3: method
  public function dataKategori() {
    $sql = "SELECT * FROM kategori";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
  }
  
  //method get id kategori
  public function getKategori($id) {
    $sql = "SELECT * FROM kategori WHERE id = ?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
  }

  //method simpan kategori
  public function postKategori($data) {
    $sql = "INSERT INTO kategori (nama)
            VALUES (?)";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method ubah kategori
  public function putKategori($data) {
    $sql = "UPDATE kategori SET nama=?
            WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method hapus kategori
  public function deleteKategori($id) {
    $sql = "DELETE FROM kategori WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
  }
}