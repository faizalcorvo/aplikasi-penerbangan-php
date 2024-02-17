<?php
include 'class/home-page.php';
$db = new penerbangan();

?>
<!DOCTYPE html>
<html class="no-js">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
  <div class="slider-area">
    <div class="slider">
      <div id="bg-slider" class="owl-carousel owl-theme">
        <div class="item"><img src="assets/img/slide1/slider-image-2.jpg" alt="GTA V"></div>
        <div class="item"><img src="assets/img/slide1/slider-image-1.jpg" alt="The Last of us"></div>
        <div class="item"><img src="assets/img/slide1/slider-image-2.jpg" alt="GTA V"></div>
      </div>
    </div>
  </div>

  <!-- property area -->
  <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
          <!-- /.feature title -->
          <h2>Partnership Maskapai</h2>
        </div>
      </div>
      <div class="row">
        <div class="proerty-th">
          <?php
          $no = 1;
          foreach ($db->tampil_data() as $x) {
          ?>
            <div class="col-sm-6 col-md-3 p0">
              <div class="box-two proerty-item">
                <div class="item-thumb">
                  <a href="property-2.html"><img src="assets/images/pesawat/<?php echo $x['foto']; ?>" width="45" height="45"></a>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!-- Count area -->
  <div class="count-area">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
          <!-- /.feature title -->
          <h2>Anda Bisa Mempercayai Kami </h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
          <div class="row">
            <div class="col-sm-3 col-xs-6">
              <div class="count-item">
                <div class="count-item-circle">
                  <span class="pe-7s-users"></span>
                </div>
                <div class="chart">
                  <?php
                  require 'koneksi.php';
                  $query = "SELECT id_user FROM tb_user ORDER BY id_user";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h2>' . $row . '</h2>';
                  ?>
                  <h5>HAPPY CUSTOMER </h5>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-xs-6">
              <div class="count-item">
                <div class="count-item-circle">
                  <span class="pe-7s-home"></span>
                </div>
                <div class="chart">
                  <?php
                  require 'koneksi.php';
                  $query = "SELECT id_daerah FROM tb_daerah ORDER BY id_daerah";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h2>' . $row . '</h2>';
                  ?>
                  <h5>Kota Terdaftar </h5>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-xs-6">
              <div class="count-item">
                <div class="count-item-circle">
                  <span class="pe-7s-flag"></span>
                </div>
                <div class="chart">
                  <?php
                  require 'koneksi.php';
                  $query = "SELECT id_provinsi FROM tb_provinsi ORDER BY id_provinsi";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h2>' . $row . '</h2>';
                  ?>
                  <h5>Provinsi Terdaftar </h5>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-xs-6">
              <div class="count-item">
                <div class="count-item-circle">
                  <span class="pe-7s-graph2"></span>
                </div>
                <div class="chart">
                  <?php
                  require 'koneksi.php';
                  $query = "SELECT id_keberangkatan FROM tb_keberangkatan ORDER BY id_keberangkatan";
                  $query_run = mysqli_query($conn, $query);
                  $row = mysqli_num_rows($query_run);
                  echo '<h2>' . $row . '</h2>';
                  ?>
                  <h5>Maskapai Terdaftar </h5>
                </div>
              </div>

            </div>
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

</body>

</html>