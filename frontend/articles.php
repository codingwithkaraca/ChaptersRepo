<section id="featured-articles">
    <h2>Öne Çıkan Makaleler</h2>
    <h4>Toplam çıkan sonuç sayısı: <?php echo $num_rows  ?></h4>
    <div class="article-grid">

        <?php

        // Arama sonuçları varsa bunları görüntüleme
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { // Her sonuç satırını al
                echo '<div class="article-card">'; // Makale kartı oluştur
                echo '<img src="' . $row["cover_img"] . '"  alt="' . $row["chapter_title"] . '" class="article-image" width="250" height="150">'; // Kapak resmini ekle
                echo '<h3>' . $row["chapter_title"] . '</h3>'; // Bölüm başlığını ekle
                echo '<p>' . $row["author_name"] . '</p>'; // Yazar adını ekle
                echo '<a href="' . $row["url"] . '">PDFi Görüntüle</a>'; // PDF bağlantısını ekle
                echo '</div>';
            }
        } else {
            // Sonuç bulunamazsa mesaj gösterme
            echo "<p>Sonuç bulunamadı</p>";
        }

        // Veritabanı bağlantısını kapatma
        $connect->close();
        ?>

    </div>
</section>

</main>