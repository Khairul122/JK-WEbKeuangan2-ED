<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$pass = mysqli_real_escape_string($koneksi, $_POST['pass']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from admin where email='$email' and pass='$pass'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

// Jika data ditemukan
if ($cek > 0) {
    $sesi = mysqli_fetch_assoc($data);

    // Cek level
    if ($sesi['level'] == 1) {
        $_SESSION['id'] = $sesi['id_admin'];
        $_SESSION['nama'] = $sesi['nama'];
        $_SESSION['status'] = "login";
        header("location:index.php");
        exit; // Pastikan untuk keluar dari skrip agar tidak melanjutkan ke bawah
    } elseif ($sesi['level'] == 2) {
        $_SESSION['id'] = $sesi['id_admin'];
        $_SESSION['nama'] = $sesi['nama'];
        $_SESSION['status'] = "login";
        header("location:index_kepsek.php");

    } else {
        // Level tidak valid, arahkan ke halaman login
        header("location:login.php?pesan=gagal");

    }
} else {
    // Jika data tidak ditemukan, arahkan ke halaman login
    header("location:login.php?pesan=gagal");
    exit; // Pastikan untuk keluar dari skrip agar tidak melanjutkan ke bawah
}
?>
