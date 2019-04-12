<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Funcionamento | Sharebooks</title>
    	<?php
    	    include('includes/meta.php');
    	?>
    	<meta name="description" content="Saiba como funciona o processo de troca, empréstimo e doação de livros">
    </head>
    <body id="index">
        <?php 
            include('includes/menu.php');
        ?>
        <main>
            <div id="funciona">
                <h1>COMO FUNCIONA.</h1>
            </div>
            
            <div class="troca">
                <h2>Troca </h2>
                <p>Para efetuar trocas com outros usuários, você precisa solicitar um livro e disponibilizar outro em troca... A cada troca que você efuta com sucesso, você ganha 15 pontos para trocar em prêmios no Sharebooks.</p>
                   <div class="trok">
                       <img src="./../../resources/img/icons/trok1.png" alt="ícone de troca" class="icons-func">
                        <h3>Procure o livro</h3>
                    </div>
                   <div class="trok">
                       <img src="./../../resources/img/icons/trok2.png" alt="ícone de troca" class="icons-func">
                        <h3>Escolha o livro</h3>
                   </div>
                   <div class="trok">
                       <img src="./../../resources/img/icons/trok3.png" alt="ícone de troca" class="icons-func">
                        <h3>Realize a troca</h3>
                   </div>
            </div>
            <div class="emprestimo">
                <h2>Empréstimo </h2>
                <p style="color: #fff">Precisa de um livro por um tempo determinado? Procure pelo título, decida o tempo necessário e torça para o outro usuário aceitar sua solicitação! Lembrando que, emprestando um livro, você ganha 10 pontos.</p>
                     <div class="empr">
                       <img src="./../../resources/img/icons/emp1.png" alt="ícone de troca" class="icons-func">
                        <h3>Efetue a busca</h3>
                    </div>
                   <div class="empr">
                       <img src="./../../resources/img/icons/emp2.png" alt="ícone de troca" class="icons-func">
                        <h3>Selecione o livro desejado</h3>
                   </div>
                   <div class="empr">
                       <img src="./../../resources/img/icons/emp3.png" alt="ícone de troca" class="icons-func">
                        <h3>Empreste seu livro</h3>
                   </div>
            </div>
            <div class="doacao">
                <h2>Doação </h2>
                <p>Sim, nós ainda acreditamos na existência de pessoas boas no mundo, e, por isso, damos a possibilidade de procurar um livro para doação... É simples, você só precisa solicitar o livro e marcar o encontro com o usuário que o disponibilizou.<br>
                   Sabe o melhor? Doando você ganha 30 pontos
                </p>
                    <div class="doac">
                       <img src="./../../resources/img/icons/doac1.png" alt="ícone de troca" class="icons-func">
                        <h3>Busque o livro</h3>
                    </div>
                   <div class="doac">
                       <img src="./../../resources/img/icons/doac2.png" alt="ícone de troca" class="icons-func">
                        <h3> Selecione </h3>
                   </div>
                   <div class="doac">
                       <img src="./../../resources/img/icons/doac3.png" alt="ícone de troca" class="icons-func">
                        <h3>Faça a doação</h3>
                   </div>
            </div>

        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>