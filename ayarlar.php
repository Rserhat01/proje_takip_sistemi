<?php include 'header.php'; ?>


<div class="container-fluid">
	<div class="card">

		<div class="card-header">
			<h2 class="text-primary font-weight-bold">Ayarlar</h2>
		</div>

		<div class="card-body">
			<form action="islemler/islem.php" method="POST" accept-charset="utf-8">
				<div class="form-row">
					<div class="col-md-6">
						<label>Site Başlığını Giriniz</label>
						<input class="form-control" type="text" name="site_baslik" value="<?php echo $ayarcek['site_baslik'] ?>">
					</div>
				</div>
				<div class="form-row my-2">
					<div class="col-md-6">
						<label>Site Açıklamasını Giriniz</label>
						<input class="form-control" type="text" name="site_aciklama" value="<?php echo $ayarcek['site_aciklama'] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-6">
						<label>Site Sahibini Giriniz</label>
						<input class="form-control" type="text" name="site_sahibi" value="<?php echo $ayarcek['site_sahibi'] ?>">
					</div>
				</div>
				<div class="form-row my-2">
					<div class="col-md-6">
						<label>Site Title Giriniz</label>
						<input class="form-control" type="text" name="site_title" value="<?php echo $ayarcek['site_title'] ?>">
					</div>
				</div>
				<button name="ayar_kaydet" type="submit" class="btn btn-primary mt-2">Kaydet</button>
			</form>
		</div>

	</div>
</div>









<?php include 'footer.php'; ?>