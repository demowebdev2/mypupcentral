
<script>
    function onSubmit(token) {
    //   alert('fsd');
    
    //  $("#contactForm").submit();
     var form = $('#contact_form')[0];
     
      if (!form.checkValidity()) {
            event.preventDefault(); // Prevent the default form submission if not valid
            event.stopPropagation(); // Stop event propagation
              form.reportValidity();
        }
        else{
            document.getElementById("contact_form").submit();
        }
        
     
    
   }
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

<style>
    h1{    
    font-size: 2em;
    margin: 10px 0px;
    font-weight: 700;
    text-align: center;
    color:#626262;
}
.cnt-ion {
    background: #8cc63f;
    margin: 10px;
    padding: 10px;
    color: #fff;
    display: flex;
    justify-content: center;
    align-content: center;
    width: 60px;
    height: 60px;
    font-size: 18pt;
    flex-direction: column;
    text-align: center;
    border-radius: 50%;
}
.cntconent {
    display: flex;
    height: 100%;
    align-content: center;
    justify-content: center;
    flex-direction: column;
}
.cntdetails {
    display: flex;
    align-content: center;
    height: 100%;
    justify-content: center;
    flex-direction: column;
    padding:20px;
}
.cntdetails .col-3.col-md-2, .cntdetails .col-9.col-md-10 {
    margin: 5px 0px;
}
.cntdetails {
    background: #8cc63f;
    color: #fff;
}
.mybox{
    box-shadow: 0px 0px 10px 0px #e6e6e6;
    margin: 20px 0px;
    border-radius: 5px;
    overflow:hidden;
}
form {
    padding: 20px 20px 40px;
}
</style>
<section class="contact pt-5 pb-5">
    <div class="container">
         <div class="row">
             <div class="col-md-12">
             <h1>Contact Us</h1>
             <br><br>
         </div>
        <div class="col-md-12">
            <div class="row mybox">
                <div class="col-md-6">
                        <?php $attributes = array('class' => '', 'id' => 'contact_form');
                          echo form_open_multipart('', $attributes);?>
                            <div class="field">
                                <label for="name" class="label is-size-4 has-text-weight-light"></label>
                                <div class="control has-icons-left">
                                    <input type="text" name="name" id="name" class="input" placeholder="Name" autofocus required>
                                        <span class="icon is-left">
                                            <i class="fa fa-user"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="email" class="label is-size-4 has-text-weight-light"></label>
                                <div class="control has-icons-left">
                                    <input type="email" name="email" id="email" class="input" placeholder="Email" required>
                                        <span class="icon is-left">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                </div>
                            </div>
                            <div class="field">
                                <label for="message" class="label is-size-4 has-text-weight-light"></label>
                                <textarea name="message" id="message" rows="5" class="textarea is-medium" placeholder="Message" required></textarea>
                            </div>
                            <button   type="submit"  class=" btn btn-light-blue is-size-5" > Submit </button>
                           <!--  <button   data-sitekey="6Lfy9i0nAAAAAOyFg5Z1uP7Yk6tyt_kLvQuWkAJN"   data-callback='onSubmit'   data-action='submit'  class=" g-recaptcha btn btn-light-blue is-size-5" > Submit </button>
                    -->
                          
                         
                        <?php echo form_close()?>
                </div>
                <div class="col-md-6 pr-0">
                    <div class="cntdetails">
                    <div class="row">
                            <div class="col-3 col-md-2">
                            
                                <div class="cnt-ion">
                                    <i class="fa fa-map-marker-alt"></i>
                                </div>
                                
                            </div>
                            <div class="col-9 col-md-10">
                                <div class="cntconent">
                                    <p>
                                    <b>Address:</b> Dundee, Ohio, USA
                                 </p>
                                </div>
                                
                            </div>
                            <!-- <div class="col-3 col-md-2">-->
                            
                            <!--    <div class="cnt-ion">-->
                            <!--        <i class="fa fa-phone"></i>-->
                            <!--    </div>-->
                                
                            <!--</div>-->
                            <!--<div class="col-9 col-md-10">-->
                            <!--     <div class="cntconent">-->
                            <!--    <p>-->
                            <!--        <b>Phone:</b>-->
                            <!--    </p>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-3 col-md-2">
                            
                                <div class="cnt-ion">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                
                            </div>
                            <div class="col-9 col-md-10">
                                 <div class="cntconent">
                                <p>
                                    <b>Email:</b> info@mypupcentral.com
                                </p>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
          
        </div>
         <div class="col-md-12 pt-5 pb-5">
            <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57697.66523654952!2d-81.51012462337668!3d40.533635179803085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8836e24e0e8813d1%3A0x89850ea99dd1ea16!2sDover%2C%20OH%2C%20USA!5e0!3m2!1sen!2sin!4v1636548363055!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24239.151415246615!2d-81.62389269111878!3d40.58809672809957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8837194b81ae44c1%3A0x168d54c8c578902a!2sDundee%2C%20OH%2044624%2C%20USA!5e0!3m2!1sen!2sin!4v1648042001869!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
         </div>
         </div>
    </div>
</section>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<script>

    
    $(document).ready(function(){  

        $('#contact_form').on('submit', function(e)
        {
         e.preventDefault();        
        
        var baseurl = "<?php echo base_url()?>";      
         $('#submit_btn').prop('disabled',true); 
         $('#submit_btn').empty();
         $('#submit_btn').val('Please Wait...');    
         var form = $("#contact_form")[0];

        var data = new FormData(form);
                 $.ajax({  

                     url:baseurl+"frontend/ContactController/contact",  
                    method: "post",
                    data: data,
                    enctype: "multipart/form-data",
                    processData: false, // Important!
                    contentType: false,
                    cache: false,
                    dataType:"JSON",

                     success:function(data)  
                     {  console.log(data);
                         if(data.status=='success')
                         {                        
                          
                            Swal.fire("Success", "Your Message Sent! Our Representative shall contact you soon.", "success");   
                             window.location.href = "<?php echo base_url('contact')?>";
                         }
                         else{
                            Swal.fire("Error", "Message Sending Failed.", "error");
                            window.location.href = "<?php echo base_url('contact')?>";
                            $('#submit_btn').empty();
                            $('#submit_btn').val('Save');
                            $('#submit_btn').prop('disabled',false); 
                
                         }
                       
                     }  
                 }); 
       });
       });
   
    </script> 