<?php
class Buku {
  //member1: variabel
  private $koneksi;
  //member2: constructor
  public function __construct() {
    global $dbh; //call instance object
    $this->koneksi = $dbh;
  }
  //member3: method
  public function dataBuku() {
    $sql = "SELECT  b.*, pe.nama AS penerbit, pg.nama AS pengarang, k.nama AS kategori 
            FROM buku b
            INNER JOIN penerbit pe ON pe.id = b.idpenerbit
            INNER JOIN pengarang pg ON pg.id = b.idpengarang
            INNER JOIN kategori k ON k.id = b.kategori_id";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
  }

  //method detail buku
  public function getBuku($id) {
    $sql = "SELECT  b.*, pe.nama AS penerbit, pg.nama AS pengarang, k.nama AS kategori 
            FROM buku b
            INNER JOIN penerbit pe ON pe.id = b.idpenerbit
            INNER JOIN pengarang pg ON pg.id = b.idpengarang
            INNER JOIN kategori k ON k.id = b.kategori_id
            WHERE b.id = ?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
  }

  //method simpan buku
  public function postBuku($data) {
    $sql = "INSERT INTO buku (isbn, judul, tahun_cetak, stok, idpenerbit, idpengarang, kategori_id, cover)
            VALUES (?,?,?,?,?,?,?,?)";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method ubah buku
  public function putBuku($data) {
    $sql = "UPDATE buku SET isbn=?, judul=?, tahun_cetak=?, stok=?, idpenerbit=?, idpengarang=?, kategori_id=?, cover=?
            WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
  }

  //method hapus buku
  public function deleteBuku($id) {
    $sql = "DELETE FROM buku WHERE id=?";
    //mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
  }
}