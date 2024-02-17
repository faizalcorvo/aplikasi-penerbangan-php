<?php
include 'config.php';

if ($_GET['act'] == 'tambahuser') {
    $id_keberangkatan = $_POST['id_keberangkatan'];
    $maskapai = $_POST['maskapai'];
    $jadwal = $_POST['jadwal'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO tb_keberangkatan VALUES('$id_keberangkatan' , '$maskapai' , '$jadwal', '$harga', '$foto')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../tabel-keberangkatan.php?create=success");
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'updateuser') {
    $maskapai = $_POST['maskapai'];
    $jadwal = $_POST['jadwal'];
    $harga = $_POST['harga'];
    $foto = $_POST['foto'];
    $id_keberangkatan = $_POST['id_keberangkatan'];
    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE tb_keberangkatan SET maskapai='$maskapai' , jadwal='$jadwal', harga='$harga', foto='$foto' WHERE id_keberangkatan='$id_keberangkatan' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../tabel-keberangkatan.php?edit=success");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($koneksi);
    }
} elseif ($_GET['act'] == 'deleteuser') {
    $id_keberangkatan = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM tb_keberangkatan WHERE id_keberangkatan = '$id_keberangkatan'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../tabel-keberangkatan.php?remove=success");
    } else {
        echo "ERROR, data gagal dihapus" . mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
