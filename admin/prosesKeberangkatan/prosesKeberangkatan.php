<?php 

include '../../class/keberangkatan.php';

$db= new keberangkatan();

$aksi = $_GET['aksi'];
if($aksi == "tambah"){
	$db->input( $_POST['maskapai'],$_POST['jadwal'],$_POST['harga'],$_FILES['foto']['name']);
	header("location:../tabel-keberangkatan.php?create=success");
}elseif($aksi == "hapus"){ 	
	$db->hapus($_GET['id']);
	header("location:../tabel-keberangkatan.php?remove=success");
}elseif($aksi == "update"){
	$db->update($_POST['id_keberangkatan'],$_POST['maskapai'],$_POST['jadwal'],$_POST['harga'],$_FILES['foto']['name']);
	header("location:../tabel-keberangkatan.php?edit=success");
}
?>