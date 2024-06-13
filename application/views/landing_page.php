<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MJ's Online Grocery Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }

        /* Header styles */
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 1rem 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin-left: 20px;
        }

        .logo-circle img {
            width: 100%;
            height: auto;
        }

        #menuItems ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #menuItems ul li {
            margin-right: 20px;
        }

        #menuItems ul li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .setting-sec {
            margin-right: 20px;
            display: flex;
            color: white;
        }
        a{
            text-decoration: none;
        }
        .cart-sec {
            position: relative;
        }

        .cart-sec .cart-count {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: #ff0000;
            color: #fff;
            border-radius: 50%;
            padding: 5px;
            font-size: 0.8rem;
        }

        /* Hero section */
        .hero {
            background: url('hero-background.jpg') no-repeat center center/cover;
            color: #fff;
            text-align: center;
            padding: 4rem 0;
        }

        .hero-content {
            max-width: 600px;
            margin: auto;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            background-color: #ff0000;
            color: #fff;
            padding: 0.8rem 2rem;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #cc0000;
        }

        /* Featured products section */
        .featured-products {
            padding: 4rem 0;
            text-align: center;
        }

        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 2rem;
        }

        .product-item {
            background-color: #fff;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 250px;
        }

        .product-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        /* Benefits section */
        .benefits {
            background-color: #fff;
            padding: 4rem 0;
            text-align: center;
        }

        .benefit-item {
            margin-bottom: 2rem;
        }

        .benefit-item i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #ff0000;
        }

        .benefit-item h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .benefit-item p {
            font-size: 1.1rem;
            color: #666;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            margin-top: 2rem;
        }
h1, p{
    color: black;
}
    </style>
</head>
<body>
    <header class="navbar">
        <div class="logo-circle">
            <img src="<?php echo base_url('images/mj_logo.png'); ?>" alt="Logo">
        </div>
        <nav id="menuItems">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <div class="setting-sec">
            <a href="#">Register</a>
            <div class="cart-sec">
                <a href="user/login">Login
                </a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to MJ's Grocery Store</h1>
            <p>Your one-stop shop for fresh groceries delivered to your doorstep.</p>
            <a href="user/login" class="btn">Shop Now</a>
        </div>
    </section>

    <div class="container">
        <section class="featured-products">
            <h2>Featured Products</h2>
            <div class="product-list">
                <div class="product-item">
                    <img src="<?php echo base_url('images/cheese-cake.png'); ?>" alt="Product 1">
                    <h3>Cheese Cake</h3>
                    <p>₱ 10.00</p>
                    <a href="user/login" class="btn">Add to Cart</a>
                </div>
                <div class="product-item">
                    <img src="<?php echo base_url('images/ligo-green.png'); ?>" alt="Product 2">
                    <h3>Ligo Green</h3>
                    <p>₱25.00</p>
                    <a href="user/login" class="btn">Add to Cart</a>
                </div>
                <div class="product-item">
                    <img src="<?php echo base_url('images/LM_chicken.png'); ?>" alt="Product 3">
                    <h3>Lucky Me Chicken</h3>
                    <p>₱11.00</p>
                    <a href="user/login" class="btn">Add to Cart</a>
                </div>
            </div>
            <a href="user/login" class="btn">View All Products</a>
        </section>

        <section class="benefits">
            <h2>Why Choose Us?</h2>
            <div class="benefit-item">
                <i class="fas fa-truck"></i>
                <h3>Fast Delivery</h3>
                <p>Get your groceries delivered quickly and conveniently.</p>
            </div>
            <div class="benefit-item">
                <i class="fas fa-leaf"></i>
                <h3>Fresh Products</h3>
                <p>We source only the freshest produce for our customers.</p>
            </div>
            <div class="benefit-item">
                <i class="fas fa-hand-holding-usd"></i>
                <h3>Great Prices</h3>
                <p>Enjoy competitive prices on all our products.</p>
            </div>
        </section>
    </div>

    <footer>
        <p>&copy; 2024 MJ's Grocery Store. All rights reserved.</p>
    </footer>
</body>
</html>
