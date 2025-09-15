<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
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
                    
                    <h2 class="title-2"><i class="fab fa-angellist"></i> My Sold Ads </h2>

                    <div class="table-responsive">

                       <table  class="table table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <!--<th data-type="numeric" data-sort-initial="true">S.No</th>-->
                                    <th>Featured</th>
                                    <th>Ad Title</th>
                                    <th>Contact Person</th>
                                    <th>Available Date</th>
                                    <th data-sort-ignore="true">Ads Details</th>
                                    <th data-sort-ignore="true">Action</th>
                                                                     
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script>
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
         window.location.href="<?php echo base_url().'my_ads'?>";
        
    });
});

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
        url: "<?php echo base_url() . 'frontend/My_ads/fetch_sold_out'; ?>",
        type: "POST",              
        data: function(data) {
            data.csrf_test_name = token;
        }
    },
    //  "scrollY": 500,
    //     "scroller": {
    //         loadingIndicator: true
    //     },
    // "deferRender":    true,
    "columnDefs": [{
        "targets": [0, 1, 2],
        "orderable": false,
    }, ],


});

});
</script>
