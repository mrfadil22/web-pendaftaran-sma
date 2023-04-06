<?php

$users = query("SELECT u.id_user, u.username, u.email, u.password, u.image, l.nama_level
                FROM users as u
                INNER JOIN level as l ON u.level_id = l.id_level
                WHERE u.level_id = 2;");

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
        <td>ID User</td>
        <td>Username</td>
        <td>Email</td>
        <td>Password</td>
        <td>Image</td>
        <td>Level</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $row) : ?>
        <tr>
          <td><?= $row['id_user'] ?></td>
          <td><?= $row['username'] ?></td>
          <td><?= $row['email'] ?></td>
          <td><?= $row['password'] ?></td>
          <td> <img src="../file/img/<?= $row['image'] ?>" width="50px"></td>
          <td><?= $row['nama_level'] ?></td>
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