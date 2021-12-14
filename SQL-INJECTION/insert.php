<html>

<head>
<title>BD_01</title>
    <!-- HTML 4 -->
    <!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> -->

  
    <!-- HTML5 -->
    <meta charset="utf-8"/> 
</head>
    
<body> 


<?php

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

//stmt = statment ou comando
//stmt é o comando a ser preparado    
$stmt = mysqli_stmt_init($conn);

//devolve um boolen indicando se a string do stmt está ok
$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO funcionario (nome, salario) VALUES (?, ?)");   

if ($stmt_prepared_okay) {

    /* atribui os parâmetros aos marcadores */
    /*tipos possíveis de marcadores:
      i - integer
      d - double
      s - string
      b - BLOB*/
    mysqli_stmt_bind_param($stmt, "sd", $nome, $salario);
    
    $nome="Maria";
    $salario=4750.00;
    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
	   echo "Os registros foram inseridos com sucesso.";
    } else {
        echo "Não foi possível executar a inserção de ".
             "$nome $salario no banco de dados" . 
             mysqli_error($conn);
        exit;
    }
      mysqli_stmt_close($stmt);
}

/* fecha a conexão */
mysqli_close($conn);    

?>
</body></html>