<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com PHP 2</title>
</head>
<body>
    <form method="POST">
        <label>Email:</label> <br>
        <input type="email" name="email" id="email" placeholder="email@gmail.com"> <br>
        <label>Senha:</label> <br>
        <input type="password" name="senha" id="senha">
        <input type="submit" value="Enviar">
    </form>
    <?php
        $email = $_POST["email"];
        echo "Email informado: $email <br>";
        echo "Login Confirmado"
    ?>
</body>
</html>