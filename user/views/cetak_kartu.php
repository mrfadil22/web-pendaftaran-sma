<?php

$pendaftaran = query("SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "' ")[0];
$biodata = query("SELECT * FROM biodata WHERE user_id = '" . $_SESSION['user_id'] . "'")[0];

?>

<h1>Cetak Kartu</h1>

<ul>
  <li>
    <?= $pendaftaran['id_pendaftaran']; ?>
  </li>
  <li>
    <?= $biodata['fullname'] ?>
  </li>
  <li>
    <?= $biodata['nisn'] ?>
  </li>
  <li>
    <?= $biodata['jenis_kelamin'] ?>
  </li>
  <li>
    <?= $biodata['asal_sekolah'] ?>
  </li>
  <li>
    <?= $pendaftaran['jurusan_id']; ?>
  </li>
  <li><a href="cetak_pdf.php" target="_blank">Cetak Kartu</a></li>
</ul>