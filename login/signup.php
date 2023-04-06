<?php

if (isset($_POST['submit'])) {
  if (signup($_POST) > 0) {
    echo "
    <script> 
      alert('Data Berhasil Di Tambahkan');
      document.location.href = 'index.php';
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}



?>

<style>
  label {
    display: block;
  }
</style>
<h1 style="margin-bottom: 30px">Sign Up</h1>
<!-- <form action="" method="POST">
  <ul>
    <li>
      <label for="username">username</label>
      <input type="text" id="username" name="username">
    </li>
    <li>
      <label for="email">email</label>
      <input type="text" id="email" name="email">
    </li>
    <li>
      <label for="password">password</label>
      <input type="text" id="password" name="password">
    </li>
    <li>
      <label for="confirm_password">confirm_password</label>
      <input type="text" id="confirm_password" name="confirm_password">
    </li>
    <li>
      <p>
        Have an account?
        <a href="index.php?page=login">Login</a>
      </p>
    </li>
    <li>
      <button type="submit" name="submit">Sign Up</button>
    </li>
  </ul>
</form> -->
<form action="" method="POST" class="needs-validation" novalidate>
  <div class="row px-3">
    <label for="username" class="mb-1">
      <h6 class="mb-0 text-sm">Username</h6>
    </label>
    <input type="text" name="username" class="form-control" id="username" placeholder="Insert Valid Username" required />
    <div class="invalid-feedback">Username Tidak Tersedia!</div>
  </div>
  <div class="row px-3 mt-4">
    <label for="email" class="mb-1">
      <h6 class="mb-0 text-sm">Email</h6>
    </label>
    <input type="text" name="email" class="form-control" id="email" placeholder="Insert Valid Email" required />
    <div class="invalid-feedback">Email Tidak Tersedia!</div>
  </div>
  <div class="row px-3 mt-4">
    <label for="password" class="mb-1">
      <h6 class="mb-0 text-sm">password</h6>
    </label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Minimal 8 Karakter Password" required />
    <div class="invalid-feedback">
      Password Minimal 8 Karakter!
    </div>
  </div>
  <div class="row px-3 mt-4">
    <label for="confirm_password" class="mb-1">
      <h6 class="mb-0 text-sm">Confirm Password</h6>
    </label>
    <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Insert Valid Confirm Password" required />
    <div class="invalid-feedback">
      Confirm Password Tidak Cocok!
    </div>
  </div>

  <div class="row px-3 mb-3 mt-4">
    <div class="form-check custom-checkbox custom-control">
      <input class="custom-control-input" type="checkbox" value="" id="invalidCheck2" required />
      <label class="custom-control-label" for="invalidCheck2">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        (You must agree before submitting.)
      </div>
    </div>
  </div>
  <div class="row mb-3 px-3">
    <button type="submit" class="btn btn-green text-center" name="submit">
      Sign Up
    </button>
  </div>
  <div class="row mb-4 px-3">
    <small class="font-weight-bold">Have an account? <a class="text-success" href="index.php?page=login">Login</a></small>
  </div>
</form>