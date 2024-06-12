<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MJ's Grocery Online Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
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
        .category-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #eee;
            padding: 15px 20px;
        }
        .category-head .category-dropdown, .category-head .search {
            display: flex;
            align-items: center;
        }
        .category-head .category-dropdown select, .category-head .search input {
            padding: 5px;
            margin-right: 10px;
        }
        .category-head .search button {
            padding: 5px 10px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }
        .product-item {
            background-color: white;
            padding: 15px;
            margin: 15px;
            width: 200px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            position: relative;
        }
        .product-item img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .product-item h3 a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
        }
        .product-item p {
            margin: 5px 0;
            font-size: 14px;
        }
        .wishlist-icon {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }
        .wishlist-icon:hover {
            color: red;
        }
        .pagination {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
        .pagination a {
            margin: 0 5px;
            padding: 10px 15px;
            text-decoration: none;
            background-color: #333;
            color: white;
            border-radius: 5px;
        }
        .pagination a.active {
            background-color: #555;
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#category-select").change(function () {
                var selectedCategory = $(this).val();
                var search = $("input[name='search']").val();
                window.location.href = "?category=" + selectedCategory + "&search=" + search;
            });

            $(".user-icon").click(function () {
                $(".dropdown").toggle();
            });

            $(document).click(function (event) {
                if (!$(event.target).closest('.user-icon, .dropdown').length) {
                    $(".dropdown").hide();
                }
            });

            $(".wishlist-icon").click(function() {
                var productId = $(this).data("product-id");
                // You can replace this alert with your AJAX call to add the product to the wishlist
                alert("Product ID " + productId + " added to wishlist.");
            });
        });

        function menutoggle() {
            var menuItems = document.getElementById("menuItems");
            menuItems.classList.toggle("show");
        }
    </script>
    <script>
        $(document).ready(function() {
            $(".wishlist-icon").click(function() {
                var productId = $(this).data("product-id");

                $.ajax({
                    url: "<?php echo base_url('index.php/wishlist/add_to_wishlist'); ?>",
                    type: "POST",
                    data: { product_id: productId },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status == 'success') {
                            alert(result.message);
                        } else {
                            alert(result.message);
                        }
                    },
                    error: function() {
                        alert("An error occurred. Please try again.");
                    }
                });
            });
        });
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

<div class="category-head">
    <div class="category-dropdown">
        <label for="category-select">Product Category: </label>
        <select id="category-select">
            <option value="0">All</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['category_id']; ?>" <?php echo ($category_id == $category['category_id']) ? 'selected' : ''; ?>>
                    <?php echo $category['category_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <form class="search" method="GET" action="">
        <input type="text" name="search" placeholder="Search products..." value="<?php echo $search; ?>">
        <button type="submit">Search</button>
    </form>
</div>

<div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <a href="<?php echo base_url('index.php/customer_controller/view_product/') . $product['product_id']; ?>">
                    <img src="<?php echo base_url('images/') . $product['photo']; ?>" alt="Product Photo" class="prod-img">
                </a>
                <h3>
                    <a href="<?php echo base_url('index.php/customer_controller/view_product/') . $product['product_id']; ?>">
                        <?php echo $product['prod_name']; ?>
                    </a>
                </h3>
                <p>Price: ₱ <?php echo number_format($product['price']); ?></p>
                <p>Stock: <?php echo number_format($product['stock']); ?></p>
                <i class="fas fa-heart wishlist-icon" data-product-id="<?php echo $product['product_id']; ?>"></i>
            </div>
        <?php endforeach; ?>
    </div>
<?php if ($totalResults > $limit): ?>
    <div class="pagination">
        <?php
            $totalPages = ceil($totalResults / $limit);
            $previous = $page - 1;
            $next = $page + 1;
        ?>
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $previous; ?>&search=<?php echo $search; ?>&category=<?php echo $category_id; ?>">Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>&search=<?php echo $search; ?>&category=<?php echo $category_id; ?>" <?php echo ($page == $i) ? 'class="active"' : ''; ?>>
                <?php echo $i; ?>
            </a>
        <?php endfor; ?>
        <?php if ($page < $totalPages): ?>
            <a href="?page=<?php echo $next; ?>&search=<?php echo $search; ?>&category=<?php echo $category_id; ?>">Next</a>
        <?php endif; ?>
    </div>
<?php endif; ?>

<footer>
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <img src="<?php echo base_url('images/mj_logo.png'); ?>" alt="Logo">
            </div>
        </div>
    </div>
</footer>
</body>
</html>
