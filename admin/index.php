<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplikasi Tiket Penerbangan</title>
  <!-- Favicon icon -->
  <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-1.png" />
  <!-- Custom CSS -->
  <link href="../dist/css/style.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #FD841F;
      overflow: hidden;
    }

    .content {
      margin: 10%;
      background-color: #fff;
      padding: 1rem 1rem 1rem 1rem;
      box-shadow: 0 0 5px 5px rgba(0, 0, 0, .05);
      border-radius: 12px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row content">
      <?php
      if (isset($_GET['alert'])) {
        if ($_GET['alert'] == "gagal") {
          echo "
          <div class='alert alert-danger' id='gagal'>
            <strong>Login Anda Gagal, Periksa Kembali Username dan Password</strong>
          </div>";
        } else if ($_GET['alert'] == "belum_login") {
          echo "
          <div class='alert alert-warning' id='belum_login'>
            <strong>Anda Belum Login, Silahkan Login Terlebih Dahulu!</strong>
          </div>";
        } else if ($_GET['alert'] == "logout") {
          echo "
          <div class='alert alert-success' id='logout'>
            <strong>Anda Telah Logout!</strong>
          </div>";
        }
      }
      ?>
      <div class="col-md-6 mb-3 mt-3">
        <img src="../assets/images/4136591.jpg" alt="image" class="img-fluid" height="80%" width="84%">
      </div>
      <div class="col-md-6">
        <h3 class="signin-text mb-4 mt-3"> Sign In</h3>
        <form class="form-horizontal mt-3" action="proses-login.php" method="post" id="formlogin">
          <div class="row pb-4">
            <div class="col-12">
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-success text-white h-100" id="basic-addon1">
                    <i class="mdi mdi-account fs-4"></i></span>
                </div>
                <input name="username" class="form-control form-control-lg" placeholder="Username" type="text" id="username" required="required" autocomplete="off">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <spa class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                </div>
                <input name="password" class="form-control form-control-lg" placeholder="Password" id="password" type="password" required="required" autocomplete="off">
              </div>
              <div class="form-group">
                <div class="d-grid">
                  <input type="submit" class="btn btn-block btn-lg btn-success text-white" name="login" value="Login">
                </div>
              </div>
              <div class="form-group pt-1 border-top border-secondary">
                <a href=""> Don't Have an Account? </a>
                <div class="pt-1 d-grid">
                  <a href="register.php" class="btn btn-info btn-lg btn-block text-white" id="to-recover"> Register
                  </a>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // notifikasi gagal di hide
      <?php if (empty($_GET['get'])) { ?>
        $("#notifikasi").hide();
      <?php } ?>
      var logingagal = function() {
        $("#logout").fadeOut('slow');
        $("#gagal").fadeOut('slow');
        $("#belum_login").fadeOut('slow');
      };
      setTimeout(logingagal, 4000);
    </script>
</body>

</html>