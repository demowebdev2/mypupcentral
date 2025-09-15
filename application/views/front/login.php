<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<div class="main-container">
    <div class="container">
        <div class="row">

            <div class="col-lg-5 col-md-8 col-sm-10 col-12 login-box mt-2">
                <form id="loginForm" role="form" method="POST" action="<?= base_url() ?>login">
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
                                <h2 class="logo-title"><strong>Log In</strong></h2>
                            </div>
                        </div>

                        <div class="card-body px-4">

                            <div class="mb-3">
                                <label for="login" class="col-form-label">Login (Email or Phone):</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="icon-user fa"></i></span>
                                    <input id="login" name="login" type="text" placeholder="Email or Phone" class="form-control" value="">
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="password" class="col-form-label">Password:</label>
                                <div class="input-group show-pwd-group">
                                    <span class="input-group-text"><i class="icon-lock fa"></i></span>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Password" autocomplete="off">
                                    <span class="icon-append show-pwd">
                                        <button type="button" class="eyeOfPwd">
                                            <i class="far fa-eye-slash"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>



                            <div class="mb-1">
                                <button id="loginBtn" class="btn btn-primary btn-block"> Log In </button>
                            </div>
                        </div>

                        <div class="card-footer px-4">
                            <!-- <label class="checkbox float-start mt-2 mb-2">
									<input type="checkbox" value="1" name="remember" id="remember">
									<span class="custom-control-indicator"></span>
									<span class="custom-control-description"> Keep me logged in</span>
								</label> -->
                            <div class="text-center float-end mt-2 mb-2">
                                <a href="<?=base_url()?>Home/forgot_password"> Lost your password? </a>
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