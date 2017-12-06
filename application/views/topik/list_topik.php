<div class="container">
	<div class="panel panel-default">
	<div class="panel-heading">
		Trending Topik
	</div>
	<div class="panel-body">
		<ul>
			<?php foreach($trending as $t):?>
				<a href="<?php echo base_url("topik/trending_topik")?>">
					<li><?=$t->judul;?> (<?=$t->jumlah;?>)</li>
				</a>
			
			<?php endforeach;?>	
		</ul>
	</div>
</div>
	<div class="panel panel-default">
	<div class="panel-heading">
		Last Topik
	</div>
	<div class="panel-body">
		<ul>
			<?php foreach($topik as $t):?>
				<a href="<?php echo base_url("topik/last_topik")?>">
					<li><?=$t->judul;?></li>
				</a>
			<?php endforeach;?>	
		</ul>
	</div>
</div>
</div>