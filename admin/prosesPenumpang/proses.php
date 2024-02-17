<?php
include 'config.php';

if ($_GET['act'] == 'tambahuser') {
    $id_penumpang = $_POST['id_penumpang'];
    $nama_penumpang = $_POST['nama_penumpang'];
    $email_penumpang = $_POST['email_penumpang'];
    $kelas = $_POST['kelas'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $jadwal = $_POST['jadwal'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tb_penumpang VALUES('$id_penumpang' , '$nama_penumpang' , '$email_penumpang' , '$kelas', '$tgl_berangkat', '$jadwal')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-penumpang.php?create=success");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateuser') {
    $nama_penumpang = $_POST['nama_penumpang'];
    $email_penumpang = $_POST['email_penumpang'];
    $kelas = $_POST['kelas'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $jadwal = $_POST['jadwal'];
    $id_penumpang = $_POST['id_penumpang'];
    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tb_penumpang SET nama_penumpang='$nama_penumpang' , email_penumpang='$email_penumpang', jadwal='$jadwal', kelas='$kelas', tgl_berangkat='$tgl_berangkat' WHERE id_penumpang='$id_penumpang' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-penumpang.php?edit=success");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deleteuser') {
    $id_penumpang = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_penumpang WHERE id_penumpang = '$id_penumpang'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../tabel-penumpang.php?remove=success");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
