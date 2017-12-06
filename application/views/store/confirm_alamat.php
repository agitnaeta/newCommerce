<div class="pad container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4><i class="fa fa-shopping-cart"></i> Pemesanan</h4>
		</div>
		<div class="panel-body table-responsive">

			<table class="table table-condensed table-striped table-bordered" >
			<tr>
				<td>Produk</td>
				<td>Nama</td>
				<td>Harga</td>
				<td>Berat</td>
				<td>Jumlah</td>
				<td>Sub Total</td>
			</tr>
			<?php foreach($pesanan['rincian'] as $row):?>	
				<tr>
					<td width="50px">
						<img src="<?=$row['gambar'];?>" width="50px" height="50px">
					</td>
					<td><?=$row['nama_produk'];?></td>
					<td class="text-right"><?=rupiah($row['harga']);?></td>
					<td class="text-center"><?=$row['berat'];?> Kg</td>
					<td class="text-center"><?=$row['jumlah'];?> Pcs</td>
					<td class="text-right"><?=rupiah($row['sub']);?></td>

				</tr>
			<?php endforeach;?>
			<tr>
				<td colspan="5">
					<h4>Pesanan Total</h4>
				</td>
				<td class="text-right">
					<h4><?=rupiah($pesanan['total_harga']);?></h4>
				</td>
			</tr>
			</table>

		</div>
		<div class="panel-footer">
			
		</div>


		<div class="panel-heading">
			<h4> <i class="fa fa-map"> Alamat Pengiriman </i> </h4>
		</div>
		<div class="panel-body">
			<h4> Dikirim Kepada</h4>
			<ul>
				<li><?=$user[0]->nama_lengkap;?></li>
				<li><?=$user[0]->email;?></li>
				<li><?=$user[0]->no_telp;?></li>
			</ul>
			<h4>Alamat</h4>
			<ul>
				<li>
					Provinsi : <?=$this->rajaongkir->detail_province($user[0]->provinsi,'province');?>
				</li>
				<li>
					Kota : 		<?=$this->rajaongkir->detail_city($user[0]->kota,'city_name');?>
				</li>
				<li>
					Kode Pos : <?=$user[0]->kodepos;?>
				</li>
				<li>
					Alamat : <?=$user[0]->alamat;?>
				</li>
			</ul>
			<a href="#" id="btn_ubah_alamat" class="btn btn-default"><i class="fa fa-edit"></i> Ubah Alamat</a>
			<br>
			<div class="" id="ubah_alamat">
				<label>Provinsi</label>
				<span id="select_provinsi"></span><br>
				<label>Kota</label>
				<span id="select_kota"> Silahkan Pilih Provinsi</span><br>
				<label>Kode Pos</label>
				<input class="form-control" id="update_kodepos" name="kodepos" value="<?=$user[0]->kodepos;?>"><br>
				<label>Alamat</label>
				<input class="form-control" id="update_alamat" name="alamat" value="">
				<a href="#" id="update_user" class="btn btn-primary"> Update Alamat</a>
			</div>
		</div>
		<div class="panel-heading">
			<h4><i class="fa fa-money"></i> Pembayaran</h4>
		</div>
		<div class="panel-body">
			<table class="table">
				<tr>
					<td colspan="2">Total Pembayaran</td><td><?=$pesanan['total_harga'];?></td>
					
				</tr>
				<tr>
					<td>Biaya Pengiriman</td>
					<td>
						<select class="form-control" name="kurir" id="kurir">
							<?php foreach($ongkir[0]['costs'] as $row):?>
								<option value="<?=$row['service'];?>-<?=$row['cost'][0]['value'];?>">
									JNE <?=$row['service'];?> - (<?=$row['cost'][0]['etd'];?> Hari) 
								</option>
							<?php endforeach;?>	
						</select>
						<input hidden id="service_val">
					</td>
					<td>
						<span id="estimasi"></span>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<h4>Total Pembayaran</h4>
					</td>
					<td>
						<h3 id="total_pembelian">
							
						</h3>
					</td>
				</tr>
			</table>
			
		</div>
	</div>
	<div class="text-center">
		<a href="<?=base_url("pemesanan/cetak");?>" class="btn btn-primary btn-lg" id="cetak"><i class="fa fa-print"></i>  Cetak Invoice</a>
		<p id="notif"> Silahkan Update Kembali Alamat</p>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#ubah_alamat').hide();
		$('#notif').hide();
		hitung();
	})

	$('#kurir').change(function () {
		hitung();
	})
	function hitung() {
		var kurir=$('#kurir').val();
		var arr=kurir.split('-');
		var ongkir=arr[1];
		var service=arr[0];
		console.log(service);
		var total='<?=$pesanan['total_harga'];?>';
		var hasil=parseInt(ongkir)+parseInt(total);
		$('#total_pembelian').html(toRp(hasil));
		$('#estimasi').html(toRp(ongkir));
		$('#service_val').val(service);


		// post
		var url='<?php echo base_url("pemesanan/update_final_cart");?>';
		var form={
			ongkir:ongkir,
			service:service,
		}
		$.post(url,form,function (data) {
			console.log(data);
		})
	}

	$('#btn_ubah_alamat').click(function () {
		$('#ubah_alamat').show();
		$('#notif').show();
		$('#cetak').hide();
		$('#select_provinsi').load('<?php echo base_url("pemesanan/list_provinsi");?>');
		$('#select_kota').load('<?php echo base_url("pemesanan/list_kota");?>');
	});


	$('#update_user').click(function () {
		var id='<?=$user[0]->id;?>';
		var provinsi=$('#sel_list_provinsi').val();
		var kota=$('#sel_list_kota').val();
		var kodepos=$('#update_kodepos').val();
		var alamat=$('#update_alamat').val();
		var data_client={
			id:id,
			provinsi:provinsi,
			kota:kota,
			kodepos:kodepos,
			alamat:alamat
		}
		var url = '<?php echo base_url("pelanggan/update_pelanggan");?>';
		$.post(url,data_client,function () {
			location.reload();
		})
	})



</script>