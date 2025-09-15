<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Change Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Staff</a></li>
                        <li class="breadcrumb-item active">Change Staff Password</li>
                    </ol>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Change Password
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($this->rbac->hasPrivilege('staff', 'can_view')) { ?>
                                <a href="<?= base_url() ?>admin/Staff">
                                    <button type="button" class="btn btn-outline-primary">Staff List</button>
                                </a>
                            <?php } ?>
                            <br><br>

                            <form id="form1" action="<?php echo site_url('admin/staff/change_pswd/'. $staff["staffid"]) ?>"  id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                          <div class="box-body">

                                    <div class="tshadow mb25 bozero">



                                        <div class="around10">
                                            <?php if ($this->session->flashdata('msg')) { ?>
                                                <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>
                                            <?php echo $this->customlib->getCSRF(); ?>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">New Password</label><small class="req"> *</small>
                                                        <input id="name" name="password" placeholder="" type="password" class="form-control" value="" />
                                                        <span class="text-danger"><?php echo form_error('password'); ?></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Confirm New Password</label><small class="req"> *</small>
                                                        <input id="name" name="cpassword" placeholder="" type="password" class="form-control" value="" />
                                                        <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                                                    </div>
                                                </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-info pull-right">Save</button>
                                    </div>

                            </form>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </section>

</div>
