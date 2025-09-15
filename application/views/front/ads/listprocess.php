<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<style>
.scroll_elem_div{
    min-width: 20%;
}
@media screen and (max-width:991px)
{
    .scroll_elem_div{
    min-width: 33.33%;
}
}
.category-list-wrapper {
    justify-content: center;
}
    .category-list.make-grid .item-list .row>div {

        justify-content: center;
    }

    .add-image a img {

        /*height: 200px !important;*/

    }

    .item-list {
        width: 100% !important;
    }

    .item-price {
        color: #3457D5;
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
  visibility: hidden; /* 1 */
  height: 0; /* 2 */
  width: 0; /* 2 */
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

.InputGroup input[type="radio"]:checked + label {
  background-color: var(--color-dark-pink);
  color: var(--color-black);
}

.InputGroup input[type="radio"]:hover:not(:checked) + label {
 background-color: var(--color-pink);
 color: var(--color-black);
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
$search = '';
if (isset($_GET['breed'])) {
    $breed = $_GET['breed'];
}

if (isset($_GET['location'])) {
    $location = $_GET['location'];
}

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
?>

<input type="hidden" value="<?php echo $stateid; ?>" id="stateid" />
<div class="main-container" id="homepage">


    <div class="container text-center mb-2">


        <form id="" name="search" action="" method="GET">
            <div class="row search-row animated fadeInUp">

                <div class="col-md-5 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="search-col-inner">
                        <i class="icon-docs icon-append"></i>
                        <div class="search-col-input">
                            <select class="form-control has-icon search_breed" id="breed">
                                <?php foreach ($breeds as $row) { if ($row->count!=0) { ?>
                                    <?php if(isset($ids) && $ids != '0') { ?>
                                    <option <?php if ($row->id == $ids) echo 'selected' ?> value="<?= $row->id ?>"><?= $row->breed_name ?></option>
                                    <?php } else { ?>
                                    <option value="">Find Your Puppy Breed</option>
                                    <option value="<?= $row->id ?>"><?= $row->breed_name ?></option>
                                    <?php } ?>
                                <?php } } ?>
                            </select>

                        </div>
                    </div>
                </div>

                <div class="col-md-5 col-sm-12 search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="search-col-inner">
                        <i class="icon-location-2 icon-append"></i>
                        <div class="search-col-input">
                            <select class="form-control has-icon search_state" name="location" id="locSearch">
                                <!-- <option value="">Search By State</option> -->
                            </select>

                        </div>
                    </div>
                </div>

                <div class="col-md-2 col-sm-12 search-col">
                    <div class="search-btn-border" style="background-color:#8cc63f !important;">
                        <button class="btn btn-search btn-block btn-gradient" id="find" style="color: white !important;">
                            <i class="icon-search"></i><strong>Find</strong>
                        </button>
                    </div>
                </div>
                
                 <div class="size_div">
                                   
            </div>

            </div>
        </form>

    </div>

    <div class="container">
        <div class="row">

            <div class="collapse show mb-3" id="demo">
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
                    <div class="col-6 col-sm-4  pl-4  pr-0" style="width: 100%;">
                        <div class="form-group">
                             <a href="<?=base_url()?>ads">
<span style="color:#8cc63f"><i class="fa fa-times-circle" aria-hidden="true"></i> Clear All Filters</span></a>
<br>

                            <label for="sel1">Sort</label>
                            <select class="form-control" id="sort">
                                <option value="">None</option>
                                <option value="1">Price-Low to High</option>
                                <option value="2">Price-High to Low</option>

                            </select>
                        </div>
                    </div>
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
<?php if (isset($_GET['search'])) {
   
?>
<div class="container  mb-4">

<h2><b>Showing search results for "<?=$_GET['search']?>".</b> </h2>
<!--<a href="<?=base_url()?>ads">-->
<!--<span style="color:#8cc63f"><i class="fa fa-times-circle" aria-hidden="true"></i> Clear All Filters</span></a>-->
</div>

<?php } ?>
    <div class="container">
        <div class="row">


            <!-- this (.mobile-filter-sidebar) part will be position fixed in mobile version -->




            <div class="col-md-12 page-content col-thin-left mb-4">
                <div class="col-xl-12">
                    <div class="category-list make-grid noSideBar">
                        <div id="postsList" class="category-list-wrapper  row no-margin">



                            <div style="clear: both"></div>


                        </div>
                        
                        <div id="loading_div" style="display:none">
<div class="row w-100 spdiv"><div class="col-12"><div class="text-center"><span class="spinner"><span></span><span></span><span></span><span></span></span></div></div></div>
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



</div>
<script>
    $(document).ready(function() {
        $('.search_breed').select2();
        $('.search_state').select2();
        e.preventDefault();
         temp_page = Math.floor((Math.random() * 1000) + 1);
        $("#postsList").empty();
        //$('#locSearch').val('null').trigger("change");
        var stateid = $('#stateid').val();
        update_states(stateid);
        loadPagination(0,stateid);
        $('#locSearch').val($('#stateid').val());
    });
</script>
<script>
    $(document).ready(function() 
    {
        var stateid = $('#stateid').val();
        var token = "<?= $this->security->get_csrf_hash(); ?>";
        var temp_page=1;
        $(document).on('change', 'input[name="size"]:radio', function(e) {
        e.preventDefault();
          temp_page = Math.floor((Math.random() * 1000) + 1);
            $("#postsList").empty();
            loadPagination(0,stateid);
       
      });
      
        $("#find").click(function(e) {
            e.preventDefault();
            $("#postsList").empty();
             temp_page = Math.floor((Math.random() * 1000) + 1);
            load_sizes();
            loadPagination(0,'');
        });

        $("#sort").change(function(e) {
            e.preventDefault();
             temp_page = Math.floor((Math.random() * 1000) + 1);
            $("#postsList").empty();
            loadPagination(0,'');
        });
        
          $("#breed").change(function (e) { 
            e.preventDefault();
            $('#locSearch').val(null).trigger("change");
            update_states('');
        });
        update_states(stateid);
        function update_states(stateid)
        {
            $("#locSearch").empty();
            var breed = $("#breed").val();
            if(stateid == '')
            {
                if(breed=='')
                {
                    var url= "<?=base_url()?>Ads/get_states/";
                }
                else
                {
                    var url= "<?=base_url()?>Ads/get_states/"+breed;
                }
            }
            else
            {
                if(breed=='')
                {
                    var url= "<?=base_url()?>ads/get_states_new/0/"+stateid;
                }
                else
                {
                    var url= "<?=base_url()?>ads/get_states_new/"+breed+"/"+stateid;
                }
            }
            //alert(url);
            $('#locSearch').val(null).trigger('change');
            $.ajax({
                type: "POST",
                url:url,
                data:{'csrf_test_name': token,},
                dataType: "json",
                success: function (response) 
                {
                    $("#locSearch").select2({
                  data:response,
             } );
                }
            });
           
            
        }
        

        $('#pageno').on('click', '#next_Page', function(e) {
            e.preventDefault();
            // alert('dd');
            var pageno = $(this).attr('data-ci-pagination-page');
            if (pageno == 0)
                pageno = '';
            else
                pageno = (pageno - 1) * 20;

            loadPagination(pageno,'');
        });
        var kk = '';
        var resp_status = 1;
        
        
        $(window).on('scroll', function() {
            
          
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
                pageno = (pageno - 1) * 20;


            if ((pageno != kk) && (resp_status == 1) && $(window).scrollTop() + $(window).height() > $("#postsList").height()) {
            // if ((pageno != kk) && (resp_status == 1) && $(window).scrollTop() + $(window).height() > $("#loadcheck").height()) {    
                // alert('dd');
                var kk = pageno;
                //  alert(pageno);
                //  alert(resp_status);
                $('#next_Page').trigger('click');
                // loadPagination(pageno);
            }
        });
        loadPagination(0,stateid);
        function loadPagination(pagno,stateid) 
        {
            //alert(stateid);
            console.log(temp_page);
            var stateid = stateid;
            if(temp_page!=pagno)
            {
                console.log('dd');
                temp_page=pagno;
                $("#nolist").empty();
                // location.href = "#scroll"; 
                // $("#postsList").empty();
                
                // $("#loading_div").append('<div class="row w-100 spdiv"><div class="col-12"><div class="text-center"><span class="spinner"><span></span><span></span><span></span><span></span></span></div></div></div>');
                $("#loading_div").show();
                var breed = $("#breed").val();
                var location = $("#locSearch").val();
                var sort = $("#sort").val();
                if(location != null)
                {
                    var location = location;
                }
                else
                {
                    var location = stateid;
                }
            var size=$('input[name="size"]:checked').val();

            $.ajax({
                url: "<?= base_url() ?>Ads/fetch_ads_data/" + pagno,
                type: 'POST',
                dataType: 'json',
                data: {
                    'csrf_test_name': token,
                    page: 20,
                    breed: breed,
                    location: location,
                    sort: sort,
                    search:"<?=$search?>",
                     size:size
                },
                success: function(response) {
                   
                    resp_status = response.status;
                    $("#loading_div").hide();
                    // $("#loading_div").empty();
                    $("#pageno").empty();
                    if (response.status == 1) {
                        $.each(response.products, function(i, item) {
                            $("#postsList").append(item);
                        });

                    } else {
                        $("#nolist").empty();
                        $.each(response.products, function(i, item) {
                            $("#nolist").append(item);
                        });
                    }


            // window.location.href = "#scroll_elem"+pagno;

                    $("#pageno").append(response.links);
                    slider();



                }
            });
            }

        }



  load_sizes();
  
      function load_sizes()
      {
        var breed = $("#breed").val();
        if(breed!='')
        {

        
          $('.size_div').empty();
          var breed = $("#breed").val();
          $.ajax({
              type: "POST",
              url: "<?=base_url()?>Ads/load_size",
              data: {
                  'csrf_test_name': token,
                  breed:breed
              },
              dataType: "JSON",
              success: function (response) {
                  $('.size_div').append(response.data);
              }
          });

        }
      }
  


        function slider() {
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

