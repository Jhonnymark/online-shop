<script src="https://code.jquery.com/jquery-3.6.0.min.js"> </script>
<div class="card">
    <div class="card-header">
        <a class="btn btn-outline-info float-right" href="<?php echo base_url('index.php/project');?>"> 
            View All Projects
        </a>
    </div>
    <div class="card-body">
        <?php if ($this->session->flashdata('errors')) {?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('errors'); ?>
            </div>
        <?php } ?>
        <form id="projectForm" class="<?php echo base_url('index.php/category/store');?>" method="POST" enctype="multipart/form-data">
        <div id="messages"></div>
        
            <div class="form-group">
                <label for="category_name">Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name">
            </div>

            <button type="submit" class="btn btn-outline-primary">Save Project</button>
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