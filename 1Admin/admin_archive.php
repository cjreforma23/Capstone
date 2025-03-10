<?php
session_start();
require_once('../conn/connection.php');

// Check if it's a POST request and user_id is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id'])) {
    $userId = mysqli_real_escape_string($conn, $_POST['user_id']);
    $archivedBy = isset($_SESSION['id']) ? $_SESSION['id'] : 1; // Default to 1 if not set
    $reason = isset($_POST['reason']) ? mysqli_real_escape_string($conn, $_POST['reason']) : NULL;

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

        // Insert into archived_users matching your table structure
        $archiveQuery = "INSERT INTO archived_users (
            user_id, first_name, last_name, email, 
            phone_num, role, address, gender, 
            archived_at, archived_by, reason
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)";

        $archiveStmt = mysqli_prepare($conn, $archiveQuery);
        mysqli_stmt_bind_param($archiveStmt, "isssssssss",
            $user['id'],
            $user['first_name'],
            $user['last_name'],
            $user['email'],
            $user['phone_num'],
            $user['role'],
            $user['address'],
            $user['gender'],
            $archivedBy,
            $reason
        );
        
        if (!mysqli_stmt_execute($archiveStmt)) {
            throw new Exception("Failed to insert into archived_users: " . mysqli_error($conn));
        }

        // Update user status in original users table
        $updateQuery = "UPDATE users SET status = 'archived' WHERE id = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "i", $userId);
        
        if (!mysqli_stmt_execute($updateStmt)) {
            throw new Exception("Failed to update user status: " . mysqli_error($conn));
        }

        // Commit transaction
        mysqli_commit($conn);
        
        $_SESSION['success_msg'] = "User has been successfully archived";
        header("Location: admin_manageuser.php");
        exit();

    } catch (Exception $e) {
        // Rollback transaction on error
        mysqli_rollback($conn);
        error_log("Archive error: " . $e->getMessage()); // Log the error
        $_SESSION['error_msg'] = "Error archiving user: " . $e->getMessage();
        header("Location: admin_manageuser.php");
        exit();
    }
}

// If not POST request or no user_id, redirect back
$_SESSION['error_msg'] = "Invalid request";
header("Location: admin_manageuser.php");
exit();
?>
