<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/r-2.3.0/sc-2.0.7/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/b-2.2.3/r-2.3.0/sc-2.0.7/datatables.min.js"></script>

<div class="col-md-3 page-sidebar">
   <?php
        
        $postcount = $this->common_model->getpostcount();
        $enquirycount = $this->common_model->getenquirycount();
         $premiumadcount = $this->common_model->getpremiumadcount();
         $pending = $this->common_model->getpendingpostcount();
         $transaction_count = $this->common_model->gettxnpostcount();
        $sold_count = $this->common_model->getsoldcount();
        // var_dump($detail);
    ?>
                <aside>
                    <div class="inner-box">
                        <div class="user-panel-sidebar">

                            <div class="collapse-box">
                                <h5 class="collapse-title no-border">
                                    My Account&nbsp;
                                    <a href="#MyClassified" data-bs-toggle="collapse" class="float-end"><i class="fa fa-angle-down"></i></a>
                                </h5>
                                <div class="panel-collapse collapse show" id="MyClassified">
                                    <ul class="acc-list">
                                        <li>
                                            <a class="<?php echo set_Topmenu('My_account'); ?>" href="<?= base_url() ?>profile" >
                                                <i class="icon-home"></i> My Account
                                            </a>
                                        </li>
                                        <li>
                                            <a class="<?php echo set_Topmenu('My Cart'); ?>" href="<?= base_url() ?>my-cart" >
                                               <i class="fa fa-shopping-cart"></i> My cart&nbsp;
                                                <span class="badge badge-pill">
                                                    <?= $pending ?>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.collapse-box  -->

                            <div class="collapse-box">
                                <h5 class="collapse-title">
                                    My ads
                                    <a href="#MyAds" data-bs-toggle="collapse" class="float-end"><i class="fa fa-angle-down"></i></a>
                                </h5>
                                <div class="panel-collapse collapse show" id="MyAds">
                                    <ul class="acc-list">
                                    <li>
                                            <a class="<?php echo set_Topmenu('New_ads'); ?>" href="<?= base_url()?>new_post" >
                                                <i class="fas fa-plus"></i> New ad&nbsp;
                                               
                                            </a>
                                        </li>
                                        <li>
                                            <a class="<?php echo set_Topmenu('My_ads'); ?>" href="<?= base_url()?>my_ads" >
                                                <i class="icon-docs"></i> My ads&nbsp;
                                                <span class="badge badge-pill">
                                                    <?= $postcount ?>
                                                </span>
                                            </a>
                                        </li>
                                        <!-- <li>-->
                                        <!--    <a href="<?= base_url()?>premium_ads" class="<?php echo set_Topmenu('My_premium_ads'); ?>">-->
                                        <!--        <i class="icon-star-circled"></i> Premium Ads&nbsp;-->
                                        <!--        <span class="badge badge-pill">-->
                                        <!--            <?= $premiumadcount ?>-->
                                        <!--        </span>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                        <!--    <a href="<?= base_url() ?>">-->
                                        <!--        <i class="icon-heart"></i> Favourite ads&nbsp;-->
                                        <!--        <span class="badge badge-pill">-->
                                        <!--            0-->
                                        <!--        </span>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                      
                                        <!--<li>-->
                                        <!--    <a href="<?= base_url() ?>">-->
                                        <!--        <i class="icon-hourglass"></i> Pending approval&nbsp;-->
                                        <!--        <span class="badge badge-pill">-->
                                        <!--            <?= $pending ?>-->
                                        <!--        </span>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li>-->
                                        <!--    <a href="<?= base_url() ?>">-->
                                        <!--        <i class="icon-folder-close"></i> Archived ads&nbsp;-->
                                        <!--        <span class="badge badge-pill">-->
                                        <!--            0-->
                                        <!--        </span>-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                       <li>
                                            <a class="<?php echo set_Topmenu('Enquiry_list'); ?>" href="<?= base_url() ?>ad/enquiries">
                                                <i class="icon-mail-1"></i> Inquiries &nbsp;
                                                <span class="badge badge-pill"><?= $enquirycount ?></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="<?php echo set_Topmenu('Transactions'); ?>" href="<?= base_url() ?>transactions">
                                                <i class="icon-money"></i> Transactions&nbsp;
                                                <span class="badge badge-pill">
                                                    <?= $transaction_count ?>
                                                </span>
                                            </a>
                                        </li>
                                         <li>
                                            <a class="<?php echo set_Topmenu('Sold'); ?>" href="<?= base_url() ?>sold-out">
                                               <i class="fab fa-angellist"></i> Sold Ads&nbsp;
                                                <span class="badge badge-pill">
                                                    <?= $sold_count ?>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.collapse-box  -->


                        </div>
                    </div>
                    <!-- /.inner-box  -->
                </aside>
            </div>
            <!--/.page-sidebar-->