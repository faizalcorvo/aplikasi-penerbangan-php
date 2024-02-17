<?php 

include "koneksi.php";

	
class keberangkatan extends database{

	function __construct(){
		$this->getConnection();
	}

			
	function tampil_data(){
		$sql = "SELECT * FROM tb_keberangkatan";
		$result = mysqli_query($this->getConnection(),$sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}

	function hapus($id_keberangkatan){
		$sql = "DELETE from tb_keberangkatan where id_keberangkatan='$id_keberangkatan'";
		$result = mysqli_query($this->getConnection(),$sql);		
	}
	
	function input($maskapai,$jadwal,$harga,$foto){
		$sql = "INSERT INTO tb_keberangkatan( `maskapai`, `jadwal`,`harga`, `foto`) values('$maskapai','$jadwal','$harga','$foto')";
		$result = mysqli_query($this->getConnection(),$sql);
		move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/images/pesawat/".$_FILES['foto']['name']);
		echo"<script>alert('foto Berhasil diupload !');history.go(-1);</script>";
	}	

	function edit($id_keberangkatan){
		$sql = "SELECT * from tb_keberangkatan where id_keberangkatan='$id_keberangkatan'";
		$result = mysqli_query($this->getConnection(),$sql);
		while ($row = mysqli_fetch_array($result)) {
			$hasil[] = $row;
		}
		return $hasil;
	}


	function update($id_keberangkatan,$maskapai,$jadwal,$harga,$foto){
		if(empty($foto)){
			$sql = "UPDATE tb_keberangkatan SET maskapai='$maskapai',jadwal=$jadwal, harga='$harga' WHERE id_keberangkatan='$id_keberangkatan'";
			$result = mysqli_query($this->getConnection(),$sql);
		}
		if(!empty($foto)){
			$sql = "UPDATE tb_keberangkatan SET maskapai='$maskapai',jadwal=$jadwal, harga='$harga',foto='$foto' WHERE id_keberangkatan='$id_keberangkatan'";$result = mysqli_query($this->getConnection(),$sql);
			move_uploaded_file($_FILES['foto']['tmp_name'], "../assets/images/pesawat/".$_FILES['foto']['name']);
			echo"<script>alert('foto Berhasil diupload !');history.go(-1);</script>";	
		}
	}
} 

?>