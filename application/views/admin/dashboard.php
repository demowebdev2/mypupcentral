<?php include_once('header.php'); ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
    <section class="content mb-5">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
            <button class="btn btn-success" onclick="delete_recordByurl('<?=base_url()?>Page/expired_ads_notification_cronjob','Send Notification')" title="send notification to all expired ads">Send notification for Expired ads</button>
            <button class="btn btn-danger" onclick="delete_recordByurl('<?=base_url()?>Home/rm_old_assets','Delete')" title="Removing all images and videos from sold ads">Remove old assets</button>
            </div>
            </div>
            </div>
            </section>
            

<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                   <?php 
                   $date42=date('Y-m-d H:i:s', strtotime('-60 days'));
	
		
                  $posts=$this->db->select('posts.*')->from('posts')->where(['uploaded_from'=>'puppyverify.com','reviewed'=>1,'posts.created_at >='=>$date42,'posts.is_sold'=>0])->get()->result(); 
                  ?>
                <h3><?php echo count($posts); ?></h3>

                <p>Active Ads</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?= base_url();?>admin/Ads" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                  <?php 
                  $breeders=$this->db->select('user_accounts.*')->from('user_accounts')->where(['registered_from'=>'puppyverify.com'])->get()->result(); 
                  ?>
                <h3><?php echo count($breeders); ?></h3>

                <p>Breeders</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?= base_url();?>admin/breeders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                 <?php 
                  $breeds=$this->db->select('breeds.*')->from('breeds')->where(['is_puppyverify'=>1])->get()->result(); 
                  ?>
                <h3><?php echo count($breeds); ?></h3>

                <p>Breeds</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url();?>admin/breeds/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>$ <?= $payements ?></h3>

                <p>Payments</p>
              </div>
              <div class="icon">
                <i class="fa fas-dollar"></i>
              </div>
              <a href="<?=base_url()?>admin/slotbookings" class="small-box-footer <?php echo set_Submenu('Time Slot Booking/list'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- list recent ads -->
  <section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                           LATEST ADS
                        </h3>
                        <div class="float-sm-right">
                        <a href="<?=base_url()?>admin/Ads" class="nav-link <?php echo set_Submenu('Ads/list'); ?>">
                       <i class="fas fa-list nav-icon" style="color: white"></i>       
                        </a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>                                      
                                        <th>Title</th>
                                        <th>Puppy Name </th>
                                        <th>Age Type</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th width="5px">Is verified</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php if($latest_ads){
                                    foreach ($latest_ads as $key => $row) { ?>
                                      <tr>
                                        <td> <?=$key+1?></td>
                                        <td> <?=$row->title?><br>
                                          <small>Breeder : <?= $row->breeder_name?></small><br>
                                          <small>Contact Person : <?= $row->contact_person?></small><br>
                                          <small>Phone : <?= $row->contact_phone?></small>
                                          

                                        </td>
                                        <td> <?=$row->puppy_name?></td>
                                        <td> <?=$row->puppy_age?></td>
                                        <td> $<?=$row->asking_price?></td>
                                        <?php if($row->featured_image){
                                          ?>
                                           <td> <img height="75px" width="100px" src="<?php echo base_url('uploads/puppies/').$row->featured_image?>"></td>

                                       <?php } else{ ?>
                                        <td> <img height="75px" width="100px" src="<?php echo base_url('uploads/puppies/no_image.png')?>"></td>

                                       <?php } ?>
                                       


                                       <?php if ($row->reviewed  === '1') { ?>      
    
                                         <td><center><input type="button" value="Active" style ="background-color: green;color: white;"class="tgl_checkbox" data-id="<?php echo $row->id?>" data-status="<?php echo $row->reviewed?>" id="tgl_checkbox_<?php echo $row->id?>"></center></td>
                                       <?php }
                                       else{ ?>
                                       <td><center><input type="button" value="Inactive" style ="background-color: red;color: white;"class="tgl_checkbox" data-id="<?php echo $row->id?>" data-status="<?php echo $row->reviewed?>" id="tgl_checkbox_<?php echo $row->id?>"></center></td>
                                      <?php } ?>
                                      <td><center>
      
                                      <a class="btn btn-default btn-xs" title="View Details" href="<?php echo base_url('admin/ads/view/'). $row->id ?>" target="_blank"><i class="fas fa-eye m-1"></i></a>
                                      <!-- <a class="btn btn-default btn-xs" title="Delete" href="#"   ><i class="fas fa-trash m-1"></i></a> -->
                                      </center></td>                                        
                                    </tr>
                                   <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                          </div>
                        

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</section>
<!-- list breeder reqs -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                           PENDING BREEDER REQUESTS
                        </h3>
                        <div class="float-sm-right">
                        <a href="<?=base_url()?>admin/breeders/pending" class="nav-link <?php echo set_Submenu('Breeders/pending'); ?>">
                       <i class="fas fa-list nav-icon" style="color: white"></i>       
                        </a>
                      </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="table-responsive">
                       <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Name</th>
                                        <th>Phone </th>
                                        <th>Email</th>              
                                        <th>Is Verified</th>                                
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
   
                                <tbody>
                                  <?php if($latest_breeder_req){
                                    foreach ($latest_breeder_req as $key => $row) { ?>
                                      <tr>
                                        <td> <?=$key+1?></td>
                                        <td> <?=$row->name?>
                                        </td>
                                        <td> <?=$row->phone?></td>
                                        <td> <?=$row->email?></td>
                                                                              
                                       <?php if ($row->is_verified  === '1') { ?>      
    
                                         <td><center><input type="button" value="Active" style ="background-color: green;color: white;"class="tgl_checkbox_breeder" data-id="<?php echo $row->id?>" data-status="<?php echo $row->is_verified?>"  data-name="<?php echo $row->name?>" data-email="<?php echo $row->email?>" id="tgl_checkbox_breeder<?php echo $row->id?>"></center></td>
                                       <?php }
                                       else{ ?>
                                       <td><center><input type="button" value="Inactive" style ="background-color: red;color: white;"class="tgl_checkbox_breeder" data-id="<?php echo $row->id?>" data-status="<?php echo $row->is_verified?>" data-name="<?php echo $row->name ?>" data-email="<?php echo $row->email?>" id="tgl_checkbox_breeder<?php echo $row->id?>"></center></td>
                                      <?php } ?>
                                      <td><center>
      
                                      <a class="btn btn-default btn-xs" title="View Details" href="<?php echo base_url('admin/breeders/view/'). $row->id ?>" target="_blank"><i class="fas fa-eye m-1"></i></a>
                                      <!-- <a class="btn btn-default btn-xs" title="Delete" href="#"   ><i class="fas fa-trash m-1"></i></a> -->
                                      </center></td>                                        
                                    </tr>
                                   <?php }
                                    }
                                    else
                                    { ?>
                                      <td colspan="6" ><center>No Pending Requests</center></td>

                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                          </div>
                        

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</section>

<!-- list recent bookings -->
 




      </div>
    </section>


  </div>
  <script type="text/javascript">
    
     $("body").on("click",".tgl_checkbox",function(){
       id = $(this).data('id');
      
         $('#tgl_checkbox_'+id).attr('disabled','disabled'); 
         $('#tgl_checkbox_'+id).empty(); 
         $('#tgl_checkbox_'+id).val('Please Wait...');
    $.post('<?=base_url("admin/ads/change_status")?>',
    {
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
        id : $(this).data('id'),
        status : $(this).data('status'),
    },
    function(data){
        toastr.success('Status changed Successfully.');
          window.location.href="<?php echo base_url().'admin/Dashboard'?>";
        //$.notify("Status Changed Successfully", "success");
    });
});

// breeder approval
 $("body").on("click",".tgl_checkbox_breeder",function(){
       id = $(this).data('id');
      
         $('#tgl_checkbox_breeder'+id).attr('disabled','disabled'); 
         $('#tgl_checkbox_breeder'+id).empty(); 
         $('#tgl_checkbox_breeder'+id).val('Please Wait...');
    $.post('<?=base_url("admin/breeders/change_status")?>',
    {
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
        id : $(this).data('id'),
        status : $(this).data('status'),
        name : $(this).data('name'),
        email : $(this).data('email'),
    },
    function(data){
        toastr.success('Status changed Successfully.');
          window.location.href="<?php echo base_url().'admin/Dashboard'?>";
        //$.notify("Status Changed Successfully", "success");
    });
});
  </script>
<!-- DataTables -->

<script>
   function delete_recordByurl(url, Msg) {
     $.confirm({
       title: Msg,
       content: ' Are you sure you want to continue?',
       draggable: true,
       type: 'red',
       buttons: {
         confirm: {
           btnClass: 'btn-red',
           action: function() {

             $.ajax({
               url: url,
               dataType: "json",
               success: function(res) {

                 $.alert(res.msg);
                
               }
             });
           }
         },
         cancel: function() {

         }
       }
     });
   }

</script>


  <?php include_once('footer.php'); ?>