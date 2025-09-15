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
                                    <a href="#userPanel" aria-expanded="true" data-bs-toggle="collapse" data-parent="#accordion">Add</a>
                                </h4>
                            </div>
                            <div class="panel-collapse collapse show" id="userPanel">
                                <div class="card-body">
                                    <form name="details" class="form-horizontal" role="form" method="POST" action="<?=base_url()?>contact-person/add" enctype="multipart/form-data">
                                    <?php echo $this->customlib->getCSRF(); ?>
                                   
                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Name <sup>*</sup></label>
                                            <div class="col-md-9">
                                                <input name="name" type="text" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Contact No <sup>*</sup></label>
                                            <div class="col-md-9">
                                                <input name="phone" type="number" class="form-control" placeholder="" value="" required>
                                            </div>
                                        </div>

                                        <div class="row mb-3 required">
                                            <label class="col-md-3 col-form-label">Email <sup>(optional)</sup></label>
                                            <div class="col-md-9">
                                                <input name="email" type="email" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>
                                         <div class="row mb-3">
                                            <label class="col-md-3 col-form-label">Website URL <sup>(optional)</sup></label>
                                            <div class="col-md-9">
                                                <input name="website_url" type="text" class="form-control" placeholder="" value="">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label class="col-md-3 col-form-label">Contact preferred method : </label>
                                            <div class="col-md-9">
                                               <input name="prefered[]" type="checkbox" class="form-check-input" placeholder="" value="Call"> Call <br>
                                              <input name="prefered[]" type="checkbox" class="form-check-input" placeholder="" value="Text">  Text<br>
                                               <input name="prefered[]" type="checkbox" class="form-check-input" placeholder="" value="Email"> Email
                                            </div>
                                        </div>

                                       
                                     
                                        <div class="row mb-3">
                                            <div class="offset-md-3 col-md-9"></div>
                                        </div>


                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="submit" class="btn btn-primary">Save</button>
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