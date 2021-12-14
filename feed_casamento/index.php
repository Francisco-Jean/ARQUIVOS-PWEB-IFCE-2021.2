<?php

#php -S localhost:8000

session_start();
if(isset($_POST['item1']) && $_POST['item2']) {
    $_SESSION["item1"] = $_POST['item1'];
    $_SESSION["item2"] = $_POST['item2'];
    header("Location: resultado.php");
}
?>

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
                <a href="http://francisco-jean-p8.epizy.com/feed_casamento/vizu_feed.php">CLIQUE AQUI PARA VER O FEED</a>
        </div>
        </div>

        <form action="http://francisco-jean-p8.epizy.com/feed_casamento/feed.php" method="post">
            <div class="row">
                <div class="col-12">
                    <h3>Nome: <input type="text" name="nome"> </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3>Você é convidado da(o):</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="radio" id="noiva" name="item1"
            value="noiva"> Noiva
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="radio" id="noivo" name="item1"
            value="noivo"> Noivo
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h3>Mensagem de felicitações: <input type="text" name="mensagem"> </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <h3>Escolha uma imagem:</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input type="radio" id="img1" name="item2"
            value="imagem1.webp"> Imagem1
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="radio" id="img2" name="item2"
            value="imagem2.webp"> Imagem2
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="radio" id="img3" name="item2"
            value="imagem3.webp"> Imagem3
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="radio" id="img4" name="item2"
            value="imagem4.webp"> Imagem4
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="radio" id="img5" name="item2"
            value="imagem5.webp"> Imagem5
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="radio" id="img6" name="item2"
            value="imagem6.webp"> Imagem6
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <input type="submit" value="Enviar" />
                </div>
            </div>
        </form>
    </body>