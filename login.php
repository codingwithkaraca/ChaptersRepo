<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./assets/bootstrap-4/dist/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/login.css" rel="stylesheet">

    <!-- hCaptcha -->
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>

    <style>
        /* Error message styling */
        #error-message {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>

<body class="text-center">

<form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <img class="mb-4" src="./assets/main/img/logo_v2.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Giriş Yap</h1>
    <label for="inputTC" class="sr-only">TC Kimlik No</label>
    <input type="text" id="inputTC" class="form-control" name="tckno" placeholder="TC Kimlik No" required autofocus>
    <label for="inputPassword" class="sr-only">Tek Şifre</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Tek Şifre" required>

    <div class="h-captcha" data-sitekey="3f92fada-862c-41e0-89d8-a8f235a6a9c4"></div>
    <br>

    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Beni Hatırla
        </label>
    </div>

    <!-- Error message div -->
    <div id="error-message">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Formdan gelen verileri al
            $tckno = $_POST['tckno'];
            $password = $_POST['password'];

            // TC Kimlik No doğrulaması
            if (strlen($tckno) !== 11) {
                echo "TC Kimlik No 11 haneli olmalıdır.";
            } else {
                // Veritabanı bağlantısı
                $servername = "localhost";
                $username = "root";
                $password_db = ""; // Veritabanı şifreniz
                $dbname = "CHAPTERS"; // Veritabanı adınızı girin

                // Bağlantıyı oluştur
                $conn = new mysqli($servername, $username, $password_db, $dbname);

                // Bağlantıyı kontrol et
                if ($conn->connect_error) {
                    die("Bağlantı hatası: " . $conn->connect_error);
                }

                // SQL sorgusu ile kullanıcıyı kontrol et
                $sql = "SELECT * FROM users WHERE tckno = ? AND password = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $tckno, $password);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // Giriş başarılı, admin paneline yönlendir
                    header("Location: ./admin/static/index.html");
                    exit();
                } else {
                    echo "Kullanıcı adı veya şifre hatalı.";
                }

                // Bağlantıyı kapat
                $stmt->close();
                $conn->close();
            }
        }
        ?>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
</form>

</body>
</html>
