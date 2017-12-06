<div class="container pad">
	<div class="panel panel-default">
	<div class="panel-heading">
		<h4 id="block_bayar_mobile">
			Daftar Pesanan
			<span class="text-right">
				<a href="#block_bayar_mobile" id="cara_bayar" class="btn btn-info ">
				<i class="fa fa-info-circle"></i> Cara Bayar
			</a>
			</span>
		</h4>
	</div>
	<div class="panel-body" id="block_bayar">
		<h4>Cara Pembayaran</h4>
		<p>Anda dapat melakukan pembayaran ke rekening berikut</p>
		<?php foreach ($bank as $b):?>
			<b>Nama Bank</b><br>
			<?=$b->nama;?><br>
			<b>No Rekening</b><br>
			<?=$b->no_rek;?><br>
			<b>Atas Nama</b><br>
			<?=$b->pemilik;?><br>
			<b>Kode Bank</b><br>
			<?=$b->kode;?><br>
		<?php endforeach;?>	
		<p>Sejumlah sesuai dengan nomor invoice anda, dengan mencantumkan nomor refrensi atau keterangan dengan memasukan nomor invoice
		</p>
	</div>
	<div class="panel-body table-responsive">
		
	
		<?php foreach($pesanan as $p):?>
		
		<div class="col-xs-12">
			<div class="panel panel-primary ">
					<div class="">
						<div class="panel-heading">
							<h5>	#<?=$p->id;?></h5>
						</div>
						<div class="panel-body">
							<table class="table table-condensed">
								<tr>
									<td>Total</td><td><?=$p->total_harga;?></td>
								</tr>
								<tr>
									<td>Beban</td><td><?=$p->total_beban;?> Kg</td>
								</tr>
								<tr>
									<td>Harga Ongkir</td><td><?=rupiah($p->ongkir);?> </td>
								</tr>
								<tr>
									<td>Ongkir Type</td><td> JNE <?=$p->service;?> </td>
								</tr>
								<tr>
									<td>Tanggal Beli</td><td> <?=dateindo($p->tanggal_beli);?></td>
								</tr>
							</table>
							
						</div>
						<div class="panel-footer">
							<div class="btn-group">
								<a href="<?php echo base_url("store/konfirm_bayar/$p->id");?>" class="btn  btn-primary"> Konfirmasi</a>
								<a href="<?php echo base_url("store/invoice/$p->id");?>" class="btn  btn-default">
										Detail
									</a>
							</div>
							
						</div>
					</div>
			</div>
		</div>
		<?php endforeach;?>
		
	</div>
</div>
</div>
<script type="text/javascript">
	$('#table_pesanan').DataTable();
	$(document).ready(function () {
		$('#block_bayar').hide();
	})
	$('#cara_bayar').click(function () {
		$('#block_bayar').toggle();
	})
</script>
