<!-- Main Sidebar Container -->
<style>
    .nav-sidebar>.nav-item {
    margin-bottom: 12px;
}
</style>
<aside class="main-sidebar elevation-4 sidebar-dark-success" style="background-color:#1d2228">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>admin/Dashboard" class="brand-link navbar-white" style="">
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
        <a href="<?= base_url() ?>admin/Admin/profile" class="d-block"><?= $_SESSION['siteadmin']['username']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-flat text-sm nav-compact" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item ">
          <a href="<?= base_url() ?>admin/Dashboard" class="nav-link <?php echo set_Topmenu('Dashboard'); ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        
         <li class="nav-item ">
          <a href="<?= base_url() ?>admin/Dashboard/reviews" class="nav-link <?php echo set_Topmenu('Reviews'); ?>">
           
            <i class="nav-icon fas fa-comment"></i>
            <p>
             Reviews
            </p>
          </a>
        </li>
        
        <li class="nav-item ">
          <a href="<?= base_url() ?>admin/Dashboard/training_request" class="nav-link <?php echo set_Topmenu('Training'); ?>">
           
            <i class="nav-icon fas fa-paw"></i>
            <p>
              Training Requests
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview <?php echo set_Menuopen('Shopping'); ?>">
          <a href="#" class="nav-link <?php echo set_Topmenu('Shopping'); ?>">
            <i class="nav-icon fas fa-shopping-bag"></i>

            <p>
             Shopping List
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?= base_url() ?>admin/Shopping/add" class="nav-link <?php echo set_Submenu('Shopping/add'); ?>">
                <i class="fas fa-plus nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/Shopping/list" class="nav-link <?php echo set_Submenu('Shopping/list'); ?>">
                <i class="fas fa-list nav-icon"></i>
                <p>List</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-item has-treeview <?php echo set_Menuopen('Ads'); ?>">
          <a href="#" class="nav-link <?php echo set_Topmenu('Ads'); ?>">
            <i class="nav-icon fas fa-ad"></i>

            <p>
              Ads
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?= base_url() ?>admin/Ads" class="nav-link <?php echo set_Submenu('Ads/list'); ?>">
                <i class="fas fa-list nav-icon"></i>
                <p>List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/Ads/pending" class="nav-link <?php echo set_Submenu(''); ?>">
                <i class="far fa-newspaper nav-icon"></i>
                <p>Not Paid</p>
              </a>
            </li>
          </ul>
        </li>


        <!-- <li class="nav-item has-treeview <?php echo set_Menuopen('Time Slot Booking'); ?>">-->
        <!--  <a href="#" class="nav-link <?php echo set_Topmenu('Time Slot Booking'); ?>">-->
        <!--    <i class="nav-icon fas fa-dollar-sign"></i>-->
            
        <!--    <p>-->
        <!--    Payments-->
        <!--      <i class="fas fa-angle-left right"></i>-->
        <!--    </p>-->
        <!--  </a>-->
        <!--  <ul class="nav nav-treeview">-->
          
        <!--      <li class="nav-item">-->
        <!--        <a href="<?=base_url()?>admin/slotbookings" class="nav-link <?php echo set_Submenu('Time Slot Booking/list'); ?>">-->
        <!--          <i class="fas fa-list nav-icon"></i>-->
        <!--          <p>List</p>-->
        <!--        </a>-->
        <!--      </li>-->
             
        <!--</ul>-->
        <!--</li>-->
      


        <li class="nav-item has-treeview <?php echo set_Menuopen('Breeders'); ?>">
          <a href="#" class="nav-link <?php echo set_Topmenu('Breeders'); ?>">
            <i class="nav-icon  fas fa-users"></i>
            <p>
              Breeders
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/breeders/pending" class="nav-link <?php echo set_Submenu(''); ?>">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Pending Approval</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/breeders" class="nav-link <?php echo set_Submenu('breeders/'); ?>">
                <i class="fas fa-list nav-icon"></i>
                <p>List</p>
              </a>
            </li>



          </ul>
        </li>

        
        <li class="nav-item has-treeview <?php echo set_Menuopen('Breeds'); ?>">
          <a href="#" class="nav-link <?php echo set_Topmenu('Breeds'); ?>">
            <i class=" nav-icon fas fa-dog"></i>

            <p>
              Breeds
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

           <li class="nav-item">
              <a href="<?= base_url() ?>admin/breeds/add" class="nav-link <?php echo set_Submenu(''); ?>">
                <i class="fas fa-plus nav-icon"></i>
                <p>Add New</p>
              </a>
            </li>


            <li class="nav-item">
              <a href="<?= base_url() ?>admin/breeds/" class="nav-link <?php echo set_Submenu(''); ?>">
                <i class="fas fa-list nav-icon"></i>
                <p>List</p>
              </a>
            </li>
          </ul>
        </li>

        <!--<li class="nav-item has-treeview <?php echo set_Menuopen('Promocodes'); ?>">-->
        <!--  <a href="#" class="nav-link <?php echo set_Topmenu('Promocodes'); ?>">-->
        <!--    <i class="nav-icon fas fa-ad"></i>-->
            
        <!--    <p>-->
        <!--    Promocodes-->
        <!--      <i class="fas fa-angle-left right"></i>-->
        <!--    </p>-->
        <!--  </a>-->
        <!--  <ul class="nav nav-treeview">-->
        <!--    <li class="nav-item">-->
        <!--        <a href="<?=base_url()?>admin/promocodes/add" class="nav-link <?php echo set_Submenu('Promocodes/add'); ?>">-->
        <!--          <i class="fas fa-plus nav-icon"></i>-->
        <!--          <p>Add New</p>-->
        <!--        </a>-->
        <!--      </li>-->
          
        <!--      <li class="nav-item">-->
        <!--        <a href="<?=base_url()?>admin/promocodes" class="nav-link <?php echo set_Submenu('Promocodes/list'); ?>">-->
        <!--          <i class="fas fa-list nav-icon"></i>-->
        <!--          <p>List</p>-->
        <!--        </a>-->
        <!--      </li>-->
             
        <!--</ul>-->
        <!--</li>-->


        <!--  <li class="nav-item has-treeview <?php echo set_Menuopen('Time Slots'); ?>">-->
        <!--  <a href="#" class="nav-link <?php echo set_Topmenu('Time Slots'); ?>">-->
        <!--  <i class="fas fa-clock nav-icon"></i>            -->
        <!--    <p>-->
        <!--    Time Slots-->
        <!--      <i class="fas fa-angle-left right"></i>-->
        <!--    </p>-->
        <!--  </a>-->
        <!--  <ul class="nav nav-treeview">-->
             <!--<li class="nav-item">-->
             <!--   <a href="<?=base_url()?>admin/timeslots/add" class="nav-link <?php //echo set_Submenu(''); ?>">-->
             <!--    <i class="fas fa-plus"></i>-->
             <!--     <p>Create New</p>-->
             <!--   </a>-->
             <!-- </li>-->
        <!--      <li class="nav-item">-->
        <!--        <a href="<?=base_url()?>admin/timeslots" class="nav-link <?php echo set_Submenu('breeders/'); ?>">-->
        <!--           <i class="fas fa-list nav-icon"></i>-->
        <!--          <p>List</p>-->
        <!--        </a>-->
        <!--      </li>            -->
             
        <!--  </ul>-->
        <!--</li>-->
         <li class="nav-item has-treeview <?php echo set_Menuopen('Blogs'); ?>">
          <a href="#" class="nav-link <?php echo set_Topmenu('Blogs'); ?>">
          <i class="fab fa-blogger-b nav-icon"></i>   
            <p>
            Blogs
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?=base_url()?>admin/blogs/add" class="nav-link <?php echo set_Submenu(''); ?>">
                 <i class="fas fa-plus nav-icon"></i>
                  <p>Create New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>admin/blogs" class="nav-link <?php echo set_Submenu('blogs/'); ?>">
                   <i class="fas fa-list nav-icon"></i>
                  <p>List</p>
                </a>
              </li>            
             
          </ul>
        </li>

        <li class="nav-item has-treeview <?php echo set_Menuopen('Staff'); ?>">
          <a href="#" class="nav-link <?php echo set_Topmenu('Staff'); ?>">
        
          <i class="fas fa-user-tie nav-icon"></i>
            <p>
           Staff
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?=base_url()?>admin/Staff/create" class="nav-link <?php echo set_Submenu('Staff/add'); ?>">
                 <i class="fas fa-plus nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>admin/Staff" class="nav-link <?php echo set_Submenu('Staff/list'); ?>">
                   <i class="fas fa-list nav-icon"></i>
                  <p>List</p>
                </a>
              </li>            
             
          </ul>
        </li>

      <li class="nav-item has-treeview <?php echo set_Menuopen('Push_notification'); ?>">
          <a href="#" class="nav-link <?php echo set_Topmenu('Push_notification'); ?>">
          <i class="nav-icon fas fa-mobile-alt"></i>
            <p>
             Push Notifications
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
             <li class="nav-item">
                <a href="<?=base_url()?>admin/App" class="nav-link <?php echo set_Submenu('Push_notification/Custom'); ?>">

                 <i class=" nav-icon fas fa-bullhorn"></i>
                  <p>Custom Notification</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>admin/App/setup_notification" class="nav-link <?php echo set_Submenu('Push_notification/Setup'); ?>">
                <i class="nav-icon fas fa-bell"></i>
                  <p>Automatic Notification</p>
                </a>
              </li>            
             
          </ul>
        </li>
        <li class="nav-item ">
          <a href="<?= base_url() ?>admin/Seo" class="nav-link <?php echo set_Topmenu('SEO'); ?>">
            <i class="nav-icon fab fa-searchengin"></i>
            <p>
              SEO
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
              <a href="<?= base_url() ?>admin/Admin/settings" class="nav-link <?php echo set_Submenu('Settings/setup'); ?>">
                <i class="fas fa-tools nav-icon"></i>
                <p>Setup</p>
              </a>
            </li>
            
             <li class="nav-item">
              <a href="<?= base_url() ?>admin/Admin/google" class="nav-link <?php echo set_Submenu('Settings/google'); ?>">
                <i class="fas fa-chart-bar nav-icon"></i>
                <p>Google Tag</p>
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