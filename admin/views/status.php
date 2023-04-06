<?php

$status = query("SELECT * FROM status");

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
    <h3>Data Users</h3>
  </div>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <td>ID status</td>
        <td>Nama status</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($status as $row) : ?>
        <tr>
          <td><?= $row['id_status'] ?></td>
          <td><?= $row['nama_status'] ?></td>
          <td>
            <a href="">Update</a>
            <a href="">Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <a href="index.php?page=tambahStatus" class="btn btn-success btn-md">Tambah Status</a>
</div>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>