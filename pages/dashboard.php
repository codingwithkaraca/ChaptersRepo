<?php
session_start(); // Oturumu başlatır

// Kullanıcı giriş yapmamışsa yönlendirme
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yönetim Paneli</title>
</head>
<body>
    <h2>Yönetim Paneli</h2>
    <p>Hoş geldin, TC Kimlik No: <?php echo $_SESSION['tckno']; ?>!</p>
    <p><a href="logout.php">Çıkış Yap</a></p>
</body>
</html>