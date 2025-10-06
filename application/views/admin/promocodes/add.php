
<link rel="stylesheet" href="<?=base_url()?>assets/datepicker/css/default/zebra_datepicker.min.css" type="text/css">
      <link rel="stylesheet" href="<?=base_url()?>assets/datepicker/zebrastyle.css" type="text/css">
      <script src="<?=base_url()?>assets/datepicker/zebra_datepicker.min.js"></script>
<script src="<?=base_url()?>assets/datepicker/zebrascript.js"></script>
<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
                <h1 class="m-0 text-dark">Promocodes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard')?>">Home</a></li>
                 <li class="breadcrumb-item"><a href="<?php echo base_url('admin/promocodes')?>">Promocodes</a></li>
                    <li class="breadcrumb-item active">New</li>
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
                           Add New Promocode
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
                      <label for="state">Promocode Name</label>
                      <div class="input-group mb-3">
                        <input type="text" name="promo_code" id="promo_code" required="" class="form-control" placeholder="Title" style="text-transform: uppercase;">
                        
                      </div>
                    </div>
                     <div class="col-md-6">
                      <label for="state">Premium Type</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="premium_type" required="">
                          <option value="0">Select</option>
                          <?php 
                          if(isset($premium_types)&&(!empty($premium_types)))
                          {
                          foreach ($premium_types as $key => $value) { ?>
                             <option value="<?=$value->id?>"><?=$value->title?></option>
                          <?php }
                        }
                          ?>
                        </select>                    
                          
                        </div>
                      </div>
                    </div>
                  
                   <div class="row">
                      <div class="col-md-6">
                      <label for="state">Limit Type</label>
                      <div class="input-group mb-3">
                          <select class="form-control" name="limit_type" required="">
                          <option value="0">Limited</option>
                          <option value="1">Unlimited</option>                    
                          </select>              
                        
                        </div>
                      </div>
                   
                     <div class="col-md-6">
                      <label for="state">Valid From</label>
                      <div class="input-group mb-3">
                         <input type="text" name="valid_from" class="form-control " id="valid_from" placeholder="Enter Valid from Date" >
                          
                        </div>
                      </div>
                    </div>
                   
                   <div class="row">
                      <div class="col-md-6">
                      <label for="state">Valid Till</label>
                      <div class="input-group mb-3">
                         <input type="text" name="valid_till" class="form-control " id="valid_till" placeholder="Enter Valid from Date" value="">
                          
                        </div>
                      </div>
                  
                     <div class="col-md-6">
                      <label for="state">Discount Type</label>
                      <div class="input-group mb-3">
                       <select class="form-control" name="discount_type" required="">
                          <option value="0">Amount</option>
                          <option value="1">Percentage</option>                    
                          </select>              
                          
                        </div>
                      </div>
                    </div>
                 
                   <div class="row">
                      <div class="col-md-6">
                      <label for="state">Amount/Percentage</label>
                      <div class="input-group mb-3">
                       <input type="number" name="amount_percent"  required="" class="form-control" placeholder="Amount/Percentage" step="0.01">                       
                      </div>
                    </div>
                     <div class="col-md-6">
                      <label for="state">Amount Limit</label>
                      <div class="input-group mb-3">
                        <input type="number" name="amount_limit" required="" class="form-control" placeholder="Amount Limit" step="0.01">
                        
                      </div>
                    </div>
                  </div>
                   <div class="row">
                      <div class="col-md-6">
                      <label for="state">Usage Times</label>
                      <div class="input-group mb-3">
                       <input type="number" name="usage_times"  required="" class="form-control" placeholder="Usage Times">                       
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="state">Application Type</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="application_type" required="">
                          <option value="training">Training Only</option>
                          <option value="ad">Ad Posting Only</option>
                          <option value="both">Both Training & Ads</option>
                        </select>
                      </div>
                    </div>
                    </div>  
                 
                 <div class="row">
                    <div class="col-md-6">
                      <label for="state">One Time Per User</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="one_time_per_user">
                          <option value="0">No - Multiple uses allowed</option>
                          <option value="1">Yes - One time only per user</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="state">Status</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="is_active">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <label for="state">Description</label>
                      <div class="input-group mb-3">
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description for this promo code (optional)"></textarea>
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
       $('#valid_from').Zebra_DatePicker({
             format: 'm/d/Y'
        });
         $('#valid_till').Zebra_DatePicker({
          format: 'm/d/Y'
        });

        $('#form').on('submit', function(e)
        {
         e.preventDefault();        
         "use strict";
        var baseurl = "<?php echo base_url()?>";      
         $('#submit_btn').prop('disabled',true); 
         $('#submit_btn').empty();
         $('#submit_btn').val('Please Wait...');    
         //var form_data = new FormData(this);     
         var form = $("#form")[0];

		var data = new FormData(form);
                 $.ajax({  

                     url:baseurl+"admin/Promocodes/save",  
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
