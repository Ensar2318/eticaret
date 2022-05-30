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

//yorum silme işlemi
if (isset($_GET["sepet_sil"])) {

    $gelenUrl = explode("?", $_GET['url']);
    $sepeturun_sil = $db->prepare("DELETE FROM sepet WHERE sepet_id=:sepet_id");

    $durum = $sepeturun_sil->execute([
        'sepet_id' => $_GET['sepet_id']
    ]);

    if ($durum) {
        header('location: http://' . $gelenUrl[0]);
        exit;
    } else {
        header('location:' . $gelenUrl[0]);
        exit;
    }
}

// Sepete Ürün Adeti Güncelleme kodları
if (isset($_POST['sepetAdetGuncelle'])) {


    $urunAdet = $_POST['urun_adet'];
    if ($urunAdet == 0) {
        $urunAdet = 1;
    }

    $sepetKaydet = $db->prepare("UPDATE sepet SET
    urun_adet=:urun_adet
    WHERE sepet_id={$_POST['sepet_id']}");

    $update = $sepetKaydet->execute([
        'urun_adet' => $urunAdet
    ]);

    if ($update) {
        header("location:../../sepet.php?durum=ok");
        exit;
    } else {
        header("location:../../sepet.php?durum=no");
        exit;
    }
}

// Sepete Ürün ekleme kodları
if (isset($_POST['sepeteekle'])) {

    $urunid = $_POST['urun_id'];
    $seourl = $_POST['urun_seourl'];

    $sepetkaydet = $db->prepare("INSERT INTO sepet SET 
    kullanici_id=:kullanici_id,
    urun_id=:urun_id,
    urun_adet=:urun_adet
   ");

    $update = $sepetkaydet->execute([
        'kullanici_id' => $_POST['kullanici_id'],
        'urun_id' => $_POST['urun_id'],
        'urun_adet' => $_POST['urun_adet']
    ]);


    if ($update) {
        header("location:../../urun-$seourl-$urunid?yorum-durum=ok");
        exit;
    } else {
        header("location:../../urun-$seourl-$urunid?yorum-durum=no");
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

// Ürün kaydetme işlemi işlemleri
if (isset($_POST["urunkaydet"])) {

    $uploads_dir = '../../dimg/urun';

    @$tmp_name = $_FILES['urun_photo']["tmp_name"];
    @$name = $_FILES['urun_photo']["name"];

    $benzersizsayi4 = rand(20000, 32000);
    $resimyol = substr($uploads_dir, 6) . "/" . $benzersizsayi4 . $name;

    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

    $seourl = seo($_POST['urun_ad']);
    $id = $_POST['urun_id'];

    $urunkaydet = $db->prepare("INSERT INTO urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_seourl=:urun_seourl,
    urun_photo=:urun_photo,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_video=:urun_video,
    urun_keyword=:urun_keyword,
    urun_stok=:urun_stok,
    urun_durum=:urun_durum,
    urun_onecikar=:urun_onecikar");

    $update = $urunkaydet->execute([
        'kategori_id' => $_POST['kategori_id'],
        'urun_ad' => $_POST['urun_ad'],
        'urun_seourl' => $seourl,
        'urun_photo' => $resimyol,
        'urun_detay' => $_POST['urun_detay'],
        'urun_fiyat' => $_POST['urun_fiyat'],
        'urun_video' => $_POST['urun_video'],
        'urun_keyword' => $_POST['urun_keyword'],
        'urun_stok' => $_POST['urun_stok'],
        'urun_durum' => $_POST['urun_durum'],
        'urun_onecikar' => $_POST['urun_onecikar']
    ]);



    if ($update) {
        header("location:../production/urun.php?durum=ok");
        exit;
    } else {
        header("location:../production/urun.php?durum=no");
        exit;
    }
}

//yorum Düzenleme islemleri
if (isset($_POST["yorumduzenle"])) {

    $yorumkaydet = $db->prepare("UPDATE yorumlar SET

    yorum_detay=:yorum_detay,
    yorum_durum=:yorum_durum
    where yorum_id={$_POST['yorum_id']}");

    $update = $yorumkaydet->execute([
        'yorum_detay' => $_POST['yorum_detay'],
        'yorum_durum' => $_POST['yorum_durum']
    ]);



    if ($update) {
        header("location:../production/yorumlar-duzenle.php?durum=ok&yorum_id=" . $_POST['yorum_id']);
        exit;
    } else {
        header("location:../production/yorumlar-duzenle.php?durum=no&yorum_id=" . $_POST['yorum_id']);
        exit;
    }
}



//ürün silme işlemi
if (isset($_GET["yorumsil"])) {

    $yorumsil = $db->prepare("DELETE FROM yorumlar WHERE yorum_id=:yorum_id");

    $durum = $yorumsil->execute([
        'yorum_id' => $_GET['yorum_id']
    ]);

    if ($durum) {
        header('location:../production/yorumlar.php?durum=ok');
        exit;
    } else {
        header('location:../production/yorumlar.php?durum=no');
        exit;
    }
}


// Yorum duzenle
if (isset($_GET['yorum_durum'])) {

    echo $_GET['yorum_durum'];
    echo $_GET['yorum_id'];

    $yorumdurumkaydet = $db->prepare("UPDATE yorumlar SET
    yorum_durum=:yorum_durum 
    where yorum_id={$_GET['yorum_id']}");

    $update = $yorumdurumkaydet->execute([
        "yorum_durum" => !$_GET['yorum_durum']
    ]);


    if ($update) {
        header("location:../production/yorumlar.php?durum=ok");
        exit;
    } else {
        header("location:../production/yorumlar.php?durum=no");
        exit;
    }
}

// Yorum Kaydetme sql işlemi
if (isset($_POST['yorumyap'])) {

    $seourl = $_POST['urun_seourl'];
    $urunid = $_POST['urun_id'];
    $yorumlarkaydet = $db->prepare("INSERT INTO yorumlar SET 
    yorum_detay=:yorum_detay,
    urun_id=:urun_id,
    kullanici_id=:kullanici_id,
    yorum_durum=:yorum_durum
   ");

    $update = $yorumlarkaydet->execute([
        'yorum_detay' => $_POST['yorum_detay'],
        'urun_id' => $_POST['urun_id'],
        'kullanici_id' => $_POST['kullanici_id'],
        'yorum_durum' => 0
    ]);


    if ($update) {
        header("location:../../urun-$seourl-$urunid?durum=ok");
        exit;
    } else {
        header("location:../../urun-$seourl-$urunid?durum=no");
        exit;
    }
}

// Ürün Hızlı bir şekilde öne çıkarma sql işlemi
if (isset($_GET['urun_hizlionecikar'])) {

    $urunkaydet = $db->prepare("UPDATE urun SET
     urun_onecikar=:urun_onecikar 
     where urun_id={$_GET['urun_id']}");

    $update = $urunkaydet->execute([
        "urun_onecikar" => !$_GET['urun_hizlionecikar']
    ]);

    if ($update) {
        header("location:../production/urun.php?durum=ok");
        exit;
    } else {
        header("location:../production/urun.php?durum=no");
        exit;
    }
}

// Ürün düzenleme işlemleri
if (isset($_POST["urunduzenle"])) {
    $seourl = seo($_POST['urun_ad']);

    $id = $_POST['urun_id'];

    $urunkaydet = $db->prepare("UPDATE urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_seourl=:urun_seourl,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_video=:urun_video,
    urun_keyword=:urun_keyword,
    urun_stok=:urun_stok,
    urun_durum=:urun_durum,
    urun_onecikar=:urun_onecikar
    where urun_id=$id");

    $update = $urunkaydet->execute([
        'kategori_id' => $_POST['kategori_id'],
        'urun_ad' => $_POST['urun_ad'],
        'urun_seourl' => $seourl,
        'urun_detay' => $_POST['urun_detay'],
        'urun_fiyat' => $_POST['urun_fiyat'],
        'urun_video' => $_POST['urun_video'],
        'urun_keyword' => $_POST['urun_keyword'],
        'urun_stok' => $_POST['urun_stok'],
        'urun_durum' => $_POST['urun_durum'],
        'urun_onecikar' => $_POST['urun_onecikar']

    ]);



    if ($update) {
        header("location:../production/urun-duzenle.php?durum=ok&urun_id=" . $_POST['urun_id']);
        exit;
    } else {
        header("location:../production/urun-duzenle.php?durum=no&urun_id=" . $_POST['urun_id']);
        exit;
    }
}

// Ürün düzenleme işlemleri
if (isset($_POST["urunduzenle"])) {
    $seourl = seo($_POST['urun_ad']);

    $id = $_POST['urun_id'];

    $urunkaydet = $db->prepare("UPDATE urun SET
    kategori_id=:kategori_id,
    urun_ad=:urun_ad,
    urun_seourl=:urun_seourl,
    urun_detay=:urun_detay,
    urun_fiyat=:urun_fiyat,
    urun_video=:urun_video,
    urun_keyword=:urun_keyword,
    urun_stok=:urun_stok,
    urun_durum=:urun_durum,
    urun_onecikar=:urun_onecikar
    where urun_id=$id");

    $update = $urunkaydet->execute([
        'kategori_id' => $_POST['kategori_id'],
        'urun_ad' => $_POST['urun_ad'],
        'urun_seourl' => $seourl,
        'urun_detay' => $_POST['urun_detay'],
        'urun_fiyat' => $_POST['urun_fiyat'],
        'urun_video' => $_POST['urun_video'],
        'urun_keyword' => $_POST['urun_keyword'],
        'urun_stok' => $_POST['urun_stok'],
        'urun_durum' => $_POST['urun_durum'],
        'urun_onecikar' => $_POST['urun_onecikar']

    ]);



    if ($update) {
        header("location:../production/urun-duzenle.php?durum=ok&urun_id=" . $_POST['urun_id']);
        exit;
    } else {
        header("location:../production/urun-duzenle.php?durum=no&urun_id=" . $_POST['urun_id']);
        exit;
    }
}

//ürün silme işlemi
if (isset($_GET["urunsil"])) {

    $urunsil = $db->prepare("DELETE FROM urun WHERE urun_id=:urun_id");

    $durum = $urunsil->execute([
        'urun_id' => $_GET['urun_id']
    ]);

    if ($durum) {
        header('location:../production/urun.php?durum=ok');
        exit;
    } else {
        header('location:../production/urun.php?durum=no');
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

//user kullanıcı sifre degistirme işlemi
if (isset($_POST["usersifreguncelle"])) {


    $gelenpassword = md5($_POST['kullanici_password']);
    $passwordone = htmlspecialchars(md5($_POST['kullanici_passwordone']));
    $passwordtwo = htmlspecialchars(md5($_POST['kullanici_passwordtwo']));

    $kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:kullanici_id and kullanici_password=:kullanici_password");

    $kullanicisor->execute([
        'kullanici_id' => $_POST['kullanici_id'],
        'kullanici_password' => $gelenpassword
    ]);

    if ($kullanicisor->rowCount()) {
        if ($passwordtwo == $passwordone) {

            if (strlen($_POST['kullanici_passwordone']) >= 6) {

                $kullanicikaydet = $db->prepare("UPDATE kullanici SET

                kullanici_password=:kullanici_password

                where kullanici_id={$_POST['kullanici_id']}");

                $update = $kullanicikaydet->execute([
                    'kullanici_password' => $passwordone
                ]);

                if ($update) {
                    header("location:../../sifre-guncelle.php?durum=ok");
                    exit;
                } else {
                    header("location:../../sifre-guncelle.php?durum=no");
                    exit;
                }
            } else {
                header('location:../../sifre-guncelle.php?durum=kisasifre');
                exit;
            }
        } else {
            header('location:../../sifre-guncelle.php?durum=yenisifreeslesmedi');
            exit;
        }
    } else {
        header('location:../../sifre-guncelle.php?durum=eskisifreyanlis');
        exit;
    }

    // if ($durum) {
    //     header('location:../production/kullanici.php?durum=ok');
    //     exit;
    // } else {
    //     header('location:../production/kullanici.php?durum=no');
    //     exit;
    // }
}

// Banka Ekleme işlemi
if (isset($_POST["bankaekle"])) {

    $bankakaydet = $db->prepare("INSERT INTO banka SET
    
    banka_ad=:banka_ad,
    banka_iban=:banka_iban,
    banka_hesapadsoyad=:banka_hesapadsoyad,
    banka_durum=:banka_durum");

    $update = $bankakaydet->execute([
        'banka_ad' => $_POST['banka_ad'],
        'banka_iban' => $_POST['banka_iban'],
        'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
        'banka_durum' => $_POST['banka_durum']
    ]);

    if ($update) {
        header("location:../production/banka.php?durum=ok");
        exit;
    } else {
        header("location:../production/banka.php?durum=no");
        exit;
    }
}

//Sipariş Verme işlemi
if (isset($_POST["bankasiparisekle"])) {
    // echo "<pre>";
    // echo print_r($_POST);
    // echo "</pre>";

    $siparis_tip = "Banka Havalesi";

    $sipariskaydet = $db->prepare("INSERT INTO siparis SET
    
    kullanici_id=:kullanici_id,
    siparis_toplam=:siparis_toplam,
    siparis_banka=:siparis_banka,
    siparis_tip=:siparis_tip
    ");

    $update = $sipariskaydet->execute([
        'kullanici_id' => $_POST['kullanici_id'],
        'siparis_toplam' => $_POST['siparis_toplam'],
        'siparis_banka' => $_POST['banka_ad'],
        'siparis_tip' => $siparis_tip
    ]);

    if ($update) {
        //header("location:../../odeme.php?durum=ok");

        $siparisid = $db->lastInsertId();

        $urunbilgileri = $_POST['urun_bilgiler'];
        foreach ($urunbilgileri as $value) {
            $parcalanmisurunbilgisi = explode("-", $value);
            $urun_id = $parcalanmisurunbilgisi[0];
            $urun_fiyat = $parcalanmisurunbilgisi[1];
            $urun_adet = $parcalanmisurunbilgisi[2];

            $siparisdetaykaydet = $db->prepare("INSERT INTO siparisdetay SET
    
            siparis_id=:siparis_id,
            urun_id=:urun_id,
            urun_fiyat=:urun_fiyat,
            urun_adet=:urun_adet
            ");

            $updatesiparisdetay = $siparisdetaykaydet->execute([
                'siparis_id' => $siparisid,
                'urun_id' => $urun_id,
                'urun_fiyat' => $urun_fiyat,
                'urun_adet' => $urun_adet
            ]);
        }
        if ($updatesiparisdetay) {
            $butunSepetiBosalt = $db->prepare("DELETE FROM sepet WHERE kullanici_id=:kullanici_id");
            $updateSepetBosalt = $butunSepetiBosalt->execute([
                "kullanici_id" => $_POST['kullanici_id']
            ]);
            if ($updateSepetBosalt) {
                header("location:../../siparislerim.php?durum=yes");
                exit;
            }
        } else {
            header("location:../../odeme.php?durum=no");
            exit;
        }
    } else {
        header("location:../../odeme.php?durum=no");
        exit;
    }
}

//banka duzenleme işlemleri
if (isset($_POST["bankaduzenle"])) {

    $bankakaydet = $db->prepare("UPDATE banka SET
    
    banka_ad=:banka_ad,
    banka_iban=:banka_iban,
    banka_hesapadsoyad=:banka_hesapadsoyad,
    banka_durum=:banka_durum
    where banka_id=" . $_POST['banka_id']);

    $update = $bankakaydet->execute([
        'banka_ad' => $_POST['banka_ad'],
        'banka_iban' => $_POST['banka_iban'],
        'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
        'banka_durum' => $_POST['banka_durum']
    ]);

    if ($update) {
        header("location:../production/banka-duzenle.php?durum=ok&banka_id=" . $_POST['banka_id']);
        exit;
    } else {
        header("location:../production/banka-duzenle.php?durum=no&banka_id=" . $_POST['banka_id']);
        exit;
    }
}

//banka silme işlemleri
if (isset($_GET["bankasil"])) {

    $seourl = seo($_POST['banka_ad']);

    $bankakaydet = $db->prepare("DELETE FROM banka WHERE banka_id=:banka_id");

    $update = $bankakaydet->execute([
        "banka_id" => $_GET['banka_id']
    ]);

    if ($update) {
        header("location:../production/banka.php?durum=ok");
        exit;
    } else {
        header("location:../production/banka.php?durum=no");
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

//Kategori Ekleme işlemleri
if (isset($_POST["kategoriekle"])) {

    $seourl = seo($_POST['kategori_ad']);

    $kategorikaydet = $db->prepare("INSERT INTO kategori SET
    
    kategori_ad=:kategori_ad,
    kategori_sira=:kategori_sira,
    kategori_seourl=:kategori_seourl,
    kategori_durum=:kategori_durum");

    $update = $kategorikaydet->execute([
        'kategori_ad' => $_POST['kategori_ad'],
        'kategori_seourl' => $seourl,
        'kategori_sira' => $_POST['kategori_sira'],
        'kategori_durum' => $_POST['kategori_durum']
    ]);

    if ($update) {
        header("location:../production/kategori.php?durum=ok");
        exit;
    } else {
        header("location:../production/kategori.php?durum=no");
        exit;
    }
}


//Kategori duzenleme işlemleri
if (isset($_POST["kategoriduzenle"])) {

    $seourl = seo($_POST['kategori_ad']);

    $kategorikaydet = $db->prepare("UPDATE kategori SET
    
    kategori_ad=:kategori_ad,
    kategori_sira=:kategori_sira,
    kategori_seourl=:kategori_seourl,
    kategori_durum=:kategori_durum
    where kategori_id=" . $_POST['kategori_id']);

    $update = $kategorikaydet->execute([
        'kategori_ad' => $_POST['kategori_ad'],
        'kategori_seourl' => $seourl,
        'kategori_sira' => $_POST['kategori_sira'],
        'kategori_durum' => $_POST['kategori_durum']
    ]);

    if ($update) {
        header("location:../production/kategori-duzenle.php?durum=ok&kategori_id=" . $_POST['kategori_id']);
        exit;
    } else {
        header("location:../production/kategori-duzenle.php?durum=no&kategori_id=" . $_POST['kategori_id']);
        exit;
    }
}

//Kategori silme işlemleri
if (isset($_GET["kategorisil"])) {

    $seourl = seo($_POST['kategori_ad']);

    $kategorikaydet = $db->prepare("DELETE FROM kategori WHERE kategori_id=:kategori_id");

    $update = $kategorikaydet->execute([
        "kategori_id" => $_GET['kategori_id']
    ]);

    if ($update) {
        header("location:../production/kategori.php?durum=ok");
        exit;
    } else {
        header("location:../production/kategori.php?durum=no");
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
