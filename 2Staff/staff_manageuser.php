<?php include('../inc/sidebar.php')?>
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
        .table th,
        .table td {
            vertical-align: middle;
            text-align: left;
        }
        .btn-group .btn {
            margin-right: 5px;
        }
        .status-select {
            width: 150px;
        }

        /* Action button styles */
        .action-buttons {
            display: flex;
            gap: 5px; /* Space between buttons */
        }

        .action-buttons button {
            padding: 5px 10px; /* Adjust padding as needed */
            font-size: 14px; /* Adjust font size as needed */
        }
        /* Style for address with line breaks */
        .address-cell {
            white-space: pre-wrap; /* Allow line breaks and preserve whitespace */
        }
    </style>
</head>
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
                        <button class="btn btn-success" type="button">
                            <i class="fas fa-plus"></i>
                        </button>
                        <button class="btn btn-danger ml-2" type="button">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>UID</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Address</th>
                                <th>Contact No.</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th> </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>8888</td>
                                <td>Julius Reforma</td>
                                <td>Admin</td>
                                <td class="address-cell">Blk 22 Lot 6 Kingfisher Angono, Rizal</td>
                                <td>12345678910</td>
                                <td>Doedonut@gmail.com</td>
                                <td>Active</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>