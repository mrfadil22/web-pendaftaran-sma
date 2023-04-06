<?php

$pendaftaran = query("SELECT p.id_pendaftaran, j.nama_jurusan, p.nilai_mtk, p.nilai_ipa, p.nilai_ing, p.nilai_ind, p.tgl_pend,
                      p.ijazah, s.nama_status, u.username
                      FROM pendaftaran as p
                      INNER JOIN jurusan as j ON p.jurusan_id = j.id_jurusan
                      INNER JOIN status as s ON p.status_id = s.id_status
                      INNER JOIN users as u ON p.user_id = u.id_user
                      WHERE p.user_id = '" . $_SESSION['user_id'] . "'");

?>

<h1>Data Pendaftaran</h1>

<div class="container">
  <table class="table">
    <thead class="thead-Primary">
      <tr class="bg-info">
        <td>Tanggal Pend</td>
        <td>id_pendaftaran</td>
        <td>username</td>
        <td>jurusan</td>
        <td>nilai_mtk</td>
        <td>nilai_ipa</td>
        <td>nilai_ing</td>
        <td>nilai_ind</td>
        <td>ijazah</td>
        <td>status_id</td>
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
          <td><?= $row['ijazah'] ?></td>
          <td><?= $row['nama_status'] ?></td>
          <td>
            <a href="index.php?page=update_pendaftaran&id=<?= $_SESSION['user_id'] ?>" class="btn btn-success btn-md"><i class="fa fa-pencil-square"></i></a>
            <a href="" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>