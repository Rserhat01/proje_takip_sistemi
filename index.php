            
<!-- Header -->

<?php include 'header.php';?>

<div class="row mb-4 mx-1">



	<?php  
	$sayi=0;
	$projesor=$db->prepare("SELECT * FROM proje");
	$projesor->execute();

	$sayi = $projesor->rowcount();
	?>
	<div class="col-md-3">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
							Toplam <b>Proje</b> Sayısı</div>
							<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sayi; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php  
		$sayi=0;
		$projesor=$db->prepare("SELECT * FROM proje WHERE proje_durum = 'Bitti'");
		$projesor->execute();

		$sayi = $projesor->rowcount();
		?>
		<div class="col-md-3">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Biten <b>Proje</b> Sayısı</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sayi; ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-calendar fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php  
			$sayi=0;
			$projesor=$db->prepare("SELECT * FROM proje WHERE proje_aciliyet = 'Acil'");
			$projesor->execute();

			$sayi = $projesor->rowcount();
			?>
			<div class="col-md-3">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
									Acil <b>Proje</b> Sayısı</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sayi; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php  
				$sayi=0;
				$projesor=$db->prepare("SELECT * FROM proje WHERE proje_aciliyet = 'Acelesi Yok'");
				$projesor->execute();

				$sayi = $projesor->rowcount();
				?>
				<div class="col-md-3">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
										Önemsiz <b>Proje</b> Sayısı</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sayi; ?></div>
									</div>
									<div class="col-auto">
										<i class="fas fa-calendar fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- siparisler analiz -->

				<div class="row mb-4 mx-1">



					<?php  
					$sayi=0;
					$siparissor=$db->prepare("SELECT * FROM siparis");
					$siparissor->execute();

					$sayi = $siparissor->rowcount();
					?>
					<div class="col-md-3">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
											Toplam <b>Sipariş</b> Sayısı</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sayi; ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-calendar fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>


						<?php  
						$sayi=0;
						$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_durum = 'Bitti'");
						$siparissor->execute();

						$sayi = $siparissor->rowcount();
						?>
						<div class="col-md-3">
							<div class="card border-left-success shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
												Biten <b>Sipariş</b> Sayısı</div>
												<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sayi; ?></div>
											</div>
											<div class="col-auto">
												<i class="fas fa-calendar fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<?php  
							$sayi=0;
							$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_aciliyet = 'Acil'");
							$siparissor->execute();

							$sayi = $siparissor->rowcount();
							?>
							<div class="col-md-3">
								<div class="card border-left-info shadow h-100 py-2">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
													Acil <b>Sipariş</b> Sayısı</div>
													<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sayi; ?></div>
												</div>
												<div class="col-auto">
													<i class="fas fa-calendar fa-2x text-gray-300"></i>
												</div>
											</div>
										</div>
									</div>
								</div>

								<?php  
								$sayi=0;
								$siparissor=$db->prepare("SELECT * FROM siparis WHERE sip_aciliyet = 'Acelesi Yok'");
								$siparissor->execute();

								$sayi = $siparissor->rowcount();
								?>
								<div class="col-md-3">
									<div class="card border-left-warning shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
														Önemsiz <b>Sipariş</b> Sayısı</div>
														<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $sayi; ?></div>
													</div>
													<div class="col-auto">
														<i class="fas fa-calendar fa-2x text-gray-300"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row justify-content-center">
									<div class="col-md-10">
										<div class="card">
											<div class="card-header">
												<h5 class="card-title">Projeler</h5>
											</div>
											<div class="card-body">
												<div class="table-responsive">
													<table class="table table-bordered" id="projeler" width="100%" cellspacing="0">
														<thead>
															<tr> 
																<th>No</th>
																<th>Başlık</th>
																<th>Bitiş Tarihi</th>
																<th>Aciliyet</th>
																<th>Durum</th>
																<th>İşlem</th>
															</tr>
														</thead>
														<tbody>
															<?php 
															$say=0;
															$projesor=$db->prepare("SELECT * FROM proje ORDER BY proje_id DESC");
															$projesor->execute();
															while ($projecek=$projesor->fetch(PDO::FETCH_ASSOC)) { $say++; ?>

																<tr>
																	<td><?php echo $say; ?></td>
																	<td><?php echo $projecek['proje_baslik']; ?></td>
																	<td><?php echo $projecek['proje_teslim_tarihi']; ?></td>
																	<td><?php 
																	if ($projecek['proje_aciliyet']=="Acil") {
																		echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
																	} else {
																		echo $projecek['proje_aciliyet'];
																	}
																?></td>
																<td><?php 
																if ($projecek['proje_durum']=="Bitti") {
																	echo '<span class="badge badge-success" style="font-size:1rem">Bitti</span>';
																} else {
																	echo $projecek['proje_durum'];
																}
															?></td>
															<td>
																<div class="d-flex justify-content-center">
																	<form action="projeduzenle.php" method="POST" accept-charset="utf-8">
																		<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
																		<button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
																			<span class="icon text-white-60">
																				<i class="fas fa-edit"></i>
																			</span>
																		</button>
																	</form>
																	<form class="mx-2" action="islemler/islem.php" method="POST" accept-charset="utf-8">
																		<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
																		<button type="submit" name="projesilme" class="btn btn-danger btn-sm btn-icon-split">
																			<span class="icon text-white-60">
																				<i class="fas fa-trash"></i>
																			</span>
																		</button>
																	</form>
																	<form action="projegozat.php" method="POST" accept-charset="utf-8">
																		<input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
																		<button type="submit" name="proje_bak" class="btn btn-primary btn-sm btn-icon-split">
																			<span class="icon text-white-60">
																				<i class="fas fa-eye"></i>
																			</span>
																		</button>
																	</form>
																</div>
															</td>

														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>


						<div class="row justify-content-center my-3">
							<div class="col-md-10">
								<div class="card">
									<div class="card-header">
										<h5 class="card-title">Siparişler</h5>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-bordered" id="siparisler" width="100%" cellspacing="0">
												<thead>
													<tr> 
														<th>No</th>
														<th>Başlık</th>
														<th>Bitiş Tarihi</th>
														<th>Aciliyet</th>
														<th>Durum</th>
														<th>İşlem</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$say=0;
													$siparissor=$db->prepare("SELECT * FROM siparis ORDER BY sip_id DESC");
													$siparissor->execute();
													while ($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++; ?>

														<tr>
															<td><?php echo $say; ?></td>
															<td><?php echo $sipariscek['sip_baslik']; ?></td>
															<td><?php echo $sipariscek['sip_teslim_tarihi']; ?></td>
															<td><?php 
															if ($sipariscek['sip_aciliyet']=="Acil") {
																echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
															} else {
																echo $sipariscek['sip_aciliyet'];
															}
														?></td>
														<td><?php 
														if ($sipariscek['sip_durum']=="Bitti") {
															echo '<span class="badge badge-success" style="font-size:1rem">Bitti</span>';
														} else {
															echo $sipariscek['sip_durum'];
														}
													?></td>
													<td>
														<div class="d-flex justify-content-center">
															<form action="siparisduzenle.php" method="POST" accept-charset="utf-8">
																<input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
																<button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
																	<span class="icon text-white-60">
																		<i class="fas fa-edit"></i>
																	</span>
																</button>
															</form>
															<form class="mx-2" action="islemler/islem.php" method="POST" accept-charset="utf-8">
																<input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
																<button type="submit" name="siparissilme" class="btn btn-danger btn-sm btn-icon-split">
																	<span class="icon text-white-60">
																		<i class="fas fa-trash"></i>
																	</span>
																</button>
															</form>
															<form action="siparisgozat.php" method="POST" accept-charset="utf-8">
																<input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
																<button type="submit" name="sip_bak" class="btn btn-primary btn-sm btn-icon-split">
																	<span class="icon text-white-60">
																		<i class="fas fa-eye"></i>
																	</span>
																</button>
															</form>
															<form class="mx-2" action="mail_ekrani.php" method="POST" accept-charset="utf-8">
																<input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
																<button type="submit" name="mailgonder" class="btn btn-warning btn-sm btn-icon-split">
																	<span class="icon text-white-60">
																		<i class="fas fa-envelope"></i>
																	</span>
																</button>
															</form>
														</div>
													</td>

												</tr>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>



				<!-- Footer -->

				<?php include 'footer.php';?>



				<script src="vendor/datatables/jquery.dataTables.min.js"></script>
				<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
				<script src="js/demo/datatables-demo.js"></script> 
				<script src="vendor/datatables/dataTables.buttons.min.js"></script>
				<script src="vendor/datatables/buttons.flash.min.js"></script>
				<script src="vendor/datatables/jszip.min.js"></script>
				<script src="vendor/datatables/pdfmake.min.js"></script>
				<script src="vendor/datatables/vfs_fonts.js"></script>
				<script src="vendor/datatables/buttons.html5.min.js"></script>
				<script src="vendor/datatables/buttons.print.min.js"></script>


				<script type="text/javascript">
					var dataTables = $('#projeler').DataTable({
						initComplete: function () {
							this.api().columns([2,3,4]).every( function () {
								var column = this;
								var select = $('<select class="filtre"><option value=""></option></select>')
								.appendTo( $(column.footer()).empty() )
								.on( 'change', function () {
									var val = $.fn.dataTable.util.escapeRegex(
										$(this).val()
										);

									column
									.search( val ? '^'+val+'$' : '', true, false )
									.draw();
								});

								column.data().unique().sort().each( function ( d, j ) {
									var val = $('<div/>').html(d).text();

									if (val.length>29) {
										filtremetin =  val.substr(0,30)+"...";
									} else {
										filtremetin=val;
									}
									select.append( '<option value="' + val + '">' + filtremetin + '</option>' )
								});
							});
						},
						"ordering": true,  
						"searching": true,  
						"lengthChange": true, 
						"info": true,
						dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip"
					});
				</script>

				<!-- siparişler datatables -->

				<script type="text/javascript">
					var dataTables = $('#siparisler').DataTable({
						initComplete: function () {
							this.api().columns([2,3,4]).every( function () {
								var column = this;
								var select = $('<select class="filtre"><option value=""></option></select>')
								.appendTo( $(column.footer()).empty() )
								.on( 'change', function () {
									var val = $.fn.dataTable.util.escapeRegex(
										$(this).val()
										);

									column
									.search( val ? '^'+val+'$' : '', true, false )
									.draw();
								});

								column.data().unique().sort().each( function ( d, j ) {
									var val = $('<div/>').html(d).text();

									if (val.length>29) {
										filtremetin =  val.substr(0,30)+"...";
									} else {
										filtremetin=val;
									}
									select.append( '<option value="' + val + '">' + filtremetin + '</option>' )
								});
							});
						},
						"ordering": true,  
						"searching": true,  
						"lengthChange": true, 
						"info": true,
						dom: "<'row mobilgizleexport gizlemeyiac'<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip"
					});
				</script>









