<!DOCTYPE HTML>  
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>  

http://localhost/ex_form/

exPhpForm.php?

txNome=Carlos&
rdSexo=mas&
txEmail=hairon&txWebsite=www&txAreaComentario=++meu+coment&btnEnviar=Enviar


<?PHP

$nome = $_GET['txNome'];
$sexo = $_GET['rdSexo'];
$email = $_GET['txEmail'];
$webSite = $_GET['txWebsite'];
$comentario = $_GET['txAreaComentario'];

echo "Parâmetros da Requisição: " . "<br> <br>";

echo "Nome: "     . $nome      . "<br>"; 
echo "Sexo: "     . $sexo      . "<br>";
echo "<img src=\"$sexo\" alt=\"$sexo\" width=\"250\" height=\"150\"><br>";
echo "E-mail "    . $email     . "<br>";
echo "Website "   . $webSite   . "<br>";

echo "Comentário $comentario <br>";
echo 'Comentário $comentario <br>';

?>

