<?php
require_once('../inc/admin_header.php');

// Check if it's a POST request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

// Check if required parameters are present
if (!isset($_POST['dues_id']) || !isset($_POST['status'])) {
    echo json_encode(['success' => false, 'message' => 'Missing required parameters']);
    exit;
}

$dues_id = $_POST['dues_id'];
$status = $_POST['status'];

// Validate status
$allowed_statuses = ['unpaid', 'pending', 'verified'];
if (!in_array($status, $allowed_statuses)) {
    echo json_encode(['success' => false, 'message' => 'Invalid status']);
    exit;
}

try {
    // Update the status in the database
    $query = "UPDATE monthly_dues SET status = ?, updated_at = NOW() WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "si", $status, $dues_id);
    
    if (mysqli_stmt_execute($stmt)) {
        // If status is verified, update the paid_amount to match total_amount
        if ($status === 'verified') {
            $update_payment = "UPDATE monthly_dues SET paid_amount = total_amount WHERE id = ?";
            $stmt = mysqli_prepare($conn, $update_payment);
            mysqli_stmt_bind_param($stmt, "i", $dues_id);
            mysqli_stmt_execute($stmt);
        }
        
        echo json_encode(['success' => true]);
    } else {
        throw new Exception('Failed to update status');
    }
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
?>