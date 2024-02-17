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
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css" />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #FD841F;
            /* overflow: hidden; */
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
        $nama = stripslashes($_REQUEST['nama']);
        $nama = mysqli_real_escape_string($conn, $nama);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn, $email);
        $foto = stripslashes($_REQUEST['foto']);
        $foto = mysqli_real_escape_string($conn, $foto);
        $akses = stripslashes($_REQUEST['akses']);
        $akses = mysqli_real_escape_string($conn, $akses);
        $query = "INSERT INTO `tb_admin` (username, password, nama, email, foto, akses) 
		VALUES ('$username', '$password', '$nama', '$email', '$foto', '$akses')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            header('location:index.php');
        }
    } else {
    ?>
        <div class="container">
            <div class="row content">
                <div class="col-md-6 mb-3 mt-3">
                    <img src="../assets/images/4136591.jpg" alt="image" class="img-fluid" width="">
                </div>
                <div class="col-md-6">
                    <h3 class="signin-text mb-4 mt-3"> Sign Up</h3>
                    <form class="form-horizontal mt-3" action="" method="post" id="formlogin">
                        <div class="row pb-4">
                            <div class="col-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-primary text-white h-100" id="basic-addon1">
                                            <i class="mdi mdi-border-color fs-4"></i></span>
                                    </div>
                                    <input name="nama" class="form-control form-control-lg" placeholder="Nama Lengkap" type="text" id="nama" required="required" autocomplete="off">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white h-100" id="basic-addon1">
                                            <i class="mdi mdi-account fs-4"></i></span>
                                    </div>
                                    <input name="username" class="form-control form-control-lg" placeholder="Username" type="text" id="username" required="required" autocomplete="off">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="mdi mdi-email fs-4"></i></span>
                                    </div>
                                    <input name="email" class="form-control form-control-lg" placeholder="Email Address" id="email" type="email" required="required" autocomplete="off">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <spa class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="mdi mdi-lock fs-4"></i></span>
                                    </div>
                                    <input name="password" class="form-control form-control-lg" placeholder="Password" id="password" type="password" required="required" autocomplete="off">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-secondary text-white h-100" id="basic-addon1">
                                            <i class="mdi mdi-image-multiple fs-4"></i></span>
                                    </div>
                                    <input name="foto" class="form-control form-control-lg" placeholder="" type="file" id="foto" required="required" autocomplete="off">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-light h-100" id="basic-addon1">
                                            <i class="mdi mdi-account-multiple fs-4"></i></span>
                                    </div>
                                    <select class="select2 form-control shadow-none" name="akses" style="width: 89%; height: 44px">
                                        <option>-- Pilih Hak Akses --</option>
                                        <optgroup label="Administrator">
                                            <option value="admin">Admin</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-block btn-lg btn-info" name="register" value="Register">
                                        </div>
                                    </div>
                                    <div class="form-group pt-1 border-top border-secondary">
                                        <a href=""> Already Have an Account? </a>
                                        <div class="pt-1 d-grid">
                                            <a href="index.php" class="btn btn-success btn-lg btn-block text-white" id="to-recover">Login
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script>
        $(".select2").select2();
    </script>
</body>

</html>