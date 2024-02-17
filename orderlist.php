<!DOCTYPE html>

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
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />
</head>

<body>

    <!-- <div id="preloader">
        <div id="status">&nbsp;</div>
    </div> -->
    <!-- Body content -->
    <?php include("header.php") ?>

    <!-- property area -->
    <div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>My Order List</h2>
                    <p>Detail pemesanan yang sudah anda pilih . </p>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Order</h5>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-left">ID Pesan</th>
                                        <th class="text-left">Tanggal Pemesanan</th>
                                        <th class="text-left">Tanggal Keberangkatan</th>
                                        <th class="text-left">Kelas Penerbangan</th>
                                        <th class="text-left">Maskapai Pesawat</th>
                                        <th class="text-left">Biaya</th>
                                        <th class="text-left">Harga Kelas</th>
                                        <th class="text-left">Harga Maskapai</th>
                                        <th class="text-left">Harga Total</th>
                                        <th class="text-left">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $id_user = $_SESSION['id_user'];
                                    $_mysqli = new mysqli("localhost", "root", "", "db_tiket");
                                    $konek = $_mysqli->query("SELECT * FROM tb_pesan,tb_user,tb_daerah,tb_kelas,tb_keberangkatan WHERE tb_pesan.id_user=tb_user.id_user AND tb_pesan.id_kelas=tb_kelas.id_kelas AND tb_pesan.id_keberangkatan=tb_keberangkatan.id_keberangkatan AND tb_pesan.id_daerah=tb_daerah.id_daerah AND tb_user.id_user='$id_user'");
                                    while ($isi_tbl = mysqli_fetch_array($konek)) {
                                        $total_harga    = $isi_tbl['harga_kelas'] + $isi_tbl['biaya'] + $isi_tbl['harga'];
                                        if ($isi_tbl['status'] == 'Accepted') {
                                            $txtS = "Telah malakukan pembayaran";
                                        } else if ($isi_tbl['status'] == 'S3') {
                                            $txtS = "Melakukan pembayaran di tempat";
                                        }
                                    ?>
                                        <tr>
                                            <td>BT-00<?php echo $isi_tbl['id_pesan']; ?></td>
                                            <td><?php echo $isi_tbl['tgl_pesan']; ?></td>
                                            <td><?php echo $isi_tbl['tgl_tour']; ?></td>
                                            <td><?php echo $isi_tbl['kelas']; ?></td>
                                            <td><?php echo $isi_tbl['maskapai']; ?></td>
                                            <td><?php echo $isi_tbl['biaya']; ?> IDR</td>
                                            <td><?php echo $isi_tbl['harga_kelas']; ?> IDR</td>
                                            <td><?php echo $isi_tbl['harga']; ?> IDR</td>
                                            <td><?php echo $total_harga; ?> IDR</td>
                                            <td><?php
                                                $now = date("Y-m-d");
                                                if ($isi_tbl['status'] == 'Accepted' && $isi_tbl['tgl_tour'] >= $now || $isi_tbl['status'] == 'S3' && $isi_tbl['tgl_tour'] >= $now) {
                                                ?>
                                                    <a class="btn btn-success" href="orderfinish.php?id=<?php echo $isi_tbl[0]; ?>" data-hint="<?php echo $txtS ?>">Cetak Tiket</a>
                                                <?php
                                                } else if ($isi_tbl['status'] == 'S4') {
                                                    echo "Telah Tour";
                                                } else if ($isi_tbl['tgl_tour'] < $now) {
                                                    echo "<a class='text-warning'><b>Expired!!</b></a>";
                                                } else {
                                                    echo "<b>Waitting..<b>";
                                                ?>
                                                    <br /><a class="btn btn-warning" href="uploadbukti.php?id=<?php echo $isi_tbl[0]; ?>" data-hint="Upload Bukti Pembayaran">Upload Bukti</a>
                                                <?php
                                                }
                                                ?>
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
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        // datatable
        $("#zero_config").DataTable();
    </script>

</body>

</html>