<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; background-color: #f4f4f9; }
        form { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); display: inline-block; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input { padding: 8px; width: 200px; border: 1px solid #ccc; border-radius: 4px; }
        button { padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #218838; }
    </style>
</head>
<body>

    <h2>Conversor de Moedas Dinâmico</h2>
    
    <!-- O 'action' deve ser o nome do ficheiro onde está o teu código PHP -->
    <form action="processa.php" method="POST">
        <div>
            <label for="valor">Valor em Reais (R$):</label>
            <input type="number" step="0.01" name="valor" id="valor" required placeholder="Ex: 100.00">
        </div>

        <div>
            <label for="dolar">Cotação do Dólar (U$):</label>
            <input type="number" step="0.01" name="dolar" id="dolar" required placeholder="Ex: 5.25">
        </div>

        <button type="submit">Converter para Dólar</button>
    </form>

</body>
</html>