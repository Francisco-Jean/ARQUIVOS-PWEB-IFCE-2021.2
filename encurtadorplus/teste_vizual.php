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

    <div class="w3-center">
        <p>Link Analisado: A.com</p>
        <h1>Quantidade de Acessos:</h1>
        <p style="font-size: 70px;">0</p>
        <div id="grafico"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
          google.charts.load('current', {packages: ['corechart']})
          google.charts.setOnLoadCallback(drawChart)

        function drawChart() {
            const container = document.querySelector('#grafico')
            const data = new google.visualization.arrayToDataTable([
                ['Hora','Cliques'],
                ['0h', 100],
                ['1h', 300],
                ['2h', 400],
                ['3h', 100],
                ['4h', 600],
                ['5h', 100],
                ['6h', 300],
                ['7h', 400],
                ['8h', 100],
                ['9h', 600],
                ['10h', 100],
                ['11h', 300],
                ['12h', 400],
                ['13h', 100],
                ['14h', 600],
                ['15h', 100],
                ['16h', 300],
                ['17h', 400],
                ['18h', 1000],
                ['19h', 6000],
                ['20h', 1000],
                ['21h', 300],
                ['22h', 400],
                ['23h', 1000]
            ])

            const options = {
                title: 'Quantidade de Acessos em Cada Hora do Dia',
                height: 700
            }
            const chart = new google.visualization.ColumnChart(container)
            chart.draw(data, options)
        }
      </script>
    </div>

</body>
</html>