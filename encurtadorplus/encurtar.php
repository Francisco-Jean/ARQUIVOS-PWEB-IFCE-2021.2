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

if(empty($_POST['ul']) or empty($_POST['r'])){
    include 'form_encurtar.php';
    include 'alerta_faltando.php';
}
else{
include 'acessobanco.php';
$ulonga = $_POST['ul'];
$ref = $_POST['r'];
$stmt = mysqli_stmt_init($conn);
$sql = "SELECT idlink FROM link WHERE referencia = ?";
$stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
    if ($stmt_prepared_okay) {
        mysqli_stmt_bind_param($stmt, "s", $ref);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $result);
        if(!mysqli_stmt_fetch($stmt)){
            mysqli_stmt_close($stmt);
            $ucurta = 'encurtadorplus.epizy.com/a.php?l='.$ref;
            $sql = 'INSERT INTO link (url, referencia) VALUES (?,?);';
            $stmt = mysqli_stmt_init($conn);
            $stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);
            if ($stmt_prepared_okay) {
                mysqli_stmt_bind_param($stmt, "ss", $ulonga, $ref);
                $status = mysqli_stmt_execute($stmt);
                if($status){
                    echo '
                    <div class="w3-blue-grey w3-round w3-center" style="height: 150px;width:80%;margin-right: auto;margin-left: 10%;">
                    <h2 class="w3-lobster">Sua URL Curta</h2><br>
                    <div class="" style="display:flex;margin-right: 10%;margin-left: 15%;">
                        <input id="url" class="w3-border w3-white" style="width: 85%;height:39px;text-align: center;padding-top: 8px;font-size:15px;" value="'.$ucurta.'" readonly>
                        <button id="btnCopiar" class="w3-button w3-dark-grey">Copiar</button>
                    </div>
                </div>';

                    include 'encurtado.php';
            
                }
            }
        }
        else{
            include 'form_encurtar.php';
            echo '
                <div class="w3-center w3-panel w3-orange" style="max-width: 60%;margin-right: auto;margin-left: auto;margin-top:50px;">
                <h3>Ops! O link encurtado já existe.</h3>
                <p>Complete o seu link encurtado de outra forma.</p>
                </div>';
                mysqli_stmt_close($stmt);
        }
    }
}


?>



</body>
</html>