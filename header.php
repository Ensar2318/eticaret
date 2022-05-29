<?php
ob_start();
session_start();
require_once 'admin/nesting/baglan.php';
require_once 'admin/production/function.php';

// Sitenin ayarlarını çeken sql 
$ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute([
    'id' => 0
]);
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

// Hakkımızda admin panelinin bilgilerini çeken Sql
$hakkimizdasor = $db->prepare("SELECT * FROM hakkimizda where hakkimizda_id=:id");
$hakkimizdasor->execute([
    'id' => 0
]);
$hakkimizdacek = $hakkimizdasor->fetch(PDO::FETCH_ASSOC);
// Hakkımızda admin panelinin bilgilerini çeken Sql

//kullanici çeken sql
$kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
if (isset($_SESSION['userkullanici_mail'])) {
    $kullanicisor->execute([
        'mail' => $_SESSION['userkullanici_mail']
    ]);
}
$say = $kullanicisor->rowCount();
$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

//Sepet çeken sql
$sepetsor = $db->prepare("SELECT * FROM sepet where kullanici_id=:kullanici_id");
if (isset($_SESSION['userkullanici_mail'])) {
    $sepetsor->execute([
        'kullanici_id' => $kullanicicek['kullanici_id']
    ]);
}
$sepetsay = $sepetsor->rowCount();
$sepetcek = $sepetsor->fetchAll(PDO::FETCH_ASSOC);
//Fiyat Hesaplama
$fiyat = 0;
if ($sepetsay) {
    foreach ($sepetcek as $key => $value) {
        $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id");
        $urunsor->execute([
            "urun_id" => $value['urun_id']
        ]);
        $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
        $fiyat += ($uruncek['urun_fiyat'] * $value['urun_adet']);
    }
    $vergi = $fiyat * 0.175;
    $vergisizfiyat = $fiyat - $vergi;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $ayarcek['ayar_title'] ?></title>
    <meta name="description" content="<?php echo $ayarcek['ayar_description'] ?>">
    <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords'] ?>">
    <meta name="author" content="<?php echo $ayarcek['ayar_author'] ?>">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
    <!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

    <!-- Main Style -->
    <link rel="stylesheet" href="style.css">

    <!-- owl Style -->
    <link rel="stylesheet" href="css\owl.carousel.css">
    <link rel="stylesheet" href="css\owl.transitions.css">
    <!-- fancy Style -->
    <link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="wrapper">
        <div class="header">
            <!--Header -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-md-4 main-logo">
                        <a style="max-height: 55px; display: block; overflow: hidden;" href="index.php"><img width="20%" src="<?php echo $ayarcek['ayar_logo'] ?>" alt="logo" class="logo img-responsive"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="pushright">
                            <div class="top">
                                <?php if (!isset($_SESSION['userkullanici_mail'])) { ?>
                                    <a href="#" id="reg" class="btn btn-default btn-dark">Giriş Yap<span>-- Yada
                                            --</span>Kayıt Ol</a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-default btn-dark">Hoşgeldiniz <?php echo $kullanicicek['kullanici_adsoyad'] ?></a>
                                <?php } ?>
                                <div class="regwrap">
                                    <div class="row">
                                        <div class="col-md-6 regform">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">Giriş Yap</div>
                                            </div>

                                            <form action="admin/nesting/islem.php" method="POST" role="form">
                                                <div class="form-group">
                                                    <input name="kullanici_mail" type="text" class="form-control" id="username" placeholder="Kullanıcı adı">
                                                </div>
                                                <div class="form-group">
                                                    <input name="kullanici_password" type="password" class="form-control" id="password" placeholder="Şifre">
                                                </div>
                                                <div class="form-group">
                                                    <button name="kullanicigiris" class="btn btn-default btn-red btn-sm">Giriş Yap</button>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="title-widget-bg">
                                                <div class="title-widget">Kayıt Ol</div>
                                            </div>
                                            <p>
                                                Yeni kullanıcı mısın? Alışverişe başlmak için lütfen kayıt olunuz.
                                            </p>
                                            <a href="register.php" class="btn btn-default btn-yellow">Şimdi Kayıt Ol</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="srch-wrap">
                                    <a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
                                </div>
                                <div class="srchwrap">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label for="search" class="col-sm-2 control-label">Search</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="search">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashed"></div>
        </div>
        <!--Header -->
        <div class="main-nav">
            <!--end main-nav -->
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    <li><a href="index.php" class="active">Home</a>
                                        <div class="curve"></div>
                                    </li>
                                    <?php $menusor = $db->prepare("SELECT * FROM menu WHERE menu_durum=:durum ORDER BY menu_sira ASC limit 5");
                                    $menusor->execute(
                                        ["durum" => 1]
                                    );
                                    ?>
                                    <?php while ($menucek = $menusor->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <li>
                                            <a href=" <?php echo !empty($menucek['menu_url']) ? $menucek['menu_url'] : "sayfa-" . seo($menucek['menu_ad']) ?>">
                                                <?php echo $menucek['menu_ad'] ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 machart">
                            <button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Alışveriş Sepeti</span>|<span class="allprice">$ <?php echo number_format((float)$fiyat, 2, ".", "") ?></span></button>
                            <div class="popcart">
                                <table class="table table-condensed popcart-inner">
                                    <tbody>
                                        <?php if ($sepetsay) { ?>
                                            <?php foreach ($sepetcek as $key => $value) {
                                                $urunsor = $db->prepare("SELECT * FROM urun WHERE urun_id=:urun_id");
                                                $urunsor->execute([
                                                    "urun_id" => $value['urun_id']
                                                ]);
                                                $uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
                                            ?>
                                                <tr>
                                                    <td>
                                                        <a href="<?php echo "urun-".$uruncek['urun_seourl']."-".$uruncek['urun_id'] ?>"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
                                                    </td>
                                                    <td><a href="<?php echo "urun-".$uruncek['urun_seourl']."-".$uruncek['urun_id'] ?>"><?php echo $uruncek['urun_ad'] ?></a><br><span>Ürün Kodu : <?php echo $uruncek['urun_id'] ?></span>
                                                    </td>
                                                    <td><?php echo $value['urun_adet'] . " Adet" ?></td>
                                                    <td>$ <?php echo number_format((float)$uruncek['urun_fiyat'], 2, ".", "") ?></td>
                                                    <td><a href="admin/nesting/islem.php?sepet_sil=ok&sepet_id=<?php echo $value['sepet_id']."&url=$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><i class="fa fa-times-circle fa-2x"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <h4 style="color: gray;">Sepetinizde hiç ürün yoktur.</h4>
                                        <?php } ?>


                                    </tbody>
                                </table>
                                <?php if ($sepetsay) { ?>
                                    <span class="sub-tot">Ara-Toplam : <span><?php echo number_format((float)$vergisizfiyat, 2, ".", "") ?></span> | <span>Vergi (17.5%)</span> :
                                        $ <?php echo number_format((float)$vergi, 2, ".", "") ?> </span>
                                    <br>
                                    <div class="btn-popcart">
                                        <a href="odeme.php" class="btn btn-default btn-red btn-sm">Ödeme Sayfası</a>
                                        <a href="sepet.php" class="btn btn-default btn-red btn-sm">Sepeti Görüntüle</a>
                                    </div>
                                    <div class="popcart-tot">
                                        <p>
                                            Toplam Tutar<br>
                                            <span>$<?php echo number_format((float)$fiyat, 2, ".", "") ?></span>
                                        </p>
                                    </div>
                                <?php } ?>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['userkullanici_mail'])) { ?>
                        <ul class="small-menu">
                            <!--small-nav -->
                            <li><a href="hesabim.php" class="myacc">Hesap Bilgilerim</a></li>
                            <li><a href="siparislerim.php" class="myshop">Siparişlerim</a></li>
                            <li><a href="logout.php" class="mycheck">Güvenli Çıkış</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!--end main-nav -->