-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 16 May 2022, 14:47:52
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
  `ayar_logo` varchar(250) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_title` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_description` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_keywords` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_author` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_tel` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_gsm` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_faks` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_mail` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_ilce` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_il` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_adress` varchar(250) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_mesai` varchar(250) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_maps` varchar(250) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_analystic` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_zopim` varchar(250) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_facebook` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_twitter` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_google` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_youtube` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_smtphost` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_smtppassword` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_smtpport` varchar(50) COLLATE utf32_turkish_ci NOT NULL,
  `ayar_bakim` enum('0','1') COLLATE utf32_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_id`, `ayar_logo`, `ayar_title`, `ayar_description`, `ayar_keywords`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_faks`, `ayar_mail`, `ayar_ilce`, `ayar_il`, `ayar_adress`, `ayar_mesai`, `ayar_maps`, `ayar_analystic`, `ayar_zopim`, `ayar_facebook`, `ayar_twitter`, `ayar_google`, `ayar_youtube`, `ayar_smtphost`, `ayar_smtppassword`, `ayar_smtpport`, `ayar_bakim`) VALUES
(0, '', 'Deku E-Ticaret  ', 'Deku First E-Ticaret Scriptim', 'eticaret, shopping, php, learning, student php', 'Deku', '0534 909 0285', '0534 909 0285', '0534 909 0285', 'info@deko.com.tr', 'fatih', 'istanbul', 'fatih yavuzslim', '7 x 24 acik eticaret script', '', '', '', 'www.facebook.com', 'www.twitter.com', 'www..google.com', 'www.youtube.com', 'mail.alanadiniz.com', 'password', ' 587', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayar`
--
ALTER TABLE `ayar`
  ADD PRIMARY KEY (`ayar_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
