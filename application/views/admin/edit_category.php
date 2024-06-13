<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <!-- Add your CSS links and other meta tags here if needed -->
</head>
<style>
    .card {
    background-color: #f9f9f9;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 5px 8px rgba(0, 0, 0, 0.1);
    margin: 20px;
    max-width: 500px; /* Limit card width */
    margin: auto; /* Center the card */
}

.card-body {
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    font-weight: bold;
}

.input-group {
    margin-bottom: 20px;
}

.btn {
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    border: none;
}

.btn:hover {
    background-color: #0056b3;
}

    </style>
<body>

<div class="card">
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
 
        <form action="<?php echo base_url('index.php/category/update/' . $category->category_id);?>" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="cat_name">Name</label>
                <input
                    type="text"
                    class="form-control"
                    id="category_name"
                    name="category_name"
                    value="<?php echo $category->category_name;?>">
            </div>
            <button type="submit" class="btn btn-outline-primary">Update Category</button>
        </form>
       
    </div>
</div>

</body>
</html>
