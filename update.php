<?php
// Sambungkan ke database
$conn = mysqli_connect("localhost:3306", "root", "admin", "arkatama_store2");

// Periksa koneksi
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

// Ambil data dari form
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = $_POST['role'];
$address = $_POST['address'];
$password = $_POST['password'];

// Update data ke database
$result = mysqli_query($conn, "UPDATE users SET name='$name', email='$email', phone='$phone', role='$role', address='$address', password='$password' WHERE id='$id'");

// Cek apakah query berhasil dijalankan
if($result){
    header("Location: index.php");
} else {
    echo "Data gagal diupdate.";
}

// Tutup koneksi database
mysqli_close($conn);
?>
