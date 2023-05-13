<?php
session_start();

// Sambungkan ke database
$conn = mysqli_connect("localhost:3306", "root", "admin", "arkatama_store2");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

// Lakukan query untuk mencari pengguna dengan email dan password yang cocok
$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $query);

// Periksa apakah pengguna ditemukan
if (mysqli_num_rows($result) == 1) {
    // Pengguna berhasil login, simpan informasi pengguna ke sesi
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user'] = $user;
    
    // Redirect ke halaman index.php setelah login berhasil
    header("Location: index.php");
    exit;
} else {
    // Jika pengguna tidak ditemukan, kembali ke halaman login dengan pesan error
    $_SESSION['login_error'] = "Email atau password salah";
    header("Location: login.php");
    exit;
}
?>
