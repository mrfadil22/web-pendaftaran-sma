<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';
switch ($page) {
  case 'home':
    include '../user/views/home.php';
    break;
  case 'biodata':
    include '../user/views/tambah_biodata.php';
    break;
  case 'pendaftaran':
    include '../user/views/tambah_pendaftaran.php';
    break;
  case 'cetak':
    include '../user/views/cetak_kartu.php';
    break;
  case 'profile':
    include '../user/views/edit_user.php';
    break;
  case 'view_pendaftaran':
    include '../user/views/view_pendaftaran.php';
    break;
  case 'view_biodata':
    include '../user/views/view_biodata.php';
    break;
  case 'update_biodata':
    include '../user/views/update_biodata.php';
    break;
  case 'update_pendaftaran':
    include '../user/views/update_pendaftaran.php';
    break;
  default:
    include '../user/views/home.php';
    break;
}
