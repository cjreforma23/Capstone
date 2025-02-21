<?php include('../inc/sidebar.php')?>
<?php include('../inc/header.php')?> 

    <style>
        
        
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table th,
        .table td {
            text-align: left;
            vertical-align: middle;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
        }
        .form-control {
            border-radius: 0;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .monthly-dues {
            margin-top: 30px;
        }
        .monthly-dues h3 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
    </style>
</head>

<body  class="bg-light">
    <div class="container mt-4 p-4 bg-white shadow rounded">
        <div class="header">
            <h2>Settings</h2>
        </div>

        <div class="rates-amenities">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h3>Rates of Amenities</h3>
                <button class="btn btn-success">Add</button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Amenities</th>
                            <th>Rate Type</th>
                            <th>Rate for Homeowner</th>
                            <th>Rate for Guest</th>
                            <th>Duration From</th>
                            <th>Duration To</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Function Hall</td>
                            <td>Fix</td>
                            <td>15,000</td>
                            <td>Homeowner</td>
                            <td>8:00 AM</td>
                            <td>5:00 PM</td>
                        </tr>
                        <tr>
                            <td>Swimming Pool</td>
                            <td>Per Head</td>
                            <td>300</td>
                            <td>Homeowner</td>
                            <td>8:00 AM</td>
                            <td>5:00 PM</td>
                        </tr>
                        <tr>
                            <td>Basketball Court</td>
                            <td>Per hour</td>
                            <td>100</td>
                            <td>Homeowner</td>
                            <td>8:00 AM</td>
                            <td>5:00 PM</td>
                        </tr>
                        <tr>
                            <td>Tennis Court</td>
                            <td>Per hour</td>
                            <td>100</td>
                            <td>Homeowner</td>
                            <td>8:00 AM</td>
                            <td>5:00 PM</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="homeowners-info">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="discount">Homeowners Discount %</label>
                        <input type="text" class="form-control" id="discount" value="10%">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="downpayment">Down payment Percentage</label>
                        <input type="text" class="form-control" id="downpayment" value="30%">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="time-limit">Time limit for invalid reservation</label>
                        <input type="text" class="form-control" id="time-limit" value="12 hrs">
                    </div>
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </div>

        <div class="monthly-dues">
            <h3>Monthly Dues</h3>
            <div class="form-group">
                <label for="amount">Amount Per Month</label>
                <input type="text" class="form-control" id="amount" value="400">
            </div>
            <button class="btn btn-success">Generate new Payment</button>
            <input type="text" class="form-control" value="January, 15 2024">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>