<?php


// Veritabanı bağlantısı için gerekli bilgiler
$servername = "localhost"; // Veritabanı sunucusu
$dbname = "CHAPTERS"; // Veritabanı adı
$username = "root"; // Veritabanı kullanıcı adı
$password = ""; // Veritabanı şifresi

// Veritabanına bağlantı oluşturuyoruz
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol ediyoruz
if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Formun submit edilip edilmediğini kontrol edin
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kullanıcıdan gelen form verilerini alıyoruz
    $tckno = $_POST['tckno'] ?? '';
    $password = $_POST['password'] ?? '';

    // Kullanıcının tckno ve password bilgilerini veritabanında arıyoruz
    $sql = "SELECT * FROM users WHERE tckno = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $tckno, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Giriş başarılı
        echo "Giriş başarılı. Hoş geldiniz!";
        // Burada kullanıcıyı bir anasayfaya veya panel sayfasına yönlendirebilirsiniz
    } else {
        // Giriş başarısız
        echo "Geçersiz TC Kimlik No veya Tek Şifre. Lütfen tekrar deneyin.";
    }

    // Veritabanı bağlantısını kapatıyoruz
    $stmt->close();
}

$conn->close();


?>
