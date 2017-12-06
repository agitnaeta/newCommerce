<style type="text/css">
	label{
		padding-top: 10px;
	}
</style>
<div class="pad">
<form method="post" action="<?php echo base_url("daftar/create_account");?>">
	<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3> <i class="fa fa-pencil"></i>  Daftar</h3>
			</div>
			<div class="panel-body">
				<div id="pesan_daftar"></div>
				<label for="">Nama Lengkap</label>
				<input type="text" class="form-control" name="nama_lengkap" value="<?=set_value('nama_lengkap');?>">
				<?=form_error('nama_lengkap');?>
				<label for="">Username</label>
				<input type="text" class="form-control" name="username" value="<?=set_value('username');?>">
				<?=form_error('username');?>
				<label for="">Password</label>
				<input type="text" class="form-control" name="password" value="<?=set_value('password');?>">
				<?=form_error('password');?>
				<label for="">E-Mail</label>
				<input type="text" class="form-control" name="email" value="<?=set_value('email');?>">
				<?=form_error('email');?>
				<label for="">Jenis Kelamin</label>
				<br>
				<label>Laki-Laki</label>
				<input  type="radio" name="jenis_kelamin" value="L">
				<label>Perempuan</label>
				<input  type="radio" name="jenis_kelamin" value="P">
				<?=form_error('jenis_kelamin');?>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-register"></i> Daftar</button>
			</div>
		</div>

	</div>
</div>
</form>
</div>
<script type="text/javascript">
	var responses='<?php echo json_encode($response);?>';
	if (responses!='""') {
		response('pesan_daftar',responses);
	}
</script>