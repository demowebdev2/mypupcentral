<style>
	.incss-new-arrivals {
		font-weight: bold !important;
		font-size: 35px;
	}

	.incss-fs15px {
		font-size: 15px
	}

	.incssvideostate {
		width: 100%;
		position: relative;
		background-color: #000;
	}

	.incssthevideo {
		width: 100%;
		height: 200px;
		margin: 0px auto;
	}

	.incss-watermark {
		position: absolute;
		right: 10px;
		top: 10px;
		opacity: 0.5;
		width: 60px
	}

	.incss-thumb {

		width: 100%;
		object-fit: cover;
		min-height: 200px
	}

	.incss-add-desc-box {
		max-width: 100%;
		width: 100%;
		padding-left: 10px;
		padding-right: 10px;
	}

	.incss-item-price {
		padding: 0px;
		display: flex;
		align-items: center;
	}

	.incss-price-box {
		padding-right: 10px;
		white-space: nowrap;
		max-width: 30%;
		align-items: center;
	}

	.incss-add-desc-box {
		width: 100%;
		max-width: 100%;
		padding-left: 10px;
		padding-right: 10px;
	}

	.incss-clear-both {
		clear: both;
	}

	.incss-w-auto {
		width: auto;
	}

	.incss-ribbon-front {
		background-color: #8cc63f !important;
		width: 150px !important
	}

	.incss-ribbon-edge-topleft {
		border-color: transparent #8cc63f transparent transparent;
	}

	@media screen and (max-width:991px) {
		.category-list.make-grid .item-list {
			width: 50% !important;
		}
	}
</style>


<div class="p-0 mt-lg-4 mt-md-3 mt-5"></div>
<div class="container">
	<div class="col-xl-12 content-box layout-section">
		<div class="row row-featured row-featured-category">

			<div class="col-xl-12 box-title no-border">
				<div class="inner text-center">
					<h2>
						<!--<span class="title-3">Latest <span style="font-weight: bold;">Ads</span></span>-->
						<span class="title-3">
							<h3> <span class="incss-new-arrivals">New Arrivals</span></h3>
							<p class="incss-fs15px">Don’t miss out! Here are the latest puppies looking for their new
								home.</p>
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
							$bookmark = array();
							$count = 0;
							$buk = $this->input->cookie('bookmarks');
							$bookmark = explode(',', $buk);
							if (!empty($premium_ads)) {
								foreach ($premium_ads as $rows => $row) {
									// foreach(array_reverse($premium_ads) as $rows => $innerArray){
									// 			foreach($innerArray as $innerRow => $row){
							?>
						<div class="item-list p-0 m-3">

							<div class="row aqr">
								<div class="col-sm-2 col-6 no-padding photobox">
									<div class="add-image w-100">
										<span class="photo-count"><i class="fa fa-images"></i> 3 </span>
										<a href="<?= base_url() ?>ad/<?= $row->ad_id ?>">
											<div class="postImg-slick d-flex gap-4">
												<?php if (!empty($row->featured_video)) { ?>
												<div class="videoSlate incssvideostate">
													<video class="thevideo incssthevideo" muted loop>
														<source src="<?php if ($row->featured_video_from == 'puppyverify.com') {
																							echo PV;
																						} else {
																							echo NS;
																						} ?>uploads/puppies/<?= $row->featured_video ?>" type="video/mp4">
														Your browser does not support the video tag.
													</video>
													<img src="<?= base_url() ?>assets/watermark.png"
														class="incss-watermark">
												</div>
												<?php } ?>

												<?php if (!empty($row->featured_image)) { ?>

												<img src="<?php if ($row->featured_image_from == 'puppyverify.com') {
																				echo PV;
																			} else {
																				echo NS;
																			} ?>uploads/puppies/pv/thumb_<?= $row->featured_image ?>"
													class="lazyload thumbnail incss-thumb no-margin"
													alt="<?= $row->featured_alt_tag ?>" data-nsfw-filter-status="sfw">




												<?php } ?>
											</div>
										</a>
									</div>
								</div>

								<div class="col-12 add-desc-box incss-add-desc-box pl-2">
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

										<div class="row w-100">
											<div class="col-12 pt-3">
												<span class="item-location">

													<span>
														<?= $row->breed_name ?>
													</span>


												</span>
											</div>
											<div class="col-12 p-0">
												<h5 class="add-title">
													<a href="<?= base_url() ?>ad/<?= $row->id ?>">
														<?= $row->title ?>
													</a>
												</h5>
											</div>
											<div class="col-12">
												<h2 class="item-price incss-item-price pb-0">
													$
													<?= $row->asking_price ?>
												</h2>
											</div>
											<div class="col-12 pt-3">
												<span class="item-location">
													<i class="icon-location-2"></i>&nbsp;

													<span>
														<?= $row->address ?>
													</span>


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
								<div class="col-4 text-end price-box incss-price-box">
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

						<?php

									// } 
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
										<a href="<?= base_url() ?>ad/<?= $row->post_id ?>">
											<div class="postImg-slick d-flex gap-4">
												<?php if (!empty($row->featured_video)) { ?>
												<div class="videoSlate incssvideostate">
													<video class="thevideo incssthevideo" muted loop>
														<source src="<?php if ($row->featured_video_from == 'puppyverify.com') {
																						echo PV;
																					} else {
																						echo NS;
																					} ?>uploads/puppies/<?= $row->featured_video ?>" type="video/mp4">
														Your browser does not support the video tag.
													</video>
													<img src="<?= base_url() ?>assets/watermark.png"
														class="incss-watermark">
												</div>
												<?php } ?>

												<?php if (!empty($row->featured_image)) { ?>


												<img src="<?php if ($row->featured_image_from == 'puppyverify.com') {
																			echo PV;
																		} else {
																			echo NS;
																		} ?>uploads/puppies/pv/thumb_<?= $row->featured_image ?>"
													class="lazyload thumbnail no-margin incss-thumb"
													alt="<?= $row->featured_alt_tag ?>" data-nsfw-filter-status="sfw">




												<?php } ?>
											</div>
										</a>
									</div>
								</div>

								<div class="col-12 add-desc-box incss-add-desc-box pl-2">
									<div class="items-details">
										<div class="row w-100">
											<div class="col-12 pt-3">
												<span class="item-location">

													<span>
														<?= $row->breed_name ?>
													</span>


												</span>
											</div>
											<div class="col-12 p-0">
												<h5 class="add-title">
													<a href="<?= base_url() ?>ad/<?= $row->post_id ?>">
														<?= $row->title ?>
													</a>
												</h5>
											</div>
											<div class="col-12">
												<h2 class="item-price pb-0 incss-item-price">
													$
													<?= $row->asking_price ?>
												</h2>
											</div>
											<div class="col-12 pt-3">
												<span class="item-location">
													<i class="icon-location-2"></i>&nbsp;

													<span>
														<?= $row->address ?>
													</span>


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
								<div class="col-4 text-end price-box incss-price-box">
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

						<?php } ?>




						<div class="incss-clear-both"></div>

						<div class="mb20 text-center">
							<!--<a href="<?= base_url() ?>assets/front/search" class="btn btn-default mt10">-->
							<!--	<i class="fa fa-arrow-circle-right"></i> View more-->
							<!--</a>-->

							<a href="<?= base_url() ?>ads" class="btn btn-default mt10">
								<i class="fa fa-arrow-circle-right"></i> View more
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>





<div class="p-0 mt-lg-4 mt-md-3 mt-3 mb-3"></div>
<div class="container">
	<div class="col-xl-12 content-box layout-section">
		<div class="row row-featured row-featured-category">

			<div class="col-xl-12 mt-5 box-title no-border">
				<div class="inner text-center">
					<h2>
						<!--<span class="title-3">Latest <span style="font-weight: bold;">Ads</span></span>-->
						<span class="title-3">
							<h3> <span class="incss-new-arrivals">Adopted Puppies</span></h3>

						</span>

						<!--<a href="<?= base_url() ?>assets/front/search" class="sell-your-item">-->
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
					color: #8cc63f;
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

							if (!empty($sold_ads)) {
								foreach ($sold_ads as $rows => $row) {
									// foreach(array_reverse($premium_ads) as $rows => $innerArray){
									// 			foreach($innerArray as $innerRow => $row){
							?>
						<div class="item-list p-0 m-3">

							<div class="row aqr">
								<div class="col-sm-2 col-12 no-padding photobox">
									<div class="add-image w-100">

										<a href="javascript:void(0)">
											<div class="postImg-slick d-flex gap-4">
												<?php if (!empty($row->featured_video)) { ?>
												<div class="videoSlate incssvideostate">
													<video class="thevideo incssthevideo" muted loop>
														<source src="<?php if ($row->featured_video_from == 'nosheddoodles.com') {
																							echo NS;
																						} else {
																							echo PV;
																						}  ?>uploads/puppies/<?= $row->featured_video ?>" type="video/mp4">
														Your browser does not support the video tag.
													</video>
													<img src="<?= base_url() ?>assets/watermark.png"
														class="incss-watermark">
												</div>
												<?php } ?>

												<?php if (!empty($row->featured_image)) { ?>
												<img src="<?php if ($row->featured_image_from == 'nosheddoodles.com') {
																				echo NS;
																			} else {
																				echo PV;
																			}  ?>uploads/puppies/pv/thumb_<?= $row->featured_image ?>"
													class="lazyload thumbnail no-margin incss-w-auto"
													alt="<?= $row->featured_alt_tag ?>" data-nsfw-filter-status="sfw">


												<?php } ?>
											</div>
										</a>
									</div>
								</div>

								<div class="col-12 add-desc-box pl-2 incss-add-desc-box">
									<div class="items-details">
										<div class="ribbon-wrapper ribbon-wrapper2">
											<div class="glow-out">
												<div class="glow">&nbsp;</div>
											</div>
											<div class="ribbon-front incss-ribbon-front">I FOUND MY FAMILY!</div>
											<div class="ribbon-edge-topleft incss-ribbon-edge-topleft"></div>
											<div class="ribbon-edge-topright"></div>
											<div class="ribbon-edge-bottomleft"></div>

										</div>
										<div class="row w-100">
											<div class="col-12 pt-3">
												<span class="item-location">

													<span>
														<?= $row->breed_name ?>
													</span>


												</span>
											</div>
											<div class="col-12 p-0">
												<h5 class="add-title">
													<a href="javascript:void(0)">
														<?= $row->title ?>
													</a>
												</h5>
											</div>
											<div class="col-12">
												<h2 class="item-price pb-0 incss-item-price">
													$
													<?= $row->asking_price ?>
												</h2>
											</div>
											<div class="col-12 pt-3">
												<span class="item-location">
													<i class="icon-location-2"></i>&nbsp;

													<span>
														<?= $row->address ?>
													</span>


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


							</div>
						</div>

						<?php }
								// 		}
							}
							?>


						<div class="incss-clear-both"></div>

						<div class="mb20 text-center">
							<!--<a href="<?= base_url() ?>assets/front/search" class="btn btn-default mt10">-->
							<!--	<i class="fa fa-arrow-circle-right"></i> View more-->
							<!--</a>-->

							<a href="<?= base_url() ?>sold" class="btn btn-default mt10">
								<i class="fa fa-arrow-circle-right"></i> View more
							</a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>