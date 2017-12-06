<select id="sel_list_provinsi" class="form-control" name="provinsi">
	<?php foreach ($province as $row):?>
		<option value="<?=$row['province_id'];?>"><?=$row['province'];?></option>
	<?php endforeach;?>	
</select>
<script type="text/javascript">
	$('#sel_list_provinsi').select2();
</script>