<?php include('../conn/connection.php')?>
<?php include('link.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Village East Admin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    
    <style>
        :root {
            --sidebar-width: 250px;
            --navbar-height: 75px;
            --primary-color: #3B6C2F;
            --primary-hover: #2d5324;
            --text-light: rgba(255,255,255,.85);
            --transition-speed: 0.3s;
        }
        
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #f8f9fa;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            height: var(--navbar-height);
            background: var(--primary-color) !important;
            box-shadow: 0 2px 10px rgba(0,0,0,.1);
            padding: 0.7rem 1.5rem;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .navbar-brand img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
            padding: 2px;
            background-color: #fff;
            object-fit: contain;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        /* Add styles for the two-line text */
        .brand-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .brand-text .title {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-light);
        }

        .brand-text .subtitle {
            font-size: 14px;
            color: var(--text-light);
            opacity: 0.9;
        }

        .nav-link {
            color: var(--text-light) !important;
            transition: var(--transition-speed);
            padding: 0.5rem 1rem !important;
            border-radius: 4px;
        }

        .nav-link:hover {
            color: #fff !important;
            background: rgba(255,255,255,.1);
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
            border-radius: 0.5rem;
        }

        .dropdown-item {
            padding: 0.7rem 1.5rem;
            transition: var(--transition-speed);
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
            color: var(--primary-color);
        }

        /* Sidebar Styles */
        #sidebar {
            position: fixed;
            top: var(--navbar-height);
            left: 0;
            width: var(--sidebar-width);
            height: calc(100vh - var(--navbar-height));
            background: #fff;
            transition: var(--transition-speed);
            z-index: 1030;
            overflow-y: auto;
            box-shadow: 4px 0 20px rgba(0,0,0,0.15);
        }
        
        #sidebar .nav-link {
            color: #495057 !important;
            padding: 0.9rem 1.5rem !important;
            margin: 0.2rem 0.8rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            font-weight: 500;
        }
        
        #sidebar .nav-link i {
            width: 1.5rem;
            margin-right: 0.8rem;
            font-size: 1.1rem;
        }
        
        #sidebar .nav-link:hover {
            color: var(--primary-color) !important;
            background-color: #f8f9fa;
        }
        
        #sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
            box-shadow: 0 2px 5px rgba(59,108,47,.2);
        }

        #sidebar .nav-link.active i {
            color: white;
        }

        /* Main Content Styles */
        #wrapper {
            padding-top: var(--navbar-height);
            padding-left: var(--sidebar-width);
            transition: var(--transition-speed);
            background-color: #f8f9fa;
        }

        #content {
            width: 100%;
            padding: 2rem;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
                box-shadow: none;
            }
            
            #sidebar.active {
                margin-left: 0;
                box-shadow: 4px 0 20px rgba(0,0,0,0.15);
            }
            
            #wrapper {
                padding-left: 0;
            }
            
            #wrapper.active {
                padding-left: var(--sidebar-width);
            }

            .navbar {
                padding: 0.5rem 1rem;
            }
        }

        /* Scrollbar Styles */
        #sidebar::-webkit-scrollbar {
            width: 6px;
        }

        #sidebar::-webkit-scrollbar-track {
            background: #fff;
        }

        #sidebar::-webkit-scrollbar-thumb {
            background: #dee2e6;
            border-radius: 3px;
        }

        #sidebar::-webkit-scrollbar-thumb:hover {
            background: #adb5bd;
        }

        /* Button Styles */
        .btn-link {
            color: var(--text-light);
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 0.375rem;
            transition: var(--transition-speed);
        }

        .btn-link:hover {
            color: #fff;
            background: rgba(255,255,255,.1);
        }

        /* Notification Badge */
        .notification-badge {
            position: relative;
        }

        .notification-badge::after {
            content: '';
            position: absolute;
            top: 6px;
            right: 6px;
            width: 8px;
            height: 8px;
            background: #dc3545;
            border-radius: 50%;
            border: 2px solid var(--primary-color);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <button class="btn btn-link d-lg-none me-2" id="sidebarToggle">
                <i class="fas fa-bars fa-lg"></i>
            </button>
            
            <a class="navbar-brand" href="#">
                <img src="../imgs/vlogo.jpg" alt="Village East Admin">
                <div class="brand-text">
                    <span class="title">Village East</span>
                    <span class="subtitle">Executive Portal</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item notification-badge">
                        <a class="nav-link" href="#"><i class="fas fa-bell fa-lg"></i></a>
                    </li>
                    <li class="nav-item dropdown ms-2">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle fa-lg me-2"></i>
                            <span>Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="../Login/logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="nav flex-column py-3">
            <a href="/1Admin/admin_dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin_dashboard.php' ? 'active' : ''; ?>">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
            <a href="/1Admin/admin_manageuser.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin_manageuser.php' ? 'active' : ''; ?>">
                <i class="fas fa-users me-2"></i> Manage Users
            </a>
            <a href="/1Admin/admin_dues.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin_dues.php' ? 'active' : ''; ?>">
                <i class="fas fa-file-invoice-dollar me-2"></i> Monthly Dues
            </a>
            <a href="/1Admin/admin_reservation.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin_reservation.php' ? 'active' : ''; ?>">
                <i class="fas fa-calendar-check me-2"></i> Reservation
            </a>
            <a href="/1Admin/admin_stickerreg.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin_stickerreg.php' ? 'active' : ''; ?>">
                <i class="fas fa-ticket-alt me-2"></i> Sticker Registration
            </a>
            <a href="/1Admin/admin_complaints.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin_complaints.php' ? 'active' : ''; ?>">
                <i class="fas fa-exclamation-circle me-2"></i> Complaints
            </a>
            <a href="/1Admin/admin_settings.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin_settings.php' ? 'active' : ''; ?>">
                <i class="fas fa-cog me-2"></i> Settings
            </a>
        </div>
    </nav>

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Main Content -->
        <main id="content">
            <!-- Your page content goes here -->
        </main>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sidebar Toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('wrapper').classList.toggle('active');
        });

        // Close sidebar on mobile when clicking outside
        document.addEventListener('click', function(event) {
            if (window.innerWidth <= 768) {
                const sidebar = document.getElementById('sidebar');
                const wrapper = document.getElementById('wrapper');
                const sidebarToggle = document.getElementById('sidebarToggle');
                
                if (!sidebar.contains(event.target) && 
                    !sidebarToggle.contains(event.target) && 
                    sidebar.classList.contains('active')) {
                    sidebar.classList.remove('active');
                    wrapper.classList.remove('active');
                }
            }
        });
    </script>
</body>
</html>
