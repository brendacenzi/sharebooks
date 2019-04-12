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
                    foreach($r->result_array()  as $row) {
                        echo $row['nm_livro'];
                    }
            ?> | Solicitar
        </title>
    	<?php
    	    include('includes/meta.1.php');
    	?>
    	<meta name="description" content="Livro para solicitar de outro usuário">
    </head>
    <body>
        <?php 
            include('includes/menu-interno.php');
        ?>   
        <main>
            <?php
                $disp = "";
                $img = "";
                foreach($r->result_array()  as $row) {
                    echo "<div id='capa' style='background-image:url(" . $row['ds_bannerlivro'] . ")'></div>";
                    echo "<div id='cont-livro'>";
                    if($result == 0)
                        echo "Livro não encontrado";
                    else {
                        echo "<img id='foto' src='" . $row['ds_capalivro'] . "' alt='capa do livro'>";
                        echo "<div class='conteudo'>";
                        if($row['cd_class'] != "")
                            $classi = "<img src='/../resources/img/avaliacao/" . $row['cd_class'] . ".png' id='avaliacao'>";
                        else 
                            $classi = "";
                        echo "<h1>" . $row['nm_livro'] . " " . $classi. "</h1>";
                        echo "<div id='who'>";
                        echo "<p><span>Disponibilizado por: </span><a href='/index.php/Usuario/informacoes/" . $row['cd_usuario'] . "'>" . $row['nm_usuario'] . "</a></p>";
                        echo "<p><span>Disponibilizado para: </span>";
                        foreach($tem->result_array()  as $row2) {
                            if ($row2['cd_doa'] == 1)
                                $disp .= "doação, ";
                            if ($row2['cd_emp'] == 1)
                                $disp .= "empréstimo, ";
                            if ($row2['cd_troc'] == 1)
                                $disp .= "troca, ";
                            $disp = substr($disp, 0, -2);
                            echo $disp;
                        }
                        echo "</p>";
                        echo "</div><hr>";
                        echo "<p><span> ISBN: </span>" . $row['cd_isbn'] . "</p>";
                        echo "<p><span> Autor: </span>" .$row['nm_autor'] . "</p>";
                        echo "<p><span> Categoria: </span>" . $row['ds_categoria'] . "</p>";
                        echo "<p><span> Descrição: </span></br>" . $row['ds_livro'] . "</p>";
                        echo "</div>";
                    }
                }
                
                echo "<div id='botoes-transacao2' onmouseout='legendaBack()'>";
                
                $aux = 0;
                $aux2 = 0; 
                $aux3 = 0;
                foreach($slc->result_array()  as $i=>$row3) {
                    if($row3['cd_tipo'] == 1)
                        $aux = 1;
                    if($row3['cd_tipo'] == 2)
                        $aux2 = 1;
                    if($row3['cd_tipo'] == 3)
                        $aux3 = 1;
                }
                
                foreach($tem->result_array()  as $row2) {
                    if ($row2['cd_doa'] == 0){
                        echo "<form onmouseover='indispSolic(1)' class='indisp'>";
                        $img = "btn1-00";
                    } else{
                        if ($aux == 0){
                            echo "<form action='/index.php/Solicitacao/doIt/1/0' method='POST' onmouseover='legendaSolic(1)'>"; 
                            $img = "btn1-0";
                        }else{
                            echo "<form action='/index.php/Solicitacao/doIt/1/1' method='POST' onmouseover='cancelaSolic(1)'>";
                            $img = "btn1-1";
                        }
                    }  
                    echo "<input type='hidden' name='idlivro' value='" . $row['cd_livro'] . "'/>";
                    echo "<input type='hidden' name='idusuario' value='" . $row['cd_usuario'] . "'/>";
                    echo "<input type='submit' value='' style='background-image: url(&quot" . base_url('resources/img/btn/' . $img . '.png') .  "&quot)'></input>";
                    echo "</form>";
                    
                    if ($row2['cd_troc'] == 0){
                        echo "<form onmouseover='indispSolic(2)' class='indisp'>";
                        $img = "btn2-00";
                    } else{
                        if ($aux2 == 0){
                            echo "<form action='/index.php/Solicitacao/troca' method='POST' onmouseover='legendaSolic(2)'>"; 
                            $img = "btn2-0";
                        }else{
                            echo "<form action='/index.php/Solicitacao/doIt/2/1' method='POST' onmouseover='cancelaSolic(2)'>";
                            $img = "btn2-1";
                        }
                    }  
                    echo "<input type='hidden' name='idlivro' value='" . $row['cd_livro'] . "'/>";
                    echo "<input type='hidden' name='idusuario' value='" . $row['cd_usuario'] . "'/>";
                    echo "<input type='hidden' name='nmlivro' value='" . $row['nm_livro'] . "'/>";
                    echo "<input type='hidden' name='nmusuario' value='" . $row['nm_usuario'] . "'/>";
                    echo "<input type='hidden' name='capa' value='" . $row['ds_capalivro'] . "'/>";
                    echo "<input type='submit' value='' style='background-image: url(&quot" . base_url('resources/img/btn/' . $img . '.png') .  "&quot)'></input>";
                    echo "</form>";
                    
                    if ($row2['cd_emp'] == 0){
                        echo "<form onmouseover='indispSolic(3)' class='indisp'>";
                        $img = "btn3-00";
                        $visual = "display: block";
                    } else{
                        if ($aux3 == 0){
                            echo "<img src='/resources/img/btn/btn3-0.png' id='solic-emp' onclick='solicEmprestimo()' onmouseover='legendaSolic(3)'>";
                            $visual = "display: none";
                        }else{
                            echo "<form action='/index.php/Solicitacao/doIt/3/1' method='POST' onmouseover='cancelaSolic(3)'>";
                            $img = "btn3-1";
                            $visual = "display: block";
                        }
                    }  
                    echo "<input type='hidden' name='idlivro' value='" . $row['cd_livro'] . "'/>";
                    echo "<input type='hidden' name='idusuario' value='" . $row['cd_usuario'] . "'/>";
                    echo "<input type='submit' value='' style='background-image: url(&quot" . base_url('resources/img/btn/' . $img . '.png') .  "&quot); " . $visual . "'></input>";
                    echo "</form>";
                }
                echo "</div>";
                echo "<div id='legenda'>Escolha uma opção</div>";
                
                echo "<div id='div-emprestimo'>
                    <span>Por quanto tempo deseja ficar com o livro?</span>";
                    echo "<form action='/index.php/Solicitacao/doIt/3/0' method='POST' id='form-emp' onmouseover='legendaSolic(2)'>"; 
                    $img = "btn2-0";
                    echo "<input type='text' name='tempo' placeholder='2 meses, 3 semanas...'/>";
                    echo "<input type='hidden' name='idlivro' value='" . $row['cd_livro'] . "'/>";
                    echo "<input type='hidden' name='idusuario' value='" . $row['cd_usuario'] . "'/>";
                    echo "<input type='submit' value='' style='background-image: url(../../../../resources/img/btn/btn3-1.png)'></input>";
                    echo "</form>";
                echo "</div>";
            ?>
            </div>
        </main>
        <?php
            include('includes/footer.php');
        ?>
    </body>
</html>