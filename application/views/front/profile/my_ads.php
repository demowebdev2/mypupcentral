<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
<link rel="stylesheet" href="<?=base_url()?>assets/datepicker/css/default/zebra_datepicker.min.css" type="text/css">
      <link rel="stylesheet" href="<?=base_url()?>assets/datepicker/zebrastyle.css" type="text/css">
      <script src="<?=base_url()?>assets/datepicker/zebra_datepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/zebra_pin@latest/dist/zebra_pin.min.js"></script>
<style>
    .Zebra_DatePicker_Icon_Wrapper{
        width:100% !important;
    }
    .Zebra_DatePicker {
    z-index: 9999999 !important;
}

/* Fix for price change layout shift */
#datatable tbody tr {
    height: auto !important;
    min-height: 60px;
}

#datatable tbody td {
    vertical-align: middle !important;
    padding: 8px !important;
}

/* Ensure price column maintains consistent width */
#datatable th:nth-child(6), #datatable td:nth-child(6) {
    width: 120px !important;
    min-width: 120px !important;
    max-width: 120px !important;
}

/* Style for price change elements */
.price_change, .update_price {
    margin: 2px 0 !important;
    font-size: 11px !important;
}

#datatable input[name="asking_price"] {
    width: 80px !important;
    margin: 2px 0 !important;
    font-size: 12px !important;
}
</style>
<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<div class="main-container">
    <div class="container">
        <div class="row">
            
            <?php $this->load->view('front/profile_sidebar'); ?>



            <div class="col-md-9 page-content">
                <?php if($this->session->flashdata('response')): ?>
                        <p><?php echo $this->session->flashdata('response'); ?></p>
                    <?php endif; ?>
                <div class="inner-box">
                    <div class="pull-right">
                         <?php if(!empty($ads)){ ?>
                      
                         <a href="<?=base_url()?>posts/duplicatead/<?=$ads[0]->id?>" style="color:#000" class="btn btn-xs btn-light-blue"><i class = "fas fa-plus"></i>&nbsp;Load Info From Previous Ad</a>
                          <?php } ?>
                        <a href="<?= base_url();?>new_post" class="btn btn-xs " style="background:#8cc63f; color:#fff"><i class = "fas fa-plus"></i>&nbsp;Add New Ad</a>
                        
                       
                    </div>
                    
                    <!-- Bulk Actions -->
                    <div class="bulk-actions-container" style="margin-bottom: 15px; display: none;">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="selected-count" style="font-weight: bold; color: #8cc63f;"></span>
                            </div>
                            <div class="col-md-6 text-right">
                                <div style="display: flex; align-items: center; justify-content: flex-end; gap: 10px;">
                                    <select id="bulk-action-select" class="form-control" style="width: auto; min-width: 120px;">
                                        <option value="">Select Action</option>
                                        <option value="price">Change Price</option>
                                        <option value="adopted">Mark as Adopted</option>
                                        <option value="repost">Repost</option>
                                    </select>
                                    <button id="apply-bulk-action" class="btn btn-sm btn-primary" disabled>Apply</button>
                                    <button id="clear-selection" class="btn btn-sm btn-secondary">Clear</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="title-2"><i class="icon-docs"></i> My ads </h2>

                    <div class="table-responsive">

                       <table  class="table table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <th width="50px">
                                        <input type="checkbox" id="select-all" style="transform: scale(1.2);">
                                    </th>
                                    <!--<th data-type="numeric" data-sort-initial="true">S.No</th>-->
                                    <th>Featured</th>
                                    <th>Ad Title</th>
                                    <th>Contact Person</th>
                                    <th>Available Date</th>
                                    <th data-sort-ignore="true">Ads Details</th>
                                    <th ata-priority="2">Price</th>
                                      <th ata-priority="3">Status</th>
                            
                                    <th data-priority="1">Action</th>
                                </tr>
                            </thead>
                           
                        </table>

                    </div>

                    <nav>

                    </nav>

                </div>
            </div>


        </div>
    </div>
</div>
 <!-- Repost modal  -->
  <div class="modal fade edit-modal-data"  tabindex="-1" role="dialog" aria-labelledby="edit-modal-data" aria-hidden="true" id="edit-modal" style="z-index: 99999">
   <div class="modal-dialog" role="document">
    <div class="modal-content ajax_content" id="ajax_modal"></div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function() {

var token = "<?= $this->security->get_csrf_hash(); ?>";
var dataTable = $('#datatable').DataTable({

    "processing": true,
    "serverSide": true,
    "responsive":true,
    "aLengthMenu": [
        [ 100,200, 500],
        [ 100,200, 500]
    ],
    "iDisplayLength": 100,
    "dom": 'lfrtip',
    "ajax": {
        url: "<?php echo base_url() . 'frontend/My_ads/fetch_all_ads'; ?>",
        type: "POST",              
        data: function(data) {
            data.csrf_test_name = token;
        }
    },
    //  "scrollY": 600,
    //   "scrollResize": true,
    // //   "scrollCollapse": true,
     
    //     "scroller": {
    //          loadingIndicator: true
    //     },
    "deferRender":    true,
    "columnDefs": [{
        "targets": [0, 1, 2],
        "orderable": false,
    }, ],


});

});
</script>
<script>


    function delete_recordById(url) {
        $.confirm({
            title: 'Delete!',
            content: 'Are you sure to continue?',
            buttons: {
                confirm: {
                    text: 'Delete',
                    btnClass: 'btn-red',
                    action:function() {
                        window.location.replace(url);
                    
                    }
                },
                cancel: function () {
                    //$.alert('Canceled!');
                },

            }
        });

            }
$("body").on("click",".tgl_checkbox",function(){
       id = $(this).data('id');
      
         $('#tgl_checkbox_'+id).attr('disabled','disabled'); 
         $('#tgl_checkbox_'+id).empty(); 
         $('#tgl_checkbox_'+id).val('Please Wait...');   
    $.post('<?=base_url("my_ads/change_status")?>',
    {
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
        id : $(this).data('id'),
        status : $(this).data('status'),
      
    },
    function(data){
         Swal.fire("Success", "Status Changed.", "success");
        //  window.location.href="<?php echo base_url().'my_ads'?>";
         var dt = $("#datatable").DataTable();
        dt.ajax.reload(null, false);
        
    });
});
$("body").on("click",".edit-modal-button",function(){
     //   var button = $(event.relatedTarget);
        var post_id = $(this).data('post_id');
        var getUrl = "<?= base_url('')?>";    
        var url = getUrl+"frontend/My_ads/read_repost/"+post_id;
        
          $.confirm({
            title: 'Repost',
            content: 'Are you sure to continue?',
            buttons: {
                confirm: {
                    text: 'Add to cart',
                    btnClass: 'btn-green',
                    action:function() {
                         window.location.replace(url);
                    
                    }
                },
                cancel: function () {
                    //$.alert('Canceled!');
                },

            }
        });
        
      
        // $.ajax({
        // url : getUrl+"frontend/My_ads/read_repost",
        // type: "GET",
        // data: escapeHtmlSecure('jd=1&is_ajax=1&mode=modal&type=edit&data=article&post_id='+post_id),
        // success: function (response) {
        //     if(response) {  
                      
        //       $("#ajax_modal").html(response);
        //       $('#edit-modal').modal('show'); 
        //       $('#available_date').Zebra_DatePicker({
        //     direction: 1,
        //     format: 'm/d/Y'
        //   });    
        //     }
        // }
        // });
});
 $("body").on("click",".modal-cancel",function(){
     $('#edit-modal').modal('hide'); 
 });
//  $("body").on("click",".duplicate",function(){
//   Swal.fire("Success", "Duplicate created successfully.Now you can edit Ad details.", "success");
// });

$("body").on("click",".price_change",function(){
    var post_id = $(this).prev('input').attr('value');
    
    $("#asking_price_"+post_id).removeClass('d-none');
    $("#update_price_"+post_id).removeClass('d-none');
    $("#price_change_"+post_id).addClass('d-none');
        $("#update_price_"+post_id).click(function () {
          var asking_price = $("#asking_price_"+post_id).val();
          
            $.post('<?=base_url("my_ads/price_update")?>',
            {
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
                post_id : post_id,
                asking_price : asking_price,
              
            },
            function(data){
                Swal.fire("Success", "Price Changed.", "success");
                var dt = $("#datatable").DataTable();
                dt.ajax.reload(null, false);
                
            });
        });
    
});

// Bulk Actions JavaScript
$(document).ready(function() {
    // Select All functionality
    $('#select-all').change(function() {
        var isChecked = $(this).is(':checked');
        $('.ad-checkbox').prop('checked', isChecked);
        updateBulkActions();
    });

    // Individual checkbox change
    $(document).on('change', '.ad-checkbox', function() {
        updateBulkActions();
        updateSelectAllState();
    });

    // Update bulk actions visibility and count
    function updateBulkActions() {
        var selectedCount = $('.ad-checkbox:checked').length;
        var $bulkContainer = $('.bulk-actions-container');
        var $selectedCount = $('.selected-count');
        var $applyBtn = $('#apply-bulk-action');

        if (selectedCount > 0) {
            $bulkContainer.show();
            $selectedCount.text(selectedCount + ' ad(s) selected');
            $applyBtn.prop('disabled', false);
        } else {
            $bulkContainer.hide();
            $applyBtn.prop('disabled', true);
        }
    }

    // Update select all checkbox state
    function updateSelectAllState() {
        var totalCheckboxes = $('.ad-checkbox').length;
        var checkedCheckboxes = $('.ad-checkbox:checked').length;
        var $selectAll = $('#select-all');

        if (checkedCheckboxes === 0) {
            $selectAll.prop('indeterminate', false).prop('checked', false);
        } else if (checkedCheckboxes === totalCheckboxes) {
            $selectAll.prop('indeterminate', false).prop('checked', true);
        } else {
            $selectAll.prop('indeterminate', true);
        }
    }

    // Clear selection
    $('#clear-selection').click(function() {
        $('.ad-checkbox').prop('checked', false);
        $('#select-all').prop('checked', false).prop('indeterminate', false);
        $('#bulk-action-select').val('');
        updateBulkActions();
    });

    // Apply bulk action
    $('#apply-bulk-action').click(function() {
        var action = $('#bulk-action-select').val();
        var selectedAds = $('.ad-checkbox:checked');
        
        if (!action) {
            Swal.fire("Error", "Please select an action", "error");
            return;
        }

        if (selectedAds.length === 0) {
            Swal.fire("Error", "Please select at least one ad", "error");
            return;
        }

        // Validate action-specific requirements
        if (action === 'repost') {
            var expiredAds = selectedAds.filter(function() {
                return parseInt($(this).data('days-left')) > 45;
            });
            
            if (expiredAds.length === 0) {
                Swal.fire("Error", "Repost is only available for expired ads (more than 45 days old)", "error");
                return;
            }
        }

        // Show confirmation dialog
        var actionText = action === 'price' ? 'Change Price' : 
                        action === 'adopted' ? 'Mark as Adopted' : 'Repost';
        
        Swal.fire({
            title: 'Confirm Bulk Action',
            text: `Are you sure you want to ${actionText.toLowerCase()} ${selectedAds.length} ad(s)?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                executeBulkAction(action, selectedAds);
            }
        });
    });

    // Execute bulk action
    function executeBulkAction(action, selectedAds) {
        var postIds = [];
        selectedAds.each(function() {
            postIds.push($(this).data('post-id'));
        });

        var data = {
            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            post_ids: postIds,
            action: action
        };

        if (action === 'price') {
            // Show price input dialog
            Swal.fire({
                title: 'Enter New Price',
                input: 'number',
                inputAttributes: {
                    min: 0,
                    step: 0.01
                },
                showCancelButton: true,
                confirmButtonText: 'Update Price',
                preConfirm: (price) => {
                    if (!price || price <= 0) {
                        Swal.showValidationMessage('Please enter a valid price');
                    }
                    return price;
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    data.new_price = result.value;
                    performBulkAction('bulk_price_update', data);
                }
            });
        } else {
            var url = action === 'adopted' ? 'bulk_mark_adopted' : 'bulk_repost';
            performBulkAction(url, data);
        }
    }

    // Perform the actual bulk action
    function performBulkAction(url, data) {
        $.post('<?=base_url("frontend/My_ads/")?>' + url, data, function(response) {
            // Parse JSON response if it's a string
            if (typeof response === 'string') {
                try {
                    response = JSON.parse(response);
                } catch (e) {
                    console.error('Error parsing JSON response:', e);
                    Swal.fire("Error", "Invalid response from server", "error");
                    return;
                }
            }
            
            if (response && response.success) {
                Swal.fire("Success", response.message, "success");
                var dt = $("#datatable").DataTable();
                dt.ajax.reload(null, false);
                $('#clear-selection').click(); // Clear selection
            } else {
                Swal.fire("Error", response.message || "An error occurred", "error");
            }
        }).fail(function(xhr, status, error) {
            console.error('AJAX Error:', status, error);
            console.error('Response:', xhr.responseText);
            Swal.fire("Error", "An error occurred while processing the request", "error");
        });
    }
});
</script>