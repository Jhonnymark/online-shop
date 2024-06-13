<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
            background-image: url('images/mj_logo.png');
        }
        .login-form {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            width: 350px;
            text-align: center;
        }
        .login-form h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 24px;
        }
        .login-form p {
            margin-bottom: 40px;
            color: #666;
            font-size: 16px;
        }
        .form-group {
            margin-bottom: 30px;
        }
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border-color 0.3s ease;
            font-size: 16px;
        }
        .form-group input[type="email"]:focus,
        .form-group input[type="password"]:focus {
            border-color: #333;
        }
        button[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 18px;
        }
        button[type="submit"]:hover {
            background-color: #555;
        }
        .links a {
            color: #333;
            text-decoration: none;
            margin: 0 10px;
            font-size: 14px;
        }
        #errorMessage {
            color: red;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 14px;
        }
        .login-form footer {
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
        .login-form footer a {
            color: #555;
            text-decoration: none;
            font-weight: bold;
        }
        .logo {
            margin: 0 auto 20px; /* Center align horizontally and add bottom margin */
            width: 70px; /* Increase size slightly */
            height: 70px; /* Increase size slightly */
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #333; /* Border color */
        }
        .logo img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <div class="logo">
            <img src="<?php echo base_url('images/mj_logo.png'); ?>" alt="Logo">
        </div>
        <h2>Login</h2>
        <p>Welcome back! Fill in your login details.</p>

        <?php if(isset($error)) { ?>
            <div id="errorMessage">
                <?php echo $error; ?>
            </div>
        <?php } ?>

        <?php echo form_open('user/login'); ?>
            <div class="form-group">
                <input type="email" name="email" required placeholder="Enter Your Email">
            </div>
            <div class="form-group">
                <input type="password" name="password" required placeholder="Enter Your Password">
            </div>
            <button type="submit">Login</button>
        <?php echo form_close(); ?>

        <footer>
            Don't have an account? <a href="<?php echo site_url('user/register'); ?>">Register here</a>.
        </footer>
    </div>
</body>
</html>
