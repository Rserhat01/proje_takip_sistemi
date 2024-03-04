



<?php include 'baglan.php';

// site ayarları çekme

$ayarsor = $db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC); 

// veri tabanı bilgi güncelleme

if(isset($_POST['ayar_kaydet'])){

	$ayarkaydet = $db->prepare("UPDATE ayarlar SET 
		site_baslik=:site_baslik,  
		site_aciklama=:site_aciklama,
		site_sahibi=:site_sahibi,
		site_title=:site_title
	 "); // soldakiler tablodaki sütun ismi, sağdakiler takma isim 

	$ayarkaydet->execute(array(
		'site_baslik' => $_POST['site_baslik'],
		'site_aciklama' => $_POST['site_aciklama'],
		'site_sahibi' => $_POST['site_sahibi'],
		'site_title' => $_POST['site_title']
	));

	header('Location: ayarlar.php'); // yönlendirme
}

?>