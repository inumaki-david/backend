<?php

    require_once 'connect_postgres.php';

    $sql = "UPDATE alunos SET sobrenome = 'Martins' WHERE id = 1";
    $conexao -> exec($sql);

    echo "Usuário Atualizado."

?>