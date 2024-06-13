<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Cart</title>
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
        p.empty-cart {
            text-align: center;
            margin-top: 20px;
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

<h2>Your Cart</h2>

<?php if (!empty($cart_items)): ?>
    <form method="post" action="<?php echo site_url('checkout'); ?>">
        <table>
            <thead>
                <tr>
                    <th>Select</th>
                    <th>Product</th>
                    <th>Photo</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><input type="checkbox" name="selected_items[]" value="<?php echo $item['product_id']; ?>"></td>
                        <td><?php echo $item['prod_name']; ?></td>
                        <td><img src="<?php echo base_url('images/') . $item['photo']; ?>" alt="Product Photo" width="50"></td>
                        <td><?php echo $item['price']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['quantity'] * $item['price']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit">Checkout</button>
    </form>
<?php else: ?>
    <p class="empty-cart">Your cart is empty.</p>
<?php endif; ?>

</body>
</html>
