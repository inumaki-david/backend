<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulinha em PHP</title>
    <style>
        body {
            text-align: center;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: blue;
        }
        h1 {
            color: red;
        }
        p {
            background-color: yellowgreen;
            color: red;
            font-size: 22px;
        }
        .container {
            background-color: lightpink;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            $empresa = "XPTO123";
            $ano = 2010;
            $funcionario = 25;
            $empresaAtiva = true;

            echo "<h1>$empresa</h1>";
            echo "<p>Ano de Fundação: $ano</p>";
            echo "<p>Funcionários: $funcionario</p>";
            echo "<p>A empresa está: " . ($empresaAtiva ? "Ativada" : "Dasativada")
        ?>
    </div>
</body>
</html>