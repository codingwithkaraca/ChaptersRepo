<html><head><base href="#"><title>NEÜ AI - Akademik Araştırma Platformu</title><style>
body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  color: #333;
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}
header {
  background-color: #2c3e50;
  color: #ecf0f1;
  padding: 1rem;
  text-align: center;
}
nav {
  background-color: #34495e;
  padding: 0.5rem;
}
nav ul {
  list-style-type: none;
  padding: 0;
}
nav ul li {
  display: inline;
  margin-right: 10px;
}
nav ul li a {
  color: #ecf0f1;
  text-decoration: none;
}
.search-container {
  background-color: #ecf0f1;
  padding: 2rem;
  border-radius: 5px;
  margin-top: 2rem;
}
.search-input {
  width: 70%;
  padding: 10px;
  font-size: 16px;
}
.search-button {
  padding: 10px 20px;
  background-color: #3498db;
  color: white;
  border: none;
  cursor: pointer;
}
.article-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
  gap: 20px;
  margin-top: 2rem;
}
.article-card {
  border: 1px solid #ddd;
  border-radius: 5px;
  padding: 15px;
  transition: box-shadow 0.3s ease;
}
.article-card:hover {
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.article-image {
  width: 100%;
  height: 150px;
  object-fit: cover;
  border-radius: 5px;
}
footer {
  background-color: #2c3e50;
  color: #ecf0f1;
  text-align: center;
  padding: 1rem;
  margin-top: 2rem;
}
</style></head><body>
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
          <img src="https://example.com/images/quantum-computing.jpg" alt="Kuantum Bilgisayarlar üzerine bir araştırma görseli" class="article-image" width="250" height="150">
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
          <img src="https://example.com/images/climate-change.jpg" alt="İklim değişikliği etkilerini gösteren bir grafik" class="article-image" width="250" height="150">
          <h3>Kuantum Bilgisayarların Geleceği</h3>
          <p>Yazar: Öğr. Gör. Dr. Mehmet Özkaya</p>
          <a href="/article/climate-economics">PDF'i Görüntüle</a>
        </div>
      </div>
    </section>
  </main>
  
  <footer>
    <p>&copy; 2023 Websim.ai - Tüm hakları saklıdır.</p>
  </footer>
</body></html>