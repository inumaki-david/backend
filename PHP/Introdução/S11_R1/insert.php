<?php

    require_once 'connect_postgres.php';

    $sql = "INSERT INTO alunos (nome, sobrenome, data_nascimento, turma) VALUES (:nome, :sobrenome, :data_nascimento, :turma)";

    $stmt = $conexao -> prepare($sql);
    $stmt -> bindValue(":nome", "Evelyn");
    $stmt -> bindValue(":sobrenome", "Levindo");
    $stmt -> bindValue(":data_nascimento", "2008-11-11");
    $stmt -> bindValue(":turma", "I2D35");

    $stmt -> execute();

    echo "Aluno inserido com sucesso."


?>