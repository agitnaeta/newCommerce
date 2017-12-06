<div class="container pad">
	<div class="panel panel-default">
	<div class="panel-heading">
		<h4>
			Daftar Pesanan
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
		<a href="#block_bayar" id="cara_bayar" class="btn btnt-info">
			Cara Bayar
		</a>
		<br>
		<br>
		<table id="table_pesanan" class="table tables-striped">
			<thead class="">
				<th>Nomor Pesanan </th>
				<th>Total Pembelian</th>
				<th>Jenis Kirim</th>
				<th>Biaya Kirim</th>
				<th>Tanggal Pesan</th>
				<th>Status</th>
				<th>Bayar</th>
			</thead>
			<tbody>
			<?php foreach($pesanan as $p):?>
			<tr>
				<td>
					#<?=$p->id;?>
				</td>
				<td><?=$p->total_harga;?></td>
				<td>JNE <?=$p->service;?></td>
				<td><?=$p->ongkir;?></td>
				<td><?=dateindo($p->tanggal_beli);?></td>
				<td><?=$p->status;?></td>
				<td class="text-center">
					<a href="<?php echo base_url("store/konfirm_bayar/$p->id");?>" class="btn btn-primary"> Konfirmasi Bayar</a>
					<a href="<?php echo base_url("store/invoice/$p->id");?>" class="btn btn-default">
						Detail Invoice
					</a>
				</td>
				
			</tr>
			<?php endforeach;?>
			</tbody>
		</table>
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
