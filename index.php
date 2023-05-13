<?php
session_start();

// Periksa apakah pengguna sudah login atau belum
if (!isset($_SESSION['user'])) {
    // Jika pengguna belum login, redirect ke halaman login.php
    header("Location: login.php");
    exit;
}

// Pengguna sudah login, dapatkan informasi pengguna dari sesi
$user = $_SESSION['user'];

// Sambungkan ke database
$conn = mysqli_connect("localhost:3306", "root", "admin", "arkatama_store2");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>CRUD PHP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Gaya tombol kotak */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            border: none;
        }

        .button.edit {
            background-color: #2196F3;
        }

        .button.delete {
            background-color: #F44336;
        }

        .button.detail {
            background-color: #9c27b0;
        }

        .button.logout {
            background-color: #9c27b0;
        }
    </style>
</head>

<body>
    <h2>Data User</h2>
    <a href="add.php" class="button">Tambah User</a>
    <a href="logout.php" class="button logout" onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a>
    <br /><br />
    <table>
        <tr>
            <th>Avatar</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
        <?php
        // Ambil data dari tabel
        $result = mysqli_query($conn, "SELECT * FROM users");
        while ($data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td><img src='uploads/" . $data['avatar'] . "' width='80'></td>";
            echo "<td>" . $data['name'] . "</td>";
            echo "<td>" . $data['email'] . "</td>";
            echo "<td>" . $data['phone'] . "</td>";
            echo "<td>" . $data['role'] . "</td>";
            echo "<td>" . $data['address'] . "</td>";
            echo "<td>
                    <a href='edit.php?id=" . $data['id'] . "' class='button edit'>Edit</a>
                    <a href='delete.php?id=" . $data['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")' class='button delete'>Delete</a>
                    <button onclick='showDetail(\"" . $data['name'] . "\", \"" . $data['email'] . "\", \"" . $data['phone'] . "\", \"" . $data['role'] . "\", \"" . $data['address'] . "\")' class='button detail'>Detail</button>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <!-- Script JavaScript -->
    <script>
        function showDetail(name, email, phone, role, address) {
            var detailString = "Name: " + name + "\n" +
                "Email: " + email + "\n" +
                "Phone: " + phone + "\n" +
                "Role: " + role + "\n" +
                "Address: " + address;
            alert(detailString);
        }

        function confirmLogout() {
            return confirm("Apakah Anda yakin ingin logout?");
        }
    </script>