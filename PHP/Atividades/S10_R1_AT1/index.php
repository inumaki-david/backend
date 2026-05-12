<?php
    session_start();
    
    // Cria o cookie com o nome da empresa (dura 1 hora)
    setcookie("empresa", "Disseram que seu cookie é bom", time() + 3600);

    // Inclui o topo da página com o nosso visual
    require "header.php";

    // Armazena o nome do utilizador na sessão
    $_SESSION["usuario"] = "Davi";
?>

    <h2>Página Inicial dos Cookies</h2>
    
    <p>Olá, <strong><?php echo $_SESSION["usuario"]; ?></strong>! Bem-vindo ao teu painel de cookies.</p>

    <a href="index2.php" class="btn">Avançar</a>

<?php
    // Inclui o rodapé
    require "footer.php";
?>