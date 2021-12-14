<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <style>.w3-lobster {font-family: 'Righteous', cursive;}</style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Encurtador Plus</title>
</head>
<body class="w3-light-grey">

    <img src="logo1.svg" alt="logo" class="w3-image w3-display-topmiddle w3-container" style="max-width: 450px;"><br><br><br><br><br><br><br><br>

<?php

if(empty($_POST['url'])){
    include 'form_estatisticas.php';
    echo '
    <div class="w3-center w3-panel w3-orange" style="max-width: 60%;margin-right: auto;margin-left: auto;margin-top:50px;">
    <h3>Ops! Você Não Inseriu A URL.</h3>
    <p>Insira a URL Curta Para Podermos Mostrar as Estatísticas Dela.</p>
    </div>';
    exit();
}

include 'acessobanco.php';
$url = $_POST['url'];
$ref = explode('l=', $url)[1];
$stmt = mysqli_stmt_init($conn);
$sql = "SELECT COUNT(idacesso) FROM acesso WHERE referencia = ?;";
$stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
if ($stmt_prepared_okay) {
    mysqli_stmt_bind_param($stmt, "s", $ref);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $quantidade);
    mysqli_stmt_fetch($stmt);
}

$sql = "SELECT COUNT(idacesso) FROM acesso WHERE referencia = ? AND hora = ?;";
$valores = array();

for($x = 0; $x < 24; $x++){
    $stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
    if ($stmt_prepared_okay) {
        if($x < 10){
            $hora = '0'.strval($x);
            mysqli_stmt_bind_param($stmt, "ss", $ref, $hora);
        }
        else{
            $hora = strval($x);
            mysqli_stmt_bind_param($stmt, "ss", $ref, $hora);
        }
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $result);
    mysqli_stmt_fetch($stmt);
    array_unshift($valores, intval($result));
    }
}


echo '
<div class="w3-center">
    <br>
    <div class="w3-center">
        <p>Veja as Estatísticas de Outra URL <a class="w3-text-blue" href="analise.php" style="text-decoration:none;font-weight:900;">Aqui.</a></p>
    </div><br>
    <p>Link Analisado: '.$url.'</p>
    <h1>Quantidade de Acessos:</h1>
    <p style="font-size: 70px;">'.$quantidade.'</p>
<div id="grafico"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

google.charts.load("current", {packages: ["corechart"]})
          google.charts.setOnLoadCallback(drawChart)

function drawChart() {
    const container = document.querySelector("#grafico")
    const data = new google.visualization.arrayToDataTable([
        ["Hora","Cliques"],
        ["0h",'.$valores[23].'],
        ["1h",'.$valores[22].'],
        ["2h",'.$valores[21].'],
        ["3h",'.$valores[20].'],
        ["4h",'.$valores[19].'],
        ["5h",'.$valores[18].'],
        ["6h",'.$valores[17].'],
        ["7h",'.$valores[16].'],
        ["8h",'.$valores[15].'],
        ["9h",'.$valores[14].'],
        ["10h",'.$valores[13].'],
        ["11h",'.$valores[12].'],
        ["12h",'.$valores[11].'],
        ["13h",'.$valores[10].'],
        ["14h",'.$valores[9].'],
        ["15h",'.$valores[8].'],
        ["16h",'.$valores[7].'],
        ["17h",'.$valores[6].'],
        ["18h",'.$valores[5].'],
        ["19h",'.$valores[4].'],
        ["20h",'.$valores[3].'],
        ["21h",'.$valores[2].'],
        ["22h",'.$valores[1].'],
        ["23h",'.$valores[0].']
    ])
    
    const options = {
        title: "Quantidade de Acessos em Cada Hora do Dia",
        backgroundColor: "transparent",
        height: 700
    };

    const chart = new google.visualization.ColumnChart(container)
    chart.draw(data, options)
}
</script>
</div>';

?>

</body>
</html>