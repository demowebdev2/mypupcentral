<style>
  .switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 30px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}  

</style>

	<div class="content-wrapper">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                
                <h1 class="m-0 text-dark">PENDING APPROVAL</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item active">Pending Approval</li>
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
                           PENDING REQUESTS
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body"><br>
                            <br>
                       <table class="table table-striped table-bordered table-hover" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Post Id</th>
                                        <th>Title</th>
                                        <th>Contact </th>
                                        <th>Phone</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th width="5px">Is verified</th>
                                        <th class="no-print">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

    </div>
</section>

</div>
<script>
    $(document).ready(function() {

        var token = "<?= $this->security->get_csrf_hash(); ?>";
        var dataTable = $('#datatable').DataTable({

            "processing": true,
            "serverSide": true,
            "aLengthMenu": [
                [10, 10, 100, 500],
                [10, 10, 100, 500]
            ],
            "iDisplayLength": 10,
            "dom": 'Blfrtip',
            "buttons": [

                {
                    extend: 'excelHtml5',
                    text: '<i class="far fa-file-excel"></i>',
                    titleAttr: 'Excel',

                   // title: $('.download_label').html(),
                    title: 'Ads List',
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'csvHtml5',
                    text: '<i class="fas fa-file-csv"></i>',
                    titleAttr: 'CSV',
                    title: $('.download_label').html(),
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'pdfHtml5',
                    text: '<i class="fas fa-file-pdf"></i>',
                    titleAttr: 'PDF',
                     title: 'Ads List',
                    exportOptions: {
                        columns: ':visible'

                    }
                },

                {
                    extend: 'print',
                    text: '<i class="fa fa-print"></i>',
                    titleAttr: 'Print',
                    title: 'Ads List',
                    customize: function(win) {
                        $(win.document.body)
                            .css('font-size', '10pt');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    },
                    exportOptions: {
                        columns: ':visible'
                    }
                },

                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i>',
                    titleAttr: 'Columns',
                    title: 'Ads List',
                    postfixButtons: ['colvisRestore']
                },
            ],
            "language": {
                search: '<b>Search : <b>',
                searchPlaceholder: 'Search ',
                infoFiltered: ""
            },
            "search": {
                "addClass": 'form-control'
            },

            "ajax": {
                url: "<?php echo base_url() . 'admin/ads/fetch_pending'; ?>",
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
        // $.fn.dataTable.ext.errMode = 'throw';
    });
     $("body").on("click",".tgl_checkbox",function(){
       id = $(this).data('id');
      
         $('#tgl_checkbox_'+id).attr('disabled','disabled'); 
         $('#tgl_checkbox_'+id).empty(); 
         $('#tgl_checkbox_'+id).val('Please Wait...');   
    $.post('<?=base_url("admin/ads/change_status")?>',
    {
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
        id : $(this).data('id'),
        status : $(this).is(':checked')==true?1:0
    },
    function(data){
        toastr.success('Status changed Successfully.');
        window.location.href="<?php echo base_url().'admin/ads/'?>";
    });
});
</script>
