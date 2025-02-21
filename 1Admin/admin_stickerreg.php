
<?php include('../inc/admin_sidebar.php')?>
<?php include('../inc/header.php')?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticker Registration </title>
</head>
<style>
        .form-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 10 10 20px rgba(0, 0, 0, 0.1);
        }
        .form-container label {
            font-weight: bold;
            margin-right: 5px;
        }
        .form-container input, .form-container select {
            width: auto;
            min-width: 120px;
        }
        .buttons {
            margin-top: 15px;
        }

        .table th {
            background-color: #3B6C2F;
            color: white;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .action-buttons button {
            margin-right: 5px;
        }

    </style>
<body class="bg-light">

<div class="container mt-4 p-4 bg-white shadow rounded">
    <h2 class="mb-4">Vehicle Sticker Registration</h2>

    <form>
        <div class="row g-3">
            <div class="col-md-2">
                <label class="form-label"><strong>User ID</strong></label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="col-md-5">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="col-md-5">
                <label class="form-label">Vehicle Type</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="col-md-3">
                <label class="form-label">Model</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="col-md-3">
                <label class="form-label">Color</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="col-md-3">
                <label class="form-label">Plate Number</label>
                <input type="text" class="form-control" value="">
            </div>

            <div class="col-md-4">
                <label class="form-label">Old Sticker Number</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label">For Renewal</label>
                </div>
            </div>
        </div>

        <hr>

        <div class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Total Amount</label>
                <input type="text" class="form-control" value="P400" readonly>
            </div>
            <div class="col-md-3">
                <label class="form-label">Reference Number</label>
                <input type="text" class="form-control" value="">
            </div>
            <div class="col-md-3">
                <label class="form-label">Mode of Payment</label>
                <select class="form-select">
                    <option selected>GCash</option>
                    <option>Cash</option>
                    
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Proof of Payment</label>
                <input type="file" class="form-control">
            </div>
        </div>

        <div class="mt-4">
            <button type="button" class="btn btn-success">Proceed</button>
            
        </div>
    </form>
</div>


    
<body class="p-4">

        <div class="container mt-4 p-4 bg-white shadow rounded">
            <div class="table-container">
                <h3 class="mb-4">Vehicle Sticker Status</h3>
                <table class="table table-hover table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Vehicle Type</th>
                            <th>Model</th>
                            <th>Color</th>
                            <th>Plate Number</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Andres Pedro</td>
                            <td>Sedan</td>
                            <td>2020</td>
                            <td>White</td>
                            <td>XXXXX</td>
                            <td>P 500</td>
                            <td class=" text-nowrap text-success text-center ">Released</td>
                            <td class="action-buttons">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Juan Dela Cruz</td>
                            <td>SUV</td>
                            <td>2021</td>
                            <td>Black</td>
                            <td>YYYYY</td>
                            <td>P 600</td>
                            <td class=" text-nowrap text-warning text-center ">Pending</td>
                            <td class="action-buttons">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Maria Clara</td>
                            <td>Truck</td>
                            <td>2019</td>
                            <td>Red</td>
                            <td>ZZZZZ</td>
                            <td>P 800</td>
                            <td class=" text-nowrap text-danger text center ">Unpaid</td>
                            <td class="action-buttons">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>