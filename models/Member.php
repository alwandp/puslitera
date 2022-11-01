<?php
class Member {
  //member1: variabel
  private $koneksi;
  //member2: constructor
  public function __construct() {
    global $dbh; //call instance object
    $this->koneksi = $dbh;
  }
  //member3: method
  public function dataMember() {
    $sql = "SELECT  * FROM member";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
  }

  //method detail member
  public function getMember($id) {
    $sql = "SELECT * FROM member WHERE id = ?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
  }

  //method simpan member
  public function postMember($data) {
    $sql = "INSERT INTO member (fullname, email, username, password, role, foto)
            VALUES (?,?,?,?,?,?)";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method ubah member
  public function putMember($data) {
    $sql = "UPDATE member SET fullname=?, email=?, username=?, password=?, role=?, foto=?
            WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method hapus member
  public function deleteMember($id) {
    $sql = "DELETE FROM member WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
  }

  //method detail member
  public function checkLogin($data) {
    $sql = "SELECT * FROM member WHERE username = ? AND password = SHA1(MD5(SHA1(?)))";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
    $rs = $ps->fetch();
    return $rs;
  }
}