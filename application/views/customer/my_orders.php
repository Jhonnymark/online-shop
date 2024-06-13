<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Basic Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
        }

        .navbar a:hover {
            color: #ccc;
        }

        /* Order Filters */
        .order-filters {
            margin-bottom: 20px;
        }

        .order-filters a {
            color: #333;
            text-decoration: none;
            margin-right: 10px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Actions */
        .action-link {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        .action-link:hover {
            text-decoration: underline;
        }
        .cart-sec {
            position: relative;
        }
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 4px;
            font-size: 12px;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            color: white;
        }
        .navbar .logo img {
            width: 125px;
        }
        .navbar nav {
            display: flex;
        }
        .navbar nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .navbar nav ul li {
            margin: 0 15px;
        }
        .navbar nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 16px;
        }
        .navbar .setting-sec {
            position: relative;
            display: flex;
            align-items: center;
        }
        .navbar .setting-sec a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 20px;
        }
        .navbar .dropdown {
            display: none;
            position: absolute;
            top: 30px;
            right: 0;
            background-color: white;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            width: 120px;
        }
        .navbar .dropdown a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 14px;
        }
        .navbar .dropdown a:hover {
            background-color: #ddd;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        footer .container {
            display: flex;
            justify-content: center;
        }
        footer .container .row {
            display: flex;
        }
        footer .container .row .footer-col-1 img {
            width: 100px;
            height: 60px;
        }
        @media (max-width: 768px) {
            .navbar nav ul {
                flex-direction: column;
                display: none;
            }
            .navbar nav ul.show {
                display: flex;
            }
            .category-head {
                flex-direction: column;
            }
            .product-item {
                width: 45%;
            }
        }
        .cart-sec {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -10px; /* Adjust this value to position the count properly */
            right: -10px; /* Adjust this value to position the count properly */
            background-color: red;
            color: white;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .logo-circle {
            width: 70px; /* Adjust according to your preference */
            height: 70px; /* Adjust according to your preference */
            border-radius: 50%;
            overflow: hidden;
        }

        .logo-circle img {
            width: 100%; /* Make sure the image fills the container */
            height: auto; /* Maintain aspect ratio */
            display: block;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo-circle">
        <a href="<?php echo base_url('index.php/customer/customer_dash'); ?>">
            <img src="<?php echo base_url('images/mj_logo.png'); ?>" alt="Logo">
        </a>
    </div>
    <nav id="menuItems">
    <ul>
            <li><a href="<?php echo base_url('index.php/customer/customer_dash'); ?>">Home</a></li>
            <li><a href="<?php echo base_url('index.php/customer/customer_dash'); ?>">Products</a></li>
            <li><a href="<?php echo base_url('index.php/customer/my-orders'); ?>">My Orders</a></li>
            <li><a href="<?php echo base_url('about'); ?>">About</a></li>
        </ul>
    </nav>
    <div class="setting-sec">
        <a href="javascript:void(0)" class="user-icon">
            <i class="fa-solid fa-user"></i>
        </a>
        <div class="dropdown">
            <a href="<?php echo base_url('account'); ?>">Account</a>
            <a href="<?php echo base_url('index.php/user/logout'); ?>">Logout</a>
        </div>
        <div class="cart-sec">
            <a href="<?php echo base_url('index.php/cart/view'); ?>">
                <i class="fas fa-shopping-cart"></i> <!-- Cart icon -->
                <?php if ($cart_count > 0): ?>
                    <span class="cart-count"><?php echo $cart_count; ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</div>
<div class="container">
    <h2>My Orders</h2>
    <div class="order-filters">
        <a href="<?php echo base_url('index.php/customer/my-orders'); ?>">All Orders</a> |
        <a href="<?php echo base_url('index.php/order/my_orders?status=Pending'); ?>">Pending Orders</a> |
        <a href="<?php echo base_url('index.php/order/my_orders?status=Preparing'); ?>">Preparing Orders</a> |
        <a href="<?php echo base_url('index.php/order/my_orders?status=Shipped'); ?>">Shipped Orders</a> |
        <a href="<?php echo base_url('index.php/order/my_orders?status=Completed'); ?>">Completed Orders</a>
    </div>
    <?php if (!empty($orders)): ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date Ordered</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order): ?>
                    <?php foreach ($order['items'] as $item): ?>
                        <tr>
                            <td><?php echo $order['order_id']; ?></td>
                            <td><?php echo date('F j, Y', strtotime($order['order_date'])); ?></td>
                            <td><?php echo $item['prod_name']; ?></td>
                            <td>₱<?php echo number_format($item['price'], 2); ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td>₱<?php echo number_format($item['quantity'] * $item['price'], 2); ?></td>
                            <td><?php echo $order['status']; ?></td>
                            <td>
                                <?php if ($order['status'] === 'Pending'): ?>
                                    <a class="action-link" href="<?php echo base_url('order/cancel_order/') . $order['order_id']; ?>">Cancel Order</a>
                                <?php elseif ($order['status'] === 'Preparing'): ?>
                                    <a class="action-link" href="<?php echo base_url('order/track_order/') . $order['order_id']; ?>">Track Order</a>
                                <?php elseif ($order['status'] === 'Shipped'): ?>
                                    <a class="action-link" href="<?php echo base_url('order/receive_order/') . $order['order_id']; ?>">Receive Order</a>
                                <?php elseif ($order['status'] === 'Completed'): ?>
                                    <a class="action-link" href="<?php echo base_url('order/review_order/') . $order['order_id']; ?>">Leave Review</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>You have not placed any orders yet.</p>
    <?php endif; ?>
</div>
<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        dropdown.style.display = (dropdown.style.display === "block") ? "none" : "block";
    }
</script>
</body>
</html>
