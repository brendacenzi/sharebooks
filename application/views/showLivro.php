<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            <?php 
                if($result == 0)
                    echo "Livro não encontrado";
                else
                    echo $nome;
            ?> | Colocar na estante
        </title>
    	<?php
    	    include('includes/meta.1.php');
    	?>
    	<meta name="description" content="Livro para colocar na sua estante pessoal">
    </head>
    <body>
        <?php 
            include('includes/menu-interno.php');
        ?>   
        <main>
            <div id="capa" <?= "style='background-image:url(" . $capa . ")'" ?>></div>
            <div id="cont-livro">
                   <?php
                    if($result == 0)
                        echo "Livro não encontrado";
                    else {
                        echo "<img id='foto' src='" . $image . "' alt='capa do livro'>";
                        echo "<div class='conteudo'>";
                            if($class != "")
                                $classi = "<img src='/../resources/img/avaliacao/" . $class . ".png' id='avaliacao'>";
                            else 
                                $classi = "";
                            echo "<h1>" . $nome. " " . $classi. "</h1>";
                            echo "<p><span> ISBN: </span>" . $isbn . "</p>";
                            echo "<p><span> Autor: </span>" . $autor . "</p>";
                            echo "<p><span> Categoria: </span>" . $categ . "</p>";
                            echo "<p><span> Data de publicação: </span>" . $public . "</p>";
                            echo "<p><span> Quantidade de páginas: </span>" . $pg . "</p>";
                            echo "<p><span> Descrição: </span></br>" . $ds . "</p>";
                        echo "</div>";
                        
                        if ($tem == 1){
                            $st1 = "style='display:block'";
                            $st2 = "style='display:none'";
                        }else{
                            $st1 = "style='display:none'";
                            $st2 = "style='display:block'";
                        }
                        
                        echo "<img src=" . base_url('resources/img/btn/right.png') . " id='disponibilizar'" . $st2 . "onclick='showEstado()' onmouseover='legenda(1)' onmouseout='legendaBack()'>";
                        echo "<div id='botoes-transacao' onmouseout='legendaBack()' " . $st1 . ">";
                        
                        
                        if($tem == 1){
                            foreach($disp->result_array()  as $row) { 
                                $aux1 = $row['cd_doa'];
                                $aux2 = $row['cd_troc'];
                                $aux3 = $row['cd_emp'];
                            }
                        
                            if ($aux1 == 0)
                                echo "<form action='/index.php/Livro/doar/1' method='POST' id='doacao' onmouseover='legenda(2)'>";
                            else
                                echo "<form action='/index.php/Livro/doar/0' method='POST' id='doacao' onmouseover='legCancela(1)'>";
                                
                            echo "<input type='hidden' name='idlivro' value='" . $idlivro . "'/>";
                            echo "<input type='submit' value='' style='background-image: url(&quot" . base_url('resources/img/btn/btn1-' . $aux1 . '.png') .  "&quot)'></input>";
                            echo "</form>";
                            
                            if ($aux2 == 0)
                                echo "<form action='/index.php/Livro/trocar/1' method='POST' id='troca' onmouseover='legenda(3)'>";
                            else
                                echo "<form action='/index.php/Livro/trocar/0' method='POST' id='troca' onmouseover='legCancela(2)'>";
                                
                            echo "<input type='hidden' name='idlivro' value='" . $idlivro . "'/>";
                            echo "<input type='submit' value='' style='background-image: url(&quot" . base_url('resources/img/btn/btn2-' . $aux2 . '.png') .  "&quot)'></input>";
                            echo "</form>";
                            
                            if ($aux3 == 0) 
                                echo "<form action='/index.php/Livro/emprestar/1' method='POST' id='emprestimo' onmouseover='legenda(4)'>";
                            else
                                echo "<form action='/index.php/Livro/emprestar/0' method='POST' id='emprestimo' onmouseover='legCancela(3)'>";
                                
                            echo "<input type='hidden' name='idlivro' value='" . $idlivro . "'/>";
                            echo "<input type='submit' value='' style='background-image: url(&quot" . base_url('resources/img/btn/btn3-' . $aux3 . '.png') .  "&quot)'></input>";
                            echo "</form>";
                            
                            echo "<form action='/index.php/Livro/remover' method='POST' id='cancelar' onclick='cancDisp()' onmouseover='legenda(5)'>";
                                echo "<input type='hidden' name='idlivro' value='" . $idlivro . "'/>";
                                echo "<input type='submit' value='' style='background-image: url(&quot" . base_url('resources/img/btn/cancel.png') .  "&quot)'></input>";
                            echo "</form>";
                        
                        }
                        
                        echo "</div>";
                        echo "<div id='legenda'>Escolha uma opção</div>";
                    
                    }

                ?>
                <div id="total-estado" onclick="cancDisp()">
                    
                </div>
                <form id="estado" method="POST" action="/index.php/Livro/adicionar">
                    <input type="hidden" name="idlivro" value="<?= $idlivro ?>">
                    <input type="hidden" name="nome" value="<?= $nome ?>">
                    <input type="hidden" name="autor" value="<?= $autor ?>">
                    <input type="hidden" name="isbn" value="<?= $isbn ?>">
                    <input type="hidden" name="foto" value="<?= $image ?>">
                    <input type="hidden" name="capa" value="<?= $capa ?>">
                    <input type="hidden" name="ds" value="<?= $ds ?>">
                    <input type="hidden" name="class" value="<?= $class ?>">
                    <input type="hidden" name="categ" value="<?= $categ ?>">
                    <div>
                        <fieldset>
                            <legend>Como está o seu exemplar?</legend>
                            <label><input type="checkbox" name="estado[]" value="novo" /> Novo</label>
                            <label><input type="checkbox" name="estado[]" value="usado" /> Usado</label>
                            <label><input type="checkbox" name="estado[]" value="com anotações" /> Anotado</label>
                            <label><input type="checkbox" name="estado[]" value="rabiscado" /> Rabiscado</label>  
                            <label><input type="checkbox" name="estado[]" value="sem capa" /> Sem capa</label>
                            <label><input type="checkbox" name="estado[]" value="conservado" /> Conservado</label>
                            <input type='submit' value='' id='disp' />
                        </fieldset>
                    </div>
                </form>
            </div>
        </main>
        <?php
            include('includes/footer.php');
        ?>
    </body>
</html>