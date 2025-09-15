<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<style>
    .item-list {
        width: 100% !important;
    }
    .ribbon-wrapper.active .ribbon-edge-topleft, .ribbon-wrapper.active .ribbon-edge-bottomleft {
        /*border-color: transparent #d10f0f transparent transparent;*/
       border-color: transparent #8ec43d transparent transparent;
    }
    .ribbon-wrapper.active .ribbon-front {
        /*background-color: #f10f0f !important;*/
        background-color:#8cc63f !important;
    }
    .ribbon-front{
        width:150px !important;
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
</style>
<script>
    $(document).on('mouseenter', '.thevideo', function() {
        $(this).get(0).play();
    });
    $(document).on('mouseleave', '.thevideo', function() {
        $(this).get(0).pause();
    });
</script>

<?php
$breed = '';
$location = '';
if (isset($_GET['breed'])) {
    $breed = $_GET['breed'];
}

if (isset($_GET['location'])) {
    $location = $_GET['location'];
}
?>
<div class="main-container" id="homepage">


    <div class="container text-center mb-2">
     

    </div>

    <div class="container">
        <div class="row">

            <div class="collapse show mb-5" id="demo" >
                <br>
                <!-- <h4><b><i class="fas fa-sliders-h"></i> Filters</b></h4> -->
                <div class="row " style="float:right">
                    <!-- <div class="col-6 col-sm-4  pl-4  pr-0">
                              <div class="form-group">
                                 <label for="sel1">Type</label>
                                 <select class="form-control">
                                    <option selected="">Premium Ads</option>
                                    <option></option>
                                 </select>
                              </div>
                              </div> -->
                    <!-- <div class="col-6 col-sm-4  pl-4  pr-0">
                        <div class="form-group">
                            <label for="sel1">Date Posted</label>
                            <select class="form-control">
                                <option selected="">All</option>
                                <option>24 Hours</option>
                            </select>
                        </div>
                    </div> -->
                    <!--<div class="col-6 col-sm-4  pl-4  pr-0" style="width: 100%;">-->
                    <!--    <div class="form-group">-->
                    <!--        <label for="sel1">Sort</label>-->
                    <!--        <select class="form-control" id="sort">-->
                    <!--            <option value="">None</option>-->
                    <!--            <option value="1">Price-Low to High</option>-->
                    <!--            <option value="2">Price-High to Low</option>-->

                    <!--        </select>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <!-- <div class="col-6 col-sm-4 mt-2  pl-4  pr-0">
                        <div class="form-group">
                            <br>
                            <button class="btn btn-info">Apply Filters</button>
                        </div>
                    </div> -->
                </div>
            </div>

        </div>
    </div>


    <div class="container">
        <div class="row">


            <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->
            



            <div class="col-md-12 page-content col-thin-left mb-4">
                <div class="col-xl-12">
                    <div class="category-list make-grid noSideBar">
                        <div id="postsList" class="category-list-wrapper  row no-margin">

                          

                            <div style="clear: both"></div>


                        </div>
                        <div class="mb20 text-center" id="pageno">
                            <!--<a href="<?= base_url() ?>assets/front/search" class="btn btn-default mt10">-->
                            <!--    <i class="fa fa-arrow-circle-right"></i> View more-->
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



</div>
<script>
    $(document).ready(function() {
       // $('.search_breed').select2();
    });
</script>
<script>
    $(document).ready(function() {

        $("#find").click(function(e) {
            e.preventDefault();
            loadPagination(0);
        });

        $("#sort").change(function (e) { 
            e.preventDefault();
            loadPagination(0);
        });

        $('#pageno').on('click', 'a', function(e) {
            e.preventDefault();
            var pageno = $(this).attr('data-ci-pagination-page');
            if (pageno == 0)
                pageno = '';
            else
                pageno = (pageno - 1) * 12;

            loadPagination(pageno);
        });


        var token = "<?= $this->security->get_csrf_hash(); ?>";
        loadPagination(0);

        function loadPagination(pagno) {
            // location.href = "#scroll"; 
            $("#postsList").empty();

            $("#postsList").append('<div class="row w-100 spdiv"><div class="col-12"><div class="text-center"><span class="spinner"><span></span><span></span><span></span><span></span></span></div></div></div>');

            // var breed = $("#breed").val();
            // var location = $("#locSearch").val();
             var breed = '';
            var location = '';
            var sort = $("#sort").val();

            $.ajax({
                url: "<?= base_url() ?>Ads/fetch_ads_sold/" + pagno,
                type: 'POST',
                dataType: 'json',
                data: {
                    'csrf_test_name': token,
                    page: 12,
                    breed: breed,
                    location: location,
                     sort:sort
                },
                success: function(response) {
                      $("#postsList").empty();
                    $("#pageno").empty();
                    $.each(response.products, function(i, item) {
                         $("#postsList").append(item);
                      //   console.log(response.days_30_before);
                    });

                    $("#pageno").append(response.links);
                    slider();



                }
            });

        }
        
        
         function slider()
        {
             $(".postImg-slick").each(function() {
            var postImgSlick = $(this);
            var postImages = $(this).children();
            var counter = 1;

            if (postImages.length > 1) {
                postImages.each(function() {
                    jQuery('<img />').attr('src', $(this).attr('src')).on('load', function() {
                        counter++;
                        if (counter >= postImages.length) {
                            slickPostImage(postImgSlick);
                            counter = 1;
                        }
                    });
                });


                function slickPostImage(event) {
                    event.slick({
                        infinite: true,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                        arrows: true,
                        speed: 500,
                        cssEase: 'linear',
                        responsive: [{
                                breakpoint: 992,
                                settings: {
                                    infinite: true,
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    infinite: true,
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    infinite: true,
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                }
                            }
                        ]
                    });
                }
            }
        });

        $(".postImg-slick").on("click", "button.slick-arrow", function(e) {
            e.preventDefault();
        });
        }
    });
</script>

<script src="https://maps.google.com/maps/api/js?key=AIzaSyCXzuM95auojpcl1ea54z9CNR9v1K97fTQ&libraries=places" type="text/javascript"></script>

<script>
     $(document).ready(function () {
        $(function(){
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