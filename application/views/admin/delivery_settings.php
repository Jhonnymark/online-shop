<!DOCTYPE html>
<html>
<head>
    <title>Delivery Settings</title>
</head>
<body>
    <h1>Delivery Settings</h1>
    
    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <?php if ($this->session->flashdata('success')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
    <?php endif; ?>
    
    <?php echo form_open('admin/products/delivery_settings'); ?>
        <label for="min_spend">Minimum Spend for Free Delivery:</label>
        <input type="text" name="min_spend" value="<?php echo set_value('min_spend', $min_spend); ?>" />
        <br /><br />
        <label for="delivery_fee">Delivery Fee:</label>
        <input type="text" name="delivery_fee" value="<?php echo set_value('delivery_fee', $delivery_fee); ?>" />
        <br /><br />
        <input type="submit" name="update" value="Update Settings" />
    <?php echo form_close(); ?>
</body>
</html>
