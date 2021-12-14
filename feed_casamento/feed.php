<?php

$servername = "sql109.epizy.com";
$username = "epiz_29610605";
$password = "mvvLZs0gbOFC9nK"; 
$dbname = "epiz_29610605_Feed";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$nome = $_POST["nome"];
$convidante = $_POST["item1"];
$mensagem = $_POST["mensagem"];
$imagem = $_POST["item2"];

$sql = "INSERT INTO CONVIDADO (nome, convidante, mensagem, imagem) VALUES 
    ('$nome', '$convidante', '$mensagem', '$imagem');";

$result = mysqli_query($conn, $sql);


include('vizu_feed.php')

?>

