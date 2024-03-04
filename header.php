
<?php  

include 'islemler/baglan.php';

ob_start();
session_start();

$ayarsor = $db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC); 



if (empty($_SESSION['kul_mail'])) {
    header("Location:login.php");
    exit;
}else{
    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE 
        kul_mail=:mail");

    $kullanicisor->execute(array(
        'mail' => $_SESSION['kul_mail']
    ));

    $sonuc = $kullanicisor->rowcount();

    if ($sonuc == 0) {
        header("Location:login.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="taskpro-logos/svg/logo-color.svg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?php echo $ayarcek['site_title']; ?></title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> -->
    <link href="css_1/taskpro.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon ml-4">
                    <i class="fa-solid fa-list-check"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TaskFlow <sup>Pro</sup></div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Anasayfa</span></a>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    Bölümler
                </div>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Projeler</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Proje İşlemleri :</h6>
                        <a class="collapse-item" href="projeler.php">Projeler</a>
                        <a class="collapse-item" href="projeekle.php">Proje Ekle</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Siparişler</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sipariş İşlemleri :</h6>
                <a class="collapse-item" href="siparisler.php">Siparişler</a>
                <a class="collapse-item" href="siparisekle.php">Sipariş Ekle</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link" href="ayarlar.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Ayarlar</span></a>
        </li>


        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>



                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $ayarcek['site_sahibi']; ?></span>
                        <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="ayarlar.php">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Ayarlar
                    </a>
                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="islemler/cikis.php">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Çıkış
                    </a>
                </div>
            </li>

        </ul>

    </nav>
