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

                    <h1 class="m-0 text-dark">Breeder</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/breeders') ?>">Breeders</a></li>
                        <li class="breadcrumb-item active">View</li>
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
                                View Breeder Details
                            </h3>
                        </div>
                        <div class="card-body">

                            <?php if ($userinfo->is_verified === '1') { ?>

                                <a style="float: right;" href="<?= base_url() ?>admin/breeders/signin/<?= $userinfo->id ?>" target="_blank" class="btn btn-success btn-md" title="Click to sign into breeder account"><i class="fas fa-sign-in-alt"></i> SignIn </a>
                            <?php }else{  ?>
                            
                             <a style="float: right;" href="javascript:void(0)" onclick="delete_recordById('<?=base_url()?>admin/Breeders/delete_breeder/<?=$userinfo->id;?>','Delete')" class="btn btn-danger btn-md" title="Click to Delete breeder account"><i class="fas fa-trash"></i> Delete Account </a>
                            <?php } ?>



                            <br><br>
                            <h2>
                                <center><small>Name : </small><b><?php echo $userinfo->name ?></b></center>
                            </h2>

                            <table class="table mt-4 ">
                                <tbody>
                                <tr>
                                        <th>Is Privilaged</th>
                                        <td></td>
                                        <td>
                                        <div class="material-switch pull-right">
			<input id="<?=$userinfo->id?>" class="privilage_checkbox" <?php if($userinfo->is_privilaged==1){ echo 'checked';} ?>  type="checkbox"/>
			<label for="<?=$userinfo->id?>" class="label-success"></label>
		</div>
                                        </td>

                                </tr>
                                    <tr>
                                        <th>Account Status</th>
                                        <td>
                                            <?php if ($userinfo->is_verified === '1') { ?>
                                                <p class="text-success"><b>ACTIVE</b></p>


                                            <?php } else { ?>
                                                <p class="text-danger"><b>Inactive</b></p>

                                            <?php } ?>

                                        </td>
                                        <td>
                                            <?php if ($userinfo->is_verified === '1') { ?>

                                                <button type="button" value="" class="success btn btn-danger btn-sm tgl_checkbox" data-id="<?= $userinfo->id ?>" data-status="<?= $userinfo->is_verified ?>" data-email="<?= $userinfo->email ?>" data-name="<?= $userinfo->name ?>" id="tgl_checkbox_<?= $userinfo->id ?>"><i class="fas fa-sync"></i> Block</button>


                                            <?php } else { ?>
                                                <button type="button" value="" class="success btn btn-success btn-sm tgl_checkbox" data-id="<?= $userinfo->id ?>" data-status="<?= $userinfo->is_verified ?>" data-email="<?= $userinfo->email ?>" data-name="<?= $userinfo->name ?>" id="tgl_checkbox_<?= $userinfo->id ?>"><i class="fas fa-sync"></i> Activate</button>


                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Staff</th>
                                        <td>
                                            <?php if (empty($userinfo->admin_id)) { ?>
                                                <p class="text-danger"><b>NOT ASSIGNED</b></p>
                                            <?php } else { ?>
                                                <p class="text-success"><b><?= $admin->name ?></b></p>
                                            <?php } ?>

                                        </td>
                                        <td>
                                            <button id="<?= $userinfo->id ?>" data-name="<?= $userinfo->name ?>" data-adminid="<?= $userinfo->admin_id ?>" class="btn btn-sm btn-info edit_assigned_admin"><i class="fas fa-user-edit"></i> Edit</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $userinfo->email ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit_email"><i class="fas fa-edit"></i> Edit</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <td><?php echo $userinfo->phone ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info edit_email"><i class="fas fa-edit"></i> Edit</button>
                                        </td>
                                    </tr>
                                   

                                    <tr>
                                        <th>Address</th>
                                        <td><?php echo $userinfo->address ?><br>
                                            <?php echo $userinfo->city ?> , <?php echo $userinfo->state ?><br>
                                            <?php echo $userinfo->zip_code ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Description</th>
                                        <td><?php echo $userinfo->description ?></td>
                                    </tr>

                                    <tr>
                                        <th>I have a state license</th>
                                        <td><?php echo $userinfo->federal_license ?></td>
                                    </tr>

                                    <tr>
                                        <th>I have a federal(USDA) license</th>
                                        <td><?php echo $userinfo->usda_license ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Are your puppies vet checked before leaving?</th>
                                        <td><?php echo $userinfo->vet_check ?></td>
                                    </tr>

                                    <tr>
                                        <th>Do you offer a health guarantee?</th>
                                        <td><?php echo $userinfo->health_guarante ?></td>
                                    </tr>

                                    <tr>
                                        <th>Length of health guarantee</th>
                                        <td><?php echo $userinfo->guarante_length ?></td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th>Driver's License or Non Picture ID</th>
                                        <td>
                                            <?php if (!empty($userinfo->photo)) {  ?>
                                                <img style="max-height: 200px; max-width:200px" src="<?= base_url() ?>uploads/doc/<?= $userinfo->photo ?>" alt="Your Photo or Avatar">


                                            <?php } else { ?>
                                                <img src="<?php echo base_url('uploads/breeders/no_image.png') ?>" style="height: 150px; width: 150px;">
                                            <?php } ?>


                                        </td>
                                    </tr>

                                 

                                    <tr>
                                        <td colspan="2">
                                            <center><b><u>Kennel Images</b></ul>
                                            </center>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="row mt-5">
                                <?php
                                $i = 0;
                                if (!empty($userinfo->kennel_images)) {
                                    $imgs = explode(',', $userinfo->kennel_images);
                                    $alts = explode(',', $userinfo->kennel_alt);
                                    foreach ($imgs as $key => $row) {
                                ?>
                                        <div class="col-md-3">
                                            <img style="max-height: 200px; max-width:200px" src="<?= base_url() ?>uploads/kennel/<?= $row; ?>" alt="Your Photo or Avatar">
                                       
                                        <form class="form-inline">
                                        <div class="form-group mb-2 mt-2">
                                         <input type="text" class="form-control" id="alt<?= $key ?>" value="<?= (!empty($alts[$key]))?$alts[$key]:'' ?>" placeholder="Alt Tag  ">
                                        </div>
                                        <!--<button type="button" title="Save" id="<?= $userinfo->id ?>" class="btn btn-primary mb-2 mt-2 save_alt"><i class="fas fa-save"></i></button>-->
                                      </form>
                                      </div>
                                      
                                <?php
                                $i++;
                                        
                                    }
                                } ?>
                            </div>
                            <input type="hidden" value="<?= $i?>" id="my_key">
                            <button type="button" title="Save" id="<?= $userinfo->id ?>" class="btn btn-success col-md-12 save_alt">Update Alt Tags <i class="fas fa-save"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                SEO
              </h3>
            </div>

            <div class="card-body">
              <form method="POST" id="seo_form">
              <?php echo $this->customlib->getCSRF(); ?>
              <input type="hidden" name="id" value="<?php echo $userinfo->id ?>">
                <div class="row">
                
                 <div class="col-md-12">
                    <label for="state"> Breeder URL slug <small>(https://mypupcentral.com/seller/___________ ) - Don't use white space or any other special characters; you can use underscore(_) or hyphen(-) to separate words. </small></label>
                    <div class="input-group mb-3">
                      <input type="text" name="slug" value="<?php echo $userinfo->slug ?>" class="form-control" placeholder="Slug">

                    </div>
                  </div>



                  <div class="col-md-12">
                    <label for="state">Meta Title</label>
                    <div class="input-group mb-3">
                      <input type="text" name="title" value="<?php echo $userinfo->meta_title ?>" class="form-control" placeholder="Meta Title">

                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="state">Meta Description</label>
                    <div class="input-group mb-3">
                      <textarea name="decription"   class="form-control" placeholder="Meta Description"><?php echo $userinfo->meta_description ?></textarea>

                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="state">Meta Keywords</label>
                    <div class="input-group mb-3">
                      <textarea name="keywords"  class="form-control"   placeholder="Meta Keywords"><?php echo $userinfo->meta_keywords ?></textarea>

                    </div>
                  </div>

                  <div class="col-md-12">
                    <input type="button" value="Save" class="btn btn-success btn-block" id="save_seo">
                  </div>

                </div>

              </form>

            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>



<script type="text/javascript">
    $("body").on("click", ".btn-verify", function() {

        $.post('<?= base_url("admin/breeders/change_status") ?>', {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                id: $(this).data('id'),
                status: $(this).data('status'),
                email: $(this).data('email'),
                name: $(this).data('name'),

            },
            function(data) {
                toastr.success('Status changed Successfully.');
                window.location.href = "<?php echo base_url() . 'admin/breeders/' ?>";
                //$.notify("Status Changed Successfully", "success");
            });
    });
</script>

<script>
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
                                location.reload(true);

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
                                location.reload(true);
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



    $(document).on('click', '.edit_email', function(e) {
        e.preventDefault();
        


        $.confirm({
            title: 'Edit ',
            type: 'green',
            typeAnimated: true,
            content: '' +
                '<form action="" class="formName">' +
                '<div class="form-group">' +
                '<label>Email</label>' +
                '<input type="email" value="<?=$userinfo->email?>" class="admin form-control" required/>' +
                '</div>' +
                '<div class="form-group">' +
                '<label>Phone</label>' +
                '<input type="text" value="<?=$userinfo->phone?>" class="phone form-control" required/>' +
                '</div>' +
                '</form>',
            buttons: {
                formSubmit: {
                    text: 'Update',
                    btnClass: 'btn-green',
                    action: function() {
                        var admin = this.$content.find('.admin').val();
                        var phone = this.$content.find('.phone').val();
                        if (!admin) {
                            $.alert('provide a valid email');
                            return false;
                        }
                        if (!phone) {
                            $.alert('provide a valid number');
                            return false;
                        }

                        $.ajax({
                            type: "POST",
                            url: "<?= base_url() ?>admin/Breeders/update_details",
                            data: {
                                id: "<?=$userinfo->id?>",
                                email: admin,
                                phone:phone,
                                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                            },
                            dataType: "json",
                            success: function(response) {
                                $.alert(response.msg);
                                location.reload(true);
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
</script>
<script>
    $(document).ready(function() {
    $("#save_seo").click(function(e) {
      e.preventDefault();
      $('#save_seo').prop('disabled', true);
      $('#save_seo').empty();
      $('#save_seo').val('Please Wait...');

      var form = $("#seo_form")[0];

      var data = new FormData(form);

      $.ajax({

        url: "<?= base_url() ?>admin/breeders/update_seo",
        method: "post",
        data: data,
        enctype: "multipart/form-data",
        processData: false, // Important!
        contentType: false,
        cache: false,
        dataType: "JSON",

        success: function(data) {

          toastr.success(data.msg);

          $('#save_seo').prop('disabled', false);
          $('#save_seo').empty();
          $('#save_seo').val('Save');
          // setTimeout(function() {
          //     location.reload(true);
          // }, 100);


        }
      });

    });
  });
</script>
<script>
    $(document).ready(function() {
    $('.save_alt').click(function(e) {
      e.preventDefault();
      var btn = $(this);
      
      $(btn).prop("disabled", true);
      var id = $(this).attr('id');
      var k = $('#my_key').val();
      var alt_value = $('#alt0').val();
      var alt_values = '';
    //   alert(k);
      for (let i = 1; i < k; i++) {
       
        var alts_value = $('#alt' + i).val();
         alt_value +=',' +alts_value;
        // alert(alt_values);
      }
    //   alert(alt_value);

      $.ajax({
        type: "post",
        url: "<?= base_url() ?>admin/breeders/update_alt_tag",
        data: {
          id: id,
          alt_tag: alt_value,
          '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: "json",
        success: function(response) {
          $(btn).prop("disabled", false)
          if (response.status == 'success') {
            toastr.success('Updated');
          } else {
            toastr.success('Error');
          }
        }
      });
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
</script>


 <script>
   function delete_recordById(url, Msg) {
     $.confirm({
       title: 'Delete Breeder Permanently',
       content: 'It cannot be undone. Are you sure you want to continue?',
       draggable: true,
       type: 'red',
       buttons: {
         confirm: {
           btnClass: 'btn-red',
           action: function() {

             $.ajax({
               url: url,
               dataType: "json",
               success: function(res) {

                 $.alert(res.msg);
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
