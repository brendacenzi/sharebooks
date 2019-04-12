<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Sharebooks - Compartilhando histórias</title>
    	<?php
    	    include('includes/meta.php');
    	?>
    	<meta name="description" content="O Sharebooks é uma plataforma para intermediar trocas, empréstimos e doações de livros">
    </head>
    <body id="index">
        <?php 
            include('includes/menu.php');
        ?>
        <main>
            <div id="banner">
                <h1>Compartilhando histórias</h1>
            </div>
            <div id="sobre">
                <div class="container">
                    <div>
                        <h2>Plataforma para transações de livros</h2>
                        <p>O Sharebooks é uma ferramenta desenvolvida em 2017 para o projeto de conclusão de curso (TCC) da turma de Sistemas para Internet do 1º semestre de 2015.</p>
                        <p><a href="/index.php/Sharebooks/sobre">>> Conheça o Sharebooks</a></p>
                    </div>
                </div>
            </div>
            <div id="tipos">
                <div class="container">
                    <div>
                        <img src="./../../resources/img/icons/troca.png" alt="ícone de troca">
                        <h3>Troca</h3>
                        <p>Troque seus livros com outros usuários</p>
                    </div>
                    <div>
                        <img src="./../../resources/img/icons/emprestimo.png" alt="ícone de empréstimo">
                        <h3>Empréstimo</h3>
                        <p>Empreste livros definindo data de devolução</p>
                    </div>
                    <div>
                        <img src="./../../resources/img/icons/doacao.png" alt="ícone de doação">
                        <h3>Doação</h3>
                        <p>Doe seus livros que não possuem mais uso</p>
                    </div>
                </div>
            </div>
            <div id="func">
                <div class="container">
                    <h2>Quer saber como funciona?</h2>
                    <br>
                    <a href="/index.php/Sharebooks/funcionamento">Fique por dentro</a>
                </div>
            </div>
        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>