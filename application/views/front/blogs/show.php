<div class="p-0 mt-lg-4 mt-md-3 mt-3"></div>
<style>
.imageThumb {
  max-height: 232px;
    padding: 1px;
    cursor: pointer;
    border-radius: 17%;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
</style>
<div class="main-container">

	<div class="container mt-2">
		<div class="row">
		    <?php if ($this->session->flashdata('msg')) { ?>
                                                <?php echo $this->session->flashdata('msg') ?>
                                            <?php } ?>
			<div class="col-md-12">

				<nav aria-label="breadcrumb" role="navigation" class="float-start">
					
				</nav>

				<div class="float-end backtolist">
					<a href="<?php echo base_url()?>"><i class="fa fa-angle-double-left"></i> Back to Results</a>
				</div>

			</div>
		</div>
	</div>
	 <?php $date = new DateTime($blog[0]->created_at);
          $date = $date->format('m-d-Y');
          ?>
	<div class="container">
		<div class="row">
			<div class="media-body" style="text-align: justify;">

    		<h4 class="media-heading"><?php echo $blog[0]->title?></h4>
    		 <ul class="list-inline list-unstyled">
    		 	<li><span><i class="glyphicon glyphicon-calendar"></i> Author :  <?php echo $blog[0]->author?> </span></li>
    		 	<li> | </li>
    		 	<li><span><i class="glyphicon glyphicon-calendar"></i> Blog Category :  <?php echo $blog[0]->category?> </span></li>
    		 	<li> | </li>
  			<li><span><i class="glyphicon glyphicon-calendar"></i> Created on <?php echo $date?> </span></li>

           
            <li>
            <!-- Use Font Awesome http://fortawesome.github.io/Font-Awesome/ -->
              <span><i class="fa fa-facebook-square"></i></span>
              <span><i class="fa fa-twitter-square"></i></span>
              <span><i class="fa fa-google-plus-square"></i></span>
            </li>
			</ul>
        <?php if(!empty($photo))
          { 
          
          ?>
          
          	   <?php
                            foreach($photo as $key => $photos)
                            {
                          ?>
                          
                          <span class="pip">
                             
                              <img class="imageThumb" src="<?= base_url() ?>assets/lazyload.gif" data-src="<?php echo base_url('uploads/blogs/').$photos['picture']?>">
                          </span>
                          <?php
                            }
                          ?>
          </div>   
         <?php
         
         } ?>  
          <p><?php echo $blog[0]->description ?></p>
          <?php if($blog[0]->image!='')
          { ?>
          	<div class="row">
          	<img src="<?= base_url() ?>assets/lazyload.gif" data-src="<?php echo base_url('uploads/blogs/').$blog[0]->image?>">
          </div>   
         <?php } ?>
        
         
      
			<!--/.page-content-->

			<div class="col-lg-6 page-sidebar-right">

			</div>
		</div>

	</div>
</div>


