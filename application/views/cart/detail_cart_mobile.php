<form id="form" method="post" action="<?=base_url("pemesanan/confirm");?>">
<div class="container pad">
	<div class="panel-default">
		<div class="panel-heading"><h6><i class='fa fa-shopping-cart'></i> Pesanan Anda</h6></div>
		<div class="panel-body">
			<?php 
				$pesan=$this->session->flashdata('over');
				$alert=($pesan!=null)  ? 'alert alert-warning' : null;
			?>
			<div class="text-center <?=$alert;?>">
				<h6><?=$pesan;?></h6>
			</div>
			<?php $i=1;foreach($detail_cart as $item):?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					 <i class="fa fa-shirtsinbulk"></i> <?=$item->nama_produk;?>

					 			<span class="pull-right">
					 				<a href="#" class="batal btn btn-danger btn-xs" data-id="<?=$item->id;?>"> 
									<i class="fa fa-remove"></i>
								</a>
					 			</span>
				</div>
				<div class="panel-body">
					<div class="col-xs-4">
						<?php 
								$img=($item->gambar==null) ? 
								base_url("assets/uploads/files/404.jpg") :
								base_url("assets/uploads/files/$item->gambar");
							?>
							<img class="img" height="50px" width="100%" src="<?=$img;?>">
					</div>
					<div class="col-xs-8">
						<table class="table">
							<tr>
								<td>Harga</td><td><?=rupiah($item->harga);?></td>
								<input class="harga" name="harga[]" id="harga-<?=$item->id;?>" hidden value='<?=$item->harga;?>'>
								<input class="param_id" name="id_produk[]" hidden id="param_id-<?=$item->id;?>" value='<?=$item->id;?>'>
								<input class="param_id" name="nama_produk[]" hidden id="param_id-<?=$item->id;?>" value='<?=$item->nama_produk;?>'>
								<input class="param_id" name="gambar[]" hidden id="param_id-<?=$item->id;?>" value='<?=$img;?>'>
							</tr>
							<tr>
								<td>Berat</td>
								<td>
										<input class="berat form-control" name="berat[]" id="berat-<?=$item->id;?>" readonly value='<?=$item->berat;?>'>
										<input type="hidden" class="berat_dasar form-control" name="berat_dasar[]" id="berat_dasar-<?=$item->id;?>" readonly value='<?=$item->berat;?>'>	
								</td>
							</tr>
							<tr>
								<td>Jumlah</td>
									<td>
									<input type="number" name="jumlah[]" min="1" max="100" value="1" class="jumlah form-control" id="jumlah-<?=$item->id;?>" data-id='<?=$item->id;?>'>
								</td>
							</tr>
								<tr>
								<td>Sub Total</td>
									<td>
										<input name="sub[]" id="sub_input-<?=$item->id;?>" hidden  value="<?=($item->harga);?>">
								<span id="sub-<?=$item->id;?>">
									<?=rupiah($item->harga);?>
								</span>
								</td>
							</tr>
						</table>
				
						
								
								
					</div>
				</div>

			</div>
		  <?php endforeach;?>
			
		<div class="navbar-fixed-bottom">
			<button type="submit" class="text-right btn btn-primary btn-block">
				Lanjutkan <i class="fa fa-fast-forward"></i>
			</button>
		</div>
	</div>
</div>
</form>
<script type="text/javascript">
	$('.jumlah').change(function () {
		var jumlah   =$(this).val();
		var param_id =$(this).attr('data-id');
		var berat =$('#berat_dasar-'+param_id).val();
	
		var harga    =$('#harga-'+param_id).val();
		var subtotal =parseInt(harga)*jumlah;
		var beban =parseFloat(berat)*jumlah;

		$('#sub_input-'+param_id).val(subtotal);
		$('#sub-'+param_id).html(toRp(subtotal))
		
			$('#berat-'+param_id).val(beban)
	});


	$('.batal').click(function () {
		// var id=$(this).attr('data-id');

		// swal({
		//   title: "Apakah anda yakin?",
		//   text: "item akan dihapus dari keranjang belanja ",
		//   icon: "warning",
		//   buttons: true,
		//   dangerMode: true,
		// })
		// .then((willDelete) => {
		//   if (willDelete) {
		// 		$.post('<?php echo base_url("cart/remove_item");?>',{id:id},function () {
					
		// 		})
		//     swal("Poof! barang telah dihapus", {
		//       icon: "success", 
		//     });

		//     location.reload();
		    
		//   } else {
		//     swal("Batal dihapus"); 
		//   }
		// });
		if (confirm("Apakan anda yakin ?")) {
			var id=$(this).attr('data-id');
			$.post('<?php echo base_url("cart/remove_item");?>',{id:id},function () {
				location.reload();
			})
		}
	})
	
</script>