<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Reviews</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Reviews</li>
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
                               Reviews
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body"><br>
                      
<a href="<?=base_url()?>reviews#review_form" target="_blank" class="btn btn-success mb-3">Add Review</a>

                            <br>

                            <div class="table-responsive">

                                <table class="table table-striped table-hover " id="datatable">
                                    <thead>
                                        <tr>
                                        <th>Sl. No</th>
                                            <th>Breeder/Direct</th>
                                            <th> Name</th>
                                            <th>Email</th>
                                            <th>Message</th>
                                            <th>State</th>
                                            <th>Image</th>
                                             <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                 
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

</div>


<script>
     $(document).ready(function() {
var token = "<?= $this->security->get_csrf_hash(); ?>";
         var dataTable = $('#datatable').DataTable({
             "responsive": true,
             "processing": true,
             "serverSide": true,
             "bLengthChange": true,
             "iDisplayLength": 10,
             "dom": 'lBfrtip',
             buttons: [{
                     extend: 'pdfHtml5',
                     text: '<i class="fas fa-file-pdf"></i>',
                     titleAttr: 'PDF',
                     exportOptions: {
                         columns: ':visible'
                     }
                 },

                 {
                     extend: 'print',
                     text: '<i class="fa fa-print"></i>',
                     titleAttr: 'Print',
                     exportOptions: {
                         columns: ':visible'
                     }
                 },
                 {
                     extend: 'csv',
                     text: '<i class="fas fa-file-csv"></i>',
                     titleAttr: 'CSV',

                     exportOptions: {
                         columns: ':visible'
                     }
                 },
                 {
                     extend: 'excel',
                     text: '<i class="fas fa-file-excel"></i>',
                     titleAttr: 'Excel',
                     exportOptions: {
                         columns: ':visible'
                     }
                 },
                 {
                     extend: 'colvis',
                     text: '<i class="fa fa-columns"></i>',
                     titleAttr: 'Columns',
                     title: $('.download_label').html(),
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
                 url: "<?php echo base_url() . '/admin/Dashboard/fetch_reviews'; ?>",
                 type: "POST",
                 data: function(data) {
                    data.csrf_test_name = token;

                 }
             },
             "columnDefs": [{
                 "targets": [0, 1, 2, 3, 4,5,6,7],
                 "orderable": false,
             }, ],


         });

     });
 </script>

 <script>
    

     function delete_recordById(url, Msg) {
         $.confirm({
             title: 'Delete! ',
             content: 'Are you sure to continue?',
             draggable: true,
             type: 'red',
             typeAnimated: true,
             icon: 'fas fa-exclamation-triangle',
             buttons: {
                 confirm: {
                     btnClass: 'btn-red',
                     action: function() {

                         $.ajax({
                             url: url,
                             dataType: "json",
                             success: function(res) {

                                 alert('Deleted');
                                 $("#datatable").DataTable().ajax.reload();
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