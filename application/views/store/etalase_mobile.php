<div class="container">
<?php foreach($produk as $prod):?>
	<h3><i class="fa fa-shirtsinbulk"></i>  <?=ucwords(str_replace("_", " ", $prod[0]->jenis));?> </h3>
	<div class="row">
	<?php foreach($prod as $p):?>
	<div class="col-xs-6">
		<div class="panel-default panel">
		  <?php $endurl=str_replace(" ","-",strtolower($p->nama_produk));?>
			<a 
				class     ="detail_produk" 
				href      ="#<?=$endurl;?>" 
				data-id 	="<?=$p->id;?>"
				data-nama ="<?=$p->nama_produk;?>"
				data-link ="<?php echo base_url("store/produk/$endurl");?>">
				<div class="panel-body">
					<!-- <p class="text-muted text-center"><?=$p->nama_produk;?> </p> -->
					<?php $img=($p->gambar==null) ? base_url("assets/uploads/files/404.jpg") : base_url("assets/uploads/files/$p->gambar");?>
					<img class="img" height="125" width="100%" src="<?=$img;?>" alt="<?=$p->nama_produk;?>">
					<p></p>
				</div>
			</a>
			<div class="text-center">
				<a hreff="#" id="<?=$p->id;?>" class="add_cart btn btn-primary btn-block">
				<i class="fa fa-shopping-cart"></i>
					 Beli
				</a>

			</div>
		</div>
	</div>
	<?php endforeach;?>
	</div>
<?php endforeach;?>		
	
</div>



<script type="text/javascript">
	$('.add_cart').click(function () {
		var id_produk=$(this).attr('id');
		$.post('<?=base_url("cart/add_cart");?>',{id_produk:id_produk},function (data) {
			// alert(data);
			swal(
				'Yeay..!',
				'Berhasil dimasukan ke keranjang',
				'success'
			);
			count_cart();
		})
	})

	$('.detail_produk').click(function () {
		 var link ='<?php echo base_url("store/produk");?>'
		 var link_produk=$(this).attr('data-link');
		 var id = $(this).attr('data-id');
		 var nama=$(this).attr('data-nama');
		 $.post(link,{id:id,nama:nama},function (detail) {
		 	// alert(link_produk);
		 	// alert(detail)
		 	window.location.replace(link_produk)
		 })
	})
</script>