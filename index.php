<?php

session_start();
require "controllers/functions.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>PSB SMAN 9</title>
  <link rel="icon" type="image/x-icon" href="logo.ico">
  <style>
    body {
      color: #000;
      overflow-x: hidden;
      height: 100%;
      background-color: #ccffe2;
      background-repeat: no-repeat;
    }

    .card0 {
      box-shadow: 0px 4px 8px 0px #757575;
      border-radius: 0px;
    }

    .card2 {
      margin: 0px 40px;
    }

    .logo {
      width: 200px;
      height: 100px;
      margin-top: 20px;
      margin-left: 35px;
    }

    .image {
      height: 280px;
    }

    .border-line {
      border-right: 1px solid #eeeeee;
    }

    .text-sm {
      font-size: 14px !important;
    }

    ::placeholder {
      color: #bdbdbd;
      opacity: 1;
      font-weight: 300;
    }

    :-ms-input-placeholder {
      color: #bdbdbd;
      font-weight: 300;
    }

    ::-ms-input-placeholder {
      color: #bdbdbd;
      font-weight: 300;
    }

    input,
    textarea {
      padding: 10px 12px 10px 12px;
      border: 1px solid lightgrey;
      border-radius: 2px;
      margin-bottom: 5px;
      margin-top: 2px;
      width: 100%;
      box-sizing: border-box;
      color: #2c3e50;
      font-size: 14px;
      letter-spacing: 1px;
    }

    input:focus,
    textarea:focus {
      -moz-box-shadow: none !important;
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
      border: 1px solid #304ffe;
      outline-width: 0;
    }

    button:focus {
      -moz-box-shadow: none !important;
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
      outline-width: 0;
    }

    a {
      color: inherit;
      cursor: pointer;
    }

    .btn-green {
      background-color: #00923f;
      width: 150px;
      color: #fff;
      border-radius: 2px;
    }

    .btn-blue:hover {
      background-color: #000;
      cursor: pointer;
    }

    .bg-blue {
      color: #fff;
      background-color: #00923f;
    }

    @media screen and (max-width: 991px) {
      .logo {
        margin-left: 0px;
      }

      .image {
        width: 300px;
        height: 220px;
      }

      .border-line {
        border-right: none;
      }

      .card2 {
        border-top: 1px solid #eeeeee !important;
        margin: 0px 15px;
      }
    }
  </style>
</head>

<body class="snippet-body">

  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6">
          <div class="card1 pb-5">
            <!-- <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div> -->
            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
              <img src="./file/logo.jpg" class="image" />
            </div>
            <div class="row px-3 justify-content-center mt-4 mb-5 border-line">
              <h1>SMAN 9 TASIKMALAYA</h1>
              <h2>Pendaftaran Siswa Baru Online</h2>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card2 card border-0 px-4 py-5">
            <?php include "controllers/config.php"; ?>
          </div>
          <!---->
        </div>
      </div>
      <div class="bg-blue py-4">
        <div class="row px-3">
          <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
          <div class="social-contact ml-4 ml-sm-auto">
            <span class="fa fa-facebook mr-4 text-sm"></span>
            <span class="fa fa-google-plus mr-4 text-sm"></span>
            <span class="fa fa-linkedin mr-4 text-sm"></span>
            <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    "use strict";
    window.addEventListener(
      "load",
      function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName("needs-validation");
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(
          forms,
          function(form) {
            form.addEventListener(
              "submit",
              function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add("was-validated");
              },
              false
            );
          }
        );
      },
      false
    );
  })();
</script>

</html>