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

    .material-switch>input[type="checkbox"] {
        display: none;
    }

    .material-switch>label {
        cursor: pointer;
        height: 0px;
        position: relative;
        width: 40px;
    }

    .material-switch>label::before {
        background: rgb(0, 0, 0);
        box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
        border-radius: 8px;
        content: '';
        height: 16px;
        margin-top: -8px;
        position: absolute;
        opacity: 0.3;
        transition: all 0.4s ease-in-out;
        width: 40px;
    }

    .material-switch>label::after {
        background: rgb(255, 255, 255);
        border-radius: 16px;
        box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
        content: '';
        height: 24px;
        left: -4px;
        margin-top: -8px;
        position: absolute;
        top: -4px;
        transition: all 0.3s ease-in-out;
        width: 24px;
    }

    .material-switch>input[type="checkbox"]:checked+label::before {
        background: inherit;
        opacity: 0.5;
        background: #28a745;
    }

    .material-switch>input[type="checkbox"]:checked+label::after {
        background: inherit;
        left: 20px;
        background: #28a745;
    }
</style>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Breeders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Breeders</li>
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
                                Breeders
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-3">
                                    <label for="sortOrder">Sort By:</label>
                                    <select id="sortOrder" class="form-control">
                                        <option value="recent">Most Recently Added</option>
                                        <option value="alphabetical">Alphabetical (A-Z)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>Sr.no</th>
                                            <th>ID#</th>
                                            <th>Name</th>
                                            <th>Phone </th>
                                            <th>Email</th>
                                            <th>Is Privileged</th>
                                            <th>Staff</th>

                                            <th>Is Verified</th>
                                            <th class="no-print">Sign In</th>
                                            <th class="no-print">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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

</div>
<script>
    $(document).ready(function() {

        var token = "<?= $this->security->get_csrf_hash(); ?>";
        
        // Get saved preferences from localStorage
        var savedLength = localStorage.getItem('breeders_table_length') || 100;
        var savedSortOrder = localStorage.getItem('breeders_sort_order') || 'recent';
        
        // Set the sort dropdown to saved value
        $('#sortOrder').val(savedSortOrder);
        
        // Determine initial order based on saved sort preference
        var initialOrder = savedSortOrder === 'alphabetical' ? [[2, 'asc']] : [[1, 'desc']];
        
        var dataTable = $('#datatable').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "aLengthMenu": [
                [100, 500, 1000],
                [100, 500, 1000]
            ],
            "iDisplayLength": parseInt(savedLength),
            "order": initialOrder,
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
                url: "<?php echo base_url() . 'admin/breeders/fetch'; ?>",
                type: "POST",
                data: function(data) {
                    data.csrf_test_name = token;

                }
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, ],
            "stateSave": false


        });
        
        // Save page length when changed
        $('#datatable').on('length.dt', function(e, settings, len) {
            localStorage.setItem('breeders_table_length', len);
        });
        
        // Handle sort order change
        $('#sortOrder').on('change', function() {
            var sortValue = $(this).val();
            localStorage.setItem('breeders_sort_order', sortValue);
            
            if (sortValue === 'alphabetical') {
                // Sort by Name column (index 2) ascending
                dataTable.order([2, 'asc']).draw();
            } else {
                // Sort by ID column (index 1) descending (most recent)
                dataTable.order([1, 'desc']).draw();
            }
        });

    });
    $("body").on("click", ".tgl_checkbox", function() {
        id = $(this).data('id');



        var email = $(this).data('email');
        var name = $(this).data('name');

        var status = $(this).data('status');
        if (status == 1) {
            var type = 'red';
            var btn = 'btn-red';
            var title = 'Block Account!'
        } else {
            var type = 'green';
            var btn = 'btn-green';
            var title = 'Activate Account!'
        }

        $.confirm({
            title: title,
            content: 'Are you sure to continue?',
            type: type,
            typeAnimated: true,
            buttons: {
                confirm: {
                    btnClass: btn,
                    action: function() {
                        $('#tgl_checkbox_' + id).attr('disabled', 'disabled');
                        $('#tgl_checkbox_' + id).empty();
                        $('#tgl_checkbox_' + id).val('Please Wait...');
                        $.post('<?= base_url("admin/breeders/change_status") ?>', {
                                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                                id: id,
                                status: status,
                                email: email,
                                name: name,
                            },
                            function(data) {
                                $.alert(data);
                                $('#datatable').DataTable().ajax.reload(null, false);

                            });

                    }

                },
                cancel: function() {
                    $.alert('Canceled!');
                },

            }
        });

    });



    $(document).on('click', '.edit_assigned_admin', function(e) {
        e.preventDefault();
        var stafflist = <?= json_encode($staff) ?>;
        var id = $(this).attr("id");
        var adminid = $(this).data('adminid');
        var name = $(this).data('name');
        var options = '<option value="0">Not Assigned</option>';

        $.each(stafflist, function(key, val) {
            if (val.id == adminid) {
                options += '<option selected value="' + val.id + '">' + val.name + '</option>';
            } else {
                options += '<option  value="' + val.id + '">' + val.name + '</option>';
            }

        });


        $.confirm({
            title: 'Assign Staff to ' + name,
            type: 'green',
            typeAnimated: true,
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Choose Staff</label>' +
                '<select class="admin form-control" required>' +
                options +
                '</select>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Submit',
                    btnClass: 'btn-green',
                    action: function() {
                        var admin = this.$content.find('.admin').val();
                        if (!admin) {
                            $.alert('provide a valid name');
                            return false;
                        }

                        $.ajax({
                            type: "POST",
                            url: "<?= base_url() ?>admin/Breeders/assign_staff_tobreeder",
                            data: {
                                id: id,
                                admin_id: admin,
                                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                            },
                            dataType: "json",
                            success: function(response) {
                                $.alert(response.msg);
                                $('#datatable').DataTable().ajax.reload(null, false);
                            }
                        });
                    }
                },
                cancel: function() {
                    $.alert('Canceled!');
                },
            },
            onContentReady: function() {
                // bind to events
                var jc = this;
                this.$content.find('form').on('submit', function(e) {
                    // if the user submits the form by pressing enter in the field.
                    e.preventDefault();
                    jc.$$formSubmit.trigger('click'); // reference the button and click it
                });
            }
        });

    });

    $(document).on('change', '.privilage_checkbox', function(e) {
        e.preventDefault();
        var id = $(this).prop("id");
        if ($(this).prop('checked') == true) {
            var val = 1;
        } else {
            var val = 0;
        }

        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>admin/Breeders/update_privilage",
            data: {
                id: id,
                val: val,
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
            },
            dataType: "JSON",
            success: function(response) {
                $.alert(response.msg);
            }
        });
    });

    function delete_recordById(url, Msg) {
        $.confirm({
            title: 'Delete Breeder Permanently',
            content: 'It cannot be undone. Are you sure you want to continue?',
            draggable: true,
            type: 'red',
            buttons: {
                Delete: {
                    btnClass: 'btn-red',
                    action: function() {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                            },
                            success: function(response) {
                                var result = JSON.parse(response);
                                if (result.status == 'success') {
                                    $.alert({
                                        title: 'Success!',
                                        content: result.msg,
                                        type: 'green',
                                        buttons: {
                                            ok: function() {
                                                $('#datatable').DataTable().ajax.reload(null, false);
                                            }
                                        }
                                    });
                                } else {
                                    $.alert({
                                        title: 'Error!',
                                        content: result.msg,
                                        type: 'red'
                                    });
                                }
                            },
                            error: function() {
                                $.alert({
                                    title: 'Error!',
                                    content: 'Something went wrong!',
                                    type: 'red'
                                });
                            }
                        });
                    }
                },
                cancel: function() {
                    // User cancelled
                }
            }
        });
    }
</script>