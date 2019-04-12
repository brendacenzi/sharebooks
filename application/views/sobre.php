<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Sobre nós | Sharebooks</title>
    	<?php
    	    include('includes/meta.php');
    	?>
    	<meta name="description" content="Conheça mais sobre o Sharebooks, plataforma para troca, empréstimo e doação de livros">
    </head>
    <body id="index">
        <?php 
            include('includes/menu.php');
        ?>
        <main>
            <div id="campanha">
                <h1>TROQUE. DOE. EMPRESTE. COMPARTILHE!</h1>
            </div>
            <div class="container format">
                <h2>O que é o Sharebooks?</h2>
                <p>
                    O Sharebooks é uma plataforma voltada para transações de livros desenvolvida para o projeto de conclusão de curso (TCC) da turma de Sistemas para Internet do 1º semestre de 2015.
                </p>
                <p>
                    Para a criação e finalização do projeto, foram designadas tarefas aos integrantes Brenda Cenzi, Maurilyn Junior e Stephany Tenório, tudo sob a supervisão da professora Rosimeire.
                </p>
            </div>
            <hr>
            <div class="container" id="cont-dev">
                <div id="dev">
                    <a href="http://www.facebook.com/brenda.cenzi" target="_blank">
                        <div>
                            <img src="../../resources/img/brenda.jpg" alt="Brenda Cenzi" onmouseover="fundoDev('star-wars')" onmouseout="tiraFundo()">
                            <p>Brenda Cenzi</p>
                        </div>
                    </a>
                    <a href="http://www.facebook.com/maurilynjr" target="_blank">
                        <div>
                            <img src="../../resources/img/maurilyn.jpg" alt="Maurilyn Junior" onmouseover="fundoDev('estrela-morte')" onmouseout="tiraFundo()">
                            <p>Maurilyn Junior</p>
                        </div>
                    </a>
                    <a href="http://www.facebook.com/stephanytt" target="_blank">
                        <div>
                            <img src="../../resources/img/stephany.jpg" alt="Stephany Tenório" onmouseover="fundoDev('harry-potter')" onmouseout="tiraFundo()">
                            <p>Stephany Tenório</p>
                        </div>
                    </a>
                </div>
            </div>
            <hr>
            <div class="container format">
                <h2>A ideia</h2>
                <p>
                    Em seu plano principal, tem como objetivo auxiliar as pessoas na troca, empréstimo e doação de livros. Além de promover eventos com mesmos ideais e também incentivar o uso e a leitura de histórias.
                </p>
            </div>
        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>