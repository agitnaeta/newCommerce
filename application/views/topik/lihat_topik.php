<?php if(isset($topik)) { ?>
<?php foreach($topik as $t):?>
	<div class="container">
	<div class="panel-heading">
		<h3><?=$t->judul;?></h3>	
	</div>
	<div class="panel-body">
		<?=$t->isi;?>
	</div>
	</div>
	<?php $idtopik=$t->id;?>
<?php endforeach;?>	
<?php };?>

<div class="container">
<div class="komentar">
<div class="panel ">
	<div class="panel-heading">
		<h3>Komentar</h3>
		<hr>
	</div>
	<div class="panel-body">
		<div id="pesan_komentar"></div>
		<form method="post" id="form_komen" action="<?php echo base_url("komentar/insert");?>">
			<input type="hidden" id="idtopik" name="idtopik" value="<?=$idtopik;?>">
			<textarea class="form-control" name="komentar"></textarea>
			<br>
			<button id="masukan_komentar" class="btn btn-primary">Masukan Komentar</button>
		</form>
	</div>
</div>
</div>
</div>
<div class="container">
	<?php foreach($komentar as $k):?>
		<div class="blockquote  panel">
			<h4><?=$k->username;?></h4>
			<p>
				<?=$k->komentar;?>
			</p>
		</div>
	<?php endforeach;?>	
</div>