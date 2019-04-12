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
            <div id="informe">
                <img src="./../../../resources/img/icons/trofeu.png">
                <p>
                    Quanto mais livros você troca, doa ou empresta, mais pontos você acumula para trocar em itens super legais!<br>
                    Comece já a efetuar suas transações.<br>
                    <span id="meus-pontos">Você tem: <?php foreach($usuario->result_array() as $row) {echo $row['qt_pontos'] . " pontos";}?></span>
                </p>
            </div>
            
            <?php 
                foreach($usuario->result_array() as $row) { 
                    $ponto = $row['qt_pontos'];
                }
                $i = 1;
                $x = 0;
                foreach($result->result_array()  as $row) { 
                    if($i == 1)
                        echo "<div class='cont'>";
                    echo "<div class='premio'>";
                    echo "<span>" . $row['nm_premio'] . "</span>";
                    echo "<img src='./../../../resources/img/premios/" . $row['ds_imagem'] . "'/>";
                    echo "<p>" . $row['ds_premio'] . "</p>";
                    echo "<p class='pt'>" . $row['qt_pontos'] . " pontos</p><br>"; 
                    if (($ponto - $row['qt_pontos']) < 0)
                        echo "<a class='n-poss'>Pontos insuficientes</a>";
                    else
                        echo "<a href='/index.php/Premio/solicitar/" . $row['id_premio'] . "' class='poss'>Solicitar</a>";
                    echo "</div>";
                    if($i == 3){
                        echo "</div>";
                        $i = 0;
                    }
                    $i++;
                    $x++;
                }
            ?>
        </main>
        <?php
            include('includes/footer.php');
        ?>
    </body>
</html>