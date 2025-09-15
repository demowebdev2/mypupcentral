<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<style>
.breedlistview{
    min-width: 20%;
}
.incss-spanbreeds{
	font-weight: bold;font-size: 35px;
}
@media screen and (max-width:991px)
{
    .breedlistview{
    min-width: 33.33%;
}
}
    .row-featured-category .circle {
    
    height: 205px;
   
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
	
</style>
<div class="main-container" id="homepage">
<div class="container">
		<div class="col-xl-12 content-box layout-section">
			<div class="row row-featured row-featured-category">
				<div class="col-xl-12 box-title no-border">
					<div class="inner text-center">
						<h2>
							<span class="incss-spanbreeds"> Breeds</span>
							<!--<a href="" class="sell-your-item">-->
							<!--	View more <i class="icon-th-list"></i>-->
							<!--</a>-->
						</h2>
					</div>
				</div>


					<?php  $count = 0;
					$mycount = 0;
					$mycounttwo = 0;
					$ccnt = 0;
						echo '<div class="row m-0 load-content pb-3">';
					foreach ($breeds as $row) {
						$count++;
						$mycount++;
						
						if($mycount == 7)
						{
						    	$mycount = 1;
						    	$mycounttwo++;
						}
				 		if ($row->count!=0) {

							$ccnt++;
					if ($ccnt == 1 || fmod($ccnt, 5) == 1) {
					
					}
						 ?>
					<div class="f-category col-6 col-md-3  col-lg mycol<?= $mycounttwo ?> breedlistview">
					    <a href="<?= base_url() ?>breeds/<?= $row->page_slug ?>" class="puppy_height">
							<div class="hover hover-5   text-white rounded puppy_height puppy_width"><img src="<?= base_url() ?>assets/lazyload.gif" data-src="<?= base_url() . 'uploads/breeds/' . $row->image ?>" alt="<?= $row->alt_image ?>" class="puppy_height">
						        <div class="hover-overlay puppy_height"></div>
								<div class="hover-5-content puppy_height">
									<div class="text-center">
										<h3 class="hover-5-title text-uppercase font-weight-light mb-0 p-3"> <strong class="font-weight-bold text-white"><?= $row->breed_name ?> </strong><span></span></h3>
									</div>
								</div>
							</div>
						</a>
					</div>

						<?php $lastid = $row->id;


}}
if ($ccnt == 5 || fmod($ccnt, 5) == 0) {
echo '</div>';
}
	
$tempp=fmod($ccnt, 5);

for($i=0; $i<5-($tempp); $i++)
					{
					    echo '<div class=" col-6 col-md-3  col-lg breedlistview"></div>';
					}


 ?>
					
                   


			</div>
		</div>
	</div>
	
	</div>

	<script>
		$(document).ready(function() {

			setTimeout(() => {
				$('.puppy_height').css('height', $('.puppy_width').width());
				console.log($('.puppy_width').width());
			}, 1000);

			$(window).resize(function() {
				$('.puppy_height').css('height', $('.puppy_width').width());
			});


		});
	</script>

</script>