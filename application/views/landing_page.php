<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4M Online Grocery Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f8f8f8;
            color: #333;
        }

        /* Header */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .logo-circle img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
        }

        #menuItems ul {
            list-style: none;
            display: flex;
        }

        #menuItems ul li {
            margin-right: 20px;
        }

        #menuItems ul li:last-child {
            margin-right: 0;
        }

        #menuItems ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        #menuItems ul li a:hover {
            color: #666;
        }

        .fa-solid.fa-user {
            font-size: 24px;
            color: #666;
            transition: color 0.3s ease;
        }

        .fa-solid.fa-user:hover {
            color: #333;
        }

        .cart-sec {
            position: relative;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #ff6347;
            color: white;
            border-radius: 50%;
            padding: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        /* Hero Section */
        .hero {
            background-color: #333;
            color: #fff;
            padding: 100px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .btn {
            padding: 12px 24px;
            background-color: #ff6347;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #ff483f;
        }

        /* Featured Products Section */
        .featured-products {
            padding: 80px 20px;
            text-align: center;
        }

        .featured-products h2 {
            font-size: 24px;
            margin-bottom: 40px;
        }

        /* Benefits Section */
        .benefits {
            background-color: #f8f8f8;
            padding: 80px 20px;
            text-align: center;
        }

        .benefit-item {
            margin-bottom: 40px;
        }

        .benefit-item i {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ff6347;
        }

        .benefit-item h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .benefit-item p {
            font-size: 18px;
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="logo-circle">
            <img src="logo.png" alt="Logo">
        </div>
        <nav id="menuItems">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <div class="setting-sec">
            <a href="#">
                <i class="fa-solid fa-user"></i>
            </a>
            <div class="cart-sec">
                <a href="#">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to 4M Grocery Store</h1>
            <p>Your one-stop shop for fresh groceries delivered to your doorstep.</p>
            <a href="#" class="btn">Shop Now</a>
        </div>
    </section>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-list">
            <!-- Display featured products here -->
        </div>
        <a href="#" class="btn">View All Products</a>
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

    <footer>
        <p>&copy; 2024 4M Grocery Store. All rights reserved.</p>
    </footer>
</body>
</html>
