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



$query = isset($_GET['query']) ? $_GET['query'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : 'all';

$sql = "SELECT id, chapter_title, author_name, book_name, edition, pub_date, imprint, pages, ebook_isbn, sdg, abstract, url, cover_img, pdf FROM chapters";

if ($query != '') {
    if ($category == 'all') {
        $sql .= " WHERE chapter_title LIKE '%$query%' OR author_name LIKE '%$query%' OR book_name LIKE '%$query%' OR imprint LIKE '%$query%' OR ebook_isbn LIKE '%$query%' OR abstract LIKE '%$query%' ";
    } else {
        $sql .= " WHERE $category LIKE '%$query%'";
    }
}

$result = $connect->query($sql);

$num_rows = $result->num_rows;



include 'header.php';
include 'nav.php';
include 'search_form.php';
include 'articles.php';
include 'footer.php';

?>










