<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f2f2f2;
        }

        .card {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .popup img {
            width: 50px;
            height: 50px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2 class="text-center">Login</h2>
        <form method="POST" action="process_login.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

    <div id="popupSuccess" class="popup" style="display: none;">
        <img src="success-icon.png" alt="Success Icon">
        <p>Berhasil!</p>
    </div>

    <div id="popupFailure" class="popup" style="display: none;">
        <img src="failure-icon.png" alt="Failure Icon">
        <p>Gagal!</p>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
