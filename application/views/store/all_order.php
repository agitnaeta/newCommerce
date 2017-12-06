<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
		<h4>
			<i class='fa fa-shopping-cart'></i> Daftar Pesanan
		</h4>
	</div>
	<div class="panel-body">
		<div id="pesan"></div>
		<table class="table tables-striped table-condensed" id="table_order">
			<thead class="">
				<td>Nomor Pesanan </td>
				<td>Total Pembelian</td>
				<td>Jenis Kirim</td>
				<td>Biaya Kirim</td>
				<td>Tanggal Pesan</td>
				<td>Status</td>
				<td>Bukti</td>
				<td>Bayar</td>
			</thead>
			<?php foreach($pesanan as $p):?>
			<tbody>
				<tr>
				<td>
					#<?=$p->id;?>
				</td>
				<td><?=$p->total_harga;?></td>
				<td>JNE <?=$p->service;?></td>
				<td><?=$p->ongkir;?></td>
				<td><?=dateindo($p->tanggal_beli);?></td>
				<td><?=$p->status;?></td>
				<td><?=(strlen($p->bukti)>1) ? '<a href=" '.base_url("assets/uploads/$p->bukti").'">Lihat</a>':'Belum Upload';?></td>
				<td class="text-center">
					<div class="btn-group">
						<a href="#" data-id="<?=$p->id;?>" class="app btn btn-primary" title="Approve"> 
						<i class="fa fa-check"></i>
					</a>
					<a title="Bukti Bayar" href="<?php echo base_url("aseets/uploads/bukti/$p->bukti");?>" class="btn btn-default"> 
						<i class="fa fa-file"></i>
					</a>
					<a title="Detail Invoice" target="__blank" href="<?php echo base_url("store/invoice/$p->id");?>" class="btn btn-default">
						<i class="fa fa-search"></i>
					</a>
					</div>
				</td>
				
			</tr>
			</tbody>
			<?php endforeach;?>
		</table>
	</div>
	</div>
</div>
<script type="text/javascript">
	$('#table_order').DataTable();
	$('.app').click(function () {
		if (confirm("Apakah Anda Yakin ?")) {
			var id=$(this).attr('data-id');
			var url ='<?php echo base_url("pemesanan/approve");?>/'+id+'';
			$.get(url,function (data) {
				var obj=JSON.parse(data);
				if (obj.code=='1000') {
					$('#pesan').html(obj.msg);
					$('#pesan').removeClass('alert alert-danger');
					$('#pesan').addClass('alert alert-success');
					$('#pesan').show().delay(3000).fadeOut();
					setTimeout(function(){ location.reload(); }, 3000);
				}else{
					$('#pesan').html(obj.msg);
					$('#pesan').removeClass('alert alert-success');
					$('#pesan').addClass('alert alert-danger');
					$('#pesan').show().delay(3000).fadeOut();
					return false;
				}
			});
		}else{
			false;
		}
		
	})
</script>