<?php

$id = $_GET['id'];

$query = query("SELECT status_id FROM pendaftaran WHERE id_pendaftaran = $id")[0];

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

<form action="" method="POST">
  <ul>
    <input type="hidden" name="id_pendaftaran" id="id_pendaftaran" value="<?= $id ?>">
    <li>
      <label for="status">status</label>
      <select name="status" id="status">
        <option value="1" <?php if ($query['status_id'] == 1) echo 'selected="selected"'; ?>>Menunggu</option>
        <option value="2" <?php if ($query['status_id'] == 2) echo 'selected="selected"'; ?>>Lulus</option>
        <option value="3" <?php if ($query['status_id'] == 3) echo 'selected="selected"'; ?>>Tidak Lulus</option>
        <option value="4" <?php if ($query['status_id'] == 4) echo 'selected="selected"'; ?>>Di Cadangkan</option>
      </select>
    </li>
    <li>
      <button type="submit" name="submit">Submit</button>
    </li>
  </ul>
</form>