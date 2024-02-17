<?php
include '../class/order.php';
$db = new order();
session_start();
//berfungsi mengecek apakah user sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("location:index.php?alert=belum_login");
}
if ($_SESSION['akses'] == "user") {
    echo "<script>alert('Anda Bukan Admin');history.go(-1);</script>";
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Tiket Penerbangan</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon-1.png" />
    <!-- Custom CSS -->
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include("header.php") ?>

        <?php include("sidebar.php") ?>

        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Dashboard
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center text-white">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-airplane-takeoff"></i>
                                </h1>
                                <h6 class="text-white">Total Keberangkatan</h6>
                                <?php
                                require 'prosesKeberangkatan/config.php';
                                $query = "SELECT id_keberangkatan FROM tb_keberangkatan ORDER BY id_keberangkatan";
                                $query_run = mysqli_query($koneksi, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h3>' . $row . '</h3>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center text-white">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-cart-plus"></i>
                                </h1>
                                <h6 class="text-white">Total Transaksi</h6>
                                <?php
                                require 'prosesKeberangkatan/config.php';
                                $query = "SELECT id_pesan FROM tb_pesan ORDER BY id_pesan";
                                $query_run = mysqli_query($koneksi, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h3>' . $row . '</h3>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center text-white">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-airplane"></i>
                                </h1>
                                <h6 class="text-white">Total Kelas Penerbangan</h6>
                                <?php
                                require 'prosesKelas/config.php';
                                $query = "SELECT id_kelas FROM tb_kelas ORDER BY id_kelas";
                                $query_run = mysqli_query($koneksi, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h3>' . $row . '</h3>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center text-white">
                                <h1 class="font-light text-white">
                                    <i class="mdi mdi-account-key"></i>
                                </h1>
                                <h6 class="text-white">Total Admin</h6>
                                <?php
                                require 'prosesKeberangkatan/config.php';
                                $query = "SELECT id_admin FROM tb_admin ORDER BY id_admin";
                                $query_run = mysqli_query($koneksi, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h3>' . $row . '</h3>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card card-hover">
                            <div class="box bg-primary text-center text-white">
                                <h1 class="font-light text-white">
                                    <i class="fa fa-users"></i>
                                </h1>
                                <h6 class="text-white">Total Customer</h6>
                                <?php
                                require 'koneksi.php';
                                $query = "SELECT id_user FROM tb_user ORDER BY id_user";
                                $query_run = mysqli_query($koneksi, $query);
                                $row = mysqli_num_rows($query_run);
                                echo '<h3>' . $row . '</h3>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="hapus">
                            <?php if (!empty($_GET['remove'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button class="btn-close btn-close-white close" type="button" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-check"></i>
                                    <strong> Remove Success !</strong>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tanda Bukti Pembayaran</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama User</th>
                                                <th>ID Pesan</th>
                                                <th>Tanda Bukti</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($db->tampil_bukti() as $x) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $x['nama_user']; ?></td>
                                                    <td><?php echo $x['id_pesan']; ?></td>
                                                    <td><a href="../assets/images/bukti/<?php echo $x['file']; ?>" target="_blank"><img class="img-rounded" src="../assets/images/bukti/<?php echo $x['file']; ?>" alt="" width="40" height="40"> </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                <strong>Copyright &copy; <?= date('Y'); ?> <a href="">E-Tiket Penerbangan</a>.</strong> All rights reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../assets/libs/flot/excanvas.js"></script>
    <script src="../assets/libs/flot/jquery.flot.js"></script>
    <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../dist/js/pages/chart/chart-page-init.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $("#zero_config").DataTable();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Load Datatables and run plugin on tables 
            LoadDataTablesScripts(AllTables);
            // Add Drag-n-Drop feature
            WinMove();
        });
    </script>
</body>

</html>