<?php
session_start();

// Tüm oturum değişkenlerini temizle
$_SESSION = array();

// Eğer bir oturum cookie'si varsa, onu da sonlandır
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Oturumu tamamen sonlandır
session_destroy();

// Giriş sayfasına yönlendir
header("Location: login.php");
exit();
?>
