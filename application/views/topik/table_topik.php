<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
		List Topik Saya
	</div>
	<div class="panel-body">
	<div class="">
		<a href="<?php echo base_url("topik/form_topik");?>" class="btn btn-primary"> Buat Topik</a>
	</div>
	<br>
		<div class="table-responsive">
			<table class="table table-condensed" id="table_topik">
				<thead class="bg-primary">
					
					<th>Judul</th>
					<th>Isi</th>
					<th>Action</th>
				</thead>
				<tbody>
				<?php foreach($topik as $l):?>
					<tr>
						<td><?=$l->judul;?></td>
						<td>
							<?=substr(strip_tags($l->isi), 0, 100)."...";?>
							<a href="<?php echo base_url("topik/lihat_topik/$l->id")?>"> Selengkapnya >></a>
						</td>
						<td>
							<a href="<?php echo base_url("topik/form_update/$l->id")?>" class="btn btn-warning">
								<i class="fa fa-edit"></i> 
							</a>
							<a href="#" id="<?=$l->id;?>" class="delete btn btn-danger">
								<i class="fa fa-remove"></i> 
							</a>
						</td>
					</tr>
				<?php endforeach;?>	
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
	 Topik Terbaru
	</div>
	<div class="panel-body">
		<ul>
			<?php foreach($last_topik as $t):?>
				<a href="<?php echo base_url("topik/lihat_topik/$t->id")?>">
					<li><?=$t->judul;?></li>
				</a>
			
			<?php endforeach;?>	
		</ul>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		Trending Topik
	</div>
	<div class="panel-body">
		<ul>
			<?php foreach($trending as $t):?>
				<a href="<?php echo base_url("topik/lihat_topik/$t->id")?>">
					<li><?=$t->judul;?> (<?=$t->jumlah;?>)</li>
				</a>
			
			<?php endforeach;?>	
		</ul>
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#table_topik').DataTable();
	})
	$('.delete').click(function () {
		if (confirm("Apakah Anda Yakin? ")) {
			var id=$(this).attr('id');
			var url='<?php echo base_url("topik/delete_topik"); ?>';
			$.post(url,{id:id},function (data) {
				response('pesan_topik',data);
				window.location.assign("<?php echo base_url("topik/list_topik");?>");
			})
		}else{
			return false;
		}
	})
</script>