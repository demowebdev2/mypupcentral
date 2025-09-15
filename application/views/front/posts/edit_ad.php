  <!--  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>-->
  <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"-->
  <!--      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">-->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/lightgallery.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/datepicker/css/default/zebra_datepicker.min.css" type="text/css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/datepicker/zebrastyle.css" type="text/css">
  <script src="<?= base_url() ?>assets/datepicker/zebra_datepicker.min.js"></script>
  <script src="<?= base_url() ?>assets/datepicker/zebrascript.js"></script>
  <script>
    $(document).ready(function() {
      $('.search_state').select2();
      // $("input.thedate").Zebra_DatePicker({ dateFormat: "m/d/Y" });
      $("#puppy_dob").Zebra_DatePicker({
        format: "m/d/Y",
        onSelect: function() {
          $(this).change();
          var mydate = $(this).val();
          var date = new Date(mydate);
          var newdate = new Date(date);

          newdate.setDate(newdate.getDate() + 56);

          var dd = newdate.getDate();
          var mm = newdate.getMonth() + 1;
          var y = newdate.getFullYear();

          var someFormattedDate = mm + '/' + dd + '/' + y;

          var someFormattedDates = new Date(someFormattedDate);

          // alert(someFormattedDate)
          var today = new Date();
          var newdate2 = new Date(today);

          newdate2.setDate(newdate2.getDate() + 0);

          var dd2 = newdate2.getDate();
          var mm2 = newdate2.getMonth() + 1;
          var y2 = newdate2.getFullYear()
          var todayDate = mm2 + '/' + dd2 + '/' + y2;
          // alert(todayDate);
          // if (someFormattedDates.getTime() >= today.getTime()) {
          // alert(someFormattedDate)
          // $('#datecalc').val(someFormattedDate);
          $('#available_date').Zebra_DatePicker({
            format: "m/d/Y",
            // direction: [someFormattedDate, false]
          });
          $("#available_date").val(someFormattedDate).data('Zebra_DatePicker').show();
          // }
          // else
          // {
          //     // alert(todayDate)
          //     // $('#datecalc').val(todayDate);
          //     $('#available_date').Zebra_DatePicker({
          //         format: "m/d/Y",
          //         direction: [todayDate, false]
          //     });
          //     $("#available_date").val(todayDate).data('Zebra_DatePicker').show();
          // }
        }
      });
      $('#available_date').Zebra_DatePicker({
        format: "m/d/Y",
        direction: [$('#available_date').val(), false]
      });


    });
  </script>
  <style type="text/css">
  .dropzone .dz-default.dz-message{
      left: 60% !important;
    }
    .progress-bar {
      background-color: #8cc63f !important;
    }

    .dropzone .dz-default.dz-message {
      display: none;
    }

    * {
      margin: 0;
      padding: 0
    }


    h2 {
      color: black;
    }

    fieldset {
      padding: 3%;
    }

    #form {
      /*text-align: center;*/
      position: relative;
      margin: 20px
    }

    #form fieldset {
      background: white;
      border: 0 none;
      border-radius: 0.5rem;
      box-sizing: border-box;
      width: 100%;
      margin: 0;
      padding-bottom: 20px;
      position: relative
    }

    .finish {
      text-align: center
    }

    #form fieldset:not(:first-of-type) {
      display: none
    }

    #form .previous-step,
    .next-step,
    .submit {
      width: 100px;
      font-weight: bold;
      color: white;
      border: 0 none;
      border-radius: 0px;
      cursor: pointer;
      padding: 10px 5px;
      margin: 10px 5px 10px 0px;
      float: right
    }

    .form,
    .previous-step {
      background: #3457D5;
    }

    .form,
    .next-step {
      background: #3457D5;
    }

    .form,
    .submit {
      background: green;
    }

    #form .previous-step:hover,
    #form .previous-step:focus {
      background-color: #000000
    }

    #form .next-step:hover,
    #form .next-step:focus {
      background-color: #3457D5;
    }

    .text {
      color: #3457D5;
      font-weight: normal
    }

    #progressbar {
      margin-bottom: 30px;
      overflow: hidden;
      color: lightgrey
    }

    #progressbar .active {
      color: #3457D5;
    }

    #progressbar li {
      list-style-type: none;
      font-size: 15px;
      width: 25%;
      float: left;
      position: relative;
      font-weight: 400
    }

    #progressbar #step1:before {
      content: "1";
      text-align: center;
    }

    #progressbar #step2:before {
      content: "2";
      text-align: center;
    }

    #progressbar #step3:before {
      content: "3";
      text-align: center;
    }

    #progressbar #step4:before {
      content: "4";
      text-align: center;
    }

    #progressbar li:before {
      width: 50px;
      height: 50px;
      line-height: 45px;
      display: block;
      font-size: 20px;
      color: #ffffff;
      background: lightgray;
      border-radius: 50%;
      margin: 0 auto 10px auto;
      padding: 2px
    }

    #progressbar li:after {
      content: '';
      width: 100%;
      height: 2px;
      background: lightgray;
      position: absolute;
      left: 0;
      top: 25px;
      z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
      background: #3457D5;
    }

    .progress {
      height: 20px
    }

    .progress-bar {
      background-color: #3457D5;
    }

    .Zebra_DatePicker_Icon_Wrapper {
      width: 100% !important;
    }

    .thumb {
      margin: 10px 5px 0 0;
      width: 200px;
      height: 200px;
    }

    .image-upload {
      width: 25%;
    }

    .image-upload-container {
      display: flex;
      grid-template-areas: 'img-u-one img-u-two img-u-three img-u-four img-u-five img-u-six';
    }

    /*.center {*/
    /*  display:inline;*/
    /*  margin: 3px;*/
    /*}*/

    .form-input {
      width: 100%;
      padding: 3px;
      /*background:#fff;*/
      /*border:2px dashed dodgerblue;*/
    }

    .form-input input {
      display: none;
    }

    .form-input label {
      display: block;
      width: 100%;
      height: auto;
      max-height: 150px;
      /*background:#333;*/
      border-radius: 10px;
      cursor: pointer;
    }

    .form-input img {
      width: 100%;
      height: 150px;
      margin: 2px;
      /*opacity: .4;*/
    }

    .imgRemove {
      position: relative;
      bottom: 114px;
      left: 68%;
      background-color: transparent;
      border: none;
      font-size: 30px;
      outline: none;
    }

    .imgRemove::after {
      content: ' \21BA';
      /*color: #fff;*/
      font-weight: 900;
      border-radius: 8px;
      cursor: pointer;
    }

    .small {
      color: black;
    }

    .search-row .search-col .form-control,
    .search-row button.btn-search,
    .search-row .select2-container--default .select2-selection--single {

      border: unset;
      box-shadow: unset;
      margin-left: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #444;
      line-height: 28px;
      margin-top: -5px;
    }

    @media only screen and (max-width: 700px) {
      .image-upload-container {
        grid-template-areas: 'img-u-one img-u-two img-u-three'
          'img-u-four';
      }
    }

    .Zebra_DatePicker_Icon_Wrapper {
      width: 100% !important;
    }
  </style>
  <style>
    .imageThumb {
      max-height: 150px;
      border: 2px solid;
      padding: 1px;
      cursor: pointer;
    }

    .pip {
      display: inline-block;
      margin: 10px 10px 0 0;
    }

    .remove {
      display: block;
      background: #444;
      border: 1px solid black;
      color: white;
      text-align: center;
      cursor: pointer;
    }

    .remove:hover {
      background: white;
      color: black;
    }

    .show-for-sr {
      position: absolute !important;
      width: 1px;
      height: 1px;
      padding: 0;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      -webkit-clip-path: inset(50%);
      clip-path: inset(50%);
      border: 0;
    }

    .files {

      display: block;
    }
  </style>
  <div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
  <div class="main-container">
    <div class="container">
      <div class="row">
        <?php $this->load->view('front/profile_sidebar'); ?>
        <div class="col-md-9 page-content">
          <div id="response">
            <?php if ($this->session->flashdata('response')) : ?>
              <p><?php echo $this->session->flashdata('response'); ?></p>
            <?php endif; ?>
          </div>
          <div class="inner-box">
            <form id="form" method="POST" action="<?= base_url() ?>posts/editad/<?= $post->id ?>" enctype="multipart/form-data">

              <?php echo $this->customlib->getCSRF(); ?>

              <!-- <ul id="progressbar">
                            <li class="active" id="step1" style="text-align: center;">
                                <strong>Ad Details</strong>
                            </li>
                            <li id="step2" style="text-align: center;"><strong>Puppy details 1</strong></li>
                            <li id="step3" style="text-align: center;"><strong>Puppy details 2</strong></li>
                            <li id="step4" style="text-align: center;"><strong>Puppy Images/Videos</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div> <br> -->
              <fieldset>
                <h2>Ad Details</h2>
                <div class="form-group">
                  <label for="ad_title">Puppy Name <span style="color:red;">*</span></label>
                  <input type="text" name="ad_title" value="<?= $post->title ?>" class="form-control" id="ad_title" placeholder="Enter Puppy Name">
                </div>


                <div class="row mb-3">
                  <label class="col-md-3 col-form-label" for="description">
                    Puppy Description
                    <span style="color:red;">*</span></label>
                  <div class="col-md-12">
                    <textarea class="form-control" id="description" name="description" rows="5" style="height: 50px"><?= $post->description ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="puppy_dob">Puppy DOB<span style="color:red;">*</span></label>
                  <input type="text" name="puppy_dob" class="form-control " id="puppy_dob" placeholder="Enter Puppy DOB" value="<?= $post->puppy_dob ?>">
                </div>
                <div class="form-group">
                  <label for="available_date">Available Date<span style="color:red;">*</span></label>
                  <input type="text" name="available_date" class="form-control " id="available_date" placeholder="Enter Available Date" value="<?= $post->available_date ?>">
                </div>
                <!-- <div id="priceBloc" class="row mb-3">
                        <label class="col-md-3 col-form-label" for="price">Price<span style="color:red;">*</span></label>
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input id="price" name="price" class="form-control " placeholder="eg 15000" type="number" min="0" step="0.01" value="">
                                <span class="input-group-text">
                                <input id="negotiable" name="negotiable" type="checkbox" value="1" >&nbsp; <small>Negotiable</small></span>
                            </div> 
                        </div>
                    </div> -->
                <div class="form-group">
                  <label for="nameCampaign">Contact Person <span style="color:red;">*</span></label>
                  <select name="contact_person" id="contact_person" class="form-control custom-select">
                    <option value="">Select Contact</option>
                    <?php
                    foreach ($contact as $contacts) {
                      $selected = $post->contact_name ==  $contacts['id'] ? 'selected' : '';
                    ?>
                      <option value="<?= $contacts['id'] ?>" <?php echo $selected; ?>><?= $contacts['full_name'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              <?php if(!empty($breeder->state_id)){ ?>
                      <?php foreach ($states as $row) { ?>
                        <?php if ($row->ID == $breeder->state_id) { ?>
                      <input type="hidden" name="location" id="location" value="<?= $row->STATE_NAME ?>|<?= $row->ID ?>">
                      <?php } ?>
                      <?php } ?>
                      <?php } else{ ?>

                <div class="form-group">
                  <label for="nameCampaign">Location <span style="color:red;">*</span></label>
                  <select class="form-control search_state" name="location" id="location" required>
                    <option value="">Select</option>
                    <?php foreach ($states as $row) { ?>
                      <option value="<?= $row->STATE_NAME ?>|<?= $row->ID ?>" <?php if ($row->STATE_NAME == $breeder->state) {
                                                                                echo 'selected';
                                                                              } ?>><?= $row->STATE_NAME ?></option>

                    <?php } ?>
                  </select>
                </div>

                <?php } ?>
                <!-- <input type="button" name="next-step" 
                                class="next-step one" value="Next Step" />
                        </fieldset>
                        <fieldset> -->
                <h2>More about Puppy</h2>
                <!--        <div class="form-group">-->
                <!--    <label for="puppy_name">Puppy Name<span style="color:red;">*</span></label>-->
                <!--    <input type="text" name="puppy_name" class="form-control" id="puppy_name" placeholder="Enter Puppy Name" value="<?= $post->puppy_name ?>">-->
                <!--</div>-->

                <div class="form-group">
                  <label for="puppy_category">Breed<span style="color:red;">*</span></label>
                  <select name="puppy_category" id="puppy_category" class="form-control  custom-select">
                    <option value="">Select Breed</option>
                    <?php
                    foreach ($breed as $breed_key => $breeds) {
                      if ($post->category_id ==  $breeds['id']) {
                        $category = 'selected';
                        $beed_data = $breeds;
                      } else {
                        $category = '';
                      };

                    ?>
                      <option value="<?= $breeds['id'] ?>" <?php echo "$category"; ?>><?= $breeds['breed_name'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="puppy_sex">Size<span style="color:red;">*</span></label><br>
                  <div class="puppy_size_radio">

                    <?php if (!empty($beed_data['breed_size'])) {
                      $arr = json_decode($beed_data['breed_size']); ?>
                      <?php foreach ($arr as $key => $row) { ?>

                        <input type="radio" <?php if ($row == $post->puppy_size) {
                                              echo 'checked';
                                            } ?> id="puppy_size<?= $key ?>" name="puppy_size" value="<?= $row ?>">
                        <label for="puppy_size<?= $key ?>"><?= $row ?></label>

                      <?php } ?>

                    <?php } else { ?>
                      <input type="radio" id="puppy_size1" checked name="puppy_size" value="N/A">
                      <label for="puppy_size1">N/A</label>
                    <?php } ?>
                  </div>

                </div>

                <div class="form-group">
                  <label>Puppy Gender<span style="color:red;">*</span></label><br>

                  <input type="radio" <?php if ($post->puppy_sex == 'Male') { ?> checked <?php } ?> id="male" name="puppy_sex" value="Male">
                  <label for="male">Male</label>
                  <input type="radio" <?php if ($post->puppy_sex == 'Female') { ?> checked <?php } ?> id="female" name="puppy_sex" value="Female">
                  <label for="female">Female</label>

                  <div id="priceBloc" class="row mb-3">
                    <label class="col-md-3 col-form-label" for="ask_price">Asking Price</label>
                    <div class="col-md-12">
                      <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input id="ask_price" name="ask_price" class="form-control " placeholder="eg 1000" type="number" value="<?= $post->asking_price ?>">
                        <!-- <span class="input-group-text">
                                <input id="negotiable" name="negotiable" type="checkbox" value="1" >&nbsp; <small>Negotiable</small></span> -->
                      </div>
                    </div>
                  </div>

                  <!-- <input type="button" name="next-step" 
                                class="next-step two" value="Next Step" />
                            <input type="button" name="previous-step" 
                                class="previous-step" 
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <h2>More about Puppy</h2> -->
                  <?php
                  $reg = json_decode($post->registration, true);
                  $regtype = ['ACA', 'AKC'];

                  ?>
                  <div class="form-group">
                    <label for="puppy_name">Registration</label><br>
                    <?php $cnt=0;
                    foreach ($regtype as $reg_key => $regs) { $cnt++;
                    ?>
                      <input type="checkbox" name="registration1[]" id="registration<?=$cnt?>" value="<?= $regs ?>" <?php if (is_array($reg) && in_array($regs, $reg)) { ?>checked <?php } ?>>
                      <label for="registration"><?= $regs ?></label><br>
                    <?php
                    }
                    ?>


                    <input type="checkbox" name="other_registration" <?php if (!empty($post->other_registration)) {
                                                                        echo 'checked';
                                                                      } ?> id="other_registration" value="<?= $post->other_registration ?>">
                    <label for="other_registration">Other</label><br>
                    <div class="form-group" id="specify_other" <?php if (empty($post->other_registration)) { ?> style="display:none" <?php } ?>>
                      <input type="text" class="form-control" id="other_registration_text" value="<?= $post->other_registration ?>" placeholder="Specify other">
                    </div>


                  </div>

                  <div class="row">
                    <div class="col-md-6">

                      <div class="form-group">
                        <label for="titleNoti">Mother's Photo (Not Mandatory)</label>
                        <input type="file" name="mother_photo" id="mother_photo_value" class="form-control" onchange="readURL(this,'#mother_photo');" accept=".png, .jpg, .jpeg" />
                      </div><br>
                      <div class="form-group col-md-6" id="lightgallery_mother">
                        <?php
                        if (empty($post->mother_photo)) {
                        ?>

                          <img id="mother_photo" src="<?php echo base_url('uploads/upload_logo.png') ?>" width="200" height="150" />
                        <?php
                        } else {
                        ?>
                          <a href="<?php echo base_url('uploads/puppies/') . $post->mother_photo ?>">
                            <img id="mother_photo" src="<?php echo base_url('uploads/puppies/') . $post->mother_photo ?>" width="200" height="150" /></a>
                          <input type="hidden" value="<?= $post->mother_photo ?>" name="mothers" id="mothers">
                        <?php
                        }
                        ?>

                      </div>
                      <a type="button" id="mother_photo_delete"><i class="fas fa-trash"></i></a>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="titleNoti">Father's Photo (Not Mandatory)</label>
                        <input type="file" name="father_photo" id="father_photo_value" class="form-control" onchange="readURL(this,'#father_photo');" accept=".png, .jpg, .jpeg" />
                      </div><br>
                      <div class="form-group col-md-6" id="lightgallery_father">

                        <?php
                        if (empty($post->father_photo)) {
                        ?>

                          <img id="father_photo" src="<?php echo base_url('uploads/upload_logo.png') ?>" width="200" height="150" />
                        <?php
                        } else {
                        ?>
                          <a href="<?php echo base_url('uploads/puppies/') . $post->father_photo ?>">
                            <img id="father_photo" src="<?php echo base_url('uploads/puppies/') . $post->father_photo ?>" width="200" height="150" /></a>
                          <input type="hidden" value="<?= $post->father_photo ?>" name="fathers" id="fathers">
                        <?php
                        }
                        ?>

                      </div>
                      <a type="button" id="father_photo_delete"><i class="fas fa-trash"></i></a>
                    </div>
                  </div>
                  <!-- <input type="button" name="next-step" 
                                class="next-step three" value="Next Step" />
                            <input type="button" name="previous-step" 
                                class="previous-step" 
                                value="Previous" />
                        </fieldset>
                        <fieldset> -->
                  <br><br>
                  <h2>Puppy Images/Videos</h2>


                  <input type="hidden" id="post_id" value="<?= $post->id ?>">





 <label for="titleNoti"> (You can drag photos to reorder them. The first photo will appear as the cover.)</label>
                  <div class="dropzone dz-clickable" id="myDrop">
                    <div class="dz-default dz-message" data-dz-message="">
                      <center>
                        <h4>Photo Gallery</h4>
                        <h4><i class="fa fa-upload" aria-hidden="true"></i> Click here or Drop files to upload</h4>
                      </center>
                    </div>
                  </div>
                  <button style="float:right" type="button" id="remove_all_files" class="btn "><i class="fas fa-trash"></i> Remove All Photos</button>

                  <br><br>

                  <div class="form-group">
                    <label for="titleNoti">Video Gallery</label>
                    <input id="video_gallery" name="video_gallery[]" class="form-control" type="file" accept="video/*" >
                  </div><br>
                  <div id="myvideo">
                    <?php
                    if (!empty($video)) {
                    ?>

                      <video controls height="150px" width="200px">
                        <source src="<?php echo base_url('uploads/puppies/') . $video[0]['video'] ?>" style="object-fit: cover;">
                        Your browser does not support the video tag.
                      </video><br>
                      <div class="vide_class">
                      <a type="button" class ="delete_video btn btn-xs" style="background-color:#F0F0F0;"><i class="fas fa-trash"></i>&nbsp;Delete Video</a>
                      <input type="hidden" value="<?= $video[0]['id']?>" name="video_id">
                      <input type="hidden" value="<?= $video[0]['video']?>" name="video_stat">
                      </div>
                      <?php
                      if (!empty($video[1]['video'])) {
                      ?>
                        <video controls height="150px" width="200px">
                          <source src="<?php echo base_url('uploads/puppies/') . $video[1]['video'] ?>" style="object-fit: cover;">
                          Your browser does not support the video tag.
                        </video><br>
                        <div class="vide_class">
                        <a type="button" class ="delete_video btn btn-xs" style="background-color:#F0F0F0;"><i class="fas fa-trash"></i>&nbsp;Delete Video</a>
                        <input type="hidden" value="<?= $video[1]['id']?>" name="video_id">
                        <input type="hidden" value="<?= $video[1]['video']?>" name="video_stat">
                        </div>

                    <?php
                      }
                    }

                    ?>
                  </div>

                  <video controls id="video-tags" height="150px" width="200px">
                    <source id="video-sources" src="splashVideo" style="object-fit: cover;">
                    Your browser does not support the video tag.
                  </video>
                  <video controls id="video-tags2" height="150px" width="200px">
                    <source id="video-sources2" src="splashVideo" style="object-fit: cover;">
                    Your browser does not support the video tag.
                  </video><br><br>


                  <div class="form-group">
                    <label for="titleNoti">Youtube Link</label>
                    <input id="youtube" name="youtube" class="form-control" type="url" value="<?= $post->youtube ?>">
                  </div>

                  <div id="youtube_embed"></div>
                  
                  <div class="form-group">
                 <input type="checkbox" name="training_package" id="training_package" value="1" <?php if($post->training_package==1){echo 'checked';} ?>>
                  <label for="training_package">Allow a My Pup Central Training Package to be purchased for this puppy</label><br>
                  <p>You receive a $100 incentive from My Pup Central if a training package is purchased for your puppy. View our <a href="<?=base_url()?>training" style="text-decoration: underline;" target="_blank">Training Page</a> or contact us for more details.</p>

                  </div>

                  <div class="form-group mt-5" id="merge">
                    <?php if (!empty($breeds_merged)) { ?>
                      <!--<label for="titleNoti"></label>-->
                      <!-- <input type="checkbox" <?php if ($post->is_merged == 1) {
                                                    echo 'checked';
                                                  } ?> value="1"  id="merge" name="merge"  >-->
                      <!--  <span>Show ad in <a href="https://nosheddoodles.com" targer="_blank">Nosheddoodles.com</a></span>   -->
                    <?php } ?>
                  </div>


                  <input type="button" name="submit" class="submit" id="submit" value="Submit">
                  <!-- <input type="button" name="previous-step" 
                                class="previous-step" 
                                value="Previous" /> -->

              </fieldset>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="form-loading" style="display: none;">
    <div class="loading" data-loading-text="Updating..."></div>
    <p>Please wait</p>
    <div class="progress" style="position: absolute; top: 62%; left: calc(30% - 0px);width: 40%;">
      <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
    </div>
  </div>



  <script>
    // $(document).ready(function () {
    //       var token = "<?= $this->security->get_csrf_hash(); ?>";
    //     $("#puppy_category").change(function (e) { 
    //         e.preventDefault();
    //       var id=$(this).val();
    //       if(id=='')
    //       {
    //         $('#merge').empty()
    //       }
    //       else{
    //           $.ajax({
    //               type: "post",
    //               url: "<?= base_url() ?>frontend/AdController/check_breed",
    //                 data: {id:id,'csrf_test_name':token},
    //               dataType: "json",
    //               success: function (response) {
    //                   if(response.status=='success')
    //                   {
    //                     $('#merge').empty();
    //                     $('#merge').append(' <label for="titleNoti"></label>\
    //               <input type="checkbox" value="1"  id="merge" name="merge"  >\
    //                 <span>Show ad in <a href="https://nosheddoodles.com" targer="_blank">Nosheddoodles.com</a></span>');
    //                   }
    //                   else{
    //                     $('#merge').empty()
    //                   }

    //               }
    //           });
    //       }
    //     });
    // });
  </script>

  <script>
    $(document).ready(function() {
      $('#youtube').change(function(e) {
        e.preventDefault();
        var val = $(this).val();
        embed_youtube(val)

      });
      embed_youtube('<?= $post->youtube ?>');

      function embed_youtube(val) {
        if (val == '') {
          $('#youtube_embed').empty();
        } else {
          const videoId = getId(val);
          $('#youtube_embed').empty();
          $('#youtube_embed').append('<iframe width="560" height="315" src="//www.youtube.com/embed/' + videoId + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>');
        }
      }

      function getId(url) {
        const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
        const match = url.match(regExp);

        return (match && match[2].length === 11) ?
          match[2] :
          null;
      }

    });
  </script>
  <style type="text/css">
    .form-loading {
      position: fixed;
      background: #ffffffd1;
      height: 100vh;
      width: 100vw;
      z-index: 9999;
      top: 0px;
      left: 0px;
    }

    .form-loading p {
      text-align: center;
      position: absolute;
      top: 55%;
      left: calc(50% - 40px);

      color: gray;
    }

    .loading {
      left: 50%;
      top: 50%;
      font-size: 36px;
      font-family: serif;
      font-weight: bold;
      letter-spacing: 4.4px;
      text-transform: capitalize;
      position: absolute;
      overflow: hidden;
      transform: translate(-50%, -60%);
    }

    .loading:before {
      color: #aaa;
      content: attr(data-loading-text);
    }

    .loading:after {
      top: 0;
      left: 0;
      width: 0;
      opacity: 1;
      color: #444;
      overflow: hidden;
      position: absolute;
      content: attr(data-loading-text);
      -webkit-animation: loading 5s infinite;
      animation: loading 5s infinite;
    }

    @-webkit-keyframes loading {
      0% {
        width: 0;
      }

      100% {
        width: 100%;
      }
    }

    @keyframes loading {
      0% {
        width: 0;
      }

      100% {
        width: 100%;
      }
    }

    .thumb {
      margin: 10px 5px 0 0;
      width: 200px;
      height: 200px;
    }
  </style>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'>
  </script>
  <script src="<?php echo base_url('assets/') ?>js/lightgallery.js"></script>


  <!--    <script src=-->
  <!--'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'>-->
  <!--    </script>-->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#lightgallery_featured").lightGallery();
      $("#lightgallery_mother").lightGallery();
      $("#lightgallery_father").lightGallery();
      $("#response").fadeOut(1000);
      if ($('#upload_option').val() == '1') {
        $('#image_div').show();
        $('#video_div').hide();
      } else if ($('#upload_option').val() == '2') {
        $('#image_div').hide();
        $('#video_div').show();
      }

      $('#video-tags').hide();
      // $('#video-tag').hide();
      $('#video-tags2').hide();
    });
    $('#upload_option').change(function() {
      if ($('#upload_option').val() == '1') {
        $('#image_div').show();
        $('#video_div').hide();
        $("#featured_video").val('');
        $('#video-tag').hide();
      } else if ($('#upload_option').val() == '2') {
        $('#image_div').hide();
        $('#video_div').show();
        $("#featured_image").val('');
        $('#featured').attr('src', '').width(200).height(150);
      }
    });

    //   $('#submit').click(function(){
    //       if($('#featured_image').val() == '')
    //       {
    //           if($('#featured_video').val() == '')
    //           {
    //               swal('Please Upload Featured Image Or Video!!');
    //               return false;
    //           }
    //           else
    //           {
    //               return true;
    //           }

    //       }

    //       else
    //       {
    //           return true;
    //       }
    // });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      var currentGfgStep, nextGfgStep, previousGfgStep;
      var opacity;
      var current = 1;
      var steps = $("fieldset").length;

      setProgressBar(current);

      $(".next-step").click(function() {
        // alert(current);
        $(document).scrollTop(0);
        if (current == '1') {
          if ($('#ad_title').val() == '' || $('#contact_person').val() == '' || $('#phone').val() == '' || $('#available_date').val() == '' || $('#address').val() == '' || $('#puppy_dob').val() == '') {
            swal('Please make sure that all the required fields are not empty!!');
          } else {
            currentGfgStep = $(this).parent();
            nextGfgStep = $(this).parent().next();

            $("#progressbar li").eq($("fieldset")
              .index(nextGfgStep)).addClass("active");

            nextGfgStep.show();
            currentGfgStep.animate({
              opacity: 0
            }, {
              step: function(now) {
                opacity = 1 - now;

                currentGfgStep.css({
                  'display': 'none',
                  'position': 'relative'
                });
                nextGfgStep.css({
                  'opacity': opacity
                });
              },
              duration: 500
            });
            setProgressBar(++current);
          }
        } else if (current == '2') {
          if ($('#puppy_name').val() == '' || $('#puppy_category').val() == '' || $('#puppy_size').val() == '') {
            swal('Please make sure that all the required fields are not empty!!');
          } else if ($('input[name="puppy_age"]:checked').length == 0) {
            swal('Please select Puppy age!!');
            return false;
          } else if ($('input[name="puppy_sex"]:checked').length == 0) {
            swal('Please select Puppy Gender!!');
            return false;
          }
          //  else if($('#ask_price').val() != '' && $('#ask_price').val() > '0.00' && (parseInt($('#sale_price').val()) > parseInt($('#ask_price').val())))
          // {
          //     swal('Selling Price exceeds Asking price!!');
          //         window.scrollTo(0,document.body.scrollHeight);
          //         return false;
          // }
          else {
            currentGfgStep = $(this).parent();
            nextGfgStep = $(this).parent().next();

            $("#progressbar li").eq($("fieldset")
              .index(nextGfgStep)).addClass("active");

            nextGfgStep.show();
            currentGfgStep.animate({
              opacity: 0
            }, {
              step: function(now) {
                opacity = 1 - now;

                currentGfgStep.css({
                  'display': 'none',
                  'position': 'relative'
                });
                nextGfgStep.css({
                  'opacity': opacity
                });
              },
              duration: 500
            });
            setProgressBar(++current);
          }
        } else if (current == '3') {

          currentGfgStep = $(this).parent();
          nextGfgStep = $(this).parent().next();

          $("#progressbar li").eq($("fieldset")
            .index(nextGfgStep)).addClass("active");

          nextGfgStep.show();
          currentGfgStep.animate({
            opacity: 0
          }, {
            step: function(now) {
              opacity = 1 - now;

              currentGfgStep.css({
                'display': 'none',
                'position': 'relative'
              });
              nextGfgStep.css({
                'opacity': opacity
              });
            },
            duration: 500
          });
          setProgressBar(++current);
        }


      });

      $(".previous-step").click(function() {
        $(document).scrollTop(0);
        currentGfgStep = $(this).parent();
        previousGfgStep = $(this).parent().prev();

        $("#progressbar li").eq($("fieldset")
          .index(currentGfgStep)).removeClass("active");

        previousGfgStep.show();

        currentGfgStep.animate({
          opacity: 0
        }, {
          step: function(now) {
            opacity = 1 - now;

            currentGfgStep.css({
              'display': 'none',
              'position': 'relative'
            });
            previousGfgStep.css({
              'opacity': opacity
            });
          },
          duration: 500
        });
        setProgressBar(--current);
      });

      function setProgressBar(currentStep) {
        var percent = parseFloat(100 / steps) * current;
        percent = percent.toFixed();
        $(".progress-bar")
          .css("width", percent + "%")
      }

      $(".submit").click(function() {
        $('.form-loading').show();

      })
    });
  </script>

  <script src="<?= base_url(); ?>assets/front/plugins/tinymce/tinymce.min.js"></script>
  <script type="text/javascript">
    var vToolBar = 'undo redo | bold italic underline | forecolor backcolor | ' +
      'bullist numlist blockquote table | link unlink | ' +
      'alignleft aligncenter alignright | outdent indent | fontsizeselect';
    tinymce.init({
      selector: '#description',
      language: 'en',
      directionality: 'ltr',
      height: 200,
      menubar: false,
      statusbar: false,
      plugins: 'lists  table',
      toolbar: vToolBar,
       setup: function(editor) {
        editor.on('change', function() {
          
          editor.save();
            editor.getBody().setAttribute('spellcheck', true);
        });
          
      }
    });
    tinymce.addI18n('en', {
      "Redo": "Redo",
      "Undo": "Undo",
      "Cut": "Cut",
      "Copy": "Copy",
      "Paste": "Paste",
      "Select all": "Select all",
      "New document": "New document",
      "Ok": "Ok",
      "Cancel": "Cancel",
      "Visual aids": "Visual aids",
      "Bold": "Bold",
      "Italic": "Italic",
      "Underline": "Underline",
      "Strikethrough": "Strikethrough",
      "Superscript": "Superscript",
      "Subscript": "Subscript",
      "Clear formatting": "Clear formatting",
      "Align left": "Align left",
      "Align center": "Align center",
      "Align right": "Align right",
      "Justify": "Justify",
      "Bullet list": "Bullet list",
      "Numbered list": "Numbered list",
      "Decrease indent": "Decrease indent",
      "Increase indent": "Increase indent",
      "Close": "Close",
      "Formats": "Formats",
      "Your browser doesn't support direct access to the clipboard. Please use the Ctrl+X\\\/C\\\/V keyboard shortcuts instead.": "Your browser doesn't support direct access to the clipboard. Please use the Ctrl+X\\\/C\\\/V keyboard shortcuts instead.",
      "Headers": "Headers",
      "Header 1": "Header 1",
      "Header 2": "Header 2",
      "Header 3": "Header 3",
      "Header 4": "Header 4",
      "Header 5": "Header 5",
      "Header 6": "Header 6",
      "Headings": "Headings",
      "Heading 1": "Heading 1",
      "Heading 2": "Heading 2",
      "Heading 3": "Heading 3",
      "Heading 4": "Heading 4",
      "Heading 5": "Heading 5",
      "Heading 6": "Heading 6",
      "Preformatted": "Preformatted",
      "Div": "Div",
      "Pre": "Pre",
      "Code": "Code",
      "Paragraph": "Paragraph",
      "Blockquote": "Blockquote",
      "Inline": "Inline",
      "Blocks": "Blocks",
      "Paste is now in plain text mode. Contents will now be pasted as plain text until you toggle this option off.": "Paste is now in plain text mode. Contents will now be pasted as plain text until you toggle this option off.",
      "Fonts": "Fonts",
      "Font Sizes": "Font Sizes",
      "Class": "Class",
      "Browse for an image": "Browse for an image",
      "OR": "OR",
      "Drop an image here": "Drop an image here",
      "Upload": "Upload",
      "Block": "Block",
      "Align": "Align",
      "Default": "Default",
      "Circle": "Circle",
      "Disc": "Disc",
      "Square": "Square",
      "Lower Alpha": "Lower Alpha",
      "Lower Greek": "Lower Greek",
      "Lower Roman": "Lower Roman",
      "Upper Alpha": "Upper Alpha",
      "Upper Roman": "Upper Roman",
      "Anchor...": "Anchor...",
      "Name": "Name",
      "Id": "Id",
      "Id should start with a letter, followed only by letters, numbers, dashes, dots, colons or underscores.": "Id should start with a letter, followed only by letters, numbers, dashes, dots, colons or underscores.",
      "You have unsaved changes are you sure you want to navigate away?": "You have unsaved changes are you sure you want to navigate away?",
      "Restore last draft": "Restore last draft",
      "Special character...": "Special character...",
      "Source code": "Source code",
      "Insert\\\/Edit code sample": "Insert\\\/Edit code sample",
      "Language": "Language",
      "Code sample...": "Code sample...",
      "Color Picker": "Color Picker",
      "R": "R",
      "G": "G",
      "B": "B",
      "Left to right": "Left to right",
      "Right to left": "Right to left",
      "Emoticons...": "Emoticons...",
      "Metadata and Document Properties": "Metadata and Document Properties",
      "Title": "Title",
      "Keywords": "Keywords",
      "Description": "Description",
      "Robots": "Robots",
      "Author": "Author",
      "Encoding": "Encoding",
      "Fullscreen": "Fullscreen",
      "Action": "Action",
      "Shortcut": "Shortcut",
      "Help": "Help",
      "Address": "Address",
      "Focus to menubar": "Focus to menubar",
      "Focus to toolbar": "Focus to toolbar",
      "Focus to element path": "Focus to element path",
      "Focus to contextual toolbar": "Focus to contextual toolbar",
      "Insert link (if link plugin activated)": "Insert link (if link plugin activated)",
      "Save (if save plugin activated)": "Save (if save plugin activated)",
      "Find (if searchreplace plugin activated)": "Find (if searchreplace plugin activated)",
      "Plugins installed ({0}):": "Plugins installed ({0}):",
      "Premium plugins:": "Premium plugins:",
      "Learn more...": "Learn more...",
      "You are using {0}": "You are using {0}",
      "Plugins": "Plugins",
      "Handy Shortcuts": "Handy Shortcuts",
      "Horizontal line": "Horizontal line",
      "Insert\\\/edit image": "Insert\\\/edit image",
      "Image description": "Image description",
      "Source": "Source",
      "Dimensions": "Dimensions",
      "Constrain proportions": "Constrain proportions",
      "General": "General",
      "Advanced": "Advanced",
      "Style": "Style",
      "Vertical space": "Vertical space",
      "Horizontal space": "Horizontal space",
      "Border": "Border",
      "Insert image": "Insert image",
      "Image...": "Image...",
      "Image list": "Image list",
      "Rotate counterclockwise": "Rotate counterclockwise",
      "Rotate clockwise": "Rotate clockwise",
      "Flip vertically": "Flip vertically",
      "Flip horizontally": "Flip horizontally",
      "Edit image": "Edit image",
      "Image options": "Image options",
      "Zoom in": "Zoom in",
      "Zoom out": "Zoom out",
      "Crop": "Crop",
      "Resize": "Resize",
      "Orientation": "Orientation",
      "Brightness": "Brightness",
      "Sharpen": "Sharpen",
      "Contrast": "Contrast",
      "Color levels": "Color levels",
      "Gamma": "Gamma",
      "Invert": "Invert",
      "Apply": "Apply",
      "Back": "Back",
      "Insert date\\\/time": "Insert date\\\/time",
      "Date\\\/time": "Date\\\/time",
      "Insert\\\/Edit Link": "Insert\\\/Edit Link",
      "Insert\\\/edit link": "Insert\\\/edit link",
      "Text to display": "Text to display",
      "Url": "Url",
      "Open link in...": "Open link in...",
      "Current window": "Current window",
      "None": "None",
      "New window": "New window",
      "Remove link": "Remove link",
      "Anchors": "Anchors",
      "Link...": "Link...",
      "Paste or type a link": "Paste or type a link",
      "The URL you entered seems to be an email address. Do you want to add the required mailto: prefix?": "The URL you entered seems to be an email address. Do you want to add the required mailto: prefix?",
      "The URL you entered seems to be an external link. Do you want to add the required http:\\\/\\\/ prefix?": "The URL you entered seems to be an external link. Do you want to add the required http:\\\/\\\/ prefix?",
      "Link list": "Link list",
      "Insert video": "Insert video",
      "Insert\\\/edit video": "Insert\\\/edit video",
      "Insert\\\/edit media": "Insert\\\/edit media",
      "Alternative source": "Alternative source",
      "Alternative source URL": "Alternative source URL",
      "Media poster (Image URL)": "Media poster (Image URL)",
      "Paste your embed code below:": "Paste your embed code below:",
      "Embed": "Embed",
      "Media...": "Media...",
      "Nonbreaking space": "Nonbreaking space",
      "Page break": "Page break",
      "Paste as text": "Paste as text",
      "Preview": "Preview",
      "Print...": "Print...",
      "Save": "Save",
      "Find": "Find",
      "Replace with": "Replace with",
      "Replace": "Replace",
      "Replace all": "Replace all",
      "Previous": "Previous",
      "Next": "Next",
      "Find and replace...": "Find and replace...",
      "Could not find the specified string.": "Could not find the specified string.",
      "Match case": "Match case",
      "Find whole words only": "Find whole words only",
      "Spell check": "Spell check",
      "Ignore": "Ignore",
      "Ignore all": "Ignore all",
      "Finish": "Finish",
      "Add to Dictionary": "Add to Dictionary",
      "Insert table": "Insert table",
      "Table properties": "Table properties",
      "Delete table": "Delete table",
      "Cell": "Cell",
      "Row": "Row",
      "Column": "Column",
      "Cell properties": "Cell properties",
      "Merge cells": "Merge cells",
      "Split cell": "Split cell",
      "Insert row before": "Insert row before",
      "Insert row after": "Insert row after",
      "Delete row": "Delete row",
      "Row properties": "Row properties",
      "Cut row": "Cut row",
      "Copy row": "Copy row",
      "Paste row before": "Paste row before",
      "Paste row after": "Paste row after",
      "Insert column before": "Insert column before",
      "Insert column after": "Insert column after",
      "Delete column": "Delete column",
      "Cols": "Cols",
      "Rows": "Rows",
      "Width": "Width",
      "Height": "Height",
      "Cell spacing": "Cell spacing",
      "Cell padding": "Cell padding",
      "Show caption": "Show caption",
      "Left": "Left",
      "Center": "Center",
      "Right": "Right",
      "Cell type": "Cell type",
      "Scope": "Scope",
      "Alignment": "Alignment",
      "H Align": "H Align",
      "V Align": "V Align",
      "Top": "Top",
      "Middle": "Middle",
      "Bottom": "Bottom",
      "Header cell": "Header cell",
      "Row group": "Row group",
      "Column group": "Column group",
      "Row type": "Row type",
      "Header": "Header",
      "Body": "Body",
      "Footer": "Footer",
      "Border color": "Border color",
      "Insert template...": "Insert template...",
      "Templates": "Templates",
      "Template": "Template",
      "Text color": "Text color",
      "Background color": "Background color",
      "Custom...": "Custom...",
      "Custom color": "Custom color",
      "No color": "No color",
      "Remove color": "Remove color",
      "Table of Contents": "Table of Contents",
      "Show blocks": "Show blocks",
      "Show invisible characters": "Show invisible characters",
      "Word count": "Word count",
      "Count": "Count",
      "Document": "Document",
      "Selection": "Selection",
      "Words": "Words",
      "Words: {0}": "Words: {0}",
      "{0} words": "{0} words",
      "File": "File",
      "Edit": "Edit",
      "Insert": "Insert",
      "View": "View",
      "Format": "Format",
      "Table": "Table",
      "Tools": "Tools",
      "Powered by {0}": "Powered by {0}",
      "Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help": "Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help",
      "Image title": "Image title",
      "Border width": "Border width",
      "Border style": "Border style",
      "Error": "Error",
      "Warn": "Warn",
      "Valid": "Valid",
      "To open the popup, press Shift+Enter": "To open the popup, press Shift+Enter",
      "Rich Text Area. Press ALT-0 for help.": "Rich Text Area. Press ALT-0 for help.",
      "System Font": "System Font",
      "Failed to upload image: {0}": "Failed to upload image: {0}",
      "Failed to load plugin: {0} from url {1}": "Failed to load plugin: {0} from url {1}",
      "Failed to load plugin url: {0}": "Failed to load plugin url: {0}",
      "Failed to initialize plugin: {0}": "Failed to initialize plugin: {0}",
      "example": "example",
      "Search": "Search",
      "All": "All",
      "Currency": "Currency",
      "Text": "Text",
      "Quotations": "Quotations",
      "Mathematical": "Mathematical",
      "Extended Latin": "Extended Latin",
      "Symbols": "Symbols",
      "Arrows": "Arrows",
      "User Defined": "User Defined",
      "dollar sign": "dollar sign",
      "currency sign": "currency sign",
      "euro-currency sign": "euro-currency sign",
      "colon sign": "colon sign",
      "cruzeiro sign": "cruzeiro sign",
      "french franc sign": "french franc sign",
      "lira sign": "lira sign",
      "mill sign": "mill sign",
      "naira sign": "naira sign",
      "peseta sign": "peseta sign",
      "rupee sign": "rupee sign",
      "won sign": "won sign",
      "new sheqel sign": "new sheqel sign",
      "dong sign": "dong sign",
      "kip sign": "kip sign",
      "tugrik sign": "tugrik sign",
      "drachma sign": "drachma sign",
      "german penny symbol": "german penny symbol",
      "peso sign": "peso sign",
      "guarani sign": "guarani sign",
      "austral sign": "austral sign",
      "hryvnia sign": "hryvnia sign",
      "cedi sign": "cedi sign",
      "livre tournois sign": "livre tournois sign",
      "spesmilo sign": "spesmilo sign",
      "tenge sign": "tenge sign",
      "indian rupee sign": "indian rupee sign",
      "turkish lira sign": "turkish lira sign",
      "nordic mark sign": "nordic mark sign",
      "manat sign": "manat sign",
      "ruble sign": "ruble sign",
      "yen character": "yen character",
      "yuan character": "yuan character",
      "yuan character, in hong kong and taiwan": "yuan character, in hong kong and taiwan",
      "yen\\\/yuan character variant one": "yen\\\/yuan character variant one",
      "Loading emoticons...": "Loading emoticons...",
      "Could not load emoticons": "Could not load emoticons",
      "People": "People",
      "Animals and Nature": "Animals and Nature",
      "Food and Drink": "Food and Drink",
      "Activity": "Activity",
      "Travel and Places": "Travel and Places",
      "Objects": "Objects",
      "Flags": "Flags",
      "Characters": "Characters",
      "Characters (no spaces)": "Characters (no spaces)",
      "{0} characters": "{0} characters",
      "Error: Form submit field collision.": "Error: Form submit field collision.",
      "Error: No form element found.": "Error: No form element found.",
      "Update": "Update",
      "Color swatch": "Color swatch",
      "Turquoise": "Turquoise",
      "Green": "Green",
      "Blue": "Blue",
      "Purple": "Purple",
      "Navy Blue": "Navy Blue",
      "Dark Turquoise": "Dark Turquoise",
      "Dark Green": "Dark Green",
      "Medium Blue": "Medium Blue",
      "Medium Purple": "Medium Purple",
      "Midnight Blue": "Midnight Blue",
      "Yellow": "Yellow",
      "Orange": "Orange",
      "Red": "Red",
      "Light Gray": "Light Gray",
      "Gray": "Gray",
      "Dark Yellow": "Dark Yellow",
      "Dark Orange": "Dark Orange",
      "Dark Red": "Dark Red",
      "Medium Gray": "Medium Gray",
      "Dark Gray": "Dark Gray",
      "Light Green": "Light Green",
      "Light Yellow": "Light Yellow",
      "Light Red": "Light Red",
      "Light Purple": "Light Purple",
      "Light Blue": "Light Blue",
      "Dark Purple": "Dark Purple",
      "Dark Blue": "Dark Blue",
      "Black": "Black",
      "White": "White",
      "Switch to or from fullscreen mode": "Switch to or from fullscreen mode",
      "Open help dialog": "Open help dialog",
      "history": "history",
      "styles": "styles",
      "formatting": "formatting",
      "alignment": "alignment",
      "indentation": "indentation",
      "permanent pen": "permanent pen",
      "comments": "comments",
      "Format Painter": "Format Painter",
      "Insert\\\/edit iframe": "Insert\\\/edit iframe",
      "Capitalization": "Capitalization",
      "lowercase": "lowercase",
      "UPPERCASE": "UPPERCASE",
      "Title Case": "Title Case",
      "Permanent Pen Properties": "Permanent Pen Properties",
      "Permanent pen properties...": "Permanent pen properties...",
      "Font": "Font",
      "Size": "Size",
      "More...": "More...",
      "Spellcheck Language": "Spellcheck Language",
      "Select...": "Select...",
      "Preferences": "Preferences",
      "Yes": "Yes",
      "No": "No",
      "Keyboard Navigation": "Keyboard Navigation",
      "Version": "Version",
      "Anchor": "Anchor",
      "Special character": "Special character",
      "Code sample": "Code sample",
      "Color": "Color",
      "Emoticons": "Emoticons",
      "Document properties": "Document properties",
      "Image": "Image",
      "Insert link": "Insert link",
      "Target": "Target",
      "Link": "Link",
      "Poster": "Poster",
      "Media": "Media",
      "Print": "Print",
      "Prev": "Prev",
      "Find and replace": "Find and replace",
      "Whole words": "Whole words",
      "Spellcheck": "Spellcheck",
      "Caption": "Caption",
      "Insert template": "Insert template"
    });
  </script>

  <script src="https://maps.google.com/maps/api/js?key=AIzaSyCXzuM95auojpcl1ea54z9CNR9v1K97fTQ&libraries=places" type="text/javascript"></script>
  <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>-->


  <script>
    function readURL(input, id) {

      // id = id || '#featured' || '#mother_photo' || '#father_photo';

      if (input.files && input.files[0]) {

        var reader = new FileReader();



        reader.onload = function(e) {

          $(id)

            .attr('src', e.target.result)

            .width(200)

            .height(150);

        };



        reader.readAsDataURL(input.files[0]);
      }

    }



    const videoSrc = document.querySelector("#video-source");
    const videoTag = document.querySelector("#video-tag");
    const inputTag = document.querySelector("#featured_video");

    inputTag.addEventListener('change', readVideo)

    function readVideo(event) {

      console.log(event.target.files)
      if (event.target.files && event.target.files[0]) {
        $('#video-tag').show();
        var reader = new FileReader();

        reader.onload = function(e) {
          console.log('loaded')
          videoSrc.src = e.target.result
          videoTag.load()
        }.bind(this)

        reader.readAsDataURL(event.target.files[0]);
      }
    }

    const videoSrcs = document.querySelector("#video-sources");
    const videoTags = document.querySelector("#video-tags");
    const videoSrcs2 = document.querySelector("#video-sources2");
    const videoTags2 = document.querySelector("#video-tags2");
    const inputTags = document.querySelector("#video_gallery");
    // alert(inputTags);

    inputTags.addEventListener('change', readVideos)

    function readVideos(event) {
      $('#video-tags').hide();
      $('#video-tags2').hide();
      console.log(event.target.files)
      if (event.target.files && event.target.files[0]) {
        $('#video-tags').show();
        var reader = new FileReader();

        reader.onload = function(e) {
          console.log('loaded')
          videoSrcs.src = e.target.result
          videoTags.load()
        }.bind(this)

        reader.readAsDataURL(event.target.files[0]);
      }
      if (event.target.files && event.target.files[1]) {
        $('#video-tags2').show();
        var reader = new FileReader();

        reader.onload = function(e) {
          console.log('loaded')
          videoSrcs2.src = e.target.result
          videoTags2.load()
        }.bind(this)

        reader.readAsDataURL(event.target.files[1]);
      }
    }
  </script>
  <script>
    var number = 1;
    do {
      function showPreview(event, number) {
        if (event.target.files.length > 0) {
          let src = URL.createObjectURL(event.target.files[0]);
          let preview = document.getElementById("file-ip-" + number + "-preview");
          preview.src = src;
          preview.style.display = "block";
        }
      }

      function myImgRemove(number) {

        var id = $('#post_id').val();
        var status = $('#photo_' + number).val();
        document.getElementById("file-ip-" + number + "-preview").src = "<?php echo base_url('uploads/upload_logo.png') ?>";
        document.getElementById("file-ip-" + number).value = null;
        swal('You have successfully deleted the image. It cannot be restored !!');
        $.ajax({
          type: "post",
          url: "<?= base_url() ?>frontend/AdController/deleteImage",
          data: {
            'id': id,
            status: status,
            "<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
          },
          dataType: "json",
          success: function(data) {
            console.log(data);

          }
        });
      }
      number++;
    }
    while (number < 3);
  </script>
  <script>
    $('.delete').click(function() {
      var id = $('#post_id').val();
      var status = $(this).closest(".pip").find("input[name='phot']").val();
      swal('You have successfully deleted the image. It cannot be restored !!');
      $(this).parent(".pip").remove();
      $.ajax({
        type: "post",
        url: "<?= base_url() ?>frontend/AdController/deleteImage",
        data: {
          'id': id,
          status: status,
          "<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
        },
        dataType: "json",
        success: function(data) {

        }
      });
    });
    $('#mother_photo_delete').click(function(e) {
      document.getElementById("mother_photo").src = "<?php echo base_url('uploads/upload_logo.png') ?>";
      document.getElementById("mother_photo_value").value = null;
      document.getElementById("mothers").value = null;

    });
    $('#father_photo_delete').click(function(e) {
      document.getElementById("father_photo").src = "<?php echo base_url('uploads/upload_logo.png') ?>";
      document.getElementById("fathers").value = null;

    });
    $('#featured_photo_delete').click(function(e) {
      document.getElementById("featured").src = "<?php echo base_url('uploads/upload_logo.png') ?>";
      document.getElementById("featured_image").value = null;
      document.getElementById("feature").value = null;

    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      if (window.File && window.FileList && window.FileReader) {
        $("#files").on("change", function(e) {
          var files = e.target.files,
            filesLength = files.length;
          filesLength = parseInt(filesLength) + parseInt($('#tot_count').val());
          alert(filesLength);
          if (filesLength <= 10) {
            for (var i = 0; i < filesLength; i++) {
              var f = files[i]
              var fileReader = new FileReader();
              fileReader.onload = (function(e) {
                var file = e.target;
                $("<span class=\"pip\">" +
                  "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                  "<br/><span class=\"remove\">Remove image</span>" +
                  "</span>").insertAfter("#files");
                $(".remove").click(function() {
                  $(this).parent(".pip").remove();
                });


              });
              fileReader.readAsDataURL(f);
            }
            console.log(files);
          } else {
            swal('Select less than 10 Images!!');
          }
        });
      } else {
        swal("Your browser doesn't support to File API")
      }
    });

    $(document).ready(function() {
      $('#puppy_category').change(function(e) {
        e.preventDefault();
        $('.puppy_size_radio').empty();
        var breed = $(this).val();

        $.ajax({
          type: "GET",
          url: "<?= base_url() ?>frontend/AdController/get_size_radio/" + breed,
          data: {},
          dataType: "json",
          success: function(response) {
            $('.puppy_size_radio').empty();
            $('.puppy_size_radio').append(response.msg);
          }
        });

      });

    });
  </script>



  <script>
    $(document).ready(function() {
      $('#other_registration').change(function() {
        if ($(this).prop("checked")) {

          $('#specify_other').show();
        } else {

          $('#specify_other').hide();
          $('#other_registration').val('');
          $('#other_registration_text').val('');
        }


      });

      $('#other_registration_text').keyup(function() {
        var val = $(this).val();
        $('#other_registration').val(val);
        console.log(val);
      });
    });
  </script>

  <link rel="stylesheet" href="<?= base_url() ?>assets/dropzone/dropzone.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>

  <script src="<?= base_url() ?>assets/dropzone/dropzone.js"></script>



  <script>
    Dropzone.autoDiscover = false;
    $(document).ready(function() {
      $('.reorder').on('click', function() {
        $("ul.nav").sortable({
          tolerance: 'pointer'
        });
        $('.reorder').html('Save Reordering');
        $('.reorder').attr("id", "updateReorder");
        $('#reorder-msg').slideDown('');
        $('.img-link').attr("href", "javascript:;");
        $('.img-link').css("cursor", "move");
        $("#updateReorder").click(function(e) {
          if (!$("#updateReorder i").length) {
            $(this).html('').prepend('<i class="fa fa-spin fa-spinner"></i>');
            $("ul.nav").sortable('destroy');
            $("#reorder-msg").html("Reordering Photos - This could take a moment. Please don't navigate away from this page.").removeClass('light_box').addClass('notice notice_error');

            var h = [];
            $("ul.nav li").each(function() {
              h.push($(this).attr('id').substr(9));
            });

            $.ajax({
              type: "POST",
              url: "ajax/update.php",
              data: {
                ids: " " + h + ""
              },
              success: function(data) {
                if (data == 1 || parseInt(data) == 1) {
                  window.location.reload();
                }
              }
            });
            return false;
          }
          e.preventDefault();
        });
      });

      $(function() {
        $("#myDrop").sortable({
          items: '.dz-preview',
          cursor: 'move',
          opacity: 0.5,
          containment: '#myDrop',
          distance: 20,
          tolerance: 'pointer',
        });

        $("#myDrop").disableSelection();
      });

      //Dropzone script


      var myDropzone = new Dropzone("div#myDrop", {
        paramName: "img_gallery", // The name that will be used to transfer the file
        addRemoveLinks: true,
        uploadMultiple: true,
        autoProcessQueue: false,
        parallelUploads: 50,
        maxFilesize: 20, // MB
        acceptedFiles: ".png, .jpeg, .jpg",
        url: "<?= base_url() ?>posts/editad/<?= $post->id ?>",

      });



      myDropzone.on("sendingmultiple", function(file, xhr, formData) {
        var filenames = [];
tinyMCE.triggerSave();
        var old_photo_array = '<?php echo json_encode($photo); ?>';

        $('.dz-preview .dz-filename').each(function() {
          // console.log($(this).find('span').text());

          formData.append('filenames[]', $(this).find('span').text());


        });

        // formData.append('filenames', filenames);

        $.each(JSON.parse(old_photo_array), function(key, val) {

          formData.append('old_photos[]', val.picture);
        });



        $("form").find("input").each(function() {
          formData.append($(this).attr("name"), $(this).val());
        });

        formData.append('puppy_category', $('#puppy_category').val());
        formData.append('description', $('#description').val());
        formData.append('contact_person', $('#contact_person').val());
        formData.append('location', $('#location').val());

        formData.append("mother_photo", $('#mother_photo_value')[0].files[0]);

        formData.append("father_photo", $('#father_photo_value')[0].files[0]);
        
         formData.append("video_gallery[]", $('#video_gallery')[0].files[0]);
         
          formData.append("puppy_size", $('input[name=puppy_size]:checked').val());
          formData.append("puppy_sex", $('input[name=puppy_sex]:checked').val());
          
          if($('#registration1:checked').length != 0)
        {
          formData.append("registration[]", 'ACA');
        }
          if($('#registration2:checked').length != 0)
        {
          formData.append("registration[]", 'AKC');
        }

          if($('#training_package:checked').length == 0)
        {
          formData.append("training_package", 0);
        }
        else{
             formData.append("training_package", 1);
        }
       

        var started_at = new Date();
        xhr.upload.addEventListener(
          "progress",
          function(e) {
            if (e.lengthComputable) {
              // Append progress percentage.
              var loaded = e.loaded;
              var total = e.total;
              var progressValue = Math.round((loaded / total) * 100);

              $('.progress-bar').css('width', progressValue + '%').attr('aria-valuenow', progressValue);
              if (progressValue == 100) {
                $(".progress-bar").text("Finalizing...");
              } else {
                $(".progress-bar").text(progressValue + "%");
              }

              console.log(progressValue);

            }
          },
          false
        );





      });

      /* Add Files Script*/
      myDropzone.on("success", function(file, message) {
        var resp = $.parseJSON(message);
        if (resp.status == 'success') {


          swal(resp.msg);
          window.location.replace("<?= base_url() ?>" + resp.url);


        } else {
          $('.form-loading').hide();
          swal(resp.msg);
        }
        //setTimeout(function(){window.location.href="index.php"},200);
      });

      myDropzone.on("error", function(data) {
        $("#msg").html('<div class="alert alert-danger">There is some thing wrong, Please try again!</div>');
      });

      myDropzone.on("complete", function(file) {
        file.status = 'queued';
        // myDropzone.removeFile(file);
      });




      $("#submit").on("click", function() {

        console.log(myDropzone.getQueuedFiles().length);

        if (myDropzone.getQueuedFiles().length == 0) {
          submit_form();
        } else {
          myDropzone.processQueue();
          $('.form-loading').show();
          myDropzone.on("processing", function(file) {
            myDropzone.options.url = "<?= base_url() ?>posts/editad/<?= $post->id ?>";
          });
        }




      });


      $('#remove_all_files').click(function(e) {
        e.preventDefault();
        myDropzone.removeAllFiles(true);
      });


      <?php
      foreach ($photo as $key => $photos) {
      ?>
        var mockFile = {
          name: "<?= $photos['picture'] ?>",
          size: 100
        };

        myDropzone.emit("addedfile", mockFile);
        myDropzone.emit("thumbnail", mockFile, '<?= base_url() ?>uploads/puppies/<?= $photos['picture'] ?>');
        myDropzone.emit("complete", mockFile);

      <?php } ?>


      function submit_form() {
tinyMCE.triggerSave();
        var form = $("#form")[0];

        var data = new FormData(form);

        var old_photo_array = '<?php echo json_encode($photo); ?>';

        $('.dz-preview .dz-filename').each(function() {
          // console.log($(this).find('span').text());

          data.append('filenames[]', $(this).find('span').text());


        });

        // formData.append('filenames', filenames);

        $.each(JSON.parse(old_photo_array), function(key, val) {

          data.append('old_photos[]', val.picture);
        });
        
          if($('#registration1:checked').length != 0)
        {
          data.append("registration[]", 'ACA');
          
        }
          if($('#registration2:checked').length != 0)
        {
          data.append("registration[]", 'AKC');
        }
        
          data.append("puppy_size", $('input[name=puppy_size]:checked').val());
          data.append("puppy_sex", $('input[name=puppy_sex]:checked').val());
        //   alert(data);

        $.ajax({
          url: "<?= base_url() ?>posts/editad/<?= $post->id ?>",
          method: "post",
          data: data,
          enctype: "multipart/form-data",
          processData: false, // Important!
          contentType: false,
          cache: false,
          dataType: "json",

          xhr: function() {
            var xhr = new window.XMLHttpRequest();
            var started_at = new Date();
            xhr.upload.addEventListener(
              "progress",
              function(e) {
                if (e.lengthComputable) {
                  // Append progress percentage.
                  var loaded = e.loaded;
                  var total = e.total;
                  var progressValue = Math.round((loaded / total) * 100);
                  $('.progress-bar').css('width', progressValue + '%').attr('aria-valuenow', progressValue);
                  if (progressValue == 100) {
                    $(".progress-bar").text("Finalizing...");
                  } else {
                    $(".progress-bar").text(progressValue + "%");
                  }


                }
              },
              false
            );
            return xhr;
          },
          success: function(resp) {

            if (resp.status == 'success') {


              swal(resp.msg);
              window.location.replace("<?= base_url() ?>" + resp.url);


            } else {
              $('.form-loading').hide();
              swal(resp.msg);
            }

          },
        });
      }

    });
  </script>
  <script>
    $('.delete_video').on('click', function(){
        var id = $(this).closest("div.vide_class").find("input[name='video_id']").val();
        var status = $(this).closest("div.vide_class").find("input[name='video_stat']").val();
        swal('You have successfully deleted the Video. It cannot be restored !!');
          $('#myvideo').hide();
          $.ajax({
            type: "post",
            url: "<?= base_url() ?>frontend/AdController/deletevideo",
            data: {
              'id': id,
              status: status,
              "<?= $this->security->get_csrf_token_name() ?>": "<?= $this->security->get_csrf_hash() ?>"
            },
            dataType: "json",
            success: function(data) {
                location.reload();
    
            }
          });
    });
  </script>