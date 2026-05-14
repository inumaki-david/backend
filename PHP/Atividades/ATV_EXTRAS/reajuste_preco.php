<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Reajustador de Preços</title>
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
            font-family: 'Segoe UI', sans-serif; 
            background-color: var(--fundo-pagina); 
            color: var(--texto-claro);
            margin: 0; padding: 20px; min-height: 100vh;
            display: flex; flex-direction: column; align-items: center; justify-content: center; 
        }

        .container { 
            background: var(--fundo-caixa); 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4); 
            width: 100%; max-width: 450px; padding: 30px; 
            box-sizing: border-box; text-align: center; 
        }

        h1 { color: var(--cor-neon); text-transform: uppercase; letter-spacing: 2px; margin-bottom: 25px; font-size: 1.4em; }

        .form-box { background: var(--cor-caixas); padding: 25px; border-radius: 15px; }

        label { display: block; margin-bottom: 10px; font-size: 0.9em; text-align: left; opacity: 0.9; }

        input[type="number"] {
            width: 100%; padding: 12px; border-radius: 10px; border: 2px solid var(--fundo-pagina);
            background: var(--fundo-caixa); color: white; font-size: 1.1em; margin-bottom: 25px; box-sizing: border-box;
        }

        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            background: transparent;
            margin-bottom: 30px;
        }

        input[type="range"]::-webkit-slider-runnable-track {
            width: 100%; height: 10px; background: var(--fundo-pagina); border-radius: 5px; border: 1px solid var(--cor-caixas);
        }

        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 24px; width: 24px; border-radius: 50%;
            background: var(--cor-neon); cursor: pointer; margin-top: -8px; 
            box-shadow: 0 0 15px var(--cor-neon), 0 0 5px white;
            transition: transform 0.2s;
        }

        input[type="range"]::-webkit-slider-thumb:hover { transform: scale(1.2); }

        .btn-calcular { 
            background: var(--cor-neon); color: var(--texto-branco); border: none;
            border-radius: 12px; padding: 15px; font-size: 1em; text-transform: uppercase;
            font-weight: bold; cursor: pointer; width: 100%; transition: 0.3s; 
            box-shadow: 0 4px 15px rgba(0, 180, 216, 0.4);
        }
        
        .btn-calcular:hover { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0, 180, 216, 0.6); }

        .resultado { 
            margin-top: 20px; background: rgba(72, 202, 228, 0.1); 
            border: 1px solid var(--cor-sucesso); border-radius: 15px; padding: 20px;
            width: 100%; max-width: 450px; box-sizing: border-box; text-align: left;
        }

        .valor-destaque { color: var(--cor-sucesso); font-weight: bold; text-shadow: 0 0 8px var(--cor-sucesso); }
    </style>
</head>
<body>

    <div class="container">
        <h1>Reajustador de Preços</h1>
        <div class="form-box">
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get">
                <label>Preço do Produto (R$):</label>
                <input type="number" name="preco" step="0.01" value="<?= $_GET['preco'] ?? '' ?>" required>

                <label>Percentual: <span id="valorPerc" class="valor-destaque">50</span>%</label>
                <input type="range" name="percentual" id="slider" min="0" max="100" value="<?= $_GET['percentual'] ?? '50' ?>" oninput="atualizar()">

                <button type="submit" class="btn-calcular">Calcular Reajuste</button>
            </form>
        </div>
    </div>

    <?php
    if (isset($_GET['preco']) && isset($_GET['percentual'])) {
        $precoOriginal = (float)$_GET['preco'];
        $porcentagem = (int)$_GET['percentual'];
        
        $valorAumento = ($precoOriginal * $porcentagem) / 100;
        $precoFinal = $precoOriginal + $valorAumento;

        $padraoOriginal = number_format($precoOriginal, 2, ',', '.');
        $padraoFinal = number_format($precoFinal, 2, ',', '.');

        echo "<div class='resultado'>";
        echo "<h2 style='color: var(--cor-neon); margin-top:0;'>Resultado do Reajuste</h2>";
        echo "<p>O produto que custava <span class='valor-destaque'>R$ $padraoOriginal</span>, ";
        echo "com um reajuste de <span class='valor-destaque'>$porcentagem%</span>, ";
        echo "passará a custar <span class='valor-destaque'>R$ $padraoFinal</span>.</p>";
        echo "</div>";
    }
    ?>

    <script>
        function atualizar() {
            let slider = document.getElementById('slider');
            let output = document.getElementById('valorPerc');
            output.innerHTML = slider.value;
        }
        atualizar();
    </script>

</body>
</html>