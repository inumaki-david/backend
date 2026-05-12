<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com PHP</title>
    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 0;
        }
        form {
            background-color: #f17f29;
            padding: 15px;
        }
    </style>
</head>
<body>
    <form method="GET">
        <label name="nome">Nome:</label> <br>
        <input type="text" name="nome" placeholder="Digite seu nome aqui"> <br>
        <input type="submit" id="btn" value="Enviar">
    </form>
    <?php
        $nome = $_GET["nome"];

        echo "<br> Nome Informado: $nome <br>";
        var_dump($_GET);
    ?>
</body>
</html>