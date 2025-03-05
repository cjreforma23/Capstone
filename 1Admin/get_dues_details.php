<?php
require_once('../inc/admin_header.php');

if (!isset($_GET['homeowner_id'])) {
    echo "Homeowner ID is required";
    exit;
}

$homeowner_id = $_GET['homeowner_id'];

try {
    // Get homeowner details and summary
    $summary_query = "SELECT 
        CONCAT(u.first_name, ' ', u.last_name) as homeowner_name,
        SUM(md.total_amount) as total_amount,
        SUM(COALESCE(md.paid_amount, 0)) as total_paid_amount,
        SUM(md.total_amount - COALESCE(md.paid_amount, 0)) as balance_amount
    FROM users u
    LEFT JOIN monthly_dues md ON u.id = md.homeowner_id
    WHERE u.id = ?
    GROUP BY u.id, u.first_name, u.last_name";

    $stmt = mysqli_prepare($conn, $summary_query);
    if (!$stmt) {
        throw new Exception("Prepare failed: " . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "i", $homeowner_id);
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Execute failed: " . mysqli_stmt_error($stmt));
    }
    
    $summary_result = mysqli_stmt_get_result($stmt);
    $summary = mysqli_fetch_assoc($summary_result);

    // Get detailed monthly dues
    $details_query = "SELECT 
        md.id,
        CONCAT(MONTHNAME(STR_TO_DATE(md.month, '%m')), ' ', md.year) as due_period,
        md.total_amount,
        COALESCE(md.paid_amount, 0) as paid_amount,
        md.status,
        md.created_at as payment_date,
        md.payment_proof
    FROM monthly_dues md
    WHERE md.homeowner_id = ?
    ORDER BY md.year DESC, md.month DESC";

    $stmt = mysqli_prepare($conn, $details_query);
    if (!$stmt) {
        throw new Exception("Prepare failed: " . mysqli_error($conn));
    }
    
    mysqli_stmt_bind_param($stmt, "i", $homeowner_id);
    if (!mysqli_stmt_execute($stmt)) {
        throw new Exception("Execute failed: " . mysqli_stmt_error($stmt));
    }
    
    $details_result = mysqli_stmt_get_result($stmt);

    // Debug information
    if (!$summary || !$details_result) {
        throw new Exception("No data found for homeowner ID: " . $homeowner_id);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dues Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container-fluid px-4">
        <div class="row">
            <div class="col-md-2">
                <!-- Sidebar space -->
            </div>

            <div class="col-md-10 p-4">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="mb-0">Monthly Dues Details</h2>
                    <a href="admin_dues.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

                <!-- Summary Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-md-4">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h6>Total Amount</h6>
                                <h3>₱<?php echo number_format($summary['total_amount'], 2); ?></h3>
                                <p class="mb-0">Homeowner: <?php echo htmlspecialchars($summary['homeowner_name']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h6>Total Paid</h6>
                                <h3>₱<?php echo number_format($summary['total_paid_amount'], 2); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-<?php echo $summary['balance_amount'] > 0 ? 'danger' : 'success'; ?> text-white">
                            <div class="card-body">
                                <h6>Balance</h6>
                                <h3>₱<?php echo number_format($summary['balance_amount'], 2); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dues Details Table -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white py-3">
                        <h5 class="card-title mb-0">Payment History</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Period</th>
                                        <th class="text-end">Total Amount</th>
                                        <th class="text-end">Paid Amount</th>
                                        <th class="text-end">Balance</th>
                                        <th class="text-center">Status</th>
                                        <th>Payment Date</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_assoc($details_result)) { ?>
                                        <tr>
                                            <td class="fw-medium"><?php echo htmlspecialchars($row['due_period']); ?></td>
                                            <td class="text-end">₱<?php echo number_format($row['total_amount'], 2); ?></td>
                                            <td class="text-end">₱<?php echo number_format($row['paid_amount'], 2); ?></td>
                                            <td class="text-end">₱<?php echo number_format($row['total_amount'] - $row['paid_amount'], 2); ?></td>
                                            <td class="text-center">
                                                <select class="form-select form-select-sm status-select" 
                                                        data-dues-id="<?php echo $row['id']; ?>"
                                                        style="width: auto; display: inline-block;">
                                                    <option value="unpaid" <?php echo $row['status'] == 'unpaid' ? 'selected' : ''; ?>>Unpaid</option>
                                                    <option value="pending" <?php echo $row['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                    <option value="verified" <?php echo $row['status'] == 'verified' ? 'selected' : ''; ?>>Verified</option>
                                                </select>
                                            </td>
                                            <td><?php echo date('M d, Y', strtotime($row['payment_date'])); ?></td>
                                            <td class="text-center">
                                                <?php if ($row['payment_proof']) { ?>
                                                    <a href="../uploads/<?php echo htmlspecialchars($row['payment_proof']); ?>" 
                                                       target="_blank" 
                                                       class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-file-alt"></i> View Receipt
                                                    </a>
                                                <?php } else { ?>
                                                    <button type="button" 
                                                            class="btn btn-sm btn-outline-success"
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#uploadModal"
                                                            data-dues-id="<?php echo $row['id']; ?>">
                                                        <i class="fas fa-upload"></i> Upload Payment
                                                    </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload Payment Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Payment Proof</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="process_payment.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="dues_id" id="duesIdInput">
                        <div class="mb-3">
                            <label class="form-label">Amount Paid</label>
                            <input type="number" name="amount" class="form-control" required step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Proof</label>
                            <input type="file" name="payment_proof" class="form-control" required accept="image/*,.pdf">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-5px);
    }
    .table > :not(caption) > * > * {
        padding: 1rem 0.75rem;
    }
    .badge {
        padding: 0.5em 1em;
    }
    .form-select-sm {
        min-width: 100px;
        padding: 0.25rem 2rem 0.25rem 0.5rem;
        background-position: right 0.5rem center;
    }

    .status-select {
        border-radius: 20px;
        font-size: 0.875rem;
    }

    .status-select[value="unpaid"] {
        border-color: var(--bs-danger);
        color: var(--bs-danger);
    }

    .status-select[value="pending"] {
        border-color: var(--bs-warning);
        color: var(--bs-warning);
    }

    .status-select[value="verified"] {
        border-color: var(--bs-success);
        color: var(--bs-success);
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const uploadModal = document.getElementById('uploadModal');
        uploadModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const duesId = button.getAttribute('data-dues-id');
            document.getElementById('duesIdInput').value = duesId;
        });

        // Status update functionality
        const statusSelects = document.querySelectorAll('.status-select');
        statusSelects.forEach(select => {
            select.addEventListener('change', function() {
                const duesId = this.dataset.duesId;
                const newStatus = this.value;
                
                if (confirm('Are you sure you want to update this status?')) {
                    updateStatus(duesId, newStatus, this);
                } else {
                    // Reset to previous value if cancelled
                    this.value = this.options[this.selectedIndex].defaultSelected;
                }
            });
        });

        function updateStatus(duesId, status, selectElement) {
            // Show loading state
            selectElement.disabled = true;
            
            fetch('update_dues_status.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `dues_id=${duesId}&status=${status}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    alert('Status updated successfully!');
                    
                    // Update the select element's default value
                    Array.from(selectElement.options).forEach(option => {
                        option.defaultSelected = option.value === status;
                    });

                    // Update card colors if needed
                    updateSummaryCards();
                } else {
                    throw new Error(data.message || 'Failed to update status');
                }
            })
            .catch(error => {
                alert('Error: ' + error.message);
                // Reset to previous value
                selectElement.value = selectElement.options[selectElement.selectedIndex].defaultSelected;
            })
            .finally(() => {
                selectElement.disabled = false;
            });
        }

        function updateSummaryCards() {
            // Reload the page to update summary cards
            location.reload();
        }
    });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?> 