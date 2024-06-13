<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verification Code</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #f0f0f0, #dfe7fd);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .verify-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }

        h2 {
            color: #2f4f4f;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 14px;
        }

        input[type="text"] {
            width: calc(100% - 20px); /* Adjust for padding */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #2f4f4f;
        }

        button[type="submit"] {
            background-color: #2f4f4f;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #1e3c3c;
            transform: scale(1.05);
        }

        .error-message {
            color: #f44336;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="verify-form">
        <h2>Verification Code</h2>
        <?php if (isset($error_message)) echo '<p class="error-message">' . $error_message . '</p>'; ?>
        <form method="post" action="<?php echo site_url('user/process_verification'); ?>">
            <label for="verification_code">Enter verification code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
