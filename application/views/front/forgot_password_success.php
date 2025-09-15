<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<div class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-8 col-sm-10 col-12 login-box mt-2">
                <form id="loginForm" role="form" method="POST" action="<?= base_url() ?>Home/check_forgot_password">
                    <?php if ($this->session->flashdata('msg')) { ?>
                        <?php echo $this->session->flashdata('msg') ?>
                    <?php } ?>

                    <?php if ($msg) { ?>
                        <div class="alert alert-danger"><?= $msg ?></div>
                    <?php } ?>

                    <?php echo $this->customlib->getCSRF(); ?>

                    <input type="hidden" name="country" value="US">
                    <div class="card card-default">

                        <div class="panel-intro">
                            <div class="d-flex justify-content-center">
                                <h2 class="logo-title"><strong>Success!</strong></h2>
                            </div>
                        </div>

                        <div class="card-body px-4">

                           <h4>
                           Check your email to reset your password!
                           </h4>

                            <br><Br>
                        </div>

                        <div class="card-footer px-4">
                            <!-- <label class="checkbox float-start mt-2 mb-2">
									<input type="checkbox" value="1" name="remember" id="remember">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description"> Keep me logged in</span>
								</label> -->
                            <div class="text-center float-end mt-2 mb-2">
                                <a href="<?=base_url()?>login"> Login </a>
                            </div>
                            <div style=" clear:both"></div>
                        </div>
                    </div>
                </form>

                <div class="login-box-btm text-center">
                    <p>
                        Do not have an account?<br>
                        <a href="<?= base_url(); ?>register"><strong>Click Here to Register !</strong></a>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>