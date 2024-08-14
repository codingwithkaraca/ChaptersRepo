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

/* -- TESTLER -- */


/* TEST 1: sadece makale isminde arama */
SELECT * FROM chapters WHERE chapter_title LIKE '%Climate%';


/* TEST 2: sadece kitap isminde arama */
SELECT * FROM chapters WHERE book_name LIKE '%Carbon%';


/* TEST 3: sadece yazar isminde arama */
SELECT * FROM chapters WHERE chapters.author_name LIKE '%Peter%';


/* TEST 4: sadece yayınevi isminde arama */
SELECT * FROM chapters WHERE chapters.imprint LIKE '%Apple%';


/* TEST 5: sadece özette arama */
SELECT * FROM chapters WHERE chapters.abstract LIKE '%Apple%';


/* TEST 6: sadece isbn no arama */
SELECT * FROM chapters WHERE chapters.ebook_isbn LIKE '%9781315267302%';


/* TEST 7: Tüm alanlarda bir kelime arama */
SELECT *
FROM chapters
WHERE chapter_title LIKE '%Door%'
   OR author_name LIKE '%Door%'
   OR book_name LIKE '%Door%'
   OR imprint LIKE '%Door%'
   OR ebook_isbn LIKE '%Door%'
   OR abstract LIKE '%Door%';


/* queryden gelen metini sdg den gelen değer ile makale isminde de arama */
SELECT * FROM CHAPTERS.chapters WHERE chapter_title LIKE '%Soil%' AND sdg LIKE '%7%';


/* kullanıcının aradığı kelime ve sdg de seçmiş olduğu numarada geçenler */
SELECT * FROM CHAPTERS.chapters
WHERE sdg= '11'
  AND (
    chapter_title LIKE '%Car%'
        OR author_name LIKE '%Car%'
        OR book_name LIKE '%Car%'
        OR imprint LIKE '%Car%'
        OR ebook_isbn LIKE '%Car%'
        OR abstract LIKE '%Car%'
    );


/* Kullanıcının, girilen değeri yazar isminde ve sdg de geçenleri bulması */
SELECT id, chapter_title, author_name, book_name, edition, pub_date, imprint, pages, ebook_isbn, sdg, abstract, url, cover_img, pdf
FROM CHAPTERS.chapters
WHERE chapters.author_name LIKE '%peter%'
  AND sdg = '17';


/* Tablodaki sdg sütununda bulunan "_" leri kaldırma*/
UPDATE CHAPTERS.chapters
SET sdg = REPLACE(sdg, '_', '');


/* kullanıcının girdiği veriyi makale isminde arama ve
   kullanıcın seçtiği sdg değerinde arama(sdg sütunundaki virgüllü "12,13,14" değerlerde de arama)  */
SELECT * FROM CHAPTERS.chapters
WHERE
    chapters.chapter_title LIKE '%a%'
  AND FIND_IN_SET('17', sdg);

