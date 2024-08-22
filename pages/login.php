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


<?php
session_start(); // Oturumu başlatır

// Sabit bir kullanıcı bilgisi (Gerçek bir uygulamada bu veritabanından alınır)
$correct_tckno = '12345678901';
$correct_password = '12345';

// Formdan gelen verileri al
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tckno = $_POST['tckno'];
    $password = $_POST['password'];

    // TC Kimlik No ve şifre kontrolü
    if ($tckno == $correct_tckno && $password == $correct_password) {
        // Oturum değişkenlerine değer atama
        $_SESSION['tckno'] = $tckno;
        $_SESSION['logged_in'] = true;

        // Başarılı girişte yönlendirme
        header('Location: dashboard.php');
        exit();
    } else {
        $error_message = "TC Kimlik No veya şifre hatalı.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
</head>
<body>
    <h2>Giriş Yap</h2>
    <?php if (isset($error_message)) { echo '<p style="color:red;">' . $error_message . '</p>'; } ?>
    <form method="post" action="">
        TC Kimlik No: <input type="text" name="tckno" required pattern="\d{11}" title="11 haneli TC Kimlik No giriniz"><br><br>
        Şifre: <input type="password" name="password" required><br><br>
        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>