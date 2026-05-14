<?php
    // Inicia a sessão novamente para conseguir ler os dados
    session_start();
    
    // Incluí o cabeçalho visual
    require "header.php";
?>

    <h2>Página 2 - Informações Guardadas</h2>

    <div style="background-color: #f8f9fa; padding: 15px; border-right: 4px solid #1a73e8; margin-top: 20px;">
        
        <p><strong>Nome do Utilizador (recuperado da Sessão):</strong><br>
            <?php 
                // Verifica se a sessão existe antes de a mostrar
                if(isset($_SESSION["usuario"])) {
                    echo $_SESSION["usuario"];
                } else {
                    echo "Nenhum utilizador na sessão.";
                }
            ?>
        </p>

        <p><strong>Empresa Parceira (recuperada do Cookie):</strong><br>
            <?php 
                // Verifica se o cookie existe antes de o mostrar
                if(isset($_COOKIE["empresa"])) {
                    echo $_COOKIE["empresa"];
                } else {
                    echo "Nenhum cookie encontrado.";
                }
            ?>
        </p>
        
    </div>

    <a href="index.php" class="btn">Voltar para o Início</a>

<?php
    require "footer.php";
?>