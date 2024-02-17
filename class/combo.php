<?php

include "koneksi.php";


class combo extends database
{

    function __construct()
    {
        $this->getConnection();
    }


    function tampil_kelas()
    {
        $sql = "SELECT * FROM tb_kelas";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function tampil_pesawat()
    {
        $sql = "SELECT * FROM tb_keberangkatan";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
    function tampil_daerah()
    {
        $sql = "SELECT * FROM tb_daerah";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
}
