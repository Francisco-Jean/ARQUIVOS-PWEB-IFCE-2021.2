<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="HTML, tutorial de HTML, HTML básico, tutorial, explicação, logica, programação">
    <meta name="description" content="Um tutorial básico sobre a linguagem de marcação HTM, tags básicas e como avançar no assunto.">
    <title>Aprendendo HTML - Form</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="navbar">
        <button class="lknav" onclick="document.location='index.html'">Início</button>
        <p style="font-size: 25px;">|</p>
        <button class="lknav" onclick="document.location='tags.html'">Tags Básicas</button>
        <p style="font-size: 25px;">|</p>
        <button class="lknav" onclick="document.location='extra.html'">Extra</button>
        <p style="font-size: 25px;">|</p>
        <button class="lknav" onclick="document.location='formulario.html'">Formulário</button>
    </div>

    <div class="modos">

<div>
    <button class="btc" type="button" onclick= "mudarBack()">Ativar Modo claro</button>
</div>

<script>
function mudarBack() {
document.body.style.backgroundImage = "url('back2-invertido.gif')";
document.getElementById("mudei").style.background = 'rgb(150, 150, 150)';
}
</script>

<div>
<button class="btc" type="button" onclick="mudarBack2()">Ativar Modo Escuro</button>
</div>

<script>
function mudarBack2() {
document.body.style.backgroundImage = "url('back2.gif')";
document.getElementById("mudei").style.background = 'white';
}
</script>

</div>


    <div>
        <div class="tt10" style="width: 50%;height: 100px;">
            <h1 style="font-size: 35px;">Resposta do Formulário</h1>
        </div>
    </div>

    <div class="conteiner">
        <div>
            <h2 class="resp">
            Solicitação concluída. <br>
            </h2> 

            <?php echo $_GET["name"]; ?>
            , gostamos de saber que você tem <?php echo $_GET["idade"]; ?> anos! Navegue mais pelo nosso site e veja nosso conteúdo sobre HTML.
        </div>
        
    </div>

</body>
</html>