<?php
require 'config.php';

$query = $_GET['q'];
$sql = "SELECT books.title, authors.name as author, publishers.name as publisher, books.publication_date 
        FROM books 
        JOIN authors ON books.author_id = authors.id 
        JOIN publishers ON books.publisher_id = publishers.id 
        WHERE books.title LIKE ? OR authors.name LIKE ? OR publishers.name LIKE ?";
$stmt = $pdo->prepare($sql);
$searchTerm = "%$query%";
$stmt->execute([$searchTerm, $searchTerm, $searchTerm]);
$results = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($results);
?>
<?php
