<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar-horizontal {
            width: 100%;
            background-color: #2f4f4f;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        .navbar-horizontal nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-horizontal nav ul li {
            margin-right: 20px;
        }

        .navbar-horizontal nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .navbar-vertical {
            width: 200px;
            background-color: #333;
            color: white;
            padding: 20px;
            position: fixed;
            top: 60px;
            left: 0;
            height: calc(100vh - 60px);
            overflow-y: auto;
        }

        .navbar-vertical nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .navbar-vertical nav ul li {
            margin-bottom: 10px;
        }

        .navbar-vertical nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .navbar-vertical nav ul li a i {
            margin-right: 10px;
        }

        .main-content {
            display: flex;
            flex-grow: 1;
        }

        .content-area {
            flex-grow: 1;
            padding: 20px;
            margin-left: 220px;
            margin-top: 60px;
            overflow-y: auto;
        }

        .card {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            margin-bottom: 20px;
        }

        .card h3 {
            margin: 0;
            font-size: 24px;
        }

        .card p {
            font-size: 18px;
            margin: 10px 0 0;
        }

        .logo-circle {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;
        }

        .logo-circle img {
            width: 100%;
            height: auto;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .navbar-vertical {
                width: 100%;
                position: static;
                height: auto;
            }

            .content-area {
                margin-left: 0;
            }
        }

        .summary-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .summary-card {
            flex: 1;
            padding: 20px;
            background: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            display: flex;
            align-items: center;
        }

        .summary-card .icon {
            font-size: 50px;
            margin-right: 20px;
        }

        .summary-card .details {
            flex: 1;
        }

        .summary-card .details h4 {
            margin: 0;
            font-size: 24px;
        }

        .summary-card .details p {
            margin: 5px 0 0;
            font-size: 18px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="navbar-horizontal">
    <div class="logo-circle">
        <a href="<?php echo base_url('admin/admin_dash'); ?>">
            <img src="<?php echo base_url('images/mj_logo.png'); ?>" alt="Logo">
        </a>
    </div>
    <nav>
        <ul>
            <li><a href="<?= base_url('index.php/user/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </nav>
</div>
<div class="main-content">
    <div class="navbar-vertical">
        <nav id="menuItems">
            <ul>
                <li><a href="<?= base_url('index.php/admin/admin_dash'); ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="<?= base_url('index.php/admin/manage_order'); ?>"><i class="fas fa-shopping-cart"></i> Manage Orders</a></li>
                <li><a href="<?= base_url('index.php/admin/products'); ?>"><i class="fas fa-box"></i> Manage Products</a></li>
                <li><a href="<?= base_url('index.php/admin/category'); ?>"><i class="fas fa-tags"></i> Manage Categories</a></li>
                <li><a href="<?= base_url('index.php/admin/users_view'); ?>"><i class="fas fa-users"></i> Manage Users</a></li>
                <li><a href="<?= base_url('index.php/admin/products/delivery_settings'); ?>"><i class="fas fa-cog"></i> Settings</a></li>
            </ul>
        </nav>
    </div>
    <div class="content-area">
        <div class="card">
            <div class="card-header">
                <h2>Admin Dashboard</h2>
            </div>
            <div class="card-body">
                <h3>Welcome, Admin!</h3>
                
                <div class="summary-cards">
                    <div class="summary-card">
                        <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                        <div class="details">
                            <h4><?php echo count($orders); ?></h4>
                            <p>Total Orders</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="icon"><i class="fas fa-box"></i></div>
                        <div class="details">
                            <h4><?php echo count($products); ?></h4>
                            <p>Total Products</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="icon"><i class="fas fa-users"></i></div>
                        <div class="details">
                            <h4><?php echo count($users); ?></h4>
                            <p>Total Users</p>
                        </div>
                    </div>
                    <div class="summary-card">
                        <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                        <div class="details">
                            <h4><?php echo is_array($pending_orders) ? count($pending_orders) : 0; ?></h4>
                            <p>Pending Orders</p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3>Reports Overview</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('index.php/admin/generate_sales_report'); ?>" method="post">
                            <label for="month">Month:</label>
                            <select name="month" id="month">
                                <?php
                                    for ($m = 1; $m <= 12; $m++) {
                                        $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
                                        echo "<option value='$m'>$month</option>";
                                    }
                                ?>
                            </select>

                            <label for="year">Year:</label>
                            <select name="year" id="year">
                                <?php
                                    $currentYear = date('Y');
                                    for ($y = $currentYear; $y >= 2000; $y--) {
                                        echo "<option value='$y'>$y</option>";
                                    }
                                ?>
                            </select>
                            <button type="submit" class="btn btn-outline-primary">Generate Report</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</body>
</html>
