<div class="container pad">
	<div class="panel-default panel">
		<div class="panel-heading">
		<h3>
			Konfirmasi Bayar
		</h3>
	</div>
	<div class="panel-body">
		<p class="text-center"><?=$error;?></p>
		<label>Nomor Pesanan</label>
		<p>#<?=$id_pesanan;?></p>
		<br>
		<label>Bukti Bayar</label>
		<form enctype="multipart/form-data" method="post" action="<?php echo base_url("store/upload_bukti");?>">
			<input class="form-control" name="id_pesanan" type="hidden" value="<?=$id_pesanan;?>">
			<input class="form-control" name="bukti_bayar" type="file">
			<p></p>
			<button class="btn btn-primary">
				Upload 
			</button>
		</form>
	</div>
	</div>
</div>