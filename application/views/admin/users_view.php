<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Users</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display+swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a1e3091ba9.js" crossorigin="anonymous"></script>
    <style>
        /* Add your CSS styles here */
        .navbar {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
        }
        nav#menuItems ul li a:hover {
            color: red;
        }
        nav#menuItems ul li a.active {
            color: red;
        }
        .user-container {
            min-height: calc(100% - 255px);
            margin-top: 10rem;
        }
        a {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
        }
        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #767575;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #9f7b7b;
            color: Black;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .edit-button, .btn-close {
            display: table-cell;
            padding: 5px 10px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
        }
        .btn-close {
            background-color: #e4b8b8;
            padding: 2px 10px;
            margin-left: 88%;
        }
        .btn-close:hover {
            background-color: crimson;
        }
        .fa {
            margin-left: 5px;
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }
        .row1 {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }
        .icon {
            font-size: 48px;
            color: black;
            margin-left: 60px;
        }
    </style>
</head>
<body>

<div class="header">
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="<?= base_url('admin/admin_dash'); ?>">
                    <img src="<?= base_url('images/Logo.png'); ?>" class="pic" width="125">
                </a>
            </div>
            <nav id="menuItems">
                <ul>
                    <li><a href="<?= base_url('admin/admin_dash'); ?>">Dashboards</a></li>
                    <li><a href="<?= base_url('admin/reports'); ?>">Reports</a></li>
                    <li><a href="<?= base_url('admin/manage_order'); ?>">Manage Orders</a></li>
                    <li><a href="<?= base_url('admin/products'); ?>">Manage Products</a></li>
                    <li><a href="<?= base_url('admin/promo'); ?>">Promo</a></li>
                    <li><a href="<?= base_url('admin/category'); ?>">Manage Categories</a></li>
                    <li><a href="<?= base_url('admin/user'); ?>">Manage Users</a></li>
                    <li><a href="<?= base_url('admin/about'); ?>">About</a></li>
                </ul>
            </nav>
            <div class="setting-sec">
                <a href="<?= base_url('account'); ?>">
                    <i class="fa-solid fa-user"></i>
                </a>
                <img src="<?= base_url('images/menu.png'); ?>" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>
    </div>
</div>

<div class="user-container">
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Street</th>
            <th>Barangay</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $customer) : ?>
    <tr>
        <td><?php echo $customer['first_name'] . ' ' . $customer['last_name']; ?></td>
        <td><?php echo $customer['email']; ?></td>
        <td><?php echo $customer['phone_number']; ?></td>
        <td><?php echo $customer['street']; ?></td>
        <td><?php echo $customer['barangay']; ?></td>
        <td>
            <a href="<?php echo base_url('admin/view_user_order/' . $customer['user_id']); ?>" class="edit-button">
                <i class="fa-solid fa-eye"></i>
            </a>
        </td>
    </tr>
<?php endforeach; ?>

    </table>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <img src="<?= base_url('images/logo2.png'); ?>" width="100px" height="60px">
            </div>
            <div class="footer-col-2">
                <p>&copy; <?= date('Y'); ?> 4M Minimart Online Store. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<script>
    var menuItems = document.getElementById("menuItems");
    function menutoggle() {
        menuItems.classList.toggle("show");
    }
</script>

</body>
</html>
