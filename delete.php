<?php
// Sambungkan ke database
$conn = mysqli_connect("localhost:3306", "root", "admin", "arkatama_store2");

// Periksa koneksi
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

// Ambil ID data yang akan dihapus
$id = $_GET['id'];

// Hapus data dari database
$result = mysqli_query($conn, "DELETE FROM users WHERE id='$id'");

// Cek apakah query berhasil dijalankan
if($result){
    header("Location: index.php");
} else {
    echo "Data gagal dihapus.";
}

// Tutup koneksi database
mysqli_close($conn);
?>
