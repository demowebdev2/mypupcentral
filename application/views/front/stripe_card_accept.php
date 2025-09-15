<script src="https://js.stripe.com/v2/"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script><script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
// Set your publishable key
Stripe.setPublishableKey('<?php echo $this->config->item('stripe_publishable_key'); ?>');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        // Enable the submit button
        $('#payBtn').removeAttr("disabled");
        // Display the errors on the form
        $(".card-errors").html('<div class="alert alert-danger"><p>'+response.error.message+'</p></div>');
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
    // On form submit
    $("#paymentFrm").submit(function() {
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
    });

    
});

</script>
<?php
$user=$this->common_model->list_row('user_accounts',array('id'=>$_SESSION['siteuser']['id']));
if($user->is_privilaged==1)
{
   ?>
   <script>
$(document).ready(function () {
    $(".card-errors").empty();
        var promo = $('#promocode').val();
        var tot = $('#tot').val();
        // alert(promo);
        var form = $("#paymentFrm")[0];
        var data = new FormData(form);
        data.append('promocode', 'ADMINDISCOUNT5');
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>frontend/AdController/getpromocode",
                data: data,
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(response) {
                   // alert(response.tot);
                    if(response.status == 'success')
                    {
                       $('#payBtn').html('');
                       $('#payBtn').html('Pay $'+response.tot);
                       $(".card-errors").html('<div class="alert alert-success"><p>Promocode "ADMINDISCOUNT5" Applied</p></div>');
                       if(response.tot < '1')
                       {
                            window.location.href = response.url;
                       }
                    }
                    else if(response.status == 'fail')
                    {
                        $(".card-errors").html('<div class="alert alert-danger"><p>'+response.tot+'</p></div>'); 
                        $("#promocode").val('');  
                    }
            }
            });
});
    </script>
   
   <?php
}
?>

<script>


    $(document).on('click', '#apply_promocode', function() {
        $(".card-errors").empty();
        var promo = $('#promocode').val();
        var tot = $('#tot').val();
        // alert(promo);
        var form = $("#paymentFrm")[0];
        var data = new FormData(form);
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>frontend/AdController/getpromocode",
                data: data,
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(response) {
                   // alert(response.tot);
                    if(response.status == 'success')
                    {
                       $('#payBtn').html('');
                       $('#payBtn').html('Pay $'+response.tot);
                       $(".card-errors").html('<div class="alert alert-success"><p>Promocode Applied</p></div>');
                       if(response.tot < '1')
                       {
                            window.location.href = response.url;
                       }
                    }
                    else if(response.status == 'fail')
                    {
                        $(".card-errors").html('<div class="alert alert-danger"><p>'+response.tot+'</p></div>'); 
                        $("#promocode").val('');  
                    }
            }
            });


    });
</script>

<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<div class="main-container">
    <div class="container">
        <div class="row">

        <div class="col-lg-8 col-md-10 col-sm-10 col-12 login-box mt-2">
        <div class="card-errors "><?php if ($this->session->flashdata('msg')) { ?>
                        <?php echo $this->session->flashdata('msg') ?>
                    <?php } ?></div>
            
            <!-- Payment form -->
            <form action="" method="POST" id="paymentFrm">
            <?php echo $this->customlib->getCSRF(); ?>
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
                </div><br>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>NAME ON CARD</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required="" autofocus="">
                </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>CARD NUMBER</label>
                    <input type="text" name="card_number" class="form-control" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" data-inputmask="'mask': '9999 9999 9999 9999'"  required="">
                </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label>EXPIRY DATE</label>
                               <div class="d-flex">
                              <!--   <input type="text" class="form-control" name="card_exp_month" id="card_exp_month" placeholder="MM" required="" data-inputmask="'mask': '99/999'"> -->
                                 <input type="text" class="form-control" name="card_exp_month" id="card_exp_month" placeholder="MM" required="" data-inputmask="'mask': '99'">
                                 <input type="text" class="form-control" name="card_exp_year" id="card_exp_year" placeholder="YYYY" data-inputmask="'mask': '9999'"required="">
                               </div>
                        </div>
                </div>
                <div class="col-md-6">

                        <div class="form-group">
                            <label>CVC CODE</label>
                            <input type="text" name="card_cvc" class="form-control" id="card_cvc" placeholder="CVC" autocomplete="off" required="" data-inputmask="'mask': '999'">
                        </div>
                </div>
                <input type="hidden" name="tot" id="tot" value="<?=$tot?>">
                <input type="hidden" name="ad_id" id="ad_id" value="<?=$ad_id?>">
                <input type="hidden" name="id" id="id" value="<?=$id?>">
                <input type="hidden" name="pay_id" id="pay_id" value="<?=$pay_id?>">
                <input type="hidden" name="cart" id="cart" value="<?=$cart?>">
                
                <div class="col-md-12">
                  <button style="width:100%; background-color:#8cc63f;" type="submit" class="btn btn-success" id="payBtn">PAY $<?=$tot?></button>
                </div>
              </div>
                
            </form>
        </div>

        </div>
    </div>
</div>