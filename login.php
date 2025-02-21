<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village East Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('/imgs/loginbg.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            
        }
        .login-card {
            background-color: rgba(59, 108, 47, 0.8); /* Transparent dark green */
            border-radius: 15px;
            padding: 20px;
            color: white;
        }
        .login-card h1, .login-card p {
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #8DC26F;
        }
        .btn-primary {
            background-color: #8DC26F;
            border: none;
        }
        .btn-primary:hover {
            background-color: #7AB359;
        }
        .form-label {
            color: white;
        }
        .icon {
            font-size: 1.2rem;
            margin-right: 10px;
            color: #8DC26F;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="col-md-4">
            <div class="login-card shadow-lg ">
                <h1> Village East</h1>
                <p>Log in your Account</p>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label-lg mb-3 text-dark fw-bold" aria-label="Large select example">
                            <i class="icon bi bi-person"></i>Username
                        </label>
                        <input type="text" class="form-control " id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label-lg mb-3 text-dark fw-bold" aria-label="Large select example">
                            <i class="icon bi bi-lock"></i>Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <select name="role" class="form-select form-select mb-3" aria-label="small select example">
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                        <option value="guard">Guard</option>
                        <option value="homeowner">Homeowner</option>
                        <option value="guest">Guest</option>
                     </select>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                    <div class="text-center mb-3">
                        <a href="#" class="text-light" style="text-decoration: none;">Forgot password?</a>
                    </div>
                    <div class="text-center mb-3">
                        <a class="text-light" href="signup.php" style="text-decoration: none;">Create new account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>


<?php 

session_start();
require 'conn/connection.php'; // Include database connection


$userTables = [
    'admin' => 'tbl_admin',
    'staff' => 'tbl_staff',
    'guard' => 'tbl_guard',
    'homeowner' => 'tbl_client',
    'guest' => 'tbl_client'
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (!isset($userTables[$role])) {
        echo "<p style='color: red;'>Invalid role selected!</p>";
    } else {
        $table = $userTables[$role];
        $stmt = $conn->prepare("SELECT id, password FROM $table WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['role'] = $role;
            } else {
                echo "<p style='color: red;'>Invalid password!</p>";
            }
        } else {
            echo "<p style='color: red;'>User not found!</p>";
        }
        $stmt->close();
    }
}