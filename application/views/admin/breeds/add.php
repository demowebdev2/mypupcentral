
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
		$('.breed_sizeee').select2({
      tags: true,
      multiple:true,
      width: '100%'
    });
	
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
                    <li class="breadcrumb-item active">Breeds</li>
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
                           Add New Breed
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
                    <label for="state">Breed Name</label>
                      <div class="input-group mb-3">
                        <input type="text"  class="form-control " name="breed" value="" >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="state">Size</label>
                      <div class="input-group mb-3"> 
                        <select  name="breed_size[]"  class="form-control select2" multiple>
                          <option value="Toy">Toy</option>
                         <option value="Miniature">Miniature</option>
                         <option value="Standard">Standard</option>
                         <option value="Giant">Giant</option>
                         
                        </select>                   
                     
                      </div>
                    </div>      
                    <div class="col-md-12">
                      <label for="state">Page Slug</label>
                      <div class="input-group mb-3"> <input type="text"  class="form-control " name="page_slug" value="" required /></div>
                    </div> 
                </div>
                
                  <div class="row">
                    <div class="col-md-6">
                      <label for="state">Overview</label>
                      <div class="input-group mb-3">                    
                       <textarea id="" name="overview" class="form-control summernote"></textarea>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <label for="state">Training</label>
                      <div class="input-group mb-3">                    
                       <textarea id="training" name="training" class="form-control summernote"></textarea>
                    </div>
                  </div>
                
                
                 <div class="row">
                    <div class="col-md-6">
                      <label for="state">Health</label>
                      <div class="input-group mb-3">                    
                       <textarea id="" name="health" class="form-control summernote"></textarea>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <label for="state">Size</label>
                      <div class="input-group mb-3">                    
                       <textarea id="size" name="size" class="form-control summernote"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6 d-none">
                      <label for="state">Owner Experience</label>
                      <div class="input-group mb-3">                    
                       <textarea id="" name="owner_experience" class="form-control summernote"></textarea>
                      </div> 
                </div>
                </div>
                 <div class="row">
                    <div class="col-md-6">
                      <label for="state">Grooming</label>
                      <div class="input-group mb-3">                    
                       <textarea id="grooming" name="grooming" class="form-control summernote"></textarea>
                      </div>
                    </div> 
                    <div class="col-md-6">
                      <label for="state">Exercise</label>
                      <div class="input-group mb-3">                    
                       <textarea id="activity_level" name="activity_level" class="form-control summernote"></textarea>
                      </div>
                    </div>                          

                </div>
                
                 <div class="row">
                    
                    <div class="col-md-6 d-none">
                      <label for="state">Life Span</label>
                      <div class="input-group mb-3">                    
                       <textarea id="life_span" name="life_span" class="form-control summernote"></textarea>
                      </div>
                    </div>                                  

                </div>                
                <div class=" d-none">

                      <div class="col-md-6">
                      <label for="state">Temperament</label>
                      <div class="input-group mb-3">                    
                       <textarea id="did_you_know" name="temperament" class="form-control summernote"></textarea>
                      </div>
                    </div>   
                        <div class="col-md-6">
                      <label for="state">Adaptability</label>
                      <div class="input-group mb-3">                    
                       <textarea id="" name="adaptability" class="form-control summernote"></textarea>
                      </div>
                    </div>
                </div>
                
                <div class=" d-none">
                 
                     <div class="col-md-12">
                      <label for="state">Did You Know?</label>
                      <div class="input-group mb-3">                    
                       <textarea id="did_you_know" name="did_you_know" class="form-control summernote"></textarea>
                      </div>
                    </div>             
                </div>
                      
                <div class="row" style="width:100%">
                        <div class="col-md-6">
                      <label for="state">Upload Image</label>
                      <div class="input-group mb-3">
                        <input type="file" name="image1" required="" class="form-control" >
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="far fa-file-image"></span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="state">Alt tag</label>
                      <div class="input-group mb-3">
                        <input type="text" name="alt_img" required="" class="form-control" >
                       
                      </div>
                    </div>
                    </div>
                    
                      <div class="row" style="width:100%">
                        <div class="col-md-6">
                      <label for="state">Cover Image</label>
                      <div class="input-group mb-3">
                        <input type="file" name="pro_image" required="" class="form-control" >
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="far fa-file-image"></span> </div>
                        </div>
                      </div>
                    </div>
                </div>
                    
                
                 <div class="row" style="width:100%">
                 <div class="col-md-12">
                    <div class="card-header">
                        <h3 class="card-title">
                           Search Engine Optimization
                        </h3>
                </div><br>
                </div>
                </div>
                <div class="row" style="width:100%">
                        <div class="col-md-12">
                      <label for="state">Meta Title</label>
                      <div class="input-group mb-3">
                        <input type="text" name="meta_title"  class="form-control" placeholder="Meta Title">
                        <div class="input-group-append">
                          <div class="input-group-text"> <span class="fab fa-blogger-b"></span> </div>
                        </div>
                      </div>
                    </div>
                  
                   
                    
                    <div class="col-md-12">
                      <label for="state">Meta Description</label>
                      <div class="input-group mb-3">
                     <!--    <input type="text" name="description" id="description" required="" class="form-control" placeholder="Title"> -->
                       <textarea id="meta_description" name="meta_description" class="form-control"></textarea>
                      </div>
                    </div>
                    </div>
                    <div class="row" style="width:100%">
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
        $('.select2').select2();
        $('#form').on('submit', function(e)
        {
         e.preventDefault();        
        
        var baseurl = "<?php echo base_url()?>";      
         $('#submit_btn').prop('disabled',true); 
         $('#submit_btn').empty();
         $('#submit_btn').val('Please Wait...');    
         //var form_data = new FormData(this);     
         var form = $("#form")[0];

		var data = new FormData(form);
                 $.ajax({  

                     url:baseurl+"admin/breeds/save",  
                    method: "post",
        			data: data,
        			enctype: "multipart/form-data",
        			processData: false, // Important!
        			contentType: false,
        			cache: false,
                    dataType:"JSON",

                     success:function(data)  
                     {  console.log(data);
                         if(data.status=='success')
                         {                          
                            toastr.success(data.msg);
                            setTimeout(function(){location.reload(true);}, 100);
                         }
                         else{
                            console.log(data.msg);
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
