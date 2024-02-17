<?php

include "koneksi.php";


class penerbangan extends database
{

	function __construct()
	{
		$this->getConnection();
	}


	function tampil_data()
	{
		$sql = "SELECT * FROM tb_keberangkatan";
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	function hapus($id_keberangkatan)
	{
		$sql = "DELETE FROM tb_keberangkatan where id_keberangkatan='$id_keberangkatan'";
		$result = mysqli_query($this->getConnection(), $sql);
	}

	function input($hotel, $harga, $ket_hotel, $foto)
	{

		$sql = "insert into tb_keberangkatan( `hotel`, `harga`,`ket_hotel`, `foto`) values('$hotel','$harga','$ket_hotel','$foto')";

		$result = mysqli_query($this->getConnection(), $sql);

		move_uploaded_file($_FILES['foto']['tmp_name'], "../images/" . $_FILES['foto']['name']);

		echo "<script>alert('foto Berhasil diupload !');history.go(-1);</script>";
	}

	function edit($id_keberangkatan)
	{
		$sql = "SELECT * from tb_keberangkatan where id_keberangkatan='$id_keberangkatan'";
		$result = mysqli_query($this->getConnection(), $sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}


	function update($id_keberangkatan, $hotel, $harga, $ket_hotel, $foto)
	{
		if (empty($foto)) {
			$sql = "UPDATE tb_keberangkatan SET hotel='$hotel',harga=$harga, ket_hotel='$ket_hotel' WHERE id_keberangkatan='$id_keberangkatan'";
			$result = mysqli_query($this->getConnection(), $sql);
		}

		if (!empty($foto)) {
			$sql = "UPDATE tb_keberangkatan SET hotel='$hotel',harga=$harga, ket_hotel='$ket_hotel',foto='$foto' WHERE id_keberangkatan='$id_keberangkatan'";
			$result = mysqli_query($this->getConnection(), $sql);

			move_uploaded_file($_FILES['foto']['tmp_name'], "../images/" . $_FILES['foto']['name']);

			echo "<script>alert('foto Berhasil diupload !');history.go(-1);</script>";
		}
	}
}
