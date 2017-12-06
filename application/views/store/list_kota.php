<select id="sel_list_kota" class="form-control" name="kota">
	<?php foreach ($kota as $row):?>
		<option value="<?=$row['city_id'];?>"><?=$row['city_name'];?></option>
	<?php endforeach;?>	
</select>
<script type="text/javascript">
	$('#sel_list_kota').select2();
</script>