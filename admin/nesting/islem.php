<?php
ob_start();
session_start();
require_once 'baglan.php';


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

//kullanıcı cüzenleme islemleri
if (isset($_POST["kullaniciduzenle"])) {


    $k_id = $_POST['kullanici_id'];
    echo print_r($_POST);

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
