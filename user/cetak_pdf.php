<?php
session_start();

require "../controllers/functions.php";
require "../vendor/autoload.php";

use Dompdf\Dompdf;

// $query_p = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'");
$query_b = mysqli_query($conn, "SELECT * FROM biodata WHERE user_id = '" . $_SESSION['user_id'] . "'");

$query_p = mysqli_query($conn, "SELECT p.id_pendaftaran, p.jurusan_id, j.nama_jurusan, p.nilai_mtk, p.nilai_ipa, p.nilai_ing, p.nilai_ind, 
                      p.ijazah, s.nama_status, u.username
                      FROM pendaftaran as p
                      INNER JOIN jurusan as j ON p.jurusan_id = j.id_jurusan
                      INNER JOIN status as s ON p.status_id = s.id_status
                      INNER JOIN users as u ON p.user_id = u.id_user
                      WHERE user_id = '" . $_SESSION['user_id'] . "'");

$pendaftaran = mysqli_fetch_array($query_p);
$biodata = mysqli_fetch_array($query_b);

$id = $pendaftaran['id_pendaftaran'];
$jurusan = $pendaftaran['nama_jurusan'];
$sekolah = $biodata['asal_sekolah'];
$nisn = $biodata['nisn'];
$name = $biodata['fullname'];
$kelamin = $biodata['jenis_kelamin'];
$status = $pendaftaran['nama_status'];

// echo $id;

$html =
  // '<h1>Kartu Pendaftaran</h1>' .
  '<html><body>' .
  '<center>' .
  '<h4> PEMERINTAH PROVINSI JAWA BARAT</h4>' .
  '<h3 style="line-height:0.1em;"> DINAS PENDIDIKAN DAN KEBUDAYAAN </h3>' .
  '<h2 style="line-height:0.3em;"> SMAN 9 KOTA TASIKMALAYA </h2>' .
  '<p style="line-height:0.2em; font-size : 13px;"> Alamat: Jl. Leuwi Dahu No.61, Parakannyasag, Kec. Indihiang, Kab. Tasikmalaya, Jawa Barat 46111 Telp (0265) 333148 </p>' .
  '<p style="line-height:0.2em; font-size : 13px;"> Email : info@sman9tsm.sch.id, Website : sman9tasikmalaya.ac.id </p>' .
  '<hr>' .
  '<h2> Kartu Pendaftaran </h2>' .
  '<table border="1" cellpadding="10" cellspacing="0" align="center">' .
  '<tr>' .
  '<th colspan="2">Id Pendaftaran : ' . $id . '</th>' .
  '</tr>' .
  '<tr>' .
  '<th>Nama :</th>' .
  '<td>' . $name . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>NISN :</th>' .
  '<td>' . $nisn . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>Jenis Kelamin :</th>' .
  '<td>' . $kelamin . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>Asal Sekolah :</th>' .
  '<td>' . $sekolah . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>Jurusan :</th>' .
  '<td>' . $jurusan . '</td>' .
  '</tr>' .
  '<tr>' .
  '<th>Status :</th>' .
  '<td>' . $status . '</td>' .
  '</tr>' .
  '</table></center></body></html>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('kartu.pdf', array("Attachment" => 0));
