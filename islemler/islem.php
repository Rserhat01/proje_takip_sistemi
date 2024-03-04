<?php include 'baglan.php';



error_reporting(E_ALL);
ini_set('display_errors', 1);


//session başlatma komutları

ob_start();
session_start();

//veri güncelleme

if(isset($_POST['ayar_kaydet'])){

	$ayarkaydet = $db->prepare("UPDATE ayarlar SET 
		site_baslik=:site_baslik, 
		site_aciklama=:site_aciklama,
		site_sahibi=:site_sahibi,
		site_title=:site_title
		");

	$ayarkaydet->execute(array(
		'site_baslik' => $_POST['site_baslik'],
		'site_aciklama' => $_POST['site_aciklama'],
		'site_sahibi' => $_POST['site_sahibi'],
		'site_title' => $_POST['site_title']
	));
	header('Location: ../index.php');

}

//oturum açma kodu

if(isset($_POST['oturum_ac'])){
	$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE 
		kul_mail=:mail 
		AND 
		kul_sifre=:sifre");

	$kullanicisor->execute(array(
		'mail' => $_POST['kul_mail'],
		'sifre' => $_POST['kul_sifre']
	));

	$sonuc = $kullanicisor->rowcount();

	if ($sonuc == 0) {
		echo 'Mail ya da şifreniz yanlış';
	}else{
		header("Location:../index.php");		
		$_SESSION['kul_mail'] = $_POST['kul_mail'];
	}
}



//proje ekleme komutları


if(isset($_POST['projeekle'])){
	$projeekle =$db->prepare("INSERT INTO proje SET
		proje_baslik=:baslik,
		proje_teslim_tarihi=:teslim_tarihi,
		proje_aciliyet=:aciliyet,
		proje_durum=:durum,
		proje_detay=:detay
		");

	$projeekle->execute(array(
		'baslik'=>$_POST['proje_baslik'],
		'teslim_tarihi'=>$_POST['proje_teslim_tarihi'],
		'aciliyet'=>$_POST['proje_aciliyet'],
		'durum'=>$_POST['proje_durum'],
		'detay'=>$_POST['proje_detay']
	));


	

	$formdangelendosya =$_FILES['proje_dosya']['tmp_name'];
	$yuklenecekyer = "dosyalar/1.jpg";


	if(move_uploaded_file($formdangelendosya,$yuklenecekyer)){

		echo '<script type="text/javascript">alert("Dosya başarıyla yüklendi.")</script>'; 

	}else{
		echo '<script type="text/javascript">alert("Yükleme başarısız.")</script>'; 
	}


	if($projeekle){
		header("Location:../index.php");
	}else{
		echo "başarısız";
		exit;
	}
}

// sipariş ekleme kodları

if(isset($_POST['siparisekle'])){
	$siparisekle = $db->prepare("INSERT INTO siparis SET
		musteri_isim=:musteri_isim,
		musteri_mail=:musteri_mail,
		musteri_telefon=:musteri_telefon,
		sip_baslik=:sip_baslik,
		sip_teslim_tarihi=:sip_teslim_tarihi,
		sip_aciliyet=:sip_aciliyet,
		sip_durum=:sip_durum,
		sip_detay=:sip_detay,
		sip_ucret=:sip_ucret
		");
	$siparisekle->execute(array(
		'musteri_isim'=>$_POST['musteri_isim'],
		'musteri_mail'=>$_POST['musteri_mail'],
		'musteri_telefon'=>$_POST['musteri_telefon'],
		'sip_baslik'=>$_POST['sip_baslik'],
		'sip_teslim_tarihi'=>$_POST['sip_teslim_tarihi'],
		'sip_aciliyet'=>$_POST['sip_aciliyet'],
		'sip_durum'=>$_POST['sip_durum'],
		'sip_detay'=>$_POST['sip_detay'],
		'sip_ucret'=>$_POST['sip_ucret']
	));

	

	if($siparisekle){
		header("Location:../index.php");
	}else {
		echo "başarısız: ";
		exit;
	}
}




//proje düzenleme kodları

if(isset($_POST['projeduzenle'])){
	$projeduzenle =$db->prepare("UPDATE proje SET
		proje_baslik=:baslik,
		proje_teslim_tarihi=:teslim_tarihi,
		proje_aciliyet=:aciliyet,
		proje_durum=:durum,
		proje_detay=:detay WHERE proje_id=:proje_id
		");

	$projeduzenle->execute(array(
		'baslik'=>$_POST['proje_baslik'],
		'teslim_tarihi'=>$_POST['proje_teslim_tarihi'],
		'aciliyet'=>$_POST['proje_aciliyet'],
		'durum'=>$_POST['proje_durum'],
		'detay'=>$_POST['proje_detay'],
		'proje_id'=>$_POST['proje_id']
	));

	if($projeduzenle){
		header("Location:../index.php");
	}else{
		echo "başarısız";
		exit;
	}


}


//siparis düzenleme kodları

if(isset($_POST['sip_duzenle'])){
	$siparisduzenle = $db->prepare("UPDATE siparis SET
		musteri_isim=:musteri_isim,
		musteri_mail=:musteri_mail,
		musteri_telefon=:musteri_telefon,
		sip_baslik=:sip_baslik,
		sip_teslim_tarihi=:sip_teslim_tarihi,
		sip_aciliyet=:sip_aciliyet,
		sip_durum=:sip_durum,
		sip_detay=:sip_detay,
		sip_ucret=:sip_ucret WHERE sip_id=:sip_id
		");
	$siparisduzenle->execute(array(
		'musteri_isim'=>$_POST['musteri_isim'],
		'musteri_mail'=>$_POST['musteri_mail'],
		'musteri_telefon'=>$_POST['musteri_telefon'],
		'sip_baslik'=>$_POST['sip_baslik'],
		'sip_teslim_tarihi'=>$_POST['sip_teslim_tarihi'],
		'sip_aciliyet'=>$_POST['sip_aciliyet'],
		'sip_durum'=>$_POST['sip_durum'],
		'sip_detay'=>$_POST['sip_detay'],
		'sip_ucret'=>$_POST['sip_ucret'],
		'sip_id'=>$_POST['sip_id']
	));


	if($siparisduzenle){
		header("Location:../index.php");
	}else{
		echo "başarısız";
		exit;
	}


}



//Proje silme

if(isset($_POST['projesilme'])){
	$sil = $db->prepare("DELETE FROM proje WHERE proje_id=:proje_id");
	$kontrol=$sil->execute(array(
		'proje_id' => $_POST['proje_id'] 
	));
	if($kontrol){
		header("Location:../index.php");
	}else{
		echo "başarısız";
		exit;
	}
}


// siparis silme

if(isset($_POST['siparissilme'])){
	$sil = $db->prepare("DELETE FROM siparis WHERE sip_id=:sip_id");
	$kontrol=$sil->execute(array(
		'sip_id' => $_POST['sip_id'] 
	));
	if($kontrol){
		header("Location:../index.php");
	}else{
		echo "başarısız";
		exit;
	}
}

























?>