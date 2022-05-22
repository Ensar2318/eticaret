-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 22 May 2022, 21:15:58
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
(0, 'dimg/25716akaza_chibi_by_aceashiya_delg4s3-fullview.png', 'Deku E-Ticaret', 'Deku First E-Ticaret Scriptim', 'eticaret, shopping, php, learning, student php', 'Deku', '0534 919 02 88', '0534 909 02 85', '0632 12 12', 'info@deko.com.tr', 'fatih', 'istanbul', 'yavuzselim mahallesi dönemec sokak no 1 daire 10', '7 x 24 acik eticaret script', 'Maps_api', 'Analystick_api', 'Zopim_api', 'www.facebook.com', 'www.twitter.com', 'www.google.com', 'www.youtube.com', 'mail.alanadiniz.com', 'smtpuserss', 'password', ' 587', '1');

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
(0, 'sikktir', '<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur et turpis in risus aliquam dignissim ac sed nulla. In laoreet condimentum magna, eu placerat sapien hendrerit ut. Vivamus molestie tincidunt mauris. Quisque maximus urna quis dui cursus, id molestie dolor facilisis. Donec luctus risus sem. Curabitur eu ex diam. Ut vehicula nibh et ligula auctor suscipit. Nunc sagittis auctor dolor ac pulvinar. Fusce purus orci, lacinia viverra nisl vel, accumsan ornare purus. Donec hendrerit nisi id eros pellentesque, non maximus urna mattis. Donec quis nunc sit amet magna porta vestibulum in faucibus mi. Vestibulum blandit ultrices ligula, at aliquam quam. Duis vulputate mauris urna, at consectetur tortor facilisis sollicitudin. Fusce egestas, nunc ut laoreet laoreet, ante mauris blandit elit, eu condimentum ipsum orci malesuada nisl. Phasellus dapibus orci eu metus facilisis convallis. Integer dui magna, euismod id odio non, aliquet mollis risus.</strong></p><p><strong>Morbi fringilla sem neque, quis tincid eros, eget congue magna imperdiet a. Sed id posuere ante, non ultrices arcu. Proin non volutpat libero. Sed sit amet vehicula quam, nec tincidunt massa. Pellentesque euismod lacus et tempor ornare. In massa urna, ornarunt tortor ullamcorper sit amet. Quisque nec dapibus mi, a auctor mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nibh erat, hendrerit et vulputate finibus, hendrerit et velit. Morbi molestie tincidunt mauris id convallis. Morbi efficitur laoreet iaculis. Proin suscipit augue id sollicitudin tincidunt. Integer ut porta urna. Nullam molestie risus ut libero tempus feugiat. Curabitur dignissim eros sed dolor blandit, et euismod urna iaculis. Nullam nec consequat tellus, ut facilisis augue. Mauris a turpis auctor, vulputate erat sed, posuere ante. Suspendisse facilisis non tortor a porta. Aliquam a lectus varius, ornare dui vitae, porta diam. Praesent egestas hendrerit nisl id placerat.</strong></p><p><strong>In sed velit non dui vestibulum imperdiet nec sit amet elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed rutrum massa, ac luctus tortor. In hac habitasse platea dictumst. Cras commodo malesuada ipsum vel gravida. Aliquam vitae suscipit erat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam tristique, elit sit amet pharetra imperdiet, enim erat auctor dolor, et feugiat dui dui id mauris. Suspendisse non pharetra leo.</strong></p><p><strong>Cras a pellentesque massa. Phasellus vulputate quam ut tortor elementum, vitae varius diam sodales. Nam malesuada libero id ultrices fringilla. Donec ultrices vestibulum ex, eu pellentesque lectus bibendum in. Sed sollicitudin congue arcu vel hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam consectetur mollise blandit nisl quis, commodo scelerisque erat. Ut in massa risus. Fusce eu orci in erat auctor dapibus. Etiam in urna euismod, blandit elit at, suscipit lacus. Cras placerat tellus id arcu sodales venenatis.</strong></p><p><strong>Vivamus sit amet dui orci. Nunc laoreet pretium erat, sit amet dictum arcu condimentum vel. Sed in accumsan sem. Sed cursus nec turpis et suscipit. Nam augue magna, fringilla at dignissim vel, congue vitae purus. Nullam eu ipsum lectus. In et pellentesque turpis. Ut sollicitudin odio sed luctus tincidunt. Maecenas vel accumsan ex. Nullam in ipsum non tortor bibendum semper. Suspendisse potenti. Proin at neque ut neque eleifend vestibulum. Integer aliquet dolor non dui vestibulum rutrum.</strong></p>', 'XtRc2s1Sru8', 'vizyonnuz misoynumuz', 'falan fgilan misyon');

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
(1, '2022-05-19 07:56:16', 'qwe', '42856102448', 'ensar', 'ensar@gmail.com', '5349190288', '827ccb0eea8a706c4c34a16891f84e7b', 'ensar kahraman', 'başakşehir dönemec sokak', 'istanbul', 'başakşehir', 'yazılımcı', '5', 0),
(10, '2022-05-22 18:11:31', '', '', '', 'ensa2r@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'ensar kahraman', '', '', '', '', '1', 1),
(12, '2022-05-22 18:32:13', '', '', '', 'test@gmail.com', '', 'e10adc3949ba59abbe56e057f20f883e', 'ensar kahraman', '', '', '', '', '1', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_ust` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `menu_ad` varchar(100) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `menu_detay` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `menu_url` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `menu_sira` int(50) NOT NULL,
  `menu_durum` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `menu_seourl` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_ust`, `menu_ad`, `menu_detay`, `menu_url`, `menu_sira`, `menu_durum`, `menu_seourl`) VALUES
(3, '0', 'hakkimizda', '<p>menu detay</p>', 'about.php', 1, '1', 'hakkimizda'),
(6, '1', 'Mesafeli satış sözleşmesi', '<p>Gümrük ve Ticaret Bakanlığından:</p><p>MESAFELİ SÖZLEŞMELER YÖNETMELİĞİ</p><p>BİRİNCİ BÖLÜM</p><p>Amaç, Kapsam, Dayanak ve Tanımlar</p><p><strong>Amaç</strong></p><p><strong>MADDE 1 –</strong> (1) Bu Yönetmeliğin amacı, mesafeli sözleşmelere ilişkin uygulama usul ve esaslarını düzenlemektir.</p><p><strong>Kapsam</strong></p><p><strong>MADDE 2 –</strong> (1) Bu Yönetmelik, mesafeli sözleşmelere uygulanır.</p><p>(2) Bu Yönetmelik hükümleri;</p><p>a) Finansal hizmetler,</p><p>b) Otomatik makineler aracılığıyla yapılan satışlar,</p><p>c) Halka açık telefon vasıtasıyla telekomünikasyon operatörleriyle bu telefonun kullanımı,</p><p>ç) Bahis, çekiliş, piyango ve benzeri şans oyunlarına ilişkin hizmetler,</p><p>d) Taşınmaz malların veya bu mallara ilişkin hakların oluşumu, devri veya kazanımı,</p><p>e) Konut kiralama,</p><p>f) Paket turlar,</p><p>g) Devre mülk, devre tatil, uzun süreli tatil hizmeti ve bunların yeniden satımı veya değişimi,</p><p>ğ) Yiyecek ve içecekler gibi günlük tüketim maddelerinin, satıcının düzenli teslimatları çerçevesinde tüketicinin meskenine veya işyerine götürülmesi,</p><p>h) 5 inci maddenin birinci fıkrasının (a), (b) ve (d) bentlerindeki bilgi verme yükümlülüğü ile 18 inci ve 19 uncu maddelerde yer alan yükümlülükler saklı kalmak koşuluyla yolcu taşıma hizmetleri,</p><p>ı) Malların montaj, bakım ve onarımı,</p><p>i) Bakımevi hizmetleri, çocuk, yaşlı ya da hasta bakımı gibi ailelerin ve kişilerin desteklenmesine yönelik sosyal hizmetler</p><p>ile ilgili sözleşmelere uygulanmaz.</p><p><strong>Dayanak</strong></p><p><strong>MADDE 3 –</strong> (1) Bu Yönetmelik, 7/11/2013 tarihli ve 6502 sayılı Tüketicinin Korunması Hakkında Kanunun 48 inci ve 84 üncü maddelerine dayanılarak hazırlanmıştır.</p><p><strong>Tanımlar</strong></p><p><strong>MADDE 4 –</strong> (1) Bu Yönetmeliğin uygulanmasında;</p><p>a) Dijital içerik: Bilgisayar programı, uygulama, oyun, müzik, video ve metin gibi dijital şekilde sunulan her türlü veriyi,</p><p>b) Hizmet: Bir ücret veya menfaat karşılığında yapılan ya da yapılması taahhüt edilen mal sağlama dışındaki her türlü tüketici işleminin konusunu,</p><p>c) Kalıcı veri saklayıcısı: Tüketicinin gönderdiği veya kendisine gönderilen bilgiyi, bu bilginin amacına uygun olarak makul bir süre incelemesine elverecek şekilde kaydedilmesini ve değiştirilmeden kopyalanmasını sağlayan ve bu bilgiye aynen ulaşılmasına imkan veren kısa mesaj, elektronik posta, internet, disk, CD, DVD, hafıza kartı ve benzeri her türlü araç veya ortamı,</p><p>ç) Kanun: 6502 sayılı Tüketicinin Korunması Hakkında Kanunu,</p><p>d) Mal: Alışverişe konu olan; taşınır eşya, konut veya tatil amaçlı taşınmaz mallar ile elektronik ortamda kullanılmak üzere hazırlanan yazılım, ses, görüntü ve benzeri her türlü gayri maddi malları,</p><p>e) Mesafeli sözleşme: Satıcı veya sağlayıcı ile tüketicinin eş zamanlı fiziksel varlığı olmaksızın, mal veya hizmetlerin uzaktan pazarlanmasına yönelik olarak oluşturulmuş bir sistem çerçevesinde, taraflar arasında sözleşmenin kurulduğu ana kadar ve kurulduğu an da dahil olmak üzere uzaktan iletişim araçlarının kullanılması suretiyle kurulan sözleşmeleri,</p><p>f) Sağlayıcı: Kamu tüzel kişileri de dahil olmak üzere ticari veya mesleki amaçlarla tüketiciye hizmet sunan ya da hizmet sunanın adına ya da hesabına hareket eden gerçek veya tüzel kişiyi,</p><p>g) Satıcı: Kamu tüzel kişileri de dahil olmak üzere ticari veya mesleki amaçlarla tüketiciye mal sunan ya da mal sunanın adına ya da hesabına hareket eden gerçek veya tüzel kişiyi,</p><p>ğ) Tüketici: Ticari veya mesleki olmayan amaçlarla hareket eden gerçek veya tüzel kişiyi,</p><p>h) Uzaktan iletişim aracı: Mektup, katalog, telefon, faks, radyo, televizyon, elektronik posta mesajı, kısa mesaj, internet gibi fiziksel olarak karşı karşıya gelinmeksizin sözleşme kurulmasına imkan veren her türlü araç veya ortamı,</p><p>ı) Yan sözleşme: Bir mesafeli sözleşme ile ilişkili olarak satıcı, sağlayıcı ya da üçüncü bir kişi tarafından sözleşme konusu mal ya da hizmete ilave olarak tüketiciye sağlanan mal veya hizmete ilişkin sözleşmeyi</p><p>ifade eder.</p><p>İKİNCİ BÖLÜM</p><p>Ön Bilgilendirme Yükümlülüğü</p><p><strong>Ön bilgilendirme</strong></p><p><strong>MADDE 5 –</strong> (1) Tüketici, mesafeli sözleşmenin kurulmasından ya da buna karşılık gelen herhangi bir teklifi kabul etmeden önce, aşağıdaki hususların tamamını içerecek şekilde satıcı veya sağlayıcı tarafından bilgilendirilmek zorundadır.</p><p>a) Sözleşme konusu mal veya hizmetin temel nitelikleri,</p><p>b) Satıcı veya sağlayıcının adı veya unvanı, varsa MERSİS numarası,</p><p>c) Tüketicinin satıcı veya sağlayıcı ile hızlı bir şekilde irtibat kurmasına imkan veren, satıcı veya sağlayıcının açık adresi, telefon numarası ve benzeri iletişim bilgileri ile varsa satıcı veya sağlayıcının adına ya da hesabına hareket edenin kimliği ve adresi,</p><p>ç) Satıcı veya sağlayıcının tüketicinin şikayetlerini iletmesi için (c) bendinde belirtilenden farklı iletişim bilgileri var ise, bunlara ilişkin bilgi,</p><p>d) Mal veya hizmetin tüm vergiler dahil toplam fiyatı, niteliği itibariyle önceden hesaplanamıyorsa fiyatın hesaplanma usulü, varsa tüm nakliye, teslim ve benzeri ek masraflar ile bunların önceden hesaplanamaması halinde ek masrafların ödenebileceği bilgisi,</p><p>e) Sözleşmenin kurulması aşamasında uzaktan iletişim aracının kullanım bedelinin olağan ücret tarifesi üzerinden hesaplanamadığı durumlarda, tüketicilere yüklenen ilave maliyet,</p><p>f) Ödeme, teslimat, ifaya ilişkin bilgiler ile varsa bunlara ilişkin taahhütler ve satıcı veya sağlayıcının şikayetlere ilişkin çözüm yöntemleri,</p><p>g) Cayma hakkının olduğu durumlarda, bu hakkın kullanılma şartları, süresi, usulü ve satıcının iade için öngördüğü taşıyıcıya ilişkin bilgiler,</p><p>ğ) Cayma bildiriminin yapılacağı açık adres, faks numarası veya elektronik posta bilgileri,</p><p>h) 15 inci madde uyarınca cayma hakkının kullanılamadığı durumlarda, tüketicinin cayma hakkından faydalanamayacağına ya da hangi koşullarda cayma hakkını kaybedeceğine ilişkin bilgi,</p><p>ı) Satıcı veya sağlayıcının talebi üzerine, varsa tüketici tarafından ödenmesi veya sağlanması gereken depozitolar ya da diğer mali teminatlar ve bunlara ilişkin şartlar,</p><p>i) Varsa dijital içeriklerin işlevselliğini etkileyebilecek teknik koruma önlemleri,</p><p>j) Satıcı veya sağlayıcının bildiği ya da makul olarak bilmesinin beklendiği, dijital içeriğin hangi donanım ya da yazılımla birlikte çalışabileceğine ilişkin bilgi,</p><p>k) Tüketicilerin uyuşmazlık konusundaki başvurularını Tüketici Mahkemesine veya Tüketici Hakem Heyetine yapabileceklerine dair bilgi.</p><p>(2) Birinci fıkrada belirtilen bilgiler, mesafeli sözleşmenin ayrılmaz bir parçasıdır ve taraflar aksini açıkça kararlaştırmadıkça bu bilgiler değiştirilemez.</p><p>(3) Satıcı veya sağlayıcı, birinci fıkranın (d) bendinde yer alan ek masraflara ilişkin bilgilendirme yükümlülüğünü yerine getirmezse, tüketici bunları karşılamakla yükümlü değildir.</p><p>(4) Birinci fıkranın (d) bendinde yer alan toplam fiyatın, belirsiz süreli sözleşmelerde veya belirli süreli abonelik sözleşmelerinde, her faturalama dönemi bazında toplam masrafları içermesi zorunludur.</p><p>(5) Açık artırma veya eksiltme yoluyla kurulan sözleşmelerde, birinci fıkranın (b), (c) ve (ç) bentlerinde yer alan bilgilerin yerine açık artırmayı yapan ile ilgili bilgilere yer verilebilir.</p><p>(6) Ön bilgilendirme yapıldığına ilişkin ispat yükü satıcı veya sağlayıcıya aittir.</p><p><strong>Ön bilgilendirme yöntemi</strong></p><p><strong>MADDE 6 –</strong> (1) Tüketici, 5 inci maddenin birinci fıkrasında belirtilen tüm hususlarda, kullanılan uzaktan iletişim aracına uygun olarak en az on iki punto büyüklüğünde, anlaşılabilir bir dilde, açık, sade ve okunabilir bir şekilde satıcı veya sağlayıcı tarafından yazılı olarak veya kalıcı veri saklayıcısı ile bilgilendirilmek zorundadır.</p><p>(2) Mesafeli sözleşmenin internet yoluyla kurulması halinde, satıcı veya sağlayıcı;</p><p>a) 5 inci maddenin birinci fıkrasında yer alan bilgilendirme yükümlülüğü saklı kalmak kaydıyla, aynı fıkranın (a), (d), (g) ve (h) bentlerinde yer alan bilgileri bir bütün olarak, tüketicinin ödeme yükümlülüğü altına girmesinden hemen önce açık bir şekilde ayrıca göstermek,</p><p>b) Herhangi bir gönderim kısıtlamasının uygulanıp uygulanmadığını ve hangi ödeme araçlarının kabul edildiğini, en geç tüketici siparişini vermeden önce, açık ve anlaşılabilir bir şekilde belirtmek</p><p>zorundadır.</p><p>(3) Mesafeli sözleşmenin sesli iletişim yoluyla kurulması halinde, satıcı veya sağlayıcı 5 inci maddenin birinci fıkrasının (a), (d), (g) ve (h) bentlerinde yer alan hususlarda, tüketiciyi sipariş vermeden hemen önce açık ve anlaşılır bir şekilde söz konusu ortamda bilgilendirmek ve 5 inci maddenin birinci fıkrasında yer alan bilgilerin tamamını en geç mal teslimine veya hizmet ifasına kadar yazılı olarak göndermek zorundadır.</p><p>(4) Siparişe ilişkin bilgilerin sınırlı alanda ya da zamanda sunulduğu bir ortam yoluyla mesafeli sözleşmenin kurulması halinde, satıcı veya sağlayıcı 5 inci maddenin birinci fıkrasının (a), (b), (d), (g) ve (h) bentlerinde yer alan hususlarda, tüketiciyi sipariş vermeden hemen önce açık ve anlaşılabilir bir şekilde söz konusu ortamda bilgilendirmek ve 5 inci maddenin birinci fıkrasında yer alan bilgilerin tamamını en geç mal teslimine veya hizmet ifasına kadar yazılı olarak göndermek zorundadır.</p><p>(5) Üçüncü ve dördüncü fıkralarda belirtilen yöntemlerle kurulan ve anında ifa edilen hizmet satışlarına ilişkin sözleşmelerde tüketicinin, sipariş vermeden hemen önce söz konusu ortamda 5 inci maddenin birinci fıkrasının sadece (a), (b), (d) ve (h) bentlerinde yer alan hususlarda açık ve anlaşılır bir şekilde bilgilendirilmesi yeterlidir.</p><p><strong>Ön bilgilerin teyidi</strong></p><p><strong>MADDE 7 –</strong> (1) Satıcı veya sağlayıcı, tüketicinin 6 ncı maddede belirtilen yöntemlerle ön bilgileri edindiğini kullanılan uzaktan iletişim aracına uygun olarak teyit etmesini sağlamak zorundadır. Aksi halde sözleşme kurulmamış sayılır.</p><p><strong>Ön bilgilendirmeye ilişkin diğer yükümlülükler</strong></p><p><strong>MADDE 8 –</strong> (1) Satıcı veya sağlayıcı, tüketici siparişi onaylamadan hemen önce, verilen siparişin ödeme yükümlülüğü anlamına geldiği hususunda tüketiciyi açık ve anlaşılır bir şekilde bilgilendirmek zorundadır. Aksi halde tüketici siparişi ile bağlı değildir.</p><p>(2) Tüketicinin mesafeli sözleşme kurulması amacıyla satıcı veya sağlayıcı tarafından telefonla aranması durumunda, her görüşmenin başında satıcı veya sağlayıcı kimliğini, eğer bir başkası adına veya hesabına arıyorsa bu kişinin kimliğini ve görüşmenin ticari amacını açıklamalıdır.</p><p>ÜÇÜNCÜ BÖLÜM</p><p>Cayma Hakkının Kullanımı ve Tarafların Yükümlülükleri</p><p><strong>Cayma hakkı</strong></p><p><strong>MADDE 9 –</strong> (1) Tüketici, on dört gün içinde herhangi bir gerekçe göstermeksizin ve cezai şart ödemeksizin sözleşmeden cayma hakkına sahiptir.</p><p>(2) Cayma hakkı süresi, hizmet ifasına ilişkin sözleşmelerde sözleşmenin kurulduğu gün; mal teslimine ilişkin sözleşmelerde ise tüketicinin veya tüketici tarafından belirlenen üçüncü kişinin malı teslim aldığı gün başlar. Ancak tüketici, sözleşmenin kurulmasından malın teslimine kadar olan süre içinde de cayma hakkını kullanabilir.</p><p>(3) Cayma hakkı süresinin belirlenmesinde;</p><p>a) Tek sipariş konusu olup ayrı ayrı teslim edilen mallarda, tüketicinin veya tüketici tarafından belirlenen üçüncü kişinin son malı teslim aldığı gün,</p><p>b) Birden fazla parçadan oluşan mallarda, tüketicinin veya tüketici tarafından belirlenen üçüncü kişinin son parçayı teslim aldığı gün,</p><p>c) Belirli bir süre boyunca malın düzenli tesliminin yapıldığı sözleşmelerde, tüketicinin veya tüketici tarafından belirlenen üçüncü kişinin ilk malı teslim aldığı gün</p><p>esas alınır.</p><p>(4) Malın satıcı tarafından taşıyıcıya teslimi, tüketiciye yapılan teslim olarak kabul edilmez.</p><p>(5) Mal teslimi ile hizmet ifasının birlikte yapıldığı sözleşmelerde, mal teslimine ilişkin cayma hakkı hükümleri uygulanır.</p><p><strong>Eksik bilgilendirme</strong></p><p><strong>MADDE 10 –</strong> (1) Satıcı veya sağlayıcı, cayma hakkı konusunda tüketicinin bilgilendirildiğini ispat etmekle yükümlüdür. Tüketici, cayma hakkı konusunda gerektiği şekilde bilgilendirilmezse, cayma hakkını kullanmak için on dört günlük süreyle bağlı değildir. Bu süre her halükarda cayma süresinin bittiği tarihten itibaren bir yıl sonra sona erer.</p><p>(2) Cayma hakkı konusunda gerektiği şekilde bilgilendirmenin bir yıllık süre içinde yapılması halinde, on dört günlük cayma hakkı süresi, bu bilgilendirmenin gereği gibi yapıldığı günden itibaren işlemeye başlar.</p><p><strong>Cayma hakkının kullanımı</strong></p><p><strong>MADDE 11 –</strong> (1) Cayma hakkının kullanıldığına dair bildirimin cayma hakkı süresi dolmadan, yazılı olarak veya kalıcı veri saklayıcısı ile satıcı veya sağlayıcıya yöneltilmesi yeterlidir.</p><p>(2) Cayma hakkının kullanılmasında tüketici, EK’te yer alan formu kullanabileceği gibi cayma kararını bildiren açık bir beyanda da bulunabilir. Satıcı veya sağlayıcı, tüketicinin bu formu doldurabilmesi veya cayma beyanını gönderebilmesi için internet sitesi üzerinden seçenek de sunabilir.&nbsp; İnternet sitesi üzerinden tüketicilere cayma hakkı sunulması durumunda satıcı veya sağlayıcı, tüketicilerin iletmiş olduğu cayma taleplerinin kendilerine ulaştığına ilişkin teyit bilgisini tüketiciye derhal iletmek zorundadır.</p><p>(3) Sesli iletişim yoluyla yapılan satışlarda, satıcı veya sağlayıcı, EK’te yer alan formu en geç mal teslimine veya hizmet ifasına kadar tüketiciye göndermek zorundadır. Tüketici bu tür satışlarda da cayma hakkını kullanmak için bu formu kullanabileceği gibi, ikinci fıkradaki yöntemleri de kullanabilir.</p><p>(4) Bu maddede geçen cayma hakkının kullanımına ilişkin ispat yükümlülüğü tüketiciye aittir.</p><p><strong>Satıcı veya sağlayıcının yükümlülükleri</strong></p><p><strong>MADDE 12 –</strong> (1) Satıcı veya sağlayıcı, tüketicinin cayma hakkını kullandığına ilişkin bildirimin kendisine ulaştığı tarihten itibaren on dört gün içinde, varsa malın tüketiciye teslim masrafları da dahil olmak üzere tahsil edilen tüm ödemeleri iade etmekle yükümlüdür.</p><p>(2) Satıcı veya sağlayıcı, birinci fıkrada belirtilen tüm geri ödemeleri, tüketicinin satın alırken kullandığı ödeme aracına uygun bir şekilde ve tüketiciye herhangi bir masraf veya yükümlülük getirmeden tek seferde yapmak zorundadır.</p><p>(3) Cayma hakkının kullanımında, 5 inci maddenin birinci fıkrasının (g) bendi kapsamında, satıcının iade için belirttiği taşıyıcı aracılığıyla malın geri gönderilmesi halinde, tüketici iadeye ilişkin masraflardan sorumlu tutulamaz. Satıcının ön bilgilendirmede iade için herhangi bir taşıyıcıyı belirtmediği durumda ise, tüketiciden iade masrafına ilişkin herhangi bir bedel talep edilemez. İade için ön bilgilendirmede belirtilen taşıyıcının, tüketicinin bulunduğu yerde şubesinin olmaması durumunda satıcı, ilave hiçbir masraf talep etmeksizin iade edilmek istenen malın tüketiciden alınmasını sağlamakla yükümlüdür.</p><p><strong>Tüketicinin yükümlülükleri</strong></p><p><strong>MADDE 13 –</strong> (1) Satıcı veya sağlayıcı malı kendisinin geri alacağına dair bir teklifte bulunmadıkça, tüketici cayma hakkını kullandığına ilişkin bildirimi yönelttiği tarihten itibaren on gün içinde malı satıcı veya sağlayıcıya ya da yetkilendirmiş olduğu kişiye geri göndermek zorundadır.</p><p>(2) Tüketici, cayma süresi içinde malı, işleyişine, teknik özelliklerine ve kullanım talimatlarına uygun bir şekilde kullandığı takdirde meydana gelen değişiklik ve bozulmalardan sorumlu değildir.</p><p><strong>Cayma hakkının kullanımının yan sözleşmelere etkisi</strong></p><p><strong>MADDE 14 –</strong> (1) Kanunun 30 uncu maddesi hükümleri saklı kalmak koşuluyla, tüketicinin cayma hakkını kullanması durumunda yan sözleşmeler de kendiliğinden sona erer. Bu durumda tüketici, 13 üncü maddenin ikinci fıkrasında belirtilen haller dışında herhangi bir masraf, tazminat veya cezai şart ödemekle yükümlü değildir.</p><p>(2) Satıcı veya sağlayıcı, tüketicinin cayma hakkını kullandığını yan sözleşmenin tarafı olan üçüncü kişiye derhal bildirmelidir.</p><p><strong>Cayma hakkının istisnaları</strong></p><p><strong>MADDE 15 –</strong> (1) Taraflarca aksi kararlaştırılmadıkça, tüketici aşağıdaki sözleşmelerde cayma hakkını kullanamaz:</p><p>a) Fiyatı finansal piyasalardaki dalgalanmalara bağlı olarak değişen ve satıcı veya sağlayıcının kontrolünde olmayan mal veya hizmetlere ilişkin sözleşmeler.</p><p>b) Tüketicinin istekleri veya kişisel ihtiyaçları doğrultusunda hazırlanan mallara ilişkin sözleşmeler.</p><p>c) Çabuk bozulabilen veya son kullanma tarihi geçebilecek malların teslimine ilişkin sözleşmeler.</p><p>ç) Tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olan mallardan; iadesi sağlık ve hijyen açısından uygun olmayanların teslimine ilişkin sözleşmeler.</p><p>d) Tesliminden sonra başka ürünlerle karışan ve doğası gereği ayrıştırılması mümkün olmayan mallara ilişkin sözleşmeler.</p><p>e) Malın tesliminden sonra ambalaj, bant, mühür, paket gibi koruyucu unsurları açılmış olması halinde maddi ortamda sunulan kitap, dijital içerik ve bilgisayar sarf malzemelerine ilişkin sözleşmeler.</p><p>f) Abonelik sözleşmesi kapsamında sağlananlar dışında, gazete ve dergi gibi süreli yayınların teslimine ilişkin sözleşmeler.</p><p>g) Belirli bir tarihte veya dönemde yapılması gereken, konaklama, eşya taşıma, araba kiralama, yiyecek-içecek tedariki ve eğlence veya dinlenme amacıyla yapılan boş zamanın değerlendirilmesine ilişkin sözleşmeler.</p><p>ğ) Elektronik ortamda anında ifa edilen hizmetler veya tüketiciye anında teslim edilen gayrimaddi mallara ilişkin sözleşmeler.</p><p>h) Cayma hakkı süresi sona ermeden önce, tüketicinin onayı ile ifasına başlanan hizmetlere ilişkin sözleşmeler.</p><p>DÖRDÜNCÜ BÖLÜM</p><p>Diğer Hükümler</p><p><strong>Sözleşmenin ifası ve teslimat</strong></p><p><strong>MADDE 16 –</strong> (1) Satıcı veya sağlayıcı, tüketicinin siparişinin kendisine ulaştığı tarihten itibaren taahhüt ettiği süre içinde edimini yerine getirmek zorundadır. Mal satışlarında bu süre her halükarda otuz günü geçemez.</p><p>(2) Satıcı veya sağlayıcının birinci fıkrada yer alan yükümlülüğünü yerine getirmemesi durumunda, tüketici sözleşmeyi feshedebilir.</p><p>(3) Sözleşmenin feshi durumunda, satıcı veya sağlayıcı, varsa teslimat masrafları da dâhil olmak üzere tahsil edilen tüm ödemeleri fesih bildiriminin kendisine ulaştığı tarihten itibaren on dört gün içinde tüketiciye 4/12/1984 tarihli ve 3095 sayılı Kanuni Faiz ve Temerrüt Faizine İlişkin Kanunun 1 inci maddesine göre belirlenen kanuni faiziyle birlikte geri ödemek ve varsa tüketiciyi borç altına sokan tüm kıymetli evrak ve benzeri belgeleri iade etmek zorundadır.</p><p>(4) Sipariş konusu mal ya da hizmet ediminin yerine getirilmesinin imkansızlaştığı hallerde satıcı veya sağlayıcının bu durumu öğrendiği tarihten itibaren üç gün içinde tüketiciye yazılı olarak veya kalıcı veri saklayıcısı ile bildirmesi ve varsa teslimat masrafları da dâhil olmak üzere tahsil edilen tüm ödemeleri bildirim tarihinden itibaren en geç on dört gün içinde iade etmesi zorunludur. Malın stokta bulunmaması durumu, mal ediminin yerine getirilmesinin imkânsızlaşması olarak kabul edilmez.</p><p><strong>Zarardan sorumluluk</strong></p><p><strong>MADDE 17 –</strong> (1) Satıcı, malın tüketici ya da tüketicinin taşıyıcı dışında belirleyeceği üçüncü bir kişiye teslimine kadar oluşan kayıp ve hasarlardan sorumludur.</p><p>(2) Tüketicinin, satıcının belirlediği taşıyıcı dışında başka bir taşıyıcı ile malın gönderilmesini talep etmesi durumunda, malın ilgili taşıyıcıya tesliminden itibaren oluşabilecek kayıp ya da hasardan satıcı sorumlu değildir.</p><p><strong>Telefon kullanım ücreti</strong></p><p><strong>MADDE 18 –</strong> (1) Kurulmuş olan sözleşmeye ilişkin olarak tüketicilerin iletişime geçebilmesi için satıcı veya sağlayıcı tarafından bir telefon hattı tahsis edilmesi durumunda, bu hat ile ilgili olarak satıcı veya sağlayıcı olağan ücret tarifesinden daha yüksek bir tarife seçemez.</p><p><strong>İlave ödemeler</strong></p><p><strong>MADDE 19 –</strong> (1) Sözleşme kurulmadan önce, sözleşme yükümlülüğünden kaynaklanan ve üzerinde anlaşılmış esas bedel dışında herhangi bir ilave bedel talep edilebilmesi için tüketicinin açık onayının ayrıca alınması zorunludur.</p><p>(2) Tüketicinin açık onayı alınmadan ilave ödeme yükümlülüğü doğuran seçeneklerin kendiliğinden seçili olarak sunulmuş olmasından dolayı tüketici bir ödemede bulunmuş ise, satıcı veya sağlayıcı bu ödemelerin iadesini derhal yapmak zorundadır.</p><p><strong>Bilgilerin saklanması ve ispat yükümlülüğü</strong></p><p><strong>MADDE 20 −</strong> (1) Satıcı veya sağlayıcı, bu Yönetmelik kapsamında düzenlenen cayma hakkı, bilgilendirme, teslimat ve diğer hususlardaki yükümlülüklerine dair her bir işleme ilişkin bilgi ve belgeyi üç yıl boyunca saklamak zorundadır.</p><p>(2) Oluşturdukları sistem çerçevesinde, uzaktan iletişim araçlarını kullanmak veya kullandırmak suretiyle satıcı veya sağlayıcı adına mesafeli sözleşme kurulmasına aracılık edenler, bu Yönetmelikte yer alan hususlardan dolayı satıcı veya sağlayıcı ile yapılan işlemlere ilişkin kayıtları üç yıl boyunca tutmak ve istenilmesi halinde bu bilgileri ilgili kurum, kuruluş ve tüketicilere vermekle yükümlüdür.</p><p>(3) Satıcı veya sağlayıcı elektronik ortamda tüketiciye teslim edilen gayrimaddi malların veya ifa edilen hizmetlerin ayıpsız olduğunu ispatla yükümlüdür.</p><p>BEŞİNCİ BÖLÜM</p><p>Çeşitli ve Son Hükümler</p><p><strong>Yürürlükten kaldırılan yönetmelik</strong></p><p><strong>MADDE 21 –</strong> (1) 6/3/2011 tarihli ve 27866 sayılı Resmî Gazete’de yayımlanan Mesafeli Sözleşmelere Dair Yönetmelik yürürlükten kaldırılmıştır.</p><p><strong>Yürürlük</strong></p><p><strong>MADDE 22 –</strong> (1) Bu Yönetmelik yayımı tarihinden itibaren üç ay sonra yürürlüğe girer.</p><p><strong>Yürütme</strong></p><p><strong>MADDE 23 –</strong> (1) Bu Yönetmelik hükümlerini Gümrük ve Ticaret Bakanı yürütür.</p><p>&nbsp;</p><p>&nbsp;</p><p>EK</p><p>ÖRNEK CAYMA FORMU</p><p>&nbsp;</p><p>(Bu form, sadece sözleşmeden cayma hakkı kullanılmak istenildiğinde doldurup</p><p>gönderilecektir.)</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>-Kime:</strong> (Satıcı veya sağlayıcı tarafından doldurulacak olan bu kısımda satıcı veya sağlayıcının ismi, unvanı, adresi varsa faks numarası ve e-posta adresi yer alacaktır.)</p><p>&nbsp;</p><p>&nbsp;</p><p>-Bu formla aşağıdaki malların satışına veya hizmetlerin sunulmasına ilişkin sözleşmeden cayma hakkımı kullandığımı beyan ederim.</p><p>&nbsp;</p><p><strong>&nbsp;</strong></p><p><strong>-Sipariş tarihi veya teslim tarihi:</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong></p><p><strong>-Cayma hakkına konu mal veya hizmet:</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong></p><p><strong>-Cayma hakkına konu mal veya hizmetin bedeli:</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong></p><p><strong>-Tüketicinin adı ve soyadı:</strong></p><p>&nbsp;</p><p>&nbsp;</p><p><strong>-Tüketicinin adresi:</strong></p><p><strong>&nbsp;</strong></p><p><strong>&nbsp;</strong></p><p><strong>-Tüketicinin imzası:</strong> (Sadece kağıt üzerinde gönderilmesi halinde)</p><p>&nbsp;</p><p>&nbsp;</p><p><strong>-Tarih:</strong></p>', '', 2, '1', 'mesafeli-satis-sozlesmesi'),
(11, '', 'Gizlilik koşulları', '<p><strong>MediaCat Gizlilik Politikası</strong></p><p>İşbu Gizlilik Politikası’nda kullanılan “Kişisel Bilgiler” terimi sizi tanımlayabilecek isminiz, doğum tarihiniz, e-posta adresiniz veya posta adresiniz dahil fakat bunlarla sınırlı olmamak kaydıyla kredi kartı bilgileriniz, kimlik bilgileriniz gibi bilgileri ifade etmektedir.</p><p>MediaCat olarak, tüm okurlarımızın gizliliğine değer vermekte olup, bizimle paylaşılan kişisel bilgilerin gizliliği ve bilgilerin güvenliğini ile ilgili okurlarımızın kaygılarını saygıyla karşılamaktayız. Gizlilik Politikası gizliliğinizi korumak ve bilgi temininde güvenli bir deneyim sunmak için tasarlamış olup, okurların onayı olmadan kişisel bilgilerini kullanmamayı ve Kişisel Bilgilerin kullanılmasında, &nbsp;uluslararası alanda kabul edilen mahremiyet koruma standartlarına uymayı taahhüt etmektedir.</p><p>MediaCat olarak, platformu kullanmadan veya Kişisel Bilgilerinizi bize iletmeden önce mevcut Gizlilik Politikası’nı okumanızı rica ediyoruz. MediaCat, Gizlilik Politikası’nı bildirimde bulunmaksızın zaman zaman değiştirebilir veyahut da eklemelerde bulunabilir. Bu durumda Gizlilik Politikası’nın söz konusu değişiklikleri yansıtan güncellenmiş halini yükleyecektir. İşbu sebeple güncellenen Gizlilik Politikası hakkında okurların bilgi sahibi olduklarını periyodik olarak gözden geçirmesini öneririz.</p><p>MediaCat, okurlarının izniyle Kişisel Bilgileri aşağıdaki amaçlar için kullanacaktır, hiçbir durumda öngörülen amacın dışında kullanmayacaktır.</p><ul><li>Elektronik yayınlar göndermek</li><li>Elektronik posta ile bülten göndermek ya da bildirimler de bulunmak</li><li>Satın alınan ürünleri teslim etmek</li><li>Sorularınızı cevaplamak ve etkin bir müşteri hizmeti sunmak</li></ul><p>Bu amaç için elde edilen bilgiler, tamamen sizin özgür iradenizle tarafımıza sağlanmaktadır. Bu Kişisel Bilgileri bize verip vermemekte okurlar serbesttir. Ancak, okurlarımıza daha çabuk ve kaliteli hizmet sunabilmemiz için, işbu platformda okurlardan talep edilen bilgilerin tamamını vermelerini önermekteyiz. Ayrıca, talep edilen hizmetin gerektirdiği zorunlu bilgilerin verilmemesi durumunda talebin yerine getirilmesinin mümkün olamayacağını dikkatlerinize sunarız. Okurlar tarafından verilen bilgilerin doğru ve eksiksiz olması okurların sorumluluğundadır. Yanlış, yanıltıcı veya eksik bilgi verilmemesi rica olunur. Böyle bir durumda MediaCat hiçbir sorumluluk kabul etmeyecektir. Yanlış, yanıltıcı veya eksik bilgi verilmesi nedeniyle MediaCat’in bir zarara uğraması halinde bu zararı tazmin yükümlülüğü okura aittir.</p><p>Kişisel Bilgilere ek olarak platform okurlar tarafından ziyaret edildiğinde okurlar hakkında başkaca bilgiler de toplanabilir, derlenebilir. Otomatik olarak derlenen teşhis edebilirlik niteliğine sahip olmayan bu bilgiler, cookies adı verilen çeşitli teknolojiler ile derlenmektedir. Cookies, web sitesinden bilgisayarların sabit diskine aktarılan küçük çaplı metin dosyalarıdır. Bu bilgileri sitemizi, ilgilendiğiniz ve ihtiyaç duyduğunuz ürünlerimizi değiştirebilmek için toplamaktayız. Tercihen “cookies” reddetmek veya “cookie” gönderildiğinde ikaz edilmek açısından okurlar kendi web gezginlerini ayarlayabilirler.</p><p>Girilen sitede “cookie”leri reddetmek, sitenin bazı alanlarını gezmeyi veya site ziyaret edildiğinde kişiselleştirilmiş bilgilerin alınmasını engelleyebilir.</p><p>MediaCat toplanan, işlenen ve aktarılan tüm Kişisel Bilgileri korumak için gerekli teknolojik ve kurumsal önlemleri alır ve bu önlemler teknolojik gelişmeye göre sürekli güncellenir ve uyarlanır. İnternet üzerinden iletilen Kişisel Bilgiler’in gizliliği konusunda mutlak bir garanti verilmesinin söz konusu olmadığını hatırlatır, okurlarımıza internet üzerinde Kişisel Bilgiler’ini iletilirken mümkün olan en üst düzey tedbirleri almalarını tavsiye ediyoruz.</p><p>Temin edilen Kişiler Bilgiler servisin hizmet amacına yönelik olup, ilke olarak, üçüncü kişilere satılmaz, kiralanmaz ya da başka şekilde kullandırılmaz ve okurlar bizzat aksini talep etmediği sürece üçüncü kişilerle hiçbir suretle paylaşılmaz. Şu kadar ki, MediaCat yürürlükteki mevzuat uyarınca yetkili, idari ve resmi makamlardan usulüne uygun olarak talep gelmesi halinde okurların kendisinde bulunan bilgilerini ilgili yetkili makamlarla paylaşacaktır.</p><p>MediaCat vereceğiniz destek ile Kişisel Bilgilerinizi daima güncel ve doğru şekilde tutacaktır. Ancak Kişisel Bilgilerinizin silinmesi, değiştirilmesi veyahut da güncellenmesinin gerektirdiği hallerde bizimle irtibata geçmenizi ve isteklerinizi iletmenizi rica ederiz.</p><p><strong>MediaCat</strong></p><p>Kapital Medya Akmerkez E Blok Kat: 6 Etiler/İSTANBUL Telefon: 0212 282 26 40</p>', '', 6, '1', 'gizlilik-kosullari');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `slider_resimyol` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_fiyat` int(11) NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_link` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `slider_durum` enum('1','0') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_fiyat`, `slider_sira`, `slider_link`, `slider_durum`) VALUES
(17, 'Tsuki no Kokyu', 'dimg/slider/215673.jpg', 1500, 1, '', '1'),
(19, 'Flesh Kama', 'dimg/slider/3064645b976a5b3dc83b192f475f5ada74461.jpg', 300, 2, '', '1'),
(20, 'Cryokinesis', 'dimg/slider/319072.jpg', 50, 3, '', '1'),
(21, 'Senbonbari Gyosatsu', 'dimg/slider/257024.jpg', 150, 0, '', '1'),
(23, 'akaza', 'dimg/slider/25592Akaza.webp', 500, 6, '', '1');

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
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
