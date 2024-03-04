<?php 
include 'islemler/baglan.php';

$ayarsor = $db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC); 

?>


<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Giriş</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Hoşgeldin Patron</h1>
                                    </div>
                                    <hr>
                                    <form class="user" action="islemler/islem.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" style="font-size:1.2rem;" class="form-control form-control-user"
                                            id="exampleInputEmail" name="kul_mail" aria-describedby="emailHelp"
                                            placeholder="E-mail Adresinizi Girin">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" style="font-size:1.2rem;" class="form-control form-control-user"
                                            id="exampleInputPassword" name="kul_sifre" placeholder="Şifre Giriniz">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block" style="font-size:1.2rem;"  type="submit" name="oturum_ac">Oturum Aç</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a href="sifremi_unuttum.php"><h6 style="font-size:1.2rem;" class="h4 text-gray-90">Şifremi Unuttum</h6></a>
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