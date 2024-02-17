<?php
// berfungsi mengaktifkan session
session_start();

// berfungsi menghubungkan koneksi ke database
include 'koneksi.php';

// berfungsi menangkap data yang dikirim
$username = $_POST['username'];
$password = $_POST['password'];

// berfungsi menyeleksi data user dengan username dan password yang sesuai
$sql = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'");
//berfungsi menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($sql);

// berfungsi mengecek apakah username dan password ada pada database
if ($cek > 0) {
    $data = mysqli_fetch_assoc($sql);

    // berfungsi mengecek jika user login sebagai admin
    if ($data['akses'] == "admin") {
        // berfungsi membuat session
        $_SESSION['username'] =  $data['username'];
        $_SESSION['nama'] =  $data['nama'];
        $_SESSION['email'] =  $data['email'];
        $_SESSION['foto'] =  $data['foto'];
        $_SESSION['akses'] = "admin";
        //berfungsi mengalihkan ke halaman admin
        header("location:admin.php");
        // berfungsi mengecek jika user login sebagai user
    } else if ($data['akses'] == "user") {
        // berfungsi membuat session
        $_SESSION['username'] =  $data['username'];
        $_SESSION['nama'] =  $data['nama'];
        $_SESSION['email'] =  $data['email'];
        $_SESSION['foto'] =  $data['foto'];
        $_SESSION['akses'] = "user";
        // berfungsi mengalihkan ke halaman user
        header("location:user/user.php");
    } else {
        // berfungsi mengalihkan alihkan ke halaman login kembali
        header("location:index.php?alert=gagal");
    }
} else {
    header("location:index.php?alert=gagal");
}
