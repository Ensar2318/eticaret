<?php
//<!-- Database Baglanma işlemi -->
try {
    $db = new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8", 'root', '12345678');
} catch (PDOException $io) {
    echo "Hata mesajı : " . $io->getMessage();
}
//<!-- Database Baglanma işlemi -->

//<!-- Klasik Ürün Ekleme işlemleri -->
if (isset($_POST["kategoriekle"])) {

    $seourl = seo($_POST['kategori_ad']);

    $kategorikaydet = $db->prepare("INSERT INTO kategori SET

kategori_ad=:kategori_ad");

    $update = $kategorikaydet->execute([
        'kategori_ad' => $_POST['kategori_ad']
    ]);

    if ($update) {
        header("location:../production/kategori.php?durum=ok");
        exit;
    } else {
        header("location:../production/kategori.php?durum=no");
        exit;
    }
}
//<!-- Klasik Ürün Ekleme Sql Kodu -->


//<!-- Klasik Ürün Düzenleme Sql kodu -->
if (isset($_POST["kategoriduzenle"])) {

    $kategorikaydet = $db->prepare("UPDATE kategori SET
    
    kategori_ad=:kategori_ad
    where kategori_id=" . $_POST['kategori_id']);

    $update = $kategorikaydet->execute([
        'kategori_ad' => $_POST['kategori_ad']
    ]);

    if ($update) {
        header("location:../production/kategori-duzenle.php?durum=ok&kategori_id=" . $_POST['kategori_id']);
        exit;
    } else {
        header("location:../production/kategori-duzenle.php?durum=no&kategori_id=" . $_POST['kategori_id']);
        exit;
    }
}
//<!-- Klasik Ürün Düzenleme Sql kodu -->


//<!-- Klasik Ürün Silme Sql kodu -->
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
//<!-- Klasik Ürün Silme Sql kodu -->


//<!-- Id koduna göre Ürün Listeleme Sql kodu veri çekme-->
$ayarsor = $db->prepare("SELECT * FROM ayar where ayar_id=:id");
$ayarsor->execute([
    'id' => 0
]);
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);
$say = $kullanicisor->rowCount(); // sql de satır saymaya yarıyor eğer boş gelirse demekki işlemi karşılamıyor ve ona göre işlem açabiliriz
//<!-- Id koduna göre Ürün Listeleme Sql kodu -->



//<!-- kategori sıraya göre kücükten büyüğe bütün verileri sıralamaya yarıyor -->
$kategorisor = $db->prepare("SELECT * FROM kategori ORDER BY kategori_sira ASC");
$kategorisor->execute();
$kategoricek = $kategorisor->fetchAll(PDO::FETCH_ASSOC);
//<!-- kategori sıraya göre kücükten büyüğe bütün verileri sıralamaya yarıyor -->




//<!-- üyelik anlamında kullanıcı kaydetme işlemi  -->
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
//<!-- üyelik anlamında kullanıcı kaydetme işlemi  -->



//<!-- Fotoraf içeren  Veri kaydetme işlemi  -->
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
//<!-- Fotoraf içeren  Veri kaydetme işlemi  -->


//<!-- Fotoraf içeren  Veri duzenleme işlemi  -->
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
//<!-- Fotoraf içeren  Veri duzenleme işlemi  -->