<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Create Staff</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Staff</a></li>
                        <li class="breadcrumb-item active">Create Staff</li>
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
                                Create Staff
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

                            <form id="form1" action="<?php echo site_url('admin/staff/create') ?>" id="employeeform" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
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
                                                        <label for="exampleInputEmail1">Name</label><small class="req"> *</small>
                                                        <input id="name" name="name" placeholder="" type="text" class="form-control" value="<?php echo set_value('name') ?>" />
                                                        <span class="text-danger"><?php echo form_error('name'); ?></span>
                                                    </div>
                                                </div>

                                              

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile"> Gender</label><small class="req"> *</small>
                                                            <select class="form-control" name="gender">
                                                                <option value="" disabled selected>--Select--</option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                                <option value="other">Other</option>

                                                            </select>
                                                            <span class="text-danger"><?php echo form_error('gender'); ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Phone</label>
                                                            <input id="mobileno" name="contactno" placeholder="" type="text" class="form-control" value="<?php echo set_value('contactno') ?>" />
                                                            <span class="text-danger"><?php echo form_error('contactno'); ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email</label><small class="req"> *</small>
                                                            <input id="email" name="email" placeholder="" type="text" class="form-control" value="<?php echo set_value('email') ?>" />
                                                            <span class="text-danger"><?php echo form_error('email'); ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Password</label><small class="req"> *</small>
                                                            <input id="email" name="password" placeholder="" type="password" class="form-control" value="<?php echo set_value('email') ?>" />
                                                            <span class="text-danger"><?php echo form_error('password'); ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Confirm Password</label><small class="req"> *</small>
                                                            <input id="email" name="cpassword" placeholder="" type="password" class="form-control" value="<?php echo set_value('email') ?>" />
                                                            <span class="text-danger"><?php echo form_error('cpassword'); ?></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Note</label>
                                                            <div><textarea name="note" class="form-control"><?php echo set_value('note'); ?></textarea>
                                                            </div>
                                                            <span class="text-danger"></span>
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