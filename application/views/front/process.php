<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<style>
  .category-list-wrapper {
    justify-content: center;
  }

  .category-list.make-grid .item-list .row>div {

    justify-content: center;
  }

  .add-image a img {

    /*height: 200px !important;*/

  }

  .item-list {
    width: 100% !important;
  }

  .item-price {
    color: #3457D5;
  }

  .select2-container {
    padding: 8.5px;
  }

  .search-row .search-col .form-control,
  .search-row button.btn-search,
  .search-row .select2-container--default .select2-selection--single {

    border: unset;
    box-shadow: unset;
    margin-left: 4px;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    margin-top: -5px;
  }

  .spdiv {
    height: 300px;
    display: flex;
    align-content: center;
  }

  .spinner {
    --color: rgb(140 198 63);
    --fade-color: rgba(140 198 63 / 50%);
    --scale: 1;
    --x-speed: 1;
    position: relative;
    display: block;
    width: 80px;
    height: 80px;
    transform: scale(var(--scale)) rotateZ(0);
    animation: ps-spin calc(15s / var(--x-speed)) linear infinite
  }

  .incss-cut-clr1 {
    color: #92d050;
  }

  .incss-cut-clr2 {
    color: #f6b064;
  }

  .incss-cut-clr3 {
    color: #ff9a8f;
  }

  .incss-cut-clr3 {
    color: #c6e9fa;
  }

  .incss-float-right {
    float: right;
  }

  .incss-cust-bg02 {
    background-color: #8cc63f !important;
  }

  @keyframes ps-spin {
    from {
      transform: scale(var(--scale)) rotateZ(0);
    }

    to {
      transform: scale(var(--scale)) rotateZ(-360deg);
    }
  }

  .spinner span {
    display: block;
    position: absolute;
    width: 100%;
    height: 100%;
  }

  .spinner span::before,
  .spinner span::after {
    content: "";
    position: absolute;
    width: 20px;
    height: 20px;
    top: 50%;
    transform: translateY(-50%) scale(.3);
    background-color: rgba(var(--color) / 50%);
    border-radius: 50%;
    animation: ps-spinner-scale calc(1.2s / var(--x-speed)) linear infinite
  }

  @keyframes ps-spinner-scale {
    0% {
      background-color: var(--fade-color);
      transform: translateY(-50%) scale(.3);
    }

    25% {
      background-color: var(--color);
      transform: translateY(-50%) scale(1);
    }

    80% {
      background-color: var(--fade-color);
      transform: translateY(-50%) scale(.3);
    }

    100% {
      background-color: var(--fade-color);
      transform: translateY(-50%) scale(.3);
    }
  }

  .spinner span::before {
    left: 0;
  }

  .spinner span::after {
    right: 0;
  }

  .spinner span:first-of-type {
    transform: rotateZ(-45deg);
  }

  .spinner span:last-of-type {
    transform: rotateZ(45deg);
  }

  .spinner span:nth-of-type(2) {
    transform: rotateZ(90deg);
  }

  .spinner span:nth-of-type(3)::after {
    animation-delay: calc(0.15s / var(--x-speed));
  }

  .spinner span:last-of-type::after {
    animation-delay: calc(.3s / var(--x-speed));
  }

  .spinner span:nth-of-type(2)::after {
    animation-delay: calc(.45s / var(--x-speed));
  }

  .spinner span:first-of-type::before {
    animation-delay: calc(.6s / var(--x-speed));
  }

  .spinner span:nth-of-type(3)::before {
    animation-delay: calc(.75s / var(--x-speed));
  }

  .spinner span:last-of-type::before {
    animation-delay: calc(.9s / var(--x-speed));
  }

  .spinner span:nth-of-type(2)::before {
    animation-delay: calc(1.05s / var(--x-speed));
  }
</style>
<style>
  .timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
  }

  .timeline:before {
    top: 0;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 3px;
    background-color: #eeeeee;
    left: 50%;
    margin-left: -1.5px;
  }

  .timeline>li {
    margin-bottom: 20px;
    position: relative;
  }

  .timeline>li:before,
  .timeline>li:after {
    content: " ";
    display: table;
  }

  .timeline>li:after {
    clear: both;
  }

  .timeline>li:before,
  .timeline>li:after {
    content: " ";
    display: table;
  }

  .timeline>li:after {
    clear: both;
  }

  .timeline>li>.timeline-panel {
    width: 46%;
    float: left;
    /*border: 1px solid #d4d4d4;*/
    border-radius: 2px;
    padding: 20px;
    position: relative;
    font-size: 16px;
    /*-webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);*/
  }

  .timeline>li>.timeline-heading {
    width: 10%;
    /* float: right; */
    left: 265px;
    border: 1px solid #d4d4d4;
    border-radius: 50px;
    padding: 44px;
    position: absolute;
    -webkit-box-shadow: 0 1px 6px rgb(0 0 0 / 18%);
    box-shadow: 0 1px 6px rgb(0 0 0 / 18%);
  }

  .timeline>li>.timeline-panel:before {
    /*position: absolute;
  top: 26px;
  right: -15px;
  display: inline-block;
  border-top: 15px solid transparent;
  border-left: 15px solid #ccc;
  border-right: 0 solid #ccc;
  border-bottom: 15px solid transparent;
  content: " ";*/
    position: absolute;
    top: 90px;
    right: -40px;
    display: block;
    border-bottom: 1px solid grey;
    content: " ";
    width: 15%;
  }

  .timeline>li>.timeline-panel:after {
    position: absolute;
    top: 27px;
    right: -14px;
    display: inline-block;
    border-top: 14px solid transparent;
    border-left: 14px solid #fff;
    border-right: 0 solid #fff;
    border-bottom: 14px solid transparent;
    content: " ";
  }

  .timeline>li>.timeline-badge {
    color: #fff;
    width: 50px;
    height: 50px;
    line-height: 50px;
    font-size: 1.4em;
    text-align: center;
    position: absolute;
    top: 16px;
    left: 50%;
    margin-left: -25px;
    background-color: #999999;
    z-index: 100;
    border-top-right-radius: 50%;
    border-top-left-radius: 50%;
    border-bottom-right-radius: 50%;
    border-bottom-left-radius: 50%;
  }

  .timeline>li.timeline-inverted>.timeline-panel {
    float: right;
  }

  .timeline>li.timeline-inverted>.timeline-panel:before {
    border-left-width: 0;
    border-right-width: 15px;
    left: -40px;
    right: auto;
  }

  .timeline>li.timeline-inverted>.timeline-panel:after {
    border-left-width: 0;
    border-right-width: 14px;
    left: -14px;
    right: auto;
  }

  .timeline-badge.primary {
    background-color: #2e6da4 !important;
  }

  .timeline-badge.success {
    background-color: #8cc63f !important;
  }

  .timeline-badge.warning {
    background-color: #f0ad4e !important;
  }

  .timeline-badge.danger {
    background-color: #d9534f !important;
  }

  .timeline-badge.info {
    background-color: #5bc0de !important;
  }

  .timeline-title {
    margin-top: 0;
    color: inherit;
  }

  .timeline-body>p,
  .timeline-body>ul {
    margin-bottom: 0;
  }

  .timeline-body>p+p {
    margin-top: 5px;
  }

  #timeline {
    line-height: 10px;
  }

  .why_chose_img {
    border-radius: 50%;
    border: 7px solid #92d050;
    max-height: 240px;
  }

  .why_chose_img2 {
    border-radius: 50%;
    border: 7px solid #f6b064;
    max-height: 240px;
  }

  .why_chose_img3 {
    border-radius: 50%;
    border: 7px solid #ff9a8f;
    max-height: 240px;
  }

  .why_chose_img4 {
    border-radius: 50%;
    border: 7px solid #c6e9fa;
    max-height: 240px;
  }

  .learn-mode-btn {
    background-color: #8cc63f;
    color: #fff;
    width: 60%;
    border-radius: 25px;
  }

  .whychoose h2 {
    font-size: 38px;
    font-weight: 800;
    color: #8cc63f;
  }

  .whychoose h3 {
    font-size: 25px;


  }

  .whychoose p {
    font-size: 15px;
  }
</style>
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-lg-1 col-md-0 col-sm-0 col-0  mt-2"></div>
      <div class="col-lg-10 col-md-12 col-sm-12 col-12  mt-2">
        <div class="container">
          <div class="page-header">
            <div class="text-center">
              <h1 id="timeline"><b>The Process</b></h1>
              <p>How to use My Pup Central… </p>
              <br><br>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-md-3">
              <div class="text-center">
                <img class="w-48 h-full rounded-sm  why_chose_img  mt-2 mb-2" src="<?= base_url() ?>assets/lazyload.gif"
                  data-src="<?= base_url(); ?>assets/step_1.jpg" alt="Beautiful Puppies- My Pup Central">
              </div>
            </div>

            <div class="col-md-3">
              <h3 class="pt-5 incss-cut-clr1"><b>Step 1</b> </h3>
              <p class="mt-2 mb-4 text-base leading-6">
                Search our site for available puppies and learn about the different breeds.
              </p>


            </div>
            <div class="col-md-2"></div>
          </div>


          <div class="row mt-2">

            <div class="col-md-3 order-0"></div>
            <div class="col-md-3 order-lg-2 order-3">
              <h3 class="pt-5 incss-cut-clr2"><b>Step 2 </b> </h3>
              <p class="mt-2 mb-4 text-base leading-6 incss-float-right">
                Once you've decided on a puppy contact the listed breeder.
              </p>

            </div>
            <div class="col-md-3  order-2 order-lg-3">
              <div class="text-center">
                <img class="w-48 h-full rounded-sm  why_chose_img2  mt-2 mb-2"
                  src="<?= base_url() ?>assets/lazyload.gif" data-src="<?= base_url(); ?>assets/Step2.jpg"
                  alt="Trust-worthy Breeders- My Pup Central">
              </div>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-md-3"></div>
            <div class="col-md-3">
              <div class="text-center">
                <img class="w-48 h-full rounded-sm  why_chose_img3  mt-2 mb-2"
                  src="<?= base_url() ?>assets/lazyload.gif" data-src="<?= base_url(); ?>assets/step_3.jpg"
                  alt="Secure Transportation Options- My Pup Central">
              </div>
            </div>

            <div class="col-md-3">
              <h3 class="pt-5 incss-cut-clr2"><b>Step 3 </b></h3>
              <p class="mt-2 mb-4 text-base leading-6">
                Arrange pickup at the breeder or checkout our <a href="<?=base_url()?>shipping">Puppy Travel </a>Page to
                review delivery options.
              </p>


            </div>
            <div class="col-md-2"></div>
          </div>

          <div class="row mt-2">

            <div class="col-md-3 order-0"></div>
            <div class="col-md-3 order-2 order-lg-1">
              <h3 class="pt-5 incss-cut-clr3"><b>Step 4 </b> </h3>
              <p class="mt-2 mb-4 text-base leading-6 incss-float-right">
                Enjoy for-ever with your new best friend!
              </p>

            </div>
            <div class="col-md-3 order-1 order-lg-2">
              <div class="text-center">
                <img class="w-48 h-full rounded-sm  why_chose_img4  mt-2 mb-2"
                  src="<?= base_url() ?>assets/lazyload.gif" data-src="<?= base_url(); ?>assets/Step4.jpg"
                  alt="Trust-worthy Breeders- My Pup Central">
              </div>
            </div>

          </div>


          <div class="page-header mt-5">
            <div class="text-center">
              <h1 id="timeline"><b>Get Started Now</b></h1>
              <br><br>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-0 col-sm-0 col-0  mt-2"></div>
      <div class="col-lg-12 col-md-12 col-sm-12 col-12  mt-2 text-center mb-5">
        <form id="" name="search" action="javascript:void(0)" method="GET">
          <div class="row search-row animated fadeInUp">
            <div class="col-md-5 col-sm-12 search-col relative mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
              <div class="search-col-inner">
                <i class="icon-docs icon-append"></i>
                <div class="search-col-input">
                  <select class="form-control has-icon search_breed" id="breed">
                    <option value="">Find Your Puppy Breed</option>
                    <?php foreach ($breeds as $row) { if ($row->count!=0) { ?>
                    <option value="<?= $row->id ?>">
                      <?= $row->breed_name ?>
                    </option>

                    <?php } } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-5 col-sm-12 search-col relative locationicon mb-1 mb-xxl-0 mb-xl-0 mb-lg-0 mb-md-0">
              <div class="search-col-inner">
                <i class="icon-location-2 icon-append"></i>
                <div class="search-col-input">
                  <select class="form-control has-icon search_state bg-white" name="location" id="locSearch">
                    <option value="">Search By State</option>

                  </select>

                </div>
              </div>
            </div>
            <div class="col-md-2 col-sm-12 search-col">
              <div class="search-btn-border incss-cust-bg02">
                <button class="btn btn-search btn-block btn-gradient color-white" id="find">
                  <i class="icon-search"></i><strong>Find</strong>
                </button>
              </div>
            </div>
            <div class="size_div">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  $(document).ready(function () {
    $('.search_breed').select2();
    $('.search_state').select2();
  });
  $(document).ready(function () {
    var token = "<?= $this->security->get_csrf_hash(); ?>";
    $("#breed").change(function (e) {
      e.preventDefault();
      $('#locSearch').val(null).trigger("change");
      update_states();
    });
    update_states();
    function update_states() {
      $("#locSearch").empty();
      var breed = $("#breed").val();
      if (breed == '') {
        var url = "<?=base_url()?>Ads/get_states/";
      }
      else {
        var url = "<?=base_url()?>Ads/get_states/" + breed;
      }
      $('#locSearch').val(null).trigger('change');
      $.ajax({
        type: "POST",
        url: url,
        data: { 'csrf_test_name': token, },
        dataType: "json",
        success: function (response) {
          $("#locSearch").select2({
            data: response,
          });
        }
      });
    }
    $("#find").click(function (e) {
      e.preventDefault();
      if ($("#breed").val() != '') {
        var breed = $("#breed").val();
      }
      else {
        var breed = '0';
      }
      if ($("#locSearch").val() != '') {
        var stateid = $("#locSearch").val();
      }
      else {
        var stateid = '0';
      }
      //alert(breed);
      var url = "<?=base_url()?>ads/" + breed + "/" + stateid;
      window.location.href = url;
    });
    load_sizes();

    function load_sizes() {
      var breed = $("#breed").val();
      if (breed != '') {


        $('.size_div').empty();
        var breed = $("#breed").val();
        $.ajax({
          type: "POST",
          url: "<?=base_url()?>Ads/load_size",
          data: {
            'csrf_test_name': token,
            breed: breed
          },
          dataType: "JSON",
          success: function (response) {
            $('.size_div').append(response.data);
          }
        });

      }
    }
  });
</script>