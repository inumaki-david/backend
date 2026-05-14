<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valor = $_POST["valor"] ?? 0;
        $dolar = $_POST["dolar"] ?? 0;
        $result = $valor / $dolar;
        echo "<h2>Resultado da Conversão: </h2>";

        // echo "<p>Valor e Reais (R$):" . number_format($valor,2,",",".") . "</p>";
        // echo "<p><strong>Valor em Tio Patinhas (U$): " . number_format($result,2,".",",") . "</p>";

        $padrao_brasil = numfmt_create("pt_BR", NumberFormatter::CURRENCY);
        $padrao_eua = numfmt_create("en_US", NumberFormatter::CURRENCY);

        echo "<p>Valor em Reais (R$): " . numfmt_format_currency($padrao_brasil, $valor, "BRL") . "</p>";
        echo "<p>Valor em tio Patinhas (U$): " . numfmt_format_currency($padrao_eua, $result, "USD") . "</p>";
    }
?>