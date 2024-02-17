<?php
include '../koneksi.php';

if ($_GET['act'] == 'updateuser') {
    $status = $_POST['status'];
    $tgl_tour = $_POST['tgl_tour'];
    $id_pesan = $_POST['id_pesan'];
    //query update
    $queryupdate = mysqli_query($conn, "UPDATE tb_pesan SET status='$status' , tgl_tour='$tgl_tour' WHERE id_pesan='$id_pesan' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-transaksi.php?edit=success");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($conn);
    }
} elseif ($_GET['act'] == 'deleteuser') {
    $id_pesan = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($conn, "DELETE FROM tb_pesan WHERE id_pesan = '$id_pesan'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../tabel-transaksi.php?remove=success");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
