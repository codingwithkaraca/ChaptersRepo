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
            $sql .= " AND book_name LIKE ?"; // Kitap adına göre filtrele
            $params[] = $search_term; // Ek parametre ekle
            break;
        case 'authorname':
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
        case 'ebookisbn':
            $sql .= " AND ebook_isbn LIKE ?"; // Konu başlıklarına göre filtrele
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


include 'header.php';
include 'nav.php';
include 'search_form.php';
include 'articles.php';
include 'footer.php';

?>










