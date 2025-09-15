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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/breeds')?>">Breeds</a></li>
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
                          Edit Breed
                        </h3>
                    </div>                  
                    <?php $attributes = array('class' => '', 'id' => 'form');?>
                    <?php echo form_open_multipart('', $attributes);?>
                    <div class="card-body"><br>
                            <br>
                  
                    <input type="hidden"  value = "<?php echo $result[0]->id?>" name="id" >
                   
                
                      <div class="row">
                        <div class="col-md-6">
                      <label for="state">Breed Name</label>
                      <div class="input-group mb-3">
                        <input type="text"  class="form-control " name="breed" value="<?php echo $result[0]->breed_name ?>" >
                         
                       
                      </div>
                    </div>
                    <?php $size_array=array(); if(!empty($result[0]->breed_size)){ $size_array=json_decode($result[0]->breed_size); } ?>
                    <div class="col-md-6">
                      <label for="state">Size</label>
                      <div class="input-group mb-3"> 
                        <select  name="breed_size[]"  class="form-control breed_sizeee" multiple>
                        <option <?php if (in_array("Toy", $size_array)){echo 'selected'; } ?> value="Toy">Toy</option>
                         <option  <?php if (in_array("Miniature", $size_array)){echo 'selected'; } ?> value="Miniature">Miniature</option>
                         <option  <?php if (in_array("Standard", $size_array)){echo 'selected'; } ?> value="Standard">Standard</option>
                         <option <?php if (in_array("Giant", $size_array)){echo 'selected'; } ?> value="Giant">Giant</option>
                        </select>                   
                     
                      </div>
                    </div> 
                    <div class="col-md-12">
                      <label for="state">Page Slug</label>
                      <div class="input-group mb-3"> <input type="text"  class="form-control " name="page_slug" value="<?php echo $result[0]->page_slug ?>" required /></div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <label for="state">Overview</label>
                      <div class="input-group mb-3">                    
                       <textarea id="overview" name="overview" class="form-control summernote"><?php echo $result[0]->overview?></textarea>
                      </div>
                    </div>   
                    <div class="col-md-6">
                      <label for="state">Health</label>
                      <div class="input-group mb-3">                    
                       <textarea id="health" name="health" class="form-control summernote"><?php echo $result[0]->health?></textarea>
                      </div>
                    </div>
                      <div class="col-md-6 d-none">
                      <label for="state">Temperament</label>
                      <div class="input-group mb-3">                    
                       <textarea id="did_you_know" name="temperament" class="form-control summernote"><?php echo $result[0]->temperament?></textarea>
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
                
                 <div class="row">
                      <div class="col-md-6 d-none">
                      <label for="state">Owner Experience</label>
                      <div class="input-group mb-3">                    
                       <textarea id="owner_experience" name="owner_experience" class="form-control summernote"><?php echo $result[0]->owner_experience?></textarea>
                      </div> 

                </div>
                    <div class="col-md-6">
                      <label for="state">Grooming</label>
                      <div class="input-group mb-3">                    
                       <textarea id="grooming" name="grooming" class="form-control summernote"><?php echo $result[0]->grooming?></textarea>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <label for="state">Training</label>
                          <div class="input-group mb-3">                    
                           <textarea id="training" name="training" class="form-control summernote"><?php echo $result[0]->training?></textarea>
                        </div>  
                    </div>                        
                </div>
                
                
                 <div class="row">
                     <div class="col-md-6">
                      <label for="state">Excercise</label>
                      <div class="input-group mb-3">                    
                       <textarea id="activity_level" name="activity_level" class="form-control summernote"><?php echo $result[0]->activity_level?></textarea>
                      </div>
                    </div>     
                    <div class="col-md-6">
                      <label for="state">Size</label>
                      <div class="input-group mb-3">                    
                       <textarea id="size" name="size" class="form-control summernote"><?php echo $result[0]->size?></textarea>
                      </div>
                    </div> 
                                                

                </div>  
                     
                  <div class="row d-none">

                     <div class="col-md-6">
                      <label for="state">Life Span</label>
                      <div class="input-group mb-3">                    
                       <textarea id="life_span" name="life_span" class="form-control summernote"><?php echo $result[0]->life_span?></textarea>
                      </div>
                    </div>     

                    <div class="col-md-6">
                      <label for="state">Did You Know?</label>
                      <div class="input-group mb-3">                    
                       <textarea id="did_you_know" name="did_you_know" class="form-control summernote"><?php echo $result[0]->did_you_know?></textarea>
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
                    <div class="col-md-6">
                      <label for="state">Alt Tag</label>
                      <div class="input-group mb-3">                    
                       <input type="text" name="alt_tag" class="form-control" value="<?php echo $result[0]->alt_image?>" >
                      </div>
                    </div>   
                </div>
                
                

            <div class="form-group">
              
                <?php if(!empty($result[0]->image)){ ?>                   
                <div class="col-sm-6">              
                    <div id="image_1_<?php echo $result[0]->id; ?>">
                        <img src="<?php echo base_url('uploads/breeds/').$result[0]->image; ?>" height="100" width="120">
                        <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImg('<?php echo $result[0]->id; ?>','image')">delete</a>
                    </div>               
                </div>
            <?php } ?>
              </div> 
              
                <div class="row">
                        <div class="col-md-6">
                      <label for="state">Cover Image</label>
                      <div class="input-group mb-3">
                        <input type="file" name="pro_image" class="form-control" >
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="far fa-file-image"></span> </div>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <?php if(!empty($result[0]->pro_image)){ ?>                   
                    <div class="col-sm-6">              
                        <div id="pro_image_1_<?php echo $result[0]->id; ?>">
                            <img src="<?php echo base_url('uploads/breeds/').$result[0]->pro_image; ?>" height="100" width="120">
                            <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImg('<?php echo $result[0]->id; ?>','pro_image')">delete</a>
                        </div>               
                    </div>
                    <?php } ?>
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
                        <input type="text" name="meta_title" class="form-control" placeholder="Meta Title" value="<?php echo $result[0]->meta_title?>">
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
                     <!--    <input type="text" name="description" id="description" required="" class="form-control" placeholder="Title"> -->
                       <textarea id="meta_description" name="meta_description" class="form-control"><?php echo $result[0]->meta_description?></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                      <label for="state">Meta Keywords</label>
                      <div class="input-group mb-3">
                        <input type="text" name="meta_keyword" class="form-control" placeholder="Meta Keyword" value="<?php echo $result[0]->meta_keyword?>">
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="fab fa-blogger-b"></span> </div>
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
                     url:baseurl+"admin/breeds/edit_save",  
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
