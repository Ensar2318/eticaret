-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 20 May 2022, 14:17:16
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_id` int(11) NOT NULL,
  `ayar_logo` varchar(250) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_title` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_description` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_author` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_il` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_adress` varchar(250) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_google` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_smtpuser` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `ayar_bakim` enum('0','1') CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adress`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_google`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtpuser`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, '', 'Deku E-Ticaret', 'Deku First E-Ticaret Scriptim', 'eticaret, shopping, php, learning, student php', 'Deku', '0534 919 02 88', '0534 909 02 85', '0632 12 12', 'info@deko.com.tr', 'fatih', 'istanbul', 'yavuzselim mahallesi dönemec sokak no 1 daire 10', '7 x 24 acik eticaret script', 'Maps_api', 'Analystick_api', 'Zopim_api', 'www.facebook.com', 'www.twitter.com', 'www.google.com', 'www.youtube.com', 'mail.alanadiniz.com', 'smtpuserss', 'password', ' 587', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(250) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `hakkimizda_icerik` text CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `hakkimizda_video` varchar(50) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `hakkimizda_vizyon` varchar(500) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL,
  `hakkimizda_misyon` varchar(500) CHARACTER SET utf32 COLLATE utf32_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_icerik`, `hakkimizda_video`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(0, 'Deku Eğitim Hakkında... bir kaç fikir daha işte', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et turpis in risus aliquam dignissim ac sed nulla. In laoreet condimentum magna, eu placerat sapien hendrerit ut. Vivamus molestie tincidunt mauris. Quisque maximus urna quis dui cursus, id molestie dolor facilisis. Donec luctus risus sem. Curabitur eu ex diam. Ut vehicula nibh et ligula auctor suscipit. Nunc sagittis auctor dolor ac pulvinar. Fusce purus orci, lacinia viverra nisl vel, accumsan ornare purus. Donec hendrerit nisi id eros pellentesque, non maximus urna mattis. Donec quis nunc sit amet magna porta vestibulum in faucibus mi. Vestibulum blandit ultrices ligula, at aliquam quam. Duis vulputate mauris urna, at consectetur tortor facilisis sollicitudin. Fusce egestas, nunc ut laoreet laoreet, ante mauris blandit elit, eu condimentum ipsum orci malesuada nisl. Phasellus dapibus orci eu metus facilisis convallis. Integer dui magna, euismod id odio non, aliquet mollis risus.</p><p>Morbi fringilla sem neque, quis tincidunt tortor ullamcorper sit amet. Quisque nec dapibus mi, a auctor mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nibh erat, hendrerit et vulputate finibus, hendrerit et velit. Morbi molestie tincidunt mauris id convallis. Morbi efficitur laoreet iaculis. Proin suscipit augue id sollicitudin tincidunt. Integer ut porta urna. Nullam molestie risus ut libero tempus feugiat. Curabitur dignissim eros sed dolor blandit, et euismod urna iaculis. Nullam nec consequat tellus, ut facilisis augue. Mauris a turpis auctor, vulputate erat sed, posuere ante. Suspendisse facilisis non tortor a porta. Aliquam a lectus varius, ornare dui vitae, porta diam. Praesent egestas hendrerit nisl id placerat.</p><p>In sed velit non dui vestibulum imperdiet nec sit amet elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed rutrum massa, ac luctus tortor. In hac habitasse platea dictumst. Cras commodo malesuada ipsum vel gravida. Aliquam vitae suscipit erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam tristique, elit sit amet pharetra imperdiet, enim erat auctor dolor, et feugiat dui dui id mauris. Suspendisse non pharetra leo.</p><p>Cras a pellentesque massa. Phasellus vulputate quam ut tortor elementum, vitae varius diam sodales. Nam malesuada libero id ultrices fringilla. Donec ultrices vestibulum ex, eu pellentesque lectus bibendum in. Sed sollicitudin congue arcu vel hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam consectetur mollis eros, eget congue magna imperdiet a. Sed id posuere ante, non ultrices arcu. Proin non volutpat libero. Sed sit amet vehicula quam, nec tincidunt massa. Pellentesque euismod lacus et tempor ornare. In massa urna, ornare blandit nisl quis, commodo scelerisque erat. Ut in massa risus. Fusce eu orci in erat auctor dapibus. Etiam in urna euismod, blandit elit at, suscipit lacus. Cras placerat tellus id arcu sodales venenatis.</p><p>Vivamus sit amet dui orci. Nunc laoreet pretium erat, sit amet dictum arcu condimentum vel. Sed in accumsan sem. Sed cursus nec turpis et suscipit. Nam augue magna, fringilla at dignissim vel, congue vitae purus. Nullam eu ipsum lectus. In et pellentesque turpis. Ut sollicitudin odio sed luctus tincidunt. Maecenas vel accumsan ex. Nullam in ipsum non tortor bibendum semper. Suspendisse potenti. Proin at neque ut neque eleifend vestibulum. Integer aliquet dolor non dui vestibulum rutrum.</p>', 'a6xXLw0au-c', 'Deku ile ilgili hkakımızda vizyon içeriği olacaktır vizon ile iligli bişeyler girelim işte vizyon', 'Deku ile ilgili hkakımızda misyon içeriği olacaktır misyon ile iligli bişeyler girelim işte misyo');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kullanici_resim` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_tc` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_gsm` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adsoyad` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_adres` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_il` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_ilce` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_unvan` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_yetki` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_resim`, `kullanici_tc`, `kullanici_ad`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_il`, `kullanici_ilce`, `kullanici_unvan`, `kullanici_yetki`, `kullanici_durum`) VALUES
(1, '2022-05-19 07:56:16', 'qwe', '42856102448', 'ensar', 'ensar@gmail.com', '5349190288', '827ccb0eea8a706c4c34a16891f84e7b', 'Genmert akahasa', 'başakşehir dönemec sokak', 'istanbul', 'başakşehir', 'yazılımcı', '5', 0),
(3, '2022-05-19 07:56:16', 'qwe', '42856102448', 'ensar', 'ensar@gmail.com', '5349190288', '827ccb0eea8a706c4c34a16891f84e7b', 'Political Vestern', 'başakşehir dönemec sokak', 'istanbul', 'başakşehir', 'yazılımcı', '5', 1),
(9, '2022-05-19 07:56:16', 'qwe', '42856102448', 'melih', 'melih@gmail.com', '5349190288', '827ccb0eea8a706c4c34a16891f84e7b', 'melih Vestern', 'başakşehir dönemec sokak', 'istanbul', 'başakşehir', 'yazılımcı', '5', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `menu_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `menu_detay` text COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(50) NOT NULL,
  `menu_durum` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(3, '0', 'hakkimizda', '<p>menu detay</p>', 'about.php', 1, '1', 'hakkimizda'),
(4, '1', 'Detay', '<p>menu detay</p>', 'hakkimizda.php', 2, '1', 'detay'),
(6, '1', 'katagoriler', '<p>menu detay</p>', 'hakkimizda.php', 5, '1', 'katagoriler'),
(11, '', 'Gizlilik koşulları', '<p><strong>MediaCat Gizlilik Politikası</strong></p><p>İşbu Gizlilik Politikası’nda kullanılan “Kişisel Bilgiler” terimi sizi tanımlayabilecek isminiz, doğum tarihiniz, e-posta adresiniz veya posta adresiniz dahil fakat bunlarla sınırlı olmamak kaydıyla kredi kartı bilgileriniz, kimlik bilgileriniz gibi bilgileri ifade etmektedir.</p><p>MediaCat olarak, tüm okurlarımızın gizliliğine değer vermekte olup, bizimle paylaşılan kişisel bilgilerin gizliliği ve bilgilerin güvenliğini ile ilgili okurlarımızın kaygılarını saygıyla karşılamaktayız. Gizlilik Politikası gizliliğinizi korumak ve bilgi temininde güvenli bir deneyim sunmak için tasarlamış olup, okurların onayı olmadan kişisel bilgilerini kullanmamayı ve Kişisel Bilgilerin kullanılmasında, &nbsp;uluslararası alanda kabul edilen mahremiyet koruma standartlarına uymayı taahhüt etmektedir.</p><p>MediaCat olarak, platformu kullanmadan veya Kişisel Bilgilerinizi bize iletmeden önce mevcut Gizlilik Politikası’nı okumanızı rica ediyoruz. MediaCat, Gizlilik Politikası’nı bildirimde bulunmaksızın zaman zaman değiştirebilir veyahut da eklemelerde bulunabilir. Bu durumda Gizlilik Politikası’nın söz konusu değişiklikleri yansıtan güncellenmiş halini yükleyecektir. İşbu sebeple güncellenen Gizlilik Politikası hakkında okurların bilgi sahibi olduklarını periyodik olarak gözden geçirmesini öneririz.</p><p>MediaCat, okurlarının izniyle Kişisel Bilgileri aşağıdaki amaçlar için kullanacaktır, hiçbir durumda öngörülen amacın dışında kullanmayacaktır.</p><ul><li>Elektronik yayınlar göndermek</li><li>Elektronik posta ile bülten göndermek ya da bildirimler de bulunmak</li><li>Satın alınan ürünleri teslim etmek</li><li>Sorularınızı cevaplamak ve etkin bir müşteri hizmeti sunmak</li></ul><p>Bu amaç için elde edilen bilgiler, tamamen sizin özgür iradenizle tarafımıza sağlanmaktadır. Bu Kişisel Bilgileri bize verip vermemekte okurlar serbesttir. Ancak, okurlarımıza daha çabuk ve kaliteli hizmet sunabilmemiz için, işbu platformda okurlardan talep edilen bilgilerin tamamını vermelerini önermekteyiz. Ayrıca, talep edilen hizmetin gerektirdiği zorunlu bilgilerin verilmemesi durumunda talebin yerine getirilmesinin mümkün olamayacağını dikkatlerinize sunarız. Okurlar tarafından verilen bilgilerin doğru ve eksiksiz olması okurların sorumluluğundadır. Yanlış, yanıltıcı veya eksik bilgi verilmemesi rica olunur. Böyle bir durumda MediaCat hiçbir sorumluluk kabul etmeyecektir. Yanlış, yanıltıcı veya eksik bilgi verilmesi nedeniyle MediaCat’in bir zarara uğraması halinde bu zararı tazmin yükümlülüğü okura aittir.</p><p>Kişisel Bilgilere ek olarak platform okurlar tarafından ziyaret edildiğinde okurlar hakkında başkaca bilgiler de toplanabilir, derlenebilir. Otomatik olarak derlenen teşhis edebilirlik niteliğine sahip olmayan bu bilgiler, cookies adı verilen çeşitli teknolojiler ile derlenmektedir. Cookies, web sitesinden bilgisayarların sabit diskine aktarılan küçük çaplı metin dosyalarıdır. Bu bilgileri sitemizi, ilgilendiğiniz ve ihtiyaç duyduğunuz ürünlerimizi değiştirebilmek için toplamaktayız. Tercihen “cookies” reddetmek veya “cookie” gönderildiğinde ikaz edilmek açısından okurlar kendi web gezginlerini ayarlayabilirler.</p><p>Girilen sitede “cookie”leri reddetmek, sitenin bazı alanlarını gezmeyi veya site ziyaret edildiğinde kişiselleştirilmiş bilgilerin alınmasını engelleyebilir.</p><p>MediaCat toplanan, işlenen ve aktarılan tüm Kişisel Bilgileri korumak için gerekli teknolojik ve kurumsal önlemleri alır ve bu önlemler teknolojik gelişmeye göre sürekli güncellenir ve uyarlanır. İnternet üzerinden iletilen Kişisel Bilgiler’in gizliliği konusunda mutlak bir garanti verilmesinin söz konusu olmadığını hatırlatır, okurlarımıza internet üzerinde Kişisel Bilgiler’ini iletilirken mümkün olan en üst düzey tedbirleri almalarını tavsiye ediyoruz.</p><p>Temin edilen Kişiler Bilgiler servisin hizmet amacına yönelik olup, ilke olarak, üçüncü kişilere satılmaz, kiralanmaz ya da başka şekilde kullandırılmaz ve okurlar bizzat aksini talep etmediği sürece üçüncü kişilerle hiçbir suretle paylaşılmaz. Şu kadar ki, MediaCat yürürlükteki mevzuat uyarınca yetkili, idari ve resmi makamlardan usulüne uygun olarak talep gelmesi halinde okurların kendisinde bulunan bilgilerini ilgili yetkili makamlarla paylaşacaktır.</p><p>MediaCat vereceğiniz destek ile Kişisel Bilgilerinizi daima güncel ve doğru şekilde tutacaktır. Ancak Kişisel Bilgilerinizin silinmesi, değiştirilmesi veyahut da güncellenmesinin gerektirdiği hallerde bizimle irtibata geçmenizi ve isteklerinizi iletmenizi rica ederiz.</p><p><strong>MediaCat</strong></p><p>Kapital Medya Akmerkez E Blok Kat: 6 Etiler/İSTANBUL Telefon: 0212 282 26 40</p>', '', 6, '1', 'gizlilik-kosullari'),
(12, '', 'iletisimss', '<p>qwrlqwirkwq</p>', 'iletisim.php', 7, '1', 'iletisimss'),
(14, '', 'menu1', '<p>menuu 1qweqwe</p>', 'qweqwe', 0, '1', 'menu1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
