<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<div class="main-container">
    <div class="container">
        <div class="row">
            
            <?php $this->load->view('front/profile_sidebar'); ?>



            <div class="col-md-9 page-content">

            <?php if ($this->session->flashdata('msg')) { ?>
                                                <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>

                                            
                <div class="inner-box">
                    <h2 class="title-2"><i class="fas fa-user-tie"></i> Contact Person </h2>

                   

                    <div class="card card-default">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a href="#userPanel" aria-expanded="true" data-bs-toggle="collapse" data-parent="#accordion">Edit</a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse show" id="userPanel">
                                <div class="card-body">
                                    <form name="details" class="form-horizontal" role="form" method="POST" action="<?=base_url()?>contact-person/edit/<?=$result->id?>" enctype="multipart/form-data">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                   
                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Name <sup>*</sup></label>
                                            <div class="col-md-9">
                                                <input name="name" type="text" class="form-control" placeholder="" value="<?=$result->full_name?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Contact No <sup>*</sup></label>
                                            <div class="col-md-9">
                                                <input name="phone" type="number" class="form-control" placeholder="" value="<?=$result->phone?>">
                                            </div>
                                        </div>

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Email <sup></sup></label>
                                            <div class="col-md-9">
                                                <input name="email" type="email" class="form-control" placeholder="" value="<?=$result->email?>">
                                            </div>
                                        </div>
                                          <div class="row mb-3">
                                            <label class="col-md-3 col-form-label">Website URL <sup>(optional)</sup></label>
                                            <div class="col-md-9">
                                                <input name="website_url" type="text" class="form-control" placeholder="" value="<?=$result->website_url?>">
                                            </div>
                                        </div>

                                        <?php 
                                        
                                        $pref=json_decode($result->preferred_contact);
                                        
                                        ?>
                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label">Contact preferred method : </label>
                                            <div class="col-md-9">
                                               <input name="prefered[]"  type="checkbox" class="form-check-input" placeholder="" value="Call" <?php if (in_array("Call", $pref)){ echo 'checked'; } ?>> Call <br>
                                              <input name="prefered[]" type="checkbox" class="form-check-input" placeholder="" value="Text" <?php if (in_array("Text", $pref)){ echo 'checked'; } ?>>  Text<br>
                                               <input name="prefered[]" type="checkbox" class="form-check-input" placeholder="" value="Email" <?php if (in_array("Email", $pref)){ echo 'checked'; } ?>> Email
                                            </div>
                                        </div>
                                     
                                        <div class="row mb-3">
                                            <div class="offset-md-3 col-md-9"></div>
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

                </div>
            </div>


        </div>
    </div>
</div>