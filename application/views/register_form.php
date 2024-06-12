<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: center;
            margin-top: 200px;
            margin- 
        }
        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 22px;
        }
        .login-form p {
            margin-bottom: 30px;
            color: #666;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
            font-size: 14px;
        }
        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus,
        .form-group input[type="text"]:focus {
            border-color: #333;
        }
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }
        button[type="submit"]:hover {
            background-color: #555;
        }
        .links a {
            color: #333;
            text-decoration: none;
            margin: 0 10px;
            font-size: 12px;
        }
        #errorMessage {
            color: red;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 12px;
        }
        .login-form footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
        .login-form footer a {
            color: #555;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="login-form">
    <h2>Registration</h2>
    <p>Welcome! Fill in your details to register.</p>

    <?php if(isset($error)) { ?>
        <div id="errorMessage">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <?php echo form_open('user/process_register'); ?>
        <div class="form-group">
            <input type="email" name="email" required placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" name="password" required placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" name="confirm_password" required placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <input type="text" name="first_name" required placeholder="First Name">
        </div>
        <div class="form-group">
            <input type="text" name="last_name" required placeholder="Last Name">
        </div>
        <div class="form-group">
            <input type="text" name="phone_number" required placeholder="Phone Number">
        </div>
        <div class="form-group">
            <input type="text" name="username" required placeholder="Username">
        </div>
        <div class="form-group">
            <input type="text" name="street" required placeholder="Street">
        </div>
        <div class="form-group">
            <input type="text" name="barangay" required placeholder="Barangay">
        </div>
        <button type="submit">Register</button>
    <?php echo form_close(); ?>

    <footer>
        Already have an account? <a href="<?php echo site_url('user/login'); ?>">Login here</a>.
    </footer>
</div>
</body>
</html>
