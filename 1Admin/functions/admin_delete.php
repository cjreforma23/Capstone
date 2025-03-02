<?php
session_start();
require_once('../conn/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);
    $archivedBy = isset($_SESSION['id']) ? $_SESSION['id'] : 1;

    try {
        // Start transaction
        mysqli_begin_transaction($conn);

        // First, get the user data
        $query = "SELECT * FROM users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if (!$user) {
            throw new Exception("User not found");
        }

        // Insert into archived_users
        $archiveQuery = "INSERT INTO archived_users (
            user_id, first_name, last_name, email, 
            phone_num, role, address, gender, 
            archived_at, archived_by
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";

        $archiveStmt = mysqli_prepare($conn, $archiveQuery);
        mysqli_stmt_bind_param($archiveStmt, "isssssssi",
            $user['id'],
            $user['first_name'],
            $user['last_name'],
            $user['email'],
            $user['phone_num'],
            $user['role'],
            $user['address'],
            $user['gender'],
            $archivedBy
        );
        
        if (!mysqli_stmt_execute($archiveStmt)) {
            throw new Exception("Failed to archive user");
        }

        // Delete from users table
        $deleteQuery = "DELETE FROM users WHERE id = ?";
        $deleteStmt = mysqli_prepare($conn, $deleteQuery);
        mysqli_stmt_bind_param($deleteStmt, "i", $userId);
        
        if (!mysqli_stmt_execute($deleteStmt)) {
            throw new Exception("Failed to delete user");
        }

        // Commit transaction
        mysqli_commit($conn);
        
        $_SESSION['success_msg'] = "User has been successfully deleted and archived";
        header("Location: admin_manageuser.php");
        exit();

    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);
        error_log("Delete error: " . $e->getMessage());
        $_SESSION['error_msg'] = "Error deleting user: " . $e->getMessage();
        header("Location: admin_manageuser.php");
        exit();
    }
} else {
    $_SESSION['error_msg'] = "Invalid request";
    header("Location: admin_manageuser.php");
    exit();
}
?> 