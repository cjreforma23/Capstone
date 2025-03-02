<?php include('../inc/admin_header.php')?>

<div class="container-fluid py-4" style="margin-left: 250px; width: calc(100% - 250px);">
    <!-- Header Section -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-success">Manage Users</h1>
        </div>
    </div>

    <!-- Search and Action Buttons -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Search users...">
                        <button class="btn btn-success" type="button">
                            <i class="fas fa-search"></i> Search
                        </button>
                    </div>
                </div>
                <div class="col-md-4">
                    <select class="form-select" id="roleFilter">
                        <option value="">All Roles</option>
                        <option value="Admin">Admin</option>
                        <option value="Staff">Staff</option>
                        <option value="Homeowner">Homeowner</option>
                        <option value="Guest">Guest</option>
                        <option value="Guard">Guard</option>
                    </select>
                </div>
                <div class="col-md-4 text-md-end">
                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fas fa-plus"></i> Add
                    </button>
                    <a href="admin_archives.php" class="btn btn-danger ms-2">
                        <i class="fas fa-archive"></i> Archives
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>UID</th>
                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Query the database for all users
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($conn, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["last_name"]; ?></td>
                            <td><?php echo $row["first_name"]; ?></td>
                            <td><?php echo $row["email"]; ?></td>
                            <td><?php echo $row["phone_num"]; ?></td>
                            <td><?php echo $row["role"]; ?></td>
                            <td>
                                <span class="badge <?php echo strtolower($row["status"]) == 'active' ? 'badge-active' : 'bg-warning'; ?>">
                                    <?php echo $row["status"]; ?>
                                </span>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            echo '<tr><td colspan="8" class="text-center py-4">No records found</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        overflow-x: hidden;
    }
    
   
    @media (max-width: 768px) {
        .container-fluid {
            margin-left: 0;
            width: 100%;
        }
    }

    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
        background-color: #fff;
        padding: 0 1rem;
    }

    .nav-tabs .nav-link {
        color: #6c757d;
        border: none;
        padding: 1rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link:hover {
        color: #198754;
        background: rgba(25, 135, 84, 0.1);
        border: none;
    }

    .nav-tabs .nav-link.active {
        color: #198754;
        background: none;
        border-bottom: 2px solid #198754;
    }

    .nav-tabs .nav-link i {
        margin-right: 5px;
    }

    .tab-content {
        background: #fff;
        padding: 1rem;
    }

    .tab-pane {
        display: none;
    }

    .tab-pane.active {
        display: block;
    }

    .table th {
        white-space: nowrap;
    }

    .badge-active {
        background-color: #198754 !important;
        color: white !important;
    }

    .badge {
        padding: 6px 12px;
        font-weight: 500;
        font-size: 0.85em;
    }

    /* Add styles for the filter select */
    .form-select {
        padding: 0.375rem 2.25rem 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }

    .form-select:focus {
        border-color: #198754;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
    }
</style>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Add this script to check if modals are working -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if Bootstrap is loaded
    if (typeof bootstrap !== 'undefined') {
        console.log('Bootstrap is loaded');
        
        // Initialize all modals
        var modals = document.querySelectorAll('.modal');
        modals.forEach(function(modal) {
            new bootstrap.Modal(modal);
        });
    } else {
        console.error('Bootstrap is not loaded');
    }
});
</script>

</body>
</html>
    <script>
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

<!-- View Modal -->
<?php 
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="modal fade" id="viewModal<?php echo $row['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">User Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <!-- Profile Picture Section -->
                <div class="text-center mb-4">
                    <div class="profile-picture-container mb-3">
                        <?php if (!empty($row['img'])): ?>
                            <img src="../uploads/profile_pictures/<?php echo basename($row['img']); ?>" 
                                 class="profile-picture" alt="Profile Picture">
                        <?php else: ?>
                            <div class="profile-picture-placeholder">
                                <i class="fas fa-user fa-3x text-success"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Rest of the user details -->
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <div class="form-control bg-light"><?php echo htmlspecialchars($row['first_name']); ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <div class="form-control bg-light"><?php echo htmlspecialchars($row['last_name']); ?></div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <div class="form-control bg-light"><?php echo htmlspecialchars($row['email']); ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Contact Number</label>
                        <div class="form-control bg-light"><?php echo htmlspecialchars($row['phone_num']); ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Role</label>
                        <div class="form-control bg-light"><?php echo htmlspecialchars($row['role']); ?></div>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Address</label>
                        <div class="form-control bg-light"><?php echo htmlspecialchars($row['address']); ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender</label>
                        <div class="form-control bg-light"><?php echo htmlspecialchars($row['gender']); ?></div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Date Created</label>
                        <div class="form-control bg-light"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php 
    }
}
?>

<style>
/* View Modal styles */
.modal-content {
    border: none;
    border-radius: 8px;
}

.modal-header.bg-success {
    background-color: #198754 !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.modal-title {
    font-size: 1.1rem;
    font-weight: 500;
}

.modal-body {
    background-color: white;
}

.form-label {
    font-weight: 500;
    margin-bottom: 0.3rem;
    color: #198754;
}

.form-control.bg-light {
    background-color: #f8f9fa !important;
    border: 1px solid #dee2e6;
    padding: 0.5rem 0.75rem;
    font-size: 0.9rem;
}

.modal-footer {
    border-top: 1px solid #dee2e6;
    padding: 1rem 1.5rem;
}

.btn-success {
    background-color: #198754;
    border-color: #198754;
}

.btn-success:hover {
    background-color: #157347;
    border-color: #146c43;
}

/* Add subtle hover effect to the detail fields */
.form-control.bg-light:hover {
    background-color: #e9ecef !important;
    transition: background-color 0.2s ease;
}

/* Profile Picture Styles */
.profile-picture-container {
    position: relative;
    width: 150px;
    height: 150px;
    margin: 0 auto;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #198754;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.profile-picture {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.profile-picture-placeholder {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #e9ecef;
}

.profile-picture-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(25, 135, 84, 0.8);
    padding: 8px;
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.profile-picture-overlay label {
    color: white;
    cursor: pointer;
}

.profile-picture-container:hover .profile-picture-overlay {
    opacity: 1;
}
</style>

<!-- Edit Modal -->
<?php 
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="admin_update_user.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body p-4">
                    <!-- Profile Picture Upload Section -->
                    <div class="text-center mb-4">
                        <div class="profile-picture-container mb-3">
                            <?php if (!empty($row['img'])): ?>
                                <img src="../uploads/profile_pictures/<?php echo basename($row['img']); ?>" 
                                     class="profile-picture" alt="Current Profile Picture">
                            <?php else: ?>
                                <div class="profile-picture-placeholder">
                                    <i class="fas fa-user fa-3x text-success"></i>
                                </div>
                            <?php endif; ?>
                            <div class="profile-picture-overlay">
                                <label for="profile_picture<?php echo $row['id']; ?>" class="mb-0">
                                    <i class="fas fa-camera"></i>
                                </label>
                            </div>
                        </div>
                        <input type="file" class="d-none" id="profile_picture<?php echo $row['id']; ?>" 
                               name="img" accept="image/*">
                        <div class="small text-muted mb-3">Click to change profile picture</div>
                    </div>

                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" 
                                   value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" 
                                   value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" 
                                   value="<?php echo htmlspecialchars($row['email']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" class="form-control" name="phone_num" 
                                   value="<?php echo htmlspecialchars($row['phone_num']); ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <select class="form-select" name="role" required>
                                <option value="Admin" <?php echo ($row['role'] == 'Admin') ? 'selected' : ''; ?>>Admin</option>
                                <option value="Staff" <?php echo ($row['role'] == 'Staff') ? 'selected' : ''; ?>>Staff</option>
                                <option value="Homeowner" <?php echo ($row['role'] == 'Homeowner') ? 'selected' : ''; ?>>Homeowner</option>
                                <option value="Guard" <?php echo ($row['role'] == 'Guard') ? 'selected' : ''; ?>>Guard</option>
                                <option value="Guest" <?php echo ($row['role'] == 'Guest') ? 'selected' : ''; ?>>Guest</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address" rows="2" required><?php echo htmlspecialchars($row['address']); ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gender</label>
                            <select class="form-select" name="gender" required>
                                <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                                <option value="Other" <?php echo ($row['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status" required>
                                <option value="active" <?php echo (strtolower($row['status']) == 'active') ? 'selected' : ''; ?>>Active</option>
                                <option value="inactive" <?php echo (strtolower($row['status']) == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                <option value="pending" <?php echo (strtolower($row['status']) == 'pending') ? 'selected' : ''; ?>>Pending</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" 
                                   placeholder="Leave blank to keep current password">
                            <div class="form-text">Only fill this if you want to change the password</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 
    }
}
?>

<style>
/* Edit Modal Styles */
.modal-content {
    border: none;
    border-radius: 8px;
}

.bg-success {
    background-color: #198754 !important;
}

.modal-header {
    border-bottom: 1px solid #dee2e6;
    padding: 1rem 1.5rem;
}

.form-label {
    font-weight: 500;
    margin-bottom: 0.3rem;
}

.form-control:focus, 
.form-select:focus {
    border-color: #198754;
    box-shadow: 0 0 0 0.25rem rgba(25, 135, 84, 0.25);
}

.btn-success {
    background-color: #198754;
    border-color: #198754;
}

.btn-success:hover {
    background-color: #157347;
    border-color: #146c43;
}

.btn-light {
    background-color: #f8f9fa;
    border-color: #dee2e6;
}

.btn-light:hover {
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.form-text {
    font-size: 0.875rem;
    color: #6c757d;
}

.modal-footer {
    border-top: 1px solid #dee2e6;
    padding: 1rem 1.5rem;
}
</style>

<!-- Delete Modals - Place OUTSIDE the table but INSIDE the main container -->
<?php 
// Reset the result pointer
mysqli_data_seek($result, 0);
while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center p-4">
                    <i class="fa fa-trash-alt fa-3x text-danger mb-3"></i>
                    <h5 class="mb-3">Are you sure you want to delete this account?</h5>
                    <p class="text-muted mb-4">
                        User: <?php echo htmlspecialchars($row['first_name'] . ' ' . $row['last_name']); ?><br>
                        Role: <?php echo htmlspecialchars($row['role']); ?><br>
                        This account will be moved to archives and removed from the active users.
                    </p>
                    
                    <form action="admin_delete.php" method="POST">
                        <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                        <div class="mb-3">
                            <label for="reason<?php echo $row['id']; ?>" class="form-label">Reason for Deletion</label>
                            <textarea class="form-control" id="reason<?php echo $row['id']; ?>" 
                                    name="reason" rows="3" required 
                                    placeholder="Please provide a reason for deleting this user..."></textarea>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">No, Cancel</button>
                            <button type="submit" class="btn btn-danger px-4">Yes, Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php 
}
?>

<!-- Add this JavaScript for filtering -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const roleFilter = document.getElementById('roleFilter');
    const searchInput = document.querySelector('input[type="search"]');
    const tableRows = document.querySelectorAll('tbody tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedRole = roleFilter.value;

        tableRows.forEach(row => {
            const roleCell = row.querySelector('td:nth-child(6)').textContent;
            const rowText = row.textContent.toLowerCase();
            const matchesSearch = rowText.includes(searchTerm);
            const matchesRole = !selectedRole || roleCell === selectedRole;

            row.style.display = matchesSearch && matchesRole ? '' : 'none';
        });
    }

    roleFilter.addEventListener('change', filterTable);
    searchInput.addEventListener('input', filterTable);
});
</script>

<style>
.avatar-circle {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    background-color: rgba(25, 135, 84, 0.1); /* Green background */
}

.detail-item {
    padding: 12px;
    border-radius: 8px;
    background-color: #f8f9fa;
    transition: all 0.3s ease;
}

.detail-item:hover {
    background-color: rgba(25, 135, 84, 0.05);
}

.detail-item label {
    font-size: 0.85rem;
    margin-bottom: 2px;
    color: #6c757d;
}

.detail-item p {
    font-weight: 500;
    color: #212529;
}

.modal-content {
    border: none;
    border-radius: 15px;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

/* Success theme colors */
.bg-success {
    background-color: #198754 !important;
}

.text-success {
    color: #198754 !important;
}

.badge.bg-success {
    background-color: #198754 !important;
    color: white;
}

/* Button styles */
.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5c636a;
    border-color: #565e64;
}
</style>

<script>
// Add this JavaScript for image preview
document.addEventListener('DOMContentLoaded', function() {
    const fileInputs = document.querySelectorAll('input[type="file"]');
    
    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                const pictureContainer = this.closest('.profile-picture-container');
                const img = pictureContainer.querySelector('img') || document.createElement('img');
                
                reader.onload = function(e) {
                    img.src = e.target.result;
                    img.classList.add('profile-picture');
                    
                    if (!pictureContainer.contains(img)) {
                        pictureContainer.innerHTML = '';
                        pictureContainer.appendChild(img);
                    }
                }
                
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
});
</script>
