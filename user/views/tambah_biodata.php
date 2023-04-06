<?php

if (isset($_POST['submit'])) {
  if (tambah_biodata($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Tambahkan');
      document.location.href = 'index.php?page=home';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

$biodata = mysqli_query($conn, "SELECT * FROM biodata WHERE user_id = '" . $_SESSION['user_id'] . "'");

if (mysqli_num_rows($biodata) > 0) {
  echo "
  <script>
    document.location.href = 'index.php?page=home';
  </script>
";
}

?>

<h1 style="margin-top: 80px; margin-left:50px; margin-bottom: 30px;">Tambah Biodata</h1>
<div class="container">
  <form action="" method="POST">
    <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="fullname">Fullname</label>
        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukan Nama Lengkap">
      </div>
      <div class="form-group col-md-6">
        <label for="nisn">NISN</label>
        <input type="text" class="form-control" id="nisn" name="nisn" placeholder="Masukan NISN">
      </div>
      <div class="form-group col-md-6">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">
      </div>
      <div class="form-group col-md-6">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
          <option>Laki-Laki</option>
          <option>Perempuan</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="agama">Agama</label>
        <select class="form-control" id="agama" name="agama">
          <option>Islam</option>
          <option>Kristen</option>
          <option>Katholik</option>
          <option>Hindu</option>
          <option>Budha</option>
          <option>Konghucu</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukan Tempat Lahir">
      </div>
      <div class="form-group col-md-6">
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
      </div>
      <div class="form-group col-md-6">
        <label for="asal_sekolah">Asal Sekolah</label>
        <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Masukan Asal Sekolah">
      </div>
      <div class="form-group col-md-6">
        <label for="no_telp">No Telepon / HP</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan No Telp / HP">
      </div>
      <div class="form-group col-md-6">
        <label for="nama_ortu">Nama Orang Tua</label>
        <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" placeholder="Masukan Nama Orang Tua">
      </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>