<?php

$biodata = query("SELECT b.fullname, b.nisn, b.alamat, b.jenis_kelamin, b.agama, b.tempat_lahir, b.tgl_lahir, 
                  b.asal_sekolah, b.no_telp, b.nama_ortu, u.username 
                  FROM biodata as b 
                  INNER JOIN users as u ON b.user_id = u.id_user
                  WHERE b.user_id = '" . $_SESSION['user_id'] . "'");

?>

<h1>Data Biodata</h1>

<!-- <div class="container"> -->
<table class="table">
  <thead class="thead-Primary">
    <tr class="bg-info">
      <td>Username</td>
      <td>Fullname</td>
      <td>NISN</td>
      <td>Alamat</td>
      <td>Jenis Kelamin</td>
      <td>Agama</td>
      <td>Tempat Lahir</td>
      <td>Tanggal Lahir</td>
      <td>Asal Sekolah</td>
      <td>No Telepon</td>
      <td>Nama Orang Tua</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($biodata as $row) : ?>
      <tr>
        <td><?= $row['username'] ?></td>
        <td><?= $row['fullname'] ?></td>
        <td><?= $row['nisn'] ?></td>
        <td><?= $row['alamat'] ?></td>
        <td><?= $row['jenis_kelamin'] ?></td>
        <td><?= $row['agama'] ?></td>
        <td><?= $row['tempat_lahir'] ?></td>
        <td><?= $row['tgl_lahir'] ?></td>
        <td><?= $row['asal_sekolah'] ?></td>
        <td><?= $row['no_telp'] ?></td>
        <td><?= $row['nama_ortu'] ?></td>
        <td>
          <a href="index.php?page=update_biodata&id=<?= $_SESSION['user_id'] ?>" class="btn btn-success btn-md"><i class="fa fa-pencil-square"></i></a>
          <a href="" class="btn btn-danger btn-md"><i class="fa fa-trash "></i></a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>
<!-- </div> -->