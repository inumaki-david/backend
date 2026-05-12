<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com PHP 3</title>
</head>
<body>
    <form method="POST">
        <label>Nome: </label> <br>
        <input type="text" name="nome" id="nome"> <br>
        <label>Email:</label> <br>
        <input type="email" name="email" id="email"> <br>
        <label>Mensagem:</label> <br>
        <input type="text" name="msg" id="msg">
        <input type="reset" value="Limpar"> <br>
        <input type="submit" value="Enviar">
    </form>
    <hr>
    <h2>Dados recebidos:</h2>
    <?php
        //declarando as variáveis
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $msg = $_POST["msg"];

        //exibindo as informações
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "Mensagem: $msg <br>";
    ?>
</body>
</html>