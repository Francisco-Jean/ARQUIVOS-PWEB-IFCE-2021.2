<script>
    $("#btnCopiar").on('click',function(){var texto = document.getElementById("url"); texto.select(); document.execCommand("copy"); });

    $("#url").on('click',function(){var texto = document.getElementById("url"); texto.select(); document.execCommand("copy"); });
</script>

<div class="w3-center">
    <br>
    <p>Veja as Estatísticas da Sua URL <a class="w3-text-blue" href="analise.php" style="text-decoration:none;font-weight:900;">Aqui.</a></p>
    <p>Encurte Outra URL <a class="w3-text-blue" href="index.php" style="text-decoration:none;font-weight:900;">Aqui.</a></p>
    
</div>