<?php

if (isset($_POST['login'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  $x = mysqli_num_rows($result);

  if ($x > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      if ($row['level_id'] == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['level'] = 'Admin';

        header("location: admin/index.php");
      } else if ($row['level_id'] == 2) {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $row['id_user'];
        $_SESSION['level'] = 'Admin';

        header("location: user/index.php");
      }
    }
  }
  $error = true;
}

?>


<body>
  <h1 style="margin-bottom: 60px">Login</h1>
  <?php if (isset($error)) : ?>
    <h3 style="color: red;"></h3>
  <?php endif; ?>
  <!-- <form action="" method="POST">
    <ul>
      <li>
        <label for="username">username</label>
        <input type="text" id="username" name="username">
      </li>
      <li>
        <label for="password">password</label>
        <input type="text" id="password" name="password">
      </li>
      <li>
        <p>Don't have an account?
          <a href="index.php?page=signup">Sign Up</a>
        </p>
      </li>
      <li>
        <button type="submit" name="login">Login</button>
      </li>
    </ul>
  </form> -->

  <form action="" method="post" class="needs-validation" novalidate>
    <div class="row px-3">
      <label for="username" class="mb-1">
        <h6 class="mb-0 text-sm">Username</h6>
      </label>
      <input type="text" name="username" class="form-control" id="username" placeholder="Username" required />
      <div class="invalid-feedback">Username Tidak Tersedia!</div>
    </div>
    <div class="row px-3 mt-4">
      <label for="password" class="mb-1">
        <h6 class="mb-0 text-sm">Password</h6>
      </label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required />
      <div class="invalid-feedback">
        Password
      </div>
    </div>
    <div class="row mb-3 px-3 mt-4">
      <button type="submit" class="btn btn-green text-center" name="login">
        Login
      </button>
    </div>
    <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger" href="index.php?page=signup">Register</a></small> </div>
  </form>