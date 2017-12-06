<script type="text/javascript" src="<?php echo base_url("src/js/js.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("src/js/form.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("src/js/bootstrap.min.js") ?>"></script>
<script type="text/javascript">
function response(id,data) {
	if (data!=null) {
		var id=id;
		var obj=JSON.parse(data);
		if (obj.code=='1000') {
			$('#'+id+'').removeClass('alert alert-danger');
			$('#'+id+'').addClass('alert alert-success');
			$('#'+id+'').html(obj.msg);
			$('#'+id+'').show().delay(3000).fadeOut('slow');
		}else{
			$('#'+id+'').removeClass('alert alert-success');
			$('#'+id+'').addClass('alert alert-danger');
			$('#'+id+'').html(obj.msg);
			$('#'+id+'').show().delay(3000).fadeOut('slow');
		}
	}else{
		return false;
	}
}
function loadfile(event) {
	    var output = document.getElementById('output');
	    output.src = URL.createObjectURL(event.target.files[0]);
}
function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('') + ',-';
}
</script>

