<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <style>
        .dt-buttons .dt-button {
            background-color: green;
            color: black;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo-circle">
        <a href="<?php echo base_url('customer_dash'); ?>">
            <img src="<?php echo base_url('images/mj_logo.png'); ?>" alt="Logo">
        </a>
    </div>
    <nav id="menuItems">
        <ul>
            <li><a href="<?= base_url('admin/admin_dash'); ?>">Dashboards</a></li>
            <li><a href="<?= base_url('admin/reports'); ?>">Reports</a></li>
            <li><a href="<?= base_url('index.php/admin/manage_order'); ?>">Manage Orders</a></li>
            <li><a href="<?= base_url('index.php/admin/products'); ?>">Manage Products</a></li>
            <li><a href="<?= base_url('admin/promo'); ?>">Promo</a></li>
            <li><a href="<?= base_url('index.php/admin/category'); ?>">Manage Categories</a></li>
            <li><a href="<?= base_url('admin/user'); ?>">Manage Users</a></li>
            <li><a href="<?= base_url('admin/about'); ?>">About</a></li>
            <li><a href="<?php echo base_url('index.php/user/logout'); ?>">Logout</a></li>
        </ul>
    </nav>
</div>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-primary" href="<?php echo base_url('index.php/category/add_category/');?>"> 
            Add New Category
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('success')) {?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
        <table id="projectTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Category Name</th>
                    <th width="240px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $cat) { ?> <!-- Use a different variable name to avoid conflicts -->
                <tr>
                    <td><?php echo $cat->category_id; ?></td>
                    <td><?php echo $cat->category_name; ?></td>
                    <td>
                        <a class="btn btn-outline-success" href="<?php echo base_url('index.php/admin/edit_category/'.$cat->category_id) ?>"> 
                            Edit
                        </a>
                        <a class="btn btn-outline-danger" href="#" onclick="confirmDelete('<?php echo base_url('index.php/category/delete/' . $cat->category_id); ?>')">
                            Delete
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#projectTable').DataTable({
        paging: true,
        searching: true,
        pageLength: 15,
        lengthMenu: [1, 2, 3, 5, 10],
    });
});

function confirmDelete(url) {
    if (confirm("Are you sure you want to delete this project?")) {
        window.location.href = url;
    }
}
</script>
</body>
</html>
