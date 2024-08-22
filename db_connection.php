<?php
function dbConnect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "CHAPTERS";

    // mysqli ile veritabanı bağlantısı oluşturma
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Bağlantı hatası kontrolü
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Karakter setini utf8 olarak ayarlama
    $conn->set_charset("utf8");

    return $conn;
}

?>
