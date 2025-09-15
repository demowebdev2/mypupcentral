<!-- Main Sidebar Container -->
<style>
    .nav-sidebar>.nav-item {
    margin-bottom: 12px;
}
</style>
<aside class="main-sidebar elevation-4 sidebar-dark-success" style="background-color:#1d2228">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>staff/Dashboard" class="brand-link" style="background-color:#fff;">
  <img src="<?= base_url() ?>assets/logoico1.png" alt="Logo" class="brand-image img-circle elevation-3 img-fluid" style="opacity: .8">
    <span class="brand-text font-weight-dark" style="color:black;">MyPupCentral</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>assets/dist/img/user2-160x160.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url() ?>admin/Admin/profile" class="d-block"><?= $_SESSION['sitestaff']['username']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat text-sm nav-compact" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <a href="<?= base_url() ?>staff/Dashboard" class="nav-link <?php echo set_Topmenu('Dashboard'); ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item ">
          <a href="<?= base_url() ?>staff/Breeders" class="nav-link <?php echo set_Topmenu('Breeders'); ?>">
            
            <i class="nav-icon  fas fa-users"></i>
            <p>
            Breeders
            </p>
          </a>
        </li>



        <li class="nav-header">Settings</li>
        <li class="nav-item has-treeview <?php echo set_Menuopen('Settings'); ?>">
          <a href="#" class="nav-link <?php echo set_Topmenu('Settings'); ?>">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?= base_url() ?>staff/Profile" class="nav-link <?php echo set_Submenu('Settings/setup'); ?>">
                <i class="fas fa-user nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>

          </ul>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>