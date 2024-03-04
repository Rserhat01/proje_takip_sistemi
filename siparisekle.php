<?php include 'header.php'; ?>

<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>

<!-- ck editor-->
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h5 class="card-title">Sipariş Ekleme</h5>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST">
				<div class="form-row">
					<div class="col-md-6">
						<label>İsim Soyisim</label>
						<input class="form-control" type="text" name="musteri_isim">
					</div>
					<div class="col-md-6">
						<label>Mail</label>
						<input class="form-control" type="email" name="musteri_mail">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="col-md-6">
						<label>Telefon Numarası</label>
						<input class="form-control" type="number" name="musteri_telefon">
					</div>
					<div class="col-md-6">
						<label>Sipariş Başlığı</label>
						<input class="form-control" type="text" name="sip_baslik">
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-6">
						<label>Sipariş Durumu</label>
						<select required name="sip_durum" class="form-control">
							<option>Yeni Başladı</option>
							<option>Devam Ediyor</option>
							<option>Bitti</option>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label>Ücret (TL)</label>
						<input class="form-control" type="number" name="sip_ucret" required>
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" name="sip_teslim_tarihi" required class="form-control">
					</div>
					<div class="form-group col-md-6">
						<label>Aciliyet</label>
						<select required name="sip_aciliyet" class="form-control">
							<option>Acil</option>
							<option>Normal</option>
							<option>Acelesi Yok</option>
						</select>
					</div>
				</div>
				<div class="form-row mt-3">
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Sipariş Detayı</label>
							<textarea required class="form-control" name="sip_detay"></textarea>
						</div>
					</div>
				</div>
				<button type="submit" name="siparisekle" class="btn btn-primary">Kaydet</button>
			</form>
		</div>
	</div>
</div>



<?php include 'footer.php'; ?>





<script>
	CKEDITOR.replace('sip_detay');
</script>