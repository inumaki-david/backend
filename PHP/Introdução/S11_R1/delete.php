<?php

    require_once 'connect_postgres.php';

    $sql = "DELETE FROM alunos WHERE id = 2";
    $conexao -> exec($sql);

    echo "Usuário deletado do planeta"


?>