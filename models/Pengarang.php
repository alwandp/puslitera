<?php
class Pengarang {
  //member1: variabel
  private $koneksi;
  //member2: constructor
  public function __construct() {
    global $dbh; //call instance object
    $this->koneksi = $dbh;
  }
  //member3: method
  public function dataPengarang() {
    $sql = "SELECT * FROM pengarang";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
  }

  //method get id pengarang
  public function getPengarang($id) {
    $sql = "SELECT * FROM pengarang WHERE id = ?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
  }

  //method simpan pengarang
  public function postPengarang($data) {
    $sql = "INSERT INTO pengarang (nama, email, hp)
            VALUES (?,?,?)";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method ubah pengarang
  public function putPengarang($data) {
    $sql = "UPDATE pengarang SET nama=?, email=?, hp=?
            WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method hapus pengarang
  public function deletePengarang($id) {
    $sql = "DELETE FROM pengarang WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
  }
}