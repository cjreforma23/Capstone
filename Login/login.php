<?php include '../conn/connection.php';?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Village East Log In </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <style>
        body {
            background-image: url('/imgs/loginbg.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            position: relative;
        }
        
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6); /* Dark overlay for vagueness */
            backdrop-filter: blur(3px); /* Vague effect */
            z-index: 0;
        }
        
        .container {
            position: relative;
            z-index: 1;
        }
        
        .login-card {
            background-color: rgba(59, 108, 47, 0.8);
            border-radius: 1rem;
            padding: 2rem;
            color: #212529;
            position: relative;
            z-index: 1;
        }
        .login-card h1, .login-card p {
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            position: relative;
        }
        .form-control:focus {
            box-shadow: 0 0 0 0.25rem rgba(141, 194, 111, 0.25);
            border-color: #8DC26F;
        }
        .btn-primary {
            background-color: #8DC26F;
            border: none;
            transition: all 0.3s ease;
        }
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #7AB359;
            box-shadow: 0 0 0 0.25rem rgba(141, 194, 111, 0.25);
        }
        .form-label {
            color: #fff;
            font-weight: 500;
        }
        .icon {
            font-size: 1.2rem;
            margin-right: 10px;
            color: #8DC26F;
        }
        .forgot-password-card {
            background-color: rgba(59, 108, 47, 0.8);
            border-radius: 15px;
            padding: 20px;
            color: white;
        }
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            .col-md-4 {
                width: 100%;
            }
            .modal-dialog {
                max-width: 90%;
            }
        }
        .otp-input {
            width: 50px;
            height: 50px;
            font-size: 24px;
            text-align: center;
            margin: 5px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        .otp-container {
            display: flex;
            justify-content: center;
        }
        .otp-boxes, .change-password-box {
            display: none;
        }
        .modal-content {
            color: #212529;
        }
        .modal-content .form-label {
            color: #212529;
        }
        .login-card .text-white {
            color: #fff !important;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
        }
        .form-control::placeholder {
            color: #6c757d;
            opacity: 1;
        }
        .alert {
            color: #212529;
        }
        .modal-title {
            color: #212529;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="container">
        <div class="row min-vh-100 align-items-center justify-content-center">
            <div class="col-12 col-md-5 col-lg-4">
                <div class="login-card shadow">
                    <h1 class="text-center mb-4">Village East</h1>
                    <p class="text-center mb-4">Log in to your account</p>

                    <?php 
                    if (isset($_SESSION['error_msg'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php 
                            echo htmlspecialchars($_SESSION['error_msg']); 
                            unset($_SESSION['error_msg']); // Clear the message after displaying
                            ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?> 

                    <form action="../Login/loginfunc.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-person me-2"></i>Email
                            </label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock me-2"></i>Password
                            </label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Enter your password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">Login</button>

                        <div class="d-flex flex-column gap-2 text-center">
                            <a href="#forgotPassword" class="text-white text-decoration-none" data-bs-toggle="modal">
                                Forgot Password?
                            </a>
                            <a href="#signup" class="text-white text-decoration-none" data-bs-toggle="modal">
                                Don't have an account? Sign up
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="signupfunc.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                            
                            <div class="col-12">
                                <label class="form-label">Gender</label>
                                <select class="form-select" name="gender" onchange="toggleCustomGender()">
                                    <option value="" selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Custom">Others</option>
                                </select>
                            </div>

                            <div class="col-12" id="customGenderField" style="display:none;">
                                <label class="form-label">Specify Gender</label>
                                <input type="text" class="form-control" name="custom_gender">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phone_num" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success w-100 mt-4">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPassword" tabindex="-1" aria-labelledby="forgotPasswordLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordLabel">Forgot Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="forgot-password-form" action="#" method="POST">
                        <div class="mb-3">
                            <label for="forgot-email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="forgot-email" name="email" placeholder="Enter your email" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Reset Password</button>
                    </form>
                    <div class="mt-3 otp-boxes" id="otp-boxes">
                        <h5 class="text-center">Enter OTP</h5>
                        <form id="otp-form" action="#" method="POST">
                            <div class="otp-container">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                                <input type="text" class="otp-input" maxlength="1">
                            </div>
                            <button type="submit" class="btn btn-success w-100 mt-3">Verify OTP</button>
                        </form>
                    </div>
                    <div class="mt-3 change-password-box" id="change-password-box">
                        <h5 class="text-center">Change Password</h5>
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label for="new-password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="new-password" name="new-password" placeholder="Enter new password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Confirm new password" required>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('forgot-password-form').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('otp-boxes').style.display = 'block';
        });
        
        document.getElementById('otp-form').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('change-password-box').style.display = 'block';
        });

        // Gender JS
        function toggleCustomGender() {
            var genderSelect = document.getElementById("gender");
            var customGenderField = document.getElementById("customGenderField");

            // If "Custom" is selected, show the custom gender text input field
            if (genderSelect.value === "Custom") {
                customGenderField.style.display = "block";
            } else {
                customGenderField.style.display = "none";
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
