<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Salário</title>
    <style>
        :root {
            --fundo-pagina: #0f172a;
            --fundo-caixa: #1e293b;
            --cor-neon: #00b4d8;
            --cor-caixas: #334155; 
            --cor-sucesso: #48cae4;
            --texto-claro: #f8fafc;
            --texto-branco: #ffffff;
        }
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: var(--fundo-pagina); 
            color: var(--texto-claro);
            margin: 0; padding: 20px; min-height: 100vh;
            display: flex; flex-direction: column; align-items: center; justify-content: center; 
        }
        form, .resultado { 
            background: var(--fundo-caixa); 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4); 
            width: 100%; max-width: 450px; padding: 30px; 
            box-sizing: border-box; 
            margin-bottom: 20px; text-align: center; 
            border: 1px solid rgba(0, 180, 216, 0.1);
        }
        h2 { 
            color: var(--cor-neon); 
            text-transform: uppercase; 
            letter-spacing: 2px; 
            margin-top: 0; 
        }
        label { 
            display: block; 
            margin-bottom: 15px; 
            font-size: 1.1em;
        }
        input[type="number"] {
            width: 100%;            
            box-sizing: border-box; 
            padding: 15px;
            background: var(--cor-caixas);
            border: 2px solid transparent;
            border-radius: 12px;
            color: var(--texto-branco);
            font-size: 1.2em;
            margin-bottom: 20px;
            outline: none;
            transition: all 0.3s ease;
            text-align: center; 
            display: block;  
        }
        input[type="number"]:focus {
            border-color: var(--cor-neon);
            box-shadow: 0 0 15px var(--cor-neon);
        }
        button { 
            width: 100%;
            box-sizing: border-box;
            border-radius: 12px; padding: 15px; font-size: 1em; text-transform: uppercase;
            font-weight: bold; cursor: pointer; border: none; color: var(--texto-branco);
            background: var(--cor-neon); 
            box-shadow: 0 4px 15px rgba(0, 180, 216, 0.4);
            transition: 0.3s ease;
        }
        button:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 6px 20px rgba(0, 180, 216, 0.6); 
        }
        .info-caixa { 
            background: rgba(255,255,255,0.05); 
            border-radius: 12px; padding: 20px; 
            border: 1px solid rgba(72, 202, 228, 0.2);
        }
        .destaque-neon {
            color: var(--cor-sucesso);
            font-size: 1.5em;
            font-weight: bold;
            text-shadow: 0 0 10px var(--cor-sucesso);
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <?php
        // Define o valor do salário mínimo
        $minimo = 1621.00;
        // Pega o valor que o usuário digitou (se não digitou nada, assume 0)
        $salario = $_GET['salario'] ?? 0;
        // Faz as contas básicas
        $quantidade = intdiv($salario, $minimo); // Quantos salários inteiros cabem
        $sobra = $salario - ($quantidade * $minimo); // O que sobra em dinheiro
    ?>
    <div class="caixa-pergunta">
        <form method="get">
            <label>Salário R$:</label>
            <input type="number" name="salario" step="0.01" value="<?= $salario ?>">
            <p>Considerando o salário mínimo de R$ 1.621,00</p>
            <button type="submit">Analisar</button>
        </form>
    </div>
    <div class="caixa-resposta">
        <h2>Análise do Salário</h2>
        <p>Quem recebe um salário de <strong>R$ <?= number_format($salario, 2, ",", ".") ?></strong></p>
        <p>Ganha <strong><?= $quantidade ?></strong> salários mínimos.</p>
        <p>E sobra: <strong>R$ <?= number_format($sobra, 2, ",", ".") ?></strong></p>
    </div>
</body>
</html>