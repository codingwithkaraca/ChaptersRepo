<?php

$host = "localhost";
$database = "CHAPTERS";
$username = "root";
$password = "";

$connect = mysqli_connect($host, $username, $password, $database);

$sql = "SELECT id,chapter_title, author_name, book_name, edition, pub_date, imprint, pages, ebook_isbn, sdg, abstract, url, cover_img, pdf FROM chapters";

$result = $connect->query($sql);

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/index.css">

    <title>NEU AI</title>
</head>
<body>


<header>
    <h1>NEU AI</h1>
    <p>Akademik Dünya için Kapsamlı Araştırma Platformu</p>
</header>

<nav>
    <ul>
        <li><a href="#home">Ana Sayfa</a></li>
        <li><a href="#search">Arama</a></li>
        <li><a href="#categories">Kategoriler</a></li>
        <li><a href="#about">Hakkımızda</a></li>
    </ul>
</nav>

<main>
    <section id="home" class="search-container">
        <h2>En Güncel Bilimsel Araştırmalara Erişin</h2>
        <form action="/search" method="GET">
            <input type="text" name="query" placeholder="Anahtar kelime, yazar veya konu girin" class="search-input">
            <button type="submit" class="search-button">Ara</button>
        </form>
    </section>

    <section id="featured-articles">
        <h2>Öne Çıkan Makaleler</h2>
        <div class="article-grid">

            <?php


            if ($result -> num_rows > 0){

                while ($row = $result->fetch_assoc()){

                    echo '<div class="article-card">';
                    echo '<img src="'.$row["cover_img"]. '"  alt="'.$row["chapter_title"].'" class="article-image" width="250" height="150">';
                    echo '<h3>'.$row["chapter_title"].'</h3>';
                    echo '<p>'.$row["author_name"]. '</p>';
                    echo '<a href="'.$row["url"]. '">PDFi Görüntüle</a>';
                    echo " </div>";

                    
                }
            }
            else{
                echo "0 sonuc";
            }

            $connect->close();

            ?>
            

        </div>
    </section>
</main>

<footer>
    <p>&copy; 2023 NEU.ai - Tüm hakları saklıdır.</p>
</footer>



</body>
</html>