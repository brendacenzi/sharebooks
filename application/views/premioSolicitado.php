<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Resgatar prêmios | Sharebooks
        </title>
    	<?php
    	    include('includes/meta.1.php');
    	?>
    	<meta name="description" content="Além de trocar livros, você também pode ganhar prêmios">
    </head>
    <body>
        <?php 
            include('includes/menu-interno.php');
        ?>   
        <main class="container2">
            <h1>Resgatar prêmios</h1>
            <br><br><br><br><br><br>
            <h2>Prêmio solicitado com sucesso!</h2>
            <br>
            <a href='/index.php/Sharebooks/premios' id='botao-voltar'>Voltar</a>
            <br><br><br><br><br><br>
        </main>
        <?php
            include('includes/footer.php');
        ?>
    </body>
</html>