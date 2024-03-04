<?php include 'header.php'; 

if(isset($_POST['sip_id'])){
	$siparissor = $db->prepare("SELECT * FROM siparis WHERE sip_id=:id");
	$siparissor->execute(array(
		'id' => $_POST['sip_id']
	));

	$sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);
}

?>


<!-- ck editor-->
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


<div class="container">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Sipariş Düzenleme</h5>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">
				<div class="form-row">
					<div class="col-md-6">
						<label>İsim Soyisim</label>
						<input class="form-control" type="text" name="musteri_isim" value="<?php echo $sipariscek['musteri_isim']; ?>">
					</div>
					<div class="col-md-6">
						<label>Mail</label>
						<input class="form-control" type="email" name="musteri_mail" value="<?php echo $sipariscek['musteri_mail']; ?>">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="col-md-6">
						<label>Telefon Numarası</label>
						<input class="form-control" type="number" name="musteri_telefon" value="<?php echo $sipariscek['musteri_telefon']; ?>">
					</div>
					<div class="col-md-6">
						<label>Sipariş Başlığı</label>
						<input class="form-control" type="text" name="sip_baslik" value="<?php echo $sipariscek['sip_baslik']; ?>">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-6">
						<label>Sipariş Durumu</label>
						<select required name="sip_durum" class="form-control">
							<option <?php if($sipariscek['sip_durum'] == "Yeni Başladı"){echo "selected";} ?>>Yeni Başladı</option>
							<option <?php if($sipariscek['sip_durum'] == "Devam Ediyor"){echo "selected";} ?>>Devam Ediyor</option>
							<option <?php if($sipariscek['sip_durum'] == "Bitti"){echo "selected";} ?>>Bitti</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Ücret (TL)</label>
						<input class="form-control" type="number" name="sip_ucret" required value="<?php echo $sipariscek['sip_ucret']; ?>">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" name="sip_teslim_tarihi" required class="form-control" value="<?php echo $sipariscek['sip_teslim_tarihi']; ?>">
					</div>
					<div class="form-group col-md-6">
						<label>Aciliyet</label>
						<select required name="sip_aciliyet" class="form-control">
							<option <?php if($sipariscek['sip_aciliyet'] == "Acil"){echo "selected";} ?>>Acil</option>
							<option <?php if($sipariscek['sip_aciliyet'] == "Normal"){echo "selected";} ?>>Normal</option>
							<option <?php if($sipariscek['sip_aciliyet'] == "Acelesi Yok"){echo "selected";} ?>>Acelesi Yok</option>
						</select>
					</div>
				</div>
				<input type="hidden" name="sip_id" value="<?php echo $_POST['sip_id']; ?>">
				<div class="form-row mt-3">
					<div class="form-group col-md-12">
						<label>Sipariş Detayı</label>
						<textarea required class="form-control" name="sip_detay"><?php echo $sipariscek['sip_detay']; ?></textarea>
					</div>
				</div>
				<button type="submit" name="sip_duzenle" class="btn btn-primary">Kaydet</button>
			</form>
		</div>
	</div>
</div>





<?php include 'footer.php'; ?>



<script>
	CKEDITOR.replace('sip_detay');
</script>