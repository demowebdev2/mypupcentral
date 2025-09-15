<script src="https://js.stripe.com/v2/"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>assets/datepicker/css/default/zebra_datepicker.min.css" type="text/css">
<link rel="stylesheet" href="<?= base_url() ?>assets/datepicker/zebrastyle.css" type="text/css">
<script src="<?= base_url() ?>assets/datepicker/zebra_datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/datepicker/zebrascript.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


<script>
  // Set your publishable key
  Stripe.setPublishableKey('<?php echo $this->config->item('stripe_publishable_key'); ?>');

  // Callback to handle the response from stripe
  function stripeResponseHandler(status, response) {
    if (response.error) {
      // Enable the submit button
      $('#payBtn').removeAttr("disabled");
      // Display the errors on the form
      $(".card-errors").html('<div class="alert alert-danger"><p>' + response.error.message + '</p></div>');
    } else {
      var form$ = $("#paymentFrm");
      // Get token id
      var token = response.id;
      // Insert the token into the form
      form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
      // Submit form to the server
      form$.get(0).submit();
    }
  }

  $(document).ready(function() {
     
    $("#paymentFrm").submit(function() {
         var dd=$("#restrict").val();
    // On form submit
    if(dd==0)
    {
      // Disable the submit button to prevent repeated clicks
      $('#payBtn').attr("disabled", "disabled");

      // Create single-use token to charge the user
      Stripe.createToken({
        number: $('#card_number').val(),
        exp_month: $('#card_exp_month').val(),
        exp_year: $('#card_exp_year').val(),
        cvc: $('#card_cvc').val()
      }, stripeResponseHandler);

      // Submit from callback
      return false;
      
    }
    });
    


  });
</script>

<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<style>
@media (max-width: 574px) {
 #rad1, #rad0 {
  position: absolute;
  left: 20px;
  margin-top: 8px;
}
}

  .training_head1 {
    font-weight: bolder;
    font-size: 30px;
    color: #636363;
    line-height: 30px;
  }

  .main_div {
    border: 2px solid #999;
    border-radius: 40px;
  }

  .banner_img1 {
    border-top-left-radius: 40px;
    border-top-right-radius: 40px;

  }

  .agree_content {
    border: 2px solid #999;
    border-radius: 40px;
    background-color: #eee;
  }

  .main-container {
    border: 2px solid #77c9d4;
    border-radius: 40px;

  }
  @media only screen and (max-width: 767px) {
 .items_box h3{
     font-size:18px;
 }
}

</style>

<div class="container">
  <div class="main_div mb-5 mt-5 pb-5">
    <img src="<?= base_url() ?>assets/req_training_banner.jpg" class="img banner_img1">
    <div class="px-3">
      <form action="" class="paymentFrm" method="POST" id="paymentFrm">
        <?php echo $this->customlib->getCSRF(); ?>

        <div class="card-errors "><?php if ($this->session->flashdata('msg')) { ?>
            <?php echo $this->session->flashdata('msg') ?>
          <?php } ?></div>
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center mb-4 mt-5 training_head1">Request Training</h2>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="first_name" class="form-control" placeholder="First Name" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="last_name" class="form-control" placeholder="Last Name" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <input type="text" name="phone" class="form-control" placeholder="Phone" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <input type="text" name="email" class="form-control" placeholder="Email" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <input type="text" name="address" class="form-control" placeholder="Address" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-5">
            <div class="form-group">
              <input type="text" name="city" class="form-control" placeholder="City" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-3">
            <div class="form-group">
              <input type="text" name="state" class="form-control" placeholder="State" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <input type="text" name="zip_code" class="form-control" placeholder="Zip Code" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group mt-5">
              <div class="text-center">
                <input type="radio" id="rad0" name="plan" value="0" checked style="font-size: 18px;">
                <label for="rad0" style="font-size: 18px;"><b>Puppy Basics - 3 Weeks Training Program $1500</b></label>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">
              <div class="text-center">
                <input type="radio" id="rad1" name="plan" value="1" style="font-size: 18px;">
                <label  for="rad1" style="font-size: 18px;"><b> Advanced Puppy - 5 Weeks Training Program $2500</b></label>
              </div>
            </div>
          </div>


          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="puppy_name" class="form-control" placeholder="Puppy Name" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <select name="breed" class="form-control" placeholder="Breed">
                <option disabled selected>Choose Breed</option>
                <?php foreach ($breeds as $row) { ?>
                  <option value="<?= $row->id ?>"><?= $row->breed_name ?></option>
                <?php } ?>
              </select>

            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">

              <input type="text" name="puppy_dob" id="puppy_dob" class="form-control" placeholder="Puppys Date Of Birth" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">

              <input type="text" name="start_date" id="start_date" class="form-control" placeholder="Preferred Start Date" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">

              <input type="text" name="breeder" class="form-control" placeholder="Breeder's Name" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>

          <div class="col-md-12">
            <div class="form-group">

              <input type="text" name="breeder_phone" class="form-control" placeholder="Breeder's Phone" required="" spellcheck="true" fdprocessedid="ip5m">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <textarea rows="12" name="note" class="form-control" placeholder="Additional Notes & Requests"></textarea>
            </div>
          </div>

          <div class="col-md-12">
            <div class="text-center">
              <h2 class="text-center mt-5"><b>Contact & Information</b></h2>
              <p><b>Please read carefully & agree before proceeding…</b></p>
            </div>
          </div>

          <div class="col-md-12">
            <div class="agree_content px-3">
              <div class="text-center">
                <h2 class="mt-5 mb-5" style="color:#636363"><b>MY PUP CENTRAL PUPPY TRAINING CONTRACT</b> </h2>
              </div>

              <p>Please read the following information carefully before proceeding with purchasing a training package for
                your puppy. We recommend <a href="<?=base_url()?>contact"><u>Contacting Us</u></a> to inquire about availability before submitting your request.
                Please allow 2 business days to receive a response.
              </p>

              <div id="more-text" style="display: none;">

                <p>Upon receiving your request we will schedule your puppy to begin training:</p>

                <ol>
                  <li>After your puppy reaches the age of 8 weeks. Legally a puppy cannot leave the breeder before it
                    is 8 weeks old.</li>
                  <li>When we have availability in our training program. Due to high demand and the need for one on
                    one time with the trainer, it may go 1-4 weeks before your puppy is able to move from the
                    breeder and begin the training process.</li>
                </ol>

                <h3 class="mt-3"><u>DEPOSIT</u></h3>
                <p>Before your puppy moves from the seller to the trainer you will be required to:</p>

                <ol>
                  <li>Pay the seller in full for the price of your puppy. This payment is non-refundable after the puppy
                    has gone into training.</li>
                  <li>Pay My Pup Central in full for the training package you select. This payment is non-refundable.</li>
                </ol>

                <h3 class="mt-3"><u>PROCESS</u></h3>
                <p>During the training process, you will receive weekly video updates via email on your puppy’s progress.
                  You may make specific requests on additional commands you would like to have introduced to your
                  puppy, however, we cannot promise these additional requests will be mastered.</p>

                <p>Each puppy is different and their potential varies between breeds and individual personalities. Although
                  our trainers devote their time and knowledge to helping your puppy reach their full potential and instill
                  all commands and behaviors as specified in our training program, we cannot guarantee individual results
                  in puppies. Be sure to do your research on the breed and ask your breeder about your puppy’s
                  personality before placing a deposit.</p>

                <h3 class="mt-3"><u>PICKUP & DELIVERY</u></h3>
                <p>Upon completing training, it’s time to pick up your puppy! We also have air and ground transport
                  options available if you are unable to make the trip to Ohio. The cost of travel, should you choose that
                  option, is due before delivery.</p>

                <h3 class="mt-3"><u>FINAL PAYMENT</u></h3>
                <p>All payments are due before the puppy begins training. (This is a non-refundable payment) At the time
                  of pickup/delivery you will receive a personalized training summary and schedule for your puppy, as well
                  as any paperwork provided by the breeder.</p>
              </div>

              <div class="text-center"><a class="btn btn-primary mb-5 mt-2 " id="read_more" href="#more-text">Read more <i class="fa fa-arrow-down" aria-hidden="true"></i></a></div>
              <div class="text-center"><a class="btn btn-primary mb-5 mt-2 " id="read_less" style="display:none" href="#more-text">Read Less <i class="fa fa-arrow-up" aria-hidden="true"></i></a></div>

              <div class="text-center">
                <input type="checkbox" id="agreement" name="agreement" value="yes" required>
                <label for="agreement"><b>I HAVE READ & AGREE</b> </label>
              </div>


              <div class="text-center"><a class="btn btn-secondary mb-5 mt-5 mb-5" target="_blank" href="<?= base_url() ?>assets/training_terms.pdf">PRINT PDF <i class="fa fa-file-pdf" aria-hidden="true"></i></a></div>


            </div>



          </div>
        </div>
<input type="hidden" value="0" id="restrict">

        <div class="main-container mt-5 mb-5 pt-5 pb-5">
          <div class="container">
            <div class="row">

              <div class="col-md-12">
                <h2 class="text-center mb-5 mt-2 training_head1">Checkout
                </h2>
              </div>

              <div class="col-lg-8 col-md-10 col-sm-10 col-12 login-box mt-2">
                <h3>Item(s):</h3>
                <table class="table">
                  <tr class="items_box">
                    <td>
                      <h3>1 x Puppy Basics- 3 Week Training Program </h3>
                    </td>
                    <td>
                      <h3 style="float:right"><b>$1500.00 </b></h3>
                    </td>
                  </tr>
                </table>



                <div class="text-center">
                  <h2 class="total_box"><b>TOTAL: $1500.00 </b></h2>
                </div>


                <div class="text-center"><img src="<?= base_url() ?>assets/strip_graphic.png" class="w-50 mt-4 mb-4"></div>
                <!-- Payment form -->

                <div class="row">
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>PROMOCODE</label>
                      <input type="text" name="promocode" class="form-control" id="promocode" placeholder="Enter Promocode" autocomplete="off" oninput="this.value = this.value.toUpperCase()">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button style="width:100%; background-color:#a6e1ff;" type="button" class="btn" id="apply_promocode">Apply Promocode</button>
                  </div>
                  <div class="col-md-12">
                    <div class="code_error"></div>
                  </div>
                </div><br>
                <div class="row card_form">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>NAME ON CARD</label>
                      <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>CARD NUMBER</label>
                      <input type="text" name="card_number" class="form-control" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" data-inputmask="'mask': '9999 9999 9999 9999'" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>EXPIRY DATE</label>
                      <div class="d-flex">
                        <!--   <input type="text" class="form-control" name="card_exp_month" id="card_exp_month" placeholder="MM"  data-inputmask="'mask': '99/999'"> -->
                        <input type="text" class="form-control" name="card_exp_month" id="card_exp_month" placeholder="MM"  data-inputmask="'mask': '99'">
                        <input type="text" class="form-control" name="card_exp_year" id="card_exp_year" placeholder="YYYY" data-inputmask="'mask': '9999'" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <div class="form-group">
                      <label>CVC CODE</label>
                      <input type="text" name="card_cvc" class="form-control" id="card_cvc" placeholder="CVC" autocomplete="off"  data-inputmask="'mask': '999'">
                    </div>
                  </div>
                  <input type="hidden" name="tot" id="tot" value="<?= $tot ?>">
                  <input type="hidden" name="ad_id" id="ad_id" value="<?= $ad_id ?>">
                  <input type="hidden" name="id" id="id" value="<?= $id ?>">
                  <input type="hidden" name="pay_id" id="pay_id" value="<?= $pay_id ?>">
                  <input type="hidden" name="cart" id="cart" value="<?= $cart ?>">

                  <div class="col-md-12">
                    <button style="width:100%; background-color:#8cc63f;" type="submit" class="btn btn-success payBtn" id="payBtn">SUBMIT

                      REQUEST & PAY $1500.00 </button>
                  </div>

                  <div class="card-errors "><?php if ($this->session->flashdata('msg')) { ?>
                      <?php echo $this->session->flashdata('msg') ?>
                    <?php } ?></div>
                </div>




              </div>

            </div>
          </div>
        </div>
        <div class="text-center">
          <h2>
            <b>Thank you for trusting My Pup Central to help your puppy <br>
              reach their full potential!</b>

          </h2>
        </div>

      </form>

    </div>
  </div>
</div>
</div>

<script>
  $(document).ready(function() {
    $("input[name='plan']").change(function() {
      var selectedValue = $("input[name='plan']:checked").val();

      if (selectedValue == 0) {
        var price = 1500.00;
        var plan = '<td>\
                      <h3>1 x Puppy Basics- 3 Week Training Program </h3>\
                    </td>\
                    <td>\
                      <h3 style="float:right"><b>$1500.00 </b></h3>\
                    </td>';
      } else {
        var price = 2500.00;
        var plan = '<td>\
                      <h3>1 x Advanced Puppy- 5 Weeks Training Program  </h3>\
                    </td>\
                    <td>\
                      <h3 style="float:right"><b>$2500.00 </b></h3>\
                    </td>';
      }
      $("#payBtn").empty();
      $("#payBtn").append('SUBMIT REQUEST & PAY $' + price);
      $(".total_box").empty();
      $(".total_box").append('<b>TOTAL: $' + price + ' </b>');

      $(".items_box").empty();
      $(".items_box").append(plan);


    });
  });

  $(document).ready(function() {
    $("#read_more").click(function(e) {
      e.preventDefault();

      $("#more-text").css("display", "block");
      $("#read_more").css("display", "none");
      $("#read_less").css("display", "block");
    });
  });

  $(document).ready(function() {
    $("#read_less").click(function(e) {
      e.preventDefault();

      $("#more-text").css("display", "none");
      $("#read_more").css("display", "block");
      $("#read_less").css("display", "none");

    });

    $("#puppy_dob").Zebra_DatePicker({
      format: "m/d/Y",
    });

    $("#start_date").Zebra_DatePicker({
      format: "m/d/Y",
    });
  });

  $(document).ready(function() {
    $('#apply_promocode').click(function(e) {
      e.preventDefault();
      
       var form = $('.paymentFrm')[0];
        
       
      
      
        
    if (!form.checkValidity()) { 
        // $.alert('Some Fields Are Missing');
         form.reportValidity();
    }
    else{
        
      var val = $("#promocode").val();
      var plan = $("input[name='plan']:checked").val();
      $(".code_error").empty();
      if (plan == 0) {
        var price = 1500.00;

      } else {
        var price = 2500.00;

      }
      $("#payBtn").empty();
      $("#payBtn").append('SUBMIT REQUEST & PAY $' + price);

      
      if (val == '') {

      } else {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>Page/check_promocode",
          data: {
            code: val,
            plan: plan,
            csrf_test_name: "<?= $this->security->get_csrf_hash(); ?>"
          },
          dataType: "json",
          success: function(response) {

            if (response.status == 'success') {
              $(".code_error").empty();
              $(".code_error").append('<div class="text-center"><p class="text-success"><b>' + response.msg + '</b></p></div>');
              $("#payBtn").empty();
              $("#payBtn").append('SUBMIT REQUEST & PAY $' + response.total);
              
              if(response.total==0)
              {
                  $("#restrict").val(1);
                  $('.paymentFrm').removeAttr('id');
                  $('.card_form').empty();
                //   $('.payBtn').removeAttr('id');
                 setTimeout(function() {
                   $(".paymentFrm").submit();
                 }, 2000);
              }
            } else {
              if (plan == 0) {
                var price = 1500.00;

              } else {
                var price = 2500.00;

              }
              $("#payBtn").empty();
              $("#payBtn").append('SUBMIT REQUEST & PAY $' + price);

              $(".code_error").empty();
              $(".code_error").append('<div class="text-center"><p class="text-danger"><b>' + response.msg + '</b></p></div>');
            }

          }
        });
      }
      
    }

    });
  });
</script>