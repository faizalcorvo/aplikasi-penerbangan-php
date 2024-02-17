<?php
session_start();

//berfungsi mengecek apakah user sudah login atau belum
if (!isset($_SESSION['username'])) {
    header("location:index.php?alert=belum_login");
}
if ($_SESSION['akses'] == "user") {
    echo "<script>alert('Anda Bukan Admin');history.go(-1);</script>";
}
?>
<?php
include '../class/order.php';
$db = new order();

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
        <?php include("header.php") ?>

        <?php include("sidebar.php") ?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Data Transaksi</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Transaksi
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div id="ubah">
                            <?php if (!empty($_GET['edit'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button class="btn-close btn-close-white close" type="button" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-check"></i>
                                    <strong> Edit Success !</strong>
                                </div>
                            <?php } ?>
                        </div>
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
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Transaksi</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Tanggal Keberangkatan</th>
                                                <th>ID Pesanan </th>
                                                <th>Nama Lengkap</th>
                                                <th>Kelas Penerbangan</th>
                                                <th>Maskapai Pesawat</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($db->tampil_data() as $x) {
                                                $now = date("Y-m-d");
                                            ?>
                                                <tr>
                                                    <td><?php echo $x['tgl_pesan']; ?></td>
                                                    <td><?php
                                                        if ($x['tgl_tour'] < $now) {
                                                            $txtS = "Kadaluarsa!!";
                                                            echo "<div class='tooltip-demo'><span data-toggle='tooltip' data-placement='top' title='" . $txtS . "'><div class='text-danger'><i class='mdi mdi-alert'></i>&nbsp" . $x['tgl_tour'] . "</div></span></div>";
                                                        } else {
                                                            echo $x['tgl_tour'];
                                                        } ?></td>
                                                    <td><?php echo $x['id_pesan']; ?></td>
                                                    <td><?php echo $x['nama_user']; ?></td>
                                                    <td><?php echo $x['kelas']; ?></td>
                                                    <td><?php echo $x['maskapai']; ?></td>
                                                    <td><?php echo $x['status']; ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateuser<?php echo $x['id_pesan']; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteuser<?php echo $x['id_pesan']; ?>"><i class="fa fa-trash-alt"></i>
                                                        </button>
                                                        <!-- Modal delete-->
                                                        <div class="modal fade" id="deleteuser<?php echo $x['id_pesan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info">
                                                                        <h5 class="modal-title fw-bold text-white" id="exampleModalLabel">
                                                                            <i class="fa fa-trash-alt"></i> &nbsp; Konfirmasi Hapus Data Penumpang
                                                                        </h5>
                                                                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4 align="center">Apakah anda yakin ingin menghapus user id <?php echo $x['id_pesan']; ?><strong><span class="grt"></span></strong> ?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                        <a href="prosesPenumpang/proses.php?act=deleteuser&id=<?php echo $x['id_pesan']; ?>" class="btn btn-info">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- modal delete -->
                                                        <!-- Modal edit start-->
                                                        <div class="modal fade" id="updateuser<?php echo $x['id_pesan']; ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info">
                                                                        <h5 class="modal-title fw-bold text-white" id="modalLabel">
                                                                            <i class="fa fa-pencil-alt"></i> &nbsp; Konfirmasi Edit Data Transaksi
                                                                        </h5>
                                                                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="prosesTransaksi/proses.php?act=updateuser" method="post" class="row g-3">
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label" for="nama_user">Nama</label>
                                                                                <input class="form-control" id="nama_user" type="text" name="nama_user" value="<?php echo $x['nama_user']; ?>" readonly>
                                                                                <input type="hidden" value="<?php echo $x['id_pesan']; ?>" class="form-control" name="id_pesan">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label" for="tgl_pesan">Tanggal Pemesanan</label>
                                                                                <input class="form-control" id="tgl_pesan" type="date" name="tgl_pesan" value="<?php echo $x['tgl_pesan']; ?>" readonly>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label" for="tgl_tour">Tanggal Keberangkatan</label>
                                                                                <input class="form-control" id="tgl_tour" type="date" name="tgl_tour" value="<?php echo $x['tgl_tour']; ?>" required>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label" for="status">Status Pemesanan</label><br>
                                                                                <div class="form-check">
                                                                                    <input type="radio" class="form-check-input" id="customControlValidation1" name="status" value="Waiting" <?php if ($x['status'] == "Waiting") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> required />
                                                                                    <label class="form-check-label mb-0" for="customControlValidation1">Belum Bayar</label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input type="radio" class="form-check-input" id="customControlValidation2" name="status" value="Accepted" <?php if ($x['status'] == "Accepted") {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> required />
                                                                                    <label class="form-check-label mb-0" for="customControlValidation2">Lunas</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                                <input class="btn btn-info" type="submit" name="submit" value="Save">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- end edit modal  -->
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        // datatable
        $("#zero_config").DataTable();
        // notifikasi gagal di hide
        <?php if (empty($_GET['get'])) { ?>
            $("#notifikasi").hide();
        <?php } ?>
        var logingagal = function() {
            $("#tambah").fadeOut('slow');
            $("#ubah").fadeOut('slow');
            $("#hapus").fadeOut('slow');
        };
        setTimeout(logingagal, 3000);
    </script>
</body>

</html>