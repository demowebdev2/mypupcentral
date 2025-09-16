<style>
    .ship_title {
        color: #8cc63f;
    }

    .ship_title i {
        color: #7a7a7a;
    }

    .ship_text {
        font-size: 15px;
        color: #7a7a7a;
    }

    .air_travel {
        background-color: #a6e1ff;
    }

    .bg-gray {
        background-color: #f9f9f9;
    }

    .site-heading h2 {
        display: block;
        font-weight: 700;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .site-heading h2 span {
        color: #ffaf5a;
    }
    .incss-cust-opt2-ol li i{
font-size: 8px;
}
.incss-h1-color{
color: #8cc63f;
}
.incss-info p{
text-align:left; font-size: 15px;
}
.incss-cust-opt2-ol {
  font-size: 14px;
}

    .site-heading h4 {
        display: inline-block;
        padding-bottom: 20px;
        position: relative;
        text-transform: capitalize;
        z-index: 1;
    }

    .site-heading h4::before {
        background: #ffaf5a none repeat scroll 0 0;
        bottom: 0;
        content: "";
        height: 2px;
        left: 50%;
        margin-left: -25px;
        position: absolute;
        width: 50px;
    }

    .site-heading {
        margin-bottom: 60px;
        overflow: hidden;
        margin-top: -5px;
    }


    .features-items,
    .features-items .items-box {
        overflow: hidden;
    }

    .features-area .equal-height::after {
        background: #e7e7e7 none repeat scroll 0 0;
        content: "";
        height: 100%;
        position: absolute;
        right: -1px;
        top: 0;
        width: 1px;
    }

    .features-area.item-full .equal-height::before {
        background: #e7e7e7 none repeat scroll 0 0;
        content: "";
        height: 1px;
        position: absolute;
        bottom: -1px;
        right: 0;
        width: 100%;
    }

    .features-area .features-items .col-md-5,
    .features-area .features-items .col-md-7 {
        display: table-cell;
        float: none;
        vertical-align: middle;
    }

    .features-area .features-items.reversed .col-md-5,
    .features-area .features-items.reversed .col-md-7 {
        display: inline-block;
        float: left;
    }

    .features-area .features-items.reversed .info-box {
        float: right;
    }

    .features-area .features-items .item {
        padding: 15px 30px;
    }

    .features-area.item-full .features-items .item {
        padding: 30px;
    }

    .features-area .features-items .item h4 {
        position: relative;
    }

    .features-area.bottom-small {
        padding-bottom: 25px;
    }

    .features-area.default-padding.bottom-none {
        padding-bottom: 30px;
    }

    .features-area .item .icon {
        margin-bottom: 20px;
    }

    .features-area .item .info {}

    .features-area .item .icon i {
        background: #ffffff none repeat scroll 0 0;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        -moz-box-shadow: 0 0 10px #cccccc;
        -webkit-box-shadow: 0 0 10px #cccccc;
        -o-box-shadow: 0 0 10px #cccccc;
        box-shadow: 0 0 10px #8cc63f;
        color: #8cc63f;
        display: inline-block;
        font-size: 30px;
        height: 100px;
        line-height: 100px;
        position: relative;
        text-align: center;
        width: 100px;
        z-index: 1;
    }

    .features-area .features-items .items-box i {
        background: transparent;
    }

    .features-area .item .icon {
        margin-bottom: 25px;
    }

    .features-area .features-items.icon-solid i {
        border-radius: inherit;
        -moz-box-shadow: 0 0 10px #cccccc;
        -webkit-box-shadow: 0 0 10px #cccccc;
        -o-box-shadow: 0 0 10px #cccccc;
        box-shadow: 0 0 10px #cccccc;
        color: #8cc63f;
        display: inline-block;
        font-size: 50px;
        height: 80px;
        line-height: 80px;
        position: relative;
        text-align: center;
        width: 80px;
    }


    .features-area .item .info h4 {
        font-weight: 600;
        text-transform: capitalize;
        font-size: 20px;
    }

    .features-area .item .info p {
        margin: 0;
    }

    .features-area .features-items.less-icon .items-box.inc-cell .item .info {
        padding-left: 0;
    }

    .features-area .features-items .items-box.inc-cell .item .info a {
        color: #666666;
        display: inline-block;
        margin-top: 15px;
        text-transform: uppercase;
    }

    .features-area .features-items .items-box.inc-cell .item .info a:hover {
        color: #ffaf5a;
    }

    .air_travel ol li {
        font-size: 15px;
        color: #363636;
    }

    .info_sub {
        text-align: left;
        color: #8cc63f;
        font-weight: bold;
    }
</style>

<section>
    <img src="<?= base_url() ?>assets/lazyload.gif" data-src="<?=base_url()?>assets/mpc-banner-img.jpg"  class="w-100">
</section>
<div class="main-container" id="homepage">

    <div class="container text-center mb-2 pt-5 pb-2">
        <h1 class="ship_title"><b>Getting Your Puppy Home </b></h1>
        <p class="ship_text pt-2">
            Our goal is for a smooth transition between the breeder's home and yours for the puppy! Although picking up your puppy in person at the breeder is ideal, we understand this is not always possible. If you are unable to pick up your puppy in person, we recommend coordinating travel with one of our approved transportation specialists and the breeder.
        </p>


    </div>


    <section class=" mb-3 features-area ">
        <div class="container text-center mb-2 pt-2 pb-5">
            <h1 class="mb-5 mt-3"><b>Methods of Transportation </b></h1>

            <div class="row features-items">
                <div class="col-md-6 col-sm-6 equal-height">
                    <div class="item">
                        <!-- <div class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div> -->
                        <div class="info">
                            <h2 class="info_sub">Air Transport</h2>
                            <ol class="text-left incss-cust-opt2-ol" >
                                <li class="pt-2"><b>Contact</b></li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Contact your puppy's breeder with your information & nearest airports to get started</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Your breeder will request the booking from the transporter and provide you with a tentative arrival date</li>
                                <li class="pt-2"><b>Coordination</b></li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i>The transporter will find the best pet friendly flight option to the nearest available airport</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> They will provide you with a detailed flight itinerary</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> The transporter will coordinate with the breeder to ensure your puppy is fully prepared for travel</li>
                                <li class="pt-2"><b>Cuddles</b></li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Your puppy will be picked up at the breeder and transported to the airport</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> After check-in your puppy will travel in the comfort of a new airline-approved crate with absorbent bedding, food, and water</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Finally you get to meet and cuddle your new family member at the airport!</li>

                            </ol>
                            <p>


                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 equal-height">
                    <div class="item">
                        <!-- <div class="icon">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div> -->
                        <div class="info">
                            <h2 class="info_sub">Ground Transport</h2>
                            <ol class="text-left incss-cust-opt2-ol">
                                <li class="pt-2"><b>Contact</b></li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Contact your puppy’s seller with your information to get started</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Your seller will request the booking from the transporter and provide you with a tentative delivery date</li>
                                <li class="pt-2"><b>Coordination</b></li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> The transporter will coordinate with the breeder to ensure your puppy is fully prepared for travel</li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> An estimated arrival time and meeting/delivery location will be provided by the transporter</li>
                                <li class="pt-2"><b>Cuddles</b></li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Your puppy will be picked up at the seller and transported to you </li>
                                <li><i class="fa fa-circle" aria-hidden="true"></i> Finally you get to meet and cuddle your new family member!</li>


                            </ol>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>







    <section class=" mb-3 features-area ">
        <div class="container text-center mb-2  pb-5">
            <hr>
            <h1 class="mb-5 mt-5 incss-h1-color"><b>Approved Transportation Specialists </b></h1>

            <div class="row features-items">
                <div class="col-md-6 col-sm-6 equal-height">
                    <div class="item">
                        <!-- <div class="icon">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </div> -->
                        <div class="info incss-info">
                            <a href="https://www.rt62pettransport.com/" target="_blank">
                                <img src="<?= base_url() ?>assets/lazyload.gif" data-src="<?= base_url() ?>assets/p2plogo.png" height="150px" class="image-responsive">
                            </a>
                            <p class="pt-4">
                                We are a fully USDA licensed and insured air transportation specialist located in Ohio. We require a complete vet exam before each puppy travels. Your puppy receives the highest standard of care with us. We have been trusted pet transportation specialists since 2005!

                            </p>
                            <p class="pt-2"><b>Contact</b><br>
                            <a href="tel:330-852-2435">330-852-2435 </a> (Call)<br>
                                <a href="mailto:info@pups2pet.com"> info@pups2pet.com</a>
                            </p>

                            <h1 class="pt-4 text-left">
                                <!--<i class="fa fa-truck" aria-hidden="true"></i>-->
                                <i class="fa fa-plane" aria-hidden="true"></i>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 equal-height">
                    <div class="item">
                        <!-- <div class="icon">
                            <i class="fa fa-comments" aria-hidden="true"></i>
                        </div> -->
                        <div class="info incss-info">

                            <img src="<?= base_url() ?>assets/lazyload.gif" data-src="<?= base_url() ?>assets/rtlogo.webp" height="150px" class="image-responsive">

                            <p class="pt-4" >
                                We are a USDA licensed & insured pet transportation company located in Ohio. We take pride in delivering your pets safely to their families all across the nation. We travel from Ohio to the East coast, West coast and the southern tip of Florida weekly. We work with breeders, shelters and rescues to get pets to their "furever" homes.
                            </p>

                            <p class="pt-2" >
                                <b> Contact</b><br>
                                <a href="tel:330-275-1088">330-275-1088 </a>(Call or Text) <br>
                               <a href="mailto:info@rt62pettransport.com"> travel@legacypetservices.com </a><br>
                                <a href="https://legacypetservices.com/" target="_blank">legacypetservices.com </a> <br>

                            </p>
                            <h1 class="pt-4 text-left">
                                <i class="fa fa-truck" aria-hidden="true"></i>
                            </h1>
                        </div>
                    </div>
                </div>


            </div>


        </div>
    </section>



    <div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
    <div class="container">
        <div class="page-info page-info-lite rounded">
            <div class="text-center section-promo">
                <div class="row">

                    <div class="col-sm-12 col-12">


                        <div class="iconbox-wrap">
                            <div class="iconbox">

                                <div class="iconbox-wrap-content">

                                    <div class="iconbox-wrap-text">My Pup Central, LLC only provides advertising - we do not raise or sell puppies. Website Logo, Web Layout, and all pictures and text are copyright 2021 by My Pup Central, LLC with all rights reserved. All information is believed to be accurate but is not guaranteed by My Pup Central ®. Please verify all information with the seller. <br><br>We provide advertising for dog breeders, puppy sellers, and other pet lovers offering dogs and puppies for sale. We also advertise other puppy-related products and services.</div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container text-center mb-2 mt-5">


        <h1 class="pb-5"><b>Ground Travel <i class="fa fa-truck" aria-hidden="true"></i></b></h1>
        <div class="row">
            <div class="col-md-2">

            </div>

            <div class="col-md-8">
                <a href="https://www.rt62pettransport.com/" target="_blank">
                    <img src="<?= base_url() ?>assets/lazyload.gif" data-src="<?= base_url() ?>assets/shipping.png" class="image-responsive">
                </a>
                <br><br>
                <a href="https://www.rt62pettransport.com/" target="_blank">
                    <h4><b>RT62PetTransport.com</b></h4>
                </a>
            </div>

            <div class="col-md-2">

            </div>

        </div>



    </div> -->

</div>