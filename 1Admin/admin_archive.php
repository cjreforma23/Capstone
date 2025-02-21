<?php include('../inc/admin_sidebar.php')?>
<?php include('../inc/header.php')?>

<title>User Table</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .container {
        margin-top: 20px;
    }
    .table-responsive {
        overflow-x: auto;
    }
    .table th, .table td {
        vertical-align: middle;
        text-align: left;
    }
    .btn-group .btn {
        margin-right: 5px;
    }
    .action-buttons {
        display: flex;
        gap: 5px;
    }
    .action-buttons button {
        padding: 5px 10px;
        font-size: 14px;
    }
</style>

<body>
    <div class="container">
        <h1>User Archives</h1>
        <div class="card">
            <div class="card-header">
            <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="search" placeholder="Search">
                        <button class="btn ml-2" style="background-color: #3B6C2F;" type="button">Search</button>
                    </div>
                    <div class="col-md-6 text-right">                       
                    
                        <!-- Back Arrow to Manage Users -->  
                        <button class="btn btn-danger ml-2" type="button" onclick="location.href='admin_manageuser.php'">
                             <i class="fa-solid fa-arrow-left"></i>
                        </button>
                    </div>
                </div>
                <ul class="nav nav-tabs" id="userTabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#admins" role="tab">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#staff" role="tab">Staff</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#homeowners" role="tab">Homeowners</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#guest" role="tab">Guest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#guard" role="tab">Guard</a>
                    </li>
                </ul>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    
                    <!-- Admins Tab -->
                    <div class="tab-pane fade show active" id="admins" role="tabpanel">
                        <h3>Admins List</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Actions</th>
                                        
                                    </tr>
                                </thead>            
                                <tbody>
                                    <?php                                       
                                    // Query the database
                                    $sql = "SELECT * FROM `user_archive` where roles='admin'";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["last_name"]; ?></td>
                                        <td><?php echo $row["first_name"]; ?></td>
                                        <td><?php echo $row["middle_name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone_num"]; ?></td>
                                        <td><?php echo $row["roles"]; ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                <a  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    } else {
                                        echo "<tr><td colspan='12' class='text-center'>No data found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Staff Tab -->
                    <div class="tab-pane fade" id="staff" role="tabpanel">
                        <h3>Staff List</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Actions</th>
                                        
                                    </tr>
                                </thead>            
                                <tbody>
                                    <?php                                       
                                    // Query the database
                                    $sql = "SELECT * FROM `user_archive`";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["last_name"]; ?></td>
                                        <td><?php echo $row["first_name"]; ?></td>
                                        <td><?php echo $row["middle_name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone_num"]; ?></td>
                                        <td><?php echo $row["roles"]; ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                <a  class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    } else {
                                        echo "<tr><td colspan='12' class='text-center'>No data found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Homeowners Tab -->
                    <div class="tab-pane fade" id="homeowners" role="tabpanel">
                        <h3>Homeowners List</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>            
                                <tbody>
                                    <?php                                       
                                    // Query the database
                                    $sql = "SELECT * FROM `user_archive` where roles ='Homeowner'";
                                    $result = mysqli_query($conn, $sql);

                                    if (!$result) {
                                        echo "<tr><td colspan='8' class='text-center text-danger'>Query Error: " . mysqli_error($conn) . "</td></tr>";
                                    } else {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["last_name"]; ?></td>
                                        <td><?php echo $row["first_name"]; ?></td>
                                        <td><?php echo $row["middle_name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone_num"]; ?></td>
                                        <td><?php echo $row["roles"]; ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                            }
                                        } else {
                                            echo "<tr><td colspan='8' class='text-center'>No homeowners found</td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Guest Tab -->
                    <div class="tab-pane fade" id="guest" role="tabpanel">
                        <h3>Guest List</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>            
                                <tbody>
                                    <?php                                       
                                    // Query the database
                                    $sql = "SELECT * FROM `user_archive` where roles ='Guest'";
                                    $result = mysqli_query($conn, $sql);

                                    if (!$result) {
                                        echo "<tr><td colspan='8' class='text-center text-danger'>Query Error: " . mysqli_error($conn) . "</td></tr>";
                                    } else {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["last_name"]; ?></td>
                                        <td><?php echo $row["first_name"]; ?></td>
                                        <td><?php echo $row["middle_name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone_num"]; ?></td>
                                        <td><?php echo $row["roles"]; ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                            }
                                        } else {
                                            echo "<tr><td colspan='8' class='text-center'>No Guest found</td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Guard Tab -->
                    <div class="tab-pane fade" id="guard" role="tabpanel">
                        <h3>Guard List</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">UID</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Middle Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Contact Number</th>
                                        <th scope="col">Role</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>            
                                <tbody>
                                    <?php                                       
                                    // Guard
                                    $sql = "SELECT * FROM `user_archive` where roles ='Guard'";
                                    $result = mysqli_query($conn, $sql);

                                    if (!$result) {
                                        echo "<tr><td colspan='8' class='text-center text-danger'>Query Error: " . mysqli_error($conn) . "</td></tr>";
                                    } else {
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["last_name"]; ?></td>
                                        <td><?php echo $row["first_name"]; ?></td>
                                        <td><?php echo $row["middle_name"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["phone_num"]; ?></td>
                                        <td><?php echo $row["roles"]; ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                                                <a class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php 
                                            }
                                        } else {
                                            echo "<tr><td colspan='8' class='text-center'>No Data found</td></tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div> <!-- End of tab-content -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>