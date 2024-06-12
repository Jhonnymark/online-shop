<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Dashboard</title>
    <style>
        /* Reset styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
        }

        /* Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
            color: white;
        }

        .navbar .logo-circle img {
            width: 70px;
            height: auto;
            display: block;
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
            display: flex;
            align-items: center;
        }

        .navbar .setting-sec a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 20px;
        }

        /* Container styles */
        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Profile container styles */
        .profile-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .profile-container .profile {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-container .profile img {
            width: 100px;
            height: auto;
            border-radius: 50%;
        }

        .profile-container .profile .username {
            margin-top: 10px;
            font-weight: bold;
        }

        .profile-container .profile .logout a {
            color: #333;
            text-decoration: none;
            font-size: 14px;
        }

        .account {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .account .dropdown {
            text-align: center;
            margin-bottom: 20px;
        }

        .account .dropdown img {
            width: 50px;
            height: auto;
        }

        .account .dropdown span {
            margin-top: 10px;
            display: block;
        }

        .account .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            text-align: left;
        }

        .account .dropdown:hover .dropdown-content {
            display: block;
        }

        .account .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .account .dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Container account info styles */
        .container-account-info {
            text-align: center;
        }

        .container-account-info .tbl-info {
            margin: 20px auto;
        }

        .container-account-info .tbl-info td {
            padding: 10px;
        }

        .container-account-info .button {
            margin-top: 20px;
        }

        .container-account-info .button a {
            text-decoration: none;
            color: #333;
            padding: 10px 20px;
            margin-right: 10px;
            border: 1px solid #333;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .container-account-info .button a:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="<?php echo base_url('images/mj_logo.png'); ?>" width="125">
        </div>
        <nav id="menuItems">
            <ul>
                <li><a href="<?php echo base_url('customer/customer_dash'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('about.php'); ?>">About</a></li>
            </ul>
        </nav>
        <div class="setting-sec">
            <div class="cart-sec">
                <a href="<?php echo base_url('cart-view.php'); ?>">
                    <span class="cart-count"><?php echo $cart_count; ?></span>
                    <img src="<?php echo base_url('images/cart.png'); ?>" width="30px" height="30px">
                </a>
            </div>
            <img src="<?php echo base_url('images/menu.png'); ?>" class="menu-icon" onclick="menutoggle()">
        </div>
    </div>

    <div class="main-con">
        <div class="profile-container">
            <div class="profile">
                <img src="<?php echo base_url('images/account.png'); ?>" alt="User Photo">
                <div class="username"><?php echo $user['username']; ?></div>
                <div class="logout"><a href="<?php echo base_url('login_form.php'); ?>">Logout</a></div>
            </div>
            <div class="account">
                <div class="dropdown">
                    <img src="<?php echo base_url('images/account.png'); ?>" alt="Account Icon">
                    <span>My Account</span>
                    <div class="dropdown-content">
                        <a href="<?php echo base_url('Account.php'); ?>"><i class="fa fa-pencil"></i> Edit Profile</a><br>
                        <a href="<?php echo base_url('address'); ?>"><i class="fa-solid fa-location-dot"></i>  Addresses</a><br>
                        <a href="<?php echo base_url('change-pass.php'); ?>"><i class="fa fa-edit"></i>Change Password</a>
                    </div>
                </div>
                <div class="dropdown">
                    <img src="<?php echo base_url('images/purchase.png'); ?>" alt="Purchase Icon">
                    <span>My Purchase</span>
                    <div class="dropdown-content">
                        <a href="<?php echo base_url('my_orders.php'); ?>">My Orders</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-account-info">
            <h2 style="text-align:center">Welcome, <?php echo $user['username']; ?></h2>
            <table class="tbl-info">
                <tr class="account-info">
                    <td>First Name:</td>
                    <td><?php echo $user['first_name']; ?></td>
                </tr>
            </table>
            <div class="button">
                <a href="<?php echo base_url('Edit-info.php'); ?>" class="edit-button"><i class="fa fa-edit"></i>Edit</a>
                <a href="<?php echo base_url('change-pass.php'); ?>" class="change-button"><i class="fa fa-edit"></i>Change Password</a>   
            </div>
        </div>
    </div>
    <script>
        var menuItems = document.getElementById("menuItems");
        function menutoggle() {
            menuItems.classList.toggle("show");
        }
    </script>
</body>
</html>
