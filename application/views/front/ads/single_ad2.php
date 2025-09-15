<link rel="stylesheet" href="<?php echo base_url('assets/')?>css/lightgallery.css" />
<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<style>

.fancybox-image-wrap img {
    width: 600px;
    max-width: 90%;
    margin: 20px auto !important;
    position: unset;
    height: auto;
}

.fancybox-image-wrap {
    width: 100vw !important;
    height: 100vh !important;
    transform: unset !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center;
}

.sticky_div{
	position: sticky;
    top: 15px;
}


	.spdiv {
		height: 300px;
		display: flex;
		align-content: center;
	}

	.spinner {
		 --color: rgb(0 0 255);
        --fade-color: rgba(0 0 255 / 50%);
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
		0% {s
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
	.rating {
		display: inline-block;
		position: relative;
		height: 50px;
		line-height: 50px;
		font-size: 50px;
	}

	.rating label {
		position: absolute;
		top: 0;
		left: 0;
		height: 100%;
		cursor: pointer;
	}

	.rating label:last-child {
		position: static;
	}

	.rating label:nth-child(1) {
		z-index: 5;
	}

	.rating label:nth-child(2) {
		z-index: 4;
	}

	.rating label:nth-child(3) {
		z-index: 3;
	}

	.rating label:nth-child(4) {
		z-index: 2;
	}

	.rating label:nth-child(5) {
		z-index: 1;
	}

	.rating label input {
		position: absolute;
		top: 0;
		left: 0;
		opacity: 0;
	}

	.rating label .icon {
		float: left;
		color: transparent;
	}

	.rating label:last-child .icon {
		color: #D8D8D8;
	}

	.rating:not(:hover) label input:checked~.icon,
	.rating:hover label:hover input~.icon {
		color: #f1c40f;
	}

	.rating label input:focus:not(:checked)~.icon:last-child {
		color: #D8D8D8;
		text-shadow: 0 0 5px #f1c40f;
	}
	
	/*Carousel Gallery*/
	.carousel-gallery {
		margin: 10px 0;
    padding: 0px;
	}

	.carousel-gallery .swiper-slide a {
		display: block;
		width: 100%;
		height: 200px;
		border-radius: 4px;
		overflow: hidden;
		position: relative;
		-webkit-box-shadow: 3px 2px 20px 0px rgba(0, 0, 0, 0.2);
		-moz-box-shadow: 3px 2px 20px 0px rgba(0, 0, 0, 0.2);
		box-shadow: 3px 2px 20px 0px rgba(0, 0, 0, 0.2);
	}

	.carousel-gallery .swiper-slide a:hover .image .overlay {
		opacity: 1;
	}

	.carousel-gallery .swiper-slide a .image {
		width: 100%;
		height: 100%;
		background-size: cover;
		background-position: center center;
	}

	.carousel-gallery .swiper-slide a .image .overlay {
		width: 100%;
		height: 100%;
		background-color: rgba(20, 20, 20, 0.8);
		text-align: center;
		opacity: 0;
		-webkit-transition: all 0.2s linear;
		-o-transition: all 0.2s linear;
		transition: all 0.2s linear;
	}

	.carousel-gallery .swiper-slide a .image .overlay em {
		color: #fff;
		font-size: 26px;
		position: relative;
		top: 50%;
		-webkit-transform: translateY(-50%);
		-ms-transform: translateY(-50%);
		-o-transform: translateY(-50%);
		transform: translateY(-50%);
		display: inline-block;
	}

	.carousel-gallery .swiper-pagination {
		position: relative;
		bottom: auto;
		text-align: center;
		margin-top: 25px;
	}

	.carousel-gallery .swiper-pagination .swiper-pagination-bullet {
		-webkit-transition: all 0.2s linear;
		-o-transition: all 0.2s linear;
		transition: all 0.2s linear;
	}

	.carousel-gallery .swiper-pagination .swiper-pagination-bullet:hover {
		opacity: 0.7;
	}

	.carousel-gallery .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active {
		background-color: #d63031;
		transform: scale(1.1, 1.1);
	}

	/*# Carousel Gallery*/
	.plugins {
		text-align: center;
	}

	.plugins h3 {
		text-align: center;
		margin: 0;
		padding: 0;
		font-family: Arial;
		text-transform: uppercase;
		color: #111;
	}

	.plugins a {
		display: inline-block;
		font-family: Arial;
		color: #777;
		font-size: 14px;
		margin: 10px;
		transition: all 0.2s linear;
	}

	.plugins a:hover {
		color: #d63031;
	}
	.breeder-button{
	    position:absolute;
	    right:0;
	    margin:2%;
	}
	#breeder_info{
	    margin:2%;
	}
</style>


<style>
	.btn-grey {
		background-color: #D8D8D8;
		color: #FFF;
	}

	.rating-block {
		background-color: #FAFAFA;
		border: 1px solid #EFEFEF;
		padding: 15px 15px 20px 15px;
		border-radius: 3px;
	}

	.bold {
		font-weight: 700;
	}

	.padding-bottom-7 {
		padding-bottom: 7px;
	}

	.review-block {
		background-color: #FAFAFA;
		border: 1px solid #EFEFEF;
		padding: 15px;
		border-radius: 3px;
		margin-bottom: 15px;
	}

	.review-block-name {
		font-size: 12px;
		margin: 10px 0;
	}

	.review-block-date {
		font-size: 12px;
	}

	.review-block-rate {
		font-size: 13px;
		margin-bottom: 15px;
	}

	.review-block-title {
		font-size: 15px;
		font-weight: 700;
		margin-bottom: 10px;
	}

	.review-block-description {
		font-size: 13px;


	}

	.review-block-rate_btn {
		font-size: 10px !important;
		padding: 5px;
	}
	
	
.swiper {
        width: 100%;
        height: 100%;
      }

      .swiper-slide {
        text-align: center;
        font-size: 18px;
       

        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }

  

      .swiper {
        width: 100%;
        height: 300px;
        margin-left: auto;
        margin-right: auto;
      }

      .swiper-slide {
        background-size: cover;
        background-position: center;
      }

      .mySwiper2 {
        height: 80%;
        width: 100%;
      }

      .mySwiper {
        height: 20%;
        box-sizing: border-box;
        padding: 10px 0;
      }

      .mySwiper .swiper-slide {
        width: 25%;
        height: 100%;
        opacity: 0.4;
      }

      .mySwiper .swiper-slide-thumb-active {
        opacity: 1;
      }

      .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    
</style>

 <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
 <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
<script>
	$(function() {
	     var swiper2 = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });

		var swiper = new Swiper('.carousel-gallery .swiper-container', {
			effect: 'slide',
			speed: 900,
			slidesPerView: 1,
			spaceBetween: 20,
			simulateTouch: true,
			autoplay: {
				delay: 5000,
				stopOnLastSlide: false,
				disableOnInteraction: true
			},
			navigation: {
                  nextEl: ".swiper-button-next",
                  prevEl: ".swiper-button-prev",
                },
                thumbs: {
                  swiper: swiper2,
                },
// 			pagination: {
// 				el: '.carousel-gallery .swiper-pagination',
// 				clickable: true
// 			},
			breakpoints: {
				// when window width is <= 320px
				320: {
					slidesPerView: 1,
					spaceBetween: 5
				},
				// when window width is <= 480px
				425: {
					slidesPerView: 1,
					spaceBetween: 10
				},
				// when window width is <= 640px
				768: {
					slidesPerView: 1,
					spaceBetween: 20
				}
			}
		}); /*http://idangero.us/swiper/api/*/



	});
</script>
<style>
    .pricetag{
        top:0px !important;
            height: 64px;
    display: flex;
    align-items: center;
    }
</style>
<div class="main-container">


	<div class="container mt-2">
		<div class="row">
		    <div id="response">
		    <?php if ($this->session->flashdata('msg')) { ?>
                                                <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>
            </div>
			<div class="col-md-12">

				<nav aria-label="breadcrumb" role="navigation" class="float-start">
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="http://nosheddoodles.learning-ideas.com"><i class="icon-home fa"></i></a></li>
						<li class="breadcrumb-item"><a href="http://nosheddoodles.learning-ideas.com">United States</a></li>
						<li class="breadcrumb-item">
							<a href="http://nosheddoodles.learning-ideas.com/category/MiniatureDachshund">
								Miniature Dachshund
							</a>
						</li>
						<li class="breadcrumb-item">
							<a href="http://nosheddoodles.learning-ideas.com/category/MiniatureDachshund/cars">
								Cars
							</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Listing Orders</li>
					</ol> -->
				</nav>

				<div class="float-end backtolist">
					<a href="#"><i class="fa fa-angle-double-left"></i> Back to Results</a>
				</div>

			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-6 page-content col-thin-right">
				<div class="inner inner-box items-details-wrapper pb-0 sticky_div">
				    <div class="pricetag" style="background:#3457D5">
							$<?= $result->asking_price ?>
						</div>
					<h1 class="h4 fw-bold enable-long-words w-75">
						<strong>
							<a href="#" title="Title">
							Adopt 	<?= $result->title ?>
							</a>
						</strong>
					</h1>
					<span class="info-row">
						<span class="date">
							<i class="icon-clock"></i> <?= date('m-d-Y H:i:s',strtotime($result->created_at)) ?>
						</span>&nbsp;
						<span class="category">
							<i class="icon-folder-circled"></i> Puppies
						</span>&nbsp;
						<span class="item-location">
							<i class="fas fa-map-marker-alt"></i> <?= $result->address ?>
						</span>&nbsp;
						<span class="category">
							<i class="icon-eye-3"></i> <?= $result->view_count ?> views
						</span>
					</span>






					<div class="item-slider posts-image">
						
						<!--Carousel Gallery-->
						<div class="carousel-gallery">
							<div class="swiper-container">
								<div class="swiper-wrapper">
									<?php if (!empty($result->featured_video)) { ?>
										<div class="swiper-slide">

											<video class="thevideo" muted loop controls controlsList="nodownload" style="width:100%;max-height:400px;background-color:#000">
												<source src="<?php if($result->featured_video_from=='puppyverify.com'){echo PV; }else{ echo NS; }  ?>uploads/puppies/<?= $result->featured_video ?>" type="video/mp4">
												Your browser does not support the video format.
											</video>
										 <!--<img src="<?=base_url()?>assets/watermark.png" style="position:absolute; right:10px; top:10px; opacity:0.5; width:70px">-->

										</div>
									<?php } ?>
									<?php if (!empty($result->featured_image)) { ?>
								
                                                											<div class="swiper-slide">
                                                											<a href="<?php if($result->featured_image_from=='puppyverify.com'){echo PV; }else{ echo NS; }  ?>uploads/puppies/<?= $result->featured_image ?>" data-fancybox="gallery" style="height: auto;">
												<img src="<?php if($result->featured_image_from=='puppyverify.com'){echo PV; }else{ echo NS; }  ?>uploads/puppies/<?= $result->featured_image ?>" style="width: 100%;
                                                    max-height: 400px;
                                                    object-fit: contain;" class="img-fluid">
                                                											</a>
                                                										</div>
                                                										
                                                		<?php } ?>						
                                                
                                                									<?php if(!empty($pictures)){
                                                										foreach($pictures as $pic){
                                                									 ?>
                                                								
                                                	<div class="swiper-slide">
                                                											<a href="<?php if($pic->uploaded_from=='puppyverify.com'){echo PV; }else{ echo NS; }  ?>uploads/puppies/<?= $pic->picture ?>" data-fancybox="gallery" style="height: auto;">
                                                												<img src="<?php if($pic->uploaded_from=='puppyverify.com'){echo PV; }else{ echo NS; }  ?>uploads/puppies/<?= $pic->picture ?>" style="width: 100%;
                                                    max-height: 400px;
                                                    object-fit: contain;" class="img-fluid">
											</a>
										
										</div>
										
									 <?php } } ?>

									 <?php if(!empty($videos)){
										foreach($videos as $vid){
									 ?>
                                        <div class="swiper-slide">
                                        
                                        <video class="thevideo" muted loop controls controlsList="nodownload" style="width:100%;max-height:400px;background-color:#000">
                                        	<source src="<?php  if($vid->uploaded_from=='puppyverify.com'){echo PV; }else{ echo NS; }  ?>uploads/puppies/<?= $vid->video ?>" type="video/mp4">
                                        	Your browser does not support the video format.
                                        </video>
                                        <img src="<?=base_url()?>assets/watermark.png" style="position:absolute; right:10px; top:10px; opacity:0.5;height: auto; width:70px">
                                        
                                        </div>
									 <?php } } ?>
									 
									  <?php if(!empty($result->youtube)){ ?>
									 
									 <div class="swiper-slide">
									     
									     <?php 
									       $domain = parse_url($result->youtube, PHP_URL_HOST);
									      // echo $domain;
									       if($domain=='youtu.be')
									       {
									           $link = $result->youtube;
                                                $link_array = explode('/',$link);
                                                 $page = end($link_array);
									     ?>
									     
									     
									     <iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$page?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        
                                        <?php } else{?>
                                        <?php echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$result->youtube); ?>
                                       <?php } ?>
                                        
                                        </div>
									 
									 <?php } ?>


								</div>
								<div class="swiper-button-next"></div>
                                  <div class="swiper-button-prev"></div>
							</div>
							
								 <div thumbsSlider="" class="swiper mySwiper pt-3">
    	      <div class="swiper-wrapper">
    	<?php if (!empty($result->featured_video)) { ?>
										<div class="swiper-slide">

											<img src="<?= base_url() ?>assets/video-icon.png" class="img-fluid">

										</div>
									<?php } ?>
									<?php if (!empty($result->featured_image)) { ?>
								
										<div class="swiper-slide">
										
												<img src="<?php if($result->featured_image_from=='puppyverify.com'){echo PV; }else{ echo NS; }  ?>uploads/puppies/<?= $result->featured_image ?>" style="width: 100%;
                                                    max-height: 400px;
                                                    object-fit: contain;" class="img-fluid">
                                                										
                                                										</div>
                                                									
                                                <?php } ?>
                                                									<?php if(!empty($pictures)){
                                                										foreach($pictures as $pic){
                                                									 ?>
                                                								
                                                	<div class="swiper-slide">
                                                										
                                                											<img src="<?php if($pic->uploaded_from=='puppyverify.com'){echo PV; }else{ echo NS; }  ?>uploads/puppies/<?= $pic->picture ?>" style="width: 100%;
                                                    max-height: 400px;
                                                    object-fit: contain;" class="img-fluid">
											
										</div>
										
									 <?php } } ?>

									 <?php if(!empty($videos)){
										foreach($videos as $vid){
									 ?>
                                        <div class="swiper-slide">
                                        
                                       	<img src="<?= base_url() ?>assets/video-icon.png" class="img-fluid">
                                        
                                        </div>
									 <?php } } ?>
									 
									 <?php if(!empty($result->youtube)){ ?>
									 
									 <div class="swiper-slide">
									     
										<img src="https://img.youtube.com/vi/<?=$page?>/default.jpg" class="img-fluid">
                                        
                                        </div>
									 
									 <?php } ?>
        
      
      </div>
							</div>
							
						</div>
						<!--#Carousel Gallery-->




					</div>




				</div>
				<!--/.items-details-wrapper-->
			</div>
			<!--/.page-content-->

			<div class="col-lg-6 page-sidebar-right">
				

			<div class="items-details">
						<ul class="nav nav-tabs" id="itemsDetailsTabs" role="tablist">
							<li class="nav-item" role="presentation">
								<button class="nav-link active" id="item-details-tab" data-bs-toggle="tab" data-bs-target="#item-details" role="tab" aria-controls="item-details" aria-selected="true">
									<h4>Ad Details</h4>
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" role="tab" aria-controls="description" aria-selected="true">
									<h4>Description</h4>
								</button>
							</li>
							<li class="nav-item" role="presentation">
								<button class="nav-link" id="family-tab" data-bs-toggle="tab" data-bs-target="#family" role="tab" aria-controls="family" aria-selected="true">
									<h4>Family Details</h4>
								</button>
							</li>
						</ul>


						<div class="tab-content p-3 mb-3" id="itemsDetailsTabsContent">
							<div class="tab-pane show active" id="item-details" role="tabpanel" aria-labelledby="item-details-tab">
								<div class="row pb-3">
									<div class="items-details-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">

										<div class="row">

											<div class="col-md-6 col-sm-6 col-6">
												<h4 class="fw-normal p-0" style="color:grey;">
													<span class="fw-bold"><i class="fas fa-map-marker-alt"></i> Location </span><br>
													
											    </h4>
												<span>
														<a href="#"><p>
															<?= $result->address ?>
														</p></a>
													</span>
												
											</div>


											<div class="col-md-6 col-sm-6 col-6 text-end">
												<h4 class="fw-normal p-0">
													<span class="fw-bold" style="color:grey;">
														Price
													</span><br>
													<span>
														$ <?= $result->asking_price ?>
													</span>
												</h4>
											</div>
										</div>
										<hr class="border-0 bg-secondary">


										<div class="row">
											<div class="col-12 detail-line-content">
												<p><?= $result->description ?></p>
											</div>
										</div>


										<div class="row gx-1 gy-1 mt-3">
											<div class="col-12">
												<div class="row mb-3">
													<div class="col-12">
														<h4 class="p-0"><i class="icon-th-list"></i> Additional Details</h4>
													</div>
												</div>
											</div>

											<div class="col-12">
												<div class="row gx-1 gy-1">
													<div class="col-sm-6 col-12">
														<div class="row bg-light rounded py-2 mx-0">
															<div class="col-6 fw-bolder">Breed</div>
															<div class="col-6 text-sm-end text-start"><?= $result->breed_name ?></div>
														</div>
													</div>
													<div class="col-sm-6 col-12">
														<div class="row bg-light rounded py-2 mx-0">
															<div class="col-6 fw-bolder">Gender</div>
															<div class="col-6 text-sm-end text-start"><?= $result->puppy_sex ?></div>
														</div>
													</div>
													<div class="col-sm-6 col-12">
														<div class="row bg-light rounded py-2 mx-0">
															<div class="col-6 fw-bolder">Size</div>
															<div class="col-6 text-sm-end text-start"><?= $result->puppy_size ?></div>
														</div>
													</div>
													<div class="col-sm-6 col-12">
														<div class="row bg-light rounded py-2 mx-0">
															<div class="col-6 fw-bolder">Birth Date</div>
															<div class="col-6 text-sm-end text-start"><?= date('m-d-Y',strtotime($result->puppy_dob))?></div>
														</div>
													</div>
														<div class="col-sm-6 col-12">
														<div class="row bg-light rounded py-2 mx-0">
															<div class="col-6 fw-bolder">Available Date</div>
															<div class="col-6 text-sm-end text-start"><?= date('m-d-Y',strtotime($result->available_date))?></div>
														</div>
													</div>


													<!-- <div class="col-12">
														<div class="row bg-light rounded py-2 mx-0">
															<div class="col-12 mb-2 fw-bolder">Features:</div>
															<div class="row">
																<div class="col-sm-4 col-6 py-2">
																	<i class="fa fa-check"></i> Air Conditioner
																</div>
																<div class="col-sm-4 col-6 py-2">
																	<i class="fa fa-check"></i> GPS
																</div>
																<div class="col-sm-4 col-6 py-2">
																	<i class="fa fa-check"></i> Spare Tire
																</div>
															</div>
														</div>
													</div> -->
												</div>
											</div>
										</div>


										<!-- <div class="row mt-3">
											<div class="col-12">
												<h4 class="p-0 my-3"><i class="icon-tag"></i> Tags:</h4>
												<span class="d-inline-block border border-inverse bg-light rounded-1 py-1 px-2 my-1 me-1">
													<a href="#">
														test
													</a>
												</span>
											</div>
										</div> -->


										<!-- <div class="row text-center h2 mt-4">
											<div class="col-4">
												<a href="#contactUser" data-bs-toggle="modal"><i class="icon-mail-2" data-bs-toggle="tooltip" title="" data-bs-original-title="Send a message" aria-label="Send a message"></i></a>
											</div>
											<div class="col-4">
												<a class="make-favorite" id="4" href="javascript:void(0)">
													<i class="far fa-heart" data-bs-toggle="tooltip" title="" data-bs-original-title="Save ad" aria-label="Save ad"></i>
												</a>
											</div>
											<div class="col-4">
												<a href="#">
													<i class="fa icon-info-circled-alt" data-bs-toggle="tooltip" title="" data-bs-original-title="Report abuse" aria-label="Report abuse"></i>
												</a>
											</div>
										</div> -->
									</div>

								</div>
							</div>
							<div class="tab-pane" id="description" role="tabpanel" aria-labelledby="description-tab">
								<div class="row pb-3">
									<div class="description-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">
										<div class="row">
											<div class="col-12 detail-line-content">
												<p><?= $result->description ?></p>
											</div>
										</div>
								</div>
							</div>

						</div>
						<div class="tab-pane" id="family" role="tabpanel" aria-labelledby="family-tab">
								<div class="row pb-3">
									<div class="family-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">
										<div class="row">
											<div class="col-12 detail-line-content">

												<?php
													if(!empty($result->mother_photo))
													{
												?>
											    <span><h4>Mother:</h4></span>

<div class="item-slider posts-image">
											    <div class="carousel-gallery">
							<div class="swiper-container">
								<div class="swiper-wrapper">
									<div class="swiper-slide">
											    	<!-- <div id="light-gallery-mother"> -->
												<a href="<?= base_url() ?>uploads/puppies/<?= $result->mother_photo ?>" 
data-fancybox="gallery" style="height: auto;">
												<img height="200px;" width="200px" src="<?= base_url() ?>uploads/puppies/<?= $result->mother_photo ?>" class="img-fluid">
											    </a>
											    <!-- </div> -->
											</div>
										</div>
									</div>
								</div>
												
												<?php
													}
													else
													{
														?>
														<span><h4>Mother:</h4></span>
														<img height="200px;" width="200px" src="<?= base_url() ?>assets/noimage.jpg" class="img-fluid">
													
														<?php
													}
												?>
												<?php
													if(!empty($result->father_photo))
													{
												?>
												<span><h4>Father:</h4></span>
												<!-- <div id="light-gallery-father"> -->

<div class="item-slider posts-image">
													<div class="carousel-gallery">
							<div class="swiper-container">
								<div class="swiper-wrapper">
												<a href="<?= base_url() ?>uploads/puppies/<?= $result->father_photo ?>" data-fancybox="gallery" style="height: auto;">
												<img height="200px;" width="200px" src="<?= base_url() ?>uploads/puppies/<?= $result->father_photo ?>" class="img-fluid" 
>
												</a>
												<!-- </div> -->
											</div>
										</div>
									</div>
								</div>
												
												<?php
													}
													else
													{
														?>
															<span><h4>Father:</h4></span>
													
														<img height="200px;" width="200px" src="<?= base_url() ?>assets/noimage.jpg" class="img-fluid">
													
													
														<?php
													}
												?>
											</div>
										</div>
								</div>
							</div>

						</div>

						</div>
						<!-- /.tab content -->

						<!-- <div class="content-footer text-start">

							<a href="#contactUser" class="btn btn-default" data-bs-toggle="modal"><i class="far fa-envelope-open"></i> Send a message</a>
						</div> -->
					</div>
				<aside>
					<div class="card card-user-info sidebar-card">
						<div class="block-cell user">
							<div class="cell-media">
								<img src="<?= base_url() ?>assets/dogbreeder.jpg" alt="Admin">
							</div>
							
							<div class="cell-content">
								<h5 class="title">Seller Info : </h5>
								<span class="name">
									<a href="#">
										<?= $contact_person->full_name ?>
									</a>
								</span>

								<!--<span class="name">-->
								<!--	<a href="#">-->
								<!--		<?= $contact_person->phone ?>-->
								<!--	</a>-->
								<!--</span>-->

							</div>
							
							<div class="cell-content breeder-button">
							    <button style="background:#3457D5" class="btn btn-primary header" id="breederinfo_button" data-toggle="collapse" data-target="#toggle-example">
                                    View Seller Info
                                  </button>

							</div>
							
                            						
						</div>
						
						<div id="breeder_info" class="collapse in">
						    <div class="row"
						     <span class="name col-md-6 col-sm-6 col-6">
									<h5>
									<b>Breeder ID: </b>	<?= $result->user_id ?>
									</h5>
								</span>
                                <span class="name col-md-6 col-sm-6 col-6">
									<h5>
									<b>Name: </b>	<?= $contact_person->full_name ?>
									</h5>
								</span>

								<span class="name col-md-6 col-sm-6 col-6">
									<h5>
									<b>Phone No: </b>	<a href="tel:<?= $contact_person->phone ?>"><?= $contact_person->phone ?></a>
									</h5>
								</span>
								<span class="name col-md-6 col-sm-6 col-6">
									<h5 style="color:grey;">
									<b><i class="fas fa-map-marker-alt"></i> <?= $result->address?></b>
									</h5>
								</span>
								<span class="name col-md-6 col-sm-6 col-6">
									<h5>
									<b>Email: </b><a href="mailto:<?= $contact_person->email ?>">	<?= $contact_person->email ?></a>
									</h5>
								</span>
									<span class="name col-md-6 col-sm-6 col-6">
									<h5>
							    	<b>Website: </b>
									<?php if($contact_person->website_url){?>
										<a href="http://<?= $contact_person->website_url ?>" target="_blank">	<?= $contact_person->website_url ?></a>
									<?} else
									{ ?>
										<a href="http://<?= $seller->site_url ?>" target="_blank">	<?= $seller->site_url ?></a>
									<?php }?>
									</h5>
								</span>
									<span class="name col-md-6 col-sm-6 col-6">
									<h5>
									<b>Youtube Link: </b>
									<a href="<?= $seller->youtube_url ?>">	<?= $seller->youtube_url ?></a>
									</h5>
								</span>
								
									<span class="name col-md-12 col-sm-12 col-12">
									<h5>
									<b>Description: </b>	<?= $seller->description ?>
									</h5>
								</span>
								
                                  
                            </div>
						  </div>
						<div class="card-content">
							<div class="card-body text-start">
								<!-- <div class="grid-col">
									<div class="col from">
										<i class="fas fa-map-marker-alt"></i>
										<span>Location</span>
									</div>
									<div class="col to">
										<span>
											<a href="#">
												<?= $result->address ?>
											</a>
										</span>
										
									</div>
								</div> -->
								<!-- <div class="grid-col">
									<div class="col from">
										<i class="fas fa-user"></i>
										<span>Joined</span>
									</div>
									<div class="col to">
										<span>Sep 20th, 2021 at 05:44</span>
									</div>
								</div> -->
							</div>

							<div class="ev-action" style="border-top: 1px solid #ddd;">

								<a href="#contactUser" class="btn btn-default btn-block" data-bs-toggle="modal"><i class="far fa-envelope-open"></i> Send a message</a>
							</div>
						</div>
					</div>


					<!--<div class="text-center mt-4 mb-4 ms-0 me-0">-->
					<!--	<button class="btn btn-fb share s_facebook" href="#"><i class="icon-facebook"></i> </button>&nbsp;-->
					<!--	<button class="btn btn-tw share s_twitter" href="#"><i class="icon-twitter"></i> </button>&nbsp;-->
					<!--	<button class="btn btn-success share s_whatsapp" href="#"><i class="fab fa-whatsapp"></i> </button>&nbsp;-->
					<!--	<button class="btn btn-lin share s_linkedin" href="#"><i class="icon-linkedin"></i> </button>-->
					<!--</div>-->
					<!--<div class="card sidebar-card">-->
					<!--	<div class="card-header">Safety Tips for Buyers</div>-->
					<!--	<div class="card-content">-->
					<!--		<div class="card-body text-start">-->
					<!--			<ul class="list-check">-->
					<!--				<li>  </li>-->
					<!--				<li> </li>-->
					<!--				<li> </li>-->
					<!--			</ul>-->
					<!--		</div>-->
					<!--	</div>-->
					<!--</div>-->
					
				<?php  if( $total>0)
       {?>	
					
					<div class="card sidebar-card">
						<div class="card-header">Review Breeder
							<a href="#write-review"><span style="float: right;">Write Review</span></a>
						</div>
						<div class="card-content">
							<div class="card-body text-start">


								<div class="row">
									<div class="col-sm-6">
										<div class="rating-block">
											<h4>Average user rating</h4>
											<h2 class="bold padding-bottom-7"><?= number_format((float)$avg_rating, 1, '.', ''); ?> <small>/ 5</small></h2>
											<button type="button" class="btn <?php if ($avg_rating >= 1) {
																					echo 'btn-warning btn-sm';
																				} else {
																					echo 'btn-default btn-grey btn-sm';
																				} ?> " aria-label="Left Align">
												<i class="fas fa-star"></i>
											</button>
											<button type="button" class="btn <?php if ($avg_rating >= 2) {
																					echo 'btn-warning btn-sm';
																				} else {
																					echo 'btn-default btn-grey btn-sm';
																				} ?>" aria-label="Left Align">
												<i class="fas fa-star"></i>
											</button>
											<button type="button" class="btn <?php if ($avg_rating >= 3) {
																					echo 'btn-warning btn-sm';
																				} else {
																					echo 'btn-default btn-grey btn-sm';
																				} ?>" aria-label="Left Align">
												<i class="fas fa-star"></i>
											</button>
											<button type="button" class="btn <?php if ($avg_rating >= 4) {
																					echo 'btn-warning btn-sm';
																				} else {
																					echo 'btn-default btn-grey btn-sm';
																				} ?>" aria-label="Left Align">
												<i class="fas fa-star"></i>
											</button>
											<button type="button" class="btn <?php if ($avg_rating == 5) {
																					echo 'btn-warning btn-sm';
																				} else {
																					echo 'btn-default btn-grey btn-sm';
																				} ?>" aria-label="Left Align">
												<i class="fas fa-star"></i>
											</button>
										</div>
									</div>
									<div class="col-sm-6">
										<h4>Rating breakdown</h4>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star5 * 100) / $total; ?>% ; background: green;">
														<span class="sr-only">80% Complete (danger)</span>
													</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?= $star5 ?></div>
										</div>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
													<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star4 * 100) / $total; ?>%;    background-color: #428bca;">
														<span class="sr-only">80% Complete (danger)</span>
													</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?= $star4 ?></div>
										</div>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
													<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star3 * 100) / $total; ?>%;    background-color: #5bc0de;">
														<span class="sr-only">80% Complete (danger)</span>
													</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?= $star3 ?></div>
										</div>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
													<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star2 * 100) / $total; ?>%;background-color: #f0ad4e;">
														<span class="sr-only">80% Complete (danger)</span>
													</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?= $star2 ?></div>
										</div>
										<div class="pull-left">
											<div class="pull-left" style="width:35px; line-height:1;">
												<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
											</div>
											<div class="pull-left" style="width:180px;">
												<div class="progress" style="height:9px; margin:8px 0;">
													<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star1 * 100) / $total; ?>%;    background-color: #d9534f;">
														<span class="sr-only">80% Complete (danger)</span>
													</div>
												</div>
											</div>
											<div class="pull-right" style="margin-left:10px;"><?= $star1 ?></div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-12">
										<hr />
										<div class="review-block" id="review-block">



										</div>
										<div class="text-center">
											<div id="pageno"></div>
										</div>
									</div>
								</div>


							</div>
						</div>
					</div>
					
					
					<?php } ?>
					
					
					<div class="card sidebar-card" id="write-review">
						<div class="card-header">Write your review</div>
						<div class="card-content">
							<div class="card-body text-start">
								<form method="post" action="<?= base_url() ?>Ads/save_review/<?= $result->post_id ?>">

									<?php echo $this->customlib->getCSRF(); ?>
									<div class="row mb-3 required">
										<label class="col-md-3 col-form-label">Rating <sup>*</sup></label>
										<div class="col-md-8">
											<div class="rating">
												<label>
													<input type="radio" name="stars" value="1" />
													<span class="icon">★</span>
												</label>
												<label>
													<input type="radio" name="stars" value="2" />
													<span class="icon">★</span>
													<span class="icon">★</span>
												</label>
												<label>
													<input type="radio" name="stars" value="3" />
													<span class="icon">★</span>
													<span class="icon">★</span>
													<span class="icon">★</span>
												</label>
												<label>
													<input type="radio" name="stars" value="4" />
													<span class="icon">★</span>
													<span class="icon">★</span>
													<span class="icon">★</span>
													<span class="icon">★</span>
												</label>
												<label>
													<input type="radio" name="stars" value="5" />
													<span class="icon">★</span>
													<span class="icon">★</span>
													<span class="icon">★</span>
													<span class="icon">★</span>
													<span class="icon">★</span>
												</label>
											</div>
										</div>
									</div>

									<div class="row mb-3 required">
										<label class="col-md-3 col-form-label">Full Name <sup>*</sup></label>
										<div class="col-md-8">
											<input name="name" placeholder="Full Name" class="form-control input-md" type="text" value="" required="">
										</div>
										<input type="hidden" name="id" value="<?= $result->user_id ?>">
									</div>
									<div class="row mb-3 required">
										<label class="col-md-3 col-form-label">Email <sup>*</sup></label>
										<div class="col-md-8">
											<input name="email" placeholder="Email" class="form-control input-md" type="text" value="" required="">
										</div>
									</div>

									<div class="row mb-3 required">
										<label class="col-md-3 col-form-label">Description <sup>*</sup></label>
										<div class="col-md-8">
											<textarea class="form-control" name="message" placeholder="Description" rows="5"></textarea>
										</div>
									</div>

									<div class="text-center">
										<button class="btn btn-primary">Submit</button>
									</div>

								</form>
							</div>
						</div>
					</div>
					
				</aside>



			</div>
		</div>

	</div>




</div>


<div class="modal fade" id="contactUser" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title">
					<i class="icon-mail-2"></i> Contact Advertiser
				</h4>

				<button type="button" class="close" data-bs-dismiss="modal">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>

			<form role="form" method="POST" action="<?=base_url()?>ad/addenquiry">
<?php echo $this->customlib->getCSRF(); ?>
				<div class="modal-body">



					<div class="mb-3 required">
						<label for="from_name" class="control-label">Name <sup>*</sup></label>
						<div class="input-group">
							<input name="from_name" type="text" class="form-control" placeholder="Your name" >
						</div>
					</div>


					<div class="mb-3 required">
						<label for="from_email" class="control-label">E-mail
						</label>
						<div class="input-group">
							<span class="input-group-text"><i class="icon-mail"></i></span>
							<input id="from_email" name="from_email" type="text" class="form-control" placeholder="Enter your Email Id" >
						</div>
					</div>


					<div class="mb-3 required">
						<label for="phone" class="control-label">Phone Number
						</label>
						<div class="input-group">
							<span id="phoneCountry" class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
							<input id="from_phone" name="from_phone" type="text" maxlength="60" class="form-control" placeholder="Phone Number" >
						</div>
					</div>


					<div class="mb-3 required">
						<label for="body" class="control-label">
							Message <span class="text-count">(500 max)</span> <sup>*</sup>
						</label>
						<textarea id="body" name="body" rows="5" class="form-control required" style="height: 150px;" placeholder="Your message here..."></textarea>
					</div>


					<input type="hidden" name="breeder_name" value="<?= $contact_person->full_name?>">
					<input  name="breeder_email" type="hidden" value="<?= $contact_person->email?>">
					<input  name="breeder_id" type="hidden" value="<?= $result->user_id ?>">
					<input  name="contact_id" type="hidden" value="<?= $contact_person->id?>">
					<input type="hidden" name="country_code" value="US">
					<input type="hidden" name="post_id" id="post_id" value="<?= $result->id?>">
					<input type="hidden" name="messageForm" value="1">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-success float-end">Send message</button>
				</div>
			</form>

		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/')?>js/lightgallery.js"></script> 
<script>
    $(document).ready(function(){
      
      $("#response").fadeOut(1000);
   
    $.post('<?=base_url("ads/setviewcount")?>',
    {
        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
        id : $('#post_id').val()
    },
    function(data){
        console.log(data);
    });
});
</script>
<script>
    $("#breederinfo_button").click(function(){
      $("#breeder_info").collapse('toggle'); // toggle collapse
    });
</script>




<?php if ($this->session->flashdata('msg')) {
	if ($this->session->flashdata('msg') == 'success') { ?>


		<script>
			$(document).ready(function() {
				swal("Your review has been submitted!", " Thank you for your time.", "success");
			});
		</script>
	<?php } else if ($this->session->flashdata('msg') == 'validation_error') { ?>


		<script>
			$(document).ready(function() {
				swal("Error!", "Fill all the required fields", "error");
			});
		</script>
<?php }
} ?>


<?php if ($this->session->flashdata('msg')) {
	if ($this->session->flashdata('msg') == 'enquiry_success') { ?>


		<script>
			$(document).ready(function() {
				swal("Your enquiry has been submitted!", "Thank you for your time.!", "success");
			});
		</script>
	<?php } else if('enquiry_error'=='enquiry_error') { ?>


		<script>
			$(document).ready(function() {
				swal("Error!", "Fill all the required fields", "error");
			});
		</script>
<?php }
} ?>


<script>
	$(document).ready(function() {
		$('#pageno').on('click', 'a', function(e) {
			e.preventDefault();
			var pageno = $(this).attr('data-ci-pagination-page');
			if (pageno == 0)
				pageno = '';
			else
				pageno = (pageno - 1) * 3;

			loadPagination(pageno);
		});

		var token = "<?= $this->security->get_csrf_hash(); ?>";
		loadPagination(0);

		function loadPagination(pagno) {
			// location.href = "#scroll"; 
			$("#review-block").empty();

			$("#review-block").append('<div class="row w-100 spdiv"><div class="col-12"><div class="text-center"><span class="spinner"><span></span><span></span><span></span><span></span></span></div></div></div>');

			$.ajax({
				url: "<?= base_url() ?>Ads/fetch_reviews/" + pagno,
				type: 'POST',
				dataType: 'json',
				data: {
					'csrf_test_name': token,
					page: 3,
					id: "<?= $result->user_id ?>"
				},
				success: function(response) {
					$("#review-block").empty();
					$("#pageno").empty();
					$.each(response.products, function(i, item) {
						$("#review-block").append(item);
					});

					$("#pageno").append(response.links);




				}
			});

		}

	});
</script>
