<?php
// pages/register.php

include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Kullanıcı adı veya email zaten var mı kontrol et
    $check_sql = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param('ss', $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Kullanıcı adı veya email zaten kullanılıyor!";
    } else {
        // Yeni kullanıcıyı kaydet
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $username, $email, $password);
        if ($stmt->execute()) {
            echo "Kayıt başarılı! Giriş yapmak için <a href='login.php'>tıklayın</a>.";
        } else {
            echo "Kayıt sırasında bir hata oluştu: " . $conn->error;
        }
    }
}
?>

<!-- Kayıt Formu -->
<form method="POST" action="">
    <input type="text" name="username" placeholder="Kullanıcı Adı" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Şifre" required>
    <input type="submit" value="Kaydol">
</form>