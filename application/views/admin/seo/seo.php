<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                    <h1 class="m-0 text-dark">Search Engine Optimization</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">SEO</li>
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
                                SEO
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body"><br>
                        <?php if ($this->session->flashdata('msg')) { ?>
                                                <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>
                        <form method="POST"  action="<?=base_url()?>admin/Seo/update">
                        <?php echo $this->customlib->getCSRF(); ?>
                            <div style="float: right;">
                                <button type="submit" class="btn btn-info mb-2">Submit</button>
                            </div>


                            <br>

                            <div class="table-responsive">

                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th>Meta Title</th>
                                            <th>Meta Description</th>
                                            <th>Meta Keywords</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($list as $row){ ?>
                                            <input type="hidden" name="id[]" value="<?=$row->id?>">
                                        <tr>
                                            <td>
                                                <p class="text-danger"><?=$row->page?></p>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <textarea type="text" name="title[]" class="form-control " placeholder="Meta Title"><?=$row->meta_title?></textarea>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <textarea type="text" name="description[]" class="form-control " placeholder="Meta Description"><?=$row->meta_description?></textarea>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <textarea type="text" name="keywords[]" class="form-control " placeholder="Meta Keywords"><?=$row->meta_keywords?></textarea>

                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <button class="btn btn-info" style="width:100%">Submit</button>
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