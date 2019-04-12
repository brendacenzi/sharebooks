<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    	<title>Meu perfil | Sharebooks</title>
    	<meta name="description" content="Perfil pessoal, livros e pontuação">
    	<?php
    	    include('includes/meta.php');
    	?>
    </head>
    <body id="index">
        <?php 
            include('includes/menu-interno.php');
        ?>
        <main>
            <div id="capa"></div>
            <div id="cont-perfil">
                <div id="info-perfil">
                    <div id="flag">
                        <img src="../../resources/img/perfil/<?= $info->ds_foto; ?>" id="perfil">
                    </div>
                    <div id="princ">
                        <h1><?= $info->nm_usuario; ?></h1>
                        <div id="tag-perfil">
                             <img src="../../resources/img/icons/location.png" class="perfil-icon">
                             <h2><?= $info->nm_cidade; ?>/<?= $info->nm_estado; ?></h2>
                        </div>
                        <div id="tag-perfil2">
                             <img src="../../resources/img/icons/trophy.png" class="perfil-icon">
                             <p id="pontos"><?= $info->qt_pontos; ?> pontos</p>
                        </div>
                        <div id="tag-perfil3">
                            <img src="../../resources/img/icons/roxo.png" class="citacao">
                            <p id="desc"><?= $info->ds_usuario; ?></p>
                        </div>
                    </div>
                </div>
                <div class="limpa"></div>
                <hr class="hr-format">
                <div id="minha_transacao">
                    <?php
                        foreach ($trans->result_array()  as $row){
                            echo "<div><span>" . $row['qt_doa'] . "</span><br><br><br>Doações</div>";
                            echo "<div><span>" . $row['qt_troca'] . "</span><br><br><br>Trocas</div>";
                            echo "<div><span>" . $row['qt_emp'] . "</span><br><br><br>Empréstimos</div>";
                        }
                    ?>
                </div>
                <hr class="hr-format">
                <div id="previa-estante">
                    <h2>Minha estante</h2>
                    <br>
                    <?php 
                        $i = 1;
                        $x = 0;
                        $disp = "";
                        $contador = 0;
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
                            echo "</p>";
                            echo "<img src='" . $row['ds_capalivro'] . "'/>";
                            
                            echo "</div></a>";
                            if($i == 3){
                                echo "</div>";
                                $i = 0;
                            }
                            $i++;
                            $x++;
                            $contador++;
                            if($contador == 6)
                                break;
                        }
                        if($x == 0){
                            echo "<p>Você ainda não adicionou nenhum livro à sua estante. Faça isso agora, clicando em <a href=''>Pesquisar</a></p>";
                        }
                    ?>
                </div>
            
                <div class="limpa"></div>
                <div id='ver-estante'>
                    <a href='/index.php/Usuario/estante'>>> Ver mais</a>
                </div>
            </div>
        </main>
        <?php 
            include('includes/footer.php');
        ?>
    </body>
</html>