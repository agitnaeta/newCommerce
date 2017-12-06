<div class="container pad">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="<?php echo base_url("panel")?>"><i class="fa fa-shirtsinbulk"></i> <?=$webname->judul;?></a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li>
							<a href="<?php echo base_url("profile");?>">
							<i class="fa fa-building"></i>
							Profile</a>
						</li>
						<li>
							<a href="<?php echo base_url("produk") ?>">
							<i class="fa fa-tasks"></i>
							Produk</a>
						</li>
						<li>
							<a href="<?php echo base_url("pelanggan") ?>">
							<i class="fa fa-users"></i>
							Pengguna</a>
						</li>
						<li>
							<a href="<?php echo base_url("pemesanan/all_order") ?>">
							<i class="fa fa-shopping-cart"></i>
							Pemesanan</a>
						</li>
						
						<li>
							<a href="<?php echo base_url("store/all_komentar") ?>">
							<i class="fa fa-comment"></i>
							Komentar</a>
						</li>
						<li>
							<a href="<?php echo base_url("bank") ?>">
							<i class="fa fa-bank"></i>
							Bank</a>
						</li>
						<li>
							<a href="<?php echo base_url("store/banner") ?>">
							<i class="fa fa-image"></i>
							Banner</a>
						</li>
							<li>
							<a href="<?php echo base_url() ?>" target='__blank'>
							<i class="fa fa-globe"></i>
							Buka Toko</a>
						</li>
						
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li>
							  <a href="<?php echo base_url("login/logout"); ?>">
							  <i class="fa fa-sign-out"></i> 
							 	Logout
							 </a>
						</li>
						<li>
							<a href="#">&nbsp;</a>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
	</div>
</div>
