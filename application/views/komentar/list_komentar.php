<div class="container">
	<?php foreach($komentar as $k):?>
		<div class="blockquote  panel">
			<ul>
				<li>
					<a>
				<?=$k->username;?></a> Telah mengomentari topik anda yang berjudul <a href="<?php echo base_url("topik/lihat_topik/$k->idtopik") ?>"> <?=$k->judul;?>
				</a>
				</li>
			</ul>
		</div>
	<?php endforeach;?>	
</div>