

	<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
                <h1 class="m-0 text-dark">Time Slots</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url()?>">Home</a></li>
                 <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/timeslots')?>">Time Slots</a></li>
                     <li class="breadcrumb-item active">Edit</li>
                   
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
                          Edit Time Slot
                        </h3>
                    </div>                  
                    <?php $attributes = array('class' => '', 'id' => 'form');?>
                    <?php echo form_open_multipart('', $attributes);?>
                    <div class="card-body"><br>
                            <br>
                   
                   <div class="row">
                      <div class="col-md-6">
                      <label for="state">Title <small>(Readonly)</small></label>
                      <div class="input-group mb-3">
                         <input type="hidden" name="id" class="form-control" placeholder="Name" value="<?php echo $result[0]->id?>">
                        <input type="text" name="title" required="" class="form-control" placeholder="Name" value="<?php echo $result[0]->title?>">
                        <div class="input-group-append">
                         
                        </div>
                      </div>
                    </div>
                     <div class="col-md-3">
                      <label for="state">Start Time  <small>(Readonly)</small> </label>
                    <div class="input-group mb-3">
                        <input type="time" name="start_time" required="" class="form-control" value="<?php echo $result[0]->start_time?>">                 
                      </div>
                    </div>
                     <div class="col-md-3">
                      <label for="state">End Time  <small>(Readonly)</small> </label>
                    <div class="input-group mb-3">
                        <input type="time" name="end_time" required="" class="form-control" value="<?php echo $result[0]->end_time?>" >                 
                      </div>
                    </div>

                </div>
                 <div class="row">
                      <div class="col-md-6">
                      <label for="state">Price</label>
                      <div class="input-group mb-3">
                        <input type="text" name="price" required="" class="form-control" placeholder="Price" value="<?php echo $result[0]->price?>">
                        <div class="input-group-append">
                         
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
                     url:baseurl+"admin/timeslots/edit_save",  
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

    </script> 
