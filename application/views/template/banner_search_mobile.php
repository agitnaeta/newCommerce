<div class="container pad">
	<div class="row">
		    <form method="post" action="<?php echo base_url("store/search");?>">
        <div class="col-md-6 col-md-offset-2">
          <input type="text" class="form-control input-lg" name="search" placeholder="Cari produk terbaik...">
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-lg btn-block btn-primary">
            <i class="fa fa-search"></i> 
          </button>
        </div>
    </form>  
    
	</div>
	<br>
</div>


<!-- <div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
     
      <?php $i=0; foreach($banner as $b):?>
      <?php $order=$i++;?>
      <li data-target="#myCarousel" data-slide-to="<?=$order;?>" class="<?=($order==0) ? 'active' : '' ;?>"></li>
      <?php endforeach;?>
    </ol>

   
    <div class="carousel-inner">
    <?php $i=0; foreach($banner as $b):?>
      <?php $order=$i++;?>
      <div  data-id='<?=$i++;?>' class="item <?=($order==0) ? 'active' : '' ;?> ">
        <a href="">
          <img src="<?=base_url("assets/uploads/files/$b->gambar");?>"  style="width:100%;">
        </a>
      </div>
    <?php endforeach;?>
      <div class="item">
        <img src="https://destroyityourselfdiy.files.wordpress.com/2012/05/cropped-diy-banner.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="https://destroyityourselfdiy.files.wordpress.com/2012/05/cropped-diy-banner.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<br> -->
