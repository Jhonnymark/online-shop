<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .navbar {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar .logo img {
            width: 125px;
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
        .setting-sec {
            display: flex;
            align-items: center;
        }
        .setting-sec a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 20px;
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
        .menu-icon {
            width: 30px;
            height: 30px;
            cursor: pointer;
        }
        h2 {
            margin-top: 20px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
        td img {
            max-width: 100%;
            height: auto;
        }
        p {
            text-align: center;
            margin-top: 20px;
        }
        input[type="hidden"] {
            display: none;
        }
        button[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: auto;
        }
        .logo-circle {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
        }

        .logo-circle img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
    <script>
        function menutoggle() {
            var menuItems = document.getElementById("menuItems");
            menuItems.classList.toggle("show");
        }
    </script>
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
        <a href="<?php echo base_url('account'); ?>">
            <i class="fa-solid fa-user"></i>
        </a>
        <div class="cart-sec">
            <a href="<?php echo base_url('cart-view'); ?>">
                <span class="cart-count"><?php echo isset($cart_count) ? $cart_count : 0; ?></span>
                <img src="<?php echo base_url('assets/images/cart.png'); ?>" width="30px" height="30px" alt="Cart">
            </a>
        </div>
        <img src="<?php echo base_url('assets/images/menu.png'); ?>" class="menu-icon" onclick="menutoggle()" alt="Menu">
    </div>
</div>

<h2>Checkout</h2>

<?php if (!empty($selected_items)): ?>
    <form method="post" action="<?php echo site_url('checkout/place_order'); ?>">
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Photo</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $subtotal = 0; ?>
                <?php foreach ($selected_items as $item): ?>
                    <tr>
                        <td><?php echo $item['prod_name']; ?></td>
                        <td><img src="<?php echo base_url('images/') . $item['photo']; ?>" alt="Product Photo" width="50"></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['quantity'] * $item['price']; ?></td>
                        <?php $subtotal += $item['quantity'] * $item['price']; ?>
                        <input type="hidden" name="selected_items[]" value="<?php echo $item['product_id']; ?>">
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p>Subtotal: ₱ <?php echo number_format($subtotal, 2); ?></p>
        <?php if ($apply_delivery_fee): ?>
            <p>Delivery Fee: ₱ <?php echo number_format($delivery_fee, 2); ?></p>
            <?php $total = $subtotal + $delivery_fee; ?>
        <?php else: ?>
            <p>Free Delivery (Spend ₱ <?php echo number_format($min_spend_for_free_delivery, 2); ?> to get free delivery)</p>
            <?php $total = $subtotal; ?>
        <?php endif; ?>
        <p>Total: ₱ <?php echo number_format($total, 2); ?></p>
        <input type="hidden" name="total_amount" value="<?php echo number_format($total, 2); ?>">
        <button type="submit">Place Order</button>
    </form>
<?php else: ?>
    <p>No items selected for checkout.</p>
<?php endif; ?>

</body>
</html>
