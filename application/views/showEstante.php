<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Minha estante | Sharebooks
        </title>
    	<?php
    	    include('includes/meta.1.php');
    	?>
    	<meta name="description" content="Estante pessoal com livros para disponibilizar a outros usuários">
    </head>
    <body>
        <?php 
            include('includes/menu-interno.php');
        ?>   
        <main class="container2">
            <h1>Minha estante</h1>
        
            <p class="linha">Olá, <?php foreach($usuario->result_array() as $row) { echo ucfirst($row['nm_usuario']);}?>. Esta é sua estante pessoal, nela você coloca os livros que possui e deseja disponibilizar a outros.</p>
            <br>
            
            <?php 
                $i = 1;
                $x = 0;
                $disp = "";
                $cont = 0;
                foreach($result->result_array()  as $row) {
                    $disp = "";
                    if($i == 1)
                        echo "<div class='cont'>";
                                
                    echo "<a href='/index.php/Livro/info/1/" . $row['cd_livro'] . "'><div class='livro'>";
                    echo "<p>";
                        echo "<span>" . $row['nm_livro'] . "</span>";
                        
                        if($row['cd_emp'] == 0 && $row['cd_doa'] == 0 && $row['cd_troc'] == 0)
                            echo "<span id='dispon'>Não disponibilizado</span>";
                        else{
                            if ($row['cd_emp'] == '1')
                                $disp .= " empréstimo,";
                            if ($row['cd_doa'] == '1')
                                $disp .= " doação,";
                            if ($row['cd_troc'] == '1')
                                $disp .= " troca,";
                            $disp = substr($disp, 0, -1);
                            echo "<span id='dispon'>Disponível para" . $disp . "</span>";
                        }
                        
                        echo "Autor: " . $row['nm_autor'] . "<br>"; 
                        echo "ISBN: " . $row['cd_isbn'] . "<br>"; 
                    echo "</p>";
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
                
                if($cont == 2)
                    break;
                
                $cont++;
            ?>
        </main>
        <?php
            include('includes/footer.php');
        ?>
    </body>
</html>