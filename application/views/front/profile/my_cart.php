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
                    
                    <h2 class="title-2"><i class="fa fa-shopping-cart"></i> My Cart </h2>
                    <form id="form" method="POST" >
                        <?php echo $this->customlib->getCSRF(); ?>
                    <div class="table-responsive">

                       <table  class="table table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <!--<th data-type="numeric" data-sort-initial="true">S.No</th>-->
                                    <th>Featured</th>
                                    <th>Ad Title</th>
                                    <th>Payable Price</th>
                                    <th>Available Date</th>
                                    <th data-sort-ignore="true">Ads Details</th>
                                    <th>Action</th>
                                    <th>Select All  <input type="checkbox" name="select_all" class="select_all"></th>
                                                                     
                                </tr>
                            </thead>
                           
                        </table>

                    <div style="float: none;">
                        <div class="price"></div>
                        <input type="hidden" name="total_amount" id="total_amount">
                        <input type="button" id="proceed" class="btn btn-success" name="Proceed to Pay" value="Proceed to Pay" style="background-color:#8cc63f;">
                    </div><br><br>
                    </div>
                </form>
                    <nav>

                    </nav>
                    
                </div>
            </div>


        </div>
    </div>
</div>

<script>

$(document).ready(function() {

var token = "<?= $this->security->get_csrf_hash(); ?>";
var dataTable = $('#datatable').DataTable({

    "processing": true,
    "serverSide": true,
    "responsive":true,
    "aLengthMenu": [
        [30, 100, 500],
        [30, 100, 500]
    ],
    "iDisplayLength": 30,
    "dom": 'lfrtip',
    "ajax": {
        url: "<?php echo base_url() . 'frontend/My_ads/fetch_my_cart'; ?>",
        type: "POST",              
        data: function(data) {
            data.csrf_test_name = token;
        }
    },
    "columnDefs": [{
        "targets": [0, 1, 2,3,4, 5,6],
        "orderable": false,
    }, ],


});

});
</script>
<script type="text/javascript">
    $("body").on("click",".select_all",function(){
         $('input:checkbox').not(this).prop('checked', this.checked);
            var token = "<?= $this->security->get_csrf_hash(); ?>";
        
               $.ajax({
                   type: "post",
                   url: "<?=base_url()?>frontend/My_ads/getallpayable",
                    data: {'csrf_test_name':token},
                   dataType: "json",
                   success: function (response) {
                       if(response.status=='success')
                       {
                        $('#total_amount').val('');
                        $('.price').empty();
                        $('.price').append('<h4><b>Total :$ ' + response.msg + ' </b></h4>');
                        $('#total_amount').val(response.msg);
                       }
                   }
        });
    });
    $("body").on("click",".each_select",function(){
        
        var arr = [];

        $('input:checkbox[class="each_select"]').each(function() 
        {    
            if($(this).is(':checked'))
            {
                var amount = $(this).prev('input').attr('value');
                arr.push(amount);
            }

        });
        var total = 0;
        for (var i = 0; i < arr.length; i++) {
            // total += arr[i] << 0;
            total += parseFloat(arr[i]) ;
        }
        $('#total_amount').val(total);
        $('.price').empty();
        $('.price').append('<h4><b>Total :$ ' + total + ' </b></h4>');
        $('#total_amount').val(total);
        
    });
     $(document).on('click', '#proceed', function() {
        var form = $("#form")[0];
        var data = new FormData(form);
        if ($('input[class="each_select"]:checked').length == 0) {


            var token = "<?= $this->security->get_csrf_hash(); ?>";
        
               $.ajax({
                   type: "post",
                   url: "<?=base_url()?>frontend/My_ads/getallpayable",
                    data: {'csrf_test_name':token},
                   dataType: "json",
                   async: false,
                   success: function (response) {
                       if(response.status=='success')
                       {
                        $('#total_amount').val('');
                        $('.price').empty();
                        $('.price').append('<h4><b>Total :$ ' + response.msg + ' </b></h4>');
                        $('#total_amount').val(response.msg);
                       }
                   }
        });
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>frontend/AdController/add_to_cart_all",
                data: data,
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(response) {
                    $('#proceed').val('');
                    $('#proceed').val('Processing...');
                window.location.replace("<?=base_url()?>frontend/Adcontroller/cart_stripe_payment/"+response.msg);
                   
                }
            });
        } 
        else
        {
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>frontend/AdController/add_to_cart",
                data: data,
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(response) {

                window.location.replace("<?=base_url()?>frontend/Adcontroller/cart_stripe_payment/"+response.msg);
                   
                }
            });
        }
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
                        // window.location.reload();
                    
                    }
                },
                cancel: function () {
                    //$.alert('Canceled!');
                },

            }
        });

            }
</script>

