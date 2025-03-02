<?php include('../conn/connection.php')?>
<?php include('../inc/link.php')?>

<?php
// Handle the form submission
if (isset($_POST['submit'])) {
    // Get the form data
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_num = mysqli_real_escape_string($conn, $_POST['phone_num']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Default role is "Guest"
    $role = 'Guest';

    // Insert user into the database
    $sql = "INSERT INTO users (first_name, last_name, gender, email, phone_num, address, username, password, role) 
            VALUES ('$first_name', '$last_name', '$gender', '$email', '$phone_num', '$address', '$username', '$hashedPassword', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Your account has been signed up successfully. Please log in to your account.');
                window.location.href = 'login.php';  // Redirect to login page
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>



