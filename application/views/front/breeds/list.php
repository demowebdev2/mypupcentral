<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<style>
.training_badge{
        background: #8cc63ff2;
     /* color: #fff;*/
     font-weight:bold;
    width: 108%;
    font-size: 14px;
    margin-left: -4%;
    overflow: overlay;
    box-shadow: black;
    margin-top: -9px;
    /* z-index: 9999999999999999999; */
    position: absolute;
}
</style>

<style>
.irs--flat .irs-bar,
.irs--flat .irs-handle > i:first-child,
.irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single,
.irs--flat .irs-handle.state_hover > i:first-child, .irs--flat .irs-handle:hover > i:first-child{
  background-color: #a6e1ff;
}

.irs--flat .irs-handle {
  top: 22px;
  width: 16px;
  height: 18px;
  background-color: #7b6b6b;
  border-radius: 50%;
  cursor:pointer;
}
.irs--flat .irs-handle > i:first-child {
   background-color: #7b6b6b;
}
.irs--flat .irs-handle > i:first-child:hover {
   background-color: #7b6b6b;
}


.irs--flat .irs-from::before, .irs--flat .irs-to::before, .irs--flat .irs-single::before {
  border-top-color: #7b6b6b;
}


.irs--flat .irs-from, .irs--flat .irs-to, .irs--flat .irs-single {
  color: black;
 
  background-color: #fff !important;
 
}
.rangeinbox {
  max-width: 400PX;
  margin: 0px auto;
}
    .scroll_elem_div {
        min-width: 20%;
    }

    .breed_info_btn {
        font-size: 18px;
    }

    .px-86 {
        padding-right: 3rem !important;
        padding-left: 3rem !important;
    }

    .proimage {
        max-height: 600px;
    }
    #loading_div .spinner {
  width: 100px;
  margin: 0px auto;
}
    @media screen and (min-width:1599px) {
        .breed_info h2 {
            font-size: 40px !important;
        }

        .breed_info li {
            font-size: 24px !important;
        }

        .breed_info_btn {
            font-size: 30px;
        }

        .px-86 {
            padding-right: 8rem !important;
            padding-left: 6rem !important;
        }
    }

    @media screen and (max-width:991px) {
        .breed_info_btn {
            display: block;
        }

        .proimage {
            max-height: 400px;
        }

        .scroll_elem_div {
            min-width: 33.33%;
        }
    }

    .hover-5-title {
        width: 100%;
    }

    .nav-pills {
        font-family: 'Poppins' !important;
        font-size: 16px;
    }

    .tab-pane {
        font-size: 15px;
        font-family: 'Poppins' !important;
        margin-left: 0.5rem;
        margin-bottom: 2rem;
    }

    .item-list {
        width: 100% !important;
    }

    .select2-container {
        padding: 8.5px;
    }

    .search-row .search-col .form-control,
    .search-row button.btn-search,
    .search-row .select2-container--default .select2-selection--single {

        border: unset;
        box-shadow: unset;
        margin-left: 4px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 28px;
        margin-top: -5px;
    }

    .spdiv {
        height: 300px;
        display: flex;
        align-content: center;
    }

    .spinner {
        --color: rgb(140 198 63);
        --fade-color: rgba(140 198 63 / 50%);
        --scale: 1;
        --x-speed: 1;
        position: relative;
        display: block;
        width: 80px;
        height: 80px;
        transform: scale(var(--scale)) rotateZ(0);
        animation: ps-spin calc(15s / var(--x-speed)) linear infinite
    }

    @keyframes ps-spin {
        from {
            transform: scale(var(--scale)) rotateZ(0);
        }

        to {
            transform: scale(var(--scale)) rotateZ(-360deg);
        }
    }

    .spinner span {
        display: block;
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .spinner span::before,
    .spinner span::after {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        top: 50%;
        transform: translateY(-50%) scale(.3);
        background-color: rgba(var(--color) / 50%);
        border-radius: 50%;
        animation: ps-spinner-scale calc(1.2s / var(--x-speed)) linear infinite
    }

    .inst-mt-20 {
        margin-top: -20px;
    }

    .instproiming {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .inst-ostandards {
        padding-right: 5px;
        color: #a6e1ff;
    }

    .inst-search-btn-border {
        background-color: #8cc63f !important;
    }

    .inst-category-list-wrapper {
        justify-content: center;
    }

    .inst-clearnoth {
        clear: both
    }

    .inst-h3 {
        font-weight: bold !important;
        font-size: 35px;
    }

    .inst-add-desc-box {
        max-width: 100%;
        padding-left: 10px;
        padding-right: 10px;
    }

    .inst-thumb {
        width: 100%;
        object-fit: cover;
        min-height: 200px;
    }

    .inst-item-price {
        padding: 0px;
        display: flex;
        align-items: center;
        color: #8cc63f;
    }

    @keyframes ps-spinner-scale {
        0% {
            background-color: var(--fade-color);
            transform: translateY(-50%) scale(.3);
        }

        25% {
            background-color: var(--color);
            transform: translateY(-50%) scale(1);
        }

        80% {
            background-color: var(--fade-color);
            transform: translateY(-50%) scale(.3);
        }

        100% {
            background-color: var(--fade-color);
            transform: translateY(-50%) scale(.3);
        }
    }

    .spinner span::before {
        left: 0;
    }

    .spinner span::after {
        right: 0;
    }

    .spinner span:first-of-type {
        transform: rotateZ(-45deg);
    }

    .spinner span:last-of-type {
        transform: rotateZ(45deg);
    }

    .spinner span:nth-of-type(2) {
        transform: rotateZ(90deg);
    }

    .spinner span:nth-of-type(3)::after {
        animation-delay: calc(0.15s / var(--x-speed));
    }

    .spinner span:last-of-type::after {
        animation-delay: calc(.3s / var(--x-speed));
    }

    .spinner span:nth-of-type(2)::after {
        animation-delay: calc(.45s / var(--x-speed));
    }

    .spinner span:first-of-type::before {
        animation-delay: calc(.6s / var(--x-speed));
    }

    .spinner span:nth-of-type(3)::before {
        animation-delay: calc(.75s / var(--x-speed));
    }

    .spinner span:last-of-type::before {
        animation-delay: calc(.9s / var(--x-speed));
    }

    .spinner span:nth-of-type(2)::before {
        animation-delay: calc(1.05s / var(--x-speed));
    }

    #horizontal-tab {
        border-radius: 5px;
        padding: 5px;
        background: #f0f0f08f;
        margin-bottom: 25px;
    }

    .nav-pills .nav-link {
        background: #d2d2d2;
        border: 0;
        border-radius: .25rem;
        margin: 1px;
    }

    .nav-pills .nav-link {
        background: #f0f0f0;
        margin: 1px;
    }

    .nav-pills .nav-link.active,
    .nav-pills .nav-link.active:focus,
    .nav-pills .nav-link.active:hover {
        background-color: #a6e1ff;
        color: #000;
    }

    .ribbon-front {
        width: 150px !important;
    }

    .ribbon-wrapper.active .ribbon-front {
        background-color: #8cc63f !important;
    }
</style>

<style>
    .InputGroup {
        display: flex;
        height: 42px;
        width: 100%;
    }

    /**
 * 1. Hides the input from view
 * 2. Ensures the element does not consume any space
 */

    .InputGroup input[type="radio"] {
        visibility: hidden;
        /* 1 */
        height: 0;
        /* 2 */
        width: 0;
        /* 2 */
    }

    .InputGroup label {
        display: flex;
        flex: auto;
        vertical-align: middle;
        align-items: center;
        justify-content: center;
        text-align: center;
        cursor: pointer;
        background-color: #8cc63f;
        color: #ffffff;
        padding: 5px 10px;
        border-radius: 6px;
        transition: color --transition-fast ease-out,
            background-color --transition-fast ease-in;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        margin-right: 8px;
    }

    .InputGroup label:last-of-type {
        margin-right: 0;
    }

    .InputGroup input[type="radio"]:checked+label {
        background-color: var(--color-dark-pink);
        color: var(--color-black);
    }

    .InputGroup input[type="radio"]:hover:not(:checked)+label {
        background-color: var(--color-pink);
        color: var(--color-black);
    }

    .info_sub {
        text-align: left;
        font-weight: bold;
        font-size: 25px;
    }
</style>

<script>
    $(document).on('mouseenter', '.thevideo', function () {
        $(this).get(0).play();
    });
    $(document).on('mouseleave', '.thevideo', function () {
        $(this).get(0).pause();
    });
</script>

<?php
$breed = '';
$location = '';
if (isset($_GET['breed'])) {
    $breed = $_GET['breed'];
}
$breed=$slug ;
if (isset($_GET['location'])) {
    $location = $_GET['location'];
}
?>
<div class="main-container inst-mt-20" id="homepage">
    <section class=" mb-3 features-area ">
        <div class="text-center mb-2">
            <div class="row features-items">
                <div class="col-md-6 col-sm-6 equal-height p-0">
                    <div class="item p-0">
                        <?php if(!empty($breed_data[0]->pro_image)) { ?>
                        <img src="<?= base_url() ?>assets/lazyload.gif"
                            data-src="<?=base_url()?>uploads/breeds/<?php echo $breed_data[0]->pro_image; ?>"
                            class="img-fluid proimage instproiming" />
                        <?php } else { ?>
                        <img src="<?= base_url() ?>assets/lazyload.gif"
                            data-src="<?=base_url()?>uploads/breeds/<?php echo $breed_data[0]->image; ?>"
                            class="img-fluid proimage instproiming" />
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 equal-height pt-5 pb-5 px-86">
                    <div class="item">
                        <div class="info breed_info">
                            <h2 class="info_sub"><b>
                                    <?php echo $breed_data[0]->breed_name; ?>
                                </b></h2>
                            <ol class="text-left">
                                <li class="pb-0">
                                    <?php echo $breed_data[0]->overview; ?>
                                </li>
                                <li class="font-weight-bold">
                                    <a class="breed_info_btn" href="<?=base_url()?>standard"><i class="fa fa-file-alt"
                                            aria-hidden="true" class="inst-ostandards"></i> Our Standards ></a>
                                    &nbsp;&nbsp;<a class="breed_info_btn" class="" href="<?=base_url()?>process"><i
                                            class="fa fa-angle-double-right" aria-hidden="true"
                                            class="inst-ostandards"></i> Our Process ></a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-1 equal-height">
                </div>
            </div>
    </section>
    <div class="container text-center mb-2 p-5">
        <form id="" name="search" action="" method="GET">
            <div class="row search-row animated fadeInUp">

                <div class="col-md-10 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
                <input type="hidden" id="updated_slug" />
                    <div class="search-col-inner">
                        <i class="icon-docs icon-append"></i>
                        <div class="search-col-input">
                            <select class="form-control has-icon search_breed" id="breed">
                                <option value="">All</option>
                                <?php foreach ($breeds as $row) { if ($row->count!=0) { ?>
                                <option <?php if ($breed==$row->page_slug) echo 'selected' ?> value="<?= $row->id ?>">
                                    <?= $row->breed_name ?>
                                </option>

                                <?php } } ?>
                            </select>

                        </div>
                    </div>
                  <div class="row">
                        <div class="col-12">
                            <div class="rangeinbox mt-4 mb-4">
                                
                            <input type="text" id="range-slider" name="range" />
                            </div>

                        </div>
                    </div> 
                </div>

                <div class="col-md-5 col-sm-12 d-none search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="search-col-inner">
                        <i class="icon-location-2 icon-append"></i>
                        <div class="search-col-input">
                            <select class="form-control has-icon search_state" name="location" id="locSearch">
                                <option value="">Search By State</option>

                            </select>

                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12 search-col">
                    <div class="search-btn-border inst-search-btn-border">
                        <button class="btn btn-search btn-block btn-gradient text-white" id="find">
                            <i class="icon-search"></i><strong>Find</strong>
                        </button>
                    </div>
                </div>

                <div class="size_div">

                </div>

            </div>
        </form>

    </div>

    <br><br>
    <div class="container">
        <div class="row">



            <div class="col-md-12 page-content col-thin-left mb-4">
                <div class="col-xl-12">
                    <div class="category-list make-grid noSideBar">
                        <div id="postsList" class="category-list-wrapper inst-category-list-wrapper  row no-margin">



                            <div class="inst-clearnoth"></div>


                        </div>
                        <div id="loading_div" style="display:none">
                            <div class="row w-100 spdiv">
                                <div class="col-12">
                                    <div class="text-center"><span
                                            class="spinner"><span></span><span></span><span></span><span></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="nolist">

                        </div>
                        <div class="mb20 text-center" id="pageno">
                            <!--<a href="<?= base_url() ?>assets/front/search" class="btn btn-default mt10">-->
                            <!--	<i class="fa fa-arrow-circle-right"></i> View more-->
                            <!--</a>-->
                            <a href="" class="btn btn-default mt10">
                                <i class="fa fa-arrow-circle-left"></i> Previous
                            </a>
                            <a href="" class="btn btn-default mt10">
                                Next <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="container">
        <h1 class="text-center"><b>More About The Breed</b></h1>
        <div class="row" id="horizontal-tab">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="overview-tab" data-bs-toggle="pill" data-bs-target="#overview"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">Overview</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="temperament-tab" data-bs-toggle="pill" data-bs-target="#temperament"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Training</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="adaptability-tab" data-bs-toggle="pill" data-bs-target="#adaptability"
                        type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Adaptability</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="health-tab" data-bs-toggle="pill" data-bs-target="#health"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Health</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="owner-experience-tab" data-bs-toggle="pill"
                        data-bs-target="#owner_experience" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Owner Experience</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="grooming-tab" data-bs-toggle="pill" data-bs-target="#grooming"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Grooming</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="activity-level-tab" data-bs-toggle="pill"
                        data-bs-target="#activity_level" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">Exercise</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="size-tab" data-bs-toggle="pill" data-bs-target="#size" type="button"
                        role="tab" aria-controls="pills-contact" aria-selected="false">Size</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="life-span-tab" data-bs-toggle="pill" data-bs-target="#life_span"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Life Span</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="did-you-know-tab" data-bs-toggle="pill" data-bs-target="#did_you_know"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Did You
                        Know?</button>
                </li>
            </ul>
            <div class="tab-content" id="tab_content">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="pills-home-tab">
                    <?php echo $breed_data[0]->overview?>
                </div>
                <div class="tab-pane fade" id="temperament" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <?php echo $breed_data[0]->training ?>
                </div>
                <div class="tab-pane fade" id="adaptability" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php echo $breed_data[0]->adaptability ?>
                </div>
                <div class="tab-pane fade" id="health" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php echo $breed_data[0]->health?>
                </div>
                <div class="tab-pane fade" id="owner_experience" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php echo $breed_data[0]->owner_experience ?>
                </div>
                <div class="tab-pane fade" id="grooming" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php echo $breed_data[0]->grooming ?>
                </div>
                <div class="tab-pane fade" id="activity_level" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php echo $breed_data[0]->activity_level ?>
                </div>
                <div class="tab-pane fade" id="size" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php echo $breed_data[0]->size?>
                </div>
                <div class="tab-pane fade" id="life_span" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php echo $breed_data[0]->life_span ?>
                </div>
                <div class="tab-pane fade" id="did_you_know" role="tabpanel" aria-labelledby="pills-contact-tab">
                    <?php echo $breed_data[0]->did_you_know ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-xl-12 mt-5 box-title no-border">
            <div class="inner text-center">
                <h2>
                    <span class="title-3">
                        <h3> <span class="inst-h3">Adopted Puppies</span></h3>
                    </span>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 page-content col-thin-left mb-4">
                <div class="col-xl-12">
                    <div class="category-list make-grid noSideBar">
                        <div id="postsList" class="category-list-wrapper  row no-margin">
                            <?php 
                                foreach ($breedssold as $row) { 
                                if($row->featured_image_from=='puppyverify.com'){$lnk= PV; }else{ $lnk= NS; } 
                            ?>
                            <div class="col-lg-3">
                                <div class="item-list p-0 mb-3">
                                    <div class="row aqr">
                                        <div class="col-sm-2 col-12 no-padding photobox">
                                            <div class="add-image w-100">
                                                <span class="photo-count"><i class="fa fa-camera"></i> 3 </span>
                                                <a href="javascript:void(0)">
                                                    <div class="postImg-slick d-flex gap-4">
                                                        <img src="<?= base_url() ?>assets/lazyload.gif"
                                                            data-src="<?php echo $lnk; ?>uploads/puppies/pv/thumb_<?php echo $row->featured_image; ?>"
                                                            class="lazyload inst-thumb thumbnail no-margin"
                                                            alt="<?php echo $row->title; ?>' - My Pup Central"
                                                            data-nsfw-filter-status="sfw">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 add-desc-box inst-add-desc-box pl-2">
                                            <div class="items-details">
                                                <div class="ribbon-wrapper active">
                                                    <div class="glow-out">
                                                        <div class="glow">&nbsp;</div>
                                                    </div>
                                                    <div class="ribbon-front">I FOUND MY FAMILY!</div>
                                                    <div class="ribbon-edge-topleft"></div>
                                                    <div class="ribbon-edge-topright"></div>
                                                    <div class="ribbon-edge-bottomleft"></div>
                                                </div>
                                                <div class="row w-100">
                                                    <div class="col-6 p-0">
                                                        <h5 class="add-title">
                                                            <a href="javascript:void(0)">
                                                                <?php echo $row->title; ?>
                                                            </a>
                                                        </h5>
                                                    </div>
                                                    <div class="col-6">
                                                        <h2 class="item-price inst-item-price pb-0">
                                                            $
                                                            <?php echo $row->asking_price; ?>
                                                        </h2>
                                                    </div>
                                                    <div class="col-12 pt-3">
                                                        <span class="item-location">
                                                            <i class="icon-location-2"></i>&nbsp;
                                                            <?php echo $row->address; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="mb20 text-center">
                                <a href="<?=base_url()?>sold" class="btn btn-default mt10">
                                    <i class="fa fa-arrow-circle-right"></i> View more
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.search_breed').select2();
        $('.search_state').select2();
    });
</script>
<script>


var rangeSlider = $("#range-slider");
var selectedFromValue=100;
var selectedToValue=5000;
  // Initialize the range slider

    $(document).ready(function () {
  rangeSlider.ionRangeSlider({
    type: "double",
            grid: true,
            min: 100,
            max: 2000,
            from: 100, // Initial "from" value
            to: 2000,   // Initial "to" value
            step: 100,   // Step size
            prettify: function (value) {
                if (value === 2000) {
                    return "$2000+";
                }
                 if (value === 100) {
                    return "$100";
                }
                return "$"+value;
            }
    
  });

  // Add an event listener to update the selected values
//   rangeSlider.on("change", function () {
//     selectedFromValue = rangeSlider.data("from");
//     selectedToValue = rangeSlider.data("to");
//     $("#postsList").empty();
//     loadPagination(0);
//   });
  
   var timeout = null;

        rangeSlider.on("change", function (data) {
            
            // Clear the previous timeout
            if (timeout) {
                clearTimeout(timeout);
            }

            // Set a new timeout to consider the change as stable after 500 milliseconds of inactivity
            timeout = setTimeout(function () {
                // Your custom function to handle the stable change event
                var fromValue =rangeSlider.data("from");
                var toValue = rangeSlider.data("to");
                $("#postsList").empty();
                 loadPagination(0,1);
                // Perform actions with the stable values
                console.log("Stable change - From: " + fromValue);
                console.log("Stable change - To: " + toValue);
            }, 500);
        });
        
var updated_slug=null;

        var token = "<?= $this->security->get_csrf_hash(); ?>";
        var temp_page = 1;
        $(document).on('change', 'input[name="size"]:radio', function (e) {
            e.preventDefault();
            console.log('click');
            temp_page = Math.floor((Math.random() * 1000) + 1);
            temp_page=0;
            $("#postsList").empty();
            loadPagination(0,1);
           

        });

        // $("#find").click(function (e) {
        //     e.preventDefault
            
        //     var slug = <?php echo json_encode($slug); ?>;
        //     if(updated_slug==slug){
        //         $("#postsList").empty();
        //     temp_page = Math.floor((Math.random() * 1000) + 1);
        //     load_sizes();
        //     loadPagination(0);
        //     }
        //     else{
        //         console.log(updated_slug +" == "+slug);

        //     }
            
        // });
        $("#find").click(function (e) {
    e.preventDefault(); // Call the preventDefault method properly

    var slug = <?php echo json_encode($slug); ?>;
    if ((updated_slug === slug) || updated_slug==null) { 
        $("#postsList").empty();
        temp_page = Math.floor((Math.random() * 1000) + 1);
        load_sizes();
        
        loadPagination(0,1);
    } else {
        window.location.replace("<?= base_url() ?>/breeds/" + updated_slug);

        // console.log(updated_slug + " == " + slug); // Fix the variable 

    }
});


        $("#sort").change(function (e) {
            e.preventDefault();
            $("#postsList").empty();
            temp_page = Math.floor((Math.random() * 1000) + 1);
            loadPagination(0,1);
        });

        $('#pageno').on('click', '#next_Page', function (e) {
            e.preventDefault();
            // alert('dd');
            var pageno = $(this).attr('data-ci-pagination-page');
            if (pageno == 0)
                pageno = '';
            else
                pageno = (pageno - 1) * 30;

            loadPagination(pageno);
        });



        $("#breed").change(function (e) {
            e.preventDefault();
            $('#locSearch').val(null).trigger("change");
            update_states();
            updateslug($("#breed").val());
        });
        
       function updateslug(x) {
        var vall = x;
        var breedslist = <?php echo json_encode($breeds); ?>;
        var slug = <?php echo json_encode($slug); ?>;
        console.log("coming");
        breedslist.forEach(function (breed) {
            if (breed.id == vall) {
               updated_slug=breed.page_slug;
            } else {
                // console.log("ps:" + breed.page_slug + " vall:" + vall + " breed.id: " + breed.id);
            }
        });
    }
        update_states();
        function update_states() {
            $("#locSearch").empty();
            var breed = $("#breed").val();
            if (breed == '') {
                var url = "<?=base_url()?>Ads/get_states/";
            }
            else {
                var url = "<?=base_url()?>Ads/get_states/" + breed;
            }
            $('#locSearch').val(null).trigger('change');
            $.ajax({
                type: "POST",
                url: url,
                data: { 'csrf_test_name': token, },
                dataType: "json",
                success: function (response) {
                    $("#locSearch").select2({
                        data: response,
                    });
                }
            });


        }



        var kk = '';
        var resp_status = 1;
        $(window).on('scroll', function () {

            // alert($(window).height());
            // alert($(document).height());
            // alert($(window).scrollTop());
            // alert($('#height_scroll').height());
            // var lastId =$("#last_id").val();
            // alert(lastId);
            // alert($(window).scrollTop());
            var pageno = $('#next_Page').attr('data-ci-pagination-page');

            if (pageno == 0)
                pageno = '';
            else
                pageno = (pageno - 1) * 30;


            if ((pageno != kk) && (resp_status == 1) && ($(window).scrollTop() >= $('#postsList').height() - 800)) {
                // alert('dd');
                var kk = pageno;
                //  alert(pageno);
                //  alert(resp_status);
                $('#next_Page').trigger('click');
                // loadPagination(pageno);
            }
        });
        loadPagination(0);
        function loadPagination(pagno,force=0) {
            
            if (temp_page != pagno || force==1) {
                temp_page = pagno;
                $("#nolist").empty();
                // location.href = "#scroll"; 
                // $("#postsList").empty();

                $("#loading_div").show();




                var breed = $("#breed").val();
                var location = $("#locSearch").val();
                var sort = $("#sort").val();

                var size = $('input[name="size"]:checked').val();

                $.ajax({
                    url: "<?= base_url() ?>Ads/fetch_ads_data/" + pagno,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'csrf_test_name': token,
                        page: 30,
                        breed: breed,
                        location: location,
                        sort: sort,
                        size: size,
                        range_from:rangeSlider.data("from"),
                        range_to:rangeSlider.data("to")
                    },
                    success: function (response) {
                        resp_status = response.status;
                        $("#loading_div").hide();
                        $("#pageno").empty();
                        if (response.status == 1) {
                            $.each(response.products, function (i, item) {
                                $("#postsList").append(item);
                            });

                        } else {
                            $("#nolist").empty();
                            $.each(response.products, function (i, item) {
                                $("#nolist").append(item);
                            });
                        }



                        $("#pageno").append(response.links);





                    }
                });
            }

        }

        load_sizes();

        function load_sizes() {
            var breed = $("#breed").val();

            if (breed != '') {


                $('.size_div').empty();
                var breed = $("#breed").val();
                $.ajax({
                    type: "POST",
                    url: "<?=base_url()?>Ads/load_size",
                    data: {
                        'csrf_test_name': token,
                        breed: breed,
                        range_from:selectedFromValue,
                        range_to:selectedToValue
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $('.size_div').append(response.data);
                    }
                });

            }
        }
        loadPagination_sold();

        function loadPagination_sold() {
            $("#postsListsold").empty();
            $("#postsListsold").append('<div class="row w-100 spdiv"><div class="col-12"><div class="text-center"><span class="spinner"><span></span><span></span><span></span><span></span></span></div></div></div>');
            $.ajax({
                url: "<?= base_url() ?>Ads/fetch_ads_sold/" + pagno,
                type: 'POST',
                dataType: 'json',
                data: {
                    'csrf_test_name': token
                },
                success: function (response) {
                    $("#postsListsold").empty();
                    $.each(response.products, function (i, item) {
                        $("#postsListsold").append(item);
                    });
                    slider();
                }
            });

        }
    });
</script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyCXzuM95auojpcl1ea54z9CNR9v1K97fTQ&libraries=places"
    type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $(function () {
            var autocomplete;
            var geocoder;
            var input = document.getElementById('locSearch');
            var options = {
                types: ['((regions))'],
            };

            autocomplete = new google.maps.places.Autocomplete(input);

        });
    });
</script>