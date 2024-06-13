<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary meta tags, stylesheets, and scripts -->
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
        .product-details-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex: 1;
        }
        .product-details {
            max-width: 600px;
            margin: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
        }
        .product-details .image-container {
            width: 200px; /* Set the desired width */
            height: 200px; /* Set the desired height */
            margin: 0 auto 20px;
            border-radius: 10px;
            overflow: hidden;
            background-color: #f0f0f0; /* Background color for loading */
        }
        .product-details img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image covers the container while maintaining aspect ratio */
        }
        .product-details p {
            margin-bottom: 10px;
        }
        .product-details form {
            margin-top: 20px;
            width: 80%; /* Increase the width of the form */
            margin: 0 auto; /* Center the form */
        }
        .product-details label {
            display: block;
            margin-bottom: 5px;
        }
        .product-details input[type="number"] {
            width: 50px;
            padding: 5px;
            margin-bottom: 10px;
        }
        .product-details button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
            <a href="<?php echo base_url('index.php/cart/view'); ?>">
                <i class="fas fa-shopping-cart"></i> <!-- Cart icon -->
                <?php if ($cart_count > 0): ?>
                    <span class="cart-count"><?php echo $cart_count; ?></span>
                <?php endif; ?>
            </a>
        </div>
    </div>
</div>

<div class="product-details-container">
    <div class="product-details">
        <h2><?php echo $product['prod_name']; ?></h2>
        <div class="image-container">
            <img src="<?php echo base_url('images/') . $product['photo']; ?>" alt="Product Photo">
        </div>
        <p>Price: ₱ <?php echo number_format($product['price'], 2); ?></p>
        <p>Stock: <?php echo $product['stock']; ?></p>
        <form method="post" action="<?php echo site_url('cart/add'); ?>">
            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?php echo $product['stock']; ?>" required>
            <button type="submit">Add to Cart</button>
        </form>
    </div>
</div>

</body>
</html>
