<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <style>
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
            padding: 8px;
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
                <li><a href="<?= base_url('admin/admin_dash'); ?>">Dashboards</a></li>
                <li><a href="<?= base_url('admin/reports'); ?>">Reports</a></li>
                <li><a href="<?= base_url('index.php/admin/manage_order'); ?>">Manage Orders</a></li>
                <li><a href="<?= base_url('admin/products'); ?>">Manage Products</a></li>
                <li><a href="<?= base_url('admin/promo'); ?>">Promo</a></li>
                <li><a href="<?= base_url('admin/category'); ?>">Manage Categories</a></li>
                <li><a href="<?= base_url('admin/user'); ?>">Manage Users</a></li>
                <li><a href="<?= base_url('admin/about'); ?>">About</a></li>
            </ul>
        </nav>
    </div>
    <div class="content-area">
        <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-primary" href="<?php echo base_url('index.php/products/add_product'); ?>">
                    Add New Product
                </a>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>

                <table id="projectTable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stocks</th>
                        <th>Image</th>
                        <th width="240px">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?php echo $product->prod_name; ?></td>
                            <td><?php echo $product->prod_desc; ?></td>
                            <td><?php echo $product->price; ?></td>
                            <td><?php echo $product->stock; ?></td>
                            <td><img src="<?php echo base_url('images/' . $product->photo); ?>"
                                     style="width: 50px; height: 50px;"></td>
                            <td>
                                <a class="btn btn-outline-success"
                                   href="<?php echo base_url('index.php/products/edit/' . $product->product_id) ?>">Edit</a>
                                <a class="btn btn-outline-danger" href="#"
                                   onclick="confirmDelete('<?php echo base_url('index.php/products/delete/' . $product->product_id); ?>')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        // Ensure DataTable is only initialized once
        if (!$.fn.dataTable.isDataTable('#projectTable')) {
            $('#projectTable').DataTable({
                "paging": true,
                "searching": true,
                "pageLength": 10,
            });
        }
    });

    function confirmDelete(url) {
        if (confirm("Are you sure you want to delete this project?")) {
            window.location.href = url;
        }
    }
</script>
</body>
</html>
