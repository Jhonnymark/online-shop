<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button[type="submit"],
        .close-btn {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button[type="submit"]:hover,
        .close-btn:hover {
            background-color: #45a049;
        }

        #image-preview {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="close-btn" onclick="window.location.href='<?php echo site_url('products');?>'">Close</button>
        <h2>Add Product</h2>
        <form method="post" action="<?php echo site_url('products/store');?>" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="prod_name">Product Name:</label>
                <input type="text" id="prod_name" name="prod_name" required placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label for="type_code">Type Code:</label>
                <input type="text" id="type_code" name="type_code" required placeholder="Enter Product Type Code">
            </div>
            <div class="form-group">
                <label for="prod_desc">Product Description:</label>
                <textarea id="prod_desc" name="prod_desc" required placeholder="Enter Product Description"></textarea>
            </div>
            <div class="form-group">   
                <label for="price">Price</label>
                <input type="text" id="price" name="price">
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock" required placeholder="Enter Product Stock">
            </div>
            <div class="form-group">
                <label for="category">Product Category:</label>
                <select id="category" name="category" required>
                    <option value="" selected>- Select -</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="expiration_date">Expiration Date:</label>
                <input type="date" id="expiration_date" name="expiration_date">
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" required onchange="previewImage(this)">
                <img id="image-preview" src="#" alt="Preview Image">
            </div>
            <button type="submit">Add Product</button>
        </form>
    </div>

    <script>
        function previewImage(input) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('image-preview').src = e.target.result;
                document.getElementById('image-preview').style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    </script>
</body>
</html>
