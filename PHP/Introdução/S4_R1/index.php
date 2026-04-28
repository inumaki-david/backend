<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $funcionarios = 40;
        $mediaEmpresa = $funcionarios >= 31;

        // echo "Empresa de médio porte ?";
        // echo $mediaEmpresa;

        echo "A empresa é de: " . ($mediaEmpresa ? "Médio Porte" : "Grande Porte");
    ?>
</body>
</html>