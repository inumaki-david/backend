<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com PHP 4</title>
    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 0;
            padding: 15px;
        }
        form {
            background-color: #f17f29;
            padding: 15px;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label>Nome:</label> <br>
        <input type="text" name="nome" id="nome"> <br>
        <label>Email:</label> <br>
        <input type="email" name="email" id="email"> <br>
        <input type="submit" value="Enviar">
    </form>
    <?php
        function exibirCampo($label, $valor) {
            echo "$label $valor <br>";
        }

        // if (isset($_POST["nome"], $_POST["email"])) {
        //     exibirCampo("Nome: ", $_POST["nome"]);
        //     exibirCampo("Email: ", $_POST["email"]);
        // }

        exibirCampo("Nome: ", $_POST["nome"] ?? "");
        exibirCampo("Email: ", $_POST["email"] ?? "");
    ?>
</body>
</html>