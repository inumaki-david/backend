<?php
    $totalFuncionarios = 10; 
    $metaVendas = 5;

    echo "<h2>Relatório Automático de Equipe</h2>";
    echo "<p>Gerando dados para $totalFuncionarios colaboradores...</p>";
    echo "<hr>";

    for ($i = 1; $i <= $totalFuncionarios; $i++) {
        echo "Funcionário Id: $i ";
        if ($i % 2 == 0) {
            echo " - Meta Atingida";
        } else {
            echo " - Em processamento";
        }
        echo "<br>";
    }

    echo "<hr>";
    echo "Relatório finalizado com sucesso.";
?>