<?php
// pages/login.php

global $conn;
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kullanıcıyı veritabanında ara
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // Şifreyi doğrula
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['user_id'] = $user['id'];
        header("Location: user_dashboard.php");
        exit;
    } else {
        echo "Kullanıcı adı veya şifre hatalı!";
    }
}
?>

<!-- Giriş Formu -->
<form method="POST" action="">
    <input type="text" name="username" placeholder="Kullanıcı Adı" required>
    <input type="password" name="password" placeholder="Şifre" required>
    <input type="submit" value="Giriş Yap">
</form>