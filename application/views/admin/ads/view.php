<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/lightgallery.css" />
<style type="text/css">
  input[type="checkbox"][readonly] {
    pointer-events: none;
  }

  .card_image {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    transition: 0.3s;
    width: 100%;
  }

  .card_image:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
  }

  .container_image {
    padding: 2px 16px;
  }

  img {
    max-height: 250px;
  }
</style>
<div class="content-wrapper">

  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">

          <h1 class="m-0 text-dark">Ad Details</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/ads') ?>">Ads</a></li>
            <li class="breadcrumb-item active">View</li>
          </ol>

        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <?php if ($post[0]->reviewed == 0) { ?>
            <input type="button" class="btn btn-success btn-block pull-right btn-verify" data-id="<?php echo $post[0]->id ?>" data-status="<?php echo $post[0]->reviewed ?>" value="Approve Now" />
          <?php } else { ?>
            <input type="button" class="btn btn-danger btn-block pull-right btn-verify" data-id="<?php echo $post[0]->id ?>" data-status="<?php echo $post[0]->reviewed ?>" value="Inactive Now" />

          <?php } ?>
        </div>
      </div>
  </section>
  <br>


  <!-- <div class="sticky">I will stick to the screen when you reach my scroll position</div> -->
  <section class="content">


    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Puppy Details
              </h3>
            </div>
            <div class="card-body">
              <h3>Breed : <?php echo $post[0]->breed_name ?></h3>
              <table class="table table-striped table-bordered">
                <tbody>

                  <?php
                  $dob = new DateTime($post[0]->puppy_dob);
                  $dob =  $dob->format('m-d-Y');
                  ?>
                  <tr>
                    <th>Puppy Name</th>
                    <td><?php echo $post[0]->puppy_name ?></td>
                  </tr>
                  <tr>
                    <th>Puppy Age</th>
                    <td><?php echo $post[0]->puppy_age ?></td>
                  </tr>
                  <tr>
                    <th>Puppy Size</th>
                    <td><?php echo $post[0]->puppy_size ?></td>
                  </tr>
                  <tr>
                    <th>Puppy DOB</th>
                    <td><?php echo $dob ?></td>
                  </tr>
                  <tr>
                    <th>Puppy Sex</th>
                    <td><?php echo $post[0]->puppy_sex ?></td>
                  </tr>


                </tbody>

              </table>
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
            <div class="card-body">
              <div class="row">
                <?php if ($post[0]->featured_image) { ?>
                  <div class="col-md-4">
                    <div class="card_image">
                      <?php ($post[0]->featured_image_from == 'puppyverify.com') ? $url = PV : $url = NS ?>
                      <img src="<?php echo $url . 'uploads/puppies/' . $post[0]->featured_image ?>" alt="No Image" style="width:100%">
                      <div class="container_image">
                        <h5>Featured Image</h5>
                        <!--  <p>Architect & Engineer</p>  -->
                      </div>
                      <form class="form-inline">
                                <div class="form-group mx-sm-3 mb-2 mt-2">
                                  <input type="text" class="form-control" id="featured_alt_tag" value="<?= $post[0]->featured_alt_tag ?>" placeholder="Alt Tag  ">
                                </div>
                             <input type="hidden" value="<?= $post[0]->id ?>" id="post_id">

                                <button type="button" title="Save" id="featured_alt_tag_btn" class="btn btn-primary mb-2 mt-2 save_alt_featured"><i class="fas fa-save"></i></button>
                              </form>
                    </div>
                  </div>
                <?php } ?>
                <?php if ($post[0]->father_photo) { ?>
                  <div class="col-md-4">
                    <div class="card_image">
                      <?php ($post[0]->father_photo_from == 'puppyverify.com') ? $url = PV : $url = NS ?>
                      <img src="<?php echo $url . 'uploads/puppies/' . $post[0]->father_photo ?>" alt="No Image" style="width:100%">

                      <div class="container_image">
                        <h5>Father Image</h5>
                        <!--  <p>Architect & Engineer</p>  -->
                      </div>
                      <form class="form-inline">
                                <div class="form-group mx-sm-3 mb-2 mt-2">
                                  <input type="text" class="form-control" id="father_photo_alt" value="<?= $post[0]->father_photo_alt ?>" placeholder="Alt Tag  ">
                                </div>
                                <input type="hidden" value="2" name="alt_select">

                                <button type="button" title="Save" id="father_photo_alt_btn" class="btn btn-primary mb-2 mt-2 save_alt_father"><i class="fas fa-save"></i></button>
                              </form>
                    </div>
                  </div>
                <?php } ?>

                <?php if ($post[0]->mother_photo) { ?>
                  <div class="col-md-4">
                    <div class="card_image">
                      <?php ($post[0]->mother_photo_from == 'puppyverify.com') ? $url = PV : $url = NS ?>
                      <img src="<?php echo $url . 'uploads/puppies/' . $post[0]->mother_photo ?>" alt="No Image" style="width:100%">

                      <div class="container_image">
                        <h5>Mother Image</h5>
                        <!--  <p>Architect & Engineer</p>  -->
                      </div>
                      <form class="form-inline">
                                <div class="form-group mx-sm-3 mb-2 mt-2">
                                  <input type="text" class="form-control" id="mother_photo_alt" value="<?= $post[0]->mother_photo_alt ?>" placeholder="Alt Tag  ">
                                </div>
                                <input type="hidden" value="3" name="alt_select">

                                <button type="button" title="Save" id="mother_photo_alt_btn" class="btn btn-primary mb-2 mt-2 save_alt_mother"><i class="fas fa-save"></i></button>
                              </form>
                    </div>
                  </div>
                <?php } ?>

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
            <div class="card-body">
              <div class="row">

                <div class="col-md-12" style=" 
  align-items: center;">
                  <div class=" lightgallery">
                    <div class="row">
                      <?php if ($pictures) {
                        foreach ($pictures as $key => $value) { ?>
                          <?php ($value->uploaded_from == 'puppyverify.com') ? $url = PV : $url = NS ?>

                          <div class="col-md-4">
                            <div class="gal_box" style="    border: 2px solid #eee;
    margin: 10px;padding:10px">
                              <div id="lightgallery">
                                <a class="p-2" href="<?php echo $url . 'uploads/puppies/' . $value->picture ?>">
                                  <img height="auto" width="90%" src="<?php echo $url . 'uploads/puppies/' . $value->picture ?>"></a>
                                <!-- </td>    </tr> -->
                              </div>
                              <form class="form-inline">
                                <div class="form-group mx-sm-3 mb-2 mt-2">
                                  <input type="text" class="form-control" id="alt<?= $value->id ?>" value="<?= $value->alt_tag ?>" placeholder="Alt Tag  ">
                                </div>
                                <button type="button" title="Save" id="<?= $value->id ?>" class="btn btn-primary mb-2 mt-2 save_alt"><i class="fas fa-save"></i></button>
                              </form>
                            </div>
                          </div>
                      <?php }
                      } ?>


                    </div>
                  </div>
                  <?php if ($videos) {
                  ?>
                    <div class="col-md-5" style=" display: flex;align-items: center;">
                      <div class="card lightgallery" style="background-color: #F4F6F9;">
                        <div id="">
                          <?php if ($videos) {
                            foreach ($videos as $key => $value) { ?>
                              <?php ($value->uploaded_from == 'puppyverify.com') ? $url = PV : $url = NS ?>
                              <video width="480" height="230" controls style="padding: 0 1.2rem;">
                                <source src="<?php echo $url . 'uploads/puppies/' . $value->video ?>" type="video/mp4">
                              </video>

                          <?php }
                          } ?>

                        </div>
                      </div>
                    </div>

                  <?php }
                  ?>

                </div>
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
                Ad Details
              </h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>

                  <tr>
                    <th>Title</th>
                    <td><?php echo $post[0]->title ?></td>
                  </tr>

                  <tr>
                    <th>Description</th>
                    <td><?php echo $post[0]->description ?></td>
                  </tr>
                  <tr>
                    <th>Price</th>
                    <td>$<?php echo $post[0]->price ?></td>
                  </tr>
                  <tr>
                    <th>Asking Price</th>
                    <td>$<?php echo $post[0]->asking_price ?></td>
                  </tr>
                  <tr>
                    <th>Negotiable</th>
                    <td><input type="checkbox" <?php if ($post[0]->negotiable == 1) { ?> checked="" <?php  } ?> readonly /></td>
                  </tr>
                  <?php
                  $date = new DateTime($post[0]->available_date);
                  $date =  $date->format('m-d-Y');
                  ?>
                  <tr>
                    <th>Available Date</th>
                    <td><?php echo $date ?></td>
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td><?php echo $post[0]->address ?></td>
                  </tr>
                  <tr>
                    <th>Tags</th>
                    <td><?php echo $post[0]->tags ?></td>
                  </tr>
                  <tr>
                    <th>Post created</th>
                    <td><?php echo $post[0]->created_at ?></td>
                  </tr>


                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Person -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Contact Peroson Details
              </h3>
            </div>
            <div class="card-body">
              <table class="table table-bordered">
                <tbody>


                  <tr>
                    <th>Name </th>
                    <td><?= $post[0]->contact_person ?></td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td><?= $post[0]->contact_phone ?></td>
                  </tr>


                </tbody>

              </table>
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
                Breeder Details
              </h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6"><br>
                  <h5><small>Breeder Name </small> : <?php echo $post[0]->name ?></h5>
                </div>
                <div class="col-md-6">
                  <?php ($post[0]->breeder_from == 'puppyverify.com') ? $url = PV : $url = NS ?>
                  <img height="100px" width="110px" src="<?php echo $url . 'uploads/breeders/' . $post[0]->photo ?>" onerror=this.src="<?php echo base_url('uploads/breeders/no_image.png') ?>">
                </div>
              </div>
              <table class="table table-bordered">
                <tbody>

                  <tr>
                    <th>Email</th>
                    <td><?php echo $post[0]->email ?></td>
                  </tr>
                  <tr>
                    <th>Mobile</th>
                    <td><?php echo $post[0]->phone ?></td>
                  </tr>

                  <tr>
                    <th>USDA/Business Number</th>
                    <td><?php echo $post[0]->usda ?></td>
                  </tr>
                  <tr>
                    <th>Breeder Details</th>
                    <td><?php echo $post[0]->description ?></td>
                  </tr>

                  <tr>
                    <th>Contact Person </th>
                    <td><?php echo $post[0]->contact_person ?></td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td><?php echo $post[0]->contact_phone ?></td>
                  </tr>


                </tbody>

              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Registrations -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                Registration
              </h3>
            </div>

            <div class="card-body">

              <table class="table table-bordered">
                <tbody>

                  <?php
                  $reg_ar = json_decode($post[0]->registration);
                  if ($reg_ar) {
                    foreach ($registration as $key => $value) { ?>
                      <tr>
                        <th><?= $value->name ?></th>
                        <td> <input type="checkbox" readonly="" name="registration[]" value="<?php echo $value->name ?>" <?php if (in_array($value->name, $reg_ar)) { ?> checked="" <?php } ?>></td>
                      </tr>
                    <?php }
                  } else { ?>
                    <tr>
                      <th>No Regitration details available. </th>
                    </tr>
                  <?php  }
                  ?>

                </tbody>

              </table>
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
              <input type="hidden" name="id" value="<?php echo $post[0]->id ?>">
                <div class="row">
                  <div class="col-md-12">
                    <label for="state">Meta Title</label>
                    <div class="input-group mb-3">
                      <input type="text" name="title" value="<?php echo $post[0]->meta_title ?>" class="form-control" placeholder="Meta Title">

                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="state">Meta Description</label>
                    <div class="input-group mb-3">
                      <textarea name="decription"   class="form-control" placeholder="Meta Description"><?php echo $post[0]->meta_description ?></textarea>

                    </div>
                  </div>

                  <div class="col-md-12">
                    <label for="state">Meta Keywords</label>
                    <div class="input-group mb-3">
                      <textarea name="keywords"  class="form-control"   placeholder="Meta Keywords"><?php echo $post[0]->meta_keywords ?></textarea>

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



<!-- lightgallery plugins -->

<script src="<?php echo base_url('assets/') ?>js/lightgallery.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#lightgallery").lightGallery();
  });
  $("body").on("click", ".btn-verify", function() {
    $('.btn-verify').prop('disabled', true);
    $('.btn-verify').empty();
    $('.btn-verify').val('Please Wait...');

    $.post('<?= base_url("admin/ads/change_status") ?>', {
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
        id: $(this).data('id'),
        status: $(this).data('status'),


      },
      function(data) {
        toastr.success('Status changed Successfully.');
        window.location.href = "<?php echo base_url() . 'admin/ads/' ?>";
        //$.notify("Status Changed Successfully", "success");
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
      var alt_value = $('#alt' + id).val();

      $.ajax({
        type: "post",
        url: "<?= base_url() ?>admin/ads/update_alt_tag",
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

  $(document).ready(function() {
    $("#save_seo").click(function(e) {
      e.preventDefault();
      $('#save_seo').prop('disabled', true);
      $('#save_seo').empty();
      $('#save_seo').val('Please Wait...');

      var form = $("#seo_form")[0];

      var data = new FormData(form);

      $.ajax({

        url: "<?= base_url() ?>admin/ads/update_seo",
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
    $('.save_alt_featured').click(function(e) {
      e.preventDefault();
      var btn = $(this);
      $(btn).prop("disabled", true);
      var id = $('#post_id').val();
      var alt_value = $('#featured_alt_tag').val();

      $.ajax({
        type: "post",
        url: "<?= base_url() ?>admin/ads/update_alt_featured",
        data: {
          id: id,
          featured_alt_tag: alt_value,
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
    
    $('.save_alt_father').click(function(e) {
      e.preventDefault();
      var btn = $(this);
      $(btn).prop("disabled", true);
      var id = $('#post_id').val();
      var alt_value = $('#father_photo_alt').val();

      $.ajax({
        type: "post",
        url: "<?= base_url() ?>admin/ads/update_alt_father",
        data: {
          id: id,
          father_photo_alt: alt_value,
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
    
    $('.save_alt_mother').click(function(e) {
      e.preventDefault();
      var btn = $(this);
      $(btn).prop("disabled", true);
      var id = $('#post_id').val();
      var alt_value = $('#mother_photo_alt').val();

      $.ajax({
        type: "post",
        url: "<?= base_url() ?>admin/ads/update_alt_mother",
        data: {
          id: id,
          mother_photo_alt: alt_value,
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
  </script>