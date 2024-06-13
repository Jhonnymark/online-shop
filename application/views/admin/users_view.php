<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display+swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a1e3091ba9.js" crossorigin="anonymous"></script>
    <style>
        /* Reset and general styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            line-height: 1.6;
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

        .main-content {
            margin-top: 60px; /* Adjusted for the fixed navbar */
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .navbar-vertical {
            width: 200px;
            background-color: #333;
            color: white;
            padding: 20px;
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
        }

        .user-container {
            flex-grow: 1;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        td {
            color: #666;
        }

        .edit-button {
            text-decoration: none;
            color: #333;
            font-size: 18px;
        }

        .edit-button:hover {
            color: #2f4f4f;
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }

            .navbar-vertical {
                width: 100%;
                position: static;
                height: auto;
                margin-bottom: 20px;
            }

            .user-container {
                margin-left: 0;
            }
        }
        /* Adjustments for the vertical navbar */
.navbar-vertical {
    width: 200px;
    background-color: #333;
    color: white;
    padding: 20px;
    position: fixed; /* Fix the position */
    left: 0;
    top: 60px; /* Adjust as needed */
    height: calc(100vh - 60px); /* Adjust for the fixed horizontal navbar */
    overflow-y: auto; /* Enable vertical scrolling */
}

@media (max-width: 768px) {
    .main-content {
        flex-direction: column; /* Stack elements vertically */
    }

    .navbar-vertical {
        width: 100%;
        position: static; /* Static position for smaller screens */
        height: auto;
        margin-bottom: 20px;
    }
}

    </style>
</head>
<body>
<div class="navbar-horizontal">
    <div class="logo-circle">
        <a href="<?php echo base_url('customer_dash'); ?>">
            <img src="<?php echo base_url('images/mj_logo.png'); ?>" alt="Logo">
        </a>
    </div>
    <nav>
        <ul>
            <li><a href="<?= base_url('index.php/user/logout'); ?>">Logout</a></li>
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
    <div class="user-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Street</th>
                    <th>Barangay</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $customer) : ?>
                    <tr>
                        <td><?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?></td>
                        <td><?php echo $customer['email']; ?></td>
                        <td><?php echo $customer['phone_number']; ?></td>
                        <td><?php echo $customer['street']; ?></td>
                        <td><?php echo $customer['barangay']; ?></td>
                        <td>
                            <a href="<?php echo base_url('admin/view_user_order/' . $customer['user_id']); ?>" class="edit-button">
                                <i class="fa-solid fa-eye"></i> View Orders
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    var menuItems = document.getElementById("menuItems");
    function menutoggle() {
        menuItems.classList.toggle("show");
    }
</script>

</body>
</html>
