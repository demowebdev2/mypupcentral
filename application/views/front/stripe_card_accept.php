<script src="https://js.stripe.com/v3/"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
    // On form submit
    $("#paymentFrm").submit(function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        // Disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        if (!card) {
            console.error('Stripe Card Element not initialized');
            $(".card-errors").html('<div class="alert alert-danger"><p>Payment form is not ready. Please reload the page.</p></div>');
            $('#payBtn').removeAttr("disabled");
            return false;
        }
        
        // Create token using Stripe v3
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                $(".card-errors").html('<div class="alert alert-danger"><p>' + result.error.message + '</p></div>');
                $('#payBtn').removeAttr("disabled");
            } else {
                var form$ = $("#paymentFrm");
                // Get token id
                var token = result.token.id;
                // Insert the token into the form
                form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                // Submit form to the server
                form$.get(0).submit();
            }
        });
        
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
                       
                       // Show detailed discount breakdown
                       var originalPrice = parseFloat($('#tot').val());
                       var finalPrice = parseFloat(response.tot);
                       var discountAmount = originalPrice - finalPrice;
                       
                       var discountHtml = '<div class="alert alert-success">' +
                           '<h6><i class="fas fa-check-circle"></i> Promocode Applied</h6>' +
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
                       
                       $(".card-errors").html(discountHtml);
                       
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
                    <label>CARD DETAILS</label>
                    <div id="card-element" class="form-control" style="padding-top: 10px; padding-bottom: 10px;">
                      <!-- Stripe Elements will create form elements here -->
                    </div>
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