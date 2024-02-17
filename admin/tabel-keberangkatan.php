<?php
include '../class/keberangkatan.php';

$db= new keberangkatan();
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
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css" />
</head>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
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
                        <h4 class="page-title">Data Keberangkatan</h4>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Data Keberangkatan
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div id="tambah">
                            <?php if (!empty($_GET['create'])) { ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button class="btn-close btn-close-white close" type="button" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="fa fa-check"></i>
                                    <strong> Create Success !</strong>
                                </div>
                            <?php } ?>
                        </div>
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
                        <div class="card">
                            <div class="card-body">
                                <button class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#myModal"><i class="mdi mdi-account-plus"></i>&nbsp;Tambah Data</button>
                            </div>
                        </div>
                        <!-- Modal Add start-->
                        <div class="modal fade text-start" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h5 class="modal-title text-center text-white" id="myModalLabel">
                                            <i class="fa fa-plus"></i> &nbsp; Tambah Data Keberangkatan
                                        </h5>
                                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="prosesKeberangkatan/prosesKeberangkatan.php?aksi=tambah" method="post" class="row g-3">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="maskapai">Nama Maskapai</label>
                                                <input class="form-control" id="maskapai" type="text" name="maskapai" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="jadwal">Jadwal Penerbangan</label>
                                                <select class="form-select" style="width: 100%; height: 36px" id="jadwal" name="jadwal">
                                                    <option>-- Pilih Jadwal Penerbangan --</option>
                                                    <optgroup label="Jadwal Penerbangan">
                                                        <option value="SENIN-SELASA">SENIN-SELASA</option>
                                                        <option value="RABU-KAMIS">RABU-KAMIS</option>
                                                        <option value="JUMAT-SABTU-MINGGU">JUMAT-SABTU-MINGGU</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="harga">Harga Penerbangan</label>
                                                <input class="form-control" id="harga" type="text" name="harga" required>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="foto">Foto</label>
                                                <input class="form-control" id="foto" type="file" name="foto" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger" type="submit" data-bs-dismiss="modal">Close</button>
                                                <input class="btn btn-info" type="submit" name="simpan" value="Save">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Keberangkatan</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Maskapai</th>
                                                <th>Jadwal Penerbangan</th>
                                                <th>Harga Penerbangan</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($db->tampil_data() as $data) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $data['maskapai']; ?></td>
                                                    <td><?php echo $data['jadwal']; ?></td>
                                                    <td><?php echo $data['harga']; ?></td>
                                                    <td><img class="img-rounded" src="../assets/images/pesawat/<?php echo $data['foto']; ?>" width="70" height="70" alt=""></td>
                                                    <td>
                                                        <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateuser<?php echo $data['id_keberangkatan']; ?>"><i class="fa fa-pencil-alt"></i></a>
                                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteuser<?php echo $data['id_keberangkatan']; ?>"><i class="fa fa-trash-alt"></i>
                                                        </button>
                                                        <!-- Modal delete-->
                                                        <div class="modal fade" id="deleteuser<?php echo $data['id_keberangkatan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info">
                                                                        <h5 class="modal-title fw-bold text-white" id="exampleModalLabel">
                                                                            <i class="fa fa-trash-alt"></i> &nbsp; Konfirmasi Hapus Data Keberangkatan
                                                                        </h5>
                                                                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4 align="center">Apakah anda yakin ingin menghapus user id <?php echo $data['id_keberangkatan']; ?><strong><span class="grt"></span></strong> ?</h4>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                        <a href="prosesKeberangkatan/prosesKeberangkatan.php?aksi=delete&id=<?php echo $data['id_keberangkatan']; ?>" class="btn btn-info">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- modal delete -->
                                                        <!-- Modal edit start-->
                                                        <div class="modal fade" id="updateuser<?php echo $data['id_keberangkatan']; ?>" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header bg-info">
                                                                        <h5 class="modal-title fw-bold text-white" id="modalLabel">
                                                                            <i class="fa fa-pencil-alt"></i> &nbsp; Konfirmasi Edit Data Keberangkatan
                                                                        </h5>
                                                                        <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form action="prosesKeberangkatan/prosesKeberangkatan.php?aksi=update" method="post" class="row g-3">
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label" for="maskapai">Nama Maskapai</label>
                                                                                <input class="form-control" id="maskapai" type="text" name="maskapai" value="<?php echo $data['maskapai']; ?>" required>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label" for="jadwal">Jadwal Penerbangan</label>
                                                                                <select class="form-select" style="width: 100%; height: 36px" id="jadwal" name="jadwal">
                                                                                    <option>-- Pilih Jadwal Penerbangan --</option>
                                                                                    <optgroup label="Jadwal Penerbangan">
                                                                                        <option value="SENIN-SELASA" <?php if ($data['jadwal'] == 'SENIN-SELASA') { ?> selected='' <?php } ?>value="SENIN-SELASA">SENIN-SELASA</option>
                                                                                        <option value="RABU-KAMIS" <?php if ($data['jadwal'] == 'RABU-KAMIS') { ?> selected='' <?php } ?>value="RABU-KAMIS">RABU-KAMIS</option>
                                                                                        <option value="JUMAT-SABTU-MINGGU" <?php if ($data['jadwal'] == 'JUMAT-SABTU-MINGGU') { ?> selected='' <?php } ?>value="JUMAT-SABTU-MINGGU">JUMAT-SABTU-MINGGU</option>
                                                                                    </optgroup>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label" for="harga">Harga Penerbangan</label>
                                                                                <input class="form-control" id="harga" type="text" name="harga" value="<?php echo $data['harga']; ?>" required>
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label class="form-label" for="foto">Foto</label>
                                                                                <input class="form-control" id="foto" type="file" name="foto" value="<?php echo $data['foto']; ?>">
                                                                                <input type="hidden" value="<?php echo $data['id_keberangkatan']; ?>" class="form-control" name="id_keberangkatan">
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
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        // datatable
        $("#zero_config").DataTable();
        $(".select2").select2();
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