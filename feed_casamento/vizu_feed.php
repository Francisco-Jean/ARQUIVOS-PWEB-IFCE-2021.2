<?php

$servername = "sql109.epizy.com";
$username = "epiz_29610605";
$password = "mvvLZs0gbOFC9nK"; 
$dbname = "epiz_29610605_Feed";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM CONVIDADO";

$result = mysqli_query($conn, $sql);

echo('
<html lang="pt-br">
    <head>
        <title>Feed de Casamento</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,
initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="estilo.css"
media="screen" />
    </head>
    <body>
        <div class="row">
            <div class="col-12">
                <h1>Feed de Casamento</h1>
            </div>
        </div>
        
        <div class="row2">
            <div class="col-12">
                <a href="http://francisco-jean-p8.epizy.com/feed_casamento">CLIQUE AQUI PARA ESCREVER UMA MENSAGEM</a>
        </div>
        </div>');


while ($row = mysqli_fetch_assoc($result)) {
        echo('
        <div class="msg">
            <div class="row">
                <div class="col-12">
                        <h3>Usuário:<br></h3>
                        <p>'.$row["nome"].'</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <h3>Imagem escolhida: </h3>
                    <img src="'.$row["imagem"].'" alt="">
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                        <h3>Mensagem:</h3>
                        <p>'.$row["mensagem"].'</p>
                </div>
            </div>
        </div>');
}

$q1 = "SELECT count(nome) as TOTAL FROM CONVIDADO;";
$q2 = "SELECT count(nome) as CNOIVA FROM CONVIDADO WHERE convidante = 'noiva';";

$result1 = mysqli_query($conn, $q1);
$result2 = mysqli_query($conn, $q2);

$row1 = mysqli_fetch_assoc($result1);
$row2 = mysqli_fetch_assoc($result2);
$CNOIVO = $row1["TOTAL"] - $row2["CNOIVA"];

echo('          
        <div class="row">
            <div class="col-12">
                <h1>Estatísticas</h1>
            </div>
        </div>
        <div class="row">
            <div class=col-12>
                <table>
                    <tr>
                        <th>TOTAL DE MENSAGENS</th>
                        <th>CONVIDADOS DA NOIVA</th>
                        <th>CONVIDADOS DO NOIVO</th>
                    </tr>

                    <tr>
                        <td>&nbsp;&nbsp;'.$row1["TOTAL"].'&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;'.$row2["CNOIVA"].'&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;'.$CNOIVO.'&nbsp;&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
    </body>');

mysqli_free_result($result); 
mysqli_free_result($result1); 
mysqli_free_result($result2); 
mysqli_close($conn);
?>
