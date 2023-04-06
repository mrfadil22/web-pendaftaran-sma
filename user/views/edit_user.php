<?php

$user = query("SELECT * FROM users WHERE id_user = '" . $_SESSION['user_id'] . "'")[0];

if (isset($_POST['submit'])) {
  if (edit_user($_POST) > 0) {
    echo "
      <script>
        alert('data berhasil diubah');
        document.location.href = 'index.php';
      </script>
      ";
  } else {
    echo mysqli_error($conn);
  }
}

?>

<h1>Edit Profile</h1>
<div class="container">
  <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
      <input type="hidden" id="id_user" name="id_user" value="<?= $user['id_user'] ?>">
      <div class="form-group col-md-7">
        <label for="username">username</label>
        <input type="text" id="username" class="form-control" name="username" value="<?= $user['username'] ?>" disabled>
      </div>
      <div class="form-group col-md-7">
        <label for="email">email</label>
        <input type="text" id="email" class="form-control" name="email" value="<?= $user['email'] ?>">
      </div>
      <div class="form-group col-md-7">
        <img src="../file/img/<?= $user['image'] ?>" width="100px" style="margin-bottom: 10px;">
        <input type="file" id="image" name="image">
        <input type="hidden" id="old_image" name="old_image">
      </div>
      <div class="form-group col-md-7">
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
</div>
</form>