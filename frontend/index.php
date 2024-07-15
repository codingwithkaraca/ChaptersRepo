<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./assets/css/index.css">

    <title>NEU AI</title>
</head>
<body>


<header>
    <h1>NEU AI</h1>
    <p>Akademik Dünya için Kapsamlı Araştırma Platformu</p>
</header>

<nav>
    <ul>
        <li><a href="#home">Ana Sayfa</a></li>
        <li><a href="#search">Arama</a></li>
        <li><a href="#categories">Kategoriler</a></li>
        <li><a href="#about">Hakkımızda</a></li>
    </ul>
</nav>

<main>
    <section id="home" class="search-container">
        <h2>En Güncel Bilimsel Araştırmalara Erişin</h2>
        <form action="/search" method="GET">
            <input type="text" name="query" placeholder="Anahtar kelime, yazar veya konu girin" class="search-input">
            <button type="submit" class="search-button">Ara</button>
        </form>
    </section>

    <section id="featured-articles">
        <h2>Öne Çıkan Makaleler</h2>
        <div class="article-grid">
            <div class="article-card">
                <img src="https://example.com/images/quantum-computing.jpg" alt="İklim değişikliği etkilerini gösteren bir grafik" class="article-image" width="250" height="150">
                <h3>İklim Değişikliğinin Ekonomik Etkileri</h3>
                <p>Yazar: Doç. Dr. Emine Nihan Cici Karaboğa</p>
                <a href="/article/quantum-computing">PDF'i Görüntüle</a>
            </div>
            <div class="article-card">
                <img src="https://example.com/images/ai-ethics.jpg" alt="Yapay Zeka etiği üzerine bir konferans görseli" class="article-image" width="250" height="150">
                <h3>Yapay Zeka ve Etik</h3>
                <p>Yazar: Öğr. Gör. Oğuz Yılmaz</p>
                <a href="/article/ai-ethics">PDF'i Görüntüle</a>
            </div>
            <div class="article-card">
                <img src="https://example.com/images/climate-change.jpg" alt="Kuantum Bilgisayarlar üzerine bir araştırma görseli" class="article-image" width="250" height="150">
                <h3>Kuantum Bilgisayarların Geleceği</h3>
                <p>Yazar: Öğr. Gör. Dr. Mehmet Özkaya</p>
                <a href="/article/climate-economics">PDF'i Görüntüle</a>
            </div>
        </div>
    </section>Ï
</main>

<footer>
    <p>&copy; 2023 NEU.ai - Tüm hakları saklıdır.</p>
</footer>




</body>
</html>