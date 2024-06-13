<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    background-color: green;
    border: none;
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
.btn:hover {
    background-color: #0056b3;
}

        </style>
</head>
<body>
<a href="<?= site_url('products'); ?>" class="back-btn">
        <svg class="back-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M20 11H7.41l2.29-2.29a1 1 0 10-1.42-1.42l-4 4a1 1 0 000 1.42l4 4a1 1 0 001.42-1.42L7.41 13H20a1 1 0 000-2z" fill="#333"/>
        </svg>
        Back to Category
    </a>
<div class="card">
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        <form id="projectForm" action="<?php echo base_url('index.php/category/store');?>" method="POST" enctype="multipart/form-data">
        <div id="messages"></div>
        
            <div class="form-group">
                <label for="category_name">Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name">
            </div>

            <button type="submit" class="btn btn-outline-primary">Save Category</button>
        </form>
       
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#projectForm').on('submit', function(e){
            e.preventDefault();

            var formData = new FormData(this);
            $.ajax({
                url: '<?php echo base_url("index.php/category/store"); ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response){
                    if(response.status =='error') {
                        $('#messages').html('<div class="alert alert-danger">' + response.errors+ '</div>');
                    }
                    else if(response.status =='success') {
                        $('#messages').html('<div class="alert alert-success">' + response.message+ '</div>');
                        setTimeout(function(){
                            window.location.href = response.redirect;
                        },1000);
                    }
                }
            });
        });
    });
</script>

</body>
</html>
