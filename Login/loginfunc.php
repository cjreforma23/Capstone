<?php
session_start();
require_once('../conn/connection.php');

// Add debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log the POST data (remove in production)
error_log("POST data: " . print_r($_POST, true));

// Basic validation
if ($_SERVER["REQUEST_METHOD"] != "POST" || !isset($_POST['email']) || !isset($_POST['password'])) {
    $_SESSION['error_msg'] = "Invalid request method";
    header("Location: login.php");
    exit();
}

// Check if connection is established
if (!$conn) {
    $_SESSION['error_msg'] = "Database connection failed";
    header("Location: login.php");
    exit();
}

// Get and sanitize inputs
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

// Debug logging
error_log("Login attempt for email: " . $email);

try {
    // Fixed SQL query syntax
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt === false) {
        throw new Exception("Prepare failed: " . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && $user = mysqli_fetch_assoc($result)) {
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect based on role
            switch ($user['role']) {
                case 'Admin':
                    header("Location: ../1Admin/admin_dashboard.php");
                    break;
                case 'Staff':
                    header("Location: ../2Staff/staff_dashboard.php");
                    break;
                case 'Homeowner':
                    header("Location: ../3Homeowner/homeowner.php");
                    break;
                case 'Guard':
                    header("Location: ../4Guard/guard_dashboard.php");
                    break;
                case 'Guest':
                    header("Location: ../5Guest/guest_dashboard.php");
                    break;
                default:
                    $_SESSION['error_msg'] = "Invalid user role";
                    header("Location: login.php");
            }
        } else {
            $_SESSION['error_msg'] = "Incorrect password";
            header("Location: login.php");
        }
    } else {
        $_SESSION['error_msg'] = "Email not found";
        header("Location: login.php");
    }
} catch (Exception $e) {
    error_log("Login error: " . $e->getMessage());
    $_SESSION['error_msg'] = "An error occurred during login";
    header("Location: login.php");
}

exit();
?>

