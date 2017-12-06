<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			Buat Topik
		</div>
		<div class="panel-body">
			<?php if(isset($topik)){?>
				<?php foreach($topik as $t):?>
					<div id="pesan_topik"></div>
					<label for="">Judul Topik</label>
					<input type="hidden" class="form-control" name="judul" id="judul" value="<?=$t->id;?>">
					<input type="text" class="form-control" name="judul" id="judul" value="<?=$t->judul;?>">
					<label>Isi Topik</label>
					<textarea id="isi_topik" name="isi_topik">
						<?=$t->isi;?>
					</textarea>
				<?php endforeach;?>	
			<?php }else {} ;?>	
		</div>
		<div class="panel-footer">
		<?php if(isset($topik)){?>
			<a id="buat_topik" class="btn btn-primary" href="#">Buat Topik</a>
		<?php }else { ;?>
			<a href="<?php echo base_url("topik/form_topik");?>" class="btn btn-primary"> Buat Topik</a>
		<?php 	} ;?>	

			
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		CKEDITOR.replace( 'isi_topik' );
	});
	$('#buat_topik').click(function () {
		var judul =$('#judul').val();
		var isi   =CKEDITOR.instances.isi_topik.getData();
		var form  ={
			judul:judul,
			isi:isi,
		};
		var url ='<?php echo base_url("topik/update_topik");?>';
		$.post(url,form,function (data) {
			response('pesan_topik',data);
			
		})

	})

	
</script>