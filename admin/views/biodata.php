<?php

$biodata = query("SELECT b.fullname, b.nisn, b.alamat, b.jenis_kelamin, b.agama, b.tempat_lahir, b.tgl_lahir, 
                  b.asal_sekolah, b.no_telp, b.nama_ortu, u.username 
                  FROM biodata as b 
                  INNER JOIN users as u ON b.user_id = u.id_user
                ");

?>



<!--  -->

<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>

<style>
  .blank {
    height: 80px;
    width: 100%;
  }
</style>


<!-- <title>Document</title>
</head>

<body> -->
<div class="blank"></div>
<div class="container">
  <div class="row header" style="text-align:center;color:green">
    <h3>Data Biodata</h3>
  </div>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
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
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>