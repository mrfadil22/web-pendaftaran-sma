<?php

session_start();
require "../controllers/functions.php";

if ($_SESSION['level'] == '') {
  # code...
  header("location:../index.php");
  exit;
}

// $biodata1 = mysqli_query($conn, "SELECT * FROM biodata WHERE user_id = '" . $_SESSION['user_id'] . "'");
// $pendaftaran1 = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'");
// $status1 =  mysqli_query($conn, "SELECT p.id_pendaftaran,
//                                 s.nama_status
//                                 FROM pendaftaran as p
//                                 INNER JOIN status as s ON p.status_id = s.id_status
//                                 WHERE p.user_id = '" . $_SESSION['user_id'] . "'");

// $row = mysqli_fetch_assoc($status1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./style.css" />
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap.min.css"> -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script> -->
  <title>ADMIN PSB SMAN 9</title>
  <link rel="icon" type="image/x-icon" href="../logo.ico">
</head>

<body>
  <!-- partial:index.partial.html -->
  <nav class="mnb navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <i class="ic fa fa-bars"></i>
        </button>
        <div style="padding: 15px 0">
          <a href="#" id="msbo"><i class="ic fa fa-bars"></i></a>
        </div>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">En</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['username'] ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="index.php?page=profile">Edit Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="../logout.php">Logout</a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="fa fa-bell-o"></i></a>
          </li>
          <li>
            <a href="#"><i class="fa fa-comment-o"></i></a>
          </li>
        </ul>
        <form class="navbar-form navbar-right">
          <input type="text" class="form-control" placeholder="Search..." />
        </form>
      </div>
    </div>
  </nav>
  <!--msb: main sidebar-->
  <div class="msb" id="msb">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <div class="brand-wrapper">
          <!-- Brand -->
          <div class="brand-name-wrapper">
            <a class="navbar-brand" href="#"> DASHBOARD </a>
          </div>
        </div>
      </div>

      <!-- Main Menu -->
      <div class="side-menu-container">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="index.php?page=home"><i class="fa fa-dashboard"></i>Dashboard</a>
          </li>
          <li>
            <a href="index.php?page=biodata"><i class="fa fa-book"></i>Biodata</a>
          </li>
          <li>
            <a href="index.php?page=pendaftaran"><i class="fa fa-book"></i>Pendaftaran</a>
          </li>

          <li>
            <a href="index.php?page=detail" id="detail"><span class="fa fa-user"></span>Detail User</a>
          </li>

          <li class="panel panel-default" id="dropdown">
            <a data-toggle="collapse" href="#dropdown-lvl1">
              <i class="fa fa-cog"></i> Settings
              <span class="caret"></span>
            </a>
            <!-- Dropdown level 1 -->
            <div id="dropdown-lvl1" class="panel-collapse collapse">
              <div class="panel-body">
                <ul class="nav navbar-nav">
                  <li><a href="index.php?page=level">Level</a></li>
                  <li><a href="index.php?page=status">Status</a></li>
                  <li><a href="index.php?page=jurusan">Jurusan</a></li>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
  </div>
  <!--main content wrapper-->
  <div class="mcw">
    <!--navigation here-->
    <!--main content view-->
    <?php include "../controllers/config-admin.php" ?>
  </div>
  <!-- partial -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="./script.js"></script>
</body>

</html>