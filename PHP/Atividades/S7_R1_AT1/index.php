<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos Array</title>
    <style>
        body { 
            background-color: #323236; 
            padding: 20px; 
        }
        .container {
            width: 450px;
            margin: auto; 
            background: white; 
            padding: 20px; 
            border-radius: 8px; 
        }
        h1 {
            color: #333; 
            border-bottom: 2px solid #007bff; 
            padding-bottom: 10px; 
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td { 
            text-align: left; 
            padding: 12px; 
            border-bottom: 1px solid #ddd; 
        }
        th {
            background-color: #007bff; 
            color: white; 
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Produtos</h1>
    <table>
        <tr>
            <th>Produto</th>
            <th>Setor</th>
            <th>Preço</th>
            <th>Estoque</th>
        </tr>
        <?php
            $funcionarios = [
                ["nome" => "Monitor OLED", "setor" => "Tecnologia", "preco" => 3000, "status" => "Sim"],
                ["nome" => "PS5", "setor" => "Games", "preco" => 4500, "status" => "Sim"],
                ["nome" => "Controle Dual Sense", "setor" => "Games", "preco" => 380, "status" => "Não"],
                ["nome" => "Notebook", "setor" => "Tecnologia", "preco" => 3500, "status" => "Sim"],
            ];
            foreach ($funcionarios as $f) {
                echo "<tr> <td>" . $f["nome"] . "</td> <td>" . $f["setor"] . "</td> <td> R$: " . $f["preco"] . "</td> <td>" . $f["status"] . "</td> </tr>";
            }
        ?>
    </table>
</div>
</body>
</html>