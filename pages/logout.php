<?php
// pages/logout.php

session_start();
session_destroy();
header("Location: login.php");
exit;
?>


<?php
session_start(); // Oturumu başlatır

// Tüm oturum değişkenlerini siler
session_unset();

// Oturumu sonlandırır
session_destroy();

// Giriş sayfasına yönlendirme
header('Location: login.php');
exit();
?>
