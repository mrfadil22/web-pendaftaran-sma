<?php

if (isset($_POST['submit'])) {
  if (update_pendaftaran($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Ubah');
      document.location.href = 'index.php?page=view_pendaftaran';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

$pendaftaran = query("SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'")[0];

?>

<h1 style="margin-top: 80px; margin-left:50px; margin-bottom: 30px;">UPDATE PENDAFTARAN</h1>

<form action="" method="POST" enctype="multipart/form-data">
  <ul>
    <div class="form-group col-md-6">
      <label for="jurusan_id">jurusan</label>
      <select class="form-control" id="jurusan_id" name="jurusan_id">
        <option value="1" <?php if ($pendaftaran['jurusan_id'] == 1) echo 'selected="selected"'; ?>>IPA</option>
        <option value="2" <?php if ($pendaftaran['jurusan_id'] == 2) echo 'selected="selected"'; ?>>IPS</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="nilai_mtk">nilai mtk</label>
      <input type="text" class="form-control" id="nilai_mtk" name="nilai_mtk" value="<?= $pendaftaran['nilai_mtk'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="nilai_ipa">nilai ipa</label>
      <input type="text" class="form-control" id="nilai_ipa" name="nilai_ipa" value="<?= $pendaftaran['nilai_ipa'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="nilai_ing">nilai ing</label>
      <input type="text" class="form-control" id="nilai_ing" name="nilai_ing" value="<?= $pendaftaran['nilai_ing'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="nilai_ind">nilai ind</label>
      <input type="text" class="form-control" id="nilai_ind" name="nilai_ind" value="<?= $pendaftaran['nilai_ind'] ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="ijazah">ijazah</label>
      <input type="file" id="ijazah" name="ijazah">
      <input type="hidden" id="ijazah_lama" name="ijazah_lama" value="<?= $pendaftaran['ijazah'] ?>">
    </div>
    <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
    <div class="form-group col-md-6">
      <button type="submit" name="submit">Submit</button>
    </div>
  </ul>
</form>