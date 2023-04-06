<?php

if (isset($_POST['submit'])) {
  if (tambah_jurusan($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Tambahkan');
      document.location.href = 'index.php?page=jurusan';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<h1>Tambah Biodata</h1>
<div class="container">
  <form action="" method="POST">
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="nama_jurusan">Nama Jurusan</label>
        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan">
      </div>
      <div class="form-group col-md-12">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
  </form>
</div>