-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 30 May 2022, 19:57:15
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
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `urun_photo` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_ad` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_seourl` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_detay` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` float(9,2) NOT NULL,
  `urun_video` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_keyword` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `urun_durum` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `urun_onecikar` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kategori_id`, `urun_zaman`, `urun_photo`, `urun_ad`, `urun_seourl`, `urun_detay`, `urun_fiyat`, `urun_video`, `urun_keyword`, `urun_stok`, `urun_durum`, `urun_onecikar`) VALUES
(21, 2, '2022-05-30 17:49:30', 'dimg/urunphoto/28820inosuke.png', 'İnosuke', 'inosuke', '<p><strong>Inosuke is a young man of average heig</strong>ht and pale complexion with an extremely toned and muscular build for his age, possessing large, defined muscles most notably over his stomach and arms. In sharp contrast to this, he has an incredibly pretty and feminine face,<a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Inosuke_Hashibira#cite_note-auto-89bf2c9344e90f94d65df3c943440581-3\">[3]</a> with large, wide eyes that are framed by an array of long eyelashes, their irises a dark to soft pale green, thin eyebrows and what could be a small, well-mannered mouth. His thick, black hair reaches just past his shoulders, fading into blue at the tips and forming an unruly and uneven fringe that falls just above his eyes, puffing out before curving and thinning towards his forehead.</p>', 350.00, 'XL8oFqFuDX4', 'inosuke kny kimetsu no yaiba', 5, '1', '1'),
(22, 2, '2022-05-30 17:59:53', 'dimg/urunphoto/27097obanai.webp', 'Obanai', 'obanai', '<p>Obanai is a fairly muscular man of short stature and a pale complexion. He has straight-edged black hair of varying lengths, the longest reaching down to his shoulders and the shortest stopping at his cheekbones, which he wears down with two shorter strands hanging between his eyes. His eyes are almond-shaped and tilt upwards on the far sides, and are unusual due to Obanai possessing heterochromia—his right eye is yellow and his left eye is turquoise. He is partially blind as he can barely see out of his right eye.<a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Obanai_Iguro#cite_note-auto-8ea79a6f4c454802abe31a4ce7f82879-4\">[4]</a></p>', 250.00, '', 'obanai kimetsu no yaiba', 5, '1', '1'),
(23, 2, '2022-05-30 18:02:07', 'dimg/urunphoto/30443rengoku.png', 'Kyojuro Rengoku', 'kyojuro-rengoku', '<p>Kyojuro was a young adult of tall stature and muscular-athletic build. He is known to be charismatic and has an air of great optimism, having an enthusiastic smile plastered on his face nearly all the time. He had long bright yellow hair with red streaks akin to flames along with two shoulder-length bangs and two chin-length bangs on the side of his head, black forked eyebrows, and golden eyes that fade to red with white pupils.</p>', 500.00, '', 'rengoku kyojuro', 5, '1', '1'),
(24, 2, '2022-05-30 18:03:12', 'dimg/urunphoto/30096sanemi.jpg', 'Sanemi Shinazugawa', 'sanemi-shinazugawa', '<p><strong>Sanemi Shinazugawa</strong> (不死しなず川がわ 実さね弥み <i>Shinazugawa Sanemi</i><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is a major supporting character of <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Kimetsu_no_Yaiba_(Manga)\"><i>Demon Slayer: Kimetsu no Yaiba</i></a>. He is a Demon Slayer of the <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Demon_Slayer_Corps\">Demon Slayer Corps</a> and the current <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Wind_Breathing\">Wind</a> <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Hashira\">Hashira</a> (風かぜ柱ばしら <i>Kaze Bashira</i><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>).<a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Sanemi_Shinazugawa#cite_note-auto-3372407006274575a7006c8ce6701efe-2\">[2]</a></p><p>Sanemi is also the older brother of <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Genya_Shinazugawa\">Genya Shinazugawa</a>, a Demon Slayer who fought alongside <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Tanjiro_Kamado\">Tanjiro Kamado</a> and <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Nezuko_Kamado\">Nezuko Kamado</a>. Before becoming a <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Hashira\">Hashira</a>, Sanemi, along with his partner <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Masachika_Kumeno\">Masachika Kumeno</a>, defeated the former <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Twelve_Kizuki\">Lower Rank One</a>, <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Ubume\">Ubume</a>, with Masachika dying as a result.</p>', 500.00, '', 'sanemi kny kimetsu no yaiba', 5, '1', '1'),
(25, 2, '2022-05-30 18:04:00', 'dimg/urunphoto/30094tanjioru.jpg', 'Tanjiro Kamado', 'tanjiro-kamado', '<figure class=\"table\"><table><tbody><tr><td><i>In order to soothe the spirits of those it killed, and to make sure it claims no further victims... I will swing my blade down and lop off the head of <strong>any</strong> demon without mercy! But... I will not belittle those who regret their actions and suffer over the things they did as demons. Because demons were once human. Because they were like <strong>me</strong>.</i></td><td><strong>”</strong></td></tr><tr><td>&nbsp;</td><td>— <strong>Tanjiro Kamado\'s</strong> ideology about <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Demon\">demons</a> in <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Chapter_43\">To Hell</a></td></tr></tbody></table></figure>', 1000.00, '', 'Tanjiro Kamado kny kimetsu', 5, '1', '1'),
(26, 2, '2022-05-30 18:06:09', 'dimg/urunphoto/24329tengen.jpg', 'Tengen Uzui', 'tengen-uzui', '<p><i>Do I look like someone with any talent? [...] See, this country is vast. It\'s teeming with people who\'d blow your mind. Some are complete enigmas. Some can take up a sword and become a Hashira in two months. Me, chosen? Don\'t give me that crap! Just how many lives do you think I\'ve let slip through my fingers until now?\"</i></p>', 750.00, '', 'tengen uzui', 3, '1', '1'),
(27, 2, '2022-05-30 18:07:08', 'dimg/urunphoto/21488zenitsu.jpg', 'Zenitsu Agatsuma', 'zenitsu-agatsuma', '<figure class=\"table\"><table><tbody><tr><td><i>I hate myself more than anyone. I always think I have to get my act together, but I end up cowering, running away, sniveling. I want to change. I want to be a competent person.</i></td><td><strong>”</strong></td></tr><tr><td>&nbsp;</td><td>— <strong>Zenitsu Agatsuma\'s</strong> desire to change for the better in <a href=\"https://kimetsu-no-yaiba.fandom.com/wiki/Episode_17\">You Must Master a Single Thing</a></td></tr></tbody></table></figure>', 500.00, '', 'Zenitsu Agatsuma kny kimetsu no yaiba', 5, '1', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
