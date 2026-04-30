<?php
    function classificarEmpresa($funcionarios) {
        if ($funcionarios < 50 ) {
            return "Pequeno Porte";
        } else {
            return "Médio ou Grande Porte";
        }
    }
    echo classificarEmpresa(30) . "<br>";
    echo classificarEmpresa(120) . "<br>";
?>