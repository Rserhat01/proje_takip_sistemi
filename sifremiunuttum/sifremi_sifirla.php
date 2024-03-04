<?php 
include '../islemler/baglan.php';


$kod = trim($_GET['kod']);

if(!$kod){
    echo "<script type='text/javascript'>alert('Sıfırlama kodu hatalı');</script>";
}else{
    if($_POST){

        $eposta = trim($_POST['kul_mail']);
        $sifre = trim($_POST['kul_sifre']);
        $sifre2 = trim($_POST['kul_sifre2']);

        if(!$eposta || !$sifre || !$sifre2){
            echo "<script type='text/javascript'>alert('Boş alan bırakmayınız');</script>";
        }else{

            if($sifre != $sifre2){
                echo "<script type='text/javascript'>alert('Şifreler aynı olmalı!');</script>";
            }else{

                $varmi = $db->prepare("SELECT * FROM kullanici WHERE sifirlama_kodu=:k AND kul_mail=:m");
                $varmi->execute(array(
                    'k' => $kod,
                    'm' => $eposta
                ));

                if($varmi->rowCount()){

                    $sifreguncelle = $db->prepare("UPDATE kullanici SET sifirlama_kodu=:sifirla, kul_sifre=:sifre WHERE sifirlama_kodu=:skodu AND kul_mail=:mail");
                    $sifreguncelle->execute(array(
                        'sifirla' => "",
                        'sifre' => $sifre,
                        'skodu' => $kod,
                        'mail' =>$eposta  
                    ));

                    if($sifreguncelle){
                        echo "<script type='text/javascript'>alert('Şifreniz başarıyla güncellendi.');</script>";
                    }else{
                        echo "<script type='text/javascript'>alert('Hata oluştu.');</script>";
                    }
                }else{
                    echo "<script type='text/javascript'>alert('Girilen bilgilerle eşleşen kayıt bulunamadı.');</script>";

                }

            }

        }
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

    <title>Şifre Sıfırlama</title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    
    <link href="../css_1/taskpro.min.css" rel="stylesheet">

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
                                        <h1 class="h4 text-gray-900 mb-4">Şifre Sıfırlama</h1>
                                    </div>
                                    <hr>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="email" style="font-size:1.2rem;" class="form-control form-control-user" name="kul_mail" 
                                            placeholder="E-mail Adresinizi Girin" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" style="font-size:1.2rem;" class="form-control form-control-user"
                                             name="kul_sifre" placeholder="Şifre Giriniz">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" style="font-size:1.2rem;" class="form-control form-control-user"
                                            id="exampleInputPassword" name="kul_sifre2" placeholder="Şifre Tekrar Giriniz">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" style="font-size:1.2rem;"  type="submit">Şifremi Sıfırla</button>
                                    </form>
                                    <hr>
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