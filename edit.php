<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            margin-top: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px 80px 20px 60px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 0 auto;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .form-container input[type="file"] {
            margin-bottom: 15px;
        }

        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-container a {
            color: #999;
            text-decoration: none;
        }

        .role {
            padding-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <?php
        // Sambungkan ke database
        $conn = mysqli_connect("localhost:3306", "root", "admin", "arkatama_store2");

        // Periksa koneksi
        if (mysqli_connect_errno()){
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }

        // Ambil data pengguna berdasarkan ID
        $id = $_GET['id'];
        $result = mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
        $data = mysqli_fetch_array($result);
        ?>
        <h2>Edit User</h2>
        <a href="index.php">Kembali</a>
        <br/><br/>
        <form action="update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <label>Avatar:</label>
            <input type="file" name="avatar">
            <br/>
            <img src="uploads/<?php echo $data['avatar']; ?>" width="50" height="50">
            <br/>
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
            <br/>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $data['email']; ?>" required>
            <br/>
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $data['phone']; ?>" required>
            <br/>
            <label>Role:</label>
            <select name="role" required>
                <option value="staff">Staff</option>
                <option value="admin">Admin</option>
            </select>
            <br/>
            <br/>
            <label>Address:</label>
            <textarea name="address" required><?php echo $data['address']; ?></textarea>
            <br/>
            <label>Password:</label>
            <input type="password" name="password" required>
            <br/><br/>
            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>
