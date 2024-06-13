<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"], .back-button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }

        input[type="submit"]:hover, .back-button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }

        .success-message {
            color: green;
            margin-top: 5px;
        }

        .back-button i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Settings</h1>
        
        <?php if ($this->session->flashdata('error')): ?>
            <p class="error-message"><?php echo $this->session->flashdata('error'); ?></p>
        <?php endif; ?>
        <?php if ($this->session->flashdata('success')): ?>
            <p class="success-message"><?php echo $this->session->flashdata('success'); ?></p>
        <?php endif; ?>
        
        <?php echo form_open('admin/products/delivery_settings'); ?>
            <label for="min_spend">Minimum Spend for Free Delivery:</label>
            <input type="text" id="min_spend" name="min_spend" value="<?php echo set_value('min_spend', $min_spend); ?>" />
            <br /><br />
            <label for="delivery_fee">Delivery Fee:</label>
            <input type="text" id="delivery_fee" name="delivery_fee" value="<?php echo set_value('delivery_fee', $delivery_fee); ?>" />
            <br /><br />
            <input type="submit" name="update" value="Update Settings" />
        <?php echo form_close(); ?>
        
        <a href="<?php echo base_url('index.php/admin/admin_dash'); ?>" class="back-button">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
</body>
</html>
