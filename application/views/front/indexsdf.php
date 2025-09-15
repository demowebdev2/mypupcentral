<script>
	$(document).ready(function() {
		$('.search_breed').select2();
	});
</script>
<style>
	.select2-container {
		padding: 8.5px;
	}
	.postImg-slick.d-flex.gap-4 .lazyload.thumbnail.no-margin {
    object-fit: unset !important;
min-height: unset !important;
max-height: unset !important;
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

	.slick-next:focus,
	.slick-next:hover,
	.slick-prev:focus,
	.slick-prev {
		color: transparent;
		outline: 0;
		background: 0 0;
	}

	.slick-prev:before {
		content: '←' !important;
		background: black !important;
	}

	.slick-dots li button:before,
	.slick-next:before,
	.slick-prev:before {
		font-family: slick !important;
	}

	.slick-next:before,
	[dir=rtl] .slick-prev:before {
		content: '→' !important;
		right: 10px;
		position: relative;
	}
</style>

<style>
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
	.intro2{
		background: #343333;
   		padding: 10px;
	}
	.row.aqr {
    box-shadow: unset;
    background-color: #fff;
    height: 100%;
    border: 1px solid #dddddd;
}
.row.aqr .add-image {
    padding: 5px;
}
</style>

<script>
	$(document).ready(function() {
		$(".thevideo").mouseenter(function() {
			$(this).get(0).play();
		}).mouseleave(function() {
			$(this).get(0).pause();
		});

	});
</script>
<div class="main-container" id="homepage">


<div class="intro2">
		<div class="container text-center">
		
			<form id="" name="search" action="<?=base_url()?>ads" method="GET">
				<div class="row search-row animated fadeInUp">

					<div class="col-md-5 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
						<div class="search-col-inner">
							<i class="icon-docs icon-append"></i>
							<div class="search-col-input">
								<select class="form-control has-icon search_breed" name="breed">
									<option value="">All</option>
									<?php foreach ($breeds as $row) { ?>
										<option value="<?= $row->id ?>"><?= $row->breed_name ?></option>

									<?php } ?>
								</select>

							</div>
						</div>
					</div>

					<div class="col-md-5 col-sm-12 search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
						<div class="search-col-inner">
							<i class="icon-location-2 icon-append"></i>
							<div class="search-col-input">
								<input class="form-control locinput input-rel searchtag-input has-icon" id="get_location_address"  name="location" placeholder="Where ?" type="text" value="" data-bs-placement="bottom" data-bs-toggle="tooltip" title="Enter a city name OR a state name ">
							</div>
						</div>
					</div>

					<div class="col-md-2 col-sm-12 search-col">
						<div class="search-btn-border bg-primary">
							<button class="btn btn-primary btn-search btn-block btn-gradient">
								<i class="icon-search"></i><strong>Find</strong>
							</button>
						</div>
					</div>

				</div>
			</form>

		</div>
	</div>


	<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

	<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
	<div class="container">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title no-border">
					<div class="inner" style="text-align: center;">
						<h2>
							<span style="font-weight: bold;font-size: 35px;"> Breeds</span>
							<!--<a href="" class="sell-your-item">-->
							<!--	View more <i class="icon-th-list"></i>-->
							<!--</a>-->
						</h2>
					</div>
				</div>
	<div class="row m-0">

					<?php $count = 0;
					$mycount = 0;
					foreach ($breeds as $row) {
						$count++;
						
						if($mycount==6)
						{
						    	$mycount = 1;
						}
						if ($count == 19) break;
						 ?>
						<div class="f-category col-6 col-lg-2 mycol<?=$mycount?>">
							<a href="<?=base_url()?>breeds?breed=<?=$row->id?>">
								<div class="circle">
									<div class="img-wrap">
										<?php $image_file = base_url() . 'uploads/breeds/' . $row->image;
										if (!empty($row->image)) { ?>
											<img src="<?= $image_file ?>" class="category-img lazyload img-fluid" alt="<?= $row->breed_name ?>">
										<?php } else { ?>
											<img src="<?= base_url() ?>assets/front/storage/app/categories/custom/thumb-70x70-02619329f1bec212ed6915de420702aa.jpeg" class="category-img lazyload img-fluid" alt="<?= $row->breed_name ?>">
										<?php } ?>
									</div>
								</div>
								<h6>
									<?= $row->breed_name ?>(<?php echo $row->count?>)
								</h6>
							</a>
						</div>
					<?php } ?>
                    <div class="col-12  pt-3 pb-3">
                        <button class=" btn btn-primary morebreeds btn-block btn-gradient" style="width: auto;
margin: 0px auto;">
                            Show More
                        </button>
                    </div>

				</div>


			</div>
		</div>
	</div>



	<style>
		.morecontent span {
			display: none;
		}

		.morelink {
			display: block;
		}
	</style>

	<div class="container" style="margin-top: 3%;">
		<div class="col-xl-12">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12" style="text-align:center">
					<h2 style="font-size: 32px; font-weight: 600;color: #060606;line-height: 27pt;
    margin-top: 15px;">Finding Forever Homes For Puppies For 20 Years!</h2>
					</br>
					<p style="font-size: 16px;"> <span class="more">
							Welcome to Puppy Verify! In 2020, some local families created Puppy Verify with the intent to connect healthy puppies with caring families. Puppy Verify does not condone Puppy Mills, and through technology, we are making it a thing of the past. We require breeders to use our digital process for vaccination schedules which means they can’t fudge information. They must upload the labels used for administering vaccines and de-wormers according to a rigorous vaccination schedule. This technology is provided by My Dogs ID (Mydogsid.com) where Microchip pre-registration from the breeder and lifetime registration from the new family is facilitated. This allows you as the puppy owner to buy with confidence and know you are getting a digital shot record that cannot be altered, ever.<br><br>Any breeders currently listed will be given time to transfer over to digital shot records. Our goal is to make this mandatory by March 1st, 2020.
						</span></p>
					<!--<button nclick="myFunction()" id="myBtn" class="btn btn-primary btn-search btn-block btn-gradient" style="width: 13%;border-radius: 50px 50px;margin: 0px auto; border-radius: 26px !important;">Read more</button>-->


				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			// Configure/customize these variables.
			var showChar = 100; // How many characters are shown by default
			var ellipsestext = "";
			var moretext = "Read more >";
			var lesstext = "Read less >";


			$('.more').each(function() {
				var content = $(this).html();

				if (content.length > showChar) {

					var c = content.substr(0, showChar);
					var h = content.substr(showChar, content.length - showChar);

					var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><br><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" style="width: 13%;border-radius: 50px 50px;margin: 0px auto; border-radius: 26px !important;min-width:120px;" class="morelink btn btn-primary btn-search btn-block btn-gradient">' + moretext + '</a></span>';

					$(this).html(html);
				}

			});

			$(".morelink").click(function() {
				if ($(this).hasClass("less")) {
					$(this).removeClass("less");
					$(this).html(moretext);
				} else {
					$(this).addClass("less");
					$(this).html(lesstext);
				}
				$(this).parent().prev().toggle();
				$(this).prev().toggle();
				return false;
			});
		});
	</script>


	<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
	<div class="container">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">

				<div class="col-xl-12 box-title no-border">
					<div class="inner" style="text-align: center;">
						<h2>
							<!--<span class="title-3">Latest <span style="font-weight: bold;">Ads</span></span>-->
							<span class="title-3">
								<h3> 	<span style="font-weight: bold;font-size: 35px;">Newly Listed</span></h3>
							</span>
							<!--<a href="<?= base_url() ?>assets/front/search" class="sell-your-item">-->
							<!--	View more <i class="icon-th-list"></i>-->
							<!--</a>-->
							<!--<a href="#" class="sell-your-item">-->
							<!--	View more <i class="icon-th-list"></i>-->
							<!--</a>-->
						</h2>
					</div>
				</div>
<style>
    h5.add-title {
        margin: 0px auto;
}
.item-list h2.item-price {
    margin: 0px auto;
}
span.item-location {
    text-align: center;
        margin: 0px auto;
}
</style>
				<div class="col-xl-12">
					<div class="category-list make-grid noSideBar">
						<div id="postsList" class="category-list-wrapper posts-wrapper row no-margin">
                            <?php
							$count = 0;
							if(!empty($premium_ads))
							{
								foreach($premium_ads as $rows => $innerArray){
								    // foreach(array_reverse($premium_ads) as $rows => $innerArray){
  									foreach($innerArray as $innerRow => $row){
							 ?>
								<div class="item-list p-0 m-3">

									<div class="row aqr">
										<div class="col-sm-2 col-12 no-padding photobox">
											<div class="add-image w-100">
												<span class="photo-count"><i class="fa fa-images"></i> 3 </span>
												<a href="<?= base_url() ?>ad/<?= $row->id ?>">
													<div class="postImg-slick d-flex gap-4">
														<?php if (!empty($row->featured_video)) { ?>
															<div class="videoSlate" style="width:100%; ">
																<video class="thevideo" muted loop  style="width:100%;height:200px;margin: 0px auto;">
																	<source src="<?= base_url() ?>uploads/puppies/<?= $row->featured_video ?>"  type="video/mp4">
																	Your browser does not support the video tag.
																</video>
															</div>
														<?php } ?>

														<?php if (!empty($row->featured_image)) { ?>
														<img src="<?= base_url() ?>uploads/puppies/<?= $row->featured_image ?>" style="max-height: 200px;
    width: 100%;
    object-fit: cover;
    min-height: 200px" class="lazyload thumbnail no-margin" alt="Airedale Terrier for sale" data-nsfw-filter-status="sfw">
														
														
														<?php } ?>
													</div>
												</a>
											</div>
										</div>

											<div class="col-12 add-desc-box pl-2" style="max-width: 100%;padding-left:10px;padding-right: 10px;">
											<div class="items-details">
											    <div class="ribbon-wrapper"><div class="glow-out">
<div class="glow">&nbsp;</div>
</div>
		<div class="ribbon-front">Premium</div>
		<div class="ribbon-edge-topleft"></div>
		<div class="ribbon-edge-topright"></div>
		<div class="ribbon-edge-bottomleft"></div>
		
	</div>
												<div class="row" style="width: 100%;">
													<div class="col-12" style=" padding: 0px;">
														<h5 class="add-title">
															<a href="<?= base_url() ?>ad/<?= $row->id ?>">
																<?= $row->title ?>
															</a>
														</h5>
													</div>
													<div class="col-12">
														<h2 class="item-price pb-0" style=" padding: 0px;display: flex;align-items: center;">
															$<?= $row->price ?> </h2>
													</div>
													<div class="col-12" style="display:none !important; padding: 10px 0px 0px;">
													<span class="item-location">
															<i class="icon-location-2"></i>&nbsp;

														<span>	<?= $row->address ?></span>


														</span></div>
												</div>


												<h5 class="add-title">

												</h5>

												<span class="info-row">
													<span class="date">
														<i class="icon-clock"></i> Sep 27th, 2021 at 10:31
													</span>
													<span class="category">
														<i class="icon-folder-circled"></i>&nbsp;
														<!--<a href="https://learning-ideas.com/nsdoodles/assets/front/category/airedale-terrier" class="info-link">-->
														Airedale Terrier
														<!--</a>-->
													</span>

												</span>

											</div>
										</div>
										<div class="col-4 text-end price-box" style="padding-right:10px;white-space: nowrap;    max-width: 30%;align-items: center;">
                                <div class="row w-100">
                                    
                                    <div class="col-12 m-0 p-0 d-flex justify-content-end">
                                        <a class="btn btn-default btn-sm make-favorite" id="32">
                                            <i class="far fa-heart"></i> <span>Save</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

										
									</div>
								</div>

							<?php } 
						}
						}
						?>
							<?php
							$count = 0;
							foreach ($ads as $row) { ?>
								<div class="item-list p-0 m-3">

									<div class="row aqr">
										<div class="col-sm-2 col-12 no-padding photobox">
											<div class="add-image w-100">
												<span class="photo-count"><i class="fa fa-images"></i> 3 </span>
												<a href="<?= base_url() ?>ad/<?= $row->id ?>">
													<div class="postImg-slick d-flex gap-4">
														<?php if (!empty($row->featured_video)) { ?>
															<div class="videoSlate" style="width:100%; ">
																<video class="thevideo" muted loop  style="width:100%;height:200px;margin: 0px auto;">
																	<source src="<?= base_url() ?>uploads/puppies/<?= $row->featured_video ?>"  type="video/mp4">
																	Your browser does not support the video tag.
																</video>
															</div>
														<?php } ?>

														<?php if (!empty($row->featured_image)) { ?>
														<img src="<?= base_url() ?>uploads/puppies/<?= $row->featured_image ?>" style="max-height: 200px;
    width: 100%;
    object-fit: cover;
    min-height: 200px" class="lazyload thumbnail no-margin" alt="Airedale Terrier for sale" data-nsfw-filter-status="sfw">
														
														
														<?php } ?>
													</div>
												</a>
											</div>
										</div>

											<div class="col-12 add-desc-box pl-2" style="max-width: 100%;padding-left:10px;padding-right: 10px;">
											<div class="items-details">
												<div class="row" style="width: 100%;">
													<div class="col-12" style=" padding: 0px;">
														<h5 class="add-title">
															<a href="<?= base_url() ?>ad/<?= $row->id ?>">
																<?= $row->title ?>
															</a>
														</h5>
													</div>
													<div class="col-12">
														<h2 class="item-price pb-0" style=" padding: 0px;display: flex;align-items: center;">
															$<?= $row->price ?> </h2>
													</div>
													<div class="col-12 " style="display:none !important; padding: 10px 0px 0px;">
													<span class="item-location">
															<i class="icon-location-2"></i>&nbsp;

														<span>	<?= $row->address ?></span>


														</span></div>
												</div>


												<h5 class="add-title">

												</h5>

												<span class="info-row">
													<span class="date">
														<i class="icon-clock"></i> Sep 27th, 2021 at 10:31
													</span>
													<span class="category">
														<i class="icon-folder-circled"></i>&nbsp;
														<!--<a href="https://learning-ideas.com/nsdoodles/assets/front/category/airedale-terrier" class="info-link">-->
														Airedale Terrier
														<!--</a>-->
													</span>

												</span>

											</div>
										</div>
										<div class="col-4 text-end price-box" style="padding-right:10px;white-space: nowrap;    max-width: 30%;align-items: center;">
                                <div class="row w-100">
                                    
                                    <div class="col-12 m-0 p-0 d-flex justify-content-end">
                                        <a class="btn btn-default btn-sm make-favorite" id="32">
                                            <i class="far fa-heart"></i> <span>Save</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

										
									</div>
								</div>

							<?php } ?>




							<div style="clear: both"></div>

							<div class="mb20 text-center">
								<!--<a href="<?= base_url() ?>assets/front/search" class="btn btn-default mt10">-->
								<!--	<i class="fa fa-arrow-circle-right"></i> View more-->
								<!--</a>-->

								<a href="" class="btn btn-default mt10">
									<i class="fa fa-arrow-circle-right"></i> View more
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>



	<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
	<div class="container">
		<div class="page-info page-info-lite rounded">
			<div class="text-center section-promo">
				<div class="row">

					<div class="col-sm-12 col-12">
						<div class="iconbox-wrap">
							<div class="iconbox">
							
								<div class="iconbox-wrap-content">
				
									<div class="iconbox-wrap-text">Puppy Verify, LLC only provides advertising - we do not raise or sell puppies. Website Logo, Web Layout, and all pictures and text are copyright 2021 by Puppy Verify, LLC with all rights reserved. All information is believed to be accurate but is not guaranteed by Puppy Verify ®. Please verify all information with the seller. <br><br>We provide advertising for dog breeders, puppy sellers, and other pet lovers offering dogs and puppies for sale. We also advertise stud dog services and other puppy for sale related items products and food.</div>
								</div>
							</div>
						</div>
					</div>

					

				</div>
			</div>
		</div>
	</div>

</div>



<script src="https://maps.google.com/maps/api/js?key=AIzaSyCXzuM95auojpcl1ea54z9CNR9v1K97fTQ&libraries=places" type="text/javascript"></script>

<script>
     $(document).ready(function () {
        $(function(){
          var autocomplete;
          var geocoder;
          var input = document.getElementById('get_location_address');
          var options = {
            types: ['((regions))'],
          };

          autocomplete = new google.maps.places.Autocomplete(input);
          
        });
    });
    $(document).ready(function () {
        var count  = 1;
        $('.mycol'+count+'').removeClass('d-none');
        $('.morebreeds').click(function (e) { 
            e.preventDefault();
            count - count +1;
            $('.mycol'+count+'').removeClass('d-none');
        });
    });
</script>