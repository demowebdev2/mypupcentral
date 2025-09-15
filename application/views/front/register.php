<script>
    function onSubmit(token) {
    //   alert('fsd');
    
    //  $("#contactForm").submit();
     var form = $('#register_form')[0];
     
      if (!form.checkValidity()) {
            event.preventDefault(); // Prevent the default form submission if not valid
            event.stopPropagation(); // Stop event propagation
              form.reportValidity();
        }
        else{
            document.getElementById("register_form").submit();
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

<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<div class="main-container">
    <div class="container">
        <div class="row">



            <div class="col-md-8 page-content" style="margin: 0px auto;">
                <div class="inner-box" style="background-color: #8cc63f;color: #fff;">
                    <h2 class="title-2" style="text-align:center;">
                        <strong> Join the My Pup Central breeder community!</strong>
                    </h2>


                    <div class="row mt-5">
                        <div class="col-xl-12">
                            <form class="form-horizontal" id="register_form" method="POST" action="<?= base_url() ?>register" enctype="multipart/form-data">

                                <?php if ($msg && $msg != '') { ?>
                                    <div class="alert alert-danger"><?= $msg ?></div>
                                <?php } ?>
                                <?php echo $this->customlib->getCSRF(); ?>

                                <fieldset>

                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label">Full Name <sup>*</sup></label>
                                        <div class="col-md-6">
                                            <input name="name" placeholder="Full Name" class="form-control input-md" type="text" value="<?= set_value('name') ?>" required>
                                        </div>
                                    </div>


                                    <input id="countryCode" name="country_code" type="hidden" value="US">


                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label">Phone <sup>*</sup>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span id="phoneCountry" class="input-group-text"><img src="<?= base_url() ?>assets/front/images/flags/16/us.png" style="padding: 2px;"></span>
                                                <input name="phone" placeholder="Phone Number" class="form-control input-md" type="text" value="<?= set_value('phone') ?>" required>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label" for="email">Email <sup></sup>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="icon-mail"></i></span>
                                                <input id="email" name="email" type="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label" for="email">Address
                                            <sup>*</sup></label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <textarea name="address" placeholder="Address" rows="5" cols="10" class="form-control"></textarea>

                                            </div>

                                            <div class="row pt-2">
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="city" placeholder="City">

                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="input-group">

                                                        <select class="form-control" name="state" required>
                                                            <option value="">Select State</option>
                                                            <?php foreach ($states as $row) { ?>
                                                                <option value="<?= $row->STATE_NAME ?>|<?= $row->ID ?>" <?php if ($row->STATE_NAME == $breeder->state) {
                                                                                                                            echo 'selected';
                                                                                                                        } ?>><?= $row->STATE_NAME ?></option>

                                                            <?php } ?>
                                                        </select>

                                                    </div>
                                                </div>

                                                <div class="col-md-12 pt-2">
                                                    <div class="input-group">
                                                        <input type="number" class="form-control" name="zip_code" placeholder="Zipcode">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label" for="email">I have a state license</sup>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="federal_license" id="inlineRadio1" checked value="Yes">
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="federal_license" id="inlineRadio2" value="No">
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="federal_license" id="inlineRadio3" value="Not Required">
                                                <label class="form-check-label" for="inlineRadio3">Not Required</label>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label" for="email">I have a federal(USDA) license</sup>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="usda_license" id="inlineRadio11" checked value="Yes">
                                                <label class="form-check-label" for="inlineRadio11">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="usda_license" id="inlineRadio22" value="No">
                                                <label class="form-check-label" for="inlineRadio22">No</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="usda_license" id="inlineRadio33" value="Not Required">
                                                <label class="form-check-label" for="inlineRadio33">Not Required</label>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label" for="email">Driver's License or Non Picture ID <sup>(Used for account verification) *</sup>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input id="" name="image" type="file" class="form-control" multiple accept="image/png, image/jpg, image/jpeg" value="" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label" for="email">Please submit inside and outside photos of your facility (minimum of 4 photos required). Photos will be kept confidential.<sup>*</sup>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input id="files" name="kennel[]" onchange="checkFiles(this.files)" type="file" class="form-control" required multiple accept="image/png, image/jpg, image/jpeg" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="row mb-3 required">-->
                                    <!--    <label class="col-md-4 col-form-label" for="email">Are your puppies vet checked before leaving? <sup>*</sup> </sup>-->
                                    <!--    </label>-->
                                    <!--    <div class="col-md-6">-->
                                    <!--        <div class="form-check form-check-inline">-->
                                    <!--            <input class="form-check-input" type="radio" name="vet_checked" id="inlineRadio111" value="Yes">-->
                                    <!--            <label class="form-check-label" for="inlineRadio111">Yes</label>-->
                                    <!--        </div>-->
                                    <!--        <div class="form-check form-check-inline">-->
                                    <!--            <input class="form-check-input" type="radio" name="vet_checked" id="inlineRadio222" checked value="No">-->
                                    <!--            <label class="form-check-label" for="inlineRadio222">No</label>-->
                                    <!--        </div>-->

                                    <!--    </div>-->
                                    <!--</div>-->

                                    <!--<div class="row mb-3 required">-->
                                    <!--    <label class="col-md-4 col-form-label" for="email">Do you offer a health guarante? <sup>*</sup> </sup>-->
                                    <!--    </label>-->
                                    <!--    <div class="col-md-6">-->
                                    <!--        <div class="form-check form-check-inline">-->
                                    <!--            <input class="form-check-input" type="radio" name="guarante" id="inlineRadio1111" value="Yes">-->
                                    <!--            <label class="form-check-label" for="inlineRadio1111">Yes</label>-->
                                    <!--        </div>-->
                                    <!--        <div class="form-check form-check-inline">-->
                                    <!--            <input class="form-check-input" type="radio" name="guarante" id="inlineRadio2222" checked value="No">-->
                                    <!--            <label class="form-check-label" for="inlineRadio2222">No</label>-->
                                    <!--        </div>-->

                                    <!--    </div>-->
                                    <!--</div>-->

                                    <div class="row mb-3 required" id="health_length" style="display: none">
                                        <label class="col-md-4 col-form-label" for="email">Length of health guarantee
                                            <sup>*</sup></label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <input type="text" name="length" class="form-control">

                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label" for="email">Description
                                            <sup>*</sup></label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <textarea name="description" placeholder="Briefly describe your breeding practices (this will be shown on your Seller Information page)" rows="5" cols="10" style="height: 140px;" class="form-control"></textarea>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label" for="password">Password <sup>*</sup></label>
                                        <div class="col-md-6">
                                            <div class="input-group show-pwd-group mb-2">
                                                <input id="password" name="password" type="password" class="form-control" placeholder="Password" autocomplete="off" required>
                                                <span class="icon-append show-pwd">
                                                    <button type="button" class="eyeOfPwd">
                                                        <i class="far fa-eye-slash"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Password Confirmation" autocomplete="off" required>
                                            <div class="form-text text-muted">
                                                At least 6 characters
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="row mb-1 required">-->
                                    <!--    <label class="col-md-4 col-form-label"></label>-->
                                    <!--    <div class="col-md-6">-->
                                    <!--        <div class="form-check">-->
                                    <!--            <input name="allowlogin" id="allowlogin" class="form-check-input" value="0" type="hidden">-->

                                                <!--<label class="form-check-label" for="acceptTerms" style="font-weight: normal;">-->
                                                <!--    Allow login from  <a target="blank" href="https://nosheddoodles.com/">Nosheddoodles.com</a>-->
                                                <!--</label>-->
                                    <!--        </div>-->
                                    <!--        <div style="clear:both"></div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="row mb-1 required">
                                        <label class="col-md-1 col-form-label"></label>
                                        <div class="col-md-10">
                                            <h4>As a My Pup Central breeder we ask that you comply with the following standards…</h4>  
                                            <input name="" id="acceptTerms2" class="form-check-input" required value="1" type="checkbox">
                                            <label class="form-check-label" for="acceptTerms2" style="font-weight: normal;">
                                                I will ensure every puppy I list has been well socialized and is prepared to join a new family.
                                            </label> <br />
                                            <input name="" id="acceptTerms3" class="form-check-input" required value="1" type="checkbox">
                                            <label class="form-check-label" for="acceptTerms3" style="font-weight: normal;">
                                                I will ensure every puppy I sell is healthy and has been properly examined by a licensed veterinarian.
                                            </label> <br />
                                            <input name="" id="acceptTerms4" class="form-check-input" required value="1" type="checkbox">
                                            <label class="form-check-label" for="acceptTerms4" style="font-weight: normal;">
                                                I will maintain a safe, clean, and sanitary environment for my adult dogs and puppies.
                                            </label> <br />
                                            <input name="" id="acceptTerms5" class="form-check-input" required value="1" type="checkbox">
                                            <label class="form-check-label" for="acceptTerms5" style="font-weight: normal; margin-left: 15px; margin-top: -20px;">
                                                I will provide each buyer with health records- including vaccination and deworming records and basic diet information.
                                            </label> <br />
                                            <!--<input name="" id="acceptTerms6" class="form-check-input" required value="1" type="checkbox">-->
                                            <!--<label class="form-check-label" for="acceptTerms6" style="font-weight: normal;">-->
                                            <!--    I will include a health guarantee with each puppy I sell (a minimum 30 day guarantee is required).-->
                                            <!--</label>-->
                                            <div style="clear:both"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-1 required">
                                        <label class="col-md-4 col-form-label"></label>
                                        <div class="col-md-6">
                                            <div class="form-check">
                                                <input name="accept_terms" id="acceptTerms" class="form-check-input" required value="1" type="checkbox">

                                                <label class="form-check-label" for="acceptTerms" style="font-weight: normal;">
                                                    I have read and agree to the <a target="blank" href="<?= base_url() ?>page/terms">Terms &amp; Conditions</a>
                                                </label>
                                            </div>
                                            <div style="clear:both"></div>
                                        </div>
                                    </div>


                                    <!--<div class="row mb-3 required">-->
                                    <!--    <label class="col-md-4 col-form-label"></label>-->
                                    <!--    <div class="col-md-6">-->
                                    <!--        <div class="form-check">-->
                                    <!--            <input name="accept_marketing_offers" id="acceptMarketingOffers" class="form-check-input" value="1" type="checkbox">-->

                                    <!--            <label class="form-check-label" for="acceptMarketingOffers" style="font-weight: normal;">-->
                                    <!--                I accept to receive marketing emails (optional)-->
                                    <!--            </label>-->
                                    <!--        </div>-->
                                    <!--        <div style="clear:both"></div>-->
                                    <!--    </div>-->
                                    <!--</div>-->


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
                                    <div class="row">
                                        <label class="col-md-4 col-form-label"></label>
                                        <div class="col-md-6">
                                            <button   data-sitekey="6Lfy9i0nAAAAAOyFg5Z1uP7Yk6tyt_kLvQuWkAJN"   data-callback='onSubmit'   data-action='submit'  class=" g-recaptcha btn btn-light-blue btn-lg" > Submit Application</button>
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
    <br>
    <h4>We will contact you once we have reviewed your application.</h4>                                                                    
</div>
             

                                    <div class="mb-4"></div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<script>
    function checkFiles(files) 
    {
        // if (files.length < 4) 
        // {
        //     $.alert("You are only allowed to upload a minimum of 4 files and maximum 10 files.");
        //     let list = new DataTransfer;
        //     for (let i = 0; i < 4; i++)
        //     list.items.add(files[i])
        //     document.getElementById('files').files = list.files
        //     $('#image').val('');
        // }
        var limit = 4;
        //var files = $(this)[0].files;
        if(files.length < limit)
        {
            //alert("You are only allowed to upload a minimum of 4 files and maximum 10 files.");
            $.alert("You are only allowed to upload a minimum of 4 files and maximum 10 files.");
            $("#files").val('');
            return false;
        }
        else
        {
            return true;
        }
    }
    
    $(document).ready(function()
    {
       
    });
    $('input[type=radio][name=guarante]').change(function() {
        if (this.value == 'Yes') {
            $("#health_length").show();
        } else {
            $("#health_length").hide();
        }
    });
</script>