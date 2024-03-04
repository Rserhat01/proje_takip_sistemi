<?php include 'header.php'; ?>



<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">

<!-- ck editor-->
<script src="//cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>

<div class="container">
	<div class="card">
		<div class="card-header">
			<h3 class="display-4" style="font-size: 2rem;">Proje Ekle</h3>
		</div>
		<div class="card-body">
			<form action="islemler/islem.php" method="POST" enctype="multipart/form-data">
				<div class="form-row">
					<div class="col-md-6">
						<label>Proje Başlığı</label>
						<input type="text" name="proje_baslik" class="form-control" placeholder="Projenizin Başlığını Giriniz">
					</div>
					<div class="col-md-6">
						<label>Teslim Tarihi</label>
						<input type="date" name="proje_teslim_tarihi" class="form-control">
					</div>
				</div>
				<div class="form-row mt-2">
					<div class="col-md-6">
						<label>Proje Aciliyeti</label>
						<select name="proje_aciliyet" class="form-control">
							<option value="Acil">Acil</option>
							<option value="Acelesi Yok">Acelesi Yok</option>
							<option value="Normal">Normal</option>
						</select>
					</div>
					<div class="col-md-6">
						<label>Proje Durumu</label>
						<select name="proje_durum" class="form-control">
							<option value="Yeni Başladı">Yeni Başladı</option>
							<option value="Devam Ediyor">Devam Ediyor</option>
							<option value="Bitti">Bitti</option>
						</select>
					</div>
				</div>
				<div class="form-group mt-2">
					<div class="col-md-12">
						<label>Proje Detayı</label>
						<textarea name="proje_detay" class="form-control mt-1"></textarea>
					</div>
				</div>
				<button type="submit" name="projeekle" class="btn btn-primary mt-2">Kaydet</button>
			</form>
		</div>
	</div>
</div>

<?php include 'footer.php'; ?>




<script>
	CKEDITOR.replace('proje_detay');
</script>







