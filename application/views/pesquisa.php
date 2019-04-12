<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $method = $_SERVER['REQUEST_METHOD'];
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Pesquisa de livros | Sharebooks</title>
    	<?php
    	    include('includes/meta.php');
    	?>
    	<meta name="description" content="Pesquise livros para solicitar de outros usuário e para disponibilizar também">
    </head>
    <body id="index">
        <?php 
            include('includes/menu-interno.php');
        ?>
        <main class="container2">
            <p>Bem-vindo(a) ao Sharebooks, aqui você pode compartilhar livros e conhecimento, comece procurando um livro para colocar na sua estante ou para solicitar.</p>
            <div id="opc-livro">
                <div>
                    <h2 onmouseover="trocar(1)" onmouseout="destrocar()" onclick="showForm('busca-estante')">Tenho um livro</h2>
                    <?php
                        if($method == "POST"){
                            if ($tipo == 1 or $tipo == 2)
                                echo "<hr style='border: 1.5px solid rgb(61, 168, 173);'>";
                            else
                                echo "<hr style='border: 1.5px solid rgb(255,255,255);'>";
                        }else
                            echo "<hr>";
                    ?>
                </div>
                <div>
                    <h2 onmouseover="trocar(2)" onmouseout="destrocar()" onclick="showForm('busca-interesse')">Quero um livro</h2>
                    <?php
                        if($method == "POST"){
                            if ($tipo == 3 or $tipo == 4)
                                echo "<hr style='border: 1.5px solid rgb(61, 168, 173);'>";
                            else
                                echo "<hr style='border: 1.5px solid rgb(255,255,255);'>";
                        }else
                            echo "<hr>";
                    ?>
                </div>
            </div>
            
            <?php
                if($method == "POST"){
                    if ($tipo == 1 or $tipo == 2)
                        echo "<form action='/index.php/Livro/buscaLivro' method='POST' id='busca-estante'>";
                    else
                        echo "<form action='/index.php/Livro/buscaLivro' method='POST' id='busca-estante' style='display:none'>";
                }else
                    echo "<form action='/index.php/Livro/buscaLivro' method='POST' id='busca-estante'>";
            ?>
                <input type="text" name="titulo" placeholder="Coloque um livro na sua estante" required/>
                
                <div id="opc-pesquisa">
                    <p>Pesquisar por: </p>
                    
                    <input type="radio" id="titulo" name="pesquisa" value="" checked>
                    <label for="titulo">Título do livro</label>
                    
                    <input type="radio" id="autor" name="pesquisa" value="inauthor">
                    <label for="autor">Nome do autor</label>
                    
                    <input type="radio" id="genero" name="pesquisa" value="subject">
                    <label for="genero">Gênero</label>
                    
                    <input type="radio" id="isbn" name="pesquisa" value="isbn">
                    <label for="isbn">ISBN</label>
                </div>
                
                <input type="submit" id="busca" value="Buscar"></input>
            </form>
            
            <?php
                if($method == "POST"){
                    if ($tipo == 3 or $tipo == 4)
                        echo "<form action='/index.php/Livro/buscaInteresse' method='POST' id='busca-interesse' style='display:block'>";
                    else
                        echo "<form action='/index.php/Livro/buscaInteresse' method='POST' id='busca-interesse' style='display:none'>";
                }else
                    echo "<form action='/index.php/Livro/buscaInteresse' method='POST' id='busca-interesse' style='display:none'>";
            ?>
                <input type="text" name="titulo" placeholder="Solicite um livro" required/>
                
                <div id="opc-pesquisa">
                    <p>Pesquisar por: </p>
                    
                    <input type="radio" id="titulo" name="pesquisa" value="nm_livro" checked>
                    <label for="titulo">Título do livro</label>
                    
                    <input type="radio" id="autor" name="pesquisa" value="nm_autor">
                    <label for="autor">Nome do autor</label>
                    
                    <input type="radio" id="genero" name="pesquisa" value="ds_categoria">
                    <label for="genero">Gênero</label>
                    
                    <input type="radio" id="isbn" name="pesquisa" value="cd_isbn">
                    <label for="isbn">ISBN</label>
                </div>
                
                <input type="submit" id="busca" value="Buscar"></input>
            </form>
            
            <div id="resultado">
                <?php
                    if($method == "POST"){
                        switch ($tipo) {
                            case 1:
                                echo $result;
                                break;
                            
                            case 2:
                                $itens = $result;
                                $i = 1;
                                foreach ($itens as $e){ 
                                    if($i == 1)
                                        echo "<div class='cont'>";
                                        
                                    echo "<a href='/index.php/Livro/info/2/" . $e['id'] . "'><div class='livro'>";
                                    echo "<p>";
                                        $tit = (empty($e['volumeInfo']['title']))? "Sem título" : $e['volumeInfo']['title'];
                                        echo "<span>" . $tit . "</span>";
                                        echo "Autor: " . @implode(", ", $e['volumeInfo']['authors']) . "<br/>";  
                                        echo "Categoria: " . @implode(", ", $e['volumeInfo']['categories']) . "<br/>";  
                                        $is = (empty($e['volumeInfo']['industryIdentifiers'][0]['identifier']))? "" : $e['volumeInfo']['industryIdentifiers'][0]['identifier'];
                                        echo "ISBN: " . $is; 
                                    echo "</p>";
                                    if(isset($e['volumeInfo']['imageLinks']))
                                        echo "<img src='" . $e['volumeInfo']['imageLinks']['smallThumbnail'] ."'/>";
                                    else
                                        echo "<img src='/resources/img/indisponivel.jpg'/>";
                                
                                    echo "</div></a>";
                                    if($i == 3){
                                        echo "</div>";
                                        $i = 0;
                                    }
                                    $i++;
                                }
                                break;
                                
                            case 3:
                                echo $result;
                                break;
                                
                            case 4:
                                $itens = $result;
                                $i = 1;
                                $disp = "";
                                
                                echo "
                                    <form action='/index.php/Livro/buscaFiltrada' method='POST' id='filtro'>
                                    <input type='hidden' name='pesquisa' value='". $pesquisa ."'>
                                    <input type='hidden' name='titulo' value='". $livro ."'>
                                    <select name='filtro'>
                                ";
                                foreach ($estados->result_array()  as $row){
                                    echo "<option value='" . $row['nm_estado'] . "'>" . $row['nm_estado'] . "</option>";
                                }
                                echo "
                                    </select>
                                    <input type='submit' value='filtrar'>
                                    </form>
                                ";
                                
                                foreach ($itens->result_array()  as $row){ 
                                    $disp = "";
                                    if($i == 1)
                                        echo "<div class='cont'>";
                                        
                                    echo "<a href='/index.php/Livro/solicitar/" . $row['cd_usuario'] . "/" .  $row['cd_livro']  . "'><div class='livro'>";
                                    echo "<p>";
                                        echo "<span>" . $row['nm_livro'] . "</span>";
                                        echo "Usuário: " . ucfirst($row['nm_usuario']) . "<br/>";
                                        echo "Localização: " . $row['nm_cidade'] . "/" . $row['nm_estado'] . "<br/>";

                                        if ($row['cd_emp'] == '1')
                                            $disp .= " empréstimo,";
                                        if ($row['cd_doa'] == '1')
                                            $disp .= " doação,";
                                        if ($row['cd_troc'] == '1')
                                            $disp .= " troca,";
                                        $disp = substr($disp, 0, -1);
                                        echo "Disponibilidade: " . ucfirst($disp) . "<br/>";
                                        
                                        echo "Estado: " . $row['ds_estado'] . "<br/>";
                                    echo "</p>";
                                    echo "<img src='" . $row['ds_capalivro'] ."'/>";
                                    echo "</div></a>";
                                    if($i == 3){
                                        echo "</div>";
                                        $i = 0;
                                    }
                                    $i++;
                                }
                                break;
                        }
                    }
                ?>
            </div>
        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>