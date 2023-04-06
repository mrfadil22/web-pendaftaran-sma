<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'home':
    include "../admin/views/home.php";
    break;
  case 'biodata':
    include "../admin/views/biodata.php";
    break;
  case 'pendaftaran':
    include "../admin/views/pendaftaran.php";
    break;
  case 'detail':
    include "../admin/views/detail_users.php";
    break;
  case 'update':
    include "../admin/views/ubah_status.php";
    break;
  case 'download':
    include "../admin/views/download_pdf.php";
    break;
  case 'jurusan':
    include "../admin/views/jurusan.php";
    break;
  case 'level':
    include "../admin/views/level.php";
    break;
  case 'status':
    include "../admin/views/status.php";
    break;
  case 'tambahJurusan':
    include "../admin/views/tambah_jurusan.php";
    break;
  case 'tambahLevel':
    include "../admin/views/tambah_level.php";
    break;
  case 'tambahStatus':
    include "../admin/views/tambah_status.php";
    break;

  default:
    include "../admin/views/home.php";
    break;
}
