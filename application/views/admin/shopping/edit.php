

<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
                <h1 class="m-0 text-dark">Shopping List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item active">Shopping</li>
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
                         Edit 
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
                        <input type="text" name="title" required="" value="<?=$blog->title?>" class="form-control" placeholder="Title">
                       
                      </div>
                    </div>
                  
                </div>
               
                       <div class="row">
                    <div class="col-md-6">
                      <label for="state"> Description</label>
                      <div class="input-group mb-3">
                     <!--    <input type="text" name="description" id="description" required="" class="form-control" placeholder="Title"> -->
                       <textarea id="description" name="description" class="form-control"><?=$blog->description?></textarea>
                      </div>
                    </div>                   

                </div> 

                  <div class="row">
                    <div class="col-md-6">
                      <label for="state">Note</label>
                      <div class="input-group mb-3">
                     <!--    <input type="text" name="description" id="description" required="" class="form-control" placeholder="Title"> -->
                       <textarea id="" name="note"  class="form-control"><?=$blog->note?></textarea>
                      </div>
                    </div>                   

                </div>


               
                <div class="row">
                        <div class="col-md-6">
                      <label for="state">Link</label>
                      <div class="input-group mb-3">
                        <input type="url" name="link" required="" value="<?=$blog->link?>" class="form-control" placeholder="https://">
                       
                      </div>
                    </div>
                  
                </div>
                  
                   

               <div class="row">
                        <div class="col-md-6">
                      <label for="state">Upload Image</label>
                      <div class="input-group mb-3">
                        <input type="file" name="image1" class="form-control" >
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="far fa-file-image"></span> </div>
                        </div>
                      </div>
                    </div>
                </div> 
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

              url:baseurl+"admin/shopping/update/<?=$blog->id?>",  
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
