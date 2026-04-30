<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array com PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 30%;
            margin: 20px 0;
        }
        th, td {
            border: 2px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Salário</th>
        </tr>
        <?php
            $funcionarios = [
                ["nome" => "Davi", "cargo" => "Dev Backend", "salario" => 125000],
                ["nome" => "Rodrigo", "cargo" => "Dev Frontend", "salario" => 8000],
                ["nome" => "Miguel", "cargo" => "Dev Banco de Dados", "salario" => 2500],
                ["nome" => "Eduardo", "cargo" => "Dev Mobile", "salario" => 1200],
                ["nome" => "Evelyn", "cargo" => "Dev Projetos", "salario" => 10000],

            ];

            // echo "<strong>Funcionario: </strong>" . $funcionarios[2]["nome"] . "<br> <strong>Cargo: </strong>" . $funcionarios[2]["cargo"] . "<br>"; 

            foreach ($funcionarios as $f) {
                echo "<tr> <td>" . $f["nome"] . "</td> <td>" . $f["cargo"] . "</td> <td>" . $f["salario"] . "</td> </tr>";
            }
        ?>
    </table>
</body>
</html>