<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada em Tabela</title>
    <style>
        table {
            border-collapse: collapse;
            width: 200px;
            margin-top: 20px;
        }
        th, td {
            border: 2px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: lightblue;
        }
    </style>
</head>
<body>
    <?php
        $numero = 100; 
        echo "<h2>Tabuada do número: $numero</h2>";
    ?>
    <table>
        <thead>
            <tr>
                <th>Operação</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i = 1; $i <= 100; $i++) {
                    $resultado = $numero * $i;
                    echo "<tr>";
                    echo "<td>$numero x $i</td>";
                    echo "<td>$resultado</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>