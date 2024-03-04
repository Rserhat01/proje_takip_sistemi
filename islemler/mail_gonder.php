<?php  

error_reporting(E_ALL);
ini_set('display_errors', 1);

$name = $_POST['musteri_isim'];
$email = $_POST['musteri_mail'];
$subject = $_POST['konu'];
$message = $_POST['mesaj'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'host name';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

//$mail->SMTPDebug  =  2; 
$mail->Username = 'mail adresi';
$mail->Password = 'sifre';

$mail->setFrom('mail adresi', '');
$mail->addAddress($email, $name);
$mail->CharSet = 'UTF-8';

$mail->Subject = $subject;
$mail->Body = $message;
// $mail->Send(); // açık olursa 2 kere gönderir

if($mail->Send()){ 
	header("Location:../index.php");
	echo '<script type="text/javascript">alert("İşlem Başarılı...")</script>';
}else{
	echo '<script type="text/javascript">alert("İşlem Başarısız...")</script>'; 
	header("Location:../siparisler.php");
}



?>