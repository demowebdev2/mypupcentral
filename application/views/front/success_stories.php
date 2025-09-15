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

<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<?php if ($_GET['status']) {
	if ($_GET['status'] == 1) { ?>


		<script>
			$(document).ready(function() {
				swal("Your review has been submitted!", " Thank you for your time.", "success");
			});
		</script>
	<?php } else if ($_GET['status'] == 2) { ?>


		<script>
			$(document).ready(function() {
		
				swal("Error!", "Fill all the required fields", "error");
			});
		</script>
<?php }
} ?>

<script>

 $(document).ready(function () {
     	
     	var token = "<?= $this->security->get_csrf_hash(); ?>";
     load_captcha()
function load_captcha()
{
     $('#captcha_div').empty();
     $.ajax({
                type: "POST",
                url: "<?=base_url()?>Page/load_captcha",
               	data: {
					'csrf_test_name': token,
				},
                dataType: "json",
                success: function (response) {
                    $('#captcha_div').append(response.img);
                }
            });
}

});
</script>

<style>
    a:hover
    {
        color:#a6e1ff;
    }
    .rounded-3 
    {
        border-radius: 3rem !important;
    }
    .incss-btn-3 
    {
        background-color: #8cc63f;
        color: #fff;
        width: auto;
        margin: 0px auto;
    }
    .rev_img{
        height:200px
    }
    
    	.rating label input {
		position: absolute;
		top: 0;
		left: 0;
		opacity: 0;
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
		color: #a6e1ff;
	}

	.rating label input:focus:not(:checked)~.icon:last-child {
		color: #D8D8D8;
		text-shadow: 0 0 5px #a6e1ff;
	}

.google-button {
  display: block;
  margin: 15px auto;
  width: 70%;
  max-width: 270px;
  padding: 10px 10px 10px 50px;
  border: 2px solid #a6e1ff;
  border-radius: 50px;
  text-transform: uppercase;
  text-decoration: none;
  text-align: center;
  font-size: 13px;
  line-height: 20px;
  color: #a6e1ff;
  background: url(https://cdn2.hubspot.net/hubfs/1961464/Support%20images/new-google-favicon-512.png) no-repeat left 20px center / 40px 40px;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
    -webkit-animation: wiggle 2s ease-in infinite;
    -moz-animation: wiggle 2s ease-in infinite;
    -o-animation: wiggle 2s ease-in infinite;
  animation: wiggle 2s ease-in infinite;
}

  .google-button:hover {
    color: #ffffff;
    background-color: #a6e1ff;
    background-image: url(https://cdn2.hubspot.net/hubfs/1961464/Support%20images/new-google-favicon-512-white.png);
}

  .google-button strong {
    font-size: 18px;
    display: block;
  }


@-webkit-keyframes wiggle {
  0%, 20%, 100% { background-position: left 20px center; }
  5% { background-position: left 15px center; }
  10% { background-position: left 20px center; }
  15% { background-position: left 25px center; }
}

@-moz-keyframes wiggle {
  0%, 20%, 100% { background-position: left 20px center; }
  5% { background-position: left 15px center; }
  10% { background-position: left 20px center; }
  15% { background-position: left 25px center; }
}

@-o-keyframes wiggle {
  0%, 20%, 100% { background-position: left 20px center; }
  5% { background-position: left 15px center; }
  10% { background-position: left 20px center; }
  15% { background-position: left 25px center; }
}

@keyframes wiggle {
  0%, 20%, 100% { background-position: left 20px center; }
  5% { background-position: left 15px center; }
  10% { background-position: left 20px center; }
  15% { background-position: left 25px center; }
}
.promingz1right  {
  display: flex;

position: relative;
  align-content: center;
  justify-content: center;
  flex-direction: column;
  height: 100%;
}
.proimgz1 {
  object-fit: cover;
  left: 0px;
}
.prosecz1 {
  position: relative;
  background: #f2f2f2;
  border-radius: 30px;
  margin-top: 140px;
    margin-bottom: 160px;
}
.proztrust {
  background: #f2f2f2;
  padding-top: 10px;
  border-radius: 30px;
}
.fa.fa-star.btn {
  background: #f2f2f2;
}
.fa.fa-star.btn-primary.btn {
  font-weight: bold;
  background: #f9ba23;
  color: #fff !important;
  border-color: #f9ba23;
}
@media screen and (max-width:1199px)
{
    .proimgz1 {
  position: unset !important;
  left: unset  !important;
}
}
</style>
<div class="container">
    <section class=" mb-3 features-area ">
        <div class="text-center mb-2">
            <div class="row features-items prosecz1">
                <div class="col-md-5 col-sm-5 equal-height p-0">
                    <div class="item p-0">
                        <img src="<?= base_url() ?>assets/1_header.jpg" class="img-fluid proimage instproiming rounded-circle proimgz1" style="border: 10px solid #8cc63f;">
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 equal-height p-2">
                    <div class="promingz1right item p-3">
                        <div class="info breed_info">
                            <h1 class="info_sub"><b>Genuine Reviews from our Customers…</b></h1>
                            <ol class="text-left" style="font-size: 16px;">
                                <li class="">My Pup Central exists to bring pure joy in the form of a puppy to families across the United States. We strive to present well cared for, 
                                    healthy puppies from excellent breeders. Our goal is to make your experience a simple and enjoyable one.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-5">
                <div class="col-12">
                <div class="proztrust">
                                <!-- TrustBox widget - Micro Review Count -->
                <div class="trustpilot-widget" data-locale="en-US" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="64d275e16570bb5b3274ec56" data-style-height="40px" data-style-width="100%" data-theme="light" data-min-review-count="10" data-without-reviews-preferred-string-id="3" data-style-alignment="center">
                <a href="https://www.trustpilot.com/review/mypupcentral.com" target="_blank" rel="noopener">Trustpilot</a>
                </div>
                </div>
                </div>
            </div> 
            
            <div class="row pt-2">
               
<a class="google-button" href="https://g.page/r/CXlIGkRsF93NEB0/review" target="_blank">Click here to leave a <strong>google review</strong></a>
            </div> 
            
            
            <!-- End TrustBox widget -->
            <div class="row pt-3">
                <div class="col-md-12 col-sm-12  pt-3 text-center"><h2 class="info_sub"><b>My Pup Central Reviews</b></h2></div>
                <div class="col-md-12 col-sm-12 text-center" style="font-size: 16px;"><span class="info_sub">Read about real customer experiences…</span></div>
            </div>
            <div class="row text-center"  style="font-size: 16px;">
                <div class="col-md-12 col-sm-12 pt-3  "><span class="info_sub"><b><?=number_format((float)$avg_rating, 2); ?>/ 5</b></span></div>
                <div class="col-md-12 col-sm-12 pt-2" style="font-size: 16px;">
                    <i class="fa fa-star <?php if ($avg_rating >= 1) { echo 'btn-primary'; } ?> btn rounded p-1" aria-hidden="true"></i>
                    <i class="fa fa-star <?php if ($avg_rating >= 2) { echo 'btn-primary'; } ?> btn rounded p-1" aria-hidden="true"></i>
                    <i class="fa fa-star <?php if ($avg_rating >= 3) { echo 'btn-primary'; } ?> btn rounded p-1" aria-hidden="true"></i>
                    <i class="fa fa-star <?php if ($avg_rating >= 4) { echo 'btn-primary'; } ?> btn rounded p-1" aria-hidden="true"></i>
                    <i class="fa fa-star <?php if ($avg_rating == 5) { echo 'btn-primary'; } ?> btn rounded p-1" aria-hidden="true"></i>
                </div>
            </div>
            <div class="row pt-3">
                <div class="col-md-12 col-sm-12 text-center" style="font-size: 16px;"><span class="info_sub">Based on <?=$total?> Customer Reviews</span></div>
            </div>
        </div>
    </section>
    <div class="row" id="review-block">
        
    </div>
    
   
    <div class="col-md-12 pt-3 text-center" id="pageno">
        // <a href="javascript:void(0)">
        //     <button class="btn btn-block btn-gradient mt-2 incss-btn-3">More Reviews</button>
        // </a>
    </div>
    <div class="row justify-content-md-center pt-5" id="review_form">
        <div class="col-md-10">  
            <div class="row p-5">
                <div class="col-md-12 text-center"><h2 class="info_sub">Review My Pup Central</h2></div>
                <form method="post" id="review_form1" action="<?=base_url()?>Page/save_review" accept-charset="UTF-8">
                    <div class="row pt-4">
                        <div class="col-md-3">
                            <div class="text-sm"><span class="font-medium">Rating <span class="text-danger">*</span></span></div>  
                        </div>
                        <div class="col-md-9">
                        <?php echo $this->customlib->getCSRF(); ?>
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
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="text-sm"><span class="font-medium">Full Name <span class="text-danger">*</span></span></div>  
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 col-sm-12" style="font-size: 16px;">
                                <input type="text" name="name" class="form-control w-75" placeholder="Full Name" required />
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="text-sm"><span class="font-medium">State <span class="text-danger">*</span></span></div>  
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 col-sm-12" style="font-size: 16px;">
                                <input type="text" name="state" class="form-control w-75" placeholder="State" required />
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="text-sm"><span class="font-medium">Email <span class="text-danger">*</span></span></div>  
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 col-sm-12" style="font-size: 16px;">
                                <input type="email"  name="email"  class="form-control w-75" placeholder="Email" required />
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-3">
                            <div class="text-sm"><span class="font-medium">Description</span></div>  
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 col-sm-12" style="font-size: 16px;">
                                <textarea rows="3"  name="message" class="form-control w-75" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-md-3">
                        <input type="hidden" name="token" value="<?=$token?>">
                            <div class="text-sm"><span class="font-medium">Image</span></div>  
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-12 col-sm-12" style="font-size: 16px;">
                                <input type="file" name="img" class="form-control w-75" />
                            </div>
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
                    
                    <div class="col-md-12 pt-3">
                      <button   data-sitekey="6Lfy9i0nAAAAAOyFg5Z1uP7Yk6tyt_kLvQuWkAJN"   data-callback='onSubmit'    data-action='submit'  class=" g-recaptcha btn btn-block btn-gradient mt-2 incss-btn-3" > Submit </button>
                   
                </form>
            </div>
        </div> 
    </div>
   

<br><br>
</div>
</div>

<script>
	$(document).ready(function() {
	    $(".proimgz1").height($(".proimgz1").width());
	    $(".proimgz1").width($(".proimgz1").height());
	     $(".proimgz1").css({
            'position': 'absolute',
            'top': '-50%'
          });
	    
	    	$('#pageno').on('click', 'a', function(e) {
			e.preventDefault();
			var pageno = $(this).attr('data-ci-pagination-page');
			if (pageno == 0)
				pageno = '';
			else
				pageno = (pageno - 1) * 5;
				
				
					$(".more_rev_btn").empty();

		$(".more_rev_btn").append('Loading. <i class="fa fa-circle-notch fa-spin" style="font-size:24px"></i>');


			loadPagination(pageno);
		});

	    
	    	var token = "<?= $this->security->get_csrf_hash(); ?>";
		loadPagination(0);

	    
	    	function loadPagination(pagno) {
			// location.href = "#scroll"; 
// 			$("#review-block").empty();

// 			$("#review-block").append('<div class="row w-100 spdiv"><div class="col-12"><div class="text-center"><span class="spinner"><span></span><span></span><span></span><span></span></span></div></div></div>');

			$.ajax({
				url: "<?= base_url() ?>Page/fetch_reviews/" + pagno,
				type: 'POST',
				dataType: 'json',
				data: {
					'csrf_test_name': token,
					page: 5,
				},
				success: function(response) {
				// 	$("#review-block").empty();
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