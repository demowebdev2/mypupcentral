<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<style>
.category-list-wrapper {
    justify-content: center;
}

    .item-list {
        width: 100% !important;
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
        --color: rgb(0 255 155);
        --fade-color: rgba(0 255 155 / 50%);
        --scale: 1;
        --x-speed: 1;
        position: relative;
        display: block;
        width: 80px;
        height: 80px;
        transform: scale(var(--scale)) rotateZ(0);
        animation: ps-spin calc(15s / var(--x-speed)) linear infinite
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
    h5.add-title {
        margin: 0px auto;
}
.item-list h2.item-price {
    margin: 0px auto;
}
span.item-location {
    text-align: center;
        margin: 0px auto;
}
</style>

<script>
    $(document).on('mouseenter', '.thevideo', function() {
        $(this).get(0).play();
    });
    $(document).on('mouseleave', '.thevideo', function() {
        $(this).get(0).pause();
    });
</script>

<?php
$breed = '';
$location = '';
if (isset($_GET['breed'])) {
    $breed = $_GET['breed'];
}

if (isset($_GET['location'])) {
    $location = $_GET['location'];
}
?>
<div class="main-container" id="homepage">


  

    <div class="container">
        <div class="row">


          



            <div class="col-md-12 page-content col-thin-left mb-4">
                <div class="col-xl-12">
                    <div class="category-list make-grid noSideBar">
                        <div id="" class="category-list-wrapper  row no-margin">

                        <div class="row">
                        <?php $time=date("Y-m-d H:i"); $buk=$this->input->cookie('bookmarks');
							$bookmark=explode(',',$buk);
						
							if(empty($buk)){
							    echo `<div class="text-center"><br><br><h4 class='mt-5 mb-5'><b>You haven't saved anything yet.</b></h4><br><br></div>`;
							}
							else{
                             foreach($result as $key=>$row){ ?>
                          <div class="col-md-3">
                            <div class="item-list p-0 m-3">

<div class="row aqr">
    <div class="col-sm-2 col-12 no-padding photobox">
        <div class="add-image w-100">
            <span class="photo-count"><i class="fa fa-images"></i> 3 </span>
            <a href="<?= base_url() ?>ad/<?= $row->id ?>">
                <div class="postImg-slick d-flex gap-4">
                    <?php if (!empty($row->featured_video)) { ?>
                            <div class="videoSlate" style="width:100%; position:relative; background-color:#000; ">
                            <video class="thevideo" muted loop  style="width:100%;height:200px;margin: 0px auto;">
                                <source src="<?php if($row->featured_video_from=='puppyverify.com'){echo PV;}else{echo NS;} ?>uploads/puppies/<?= $row->featured_video ?>"  type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <img src="<?=base_url()?>assets/watermark.png" style="position:absolute; right:10px; top:10px; opacity:0.5; width:60px">
                        </div>
                    <?php } ?>

                    <?php if (!empty($row->featured_image)) { ?>
                   
                    
                    <img src="<?php if($row->featured_image_from=='puppyverify.com'){echo PV;}else{echo NS;} ?>uploads/puppies/pv/thumb_<?= $row->featured_image ?>" style="
width: 100%;
object-fit: cover;
min-height: 200px" class="lazyload thumbnail no-margin" alt="Airedale Terrier for sale" data-nsfw-filter-status="sfw" alt="<?= $row->featured_alt_tag?>">


                    
                    
                    <?php } ?>
                </div>
            </a>
        </div>
    </div>

        <!--<div class="col-12 add-desc-box pl-2" style="max-width: 100%;padding-left:10px;padding-right: 10px;">-->
        <div class="items-details">
        <?php $dd=$this->common_model->count_records('book_time_slot',array('ad_id'=>$row->id,'start_time <='=>$time,'end_time >='=>$time)); 
        if($dd>0){
        ?>
            <div class="ribbon-wrapper"><div class="glow-out">
<div class="glow">&nbsp;</div>
</div>
<div class="ribbon-front">Premium</div>
<div class="ribbon-edge-topleft"></div>
<div class="ribbon-edge-topright"></div>
<div class="ribbon-edge-bottomleft"></div>

</div>
<?php } ?>
            <div class="row" style="width: 100%;">
                <div class="col-12" style=" padding: 0px;">
                    <h5 class="add-title">
                        <a href="<?= base_url() ?>ad/<?= $row->id ?>">
                            <?= $row->title ?>
                        </a>
                    </h5>
                </div>
                <div class="col-12">
                    <h2 class="item-price pb-3" style=" padding: 0px;display: flex;align-items: center;">
                        $<?= $row->asking_price ?> </h2>
                        
                </div>
                <div class="col-12" style="display:none !important; padding: 10px 0px 0px;">
                <span class="item-location">
                        <i class="icon-location-2"></i>&nbsp;

                    <span>	<?= $row->address ?></span>


                    </span></div>
            </div>


            <h5 class="add-title">

            </h5>

            <!--<span class="info-row">-->
            <!--    <span class="date">-->
            <!--        <i class="icon-clock"></i> Sep 27th, 2021 at 10:31-->
            <!--    </span>-->
            <!--    <span class="category">-->
            <!--        <i class="icon-folder-circled"></i>&nbsp;-->
                    <!--<a href="https://learning-ideas.com/nsdoodles/assets/front/category/airedale-terrier" class="info-link">-->
            <!--        Airedale Terrier-->
                    <!--</a>-->
            <!--    </span>-->

            <!--</span>-->

        </div>
    <!--</div>-->
    <div class="col-4 text-end price-box" style="padding-right:10px;white-space: nowrap;    max-width: 30%;align-items: center;">
<div class="row w-100">

<div class="col-12 m-0 p-0 d-flex justify-content-end">
    <a class="btn btn-default btn-sm make-favorite <?php if (in_array($row->id, $bookmark)) { echo 'removebookmark'; }else{ echo 'addbookmark';} ?>" id="<?= $row->id ?>">
        <i class="far fa-heart"></i> <span>Save</span>
    </a>
</div>
</div>
</div>

    
</div>
</div>
</div>


                            <?php } } ?>
                            </div>
                            <div style="clear: both"></div>


                        </div>
                     
                    </div>
                </div>


            </div>
        </div>
    </div>



</div>
