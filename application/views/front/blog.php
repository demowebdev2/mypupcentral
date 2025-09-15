<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>

<style>

.card-img {
  border-bottom-left-radius: 0px;
  border-bottom-right-radius: 0px;
}

.card-title {
  margin-bottom: 0.3rem;
}

.cat {
  display: inline-block;
  margin-bottom: 1rem;
}

.fa-users {
  margin-left: 1rem;
}

.card-footer {
  font-size: 0.8rem;
}
</style>

<div class="main-container">
<div class="container">
  <div class="row">
      <?php foreach($blogs as $row){?>
    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
      <div class="card mb-3">
        <!-- <img class="card-img" src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/pasta.jpg" alt="Bologna"> -->
        <!-- <div class="card-img-overlay"> -->
          <!-- <a href="#" class="btn btn-light btn-sm">Cooking</a> -->
        <!-- </div> -->
        <div class="card-body">
          <h4 class="card-title"><?=$row->title;?></h4>
          <small class="text-muted cat">
            <!-- <i class="far fa-clock text-info"></i> 30 minutes -->
            <i class="fas fa-user text-info"></i><?=$row->author;?>
          </small>
          <p class="card-text"><?=$row->short_description?></p>
          <a href="<?=base_url()?>blog/<?=$row->id?>"> <button type="button" class="btn " style="background-color: #8cc63f; color:#fff">View</button></a>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between bg-transparent border-top-0">
          <div class="views"><?=date("M-d-Y", strtotime($row->created_at));?>
          </div>
          <div class="stats">
           	<!-- <i class="far fa-eye"></i> 1347
            <i class="far fa-comment"></i> 12 -->
          </div>
           
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
<div></div></div>