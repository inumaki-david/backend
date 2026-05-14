<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorteador Mega da Virada</title>
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

        form, .resultado, .erro { 
            background: var(--fundo-caixa); 
            border-radius: 20px; 
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4); 
            width: 100%; max-width: 600px; padding: 30px; 
            box-sizing: border-box; margin-bottom: 20px; text-align: center; 
        }

        h2 { color: var(--cor-neon); text-transform: uppercase; letter-spacing: 2px; margin-top: 0; }
        label.titulo { color: var(--texto-claro); font-size: 1.1em; display: block; margin-bottom: 25px; }

        .grid-numeros { 
            display: grid; grid-template-columns: repeat(10, 1fr); gap: 10px; 
            margin-bottom: 30px; 
        }
        
        .checkbox-oculto { display: none; }
        
        .num-label { 
            background: var(--cor-caixas); color: var(--texto-claro); 
            border-radius: 12px; 
            aspect-ratio: 1;    
            display: flex; align-items: center; justify-content: center; 
            cursor: pointer; font-weight: bold; font-size: 1.1em; transition: all 0.3s ease; 
            box-shadow: inset 0 -3px 5px rgba(0,0,0,0.2); 
        }
        
        .checkbox-oculto:checked + .num-label { 
            background: var(--cor-neon); color: var(--texto-branco); 
            box-shadow: 0 0 15px var(--cor-neon), inset 0 -3px 5px rgba(0,0,0,0.2); 
            transform: scale(1.10); 
            border: 1px solid #90e0ef;
        }
        
        .checkbox-oculto:disabled + .num-label { opacity: 0.2; cursor: not-allowed; }

        .botoes-acao { display: flex; gap: 15px; }
        .btn { 
            border-radius: 12px; padding: 15px 25px; font-size: 1em; text-transform: uppercase;
            font-weight: bold; cursor: pointer; flex: 1; text-decoration: none; transition: 0.3s; 
            border: none; color: var(--texto-branco);
        }
        
        .btn-sortear { 
            background: var(--cor-neon); 
            box-shadow: 0 4px 15px rgba(0, 180, 216, 0.4);
        }
        .btn-sortear:hover:not(:disabled) { transform: translateY(-3px); box-shadow: 0 6px 20px rgba(0, 180, 216, 0.6); }
        .btn-sortear:disabled { background: #334155; box-shadow: none; cursor: not-allowed; opacity: 0.5; color: #94a3b8; }
        
        .btn-limpar { background: transparent; border: 2px solid var(--cor-caixas); color: var(--texto-claro); }
        .btn-limpar:hover { background: var(--cor-caixas); }

        .erro { background: #3b1c1c; color: #ff6b6b; border: 1px solid #ff6b6b; }
        .sorteados-txt { font-size: 2em; letter-spacing: 5px; color: var(--cor-sucesso); margin-bottom: 20px; font-weight: bold; text-shadow: 0 0 10px rgba(72, 202, 228, 0.4); }

        .info-caixa { background: rgba(255,255,255,0.05); border-radius: 12px; margin-top: 15px; padding: 20px; }
        .info-titulo { font-size: 0.9em; text-transform: uppercase; color: #94a3b8; margin-bottom: 10px; letter-spacing: 1px; }
        .info-numeros { font-size: 1.4em; letter-spacing: 2px; }

        .info-acertos { border: 1px solid var(--cor-sucesso); background: rgba(72, 202, 228, 0.1); }
        .info-acertos h4 { margin: 0 0 10px 0; font-size: 1.3em; color: var(--cor-sucesso); }
        .numero-destaque { color: var(--cor-sucesso); font-weight: bold; font-size: 1.3em; text-shadow: 0 0 8px var(--cor-sucesso); }
    </style>
</head>
<body>

    <?php
    $numeros_do_utilizador = [];

    if (isset($_POST['sortear'])) {
        $numeros_do_utilizador = isset($_POST['numeros']) ? $_POST['numeros'] : [];
        $quantidade_escolhida = count($numeros_do_utilizador);

        if ($quantidade_escolhida !== 6) {
            echo "<div class='erro'>Atenção: Você deve escolher exatamente 6 números.</div>";
        } else {
            $escolhidos_para_exibir = $numeros_do_utilizador;
            sort($escolhidos_para_exibir); 

            $sorteados = [];
            while(count($sorteados) < 6) {
                $num = mt_rand(1, 60);
                if (!in_array($num, $sorteados)) {
                    $sorteados[] = $num;
                }
            }
            sort($sorteados); 

            $numeros_acertados = array_intersect($escolhidos_para_exibir, $sorteados);
            $quantidade_acertos = count($numeros_acertados); 

            $formatar = function($n) { return str_pad($n, 2, "0", STR_PAD_LEFT); };
            
            $resultado_formatado = implode(" - ", array_map($formatar, $sorteados));
            $escolhidos_formatados = implode(" - ", array_map($formatar, $escolhidos_para_exibir));
            $acertos_formatados = implode(" - ", array_map($formatar, $numeros_acertados));

            echo "<div class='resultado'>";
            echo "<h2>Resultado Oficial</h2>";
            echo "<div class='sorteados-txt'>$resultado_formatado</div>";
            
            echo "<div class='info-caixa'>";
            echo "<div class='info-titulo'>A sua aposta</div>";
            echo "<div class='info-numeros'>$escolhidos_formatados</div>";
            echo "</div>";

            echo "<div class='info-caixa info-acertos'>";
            echo "<h4>Acertou $quantidade_acertos número(s)!</h4>";
            if ($quantidade_acertos > 0) {
                echo "<p>Os números que acertou: <br><span class='numero-destaque'>$acertos_formatados</span></p>";
            } else {
                echo "<p style='color: #94a3b8;'>Que pena! Não houve correspondências desta vez.</p>";
            }
            echo "</div>"; 

            echo "</div>"; 
            $numeros_do_utilizador = [];
        }
    }
    ?>

    <form method="POST" action="">
        <h2>Sorteador Mega da Virada</h2>
        <label class="titulo">Selecione os seus 6 números da sorte:</label>
        
        <div class="grid-numeros">
            <?php for($i = 1; $i <= 60; $i++): ?>
                <?php 
                    $num_formatado = str_pad($i, 2, "0", STR_PAD_LEFT); 
                    $marcado = in_array($i, $numeros_do_utilizador) ? 'checked' : '';
                ?>
                <input type="checkbox" name="numeros[]" id="num_<?php echo $i; ?>" value="<?php echo $i; ?>" class="checkbox-oculto" <?php echo $marcado; ?>>
                <label for="num_<?php echo $i; ?>" class="num-label"><?php echo $num_formatado; ?></label>
            <?php endfor; ?>
        </div>

        <div class="botoes-acao">
            <a href="mega_sena.php" class="btn btn-limpar">Limpar</a>
            <button type="submit" name="sortear" id="btnSortear" class="btn btn-sortear" disabled>Sortear</button>
        </div>
    </form>

    <script>
        const checkboxes = document.querySelectorAll('.checkbox-oculto');
        const btnSortear = document.getElementById('btnSortear');

        function verificarSelecao() {
            let quantidadeMarcada = document.querySelectorAll('.checkbox-oculto:checked').length;

            checkboxes.forEach(function(chk) {
                if (quantidadeMarcada >= 6 && !chk.checked) {
                    chk.disabled = true;
                } else {
                    chk.disabled = false;
                }
            });

            btnSortear.disabled = (quantidadeMarcada !== 6);
        }

        checkboxes.forEach(function(chk) {
            chk.addEventListener('change', verificarSelecao);
        });

        verificarSelecao();
    </script>
</body>
</html>