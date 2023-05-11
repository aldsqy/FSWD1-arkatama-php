<?php
// Sambungkan ke database
$conn = mysqli_connect("localhost:3306", "root", "admin", "arkatama_store2");

// Periksa koneksi
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$role = $_POST['role'];
$address = $_POST['address'];
$password = $_POST['password'];

// Upload avatar
$avatar = $_FILES['avatar']['name'];
$tmp = $_FILES['avatar']['tmp_name'];
$path = "uploads/".$avatar;

// Cek apakah ada kiriman form dari method post
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['avatar'])) {

    // Cek apakah tipe file yang diupload adalah JPEG / JPG / PNG
    $allowed = array('jpeg', 'jpg', 'png');
    $filename = $_FILES['avatar']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext, $allowed)) {
        echo "<div class='alert alert-danger'>Format file tidak didukung.</div>";
    } else {
        // Pindahkan file gambar ke folder uploads
        move_uploaded_file($tmp, $path);

        // Query input menginput data kedalam tabel users
        $sql = "INSERT INTO users (avatar, name, email, phone, role, address, password) VALUES ('$avatar', '$name', '$email', '$phone', '$role', '$address', '$password')";

        // Mengeksekusi/menjalankan query diatas
        $result = mysqli_query($conn, $sql);

        // Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($result) {
            header("Location: index.php");
            exit;
        } else {
            echo "<div class='alert alert-danger'>Data Gagal disimpan.</div>";
        }
    }
} else {
    echo "<div class='alert alert-danger'>Data tidak ditemukan.</div>";
}

// Tutup koneksi database
mysqli_close($conn);
?>
