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
        <h1>Manage Users</h1>
        <div class="card">
            <div class="card-header">
            <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="search" placeholder="Search">
                        <button class="btn ml-2" style="background-color: #3B6C2F;" type="button">Search</button>
                    </div>
                    <div class="col-md-6 text-right">                       
                        <button class="btn btn-success fa-plus" type="button"  data-bs-toggle="modal" data-bs-target="#add">Add</button>
                            <!-- Modal -->
                                <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="    ">
                                <div class="modal-dialog">
                                    <div class="modal-content"> 
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add User Profile</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                            <div class="modal-body">

                                            <form action="#">
                                                <div class="form-floating">
                                                    <input id="firstname" type="firstname" class="form-control mb-3" placeholder="First Name" required>
                                                    <label for="firstname">First Name</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input id="middlename" type="middlename" class="form-control mb-3" placeholder="Middle Name" required>
                                                    <label for="middlename">Middle Name</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input id="lastname" type="lastname" class="form-control mb-3" placeholder="Last Name" required>
                                                    <label for="lastname">Last Name</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input id="contact" type="contact" class="form-control mb-3" placeholder="Contact Number" required>
                                                    <label for="contact">Contact Number</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input id="address" type="address" class="form-control mb-3" placeholder="Address" required>
                                                    <label for="address">Address</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input id="username" type="username" class="form-control mb-3" placeholder="Username" required>
                                                    <label for="username">Username</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input id="password" type="contact" class="form-control mb-3" placeholder="Password" required>
                                                    <label for="password" >Password</label>
                                                </div>
                                                <div>
                                                    <select name="role" class="form-select form-select mb-3" aria-label="small select example">
                                                        <option value="admin">Admin</option>
                                                        <option value="staff">Staff</option>
                                                        <option value="guard">Guard</option>
                                                        <option value="homeowner">Homeowner</option>
                                                        <option value="guest">Guest</option>
                                                    </select>
                                                </div>
                                            </form>


                                                
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                                </div>
                        <!-- Archive -->  
                        <button class="btn btn-danger ml-2" type="button" onclick="location.href='admin_archive.php'">
                             <i class="fa-solid fa-box-archive"></i>
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
                                    $sql = "SELECT * FROM tbl_admin";
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
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewAdminModal<?php echo $row['id']; ?>">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editAdminModal<?php echo $row['id']; ?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- View Admin Modal -->
                                    <div class="modal fade" id="viewAdminModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewAdminModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewAdminModalLabel">View Admin Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p><strong>UID:</strong> <?php echo $row['id']; ?></p>
                                                    <p><strong>Last Name:</strong> <?php echo $row['last_name']; ?></p>
                                                    <p><strong>First Name:</strong> <?php echo $row['first_name']; ?></p>
                                                    <p><strong>Middle Name:</strong> <?php echo $row['middle_name']; ?></p>
                                                    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
                                                    <p><strong>Contact Number:</strong> <?php echo $row['phone_num']; ?></p>
                                                    <p><strong>Role:</strong> <?php echo $row['roles']; ?></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Admin Modal -->
                                    <div class="modal fade" id="editAdminModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editAdminModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editAdminModalLabel">Edit Admin Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="edit_admin.php">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" value="<?php echo $row['last_name']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" name="first_name" value="<?php echo $row['first_name']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Middle Name</label>
                                                            <input type="text" class="form-control" name="middle_name" value="<?php echo $row['middle_name']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Contact Number</label>
                                                            <input type="text" class="form-control" name="phone_num" value="<?php echo $row['phone_num']; ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Role</label>
                                                            <input type="text" class="form-control" name="roles" value="<?php echo $row['roles']; ?>">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
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
                                    $sql = "SELECT * FROM `tbl_staff`";
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
                                    $sql = "SELECT * FROM `tbl_client` where roles ='Homeowner'";
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
                                    $sql = "SELECT * FROM `tbl_client` where roles ='Guest'";
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
                                    $sql = "SELECT * FROM `tbl_guard` where roles ='Guard'";
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