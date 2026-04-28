<?php
    $nomeEmpresa = "Tech Soluções";
    $faturamentoAnual = 250000; 
    $setor = "Tecnologia";      
    $anosNoMercado = 3;

    if ($faturamentoAnual <= 81000) {
        $porte = "MEI";
        $mensagemPorte = "Foco em crescimento inicial.";
    } elseif ($faturamentoAnual > 81000 && $faturamentoAnual <= 360000) {
        $porte = "Microempresa (ME)";
        $mensagemPorte = "Elegível para subsídios estaduais.";
    } else {
        $porte = "Empresa de Pequeno Porte (EPP)";
        $mensagemPorte = "Elegível para linhas de crédito bancário avançadas.";
    }

    switch ($setor) {
        case "Tecnologia":
            $bonusCredito = "20% de bónus por inovação.";
            break;
        case "Indústria":
            $bonusCredito = "15% de bónus para maquinário.";
            break;
        case "Comércio":
            $bonusCredito = "10% de bónus para stock.";
            break;
        default:
            $bonusCredito = "5% de bónus padrão.";
            break;
    }

    echo "<p><b>Porte Classificado:</b> $porte</p>";
    echo "<p><b>Análise de Perfil:</b> $mensagemPorte</p>";
    echo "<p><b>Política de Crédito:</b> $bonusCredito</p>";

    if ($anosNoMercado >= 2) {
        echo "<p style='color: blue;'><b>Status:</b> Empresa Consolidada.</p>";
    } else {
        echo "<p style='color: orange;'><b>Status:</b> Empresa em fase de Startup.</p>";
    }
?>