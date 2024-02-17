<?php

include "koneksi.php";


class user extends database
{

    function __construct()
    {
        $this->getConnection();
    }

    function tampil_data()
    {
        $sql = "SELECT * FROM tb_user";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function input($foto, $nama_user, $email_user, $no_hp, $no_rek, $nama_rek, $username, $password, $tgl_lahir, $jekel, $alamat)
    {

        $sql = "INSERT INTO tb_user  (`foto`, `nama_user`, `email_user`, `no_hp`, `no_rek`, `nama_rek`, `username`, `password`, `tgl_lahir`, `jekel`, `alamat`) VALUES('$foto','$nama_user','$email_user','$no_hp','$no_rek','$nama_rek','$username','$password','$tgl_lahir','$jekel','$alamat')";
        $result = mysqli_query($this->getConnection(), $sql);

        move_uploaded_file($_FILES['foto']['tmp_name'], "foto/" . $_FILES['foto']['name']);

        echo "<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
    }


    function hapus($id_user)
    {
        $sql = "DELETE FROM tb_user WHERE id_user='$id_user'";
        $result = mysqli_query($this->getConnection(), $sql);
    }

    function edit($id_user)
    {
        $sql = "SELECT * FROM tb_user WHERE id_user='$id_user'";
        $result = mysqli_query($this->getConnection(), $sql);
        while ($row = mysqli_fetch_array($result)) {
            $hasil[] = $row;
        }
        return $hasil;
    }

    function update($id_user, $foto, $nama_user, $email_user, $no_hp, $no_rek, $nama_rek, $username, $password, $tgl_lahir, $jekel, $alamat)
    {


        if (empty($foto)) {
            $sql = "UPDATE tb_user SET   nama_user='$nama_user', email_user='$email_user',no_hp='$no_hp',no_rek='$no_rek',nama_rek='$nama_rek',username='$username',password='$password' ,tgl_lahir='$tgl_lahir' ,jekel='$jekel' ,alamat='$alamat'  WHERE id_user='$id_user'";
            $result = mysqli_query($this->getConnection(), $sql);
        }

        if (!empty($foto)) {
            $sql = "UPDATE tb_user SET  foto='$foto', nama_user='$nama_user', email_user='$email_user',no_hp='$no_hp',no_rek='$no_rek',nama_rek='$nama_rek',username='$username',password='$password' ,tgl_lahir='$tgl_lahir' ,jekel='$jekel' ,alamat='$alamat'  WHERE id_user='$id_user'";
            $result = mysqli_query($this->getConnection(), $sql);

            move_uploaded_file($_FILES['foto']['tmp_name'], "foto/" . $_FILES['foto']['name']);

            echo "<script>alert('Gambar Berhasil diupload !');history.go(-1);</script>";
        }
    }
    public function order($id_user, $id_kelas, $id_keberangkatan, $id_daerah, $tgl_pesan, $tgl_tour)
    {

        $sql = "INSERT INTO `tb_pesan` (`id_pesan`, `id_user`, `id_kelas`, `id_keberangkatan`, `id_daerah`, `tgl_pesan`, `tgl_tour`) VALUES (NULL, '$id_user','$id_kelas','$id_keberangkatan','$id_daerah','$tgl_pesan','$tgl_tour')";
        $result = mysqli_query($this->getConnection(), $sql);
    }
}
