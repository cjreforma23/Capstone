<?php include('../inc/admin_sidebar.php')?>
<?php include('../inc/header.php')?>


<!DOCTYPE html>
<html lang="en">

    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        .card { border: none; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1); }
        .stats-card { background: #ddd; padding: 15px; border-radius: 10px; }
        .ann-box { background: white; padding: 15px; border-radius: 10px; border: 1px solid #ccc; }
    </style>
<body>
    
    <div class="container mt-4">
        
       
        <div class="row mt-4">
            <div class="col-md-3">
                <div class="stats-card bg-success text-light text-center">0 <br> Administrator</div>
            </div>
            <div class="col-md-3">
                <div class="stats-card bg-success text-light text-center">0 <br> Employees</div>
            </div>
            <div class="col-md-3">
                <div class="stats-card bg-success text-light text-center">0 <br> Homeowners</div>
            </div>
            <div class="col-md-3">
                <div class="stats-card bg-success text-light text-center">0 <br> Reservations</div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="ann-box">
                    <h5>Create an Announcement</h5>
                    <textarea class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Delayed Monthly Dues</h5>
                    <ul class="list-unstyled">
                        <li>Rotram - P 2000 - Mar-Jul 2024</li>
                        <li>Suuxua - P 1600 - May-Aug 2024</li>
                        <li>Buanceo - P 120 - Sept 2024</li>
                    </ul>
                    <button class="btn btn-sm bg-success btn-secondary">View all Homeowners</button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-3">
                    <h5>Incoming Reservations</h5>
                    <ul class="list-unstyled">
                        <li>Rotram - Sept 2024</li>
                        <li>Suuxua - Oct 2024</li>
                        <li>Buanceo - Nov 2024</li>
                    </ul>
                    <button class="btn btn-sm bg-success btn-secondary">View all Clients</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

            
    
  <?php include('../inc/footer.php') ?>

