<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
<?php
$segm=$this->uri->segment(1);
if($segm=='training-ads')
{
    $training=1;
}
else{
    $training=0;
}
?>

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
.instyle-clear{
    clear: bothl
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

<style>
    	.banner-next-down-arrow{
		margin-top: -10px
	}
	.banner-next-down-arrow i{
		background: #8cc63f;
		color: #fff;
		font-size: 40px;
		padding-bottom: 3px;
		padding-left: 20px;
		padding: -ri;
		padding-right: 20px;
		border-bottom-left-radius: 30px;
		border-bottom-right-radius: 30px;
	}
	
	.banner_next {
		background-color: #8cc63f;
		color: #fff;
		margin-top: -7px;
	}

	.banner_next h2 {
		font-size: 38px;
		line-height: 40px;

	}
	.banner_next p {
		font-size: 16px;

	}
	
		.banner_video {
		height: 85vh;
		width: 98.7vw;
		object-fit: cover;
	}

	@media only screen and (max-width: 765px) {
		.banner_video {
			height: 60vh;
			width: 98.7vw;
			object-fit: cover;
		}
	}
	
		.banner_img {
		height: 100vh;
		width: 100vw;
		object-fit: cover;
	}

	@media only screen and (max-width: 765px) {
		.banner_img {
			height: 80vh;
			width: 98.7vw;
			object-fit: cover;
		}
	}
	
		#videosList {
		max-width: 1400px;
		margin: 0 auto;
		padding: 0px 80px;
	}

	@media (max-width: 1250px) {
		#videosList {
			padding: 0px 50px;
		}
	}

	@media (max-width: 900px) {
		#videosList {
			padding: 60px 20px;
		}

		.postImg-slick.d-flex.gap-4 {
			height: unset;
		}
	}

	#videosList .video {
		width: 50%;
		display: inline-block;
		float: left;
		position: relative;
		overflow: hidden;
	}

	@media (max-width: 500px) {
		#videosList .video {
			width: 100%;
		}
	}

	#videosList .video .videoSlate {
		width: 100%;
		height: 0;
		padding: 60% 0 0 0;
		-webkit-transition: 5000ms 50ms;
		-moz-transition: 5000ms 50ms;
		transition: 5000ms 50ms;
	}

	#videosList .video .videoSlate:after {
		content: ' ';
		position: absolute;
		top: 0;
		left: 0;
		display: block;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.3);
		-webkit-transition: 500ms 50ms;
		-moz-transition: 500ms 50ms;
		transition: 500ms 50ms;
	}

	#videosList .video .videoSlate video {
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		position: absolute;
	}

	#videosList .video .videoListCopy {
		display: inline-block;
		text-align: center;
		width: 100%;
		z-index: 20;
	}
	
	.banner_content{
		position: absolute;
    top: 50%;
    width: 100%;
	}

	.int-style-mt--5{
        margin-top:-5px;
    }
    .inst-search-btn-border{
background-color:#8cc63f !important;
}
.inst-float-right{
float:right;
}
.inst-span-color{
color:#8cc63f;
}
.category-list .spinner {
  width: 100px;
  margin: 0px auto;
}
</style>

<?php if($segm=='training-ads')
{
    ?>
    
    	<!--<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>-->

	<!--<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>-->
	<div class="container-fluid p-0">
<img src="<?=base_url()?>assets/banner_training.jpg" class="banner_img">
		<!-- <video class="thevideo banner_video" playsinline muted loop style=" pointer-events: none;">
			<source src="<?= base_url() ?>uploads/indexvideo.mp4 " type="video/mp4">
			Your browser does not support the video tag.
		</video> -->
        <div class="banner_content">
        	<div class="intro3 int-style-mt--5" >
		<div class="container ">
		    
		    <div class="search-row ">
			<h1 class=" wel_text">
                       <span class="u-text-animation u-text-animation--typing"></span>
                    </h1>
			</div>
			</div>
		</div>
		
		
		<div class="intro2 int-style-mt--5">
		<div class="container ">
		    
	

		</div>
	</div>
	</div>
	
	<div class="banner_next pt-5 pb-5 web-content">
			<div class="container">
				<div class="text-center">
					<h2 class="pb-5"><b>Puppies Eligible for Training</b></h2>
					<p>The puppies on this page are eligible to be placed in our training program.<br>
Contact the breeder to learn more a specific puppy. Once you have chosen
your new best friend;<br> visit our <a href="<?=base_url()?>training" class="color-white"><u><b>Training Page</b></u></a> & submit a <a href="<?=base_url()?>request_training" class="color-white"><u><b>Training Request</b></u></a> for
your puppy.</p>
				</div>
					

				
			</div>
			
		</div>
		<div class="text-center"><div class="banner-next-down-arrow web-content mb-5"><i class="fas fa-angle-down"></i></div></div>


	</div>
    
    
    <?php } ?>
    
    <div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<div class="main-container" id="homepage">


<div class="container">
        <div class="row">
            <div class="col-sm-12 ">
                    <div class="page-header px-5">
                    <div class="text-center">
                    <h1 id="timeline"><b>Available Puppies</b></h1>
                    <p>Welcome to My Pup Central! Explore our wonderful selection of adorable puppies who are ready to fill your life with love and joy. With over 10 years of experience, we’ve built lasting relationships with a strong community of breeders who hold themselves to the highest standards, ensuring every puppy receives the best care from the very beginning. With safe delivery options, your new best friend can come home to you through a smooth and seamless process. You’ll communicate directly with our breeders, who are always happy to answer your questions and guide you through the journey of bringing your puppy home.</p>
                    <br><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container text-center mb-2">


        <form id="" name="search" action="" method="GET">
            <div class="row search-row animated fadeInUp">

                <div class="col-md-10 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="search-col-inner">
                        <i class="icon-docs icon-append"></i>
                        <div class="search-col-input">
                            <select class="form-control has-icon search_breed" id="breed">
                                <option value="">Find Your Puppy Breed</option>
                                <?php foreach ($breeds as $row) { if ($row->count!=0) { ?>
                                    <option <?php if ($breed == $row->id) echo 'selected' ?> value="<?= $row->id ?>"><?= $row->breed_name ?></option>

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

                <div class="col-md-5 d-none col-sm-12 search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
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
                    <div class="search-btn-border inst-search-btn-border" >
                        <button class="btn btn-search btn-block btn-gradient color-white" id="find">
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
                <div class="row inst-float-right">
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
                    <div class="col-6 col-sm-4  pl-4  pr-0 w-100" >
                        <div class="form-group">
                             <a href="<?=base_url()?>ads">
<span class="inst-span-color"><i class="fa fa-times-circle" aria-hidden="true"></i> Clear All Filters</span></a>
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



                            <div class="instyle-clear"></div>


                        </div>
                        
                        <div id="loading_div d-none">
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
    });
</script>
<script>

var rangeSlider = $("#range-slider");
var selectedFromValue=100;
var selectedToValue=5000;
  // Initialize the range slider
  
    $(document).ready(function() {
        
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

//   // Add an event listener to update the selected values
//   rangeSlider.on("change", function () {
//     selectedFromValue = rangeSlider.data("from");
//     selectedToValue = rangeSlider.data("to");
//     $("#postsList").empty();
//     // alert('das');
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
        
        
          var token = "<?= $this->security->get_csrf_hash(); ?>";
          
var temp_page=1;
        $(document).on('change', 'input[name="size"]:radio', function(e) {
        e.preventDefault();
          temp_page = Math.floor((Math.random() * 1000) + 1);
            $("#postsList").empty();
            loadPagination(0,1);
       
      });
      
        $("#find").click(function(e) {
            e.preventDefault();
            $("#postsList").empty();
             temp_page = Math.floor((Math.random() * 1000) + 1);
            load_sizes();
            loadPagination(0,1);
        });

        $("#sort").change(function(e) {
            e.preventDefault();
             temp_page = Math.floor((Math.random() * 1000) + 1);
            $("#postsList").empty();
            loadPagination(0,1);
        });
        
          $("#breed").change(function (e) { 
            e.preventDefault();
            $('#locSearch').val(null).trigger("change");
            update_states();
        });
 update_states();
        function update_states()
        {
            $("#locSearch").empty();
            var breed = $("#breed").val();
            if(breed=='')
            {
                var url= "<?=base_url()?>Ads/get_states/";
            }
            else{
                var url= "<?=base_url()?>Ads/get_states/"+breed;
            }
            $('#locSearch').val(null).trigger('change');
            $.ajax({
                type: "POST",
                url:url,
                data:{'csrf_test_name': token,},
                dataType: "json",
                success: function (response) {
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
                pageno = (pageno - 1) * 30;

            loadPagination(pageno);
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
                pageno = (pageno - 1) * 30;


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



      
        loadPagination(0);

        function loadPagination(pagno,force=0) {
        console.log(temp_page);
        selectedFromValue = rangeSlider.data("from");
    selectedToValue = rangeSlider.data("to");
            if(temp_page!=pagno || force==1)
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
            
            var size=$('input[name="size"]:checked').val();

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
                    search:"<?=$search?>",
                     size:size,
                     training:"<?=$training?>",
                      range_from:rangeSlider.data("from"),
                        range_to:rangeSlider.data("to")
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

<script src="https://maps.google.com/maps/api/js?key=AIzaSyCXzuM95auojpcl1ea54z9CNR9v1K97fTQ&libraries=places" type="text/javascript"></script>

<script>

    $(document).ready(function() {
        $(function() {
            var autocomplete;
            var geocoder;
            // var input = document.getElementById('locSearch');
            var options = {
                types: ['((regions))'],
            };

            autocomplete = new google.maps.places.Autocomplete(input);

        });
    });
</script>