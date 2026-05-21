<?php

    $host = "localhost";
    $dbname = "escola";
    $user = "postgres";
    $pass = "postgres";

    try {
        $conexao = new PDO(
            "pgsql:host=$host;
            dbname=$dbname",
            $user,
            $pass
        );
        echo "Conexão com o Postgres Completa! <br>";
    } catch (PDOException $e) {
        echo "Erro: " . $e -> getMessage();
    }

?>