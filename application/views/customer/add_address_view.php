<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Address</title>
</head>
<body>
    <h2>Add Address</h2>
    <form method="post" action="<?php echo base_url('customer_controller/add_address'); ?>">
        <div class="address-container">
            <div class="address">
                <input type="text" name="address[]" placeholder="Address" required>
                <input type="text" name="city[]" placeholder="City" required>
                <input type="text" name="postcode[]" placeholder="Postcode" required>
                <input type="text" name="country[]" placeholder="Country" required>
            </div>
        </div>
        <button type="button" onclick="addAddress()">Add More Addresses</button>
        <button type="submit">Submit</button>
    </form>

    <script>
        function addAddress() {
            var addressContainer = document.querySelector('.address-container');
            var addressDiv = document.createElement('div');
            addressDiv.classList.add('address');
            addressDiv.innerHTML = `
                <input type="text" name="address[]" placeholder="Address" required>
                <input type="text" name="city[]" placeholder="City" required>
                <input type="text" name="postcode[]" placeholder="Postcode" required>
                <input type="text" name="country[]" placeholder="Country" required>
            `;
            addressContainer.appendChild(addressDiv);
        }
    </script>
</body>
</html>
