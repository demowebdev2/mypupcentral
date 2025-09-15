<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <?php $this->load->view('front/profile_sidebar');
            $postcount = $this->common_model->getpostcount();
            $enquirycount = $this->common_model->getenquirycount();
            $viewcount = $this->common_model->getviewcount();
            // var_dump($viewcount);exit;
            ?>
            <?php
            $imgs = explode(',', $user->kennel_images);
            ?>
            <div class="col-md-9 page-content">
                <?php if ($this->session->flashdata('msg')) { ?>
                    <?php echo $this->session->flashdata('msg') ?>
                <?php } ?>


                <div id="avatarUploadError" class="center-block alert alert-block alert-danger" style="width:100%; display:none"></div>
                <div id="avatarUploadSuccess" class="alert alert-success fade show" style="display:none;"></div>

                <div class="inner-box default-inner-box">
                    <div class="row">
                        <div class="col-md-5 col-sm-4 col-12">
                            <h3 class="no-padding text-center-480 useradmin">
                                <a href="">

                                    <img id="userImg" class="userImg" src="<?= base_url() ?>assets/front/images/user.jpg" alt="user">&nbsp;


                                    <?= $user->name; ?>
                                </a>
                            </h3>
                        </div>
                        <div class="col-md-7 col-sm-8 col-12">
                            <div class="header-data text-center-xs">

                                <div class="hdata">
                                    <div class="mcol-left">
                                        <i class="fas fa-envelope ln-shadow"></i>
                                    </div>
                                    <div class="mcol-right">

                                        <p>
                                            <a href="#">
                                                <?= $enquirycount ?>
                                                <em>messages</em>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>


                                <div class="hdata">
                                    <div class="mcol-left">
                                        <i class="fa fa-eye ln-shadow"></i>
                                    </div>
                                    <div class="mcol-right">

                                        <p>
                                            <a href="#">
                                                <?= $viewcount ?>
                                                <em>visit</em>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>


                                <div class="hdata">
                                    <div class="mcol-left">
                                        <i class="icon-th-thumb ln-shadow"></i>
                                    </div>
                                    <div class="mcol-right">

                                        <p>
                                            <a href="#">
                                                <?= $postcount ?>
                                                <em>ads</em>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>


                                <div class="hdata">
                                    <div class="mcol-left">
                                        <i class="fa fa-user ln-shadow"></i>
                                    </div>
                                    <div class="mcol-right">

                                        <p>
                                            <a href="#">
                                                0
                                                <em>favorite </em>
                                            </a>
                                        </p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="inner-box default-inner-box">
                    <div class="welcome-msg">
                        <h3 class="page-sub-header2 clearfix no-padding">Hello <?= $user->name; ?> (ID : <?= $user->id; ?>) </h3>
                        <span class="page-sub-header-sub small">
                            You last logged in at: <?= $user->last_login_at; ?>
                        </span>
                    </div>

                    <div id="accordion" class="panel-group">



                        <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="#userPanel" aria-expanded="true" data-bs-toggle="collapse" data-parent="#accordion">Account Details</a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse show" id="userPanel">
                                <div class="card-body">
                                    <form name="details" class="form-horizontal" role="form" method="POST" action="<?= base_url() ?>frontend/Profile/update_account" enctype="multipart/form-data">

                                        <?php echo $this->customlib->getCSRF(); ?>

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Name <sup>*</sup></label>
                                            <div class="col-md-9">
                                                <input name="name" type="text" class="form-control" placeholder="" value="<?= $user->name ?>">
                                            </div>
                                        </div>

                                      

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Email
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="icon-mail"></i></span>
                                                    <input id="email" name="email" type="email" class="form-control" disabled placeholder="Email" value="<?= $user->email; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 required">
                                            <label for="phone" class="col-md-3 col-form-label">Phone
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <span id="phoneCountry" class="input-group-text"><img src="<?= base_url() ?>assets/front/images/flags/16/us.png" style="padding: 2px;"></span>
                                                    <input id="phone" name="phone" disabled type="text" class="form-control" placeholder="Phone Number" value="<?= $user->phone; ?>">

                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                         <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Address </label>
                                            <div class="col-md-9">
                                                <input name="address" type="text" class="form-control" placeholder="" value="<?= $user->address ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">City </label>
                                            <div class="col-md-9">
                                                <input name="city" type="text" class="form-control" placeholder="" value="<?= $user->city ?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">State </label>
                                            <div class="col-md-9">
                                                <select class="form-control" name="state" required>
                                            <option value="">Select</option>
                    <?php foreach ($states as $row) { ?>
                      <option value="<?= $row->STATE_NAME ?>|<?= $row->ID ?>" <?php if ($row->ID == $user->state_id) {
                                                                                echo 'selected';
                                                                              } ?>><?= $row->STATE_NAME ?></option>

                    <?php } ?>
                                            </select>
                                            </div>
                                        </div>


                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Zip Code </label>
                                            <div class="col-md-9">
                                                <input name="zip_code" type="text" class="form-control" placeholder="" value="<?= $user->zip_code ?>">
                                            </div>
                                        </div>
                                        
                                          <input type="hidden" value="<?= $user->description ?>" name="description">
                                        <input type="hidden" value="<?= $user->site_url ?>" name="site_url">
                                        <input type="hidden" value="<?= $user->youtube_url ?>" name="youtube_url">
                                        
                                         <input type="hidden" value="<?= $user->federal_license ?>" name="federal_license">
                                        <input type="hidden" value="<?= $user->usda_license ?>" name="usda_license">

                                         <input type="hidden" value="<?= $user->vet_check ?>" name="vet_checked">
                                        <input type="hidden" value="<?= $user->health_guarante ?>" name="guarante">
                                        <input type="hidden" value="<?= $user->guarante_length ?>" name="length">
                                        
                                        <input type="hidden" value="0" name="allowlogin">

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label"></label>
                                            <div class="col-md-9">
                                                <!--<div class="form-check">-->
                                                <!--    <input name="accept_marketing_offers" id="acceptMarketingOffers" class="form-check-input"   <?php if ($user->accept_marketing_offers == 1) echo 'checked'; ?> type="checkbox">-->

                                                <!--    <label class="form-check-label" for="acceptMarketingOffers" style="font-weight: normal;">-->
                                                <!--        I accept to receive marketing emails-->
                                                <!--    </label>-->
                                                <!--</div>-->
                                                <div style="clear:both"></div>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>




                        <div class="card card-default">
                            
                             <div class="card-header">
                                <h4 class="card-title"><a href="#ppicPanel" data-bs-toggle="collapse" data-parent="#accordion">Profile Photo</a></h4>
                            </div>
                            <div class="panel-collapse collapse show" id="ppicPanel">
                                <div class="card-body">
                                    <center>
                                     <?php if (!empty($user->pofile_photo)) {   ?>
                       <img src="<?php echo base_url(); ?>uploads/breeders/<?= $user->pofile_photo; ?>" style="max-height:200px" class="img sellerimg">
                      <?php } else{  ?>
                <img src="<?=base_url()?>assets/noimageseller.png" class="img sellerimg">
                <?php } ?></center>
                                    <form name="settings" class="form-horizontal" role="form" method="POST" action="<?= base_url() ?>frontend/profile/change_profile_photo" enctype="multipart/form-data">


                                        <?php echo $this->customlib->getCSRF(); ?>

                                        <div class="row mb-2">
                                            <label class="col-md-3 col-form-label">Profile Photo</label>
                                            <div class="col-md-9">
                                                <input id="" name="files" type="file"  class="form-control" placeholder="">
                                            </div>


                                            <br><br>
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-light-blue">Save</button>
                                                </div>
                                            </div>
                                    </form>

                                    <!-- <div style="clear:both"></div> -->
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="card-header">
                                <h4 class="card-title"><a href="#settingsPanel" data-bs-toggle="collapse" data-parent="#accordion">Paypal Info</a></h4>
                            </div>
                            <div class="panel-collapse collapse show" id="settingsPanel">
                                <div class="card-body">
                                    <form name="settings" class="form-horizontal" role="form" method="POST" action="<?= base_url() ?>frontend/profile/change_paypal_email" enctype="multipart/form-data">


                                        <?php echo $this->customlib->getCSRF(); ?>

                                        <div class="row mb-2">
                                            <label class="col-md-3 col-form-label">Email</label>
                                            <div class="col-md-9">
                                                <input id="" name="paypal_email" type="email" value="<?= $user->paypal_email ?>" class="form-control" placeholder="Paypal Email">
                                            </div>


                                            <br><br>
                                            <div class="row">
                                                <div class="offset-md-3 col-md-9">
                                                    <button type="submit" class="btn btn-light-blue">Save</button>
                                                </div>
                                            </div>
                                    </form>

                                    <!-- <div style="clear:both"></div> -->
                                </div>
                            </div>
                        </div>


                        <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="#aboutPanel" aria-expanded="true" data-bs-toggle="collapse" data-parent="#accordion">About</a></a>
                                </h4>
                            </div>

                            <div class="panel-collapse collapse show" id="aboutPanel">
                                <div class="card-body">

                                    <form name="details" class="form-horizontal" role="form" method="POST" action="<?= base_url() ?>frontend/Profile/update_account" enctype="multipart/form-data">

                                        <?php echo $this->customlib->getCSRF(); ?>
                                        
                                          <input type="hidden" value="<?= $user->address ?>" name="address">
                                        <input type="hidden" value="<?= $user->city ?>" name="city">
                                         <input type="hidden" value="<?= $user->state ?>|<?= $user->state_id ?>" name="state">
                                        <input type="hidden" value="<?= $user->zip_code ?>" name="zip_code">
                                        <input type="hidden" value="<?= $user->name ?>" name="name">

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label"> Seller Description</label>
                                            <div class="col-md-9">
                                                <textarea class="form-control" rows="10" id="description" name="description"><?= $user->description ?></textarea>

                                            </div>
                                        </div>
                                        
                                          <div class="row mb-3 required">
                                        <label class="col-md-3 col-form-label" for="email">I have a state license</sup>
                                        </label>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="federal_license" id="inlineRadio1" value="Yes" <?php if($user->federal_license=='Yes'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="federal_license" id="inlineRadio2" value="No" <?php if($user->federal_license=='No'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="federal_license" id="inlineRadio3" value="Not Required" <?php if($user->federal_license=='Not Required'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio3">Not Required</label>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row mb-3 required">
                                        <label class="col-md-3 col-form-label" for="email">I have a federal(USDA) license</sup>
                                        </label>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="usda_license" id="inlineRadio11"  value="Yes" <?php if($user->usda_license=='Yes'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio11">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="usda_license" id="inlineRadio22" value="No" <?php if($user->usda_license=='No'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio22">No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="usda_license" id="inlineRadio33" value="Not Required" <?php if($user->usda_license=='Not Required'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio33">Not Required</label>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row mb-3 required">
                                        <label class="col-md-3 col-form-label" for="email">Are your puppies vet checked before leaving? <sup>*</sup> </sup>
                                        </label>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="vet_checked" id="inlineRadio111" value="Yes"  <?php if($user->vet_check=='Yes'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio111">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="vet_checked" id="inlineRadio222"  value="No"  <?php if($user->vet_check=='No'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio222">No</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-3 required">
                                        <label class="col-md-3 col-form-label" for="email">Do you offer a health guarante? <sup>*</sup> </sup>
                                        </label>
                                        <div class="col-md-9">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="guarante" id="inlineRadio1111" value="Yes"  <?php if($user->health_guarante=='Yes'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio1111">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="guarante" id="inlineRadio2222"  value="No"  <?php if($user->health_guarante=='No'){echo 'checked';} ?>>
                                                <label class="form-check-label" for="inlineRadio2222">No</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row mb-3 required" id="health_length" <?php if($user->health_guarante!='Yes'){  echo 'style="display: none"'; } ?>>
                                        <label class="col-md-3 col-form-label" for="email">Length of health guarantee
                                            <sup>*</sup></label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <input type="text" name="length" class="form-control" value="<?=$user->guarante_length?>">

                                            </div>
                                        </div>
                                    </div>
                                    

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Site URL</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="site_url" value="<?= $user->site_url ?>">

                                            </div>
                                        </div>
                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Youtube URL</label>
                                            <div class="col-md-9">
                                                <input class="form-control" name="youtube_url" value="<?= $user->youtube_url ?>">

                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="offset-md-3 col-md-9"></div>
                                        </div>

                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-light-blue">Save</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>



                        <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title"><a href="#settingsPanel" data-bs-toggle="collapse" data-parent="#accordion">Change Password</a></h4>
                            </div>
                            <div class="panel-collapse collapse show" id="settingsPanel">
                                <div class="card-body">
                                    <form name="settings" class="form-horizontal" role="form" method="POST" action="<?= base_url() ?>frontend/profile/change_password" enctype="multipart/form-data">


                                        <?php echo $this->customlib->getCSRF(); ?>

                                        <div class="row mb-2">
                                            <label class="col-md-3 col-form-label">Current Password</label>
                                            <div class="col-md-9">
                                                <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <label class="col-md-3 col-form-label">New Password</label>
                                            <div class="col-md-9">
                                                <input id="password" name="newpassword" type="password" class="form-control" placeholder="Password">
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label">Confirm Password</label>
                                            <div class="col-md-9">
                                                <input id="password_confirmation" name="cnewpassword" type="password" class="form-control" placeholder="Confirm Password">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>




                         <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="#photoPanel" data-bs-toggle="collapse" data-parent="#accordion">Driver's License or Non Picture ID </a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse show" id="photoPanel">
                                <div class="card-body">
                                    <form name="details" class="form-horizontal" role="form" method="POST" action="#">
                                        <div class="row">
                                            <div class="col-xl-12 text-center">
                                            <button style="float: right" class="btn btn-md btn-light-blue " id="picture_id_change"> <i class="fas fa-edit"></i> Change</button>
                                                <div class="photo-field">
                                                    <div class="file-input theme-fas file-input-ajax-new">
                                                        <div class="file-preview ">
                                                            <div class="file-drop-zone clearfix clickable" tabindex="-1">
                                                           
                                                                <div class="file-preview-thumbnails clearfix">
                                                                    <?php if (!empty($user->photo)) {  ?>
                                                                        <div class="file-default-preview"><img style="max-height: 200px; max-width:200px" src="<?=base_url() ?>uploads/doc/<?= $user->photo ?>" alt="Your Photo or Avatar">

                                                                        </div>
                                                                        <a href="<?=base_url() ?>uploads/doc/<?= $user->photo ?>" download class="btn btn-secondary btn-md mt-2"><i class="fas fa-download"></i></a>
                                                                    <?php } else { ?>
                                                                        <div class="file-default-preview"><img src="<?= base_url() ?>assets/front/images/user.jpg" alt="Your Photo or Avatar">

                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                               
                                                                <div class="file-preview-status text-center text-success"></div>
                                                                <div class="kv-fileinput-error"></div>
                                                            </div>
                                                        </div>
                                                        <!-- <input id="photoField" name="photo" type="file" class="file file-no-browse" tabindex="-1"> -->
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="#photoPanel1" data-bs-toggle="collapse" data-parent="#accordion">Facility photos</a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse show" id="photoPanel1">
                                <div class="card-body">

                                    <div class="row mt-3">
                                        <?php if (!empty($user->kennel_images)) {
                                            foreach ($imgs as $row) {  ?>
                                                <div class="col-md-3 text-center mb-2">

                                                    <div class="photo-field">
                                                        <div class="file-input theme-fas file-input-ajax-new">
                                                            <div class="file-preview ">
                                                                <div class="file-drop-zone clearfix clickable" tabindex="-1">
                                                                    <div class="file-preview-thumbnails clearfix">

                                                                        <div class="file-default-preview"><img style="height: 200px; width:auto" src="<?php echo base_url(); ?>uploads/kennel/<?= $row; ?>" alt="">

                                                                        </div>
                                                                        <br>
                                                                        <a href="<?php echo base_url(); ?>uploads/kennel/<?= $row; ?>" download class="btn btn-secondary btn-sm"><i class="fas fa-download"></i></a>
                                                                        &nbsp;<a href="javascript:void(0)" onclick="delete_kennel_image('<?= $row; ?>')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>


                                                                    </div>
                                                                    <div class="file-preview-status text-center text-success"></div>
                                                                    <div class="kv-fileinput-error"></div>
                                                                </div>
                                                            </div>
                                                            <!-- <input id="photoField" name="photo" type="file" class="file file-no-browse" tabindex="-1"> -->
                                                        </div>
                                                    </div>



                                                </div>
                                        <?php }
                                        } ?>
                                    </div>

                                    <div class="row mt-4">
                                        <button class="btn btn-light-blue btn-md add_kennel"> <i class="fas fa-plus"></i> Add Photos</button>
                                        <br>
                                    </div>

                                </div>
                            </div>
                        </div>











                    </div>
                    <!--/.row-box End-->

                </div>
            </div>
            <!--/.page-content-->
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <form method="post" action="<?= base_url() ?>frontend/profile/update_driver_id" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Change Driver's License or Non Picture ID</h5>
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo $this->customlib->getCSRF(); ?>
                    <input type="file" name="files" class="form-control" required>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_modal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">
            <form method="post" action="<?= base_url() ?>frontend/profile/add_kennel_photos" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Facility photos</h5>
                    <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php echo $this->customlib->getCSRF(); ?>
                    <input type="file" name="kennel[]" class="form-control" multiple required>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_modal" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>

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

<script>
   $('.add_kennel').click(function(e) {
        e.preventDefault();
        $('#exampleModalCenter').modal('show');
    });
    $('.close_modal').click(function(e) {
        e.preventDefault();
        $('#exampleModalCenter').modal('hide');
        $('#exampleModalCenter1').modal('hide')
    });

    
    $('#picture_id_change').click(function(e) {
        e.preventDefault();
        $('#exampleModalCenter1').modal('show');
    });
    

    function delete_kennel_image(img)
    {
        var url="<?=base_url()?>frontend/Profile/delete_kennel_images/"+img;
        $.confirm({
            title: 'Remove',
            content: 'Are you sure to continue?',
            buttons: {
                confirm: {
                    text: 'Remove',
                    btnClass: 'btn-red',
                    action:function() {
                         window.location.replace(url);
                    
                    }
                },
                cancel: function () {
                    //$.alert('Canceled!');
                },

            }
        });
    }
    
        $('input[type=radio][name=guarante]').change(function() {
        if (this.value == 'Yes') {
            $("#health_length").show();
        } else {
            $("#health_length").hide();
            $('input[type=text][name=length]').val('');
        }
    });

</script>