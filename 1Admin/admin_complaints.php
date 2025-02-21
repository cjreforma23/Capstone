<?php include('../inc/admin_sidebar.php')?>
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
    <h1>Complaints</h1>
        <div class="card">
            <div class="card-header ">
            <div class="row">
                    <div class="col-md-6">
                        <input class="form-control" type="search" placeholder="Search">
                        <button class="btn ml-2" style="background-color: #3B6C2F;" type="button">Search</button>
                        <button class="btn btn-danger ml-2" type="button">
                            <i class="fa-solid fa-box-archive"></i>
                        </button>   
                        
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