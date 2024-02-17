<?php

include "koneksi.php";


class bukti extends database
{

    function __construct()
    {
        $this->getConnection();
    }

    function insert($id_pesan, $file)
    {
        $sql = "INSERT INTO `tb_bukti` (`id_bukti`, `id_pesan`, `file`) VALUES (NULL, '$id_pesan', '$file');";
        $result = mysqli_query($this->getConnection(), $sql);

        move_uploaded_file($_FILES['file']['tmp_name'], "assets/images/bukti/" . $_FILES['file']['name']);

        echo "<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
    }
}
