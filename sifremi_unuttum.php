<?php 
include 'islemler/baglan.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_POST){

    $eposta = trim($_POST['eposta']);
    
    $varmi = $db->prepare("SELECT * FROM kullanici WHERE kul_mail=:k");
    $varmi->execute(array(
        'k' => $eposta
    ));
    if($varmi->rowCount()){ 

        $row = $varmi->fetch(PDO::FETCH_ASSOC);
        $sifirlamakodu = uniqid("taskpro_");
        $sifirlamalinki = "http://localhost/siparis_takip/sifremiunuttum/sifremi_sifirla.php?kod=" . $sifirlamakodu; 

        $sifirlamakodunuekle = $db->prepare("UPDATE kullanici SET sifirlama_kodu=:s WHERE kul_mail=:e");
        $sifirlamakodunuekle->execute(array(
            's' => $sifirlamakodu,
            'e' => $eposta
        ));





        $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPAuth = true;

        $mail->Host = 'mail adresi';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        //$mail->SMTPDebug  =  2; 
        $mail->Username = 'mail adresi';
        $mail->Password = 'şifre';

        $mail->setFrom('mail', 'isim');
        $mail->addAddress($eposta);
        $mail->CharSet = 'UTF-8';
        $mail->isHTML(true);
        $mail->Subject = "Şifre Sıfırlama";
        
        $mailicerik = "<div style='font-size:20px;'>Sayın " . $row['kul_isim'] . " Sıfırlama linkiniz : " . $sifirlamalinki . "</div>"; 

        $mail->MsgHTML($mailicerik);

        if($mail->Send()){
            echo "<script type='text/javascript'>alert('Şifre sıfırlama linkiniz belirtmiş olduğunuz mail adresine gönderilmiştir.Şifre sıfırlamak için mail adresinize gelen linke tıklayınız.');</script>";
        } else {
         echo "<script type='text/javascript'>alert('Hata Oluştu.');</script>";
     }

 } else {
    echo "<script type='text/javascript'>alert('Girilen e-posta adresi sistemde mevcut değildir.');</script>";
}
}


?>


<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Şifremi Unuttum</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    
    <link href="css_1/taskpro.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary"> 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Şifre Yenileme</h1>
                                    </div>
                                    <hr>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="email" style="font-size:1.2rem;" class="form-control form-control-user" name="eposta" 
                                            placeholder="E-mail Adresinizi Girin" required>
                                        </div>
                                        <button name="gonder" class="btn btn-primary btn-user btn-block" style="font-size:1.2rem;"  type="submit">Sıfırlama Kodu Gönder</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <h6 style="font-size:1rem;" class="h4 text-gray-90 d-none">Girilen e-posta adresi sistemde mevut değildir.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js_1/taskpro.min.js"></script>

</body>

</html>