<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verification Code</title>
    <style>
        /* Your CSS from the previous code */
    </style>
</head>
<body>
    <h2>Verification Code</h2>
    <div class="verify-form">
        <?php if (isset($error_message)) echo '<p class="error-message">' . $error_message . '</p>'; ?>
        <form method="post" action="<?php echo site_url('user/process_verification'); ?>">
            <label for="verification_code">Enter verification code:</label>
            <input type="text" id="verification_code" name="verification_code" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
