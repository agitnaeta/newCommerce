<div class="container pad">
	<div class="panel-default panel">
		<div class="panel-heading">
			Your Profile
		</div>
		<div class="panel-body">
			<table class="table" id="table_real">	
					<tr><td>Nama</td><td><?=$profile['nama_lengkap'];?></td></tr>
					<tr><td>Username</td><td><?=$profile['username'];?></td></tr>
					<tr><td>Email</td><td><?=$profile['email'];?></td></tr>
					<tr><td>Jenis Kelamin </td><td><?=$profile['jenis_kelamin'];?></td></tr>
					<tr><td>Provinsi </td><td><?=$this->rajaongkir->detail_province($profile['provinsi'],'province');?></td></tr>
					<tr><td>Kota </td><td><?=$this->rajaongkir->detail_city($profile['kota'],'city_name');?></td></tr>
					<tr><td>Alamat </td><td><?=$profile['alamat'];?></td></tr>
					<tr><td>Kode Pos </td><td><?=$profile['kodepos'];?></td></tr>
					<tr><td>No.telp </td><td><?=$profile['no_telp'];?></td></tr>
			</table>
			<br>
			<div class="text-center">
				<button class=" btn btn-primary btn-lg" id="update_form">
					<i class='fa fa-edit'></i> Update Data
				</button>
			</div>
			<form method="post" action="<?php echo base_url("user/update_data");?>">
			<table id="table_update" class="table table-striped">	
					<tr>
						<td>Nama</td>
						<td>
							<input class='form-control' name="nama_lengkap" value="<?=$profile['nama_lengkap'];?>">
							<input class='form-control' name="id" type="hidden" value="<?=$profile['id'];?>">
						</td>
					</tr>
					<tr>
						<td>Username</td>
						<td>
							<input class='form-control' name="username" value="<?=$profile['username'];?>">
						</td>
					</tr>
					<tr>
						<td>Email</td>
						<td>
							<input class='form-control' name="email" value="<?=$profile['email'];?>">
						</td>
					</tr>
					<tr>
						<td>Jenis Kelamin </td>
						<td>
							<select class="form-control" name="jenis_kelamin">
								<option value="<?=$profile['jenis_kelamin'];?>"><?=$profile['jenis_kelamin'];?></option>
								<option value="L">L</option>
								<option value="P">P</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Provinsi </td>
						<td>
							<span id="select_provinsi"></span>
						</td>
					</tr>
					<tr>
						<td>Kota </td>
						<td>
							<span id="select_kota"></span>
						</td>
					</tr>
					<tr>
						<td>Alamat </td>
						<td>
							<input class='form-control' name="alamat" value="<?=$profile['alamat'];?>">
						</td>
					</tr>
					<tr>
						<td>Kode Pos </td>
						<td>
							<input class='form-control' name="kodepos" value="<?=$profile['kodepos'];?>">
						</td>
					</tr>
					<tr>
						<td>No.telp </td>
						<td>
							<input class='form-control' name="no_telp" value="<?=$profile['no_telp'];?>">	
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<button type="submit" class="btn btn-primary btn-lg">
								<i class='fa fa-edit'></i> Update Data
							</button>
						</td>
					</tr>
			</table>
	</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		$('#table_update').hide();
			$('#select_provinsi').load('<?php echo base_url("pemesanan/list_provinsi");?>');
		$('#select_kota').load('<?php echo base_url("pemesanan/list_kota");?>');
	})


	$('#update_form').click(function () {
		$('#table_update').show();
		$('#table_real').hide();
		$('#update_form').hide();
	})
</script>