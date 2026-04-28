<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Elefante</title>
    <style>
        body {
            background-color: green;
            text-align: center;
        }
        p {
            color: black;
            font-size: 25px;
        }
        .container {
            background-color: blue;
            padding: 10px;
            border-radius: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            $empresa = "LanHouse";
            $funcionariosHomens = 22;
            $funcionariosMulheres = 14;

            $totalFuncionarios = $funcionariosHomens + $funcionariosMulheres;
            $homensAmais = $funcionariosHomens - $funcionariosMulheres;

            $pagamentoIgualitario = false;

            echo "<p>O total de funcionarios da empresa " . $empresa . " é de " . $totalFuncionarios . " funcionários.\n</p>";
            echo "<p>A empresa " . $empresa . " tem " . $homensAmais . " funcionários homens a mais do que mulheres.\n</p>";
            echo "<p>A empresa " . $empresa . " paga igualmente os funcionários homens e mulheres ? " . ($pagamentoIgualitario ? "Sim</p>" : "Não</p>");
        ?>
    </div>
</body>
</html>