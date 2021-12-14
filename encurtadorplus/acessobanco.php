<?php
header('Content-type: text/html; charset=utf-8');
    
$servername = "sql303.epizy.com";
$username = "epiz_30532284";
$password = "f1LoBhPoN3zz3Ya";
$dbname = "epiz_30532284_ENCURTADOR_DB"; 

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
  die("Falha na Conexão: " . mysqli_connect_error());
}
?>