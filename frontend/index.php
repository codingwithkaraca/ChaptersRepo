<?php

// Veritabanı bağlantı bilgilerini tanımlama
$host = "localhost";
$database = "CHAPTERS";
$username = "root";
$password = "";

//MySQL veritabanına bağlanma
$connect = mysqli_connect($host, $username, $password, $database);

// Bağlantı hatası kontrolü
if (!$connect){
    die("Bağlantı hatası :". mysqli_connect_error());
}

// Arama sorgusunu alma
$search_query = ""; // Varsayılan olarak boş arama sorgusu
$category = ""; // Varsayılan olarak boş kategori
if (isset($_GET['query'])) {
    $search_query = $_GET['query']; // GET parametresinden arama sorgusunu al
}
if (isset($_GET['category'])) {
    $category = $_GET['category']; // GET parametresinden kategori değerini al
}

// SQL sorgusunu tanımlama
$sql = "SELECT id, chapter_title, author_name, book_name, edition, pub_date, imprint, pages, ebook_isbn, sdg, abstract, url, cover_img, pdf FROM chapters WHERE (chapter_title LIKE ? OR author_name LIKE ? OR book_name LIKE ? OR pub_date LIKE ? OR imprint LIKE ? OR ebook_isbn LIKE ?)";

// Arama terimini joker karakterlerle tanımlama
$search_term = '%' . $search_query . '%'; // Arama terimini % ile çevrele

$params = [$search_term, $search_term, $search_term, $search_term, $search_term, $search_term]; // Arama terimlerini diziye ekle

if ($category != 'all') { // Kategori "all" değilse, belirli bir kategori için sorguyu güncelle
    switch ($category) {
        case 'chapter':
            $sql .= " AND book_name LIKE ?"; // Kitap adına göre filtrele
            $params[] = $search_term; // Ek parametre ekle
            break;
        case 'author':
            $sql .= " AND author_name LIKE ?"; // Yazar adına göre filtrele
            $params[] = $search_term; // Ek parametre ekle
            break;
        case 'publisher':
            $sql .= " AND imprint LIKE ?"; // Yayınevine göre filtrele
            $params[] = $search_term; // Ek parametre ekle
            break;
        case 'summary':
            $sql .= " AND abstract LIKE ?"; // Konu başlıklarına göre filtrele
            $params[] = $search_term; // Ek parametre ekle
            break;
    }
}

// SQL sorgusunu hazırlama
$statement = $connect->prepare($sql); // Hazırlanan sorguyu oluştur
$types = str_repeat('s', count($params)); // Parametre türlerini tanımla ('s' string için)

// Hazırlanan sorguya arama terimlerini bağlama
$statement->bind_param($types, ...$params); // Parametreleri bağla

// Sorguyu çalıştırma
$statement->execute(); // Sorguyu çalıştır

// Sorgu sonuçlarını alma
$result = $statement->get_result(); // Sonuçları al

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
            <!-- Arama formu-->
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

            // Arama sonuçları varsa bunları görüntüleme
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { // Her sonuç satırını al
                    echo '<div class="article-card">'; // Makale kartı oluştur
                    echo '<img src="'.$row["cover_img"]. '"  alt="'.$row["chapter_title"].'" class="article-image" width="250" height="150">'; // Kapak resmini ekle
                    echo '<h3>'.$row["chapter_title"].'</h3>'; // Bölüm başlığını ekle
                    echo '<p>'.$row["author_name"]. '</p>'; // Yazar adını ekle
                    echo '<a href="'.$row["url"]. '">PDFi Görüntüle</a>'; // PDF bağlantısını ekle
                    echo '</div>';
                }
            } else {
                // Sonuç bulunamazsa mesaj gösterme
                echo "<p>Sonuç bulunamadı</p>";
            }

            // Veritabanı bağlantısını kapatma
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
