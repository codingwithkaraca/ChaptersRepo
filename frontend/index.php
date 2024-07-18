<?php

// Veritabanı bağlantı bilgilerini tanımlama
$host = "localhost";
$database = "CHAPTERS";
$username = "root";
$password = "";

//MySQL veritabanına bağlanma
$connect = mysqli_connect($host, $username, $password, $database);

// Bağlantı hatası kontrolü
if (!$connect) {
    die("Bağlantı hatası :" . mysqli_connect_error());
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
        case 'bookname':
            $sql .= " book_name LIKE ?"; // Kitap adına göre filtrele
            $params[] = $search_term; // Ek parametre ekle
            break;
        case 'authorname':
            $sql .= " author_name LIKE ?"; // Yazar adına göre filtrele
            $params[] = $search_term; // Ek parametre ekle
            break;
        case 'publisher':
            $sql .= " imprint LIKE ?"; // Yayınevine göre filtrele
            $params[] = $search_term; // Ek parametre ekle
            break;
        case 'summary':
            $sql .= " abstract LIKE ?"; // Konu başlıklarına göre filtrele
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
    <!-- CSS stil kurallarını ekleme -->
    <style>
        /* Genel sayfa stillemesi */
        body, html {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        /* Başlık alanı stillemesi */
        header {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #0b0a0a; /* Arka plan rengi */
            padding: 10px 0; /* Üst ve alt boşluk */
            flex-direction: column;
            text-align: center;
        }

        /* Logo stillemesi */
        .logo {
            height: 80px; /* Logonun yüksekliği */
            width: auto; /* Oranını koruması için genişliği otomatik */
            margin-bottom: 10px; /* Logo ve başlık arasına boşluk ekle */
        }

        /* Navigasyon menüsü stillemesi */
        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            background-color: #333; /* Menü öğeleri arasındaki  boşluk */
        }

        nav ul li {
            margin: 0 15px; /* Menü öğeleri arasındaki  boşluk */
        }

        nav ul li a {
            text-decoration: none;
            color: white; /* Menü link rengi */
            padding: 14px 20px; /* Link iç boşlukları */
            display: block;
        }

        nav ul li a:hover {
            background-color: #575757; /* Link üzerine geldiğinde arka plan rengi */
        }

        /* Ana içerik alanı stillemesi */
        main {
            padding: 20px;
        }

        /* Arama kutusu ve düğmeleri stillemesi */
        .search-container {
            text-align: center;
            margin: 20px 0; /* Üst ve alt boşluk */
        }

        .search-input, .category-dropdown, .search-button {
            padding: 10px;
            margin: 10px 5px; /* Kenar boşlukları */
        }

        /* Öne çıkan makaleler alanı stillemesi */
        #featured-articles {
            margin-top: 20px; /* Üst boşluk */
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px; /* Grid öğeleri arası boşluk */
        }

        .article-card {
            border: 1px solid #ddd; /* Makale kartı kenarlık rengi ve kalınlığı */
            padding: 15px; /* İç boşluk */
            text-align: center;
        }

        .article-image {
            max-width: 100%;
            height: auto; /* Resim boyutlandırması */
        }

        /* Sayfa alt kısmı stillemesi */
        footer {
            text-align: center;
            padding: 20px; /* İç boşluk */
            background-color: #f1f1f1; /* Arka plan rengi */
        }
    </style>
</head>
<body>

<header>
    <img src="./assets/images/neü_logo.png" alt="Logo" class="logo"> <!-- Logo resmi -->
    <h1>NEU AI</h1>
    <p>Akademik Dünya için Kapsamlı Araştırma Platformu</p> <!-- Açıklama -->
</header>

<nav>
    <ul>
        <li><a href="./index.php">Ana Sayfa</a></li> <!-- Ana sayfa linki -->
        <li><a href="#search">Arama</a></li> <!-- Arama kısmı linki -->
        <li><a href="#categories">Kategoriler</a></li> <!-- Kategoriler linki -->
        <li><a href="#about">Hakkımızda</a></li> <!-- Hakkımızda linki -->
    </ul>
</nav>

<main>
    <section id="home" class="search-container">
        <h2>En Güncel Bilimsel Araştırmalara Erişin</h2> <!-- Başlık -->
        <form action="./index.php" method="GET">
            <!-- Arama formu-->
            <input type="text" name="query" placeholder="Anahtar kelime, yazar veya konu girin" class="search-input">
            <select name="category" class="category-dropdown">
                <option value="all">Tüm Alanlar</option>
                <option value="bookname">Kitap</option>
                <option value="authorname">Yazar</option>
                <option value="publisher">Yayınevi</option>
                <option value="summary">Özet</option>
            </select>
            <select id="sdg-select" name="sdg-select">
                <!-- Sürdürülebilir Kalkınma Hedefleri -->
                <option value="">SDG'ler</option>
                <option value="1">1. Yoksulluğa Son (No Poverty)</option>
                <option value="2">2. Açlığa Son (Zero Hunger)</option>
                <option value="3">3. Sağlıklı ve Kaliteli Yaşam (Good Health and Well-being)</option>
                <option value="4">4. Nitelikli Eğitim (Quality Education)</option>
                <option value="5">5. Toplumsal Cinsiyet Eşitliği (Gender Equality)</option>
                <option value="6">6. Temiz Su ve Sıhhi Koşullar (Clean Water and Sanitation)</option>
                <option value="7">7. Erişilebilir ve Temiz Enerji (Affordable and Clean Energy)</option>
                <option value="8">8. İnsana Yakışır İş ve Ekonomik Büyüme (Decent Work and Economic Growth)</option>
                <option value="9">9. Sanayi, Yenilikçilik ve Altyapı (Industry, Innovation, and Infrastructure)</option>
                <option value="10">10. Eşitsizliklerin Azaltılması (Reduced Inequality)</option>
                <option value="11">11. Sürdürülebilir Şehirler ve Topluluklar (Sustainable Cities and Communities)
                </option>
                <option value="12">12. Sorumlu Üretim ve Tüketim (Responsible Consumption and Production)</option>
                <option value="13">13. İklim Eylemi (Climate Action)</option>
                <option value="14">14. Sudaki Yaşam (Life Below Water)</option>
                <option value="15">15. Karasal Yaşam (Life on Land)</option>
                <option value="16">16. Barış, Adalet ve Güçlü Kurumlar (Peace, Justice, and Strong Institutions)
                </option>
                <option value="17">17. Hedefler İçin Ortaklıklar (Partnerships for the Goals)</option>
            </select>
            <button type="submit" class="search-button">Ara</button>
        </form>
    </section>

    <section id="featured-articles">
        <h2>Öne Çıkan Makaleler</h2> <!-- Başlık -->
        <div class="article-grid">

            <?php

            // Arama sonuçları varsa bunları görüntüleme
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { // Her sonuç satırını al
                    echo '<div class="article-card">'; // Makale kartı oluştur
                    echo '<img src="' . $row["cover_img"] . '"  alt="' . $row["chapter_title"] . '" class="article-image" width="250" height="150">'; // Kapak resmini ekle
                    echo '<h3>' . $row["chapter_title"] . '</h3>'; // Bölüm başlığını ekle
                    echo '<p>' . $row["author_name"] . '</p>'; // Yazar adını ekle
                    echo '<a href="' . $row["url"] . '">PDFi Görüntüle</a>'; // PDF bağlantısını ekle
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