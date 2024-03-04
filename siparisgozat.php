<?php include 'header.php'; 


if(isset($_POST['sip_id'])){
	$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_id=:id");
	$siparissor->execute(array(
		'id'=>$_POST['sip_id']
	));

	$sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);
}
?>


<!-- ck editor-->
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Siparişlere Gözat</h5>
		</div>
		<div class="card-body">
			<form action="siparisler.php" method="POST">
				<div class="form-row">
					<div class="col-md-6">
						<label>İsim Soyisim</label>
						<input disabled class="form-control" type="text" name="musteri_isim" value="<?php echo $sipariscek['musteri_isim']; ?>">
					</div>
					<div class="col-md-6">
						<label>Mail</label>
						<input disabled class="form-control" type="email" name="musteri_mail" value="<?php echo $sipariscek['musteri_mail']; ?>">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="col-md-6">
						<label>Telefon Numarası</label>
						<input disabled class="form-control" type="number" name="musteri_telefon" value="<?php echo $sipariscek['musteri_telefon']; ?>">
					</div>
					<div class="col-md-6">
						<label>Sipariş Başlığı</label>
						<input disabled class="form-control" type="text" name="sip_baslik" value="<?php echo $sipariscek['sip_baslik']; ?>">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-6">
						<label>Sipariş Durumu</label>
						<select disabled required name="sip_durum" class="form-control" value="<?php echo $sipariscek['sip_durum']; ?>">
							<option>Yeni Başladı</option>
							<option>Devam Ediyor</option>
							<option>Bitti</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Ücret (TL)</label>
						<input disabled class="form-control" type="number" name="sip_ucret" required value="<?php echo $sipariscek['sip_ucret']; ?>">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-6">
						<label>Teslim Tarihi</label>
						<input disabled type="date" name="sip_teslim_tarihi" required class="form-control" value="<?php echo $sipariscek['sip_teslim_tarihi']; ?>">
					</div>
					<div class="form-group col-md-6">
						<label>Aciliyet</label>
						<select disabled required name="sip_aciliyet" class="form-control" value="<?php echo $sipariscek['sip_aciliyet']; ?>">
							<option>Acil</option>
							<option>Normal</option>
							<option>Acelesi Yok</option>
						</select>
					</div>
				</div>
				<!-- <div class="form-row my-3">
					<div class="col-md-6">
						<input type="file" name="proje_dosya" id="proje_dosya">
					</div>
				</div> -->
				<div class="form-row mt-3">
					<div class="form-group col-md-12">
						<label>Sipariş Detayı</label>
						<textarea required class="form-control" name="sip_detay"><?php echo $sipariscek['sip_detay']; ?></textarea>
					</div>
				</div>
				<button type="submit" name="siparisekle" class="btn btn-primary">Geri Don</button>
			</form>
		</div>
	</div>
</div>



<?php include 'footer.php'; ?>



<!-- bootstrap dosya yükleme scripti -->

<script>
  $(document).ready(function () {
    $("#proje_dosya").fileinput({
      'theme': 'explorer-fas',
      'showUpload': false,
      'showCaption': true,
      showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar"],
    });
  });
</script>



<script>
	CKEDITOR.replace('sip_detay');
</script>