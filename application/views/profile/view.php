<style type="text/css">
	.tengah {
    display: block;
    margin-left: auto;
    margin-right: auto }
</style>
<?php foreach($profile as $p):?>
	<div class="container pad">
	<div class="col-md-12">
		<h3><?=$p->judul;?></h3>
		<hr>
		<img src="<?=base_url("/assets/uploads/files/$p->gambar");?>" class="tengah" width=300px heigt='auto'>
		<blockquote>	
			<?=$p->isi;?>
		</blockquote>
	</div>
	</div>
<?php endforeach;?>	