<?php

$host = "localhost";
$database = "CHAPTERS";
$username = "root";
$password = "";

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect){
    die("Bağlantı hatası :". mysqli_connect_error());
}

$search_query = "";
$category = "";
if (isset($_GET['query'])) {
    $search_query = $_GET['query'];
}
if (isset($_GET['category'])) {
    $category = $_GET['category'];
}

$sql = "SELECT id, chapter_title, author_name, book_name, edition, pub_date, imprint, pages, ebook_isbn, sdg, abstract, url, cover_img, pdf FROM chapters WHERE (chapter_title LIKE ? OR author_name LIKE ? OR book_name LIKE ? OR pub_date LIKE ? OR imprint LIKE ? OR ebook_isbn LIKE ?)";
$search_term = '%' . $search_query . '%';

$params = [$search_term, $search_term, $search_term, $search_term, $search_term, $search_term];

if ($category != 'all') {
    switch ($category) {
        case 'chapter':
            $sql .= " AND book_name LIKE ?";
            $params[] = $search_term;
            break;
        case 'author':
            $sql .= " AND author_name LIKE ?";
            $params[] = $search_term;
            break;
        case 'publisher':
            $sql .= " AND imprint LIKE ?";
            $params[] = $search_term;
            break;
        case 'summary':
            $sql .= " AND abstract LIKE ?";
            $params[] = $search_term;
            break;
    }
}

$statement = $connect->prepare($sql);
$types = str_repeat('s', count($params)); // create a string with 's' repeated for each parameter
$statement->bind_param($types, ...$params);
$statement->execute();
$result = $statement->get_result();

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
        <li><a href="./index.php">Ana Sayfa</a></li>
        <li><a href="#search">Arama</a></li>
        <li><a href="#categories">Kategoriler</a></li>
        <li><a href="#about">Hakkımızda</a></li>
    </ul>
</nav>

<main>
    <section id="home" class="search-container">
        <h2>En Güncel Bilimsel Araştırmalara Erişin</h2>
        <form action="./index.php" method="GET">
            <input type="text" name="query" placeholder="Anahtar kelime, yazar veya konu girin" class="search-input">
            <select name="category" class="category-dropdown">
                <option value="all">Tüm kategoriler</option>
                <option value="chapter">Kitap</option>
                <option value="author">Yazar</option>
                <option value="publisher">Yayınevi</option>
                <option value="summary">Konu başlıkları</option>
            </select>
            <button type="submit" class="search-button">Ara</button>
        </form>
    </section>

    <section id="featured-articles">
        <h2>Öne Çıkan Makaleler</h2>
        <div class="article-grid">

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="article-card">';
                    echo '<img src="'.$row["cover_img"]. '"  alt="'.$row["chapter_title"].'" class="article-image" width="250" height="150">';
                    echo '<h3>'.$row["chapter_title"].'</h3>';
                    echo '<p>'.$row["author_name"]. '</p>';
                    echo '<a href="'.$row["url"]. '">PDFi Görüntüle</a>';
                    echo '</div>';
                }
            } else {
                echo "0 sonuç";
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
