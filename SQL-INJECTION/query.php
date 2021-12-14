<html>
<head>
<title>BD_01</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
    
<body> 


<?php

header('Content-type: text/html; charset=utf-8');
    
//Config. para acesso ao mySql localmente 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hairon"; 

$conn = mysqli_connect($servername, $username, $password);


if (!$conn) {
  die("Falha na Conexão: " . mysqli_connect_error());
}
echo "Conectado com Sucesso <BR><BR>";

// Selecionando banco
if (!mysqli_select_db($conn,$dbname)) {
    echo "Não foi possível selecionar base de dados \"$dbname\": " . mysqli_error($conn);
    exit;
}

$nome = "Maria";
$sql = "SELECT salario FROM funcionario WHERE nome = ? ";

//stmt = statment ou comando
//stmt é o comando a ser preparado    
$stmt = mysqli_stmt_init($conn);    
$stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);    
/* create a prepared statement */
if ($stmt_prepared_okay) {
    /* Liga parametros com os marcadores */
    mysqli_stmt_bind_param($stmt, "s", $nome);

    /* executa a query */
    mysqli_stmt_execute($stmt);

    /* liga as variávais de resultado */
    mysqli_stmt_bind_result($stmt, $salario);

    /* busca os valores */
    mysqli_stmt_fetch($stmt);

    echo "$nome tem salario de $salario";

    /* close statement */
    mysqli_stmt_close($stmt);
}    
    

?>

</body></html> 

