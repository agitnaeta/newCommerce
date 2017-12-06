<div class="container-fluid">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Semua Komentar</h3>
			</div>
			<div class="panel-body">
				<table id="table_komentar">
					<thead class="">
						<th>Id</th>
						<th>Produk</th>
						<th>Rating</th>
						<th>Komentar</th>
						<th>Nama Lengkap</th>
					</thead>
					<tbody>
					<?php foreach($review as $p):?>
						<tr>
							<td><?=$p->id;?></td>
							<td>
								<a href="<?=base_url("produk/index/read/$p->id_produk");?>" target="blank__"> Lihat produk</a>
							</td>
							<td><?=$p->rating;?>/5</td>
							<td><?=$p->komentar;?></td>
							<td><?=$p->nama_lengkap;?></td>
						</tr>
					<?php endforeach;?>	
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('#table_komentar').DataTable();
</script>


