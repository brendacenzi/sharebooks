<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Recuperar senha | Sharebooks</title>
    	<?php
    	    include('includes/meta.php');
    	?>
    	<meta name="description" content="Recupere sua senha de forma simples">
    </head>
    <body>
        <?php 
            include('includes/menu.php');
        ?>    
        <main id="esqueci">
            <div id="campanha">
                <h1>RECUPERE SUA SENHA.</h1>
            </div>
            <div class="container format">
            <p>Recuperar sua senha é extremamente fácil... Insira seu e-mail no campo abaixo e aguarde o retorno dentro de 5 minutos.</p>
            <form id="form-senha">
                <input type="email" name="email" placeholder="Insira seu e-mail" required/>
                <input type="submit" value="Enviar"/>
            </form>
        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>