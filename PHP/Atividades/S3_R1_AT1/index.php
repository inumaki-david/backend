<?php
    $nomeEmpresa = "Galáxia Tour";       
    $anoFundacao = 2024;             
    $avaliacaoMedia = 4.8;               
    $estaAbertaNoMomento = true;           
    $setorAtuacao = "Turismo Espacial";     

    echo "<h1>Perfil da Empresa</h1>";
    echo "<p><strong>Nome:</strong> " . $nomeEmpresa . "</p>";
    echo "<p><strong>Setor:</strong> " . $setorAtuacao . "</p>";
    echo "<p><strong>Fundada em:</strong> " . $anoFundacao . "</p>";
    echo "<p><strong>Avaliação dos Clientes:</strong> " . $avaliacaoMedia . " estrelas</p>";

    echo "<p><strong>Status de Funcionamento:</strong> " . ($estaAbertaNoMomento ? "Aberta agora" : "Fechada") . "</p>";

    echo "<hr>";
    echo "<em>Dados gerados automaticamente pelo sistema de gestão PHP.</em>";
?>