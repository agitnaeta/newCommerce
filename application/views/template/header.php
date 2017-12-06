<!-- <div class="container">
	<img width="100%" src="https://destroyityourselfdiy.files.wordpress.com/2012/05/cropped-diy-banner.jpg" class="img img-responsive">
</div> -->
<h1 style="font-size: 3px"><?=$webname->judul;?></h1>
<h2 style="font-size: 3px">Menyediakan Reseller produk pakaian dan penjual pakaian murah & Terpercaya</h2>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only"></span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> 
					<a class="white navbar-toggle" href="<?php echo base_url("cart");?>" style="top:-7px; padding-bottom: 0px">
						<span class="fa fa-shopping-cart fa-2x">
							<span class="badge" id="badge"></span>
						</span> 
					</a> 
					<a class="navbar-brand" href="<?php echo base_url("")?>"><i class="fa fa-shirtsinbulk"></i> Gerai18</a>

				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav">
					<?php foreach($jenis as $j):?>
						<li >
							<a class="menu-jenis" href="<?=strtolower(base_url("store/jenis/$j->jenis"));?>"> <?=str_replace("_", " ", ucwords("$j->jenis"));?></a>
						</li>
					<?php endforeach;?>	
					</ul>
					
					<ul class="nav navbar-nav navbar-right" >
						<li id="cart" >
							<a href="<?php echo base_url("cart") ?>">
								<i class="fa fa-shopping-cart"></i> 
								<i class="faa-ring animated"></i> 
								
								Cart (<span id="count_cart" data-id="0">0</span>)
							</a>
						</li>
						<li>
							<a href="<?php echo base_url("store/my_profile"); ?>">
							 <i class="fa fa-user"></i> Profile Saya</a>
						</li>
						<li>
							<a href="<?php echo base_url("store/my_order");?>"> 
							<i class="fa fa-shopping-basket"></i> Pesanan Saya</a>
						</li>
					<!-- 	<li>
							<a href="<?php echo base_url("profile/type/profile")?>"><i class="fa fa-file"></i> Profile</a>
						</li> -->
						<li>
							<a href="<?php echo base_url("profile/type/kontak");?>"> <i class="fa fa-phone"></i> Kontak Kami</a>
						</li>
						<?php if($s=$this->session->userdata('user')!=null){?>
						<li>
							<a href="<?php echo base_url("login/logout") ?>"><i class="fa fa-sign-out"></i> Logout</a>
						</li>
						<?php } else { ?>
						<li>
							<a href="<?php echo base_url("login") ?>"><i class="fa fa-sign-in"></i> Login</a>
						</li>
						<?php };?>	
						
						<li>
							<a href="#">&nbsp;</a>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		count_cart();
		return false;
	})
	function count_cart() {
		url='<?=base_url("cart/count_cart");?>';
		$.get(url,function (data) {
			$('#count_cart').html(data);
			if (parseInt(data)>0) {
				$('#cart').css("background-color","rgb(66, 105, 113)");
				$('#badge').html(data)
			}
		})
	}
</script>