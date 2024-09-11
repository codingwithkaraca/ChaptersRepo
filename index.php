<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEÜ KATALOG TARAMA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #2c3e50;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
        }

        /* Hero Section */
        .hero-section {
            background: url('./assets/images/image5.jpg') no-repeat center center/cover;
            color: white;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }

        .hero-section::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Arka plan resminin üzerine yarı saydam siyah bir örtü */
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2; /* Metin ve butonların arka planın üzerinde olmasını sağlamak için */
        }

        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 30px;
        }

        .hero-section a {
            z-index: 2;
        }

        .feature-box {
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .services-section,
        .testimonials-section {
            background-color: #ecf0f1;
            padding: 50px 0;
        }

        .services-section h2,
        .testimonials-section h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .service-icon,
        .testimonial img {
            margin-bottom: 15px;
        }

        .service-icon {
            font-size: 2.5rem;
            color: #3498db;
        }

        .testimonial {
            text-align: center;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .testimonial img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .testimonial p {
            font-style: italic;
        }

        .footer {
            background-color: #2c3e50;
            color: white;
            padding: 30px 0;
            text-align: center;
        }

        .footer a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">NEÜ KATALOG TARAMA</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Hizmetler</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Referanslar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Giriş Yap</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section">
    <div class="container">
        <h1>Hoş Geldiniz</h1>
        <p>Kütüphane Yönetim Sistemi ile kitaplara hızlı ve kolay erişim sağlayın.</p>
        <a href="./login.php" class="btn btn-primary btn-lg">Giriş Yap</a>
    </div>
</div>

<!-- Services Section -->
<div class="services-section">
    <div class="container">
        <h2>Hizmetlerimiz</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="feature-box text-center">
                    <div class="service-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <h4>Geniş Kitap Koleksiyonu</h4>
                    <p>Kütüphanemizde binlerce kitap bulunuyor. Aradığınız her türlü kitabı burada bulabilirsiniz.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box text-center">
                    <div class="service-icon">
                        <i class="bi bi-laptop"></i>
                    </div>
                    <h4>Kullanıcı Dostu Arayüz</h4>
                    <p>Kütüphane yönetim sistemimiz, kolay ve hızlı kullanım için tasarlanmıştır.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box text-center">
                    <div class="service-icon">
                        <i class="bi bi-calendar"></i>
                    </div>
                    <h4>Online Rezervasyon</h4>
                    <p>Kitapları online olarak rezerve edebilir, ayırabilir ve iade edebilirsiniz.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonials Section -->
<div class="testimonials-section">
    <div class="container">
        <h2>Kullanıcı Yorumları</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="testimonial">
                    <img src="assets/images/users/user1.jpg" alt="Kullanıcı 1" class="img-fluid">
                    <p>"Kütüphane yönetim sistemi harika, istediğim her kitabı kolayca bulabiliyorum!"</p>
                    <h5>Ayşe Yılmaz</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <img src="assets/images/users/user3.jpg" alt="Kullanıcı 2" class="img-fluid">
                    <p>"Online rezervasyon sistemi gerçekten çok kullanışlı."</p>
                    <h5>Mehmet Demir</h5>
                </div>
            </div>
            <div class="col-md-4">
                <div class="testimonial">
                    <img src="assets/images/users/user2.jpg" alt="Kullanıcı 3" class="img-fluid">
                    <p>"Kütüphanenin kullanıcı dostu arayüzü ile aradığım her şeye ulaşabiliyorum."</p>
                    <h5>Fatma Kaya</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <div class="container">
        <p>&copy; 2024 Kütüphane Yönetim Sistemi. Tüm hakları saklıdır. <a href="#">Gizlilik Politikası</a> | <a
                    href="#">Şartlar ve Koşullar</a></p>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>