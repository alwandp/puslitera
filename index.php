<?php
session_start();
include_once 'koneksi.php';
// Include Models
include_once 'models/Buku.php';
include_once 'models/Penerbit.php';
include_once 'models/Pengarang.php';
include_once 'models/Kategori.php';
include_once 'models/Member.php';

include_once 'head.php';
include_once 'navbar.php';

// include_once 'main.php';
$page = $_REQUEST['pg'];
if (!empty($page)) {
  include_once $page.'.php';
} else {
  include_once 'home.php';
}

include_once 'footer.php';
include_once 'foot.php';