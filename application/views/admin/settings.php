
<?php

if (!empty($_GET['nav'])) {
    $nav = $_GET['nav'];
} else {
    $nav = '';
}

?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Settings </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<%= baseurl%>admin/dashboard">Home</a></li>

                        <li class="breadcrumb-item active">Settings</li>
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
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link <?php if (empty($_GET['nav'])) echo 'active' ?>" href="#activity" data-toggle="tab">General Info</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($nav == 'logo') echo 'active' ?>  " href="#logo" data-toggle="tab">Logo</a></li>
                                <li class="nav-item"><a class="nav-link <?php if ($nav == 'social') echo 'active' ?>  " href="#social" data-toggle="tab">Social Media</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane <?php if (empty($_GET['nav'])) echo 'active' ?>" id="activity">




                                    <div class="card-body box-profile">
                                    <form id="form" action="" name="form" accept-charset="utf-8" enctype="multipart/form-data">
                                            <div class="box-body">

                                                <div class="tshadow mb25 bozero">
                                                    <div class="around10">
                                                        <?php if ($this->session->flashdata('msg')) { ?>
                                                            <?php echo $this->session->flashdata('msg') ?>
                                                        <?php } ?>
                                                        <?php echo $this->customlib->getCSRF(); ?>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Company Name</label><small class="req"> *</small>
                                                                    <input id="name" name="company_name" placeholder="Company Name" type="text" class="form-control" required="" value="<?=$settings->company_name?>"/>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Address</label><small class="req"> *</small>
                                                                    <input id="address" name="address" placeholder="Address" value="<?=$settings->address_line_one?>" type="text" class="form-control" required="" />

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Address Line Two</label><small class="req"> *</small>
                                                                    <input id="address_ln_two" name="address_ln_two" value="<?=$settings->address_line_two?>" placeholder="Address Line Two" type="text" class="form-control" required="" />

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">City</label><small class="req"> *</small>
                                                                    <input id="city" name="city" value="<?=$settings->city?>" placeholder="City" type="text" class="form-control" required="" />

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">State</label><small class="req"> *</small>
                                                                    <input id="state" name="state" value="<?=$settings->state?>" placeholder="State" type="text" class="form-control" required="" />

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Country</label><small class="req"> *</small>
                                                                    <input id="country" name="country"  value="<?=$settings->country?>" placeholder="Country" type="text" class="form-control" required="" />

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Pincode</label><small class="req"> *</small>
                                                                    <input id="zip_code" name=" zip_code"  value="<?=$settings->zip_code?>" placeholder="Pincode" type="text" class="form-control" required="" />

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Email</label><small class="req"> *</small>
                                                                    <input id="email" name="email" value="<?=$settings->email?>" placeholder="Email" type="email" class="form-control" required="" />

                                                                </div>
                                                            </div>


                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Phone</label><small class="req"> *</small>
                                                                    <input id="phone" name="phone"  value="<?=$settings->phone?>"placeholder="Phone" type="text" class="form-control" required="" />

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                <input type="button" id="submit_btn_general" class="btn btn-info pull-right" value="SAVE">
                                            </div>

                                        </form>


                                    </div>
                                </div>


                                <div class="tab-pane <?php if ($nav == 'logo') echo 'active' ?>" id="logo">
                                    <div class="col-md-6">
                                       <?php $attributes = array('class' => '', 'id' => 'form-logo');?>
                                        <?php echo form_open_multipart('', $attributes);?>
                                            <div class="box-body">

                                                <div class="tshadow mb25 bozero">



                                                    <div class="around10">
                                                        <?php if ($this->session->flashdata('msg')) { ?>
                                                            <?php echo $this->session->flashdata('msg') ?>
                                                        <?php } ?>
                                                        <?php echo $this->customlib->getCSRF(); ?>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Logo </label><small class="req"> *</small>
                                                                    <input name="image1" required type="file" class="form-control" />

                                                                </div>
                                                            </div>

                                                                                                                    

                                                        </div>
                                                           <div class="form-group">
              
                                                          <?php if(!empty($settings->company_logo)){ ?>                   
                                                         <div class="col-sm-6">              
                                                         <div id="image_1_<?php echo $settings->id; ?>">
                                                         <img src="<?php echo base_url('uploads/company/').$settings->company_logo; ?>" height="100" width="120">
                                                        <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImg('<?php echo $settings->id; ?>','company_logo')">delete</a>
                                                        </div>               
                                                        </div>
                                                        <?php } ?>
                                                         </div> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                                 <input type="submit" id="submit_btn_logo" class="btn btn-info pull-right" value="SAVE">
                                            </div>

                                       <?php echo form_close()?>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->


                                <div class="tab-pane <?php if ($nav == 'social') echo 'active' ?>" id="social">




                                    <div class="card-body box-profile">
                                    <?php $attributes = array('class' => '', 'id' => 'form-social');?>
                                        <?php echo form_open('', $attributes);?>
                                            <div class="box-body">

                                                <div class="tshadow mb25 bozero">
                                                    <div class="around10">
                                                        <?php if ($this->session->flashdata('msg')) { ?>
                                                            <?php echo $this->session->flashdata('msg') ?>
                                                        <?php } ?>
                                                        <?php echo $this->customlib->getCSRF(); ?>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Facebook</label><small class="req"> *</small>
                                                                    <input name="facebook" placeholder="Facebook" type="url" class="form-control" value="<?=$social->facebook?>" />

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Twitter</label><small class="req"> *</small>
                                                                    <input name="twitter" placeholder="Twitter" type="url" class="form-control" value="<?=$social->twitter?>"/>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">Instagram</label><small class="req"> *</small>
                                                                    <input name="instagram"  placeholder="Instagram" type="url" class="form-control" value="<?=$social->instagram?>"/>

                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputEmail1">LinkedIn</label><small class="req"> *</small>
                                                                    <input name="linkedin"  placeholder="LinkedIn" type="url" class="form-control" value="<?=$social->linkedin?>"/>

                                                                </div>
                                                            </div>





                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="box-footer">
                                               <input type="submit" id="submit_btn_social" class="btn btn-info pull-right" value="SAVE">
                                            </div>

                                        </form>





                                    </div>
                                </div>
                                

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
            </div>



        </div>
    </section>

</div>


 
<script>
    
    $(document).ready(function(){  
        $('#submit_btn_general').on('click', function(e)
        {
         e.preventDefault();

         var email = $('#email').val();
         if(IsEmail(email)==false){
                alert('Please Enter valid Email Address');
                return false;
            }
        var baseurl = "<?php echo base_url()?>";      
         $('#submit_btn_general').prop('disabled',true); 
         $('#submit_btn_general').empty();
         $('#submit_btn_general').val('Please Wait...');    
        // var data = new FormData(this);
                 $.ajax({  
                     url:baseurl+"admin/admin/save_settings",  
                     type: 'POST',
                     dataType:'JSON',
                     data: $('#form').serialize(),
                     success:function(data)  
                     {  
                         if(data.status=='success')
                         {                          
                            toastr.success(data.msg);
                            setTimeout(function(){location.reload(true);}, 100);
                         }
                         else{
                            toastr.error(data.msg);
                            $('#submit_btn_general').empty();
                            $('#submit_btn_general').val('Save');
                            $('#submit_btn_general').prop('disabled',false); 
                
                         }
                       
                     }  
                 }); 
       });
    $('#form-logo').on('submit', function(e)
        {
         e.preventDefault();
    
        var baseurl = "<?php echo base_url()?>";  

         $('#submit_btn_logo').prop('disabled',true); 
         $('#submit_btn_logo').empty();
         $('#submit_btn_logo').val('Please Wait...');    
                 var form_data = new FormData(this);    
                 $.ajax({  
                     url:baseurl+"admin/admin/save_logo",  
                     type: 'POST',
                     dataType:'JSON',
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
                            toastr.error(data.msg);
                            $('#submit_btn_logo').empty();
                            $('#submit_btn_logo').val('Save');
                            $('#submit_btn_logo').prop('disabled',false); 
                
                         }
                       
                     }  
                 }); 
       });
    $('#form-social').on('submit', function(e)
        {
         e.preventDefault();
    
        var baseurl = "<?php echo base_url()?>";  

         $('#submit_btn_social').prop('disabled',true); 
         $('#submit_btn_social').empty();
         $('#submit_btn_social').val('Please Wait...');    
               //  var form_data = new FormData(this);    
                 $.ajax({  
                     url:baseurl+"admin/admin/save_social",  
                     type: 'POST',
                     dataType:'JSON',
                     data: $('#form-social').serialize(),
                     success:function(data)  
                     {  
                         if(data.status=='success')
                         {                          
                            toastr.success(data.msg);
                            setTimeout(function(){location.reload(true);}, 100);
                         }
                         else{
                            toastr.error(data.msg);
                            $('#submit_btn_social').empty();
                            $('#submit_btn_social').val('Save');
                            $('#submit_btn_social').prop('disabled',false); 
                
                         }
                       
                     }  
                 }); 
       });
       });
     function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test(email)) {
           return false;
        }else{
           return true;
        }
      }
function deleteImg(id,columname){
     var result = confirm("Do you want to delete the logo ?");
    if(result){
     
        $.post('<?=base_url("admin/admin/deleteImage")?>',
    {
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
    id : id,
    columname:columname,
  
    },
  function(resp){  
     $('#image_1_'+id).remove();
     toastr.success('Logo deleted successfully.');   
  });
    }    
} 
    </script> 


