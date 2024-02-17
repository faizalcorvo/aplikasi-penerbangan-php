<?php

include 'class/user.php';

$db = new user();

$aksi = $_GET['aksi'];
if ($aksi == "tambah_order") {
    $db->order($_POST['id_user'], $_POST['id_kelas'], $_POST['id_keberangkatan'], $_POST['id_daerah'], $_POST['tgl_pesan'], $_POST['tgl_tour']);

    header("location:orderlist.php");
}
