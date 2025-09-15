<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<style>
.product_box img{
    width:80%;
}
.product_box h2{
   color: #8cc63f;
    font-weight: bold;
}
</style>

<div class="main-container">
    <div class="container">
    <?php foreach($list as $row) { ?>
    <div class="product_box mt-5 mb-2">
        <div class="row">
            <div class="col-md-4">
                <img src="<?=base_url()?>uploads/shopping/<?=$row->photo?>" class="img">
            </div>
            <div class="col-md-8">
                <h2><?=$row->title?></h2>
                <p><?=$row->description?></p>
                <p><b>Note: </b> <?=$row->note?> </p>
                <a href="<?=$row->link?>" target="_blank" class="btn btn-primary">Learn More</a>
            </div>
        
        </div>
        </div>
        
        <?php } ?>
    </div>
</div>