<?php include 'header.php'; 


if(isset($_POST['proje_id'])){
	$projesor=$db->prepare("SELECT * FROM proje WHERE proje_id=:id");
	$projesor->execute(array(
		'id'=>$_POST['proje_id']
	));

	$projecek=$projesor->fetch(PDO::FETCH_ASSOC);
}


?>

<!-- ck editor-->
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="display-4" style="font-size: 2rem;">Proje Ekle</h3>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">
				<div class="form-row">
					<div class="col-md-6">
						<label>Proje Başlığı</label>
						<input type="text" name="proje_baslik" class="form-control" value="<?php echo $projecek['proje_baslik'] ?>">
					</div>
					<div class="col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" name="proje_teslim_tarihi" class="form-control" value="<?php echo $projecek['proje_teslim_tarihi'] ?>">
					</div>
				</div>
				<div class="form-row mt-2">
					<div class="col-md-6">
						<label>Proje Aciliyeti</label>
						<select name="proje_aciliyet" class="form-control">
							<option <?php if($projecek['proje_aciliyet']=="Acil"){echo "selected";} ?> value="Acil">Acil</option>
							<option <?php if($projecek['proje_aciliyet']=="Acelesi Yok"){echo "selected";} ?> value="Acelesi Yok">Acelesi Yok</option>
							<option <?php if($projecek['proje_aciliyet']=="Normal"){echo "selected";} ?> value="Normal">Normal</option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Proje Durumu</label>
						<select name="proje_durum" class="form-control">
							<option <?php if($projecek['proje_durum']=="Yeni Başladı"){echo "selected";} ?> value="Yeni Başladı">Yeni Başladı</option>
							<option <?php if($projecek['proje_durum']=="Devam Ediyor"){echo "selected";} ?> value="Devam Ediyor">Devam Ediyor</option>
							<option <?php if($projecek['proje_durum']=="Bitti"){echo "selected";} ?> value="Bitti">Bitti</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="proje_id" value="<?php echo $_POST['proje_id']; ?>">
				<div class="form-row mt-3">
					<div class="col-md-12">
						<label>Proje Detayı</label>
						<textarea name="proje_detay" class="form-control mt-1"><?php echo $projecek['proje_detay'] ?></textarea>
					</div>
				</div>
				<button type="submit" name="projeduzenle" class="btn btn-primary mt-2">Kaydet</button>
			</form>
		</div>
	</div>
</div>


<?php include 'footer.php'; ?>


<script>
	CKEDITOR.replace('proje_detay');
</script>