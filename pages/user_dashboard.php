<?php
// pages/user_dashboard.php

global $conn;
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include '../config/db.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<h1>Hoşgeldiniz, <?php echo $user['username']; ?></h1>
<p>Email: <?php echo $user['email']; ?></p>
<p>Kullanıcı Adı: <?php echo $user['username']; ?></p>
<a href="logout.php">Çıkış Yap</a>

<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kullanıcı Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link rel="stylesheet" href="../assets/css/dashboard.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- Sol kolon içeriği -->
                <h2>Profil Bilgileri</h2>
                <p>Burada kullanıcı profil bilgileri yer alacak.</p>
            </div>
            <div class="col-md-6">
                <!-- Sağ kolon içeriği -->
                <h2>Son Etkinlikler</h2>
                <p>Burada kullanıcının son etkinlikleri veya bildirimler yer alacak.</p>
            </div>
        </div>
    </div>
</body>
</html>