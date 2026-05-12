<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S9_R1_AT1</title>
    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: auto;
            padding: 15px;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #217cb9;
        }
        form, .div{
            background: linear-gradient(to right, #4fb6df, #1c4cd1);
            padding: 15px;
            border: 2px solid black;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            color: white;
            width: 400px;
        }
        label, p {
            color: black;
        }
        input {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid black;
            border-radius: 5px;
            outline: none;
            transition: 0.3s;
        }
        input[type="submit"] {
            background-color: #217cb9;
            color: white;
            border: 1px solid black;
            padding: 12px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        input[type="submit"]:hover {
            transform: translateY(-1px);
        }
        hr {
            border: 0;
            border-top: 1px solid #4fb6df;
            margin: 30px 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="form">
        <form method="POST">
            <label>Nickname:</label>
            <input type="text" name="nome" id="nome" placeholder="Digite aqui seu Nickname"> <br>
            <label>Email</label>
            <input type="email" name="email" id="email" placeholder="email@gmail.com"> <br>
            <label>Ano de Nascimento</label>
            <input type="date" name="anoNasc"> <br>
            <input type="submit" value="Enviar">
        </form>
        <hr>
    </div>
    <h2>Dados Recebidos</h2>
    <div class="div">
        <?php
            function exibirCampo($label, $valor) {
                echo "<p>$label</p> $valor <br>";
            }

            if (isset($_POST["nome"], $_POST["email"], $_POST["anoNasc"])) {
                exibirCampo("Nickname: ", $_POST["nome"]);
                exibirCampo("Email: ", $_POST["email"]);
                exibirCampo("Ano de Nascimento: ", $_POST["anoNasc"]);
            } else {
                echo "Aguardando Dados...";
            }
        ?>
    </div>
</body>
</html>