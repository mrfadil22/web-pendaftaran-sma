<?php

if (isset($_POST['submit'])) {
  if (update_biodata($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Ubah');
      document.location.href = 'index.php?page=view_biodata';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

$biodata = query("SELECT * FROM biodata WHERE user_id= '" . $_SESSION['user_id'] . "'")[0];

?>

<h1 style="margin-top: 80px; margin-left:50px; margin-bottom: 30px;">Update Biodata</h1>

<div class="container">
  <form action="" method="POST">
    <div class="form-group col-md-6">
      <label for="fullname">fullname</label>
      <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $biodata['fullname'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="nisn">nisn</label>
      <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $biodata['nisn'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="alamat">alamat</label>
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $biodata['alamat'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="jenis_kelamin">jenis_kelamin</label>
      <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
        <option value="Laki-Laki" <?php if ($biodata['jenis_kelamin'] == "Laki-Laki") echo 'selected="selected"'; ?>>Laki-Laki</option>
        <option value="Perempuan" <?php if ($biodata['jenis_kelamin'] == "Perempuan") echo 'selected="selected"'; ?>>Perempuan</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="agama">Agama</label>
      <select class="form-control" id="agama" name="agama">
        <option value="Islam" <?php if ($biodata['agama'] == "Islam") echo 'selected="selected"'; ?>>Islam</option>
        <option value="Kristen" <?php if ($biodata['agama'] == "Kristen") echo 'selected="selected"'; ?>>Kristen</option>
        <option value="Katholik" <?php if ($biodata['agama'] == "Katholik") echo 'selected="selected"'; ?>>Katholik</option>
        <option value="Hindu" <?php if ($biodata['agama'] == "Hindu") echo 'selected="selected"'; ?>>Hindu</option>
        <option value="Budha" <?php if ($biodata['agama'] == "Budha") echo 'selected="selected"'; ?>>Budha</option>
        <option value="Konghucu" <?php if ($biodata['agama'] == "Konghucu") echo 'selected="selected"'; ?>>Konghucu</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="tempat_lahir">tempat_lahir</label>
      <input type="text" id="tempat_lahir" class=" form-control" name="tempat_lahir" value="<?= $biodata['tempat_lahir'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="asal_sekolah">asal_sekolah</label>
      <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= $biodata['asal_sekolah'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="no_telp">no_telp</label>
      <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $biodata['no_telp'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="nama_ortu">nama_ortu</label>
      <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" value="<?= $biodata['nama_ortu'] ?>">
    </div>
    <div class="form-group col-md-6">
      <input type="hidden" id="user_id" class="form-control" name="user_id" value="<?= $_SESSION['user_id'] ?>">
    </div>
    <div class="col-md-12">
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
  </form>
</div>