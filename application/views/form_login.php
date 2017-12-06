<style type="text/css">
	label{
		padding-top: 10px;
	}
</style>
<form method="post" action="<?php echo base_url("login/auth");?>">
	<div class="container pad">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4> <i class="fa fa-pencil"></i>  Login</h4>
			</div>
			<div class="panel-body">
				<div id="pesan_login"></div>
				<label for="">Username</label>
				<input type="text" class="form-control" name="username" value="<?=set_value('username');?>">
				<?=form_error('username');?>
				<label for="">Password</label>
				<input type="password" class="form-control" name="password" value="<?=set_value('password');?>">
				<?=form_error('password');?>
			</div>
			<div class="panel-footer">
				<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-sign-in"></i> Login</button>
				&nbsp;
				<a href="<?php echo base_url("daftar"); ?>"> Daftar Baru</a>
			</div>

		</div>

	</div>
</div>
</form>
<script type="text/javascript">
	var responses='<?php echo json_encode($response);?>';
	if (responses!='""') {
		response('pesan_login',responses);
	}
</script>