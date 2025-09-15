<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<div class="main-container">
    <div class="container">
        <div class="row">

            <?php $this->load->view('front/profile_sidebar'); ?>



            <div class="col-md-9 page-content">
                <div class="inner-box">
                    <div class="pull-right">
                        <!-- <a href="<?= base_url(); ?>new_post" class="btn btn-xs btn-success"><i class = "fas fa-plus"></i>&nbsp;Add New Ad</a> -->
                    </div>
                    <h2 class="title-2"><i class="icon-money"></i> Transactions </h2>
                    <div class="card card-default">
                    <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered" id="datatable">
                            <thead>
                                <tr>
                                    <!--<th data-type="numeric" data-sort-initial="true">S.No</th>-->
                                    <th>Id</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>

                        </table>

                    </div>
                    </div>
                </div>

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
        [10, 100, 500],
        [10, 100, 500]
    ],
    "iDisplayLength": 10,
    "dom": 'lfrtip',
    "ajax": {
        url: "<?php echo base_url() . 'frontend/My_ads/fetch_transactions'; ?>",
        type: "POST",              
        data: function(data) {
            data.csrf_test_name = token;
        }
    },
    "columnDefs": [{
        "targets": [0, 1, 2],
        "orderable": false,
    }, ],


});

});
</script>