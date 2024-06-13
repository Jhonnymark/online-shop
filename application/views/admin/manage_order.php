<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
            top: 60px; /* Adjust for the height of fixed navbar */
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

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 33px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 235px; /* Adjust this value as needed */
            overflow-x: auto; /* Enable horizontal scrolling */
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            align-items: center;
        }

        .actions a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .actions a:hover {
            background-color: #007bff;
            color: white;
        }

        .actions form {
            display: flex;
            align-items: center;
        }

        .actions select {
            margin-right: 10px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .actions button {
            padding: 5px 10px;
            border: none;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .actions button:hover {
            background-color: #218838;
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

        @media (max-width: 768px) {
            .navbar-vertical {
                width: 100%;
                position: static; /* Change to static position for smaller screens */
                top: 0; /* Reset top position */
                margin-top: 60px; /* Adjust margin for proper display below fixed navbar */
            }

            .container {
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
<div class="container">
    <h2>All Orders</h2>
    <?php if (!empty($orders)): ?>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Date Ordered</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php 
            $current_order_id = null;
            $order_total = 0;
            foreach ($orders as $order): 
                if ($current_order_id !== $order['order_id']): 
                    if ($current_order_id !== null): ?>
                        <!-- Display total for each unique order -->
                        <tr class="total">
                            <td colspan="2"></td>
                            <td class="actions">
                            </td>
                        </tr>
                    <?php 
                    $order_total = 0;
                    endif; 
                    $current_order_id = $order['order_id'];
                    $order_status = $order['status'];
                ?>
                <!-- Display order details -->
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo date('F j, Y', strtotime($order['order_date'])); ?></td>
                    <td><?php echo $order['prod_name']; ?></td>
                    <td>₱<?php echo number_format($order['price'], 2); ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td>₱<?php echo number_format($order['quantity'] * $order['price'], 2); ?></td>
                    <td><?php echo $order['status']; ?></td>
                    <!-- Add this within the table where actions are defined -->
<td class="actions">
    <?php if ($order['status'] === 'Pending' && isset($order['id'])): ?>
        <a href="<?php echo base_url('index.php/orders/accept_item/') . $order['id']; ?>">Accept</a>
        <a href="<?php echo base_url('index.php/orders/reject_item/') . $order['id']; ?>">Reject</a>
    <?php elseif ($order['status'] !== 'Pending' && isset($order['id'])): ?>
        <form action="<?php echo base_url('index.php/orders/update_status/') . $order['id']; ?>" method="post">
            <select name="status">
                <option value="ToReceive" <?php echo $order['status'] === 'ToReceive' ? 'selected' : ''; ?>>To Receive</option>
                <option value="Completed" <?php echo $order['status'] === 'Completed' ? 'selected' : ''; ?>>Completed</option>
            </select>
            <button type="submit">Update Status</button>
        </form>
    <?php endif; ?>
</td>

                </tr>
            <?php 
                else: 
            ?>
                <!-- Display additional products for the same order -->
                <tr>
                    <td></td>
                    <td></td>
                    <td><?php echo $order['prod_name']; ?></td>
                    <td>₱<?php echo number_format($order['price'], 2); ?></td>
                    <td><?php echo $order['quantity']; ?></td>
                    <td>₱<?php echo number_format($order['quantity'] * $order['price'], 2); ?></td>
                    <td><?php echo $order['status']; ?></td>
                    <td class="actions">
                        <?php if ($order['status'] === 'Pending' && isset($order['id'])): ?>
                            <a href="<?php echo base_url('index.php/orders/accept_item/') . $order['id']; ?>">Accept</a>
                            <a href="<?php echo base_url('index.php/orders/reject_item/') . $order['id']; ?>">Reject</a>
                        <?php elseif ($order['status'] !== 'Pending' && isset($order['id'])): ?>
                            <form action="<?php echo base_url('index.php/orders/update_status/') . $order['id']; ?>" method="post">
                                <select name="status">
                                    <option value="ToReceive">To Receive</option>
                                    <option value="Completed">Completed</option>
                                </select>
                                <button type="submit">Update Status</button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php 
                endif; 
            endforeach; 
            ?>
            <!-- Display the final total after the last order -->
            <tr class="total">
                <td colspan="2"></td>
                <td class="actions">
                </td>
            </tr>
        </table>
    <?php else: ?>
        <p>There are no orders to display.</p>
    <?php endif; ?>
</div>
</body>
</html>
