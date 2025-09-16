<style>
    .option_box {
        border: 1px solid #eee;
        padding: 15px;
        margin: 5px;
    }
</style>

<link rel="stylesheet" href="<?= base_url() ?>assets/datepicker/css/default/zebra_datepicker.min.css" type="text/css">
<link rel="stylesheet" href="<?= base_url() ?>assets/datepicker/zebrastyle.css" type="text/css">
<script src="<?= base_url() ?>assets/datepicker/zebra_datepicker.min.js"></script>
<script src="<?= base_url() ?>assets/datepicker/zebrascript.js"></script>
<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<div class="main-container">
    <div class="container">
        <div class="row">

            <?php $this->load->view('front/profile_sidebar'); ?>



            <div class="col-md-9 page-content">
                <div class="inner-box">

                    <!-- <div class="pull-right">
                        <a href="<?= base_url(); ?>new_post" class="btn btn-xs btn-success"><i class = "fas fa-plus"></i>&nbsp;Add New Ad</a>
                    </div> -->
                    <h2 class="title-2"> <i class="fas fa-calendar"></i> Book Time Slot </h2>

                    <div class="card card-default">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <center>
                                        <?php
                                        if (!empty($ad->featured_image)) {
                                        ?>
                                            <img style="max-height:200px;width:auto" src="<?php echo base_url('uploads/puppies/') . $ad->featured_image; ?>">
                                        <?php
                                        } else {
                                        ?>
                                            <video controls id="video-tag" height="100px" width="100px" style="object-fit: cover;">
                                                <source id="video-source" src="<?php echo base_url('uploads/puppies/') . $ad->featured_video; ?>">
                                            </video>
                                        <?php
                                        }
                                        ?>
                                    </center>
                                </div>

                                <div class="col-md-6">
                                    <h4><b><?= $ad->title ?></b></h4>

                                    <p><b> Puppy Name :</b> <?= $ad->puppy_name ?></p>
                                    <p><b> Puppy Breed :</b> <?= $ad->breed_name ?></p>
                                    <p><b> Puppy DOB :</b> <?= date('F j, Y', strtotime($ad->puppy_dob)); ?></p>
                                    <p> <b> Puppy Gender :</b> <?= $ad->puppy_sex ?></p>
                                    <p> <b> Puppy Size :</b> <?= $ad->puppy_size ?></p>


                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-default">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                        <?php echo $this->session->flashdata('msg') ?>
                                    <?php } ?>

                                    <form name="details" class="form-horizontal" id="formdata" role="form" method="POST" action="<?= base_url() ?>frontend/My_ads/proceed_pay/<?= $ad->post_id ?>" enctype="multipart/form-data">
                                        <?php echo $this->customlib->getCSRF(); ?>

                                        <div class="choose_box option_box">

                                            <!--<div class="row mb-3 required slotdate0">-->
                                            <!--    <label class="col-md-3 col-form-label">Date <sup>*</sup></label>-->
                                            <!--    <div class="col-md-9">-->
                                            <!--        <input name="date" id="datepicker0" type="text" class="form-control date_pick" placeholder="" value="<?= date("m/d/Y") ?>" required>-->
                                            <!--    </div>-->
                                            <!--</div>-->
                                            <!--<input type="hidden" name="number[]" value="0" id="">-->
                                            <div class="row mb-3 required">
                                                <label class="col-md-3 col-form-label ">Select Premium Plans <sup>*</sup></label>
                                                <div class="col-md-9">
                                                    <select class="form-control time_select time_check0" id="0" name="time0" required>
                                                        <option value="" disabled selected>Choose</option>
                                                        <?php foreach ($time_slots as $row) { ?>
                                                            <option value="<?= $row->id ?>"><?= $row->title ?></option>

                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <?php  if(!empty($breeds)){ ?>
                                             <div class="row mb-3 required">
                                                <label class="col-md-3 col-form-label "></label>
                                                <div class="col-md-9">
                                                    <input type="checkbox" value="1"  id="merge" name="merge"  >
                                                     <span>Show Premium in <a href="https://nosheddoodles.com" targer="_blank">Nosheddoodles.com</a></span>   
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="row mb-3 required">
                                                <label class="col-md-3 col-form-label ">Promo Code <sub>(If any)</sub></label>
                                                <div class="col-md-9">
                                                    <input class="form-control" id="promo_code" name="promo_code" oninput="this.value = this.value.toUpperCase()">
                                                     <span>(Press Tab key to calculate the payable amount after applying Promocode )</span>   
                                                </div>
                                            </div>
                                            <!--<div id="date_sec">-->
                                            
                                            <!--</div>-->
                                            <!--<div class="time_slots_div0">-->

                                            <!--</div>-->

                                            <!--<center>-->
                                            <!--    <button type="button" id="0" class="btn btn-primary add_time"><i class="fas fa-plus"></i> Time slot</button>-->
                                            <!--</center>-->
                                        </div>

                                        <!--<div class="choose_box_append">-->


                                        <!--</div>-->

                                        <!--<div>-->
                                        <!--    <button style="float: right;" type="button" id="add_box" class="btn btn-success"><i class="fas fa-plus"></i> Add Date</button>-->
                                        <!--</div>-->

                                        <!--<br><br>-->
                                        <div class="row mb-3">
                                            <div class="offset-md-3 col-md-9 price">
                                                <h4><b>Total :$ 0 </b></h4>
                                            </div>
                                        </div>

                                        <!--<div class="row mb-3">-->
                                        <!--    <div class="offset-md-3 col-md-9"></div>-->
                                        <!--</div>-->


                                        <div class="row">
                                            <div class="offset-md-3 col-md-9">
                                                <button type="button" onclick="check()" class="btn btn-primary">Proceed to Pay</button>
                                                <button type="submit" id="sub_btn"  class="d-none btn btn-primary">Proceed to Pay</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>

<script>
    var token = "<?= $this->security->get_csrf_hash(); ?>";

    function check() {
        var status = true;
        $.each($('.date_pick'), function(index2, item2) {

            if ($(item2).val() == '') {
                status = false;
                $.alert('Date field missing!');
            } else {

            }
        })
        if (status == true) {
          //  $('form#formdata').submit();
          $('#sub_btn').trigger('click');
        }
    }


    $(document).ready(function() {

        //  $('#date_sec').hide();

        // $(document).on('change', '.time_select', function(e) {
        //     var val = $(this).val();
        //     if(val == '5')
        //     {
        //         $('#date_sec').show();
        //     }
        //     else
        //     {
        //         $('#date_sec').hide();
        //     }
        // });

        $(document).on('change', '.time_select', function(e) {
            e.preventDefault();
            var dd = $(this);
            var id = $(this).attr("id");
            var val = $(this).val();
            $.each($('.time_check' + id).not(this), function(index2, item2) {

                if (val == $(item2).val()) {
                    $(dd).val('');
                    $.alert('Time slot already selected!');

                }
            })
            $('#promo_code').val('');
            get_price();


        });

        $(document).on('change', '#merge', function(e) {
            e.preventDefault();
            
           get_price()
            
        });
        
         $(document).on('change', '#promo_code', function(e) {
            e.preventDefault();
            
            get_discount_price();
            
        });
        
        function get_price() {
            var form = $("#formdata")[0];
            var data = new FormData(form);

            $('.price').empty();
            $('.price').append('loading...');
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>frontend/My_ads/get_price",
                data: data,
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(response) {
                    $('.price').empty();
                    $('.price').append('<h4><b>Total :$ ' + response.msg + ' </b></h4>');
                }
            });
        }
        
        function get_discount_price() {
            var form = $("#formdata")[0];
            var data = new FormData(form);

            $('.price').empty();
            $('.price').append('loading...');
            $.ajax({
                type: "post",
                url: "<?= base_url() ?>frontend/My_ads/getdiscountprice",
                data: data,
                processData: false, // Important!
                contentType: false,
                cache: false,
                dataType: "json",
                success: function(response) {
                    $('.price').empty();
                    if(isNaN(response.msg))
                    {
                        $('#promo_code').val('');
                        $('.price').append('<h4 style="color:red;"><b>' + response.msg + ' </b></h4>');  
                        
                    }
                    else
                    {
                        // Show discount breakdown if offer amount is available
                        if(response.offer && response.offer > 0) {
                            var originalTotal = parseFloat(response.msg) + parseFloat(response.offer);
                            var discountHtml = '<div class="alert alert-success">' +
                                '<h6><i class="fas fa-check-circle"></i> Promo Code Applied Successfully!</h6>' +
                                '<div class="row">' +
                                    '<div class="col-6"><strong>Original Price:</strong></div>' +
                                    '<div class="col-6 text-right">$' + originalTotal.toFixed(2) + '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                    '<div class="col-6"><strong>Discount Applied:</strong></div>' +
                                    '<div class="col-6 text-right text-success">-$' + parseFloat(response.offer).toFixed(2) + '</div>' +
                                '</div>' +
                                '<hr>' +
                                '<div class="row">' +
                                    '<div class="col-6"><strong>Final Price:</strong></div>' +
                                    '<div class="col-6 text-right"><strong>$' + parseFloat(response.msg).toFixed(2) + '</strong></div>' +
                                '</div>' +
                            '</div>';
                            $('.price').append(discountHtml);
                        } else {
                            $('.price').append('<h4><b>Total :$ ' + response.msg + ' </b></h4>');
                        }
                    }
                   
                }
            });
        }


        $(document).on('click', '.add_time', function(e) {
            var id = $(this).attr("id");
            var options = '';
            <?php foreach ($time_slots as $row) { ?>
                options += '<option value="<?= $row->id ?>"><?= $row->title ?></option>';
            <?php } ?>

            $('.time_slots_div' + id).append('<div><div class="row mb-3 required">\
                                            <label class="col-md-3 col-form-label">Time <sup>*</sup></label>\
                                            <div class="col-md-8">\
                                               <select class="form-control time_select time_check' + id + '" id="' + id + '" name="time' + id + '[]" required>\
                                               <option value="" disabled selected>Choose</option>\
                                                 ' + options + '\
                                               </select>\
                                            </div>\
                                            <div class="col-md-1">\
                                            <a class="btn btn-danger remove_time"><i class="fas fa-times-circle"></i></a>\
                                            </div>\
                                        </div></div>');
        });

        var number = 1;
        $(document).on('change', '.sloyt_type', function(e) {

            e.preventDefault();
            var id = $(this).attr("id");
            var val = $(this).val();
            $('.slotdate' + id).empty();
            if (val == 1) {
                $('.slotdate' + id).append(' <label class="col-md-3 col-form-label">Date <sup>*</sup></label>\
                                            <div class="col-md-9">\
                                                <input name="date"  type="date" class="form-control slot_datepicker' + id + '" placeholder="" value="<?= date("Y-m-d") ?>">\
                                            </div>');

                $('.slot_datepicker' + id).Zebra_DatePicker({
                    direction: [1, "<?= $remaining_days ?>"]
                });
            }
            if (val == 2) {

            }
        });

        $(document).on('click', '#add_box', function(e) {
            number++;

            var options = '';
            <?php foreach ($time_slots as $row) { ?>
                options += '<option value="<?= $row->id ?>"><?= $row->title ?></option>';
            <?php } ?>
            $('.choose_box_append').append('<div class="option_box ">\
                                        <button style="float:right" type="button"  class="btn btn-danger remove_box" id="' + number + '"><i class="fas fa-times"></i></button>\
                                   <div class="row mb-3 required slotdate' + number + '">\
                                            <label class="col-md-3 col-form-label">Date <sup>*</sup></label>\
                                            <div class="col-md-9">\
                                                <input name="date[]" id="datepicker' + number + '" type="text" class="form-control date_pick" placeholder="" value="" required>\
                                            </div>\
                                        </div>\
                                        <input type="hidden" name="number[]" value="' + number + '" id="">\
                                        <div class="row mb-3 required">\
                                            <label class="col-md-3 col-form-label">Time <sup>*</sup></label>\
                                            <div class="col-md-9">\
                                               <select class="form-control time_select time_check' + number + '" id="' + number + '" name="time' + number + '[]" required>\
                                               <option value="" disabled selected>Choose</option>\
                                                 ' + options + '\
                                               </select>\
                                            </div>\
                                        </div>\
                                        <div class="time_slots_div' + number + '">\
                                        </div>\
                                        <center>\
                                        <button type="button" id="' + number + '" class="btn btn-primary add_time"><i class="fas fa-plus"></i> Time slot</button>\
                                        </center>\
                                        </div>');



            $('#datepicker' + number).Zebra_DatePicker({
                direction: [1, "<?= $remaining_days ?>"],
                format: 'm/d/Y H:i:s',
                onSelect: function(view, elements) {
                    var ss = $(this);

                    $.each($('.date_pick').not(this), function(index2, item2) {
                        // alert($(item2).val());
                        // alert(elements);
                        if ($(item2).val() == formatDate(elements)) {
                            $(ss).val('');
                            $.alert('Date already selected!');
                        }
                    })

                }
            });

        });

        $('#datepicker0').Zebra_DatePicker({
            direction: [1, "<?= $remaining_days ?>"],
            format:'m/d/Y H:i:s',
            onSelect: function(view, elements) {
              
                var ss = $(this);

                $.each($('.date_pick').not(this), function(index2, item2) {
                    // alert($(item2).val());
                    // alert(elements);
                     // alert('sdfds');
                    if ($(item2).val() == formatDate(elements)) {
                        $(ss).val('');
                        $.alert('Date already selected!');
                    }
                })

            }
        });

        function formatDate(date) {
            var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) month = '0' + month;
            if (day.length < 2) day = '0' + day;

            return [month, day, year].join('/');
        }


        $(document).on('click', '.remove_box', function(e) {

            $(this).parent().remove();
            get_price()
        });
        $(document).on('click', '.remove_time', function(e) {

            $(this).parent().parent().remove();
            get_price()
        });




    });
</script>