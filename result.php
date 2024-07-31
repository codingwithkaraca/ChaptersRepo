<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Search</title>
    <link rel="stylesheet" href="./styles.css">
</head>

<body>

<div class="container">
    <h1>NEU Book Search</h1>
    <input type="text" id="search-input" placeholder="Search for books...">
    <button onclick="searchBooks()">Search</button>
    <div id="results">
        <div class="table-result">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Chapter Title</th>
                    <th scope="col">Author Name</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Edition</th>
                    <th scope="col">Pub. Date</th>
                    <th scope="col">Imprint</th>
                    <th scope="col">Pages</th>
                    <th scope="col">eBook ISBN</th>
                    <th scope="col">Sdg</th>
                    <th scope="col">Abstract</th>
                    <th scope="col">Url</th>
                    <th scope="col">Cover Image</th>
                    <th scope="col">Pdf</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $host = 'localhost';
                $db = 'CHAPTERS';
                $user = 'root';
                $pass = '';

                // Veritabanına bağlan
                $conn = new mysqli($host, $user, $pass, $db);
                if ($conn->connect_error) {
                    die("Bağlantı hatası: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM chapters";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["chapter_title"] . "</td>";
                        echo "<td>" . $row["author_name"] . "</td>";
                        echo "<td>" . $row["book_name"] . "</td>";
                        echo "<td>" . $row["edition"] . "</td>";
                        echo "<td>" . $row["pub_date"] . "</td>";
                        echo "<td>" . $row["imprint"] . "</td>";
                        echo "<td>" . $row["pages"] . "</td>";
                        echo "<td>" . $row["ebook_isbn"] . "</td>";
                        echo "<td>" . $row["sdg"] . "</td>";
                        echo "<td>" . $row["abstract"] . "</td>";
                        echo "<td>" . $row["url"] . "</td>";
                        echo "<td>" . $row["cover_img"] . "</td>";
                        echo "<td>" . $row["pdf"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='14'>Kayıt bulunamadı!</td></tr>";
                }

                $conn->close();
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="./script.js"></script>

</body>

</html>
