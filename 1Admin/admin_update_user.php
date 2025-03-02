<?php
// Add this at the beginning of your update script
if(isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $filename = $_FILES['img']['name'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    
    if(in_array($ext, $allowed)) {
        $new_filename = uniqid() . '.' . $ext;
        $upload_path = '../uploads/profile_pictures/' . $new_filename;
        
        // Delete old profile picture if exists
        $old_pic_query = "SELECT img FROM users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $old_pic_query);
        mysqli_stmt_bind_param($stmt, "i", $_POST['user_id']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $old_pic = mysqli_fetch_assoc($result);
        
        if($old_pic && !empty($old_pic['img'])) {
            $old_pic_path = '../uploads/profile_pictures/' . basename($old_pic['img']);
            if(file_exists($old_pic_path)) {
                unlink($old_pic_path);
            }
        }
        
        if(move_uploaded_file($_FILES['img']['tmp_name'], $upload_path)) {
            // Store just the filename in the database
            $update_pic_sql = "UPDATE users SET img = ? WHERE id = ?";
            $stmt = mysqli_prepare($conn, $update_pic_sql);
            mysqli_stmt_bind_param($stmt, "si", $new_filename, $_POST['user_id']);
            mysqli_stmt_execute($stmt);
        }
    }
}

// Update your SQL query to include profile_picture if it exists
$sql = "UPDATE users SET 
        first_name = ?, 
        last_name = ?,
        email = ?,
        phone_num = ?,
        role = ?,
        address = ?,
        gender = ?,
        status = ?" .
        (isset($profile_picture) ? ", profile_picture = '" . $profile_picture . "'" : "") .
        " WHERE id = ?"; 