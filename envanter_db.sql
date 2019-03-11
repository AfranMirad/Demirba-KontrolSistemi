-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Ara 2018, 15:08:18
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `envanter_db`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `departman`
--

CREATE TABLE `departman` (
  `departman_id` int(11) NOT NULL,
  `departman_adi` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `departman_yetkili_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `departman`
--

INSERT INTO `departman` (`departman_id`, `departman_adi`, `departman_yetkili_id`) VALUES
(1, 'Muhasebe', 15),
(2, 'Bilgi İşlem', 14),
(3, 'Pazarlama', NULL),
(4, 'İnsan kaynakları', NULL),
(5, 'Gümrük', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personel`
--

CREATE TABLE `personel` (
  `personel_id` int(11) NOT NULL,
  `personel_adi` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `personel_soyadi` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `personel_tel` varchar(20) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `personel_adres` varchar(150) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `departman_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `personel`
--

INSERT INTO `personel` (`personel_id`, `personel_adi`, `personel_soyadi`, `personel_tel`, `personel_adres`, `departman_id`) VALUES
(14, 'YUSUF', 'DEDE', '5550011498', 'cumhuriyet mh. demirel sk. no:97/6', 2),
(15, 'AFRAN', 'MİRAD', '5473253366', 'cumhuriyet mh. demirel sk. no:97/6', 2),
(16, 'Fatih', 'Yücalar', '5325500040', 'Yalı Mah. Hamam Sk.', 2),
(17, 'Şenol Zafer', 'Erdoğan', '5326208778', 'Nurtepe Mah. ', 3),
(18, 'Seden ', 'Nurhan', '5059001122', 'Şifa Mah. ', 4),
(19, 'Ahmet', 'Yalçın', '5444908888', 'Osmanağa Mah. ', 5),
(20, 'Erdal', 'Ateş', '5052116654', 'Feyzullah Mah.', 4),
(21, 'Sema', 'Alptekin', '5356008009', 'Abbasağa Mah.', 5),
(22, 'Serpil', 'Okumuş', '5509111030', 'Akatlar Mah.', 1),
(23, 'Hale', 'Soygazi', '5327154045', 'Kanlıca Mah. ', 1),
(24, 'İzzet', 'Tamer', '5553008585', 'Cevizli Mah. ', 1),
(25, 'Şamil', 'Taytar', '5073456060', 'Harbiye Mah.', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satinalma`
--

CREATE TABLE `satinalma` (
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) DEFAULT NULL,
  `satin_alma_tarih` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tedarik_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `satinalma`
--

INSERT INTO `satinalma` (`siparis_id`, `urun_id`, `satin_alma_tarih`, `user_id`, `tedarik_id`) VALUES
(5, 1, '2018-12-21', 5, 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok`
--

CREATE TABLE `stok` (
  `urun_miktar` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `stok`
--

INSERT INTO `stok` (`urun_miktar`, `urun_id`) VALUES
(10, 2),
(2, 15),
(2, 15);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tedarik`
--

CREATE TABLE `tedarik` (
  `tedarik_id` int(11) NOT NULL,
  `tedarik_adi` varchar(60) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `tedarik_tel` varchar(20) COLLATE utf8mb4_turkish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `tedarik`
--

INSERT INTO `tedarik` (`tedarik_id`, `tedarik_adi`, `tedarik_tel`) VALUES
(1, 'Asus', '2364785522'),
(2, 'Casper', '2243698574'),
(3, 'ESCOM BİLİŞİM', '2124458755'),
(4, 'ÖZSAN ELEKTRİK OTOMASYON - DAVUT ÖZTÜRK', '2243698547'),
(5, 'PROTOSİS TEKNOLOJİ', '02124655155'),
(6, 'MERTİZ TEKNOLOJİ', '08508406042'),
(7, 'DESTEK DANIŞMANLIK', '5544561234'),
(8, 'APPLE STORE ZORLU CENTER', '02127083700'),
(9, 'ERVATEK', '5385269857'),
(10, 'ANTARES BİLGİSAYAR VE İLETİŞİM', '8503659977');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `urun_adi` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `birim_fiyati` float DEFAULT NULL,
  `urun_durumu` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `urun_adi`, `birim_fiyati`, `urun_durumu`) VALUES
(1, 'HP15-BS102NT CORE İ5 8250U 1.6GHZ-4GB-1TB-15.6\"-2GB-W10 NOTEBOOK', 3.999, 0),
(2, 'DELL INSPIRON 13 7380 INTEL® CORE™ i7 8565U 1.8GHZ-8GB-256GB SSD-INT-13.3\"W10', 6.952, 0),
(3, 'HP 15-RB006NT AMD A6-9220 2.5GHZ-4GB-500GB-15.6\"AMD-W10 NOTEBOOK', 2.292, 1),
(4, 'HP 15-BS153NT CORE İ3 5005U 2GHZ-4GB-1TB-15.6\"-INT-W10 NOTEBOOK', 2.838, 3),
(5, 'MACBOOK AIR MRE82TU/A CORE İ5 1.6GHZ-8GB-128GBSSD-RETİNA-13.3\"-INT-SPACE GREY', 9.199, 1),
(6, 'Asus Vivobook X540YA-XO185D E1-7010 1.50GHz 2GB 500GB 15.6', 1.167, 0),
(7, 'İzoly M189 İ5-560m 3.20Ghz 8GB 320GB 18.5 Masaüstü Bilgisayar', 1999, 3),
(8, 'İNTEL İ5 (Turbo 3.07Ghz ) 18.5\" Monitörlü Masaüstü Bilgisayar', 1.08, 0),
(9, 'Lenovo AIO V410Z 10QW0010TX İ3-7100T 4Gb 1Tb 21.5\" All İn One Pc', 2.829, 3),
(15, 'Monster Semruk S7 V6.1.1 Intel Core i7 8700K 64GB 11TB SSD GTX1080 SLI Windows 10 Home 17.3\" UHD Taş', 12500000, 0),
(16, 'Dell Alienware 17 Intel Core i9 8950HK 32GB 1TB + 512 GB SSD 4K Ekran GTX1080 Windows 10 Home 17.3\'\'', 49.499, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunparca`
--

CREATE TABLE `urunparca` (
  `urunparca_id` int(11) NOT NULL,
  `urun_id` int(11) DEFAULT NULL,
  `urun_parca_adi` varchar(100) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `pbirim_fiyati` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunparca`
--

INSERT INTO `urunparca` (`urunparca_id`, `urun_id`, `urun_parca_adi`, `pbirim_fiyati`) VALUES
(1, 2, 'GSKILL 8GB Value DDR3 1333MHz CL9 Notebook Ram', 400),
(2, 1, 'Crucial 8GB Ballistix Sport LT DDR4 2666Mhz CL16 1.2V SO-DIMM Notebook Ram', 577),
(3, 2, 'GSKILL 4GB Value DDR3 1333MHz CL9 Tek Modül Notebook Ram', 217),
(4, 3, 'KINGSTON 2GB DDR2 800MHz CL6 Notebook Ram', 265),
(5, 5, 'Corsair 16GB (2x8GB) DDR3L 1600MHz SO-DIMM CMSA16GX3M2A1600C11 RAM', 612),
(6, 6, 'ASUS X550VX CORE İ7   8gb Ddr3 Ram Notebook Bellek', 299),
(7, 1, 'HP 15-r209nt (L0F12EA) 8gb Ddr3 Ram Notebook Bellek', 299),
(9, 15, 'MONSTER 8GB 1600MHZ DDR3 1.35V NOTEBOOK RAM', 289.09),
(10, 1, 'SanDisk SSD Plus 120GB 530MB-400MB/s Sata 3 2.5 SSD SDSSDA-120', 145),
(12, 8, 'SanDisk SSD Plus 120GB 530MB-400MB/s Sata 3 2.5 SSD SDSSDA-140', 111),
(13, 5, 'Kingston SSD Plus 120GB 530MB-400MB/s Sata 3 2.5 SSD SDSSDA-160', 300),
(14, 1, 'DDR4OOOOOOOOOOOOOOOOIIIIIIIIIIIIIIIIIIIJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJHHHHHHHHHHHHHHHHHHHHHHHHGGGGGGG', 0),
(15, 1, 'DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSDFFFFFFFFFFF', 3.40282e38);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_mail` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `user_password` varchar(50) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `personel_id` int(11) NOT NULL,
  `user_role` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`user_id`, `user_mail`, `user_password`, `personel_id`, `user_role`) VALUES
(5, 'admin@kaizertech.com', '0192023a7bbd73250516f069df18b500', 14, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `zimmetle`
--

CREATE TABLE `zimmetle` (
  `zimmet_id` int(11) NOT NULL,
  `urun_id` int(11) DEFAULT NULL,
  `personel_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `zimmet_tarih` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `zimmetle`
--

INSERT INTO `zimmetle` (`zimmet_id`, `urun_id`, `personel_id`, `user_id`, `zimmet_tarih`) VALUES
(3, 5, 16, 5, '2018-12-30'),
(11, 8, 25, 5, '2018-12-20');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `departman`
--
ALTER TABLE `departman`
  ADD PRIMARY KEY (`departman_id`),
  ADD KEY `departman_yetkili_id` (`departman_yetkili_id`);

--
-- Tablo için indeksler `personel`
--
ALTER TABLE `personel`
  ADD PRIMARY KEY (`personel_id`),
  ADD KEY `fk_departman_id` (`departman_id`);

--
-- Tablo için indeksler `satinalma`
--
ALTER TABLE `satinalma`
  ADD PRIMARY KEY (`siparis_id`),
  ADD KEY `fk_urun_id` (`urun_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `tedarik_id` (`tedarik_id`);

--
-- Tablo için indeksler `stok`
--
ALTER TABLE `stok`
  ADD KEY `urun_id` (`urun_id`);

--
-- Tablo için indeksler `tedarik`
--
ALTER TABLE `tedarik`
  ADD PRIMARY KEY (`tedarik_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `urunparca`
--
ALTER TABLE `urunparca`
  ADD PRIMARY KEY (`urunparca_id`),
  ADD KEY `urun_id` (`urun_id`,`urun_parca_adi`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_personel_id` (`personel_id`);

--
-- Tablo için indeksler `zimmetle`
--
ALTER TABLE `zimmetle`
  ADD PRIMARY KEY (`zimmet_id`),
  ADD KEY `urun_id` (`urun_id`,`personel_id`),
  ADD KEY `personel_id` (`personel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `departman`
--
ALTER TABLE `departman`
  MODIFY `departman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `personel`
--
ALTER TABLE `personel`
  MODIFY `personel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `satinalma`
--
ALTER TABLE `satinalma`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `tedarik`
--
ALTER TABLE `tedarik`
  MODIFY `tedarik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `urunparca`
--
ALTER TABLE `urunparca`
  MODIFY `urunparca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `zimmetle`
--
ALTER TABLE `zimmetle`
  MODIFY `zimmet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `departman`
--
ALTER TABLE `departman`
  ADD CONSTRAINT `departman_ibfk_1` FOREIGN KEY (`departman_yetkili_id`) REFERENCES `personel` (`personel_id`);

--
-- Tablo kısıtlamaları `personel`
--
ALTER TABLE `personel`
  ADD CONSTRAINT `fk_departman_id` FOREIGN KEY (`departman_id`) REFERENCES `departman` (`departman_id`);

--
-- Tablo kısıtlamaları `satinalma`
--
ALTER TABLE `satinalma`
  ADD CONSTRAINT `fk_urun_id` FOREIGN KEY (`urun_id`) REFERENCES `urun` (`urun_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `satinalma_ibfk_1` FOREIGN KEY (`tedarik_id`) REFERENCES `tedarik` (`tedarik_id`);

--
-- Tablo kısıtlamaları `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`urun_id`) REFERENCES `urun` (`urun_id`);

--
-- Tablo kısıtlamaları `urunparca`
--
ALTER TABLE `urunparca`
  ADD CONSTRAINT `urunparca_ibfk_1` FOREIGN KEY (`urun_id`) REFERENCES `urun` (`urun_id`);

--
-- Tablo kısıtlamaları `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_personel_id` FOREIGN KEY (`personel_id`) REFERENCES `personel` (`personel_id`);

--
-- Tablo kısıtlamaları `zimmetle`
--
ALTER TABLE `zimmetle`
  ADD CONSTRAINT `zimmetle_ibfk_1` FOREIGN KEY (`urun_id`) REFERENCES `urun` (`urun_id`),
  ADD CONSTRAINT `zimmetle_ibfk_2` FOREIGN KEY (`personel_id`) REFERENCES `personel` (`personel_id`),
  ADD CONSTRAINT `zimmetle_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
