<?php
$host = "localhost";
$user = "root";       
$pass = "";           
$db = "forum_db"; 

$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
    die(" Błąd połączenia z bazą danych: " . $conn->connect_error);
}
?>

