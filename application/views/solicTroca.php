<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Troca de livros | Sharebooks
        </title>
    	<?php
    	    include('includes/meta.1.php');
    	?>
    	<meta name="description" content="Você pode escolher um livro para trocar com outro usuário">
    </head>
    <body>
        <?php 
            include('includes/menu-interno.php');
        ?>   
        <main class="container2">
            <?php
                $url = "/index.php/Livro/solicitar/" . $usuario . "/" . $livro;
                echo "<p><a href='" . $url . "'>" . $nmlivro . "</a> > Solicitação</p>";
                echo "<div id='solic-quad'><div>";
                echo "<div style='background-image: url(" . $capa . ")' id='capa-quad'> </div>";
            ?>
            
                <div>
                    <h1>Você está solicitando: <?= $nmlivro ?></h1>
                    <p class="linha">Selecione um livro da sua estante para oferecer em troca de <?= $nmlivro ?></p>
                </div>
                </div>
            </div>
            <br>

            <?php 
                $i = 1;
                $x = 0;
                $disp = "";
                foreach($result->result_array()  as $row) {
                    $disp = "";
                    if($i == 1)
                        echo "<div class='cont'>";
                    echo "<a href='/index.php/Livro/info/1/" . $row['cd_livro'] . "'><div class='livro'>";
                    echo "<div class='livrin'>";
                        echo "<span>" . $row['nm_livro'] . "</span>";
                        echo "Autor: " . $row['nm_autor'] . "<br>"; 
                        echo "ISBN: " . $row['cd_isbn'] . "<br>"; 
                        echo "<form action='/index.php/Solicitacao/doIt/2/0' method='post' class='oferta'>";
                        echo "<input type='hidden' name='idlivro' value='" . $livro . "'>";
                        echo "<input type='hidden' name='idlivro2' value='" . $row['cd_livro'] . "'>";
                        echo "<input type='hidden' name='idusuario' value='" . $usuario . "'>";
                        echo "<input type='submit' value='Oferecer'>";
                        echo "</form>";
                    echo "</div>";
                    echo "<img src='" . $row['ds_capalivro'] . "'/>";
                    echo "</div></a>";
                    if($i == 3){
                        echo "</div>";
                        $i = 0;
                    }
                    $i++;
                    $x++;
                }
                if($x == 0){
                    echo "<p>Você ainda não adicionou nenhum livro à sua estante. Faça isso agora, clicando em <a href=''>Pesquisar</a></p>";
                }
            ?>
        </main>
        <?php
            include('includes/footer.php');
        ?>
    </body>
</html>