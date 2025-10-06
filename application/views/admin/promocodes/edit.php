
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
                           Edit Promocode
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- <form id="form" action="" name="form" accept-charset="utf-8" enctype="multipart/form-data"> -->
                    <?php $attributes = array('class' => '', 'id' => 'form');?>
                    <?php echo form_open_multipart('', $attributes);?>
                    <div class="card-body"><br>
                            <br>
                       <input type="hidden" name="id" class="form-control" placeholder="Title" value="<?=$result[0]->id?>">      
                    <div class="row">
                            
                      <div class="col-md-6">
                      <label for="state">Promocode Name</label>
                      <div class="input-group mb-3">
                        <input type="text" name="promo_code" id="promo_code" required="" class="form-control" placeholder="Title" value="<?=$result[0]->promo_code?>" style="text-transform: uppercase;">
                      
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
                             <option value="<?=$value->id?>" <?php if($value->id==$result[0]->premium_type_id) echo 'selected'?>><?=$value->title?></option>
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
                           <option value="0" <?php if($result[0]->limit_type==0) echo 'selected'?>>Limited</option>
                          <option value="1" <?php if($result[0]->limit_type==1) echo 'selected'?> >Unlimited</option>                    
                          </select>              
                        
                        </div>
                      </div>
                   
                     <div class="col-md-6">
                      <label for="state">Valid From</label>
                      <div class="input-group mb-3">
                         <input type="text" name="valid_from" class="form-control " id="valid_from" placeholder="Enter Valid from Date" value="<?=$result[0]->valid_from?>" >
                          
                        </div>
                      </div>
                    </div>
                   
                   <div class="row">
                      <div class="col-md-6">
                      <label for="state">Valid Till</label>
                      <div class="input-group mb-3">
                         <input type="text" name="valid_till" class="form-control " id="valid_till" placeholder="Enter Valid from Date" value="<?=$result[0]->valid_till?>">
                          
                        </div>
                      </div>
                  
                     <div class="col-md-6">
                      <label for="state">Discount Type</label>
                      <div class="input-group mb-3">
                       <select class="form-control" name="discount_type" required="">
                          <option value="0" <?php if($result[0]->discount_type==0) echo 'selected'?>>Amount</option>
                          <option value="1" <?php if($result[0]->discount_type==1) echo 'selected'?>>Percentage</option>                    
                          </select>              
                          
                        </div>
                      </div>
                    </div>
                 
                   <div class="row">
                      <div class="col-md-6">
                      <label for="state">Amount/Percentage</label>
                      <div class="input-group mb-3">
                        <?php if($result[0]->amount>0)
                        { ?>
                          <input type="number" name="amount_percent"  required="" class="form-control" placeholder="Amount/Percentage" value="<?php echo $result[0]->amount?>" step="0.01">     
                        <?php } 
                        else
                          { ?>
                               <input type="number" name="amount_percent"  required="" class="form-control" placeholder="Amount/Percentage" value="<?php echo $result[0]->percentage?>" step="0.01">     
                          <?php }  ?>
                                     
                      </div>
                    </div>
                     <div class="col-md-6">
                      <label for="state">Amount Limit</label>
                      <div class="input-group mb-3">
                        <input type="number" name="amount_limit" required="" class="form-control" placeholder="Amount Limit" value="<?php echo $result[0]->amount_limit?>">
                        
                      </div>
                    </div>
                  </div>
                   <div class="row">
                      <div class="col-md-6">
                      <label for="state">Usage Times</label>
                      <div class="input-group mb-3">
                       <input type="number" name="usage_times"  required="" class="form-control" placeholder="Usage Times" value="<?php echo $result[0]->usage_times?>">                       
                      </div>
                    </div>
                    </div>  
                 
                
                 <div class="row">
                    <div class="col-md-6">
                      <label for="state">Application Type</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="application_type" required="">
                          <option value="training" <?php if($result[0]->application_type=='training') echo 'selected'?>>Training Only</option>
                          <option value="ad" <?php if($result[0]->application_type=='ad') echo 'selected'?>>Ad Posting Only</option>
                          <option value="both" <?php if($result[0]->application_type=='both') echo 'selected'?>>Both Training & Ads</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="state">One Time Per User</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="one_time_per_user">
                          <option value="0" <?php if($result[0]->one_time_per_user==0) echo 'selected'?>>No - Multiple uses allowed</option>
                          <option value="1" <?php if($result[0]->one_time_per_user==1) echo 'selected'?>>Yes - One time only per user</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <label for="state">Status</label>
                      <div class="input-group mb-3">
                        <select class="form-control" name="is_active">
                          <option value="1" <?php if($result[0]->is_active==1) echo 'selected'?>>Active</option>
                          <option value="0" <?php if($result[0]->is_active==0) echo 'selected'?>>Inactive</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <label for="state">Description</label>
                      <div class="input-group mb-3">
                        <textarea name="description" class="form-control" rows="3" placeholder="Enter description for this promo code (optional)"><?php echo isset($result[0]->description) ? $result[0]->description : ''; ?></textarea>
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

                     url:baseurl+"admin/promocodes/edit_save",  
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
