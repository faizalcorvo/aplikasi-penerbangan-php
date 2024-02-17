<!DOCTYPE html>
<html class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Tiket Penerbangan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon-1.png" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/fontello.css">
    <link href="assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icheck.min_all.css">
    <link rel="stylesheet" href="assets/css/price-range.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.theme.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- Body content -->
    <?php include("header.php") ?>
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">Home Sign Up / Sign in </h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->
    <!-- register-area -->
    <div class="register-area" style="background-color: rgb(249, 249, 249);">
        <div class="container">
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
                } else if ($_GET['alert'] == "berhasil_register") {
                    echo "
                    <div class='alert alert-success' id='berhasil_register'>
                        <strong>Anda Telah Berhasil Register!</strong>
                    </div>";
                }
            }
            ?>
            <?php
            require('koneksi.php');
            // If form submitted, insert values into the database.
            if (isset($_REQUEST['username'])) {
                // removes backslashes
                $username = stripslashes($_REQUEST['username']);
                //escapes special characters in a string
                $username = mysqli_real_escape_string($conn, $username);
                $password = stripslashes($_REQUEST['password']);
                $password = mysqli_real_escape_string($conn, $password);
                $nama_user = stripslashes($_REQUEST['nama_user']);
                $nama_user = mysqli_real_escape_string($conn, $nama_user);
                $email_user = stripslashes($_REQUEST['email_user']);
                $email_user = mysqli_real_escape_string($conn, $email_user);
                $foto = stripslashes($_REQUEST['foto']);
                $foto = mysqli_real_escape_string($conn, $foto);
                $no_hp = stripslashes($_REQUEST['no_hp']);
                $no_hp = mysqli_real_escape_string($conn, $no_hp);
                $akses = stripslashes($_REQUEST['akses']);
                $akses = mysqli_real_escape_string($conn, $akses);
                $query = "INSERT INTO `tb_user` (username, password, nama_user, email_user, foto, no_hp, akses) VALUES ('$username', '$password', '$nama_user', '$email_user', '$foto', '$no_hp', '$akses')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    header('location:register.php?alert=berhasil_register');
                }
            } else {
            ?>
                <div class="col-md-6">
                    <div class="box-for overflow">
                        <div class="col-md-12 col-xs-12 register-blocks">
                            <h2>Sign Up : </h2>
                            <form action="" method="post" id="formlogin">
                                <div class="form-group">
                                    <label for="nama_user">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_user" name="nama_user" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email_user" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No Hp</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <input name="foto" class="" placeholder="" type="file" id="foto" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="akses">Akses</label>
                                    <select id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih Kelas Penerbangan" name="akses" style="width: 100%; height: 44px">
                                        <option>-- Pilih Hak Akses --</option>
                                        <optgroup label="User">
                                            <option value="user">User</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-default">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="col-md-6">
                <div class="box-for overflow">
                    <div class="col-md-12 col-xs-12 login-blocks">
                        <h2>Sign In : </h2>
                        <form action="proses-login.php" method="post" id="formlogin">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-default"> Log in</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <?php include("footer.php") ?>

    <script src="assets/js/modernizr-2.6.2.min.js"></script>

    <script src="assets/js/jquery-1.10.2.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/bootstrap-hover-dropdown.js"></script>

    <script src="assets/js/easypiechart.min.js"></script>
    <script src="assets/js/jquery.easypiechart.min.js"></script>

    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wow.js"></script>

    <script src="assets/js/icheck.min.js"></script>
    <script src="assets/js/price-range.js"></script>

    <script src="assets/js/main.js"></script>
    <script>
        // notifikasi gagal di hide
        <?php if (empty($_GET['get'])) { ?>
            $("#notifikasi").hide();
        <?php } ?>
        var logingagal = function() {
            $("#logout").fadeOut('slow');
            $("#gagal").fadeOut('slow');
            $("#belum_login").fadeOut('slow');
            $("#berhasil_register").fadeOut('slow');
        };
        setTimeout(logingagal, 4000);
    </script>

</body>

</html>