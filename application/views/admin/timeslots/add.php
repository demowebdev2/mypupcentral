
<link rel="stylesheet" href="<?php echo base_url('assets/')?>css/bootstrap-datetimepicker.css" />

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
                    <li class="breadcrumb-item active">Time Slots</li>
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
                           Add New Slot
                        </h3>
                    </div>
                   
                    <?php $attributes = array('class' => '', 'id' => 'form');?>
                    <?php echo form_open_multipart('', $attributes);?>
                    <div class="card-body"><br>
                            <br>
                     <div class="row">
                        <div class="col-md-6">
                      <label for="state">Select Application</label>
                      <div class="input-group mb-3">
                        <select  name="application" required="" class="form-control" >
                          <option value="">Select</option>
                          <option value="ns">NoShed Doodles</option>
                          <option value="pv">Puppy Verify</option>
                        </select>
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                      <label for="state">Title</label>
                      <div class="input-group mb-3">
                        <input type="text" name="title" required="" class="form-control" placeholder="Name">
                        <div class="input-group-append">
                         
                        </div>
                      </div>
                    </div>
                     <div class="col-md-3">
                      <label for="state">Start Time</label>
                    <div class="input-group mb-3">
                        <input type="time" name="start_time" required="" class="form-control" >                 
                      </div>
                    </div>
                     <div class="col-md-3">
                      <label for="state">End Time</label>
                    <div class="input-group mb-3">
                        <input type="time" name="end_time" required="" class="form-control" >                 
                      </div>
                    </div>

                </div>
                 <div class="row">
                      <div class="col-md-6">
                      <label for="state">Price</label>
                      <div class="input-group mb-3">
                        <input type="text" name="price" required="" class="form-control" placeholder="Price">
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

<script src="<?php echo base_url('assets/')?>js/moment-with-locales.js"></script> 
<script src="<?php echo base_url('assets/')?>js/bootstrap-datetimepicker.js"></script> 
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

                     url:baseurl+"admin/Timeslots/save",  
                     type: 'POST',
                     dataType:'JSON',
                    // data: $('#form').serialize(),
                    processData: false,
                    contentType: false,
                     data: form_data,

                     success:function(data)  
                     {  
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
