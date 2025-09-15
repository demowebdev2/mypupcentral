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

<style>
.sellerimg{
    border: 5px solid #ffb553;
  max-height: 350px;
  width: auto;
}

</style>

<style>
    
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




<div class="main-container">
    <div class="container">
    
        <div class="seller_box mt-2 mb-5 pt-5 pb-5 bg-light">
        <div class="row">
            <div class="col-md-5">
                <div class="p-2">
                <center>
                      <?php if (!empty($seller->pofile_photo) ) {   ?>
                       <img src="<?php echo base_url(); ?>uploads/breeders/<?= $seller->pofile_photo ?>" class="img sellerimg">
                      <?php } else{  ?>
                <img src="<?=base_url()?>assets/noimageseller.png" class="img sellerimg">
                <?php } ?>
                </center>
                </div>
            
            </div>
            
            <div class="col-md-7">
                
                	<h1 class="h3"> <?= $seller->name ?></h1>
						<h4>Breeder Id: <?= $seller->id ?></h4>
						<h4> <b><i class="fas fa-map-marker-alt"></i> <?= $seller->state ?></b></h4>


						<h4><b><i class="fas fa-phone"></i> </b> <a href="tel:<?= $seller->phone ?>"> <?= $seller->phone ?></a></h4>
						<?php if(!empty($seller->email)){ ?><h4><b><i class="fas fa-envelope"></i> </b> <a href="#" class="inquirymodal"> <?= $seller->email ?></a></h4> <?php } ?>

						<?php if ( !empty($seller->site_url)) { ?>
							<h4><b><i class="fas fa-globe"></i> </b>
								<?php if ($seller->site_url) {
								
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
            
            </div>
            
        </div>
        </div>
        
   <script>
    function toggleReviewList() {
        $('#reviewlist').toggleClass('d-none'); // Toggle the visibility of review list
        if (!$('#reviewform').hasClass('d-none')) {
            $('#reviewform').addClass('d-none'); // Ensure the review form is hidden if the review list is shown
        }
    }

    function toggleReviewForm() {
        $('#reviewform').toggleClass('d-none'); // Toggle the visibility of review form
        if (!$('#reviewlist').hasClass('d-none')) {
            $('#reviewlist').addClass('d-none'); // Ensure the review list is hidden if the review form is shown
        }
    }
</script>
        <div class="row">
            <div class="col-md-6">
               <button class="btn btn-primary btn-lg w-100 mb-2"  onclick="toggleReviewList()">Read Seller Reviews</button>
            
            </div>
            
            <div class="col-md-6">
            <button class="btn w-100 btn-block btn-lg mb-2" style="background-color:#ffb553;color:#fff" onclick="toggleReviewForm()">Review This Seller</button>
            </div>
            
        </div>
        
          <div class="row">
              <div class="col-md-12">
                  <div id="reviewlist" class="d-none">
                      
                      
								<?php if ($total > 0) { ?>
									<div class="row">
										<div class="col-sm-12">
											<div class="rating-block">
												<div class="text-center">	<h4>Seller Reviews</h4>
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
										<h4 class="" style="color:#8cc63f !important"><br><Br>Be the first to write a review. <br> <br>
										<a onclick="toggleReviewForm()">Click Here</a>
										</h4>
									</div>
								<?php } ?>
								
								
								
                  </div>
                  
                  
                  <div id="reviewform" class="d-none mt-5 mb-5">
                      <div class="row">
                          <div class="col-md-2"></div>
                          <div class="col-md-8">
                             
                      	<div class="text-center"> <span class="d-block h3 mb-4"> Review Seller</span></div>
								
									<form method="post" action="<?= base_url() ?>Ads/save_review/<?= $result->post_id ?>" id="review_form1" enctype="multipart/form-data">
									<?php echo $this->customlib->getCSRF(); ?>
									<input type="hidden" name="url" value="<?=$slug?>" >
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
										<input type="hidden" name="id" value="<?= $seller->id ?>">
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
                                <div class="col-md-2"></div>
                      </div>
                      
                  </div>
                  
              </div>
              
        </div>
        
        
        <section class="mt-3 mb-5">
	<div class="container">
         <div class="row">
            <div class="col-md-12">
        <div class="text-center">
			<h2 class="mb-4 mt-5" style="color: #8cc63f;    line-height: 36px;"><b> Puppies Available From This Seller</b></h2>
		</div>
		
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
         </div>
         </section>
        
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
	<input type="hidden" name="url" value="<?=$slug?>" >
							<div class="mb-3 required">
								<label for="from_name" class="control-label">Name <sup>*</sup></label>
								<div class="input-group">
									<input name="from_name" type="text" class="form-control" placeholder="Your name">
								</div>
							</div>
						
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

							<input type="hidden" name="breeder_name" value="<?=$seller->name ?>">
							<input name="breeder_email" type="hidden" value="<?=$seller->email ?>">
							<input name="breeder_id" type="hidden" value="<?= $result->user_id ?>">
							<input name="contact_id" type="hidden" value="<?= $seller->id ?>">
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
					id: "<?= $seller->id ?>"
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
