<style type="text/css">
	label{
		padding-top: 10px;
	}
</style>
<form method="post" action="<?php echo base_url("user/update");?>">
	<div class="container">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4> <i class="fa fa-pencil"></i>  Profile Saya</h4>
			</div>
			<?php foreach($user->result() as $u):?>
					<div class="panel-body">
						<div id="pesan_daftar"></div>
						<label for="">Nama Lengkap</label>
						<input type="hidden" class="form-control" name="id" value="<?=$u->id;?>">
						<input type="text" class="form-control" name="nama_lengkap" value="<?=$u->nama_lengkap;?>">
						<?=form_error('nama_lengkap');?>
						<label for="">Username</label>
						<input type="text" class="form-control" name="username" value="<?=$u->username;?>">
						<?=form_error('username');?>
						<label for="">Password</label>
						<input type="text" class="form-control" name="password" value="">
						<?=form_error('password');?>
						<label for="">E-Mail</label>
						<input type="text" class="form-control" name="email" value="<?=$u->email;?>">
						<?=form_error('email');?>
						<label for="">Jenis Kelamin</label>
						<br>
						<label>Laki-Laki</label>
						<input <?php echo $s=($u->jenis_kelamin=='L') ? 'checked':'';?> type="radio" name="jenis_kelamin" value="L">
						<label>Perempuan</label>
						<input <?php echo $s=($u->jenis_kelamin=='P') ? 'checked':'';?>  type="radio" name="jenis_kelamin" value="P">
						<?=form_error('jenis_kelamin');?>
					</div>
			<?php endforeach;?>	
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Update Data</button>
			</div>
		</div>

	</div>
</div>
</form>
<script type="text/javascript">
	var responses='<?php echo json_encode($response);?>';
	if (responses!='""') {
		response('pesan_daftar',responses);
	}
</script>