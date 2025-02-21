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
                <h1>Village East</h1>
                <p>Log in your Account</p>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="icon bi bi-person"></i>First Name
                        </label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="icon bi bi-lock"></i>Middle Name
                        </label>
                        <input class="form-control" id="middlename" name="middlename" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">
                            <i class="icon bi bi-lock"></i>Last Name
                        </label>
                        <input  class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">
                            <i class="icon bi bi-lock"></i>Birthday
                        </label>
                        <input  class="form-control "type="date" id="birthdate" name="birthdate">
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">
                            <i class="icon bi bi-lock"></i>Phone Number
                        </label>
                        <input class="form-control" id="phonenum" name="phonenum" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="icon bi bi-lock"></i> Address
                        </label>
                        <input class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="icon bi bi-lock"></i> Email
                        </label>
                        <input class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            <i class="icon bi bi-lock"></i> Gender
                        </label>
                        <select name="role" class="form-select form-select mb-3" aria-label="small select example">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                     </select>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">
                            <i class="icon bi bi-lock"></i> Username
                        </label>
                        <input  class="form-control" id="username" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="icon bi bi-lock"></i> Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="Signup" id="btnsignup" name="btnsignup" class="btn btn-primary text-dark w-100">Proceed</button>
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
if(isset($_POST['btnsignup']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $phonenum = $_POST['phonenum'];
    $address = $_POST['address'];
    $email = $_POST['email']; 
    $birthdate = $_POST['birthdate']; 
    $date_create = $_POST['startdate']; // create a html for create date 
    $usertype = $_POST['usertype'];  

    

    $sql = "insert into tbl_client(username, password, firstname, middlename, lastname, phonenum, address, email, birthdate, gender, usertype)
    values('$username','$password','$Lname','$Fname','$Mname','$gender','$Email','$birthdate','$startdate','$usertype')";
    if(mysqli_query($conn, $sql))
      header ("Location:manageuser.php");
    
    else
    {
        echo "Cannot save to database".$sql."<br/>".mysqli_error($conn);
    }
}
mysqli_close($conn);


?>
