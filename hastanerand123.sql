-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 22 Ara 2017, 08:23:32
-- Sunucu sürümü: 10.1.26-MariaDB
-- PHP Sürümü: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hastanerand`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar_poliklinikler`
--

CREATE TABLE `doktorlar_poliklinikler` (
  `id` int(11) NOT NULL,
  `doktor_id` int(11) UNSIGNED NOT NULL,
  `poliklinik_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `doktorlar_poliklinikler`
--

INSERT INTO `doktorlar_poliklinikler` (`id`, `doktor_id`, `poliklinik_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktorlar_tbl`
--

CREATE TABLE `doktorlar_tbl` (
  `doktor_id` int(10) UNSIGNED NOT NULL,
  `doktor_adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `doktorlar_tbl`
--

INSERT INTO `doktorlar_tbl` (`doktor_id`, `doktor_adi`) VALUES
(2, 'Alp Isoren'),
(8, 'Aynur Toprak'),
(6, 'Fatma Topal'),
(7, 'Kaan Soylu'),
(4, 'Mahmut Kara'),
(9, 'Mahmut Tuncer'),
(3, 'Muhammed Ilbeyi'),
(1, 'Muhammet Sari'),
(5, 'Selma Cicek');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicitab`
--

CREATE TABLE `kullanicitab` (
  `id` int(11) UNSIGNED NOT NULL,
  `ad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `tc` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(16) COLLATE utf8_turkish_ci NOT NULL,
  `gsm` varchar(11) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicitab`
--

INSERT INTO `kullanicitab` (`id`, `ad`, `soyad`, `tc`, `sifre`, `gsm`) VALUES
(1, 'Alp', 'İşören', '12345678999', '123456', '05395586233'),
(2, 'Muhammet', 'Sari', '12345678912', '12345', '05395566235'),
(3, 'Muhammet', 'İlbeyi', '12345678988', '1234', '05362143565'),
(4, 'Emre', 'Yurtseven', '98765432100', '1234567', '06986564532'),
(5, 'Nihat Can ', 'KÃ¼rkÃ§Ã¼', '20036547896', '123456', '03654523655'),
(6, 'samsung', 'apple', '55555555555', '1339', '06546469878'),
(7, 'Cafer', 'Korkusuz', '11111111111', '1234567', '05369149805'),
(8, 'CAbir', 'Yesil', '65412398765', '1234', '05364786523'),
(9, 'mesut', 'altuncu', '11111111112', '123', '05396543215'),
(10, 'erdogan', 'gok', '28311308254', '789', '78978978978');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `poliklinik_tbl`
--

CREATE TABLE `poliklinik_tbl` (
  `poliklinik_id` int(10) UNSIGNED NOT NULL,
  `poliklinik_ad` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `poliklinik_tbl`
--

INSERT INTO `poliklinik_tbl` (`poliklinik_id`, `poliklinik_ad`) VALUES
(1, 'Beyin Cerrahisi'),
(2, 'Gogus Hastaliklari'),
(3, 'Goz Hastaliklari'),
(4, 'Kardiyoloji'),
(5, 'Kulak Burun Bogaz'),
(6, 'Noroloji'),
(7, 'Ortopedi'),
(8, 'Plastik Cerrahi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `randevu_tbl`
--

CREATE TABLE `randevu_tbl` (
  `rand_id` int(11) NOT NULL,
  `kullanici_id` int(11) UNSIGNED NOT NULL,
  `doktor_id` int(11) UNSIGNED NOT NULL,
  `pol_id` int(11) UNSIGNED NOT NULL,
  `saat_id` int(11) UNSIGNED NOT NULL,
  `tarih_id` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `randevu_tbl`
--

INSERT INTO `randevu_tbl` (`rand_id`, `kullanici_id`, `doktor_id`, `pol_id`, `saat_id`, `tarih_id`) VALUES
(1, 1, 1, 1, 1, '2017-12-01 00:00:00'),
(17, 1, 1, 1, 3, '2017-12-01 00:00:00'),
(18, 1, 2, 2, 1, '2017-12-07 00:00:00'),
(15, 1, 3, 3, 5, '2017-12-28 00:00:00'),
(10, 1, 8, 8, 4, '2017-12-07 00:00:00'),
(11, 1, 9, 4, 1, '2017-12-01 00:00:00'),
(16, 2, 5, 5, 1, '2017-12-12 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `saatler_tbl`
--

CREATE TABLE `saatler_tbl` (
  `saat_id` int(10) UNSIGNED NOT NULL,
  `saat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `saatler_tbl`
--

INSERT INTO `saatler_tbl` (`saat_id`, `saat`) VALUES
(1, '9.30'),
(2, '10.30'),
(3, '11.30'),
(4, '14.30'),
(5, '15.30\r\n'),
(6, '16:30');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `doktorlar_poliklinikler`
--
ALTER TABLE `doktorlar_poliklinikler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doktor_id` (`doktor_id`),
  ADD KEY `poliklinik_id` (`poliklinik_id`);

--
-- Tablo için indeksler `doktorlar_tbl`
--
ALTER TABLE `doktorlar_tbl`
  ADD PRIMARY KEY (`doktor_id`),
  ADD KEY `doktor_adı` (`doktor_adi`),
  ADD KEY `doktor_adi` (`doktor_adi`);

--
-- Tablo için indeksler `kullanicitab`
--
ALTER TABLE `kullanicitab`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tc` (`tc`);

--
-- Tablo için indeksler `poliklinik_tbl`
--
ALTER TABLE `poliklinik_tbl`
  ADD PRIMARY KEY (`poliklinik_id`),
  ADD KEY `poliklinik_ad` (`poliklinik_ad`);

--
-- Tablo için indeksler `randevu_tbl`
--
ALTER TABLE `randevu_tbl`
  ADD PRIMARY KEY (`rand_id`),
  ADD KEY `kullanıcı_id` (`kullanici_id`,`doktor_id`,`pol_id`,`saat_id`,`tarih_id`),
  ADD KEY `doktor_id` (`doktor_id`),
  ADD KEY `pol_id` (`pol_id`),
  ADD KEY `saat_id` (`saat_id`);

--
-- Tablo için indeksler `saatler_tbl`
--
ALTER TABLE `saatler_tbl`
  ADD PRIMARY KEY (`saat_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `doktorlar_tbl`
--
ALTER TABLE `doktorlar_tbl`
  MODIFY `doktor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicitab`
--
ALTER TABLE `kullanicitab`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `poliklinik_tbl`
--
ALTER TABLE `poliklinik_tbl`
  MODIFY `poliklinik_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `randevu_tbl`
--
ALTER TABLE `randevu_tbl`
  MODIFY `rand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `saatler_tbl`
--
ALTER TABLE `saatler_tbl`
  MODIFY `saat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `doktorlar_poliklinikler`
--
ALTER TABLE `doktorlar_poliklinikler`
  ADD CONSTRAINT `doktorlar_poliklinikler_ibfk_1` FOREIGN KEY (`poliklinik_id`) REFERENCES `poliklinik_tbl` (`poliklinik_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doktorlar_poliklinikler_ibfk_2` FOREIGN KEY (`doktor_id`) REFERENCES `doktorlar_tbl` (`doktor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `randevu_tbl`
--
ALTER TABLE `randevu_tbl`
  ADD CONSTRAINT `randevu_tbl_ibfk_1` FOREIGN KEY (`doktor_id`) REFERENCES `doktorlar_tbl` (`doktor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `randevu_tbl_ibfk_2` FOREIGN KEY (`pol_id`) REFERENCES `poliklinik_tbl` (`poliklinik_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `randevu_tbl_ibfk_3` FOREIGN KEY (`saat_id`) REFERENCES `saatler_tbl` (`saat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `randevu_tbl_ibfk_4` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanicitab` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
