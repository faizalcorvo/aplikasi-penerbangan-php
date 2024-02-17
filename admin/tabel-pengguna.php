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
  <link rel="stylesheet" type="text/css" href="../assets/extra-libs/multicheck/multicheck.css" />
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
            <h4 class="page-title">Data Pengguna</h4>
            <div class="ms-auto text-end">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Data Pengguna
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
                <h5 class="card-title">Data Pengguna</h5>
                <div class="table-responsive">
                  <table id="zero_config" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include 'prosesKeberangkatan/config.php';
                      $no = 1;
                      $data = mysqli_query($koneksi, "SELECT * FROM tb_admin");
                      while ($id = mysqli_fetch_array($data)) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><img src="../assets/images/users/<?php echo $id['foto']; ?>" width="45" height="45" alt=""></td>
                          <td><?php echo $id['username']; ?></td>
                          <td><?php echo $id['nama']; ?></td>
                          <td><?php echo $id['email']; ?></td>
                          <td><?php echo $id['akses']; ?></td>
                          <td>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteuser<?php echo $id['id_admin']; ?>"><i class="fa fa-trash-alt"></i>
                            </button>
                            <!-- Modal delete-->
                            <div class="modal fade" id="deleteuser<?php echo $id['id_admin']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header bg-info">
                                    <h5 class="modal-title fw-bold text-white" id="exampleModalLabel">
                                      <i class="fa fa-trash-alt"></i> &nbsp; Konfirmasi Hapus Data Pengguna
                                    </h5>
                                    <button class="btn-close btn-close-white" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <h4 align="center">Apakah anda yakin ingin menghapus user id <?php echo $id['id_admin']; ?><strong><span class="grt"></span></strong> ?</h4>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <a href="prosesPengguna/proses.php?act=deleteuser&id=<?php echo $id['id_admin']; ?>" class="btn btn-info">Delete</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- modal delete -->
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
  <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
  <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
  <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>
  <script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $("#zero_config").DataTable();
    // notifikasi gagal di hide
    <?php if (empty($_GET['get'])) { ?>
      $("#notifikasi").hide();
    <?php } ?>
    var logingagal = function() {
      $("#hapus").fadeOut('slow');
    };
    setTimeout(logingagal, 3000);
  </script>
</body>

</html>