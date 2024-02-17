<?php

include "koneksi.php";


class order extends database
{

    function __construct()
    {
        $this->getConnection();
    }

    public function input($id_user, $id_kelas, $id_daerah, $tgl_tour)
    {
        $db = new database();
        $sql = "INSERT INTO `tb_pesan`( `id_user`, `id_kelas`, `id_keberangkatan`, `id_daerah`, `tgl_pesan`, `tgl_tour`)values('$id_user','$id_kelas','$id_daerah',NOW(),'$tgl_tour')";
        $result = mysqli_query($this->getConnection(), $sql);
    }

    function tampil_data()
    {
        $sql = "SELECT * FROM tb_pesan,tb_user,tb_daerah,tb_kelas,tb_keberangkatan WHERE tb_pesan.id_user=tb_user.id_user AND tb_pesan.id_kelas=tb_kelas.id_kelas AND tb_pesan.id_keberangkatan=tb_keberangkatan.id_keberangkatan AND tb_pesan.id_daerah=tb_daerah.id_daerah ";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }


        return $hasil;
    }

    function cek_bukti($id_pesan)
    {
        $sql = "SELECT * FROM tb_pesan,tb_user WHERE tb_pesan.id_user=tb_user.id_user AND id_pesan=$id_pesan  ";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }


        return $hasil;
    }


    function tampil_bukti()
    {
        $sql = "SELECT tb_user.nama_user,tb_pesan.id_pesan,tb_bukti.file FROM tb_pesan,tb_user,tb_bukti WHERE tb_pesan.id_user=tb_user.id_user AND tb_pesan.id_pesan=tb_bukti.id_pesan ";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function jumlah_member()
    {
        $sql = "SELECT COUNT(nama_user)AS nama FROM tb_user ";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
    function transaksi()
    {
        $sql = "SELECT COUNT(status)AS status FROM tb_pesan ";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
    function deal()
    {
        $sql = "SELECT COUNT(status)AS status FROM tb_pesan WHERE status='S2' ";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }
}
