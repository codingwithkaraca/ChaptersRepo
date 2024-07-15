-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 03 Haz 2024, 10:33:44
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `CHAPTER`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chapters`
--

CREATE TABLE `chapters` (
  `id` int(11) NOT NULL,
  `chapter_title` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `edition` varchar(255) NOT NULL,
  `pub_date` int(11) NOT NULL,
  `imprint` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `ebook_isbn` varchar(100) NOT NULL,
  `sdg` varchar(100) NOT NULL,
  `abstract` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `cover_img` varchar(255) NOT NULL,
  `pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
