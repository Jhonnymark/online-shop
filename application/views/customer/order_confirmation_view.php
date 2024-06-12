<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
        }
        .container {
            max-width: 600px;
            margin: 100px auto; /* Adjust margin-top to center vertically */
            padding: 20px;
            text-align: center;
            border: 1px solid #ccc; /* Add border */
            border-radius: 10px; /* Add border radius */
            background-color: #fff; /* Add background color */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
        }
        h2 {
            color: #333;
        }
        p {
            color: #666;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Order Confirmation</h1>
    <p>Thank you for your order. Your order ID is: <?= $order['order_id']; ?></p>
    <p>Total Amount: <?= $order['total_amount']; ?></p>
        <a href="<?php echo site_url('customer/customer_dash'); ?>">Continue Shopping</a>
    </div>
</body>
</html>
