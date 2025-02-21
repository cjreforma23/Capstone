<?php include('../inc/sidebar.php')?>
<?php include('../inc/header.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        .table-responsive {
            overflow-x: auto; /* Enable horizontal scroll if needed */
        }
        .table th,
        .table td {
            vertical-align: middle; /* Align table cell content vertically */
            text-align: left; /* Align text to the left */
        }
        .btn-group .btn {
            margin-right: 5px; /* Add spacing between buttons */
        }
        .status-select {
            width: 150px; /* Adjust width as needed */
        }

        /* Eye icon styles */
        .eye-icon {
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header bg-success">
                <div class="row">
                    <div class="col-md-6">
                        <input class="form" type="search" placeholder="Search">
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-primary ml-2" type="button">Search</button>
                        <select class="form-control status-select" id="statusFilter">
                            <option value="complete" class="text-success text-center">Complete</option>
                            <option value="pending" class="text-warning text-center">Pending</option>
                            <option value="Incomplete" class="text-danger text-center">Incomplete</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Issue</th>
                                <th>Date Report</th>
                                <th>Client</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Scher, Laura</td>
                                <td>Noise Disturbance</td>
                                <td>12/15/2024</td>
                                <td>Homeowner</td>
                                <td>obugbug@gmail.com</td>
                                <td>000000000</td>
                                <td class=" text-nowrap text-success text-center ">Completed</td>
                                <td class="action-buttons">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </td> 
                            </tr>
                            <tr>
                                <td>Ares, Ronald</td>
                                <td>Trash Overflow</td>
                                <td>12/15/2024</td>
                                <td>Homeowner</td>
                                <td>abugbug.egmal.com</td>
                                <td>000000000</td>
                                <td class=" text-nowrap text-warning text-center ">Pending</td>
                                <td class="action-buttons">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </td> 
                            </tr>
                            <tr>
                                <td>Als, Loura</td>
                                <td>Overgrown Grass</td>
                                <td>12/15/2024</td>
                                <td>Homeowner</td>
                                <td>@bugtsigs@gmat.com</td>
                                <td>000000000</td>
                                <td class=" text-nowrap text-danger text-center ">Incomplete</td>
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
        </div>
    </div>
</head>
<body>
    
</body>
</html>