<?php
include '../prosesKeberangkatan/config.php';

if ($_GET['act'] == 'deleteuser') {
    $id_admin = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_admin WHERE id_admin = '$id_admin'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../tabel-pengguna.php?remove=success");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
