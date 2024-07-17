<?php


$host = "localhost";
$user = "root";
$password = "";
$database = "Deneme";


$connection = mysqli_connect($host, $user, $password, $database);


if (!$connection){
    echo "Bağlantı hatası var :". mysqli_connect_error();
}
else{
    echo "Bağlantı başarılı <br>";
}

$sql = "SELECT * FROM isimler";

$result = mysqli_query($connection, $sql);

if ($result -> num_rows > 0){


    while($row = mysqli_fetch_assoc($result)){

        // echo $row. " <br>";
        print_r($row);

    }

}




?>