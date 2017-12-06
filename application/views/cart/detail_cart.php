<form id="form" method="post" action="<?=base_url("pemesanan/confirm");?>">
<div class="container pad">
	<div class="panel-default">
		<div class="panel-heading"><h4><i class='fa fa-shopping-cart'></i> Pemesanan Anda</h4></div>
		<div class="panel-body">
			<?php 
				$pesan=$this->session->flashdata('over');
				$alert=($pesan!=null)  ? 'alert alert-warning' : null;
			?>
			<div class="text-center <?=$alert;?>">
				<h6><?=$pesan;?></h6>
			</div>
			<div class="table table-responsive">
			<table class="table-responsive table-bordered table table-striped">
				<thead class="">
					<th>No</th>
					<th>Gambar</th>
					<th>Nama Item</th>
					<th>Harga</th>
					<th>
						Berat /kg
					</th>
					<th>
						Jumlah
					</th>
					
					<th>
						Sub Total
					</th>
					<th>
						Action
					</th>
				</thead>
				<tbody>
					<?php $i=1;foreach($detail_cart as $item):?>
						<tr>
							<td><?=$i++;?></td>
							<td>
							<?php 
								$img=($item->gambar==null) ? 
								base_url("assets/uploads/files/404.jpg") :
								base_url("assets/uploads/files/$item->gambar");
							?>
							<img class="img" height="80px" width="80px" src="<?=$img;?>">
							</td>
							<td>
								<?=$item->nama_produk;?>
								<input class="param_id" name="id_produk[]" hidden id="param_id-<?=$item->id;?>" value='<?=$item->id;?>'>
								<input class="param_id" name="nama_produk[]" hidden id="param_id-<?=$item->id;?>" value='<?=$item->nama_produk;?>'>
								<input class="param_id" name="gambar[]" hidden id="param_id-<?=$item->id;?>" value='<?=$img;?>'>
							</td>
							<td>
								<?=rupiah($item->harga);?>
								<input class="harga" name="harga[]" id="harga-<?=$item->id;?>" hidden value='<?=$item->harga;?>'>
							</td>
							<td>

								<input class="berat form-control" name="berat[]" id="berat-<?=$item->id;?>" readonly value='<?=$item->berat;?>'>
								<input type="hidden" class="berat_dasar form-control" name="berat_dasar[]" id="berat_dasar-<?=$item->id;?>" readonly value='<?=$item->berat;?>'>
							</td>
							<td>
								<input type="number" name="jumlah[]" min="1" max="100" value="1" class="jumlah form-control" id="jumlah-<?=$item->id;?>" data-id='<?=$item->id;?>'>
							</td>
							<td>
								<input name="sub[]" id="sub_input-<?=$item->id;?>" hidden  value="<?=($item->harga);?>">
								<span id="sub-<?=$item->id;?>">
									<?=rupiah($item->harga);?>
								</span>
							</td>
							<td>
								<a href="#" class="batal btn btn-danger" data-id="<?=$item->id;?>"> 
									<i class="fa fa-remove"></i> Batal
								</a>
							</td>
						</tr>
					<?php endforeach;?>	
				</tbody>
			</table>
		</div>
		</div>
		<div class="panel-footer text-right">
			<button class="text-right btn btn-primary">
				Lanjutkan >>
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
		var id=$(this).attr('data-id');

		swal({
		  title: "Apakah anda yakin?",
		  text: "item akan dihapus dari keranjang belanja ",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
				$.post('<?php echo base_url("cart/remove_item");?>',{id:id},function () {
					
				})
		    swal("Poof! barang telah dihapus", {
		      icon: "success", 
		    });

		    location.reload();
		    
		  } else {
		    swal("Batal dihapus"); 
		  }
		});
		// if (confirm("Apakan anda yakin ?")) {
		// 	var id=$(this).attr('data-id');
		// 	$.post('<?php echo base_url("cart/remove_item");?>',{id:id},function () {
		// 		location.reload();
		// 	})
		// }
	})

	
</script>