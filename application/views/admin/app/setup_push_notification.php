<style>
.copy{
    cursor: pointer;
}
    </style>
<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Automatic Push Notification</h1>
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
                                Setup
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- <form id="form" action="" name="form" accept-charset="utf-8" enctype="multipart/form-data"> -->
                        <?php $attributes = array('class' => '', 'id' => 'form'); ?>
                        <?php echo form_open_multipart('', $attributes); ?>
                        <div class="card-body">

                          <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" <?php if($setup->is_active==1){echo 'checked';} ?> class="custom-control-input" id="customSwitch1">
                                        <label class="custom-control-label" for="customSwitch1">Enable/Disable</label>
                                    </div>
                                </div>
                            </div>
                           

                            <hr>
                            <div class="alert alert-warning" role="alert">
                             Number of newly added puppies -  <span class="alert-link copy"> {{New Puppies}} </span>
                            </div>
                            <br>
                            <?php $days=json_decode($setup->days); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="state">Days</label>
                                    <div class="input-group mb-3">
                                        <select name="days[]" class="form-control select2" multiple>
                                            <option <?php if (in_array("Sun", $days)){ echo 'selected'; } ?> value="Sun">Sun</option>
                                            <option <?php if (in_array("Mon", $days)){ echo 'selected'; } ?> value="Mon">Mon</option>
                                            <option <?php if (in_array("Tue", $days)){ echo 'selected'; } ?> value="Tue">Tue</option>
                                            <option <?php if (in_array("Wed", $days)){ echo 'selected'; } ?> value="Wed">Wed</option>
                                            <option <?php if (in_array("Thu", $days)){ echo 'selected'; } ?> value="Thu">Thu</option>
                                            <option <?php if (in_array("Fri", $days)){ echo 'selected'; } ?> value="Fri">Fri</option>
                                            <option <?php if (in_array("Sat", $days)){ echo 'selected'; } ?> value="Sat">Sat</option>
                                        </select>

                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                    <label for="state">Title</label>
                                    <div class="input-group mb-3">
                                        <textarea name="title" id="breed_name" required="" class="form-control" placeholder="Title"><?=$setup->title?></textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="state">Body</label>
                                    <div class="input-group mb-3">
                                        <textarea name="body" id="breed_name" required="" class="form-control" placeholder="Message"><?=$setup->body?></textarea>

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <input type="submit" id="submit_btn" class="btn btn-info pull-right" value="Save">
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

                url: baseurl + "admin/App/save_setup",
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
                    $('#submit_btn').val('Save');
                    // setTimeout(function() {
                    //     location.reload(true);
                    // }, 100);


                }
            });
        });
    });

    $(document).ready(function () {
        var token = "<?= $this->security->get_csrf_hash(); ?>";
        $('#customSwitch1').change(function (e) { 
            e.preventDefault();
            if ($('#customSwitch1').is(':checked')) {
               var status=1;
            }
            else{
                var status=0;
            }
            $.ajax({
                type: "post",
                url: "<?=base_url()?>admin/App/update_notification_status",
                data: {csrf_test_name:token,status:status},
                dataType: "JSON",
                success: function (response) {
                    toastr.success(response.msg);
                }
            });
            
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });

document.querySelector(".copy").onclick = (e) => {
  navigator.clipboard.writeText(e.currentTarget.innerText);
  toastr.info('Copied to clipboard');
}
</script>