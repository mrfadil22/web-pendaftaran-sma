<?php

if (isset($_POST['submit'])) {
  if (tambah_pendaftaran($_POST) > 0) {
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

$pendaftaran = mysqli_query($conn, "SELECT * FROM pendaftaran WHERE user_id = '" . $_SESSION['user_id'] . "'");

if (mysqli_num_rows($pendaftaran) > 0) {
  echo "
  <script>
    document.location.href = 'index.php?page=home';
  </script>
";
}

?>

<h1 style="margin-top: 80px; margin-left:50px; margin-bottom: 30px;">Tambah Pendaftaran</h1>

<style>
  label {
    display: block;
  }
</style>
<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" id="user_id" name="user_id" value="<?= $_SESSION['user_id'] ?>">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="jurusan_id">Pilih Jurusan</label>
        <select class="form-control" id="jurusan_id" name="jurusan_id">
          <option value="1">IPA</option>
          <option value="2">IPS</option>
        </select>
      </div>
      <div class="form-group col-md-6">
        <label for="nilai_mtk">Nilai Matematika</label>
        <input type="text" class="form-control" id="nilai_mtk" name="nilai_mtk" placeholder="Masukan Nilai Matematika">
      </div>
      <div class="form-group col-md-6">
        <label for="nilai_ipa">Nilai IPA</label>
        <input type="text" class="form-control" id="nilai_ipa" name="nilai_ipa" placeholder="Masukan Nilai IPA">
      </div>
      <div class="form-group col-md-6">
        <label for="nilai_ing">Nilai Bahasa Inggris </label>
        <input type="text" class="form-control" id="nilai_ing" name="nilai_ing" placeholder="Masukan Nilai B Inggris">
      </div>
      <div class="form-group col-md-6">
        <label for="nilai_ind">Nilai Bahasa Indonesia</label>
        <input type="text" class="form-control" id="nilai_ind" name="nilai_ind" placeholder="Masukan Nilai B Indonesia">
      </div>
      <div class="form-group col-md-6">
        <label for="ijazah">Ijazah</label>
        <input type="file" id="ijazah" name="ijazah" placeholder="Masukan Nama Orang Tua">
      </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </form>
</div>