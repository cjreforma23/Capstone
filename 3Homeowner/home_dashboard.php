
<?php include('../inc/admin_sidebar.php')?>
<?php include('../inc/header.php')?>
<?php
session_start();
if (!isset($_SESSION["username"])) {
    die("Session not set! Please check session settings.");
}
echo "Welcome, " . $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        Homeowner Dashboard
    </h1>
</body>
</html>