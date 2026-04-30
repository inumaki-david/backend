<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP</title>
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
    </style>
</head>
<body>
    <?php
        // Função 1: Calcula o valor total (Preço * Quantidade) - Possui Retorno
        function calcularTotal($preco, $quantidade) {
            return $preco * $quantidade;
        }

        // Função 2: Formata a exibição do produto - Reutilizada no loop
        function exibirItem($nome, $valorFinal) {
            echo "<div style='border-bottom: 1px solid #ddd; padding: 10px 0;'>";
            echo "<strong>Produto:</strong> $nome <br>";
            echo "<strong>Total em Estoque:</strong> R$ " . number_format($valorFinal, 2, ',', '.');
            echo "</div>";
        }

        // Dados para processamento
        $produtos = [
            ["nome" => "Monitor OLED", "preco" => 3000, "qtd" => 5],
            ["nome" => "PS5", "preco" => 4500, "qtd" => 2],
            ["nome" => "Notebook", "preco" => 3500, "qtd" => 3],
        ];
    
        foreach ($produtos as $p) {
            // Reutilizando as funções para processar e exibir
            $total = calcularTotal($p["preco"], $p["qtd"]);
            exibirItem($p["nome"], $total);
        }
    ?>
</body>
</html>



