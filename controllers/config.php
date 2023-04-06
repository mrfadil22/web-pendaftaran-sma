<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($page) {
  case 'login':
    include "./login/login.php";
    break;
  case 'signup':
    include "./login/signup.php";
    break;

  default:
    include "./login/login.php";
    break;
}
