<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessões e Coockies</title>
</head>
<body>
    <?php
        session_start();

        $_SESSION["usuario"] = "Davi";
        echo "Usuário armazenado na sessão <br> <pre>";

        var_dump($_SESSION);

        echo "</pre>";
    ?>
</body>
</html>