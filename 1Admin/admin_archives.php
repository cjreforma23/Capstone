<?php include('../inc/admin_header.php'); ?>

<div class="container-fluid py-4" style="margin-left: 250px; width: calc(100% - 250px);">
    <!-- Header Section -->
    <div class="row align-items-center mb-4">
        <div class="col">
            <h1 class="h3 mb-0 text-danger">Archived Users</h1>
        </div>
        <div class="col-auto">
            <a href="admin_manageuser.php" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to Users
            </a>
        </div>
    </div>

    <!-- Search Box -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <div class="input-group">
                        <input type="search" id="searchArchive" class="form-control" placeholder="Search archives...">
                        <button class="btn btn-danger" type="button">
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
            </div>
        </div>
    </div>

    <!-- Archives Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Role</th>
                            <th>Archived Date</th>
                            <th>Reason</th>
                            <th>Archived By</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $archive_sql = "SELECT a.*, u.first_name as archived_by_name, u.last_name as archived_by_lastname 
                                      FROM archived_users a 
                                      LEFT JOIN users u ON a.archived_by = u.id 
                                      ORDER BY a.archived_at DESC";
                        $archive_result = mysqli_query($conn, $archive_sql);

                        if ($archive_result && mysqli_num_rows($archive_result) > 0) {
                            while ($archive = mysqli_fetch_assoc($archive_result)) {
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($archive['first_name'] . ' ' . $archive['last_name']); ?></td>
                                    <td><?php echo htmlspecialchars($archive['email']); ?></td>
                                    <td><?php echo htmlspecialchars($archive['phone_num']); ?></td>
                                    <td><?php echo htmlspecialchars($archive['role']); ?></td>
                                    <td><?php echo date('M d, Y h:i A', strtotime($archive['archived_at'])); ?></td>
                                    <td><?php echo htmlspecialchars($archive['reason']); ?></td>
                                    <td><?php echo htmlspecialchars($archive['archived_by_name'] . ' ' . $archive['archived_by_lastname']); ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center py-4'>No archived users found</td></tr>";
                        }
                        ?>
                         <td class="text-end">
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $row['id']; ?>">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">
                                        <i class="fa fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const roleFilter = document.getElementById('roleFilter');
    const searchInput = document.getElementById('searchArchive');
    const tableRows = document.querySelectorAll('tbody tr');

    function filterTable() {
        const searchTerm = searchInput.value.toLowerCase();
        const selectedRole = roleFilter.value;

        tableRows.forEach(row => {
            const roleCell = row.querySelector('td:nth-child(4)').textContent;
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
body {
    overflow-x: hidden;
}

@media (max-width: 768px) {
    .container-fluid {
        margin-left: 0;
        width: 100%;
    }
}

.table th {
    white-space: nowrap;
}

.form-select:focus {
    border-color: #dc3545;
    box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.25);
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #bb2d3b;
    border-color: #b02a37;
}

.text-danger {
    color: #dc3545 !important;
}
</style> 