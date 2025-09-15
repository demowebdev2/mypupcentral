<!-- Summernote -->
<link rel="stylesheet" href="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.css">
<script src="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.64.0/codemirror.min.js" integrity="sha512-4DlmQ+aBOfYTZ3uzRKCDXdyL7y8IlopnVChhXG0pRFgyvhwONVQW3JX8e5DYoXUNr3evQpLZz7S3O1XxMH4WKA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
<script>
$(document).ready(function() {
		$('.breed_sizeee').select2();
	
	});
  </script>

	<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
                <h1 class="m-0 text-dark">Breeds</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/breeds')?>">Review</a></li>
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
                          Edit Review
                        </h3>
                    </div>                  
                    <?php $attributes = array('class' => '', 'id' => 'form');?>
                    <?php echo form_open_multipart('', $attributes);?>
                    <div class="card-body"><br>
                            <br>
                  
                    <input type="hidden"  value = "<?php echo $review[0]->id?>" name="id" >
                   
               
                      <div class="row">
                        <div class="col-md-6">
                      <label for="state">Full Name</label>
                      <div class="input-group mb-3">
                        <input type="text"  class="form-control " name="name" value="<?php echo $review[0]->fullname ?>" >
                         
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                      <label for="state">Reting (1 to 5)</label>
                      <div class="input-group mb-3">
                        <input type="text"  class="form-control " name="rating" value="<?php echo $review[0]->rating ?>" >
                         
                        </div>
                      </div>
                      
                       <div class="col-md-6">
                      <label for="state">Email</label>
                      <div class="input-group mb-3">
                        <input type="text"  class="form-control " name="email" value="<?php echo $review[0]->email ?>" >
                         
                        </div>
                      </div>
                      
                      
                       <div class="col-md-6">
                      <label for="state">State</label>
                      <div class="input-group mb-3">
                        <input type="text"  class="form-control " name="state" value="<?php echo $review[0]->state ?>" >
                         
                        </div>
                      </div>
                      
                       <div class="col-md-6">
                      <label for="state">Description</label>
                      <div class="input-group mb-3">
            
                         <textarea class="form-control "  name="message"><?php echo $review[0]->message ?></textarea>
                        </div>
                      </div>
                      
                         <div class="col-md-6">
                      <label for="state">Image (If any.)</label>
                      <div class="input-group mb-3">
                        <input type="file"  class="form-control " name="img" >
                         
                        </div>
                      </div>
                      
                      
                   
                    
                   
                </div>
               
                 <div class="row d-none">
                        <div class="col-md-6">
                      <label for="state">adaptability</label>
                      <div class="input-group mb-3">                    
                       <textarea id="adaptability" name="adaptability" class="form-control summernote"><?php echo $result[0]->adaptability?></textarea>
                      </div>
                    </div>                                

                     
                   
                                        

                </div>
                
                 
                                      
                </div>
                
                
               
                     
                 

                
                

         
                   
                    </div>
                    </div>
                    </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="box-footer">
                        <input type="submit" id="submit_btn" class="btn btn-info pull-right" value="SAVE">
                    </div>
                    <?php echo form_close()?>
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</section>

</div>
<script>
    
    $(document).ready(function(){  
        $('#form').on('submit', function(e)
        {
         e.preventDefault();        
        
        var baseurl = "<?php echo base_url()?>";      
         $('#submit_btn').prop('disabled',true); 
         $('#submit_btn').empty();
         $('#submit_btn').val('Please Wait...');    
         var form_data = new FormData(this);
                 $.ajax({  
                     url:baseurl+"admin/Dashboard/edit_save_review",  
                     type: 'POST',
                     dataType:'JSON',
                      processData: false,
                      contentType: false,
                     data: form_data,
                    // data: $('#form').serialize(),
                     success:function(data)  
                     {  
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
   function deleteImg(id,columname){
     var result = confirm("Do you want to delete the breed image ?");
    if(result){
     
        $.post('<?=base_url("admin/breeds/deleteImage")?>',
  {
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
    id : id,
    columname:columname,
  
  },
  function(resp){
     //$.notify("Image Removed Successfully", "success");
     $('#image_1_'+id).remove();
     toastr.success('Image deleted successfully.');
    // if(resp == 'ok'){               
    //             alert('The image has been removed from the gallery');

    //         }
  });
    }    
} 
    </script> 
