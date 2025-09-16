<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>




<script>

	$(document).ready(function () {
		$('.search_breed').select2();
		$('.search_state').select2();
	});

	$(function () {
		// Owl Carousel
		var owl = $(".reviewscarousel");
		owl.owlCarousel({
			autoplay: 3000,
			items: 1,
			margin: 10,
			loop: true,
			nav: true,
			dots: false
		});
	});

</script>
<style>
@media screen and (min-width:1200px){
    #homepage .banner_img {
      max-height: 100vh;
    }
    #homepage .banner_content {
      top: 50%;
    }
}
	.breedlistview {
		min-width: 20%;
	}

	@media screen and (max-width:991px) {
		.breedlistview {
			min-width: 33.33%;
		}
	}

	.reviewscarousel .owl-nav {
		position: absolute;
		width: 110%;
		display: flex;
		justify-content: space-between;
		left: -5%;
		top: 5%;
		font-size: 40pt;
	}

	/* DEMO GENERAL ============================== */
	.hover {
		overflow: hidden;
		position: relative;
		padding-bottom: 60%;
		cursor: pointer;
	}

	.hover-overlay {
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		left: 0;
		z-index: 90;
		transition: all 0.4s;
	}

	.hover img {
		width: 100%;
		position: absolute;
		top: 0;
		left: 0;
		transition: all 0.3s;
	}

	.hover-content {
		position: relative;
		z-index: 99;
	}



	/* DEMO 5 ============================== */
	.hover-5::after {
		content: '';
		width: 100%;
		height: 10px;
		background: #8cc63f;
		position: absolute;
		bottom: -10px;
		left: 0;
		display: block;
		transition: all 0.3s;
		z-index: 999;

	}

	/* .hover-5 .hover-overlay {
  background: rgba(0, 0, 0, 0.4);
} */

	.hover-5-title {
		position: absolute;
		bottom: 1rem;
		left: 0;
		transition: all 0.3s;
		/* padding: 2rem 2rem; */
		padding-bottom: 20%;
		z-index: 99;
		display: none;
	}

	.hover-5-title span {
		transition: all 0.4s;
		opacity: 0;
		color: #47c650;
	}

	.hover-5 .hover-overlay {
		background: rgb(0 0 0 / 20%);
	}

	.hover-5 .hover-5-title {
		bottom: 0;
		display: block;
	}

	.hover-5 .hover-5-title span {
		opacity: 1;
	}

	.hover-5 {
		bottom: 0;
	}



	.postImg-slick.d-flex.gap-4 {
		height: 245px;
		align-items: center;
		justify-content: center;
	}

	.select2-container {
		padding: 8.5px;
	}

	/*	.postImg-slick.d-flex.gap-4 .lazyload.thumbnail.no-margin {*/
	/*    object-fit: unset !important;*/
	/*min-height: unset !important;*/
	/*max-height: unset !important;*/
	/*}*/

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

	.banner_content {
		position: absolute;
		top: 50%;
		width: 100%;
	}

	.intro2 {
		/* top: 80%; */
		width: 100%;
		/* position: absolute; */
		/* background: #343333; */
		padding: 10px;
	}

	.intro3 {
		/* top: 50%; */
		width: 100%;
		/* position: absolute; */
		/* background: #343333; */
		padding: 10px;
		min-height: 210px;
	}

	@media only screen and (max-width: 765px) {
		.intro2 {
			/* top: 70%; */
			width: 100%;
			/* position: absolute; */
			/* background: #343333; */
			padding: 10px;
		}

		.intro3 {
			/* top: 50%; */
			width: 100%;
			/* position: absolute; */
			/* background: #343333; */
			padding: 10px;
			min-height: 110px;
		}

	}

	.row.aqr {
		box-shadow: unset;
		background-color: #fff;
		height: 100%;
		border: 1px solid #dddddd;
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

		.banner_content {
			position: absolute;
			bottom: unset;
			top: 25%;
			width: 100%;
		}

		.banner_container_fluid {
			position: relative;
		}
	}


	/* Animation */
	.anim-typewriter {
		animation: typewriter 4s steps(44) 1s 1 normal both,
			blinkTextCursor 500ms steps(1) normal;
	}

	@keyframes typewriter {
		from {
			width: 0;
		}

		to {
			width: 70%;
		}
	}

	@keyframes blinkTextCursor {
		from {
			border-right-color: rgba(255, 255, 255, .75);
		}

		to {
			border-right-color: #ffffff00;
		}
	}


	.wel_text {

		font-size: 65px !important;
		font-weight: 600 !important;
		color: #fff;
		line-height: 1.3;
		text-shadow: 0px 0px 20px black;
	}

	@media only screen and (max-width: 992px) {
		.wel_text {

			font-size: 60px !important;

			line-height: 1.3;
		}

		@keyframes typewriter {
			from {
				width: 0;
			}

			to {
				width: 86%;
			}
		}

	}

	@media only screen and (max-width: 768px) {
		.wel_text {

			font-size: 45px !important;

			line-height: 1.3;
		}

		@keyframes typewriter {
			from {
				width: 0;
			}

			to {
				width: 85%;
			}
		}

	}

	@media only screen and (max-width: 500px) {
		.wel_text {

			font-size: 30px !important;

			line-height: 1.3;
		}

		@keyframes typewriter {
			from {
				width: 0;
			}

			to {
				width: 95%;
			}
		}

	}

	.line-1 {
		position: relative;

		border-right: 10px solid rgb(140 198 63);

		white-space: nowrap;
		overflow: hidden;
		transform: translateY(-25%);

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
		font-size: 15px;

	}

	.why_chose_img {
		border-radius: 50%;
		border: 4px solid #a6e1ff;
		max-height: 240px;
	}

	.why_chose_img2 {
		border-radius: 50%;
		border: 4px solid #47c650;
		max-height: 240px;
	}

	.learn-mode-btn {
		background-color: #8cc63f;
		color: #fff;
		width: 60%;
		border-radius: 25px;
	}

	.whychoose h2 {
		font-size: 38px;
		font-weight: 800;
		color: #8cc63f;
	}

	.whychoose h3 {
		font-size: 25px;


	}

	.whychoose p {
		font-size: 15px;
	}

	.happy_family {
		background-color: #8cc63f;
		color: #fff;
	}

	.happy_family_btn {
		border: 2px solid #fff;
		color: #fff;
		border-radius: 25px;
	}

	.happy_family p {
		font-size: 15px;
	}

	.banner-next-down-arrow {
		margin-top: -10px
	}

	.banner-next-down-arrow i {
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
</style>
<style>
	.incss-mt-5 {
		margin-top: -5px
	}

	.incss-btnx {
		border-radius: 20px !important;
		width: 100%;
	}

	.incss-bg1 {
		background-color: #8cc63f !important
	}

	.color-white {
		color: white !important;
	}

	.incss-box {
		background: #fff;
		padding: 20px;
		border-radius: 20px;

	}

	.incss-float-right {
		float: right;
	}

	.incss-boxx-2 {
		height: 100%;
		display: flex;
		flex-direction: column;
		justify-content: center;
	}

	.incss-link {
		width: 13%;
		border-radius: 50px 50px;
		margin: 0px auto;
		border-radius: 26px !important;
		min-width: 120px;
	}

	.incss-pb-span {
	font-weight: bold !important;
  font-size: 35px;
	}

	.incss-f-15 {
		font-size: 15px
	}

	.incss-btn-3 {
		background-color: #8cc63f;
		color: #fff;
		width: auto;
		margin: 0px auto;
	}
	.flwsc {
      text-align: center;
      color: #fff;
      font-weight: bold;
      font-size: 3em;
      margin: 20px auto;
    }
    
    .flwsc svg {
      margin-left: 10px;
    }
    @media screen and (max-width:767px){
        .flwsc {
          font-size: 14pt;
        }
        .flwsc svg {
          margin-left: 2px;
          width: 35px;
          height: 35px;
        }
    }
</style>

<script>
	$(document).ready(function () {
		$('.thevideo').get(0).play()
		$(".thevideo").mouseenter(function () {
			$(this).get(0).play();
		}).mouseleave(function () {
			$(this).get(0).pause();
		});

	});
</script>
<div class="main-container" id="homepage">


	<script>


	</script>

	<!--<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>-->

	<!--<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>-->
	<div class="container-fluid banner_container_fluid p-0">
		<img src="<?= base_url() ?>assets/lazyload.gif" class="banner_img d-lg-none" data-src="<?= (strpos(get_home_cover_image(), 'home_cover_') === 0) ? base_url('uploads/' . get_home_cover_image()) : base_url('assets/' . get_home_cover_image()) ?>">
		<img src="<?= base_url() ?>assets/lazyload.gif" class="banner_img d-lg-block d-none" data-src="<?= (strpos(get_home_cover_image(), 'home_cover_') === 0) ? base_url('uploads/' . get_home_cover_image()) : base_url('assets/' . get_home_cover_image()) ?>">
		<!-- <video class="thevideo banner_video" playsinline muted loop style=" pointer-events: none;">
			<source src="<?= base_url() ?>uploads/indexvideo.mp4 " type="video/mp4">
			Your browser does not support the video tag.
		</video> -->
		<div class="banner_content">
			<div class="intro3 incss-mt-5">
				<div class="container ">

					<div class="search-row ">
						<h1 class=" wel_text">
							<span class="u-text-animation u-text-animation--typing"></span>
						</h1>
					</div>
				</div>
			</div>


			<div class="intro2 incss-mt-5">
				<div class="container ">

					<!--   <div class="search-row ">-->
					<!--<h1 class="  wel_text">Puppies are the </h1>-->
					<!--<h1 class="line-1 anim-typewriter wel_text">center of our world!</h1>-->
					<!--</div>-->
					<a class="d-md-none mt-4" href=" <?= base_url(); ?>ads"><button
							class="btn btn-primary btn-lg incss-btnx"><i class="fas fa-paw"></i> Available
							Puppies</button></a>

					<form id="" name="search" action="<?= base_url() ?>breeds" class="d-none d-md-block" method="GET">
						<div class="row search-row animated fadeInUp">

							<div class="col-md-9 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">

								<div class="search-col-inner">
									<i class="icon-docs icon-append"></i>
									<div class="search-col-input">
										<select class="form-control has-icon search_breed" name="breed">
											<option value="">Find Your Puppy Breed</option>
											<?php foreach ($breeds as $row) { if ($row->count!=0) { ?>
											<option value="<?= $row->id ?>">
												<?= $row->breed_name ?>
											</option>

											<?php } } ?>
										</select>

									</div>
								</div>
							</div>

							<div class="col-md-2 col-sm-12 search-col">
								<div class="search-btn-border bg-primary incss-bg1">
									<button class="btn btn-search btn-block btn-gradient color-white" id="find">
										<i class="icon-search"></i><strong>Search</strong>
									</button>
								</div>
							</div>
						

						</div>
					</form>
					<div class="row">
						<div class="col-lg-12">
							    <h3 class="flwsc">Follow us on Social Media: 
							        <span>
							            <a href="https://www.instagram.com/mypupcentral/?hl=en" target="_blank">
							                <svg width="50px" height="50px" viewBox="0 0 3364.7 3364.7" xmlns="http://www.w3.org/2000/svg"><defs><radialGradient id="0" cx="217.76" cy="3290.99" r="4271.92" gradientUnits="userSpaceOnUse"><stop offset=".09" stop-color="#fa8f21"/><stop offset=".78" stop-color="#d82d7e"/></radialGradient><radialGradient id="1" cx="2330.61" cy="3182.95" r="3759.33" gradientUnits="userSpaceOnUse"><stop offset=".64" stop-color="#8c3aaa" stop-opacity="0"/><stop offset="1" stop-color="#8c3aaa"/></radialGradient></defs><path d="M853.2,3352.8c-200.1-9.1-308.8-42.4-381.1-70.6-95.8-37.3-164.1-81.7-236-153.5S119.7,2988.6,82.6,2892.8c-28.2-72.3-61.5-181-70.6-381.1C2,2295.4,0,2230.5,0,1682.5s2.2-612.8,11.9-829.3C21,653.1,54.5,544.6,82.5,472.1,119.8,376.3,164.3,308,236,236c71.8-71.8,140.1-116.4,236-153.5C544.3,54.3,653,21,853.1,11.9,1069.5,2,1134.5,0,1682.3,0c548,0,612.8,2.2,829.3,11.9,200.1,9.1,308.6,42.6,381.1,70.6,95.8,37.1,164.1,81.7,236,153.5s116.2,140.2,153.5,236c28.2,72.3,61.5,181,70.6,381.1,9.9,216.5,11.9,281.3,11.9,829.3,0,547.8-2,612.8-11.9,829.3-9.1,200.1-42.6,308.8-70.6,381.1-37.3,95.8-81.7,164.1-153.5,235.9s-140.2,116.2-236,153.5c-72.3,28.2-181,61.5-381.1,70.6-216.3,9.9-281.3,11.9-829.3,11.9-547.8,0-612.8-1.9-829.1-11.9" fill="url(#0)"/><path d="M853.2,3352.8c-200.1-9.1-308.8-42.4-381.1-70.6-95.8-37.3-164.1-81.7-236-153.5S119.7,2988.6,82.6,2892.8c-28.2-72.3-61.5-181-70.6-381.1C2,2295.4,0,2230.5,0,1682.5s2.2-612.8,11.9-829.3C21,653.1,54.5,544.6,82.5,472.1,119.8,376.3,164.3,308,236,236c71.8-71.8,140.1-116.4,236-153.5C544.3,54.3,653,21,853.1,11.9,1069.5,2,1134.5,0,1682.3,0c548,0,612.8,2.2,829.3,11.9,200.1,9.1,308.6,42.6,381.1,70.6,95.8,37.1,164.1,81.7,236,153.5s116.2,140.2,153.5,236c28.2,72.3,61.5,181,70.6,381.1,9.9,216.5,11.9,281.3,11.9,829.3,0,547.8-2,612.8-11.9,829.3-9.1,200.1-42.6,308.8-70.6,381.1-37.3,95.8-81.7,164.1-153.5,235.9s-140.2,116.2-236,153.5c-72.3,28.2-181,61.5-381.1,70.6-216.3,9.9-281.3,11.9-829.3,11.9-547.8,0-612.8-1.9-829.1-11.9" fill="url(#1)"/><path d="M1269.25,1689.52c0-230.11,186.49-416.7,416.6-416.7s416.7,186.59,416.7,416.7-186.59,416.7-416.7,416.7-416.6-186.59-416.6-416.7m-225.26,0c0,354.5,287.36,641.86,641.86,641.86s641.86-287.36,641.86-641.86-287.36-641.86-641.86-641.86S1044,1335,1044,1689.52m1159.13-667.31a150,150,0,1,0,150.06-149.94h-0.06a150.07,150.07,0,0,0-150,149.94M1180.85,2707c-121.87-5.55-188.11-25.85-232.13-43-58.36-22.72-100-49.78-143.78-93.5s-70.88-85.32-93.5-143.68c-17.16-44-37.46-110.26-43-232.13-6.06-131.76-7.27-171.34-7.27-505.15s1.31-373.28,7.27-505.15c5.55-121.87,26-188,43-232.13,22.72-58.36,49.78-100,93.5-143.78s85.32-70.88,143.78-93.5c44-17.16,110.26-37.46,232.13-43,131.76-6.06,171.34-7.27,505-7.27S2059.13,666,2191,672c121.87,5.55,188,26,232.13,43,58.36,22.62,100,49.78,143.78,93.5s70.78,85.42,93.5,143.78c17.16,44,37.46,110.26,43,232.13,6.06,131.87,7.27,171.34,7.27,505.15s-1.21,373.28-7.27,505.15c-5.55,121.87-25.95,188.11-43,232.13-22.72,58.36-49.78,100-93.5,143.68s-85.42,70.78-143.78,93.5c-44,17.16-110.26,37.46-232.13,43-131.76,6.06-171.34,7.27-505.15,7.27s-373.28-1.21-505-7.27M1170.5,447.09c-133.07,6.06-224,27.16-303.41,58.06-82.19,31.91-151.86,74.72-221.43,144.18S533.39,788.47,501.48,870.76c-30.9,79.46-52,170.34-58.06,303.41-6.16,133.28-7.57,175.89-7.57,515.35s1.41,382.07,7.57,515.35c6.06,133.08,27.16,223.95,58.06,303.41,31.91,82.19,74.62,152,144.18,221.43s139.14,112.18,221.43,144.18c79.56,30.9,170.34,52,303.41,58.06,133.35,6.06,175.89,7.57,515.35,7.57s382.07-1.41,515.35-7.57c133.08-6.06,223.95-27.16,303.41-58.06,82.19-32,151.86-74.72,221.43-144.18s112.18-139.24,144.18-221.43c30.9-79.46,52.1-170.34,58.06-303.41,6.06-133.38,7.47-175.89,7.47-515.35s-1.41-382.07-7.47-515.35c-6.06-133.08-27.16-224-58.06-303.41-32-82.19-74.72-151.86-144.18-221.43S2586.8,537.06,2504.71,505.15c-79.56-30.9-170.44-52.1-303.41-58.06C2068,441,2025.41,439.52,1686,439.52s-382.1,1.41-515.45,7.57" fill="#ffffff"/></svg>
							            </a>
							        </span>
							        <span>
							            <a href="https://www.facebook.com/people/My-Pup-Central/61579137068671/ " target="_blank">
							                <svg width="50px" height="50px" viewBox="0 0 48 48" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    
                                            <title>Facebook-color</title>
                                            <desc>Created with Sketch.</desc>
                                            <defs>
                                        
                                        </defs>
                                            <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g id="Color-" transform="translate(-200.000000, -160.000000)" fill="#4460A0">
                                                    <path d="M225.638355,208 L202.649232,208 C201.185673,208 200,206.813592 200,205.350603 L200,162.649211 C200,161.18585 201.185859,160 202.649232,160 L245.350955,160 C246.813955,160 248,161.18585 248,162.649211 L248,205.350603 C248,206.813778 246.813769,208 245.350955,208 L233.119305,208 L233.119305,189.411755 L239.358521,189.411755 L240.292755,182.167586 L233.119305,182.167586 L233.119305,177.542641 C233.119305,175.445287 233.701712,174.01601 236.70929,174.01601 L240.545311,174.014333 L240.545311,167.535091 C239.881886,167.446808 237.604784,167.24957 234.955552,167.24957 C229.424834,167.24957 225.638355,170.625526 225.638355,176.825209 L225.638355,182.167586 L219.383122,182.167586 L219.383122,189.411755 L225.638355,189.411755 L225.638355,208 L225.638355,208 Z" id="Facebook">
                                        
                                        </path>
                                                </g>
                                            </g>
                                        </svg>
							            </a>
							        </span>
							        </h3>
							</div>
					</div>

				</div>
			</div>
		</div>

		<div class="banner_next pt-5 pb-5 web-content">
			<div class="container">
				<div class="text-center">
					<h2 class="pb-5"><b>We make it easy to find the perfect puppy!</b></h2>
					<p>Finding your new best friend to share your adventures with is an exciting process; think of all
						the fun you'll have together! However, choosing a breeder you can trust and navigating the
						transition process can be time-consuming and stressful. But don’t worry, we’ve done all the
						screening for you to make your experience easy and enjoyable. </p>
				</div>
				<form id="" name="search" action="<?= base_url() ?>breeds" class=" d-md-none incss-box" method="GET">
					<div class="row search-row animated fadeInUp">

						<div class="col-md-9 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">

							<div class="search-col-inner">
								<i class="icon-docs icon-append"></i>
								<div class="search-col-input">
									<select class="form-control has-icon search_breed" name="breed">
										<option value="">Find Your Puppy Breed</option>
										<?php foreach ($breeds as $row) { if ($row->count!=0) { ?>
										<option value="<?= $row->id ?>">
											<?= $row->breed_name ?>
										</option>

										<?php } } ?>
									</select>

								</div>
							</div>
						</div>

						<div class="col-md-2 col-sm-12 search-col">
							<div class="search-btn-border bg-primary incss-bg1">
								<button class="btn btn-search btn-block btn-gradient color-white" id="find">
									<i class="icon-search"></i><strong>Search</strong>
								</button>
							</div>
						</div>

					</div>
				</form>


			</div>

		</div>
		<div class="text-center">
			<div class="banner-next-down-arrow web-content"><i class="fas fa-angle-down"></i></div>
		</div>


	</div>


	<section class="mt-5 mb-5 whychoose web-content">
		<div class="container">
			<div class="text-center">
				<h2>Why Choose Us?</h2>
			</div>

			<div class="row mt-5">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					<div class="text-center">
						<img class="w-48 h-full rounded-sm  why_chose_img  mt-2 mb-2"
							data-src="<?= base_url() ?>assets/why_1.jpg" src="<?= base_url() ?>assets/lazyload.gif"
							alt="Beautiful Puppies- My Pup Central">
					</div>
				</div>

				<div class="col-md-5">
					<h3 class="pt-5"><b>Beautiful Puppies</b> </h3>
					<p class="mt-2 mb-4 text-base leading-6">
						Our goal is to connect you with the puppy of your dreams.
					</p>
					<a href="<?= base_url() ?>ads">
						<button type="button" class="btn learn-mode-btn ">Find Your Puppy</button>
					</a>

				</div>
				<div class="col-md-2"></div>
			</div>


			<div class="row mt-5">

				<div class="col-md-2"></div>
				<div class="col-md-5 d-none d-lg-block">
					<h3 class="pt-5 incss-float-right"><b>Trust-worthy Breeders </b> </h3>
					<p class="mt-2 mb-4 text-base leading-6 incss-float-right">
						All of our breeders are vetted by our own team of experts and are required to meet our standards.
					</p>
					<a href="<?= base_url() ?>standard">
						<button type="button" class="btn learn-mode-btn incss-float-right">Read Our
							Standards</button>
					</a>
				</div>
				<div class="col-md-3">
					<div class="text-center">
						<img class="w-48 h-full rounded-sm  why_chose_img2  mt-2 mb-2"
							data-src="<?= base_url() ?>assets/why_2.jpg" src="<?= base_url() ?>assets/lazyload.gif"
							alt="Trust-worthy Breeders- My Pup Central">
					</div>
				</div>

				<div class="col-md-5 d-lg-none">
					<h3 class="pt-5"><b>Trust-worthy Breeders </b> </h3>
					<p class="mt-2 mb-4 text-base leading-6">
						All of our breeders are vetted by our own team of experts and are required to meet our standards.
					</p>
					<a href="<?= base_url() ?>standard">
						<button type="button" class="btn learn-mode-btn incss-float-right">Read Our
							Standards</button>
					</a>
				</div>
			</div>

			<div class="row mt-5">
				<div class="col-md-2"></div>
				<div class="col-md-3">
					<div class="text-center">
						<img class="w-48 h-full rounded-sm  why_chose_img  mt-2 mb-2"
							data-src="<?= base_url() ?>assets/why_5.jpg" src="<?= base_url() ?>assets/lazyload.gif"
							alt="Secure Transportation Options- My Pup Central">
					</div>
				</div>

				<div class="col-md-5">
					<h3 class="pt-5"><b>Training Options Available </b></h3>
					<p class="mt-2 mb-4 text-base leading-6">
					Our professional trainers work with your puppy in their own
home and instill potty training, commands, and house manners
before your puppy comes home to you!
					</p>
					<a href="<?= base_url() ?>training">
						<button type="button" class="btn learn-mode-btn ">See Training Options</button>
					</a>

				</div>
				<div class="col-md-2"></div>
			</div>
			
			<div class="row mt-5">

				<div class="col-md-2"></div>
				<div class="col-md-5 d-none d-lg-block">
					<h3 class="pt-5 incss-float-right"><b>Secure Transportation Options </b> </h3>
					<p class="mt-2 mb-4 text-base leading-6 incss-float-right">
						Visit our travel page for recommended transportation professionals.
					</p>
					<a href="<?= base_url() ?>transportation">
						<button type="button" class="btn learn-mode-btn incss-float-right">See Travel Options </button>
					</a>
				</div>
				<div class="col-md-3">
					<div class="text-center">
						<img class="w-48 h-full rounded-sm  why_chose_img2  mt-2 mb-2"
							data-src="<?= base_url() ?>assets/why_4.jpg" src="<?= base_url() ?>assets/lazyload.gif"
							alt="Trust-worthy Breeders- My Pup Central">
					</div>
				</div>

				<div class="col-md-5 d-lg-none">
					<h3 class="pt-5"><b>Secure Transportation Options </b> </h3>
					<p class="mt-2 mb-4 text-base leading-6">
							Visit our travel page for recommended transportation professionals.
					</p>
					<a href="<?= base_url() ?>transportation">
						<button type="button" class="btn learn-mode-btn incss-float-right">See Travel Options</button>
					</a>
				</div>
			</div>



		</div>
	</section>


	<section class="happy_family mt-5 mb-5 web-content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 p-0">
					<img class="w-48 h-full rounded-sm img-fluid w-100" src="<?= base_url() ?>assets/lazyload.gif"
						data-src="<?= base_url() ?>assets/happy_family_2.jpg" alt="Happy Family - My Pup Central">
				</div>
				<div class="col-md-6">
					<div class="px-2 incss-boxx-2">
						<div class="row">

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="hfamily px-5">
									<h3 class="pb-2 mt-5"><b>Customer Reviews</b></h3>
									<div class="owl-carousel reviewscarousel owl-theme">
										<div class="item">
											<p class="pt-2 px-2">We want to thank you for making the whole process so
												easy, transparent, and flexible. We could not be happier with the entire
												transaction and our new addition. Kota is a healthy, happy, and
												extremely smart dog that brings JOY every single day!</p>
											<p>-Alessandra M.</p>
										</div>
										<div class="item">
											<p class="pt-2">We brought home a beautiful Morkie female named Zennia. She
												is a sassy little lady and had a clean bill of health. Her new name is
												Gracie Laine and is a wonderful addition to our family. Reuben was very
												patient with me as I tried to choose between Zennia and Ion and I could
												not be happier with my choice.</p>
											<p>-Cheryl M.</p>
										</div>

										<div class="item">
											<p class="pt-2">I recently purchased a 10-week-old Morkie from Reuben. I was
												very impressed with every aspect of my purchase. I thought I would drive
												Reuben crazy with my multitude of questions but he answered every
												question promptly and clearly. When my puppy was delivered, she was
												happy and healthy and totally made herself at home. It was clear that
												she had received a lot of love and was socialized. If I decide to buy
												another puppy in the future, Reuben's website will be my first to look
												at.</p>
											<p>-Hazel S.</p>
										</div>

										<div class="item">
											<p class="pt-2">I bought a cockapoo from Emily and she made the process
												seamless and quick! She is a great communicator and made sure my puppy
												arrived to me safely and provided a lot of information on the breed.</p>
											<p>-Aliyah A.</p>
										</div>

										<div class="item">
											<p class="pt-2">This was the first puppy I have ever purchased and Emily
												made the process super easy and super smooth. Puppy arrived safe and
												sound, it is obvious puppy was given lots of love and care from how
												sweet he is. My daughter and I are extremely happy with our new
												addition.</p>
											<p>-Awilda & Vanessa C.</p>
										</div>

										<div class="item">
											<p class="pt-2">Super easy process with Emily! Before Dana now Chloe arrived
												so loving. She is enjoying her new space. I am pretty sure Emily had the
												puppies on a potty training schedule.</p>
											<p>-Ebonie M.</p>
										</div>

									</div>



									<a href="<?= base_url() ?>success-stories">
										<button class="btn mt-4 mb-5 happy_family_btn">More Reviews</button>
									</a>

								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</section>







	<style>
		.morecontent span {
			display: none;
		}

		.morelink {
			display: block;
		}
	</style>

	<!--<div class="container" style="margin-top: 3%;">-->
	<!--	<div class="col-xl-12">-->
	<!--		<div class="row row-featured row-featured-category">-->
	<!--			<div class="col-xl-12" style="text-align:center">-->
	<!--				<h2 style="font-size: 32px; font-weight: 600;color: #060606;line-height: 27pt;-->
	<!--   margin-top: 15px;">Finding Forever Homes For Puppies!</h2>-->
	<!--				</br>-->
	<!--				<p style="font-size: 16px;"> <span class="more">-->
	<!--						Welcome to My Pup Central! In 2020, some local families created My Pup Central with the intent to connect healthy puppies with caring families. My Pup Central does not condone Puppy Mills, and through technology, we are making it a thing of the past. This allows you as the puppy owner to buy with confidence.<br>-->
	<!--					</span></p>-->
	<!--<button nclick="myFunction()" id="myBtn" class="btn btn-primary btn-search btn-block btn-gradient" style="width: 13%;border-radius: 50px 50px;margin: 0px auto; border-radius: 26px !important;">Read more</button>-->


	<!--			</div>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	<script>
		$(document).ready(function () {
			// Configure/customize these variables.
			var showChar = 101; // How many characters are shown by default
			var ellipsestext = "";
			var moretext = "Read more >";
			var lesstext = "Read less >";


			$('.more').each(function () {
				var content = $(this).html();

				if (content.length > showChar) {

					var c = content.substr(0, showChar);
					var h = content.substr(showChar, content.length - showChar);

					var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><br><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href=""  class="incss-link morelink btn btn-primary btn-search btn-block btn-gradient">' + moretext + '</a></span>';

					$(this).html(html);
				}

			});

			$(".morelink").click(function () {
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
	<script>


		$(document).ready(function () {

			setTimeout(() => {
				$('.puppy_height').css('height', $('.puppy_width').width());
				console.log($('.puppy_width').width());
			}, 1000);

			$(window).resize(function () {
				$('.puppy_height').css('height', $('.puppy_width').width());
			});


		});

		$(document).ready(function () {
			load_content();
			function load_content() {
				$.ajax({
					type: "GET",
					url: "<?=base_url()?>Home/load_home_content",
					data: {},
					success: function (response) {
						$("#home_content").empty();
						$("#home_content").append(response);

						setTimeout(() => {
							$('.puppy_height').css('height', $('.puppy_width').width());
							console.log($('.puppy_width').width());
						}, 1000);

						$(window).resize(function () {
							$('.puppy_height').css('height', $('.puppy_width').width());
						});

					}
				});
			}
		});
	</script>

	<style>
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


	<div class="p-0 mt-lg-4 mt-md-3 mt-5"></div>
	<div class="container">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title no-border">
					<div class="inner text-center">
						<h2>
							<span class="incss-pb-span"> Popular Breeds</span>
							<!--<a href="" class="sell-your-item">-->
							<!--	View more <i class="icon-th-list"></i>-->
							<!--</a>-->
						</h2>
						<p class="incss-f-15">
							A lot goes into choosing the breed that is perfect for you. Factors can range from size,
							energy level, and temperament, and don’t forget the cuteness factor. We help take the
							guesswork out of the selection process by describing each breed. Just click on a photo to
							learn more about that cute face and see the puppies currently available in your selection.
						</p>
					</div>
				</div>
				<!-- <div class="row m-0 load-content pb-3" id="height_scroll"> -->

				<?php $count = 0;
				$mycount = 0;
				$mycounttwo = 0;
				$ccnt = 0;
					echo '<div class="row m-0 load-content pb-3">';
				foreach ($breeds as $row) {
					$count++;
					$mycount++;

					if ($mycount == 16) {
						$mycount = 1;
						$mycounttwo++;
						break;
					}


					$ccnt++;
					if ($ccnt == 1 || fmod($ccnt, 5) == 1) {
				// 		echo '<div class="row m-0 load-content pb-3">';
					}

					// 		if ($count == 19) break;
				?>
				<div class="f-category col-6 col-md-3  col-lg mycol<?= $mycounttwo ?> d-none breedlistview">
					<a href="<?= base_url() ?>breeds/<?= $row->page_slug ?>" class="puppy_height">
						<div class=" hover hover-5  text-white rounded puppy_height puppy_width"><img
								data-src="<?= base_url() . 'uploads/breeds/' . $row->image ?>"
								src="<?= base_url() . 'assets/lazyload.gif' ?>" alt="<?= $row->alt_image ?>"
								class="puppy_height">
							<div class="hover-overlay puppy_height"></div>
							<div class="hover-5-content puppy_height">
								<div class="text-center">
									<h3 class="hover-5-title text-uppercase font-weight-light mb-0 p-3"> <strong
											class="font-weight-bold text-white">
											<?= $row->breed_name ?>
										</strong><span></span></h3>
								</div>
							</div>
						</div>
					</a>

				</div>



				<?php $lastid = $row->id;

					if ($ccnt == 5 || fmod($ccnt, 5) == 0) {
				// 		echo '</div>';
					}
				}
					echo '</div>';
				?>


				<input type="hidden" id="last_id" value="<?= $lastid ?>">

				<a href="<?= base_url() ?>available-breeds"> <button
						class=" btn   btn-block btn-gradient mt-2 incss-btn-3">
						View More Breeds
					</button></a>

				<!-- </div> -->


				<br>
				<!-- </div> -->


			</div>
		</div>
	</div>


	<div id="home_content">
		<div id="loading_div">
			<div class="row w-100 spdiv">
				<div class="col-12">
					<div class="text-center"><span
							class="spinner"><span></span><span></span><span></span><span></span></span></div>
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

									<div class="iconbox-wrap-text">My Pup Central, LLC only provides advertising - we do
										not raise or sell puppies. Website Logo, Web Layout, and all pictures and text
										are copyright 2021 by My Pup Central, LLC with all rights reserved. All
										information is believed to be accurate but is not guaranteed by My Pup Central
										®. Please verify all information with the breeder. <br><br>We provide advertising
										for dog breeders, puppy breeders, and other pet lovers offering dogs and puppies
										for sale. We also advertise other puppy-related products and services.</div>
								</div>
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
		var count = 0;
		$('.mycol' + count + '').removeClass('d-none');
		$('.morebreeds').click(function (e) {
			e.preventDefault();
			console.log(count);
			count = count + 1;
			$('.mycol' + count + '').removeClass('d-none');
		});
	});
</script>

<script src="<?=base_url()?>assets/front/js/typed.min.js"></script>
<script>

	var typed = new Typed(".u-text-animation.u-text-animation--typing", {
// 		strings: ["It\'s back to school season.", "Find your study buddy."],
		strings: ["<?= get_home_cover_text_1() ?>", "<?= get_home_cover_text_2() ?>"],
		typeSpeed: 60,
		loop: true,
		showCursor: true,
		backSpeed: 25,
		backDelay: 3000
	});
</script>