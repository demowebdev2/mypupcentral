<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Push Notification</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active">Push Notification</li>
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
                                Send Custom Notification
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- <form id="form" action="" name="form" accept-charset="utf-8" enctype="multipart/form-data"> -->
                        <?php $attributes = array('class' => '', 'id' => 'form'); ?>
                        <?php echo form_open_multipart('', $attributes); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="state">Title <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <textarea name="title" id="breed_name" required="" class="form-control" placeholder="Title"></textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="state">Body <span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <textarea name="body" id="breed_name" required="" class="form-control" placeholder="Message"></textarea>

                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="state">Image Link (Optional)</label>
                                    <div class="input-group mb-3">
                                        <input type="url"  name="image" class="form-control" placeholder="https://example.com/image_name.png">

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <input type="submit" id="submit_btn" class="btn btn-info pull-right" value="Send">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="box-footer">

                        </div>
                        <?php echo form_close() ?>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>

</div>
<script>
    $(document).ready(function() {
        $('#form').on('submit', function(e) {
            e.preventDefault();

            var baseurl = "<?php echo base_url() ?>";
            $('#submit_btn').prop('disabled', true);
            $('#submit_btn').empty();
            $('#submit_btn').val('Please Wait...');
            //var form_data = new FormData(this);     
            var form = $("#form")[0];

            var data = new FormData(form);
            $.ajax({

                url: baseurl + "admin/App/send_notification",
                method: "post",
                data: data,
                enctype: "multipart/form-data",
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: "JSON",

                success: function(data) {

                    toastr.success(data.msg);

                    $('#submit_btn').prop('disabled', false);
                    $('#submit_btn').empty();
                    $('#submit_btn').val('Send');
                    // setTimeout(function() {
                    //     location.reload(true);
                    // }, 100);


                }
            });
        });
    });
</script>