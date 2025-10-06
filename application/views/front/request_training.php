<script src="https://js.stripe.com/v3/"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>assets/datepicker/css/default/zebra_datepicker.min.css" type="text/css">
<link rel="stylesheet" href="<?= base_url() ?>assets/datepicker/zebrastyle.css" type="text/css">
<script src="<?= base_url() ?>assets/datepicker/zebra_datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/datepicker/zebrascript.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>


<script>
  // Stripe v3 initialization
  var stripe = Stripe('<?php echo $this->config->item('stripe_publishable_key'); ?>');
  var elements = stripe.elements();
  var card;

  document.addEventListener('DOMContentLoaded', function(){
    // Create and mount the Card Element
    var style = {
      base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': { color: '#aab7c4' }
      },
      invalid: { color: '#fa755a', iconColor: '#fa755a' }
    };
    if (document.getElementById('card-element')) {
      card = elements.create('card', { hidePostalCode: true, style: style });
      card.mount('#card-element');
      card.on('change', function(event) {
        if (event.error) {
          $(".card-errors").html('<div class="alert alert-danger"><p>' + event.error.message + '</p></div>');
        } else {
          $(".card-errors").empty();
        }
      });
    }
  });

  $(document).ready(function() {
    $("#paymentFrm").submit(function(e) {
      var dd = $("#restrict").val();
      console.log('Form submit triggered, restrict value:', dd);

      if (dd == 0) {
        console.log('Processing paid order with Stripe v3');
        e.preventDefault();
        e.stopPropagation();
        $('#payBtn').attr("disabled", "disabled");

        if (!card) {
          console.error('Stripe Card Element not initialized');
          $(".card-errors").html('<div class="alert alert-danger"><p>Payment form is not ready. Please reload the page.</p></div>');
          $('#payBtn').removeAttr("disabled");
          return false;
        }

        stripe.createToken(card).then(function(result) {
          if (result.error) {
            $(".card-errors").html('<div class="alert alert-danger"><p>' + result.error.message + '</p></div>');
            $('#payBtn').removeAttr("disabled");
          } else {
            var form$ = $("#paymentFrm");
            form$.append("<input type='hidden' name='stripeToken' value='" + result.token.id + "' />");
            form$.get(0).submit();
          }
        });
        return false;
      } else if (dd == 1) {
        console.log('Processing free order, allowing form submission');
        $('#payBtn').attr("disabled", "disabled");
        return true;
      } else {
        console.log('Unknown restrict value:', dd, 'allowing default submission');
        return true;
      }
    });
  });
</script>

<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<style>
/* Form validation styles */
.is-invalid {
    border-color: #dc3545 !important;
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
}

.is-valid {
    border-color: #28a745 !important;
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25) !important;
}

.invalid-feedback {
    display: block;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875rem;
    color: #dc3545;
    font-weight: 500;
}

.valid-feedback {
    display: block;
    width: 100%;
    margin-top: 0.25rem;
    font-size: 0.875rem;
    color: #28a745;
    font-weight: 500;
}

@keyframes errorPulse {
    0% { box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25); }
    50% { box-shadow: 0 0 0 0.4rem rgba(220, 53, 69, 0.4); }
    100% { box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25); }
}

.error-highlight {
    animation: errorPulse 1s ease-in-out;
}
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

#wrapper {
    padding-top: 0px !important;
    background-color: #FFFFFF;
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
                <p>Before your puppy moves from the breeder to the trainer you will be required to:</p>

                <ol>
                  <li>Pay the breeder in full for the price of your puppy. This payment is non-refundable after the puppy
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
                  <h2 class="total_box" id="total_display"><b>TOTAL: $1500.00 </b></h2>
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
                      <label>CARD DETAILS</label>
                      <div id="card-element" class="form-control" style="padding-top: 10px; padding-bottom: 10px;"></div>
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
              
              // Show discount breakdown
              var originalPrice = (plan == 0) ? 1500.00 : 2500.00;
              var discountAmount = response.dis || 0;
              var finalPrice = response.total || originalPrice;
              
              var discountHtml = '<div class="alert alert-success">' +
                '<h6><i class="fas fa-check-circle"></i> ' + response.msg + '</h6>' +
                '<div class="row">' +
                  '<div class="col-6"><strong>Original Price:</strong></div>' +
                  '<div class="col-6 text-right">$' + originalPrice.toFixed(2) + '</div>' +
                '</div>' +
                '<div class="row">' +
                  '<div class="col-6"><strong>Discount Applied:</strong></div>' +
                  '<div class="col-6 text-right text-success">-$' + discountAmount.toFixed(2) + '</div>' +
                '</div>' +
                '<hr>' +
                '<div class="row">' +
                  '<div class="col-6"><strong>Final Price:</strong></div>' +
                  '<div class="col-6 text-right"><strong>$' + finalPrice.toFixed(2) + '</strong></div>' +
                '</div>' +
              '</div>';
              
              $(".code_error").append(discountHtml);
              $("#payBtn").empty();
              $("#payBtn").append('SUBMIT REQUEST & PAY $' + finalPrice.toFixed(2));
              
              // Update the total display
              $("#total_display").html('<b>TOTAL: $' + finalPrice.toFixed(2) + '</b>');
              
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
              
              // Reset total display to original price
              $("#total_display").html('<b>TOTAL: $' + price.toFixed(2) + '</b>');
            }

          }
        });
      }
      
    }

    });
  });
</script>
<script>
  // Validation helpers and gating for Request Training
  function rt_showFieldError(field, message) {
    if (!field || !message) return;
    try {
      field.classList.add('is-invalid');
      field.classList.remove('is-valid');
      var errorId = (field.name || field.id || 'field') + '_error';
      var existingError = document.getElementById(errorId);
      if (existingError) {
        existingError.textContent = message;
      } else {
        var errorDiv = document.createElement('div');
        errorDiv.id = errorId;
        errorDiv.className = 'invalid-feedback';
        errorDiv.textContent = message;
        if (field.parentNode) field.parentNode.appendChild(errorDiv);
      }
    } catch (e) { console.error('Error showing field error:', e); }
  }

  function rt_clearFieldError(field) {
    if (!field) return;
    try {
      field.classList.remove('is-invalid');
      field.classList.add('is-valid');
      var errorId = (field.name || field.id || 'field') + '_error';
      var existingError = document.getElementById(errorId);
      if (existingError) existingError.remove();
    } catch (e) { console.error('Error clearing field error:', e); }
  }

  function rt_clearAllErrors() {
    try {
      document.querySelectorAll('.is-invalid').forEach(function(el){ el.classList.remove('is-invalid'); });
      document.querySelectorAll('.invalid-feedback').forEach(function(msg){ if (msg && msg.parentNode) msg.remove(); });
    } catch (e) { console.error('Error clearing all errors:', e); }
  }

  function rt_scrollToFirstError(field) {
    if (!field) return;
    try {
      field.scrollIntoView({ behavior: 'smooth', block: 'center' });
      field.focus();
      field.classList.add('error-highlight');
      setTimeout(function(){ if (field) field.classList.remove('error-highlight'); }, 2000);
    } catch (e) { console.error('Error scrolling to first error:', e); }
  }

  function rt_validateForm() {
    var isValid = true;
    var firstErrorField = null;
    try {
      var required = [
        { sel: '[name="first_name"]', label: 'First Name' },
        { sel: '[name="last_name"]', label: 'Last Name' },
        { sel: '[name="phone"]', label: 'Phone' },
        { sel: '[name="email"]', label: 'Email' },
        { sel: '[name="address"]', label: 'Address' },
        { sel: '[name="city"]', label: 'City' },
        { sel: '[name="state"]', label: 'State' },
        { sel: '[name="zip_code"]', label: 'Zip Code' },
        { sel: '[name="puppy_name"]', label: 'Puppy Name' },
        { sel: '[name="puppy_dob"]', label: 'Puppy DOB' },
        { sel: '[name="start_date"]', label: 'Preferred Start Date' },
        { sel: '#agreement', type: 'checkbox', label: 'Agreement' }
      ];
      required.forEach(function(f){
        var el = document.querySelector(f.sel);
        if (!el) return;
        var empty = f.type === 'checkbox' ? !el.checked : !(el.value && el.value.trim());
        if (empty) {
          rt_showFieldError(el, f.label + ' is required');
          if (!firstErrorField) firstErrorField = el;
          isValid = false;
        } else {
          rt_clearFieldError(el);
        }
      });

      var emailEl = document.querySelector('[name="email"]');
      if (emailEl && emailEl.value && emailEl.value.trim()) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailEl.value.trim())) {
          rt_showFieldError(emailEl, 'Please enter a valid email address');
          if (!firstErrorField) firstErrorField = emailEl;
          isValid = false;
        }
      }

      var phoneRegex = /^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/;
      var phoneEl = document.querySelector('[name="phone"]');
      if (phoneEl && phoneEl.value && phoneEl.value.trim() && !phoneRegex.test(phoneEl.value.trim())) {
        rt_showFieldError(phoneEl, 'Please enter phone number in format (888) 555-3333');
        if (!firstErrorField) firstErrorField = phoneEl;
        isValid = false;
      }
      var breederPhoneEl = document.querySelector('[name="breeder_phone"]');
      if (breederPhoneEl && breederPhoneEl.value && breederPhoneEl.value.trim() && !phoneRegex.test(breederPhoneEl.value.trim())) {
        rt_showFieldError(breederPhoneEl, 'Please enter phone number in format (888) 555-3333');
        if (!firstErrorField) firstErrorField = breederPhoneEl;
        isValid = false;
      }
    } catch (e) {
      console.error('Validation error:', e);
      isValid = false;
    }
    return { isValid: isValid, firstErrorField: firstErrorField };
  }

  // Real-time validators and phone formatting
  $(document).ready(function(){
    function formatPhone($input){
      try {
        var value = $input.val().replace(/\D/g, '');
        var formatted = '';
        if (value.length > 0) {
          if (value.length <= 3) formatted = '(' + value;
          else if (value.length <= 6) formatted = '(' + value.substring(0,3) + ') ' + value.substring(3);
          else formatted = '(' + value.substring(0,3) + ') ' + value.substring(3,6) + '-' + value.substring(6,10);
        }
        $input.val(formatted);
      } catch (e) { console.error('Phone format error:', e); }
    }
    $('[name="phone"]').on('input', function(){ formatPhone($(this)); });
    $('[name="breeder_phone"]').on('input', function(){ formatPhone($(this)); });

    $('[name="first_name"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'First Name is required') : rt_clearFieldError(this); });
    $('[name="last_name"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'Last Name is required') : rt_clearFieldError(this); });
    $('[name="email"]').on('blur', function(){
      var v = this.value.trim();
      if (v === '') return rt_showFieldError(this, 'Email is required');
      var rgx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!rgx.test(v)) return rt_showFieldError(this, 'Please enter a valid email address');
      rt_clearFieldError(this);
    });
    $('[name="phone"]').on('blur', function(){
      var v = this.value.trim();
      if (v === '') return rt_showFieldError(this, 'Phone is required');
      var rgx = /^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/;
      if (!rgx.test(v)) return rt_showFieldError(this, 'Please enter phone number in format (888) 555-3333');
      rt_clearFieldError(this);
    });
    $('[name="address"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'Address is required') : rt_clearFieldError(this); });
    $('[name="city"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'City is required') : rt_clearFieldError(this); });
    $('[name="state"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'State is required') : rt_clearFieldError(this); });
    $('[name="zip_code"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'Zip Code is required') : rt_clearFieldError(this); });
    $('[name="puppy_name"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'Puppy Name is required') : rt_clearFieldError(this); });
    $('[name="puppy_dob"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'Puppy DOB is required') : rt_clearFieldError(this); });
    $('[name="start_date"]').on('blur', function(){ this.value.trim() === '' ? rt_showFieldError(this, 'Preferred Start Date is required') : rt_clearFieldError(this); });
  });

  // Gate submission BEFORE jQuery handlers using capture
  document.addEventListener('DOMContentLoaded', function(){
    var form = document.getElementById('paymentFrm');
    if (!form) return;
    form.addEventListener('submit', function(e){
      var restrictVal = document.getElementById('restrict') ? document.getElementById('restrict').value : '0';
      if (restrictVal == '1') return; // allow free orders
      rt_clearAllErrors();
      var result = rt_validateForm();
      if (!result.isValid) {
        e.preventDefault();
        e.stopPropagation();
        rt_scrollToFirstError(result.firstErrorField);
      }
    }, true); // capture so we run before jQuery submit handlers
  });
</script>