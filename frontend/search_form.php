<main>
    <section id="home" class="search-container">
        <h2>En Güncel Bilimsel Araştırmalara Erişin</h2>
        <form action="./index.php" method="GET">
            <!-- Arama formu-->
            <input type="text" name="query" placeholder="Anahtar kelime, yazar, konu veya isbn no girin" class="search-input">
            <select name="category" class="category-dropdown">
                <option value="all">Tüm Alanlar</option>
                <option value="chapter_title">Makale</option>
                <option value="book_name">Kitap</option>
                <option value="author_name">Yazar</option>
                <option value="imprint">Yayınevi</option>
                <option value="abstract">Özet</option>
                <option value="ebook_isbn">Ebook ISBN</option>
            </select>
            <select id="sdg-select" name="sdg-select">
                <option value="">SDG'ler</option>
                <option value="1">1. Yoksulluğa Son (No Poverty)</option>
                <option value="2">2. Açlığa Son (Zero Hunger)</option>
                <option value="3">3. Sağlıklı ve Kaliteli Yaşam (Good Health and Well-being)</option>
                <option value="4">4. Nitelikli Eğitim (Quality Education)</option>
                <option value="5">5. Toplumsal Cinsiyet Eşitliği (Gender Equality)</option>
                <option value="6">6. Temiz Su ve Sıhhi Koşullar (Clean Water and Sanitation)</option>
                <option value="7">7. Erişilebilir ve Temiz Enerji (Affordable and Clean Energy)</option>
                <option value="8">8. İnsana Yakışır İş ve Ekonomik Büyüme (Decent Work and Economic Growth)</option>
                <option value="9">9. Sanayi, Yenilikçilik ve Altyapı (Industry, Innovation, and Infrastructure)</option>
                <option value="10">10. Eşitsizliklerin Azaltılması (Reduced Inequality)</option>
                <option value="11">11. Sürdürülebilir Şehirler ve Topluluklar (Sustainable Cities and Communities)
                </option>
                <option value="12">12. Sorumlu Üretim ve Tüketim (Responsible Consumption and Production)</option>
                <option value="13">13. İklim Eylemi (Climate Action)</option>
                <option value="14">14. Sudaki Yaşam (Life Below Water)</option>
                <option value="15">15. Karasal Yaşam (Life on Land)</option>
                <option value="16">16. Barış, Adalet ve Güçlü Kurumlar (Peace, Justice, and Strong Institutions)
                </option>
                <option value="17">17. Hedefler İçin Ortaklıklar (Partnerships for the Goals)</option>
            </select>
            <button type="submit" class="search-button">Ara</button>
        </form>
    </section>