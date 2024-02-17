<?php
$host    = "localhost";    // host atau IP
$username    = "root";        // nama penggua
$password    = "";            // password login
$database    = "db_tiket";        // database yang digunakan ketika melakukan query
// buat koneksi
$conn = mysqli_connect($host, $username, $password, $database);
// cek koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal" . mysqli_connect_error();
}
