<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            width: 200px;
            background-color: #333;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            margin-right: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .navbar nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .navbar nav ul li {
            margin-bottom: 10px;
        }

        .navbar nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-left: 280px; /* Adjust this value as needed */
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

        .actions a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .logo-circle img {
            width: 80px; /* Adjust size as needed */
            height: 80px; /* Adjust size as needed */
            border-radius: 50%; /* Make it circular */
            overflow: hidden; /* Hide overflow */
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo-circle">
        <a href="<?php echo base_url('customer_dash'); ?>">
            <img src="<?php echo base_url('images/mj_logo.png'); ?>" alt="Logo">
        </a>
    </div>
    <nav id="menuItems">
        <ul>
            <li><a href="<?= base_url('admin/admin_dash'); ?>">Dashboards</a></li>
            <li><a href="<?= base_url('admin/reports'); ?>">Reports</a></li>
            <li><a href="<?= base_url('index.php/admin/manage_order'); ?>">Manage Orders</a></li>
            <li><a href="<?= base_url('index.php/admin/products'); ?>">Manage Products</a></li>
            <li><a href="<?= base_url('admin/promo'); ?>">Promo</a></li>
            <li><a href="<?= base_url('admin/category'); ?>">Manage Categories</a></li>
            <li><a href="<?= base_url('admin/user'); ?>">Manage Users</a></li>
            <li><a href="<?= base_url('admin/about'); ?>">About</a></li>
            <li><a href="<?php echo base_url('index.php/user/logout'); ?>">Logout</a></li>
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
                        <tr class="total">
                            <td colspan="5">Total: ₱<?php echo number_format($order_total, 2); ?></td>
                            <td colspan="2"></td>
                            <td class="actions">
                                <?php if ($order_status === 'Pending'): ?>
                                    <a href="<?php echo base_url('order/cancel_order/') . $current_order_id; ?>">Cancel Order</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php 
                    $order_total = 0;
                    endif; 
                    $current_order_id = $order['order_id'];
                    $order_status = $order['status'];
                ?>
                <tr>
                    <td><?php echo $order['order_id']; ?></td>
                    <td><?php echo date('F j, Y', strtotime($order['order_date'])); ?></td>
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
                <?php else: ?>
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
                $order_total += $order['quantity'] * $order['price'];
            endforeach; 
            ?>
            <tr class="total">
                <td colspan="5">Total: ₱<?php echo number_format($order_total, 2); ?></td>
                <td colspan="2"></td>
                <td class="actions">
                    <?php if ($order_status === 'Pending'): ?>
                        <a href="<?php echo base_url('index.php/order/cancel_order/') . $current_order_id; ?>">Cancel Order</a>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    <?php else: ?>
        <p>There are no orders to display.</p>
    <?php endif; ?>
</div>
</body>
</html>
