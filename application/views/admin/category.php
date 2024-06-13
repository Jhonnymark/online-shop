<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <style>
        .dt-buttons .dt-button {
            background-color: green;
            color: black;
        }
        /* Navbar Styles */
        .navbar-horizontal {
            background-color: #2f4f4f;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-circle img {
            width: 50px;
            height: 50px;
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
        }

        /* Main Content Styles */
        .main-content {
            display: flex;
            margin-top: 60px; /* Adjust for the navbar height */
        }

        /* Card Styles */
        .card {
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
        }

        .card-header {
            margin-bottom: 20px;
        }

        /* Button Styles */
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            color: #333;
        }

        .btn:hover {
            background-color: #4CAF50;
            color: white;
        }

        .btn-outline-primary {
            border: 2px solid #4CAF50;
            color: #4CAF50;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-primary:hover {
            background-color: #4CAF50;
            color: white;
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }
        .dt-buttons .dt-button {
            background-color: green;
            color: black;
        }

        body {
            display: flex;
            flex-direction: column;
            margin: 0; /* Reset default margin */
            font-family: Arial, sans-serif; /* Set a fallback font */
        }

        .navbar-horizontal {
            width: 100%;
            background-color: #2f4f4f;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .navbar-horizontal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000; /* Ensure it's above other content */
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
            position: fixed; /* Fix the position */
            height: 100vh; /* Full height */
            overflow-y: auto; /* Enable vertical scrolling */
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

        .main-content {
            display: flex;
            flex-grow: 1;
        }
        a {
text-decoration:none;
}

        .content-area {
            flex-grow: 1;
            padding: 20px;
            margin-left: 230px; /* Adjust for the width of the vertical navbar */
            overflow-y: auto; /* Enable vertical scrolling */
        }

        .card {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            margin-top: 60px;
            margin-left: 360px;
        }

        .card-header {
            margin-bottom: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #4CAF50;
            color: white;
        }

        .btn-outline-success {
            border: 2px solid #4CAF50;
            color: #4CAF50;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-success:hover {
            background-color: #4CAF50;
            color: white;
        }

        .btn-outline-danger {
            border: 2px solid #f44336;
            color: #f44336;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-outline-danger:hover {
            background-color: #f44336;
            color: white;
        }
        .btn-outline-primary
        {
            border: 2px solid black;
            color: #4CAF50;

        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        .table th {
            background-color: #333;
            color: white;
        }

        .table tr:hover {
            background-color: #f2f2f2;
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
            border-radius: 50%; /* Make the image circular */
        }
        .main-content {
            display: flex;
        }

        /* Adjustments for smaller screens */
        @media (max-width: 768px) {
            .navbar-vertical {
                width: 100%;
                position: static; /* Change to static position for smaller screens */
            }

            .content-area {
                margin-left: 0; /* Remove margin for smaller screens */
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
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-primary" href="<?php echo base_url('index.php/category/add_category/');?>"> 
            Add New Category
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <table id="projectTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th width="240px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $cat) { ?> <!-- Use a different variable name to avoid conflicts -->
                <tr>
                    <td><?php echo $cat->category_id; ?></td>
                    <td><?php echo $cat->category_name; ?></td>
                    <td>
                        <a class="btn btn-outline-success" href="<?php echo base_url('index.php/admin/edit_category/'.$cat->category_id) ?>"> 
                            Edit
                        </a>
                        <a class="btn btn-outline-danger" href="#" onclick="confirmDelete('<?php echo base_url('index.php/category/delete/' . $cat->category_id); ?>')">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#projectTable').DataTable({
        paging: true,
        searching: true,
        pageLength: 15,
        lengthMenu: [1, 2, 3, 5, 10],
    });
});

function confirmDelete(url) {
    if (confirm("Are you sure you want to delete this project?")) {
        window.location.href = url;
    }
}
</script>
</body>
</html>
