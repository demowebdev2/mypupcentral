<script>
    function onSubmit(token) {
    //   alert('fsd');
     // var gg= $(this);
    // alert(gg);
    //  $("#contactForm").submit();
     var form = $('#review_form1')[0];
     
      if (!form.checkValidity()) {
            event.preventDefault(); // Prevent the default form submission if not valid
            event.stopPropagation(); // Stop event propagation
              form.reportValidity();
        }
        else{
            document.getElementById("review_form1").submit();
        }
        
     
    
   }
</script>


<script>

 $(document).ready(function () {
     	
     	var token = "<?= $this->security->get_csrf_hash(); ?>";
     load_captcha()
function load_captcha()
{
     $('#captcha_div').empty();
     $('#captcha_div2').empty();
     $.ajax({
                type: "POST",
                url: "<?=base_url()?>Page/load_captcha",
               	data: {
					'csrf_test_name': token,
				},
                dataType: "json",
                success: function (response) {
                    $('#captcha_div').append(response.img);
                     $('#captcha_div2').append(response.img);
                }
            });
}

});
</script>


<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>


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
				swal("Your inquiry has been submitted!", "Thank you for your time!", "success");
			});
		</script>
	<?php } else if ($this->session->flashdata('enquiry_error') == 'enquiry_error') { ?>


		<script>
			$(document).ready(function() {
				swal("Error!", "Something Went Wrong!", "error");
			});
		</script>
<?php }
} ?>

<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/lightgallery.css" />

<link rel="stylesheet" href="<?=base_url()?>assets/front/swiper/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="<?=base_url()?>assets/front/swiper/swiper-bundle.min.js"></script>

<style>

.category-list-wrapper {
    justify-content: center;
}

.item-price {
   
    color: #8cc63f !important;
}
	/*.btn-primary {*/
	/*	background-color: #3457d5 !important;*/
	/*	border-color: #3457d5 !important;*/
	/*	color: #fff;*/
	/*}*/

	.text-primary {
		color: #8cc63f !important;
	}

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

	.swiper {
		width: 100%;
		height: 100%;
		border-bottom: 5px solid #8cc63f;
	}

	.swiper-pagination-clickable .swiper-pagination-bullet {

		background: #8cc63f;
	}

	.swiper-button-next:after {
		color: #8cc63f;

	}

	.swiper-button-prev:after {
		color: #8cc63f;

	}

	.swiper-slide {
		text-align: center;
		font-size: 18px;
		background: #fff;
		margin-right: 3px !important;
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

	.u-label--purple {
		color: #8cc63f;
		background-color: rgba(121, 110, 255, .1);
	}

	.u-label--dark {
		color: #151b26;
		background-color: rgba(21, 27, 38, .1);
	}

	.u-label--sm {
		font-size: .75rem;
		padding: 0.5rem 1rem;
	}

	.u-label,
	.u-label--rounded {
		border-radius: 6.1875rem;
	}

	.u-label {
		display: inline-block;
		font-size: 1rem;
		font-weight: 400;
		padding: 0.625rem 1.125rem;
		transition: .2s ease-in-out;
	}

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

	.modal-header {
    border-bottom: solid 1px #8cc63f;
    font-weight: bold;
    background: #8cc63f;
    border-top: solid 1px #8cc63f;
    padding: 8px;
    position: relative;
    color: #fff;
}
</style>

<style>
	@media only screen and (max-width: 1236px) {
		.ressv {
			width: 100%;
			height: 100%;
		}
	}
</style>

<!-- Swiper -->
<div class="swiper mySwiper">
	<div class="swiper-wrapper">
		<div class="swiper-slide">
			<?php if (!empty($result->featured_video)) { ?>
				<div class="swiper-slide">

					<video class="thevideo" muted loop controls controlsList="nodownload" style="width:100%;max-height:400px;background-color:#000">
						<source src="<?php if ($result->featured_video_from == 'puppyverify.com') {
											echo PV;
										} else {
											echo NS;
										}  ?>uploads/puppies/<?= $result->featured_video ?>" type="video/mp4">
						Your browser does not support the video format.
					</video>
					<!--<img src="<?= base_url() ?>assets/watermark.png" style="position:absolute; right:10px; top:10px; opacity:0.5; width:70px">-->

				</div>
			<?php } ?>

			<?php if (!empty($result->featured_image)) { $fimage=$result->featured_image; ?>

				<div class="swiper-slide">
					<a href="<?php if ($result->featured_image_from == 'puppyverify.com') {
									echo PV;
								} else {
									echo NS;
								}  ?>uploads/puppies/pv/wa_<?= $result->featured_image ?>" data-fancybox="gallery" style="height: auto;">
						<img src="<?php if ($result->featured_image_from == 'puppyverify.com') {
										echo PV;
									} else {
										echo NS;
									}  ?>uploads/puppies/pv/wa_600x600_<?= $result->featured_image ?>" style="width: 100%;
                                                    max-height: 400px;
                                                    object-fit: contain;" class="img-fluid" alt="<?= $result->featured_alt_tag ?>">
					</a>
				</div>

			<?php } ?>

		</div>

		<?php if (!empty($pictures)) {
		    
			foreach ($pictures as $pic) {
			    if($pic->picture != $fimage){
		?>

				<div class="swiper-slide">
					<a href="<?php if ($pic->uploaded_from == 'puppyverify.com') {
									echo PV;
								} else {
									echo NS;
								}  ?>uploads/puppies/pv/wa_<?= $pic->picture ?>" data-fancybox="gallery" style="height: auto;">
						<img src="<?php if ($pic->uploaded_from == 'puppyverify.com') {
										echo PV;
									} else {
										echo NS;
									}  ?>uploads/puppies/pv/wa_600x600_<?= $pic->picture ?>" style="width: 100%;
                                                    max-height: 400px;
                                                    object-fit: contain;" class="img-fluid" alt="<?= $pic->alt_tag ?>">
					</a>

				</div>

		<?php } }
		} ?>

		<?php if (!empty($videos)) {
			foreach ($videos as $key=>$vid) {
		?>
				<div class="swiper-slide">
					<a href="#" data-video="<?php if ($vid->uploaded_from == 'puppyverify.com') {
												echo PV;
											} else {
												echo NS;
											}  ?>uploads/puppies/<?= $vid->video ?>" class="thevideo_modal" data-toggle="modal" data-target="#videoModal">
						<video class="thevideo thevide<?=$key?>" muted playsInline loop autoplay controlsList="nodownload" style=" pointer-events: none;width:100%;max-height:400px;background-color:#000">
							<source src="<?php if ($vid->uploaded_from == 'puppyverify.com') {
												echo PV;
											} else {
												echo NS;
											}  ?>uploads/puppies/<?= $vid->video ?>" type="video/mp4">
							Your browser does not support the video format.
						</video>
					</a>
					<!--<img src="<?= base_url() ?>assets/watermark.png" style="position:absolute; right:10px; top:10px; opacity:0.5;height: auto; width:70px">-->

				</div>
				


		<?php }
		} ?>


		<?php if (!empty($result->youtube)) { ?>

			<div class="swiper-slide">

				<?php
				$domain = parse_url($result->youtube, PHP_URL_HOST);
				// echo $domain;
				if ($domain == 'youtu.be') {
					$link = $result->youtube;
					$link_array = explode('/', $link);
					$page = end($link_array);
				?>


					<iframe width="560" class="ressv" height="315" src="https://www.youtube.com/embed/<?= $page ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

				<?php } else { ?>
					<?php echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "<iframe width=\"560\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>", $result->youtube); ?>
				<?php } ?>

			</div>

		<?php } ?>


	</div>
	<div class="swiper-button-next"></div>
	<div class="swiper-button-prev"></div>
	<div class="swiper-pagination"></div>
</div>

<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<div class="container mt-2 mb-3">
	<div class="row align-items-center">
		<div class="col-md-7">
			<span class="fave" data-adid="ffdda58a91" data-name="Felix" data-catid="1100089" data-breed="Dachshund, Mini" data-seo="dachshund-mini" data-type="profile"><i class="far fa-2x fa-heart" onmouseover="this.className = 'fas fa-2x fa-heart'" onmouseout="this.className='far fa-2x fa-heart'" style="color: #a90c1b;vertical-align:top;cursor:pointer;"></i></span>
			<span class="display-5 h4"><?= $result->title ?></span>
			<span class="font-weight-medium font-size-18 d-block">&nbsp;&nbsp;&nbsp;<?= $result->breed_name ?></span>
		</div>
		<div class="col-md-5 mt-2">
			 <a href="#" class="btn btn-block btn-lg cntct contact_modal mb-2" style="background-color:#ffb553;color:#fff" title="Contact Us">Contact Breeder</a>
			<!--<a href="#reviews_div" class="btn btn-block btn-lg btn-light-blue cntct" title="Contact Us">Reviews</a>-->
			

			<div class="modal fade " id="exampleModalcontact" tabindex="-1" role="dialog" aria-labelledby="exampleModalcontactTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered " role="document">

						<div class="modal-content">
							
								<div class="modal-header">
									<h3 class="modal-title" id="exampleModalLongTitle">Contact Breeder</h3>
									<button type="button" class="close contact_modal_close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="text-center">
								<h1 class="h3"> <?= $contact_person->full_name ?></h1>
						<h4> <b><i class="fas fa-map-marker-alt"></i> <?= $result->address ?></b></h4>


						<h4><b><i class="fas fa-phone"></i> </b> <a href="tel:<?= $contact_person->phone ?>"> <?= $contact_person->phone ?></a></h4>
						<?php if(!empty($contact_person->email)){ ?><h4><b><i class="fas fa-envelope"></i> </b> <a href="#" class="inquirymodal"> <?= $contact_person->email ?></a></h4><?php } ?>

						<?php if (!empty($contact_person->website_url) || !empty($seller->site_url)) { ?>
							<h4><b><i class="fas fa-globe"></i> </b>
								<?php if ($contact_person->website_url) {
								$url=$contact_person->website_url;
								if(preg_match("@^https?://@", $url)==0)
								{
								    	$url='http://'.$contact_person->website_url;
								}
								
								?>
									<a href="<?=$url ?>" target="_blank"> <?= $contact_person->website_url ?></a>
									
								<?php } else {
								
									$url=$seller->site_url;
								if(preg_match("@^https?://@", $url)==0)
								{
								    	$url='http://'.$seller->site_url;
								}
								?>
									<a href="<?=$url ?>" target="_blank"> <?= $seller->site_url ?></a>
								<?php } ?>
							</h4>
						<?php } ?>

						<?php if(!empty($contact_person->preferred_contact)){ ?>
						<h4>Preferred Contact Method :<b> <?php foreach(json_decode($contact_person->preferred_contact) as $ro){ echo $ro.','; } ?> </b></h4>

						<?php } ?>
						</div>
								</div>
								
							
						</div>

					</div>
				</div>

			<?php if (!empty($seller->paypal_email)) { ?>
				<a href="#"  class="btn btn-block btn-lg  reserve_me " style="background-color:#8cc63f;color:#fff" title="">Reserve Me for $200</a>



				<!-- Modal -->
				<div class="modal fade " id="exampleModalCenterpay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered " role="document">

						<div class="modal-content">
							<form method="post" action="<?= base_url() ?>Ads/pay" >
								<?php echo $this->customlib->getCSRF(); ?>
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle"></h5>
									<button type="button" class="close reserveme_close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<div class="form-check" style="font-size: 18px;">
										<input class="form-check-input" type="radio" name="pay" id="exampleRadios1" value="1" checked>
										<label class="form-check-label" for="exampleRadios1">
											Pay Deposit
										</label>
									</div>
									<div class="form-check" style="font-size: 18px;">
										<input class="form-check-input" type="radio" name="pay" id="exampleRadios2" value="2">
										<label class="form-check-label" for="exampleRadios2">
											Pay in Full
										</label>
										<input type="hidden" name="post_id" value="<?= $result->post_id ?>">
									</div>
									<br>
									<p>Pay a deposit of $200 per item</p>
								</div>
								<div class="modal-footer">

									<button type="submit" class="btn btn-lg" style="color:#fff;width: 100%;background-color: #8cc63f !important;">Reserve Me Today</button>
								</div>
							</form>
						</div>

					</div>
				</div>

			<?php } ?>

		

		</div>
	</div>

</div>

<div class="bg-light pt-1 pb-1 mb-3">
	<div class="container text-muted" style="padding-bottom:2px;">
		<a class="font-size-13 text-muted" href="<?= base_url() ?>">MyPupCentral</a> / <a class="font-size-13 text-muted" href="<?= base_url() ?>ads/">Puppies</a> / <a href="<?= base_url() ?>ads?breed=<?= $result->category_id ?>&location=" class="font-size-13 text-muted"><?= $result->breed_name ?></a>
	</div>
</div>


<div class="container space-1">
	<div class="row">
		<div class="col-lg-7 mb-2">


			<div class="items-details">
				<ul class="nav nav-tabs" id="itemsDetailsTabs" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="item-details-tab" data-bs-toggle="tab" data-bs-target="#item-details" role="tab" aria-controls="item-details" aria-selected="true">
							<h4>About</h4>
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" role="tab" aria-controls="description" aria-selected="false">
							<h4>Family Details</h4>
						</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="family-tab" onclick="location.href='<?=base_url()?>seller/<?= $seller->slug ?>'">
							<h4>Breeder Information</h4>
						</button>
					</li>
				</ul>


				<div class="tab-content p-3 mb-3" id="itemsDetailsTabsContent">
					<div class="tab-pane show active" id="item-details" role="tabpanel" aria-labelledby="item-details-tab">
						<div class="row pb-3">
							<div class="items-details-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">



								<span class="d-block h3 mb-3">About <?= $result->title ?></span>
								<div class="py-1 mb-3 font-weight-bold" style="margin-top: -8px;color:#a90c1b;"><i class="fas fa-eye"></i> <?= $result->view_count ?> Views</div>
								<div class="row mb-4" id="subInfo">
									<div class="col-4 mb-7 mb-sm-0">
										<span class="js-cd-days d-block text-primary font-size-20 font-weight-medium"><b><?= $result->puppy_sex ?></b></span>
										<span class="d-block font-size-18 text-muted">Gender</span>
									</div>
									<div class="col-4 mb-7 mb-sm-0">
										<?php
										$firstDate = new DateTime(date('Y-m-d'));

										$secondDate = new DateTime(date("Y-m-d", strtotime($result->puppy_dob)));

										$differenceInDays = $firstDate->diff($secondDate)->days;

										$HowManyWeeks = round(($differenceInDays / 7), 0);
										// 	$HowManyWeeks = date('W', strtotime(date('Y-m-d H:i:s'))) - date('W', strtotime($result->puppy_dob));

										?>
										<span class="js-cd-hours d-block text-primary font-weight-medium font-size-20"><b><?php if ($HowManyWeeks < 1) {
																																echo 'Less than 1 Week';
																															} else {
																																echo round($HowManyWeeks, 0) . ' Weeks';
																															} ?> </b></span>
										<span class="d-block font-size-18 text-muted">Age </span>
									</div>
									<div class="col-4 mb-7 mb-sm-0">

										<span class="js-cd-hours d-block text-primary font-weight-medium font-size-20"><b>$<?= $result->asking_price ?></b></span>
										<span class="d-block font-size-18 text-muted">Price</span>
									</div>
								</div>
								<p><?= $result->description ?></p>
							</div>

						</div>
					</div>
					<div class="tab-pane" id="description" role="tabpanel" aria-labelledby="description-tab">
						<div class="row pb-3">
							<div class="family-info col-md-12 col-sm-12 col-12 enable-long-words from-wysiwyg">
								<div class="row">
									<div class="col-6 detail-line-content">

										<?php
										if (!empty($result->mother_photo)) {
										?>
											<span>
												<h4>Mother:</h4>
											</span>



											<!-- <div id="light-gallery-mother"> -->
											<a href="<?= base_url() ?>uploads/puppies/pv/wa_<?= $result->mother_photo ?>" data-fancybox="gallery" style="height: auto;">
												<img height="250px;" width="250px" src="<?= base_url() ?>uploads/puppies/pv/wa_600x600_<?= $result->mother_photo ?>" class="img-fluid" alt="<?= $result->mother_photo_alt?>">
											</a>
											<!-- </div> -->


										<?php
										} else {
										?>
											<span>
												<h4>Mother:</h4>
											</span>
											<img height="200px;" width="200px" src="<?= base_url() ?>assets/noimage.jpg" class="img-fluid">

										<?php
										}
										?>
										</div>
											<div class="col-6 detail-line-content">
										<?php
										if (!empty($result->father_photo)) {
										?>
											<span>
												<h4>Father:</h4>
											</span>
											<!-- <div id="light-gallery-father"> -->


											<a href="<?= base_url() ?>uploads/puppies/pv/wa_<?= $result->father_photo ?>" data-fancybox="gallery" style="height: auto;">
												<img height="250px;" width="250px" src="<?= base_url() ?>uploads/puppies/pv/wa_600x600_<?= $result->father_photo ?>" class="img-fluid" alt="<?= $result->father_photo_alt?>">
											</a>
											<!-- </div> -->


										<?php
										} else {
										?>
											<span>
												<h4>Father:</h4>
											</span>

											<img height="200px;" width="200px" src="<?= base_url() ?>assets/noimage.jpg" class="img-fluid">


										<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="tab-pane" id="family" role="tabpanel" aria-labelledby="family-tab">
                <div id="contact_us"></div>
						<h1 class="h3"> <?= $contact_person->full_name ?></h1>
						<h4>Breeder Id: <?= $result->user_id ?></h4>
						<h4> <b><i class="fas fa-map-marker-alt"></i> <?= $result->address ?></b></h4>


						<h4><b><i class="fas fa-phone"></i> </b> <a href="tel:<?= $contact_person->phone ?>"> <?= $contact_person->phone ?></a></h4>
						<?php if(!empty($contact_person->email)){ ?><h4><b><i class="fas fa-envelope"></i> </b> <a href="#" class="inquirymodal"> <?= $contact_person->email ?></a></h4> <?php } ?>

						<?php if (!empty($contact_person->website_url) || !empty($seller->site_url)) { ?>
							<h4><b><i class="fas fa-globe"></i> </b>
								<?php if ($contact_person->website_url) {
								$url=$contact_person->website_url;
								if(preg_match("@^https?://@", $url)==0)
								{
								    	$url='http://'.$contact_person->website_url;
								}
								
								?>
									<a href="<?=$url ?>" target="_blank"> <?= $contact_person->website_url ?></a>
								<?php } else {
								
									$url=$seller->site_url;
								if(preg_match("@^https?://@", $url)==0)
								{
								    	$url='http://'.$seller->site_url;
								}
								?>
									<a href="<?=$url ?>" target="_blank"> <?= $seller->site_url ?></a>
								<?php } ?>
							</h4>
						<?php } ?>
						<?php if (!empty($seller->youtube_url)) { ?>
							<h4><b><i class="fab fa-youtube"></i> </b>
								<a href="<?= $seller->youtube_url ?>" target="_blank"> <?= $seller->youtube_url ?></a>
							</h4>
						<?php } ?>

						<?php if(!empty($contact_person->preferred_contact)){ ?>
							<br>
						<p>Preferred Contact Method :<b> <?php foreach(json_decode($contact_person->preferred_contact) as $ro){ echo $ro.','; } ?> </b></p>

						<?php } ?>

						<p><?= $seller->description ?></p>

<br>

						<!--<div class="text-center"> <span class="d-block h3 mb-4"> Review Breeder</span></div>-->
						<div class="row" id="reviews_div">



							<div class="col-md-12">
							


								<?php if ($total > 0) { ?>
									<div class="row">
										<div class="col-sm-12">
											<div class="rating-block">
												<div class="text-center">	<h4>Breeder Reviews</h4>
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
										</div>
										<!--<div class="col-sm-6">-->
										<!--	<h4>Rating breakdown</h4>-->
										<!--	<div class="pull-left">-->
										<!--		<div class="pull-left" style="width:35px; line-height:1;">-->
										<!--			<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>-->
										<!--		</div>-->
										<!--		<div class="pull-left" style="width:180px;">-->
										<!--			<div class="progress" style="height:9px; margin:8px 0;">-->
										<!--				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star5 * 100) / $total; ?>% ; background: green;">-->
										<!--					<span class="sr-only">80% Complete (danger)</span>-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="pull-right" style="margin-left:10px;"><?= $star5 ?></div>-->
										<!--	</div>-->
										<!--	<div class="pull-left">-->
										<!--		<div class="pull-left" style="width:35px; line-height:1;">-->
										<!--			<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>-->
										<!--		</div>-->
										<!--		<div class="pull-left" style="width:180px;">-->
										<!--			<div class="progress" style="height:9px; margin:8px 0;">-->
										<!--				<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star4 * 100) / $total; ?>%;    background-color: #428bca;">-->
										<!--					<span class="sr-only">80% Complete (danger)</span>-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="pull-right" style="margin-left:10px;"><?= $star4 ?></div>-->
										<!--	</div>-->
										<!--	<div class="pull-left">-->
										<!--		<div class="pull-left" style="width:35px; line-height:1;">-->
										<!--			<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>-->
										<!--		</div>-->
										<!--		<div class="pull-left" style="width:180px;">-->
										<!--			<div class="progress" style="height:9px; margin:8px 0;">-->
										<!--				<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star3 * 100) / $total; ?>%;    background-color: #5bc0de;">-->
										<!--					<span class="sr-only">80% Complete (danger)</span>-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="pull-right" style="margin-left:10px;"><?= $star3 ?></div>-->
										<!--	</div>-->
										<!--	<div class="pull-left">-->
										<!--		<div class="pull-left" style="width:35px; line-height:1;">-->
										<!--			<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>-->
										<!--		</div>-->
										<!--		<div class="pull-left" style="width:180px;">-->
										<!--			<div class="progress" style="height:9px; margin:8px 0;">-->
										<!--				<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star2 * 100) / $total; ?>%;background-color: #f0ad4e;">-->
										<!--					<span class="sr-only">80% Complete (danger)</span>-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="pull-right" style="margin-left:10px;"><?= $star2 ?></div>-->
										<!--	</div>-->
										<!--	<div class="pull-left">-->
										<!--		<div class="pull-left" style="width:35px; line-height:1;">-->
										<!--			<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>-->
										<!--		</div>-->
										<!--		<div class="pull-left" style="width:180px;">-->
										<!--			<div class="progress" style="height:9px; margin:8px 0;">-->
										<!--				<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: <?= ($star1 * 100) / $total; ?>%;    background-color: #d9534f;">-->
										<!--					<span class="sr-only">80% Complete (danger)</span>-->
										<!--				</div>-->
										<!--			</div>-->
										<!--		</div>-->
										<!--		<div class="pull-right" style="margin-left:10px;"><?= $star1 ?></div>-->
										<!--	</div>-->
										<!--</div>-->

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

								<?php } else { ?>

									<div class="text-center">
										<h4 class="" style="color:#8cc63f !important"><br><Br>Be the first to write a review.</h4>
									</div>
								<?php } ?>
								
								<div class="text-center"> <span class="d-block h3 mb-4"> Review Breeder</span></div>
								
									<form method="post" action="<?= base_url() ?>Ads/save_review/<?= $result->post_id ?>" id="review_form1" enctype="multipart/form-data">
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
										<label class="col-md-3 col-form-label">State <sup>*</sup></label>
										<div class="col-md-8">
											<input name="state" placeholder="State" class="form-control input-md" type="text" value="" required="">
										</div>
									</div>
									<div class="row mb-3 required">
										<label class="col-md-3 col-form-label">Email <sup>*</sup></label>
										<div class="col-md-8">
											<input name="email" placeholder="Email" class="form-control input-md" type="text" value="" required="">
										</div>
									</div>
									
									<div class="row mb-3 required">
										<label class="col-md-3 col-form-label">Description</label>
										<div class="col-md-8">
											<textarea class="form-control" name="message" placeholder="Description" maxlength="1000" rows="5"></textarea>
										</div>
									</div>
									<div class="row mb-3 required">
										<label class="col-md-3 col-form-label">Image </label>
										<div class="col-md-8">
											<input name="img" placeholder="Image" class="form-control input-md" type="file" />
										</div>
									</div>
									
									<br>
                     <div class="row pt-3">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                    <div id="captcha_div">
                    
                    </div>
                      </div>
                    </div>
                   
                     
                     <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="text-sm"><span class="font-medium">Enter Captcha</span></div>  
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 col-sm-12" style="font-size: 16px;">
                                <input type="text" name="captcha"  placeholder="Enter Captcha Here" class="form-control w-75" required />
                            </div>
                        </div>
                    </div>
                    <br>
									<div class="text-center">
										
										 <button   data-sitekey="6Lfy9i0nAAAAAOyFg5Z1uP7Yk6tyt_kLvQuWkAJN"   data-callback='onSubmit'   data-action='submit'  class=" g-recaptcha btn" style="background-color:#8cc63f;color:#fff"> Submit </button>
                   
									</div>

								</form>
							</div>

						</div>

					</div>

				</div>
				<!-- /.tab content -->

				<!-- <div class="content-footer text-start">

							<a href="#contactUser" class="btn btn-default" data-bs-toggle="modal"><i class="far fa-envelope-open"></i> Send a message</a>
						</div> -->
			</div>



		</div>
		<div class="col-lg-5">
			<span class="d-block h3 mb-4">Additional Details</span>

			<div class="row no-gutters">
				<div class="col-6">
					<ul class="list-unstyled" style="margin-bottom:0;">
						<li class="media align-items-center pb-2" style="display:flex">

							<svg style="width: 30px;
    margin-right: 10px;
    height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
								<!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
								<path d="M352 111.1c22.09 0 40-17.88 40-39.97S352 0 352 0s-40 49.91-40 72S329.9 111.1 352 111.1zM224 111.1c22.09 0 40-17.88 40-39.97S224 0 224 0S184 49.91 184 72S201.9 111.1 224 111.1zM383.1 223.1L384 160c0-8.836-7.164-16-16-16h-32C327.2 144 320 151.2 320 160v64h-64V160c0-8.836-7.164-16-16-16h-32C199.2 144 192 151.2 192 160v64H128V160c0-8.836-7.164-16-16-16h-32C71.16 144 64 151.2 64 160v63.97c-35.35 0-64 28.65-64 63.1v68.7c9.814 6.102 21.39 11.33 32 11.33c20.64 0 45.05-19.73 52.7-27.33c6.25-6.219 16.34-6.219 22.59 0C114.1 348.3 139.4 367.1 160 367.1s45.05-19.73 52.7-27.33c6.25-6.219 16.34-6.219 22.59 0C242.1 348.3 267.4 367.1 288 367.1s45.05-19.73 52.7-27.33c6.25-6.219 16.34-6.219 22.59 0C370.1 348.3 395.4 367.1 416 367.1c10.61 0 22.19-5.227 32-11.33V287.1C448 252.6 419.3 223.1 383.1 223.1zM352 373.3c-13.75 10.95-38.03 26.66-64 26.66s-50.25-15.7-64-26.66c-13.75 10.95-38.03 26.66-64 26.66s-50.25-15.7-64-26.66c-13.75 10.95-38.03 26.66-64 26.66c-11.27 0-22.09-3.121-32-7.377v87.38C0 497.7 14.33 512 32 512h384c17.67 0 32-14.33 32-32v-87.38c-9.91 4.256-20.73 7.377-32 7.377C390 399.1 365.8 384.3 352 373.3zM96 111.1c22.09 0 40-17.88 40-39.97S96 0 96 0S56 49.91 56 72S73.91 111.1 96 111.1z" />
							</svg>
							<div class="media-body">

								<span class="font-weight-medium font-size-16 d-block">Date of Birth:</span>
								<small class="text-secondary"><?= date('m-d-Y', strtotime($result->puppy_dob)) ?></small>
							</div>
						</li>

						<li class="dropdown-divider"></li>

						<li class="media align-items-center pb-2" style="display:flex">

							<svg style="width: 30px;
    margin-right: 10px;
    height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
								<!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
								<path d="M332.7 19.85C334.6 8.395 344.5 0 356.1 0C363.6 0 370.6 3.52 375.1 9.502L392 32H444.1C456.8 32 469.1 37.06 478.1 46.06L496 64H552C565.3 64 576 74.75 576 88V112C576 156.2 540.2 192 496 192H426.7L421.6 222.5L309.6 158.5L332.7 19.85zM448 64C439.2 64 432 71.16 432 80C432 88.84 439.2 96 448 96C456.8 96 464 88.84 464 80C464 71.16 456.8 64 448 64zM416 256.1V480C416 497.7 401.7 512 384 512H352C334.3 512 320 497.7 320 480V364.8C295.1 377.1 268.8 384 240 384C211.2 384 184 377.1 160 364.8V480C160 497.7 145.7 512 128 512H96C78.33 512 64 497.7 64 480V249.8C35.23 238.9 12.64 214.5 4.836 183.3L.9558 167.8C-3.331 150.6 7.094 133.2 24.24 128.1C41.38 124.7 58.76 135.1 63.05 152.2L66.93 167.8C70.49 182 83.29 191.1 97.97 191.1H303.8L416 256.1z" />
							</svg>
							<!--<i class="fas fa-dog text-muted text-center" style="width:45px;"></i>-->
							<!--<span class="fa fa-weight fa-2x pr-3 " ></span>-->
							<div class="media-body">
								<span class="font-weight-medium font-size-16 d-block">Size:</span>
								<small class="text-secondary"><?= $result->puppy_size ?></small>
							</div>
						</li>

						<li class="dropdown-divider"></li>

						<li class="media align-items-center pb-2" style="display:flex">

							<svg style="width: 30px;
    margin-right: 10px;
    height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
								<!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
								<path d="M48 32H197.5C214.5 32 230.7 38.74 242.7 50.75L418.7 226.7C443.7 251.7 443.7 292.3 418.7 317.3L285.3 450.7C260.3 475.7 219.7 475.7 194.7 450.7L18.75 274.7C6.743 262.7 0 246.5 0 229.5V80C0 53.49 21.49 32 48 32L48 32zM112 176C129.7 176 144 161.7 144 144C144 126.3 129.7 112 112 112C94.33 112 80 126.3 80 144C80 161.7 94.33 176 112 176z" />
							</svg>
							<div class="media-body">
								<span class="font-weight-medium font-size-16 d-block">Breed:</span>
								<small class="text-secondary"><?= $result->breed_name ?> </small>
							</div>
						</li>
						
						
					</ul>
				</div>


				<div class="col-6">
					<ul class="list-unstyled" style="margin-bottom:0;">
						<li class="media align-items-center pb-2" style="display:flex">

							<svg style="width: 30px;
    margin-right: 10px;
    height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
								<!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
								<path d="M160 32V64H288V32C288 14.33 302.3 0 320 0C337.7 0 352 14.33 352 32V64H400C426.5 64 448 85.49 448 112V160H0V112C0 85.49 21.49 64 48 64H96V32C96 14.33 110.3 0 128 0C145.7 0 160 14.33 160 32zM0 192H448V464C448 490.5 426.5 512 400 512H48C21.49 512 0 490.5 0 464V192zM64 304C64 312.8 71.16 320 80 320H112C120.8 320 128 312.8 128 304V272C128 263.2 120.8 256 112 256H80C71.16 256 64 263.2 64 272V304zM192 304C192 312.8 199.2 320 208 320H240C248.8 320 256 312.8 256 304V272C256 263.2 248.8 256 240 256H208C199.2 256 192 263.2 192 272V304zM336 256C327.2 256 320 263.2 320 272V304C320 312.8 327.2 320 336 320H368C376.8 320 384 312.8 384 304V272C384 263.2 376.8 256 368 256H336zM64 432C64 440.8 71.16 448 80 448H112C120.8 448 128 440.8 128 432V400C128 391.2 120.8 384 112 384H80C71.16 384 64 391.2 64 400V432zM208 384C199.2 384 192 391.2 192 400V432C192 440.8 199.2 448 208 448H240C248.8 448 256 440.8 256 432V400C256 391.2 248.8 384 240 384H208zM320 432C320 440.8 327.2 448 336 448H368C376.8 448 384 440.8 384 432V400C384 391.2 376.8 384 368 384H336C327.2 384 320 391.2 320 400V432z" />
							</svg>
							<div class="media-body">
								<span class="font-weight-medium font-size-16 d-block">Available Date:</span>
								<small class="text-secondary"><?= date('m-d-Y', strtotime($result->available_date)) ?></small>
							</div>
						</li>


						<li class="dropdown-divider"></li>

						<li class="media align-items-center pb-2" style="display:flex">

							<svg style="width: 30px;
    margin-right: 10px;
    height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
								<!--! Font Awesome Pro 6.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
								<path d="M256 384H208v-35.05C289.9 333.9 352 262.3 352 176c0-97.2-78.8-176-176-176c-97.2 0-176 78.8-176 176c0 86.26 62.1 157.9 144 172.1v35.05H96c-8.836 0-16 7.162-16 16v32c0 8.836 7.164 16 16 16h48v48c0 8.836 7.164 16 16 16h32c8.838 0 16-7.164 16-16v-48H256c8.838 0 16-7.164 16-16v-32C272 391.2 264.8 384 256 384zM176 272c-52.93 0-96-43.07-96-96c0-52.94 43.07-96 96-96c52.94 0 96 43.06 96 96C272 228.9 228.9 272 176 272zM624 0h-112.4c-21.38 0-32.09 25.85-16.97 40.97l29.56 29.56l-24.55 24.55c-29.97-20.66-64.81-31.05-99.74-31.05c-15.18 0-30.42 2.225-45.19 6.132c13.55 22.8 22.82 48.36 26.82 75.67c6.088-1.184 12.27-1.785 18.45-1.785c24.58 0 49.17 9.357 67.88 28.07c37.43 37.43 37.43 98.33 0 135.8c-18.71 18.71-43.3 28.07-67.88 28.07c-23.55 0-46.96-8.832-65.35-26.01c-15.92 18.84-34.93 35.1-56.75 47.35c11.45 5.898 20.17 16.3 23.97 28.82C331.5 406 365.7 416 400 416c45.04 0 90.08-17.18 124.5-51.55c60.99-60.99 67.73-155.6 20.47-224.1l24.55-24.55l29.56 29.56c4.889 4.889 10.9 7.078 16.8 7.078C628.2 152.4 640 142.8 640 128.4V16C640 7.164 632.8 0 624 0z" />
							</svg>
							<div class="media-body">
								<span class="font-weight-medium font-size-16 d-block">Gender:</span>
								<small class="text-secondary"><?= $result->puppy_sex ?></small>
							</div>
						</li>

						<li class="dropdown-divider"></li>
						<?php if((!empty($result->registration) && $result->registration!='null') || !empty($result->other_registration)){ ?>
						<li class="media align-items-center pb-2" style="display:flex">

							<svg style="width: 30px;
    margin-right: 10px;
    height: 30px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M336 64h-53.88C268.9 26.8 233.7 0 192 0S115.1 26.8 101.9 64H48C21.5 64 0 85.48 0 112v352C0 490.5 21.5 512 48 512h288c26.5 0 48-21.48 48-48v-352C384 85.48 362.5 64 336 64zM192 64c17.67 0 32 14.33 32 32s-14.33 32-32 32S160 113.7 160 96S174.3 64 192 64zM282.9 262.8l-88 112c-4.047 5.156-10.02 8.438-16.53 9.062C177.6 383.1 176.8 384 176 384c-5.703 0-11.25-2.031-15.62-5.781l-56-48c-10.06-8.625-11.22-23.78-2.594-33.84c8.609-10.06 23.77-11.22 33.84-2.594l36.98 31.69l72.52-92.28c8.188-10.44 23.3-12.22 33.7-4.062C289.3 237.3 291.1 252.4 282.9 262.8z"/></svg>
							
							<div class="media-body">
								<span class="font-weight-medium font-size-16 d-block">Registration:</span>
								<?php $reg=json_decode($result->registration ); foreach($reg as $dd) { ?>
								<small class="text-secondary"><?= $dd ?> registrable </small>
								<?php } ?>
								<small class="text-secondary"><?= $result->other_registration ?></small>
							</div>
						</li>
						<?php } ?>


					</ul>
				
			
				</div>
				
					
						
			
			</div>
	<?php if ($result->training_package==1) { ?>
				<a href="<?=base_url()?>training"  class="btn btn-block btn-lg btn-light-blue  mt-3" title="">See Training Options</a>
				<?php } ?>

			<!--<p class="mb-4"><small class="text-muted">*Weight provided at time of posting, may not be up to date as puppy grows</small></p>-->


		</div>
	</div>

</div>







<div class="modal fade bd-example-modal-lg" id="exampleModalCenterenquiry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 999999999999;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
				<button type="button" class="close inquirymodalclose" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div id="dvContact">
					<div class="pl-1 pr-1 pl-md-2 pr-md-2 pl-lg-4 pr-lg-4">
						<form role="form" method="POST" action="<?= base_url() ?>ad/addenquiry">
							<?php echo $this->customlib->getCSRF(); ?>

							<div class="mb-3 required">
								<label for="from_name" class="control-label">Name <sup>*</sup></label>
								<div class="input-group">
									<input name="from_name" type="text" class="form-control" placeholder="Your name">
								</div>
							</div>
							<input type="hidden" value="<?= $result->title ?>" name="puppy_name">
							<input type="hidden" value="<?= $result->post_id ?>" name="post_id">

							<div class="mb-3 required">
								<label for="from_email" class="control-label">E-mail
								</label>
								<div class="input-group">
									<span class="input-group-text"><i class="icon-mail"></i></span>
									<input id="from_email" name="from_email" type="text" class="form-control" placeholder="Enter your Email Id">
								</div>
							</div>


							<div class="mb-3 required">
								<label for="phone" class="control-label">Phone Number
								</label>
								<div class="input-group">
									<span id="phoneCountry" class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
									<input id="from_phone" name="from_phone" type="text" maxlength="60" class="form-control" placeholder="Phone Number">
								</div>
							</div>


							<div class="mb-3 required">
								<label for="body" class="control-label">
									Message <span class="text-count">(500 max)</span> <sup>*</sup>
								</label>
								<textarea id="body" name="body" rows="5" class="form-control required" style="height: 150px;" placeholder="Your message here..."></textarea>
							</div>

							<input type="hidden" name="breeder_name" value="<?= $contact_person->full_name ?>">
							<input name="breeder_email" type="hidden" value="<?= $contact_person->email ?>">
							<input name="breeder_id" type="hidden" value="<?= $result->user_id ?>">
							<input name="contact_id" type="hidden" value="<?= $contact_person->id ?>">
							<input type="hidden" name="country_code" value="US">
							<input type="hidden" name="post_id" id="post_id" value="<?= $result->id ?>">
							<input type="hidden" name="messageForm" value="1">
							
							
									<br>
                     <div class="row pt-3">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-9">
                    <div id="captcha_div2">
                    
                    </div>
                      </div>
                    </div>
                   
                     
                     <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="text-sm"><span class="font-medium">Enter Captcha</span></div>  
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 col-sm-12" style="font-size: 16px;">
                                <input type="text" name="captcha"  placeholder="Enter Captcha Here" class="form-control w-75" required />
                            </div>
                        </div>
                    </div>
                    <br>
                    

							<button id="btnSubmit" type="submit" value="ContactUs" class="btn " style="background-color:#8cc63f;color:#fff" title="Submit Request">Send Message</button>
						</form>
					</div>
				</div>

			</div>

		</div>
	</div>
</div>



<div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index:9999999">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle"></h5>
				<button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<video controls width="100%" class="modalvideo">
					<source src="" type="video/mp4">
				</video>
			</div>

		</div>
	</div>
</div>



<section class="mt-3 mb-5">
	<div class="container">
		<div class="text-center">
			<h2 class="mb-4 mt-2" style="color: #8cc63f;    line-height: 36px;"><b>Other Puppies Available From This Breeder</b></h2>
		</div>

		<div class="col-xl-12">
			<div class="category-list make-grid noSideBar">
				<div id="postsList" class="category-list-wrapper posts-wrapper row no-margin">
					<div class="row">
						<?php
						$bookmark = array();
						$count = 0;
						$buk = $this->input->cookie('bookmarks');
						$bookmark = explode(',', $buk);
						if (!empty($premium_ads)) {
							$ccn = 0;
							foreach ($premium_ads as $rows => $row) {

								$ccnt++;
								if ($ccnt == 1 || fmod($ccnt, 5) == 1) {
									echo '<div class="row">';
								}

								// foreach(array_reverse($premium_ads) as $rows => $innerArray){
								// 			foreach($innerArray as $innerRow => $row){
						?>
								<div class="col-sm-6 col-md-3 col-lg">
									<div class="item-list p-0 m-3" style="width: 100%;">

										<div class="row aqr">
											<div class="col-sm-2 col-12 no-padding photobox">
												<div class="add-image w-100">
													<span class="photo-count"><i class="fa fa-images"></i> 3 </span>
													<a href="<?= base_url() ?>ad/<?= $row->ad_id ?>">
														<div class="postImg-slick d-flex gap-4">
															<?php if (!empty($row->featured_video)) { ?>
																<div class="videoSlate" style="width:100%; position:relative; background-color:#000; ">
																	<video class="thevideo" muted loop style="width:100%;height:200px;margin: 0px auto;">
																		<source src="<?php if ($row->featured_video_from == 'puppyverify.com') {
																							echo PV;
																						} else {
																							echo NS;
																						} ?>uploads/puppies/<?= $row->featured_video ?>" type="video/mp4">
																		Your browser does not support the video tag.
																	</video>
																	<img src="<?= base_url() ?>assets/watermark.png" style="position:absolute; right:10px; top:10px; opacity:0.5; width:60px">
																</div>
															<?php } ?>

															<?php if (!empty($row->featured_image)) { ?>

																<img src="<?php if ($row->featured_image_from == 'puppyverify.com') {
																				echo PV;
																			} else {
																				echo NS;
																			} ?>uploads/puppies/pv/thumb_<?= $row->featured_image ?>" style="
    width: 100%;
    object-fit: cover;
    min-height: 200px" class="lazyload thumbnail no-margin" alt="<?= $row->featured_alt_tag ?>" data-nsfw-filter-status="sfw">




															<?php } ?>
														</div>
													</a>
												</div>
											</div>

											<div class="col-12 add-desc-box pl-2" style="max-width: 100%;width:100%;padding-left:10px;padding-right: 10px;">
												<div class="items-details">

													<div class="ribbon-wrapper">
														<div class="glow-out">
															<div class="glow">&nbsp;</div>
														</div>
														<div class="ribbon-front">Premium</div>
														<div class="ribbon-edge-topleft"></div>
														<div class="ribbon-edge-topright"></div>
														<div class="ribbon-edge-bottomleft"></div>

													</div>

													<div class="row" style="width: 100%;">
														<div class="col-12 " style="padding: 10px 0px 0px;">
															<span class="item-location">

																<span> <?= $row->breed_name ?></span>


															</span>
														</div>
														<div class="col-12" style=" padding: 0px;">
															<h5 class="add-title">
																<a href="<?= base_url() ?>ad/<?= $row->id ?>">
																	<?= $row->title ?>
																</a>
															</h5>
														</div>
														<div class="col-12">
															<h2 class="item-price pb-0" style=" padding: 0px;display: flex;align-items: center;">
																$<?= $row->asking_price ?> </h2>
														</div>
														<div class="col-12" style="padding: 10px 0px 0px;">
															<span class="item-location">
																<i class="icon-location-2"></i>&nbsp;

																<span> <?= $row->address ?></span>


															</span>
														</div>
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
														<a class="btn btn-default btn-sm make-favorite <?php if (in_array($row->post_id, $bookmark)) {
																											echo 'removebookmark';
																										} else {
																											echo 'addbookmark';
																										} ?>" id="<?= $row->post_id ?>">
															<i class="far fa-heart"></i> <span>Save</span>
														</a>
													</div>
												</div>
											</div>


										</div>
									</div>
								</div>


						<?php

								if ($ccnt == 5 || fmod($ccnt, 5) == 0) {
									echo '</div>';
								}
							}
							if (fmod($ccnt, 5) != 0) {
								for ($i = 0; $i < 5 - fmod($ccnt, 5); $i++) {
									echo '<div class="col-sm-6 col-md-3 col-lg"></div>';
								}
							}
						}
						?>
					</div>

					<?php
					$count = 0;
					$ccnt = 0;
					foreach ($ads as $row) {
						$ccnt++;
						if ($ccnt == 1 || fmod($ccnt, 5) == 1) {
							echo '<div class="row">';
						}

					?>
						<div class="col-sm-6 col-md-3 col-lg">
							<div class="item-list p-0 m-3" style="width: 100%;">

								<div class="row aqr">
									<div class="col-sm-2 col-12 no-padding photobox">
										<div class="add-image w-100">
											<span class="photo-count"><i class="fa fa-images"></i> 3 </span>
											<a href="<?= base_url() ?>ad/<?= $row->post_id ?>">
												<div class="postImg-slick d-flex gap-4">
													<?php if (!empty($row->featured_video)) { ?>
														<div class="videoSlate" style="width:100%; position:relative; background-color:#000; ">
															<video class="thevideo" muted loop style="width:100%;height:200px;margin: 0px auto;">
																<source src="<?php if ($row->featured_video_from == 'puppyverify.com') {
																					echo PV;
																				} else {
																					echo NS;
																				} ?>uploads/puppies/<?= $row->featured_video ?>" type="video/mp4">
																Your browser does not support the video tag.
															</video>
															<img src="<?= base_url() ?>assets/watermark.png" style="position:absolute; right:10px; top:10px; opacity:0.5; width:60px">
														</div>
													<?php } ?>

													<?php if (!empty($row->featured_image)) { ?>


														<img src="<?php if ($row->featured_image_from == 'puppyverify.com') {
																		echo PV;
																	} else {
																		echo NS;
																	} ?>uploads/puppies/pv/thumb_<?= $row->featured_image ?>" style=" width: 100%; object-fit: cover;min-height: 200px" class="lazyload thumbnail no-margin" alt="<?= $row->featured_alt_tag?>" data-nsfw-filter-status="sfw">




													<?php } ?>
												</div>
											</a>
										</div>
									</div>

									<div class="col-12 add-desc-box pl-2" style="width:100%;max-width: 100%;padding-left:10px;padding-right: 10px;">
										<div class="items-details">
											<div class="row" style="width: 100%;">
												<div class="col-12 " style="padding: 10px 0px 0px;">
													<span class="item-location">

														<span> <?= $row->breed_name ?></span>


													</span>
												</div>
												<div class="col-12" style=" padding: 0px;">
													<h5 class="add-title">
														<a href="<?= base_url() ?>ad/<?= $row->post_id ?>"> <?= $row->title ?>
														</a>
													</h5>
												</div>
												<div class="col-12">
													<h2 class="item-price pb-0" style=" padding: 0px;display: flex;align-items: center;">
														$<?= $row->asking_price ?> </h2>
												</div>
												<div class="col-12 " style="padding: 10px 0px 0px;">
													<span class="item-location">
														<i class="icon-location-2"></i>&nbsp;

														<span> <?= $row->address ?></span>


													</span>
												</div>
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
												<a class="btn btn-default btn-sm make-favorite <?php if (in_array($row->post_id, $bookmark)) {
																									echo 'removebookmark';
																								} else {
																									echo 'addbookmark';
																								} ?>" id="<?= $row->post_id ?>">
													<i class="far fa-heart"></i> <span>Save</span>
												</a>
											</div>
										</div>
									</div>


								</div>
							</div>
						</div>

					<?php
						if ($ccnt == 5 || fmod($ccnt, 5) == 0) {
							echo '</div>';
						}
					}
					if (fmod($ccnt, 5) != 0) {
						for ($i = 0; $i < 5 - fmod($ccnt, 5); $i++) {
							echo '<div class="col-sm-6 col-md-3 col-lg"></div>';
						}
					}

					?>




					<div style="clear: both"></div>

					<div class="mb20 text-center">
						<!--<a href="<?= base_url() ?>assets/front/search" class="btn btn-default mt10">-->
						<!--	<i class="fa fa-arrow-circle-right"></i> View more-->
						<!--</a>-->


					</div>
				</div>
			</div>
		</div>

	</div>
</section>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>

<script src="<?php echo base_url('assets/') ?>js/lightgallery.js"></script>

<script>
	$(document).ready(function() {

		$("#response").fadeOut(1000);

		$.post('<?= base_url("ads/setviewcount") ?>', {
				'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
				id: $('#post_id').val()
			},
			function(data) {
				console.log(data);
			});
	});
</script>


<script>
	var swiper = new Swiper(".mySwiper", {
		slidesPerView: 4,
		// centeredSlides: true,
		spaceBetween: 20,
		grabCursor: true,
		loop: true,
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 2,
				spaceBetween: 20
			},
			// when window width is >= 480px
			480: {
				slidesPerView: 3,
				spaceBetween: 30
			},
			// when window width is >= 640px
			640: {
				slidesPerView: 4,
				spaceBetween: 40
			}
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true,
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev",
		},
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
				swal("Your inquiry has been submitted!", "Thank you for your time!", "success");
			});
		</script>
	<?php } else if ('enquiry_error' == 'enquiry_error') { ?>


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

	$(document).ready(function() {
		$('.thevideo_modal').click(function(e) {
			e.preventDefault();


			videoSRC = $(this).attr("data-video");
			$('#exampleModalCenter').modal('show');

			var video = $(".modalvideo");
			video.find("source").attr("src", videoSRC);
			video.get(0).load();
			// video.get(0).play();


		});

		$('.modal_close').click(function(e) {
			e.preventDefault();
			$('#exampleModalCenter').modal('hide');
		});
	});


	$(document).ready(function() {
		$('.reserve_me').click(function(e) {
			e.preventDefault();
			$('#exampleModalCenterpay').modal('show');
		});

		$('.reserveme_close').click(function(e) {
			e.preventDefault();
			$('#exampleModalCenterpay').modal('hide');
		});

		$('.inquirymodal').click(function(e) {
			e.preventDefault();
			$('#exampleModalCenterenquiry').modal('show');
		});

		$('.inquirymodalclose').click(function(e) {
			e.preventDefault();
			$('#exampleModalCenterenquiry').modal('hide');
		});

    	$('.cntct').click(function(e) {
    $('#family-tab').trigger('click');
    	});
	});


	$('.contact_modal').click(function(e) {
			e.preventDefault();
			$('#exampleModalcontact').modal('show');
		});

		$('.contact_modal_close').click(function(e) {
			e.preventDefault();
			$('#exampleModalcontact').modal('hide');
		});

	
</script>