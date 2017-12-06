<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			Buat Topik
		</div>
		<div class="panel-body">
			<div id="pesan_topik"></div>
			<label for="">Judul Topik</label>
			<input type="text" class="form-control" name="judul" id="judul">
			<label>Isi Topik</label>
			<textarea id="isi_topik" name="isi_topik"></textarea>
		</div>
		<div class="panel-footer">
			<a id="buat_topik" class="btn btn-primary" href="#">Buat Topik</a>
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
		var url ='<?php echo base_url("topik/tambah_topik");?>';
		$.post(url,form,function (data) {
			response('pesan_topik',data);
			window.location.assign("<?php echo base_url("topik/list_topik");?>");
		})

	})
</script>