<?php
include 'config.php';

if ($_GET['act'] == 'tambahuser') {
    $id_kelas = $_POST['id_kelas'];
    $kelas = $_POST['kelas'];
    $harga_kelas = $_POST['harga_kelas'];
    $keterangan = $_POST['keterangan'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tb_kelas VALUES('$id_kelas' , '$kelas' , '$harga_kelas' , '$keterangan' )");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-kelas.php?create=success");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateuser') {
    $kelas = $_POST['kelas'];
    $harga_kelas = $_POST['harga_kelas'];
    $keterangan = $_POST['keterangan'];
    $id_kelas = $_POST['id_kelas'];
    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tb_kelas SET kelas='$kelas' , harga_kelas='$harga_kelas' , keterangan='$keterangan' WHERE id_kelas='$id_kelas' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-kelas.php?edit=success");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deleteuser') {
    $id_kelas = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_kelas WHERE id_kelas = '$id_kelas'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../tabel-kelas.php?remove=success");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
