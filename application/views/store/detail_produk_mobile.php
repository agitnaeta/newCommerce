<style type="text/css">
fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating { 
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 2.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
</style>



<?php foreach($produk as $p):?>
<div class=" pad">
	<div class="col-xs-12">
		<img class="img img-responsive" src="<?=base_url("assets/uploads/files/$p->gambar");?>">
	</div>
	<div class="col-xs-12">
	<div class="">
		<div class="panel-heading">
		<h4>	<?=$p->nama_produk;?></h4>
		</div>
		<div class="panel-body">
			<table class="table table-striped">
				<tr>
					<td>Nama Produk</td><td><?=$p->nama_produk;?></td>
				</tr>
				<tr>
					<td>Harga</td><td><?=rupiah($p->harga);?></td>
					
				</tr>
				<tr>
					<td>Ukuran </td><td><?=$p->ukuran;?></td>
					
				</tr>
				<tr>
					<td>Jenis</td><td><?=$p->jenis;?></td>
					
				</tr>
				<tr>
					<td>Stock</td><td><?=$p->stock;?></td>
					
				</tr>
				<tr>
					<td>Warna</td><td><?=$p->warna;?></td>
				</tr>
				<tr>
					<td>Deskripsi</td><td><?=$p->deskripsi;?></td>
				</tr>
			</table>
		</div>
		<div class="navbar-fixed-bottom">
			<a hreff="#" id="<?=$p->id;?>" class="add_cart btn btn-primary btn-lg btn-block">
				<i class="fa fa-shopping-cart"></i>
					Add Cart
				</a>
		</div>
	</div>
	</div>
	<div class="col-xs-12 ">
	<hr>
		<form method="post" action="<?php echo base_url("store/add_review");?>">
			<h6>Riview Barang</h6>
		
			<input hidden name="id_produk" value="<?=$p->id;?>">
				<div class="text-center">
					<fieldset class="rating ">
				    <input type="radio" id="star5" name="rating" value="5" />
				    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
				    <input type="radio" id="star4half" name="rating" value="4 and a half" />
				    <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
				    <input type="radio" id="star4" name="rating" value="4" />
				    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
				    <input type="radio" id="star3half" name="rating" value="3 and a half" />
				    <label class="half" for="star3half" title="Meh - 3.5 stars"></label>
				    <input type="radio" id="star3" name="rating" value="3" />
				    <label class = "full" for="star3" title="Meh - 3 stars"></label>
				    <input type="radio" id="star2half" name="rating" value="2 and a half" />
				    <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
				    <input type="radio" id="star2" name="rating" value="2" />
				    <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
				    <input type="radio" id="star1half" name="rating" value="1 and a half" />
				    <label class="half" for="star1half" title="Meh - 1.5 stars"></label>
				    <input type="radio" id="star1" name="rating" value="1" />
				    <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
				    <input type="radio" id="starhalf" name="rating" value="half" />
				    <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
				</fieldset>
				</div>
				<br>
				<br>
				<br>
			<h6>Komentar</h6>
			<textarea name="komentar" class="form-control"></textarea>
			<br>
			<button class="btn btn-primary btn-block btn-lg">
				<i class="fa fa-comment"></i>  Masukan riview
			</button>
			<p></p>
			<p class="text-danger">*Pastikan anda sudah login sebelum komentar</p>
		</form>
	</div>
</div>
<?php endforeach;?>

<div class="container">
<?php foreach($review as $p):?>
	
		<div class="alert">
			<label>
				<i class="fa fa-user"></i> <?=$p->nama_lengkap;?>
				<p></p>
				<fieldset class="rating">
				
				<?php for($i=0; $i<$p->rating;$i++):?>
					<input type="radio" id="star5" name="rating" value="5" />
				    <label class="full" for="star5" title="Awesome - 5 stars"></label>
				<?php endfor;?>
				</fieldset>	
			</label>
			<blockquote>
				<?=$p->komentar;?>
			</blockquote>
		</div>
	
<?php endforeach;?>
</div>
<script type="text/javascript">
	$('.add_cart').click(function () {
		var id_produk=$(this).attr('id');
		$.post('<?=base_url("cart/add_cart");?>',{id_produk:id_produk},function (data) {
			// alert(data);
			swal('Yeay..!','Berhasil memasukan ke keranjang','success');
			count_cart();
		})
	})
</script>