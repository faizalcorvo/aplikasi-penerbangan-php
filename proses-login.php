<?php
// berfungsi mengaktifkan session
session_start();

// berfungsi menghubungkan koneksi ke database
include 'koneksi.php';

// berfungsi menangkap data yang dikirim
$username = $_POST['username'];
$password = $_POST['password'];

// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
//berfungsi menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($sql);

// berfungsi mengecek apakah username dan password ada pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($sql);

    if ($data['akses'] == "user") {
        // berfungsi membuat session
        $_SESSION['id_user'] =  $data['id_user'];
        $_SESSION['username'] =  $data['username'];
        $_SESSION['password'] =  $data['username'];
        $_SESSION['nama_user'] =  $data['nama_user'];
        $_SESSION['email_user'] =  $data['email_user'];
        $_SESSION['no_hp'] =  $data['no_hp'];
        $_SESSION['foto'] =  $data['foto'];
        $_SESSION['akses'] = "user";
        // berfungsi mengalihkan ke halaman user
        header("location:index.php");
    } else {
        // berfungsi mengalihkan alihkan ke halaman login kembali
        header("location:register.php?alert=gagal");
    }
} else {
    header("location:register.php?alert=gagal");
}
