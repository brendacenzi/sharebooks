<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>
            Solicitações | Sharebooks
        </title>
    	<?php
    	    include('includes/meta.1.php');
    	?>
    	<meta name="description" content="Veja as solicitações feitas por outros usuários à você">
    </head>
    <body>
        <?php 
            include('includes/menu-interno.php');
        ?>   
        <main class="container2" id="minhas-solics">
            <h1>Solicitações</h1>
            <br>
            <div>
                <?php
                    $i = 1;
                    foreach($result1->result_array()  as $row) {
                        if ($i == 1) 
                            echo "<div class='slc-livros'>";
                            echo "<div class='slc-livro'>";
                                echo "<div>";
                                    echo "<div class='slc-livro parteSuperior'>";
                                        echo "<img src='../../resources/img/perfil/" . $row['ds_foto'] . "' alt='usuário solicitante' class='foto-usu'>";
                                        echo "<p><a href='/index.php/Usuario/informacoes/" . $row['cd_solicitante'] . "'>" . $row['nm_usuario'] . "</a> solicitou ";
                                        echo "<a><strong>" . $row['nm_livro'] . "</strong></a></p>";
                                        echo "<img src='" . $row['ds_capalivro'] . "' alt='capa livro solicitado' class='capa-livro' >";
                                    echo "</div>";
                                    
                                    echo "<form action='/index.php/Usuario/criarConversa' method='post'  class='aceitar'>";
                                    echo "<input type='hidden' name='para' value='" . $row['cd_solicitante'] . "'>";
                                    echo "<input type='hidden' name='transacao' value='1'>";
                                    echo "<input type='hidden' name='livro' value='" . $row['cd_livrosolicitado'] . "'>";
                                    echo "<input type='hidden' name='outrolivro' value='" . $row['cd_livrooferecido'] . "'>";
                                    echo "<input type='hidden' name='tempo' value='" . $row['qt_tempo'] . "'>";
                                    echo "<input type='hidden' name='idtrans' value='" . $row['id_transacao'] . "'>";
                                    echo "<input type='submit' value='Aceitar'>";
                                    echo "</form>";
                                    echo "<form action='/index.php/Solicitacao/recusar' method='post' class='rejeitar'>";
                                    echo "<input type='hidden' name='transacao' value='" . $row['id_transacao'] . "'>";
                                    echo "<input type='submit' value='Rejeitar'>";
                                    echo "</form>";
                                echo "</div>";
                                echo "<div> ";
                                
                                echo "</div>";
                            echo "</div>";
                        $i++;
                        if($i == 3){
                            $i = 1;
                            echo "</div>";
                        }
                    }
                ?>
            </div>
            <hr>
            <div>
                <?php
                    $i = 1;
                    foreach($result2->result_array()  as $row) {
                        if ($i == 1) 
                            echo "<div class='slc-livros'>";
                            echo "<div class='slc-livro troquinha'>";
                                echo "<div>";
                                    echo "<div class='slc-livro parteSuperior'>";
                                        echo "<img src='../../resources/img/perfil/" . $row['ds_foto'] . "' alt='usuário solicitante' class='foto-usu'>";
                                        echo "<p><a href='/index.php/Usuario/informacoes/" . $row['cd_solicitante'] . "'>" . $row['nm_usuario'] . "</a> solicitou ";
                                        echo "<a><strong>" . $row['nm_livro'] . "</strong></a> em troca de <strong>" . $row['oferta'] .  "</strong></p>";
                                        echo "<div class='imagens'>";
                                            echo "<img src='" . $row['ds_capalivro'] . "' alt='capa livro solicitado' class='capa-livro' >";
                                            echo "<img src='" . $row['imgoferta'] . "' alt='capa livro solicitado' class='capa-livro' >";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<form action='/index.php/Usuario/criarConversa' method='post'  class='aceitar troquei'>";
                                    echo "<input type='hidden' name='para' value='" . $row['cd_solicitante'] . "'>";
                                    echo "<input type='hidden' name='transacao' value='2'>";
                                    echo "<input type='hidden' name='livro' value='" . $row['cd_livrosolicitado'] . "'>";
                                    echo "<input type='hidden' name='outrolivro' value='" . $row['cd_livrooferecido'] . "'>";
                                    echo "<input type='hidden' name='tempo' value='" . $row['qt_tempo'] . "'>";
                                    echo "<input type='hidden' name='idtrans' value='" . $row['id_transacao'] . "'>";
                                    echo "<input type='submit' value='Aceitar'>";
                                    echo "</form>";
                                    echo "<form action='/index.php/Solicitacao/recusar' method='post' class='rejeitar'>";
                                    echo "<input type='hidden' name='transacao' value='" . $row['id_transacao'] . "'>";
                                    echo "<input type='submit' value='Rejeitar'>";
                                    echo "</form>";
                                echo "</div>";
                                echo "<div class='imgT'> ";
                                
                                echo "</div>";
                            echo "</div>";
                        $i++;
                        if($i == 3){
                            $i = 1;
                            echo "</div>";
                        }
                    }   
                ?>
            </div>
            <hr>
            <div>
                <?php
                    $i = 1;
                    foreach($result3->result_array()  as $row) {
                        if ($i == 1) 
                            echo "<div class='slc-livros'>";
                            echo "<div class='slc-livro empzinho'>";
                                echo "<div>";
                                    echo "<div class='slc-livro parteSuperior'>";
                                        echo "<img src='../../resources/img/perfil/" . $row['ds_foto'] . "' alt='usuário solicitante' class='foto-usu'>";
                                        echo "<p><a href='/index.php/Usuario/informacoes/" . $row['cd_solicitante'] . "'>" . $row['nm_usuario'] . "</a> solicitou ";
                                        echo "<a><strong>" . $row['nm_livro'] . "</strong></a> por " . $row['qt_tempo'] . "</p>";
                                        echo "<img src='" . $row['ds_capalivro'] . "' alt='capa livro solicitado' class='capa-livro' >";
                                    echo "</div>";
                                    echo "<form action='/index.php/Usuario/criarConversa' method='post'  class='aceitar emprestei'>";
                                    echo "<input type='hidden' name='para' value='" . $row['cd_solicitante'] . "'>";
                                    echo "<input type='hidden' name='transacao' value='3'>";
                                    echo "<input type='hidden' name='livro' value='" . $row['cd_livrosolicitado'] . "'>";
                                    echo "<input type='hidden' name='tempo' value='" . $row['qt_tempo'] . "'>";
                                    echo "<input type='hidden' name='idtrans' value='" . $row['id_transacao'] . "'>";
                                    echo "<input type='hidden' name='outrolivro' value='" . $row['cd_livrooferecido'] . "'>";
                                    echo "<input type='submit' value='Aceitar'>";
                                    echo "</form>";
                                    echo "<form action='/index.php/Solicitacao/recusar' method='post' class='rejeitar'>";
                                    echo "<input type='hidden' name='transacao' value='" . $row['id_transacao'] . "'>";
                                    echo "<input type='submit' value='Rejeitar'>";
                                    echo "</form>";
                                echo "</div>";
                                echo "<div class='imgE'> ";
                                
                                echo "</div>";
                            echo "</div>";
                        $i++;
                        if($i == 3){
                            $i = 1;
                            echo "</div>";
                        }
                    }
                ?>
            </div>
            
            <div id="finalizada">
                <h2>Transações finalizadas</h2>
                <div>
                    <?php
                        $i = 1;
                        foreach($result4->result_array()  as $row) {
                            if ($i == 1) 
                                echo "<div class='slc-livros'>";
                                echo "<div class='slc-livro'>";
                                    echo "<div>";
                                        echo "<div class='slc-livro parteSuperior'>";
                                            echo "<img src='../../resources/img/perfil/";
                                            if ($row['cd_acordo'] <> $row['idsolicitado'])
                                                echo $row['imgsolicitante'];
                                            else
                                                echo $row['imgsolicitado'];
                                            echo "' alt='usuário solicitante' class='foto-usu'>";
                                            echo "<p>Confirmar doação de ";
                                            echo "<a><strong>" . $row['nm_livro'] . "</strong></a>";
                                            echo " com <a href='/index.php/Usuario/informacoes/" . $row['cd_acordo'] . "'>"; 
                                            if ($row['cd_acordo'] <> $row['idsolicitado'])
                                                echo $row['solicitante'];
                                            else
                                                echo $row['solicitado'];
                                            echo "</a></p>";
                                            echo "<img src='" . $row['ds_capalivro'] . "' alt='capa livro solicitado' class='capa-livro' >";
                                        echo "</div>";
                                        
                                        echo "<form action='/index.php/Conversa/trFinal' method='post'  class='aceitar'>";
                                        echo "<input type='hidden' name='usu' value='" . $row['cd_usuariosolicitado'] . "'>";
                                        echo "<input type='hidden' name='tp' value='1'>";
                                        echo "<input type='hidden' name='cv' value='" . $row['id_conversa'] . "'>";
                                        echo "<input type='submit' value='Confirmar'>";
                                        echo "</form>";
                                        echo "<form action='/index.php/Conversa/soConversa' method='post' class='rejeitar'>";
                                        echo "<input type='hidden' name='cv' value='" . $row['id_conversa'] . "'>";
                                        echo "<input type='submit' value='Excluir'>";
                                        echo "</form>";
                                    echo "</div>";
                                    echo "<div> ";
                                    
                                    echo "</div>";
                                echo "</div>";
                            $i++;
                            if($i == 3){
                                $i = 1;
                                echo "</div>";
                            }
                        }
                    ?>
                </div>
                <hr>
                <div>
                    <?php
                        $i = 1;
                        foreach($result5->result_array()  as $row) {
                            if ($i == 1) 
                                echo "<div class='slc-livros'>";
                                echo "<div class='slc-livro troquinha'>";
                                    echo "<div>";
                                        echo "<div class='slc-livro parteSuperior'>";
                                            echo "<img src='../../resources/img/perfil/";
                                            if ($row['cd_acordo'] <> $row['cd_usuariosolicitado'])
                                                echo $row['imgsolicitante'];
                                            else
                                                echo $row['imgsolicitado'];
                                            echo "' alt='usuário solicitante' class='foto-usu'>";
                                            echo "<p>Confirmar troca de ";
                                            echo "<a><strong>" . $row['nmlivro'] . "</strong></a> para <strong>" . $row['nmoferta'] .  "</strong> com ";
                                            echo "<a href='/index.php/Usuario/informacoes/";
                                            if ($row['cd_acordo'] <> $row['cd_usuariosolicitado'])
                                                echo $row['cd_usuariosolicitante'] . "'>" . $row['solicitante'];
                                            else
                                                echo $row['cd_usuariosolicitado'] . "'>" . $row['solicitado'];
                                            echo "</a>";
                                            echo "</p>";
                                            echo "<div class='imagens'>";
                                                echo "<img src='" . $row['dslivro'] . "' alt='capa livro solicitado' class='capa-livro' >";
                                                echo "<img src='" . $row['dsoferta'] . "' alt='capa livro solicitado' class='capa-livro' >";
                                            echo "</div>";
                                        echo "</div>";
                                        echo "<form action='/index.php/Conversa/trFinal2' method='post'  class='aceitar troquei'>";
                                        echo "<input type='hidden' name='usu' value='" . $row['cd_usuariosolicitado'] . "'>";
                                        echo "<input type='hidden' name='usu2' value='" . $row['cd_usuariosolicitante'] . "'>";
                                        echo "<input type='hidden' name='tp' value='2'>";
                                        echo "<input type='hidden' name='cv' value='" . $row['id_conversa'] . "'>";
                                        echo "<input type='submit' value='Confirmar'>";
                                        echo "</form>";
                                        echo "<form action='/index.php/Conversa/soConversa' method='post' class='rejeitar'>";
                                        echo "<input type='hidden' name='cv' value='" . $row['id_conversa'] . "'>";
                                        echo "<input type='submit' value='Excluir'>";
                                        echo "</form>";
                                    echo "</div>";
                                    echo "<div class='imgT'> ";
                                    
                                    echo "</div>";
                                echo "</div>";
                            $i++;
                            if($i == 3){
                                $i = 1;
                                echo "</div>";
                            }
                        }   
                    ?>
                </div>
                <hr>
                <div>
                    <?php
                        $i = 1;
                        foreach($result6->result_array()  as $row) {
                            if ($i == 1) 
                                echo "<div class='slc-livros'>";
                                echo "<div class='slc-livro' style='background-color: #8b4d9f'>";
                                    echo "<div class='emprestei'>";
                                        echo "<div class='slc-livro parteSuperior'>";
                                            echo "<img src='../../resources/img/perfil/";
                                            if ($row['cd_acordo'] <> $row['idsolicitado'])
                                                echo $row['imgsolicitante'];
                                            else
                                                echo $row['imgsolicitado'];
                                            echo "' alt='usuário solicitante' class='foto-usu'>";
                                            echo "<p>Confirmar empréstimo de ";
                                            echo "<a><strong>" . $row['nm_livro'] . "</strong></a>";
                                            echo " com <a href='/index.php/Usuario/informacoes/" . $row['cd_acordo'] . "'>"; 
                                            if ($row['cd_acordo'] <> $row['idsolicitado'])
                                                echo $row['solicitante'];
                                            else
                                                echo $row['solicitado'];
                                            echo "</a></p>";
                                            echo "<img src='" . $row['ds_capalivro'] . "' alt='capa livro solicitado' class='capa-livro' >";
                                        echo "</div>";
                                        
                                        echo "<form action='/index.php/Conversa/trFinal' method='post'  class='aceitar'>";
                                        echo "<input type='hidden' name='usu' value='" . $row['cd_usuariosolicitado'] . "'>";
                                        echo "<input type='hidden' name='tp' value='3'>";
                                        echo "<input type='hidden' name='cv' value='" . $row['id_conversa'] . "'>";
                                        echo "<input type='submit' value='Confirmar'>";
                                        echo "</form>";
                                        echo "<form action='/index.php/Conversa/soConversa' method='post' class='rejeitar'>";
                                        echo "<input type='hidden' name='cv' value='" . $row['id_conversa'] . "'>";
                                        echo "<input type='submit' value='Excluir' style='color: #8b4d9f'>";
                                        echo "</form>";
                                    echo "</div>";
                                    echo "<div style='background-image: url(../../resources/img/icons/empresbranco.png) !important;'> ";
                                    
                                    echo "</div>";
                                echo "</div>";
                            $i++;
                            if($i == 3){
                                $i = 1;
                                echo "</div>";
                            }
                        }
                    ?>
                </div>
            </div>
        </main>
        <?php
            include('includes/footer.php');
        ?>
    </body>
</html>