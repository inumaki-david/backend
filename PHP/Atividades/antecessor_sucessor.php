<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número Antecessor e Sucessor - Tabela</title>
    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
            margin: 0;
            padding: 15px;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #217cb9;
        }

        form, .resultado, .erro {
            background: linear-gradient(to right, #4fb6df, #1c4cd1);
            padding: 20px;
            border: 2px solid black;
            border-radius: 16px;
            display: flex;
            flex-direction: column;
            color: white;
            width: 100%;
            max-width: 400px; 
            box-sizing: border-box;
            margin-bottom: 10px;
            text-align: center;
        }

        h2 {
            color: white;
            text-shadow: 1px 1px 2px black;
        }

        label {
            color: black;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 10px;
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
            background-color: #1c4cd1;
            transform: translateY(-2px);
        }

        .erro {
            background: #ff4d4d;
            color: white;
            border: 2px solid darkred;
        }

        table {
            width: 100%;
            margin-top: 15px;
            background-color: rgba(255, 255, 255, 0.2); 
            border-radius: 8px;
            table-layout: fixed;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-radius: 8px;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        th {
            background-color: rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <h2>Descubra os Vizinhos do Número!</h2>

    <form method="POST">
        <label>Digite um Número Inteiro para Descobrir seu Antecessor e Sucessor.</label><br>
        <input type="number" name="numero" id="numero" placeholder="Digite o número">
        <input type="submit" name="mostrar" value="Mostrar">
    </form>

    <?php
        if (isset($_POST['mostrar'])) {
            
            if ($_POST['numero'] == "") {
                echo "<div class='erro'><strong>Erro:</strong> Você é burro? Digite um número antes de enviar!</div>";
            } else {
                $numero = $_POST['numero'];
                $antecessor = $numero - 1;
                $sucessor = $numero + 1;

                echo "<div class='resultado'>";
                echo "<h3>Resultados:</h3>";
                
                echo "<table>";
                echo "  <tr>
                            <th>Antecessor</th>
                            <th>Número</th>
                            <th>Sucessor</th>
                        </tr>";
                echo "  <tr>
                            <td>$antecessor</td>
                            <td><strong>$numero</strong></td>
                            <td>$sucessor</td>
                        </tr>";
                echo "</table>";
                
                echo "</div>";
            }
        }
    ?>
</body>
</html>