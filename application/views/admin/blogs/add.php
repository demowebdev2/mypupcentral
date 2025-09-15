

<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
                <h1 class="m-0 text-dark">Blogs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item active">Blogs</li>
                </ol>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                           Add New Blog
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- <form id="form" action="" name="form" accept-charset="utf-8" enctype="multipart/form-data"> -->
                    <?php $attributes = array('class' => '', 'id' => 'form');?>
                    <?php echo form_open_multipart('', $attributes);?>
                    <div class="card-body"><br>
                            <br>
                    <div class="row">
                        <div class="col-md-6">
                      <label for="state">Title</label>
                      <div class="input-group mb-3">
                        <input type="text" name="title" required="" class="form-control" placeholder="Title">
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="fab fa-blogger-b"></span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="state">Category</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="category">
                          <option value="">None</option>
                          <?php if($category){
                            foreach ($category as $key => $value) { ?>
                              <option value="<?php echo $value->id?>"><?= $value->category?></option>
                             
                         <?php   }
                          } ?>
                        </select>
                        
                       
                      </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-6">
                      <label for="state">Author</label>
                      <div class="input-group mb-3">
                        <input type="text" name="author" required="" class="form-control" placeholder="Author">
                        <div class="input-group-append">
                          <div class="input-group-text"> </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="state">Short Decscription</label>
                      <div class="input-group mb-3">
                     <!--    <input type="text" name="description" id="description" required="" class="form-control" placeholder="Title"> -->
                       <textarea id="" name="s_description" class="form-control"></textarea>
                      </div>
                    </div>                   

                </div>


                <div class="row">
                    <div class="col-md-6">
                      <label for="state">Blog Content</label>
                      <div class="input-group mb-3">
                     <!--    <input type="text" name="description" id="description" required="" class="form-control" placeholder="Title"> -->
                       <textarea id="description" name="description" class="form-control"></textarea>
                      </div>
                    </div>                   

                </div>
                <div class="card-header">
                        <h3 class="card-title">
                           Search Engine Optimization
                        </h3>
                </div><br>
                        <div class="row">
                        <div class="col-md-12">
                      <label for="state">Meta Title</label>
                      <div class="input-group mb-3">
                        <input type="text" name="meta_title" class="form-control" placeholder="Meta Title">
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="fab fa-blogger-b"></span> </div>
                        </div>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    
                    <div class="col-md-12">
                      <label for="state">Meta Description</label>
                      <div class="input-group mb-3">
                     
                       <textarea id="meta_description" name="meta_description" class="form-control"></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                      <label for="state">Meta Keywords</label>
                      <div class="input-group mb-3">
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Meta Keyword">
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="fab fa-blogger-b"></span> </div>
                        </div>
                      </div>
                    </div>
                    </div>
                <!-- <div class="row">
                        <div class="col-md-6">
                      <label for="state">Upload Image</label>
                      <div class="input-group mb-3">
                        <input type="file" name="image1" class="form-control" >
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="far fa-file-image"></span> </div>
                        </div>
                      </div>
                    </div>
                </div> -->
                <div class="box-footer">
                        <input type="submit" id="submit_btn" class="btn btn-info pull-right" value="SAVE">
                    </div>                 
                    <?php echo form_close()?>
                </div>
                    </div>
                    <!-- /.card-body -->
                  
                <!-- /.card -->
           
           
                
            </div>
        </div>

    </div>
</section>

</div>
<!-- <script src="<?php echo base_url(); ?>assets/js/ckeditor.js"></script> -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>

    
    $(document).ready(function(){  

      CKEDITOR.replace('description',
    {
        allowedContent: true,
        entities: false//

    });

        $('#form').on('submit', function(e)
        {
         e.preventDefault();    

         for (instance in CKEDITOR.instances) {
        CKEDITOR.instances[instance].updateElement();
    }    
        
        var baseurl = "<?php echo base_url()?>";      
         $('#submit_btn').prop('disabled',true); 
         $('#submit_btn').empty();
         $('#submit_btn').val('Please Wait...');    
         //var form_data = new FormData(this);     
         var form = $("#form")[0];

		var data = new FormData(form);
                 $.ajax({  

              url:baseurl+"admin/blogs/save",  
              method: "post",
        			data: data,
        			enctype: "multipart/form-data",
        			processData: false, // Important!
        			contentType: false,
        			cache: false,
              dataType:"JSON",

                     success:function(data)  
                     {  
                      console.log(data);
                         if(data.status=='success')
                         {                          
                            toastr.success(data.msg);
                            setTimeout(function(){location.reload(true);}, 100);
                         }
                         else{                           
                            toastr.error(data.msg);
                            $('#submit_btn').empty();
                            $('#submit_btn').val('Save');
                            $('#submit_btn').prop('disabled',false); 
                
                         }
                       
                     }  
                 }); 
       });
       });
   
    </script> 
