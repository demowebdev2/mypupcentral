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

/* Error highlight animation */
@keyframes errorPulse {
    0% { box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25); }
    50% { box-shadow: 0 0 0 0.4rem rgba(220, 53, 69, 0.4); }
    100% { box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25); }
}

.error-highlight {
    animation: errorPulse 1s ease-in-out;
}

/* Form field focus improvements */
.form-control:focus {
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

/* Required field indicator */
.required label::after {
    content: " *";
    color: #dc3545;
    font-weight: bold;
}
</style>

<script>
    function onSubmit(token) {
        console.log('onSubmit called with token:', token);
        
        // Clear previous error states
        clearAllErrors();
        
        // Validate form
        var validationResult = validateRegistrationForm();
        
        if (validationResult.isValid) {
            // If validation passes, submit the form
            console.log('Validation passed, submitting form');
            document.getElementById("register_form").submit();
        } else {
            // If validation fails, scroll to first error and highlight
            console.log('Validation failed, scrolling to error');
            scrollToFirstError(validationResult.firstErrorField);
        }
    }
    
    // Add direct form submission handler as backup
    function handleFormSubmit(event) {
        console.log('Direct form submit handler called');
        
        // Prevent default form submission
        event.preventDefault();
        event.stopPropagation();
        
        // Clear previous error states
        clearAllErrors();
        
        // Validate form
        var validationResult = validateRegistrationForm();
        
        if (validationResult.isValid) {
            // If validation passes, submit the form
            console.log('Validation passed, submitting form');
            document.getElementById("register_form").submit();
        } else {
            // If validation fails, scroll to first error and highlight
            console.log('Validation failed, scrolling to error');
            scrollToFirstError(validationResult.firstErrorField);
        }
    }
    
    function validateRegistrationForm() {
        console.log('Starting form validation...');
        var isValid = true;
        var firstErrorField = null;
        var errors = [];
        
        try {
            // Required fields validation
            var requiredFields = [
                { name: 'name', label: 'Breeder Name' },
                { name: 'phone', label: 'Phone' },
                { name: 'email', label: 'Email' },
                { name: 'password', label: 'Password' },
                { name: 'password_confirmation', label: 'Confirm Password' },
                { name: 'accept_terms', label: 'Terms & Conditions' }
            ];
            
            // Check required fields
            requiredFields.forEach(function(field) {
                try {
                    var element = document.querySelector('[name="' + field.name + '"]');
                    if (!element) return;
                    
                    var value = element.value ? element.value.trim() : '';
                    var isEmpty = false;
                    
                    if (field.name === 'accept_terms') {
                        isEmpty = !element.checked;
                    } else {
                        isEmpty = value === '';
                    }
                    
                    if (isEmpty) {
                        showFieldError(element, field.label + ' is required');
                        if (!firstErrorField) firstErrorField = element;
                        isValid = false;
                    } else {
                        clearFieldError(element);
                    }
                } catch (e) {
                    console.error('Error validating field ' + field.name + ':', e);
                }
            });
        } catch (e) {
            console.error('Error in validation:', e);
            isValid = false;
        }
        
        // Email validation
        try {
            var emailField = document.querySelector('[name="email"]');
            if (emailField && emailField.value && emailField.value.trim()) {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailField.value.trim())) {
                    showFieldError(emailField, 'Please enter a valid email address');
                    if (!firstErrorField) firstErrorField = emailField;
                    isValid = false;
                }
            }
        } catch (e) {
            console.error('Error validating email:', e);
        }
        
        // Phone validation
        try {
            var phoneField = document.querySelector('[name="phone"]');
            if (phoneField && phoneField.value && phoneField.value.trim()) {
                var phoneRegex = /^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/;
                if (!phoneRegex.test(phoneField.value.trim())) {
                    showFieldError(phoneField, 'Please enter phone number in format (888) 555-3333');
                    if (!firstErrorField) firstErrorField = phoneField;
                    isValid = false;
                }
            }
        } catch (e) {
            console.error('Error validating phone:', e);
        }
        
        // Password validation
        try {
            var passwordField = document.querySelector('[name="password"]');
            if (passwordField && passwordField.value && passwordField.value.trim()) {
                if (passwordField.value.length < 6) {
                    showFieldError(passwordField, 'Password must be at least 6 characters long');
                    if (!firstErrorField) firstErrorField = passwordField;
                    isValid = false;
                }
            }
        } catch (e) {
            console.error('Error validating password:', e);
        }
        
        // Password confirmation validation
        try {
            var passwordField = document.querySelector('[name="password"]');
            var confirmPasswordField = document.querySelector('[name="password_confirmation"]');
            if (passwordField && confirmPasswordField && 
                passwordField.value && confirmPasswordField.value &&
                passwordField.value.trim() && confirmPasswordField.value.trim()) {
                if (passwordField.value !== confirmPasswordField.value) {
                    showFieldError(confirmPasswordField, 'Passwords do not match');
                    if (!firstErrorField) firstErrorField = confirmPasswordField;
                    isValid = false;
                }
            }
        } catch (e) {
            console.error('Error validating password confirmation:', e);
        }
        
        console.log('Validation complete. isValid:', isValid, 'firstErrorField:', firstErrorField);
        return {
            isValid: isValid,
            firstErrorField: firstErrorField,
            errors: errors
        };
    }
    
    function showFieldError(field, message) {
        if (!field || !message) return;
        
        try {
            // Add error class to field
            field.classList.add('is-invalid');
            
            // Remove success class if present
            field.classList.remove('is-valid');
            
            // Create or update error message
            var errorId = field.name + '_error';
            var existingError = document.getElementById(errorId);
            
            if (existingError) {
                existingError.textContent = message;
            } else {
                var errorDiv = document.createElement('div');
                errorDiv.id = errorId;
                errorDiv.className = 'invalid-feedback';
                errorDiv.textContent = message;
                
                // Insert error message after the field
                if (field.parentNode) {
                    field.parentNode.appendChild(errorDiv);
                }
            }
        } catch (e) {
            console.error('Error showing field error:', e);
        }
    }
    
    function clearFieldError(field) {
        if (!field) return;
        
        try {
            // Remove error class
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            
            // Remove error message
            var errorId = field.name + '_error';
            var existingError = document.getElementById(errorId);
            if (existingError) {
                existingError.remove();
            }
        } catch (e) {
            console.error('Error clearing field error:', e);
        }
    }
    
    function clearAllErrors() {
        try {
            // Remove all error classes and messages
            var errorFields = document.querySelectorAll('.is-invalid');
            errorFields.forEach(function(field) {
                if (field) {
                    field.classList.remove('is-invalid');
                }
            });
            
            var errorMessages = document.querySelectorAll('.invalid-feedback');
            errorMessages.forEach(function(message) {
                if (message && message.parentNode) {
                    message.remove();
                }
            });
        } catch (e) {
            console.error('Error clearing all errors:', e);
        }
    }
    
    function scrollToFirstError(field) {
        if (!field) return;
        
        try {
            // Scroll to the field with some offset
            field.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
            
            // Focus the field
            field.focus();
            
            // Add error highlight animation
            field.classList.add('error-highlight');
            setTimeout(function() {
                if (field) {
                    field.classList.remove('error-highlight');
                }
            }, 2000);
        } catch (e) {
            console.error('Error scrolling to first error:', e);
        }
   }
</script>


<script>

 $(document).ready(function () {
     	
     	var token = "<?= $this->security->get_csrf_hash(); ?>";
     load_captcha()
     
     // Phone number formatting
     $('#phone').on('input', function() {
         try {
             var value = $(this).val().replace(/\D/g, ''); // Remove all non-digits
             var formattedValue = '';
             
             if (value.length > 0) {
                 if (value.length <= 3) {
                     formattedValue = '(' + value;
                 } else if (value.length <= 6) {
                     formattedValue = '(' + value.substring(0, 3) + ') ' + value.substring(3);
                 } else {
                     formattedValue = '(' + value.substring(0, 3) + ') ' + value.substring(3, 6) + '-' + value.substring(6, 10);
                 }
             }
             
             $(this).val(formattedValue);
         } catch (e) {
             console.error('Error formatting phone number:', e);
         }
     });
     
     // Format existing value on page load
     var existingValue = $('#phone').val();
     if (existingValue) {
         $('#phone').trigger('input');
     }
     
     // Real-time validation for form fields
     $('input[name="name"]').on('blur', function() {
         try {
             if ($(this).val().trim() === '') {
                 showFieldError(this, 'Breeder Name is required');
             } else {
                 clearFieldError(this);
             }
         } catch (e) {
             console.error('Error validating name field:', e);
         }
     });
     
     $('input[name="email"]').on('blur', function() {
         try {
             var email = $(this).val().trim();
             if (email === '') {
                 showFieldError(this, 'Email is required');
             } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                 showFieldError(this, 'Please enter a valid email address');
             } else {
                 clearFieldError(this);
             }
         } catch (e) {
             console.error('Error validating email field:', e);
         }
     });
     
     $('input[name="phone"]').on('blur', function() {
         try {
             var phone = $(this).val().trim();
             if (phone === '') {
                 showFieldError(this, 'Phone is required');
             } else if (!/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/.test(phone)) {
                 showFieldError(this, 'Please enter phone number in format (888) 555-3333');
             } else {
                 clearFieldError(this);
             }
         } catch (e) {
             console.error('Error validating phone field:', e);
         }
     });
     
     $('input[name="password"]').on('blur', function() {
         try {
             var password = $(this).val();
             if (password === '') {
                 showFieldError(this, 'Password is required');
             } else if (password.length < 6) {
                 showFieldError(this, 'Password must be at least 6 characters long');
             } else {
                 clearFieldError(this);
             }
         } catch (e) {
             console.error('Error validating password field:', e);
         }
     });
     
     $('input[name="password_confirmation"]').on('blur', function() {
         try {
             var password = $('input[name="password"]').val();
             var confirmPassword = $(this).val();
             if (confirmPassword === '') {
                 showFieldError(this, 'Confirm Password is required');
             } else if (password !== confirmPassword) {
                 showFieldError(this, 'Passwords do not match');
             } else {
                 clearFieldError(this);
             }
         } catch (e) {
             console.error('Error validating password confirmation field:', e);
         }
     });
     
     // Real-time password confirmation validation
     $('input[name="password"]').on('input', function() {
         try {
             var confirmPasswordField = $('input[name="password_confirmation"]');
             if (confirmPasswordField.val() !== '') {
                 confirmPasswordField.trigger('blur');
             }
         } catch (e) {
             console.error('Error in password confirmation validation:', e);
         }
     });
     
     // Add form submit event listener as backup
     $('#register_form').on('submit', function(event) {
         console.log('Form submit event triggered');
         
         // Check if reCAPTCHA is loaded and working
         if (typeof grecaptcha !== 'undefined' && grecaptcha.getResponse) {
             var recaptchaResponse = grecaptcha.getResponse();
             if (recaptchaResponse) {
                 // reCAPTCHA is working, let it handle submission
                 console.log('reCAPTCHA response found, letting reCAPTCHA handle submission');
                 return true;
             }
         }
         
         // If reCAPTCHA is not working, handle validation manually
         console.log('reCAPTCHA not working, handling validation manually');
         handleFormSubmit(event);
         return false;
     });
     
     // Add click handler for submit button as additional backup
     $('.g-recaptcha').on('click', function(event) {
         console.log('Submit button clicked');
         
         // Small delay to allow reCAPTCHA to process
         setTimeout(function() {
             // Check if reCAPTCHA processed the click
             if (typeof grecaptcha !== 'undefined' && grecaptcha.getResponse) {
                 var recaptchaResponse = grecaptcha.getResponse();
                 if (!recaptchaResponse) {
                     // reCAPTCHA didn't process, handle validation manually
                     console.log('reCAPTCHA did not process click, handling validation manually');
                     handleFormSubmit(event);
                 }
             }
         }, 100);
     });

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
                                        <label class="col-md-4 col-form-label">Breeder Name <sup>*</sup></label>
                                        <div class="col-md-6">
                                            <input name="name" placeholder="Breeder Name" class="form-control input-md" type="text" value="<?= set_value('name') ?>" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-md-4 col-form-label">Business Name</label>
                                        <div class="col-md-6">
                                            <input name="business_name" placeholder="Business Name (Optional)" class="form-control input-md" type="text" value="<?= set_value('business_name') ?>">
                                        </div>
                                    </div>

                                    <input id="countryCode" name="country_code" type="hidden" value="US">


                                    <div class="row mb-3 required">
                                        <label class="col-md-4 col-form-label">Phone <sup>*</sup>
                                        </label>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span id="phoneCountry" class="input-group-text"><img src="<?= base_url() ?>assets/front/images/flags/16/us.png" style="padding: 2px;"></span>
                                                <input name="phone" id="phone" placeholder="(888) 555-3333" class="form-control input-md" type="text" value="<?= set_value('phone') ?>" maxlength="14" required>

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
                                                <textarea name="description" placeholder="Briefly describe your breeding practices (this will be shown on your Breeder Information page)" rows="5" cols="10" style="height: 140px;" class="form-control"></textarea>

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