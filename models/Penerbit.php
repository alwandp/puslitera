<?php
class Penerbit {
  //member1: variabel
  private $koneksi;
  //member2: constructor
  public function __construct() {
    global $dbh; //call instance object
    $this->koneksi = $dbh;
  }
  //member3: method
  public function dataPenerbit() {
    $sql = "SELECT * FROM penerbit";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
  }

  //method get id penerbit
  public function getPenerbit($id) {
    $sql = "SELECT * FROM penerbit WHERE id = ?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
  }

  //method simpan penerbit
  public function postPenerbit($data) {
    $sql = "INSERT INTO penerbit (nama, alamat, email, website, telp)
            VALUES (?,?,?,?,?)";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method ubah penerbit
  public function putPenerbit($data) {
    $sql = "UPDATE penerbit SET nama=?, alamat=?, email=?, website=?, telp=?
            WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method hapus penerbit
  public function deletePenerbit($id) {
    $sql = "DELETE FROM penerbit WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
  }
}