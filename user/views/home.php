<?php

$biodata = mysqli_query($conn, "SELECT * FROM biodata WHERE user_id = '" . $_SESSION['user_id'] . "'");
$pendaftaran = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'");

$status = mysqli_query($conn, "SELECT p.id_pendaftaran,
                                s.nama_status
                                FROM pendaftaran as p
                                INNER JOIN status as s ON p.status_id = s.id_status
                                WHERE p.user_id = '" . $_SESSION['user_id'] . "'");

$users = mysqli_query($conn, "SELECT * FROM users WHERE id_user ='" . $_SESSION['user_id'] . "'");

$row = mysqli_fetch_assoc($status);
$user = mysqli_fetch_assoc($users);
$reg = mysqli_fetch_assoc($pendaftaran);
?>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

<style>
  #link {
    color: red;
    text-decoration: none;
  }

  #link2 {
    color: red;
    text-decoration: none;
  }

  #link3 {
    display: none;
    color: red;
    text-decoration: none;
  }

  #status {
    display: none;
  }

  .card-counter {
    box-shadow: 2px 2px 10px #dadada;
    margin: 5px;
    /* padding: 10px 110px; */
    background-color: #fff;
    height: 140px;
    border-radius: 5px;
    transition: 0.3s linear all;
  }

  .card-counter:hover {
    box-shadow: 4px 4px 20px #dadada;
    transition: 0.3s linear all;
  }

  .card-counter.primary {
    background-color: #007bff;
    color: #fff;
  }

  .card-counter.danger {
    background-color: #ef5350;
    color: #fff;
  }

  .card-counter.success {
    background-color: #66bb6a;
    color: #fff;
  }

  .card-counter.info {
    background-color: #26c6da;
    color: #fff;
  }

  .card-counter i {
    font-size: 3em;
    /* opacity: 0.2; */
  }

  .card-counter .count-numbers {
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name {
    /* position: absolute; */
    left: 89px;
    top: 60px;
    text-align: center;
    /* font-style: italic; */
    color: white;
    text-transform: capitalize;
    /* opacity: 0.5; */
    display: block;
    font-size: 18px;
    font-weight: bold;
  }

  p {
    text-align: center;
  }

  #biodata_done {
    display: none;
  }

  #biodata_empty {
    display: block;
  }

  #pendaftaran_done {
    display: none;
  }

  #pendaftaran_empty {
    display: none;
  }

  #data_biodata {
    display: none;
  }

  #data_pendaftaran {
    display: none;
  }

  #cetak_kartu {
    display: none;
  }

  img {
    height: 80px;
  }
</style>

<div class="container">
  <div class="" style="display: block; margin-top: 20px;">
    <div class="alert alert-dark" role="alert" id="menunggu" style="display: none;">
      <h4 class="alert-heading">Status : Menunggu</h4>
      <p>Silahkan Tunggu Sampai Pengumumuan Selanjutnya</p>
      <hr>
      <p class="mb-0">Ada pertanyaan seputar pendaftaran online? silahkan hubungi kami di kontak yang tertera</p>
    </div>
    <div class="alert alert-success" role="alert" id="lulus" style="display: none;">
      <h4 class="alert-heading">Status Lulus</h4>
      <p>Selamat Anda Dinyatakan Lulus Sebagai Siswa Baru di SMAN 9 Tasikmalaya</p>
      <hr>
      <p class="mb-0">Silahkan Cetak Kartu Tanda Lulus Anda, dan Lakukan Daftar Ulang di SMAN 9 Tasikmalaya</p>
    </div>
    <div class="alert alert-danger" role="alert" id="tidak_lulus" style="display: none;">
      <h4 class="alert-heading">Status : Tidak Lulus</h4>
      <p>Mohon Maaf Anda Dinyatakan Tidak Lulus Pada Pendaftaran Siswa Di SMAN 9 Tasikmalaya</p>
      <hr>
      <p class="mb-0">Jangan Putus Asa Dan Tetap Semangat</p>
    </div>
    <div class="alert alert-warning" role="alert" id="dicadangkan" style="display: none;">
      <h4 class="alert-heading">Status : Dicadangkan</h4>
      <p>Anda Dinyatakan Sebagai Calon Siswa yang Dicadangkan, Silahkan Tunggu Kabar Selanjutnya</p>
      <hr>
      <p class="mb-0">Ada pertanyaan seputar pendaftaran online? silahkan hubungi kami di kontak yang tertera</p>
    </div>
  </div>

  <div class="col-md-12" style="margin-bottom: 10px;">
    <div class="col-md-1">
      <img src="../file/img/<?= $user['image'] ?>" width="80px" alt="">
    </div>
    <div class="col-md-2">
      <h5><?= $_SESSION['username'] ?></h5>
      <h5 id="id_pendaftaran">Id Pendaftaran</h5>
      <a href="index.php?page=profile">Edit</a>
    </div>
  </div>
  <div class="row-md-12" style="margin-bottom: 10px;">
    <div class="col-md6">
      <h5>*Petunjuk Pendaftaran Online SMAN 9 Tasikmalaya</h5>
    </div>
    <div class="col-md6">
      <h5>1. Isi dan Lengkapi Form Biodata Terlebih Dahulu</h5>
    </div>
    <div class="col-md6">
      <h5>2. Isi dan Lengkapi Form Pendafataran</h5>
    </div>
    <div class="col-md6">
      <h5>* Ket : Kedua Form Harus Terisi dengan Lengkap</h5>
    </div>
  </div>

  <div class="row-md-3" id="pendaftaran">
    <div class="col-md-3">
      <a href="index.php?page=update_biodata&id=<?= $_SESSION['user_id'] ?>" id="biodata_done">
        <div class="card-counter success">
          <i class="fa fa-check"></i>
          <!-- <span class="count-numbers">12</span> -->
          <span class="count-name">Form Biodata</span>
          <p>Form Biodata Sudah Berhasil Ditambahkan</p>
        </div>
      </a>
      <a href="index.php?page=biodata" id="biodata_empty">
        <div class="card-counter danger">
          <i class="fa fa-times"></i>
          <!-- <span class="count-numbers">599</span> -->
          <span class="count-name">Form Biodata</span>
          <p>Silahkan isi form pendaftaran dengan lengkap</p>
        </div>
      </a>
      <a href="cetak_pdf.php" id="cetak_kartu" style="margin-top: 10px;" target="_blank">
        <div class="card-counter primary" style="padding-top:50px;">
          <!-- <i class="fa fa-times"></i> -->
          <!-- <span class="count-numbers">599</span> -->
          <span class="count-name">Cetak Kartu</span>
          <p>Cetak Kartu Untuk Calon Siswa</p>
        </div>
      </a>
    </div>
  </div>

  <div class="row-md-3">
    <div class="col-md-3">
      <a href="index.php?page=update_pendaftaran&id=<?= $_SESSION['user_id'] ?>" id="pendaftaran_done">
        <div class="card-counter success">
          <i class="fa fa-check"></i>
          <!-- <span class="count-numbers">12</span> -->
          <span class="count-name">Pendaftaran</span>
          <p>Pendaftaran Sudah Berhasil Ditambahkan</p>
        </div>
      </a>
      <a href="index.php?page=pendaftaran" id="pendaftaran_empty">
        <div class="card-counter danger">
          <i class="fa fa-times"></i>
          <!-- <span class="count-numbers">599</span> -->
          <span class="count-name">Pendaftaran</span>
          <p>Silahkan isi form pendaftaran dengan lengkap</p>
        </div>
      </a>
    </div>

    <div class="row-md-3">
      <div class="col-md-3">
        <a href="index.php?page=view_biodata" id="data_biodata">
          <div class="card-counter primary" style="padding-top:50px;">
            <!-- <i class="fa fa-database" style="display: none;"></i> -->
            <!-- <span class="count-numbers">12</span> -->
            <span class="count-name">Data Biodata</span>
            <p>Data Biodata Calon Siswa</p>
          </div>
        </a>
      </div>

      <div class="row-md-3">
        <div class="col-md-3">
          <a href="index.php?page=view_pendaftaran" id="data_pendaftaran">
            <div class="card-counter primary" style="padding-top:50px;">
              <!-- <i class="fa fa-database"></i> -->
              <!-- <span class="count-numbers">12</span> -->
              <span class="count-name">Data Pendaftaran</span>
              <p>Data Pendaftaran Calon Siswa</p>
            </div>
          </a>
        </div>
      </div>
    </div>

  </div>
</div>

<?php if (mysqli_num_rows($biodata) > 0 && mysqli_num_rows($pendaftaran) > 0) { ?>

  <script>
    var x = "<?= $reg['id_pendaftaran'] ?>";
    document.getElementById("id_pendaftaran").innerHTML = x;
  </script>

<?php } ?>


<?php if (mysqli_num_rows($biodata) > 0) { ?>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('#biodata_empty').css('display', 'none');
      $('#biodata_done').css('display', 'block');
      $('#pendaftaran_empty').css('display', 'block');
    });
  </script>

<?php } ?>

<?php if (mysqli_num_rows($pendaftaran) > 0) { ?>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('#pendaftaran_empty').css('display', 'none');
      $('#pendaftaran_done').css('display', 'block');

    });
  </script>

<?php } ?>

<?php if (mysqli_num_rows($pendaftaran) > 0 && mysqli_num_rows($biodata) > 0) { ?>

  <script type='text/javascript'>
    $(document).ready(function() {
      $('#data_biodata').css('display', 'block');
      $('#data_pendaftaran').css('display', 'block');
    });
  </script>

<?php } ?>

<?php if (mysqli_num_rows($pendaftaran) > 0 && mysqli_num_rows($biodata) > 0) { ?>

  <?php if ($row['nama_status'] == "Lulus" && mysqli_num_rows($biodata) > 0) { ?>

    <script type='text/javascript'>
      $(document).ready(function() {
        $('#cetak_kartu').css('display', 'block');
        $('#lulus').css('display', 'block');
      });
    </script>

  <?php } else if ($row['nama_status'] == "Tidak Lulus" && mysqli_num_rows($biodata) > 0) { ?>
    <script type='text/javascript'>
      $(document).ready(function() {
        $('#tidak_lulus').css('display', 'block');
      });
    </script>
  <?php } else if ($row['nama_status'] == "Di Cadangkan" && mysqli_num_rows($biodata) > 0) { ?>
    <script type='text/javascript'>
      $(document).ready(function() {
        $('#dicadangkan').css('display', 'block');
      });
    </script>
  <?php } else { ?>
    <script type='text/javascript'>
      $(document).ready(function() {
        $('#menunggu').css('display', 'block');
      });
    </script>
  <?php } ?>

<?php } ?>