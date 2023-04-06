<?php

$pendaftaran = query("SELECT p.id_pendaftaran, j.nama_jurusan, p.nilai_mtk, p.nilai_ipa, p.nilai_ing, p.nilai_ind, p.tgl_pend,
                      p.ijazah, s.nama_status, u.username
                      FROM pendaftaran as p
                      INNER JOIN jurusan as j ON p.jurusan_id = j.id_jurusan
                      INNER JOIN status as s ON p.status_id = s.id_status
                      INNER JOIN users as u ON p.user_id = u.id_user");

if (isset($_POST['submit'])) {
  if (update_status($_POST) > 0) {
    echo "
    <script>
      alert('Status Berhasil Di Update');
      document.location.href = 'index.php?page=pendaftaran';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

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

  .modal {
    /* position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    overflow-x: hidden; */
    margin-top: 130px;
  }

  .modal-open {
    overflow: hidden;
  }
</style>


<!-- <title>Document</title>
</head>

<body> -->
<div class="blank"></div>
<div class="div" style="margin: 0 10px;">
  <div class="row header" style="text-align:center;color:green">
    <h3>Data Pendaftar</h3>
  </div>
  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
      <tr>
        <td>Tanggal Pend</td>
        <td>id_pendaftaran</td>
        <td>user</td>
        <td>jurusan</td>
        <td>nilai_mtk</td>
        <td>nilai_ipa</td>
        <td>nilai_ing</td>
        <td>nilai_ind</td>
        <td>Total Nilai</td>
        <td>ijazah</td>
        <td>status</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pendaftaran as $row) : ?>
        <tr>
          <td><?= $row['tgl_pend'] ?></td>
          <td><?= $row['id_pendaftaran'] ?></td>
          <td><?= $row['username'] ?></td>
          <td><?= $row['nama_jurusan'] ?></td>
          <td><?= $row['nilai_mtk'] ?></td>
          <td><?= $row['nilai_ipa'] ?></td>
          <td><?= $row['nilai_ing'] ?></td>
          <td><?= $row['nilai_ind'] ?></td>
          <td><?php
              if ($row['nama_jurusan'] == 'IPA') {
                $x = $row['nilai_mtk'] * 4;
                $y = $row['nilai_ipa'] * 5;
                $z = $row['nilai_ind'] * 3;
                $a = $row['nilai_ing'] * 3;
                echo $x + $y + $z + $a;
              } else {
                $x = $row['nilai_mtk'] * 4;
                $y = $row['nilai_ipa'] * 2;
                $z = $row['nilai_ind'] * 5;
                $a = $row['nilai_ing'] * 4;
                echo $x + $y + $z + $a;
              }
              ?></td>
          <td><?= $row['ijazah'] ?></td>
          <td><?= $row['nama_status'] ?></td>
          <td>
            <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#exampleModal<?= $row["id_pendaftaran"]; ?>" data-backdrop="false"><i class="fa fa-pencil-square"></i></a>
            <!-- <a href="index.php?page=update">Update</a> -->
            <a href="download_pdf.php?filename=<?= $row['ijazah'] ?>" target="_blank" class="btn btn-success btn-md"><i class="fa fa-download"></i></a>
          </td>
        </tr>
        <div class="modal fade" id="exampleModal<?= $row["id_pendaftaran"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm modal-open" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form role="form" action="" method="post">
                  <?php
                  $id = $row['id_pendaftaran'];
                  $update = query("SELECT p.id_pendaftaran, s.nama_status
                                FROM pendaftaran as p
                                INNER JOIN status as s ON p.status_id = s.id_status
                                WHERE p.id_pendaftaran = $id");
                  foreach ($update as $rows) :
                  ?>
                    <input type="hidden" name="id_pendaftaran" value="<?= $rows["id_pendaftaran"] ?>">
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Example select</label>
                      <select class="form-control" id="status" name="status">
                        <option value="1">Menunggu</option>
                        <option value="2">Lulus</option>
                        <option value="3">Tidak Lulus</option>
                        <option value="4">Di Cadangkan</option>
                      </select>
                    </div>
                  <?php endforeach ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>