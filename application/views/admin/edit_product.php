<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: calc(100% - 20px); /* Adjust for padding */
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        select {
            appearance: none;
            background: url('data:image/svg+xml;utf8,<svg fill="%23333" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px" height="24px"><path d="M7 10l5 5 5-5z"/></svg>') no-repeat right 10px center;
            background-size: 18px;
            padding-right: 30px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        #image-preview {
            display: none;
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }

        .back-btn {
            display: inline-block;
            background: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .back-btn:hover {
            background: #0056b3;
        }

        .back-icon {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 5px;
            fill: #fff;
        }
    </style>
</head>
<body>
<a href="<?= site_url('products'); ?>" class="back-btn">
        <svg class="back-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 11H7.41l2.29-2.29a1 1 0 10-1.42-1.42l-4 4a1 1 0 000 1.42l4 4a1 1 0 001.42-1.42L7.41 13H20a1 1 0 000-2z" fill="#333"/>
        </svg>
        Back to Products
    </a>
    <h2>Edit Product</h2>
    <form method="post" action="<?= site_url('products/update/' . $product->product_id); ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="prod_name">Product Name:</label>
            <input type="text" id="prod_name" name="prod_name" value="<?= htmlspecialchars($product->prod_name) ?>" required>
        </div>
        <div class="form-group">
            <label for="type_code">Type Code:</label>
            <input type="text" id="type_code" name="type_code" value="<?= htmlspecialchars($product->type_code) ?>" required>
        </div>
        <div class="form-group">
            <label for="prod_desc">Product Description:</label>
            <textarea id="prod_desc" name="prod_desc" required><?= htmlspecialchars($product->prod_desc) ?></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" value="<?= htmlspecialchars($product->price) ?>" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" value="<?= htmlspecialchars($product->stock) ?>" required>
        </div>
        <div class="form-group">
            <label for="category">Product Category:</label>
            <select id="category" name="category" required>
                <option value="" selected>- Select -</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category->category_id ?>" <?= $category->category_id == $product->category_id ? 'selected' : '' ?>>
                        <?= $category->category_name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="expiration_date">Expiration Date:</label>
            <input type="date" id="expiration_date" name="expiration_date" value="<?= $product->expiration_date ?>">
        </div>
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" onchange="previewImage(this)">
            <img id="image-preview" src="<?= base_url('images/' . $product->photo) ?>" alt="Preview Image" style="display:block;">
            <input type="hidden" name="current_photo" value="<?= $product->photo ?>">
        </div>
        <button type="submit">Update Product</button>
    </form>

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
