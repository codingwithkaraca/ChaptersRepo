<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Login Library</title>

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


    <script>
        // SQL injection için inputu kontrol eden fonksiyon
        function containsSQL(input) {
            var sqlPattern = /(\b(SELECT|UPDATE|DELETE|INSERT|DROP|ALTER|WHERE|AND|OR|UNION)\b|--|;|'|"|`|\b(0x[0-9A-F]+)\b)/i;
            return sqlPattern.test(input);
        }

        // HTML etiketlerini kontrol eden fonksiyon
        function containsHTMLTags(input) {
            var htmlTagPattern = /<[^>]*>/g;
            return htmlTagPattern.test(input);
        }

        // Form doğrulaması
        function validateForm() {
            var tckno = document.getElementById("inputTC").value;
            var password = document.getElementById("inputPassword").value;
            var warningMessage = document.getElementById("error-message");

            if (tckno.trim() === "" || password.trim() === "") {
                warningMessage.innerText = "Lütfen tüm alanları doldurun.";
                warningMessage.style.display = "block";
                return false; // Formun gönderilmesini durdurur
            }

            // TC Kimlik No için SQL ve HTML tag kontrolü
            if (containsSQL(tckno) || containsHTMLTags(tckno)) {
                warningMessage.innerText = "Lütfen geçerli bir TC Kimlik No giriniz.";
                warningMessage.style.display = "block";
                return false; // Formun gönderilmesini durdur
            }

            warningMessage.style.display = "none";
            return true; // Formun gönderilmesine izin verir
        }
    </script>
</head>

<body class="text-center">

<form class="form-signin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" onsubmit="return validateForm();">
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
        session_start();
        require 'db_connection.php';

        $connect = dbConnect();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            // Kullanıcının girdiği değeri temizleyen fonksiyonlar
            function cleanInput($input, $connect) {
                // SQL enjeksiyonlarına karşı koruma
                $input = mysqli_real_escape_string($connect, $input);

                // Sadece TC Kimlik No için HTML etiketlerinden arındırmak için strip_tags kullanımı
                $input = trim(strip_tags($input));

                return $input;
            }

            // Tehlikeli karakter kontrolü (Sadece TC Kimlik No için)
            function containsDangerousChars($input) {
                return preg_match('/[<>{}"\'%;()&+]/', $input);
            }

            $tckno = cleanInput($_POST['tckno'], $connect);
            $password = mysqli_real_escape_string($connect, $_POST['password']); // Şifreyi SQL injectiona karşı temizledik

            if (empty($tckno) || empty($password)) {
                echo "Lütfen tüm alanları doldurun.";
            } elseif (containsDangerousChars($tckno)) {
                echo "TC Kimlik No geçersiz karakter içeriyor.";
            } elseif (!ctype_digit($tckno) || strlen($tckno) !== 11) {
                echo "TC Kimlik No 11 haneli olmalıdır.";
            } else {
                // SQL enjeksiyonuna karşı prepared statements kullanımı
                $sql = "SELECT * FROM users WHERE tckno = ?";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("s", $tckno);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();

                    if ($password === $row['password']) {
                        $_SESSION['loggedin'] = true;
                        $_SESSION['tckno'] = $tckno;

                        // "Beni Hatırla" checkbox'ı işaretli ise cookie ayarla
                        if (isset($_POST['remember-me'])) {
                            setcookie('tckno', $tckno, time() + (86400 * 1), "/"); // 1 günlük cookie
                            setcookie('password', $password, time() + (86400 * 1), "/");
                        }

                        header("Location: ./search.php");
                        exit();
                    } else {
                        echo "Kullanıcı adı veya şifre hatalı.";
                    }
                } else {
                    echo "Kullanıcı adı veya şifre hatalı.";
                }

                $stmt->close();
                $connect->close();
            }
        }
        ?>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
</form>

</body>
</html>
