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
            position: relative;
        }
        
        body::before {
            content: "";
            position: absolute;
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
                        <label for="username" class="form-label-lg mb-3 text-dark fw-bold">
                            <i class="icon bi bi-person"></i>Username
                        </label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label-lg mb-3 text-dark fw-bold">
                            <i class="icon bi bi-lock"></i>Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                    </div>
        
                    <button type="submit" class="btn btn-primary w-100 text-dark"><b>Login</b></button>
                    <div class="text-center mt-2">
                         <a href="#forgotPassword" class="text-light" data-bs-toggle="modal">Forgot Password?</a>
                    </div>
                    <div class="text-center mb-3">
                    <a href="#signup" class="text-light" data-bs-toggle="modal">Don't have an account? Sign up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
                  <!-- Signup Modal -->
    <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signupLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="signupLabel">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="signup-name" class="form-label text-dark">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-name" class="form-label text-dark">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-password" class="form-label text-dark">Gender</label>
                            <input type="password" class="form-control" id="Gender" name="Gender" placeholder="Gender" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-email" class="form-label text-dark">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-password" class="form-label text-dark">Phone Number</label>
                            <input type="password" class="form-control" id="phone_num" name="phone_num" placeholder="Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-password" class="form-label text-dark">Username</label>
                            <input type="password" class="form-control" id="username" name="username" placeholder="Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="signup-password" class="form-label text-dark">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                        
                        <button type="submit" class="btn btn-success w-100">Sign Up</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('forgot-password-form').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('otp-boxes').style.display = 'block';
        });
        
        document.getElementById('otp-form').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('change-password-box').style.display = 'block';
        });
    </script>
</body>
</html>
