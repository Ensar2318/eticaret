<?php
ob_start();
session_start();
require_once 'baglan.php';
require_once '../production/function.php';


// Admin Giriş İşlemi
if (isset($_POST["admingiris"])) {

    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_password = md5($_POST['kullanici_password']);

    $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
    $kullanicisor->execute([
        'mail' => $kullanici_mail,
        'password' => $kullanici_password,
        'yetki' => 5
    ]);

    $say = $kullanicisor->rowCount();
    if ($say) {
        $_SESSION['kullanici_mail'] = $kullanici_mail;
        header("location:../production/index.php");
        exit;
    } else {
        header("location:../production/login.php?durum=no");
        exit;
    }
}

// Kullancı Giriş İşlemi basit kullanıcı yetkisi 1 olan
if (isset($_POST["kullanicigiris"])) {

    $kullanici_mail = $_POST['kullanici_mail'];
    $kullanici_password = md5($_POST['kullanici_password']);

    $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki and kullanici_durum=:durum");
    $kullanicisor->execute([
        'mail' => $kullanici_mail,
        'password' => $kullanici_password,
        'yetki' => 1,
        'durum' => 1
    ]);

    $say = $kullanicisor->rowCount();
    if ($say) {
        $_SESSION['userkullanici_mail'] = $kullanici_mail;
        header("location:../../");
        exit;
    } else {
        header("location:../../index.php?durum=no");
        exit;
    }
}

if (isset($_POST["userkullaniciguncelle"])) {
    $id = $_POST["kullanici_id"];
    $kullanicikaydet = $db->prepare("UPDATE kullanici SET

    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_gsm=:kullanici_gsm,
    kullanici_unvan=:kullanici_unvan,
    kullanici_tc=:kullanici_tc,
    kullanici_adres=:kullanici_adres,
    kullanici_il=:kullanici_il,
    kullanici_ilce=:kullanici_ilce

    where kullanici_id=$id");

    $update = $kullanicikaydet->execute([
        'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_gsm' => $_POST['kullanici_gsm'],
        'kullanici_unvan' => $_POST['kullanici_unvan'],
        'kullanici_tc' => $_POST['kullanici_tc'],
        'kullanici_adres' => $_POST['kullanici_adres'],
        'kullanici_il' => $_POST['kullanici_il'],
        'kullanici_ilce' => $_POST['kullanici_ilce']
    ]);



    if ($update) {
        header("location:../../hesabim.php?durum=ok");
        exit;
    } else {
        header("location:../../hesabim.php?durum=no");
        exit;
    }
}

//kullanıcı kaydetme islemleri
if (isset($_POST["kullanicikaydet"])) {


    $kullanici_adsoyad = htmlspecialchars($_POST['kullanici_adsoyad']);
    $kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);

    $kullanici_passwordone = htmlspecialchars($_POST['kullanici_passwordone']);
    $kullanici_passwordtwo = htmlspecialchars($_POST['kullanici_passwordtwo']);

    if ($kullanici_passwordone == $kullanici_passwordtwo) {
        if (strlen($kullanici_passwordone) >= 6) {

            $kullanicisor = $db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
            $kullanicisor->execute([
                'mail' => $kullanici_mail
            ]);
            $say = $kullanicisor->rowCount();
            if (!$say) {
                $password = md5($kullanici_passwordone);
                $kullanici_yetki = 1;

                //kullanici kayıt işlemi yapılıyor...
                $kullanicikaydet = $db->prepare("INSERT INTO kullanici SET 
                
                kullanici_adsoyad=:kullanici_adsoyad,
                kullanici_mail=:kullanici_mail,
                kullanici_password=:kullanici_password,
                kullanici_yetki=:kullanici_yetki
                ");
                $update = $kullanicikaydet->execute([
                    'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
                    'kullanici_mail' => $_POST['kullanici_mail'],
                    'kullanici_password' => $password,
                    'kullanici_yetki' => $kullanici_yetki
                ]);

                if ($update) {
                    $_SESSION['userkullanici_mail'] = $kullanici_mail;
                    header("location:../../index.php?durum=girisbasarili");
                    exit;
                } else {
                    header("location:../../register.php?durum=hata");
                    exit;
                }
            } else {
                header("location:../../register.php?durum=kullanicivar");
                exit;
            }
        } else {
            header("location:../../register.php?durum=eksiksifre");
            exit;
        }
    } else {
        header("location:../../register.php?durum=farklisifre");
        exit;
    }
}

//kullanıcı cüzenleme islemleri
if (isset($_POST["kullaniciduzenle"])) {


    $k_id = $_POST['kullanici_id'];

    $kullanicikaydet = $db->prepare("UPDATE kullanici SET

    kullanici_tc=:kullanici_tc,
    kullanici_adsoyad=:kullanici_adsoyad,
    kullanici_durum=:kullanici_durum
    where kullanici_id=$k_id");

    $update = $kullanicikaydet->execute([
        'kullanici_tc' => $_POST['kullanici_tc'],
        'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
        'kullanici_durum' => $_POST['kullanici_durum']
    ]);



    if ($update) {
        header("location:../production/kullanici-duzenle.php?durum=ok&kullanici_id=" . $_POST['kullanici_id']);
        exit;
    } else {
        header("location:../production/kullanici-duzenle.php?durum=no&kullanici_id=" . $_POST['kullanici_id']);
        exit;
    }
}

//kullanıcı silme işlemi
if (isset($_GET["kullanicisil"])) {

    $kullanicisil = $db->prepare("DELETE FROM kullanici WHERE kullanici_id=:kullanici_id");

    $durum = $kullanicisil->execute([
        'kullanici_id' => $_GET['kullanici_id']
    ]);

    if ($durum) {
        header('location:../production/kullanici.php?durum=ok');
        exit;
    } else {
        header('location:../production/kullanici.php?durum=no');
        exit;
    }
}

// Slider kaydetme işlemi ekleme
if (isset($_POST["sliderkaydet"])) {

    $uploads_dir = '../../dimg/slider';

    @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
    @$name = $_FILES['slider_resimyol']["name"];

    $benzersizsayi4 = rand(20000, 32000);
    $resimyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");


    $sliderkaydet = $db->prepare("INSERT INTO slider SET
    
    slider_ad=:slider_ad,
    slider_resimyol=:slider_resimyol,
    slider_sira=:slider_sira,
    slider_link=:slider_link,
    slider_durum=:slider_durum,
    slider_fiyat=:slider_fiyat");

    $update = $sliderkaydet->execute([
        'slider_ad' => $_POST['slider_ad'],
        'slider_resimyol' => $resimyol,
        'slider_sira' => $_POST['slider_sira'],
        'slider_link' => $_POST['slider_link'],
        'slider_durum' => $_POST['slider_durum'],
        'slider_fiyat' => $_POST['slider_fiyat']
    ]);

    if ($update) {
        header("location:../production/slider.php?durum=ok");
        exit;
    } else {
        header("location:../production/slider.php?durum=no");
        exit;
    }
}

//slider silme işlemi
if (isset($_GET["slidersil"])) {

    $slidersil = $db->prepare("DELETE FROM slider WHERE slider_id=:slider_id");

    $durum = $slidersil->execute([
        'slider_id' => $_GET['slider_id']
    ]);

    if ($durum) {
        $resimsilunlink = $_GET['slider_resimyol'];
        unlink("../../$resimsilunlink");
        header('location:../production/slider.php?durum=ok');
        exit;
    } else {
        header('location:../production/slider.php?durum=no');
        exit;
    }
}

//slider Düzenleme islemleri
if (isset($_POST["sliderduzenle"])) {

    if (!empty($_FILES['slider_resimyol']["name"])) {
        $uploads_dir = '../../dimg/slider';

        @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
        @$name = $_FILES['slider_resimyol']["name"];

        $benzersizsayi4 = rand(20000, 32000);
        $resimyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . $name;

        @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
    } else {
        $resimyol = $_POST['slider_resimyol'];
    }

    $k_id = $_POST['slider_id'];

    $sliderkaydet = $db->prepare("UPDATE slider SET
    
    slider_ad=:slider_ad,
    slider_resimyol=:slider_resimyol,
    slider_sira=:slider_sira,
    slider_link=:slider_link,
    slider_durum=:slider_durum,
    slider_fiyat=:slider_fiyat
    where slider_id=$k_id");

    $update = $sliderkaydet->execute([
        'slider_ad' => $_POST['slider_ad'],
        'slider_resimyol' => "$resimyol",
        'slider_sira' => $_POST['slider_sira'],
        'slider_link' => $_POST['slider_link'],
        'slider_durum' => $_POST['slider_durum'],
        'slider_fiyat' => $_POST['slider_fiyat']
    ]);


    if ($update) {
        if (!empty($_FILES['slider_resimyol']["name"])) {
            $resimsilunlink = $_POST['slider_resimyol'];
            unlink("../../$resimsilunlink");
        }
        header("location:../production/slider-duzenle.php?durum=ok&slider_id=" . $_POST['slider_id']);
        exit;
    } else {
        header("location:../production/slider-duzenle.php?durum=no&slider_id=" . $_POST['slider_id']);
        exit;
    }
}


//Menu cüzenleme islemleri
if (isset($_POST["menuduzenle"])) {


    $k_id = $_POST['menu_id'];

    $seourl = seo($_POST['menu_ad']);

    $menukaydet = $db->prepare("UPDATE menu SET
    
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_seourl=:menu_seourl,
    menu_sira=:menu_sira,
    menu_durum=:menu_durum
    where menu_id=$k_id");

    $update = $menukaydet->execute([
        'menu_ad' => $_POST['menu_ad'],
        'menu_detay' => $_POST['menu_detay'],
        'menu_url' => $_POST['menu_url'],
        'menu_seourl' => $seourl,
        'menu_sira' => $_POST['menu_sira'],
        'menu_durum' => $_POST['menu_durum']
    ]);



    if ($update) {
        header("location:../production/menu-duzenle.php?durum=ok&menu_id=" . $_POST['menu_id']);
        exit;
    } else {
        header("location:../production/menu-duzenle.php?durum=no&menu_id=" . $_POST['menu_id']);
        exit;
    }
}

if (isset($_POST["menukaydet"])) {


    $k_id = $_POST['menu_id'];

    $seourl = seo($_POST['menu_ad']);

    $menukaydet = $db->prepare("INSERT INTO menu SET
    
    menu_ad=:menu_ad,
    menu_detay=:menu_detay,
    menu_url=:menu_url,
    menu_seourl=:menu_seourl,
    menu_sira=:menu_sira,
    menu_durum=:menu_durum");

    $update = $menukaydet->execute([
        'menu_ad' => $_POST['menu_ad'],
        'menu_detay' => $_POST['menu_detay'],
        'menu_url' => $_POST['menu_url'],
        'menu_seourl' => $seourl,
        'menu_sira' => $_POST['menu_sira'],
        'menu_durum' => $_POST['menu_durum']
    ]);



    if ($update) {
        header("location:../production/menu.php?durum=ok");
        exit;
    } else {
        header("location:../production/menu.php?durum=no");
        exit;
    }
}


//kullanıcı silme işlemi
if (isset($_GET["menusil"])) {

    $menusil = $db->prepare("DELETE FROM menu WHERE menu_id=:menu_id");

    $durum = $menusil->execute([
        'menu_id' => $_GET['menu_id']
    ]);

    if ($durum) {
        header('location:../production/menu.php?durum=ok');
        exit;
    } else {
        header('location:../production/menu.php?durum=no');
        exit;
    }
}


// Genel ayarlar
if (isset($_POST["genelayarkaydet"])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET

    ayar_title=:ayar_title,
    ayar_description=:ayar_description,
    ayar_keywords=:ayar_keywords,
    ayar_author=:ayar_author
    WHERE ayar_id=0");

    $update = $ayarkaydet->execute([
        'ayar_title' => $_POST['ayar_title'],
        'ayar_description' => $_POST['ayar_description'],
        'ayar_keywords' => $_POST['ayar_keywords'],
        'ayar_author' => $_POST['ayar_author']
    ]);

    if ($update) {
        header('location:../production/genel-ayar.php?durum=ok');
        exit;
    } else {
        header('location:../production/genel-ayar.php?durum=no');
        exit;
    }
}

if (isset($_POST["logoduzenle"])) {

    $uploads_dir = '../../dimg';

    @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
    @$name = $_FILES['ayar_logo']["name"];

    $benzersizsayi4 = rand(20000, 32000);
    $resimyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

    $logokaydet = $db->prepare("UPDATE ayar SET
    ayar_logo=:ayar_logo
    WHERE ayar_id=0");

    $update = $logokaydet->execute([
        'ayar_logo' => $resimyol
    ]);

    if ($update) {
        $resimsilunlink = $_POST['eski_logo'];
        unlink("../../$resimsilunlink");
        header('location:../production/genel-ayar.php?durum=ok');
        exit;
    } else {
        header('location:../production/genel-ayar.php?durum=no');
        exit;
    }
}

// İletişim Ayarları
if (isset($_POST["iletisimayarkaydet"])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET
    
        ayar_tel=:ayar_tel,
        ayar_gsm=:ayar_gsm,
        ayar_faks=:ayar_faks,
        ayar_mail=:ayar_mail,
        ayar_ilce=:ayar_ilce,
        ayar_il=:ayar_il,
        ayar_adress=:ayar_adress,
        ayar_mesai=:ayar_mesai
        WHERE ayar_id=0");

    $update = $ayarkaydet->execute([
        'ayar_tel' => $_POST['ayar_tel'],
        'ayar_gsm' => $_POST['ayar_gsm'],
        'ayar_faks' => $_POST['ayar_faks'],
        'ayar_mail' => $_POST['ayar_mail'],
        'ayar_ilce' => $_POST['ayar_ilce'],
        'ayar_il' => $_POST['ayar_il'],
        'ayar_adress' => $_POST['ayar_adress'],
        'ayar_mesai' => $_POST['ayar_mesai']
    ]);

    if ($update) {
        header('location:../production/iletisim-ayar.php?durum=ok');
        exit;
    } else {
        header('location:../production/iletisim-ayar.php?durum=no');
        exit;
    }
}

// Api ayarları
if (isset($_POST["apiayarkaydet"])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET

    ayar_analystic=:ayar_analystic,
    ayar_maps=:ayar_maps,
    ayar_zopim=:ayar_zopim
    WHERE ayar_id=0");

    $update = $ayarkaydet->execute([
        'ayar_analystic' => $_POST['ayar_analystic'],
        'ayar_maps' => $_POST['ayar_maps'],
        'ayar_zopim' => $_POST['ayar_zopim']
    ]);

    if ($update) {
        header('location:../production/api-ayar.php?durum=ok');
        exit;
    } else {
        header('location:../production/api-ayar.php?durum=no');
        exit;
    }
}

// Sosyal medya Ayarları
if (isset($_POST["sosyalayarkaydet"])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET

    ayar_facebook=:ayar_facebook,
    ayar_twitter=:ayar_twitter,
    ayar_google=:ayar_google,
    ayar_youtube=:ayar_youtube
    WHERE ayar_id=0");

    $update = $ayarkaydet->execute([
        'ayar_facebook' => $_POST['ayar_facebook'],
        'ayar_twitter' => $_POST['ayar_twitter'],
        'ayar_google' => $_POST['ayar_google'],
        'ayar_youtube' => $_POST['ayar_youtube']
    ]);

    if ($update) {
        header('location:../production/sosyal-ayar.php?durum=ok');
        exit;
    } else {
        header('location:../production/sosyal-ayar.php?durum=no');
        exit;
    }
}

// Mail Ayarları
if (isset($_POST["mailayarkaydet"])) {

    $ayarkaydet = $db->prepare("UPDATE ayar SET

    ayar_smtphost=:ayar_smtphost,
    ayar_smtpuser=:ayar_smtpuser,
    ayar_smtppassword=:ayar_smtppassword,
    ayar_smtpport=:ayar_smtpport
    WHERE ayar_id=0");

    $update = $ayarkaydet->execute([
        'ayar_smtphost' => $_POST['ayar_smtphost'],
        'ayar_smtpuser' => $_POST['ayar_smtpuser'],
        'ayar_smtppassword' => $_POST['ayar_smtppassword'],
        'ayar_smtpport' => $_POST['ayar_smtpport']
    ]);

    if ($update) {
        header('location:../production/mail-ayar.php?durum=ok');
        exit;
    } else {
        header('location:../production/mail-ayar.php?durum=no');
        exit;
    }
}

// Hakkımızda ayarlar
if (isset($_POST["hakkimizdakaydet"])) {

    $ayarkaydet = $db->prepare("UPDATE hakkimizda SET

    hakkimizda_baslik=:hakkimizda_baslik,
    hakkimizda_icerik=:hakkimizda_icerik,
    hakkimizda_video=:hakkimizda_video,
    hakkimizda_vizyon=:hakkimizda_vizyon,
    hakkimizda_misyon=:hakkimizda_misyon
    WHERE hakkimizda_id=0");

    $update = $ayarkaydet->execute([
        'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
        'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
        'hakkimizda_video' => $_POST['hakkimizda_video'],
        'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
        'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
    ]);

    if ($update) {
        header('location:../production/hakkimizda.php?durum=ok');
        exit;
    } else {
        header('location:../production/hakkimizda.php?durum=no');
        exit;
    }
}
