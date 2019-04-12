<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Contato | Sharebooks</title>
    	<?php
    	    include('includes/meta.php');
    	?>
    	<meta name="description" content="Entre em contato com o Sharebooks, tire suas duvidas e mande sugestões">
    </head>
    <body id="index">
        <?php 
            include('includes/menu.php');
        ?>
        <main>
            <div id="contato">
                <h1>CONTATE-NOS.</h1>
            </div>
            <div class="container format">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116676.2312710147!2d-46.29438799582782!3d-23.955763965068737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94d1fe0bcb5eefe3%3A0xd3ce231a2f8a0536!2sGuaruj%C3%A1+-+SP!5e0!3m2!1spt-BR!2sbr!4v1511628935762" width="600" height="450" frameborder="0" style="border:0" allowfullscreen id="mapa-contato"></iframe>
                <div id="info">
                    <form  action="/index.php/Sharebooks/enviar" method="post">
                        <p>* Nome:</p>
                        <input type="text" name="nome" id=""/>
                        <p>* Assunto:</p>
                        <input type="text" name="assunto" id=""/>
                        <p>* E-mail:</p>
                        <input type="text" name="email" id=""/>
                        <p>* Telefone:</p>
                        <input type="text" name="tel" id=""/>
                        <p>* Mensagem:</p>
                        <textarea name="mensagem" rows="4"></textarea>
                        <input type="submit" name="" value="Enviar"/>
                    </form>
                </div>
            </div>
        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>