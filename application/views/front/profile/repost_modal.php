<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Repost Ad</h5>
            <button type="button" class="close modal-cancel" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
</div>
<?php $attributes = array('name' => 'edit_articles', 'id' => 'edit_repost', 'autocomplete' => 'off', 'class'=>'m-b-1','enctype'=>'multipart/form-data');?>
<?php $hidden = array('_method' => 'edit', '_token' => $post_id, 'ext_name' => $post_id);?>
<?php echo form_open_multipart('frontend/My_ads/repost/'.$post_id, $attributes, $hidden);?>
<div class="modal-body">
   <input type="hidden" name="type" value="edit">
     <input type="hidden" name="post_id" value="<?php echo $post_id?>" >
   <div class="form-group">
       <div class="row">
         <div class="validate col-md-6">
            <label for="name">Price</label>
          
            <?php echo form_input('price', $price, array( 'class' => 'form-control', 'placeholder' => 'Enter Price', 'id' => 'input-puppy_price', 'required'=>'required'));?>
            <div id="error"></div>
         </div>
         <div class="validate col-md-6">
            <label for="name">Asking Price</label>
           
            <?php echo form_input('asking_price', $asking_price, array( 'class' => 'form-control', 'placeholder' => 'Enter Asking Price', 'id' => 'input-asking_price', 'required'=>'required'));?>
            <div id="error"></div>
         </div>
       </div>
      <div class="row">
         <div class="validate col-md-6">
            <label for="name">Available Date</label>
        
        <!--  <input type="text" name="available_date" class="form-control" id="available_date" placeholder="Enter Available Date" value="<?php echo $available_date?>" style="position: relative; float: none; inset: auto; margin: 0px; padding-right: 39.9896px;"> -->
              <input type="text" name="available_date" class="form-control" id="available_date" placeholder="Enter Available Date" value="<?php echo $available_date?>" >
         </div> 
        
      </div>
   </div>
  
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary modal-cancel" data-dismiss="modal">Cancel</button>
<input name="hrsale_form" type="submit" class="btn btn-primary" value="Repost" />
</div>
<?php echo form_close(); ?> 

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>


<script type="text/javascript">
// var j = jQuery.noConflict();

 $(document).ready(function(){

   


      /* Edit data */
      $("#edit_repost").submit(function(e){      
          e.preventDefault();
          var fd = new FormData(this);
         fd.append("is_ajax", 1);
       
         $.ajax({
              url: "<?php echo htmlspecialchars(site_url("frontend/My_ads/repost")); ?>",
            type: "POST",
            data:  fd,
            contentType: false,
            cache: false,
            processData:false,
            dataType: "JSON",
            success: function (data) {
               if (data.status == 'error') {

                    toastr.error('Something went wrong!');

               } else if (data.status == 'success'){
                         Swal.fire("Success", "Ad Reposted Successfully.", "success");
                 window.location.href="<?php echo base_url().'frontend/my_ads'?>";             
                     $('.edit-modal-data').each(function(){
                    $(this).modal('hide');
                });

               }
            }
         });
      });


   });   
</script>