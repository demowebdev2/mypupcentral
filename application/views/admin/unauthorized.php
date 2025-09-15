<?php include_once('header.php'); ?>
<div class="content-wrapper" style="min-height: 1589.56px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Access denied</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-danger"></h2>

        <div class="">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Access denied.</h3>

          <p>
          Contact with your system administrator.
            Meanwhile, you may <a href="<?=base_url()?>admin/Dashboard">return to dashboard</a>
          </p>
          <p>Or,</p>
          <a href="<?php if(isset($_SERVER['HTTP_REFERER'])) {echo $_SERVER['HTTP_REFERER'];} else{echo base_url().'admin/Dashboard';}?>"><button class="btn btn-info"><i class="fas fa-arrow-left"></i> Go Back</button></a>

        </div>
      </div>
      <!-- /.error-page -->

    </section>
    <!-- /.content -->
  </div>

  <?php include_once('footer.php'); ?>