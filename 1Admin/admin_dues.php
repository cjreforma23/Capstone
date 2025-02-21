<?php include('../inc/admin_sidebar.php')?>
<?php include('../inc/header.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Dues Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-4">Monthly Dues Management</h2>
        
        <div class="mb-3">
            <input type="text" id="search" class="form-control" placeholder="Search members...">
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="duesTable">
                <tr>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>$50</td>
                    <td><span class="badge bg-warning">Unpaid</span></td>
                    <td>
                        <button class="btn btn-success btn-sm" onclick="markPaid(this)">Mark as Paid</button>
                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#addPictureModal">
                            <i class="fas fa-camera"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="addPictureModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Picture</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addPictureForm">
                        <div class="mb-3">
                            <label class="form-label">Upload Picture</label>
                            <input type="file" class="form-control" id="memberPicture" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function markPaid(button) {
            let row = button.closest('tr');
            let statusCell = row.cells[3];
            statusCell.innerHTML = '<span class="badge bg-success">Paid</span>';
        }
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
