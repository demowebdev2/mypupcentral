

<?php  

if(!empty($_GET['nav']))
{
  $nav=$_GET['nav'];
}
else{
  $nav='';
}

?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profile </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<%= baseurl%>admin/dashboard">Home</a></li>
                       
                        <li class="breadcrumb-item active">Profile</li>
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
                          <li class="nav-item"><a class="nav-link <?php if(empty($_GET['nav'])) echo 'active' ?>" href="#activity" data-toggle="tab">My Profile</a></li>
                             <li class="nav-item"><a class="nav-link <?php if($nav=='change_password') echo 'active' ?>  " href="#settings" data-toggle="tab">Change Password</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                      <div class="card-body">
                        <div class="tab-content">
                          <div class="tab-pane <?php if(empty($_GET['nav'])) echo 'active' ?>" id="activity">
                          
        
                            
        
                            <div class="card-body box-profile">
                                <div class="text-center">
                                  <img class="profile-user-img img-fluid img-circle" src="<?= base_url()?>assets/dist/img/user2-160x160.png" alt="User profile picture">
                                </div>
                
                                <h3 class="profile-username text-center"><?=$user->name?></h3>
                
                                <p class="text-muted text-center">Email:<?=$user->email?></p>
                
                                
                
                               
                              </div>
                          </div>
                         
        
                          <div class="tab-pane <?php if($nav=='change_password') echo 'active' ?>" id="settings">
                              <div class="col-md-6">
                              <form id="form1" action="<?php echo site_url('staff/Profile/change_password') ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">     <div class="box-body">

                                    <div class="tshadow mb25 bozero">



                                        <div class="around10">
                                        <?php if ($this->session->flashdata('msg')) { ?>
                                                <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>
                                            <?php echo $this->customlib->getCSRF(); ?>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Current Password</label><small class="req"> *</small>
                                                        <input id="name" name="password" required placeholder="" type="password" class="form-control"  />
                                                       
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">New Password</label><small class="req"> *</small>
                                                        <input id="name" name="newpassword" required placeholder="" type="password" class="form-control"  />
                                                       
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Confirm New Password</label><small class="req"> *</small>
                                                        <input id="name" name="cnewpassword" required placeholder="" type="password" class="form-control"  />
                                                       
                                                    </div>
                                                </div>
                                               

                                                  


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" id="submit_btn" class="btn btn-info pull-right">Save</button>
                                    </div>

                            </form></div>
                          </div>
                          <!-- /.tab-pane -->
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
        $('#save').on('submit', function(e)
        {
         e.preventDefault();
        // alert('fdsd');
         $('#submit_btn').prop('disabled',true); 
         $('#submit_btn').empty();
         $('#submit_btn').append('Please Wait...');
                       
        // var data = new FormData(this);
                 $.ajax({  
                     url:'<%= baseurl%>admin/change_password',  
                     type: 'POST',
                     data: $('#save').serialize(),
                     success:function(data)  
                     {  
                         if(data.status=='success')
                         {
                            toastr.success(data.msg);
                            setTimeout(function(){location.reload(true);}, 500);
                         }
                         else{
                            toastr.error(data.msg);
                            $('#submit_btn').empty();
                             $('#submit_btn').append('Save');
                           $('#submit_btn').prop('disabled',false); 
                
                         }
                       
                     }  
                 }); 
       });
       });
    </script>


